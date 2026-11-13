<?php
class ControllerExtensionModuleBonusReward extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/bonus_reward');

		$json = array();

		if (!isset($this->request->get['key']) || $this->request->get['key'] !== $this->config->get('module_bonus_reward_cron_key')) {
			$json['error'] = $this->language->get('error_cron_key');
		} else {
			if ($this->config->get('module_bonus_reward_cron')) {
				if ($this->config->get('module_bonus_reward_method') == 'standard') {
					$json['addRewardToProducts'] = $this->addRewardToProducts();
				}
				$json['updateRewardToCustomers'] = $this->updateRewardToCustomers();
			} else {
				$json['error'] = $this->language->get('error_cron');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addRewardToProducts() {
		$this->load->language('extension/module/bonus_reward');

		$json = array();

		if (!$this->config->get('module_bonus_reward_status')) {
			$json['error'] = $this->language->get('error_status');
		}

		if ($this->config->get('module_bonus_reward_calculation_source') == 'category' && empty($this->config->get('module_bonus_reward_category'))) {
			$json['error'] = $this->language->get('error_category');
		}

		if ($this->config->get('module_bonus_reward_calculation_source') == 'manufacturer' && empty($this->config->get('module_bonus_reward_manufacturer'))) {
			$json['error'] = $this->language->get('error_manufacturer');
		}

		if (!$json) {
			$this->load->model('extension/module/bonus_reward');

			$setting = $this->config->get('module_bonus_reward_' . $this->config->get('module_bonus_reward_calculation_source'));

			$source_ids = array_keys($setting);

			foreach ($source_ids as $source_id) {
				$config = $setting[$source_id];

				if ($this->config->get('module_bonus_reward_calculation_source') == 'category') {
					$main_category = $this->config->get('module_bonus_reward_category_method');

					$products = $this->model_extension_module_bonus_reward->getAvailableProductsByCategory($source_id, $main_category);
				} else {
					$products = $this->model_extension_module_bonus_reward->getAvailableProductsByManufacturer($source_id);
				}

				$special_status = (int)$this->config->get('module_bonus_reward_special_status');

				$option_status = (int)$this->config->get('module_bonus_reward_option_status');

				foreach ($products as $product) {
					$product_id = $product['product_id'];

					$product_options = $this->model_extension_module_bonus_reward->getProductOptions($product_id);

					if ($product_options && !$option_status) {
						continue;
					}

					foreach ($product_options as $option) {
						$data_options = [
							'product_option_value_id' => $option['product_option_value_id'],
							'points_prefix'           => $option['price_prefix'],
							'points'                  => ($option['price_prefix'] == '-') ? $option['price_prefix'] . (int)($option['price'] * (float)$config['coefficient']) : (int)($option['price'] * (float)$config['coefficient'])
						];

						$this->model_extension_module_bonus_reward->updateProductOptionReward($product_id, $data_options);
					}

					foreach ($config['customer_group'] as $group_id => $percent) {
						$product_special = $this->model_extension_module_bonus_reward->getProductSpecial($product_id, $group_id);
					
						if ($product_special && $special_status) {
							$price = (float)$product_special['price'];
						} else {
							$price = (float)$product['price'];
						}
					
						$group_points = (int)($price * ($percent / 100));
						$this->model_extension_module_bonus_reward->addProductReward($product_id, $group_points, $group_id);
					}
					
					$points = (int)((float)$product['price'] * (float)$config['coefficient']);
					$this->model_extension_module_bonus_reward->updateProductPoints($product_id, $points);
				}
			}
			$json['success'] = $this->language->get('text_add_success');
		}
		return $json;
	}

	public function updateRewardToCustomers() {
		$this->load->language('extension/module/bonus_reward');

		$json = array();

		if (!$this->config->get('module_bonus_reward_status')) {
			$json['error'] = $this->language->get('error_status');
		}

		if (!$json) {
			$day_start = $this->config->get('module_bonus_reward_day_start');
			$day_end = $this->config->get('module_bonus_reward_day_end');
			$day_warning = $this->config->get('module_bonus_reward_day_warning');
			$date_enable = $this->config->get('module_bonus_reward_date_enable');

			$reward_added = 0;
			$reward_removed = 0;
			$order_reward_removed = 0;
			$reward_warning = 0;

			$current_date = date('Y-m-d');

			$this->load->model('extension/module/bonus_reward');

			$orders = $this->model_extension_module_bonus_reward->getOrders($date_enable);

			$this->load->model('account/order');

			foreach ($orders as $order) {
				$data = [
					'customer_id'	 => $order['customer_id'],
					'order_id'		 => $order['order_id'],
					'points'		 => 0,
					'subject'		 => '',
					'message'		 => ''
				];

				$total_points = $this->model_extension_module_bonus_reward->getTotalCustomerRewardsByOrderId($order['order_id']);

				if (!in_array($order['order_status_id'], $this->config->get('config_complete_status'))) {
					if ($total_points > 0) {
						$data['points']		 = -$total_points;
						$data['subject']	 = $this->config->get('module_bonus_reward_remove_subject');
						$data['message']	 = $this->config->get('module_bonus_reward_remove_message');

						$this->model_extension_module_bonus_reward->addReward($order['customer_id'], sprintf($this->language->get('text_remove_for_order'), $order['order_id']), -$total_points, $order['order_id']);

						if (!empty($this->config->get('module_bonus_reward_remove_subject')) && !empty($this->config->get('module_bonus_reward_remove_message'))) {
							$this->model_extension_module_bonus_reward->sendBonusRewardEmail($data);
						}

						$order_reward_removed++;
					}
				} else {
					$bonus_start_date = date('Y-m-d', strtotime("+$day_start days", strtotime($order['date_modified'])));

					$products = $this->model_account_order->getOrderProducts($order['order_id']);
					$reward = 0;

					foreach ($products as $product) {
						$reward += $product['reward'];
					}

					if ($current_date >= $bonus_start_date) {
						if ($reward > 0 && $total_points == 0) {
							$data['points']		 = $reward;
							$data['subject']	 = $this->config->get('module_bonus_reward_order_subject');
							$data['message']	 = $this->config->get('module_bonus_reward_order_message');

							$this->model_extension_module_bonus_reward->addReward($order['customer_id'], sprintf($this->language->get('text_add_for_order'), $order['order_id']), $reward, $order['order_id']);

							if (!empty($this->config->get('module_bonus_reward_order_subject')) && !empty($this->config->get('module_bonus_reward_order_message'))) {
								$this->model_extension_module_bonus_reward->sendBonusRewardEmail($data);
							}

							$reward_added++;
						}
					}
				}
			}

			$customers = $this->model_extension_module_bonus_reward->getCustomers();

			foreach($customers as $customer) {
				$customer_rewards = $this->model_extension_module_bonus_reward->getCustomerRewards($customer['customer_id']);
				$current_points = $this->model_extension_module_bonus_reward->getCustomerTotalPoints($customer['customer_id']);

				$total_removed_reward = 0;
				$total_warning_reward = 0;

				foreach($customer_rewards as $customer_reward){
					$bonus_end_date = date('Y-m-d', strtotime("+$day_end days", strtotime($customer_reward['date_added'])));
					$warning_date = date('Y-m-d', strtotime("-$day_warning days", strtotime($bonus_end_date)));

					if (!$customer_reward['expired'] && $customer_reward['points'] > 0 && $current_date >= $bonus_end_date && $customer_reward['date_added'] > $date_enable && $day_end != 0) {
						$total_removed_reward += $customer_reward['points'];
						$this->model_extension_module_bonus_reward->markRewardAsExpired($customer_reward['customer_reward_id']);
					}

					if ($current_date >= $warning_date && $current_date < $bonus_end_date && $customer_reward['date_added'] > $date_enable && $day_warning != 0) {
						$total_warning_reward += $customer_reward['points'];
					}
				}

				$data = [
					'customer_id'	 => $customer['customer_id'],
					'points'		 => 0,
					'subject'		 => '',
					'message'		 => ''
				];

				$points_to_remove = min($total_removed_reward, $current_points);

				if ($points_to_remove > 0 && $day_end != 0) {
					$data['points']		 = -$points_to_remove;
					$data['subject']	 = $this->config->get('module_bonus_reward_remove_subject');
					$data['message']	 = $this->config->get('module_bonus_reward_remove_message');

					$this->model_extension_module_bonus_reward->addReward($customer['customer_id'], $this->language->get('text_reward_expired'), -$points_to_remove, 0);

					if (!empty($this->config->get('module_bonus_reward_remove_subject')) && !empty($this->config->get('module_bonus_reward_remove_message'))) {
						$this->model_extension_module_bonus_reward->sendBonusRewardEmail($data);
					}

					$reward_removed++;
				}

				if ($total_warning_reward > 0 && $day_warning != 0) {
					$data['points']		 = $total_warning_reward;
					$data['subject']	 = $this->config->get('module_bonus_reward_warning_subject');
					$data['message']	 = $this->config->get('module_bonus_reward_warning_message');

					if (!empty($this->config->get('module_bonus_reward_warning_subject')) && !empty($this->config->get('module_bonus_reward_warning_message'))) {
						$this->model_extension_module_bonus_reward->sendBonusRewardEmail($data);
					}

					$reward_warning++;
				}
			}

			$json['success'] = sprintf($this->language->get('text_reward_summary'), $reward_added, $order_reward_removed, $reward_removed, $reward_warning);
		}
		return $json;
	}
}