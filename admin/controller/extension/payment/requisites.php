<?php
class ControllerExtensionPaymentRequisites extends Controller
{
    public function index()
    {
		$this->load->language('extension/payment/requisites');
		$this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			$this->model_setting_setting->editSetting('payment_requisites', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}
        
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/requisites', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/requisites', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

        $data['payment_requisites'] = array();

        if (isset($this->request->post['payment_requisites_requisites'])) {
			$data['payment_requisites_requisites'] = $this->request->post['payment_requisites_requisites'];
		} else {
			$data['payment_requisites_requisites'] = $this->config->get('payment_requisites_requisites');
		}

        if (isset($this->request->post['payment_requisites_status'])) {
			$data['payment_requisites_status'] = $this->request->post['payment_requisites_status'];
		} else {
			$data['payment_requisites_status'] = $this->config->get('payment_requisites_status');
		}

        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/requisites', $data));
    }
}