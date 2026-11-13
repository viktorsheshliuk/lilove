<?php
class ControllerExtensionPaymentCod extends Controller {
	public function index() {
		return $this->load->view('extension/payment/cod');
	}

	// public function confirm() {
	// 	$json = array();
		
	// 	if ($this->session->data['payment_method']['code'] == 'cod') {
	// 		$this->load->model('checkout/order');

	// 		$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_cod_order_status_id'));
		
	// 		$json['redirect'] = $this->url->link('checkout/success');
	// 	}
		
	// 	$this->response->addHeader('Content-Type: application/json');
	// 	$this->response->setOutput(json_encode($json));		
	// }

	public function confirm() {
		require_once DIR_SYSTEM . 'library/mono_pay/mono_pay.php';

	    $this->load->model('checkout/order');
	    $this->load->model('extension/payment/mono_pay');
	    $this->load->language('extension/payment/mono_pay');

	    $order_id = $this->session->data['order_id'];
	    
	    // 1. Устанавливаем начальный статус "Обрабатывается менеджером"
	    $this->model_checkout_order->addOrderHistory($order_id, 8);

	    // 2. Формируем запрос в MonoPay на 150 грн (15000 копеек)
	    $mono_pay = new MonoPay(); // Убедитесь, что класс доступен
	    $mono_pay->setSecretKey($this->config->get('payment_mono_pay_token'));
	    
	    $server = $this->request->server['HTTPS'] ? $this->config->get('config_ssl') : $this->config->get('config_url');

	    $prepaid_cost = (int)$this->config->get('config_prepaid_cost');
	    
	    $api_data = array(
	        'amount'           => $prepaid_cost * 100, //15000, 
	        'ccy'              => 980,
	        'merchantPaymInfo' => array(
	            'reference'   => (string)$order_id,
	            'destination' => 'Передоплата ' . $prepaid_cost . ' грн до замовлення #' . $order_id,
	        ),
	        'redirectUrl'      => $server . 'index.php?route=extension/payment/mono_pay/response&orderid=' . $order_id,
	        'webHookUrl'       => $server . 'index.php?route=extension/payment/mono_pay/callback',
	        'api_uri'          => 'invoice/create',
	    );

	    $result_data = $mono_pay->getInvoice($api_data);

	    if(!empty($result_data['pageUrl'])) {
	        // Сохраняем информацию об инвойсе в таблицу mono_transaction
	        $this->model_extension_payment_mono_pay->setMonoOrder($order_id, 'UAH', $result_data);
	        $json['redirect'] = $result_data['pageUrl'];
	    } else {
	        $json['error'] = 'Помилка створення платежу';
	    }
	    
	    $this->response->addHeader('Content-Type: application/json');
	    $this->response->setOutput(json_encode($json));        
	}
}
