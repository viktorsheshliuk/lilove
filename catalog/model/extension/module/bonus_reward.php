<?php
class ModelExtensionModuleBonusReward extends Model {

	public function updateRewardForNewsletter ($customer_id, $status) {
		$this->load->language('extension/module/bonus_reward');

		$points = $this->config->get('module_bonus_reward_newsletter');
		$bonus_reward_status = $this->config->get('module_bonus_reward_status');

		if (empty($points) || empty($bonus_reward_status)) {
			return;
		}

		$this->load->model('account/customer');

		$customer_info = $this->model_account_customer->getCustomer($customer_id);

		if (!$customer_info || $customer_info['newsletter'] == $status) {
			return;
		}

		$data = [
			'customer_id'	 => $customer_id,
			'points'		 => 0,
			'description'	 => '',
			'subject'		 => '',
			'message'		 => ''
		];

		$total_points = $this->getTotalPointsByNewsletterId($customer_id);

		if (!$status && $total_points > 0) {
			$data['description']	 = $this->language->get('text_remove_for_newsletter');
			$data['points']			 = -$points;
			$data['subject']		 = $this->config->get('module_bonus_reward_remove_subject');
			$data['message']		 = $this->config->get('module_bonus_reward_remove_message');

			$this->addRewardForNewsletter($data);

			if (!empty($this->config->get('module_bonus_reward_remove_subject')) && !empty($this->config->get('module_bonus_reward_remove_message'))) {
				$this->sendBonusRewardEmail($data);
			}
		}

		if ($status && $total_points <= 0) {
			$data['description']	 = $this->language->get('text_add_for_newsletter');
			$data['points']			 = $points;
			$data['subject']		 = $this->config->get('module_bonus_reward_newsletter_subject');
			$data['message']		 = $this->config->get('module_bonus_reward_newsletter_message');

			$this->addRewardForNewsletter($data);

			if (!empty($this->config->get('module_bonus_reward_newsletter_subject')) && !empty($this->config->get('module_bonus_reward_newsletter_subject'))) {
				$this->sendBonusRewardEmail($data);
			}
		}
	}

	public function updateRewardForRegister ($customer_id, $newsletter) {

		$this->load->language('extension/module/bonus_reward');

		$register_points = $this->config->get('module_bonus_reward_register');
		$bonus_reward_status = $this->config->get('module_bonus_reward_status');

		if (empty($register_points) || empty($bonus_reward_status)) {
			return;
		}

		$this->load->model('account/customer');

		$customer_info = $this->model_account_customer->getCustomer($customer_id);

		if (!$customer_info) {
			return;
		}

		$data_register = [
			'customer_id'	 => $customer_id,
			'points'		 => $register_points,
			'description'	 => $this->language->get('text_add_for_register'),
			'subject'		 => $this->config->get('module_bonus_reward_register_subject'),
			'message'		 => $this->config->get('module_bonus_reward_register_message')
		];

		$this->addRewardForRegister($data_register);

		if (!empty($this->config->get('module_bonus_reward_register_subject')) && !empty($this->config->get('module_bonus_reward_register_message'))) {
			$this->sendBonusRewardEmail($data_register);
		}

		$newsletter_points = $this->config->get('module_bonus_reward_newsletter');

		if (empty($newsletter_points) || !$newsletter) {
			return;
		}

		$data_newsletter = [
			'customer_id'	 => $customer_id,
			'points'		 => $newsletter_points,
			'description'	 => $this->language->get('text_add_for_newsletter'),
			'subject'		 => $this->config->get('module_bonus_reward_newsletter_subject'),
			'message'		 => $this->config->get('module_bonus_reward_newsletter_message')
		];

		$this->addRewardForNewsletter($data_newsletter);

		if (!empty($this->config->get('module_bonus_reward_newsletter_subject')) && !empty($this->config->get('module_bonus_reward_newsletter_message'))) {
			$this->sendBonusRewardEmail($data_newsletter);
		}
	}

	public function addRewardForNewsletter($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_reward SET customer_id = '" . (int)$data['customer_id'] . "', points = '" . (int)$data['points'] . "', description = '" . $this->db->escape($data['description']) . "', newsletter_id = '" . (int)$data['customer_id'] . "', date_added = NOW()");
	}

	public function addRewardForRegister($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_reward SET customer_id = '" . (int)$data['customer_id'] . "', points = '" . (int)$data['points'] . "', description = '" . $this->db->escape($data['description']) . "', date_added = NOW()");

		return true;
	}

	public function getTotalPointsByNewsletterId($newsletter_id) {
		$query = $this->db->query("SELECT SUM(points) as total FROM " . DB_PREFIX . "customer_reward WHERE newsletter_id = '" . (int)$newsletter_id . "'");

		return $query->row['total'];
	}

