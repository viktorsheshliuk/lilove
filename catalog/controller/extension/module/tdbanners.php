<?php
class ControllerExtensionModuleTdbanners extends Controller {
	public function index($setting) {
        static $module = 0;
		$this->load->model('tool/image');
		$this->load->model('localisation/language');
		$data['code'] = $this->session->data['language'];
		$data['items'] = array();
		$data['host'] = HTTPS_SERVER?HTTPS_SERVER:HTTP_SERVER;
		$results = $setting['tdbanners_item'];
		if ($results) {
			foreach ($results as $result) {
				$data['items'][] = array(
                    'image' => $result['image'],
					'title'    => $result['title'][$this->config->get('config_language_id')],
                    'subtitle' => $result['subtitle'][$this->config->get('config_language_id')],
                    'url'   => $result['addurl'][$this->config->get('config_language_id')],
                );
			}
		}
		$data['config_module'] = array(
			'type' => (int) $setting['display_type'],
		);
		$data['module'] = $module++;
		return $this->load->view('extension/module/tdbanners', $data);
	}
}
