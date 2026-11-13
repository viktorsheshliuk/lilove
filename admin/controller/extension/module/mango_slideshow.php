<?php
class ControllerExtensionModuleMangoSlideshow extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/mango_slideshow');

		$this->document->setTitle($this->language->get('heading_title'));
    // $this->document->addScript('view/javascript/jquery/colorpicker/js/bootstrap-colorpicker.min.js');
    // $this->document->addStyle('view/javascript/jquery/colorpicker/css/bootstrap-colorpicker.min.css');

		$this->load->model('setting/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_setting_module->addModule('mango_slideshow', $this->request->post);
			} else {
				$this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

    $data['ckeditor'] = $this->config->get('config_editor_default');
    
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
				'href' => $this->url->link('extension/module/mango_slideshow', 'user_token=' . $this->session->data['user_token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/mango_slideshow', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/mango_slideshow', 'user_token=' . $this->session->data['user_token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/mango_slideshow', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
    
    if (isset($this->request->post['css_class'])) {
			$data['css_class'] = $this->request->post['css_class'];
		} elseif (!empty($module_info['css_class'])) {
			$data['css_class'] = $module_info['css_class'];
		} else {
			$data['css_class'] = '';
		}
    
    if (isset($this->request->post['width'])) {
			$data['width'] = $this->request->post['width'];
		} elseif (!empty($module_info['width'])) {
			$data['width'] = $module_info['width'];
		} else {
			$data['width'] = '';
		}
    
    if (isset($this->request->post['height_mobile'])) {
			$data['height_mobile'] = $this->request->post['height_mobile'];
		} elseif (!empty($module_info['height_mobile'])) {
			$data['height_mobile'] = $module_info['height_mobile'];
		} else {
			$data['height_mobile'] = '';
		}
    
    if (isset($this->request->post['width_mobile'])) {
			$data['width_mobile'] = $this->request->post['width_mobile'];
		} elseif (!empty($module_info['width_mobile'])) {
			$data['width_mobile'] = $module_info['width_mobile'];
		} else {
			$data['width_mobile'] = '';
		}
    
    if (isset($this->request->post['height'])) {
			$data['height'] = $this->request->post['height'];
		} elseif (!empty($module_info['height'])) {
			$data['height'] = $module_info['height'];
		} else {
			$data['height'] = '';
		}
    
    $data['user_token'] = $this->session->data['user_token'];
    
    // slideshow image start
    
    $this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();
    $data['lang'] = $this->language->get('lang');
    
    $this->load->model('tool/image');

		if (isset($this->request->post['slideshow_image'])) {
			$slideshow_images = $this->request->post['slideshow_image'];
		} elseif (!empty($module_info['slideshow_image'])) {
			$slideshow_images = $module_info['slideshow_image'];
		} else {
			$slideshow_images = array();
		}
    
    $data['slideshow_images'] = array();
    
		foreach ($slideshow_images as $key => $value) {
      foreach ($value as $slideshow_image) {
        if (is_file(DIR_IMAGE . $slideshow_image['image'])) {
          $image = $slideshow_image['image'];
          $thumb = $slideshow_image['image'];
        } else {
          $image = '';
          $thumb = 'no_image.png';
        }
        if (is_file(DIR_IMAGE . $slideshow_image['image-mobile'])) {
          $image_mobile = $slideshow_image['image-mobile'];
          $thumb_mobile = $slideshow_image['image-mobile'];
        } else {
          $image_mobile = '';
          $thumb_mobile = 'no_image.png';
        }

        $data['slideshow_images'][$key][] = array(
          // 'text_1'        => $slideshow_image['text_1'],
          // 'text_1_color'  => $slideshow_image['text_1_color'],
          // 'text_2'        => $slideshow_image['text_2'],
          // 'text_2_color'  => $slideshow_image['text_2_color'],
          // 'button_text'   => $slideshow_image['button_text'],
          // 'button_style'  => $slideshow_image['button_style'],
          // 'align'         => $slideshow_image['align'],
          'link'          => $slideshow_image['link'],
          'image'         => $image,
          'image-mobile'  => $image_mobile,
          'thumb'         => $this->model_tool_image->resize($thumb, 100, 100),
          'thumb-mobile'  => $this->model_tool_image->resize($thumb_mobile, 100, 100),
          'sort_order'    => $slideshow_image['sort_order']
        );
      }
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
    
    // slideshow Image END
    
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/mango_slideshow', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/mango_slideshow')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
    
		return !$this->error;
	}
}