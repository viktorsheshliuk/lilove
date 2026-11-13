<?php

class ControllerExtensionPaymentMonoPay extends Controller {
	public function __construct($registry) {
		parent::__construct($registry);
		
		require_once DIR_SYSTEM . 'library/mono_pay/mono_pay.php';
		
		$this->load->model('checkout/order');
		$this->load->model('extension/payment/mono_pay');
		$this->load->language('extension/payment/mono_pay');
		
		$this->secretkey = $this->config->get('payment_mono_pay_token');
		$this->currency_code = $this->config->get('payment_mono_pay_pay_cur');
	}
	
	public function index() {
		
		$order_id = !empty($this->session->data['order_id']) ? $this->session->data['order_id'] : false;
		
		if($order_id) {
			$mono_pay = new MonoPay();
			$mono_pay->setSecretKey($this->secretkey);
			
			if(!empty($mono_pay->currencies[$this->currency_code])) {
				$currency_ccy = $mono_pay->currencies[$this->currency_code];
				$currency = $this->currency_code;
			} else {
				$currency_ccy = 980;
				$currency = 'UAH';
			}
			
			if ($this->request->server['HTTPS']) {
				$server = $this->config->get('config_ssl');
			} else {
				$server = $this->config->get('config_url');
			}
			
			if($this->config->get('payment_mono_pay_custom_callback')) {
				$callback_url = $this->config->get('payment_mono_pay_custom_callback');
			} else {
				$callback_url = $server . 'index.php?route=extension/payment/mono_pay/callback';
			}
			
			$order_info = $this->model_extension_payment_mono_pay->getOrder($order_id);
			
			$order_product_result = $this->model_extension_payment_mono_pay->getOrderProduct($order_id, $currency);
		
			if($this->config->get('payment_mono_pay_totals')) {
				$total_cost = $this->model_extension_payment_mono_pay->getTotalCost($order_id);
				
				if($total_cost) {
					$order_info['total'] = $order_info['total'] - $total_cost;
				}
			}
		
			$order_product = $this->prepareTotalFiscalization($order_info['total'], $order_product_result, $currency);
			
			$merchantPaymInfo = array(
				'reference'		=> (string)$order_id,
				'destination'	=> sprintf($this->language->get('text_order_description'), $order_id),
				'basketOrder'	=> $order_product,
			);
			
			$api_data = array(
				'amount'			=> round($this->currency->format($order_info['total'], $currency, $this->currency->getValue($currency), false) * 100),
				'ccy'				=> (int)$currency_ccy,
				'merchantPaymInfo'	=> $merchantPaymInfo,
				'redirectUrl'		=> $server . 'index.php?route=extension/payment/mono_pay/response&orderid=' . $order_id,
				'webHookUrl'		=> $callback_url,
				'validity'			=> (int)$this->config->get('payment_mono_pay_validity_time'),
				'paymentType'		=> in_array($this->config->get('payment_mono_pay_type'), $mono_pay->payment_type) ? $this->config->get('payment_mono_pay_type') : '',
				'api_uri'			=> 'invoice/create',
			);
		
			$this->setLog($api_data, 'Дані що йдуть на платіжну систему');
			
			$result_data = $mono_pay->getInvoice($api_data);
		
			$data['error'] = $mono_pay->logError($result_data);

			if(!empty($result_data['pageUrl'])) {
				$this->setLog($result_data, 'Дані що прийшли з платіжки');
				
				$data['payment_url'] = $result_data['pageUrl'];
				
				$this->model_extension_payment_mono_pay->setMonoOrder($order_id, $currency, $result_data);
			} else {
				$data['payment_url'] = ''; 
			}
			
			if($this->config->get('payment_mono_pay_forced_referrer')) {
				$data['forced_referrer'] = true;
			} else {
				$data['forced_referrer'] = false;
			}
			
			$data['referrer'] = $this->config->get('payment_mono_pay_status_referrer');

			return $this->load->view('extension/payment/mono_pay', $data);
		
		}
	}
	
