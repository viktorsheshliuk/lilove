<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		// Analytics
		$this->load->model('setting/extension');

		$data['analytics'] = array();

		$analytics = $this->model_setting_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
			}
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			//$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
			$data['config_icon'] = $server . 'image/' . $this->config->get('config_icon');
		}

		$data['title'] = $this->document->getTitle();

		//получаю текущий роут
		$current_path = $this->request->get['route'];

		$data['show_transaction'] = false;

		//проверяю на какой странице отобразить скрипт
		if ($current_path == 'checkout/success') {

      	$data['show_transaction'] = true;

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

      if (isset($this->session->data['order_id'])) {
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
      }
    }

		$data['is_home'] = false;

    if ($current_path == 'common/home') {

      $data['is_home'] = true;
    }

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['ogimage'] = $this->document->getOgimage(); 
		$data['ogurl'] = $this->document->getOgurl();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts('header');
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$data['name'] = $this->config->get('config_name');

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');

		//Blog
		$type="module";
		$this->load->model('setting/extension');
		$result=$this->model_setting_extension->getExtensions($type);
		foreach($result as $result){
				if($result['code']==="tdblog"){
					$data['blog_enable'] =1;
			  }
		}

		/*For page specific css*/
		if (isset($this->request->get['route'])) {

			if (isset($this->request->get['product_id'])) {
				$class = '-' . $this->request->get['product_id'];
			}  elseif (isset($this->request->get['manufacturer_id'])) {
				$class = '-' . $this->request->get['manufacturer_id'];
			} elseif (isset($this->request->get['information_id'])) {
				$class = '-' . $this->request->get['information_id'];
			} else {
				$class = '';
			}
			
			$data['class'] = str_replace('/', '-', $this->request->get['route']) . $class;

			if (stripos($this->request->server['REQUEST_URI'], 'simplecheckout')) {
				$data['class'] = 'simplecheckout';
			}
		} else {
			$data['class'] = 'common-home';
		}

		// Wishlist
		$data['wishlist'] = [];

		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');
			$data['text_wishlist'] = $this->model_account_wishlist->getTotalWishlist();

			$wishlist = $this->model_account_wishlist->getWishlist();

			$wishlist_products = [];

			if ($wishlist){
				foreach ($wishlist as $wish){
					$wishlist_products[] = $wish['product_id'];
				}
			}

			$this->session->data['wishlist'] = $wishlist_products;

		} else {
			$data['text_wishlist'] = (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0);
			$wishlist_products = (isset($_COOKIE['cookieWishlist'])) ? json_decode($_COOKIE['cookieWishlist'],1) : [];
		}

		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));
		
		$data['home'] = $this->url->link('common/home');
		//$data['wishlist'] = $this->url->link('account/wishlist', '', true);

		$data['wishlist'] = [
			'total' 	=> count($wishlist_products),
			'products'	=> implode(',', $wishlist_products),
			'href'		=> $this->url->link('account/wishlist', '', true)
		];

        $data['telephone'] = $this->config->get('config_telephone');
		$data['home'] = $this->url->link('common/home');
		
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', true);
		$data['register'] = $this->url->link('account/register', '', true);
		$data['login'] = $this->url->link('account/login', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['transaction'] = $this->url->link('account/transaction', '', true);
		$data['download'] = $this->url->link('account/download', '', true);
		$data['logout'] = $this->url->link('account/logout', '', true);
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', true);
		$data['contact'] = $this->url->link('information/contact', '', true);
		$data['telephone'] = $this->config->get('config_telephone');
		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['special'] = $this->url->link('product/special', '', true);
		//$module_status = $this->config->get('module_tdsearchcategory_status');
		// if($module_status) {
		// 	$data['search'] = $this->load->controller('extension/module/tdsearchcategory');
		// } else {
			$data['search'] = $this->load->controller('common/search');
		//}
		$data['cart'] = $this->load->controller('common/cart');
		$data['menu'] = $this->load->controller('common/menu');

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
            if ($category['top']) {
                /*Level 2*/
                $children_data = array();

                $children = $this->model_catalog_category->getCategories($category['category_id']);

                foreach ($children as $child) {

                   /* Level 3*/
                    $grandchildren_data = array();

                    $grandchildren = $this->model_catalog_category->getCategories($child['category_id']);

                    foreach ($grandchildren as $grandchild) {

                        $grandchild_filter_data = array(
                            'filter_category_id'  => $grandchild['category_id'],
                            'filter_sub_category' => true
                        );

                        $grandchildren_data[] = array(
                            'name'  => $grandchild['name'],
                            'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $grandchild['category_id'])
                        );
                    }


                    $filter_data = array(
                        'filter_category_id'  => $child['category_id'],
                        'filter_sub_category' => true
                    );

                    $children_data[] = array(
                        'name'  => $child['name'],
                        'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id']),
                        'children' => ''//$grandchildren_data,
                    );
                }

                /*Level 1*/
                $data['categories'][] = array(
                    'name'     => $category['name'],
                    'children' => $children_data,
                    'column'   => $category['column'] ? $category['column'] : 1,
                    'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
                );
            }
        }

        $category_id_208 = $this->model_catalog_category->getCategory(208); //208 - id спец категории
        $data['text_category_id_208'] = $category_id_208['name'];
        $data['category_id_208'] =  $this->url->link('product/category', 'path=208');

		$this->load->model('catalog/information');

		$data['informations'] = array();
		$data['informations_mobile'] = array();

		 foreach ($this->model_catalog_information->getInformations() as $result) {
		// 	if ($result['inheader']) {
		// 		$data['informations'][] = array(
		// 			'title' => $result['title'],
		// 			'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
		// 		);
		// 	}
		 	if ($result['inmobilemenu']) {
		 		$data['informations_mobile'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
	  			);
		 	}
		 }
		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['information_id'] == 9) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}
		
		if ( isset($_GET['route']) && $_GET['route'] == 'checkout/fastorder' ) {
			//$data['facebook_pixel_id_FAE'] = $this->config->get('config_fb_success');
		}

		if (isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') {
			$this->load->model('catalog/product');
			$product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
			if ($product_info['fb_pixel']) {
				$data['facebook_pixel_id_FAE'] = $product_info['fb_pixel'];
			}
		}

		return $this->load->view('common/header', $data);
	}
}
