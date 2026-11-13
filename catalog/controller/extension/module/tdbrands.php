<?php
class ControllerExtensionModuleTdbrands extends Controller {
	public function index($setting) {
		static $module = 0;
		$this->load->language('extension/module/tdbrands');
		$data['heading_title'] = $this->language->get('heading_title');

		$this->load->model('catalog/manufacturer');
		$this->load->model('tool/image');

		$this->load->model('localisation/language');

		$data['code'] = $this->session->data['language'];
		$store_id = $this->config->get('config_store_id');

		if($setting['brands_type'] == 0) {
			$results = array();
			$results = $this->model_catalog_manufacturer->getManufacturers();
		} else if ($setting['brands_type'] == 1){
			$manufacturers = array_slice($setting['manufacturer'], 0);
			foreach ($manufacturers  as $manufacturer) {
				$results[] = $this->model_catalog_manufacturer->getManufacturer($manufacturer);
			}
		}

		if ($results) {
			foreach ($results as $result) {
				$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				if(!$image) {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				$data['brands'][] = array(
					'manufacturer_id'  => $result['manufacturer_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'href'        => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
				);
			}
		}
		$data['config_module'] = array(
			'name' => $setting['name'],
			'type' => (int) $setting['display_type'],
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
			'input_manufacturer_link' =>$setting['input_manufacturer_link'],
		);
		$data['module'] = $module++;
		if ($data['brands']) {
			return $this->load->view('extension/module/tdbrands', $data);
		}
	}
}
?>