	// public function callback() {
	// 	$calback_info = (array)json_decode(file_get_contents("php://input"));
		
	// 	if(!$calback_info) {
	// 		$this->setLog(array('text' => 'Callback data empty!'), 'Помилка при поверненні колбеку');
			
	// 		return false;
	// 	}
		
	// 	//Log
	// 	$this->setLog(json_encode($calback_info), 'Колбек від платіжної системи');
		
	// 	$invoice_info = $this->getInvoiceInfo($calback_info['invoiceId']);
		
	// 	if(!$invoice_info) {
	// 		$this->setLog(array('text' => 'Callback data empty!'), 'Помилка при перевірці поточного статусу інвойсу');
			
	// 		return false;
	// 	}
		
	// 	$mono_pay = new MonoPay();
	
	// 	if($invoice_info['status'] == 'success' && $this->config->get('payment_mono_pay_type') == 'hold') {
	// 		$status_id = $this->config->get('payment_mono_pay_order_hold_status_id');
	// 	} elseif(in_array($invoice_info['status'], $mono_pay->succes_payment_type)) {
	// 		$status_id = $this->config->get('payment_mono_pay_order_success_status_id');
	// 	} elseif($invoice_info['status'] == 'failure') {
	// 		$status_id = $this->config->get('payment_mono_pay_order_failure_status_id');
	// 	} elseif($invoice_info['status'] == 'reversed') {
	// 		$status_id = $this->config->get('payment_mono_pay_order_return_status_id');
	// 	} else {
	// 		$status_id = false;
	// 	}
		
	// 	if($status_id) {			
	// 		$this->pushHistory($invoice_info['reference'], $status_id);
	// 	}
	// }

	public function callback() {
		$calback_info = (array)json_decode(file_get_contents("php://input"));
		
		if(!$calback_info) {
			$this->setLog(array('text' => 'Callback data empty!'), 'Помилка при поверненні колбеку');
			return false;
		}
		
		$this->setLog(json_encode($calback_info), 'Колбек від платіжної системи');
		
		$invoice_info = $this->getInvoiceInfo($calback_info['invoiceId']);
		
		if(!$invoice_info) {
			$this->setLog(array('text' => 'Callback data empty!'), 'Помилка при перевірці поточного статусу інвойсу');
			return false;
		}
		
		$mono_pay = new MonoPay();
        
        $status_id = false;

        if ($invoice_info['status'] == 'success') {
            // Получаем данные заказа, чтобы проверить метод оплаты
            $this->load->model('checkout/order');
            $order_info = $this->model_checkout_order->getOrder($invoice_info['reference']);
            
            // Проверяем: если метод оплаты - COD, ставим статус 17 (предоплата)
            if ($order_info && $order_info['payment_code'] == 'cod') {
                $status_id = 17;
            } elseif ($this->config->get('payment_mono_pay_type') == 'hold') {
                $status_id = $this->config->get('payment_mono_pay_order_hold_status_id');
            } else {
                $status_id = $this->config->get('payment_mono_pay_order_success_status_id');
            }
        } elseif ($invoice_info['status'] == 'failure') {
            $status_id = $this->config->get('payment_mono_pay_order_failure_status_id');
        } elseif ($invoice_info['status'] == 'reversed') {
            $status_id = $this->config->get('payment_mono_pay_order_return_status_id');
        }
		
		if($status_id) {			
			$this->pushHistory($invoice_info['reference'], $status_id);
		}
	}
	
