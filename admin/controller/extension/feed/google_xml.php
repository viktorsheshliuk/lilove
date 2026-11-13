<?php
class ControllerExtensionFeedGoogleXml extends Controller {
	protected $tdata = array();
	
	protected $error = array();
	
	protected $allowedCurrencies = array('RUR', 'RUB', 'USD', 'EUR', 'BYR', 'BYN', 'KZT', 'UAH');
	
	protected $CONFIG_PREFIX = 'google_xml_';
	
	protected function preparePostData() {
		if (isset($this->request->post['google_xml_in_stock'])) {
			$this->request->post['google_xml_in_stock'] = implode(',', array_map('intval', $this->request->post['google_xml_in_stock']));
		}
		if (isset($this->request->post['google_xml_out_of_stock'])) {
			$this->request->post['google_xml_out_of_stock'] = implode(',', array_map('intval', $this->request->post['google_xml_out_of_stock']));
		}
	
		if (isset($this->request->post['google_xml_categories'])) {
			$this->request->post['google_xml_categories'] = implode(',', array_map('intval', $this->request->post['google_xml_categories']));
		}
		if (isset($this->request->post['google_xml_manufacturers'])) {
			$this->request->post['google_xml_manufacturers'] = implode(',', $this->request->post['google_xml_manufacturers']);
		}
		
		if (isset($this->request->post['google_xml_categ_sales_notes'])) {
			$this->request->post['google_xml_categ_sales_notes'] = serialize(array_filter($this->request->post['google_xml_categ_sales_notes'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_categ_condition'])) {
			$this->request->post['google_xml_categ_condition'] = serialize(array_filter($this->request->post['google_xml_categ_condition'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_categ_category_id'])) {
			$this->request->post['google_xml_categ_category_id'] = serialize(array_filter($this->request->post['google_xml_categ_category_id'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_categ_product_type'])) {
			$this->request->post['google_xml_categ_product_type'] = serialize(array_filter($this->request->post['google_xml_categ_product_type'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_categ_delivery_cost'])) {
			$this->request->post['google_xml_categ_delivery_cost'] = serialize(array_filter($this->request->post['google_xml_categ_delivery_cost'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_categ_delivery_days'])) {
			$this->request->post['google_xml_categ_delivery_days'] = serialize(array_filter($this->request->post['google_xml_categ_delivery_days'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_categ_portal_id'])) {
			$this->request->post['google_xml_categ_portal_id'] = serialize(array_filter($this->request->post['google_xml_categ_portal_id'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_manuf_sales_notes'])) {
			$this->request->post['google_xml_manuf_sales_notes'] = serialize(array_filter($this->request->post['google_xml_manuf_sales_notes'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_manuf_condition'])) {
			$this->request->post['google_xml_manuf_condition'] = serialize(array_filter($this->request->post['google_xml_manuf_condition'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_manuf_delivery_cost'])) {
			$this->request->post['google_xml_manuf_delivery_cost'] = serialize(array_filter($this->request->post['google_xml_manuf_delivery_cost'], 'strlen'));
		}
		if (isset($this->request->post['google_xml_manuf_delivery_days'])) {
			$this->request->post['google_xml_manuf_delivery_days'] = serialize(array_filter($this->request->post['google_xml_manuf_delivery_days'], 'strlen'));
		}
		
		if (isset($this->request->post['google_xml_blacklist'])) {
			$this->request->post['google_xml_blacklist'] = implode(',', $this->request->post['google_xml_blacklist']);
		}
		if (isset($this->request->post['google_xml_pricefrom'])) {
			$this->request->post['google_xml_pricefrom'] = floatval($this->request->post['google_xml_pricefrom']);
		}
		if (isset($this->request->post['google_xml_priceto'])) {
			$this->request->post['google_xml_priceto'] = $this->request->post['google_xml_priceto'];
		}
		if (isset($this->request->post['google_xml_attributes'])) {
			$this->request->post['google_xml_attributes'] = implode(',', $this->request->post['google_xml_attributes']);
		}
		if (isset($this->request->post['google_xml_color_options'])) {
			$this->request->post['google_xml_color_options'] = implode(',', $this->request->post['google_xml_color_options']);
		}
		if (isset($this->request->post['google_xml_size_options'])) {
			$this->request->post['google_xml_size_options'] = implode(',', $this->request->post['google_xml_size_options']);
		}
		if (isset($this->request->post['google_xml_size_units'])) {
			$this->request->post['google_xml_size_units'] = serialize($this->request->post['google_xml_size_units']);
		}
	}

	protected function setLanguageData() {
		$this->tdata['breadcrumbs'] = array();

		$this->tdata['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);

		$this->tdata['breadcrumbs'][] = array(
			'href'      => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] .'&type=feed', 'SSL'),
			'text'      => $this->language->get('text_feed'),
			'separator' => ' :: '
		);

		$this->tdata['breadcrumbs'][] = array(
			'href'      => $this->url->link('extension/feed/google_xml', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);
	
		$this->tdata['CONFIG_PREFIX'] = $this->CONFIG_PREFIX;
		
		$this->tdata['heading_title'] = $this->language->get('heading_title');
		$this->tdata['text_edit'] = $this->language->get('text_edit');
		

		$this->tdata['tab_general'] = $this->language->get('tab_general');
		$this->tdata['tab_available'] = $this->language->get('tab_available');
		$this->tdata['tab_categories'] = $this->language->get('tab_categories');
		$this->tdata['tab_attributes'] = $this->language->get('tab_attributes');
		$this->tdata['tab_tailor'] = $this->language->get('tab_tailor');

		$this->tdata['text_enabled'] = $this->language->get('text_enabled');
		$this->tdata['text_disabled'] = $this->language->get('text_disabled');
		$this->tdata['text_select_all'] = $this->language->get('text_select_all');
		$this->tdata['text_unselect_all'] = $this->language->get('text_unselect_all');
		$this->tdata['text_blacklist'] = $this->language->get('text_blacklist');
		$this->tdata['text_whitelist'] = $this->language->get('text_whitelist');

		$this->tdata['entry_status'] = $this->language->get('entry_status');
		$this->tdata['entry_token'] = $this->language->get('entry_token');
		$this->tdata['entry_token_help'] = $this->language->get('entry_token_help');
		$this->tdata['entry_data_feed'] = $this->language->get('entry_data_feed');
		$this->tdata['entry_data_feed_help'] = $this->language->get('entry_data_feed_help');
		
		$this->tdata['entry_ocstore'] = $this->language->get('entry_ocstore');
		$this->tdata['entry_ocstore_help'] = $this->language->get('entry_ocstore_help');
		$this->tdata['entry_datamodel'] = $this->language->get('entry_datamodel');
		$this->tdata['entry_datamodel_help'] = $this->language->get('entry_datamodel_help');
		
		$this->tdata['entry_name_field'] = $this->language->get('entry_name_field');
		$this->tdata['entry_model_field'] = $this->language->get('entry_model_field');
		$this->tdata['entry_vendorcode_field'] = $this->language->get('entry_vendorcode_field');
		$this->tdata['entry_typeprefix_field'] = $this->language->get('entry_typeprefix_field');
		$this->tdata['entry_barcode_field'] = $this->language->get('entry_barcode_field');
		$this->tdata['entry_keywords_field'] = $this->language->get('entry_keywords_field');
		$this->tdata['entry_description_field'] = $this->language->get('entry_description_field');
		$this->tdata['entry_dont_export'] = $this->language->get('entry_dont_export');
		
		$this->tdata['entry_export_tags'] = $this->language->get('entry_export_tags');
		$this->tdata['entry_export_tags_help'] = $this->language->get('entry_export_tags_help');
		$this->tdata['entry_utm_label'] = $this->language->get('entry_utm_label');
		$this->tdata['entry_utm_label_help'] = $this->language->get('entry_utm_label_help');
		
		$this->tdata['datamodels'] = $this->language->get('datamodels');
		$this->tdata['entry_delivery_cost'] = $this->language->get('entry_delivery_cost');
		$this->tdata['entry_delivery_cost_help'] = $this->language->get('entry_delivery_cost_help');
		$this->tdata['entry_delivery_days'] = $this->language->get('entry_delivery_days');
		$this->tdata['entry_delivery_days_help'] = $this->language->get('entry_delivery_days_help');
		$this->tdata['entry_delivery_before'] = $this->language->get('entry_delivery_before');
		$this->tdata['entry_delivery_before_help'] = $this->language->get('entry_delivery_before_help');
		$this->tdata['entry_local_delivery'] = $this->language->get('entry_local_delivery');
		$this->tdata['entry_stock_quantity'] = $this->language->get('entry_stock_quantity');
		
		$this->tdata['entry_category'] = $this->language->get('entry_category');
		$this->tdata['entry_category_help'] = $this->language->get('entry_category_help');
		$this->tdata['entry_manufacturers'] = $this->language->get('entry_manufacturers');
		$this->tdata['entry_manufacturers_help'] = $this->language->get('entry_manufacturers_help');
		$this->tdata['entry_blacklist_type'] = $this->language->get('entry_blacklist_type');
		$this->tdata['entry_blacklist'] = $this->language->get('entry_blacklist');
		$this->tdata['entry_blacklist_help'] = $this->language->get('entry_blacklist_help');
		$this->tdata['entry_whitelist'] = $this->language->get('entry_whitelist');
		$this->tdata['entry_whitelist_help'] = $this->language->get('entry_whitelist_help');
		$this->tdata['entry_pricefrom'] = $this->language->get('entry_pricefrom');
		$this->tdata['entry_pricefrom_help'] = $this->language->get('entry_pricefrom_help');
		$this->tdata['entry_priceto'] = $this->language->get('entry_priceto');
		$this->tdata['entry_priceto_help'] = $this->language->get('entry_priceto_help');
		$this->tdata['entry_currency'] = $this->language->get('entry_currency');
		$this->tdata['entry_currency_help'] = $this->language->get('entry_currency_help');
		$this->tdata['entry_oldprice'] = $this->language->get('entry_oldprice');
		$this->tdata['entry_oldprice_help'] = $this->language->get('entry_oldprice_help');
		$this->tdata['entry_groupprice'] = $this->language->get('entry_groupprice');
		$this->tdata['entry_groupprice_help'] = $this->language->get('entry_groupprice_help');
		$this->tdata['entry_changeprice'] = $this->language->get('entry_changeprice');
		$this->tdata['entry_changeprice_help'] = $this->language->get('entry_changeprice_help');
		$this->tdata['entry_unavailable'] = $this->language->get('entry_unavailable');
		$this->tdata['entry_unavailable_help'] = $this->language->get('entry_unavailable_help');
		$this->tdata['entry_in_stock'] = $this->language->get('entry_in_stock');
		$this->tdata['entry_in_stock_help'] = $this->language->get('entry_in_stock_help');
		$this->tdata['entry_out_of_stock'] = $this->language->get('entry_out_of_stock');
		$this->tdata['entry_out_of_stock_help'] = $this->language->get('entry_out_of_stock_help');

		$this->tdata['entry_pickup'] = $this->language->get('entry_pickup');
		$this->tdata['entry_pickup_help'] = $this->language->get('entry_pickup_help');
		$this->tdata['entry_sales_notes'] = $this->language->get('entry_sales_notes');
		$this->tdata['entry_sales_notes_help'] = $this->language->get('entry_sales_notes_help');
		$this->tdata['entry_condition_help'] = $this->language->get('entry_condition_help');
		$this->tdata['entry_store'] = $this->language->get('entry_store');
		$this->tdata['entry_store_help'] = $this->language->get('entry_store_help');
		$this->tdata['entry_numpictures'] = $this->language->get('entry_numpictures');
		$this->tdata['entry_numpictures_help'] = $this->language->get('entry_numpictures_help');

		$this->tdata['button_save'] = $this->language->get('button_save');
		$this->tdata['button_cancel'] = $this->language->get('button_cancel');

		$this->tdata['text_yes'] = $this->language->get('text_yes');
		$this->tdata['text_no'] = $this->language->get('text_no');
		
		$this->tdata['entry_cron_run'] = $this->language->get('entry_cron_run');
		$this->tdata['entry_cron_run_help'] = $this->language->get('entry_cron_run_help');
		$this->tdata['entry_export_url'] = $this->language->get('entry_export_url');
		$this->tdata['entry_export_url_help'] = $this->language->get('entry_export_url_help');

		//++++ Для вкладки аттрибутов ++++
		$this->tdata['tab_attributes_description'] = str_replace('%attr_url%', $this->url->link('catalog/attribute', 'user_token=' . $this->session->data['user_token'], 'SSL'), $this->language->get('tab_attributes_description'));
		$this->tdata['entry_attributes'] = $this->language->get('entry_attributes');
		$this->tdata['entry_attributes_help'] = $this->language->get('entry_attributes_help');
		$this->tdata['entry_adult'] = $this->language->get('entry_adult');
		$this->tdata['entry_adult_help'] = $this->language->get('entry_adult_help');
		$this->tdata['entry_all_adult'] = $this->language->get('entry_all_adult');
		$this->tdata['entry_all_adult_help'] = $this->language->get('entry_all_adult_help');
		$this->tdata['entry_manufacturer_warranty'] = $this->language->get('entry_manufacturer_warranty');
		$this->tdata['entry_manufacturer_warranty_help'] = $this->language->get('entry_manufacturer_warranty_help');
		$this->tdata['entry_all_manufacturer_warranty'] = $this->language->get('entry_all_manufacturer_warranty');
		$this->tdata['entry_all_manufacturer_warranty_help'] = $this->language->get('entry_all_manufacturer_warranty_help');
		$this->tdata['entry_country_of_origin'] = $this->language->get('entry_country_of_origin');
		$this->tdata['entry_country_of_origin_help'] = $this->language->get('entry_country_of_origin_help');
		$this->tdata['entry_product_rel'] = $this->language->get('entry_product_rel');
		$this->tdata['entry_product_rel_help'] = $this->language->get('entry_product_rel_help');
		$this->tdata['entry_product_accessory'] = $this->language->get('entry_product_accessory');
		$this->tdata['entry_product_accessory_help'] = $this->language->get('entry_product_accessory_help');

		//++++ Для магазинов одежды ++++
		$this->tdata['entry_color_option'] = $this->language->get('entry_color_option');
		$this->tdata['entry_color_option_help'] = $this->language->get('entry_color_option_help');
		$this->tdata['entry_size_option'] = $this->language->get('entry_size_option');
		$this->tdata['entry_size_option_help'] = $this->language->get('entry_size_option_help');
		$this->tdata['entry_size_unit'] = $this->language->get('entry_size_unit');
		$this->tdata['entry_size_unit_help'] = $this->language->get('entry_size_unit_help');
		$this->tdata['entry_optioned_name'] = $this->language->get('entry_optioned_name');
		$this->tdata['entry_optioned_name_help'] = $this->language->get('entry_optioned_name_help');
		$this->tdata['optioned_name_no'] = $this->language->get('optioned_name_no');
		$this->tdata['optioned_name_short1'] = $this->language->get('optioned_name_short1');
		$this->tdata['optioned_name_short'] = $this->language->get('optioned_name_short');
		$this->tdata['optioned_name_long1'] = $this->language->get('optioned_name_long1');
		$this->tdata['optioned_name_long'] = $this->language->get('optioned_name_long');
        
		$this->tdata['entry_option_image'] = $this->language->get('entry_option_image');
		
		$this->tdata['size_units_orig'] = array(
			'RU' => 'Россия (СНГ)',
			'EU' => 'Европа',
			'UK' => 'Великобритания',
			'US' => 'США',
			'INT' => 'Международная');
		$this->tdata['size_units_type'] = array(
			'INCH' => 'Дюймы',
			'Height' => 'Рост в сантиметрах',
			'Months' => 'Возраст в месяцах',
			'Years' => 'Возраст в годах',
			'Round' => 'Окружность в сантиметрах');
			
		$this->tdata['oc_fields'] = array(
			'name' => 'Название товара - name',
			'model' => 'Модель - model',
			'sku' => 'Артикул (SKU, код производителя) - sku',
			'upc' => 'UPC - upc',
			'ean' => 'EAN - ean',
			'jan' => 'JAN - jan',
			'isbn' => 'ISBN - isbn',
			'mpn' => 'MPN - mpn',
			'meta_title' => 'HTML-тег Title - meta_title',
			'meta_h1' => 'HTML-тег H1 - meta_h1',
			'meta_description' => 'Мета-тег &quot;Описание&quot; - meta_description',
			'meta_keyword' => 'Мета-тег Keywords - meta_keyword'
		);
		$this->tdata['oc_desc_fields'] = array(
			'description' => 'Описание',
			'meta_description' => 'Мета-тег &quot;Описание&quot;',
			'attr_vs_description' => 'Брать из атрибутов'
		);	
	}

	protected function setFormData() {
		if (isset($this->request->post['google_xml_status'])) {
			$this->tdata['google_xml_status'] = $this->request->post['google_xml_status'];
		} else {
			$this->tdata['google_xml_status'] = $this->config->get($this->CONFIG_PREFIX.'status');
		}

		if (isset($this->request->post['google_xml_token'])) {
			$this->tdata['google_xml_token'] = $this->request->post['google_xml_token'];
		} else {
			$this->tdata['google_xml_token'] = $this->config->get($this->CONFIG_PREFIX.'token');
		}
		
		if (isset($this->request->post['google_xml_ocstore'])) {
			$this->tdata['google_xml_ocstore'] = $this->request->post['google_xml_ocstore'];
		} else {
			$this->tdata['google_xml_ocstore'] = $this->config->get($this->CONFIG_PREFIX.'ocstore');
		}

		if (isset($this->request->post['google_xml_datamodel'])) {
			$this->tdata['google_xml_datamodel'] = $this->request->post['google_xml_datamodel'];
		} else {
			$this->tdata['google_xml_datamodel'] = $this->config->get($this->CONFIG_PREFIX.'datamodel');
		}
		
		if (isset($this->request->post['google_xml_name_field'])) {
			$this->tdata['google_xml_name_field'] = $this->request->post['google_xml_name_field'];
		} else {
			$this->tdata['google_xml_name_field'] = $this->config->get($this->CONFIG_PREFIX.'name_field');
		}
		if (isset($this->request->post['google_xml_model_field'])) {
			$this->tdata['google_xml_model_field'] = $this->request->post['google_xml_model_field'];
		} else {
			$this->tdata['google_xml_model_field'] = $this->config->get($this->CONFIG_PREFIX.'model_field');
		}
		if (isset($this->request->post['google_xml_vendorcode_field'])) {
			$this->tdata['google_xml_vendorcode_field'] = $this->request->post['google_xml_vendorcode_field'];
		} else {
			$this->tdata['google_xml_vendorcode_field'] = $this->config->get($this->CONFIG_PREFIX.'vendorcode_field');
		}
		if (isset($this->request->post['google_xml_typeprefix_field'])) {
			$this->tdata['google_xml_typeprefix_field'] = $this->request->post['google_xml_typeprefix_field'];
		} else {
			$this->tdata['google_xml_typeprefix_field'] = $this->config->get($this->CONFIG_PREFIX.'typeprefix_field');
		}
		if (isset($this->request->post['google_xml_barcode_field'])) {
			$this->tdata['google_xml_barcode_field'] = $this->request->post['google_xml_barcode_field'];
		} else {
			$this->tdata['google_xml_barcode_field'] = $this->config->get($this->CONFIG_PREFIX.'barcode_field');
		}
		if (isset($this->request->post['google_xml_keywords_field'])) {
			$this->tdata['google_xml_keywords_field'] = $this->request->post['google_xml_keywords_field'];
		} else {
			$this->tdata['google_xml_keywords_field'] = $this->config->get($this->CONFIG_PREFIX.'keywords_field');
		}
		if (isset($this->request->post['google_xml_description_field'])) {
			$this->tdata['google_xml_description_field'] = $this->request->post['google_xml_description_field'];
		} else {
			$this->tdata['google_xml_description_field'] = $this->config->get($this->CONFIG_PREFIX.'description_field');
		}
		
		if (isset($this->request->post['google_xml_export_tags'])) {
			$this->tdata['google_xml_export_tags'] = $this->request->post['google_xml_export_tags'];
		} else {
			$this->tdata['google_xml_export_tags'] = $this->config->get($this->CONFIG_PREFIX.'export_tags');
		}
		if (isset($this->request->post['google_xml_utm_label'])) {
			$this->tdata['google_xml_utm_label'] = $this->request->post['google_xml_utm_label'];
		} else {
			$this->tdata['google_xml_utm_label'] = $this->config->get($this->CONFIG_PREFIX.'utm_label');
		}
		
		if (isset($this->request->post['google_xml_delivery_cost'])) {
			$this->tdata['google_xml_delivery_cost'] = $this->request->post['google_xml_delivery_cost'];
		} else {
			$this->tdata['google_xml_delivery_cost'] = $this->config->get($this->CONFIG_PREFIX.'delivery_cost');
		}
		if (isset($this->request->post['google_xml_delivery_days'])) {
			$this->tdata['google_xml_delivery_days'] = $this->request->post['google_xml_delivery_days'];
		} else {
			$this->tdata['google_xml_delivery_days'] = $this->config->get($this->CONFIG_PREFIX.'delivery_days');
		}
		if (isset($this->request->post['google_xml_delivery_before'])) {
			$this->tdata['google_xml_delivery_before'] = $this->request->post['google_xml_delivery_before'];
		} else {
			$this->tdata['google_xml_delivery_before'] = $this->config->get($this->CONFIG_PREFIX.'delivery_before');
		}
		if (isset($this->request->post['google_xml_local_delivery'])) {
			$this->tdata['google_xml_local_delivery'] = $this->request->post['google_xml_local_delivery'];
		} else {
			$this->tdata['google_xml_local_delivery'] = $this->config->get($this->CONFIG_PREFIX.'local_delivery');
		}
		if (isset($this->request->post['google_xml_stock_quantity'])) {
			$this->tdata['google_xml_stock_quantity'] = $this->request->post['google_xml_stock_quantity'];
		} else {
			$this->tdata['google_xml_stock_quantity'] = $this->config->get($this->CONFIG_PREFIX.'stock_quantity');
		}

		if (isset($this->request->post['google_xml_pricefrom'])) {
			$this->tdata['google_xml_pricefrom'] = $this->request->post['google_xml_pricefrom'];
		} else {
			$this->tdata['google_xml_pricefrom'] = $this->config->get($this->CONFIG_PREFIX.'pricefrom');
		}

		if (isset($this->request->post['google_xml_priceto'])) {
			$this->tdata['google_xml_priceto'] = $this->request->post['google_xml_priceto'];
		} else {
			$this->tdata['google_xml_priceto'] = $this->config->get($this->CONFIG_PREFIX.'priceto');
		}
		
		if (isset($this->request->post['google_xml_currency'])) {
			$this->tdata['google_xml_currency'] = $this->request->post['google_xml_currency'];
		} else {
			$this->tdata['google_xml_currency'] = $this->config->get($this->CONFIG_PREFIX.'currency');
		}

		if (isset($this->request->post['google_xml_oldprice'])) {
			$this->tdata['google_xml_oldprice'] = $this->request->post['google_xml_oldprice'];
		} else {
			$this->tdata['google_xml_oldprice'] = $this->config->get($this->CONFIG_PREFIX.'oldprice');
		}
		
		$this->load->model('customer/customer_group');
		$this->tdata['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();
		if (isset($this->request->post['google_xml_groupprice'])) {
			$this->tdata['google_xml_groupprice'] = $this->request->post['google_xml_groupprice'];
		} else {
			$this->tdata['google_xml_groupprice'] = $this->config->get($this->CONFIG_PREFIX.'groupprice');
		}
		
		if (isset($this->request->post['google_xml_changeprice'])) {
			$this->tdata['google_xml_changeprice'] = $this->request->post['google_xml_changeprice'];
		} else {
			$this->tdata['google_xml_changeprice'] = $this->config->get($this->CONFIG_PREFIX.'changeprice');
		}

		if (isset($this->request->post['google_xml_blacklist_type'])) {
			$this->tdata['blacklist_type'] = $this->request->post['google_xml_blacklist_type'];
		} else {
			$this->tdata['blacklist_type'] = $this->config->get($this->CONFIG_PREFIX.'blacklist_type');
		}

		if (isset($this->request->post['google_xml_blacklist'])) {
			$blacklist = $this->request->post['google_xml_blacklist'];
		} else {
			$blacklist = explode(',', $this->config->get($this->CONFIG_PREFIX.'blacklist'));
		}
		$this->load->model('catalog/product');
		
		$this->tdata['blacklist'] = array();
		
		foreach ($blacklist as $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);
			
			if ($product_info) {
				$this->tdata['blacklist'][] = array(
					'product_id' => $product_info['product_id'],
					'name'       => $product_info['name']
				);
			}
		}

		if (isset($this->request->post['google_xml_unavailable'])) {
			$this->tdata['google_xml_unavailable'] = $this->request->post['google_xml_unavailable'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'unavailable')) {
			$this->tdata['google_xml_unavailable'] = $this->config->get($this->CONFIG_PREFIX.'unavailable');
		} else {
			$this->tdata['google_xml_unavailable'] = '';
		}

		if (isset($this->request->post['google_xml_in_stock'])) {
			$this->tdata['google_xml_in_stock'] = explode(',', $this->request->post['google_xml_in_stock']);
		} elseif ($this->config->get($this->CONFIG_PREFIX.'in_stock')) {
			$this->tdata['google_xml_in_stock'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'in_stock'));
		} else {
			$this->tdata['google_xml_in_stock'] = array(7);
		}

		if (isset($this->request->post['google_xml_out_of_stock'])) {
			$this->tdata['google_xml_out_of_stock'] = explode(',', $this->request->post['google_xml_out_of_stock']);
		} elseif ($this->config->get($this->CONFIG_PREFIX.'in_stock')) {
			$this->tdata['google_xml_out_of_stock'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'out_of_stock'));
		} else {
			$this->tdata['google_xml_out_of_stock'] = array(5);
		}

		if (isset($this->request->post['google_xml_pickup'])) {
			$this->tdata['google_xml_pickup'] = $this->request->post['google_xml_pickup'];
		} else {
			$this->tdata['google_xml_pickup'] = $this->config->get($this->CONFIG_PREFIX.'pickup');
		}

		if (isset($this->request->post['google_xml_sales_notes'])) {
			$this->tdata['google_xml_sales_notes'] = $this->request->post['google_xml_sales_notes'];
		} else {
			$this->tdata['google_xml_sales_notes'] = $this->config->get($this->CONFIG_PREFIX.'sales_notes');
		}

		if (isset($this->request->post['google_xml_condition'])) {
			$this->tdata['google_xml_condition'] = $this->request->post['google_xml_condition'];
		} else {
			$this->tdata['google_xml_condition'] = $this->config->get($this->CONFIG_PREFIX.'condition');
		}

		if (isset($this->request->post['google_xml_store'])) {
			$this->tdata['google_xml_store'] = $this->request->post['google_xml_store'];
		} else {
			$this->tdata['google_xml_store'] = $this->config->get($this->CONFIG_PREFIX.'store');
		}
		
		if (isset($this->request->post['google_xml_numpictures'])) {
			$this->tdata['google_xml_numpictures'] = $this->request->post['google_xml_numpictures'];
		} else {
			$this->tdata['google_xml_numpictures'] = $this->config->get($this->CONFIG_PREFIX.'numpictures');
		}
		
		//++++ Для вкладки аттрибутов ++++
		if (isset($this->request->post['google_xml_attributes'])) {
			$this->tdata['google_xml_attributes'] = $this->request->post['google_xml_attributes'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'attributes') != '') {
			$this->tdata['google_xml_attributes'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'attributes'));
		} else {
			$this->tdata['google_xml_attributes'] = array();
		}
		if (isset($this->request->post['google_xml_adult'])) {
			$this->tdata['google_xml_adult'] = $this->request->post['google_xml_adult'];
		} else {
			$this->tdata['google_xml_adult'] = $this->config->get($this->CONFIG_PREFIX.'adult');
		}
		if (isset($this->request->post['google_xml_all_adult'])) {
			$this->tdata['google_xml_all_adult'] = $this->request->post['google_xml_all_adult'];
		} else {
			$this->tdata['google_xml_all_adult'] = $this->config->get($this->CONFIG_PREFIX.'all_adult');
		}
		
		if (isset($this->request->post['google_xml_manufacturer_warranty'])) {
			$this->tdata['google_xml_manufacturer_warranty'] = $this->request->post['google_xml_manufacturer_warranty'];
		} else {
			$this->tdata['google_xml_manufacturer_warranty'] = $this->config->get($this->CONFIG_PREFIX.'manufacturer_warranty');
		}
		if (isset($this->request->post['google_xml_all_manufacturer_warranty'])) {
			$this->tdata['google_xml_all_manufacturer_warranty'] = $this->request->post['google_xml_all_manufacturer_warranty'];
		} else {
			$this->tdata['google_xml_all_manufacturer_warranty'] = $this->config->get($this->CONFIG_PREFIX.'all_manufacturer_warranty');
		}
		
		if (isset($this->request->post['google_xml_country_of_origin'])) {
			$this->tdata['google_xml_country_of_origin'] = $this->request->post['google_xml_country_of_origin'];
		} else {
			$this->tdata['google_xml_country_of_origin'] = $this->config->get($this->CONFIG_PREFIX.'country_of_origin');
		}

		if (isset($this->request->post['google_xml_product_rel'])) {
			$this->tdata['google_xml_product_rel'] = $this->request->post['google_xml_product_rel'];
		} else {
			$this->tdata['google_xml_product_rel'] = $this->config->get($this->CONFIG_PREFIX.'product_rel');
		}
		if (isset($this->request->post['google_xml_product_accessory'])) {
			$this->tdata['google_xml_product_accessory'] = $this->request->post['google_xml_product_accessory'];
		} else {
			$this->tdata['google_xml_product_accessory'] = $this->config->get($this->CONFIG_PREFIX.'product_accessory');
		}
		
		$this->load->model('catalog/attribute');
		$results = $this->model_catalog_attribute->getAttributes(array('sort'=>'attribute_group'));
		$this->tdata['attributes'] = $results;
		//---- Для вкладки аттрибутов ----

		//++++ Для магазинов одежды ++++
		$this->load->model('catalog/option');
		$results = $this->model_catalog_option->getOptions(array('sort' => 'name'));
		$this->tdata['options'] = $results;
		
		$this->tdata['tab_tailor_description'] = $this->language->get('tab_tailor_description');

		if (isset($this->request->post['google_xml_color_options'])) {
			$this->tdata['google_xml_color_options'] = $this->request->post['google_xml_color_options'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'color_options') != '') {
			$this->tdata['google_xml_color_options'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'color_options'));
		} else {
			$this->tdata['google_xml_color_options'] = array();
		}
		if (isset($this->request->post['google_xml_size_options'])) {
			$this->tdata['google_xml_size_options'] = $this->request->post['google_xml_size_options'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'size_options') != '') {
			$this->tdata['google_xml_size_options'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'size_options'));
		} else {
			$this->tdata['google_xml_size_options'] = array();
		}
		if (isset($this->request->post['google_xml_size_units'])) {
			$this->tdata['google_xml_size_units'] = $this->request->post['google_xml_size_units'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'size_units') != '') {
			$this->tdata['google_xml_size_units'] = unserialize($this->config->get($this->CONFIG_PREFIX.'size_units'));
		} else {
			$this->tdata['google_xml_size_units'] = array();
		}

		if (isset($this->request->post['google_xml_optioned_name'])) {
			$this->tdata['google_xml_optioned_name'] = $this->request->post['google_xml_optioned_name'];
		} else {
			$this->tdata['google_xml_optioned_name'] = $this->config->get($this->CONFIG_PREFIX.'optioned_name');
		}
        
		if (isset($this->request->post['google_xml_option_image'])) {
			$this->tdata['google_xml_option_image'] = $this->request->post['google_xml_option_image'];
		} else {
			$this->tdata['google_xml_option_image'] = $this->config->get($this->CONFIG_PREFIX.'option_image');
		}
		//---- Для магазинов одежды ----

		$this->load->model('localisation/stock_status');

		$this->tdata['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		// Categories
		$this->load->model('catalog/category');
		$filter_data = array(
			'sort'        => 'name',
			'order'       => 'ASC'
		);
		$this->tdata['categories'] = $this->model_catalog_category->getCategories($filter_data);
		
		$this->load->model('catalog/manufacturer');
		$this->tdata['manufacturers'] = $this->model_catalog_manufacturer->getManufacturers(0);
		$this->tdata['manufacturers'][] = array('manufacturer_id'=>'0', 'name'=>'Производитель не указан');

		if (isset($this->request->post['google_xml_categories'])) {
			$this->tdata['google_xml_categories'] = $this->request->post['google_xml_categories'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categories') != '') {
			$this->tdata['google_xml_categories'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'categories'));
		} else {
			$this->tdata['google_xml_categories'] = array();
		}
		if (isset($this->request->post['google_xml_manufacturers'])) {
			$this->tdata['google_xml_manufacturers'] = $this->request->post['google_xml_manufacturers'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manufacturers') != '') {
			$this->tdata['google_xml_manufacturers'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'manufacturers'));
		} else {
			$this->tdata['google_xml_manufacturers'] = array();
		}
		
		if (isset($this->request->post['google_xml_categ_sales_notes'])) {
			$this->tdata['google_xml_categ_sales_notes'] = $this->request->post['google_xml_categ_sales_notes'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_sales_notes') != '') {
			$this->tdata['google_xml_categ_sales_notes'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_sales_notes'));
		} else {
			$this->tdata['google_xml_categ_sales_notes'] = array();
		}
		
		if (isset($this->request->post['google_xml_categ_category_id'])) {
			$this->tdata['google_xml_categ_category_id'] = $this->request->post['google_xml_categ_category_id'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_category_id') != '') {
			$this->tdata['google_xml_categ_category_id'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_category_id'));
		} else {
			$this->tdata['google_xml_categ_category_id'] = array();
		}
		
		if (isset($this->request->post['google_xml_categ_product_type'])) {
			$this->tdata['google_xml_categ_product_type'] = $this->request->post['google_xml_categ_product_type'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_category_id') != '') {
			$this->tdata['google_xml_categ_product_type'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_product_type'));
		} else {
			$this->tdata['google_xml_categ_product_type'] = array();
		}
		
		if (isset($this->request->post['google_xml_categ_condition'])) {
			$this->tdata['google_xml_categ_condition'] = $this->request->post['google_xml_categ_condition'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_condition') != '') {
			$this->tdata['google_xml_categ_condition'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_condition'));
		} else {
			$this->tdata['google_xml_categ_condition'] = array();
		}
		if (isset($this->request->post['google_xml_categ_delivery_cost'])) {
			$this->tdata['google_xml_categ_delivery_cost'] = $this->request->post['google_xml_categ_delivery_cost'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_delivery_cost') != '') {
			$this->tdata['google_xml_categ_delivery_cost'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_delivery_cost'));
		} else {
			$this->tdata['google_xml_categ_delivery_cost'] = array();
		}
		if (isset($this->request->post['google_xml_categ_delivery_days'])) {
			$this->tdata['google_xml_categ_delivery_days'] = $this->request->post['google_xml_categ_delivery_days'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_delivery_days') != '') {
			$this->tdata['google_xml_categ_delivery_days'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_delivery_days'));
		} else {
			$this->tdata['google_xml_categ_delivery_days'] = array();
		}
		if (isset($this->request->post['google_xml_categ_portal_id'])) {
			$this->tdata['google_xml_categ_portal_id'] = $this->request->post['google_xml_categ_portal_id'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_portal_id') != '') {
			$this->tdata['google_xml_categ_portal_id'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_portal_id'));
		} else {
			$this->tdata['google_xml_categ_portal_id'] = array();
		}

		if (isset($this->request->post['google_xml_manuf_sales_notes'])) {
			$this->tdata['google_xml_manuf_sales_notes'] = $this->request->post['google_xml_manuf_sales_notes'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_sales_notes') != '') {
			$this->tdata['google_xml_manuf_sales_notes'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_sales_notes'));
		} else {
			$this->tdata['google_xml_manuf_sales_notes'] = array();
		}
		if (isset($this->request->post['google_xml_manuf_condition'])) {
			$this->tdata['google_xml_manuf_condition'] = $this->request->post['google_xml_manuf_condition'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_condition') != '') {
			$this->tdata['google_xml_manuf_condition'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_condition'));
		} else {
			$this->tdata['google_xml_manuf_condition'] = array();
		}
		if (isset($this->request->post['google_xml_manuf_delivery_cost'])) {
			$this->tdata['google_xml_manuf_delivery_cost'] = $this->request->post['google_xml_manuf_delivery_cost'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_cost') != '') {
			$this->tdata['google_xml_manuf_delivery_cost'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_cost'));
		} else {
			$this->tdata['google_xml_manuf_delivery_cost'] = array();
		}
		if (isset($this->request->post['google_xml_manuf_delivery_days'])) {
			$this->tdata['google_xml_manuf_delivery_days'] = $this->request->post['google_xml_manuf_delivery_days'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_days') != '') {
			$this->tdata['google_xml_manuf_delivery_days'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_days'));
		} else {
			$this->tdata['google_xml_manuf_delivery_days'] = array();
		}
		
		$this->load->model('localisation/currency');
		$currencies = $this->model_localisation_currency->getCurrencies();
		$allowed_currencies = array_flip($this->allowedCurrencies);
		$this->tdata['currencies'] = array_intersect_key($currencies, $allowed_currencies);
	}
	
	public function index() {
		$this->load->language('extension/feed/google_xml');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate($this->request->post))) {
			$this->preparePostData();

			$this->model_setting_setting->editSetting('google_xml', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', 'SSL'));
		}

		$this->setLanguageData();
		$this->tdata['token'] = $this->session->data['user_token'];
		$this->tdata['cron_path'] = 'php '.realpath(DIR_CATALOG.'../export/google_xml.php');

		$this->tdata['export_url'] = HTTP_CATALOG.'export/';

		if (isset($this->error['warning'])) {
			$this->tdata['error_warning'] = $this->error['warning'];
		} else {
			$this->tdata['error_warning'] = '';
		}

		$this->tdata['action'] = $this->url->link('extension/feed/google_xml', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$this->tdata['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', 'SSL');

		$this->tdata['data_feed'] = HTTP_CATALOG . 'index.php?route=extension/feed/google_xml';
		
		$this->setFormData();
		
		$template = 'extension/feed/google_xml';
		
		$this->tdata['header'] = $this->load->controller('common/header');
		$this->tdata['column_left'] = $this->load->controller('common/column_left');
		$this->tdata['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view($template, $this->tdata));
	}

	public function uninstall() {
		$this->db->query("DROP TABLE IF EXISTS `oc_yandex_category`;");
	}

	protected function validate($data) {
		if (!$this->user->hasPermission('modify', 'extension/feed/google_xml')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		/*
		elseif (!empty(array_intersect($data['google_xml_size_options'], $data['google_xml_color_options']))) {
			$this->error['warning'] = $this->language->get('error_intersects_options');
		}
		*/

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
