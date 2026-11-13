<?php
class ControllerCheckoutSuccess extends Controller {
	public function index() {
		$this->load->language('checkout/success');

		//номер заказа
		$data['order_id'] = $this->session->data['order_id'];

    $this->load->model('account/order');


    $order_info = $this->model_account_order->getOrderProducts($this->session->data['order_id']);


    $this->load->model('catalog/product');
    $this->load->model('catalog/category');

    //Получаю название категории для товаров из корзины
    foreach ($order_info as $key => $item) {

      if (isset($this->model_catalog_product->getCategories($item['product_id'])[1]['category_id'])) {

        $category_id = $this->model_catalog_product->getCategories($item['product_id'])[1]['category_id'];
      }

      //var_dump($category_id);
      $categories_info = $this->model_catalog_category->getCategory($category_id);
      $order_info[$key]['category'] = $categories_info['name'];
    }

    $data['order_info'] = $order_info;

    //Получаю название сайта
	$data['site_title'] = $this->config->get('config_name');
	
	//стоимость доставки
	$data['shipping_price'] = (float)$this->session->data['totals'][1]['text'];

	//сумма покупки
	$data['order_sum'] = (float)$this->session->data['totals'][2]['text'];

	//продукты из корзины
    $data['products_from_cart'] = $this->cart->getProducts();

		/*if (isset($this->session->data['order_id'])) {
			$this->cart->clear();

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
			unset($this->session->data['totals']);
		}*/

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_basket'),
			'href' => $this->url->link('checkout/cart')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_checkout'),
			'href' => $this->url->link('checkout/checkout', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_success'),
			'href' => $this->url->link('checkout/success')
		);

		if ($this->customer->isLogged()) {
			$data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', true), $this->url->link('account/order', '', true), $this->url->link('account/download', '', true), $this->url->link('information/contact'));
		} else {
			$data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
		}

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));
	}
}