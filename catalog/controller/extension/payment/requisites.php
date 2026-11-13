<?php
class ControllerExtensionPaymentRequisites extends Controller
{
    public function index()
    {
        $this->load->language('extension/payment/requisites');
        return $this->load->view('extension/payment/requisites', []);
    }

    public function confirm() {
		$json = array();
		
		if ($this->session->data['payment_method']['code'] == 'requisites') {
			$this->load->language('extension/payment/requisites');

			$this->load->model('checkout/order');

			$comment  = $this->language->get('text_instruction') . "\n\n";
			$comment .= $this->config->get('payment_requisites_requisites') . "\n\n";
//var_dump($comment);
//var_dump($this->session->data['order_id']);
//die();
			//$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_bank_transfer_order_status_id'), $comment, true);
			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], 18, $comment, true); //18 - ждем оплату
		
			$json['redirect'] = $this->url->link('checkout/success');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));		
	}
}