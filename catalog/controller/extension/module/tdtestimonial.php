<?php
class ControllerExtensionModuleTdtestimonial extends Controller {
	public function index($setting) {
        static $module = 0;
		$this->load->model('tool/image');
		$this->load->model('localisation/language');
		$data['code'] = $this->session->data['language'];

        if (isset($setting['pimg'])) {
            $pimg = $setting['pimg'];
        } else {
            $pimg = '';
        }

        if (isset($setting['speed'])) {
            $speed = $setting['speed'];
        } else {
            $speed = 2000;
        }

        if (isset($setting['auto']) && $setting['auto']) {
            $auto = true;
        } else {
            $auto = false;
        }

        if (isset($setting['navigation']) && $setting['navigation']) {
            $navigation = true;
        } else {
            $navigation = false;
        }

        if (isset($setting['pagination']) && $setting['pagination']) {
            $pagination = true;
        } else {
            $pagination = false;
        }

        $data['items'] = array();
        $results = $setting['tdtestimonial_item'];

		if ($results) {
			foreach ($results as $result) {
				$timage = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
                if(!$timage) {
                    $timage = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
                }
				$data['items'][] = array(
                    'image' => $timage,
					'name'    => $result['name'][$this->config->get('config_language_id')],
                    'designation'   => $result['designation'][$this->config->get('config_language_id')],
                    'description' => $result['description'][$this->config->get('config_language_id')],
               );
			}
		}
		$data['config_module'] = array(
			'auto' => $auto,
            'navigation' => $navigation,
            'pagination' => $pagination,
            'speed' => $speed,
            'pimg' => $pimg
		);
        $data['module'] = $module++;
		return $this->load->view('extension/module/tdtestimonial', $data);
	}
}
