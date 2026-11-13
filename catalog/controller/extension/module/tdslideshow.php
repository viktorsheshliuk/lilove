<?php
class ControllerExtensionModuleTdslideshow extends Controller {
	public function index($setting) {
		static $module = 0;
		$this->language->load('extension/module/tdslideshow');
		$this->load->model('tdslideshow/slide');
		$this->load->model('tool/image');

		/*if (file_exists(DIR_TEMPLATE . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/stylesheet/custom/tdslideshow.css')) {
			$this->document->addStyle('catalog/view/theme/'.$this->config->get('theme_' . $this->config->get('config_theme') . '_directory').'/stylesheet/custom/tdslideshow.css');
		}*/
		$this->document->addScript('catalog/view/javascript/themedelights/jquery.nivo.slider.js');
		$data = array();
		$data['text_readmore'] = $this->language->get('text_readmore');
		$data['tdslideshows'] = array();
		$data['animate'] = 'animate-in';
		$results = array();
		if(isset($setting['banner'])) {
			$results = $this->model_tdslideshow_slide->gettdslideshow($setting['banner']);
		}
		if($results ) {
			$store_id  = $this->config->get('config_store_id');
			foreach ($results as $result) {
				$banner_store = array();
				if(isset($result['banner_store'])) {
					$banner_store = explode(',',$result['banner_store']);
				}

				if(in_array($store_id,$banner_store)) {
					$data['tdslideshows'][] = array(
						'title' => $result['title'],
						'link'  => $result['link'],
						'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']),
						'small_image' => $this->config->get('config_url'). 'image/' . $result['small_image'],
						'small_image_name' => $result['small_image']
					);
				}
				$data['slide_setting'] = $this->model_tdslideshow_slide->getSettingSlide($result['tdslideshow_id']);
			}
			$data['module'] = $module++;
			return $this->load->view('extension/module/tdslideshow', $data);
		}
	}
}