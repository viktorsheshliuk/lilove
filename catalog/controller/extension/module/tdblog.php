<?php
class ControllerExtensionModuleTdblog extends Controller {
	public function index($setting) {
		static $module = 0;
		$this->load->language('extension/module/tdblog');
		$this->load->model('tdmodules/tdblog');
		$this->load->model('tool/image');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['subheading_title'] = $this->language->get('subheading_title');
		$data['all_blogs'] = $this->url->link('information/tdblog/blogs');
		$data['blogs'] = array();

		if (!$setting['limit']) {
			$setting['limit'] = 4;
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
		foreach ($this->model_tdmodules_tdblog->getBlogsByModule($setting['module_id'], $setting['limit']) as $result) {
			$total_comments = $this->model_tdmodules_tdblog->getTotalBlogComments($result['tdblog_id']);
			$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
			if(!$image) {
				$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
			}

			$data['blogs'][] = array(
				'tdblog_id'  => $result['tdblog_id'],
				'image' 	  => $image,
				'title'       => html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $setting['char_limit']) . '...',
				'date_added'  => date('M d, Y', strtotime($result['date_added'])),
				'total_comments' => number_format($total_comments),
				'href'        => $this->url->link('information/tdblog', 'tdblog_id=' . $result['tdblog_id'])
			);
		}
		$data['tdblogs_slide'] = array(
            'auto' => $auto,
            'navigation' => $navigation,
            'pagination' => $pagination,
            'speed' => $speed
        );
         $data['module'] = $module++;
		return $this->load->view('extension/module/tdblog', $data);
	}
}