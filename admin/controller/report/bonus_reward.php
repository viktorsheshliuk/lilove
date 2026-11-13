<?php
class ControllerReportBonusReward extends Controller {
	public function index() {
		$this->load->language('report/bonus_reward');

		$this->document->setTitle($this->language->get('heading_title'));

		if (isset($this->request->get['filter_customer'])) {
			$filter_customer = $this->request->get['filter_customer'];
		} else {
			$filter_customer = '';
		}

		if (isset($this->request->get['filter_type'])) {
			$filter_type = $this->request->get['filter_type'];
		} else {
			$filter_type = '';
		}

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}
		
		$url = '';

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . urlencode(html_entity_decode($this->request->get['filter_type'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('report/bonus_reward', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['refresh'] = $this->url->link('report/bonus_reward', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$this->load->model('report/bonus_reward');
		$this->load->model('customer/customer');

		$data['rewards'] = array();

		$filter_data = array(
			'filter_customer'	 => $filter_customer,
			'filter_type'		 => $filter_type,
			'start'				 => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'				 => $this->config->get('config_limit_admin')
		);

		$reward_total = $this->model_report_bonus_reward->getTotalReward($filter_data);

		$results = $this->model_report_bonus_reward->getCustomerReward($filter_data);

		foreach ($results as $result) {
			$customer_info = $this->model_customer_customer->getCustomer($result['customer_id']);

			$data['rewards'][] = array(
				'customer_id'	 => $result['customer_id'],
				'customer'		 => $customer_info['firstname'] . ' ' . $customer_info['lastname'],
				'description'	 => $result['description'],
				'points'		 => $result['points'],
				'date_added'	 => date($this->language->get('datetime_format'), strtotime($result['date_added']))
			);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$url = '';

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode($this->request->get['filter_customer']);
		}

		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . urlencode($this->request->get['filter_type']);
		}

		$pagination = new Pagination();
		$pagination->total = $reward_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('report/bonus_reward', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($reward_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($reward_total - $this->config->get('config_limit_admin'))) ? $reward_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $reward_total, ceil($reward_total / $this->config->get('config_limit_admin')));

		$data['filter_customer'] = $filter_customer;
		$data['filter_type'] = $filter_type;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('report/bonus_reward', $data));
	}
}