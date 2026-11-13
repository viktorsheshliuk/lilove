<?php
class ControllerExtensionModuleTdproducts extends Controller {
	public function index($setting) {
		static $module = 0;
		$this->load->language('extension/module/tdproducts');

		$this->load->model('catalog/product');
		$this->load->model('extension/module/tdproducts');

		$this->load->model('tool/image');
		$data['products'] = array();
		$this->load->model('localisation/language');
		$data['code'] = $this->session->data['language'];
		$store_id = $this->config->get('config_store_id');

		if (!$setting['limit']) {
			$setting['limit'] = 4;
		}

		$results = array();
		if($setting['prd_type'] == 0) {
			if (!empty($setting['product'])) {
				$products = array_slice($setting['product'], 0, (int)$setting['limit']);
				foreach ($products as $product_id) {
					$results[] = $this->model_catalog_product->getProduct($product_id);
				}
			}
		} else if ($setting['prd_type']==1){
			if($setting['productfrom']==0){
				$data['filter_category_id'] = $setting['category_id'];
				$filter_data = array(
					'filter_category_id' => $setting['category_id'],
					'start' => 0,
					'limit' => $setting['limit'],
				);
				$results = $this->model_catalog_product->getProducts($filter_data);
			} else if($setting['productfrom']==1) {
				if (!empty($setting['productcate'])) {
					$products = array_slice($setting['productcate'], 0, (int)$setting['limit']);
					foreach ($products as $product_id) {
						$results[] = $this->model_catalog_product->getProduct($product_id);
					}
				}
			} else {
				if ($setting['specific_product']==0){
					$data['products'] = array();
					$filter_data = array(
						'filter_category_id' => $setting['category_id'],
						'sort'  => 'p.date_added',
						'order' => 'DESC',
						'start' => 0,
						'limit' => $setting['limit'],
					);
					$results = $this->model_catalog_product->getProducts($filter_data);
				} else if ($setting['specific_product']==1){
					$filter_data = array(
					'sort'  => 'pd.name',
					'order' => 'ASC',
					'start' => 0,
					'limit' => $setting['limit']
					);
					$results = $this->model_extension_module_tdproducts->getProductSpecialsCategory($filter_data, $setting['category_id']);
				} else if ($setting['specific_product']==2){
					$data['products'] = array();
					$results = $this->model_extension_module_tdproducts->getBestSellerProductsCategory($setting['limit'], $setting['category_id']);
				} else{
					$data['products'] = array();
					$results = $this->model_extension_module_tdproducts->getMostViewedProductsCategory($setting['limit'],  $setting['category_id']);
				}
			}
		} else {
			if ($setting['autoproduct']==0){
				$data['products'] = array();

				$filter_data = array(
					'sort'  => 'p.date_added',
					'order' => 'DESC',
					'start' => 0,
					'limit' => $setting['limit']
				);
				$results = $this->model_catalog_product->getProducts($filter_data);
			} else if ($setting['autoproduct']==1){
				$filter_data = array(
				'sort'  => 'pd.name',
				'order' => 'ASC',
				'start' => 0,
				'limit' => $setting['limit']
				);

				$results = $this->model_catalog_product->getProductSpecials($filter_data);
			} else if ($setting['autoproduct']==2){
					$data['products'] = array();
				$results = $this->model_catalog_product->getBestSellerProducts($setting['limit']);
			} else{
				$data['products'] = array();
				$results = $this->model_catalog_product->getPopularProducts($setting['limit']);
			}
		}

		/* Get new product */
		$this->load->model('catalog/product');

		$filter_data = array(
			'sort'  => 'p.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => 10
		);

		$new_results = $this->model_catalog_product->getProducts($filter_data);
		/* End */

		if ($results) {
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				//added for image swap
				$images = $this->model_catalog_product->getProductImages($result['product_id']);

				if(isset($images[0]['image']) && !empty($images)){
					$images = $images[0]['image'];
				} else {
					$images = $image;
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$rate_special = round(100 - ((float)$result['special'] / $result['price'] * 100));
				} else {
					$special = false;
					$rate_special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}
				$c_words = 50;
				$result['name'] = strlen($result['name']) > $c_words ? mb_substr($result['name'],0,$c_words)."..." : $result['name'];

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $this->model_tool_image->resize($images, $setting['width'], $setting['height']),
					'width'   => $setting['width'],
					'height'  => $setting['height'],
					'name'        => $result['name'],
					'rate_special' => $rate_special,
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'manufacturer' => $result['manufacturer'],
					'manufacturers' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
				);
			}
		}
		$data['config_module'] = array(
			'name' => $setting['name'],
			'type' => (int) $setting['display_type'],
			'prostyle' => (int) $setting['pro_style'],
			'xxldevice' => (int) $setting['xxldevice'],
			'xldevice' => (int) $setting['xldevice'],
			'lgdevice' => (int) $setting['lgdevice'],
			'mddevice' => (int) $setting['mddevice'],
			'smdevice' => (int) $setting['smdevice'],
			'xsdevice' => (int) $setting['xsdevice'],
			'rows' => (int) $setting['rows'],
			'navigation' => (int) $setting['navigation'],
			'pagination' => (int) $setting['pagination'],
			'autoplay' => (int) $setting['autoplay'],
			'apdelay' => (int) $setting['apdelay'],
			'title' => $setting['title'],
			'subtitle' => $setting['subtitle'],
		);

		if ($this->config->get('config_theme') == 'default') {
			$data['themedir'] = $this->config->get('theme_default_directory');
		} else {
			$data['themedir'] = $this->config->get('config_theme');
		}
		$data['module'] = $module++;
		return $this->load->view('extension/module/tdproducts', $data);
	}
}