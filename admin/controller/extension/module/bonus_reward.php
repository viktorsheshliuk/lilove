<?php
class ControllerExtensionModuleBonusReward extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/bonus_reward');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_bonus_reward', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/bonus_reward', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/bonus_reward', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/bonus_reward', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->post['module_bonus_reward_status'])) {
			$data['module_bonus_reward_status'] = $this->request->post['module_bonus_reward_status'];
		} else {
			$data['module_bonus_reward_status'] = $this->config->get('module_bonus_reward_status');
		}

		if (isset($this->request->post['module_bonus_reward_method'])) {
			$data['module_bonus_reward_method'] = $this->request->post['module_bonus_reward_method'];
		} else {
			$data['module_bonus_reward_method'] = $this->config->get('module_bonus_reward_method');
		}

		if (isset($this->request->post['module_bonus_reward_cron'])) {
			$data['module_bonus_reward_cron'] = $this->request->post['module_bonus_reward_cron'];
		} else {
			$data['module_bonus_reward_cron'] = $this->config->get('module_bonus_reward_cron');
		}

		if (isset($this->request->post['module_bonus_reward_cron_key'])) {
			$data['module_bonus_reward_cron_key'] = $this->request->post['module_bonus_reward_cron_key'];
		} else {
			$data['module_bonus_reward_cron_key'] = $this->config->get('module_bonus_reward_cron_key');
		}

		if (isset($this->request->post['module_bonus_reward_day_start'])) {
			$data['module_bonus_reward_day_start'] = $this->request->post['module_bonus_reward_day_start'];
		} else {
			$data['module_bonus_reward_day_start'] = $this->config->get('module_bonus_reward_day_start');
		}

		if (isset($this->request->post['module_bonus_reward_date_enable'])) {
			$data['module_bonus_reward_date_enable'] = $this->request->post['module_bonus_reward_date_enable'];
		} else {
			$data['module_bonus_reward_date_enable'] = $this->config->get('module_bonus_reward_date_enable');
		}

		if (isset($this->request->post['module_bonus_reward_day_end'])) {
			$data['module_bonus_reward_day_end'] = $this->request->post['module_bonus_reward_day_end'];
		} else {
			$data['module_bonus_reward_day_end'] = $this->config->get('module_bonus_reward_day_end');
		}

		if (isset($this->request->post['module_bonus_reward_limit'])) {
			$data['module_bonus_reward_limit'] = $this->request->post['module_bonus_reward_limit'];
		} else {
			$data['module_bonus_reward_limit'] = $this->config->get('module_bonus_reward_limit');
		}

		if (isset($this->request->post['module_bonus_reward_special_status'])) {
			$data['module_bonus_reward_special_status'] = $this->request->post['module_bonus_reward_special_status'];
		} else {
			$data['module_bonus_reward_special_status'] = $this->config->get('module_bonus_reward_special_status');
		}

		if (isset($this->request->post['module_bonus_reward_option_status'])) {
			$data['module_bonus_reward_option_status'] = $this->request->post['module_bonus_reward_option_status'];
		} else {
			$data['module_bonus_reward_option_status'] = $this->config->get('module_bonus_reward_option_status');
		}

		if (isset($this->request->post['module_bonus_reward_special_limit'])) {
			$data['module_bonus_reward_special_limit'] = $this->request->post['module_bonus_reward_special_limit'];
		} else {
			$data['module_bonus_reward_special_limit'] = $this->config->get('module_bonus_reward_special_limit');
		}

		if (isset($this->request->post['module_bonus_reward_product_if_special'])) {
			$data['module_bonus_reward_product_if_special'] = $this->request->post['module_bonus_reward_product_if_special'];
		} else {
			$data['module_bonus_reward_product_if_special'] = $this->config->get('module_bonus_reward_product_if_special');
		}

		if (isset($this->request->post['module_bonus_reward_coupon_limit'])) {
			$data['module_bonus_reward_coupon_limit'] = $this->request->post['module_bonus_reward_coupon_limit'];
		} else {
			$data['module_bonus_reward_coupon_limit'] = $this->config->get('module_bonus_reward_coupon_limit');
		}

		if (isset($this->request->post['module_bonus_reward_product_if_coupon'])) {
			$data['module_bonus_reward_product_if_coupon'] = $this->request->post['module_bonus_reward_product_if_coupon'];
		} else {
			$data['module_bonus_reward_product_if_coupon'] = $this->config->get('module_bonus_reward_product_if_coupon');
		}

		if (isset($this->request->post['module_bonus_reward_voucher_limit'])) {
			$data['module_bonus_reward_voucher_limit'] = $this->request->post['module_bonus_reward_voucher_limit'];
		} else {
			$data['module_bonus_reward_voucher_limit'] = $this->config->get('module_bonus_reward_voucher_limit');
		}

		if (isset($this->request->post['module_bonus_reward_product_if_voucher'])) {
			$data['module_bonus_reward_product_if_voucher'] = $this->request->post['module_bonus_reward_product_if_voucher'];
		} else {
			$data['module_bonus_reward_product_if_voucher'] = $this->config->get('module_bonus_reward_product_if_voucher');
		}

		if (isset($this->request->post['module_bonus_reward_reward_limit'])) {
			$data['module_bonus_reward_reward_limit'] = $this->request->post['module_bonus_reward_reward_limit'];
		} else {
			$data['module_bonus_reward_reward_limit'] = $this->config->get('module_bonus_reward_reward_limit');
		}

		if (isset($this->request->post['module_bonus_reward_min_cart_price'])) {
			$data['module_bonus_reward_min_cart_price'] = $this->request->post['module_bonus_reward_min_cart_price'];
		} else {
			$data['module_bonus_reward_min_cart_price'] = $this->config->get('module_bonus_reward_min_cart_price');
		}

		if (isset($this->request->post['module_bonus_reward_max_cart_price'])) {
			$data['module_bonus_reward_max_cart_price'] = $this->request->post['module_bonus_reward_max_cart_price'];
		} else {
			$data['module_bonus_reward_max_cart_price'] = $this->config->get('module_bonus_reward_max_cart_price');
		}

		if (isset($this->request->post['module_bonus_reward_cart_percent'])) {
			$data['module_bonus_reward_cart_percent'] = $this->request->post['module_bonus_reward_cart_percent'];
		} else {
			$data['module_bonus_reward_cart_percent'] = $this->config->get('module_bonus_reward_cart_percent');
		}

		if (isset($this->request->post['module_bonus_reward_calculation_source'])) {
			$data['module_bonus_reward_calculation_source'] = $this->request->post['module_bonus_reward_calculation_source'];
		} else {
			$data['module_bonus_reward_calculation_source'] = $this->config->get('module_bonus_reward_calculation_source');
		}

		if (isset($this->request->post['module_bonus_reward_category_method'])) {
			$data['module_bonus_reward_category_method'] = $this->request->post['module_bonus_reward_category_method'];
		} else {
			$data['module_bonus_reward_category_method'] = $this->config->get('module_bonus_reward_category_method');
		}

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		$this->load->model('catalog/category');

		$categories = $this->model_catalog_category->getCategories();

		$data['categories'] = [];
		foreach ($categories as $category) {
			$data['categories'][$category['category_id']] = $category['name'];
		}

		if (isset($this->request->post['module_bonus_reward_category'])) {
			$data['module_bonus_reward_category'] = $this->request->post['module_bonus_reward_category'];
		} elseif ($this->config->get('module_bonus_reward_category')) {
			$data['module_bonus_reward_category'] = $this->config->get('module_bonus_reward_category');
		} else {
			$data['module_bonus_reward_category'] = [];
		}

		$this->load->model('catalog/manufacturer');

		$manufacturers = $this->model_catalog_manufacturer->getManufacturers();

		$data['manufacturers'] = [];
		foreach ($manufacturers as $manufacturer) {
			$data['manufacturers'][$manufacturer['manufacturer_id']] = $manufacturer['name'];
		}

		if (isset($this->request->post['module_bonus_reward_manufacturer'])) {
			$data['module_bonus_reward_manufacturer'] = $this->request->post['module_bonus_reward_manufacturer'];
		} elseif ($this->config->get('module_bonus_reward_manufacturer')) {
			$data['module_bonus_reward_manufacturer'] = $this->config->get('module_bonus_reward_manufacturer');
		} else {
			$data['module_bonus_reward_manufacturer'] = [];
		}

		if (isset($this->request->post['module_bonus_reward_register'])) {
			$data['module_bonus_reward_register'] = $this->request->post['module_bonus_reward_register'];
		} else {
			$data['module_bonus_reward_register'] = $this->config->get('module_bonus_reward_register');
		}

		if (isset($this->request->post['module_bonus_reward_comment'])) {
			$data['module_bonus_reward_comment'] = $this->request->post['module_bonus_reward_comment'];
		} else {
			$data['module_bonus_reward_comment'] = $this->config->get('module_bonus_reward_comment');
		}

		if (isset($this->request->post['module_bonus_reward_newsletter'])) {
			$data['module_bonus_reward_newsletter'] = $this->request->post['module_bonus_reward_newsletter'];
		} else {
			$data['module_bonus_reward_newsletter'] = $this->config->get('module_bonus_reward_newsletter');
		}

		if (isset($this->request->post['module_bonus_reward_register_subject'])) {
			$data['module_bonus_reward_register_subject'] = $this->request->post['module_bonus_reward_register_subject'];
		} else {
			$data['module_bonus_reward_register_subject'] = $this->config->get('module_bonus_reward_register_subject');
		}

		if (isset($this->request->post['module_bonus_reward_register_message'])) {
			$data['module_bonus_reward_register_message'] = $this->request->post['module_bonus_reward_register_message'];
		} else {
			$data['module_bonus_reward_register_message'] = $this->config->get('module_bonus_reward_register_message');
		}

		if (isset($this->request->post['module_bonus_reward_review_subject'])) {
			$data['module_bonus_reward_review_subject'] = $this->request->post['module_bonus_reward_review_subject'];
		} else {
			$data['module_bonus_reward_review_subject'] = $this->config->get('module_bonus_reward_review_subject');
		}

		if (isset($this->request->post['module_bonus_reward_review_message'])) {
			$data['module_bonus_reward_review_message'] = $this->request->post['module_bonus_reward_review_message'];
		} else {
			$data['module_bonus_reward_review_message'] = $this->config->get('module_bonus_reward_review_message');
		}

		if (isset($this->request->post['module_bonus_reward_newsletter_subject'])) {
			$data['module_bonus_reward_newsletter_subject'] = $this->request->post['module_bonus_reward_newsletter_subject'];
		} else {
			$data['module_bonus_reward_newsletter_subject'] = $this->config->get('module_bonus_reward_newsletter_subject');
		}

		if (isset($this->request->post['module_bonus_reward_newsletter_message'])) {
			$data['module_bonus_reward_newsletter_message'] = $this->request->post['module_bonus_reward_newsletter_message'];
		} else {
			$data['module_bonus_reward_newsletter_message'] = $this->config->get('module_bonus_reward_newsletter_message');
		}

		if (isset($this->request->post['module_bonus_reward_order_subject'])) {
			$data['module_bonus_reward_order_subject'] = $this->request->post['module_bonus_reward_order_subject'];
		} else {
			$data['module_bonus_reward_order_subject'] = $this->config->get('module_bonus_reward_order_subject');
		}

		if (isset($this->request->post['module_bonus_reward_order_message'])) {
			$data['module_bonus_reward_order_message'] = $this->request->post['module_bonus_reward_order_message'];
		} else {
			$data['module_bonus_reward_order_message'] = $this->config->get('module_bonus_reward_order_message');
		}

		if (isset($this->request->post['module_bonus_reward_day_warning'])) {
			$data['module_bonus_reward_day_warning'] = $this->request->post['module_bonus_reward_day_warning'];
		} else {
			$data['module_bonus_reward_day_warning'] = $this->config->get('module_bonus_reward_day_warning');
		}

		if (isset($this->request->post['module_bonus_reward_warning_subject'])) {
			$data['module_bonus_reward_warning_subject'] = $this->request->post['module_bonus_reward_warning_subject'];
		} else {
			$data['module_bonus_reward_warning_subject'] = $this->config->get('module_bonus_reward_warning_subject');
		}

		if (isset($this->request->post['module_bonus_reward_warning_message'])) {
			$data['module_bonus_reward_warning_message'] = $this->request->post['module_bonus_reward_warning_message'];
		} else {
			$data['module_bonus_reward_warning_message'] = $this->config->get('module_bonus_reward_warning_message');
		}

		if (isset($this->request->post['module_bonus_reward_remove_subject'])) {
			$data['module_bonus_reward_remove_subject'] = $this->request->post['module_bonus_reward_remove_subject'];
		} else {
			$data['module_bonus_reward_remove_subject'] = $this->config->get('module_bonus_reward_remove_subject');
		}

		if (isset($this->request->post['module_bonus_reward_remove_message'])) {
			$data['module_bonus_reward_remove_message'] = $this->request->post['module_bonus_reward_remove_message'];
		} else {
			$data['module_bonus_reward_remove_message'] = $this->config->get('module_bonus_reward_remove_message');
		}

		$data['cron_url'] = HTTP_CATALOG . 'index.php?route=extension/module/bonus_reward&key=' . $this->config->get('module_bonus_reward_cron_key');
		$data['wget_url'] = 'wget -q -O- "' . HTTP_CATALOG . 'index.php?route=extension/module/bonus_reward&key=' . $this->config->get('module_bonus_reward_cron_key') . '"';

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/bonus_reward', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/bonus_reward')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function install() {
		$this->load->model('extension/module/bonus_reward');
		$this->model_extension_module_bonus_reward->install();
	}

	public function uninstall() {
		$this->load->model('extension/module/bonus_reward');
		$this->model_extension_module_bonus_reward->uninstall();
	}

	public function addRewardToProducts() {
		$this->load->language('extension/module/bonus_reward');

		$json = array();

		if (!$this->validate()) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$this->config->get('module_bonus_reward_status')) {
			$json['error'] = $this->language->get('error_status');
		}

		if ($this->config->get('module_bonus_reward_calculation_source') == 'category' && empty($this->config->get('module_bonus_reward_category'))) {
			$json['error'] = $this->language->get('error_category');
		}

		if ($this->config->get('module_bonus_reward_calculation_source') == 'manufacturer' && empty($this->config->get('module_bonus_reward_manufacturer'))) {
			$json['error'] = $this->language->get('error_manufacturer');
		}

		if ($this->config->get('module_bonus_reward_calculation_source') == 'category') {
			$source_id = isset($this->request->get['category_id']) ? (int)$this->request->get['category_id'] : 0;
		} else {
			$source_id = isset($this->request->get['manufacturer_id']) ? (int)$this->request->get['manufacturer_id'] : 0;
		}

		$position = isset($this->request->get['position']) ? (int)$this->request->get['position'] : 0;

		if (!$json) {
			$this->load->model('extension/module/bonus_reward');

			$limit = $this->config->get('module_bonus_reward_limit');
			$source = $this->config->get('module_bonus_reward_calculation_source');
			$setting = $this->config->get('module_bonus_reward_' . $this->config->get('module_bonus_reward_calculation_source'));

			$source_ids = array_keys($setting);

			if ($source_id == 0) {
				$source_id = $source_ids[0];
			}

			$config = $setting[$source_id];

			if ($this->config->get('module_bonus_reward_calculation_source') == 'category') {
				$main_category = $this->config->get('module_bonus_reward_category_method');

				$products = $this->model_extension_module_bonus_reward->getAvailableProductsByCategory($source_id, $main_category);

				$total_products = $this->model_extension_module_bonus_reward->getTotalAvailableProductsByCategory($source_id, $main_category);
			} else {
				$products = $this->model_extension_module_bonus_reward->getAvailableProductsByManufacturer($source_id);

				$total_products = $this->model_extension_module_bonus_reward->getTotalAvailableProductsByManufacturer($source_id);
			}

			$json['total'] = $total_products ? round(($position / $total_products) * 100) : 0;

			$special_status = (int)$this->config->get('module_bonus_reward_special_status');

			$option_status = (int)$this->config->get('module_bonus_reward_option_status');

			for ($i = $position; $i < $total_products && $i < $position + $limit; $i++) {
				$product = $products[$i];
				$product_id = $product['product_id'];

				$product_options = $this->model_extension_module_bonus_reward->getProductOptions($product_id);

				if ($product_options && $option_status) {
					foreach ($product_options as $option) {
						$data_options = [
							'product_option_value_id' => $option['product_option_value_id'],
							'points_prefix'           => $option['price_prefix'],
							'points'                  => ($option['price_prefix'] == '-') ? $option['price_prefix'] . (int)($option['price'] * (float)$config['coefficient']) : (int)($option['price'] * (float)$config['coefficient'])
						];
	
						$this->model_extension_module_bonus_reward->updateProductOptionReward($product_id, $data_options);
					}
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

			if ($position + $limit < $total_products) {
				$position += $limit;
				$json['next'] = str_replace('&amp;', '&', $this->url->link('extension/module/bonus_reward/addRewardToProducts','user_token=' . $this->session->data['user_token'] . '&' . $source . '_id=' . $source_id . '&position=' . $position,true));
			} else {
				$next_source_index = array_search($source_id, $source_ids) + 1;
				$next_source_id = $source_ids[$next_source_index] ?? 0;
				if ($next_source_id !== 0) {
					$json['next'] = str_replace('&amp;', '&', $this->url->link('extension/module/bonus_reward/addRewardToProducts','user_token=' . $this->session->data['user_token'] . '&' . $source . '_id=' . $next_source_id . '&position=0',true));
				} else {
					$json['total'] = 100;
					$json['success'] = $this->language->get('text_add_success');
				}
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function removeRewardToProducts() {
		$this->load->language('extension/module/bonus_reward');

		$json = array();

		if (!$this->validate()) {
			$json['error'] = $this->language->get('error_permission');
		}

		if ($this->config->get('module_bonus_reward_status') == 0 || empty($this->config->get('module_bonus_reward_status'))) {
			$json['error'] = $this->language->get('error_status');
		}

		if (!$json) {
			$this->load->model('extension/module/bonus_reward');

			$this->model_extension_module_bonus_reward->updateAllProductPoints();
			$this->model_extension_module_bonus_reward->updateAllOptionProductPoints();
			$this->model_extension_module_bonus_reward->deleteAllProductRewards();

			$json['success'] = $this->language->get('text_remove_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function updateRewardToCustomers() {
		$this->load->language('extension/module/bonus_reward');

		$json = array();

		if (!$this->validate()) {
			$json['error'] = $this->language->get('error_permission');
		}

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

			$this->load->model('sale/order');
			$this->load->model('customer/customer');

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

					$products = $this->model_sale_order->getOrderProducts($order['order_id']);
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

			$customers = $this->model_customer_customer->getCustomers();

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

					$this->model_customer_customer->addReward($customer['customer_id'], $this->language->get('text_reward_expired'), -$points_to_remove, 0);

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

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}