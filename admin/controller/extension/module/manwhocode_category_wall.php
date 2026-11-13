<?php
class ControllerExtensionModuleManwhocodeCategoryWall extends Controller {
	private $error = array();

	public function index() {
		$this->load->model('localisation/language');
		$this->load->language('extension/module/manwhocode_category_wall');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('setting/module');

		$this->load->model('localisation/language');
		
		$data['langs']    = $this->model_localisation_language->getLanguages();
		$data['langs_id'] = $this->config->get('config_language_id');

		if (!isset($this->request->get['module_id'])) {
			$data['apply'] = false;
		} else {
			$data['apply'] = true;
		}

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_setting_module->addModule('manwhocode_category_wall', $this->request->post);
			} else {
				$this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
			}
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		if (isset($this->error['item_width'])) {
			$data['error_item_width'] = $this->error['item_width'];
		} else {
			$data['error_item_width'] = '';
		}

		if (isset($this->error['item_gap'])) {
			$data['error_item_gap'] = $this->error['item_gap'];
		} else {
			$data['error_item_gap'] = '';
		}

		if (isset($this->error['width'])) {
			$data['error_width'] = $this->error['width'];
		} else {
			$data['error_width'] = '';
		}

		if (isset($this->error['height'])) {
			$data['error_height'] = $this->error['height'];
		} else {
			$data['error_height'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/manwhocode_category_wall', 'user_token=' . $this->session->data['user_token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/manwhocode_category_wall', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/manwhocode_category_wall', 'user_token=' . $this->session->data['user_token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/manwhocode_category_wall', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['item_width'])) {
			$data['item_width'] = $this->request->post['item_width'];
		} elseif (!empty($module_info)) {
			$data['item_width'] = $module_info['item_width'];
		} else {
			$data['item_width'] = '200px';
		}

		if (isset($this->request->post['item_gap'])) {
			$data['item_gap'] = $this->request->post['item_gap'];
		} elseif (!empty($module_info)) {
			$data['item_gap'] = $module_info['item_gap'];
		} else {
			$data['item_gap'] = '20px';
		}

		if (isset($this->request->post['title'])) {
			$data['title'] = $this->request->post['title'];
		} elseif (!empty($module_info)) {
			$data['title'] = $module_info['title'];
		} else {
			$data['title'] = '';
		}

		if (isset($this->request->post['retina_status'])) {
			$data['retina_status'] = $this->request->post['retina_status'];
		} elseif (!empty($module_info)) {
			$data['retina_status'] = $module_info['retina_status'];
		} else {
			$data['retina_status'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}

		if (isset($this->request->post['limit'])) {
			$data['limit'] = $this->request->post['limit'];
		} elseif (!empty($module_info)) {
			$data['limit'] = $module_info['limit'];
		} else {
			$data['limit'] = 4;
		}

    if (isset($this->request->post['width'])) {
			$data['width'] = $this->request->post['width'];
		} elseif (!empty($module_info)) {
			$data['width'] = $module_info['width'];
		} else {
			$data['width'] = 200;
		}

		if (isset($this->request->post['height'])) {
			$data['height'] = $this->request->post['height'];
		} elseif (!empty($module_info)) {
			$data['height'] = $module_info['height'];
		} else {
			$data['height'] = 200;
		}

		if (isset($this->request->post['xs_status'])) {
			$data['xs_status'] = $this->request->post['xs_status'];
		} elseif (!empty($module_info)) {
			$data['xs_status'] = $module_info['xs_status'];
		} else {
			$data['xs_status'] = false;
		}

		if (isset($this->request->post['sm_status'])) {
			$data['sm_status'] = $this->request->post['sm_status'];
		} elseif (!empty($module_info)) {
			$data['sm_status'] = $module_info['sm_status'];
		} else {
			$data['sm_status'] = false;
		}

		if (isset($this->request->post['md_status'])) {
			$data['md_status'] = $this->request->post['md_status'];
		} elseif (!empty($module_info)) {
			$data['md_status'] = $module_info['md_status'];
		} else {
			$data['md_status'] = false;
		}

		if (isset($this->request->post['lg_status'])) {
			$data['lg_status'] = $this->request->post['lg_status'];
		} elseif (!empty($module_info)) {
			$data['lg_status'] = $module_info['lg_status'];
		} else {
			$data['lg_status'] = false;
		}

		if (isset($this->request->post['xl_status'])) {
			$data['xl_status'] = $this->request->post['xl_status'];
		} elseif (!empty($module_info)) {
			$data['xl_status'] = $module_info['xl_status'];
		} else {
			$data['xl_status'] = false;
		}


    $this->load->model('catalog/category');

	  if (isset($this->request->post['category'])) {
			$categories = $this->request->post['category'];
		} elseif (!empty($module_info)) {
			$categories = $module_info['category'];
		} else {
			$categories = array();
		}

		$data['categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);
			if ($category_info) {
				$data['categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'        => $category_info['name']?$category_info['name']:$category_info['category_id']
				);
			}
		}

		$data['header']      = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer']      = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/manwhocode_category_wall', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/manwhocode_category_wall')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (!$this->request->post['width']) {
			$this->error['width'] = $this->language->get('error_width');
		}

		if (!$this->request->post['item_width']) {
			$this->error['item_width'] = $this->language->get('error_item_width');
		}

		if (!$this->request->post['item_gap']) {
			$this->error['item_gap'] = $this->language->get('error_item_gap');
		}

		if (!$this->request->post['height']) {
			$this->error['height'] = $this->language->get('error_height');
		}

		return !$this->error;
	}
}