	public function sendBonusRewardEmail($data) {
		$this->load->model('account/customer');

		$customer_info = $this->model_account_customer->getCustomer($data['customer_id']);

		$message = str_replace(
			['{firstname}', '{lastname}', '{points}'],
			[$customer_info['firstname'], $customer_info['lastname'], $data['points']],
			$data['message']
		);

		if ($customer_info) {
			$mail = new Mail($this->config->get('config_mail_engine'));
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
			$mail->smtp_username = $this->config->get('config_mail_smtp_username');
			$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
			$mail->smtp_port = $this->config->get('config_mail_smtp_port');
			$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

			$mail->setTo($customer_info['email']);
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
			$mail->setSubject(html_entity_decode($data['subject'], ENT_QUOTES, 'UTF-8'));
			$mail->setHtml(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
			$mail->send();
		}
	}

	public function getAvailableProductsByCategory($category_id, $main_category) {
		$sql = "SELECT p.product_id, p.price FROM " . DB_PREFIX . "product p JOIN " . DB_PREFIX . "product_to_category p2c ON p.product_id = p2c.product_id WHERE p2c.category_id = '" . (int)$category_id . "' AND p.quantity > 0 AND p.status = 1";
		
		if ($main_category) {
			$sql .= " AND p2c.main_category = 1";
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalAvailableProductsByCategory($category_id, $main_category) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product p JOIN " . DB_PREFIX . "product_to_category p2c ON p.product_id = p2c.product_id WHERE p2c.category_id = '" . (int)$category_id . "' AND p.quantity > 0 AND p.status = 1";

		if ($main_category) {
			$sql .= " AND p2c.main_category = 1";
		}

		$query = $this->db->query($sql);

		return (int)$query->row['total'];
	}

	public function getAvailableProductsByManufacturer($manufacturer_id) {
		$sql = "SELECT product_id, price FROM " . DB_PREFIX . "product WHERE manufacturer_id = '" . (int)$manufacturer_id . "' AND quantity > 0 AND status = 1";
		
		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalAvailableProductsByManufacturer($manufacturer_id) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product WHERE manufacturer_id = '" . (int)$manufacturer_id . "' AND quantity > 0 AND status = 1";

		$query = $this->db->query($sql);

		return (int)$query->row['total'];
	}

	public function getProductOptions($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");

		return $query->rows;
	}

	public function getProductSpecial($product_id, $customer_group_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority, price LIMIT 1");

		return $query->row;
	}

	public function updateProductPoints($product_id, $points) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET points = '" . (int)$points . "' WHERE product_id = '" . (int)$product_id . "'");
	}

	public function addProductReward($product_id, $points, $customer_group_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "'");

		if ($query->num_rows > 0) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_reward SET points = '" . (int)$points . "' WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_reward SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$customer_group_id . "', points = '" . (int)$points . "'");
		}
	}

	public function updateProductOptionReward($product_id, $data) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET points = '" . (int)$data['points'] . "', points_prefix = '" . $this->db->escape($data['points_prefix']) . "' WHERE product_id = '" . (int)$product_id . "' AND product_option_value_id = '" . (int)$data['product_option_value_id'] . "'");
	}

	public function getOrders($date) {
		$sql = "SELECT * FROM " . DB_PREFIX . "order WHERE customer_id > 0";

		if ($date != '0000-00-00') {
			$sql .= " AND date_modified > '" . $this->db->escape($date) . "'";
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalCustomerRewardsByOrderId($order_id) {
		$query = $this->db->query("SELECT SUM(points) AS total FROM " . DB_PREFIX . "customer_reward WHERE order_id = '" . (int)$order_id . "' AND cron_order_id = '" . (int)$order_id . "'");

		return $query->row['total'];
	}

	public function getCustomerRewards($customer_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_reward WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->rows;
	}

	public function getCustomerTotalPoints($customer_id) {
		$query = $this->db->query("SELECT SUM(points) AS total FROM " . DB_PREFIX . "customer_reward WHERE customer_id = '" . (int)$customer_id . "'");
		
		return (int)$query->row['total'];
	}

	public function addReward($customer_id, $description = '', $points = '', $order_id = 0) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_reward SET customer_id = '" . (int)$customer_id . "', order_id = '" . (int)$order_id . "', cron_order_id = '" . (int)$order_id . "', points = '" . (int)$points . "', description = '" . $this->db->escape($description) . "', date_added = NOW()");
	}

	public function getCustomers($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer");

		return $query->rows;
	}

	public function markRewardAsExpired($customer_reward_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer_reward SET expired = 1 WHERE customer_reward_id = '" . (int)$customer_reward_id . "'");
	}

	public function getProductCategory($product_id, $main_category) {
		$sql = "SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'";

		if ($main_category) {
			$sql .= " AND main_category = 1";
		}

		$sql .= " ORDER BY category_id DESC LIMIT 1";

		$query = $this->db->query($sql);

		return $query->row['category_id'];
	}
}