	public function response() {		
		//Фікс щодо втрати сессії та номеру замовлення при поверненні
		if(empty($this->session->data['order_id']) && !empty($this->request->get['orderid'])) {
			$this->session->data['order_id'] = $this->request->get['orderid'];
		}
		
		$order_id = !empty($this->session->data['order_id']) ? $this->session->data['order_id'] : false;
		
		if(!$order_id) {
			$this->setLog(array('text' => 'Order ID empty!'), 'Помилка при поверненні з платіжної системи');
			
			return false;
		}
		
		$order_info = $this->model_extension_payment_mono_pay->getOrder($order_id);
		
		if(!$order_info['order_status_id']) {
			$invoice_info = $this->model_extension_payment_mono_pay->getInvoiceByOrderId($order_id);
			
			$mono_pay = new MonoPay();
			$mono_pay->setSecretKey($this->secretkey);
			$mono_pay->setTypeMethod('GET');
			
			$mono_pay_data = array(
				'invoiceId' => $invoice_info['invoiceId'],
				'api_uri' 	=> 'invoice/status?invoiceId=' . $invoice_info['invoiceId']
			);
			
			$result_data = $mono_pay->getTransactionInfo($mono_pay_data);
			
			if(!empty($result_data['status'])) {
				if($result_data['status'] == 'success') {
					$order_info['order_status_id'] = $this->config->get('payment_mono_pay_order_success_status_id');
				}
			}
		}

		// было
		// if($order_info['order_status_id'] == $this->config->get('payment_mono_pay_order_success_status_id')) {
		// 	$this->response->redirect($this->url->link('checkout/success', '', 'SSL'));
		// } else {			
		// 	$this->response->redirect($this->url->link('checkout/mono_fail', '', 'SSL'));
		// }

		// Стало:
		$success_status = $this->config->get('payment_mono_pay_order_success_status_id');
		$prepayment_status = 17; // Ваш ID статуса "Внесена предоплата"

		// Проверяем, подходит ли статус заказа под успешный (либо полная оплата, либо наша предоплата)
		if ($order_info['order_status_id'] == $success_status || $order_info['order_status_id'] == $prepayment_status) {
		    $this->response->redirect($this->url->link('checkout/success', '', 'SSL'));
		} else {			
		    $this->response->redirect($this->url->link('checkout/mono_fail', '', 'SSL'));
		}

	}
	
	public function referrer() {
		$order_id = $this->session->data['order_id'];
		
		$this->pushHistory($order_id, $this->config->get('payment_mono_pay_order_status_id'));
	}
	
	private function pushHistory($order_id, $status) {
		$order_info = $this->model_extension_payment_mono_pay->getOrder($order_id);
		
		if($order_info['order_status_id'] != $status) {
			$this->model_checkout_order->addOrderHistory($order_id, $status);
		}
	}
	
	private function setLog($data, $text) {
		if($this->config->get('payment_mono_pay_status_log')) {
			$log = new Log('mono.log');
			$log->write('--------- ' . $text . ': ПОЧАТОК ---------');
			$log->write(json_encode($data));
			$log->write('--------- ' . $text . ': КІНЕЦЬ ---------');
		}
	}
	
	private function getInvoiceInfo($invoiceId) {
		$mono_pay = new MonoPay();
		$mono_pay->setSecretKey($this->secretkey);
		$mono_pay->setTypeMethod('GET');
		
		$mono_pay_data = array(
			'invoiceId' => $invoiceId,
			'api_uri' 	=> 'invoice/status?invoiceId=' . $invoiceId
		);
		
		$result_data = $mono_pay->getTransactionInfo($mono_pay_data);
		
		return $result_data;
	}
	
	private function prepareTotalFiscalization($order_total, $products, $currency) {
		
		$total_product = 0;
		
		foreach($products as $product) {
			$total_product += $product['sum'] * $product['qty'];
		}

		$order_total = $this->currency->format($order_total, $currency, $this->currency->getValue($currency), false) * 100;
		
		$total_difference = $order_total - $total_product;
		
		//Якщо є різниця в сумах - то додаємо суму різниці до першого товару
		$products[0]['sum'] += round(($total_difference / $products[0]['qty']));
		
		return $products;
	}
}