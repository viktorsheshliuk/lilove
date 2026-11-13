<?php
class ControllerModuleWebpImage extends Controller {
    const MODULE = 'webp_image';
    const PREFIX = 'webp_image';
    const MOD_FILE = 'webp_image_converter';
    const LINK = 'module/webp_image';
    const OCID = 38648;

    private $error = array();
    private $token;
    private $extension_link;

    public function __construct($registry){
      parent::__construct($registry);
      
      $this->token = isset($this->session->data['user_token']) ? 'user_token='.$this->session->data['user_token'] : 'token='.$this->session->data['token'];
      
      if (version_compare(VERSION, '3', '>=')) {
        $this->extension_link = $this->url->link('marketplace/extension', 'type=module&' . $this->token, 'SSL');
      } else if (version_compare(VERSION, '2.3', '>=')) {
        $this->extension_link = $this->url->link('extension/extension', 'type=module&' . $this->token, 'SSL');
      } else {
        $this->extension_link = $this->url->link('extension/module', $this->token, 'SSL');
      }
      
      if (version_compare(VERSION, '2.3', '>=')) {
        $this->load->language('extension/module/webp_image');
      } else {
        $this->load->language('module/webp_image');
      }
    }

    public function index() {
      $asset_path = 'view/gkd/webp_image/';
      if (defined('_JEXEC') && version_compare(VERSION, '2', '>=') && version_compare(VERSION, '3', '<')) {
        $asset_path = 'admin/' . $asset_path;
      }
      
      $data['_language'] = $this->language;
      $data['_img_path'] = $asset_path . 'img/';
      $data['_config'] = $this->config;
      $data['_url'] = $this->url;
      $data['token'] = $this->token;
      $data['OC_V2'] = version_compare(VERSION, '2', '>=');
      $data['OCID'] = self::OCID;
      $data['module'] = self::MODULE;
      $data['prefix'] = self::PREFIX.'_';
      
      $redirect_store = '';
      
      if (!version_compare(VERSION, '2', '>=')) {
        $this->document->addStyle($asset_path.'awesome/css/font-awesome.min.css');
        $this->document->addStyle($asset_path.'bootstrap.min.css');
        $this->document->addStyle($asset_path.'bootstrap-theme.min.css');
        $this->document->addScript($asset_path.'bootstrap.min.js');
      }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
      $this->document->addScript($asset_path.'toggler.js');
      $this->document->addStyle($asset_path.'prettyCheckable.css');
      $this->document->addScript($asset_path.'prettyCheckable.js');
      $this->document->addScript($asset_path.'itoggle.js');
      $this->document->addScript($asset_path.'selectize.js');
      $this->document->addStyle($asset_path.'slider.css');
      $this->document->addStyle($asset_path.'selectize.css');
      $this->document->addStyle($asset_path.'selectize.bootstrap3.css');
      $this->document->addStyle($asset_path.'gkd-theme.css');
      $this->document->addStyle($asset_path.'checkboxes.min.css');
      $this->document->addStyle($asset_path.'style.css');
      //$this->document->addStyle($asset_path.'animate.min.css');
      
      if (version_compare(VERSION, '3', '>=')) {
        $this->load->model('setting/modification');
        $modification = $this->model_setting_modification->getModificationByCode(self::MOD_FILE);
      } else if (version_compare(VERSION, '2', '>=')) {
        $this->load->model('extension/modification');
        $modification = $this->model_extension_modification->getModificationByCode(self::MOD_FILE);
      } else {
        $modification = false;
      }
  
      if (is_file(DIR_SYSTEM.'../vqmod/xml/'.self::MOD_FILE.'.xml')) {
        $data['module_version'] = simplexml_load_file(DIR_SYSTEM.'../vqmod/xml/'.self::MOD_FILE.'.xml')->version;
        $data['module_type'] = 'vqmod';
      } else if (is_file(DIR_SYSTEM.'../system/'.self::MOD_FILE.'.ocmod.xml')) {
        $data['module_version'] = simplexml_load_file(DIR_SYSTEM.'../system/'.self::MOD_FILE.'.ocmod.xml')->version;
        $data['module_type'] = 'ocmod';
      } else if ($modification) {
        $data['module_version'] = $modification['version'];
        $data['module_type'] = 'ocmod';
      } else {
        $data['module_version'] = 'not found';
        $data['module_type'] = '';
      }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
$dqgiT = false;
$pelDf = 1;
if (empty($pelDf) || $dqgiT) {

    if ($this->request->server["REQUEST_METHOD"] == "POST" && isset($this->request->post["lic_number"])) {
        if (!$this->request->post["lic_number"] ) {
            $data["error"] = "License number format is incorrect";
        }
        if (empty($data["error"])) {
			$gf13p=base64_encode('{
					"success":true,
					"info":"'. md5(HTTP_SERVER . self::MODULE) .'"
							}');
            $OztyT = (array) @json_decode($gf13p);
            if (!empty($OztyT["success"])) {
                $this->load->model("setting/setting");
                $this->model_setting_setting->editSetting(md5(HTTP_SERVER . self::MODULE), array(md5(HTTP_SERVER . self::MODULE) => $OztyT["info"]));
                $this->request->server["REQUEST_METHOD"] = "GET";
                if (!$dqgiT || isset($this->request->get["refresh"])) {
                    $this->session->data["success"] = $OztyT["success"];
                    if (version_compare(VERSION, "2", ">=")) {
                        $this->response->redirect($this->url->link(self::LINK, $this->token, "SSL"));
                    } else {
                        $this->redirect($this->url->link(self::LINK, $this->token, "SSL"));
                    }
                }
            }
        }
    }

}
	      
      if (isset($this->session->data['success'])) {
        $data['success'] = $this->session->data['success'];
        unset($this->session->data['success']);
      } else $data['success'] = '';
      
      if (isset($this->session->data['error'])) {
        $data['error'] = $this->session->data['error'];
        unset($this->session->data['error']);
      } else $data['error'] = '';
      
        $this->document->setTitle($this->language->get('title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
          $this->model_setting_setting->editSetting('webp_image', $this->request->post);

          if (version_compare(VERSION, '3', '>=')) {
            $new_post = array();
            
            foreach ($this->request->post as $k => $v) {
              $new_post['module_'.$k] = $v;
            }
            
            $this->model_setting_setting->editSetting('module_webp_image', $new_post);
          }

          $this->session->data['success'] = $this->language->get('text_success');

          if (version_compare(VERSION, '2', '>=')) {
            $this->response->redirect($this->url->link(self::LINK, $this->token . $redirect_store, 'SSL'));
          } else {
            $this->redirect($this->url->link(self::LINK, $this->token . $redirect_store, 'SSL'));
          }
            
        }

        if (!function_exists('imagewebp')) {
          $this->error['warning'] = 'imagewebp() function is not available, try to contact your host to ask if they can enable webp support for GD, or try to change php version to higher version';
        }
        
        if (isset($this->error['warning'])) {
          $data['warning'] = $this->error['warning'];
        } else {
          $data['warning'] = '';
        }
        
        $data['heading_title'] = $this->language->get('heading_title');
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_edit'] = $this->language->get('text_edit');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_header'] = $this->language->get('entry_header');
        $data['entry_content_top'] = $this->language->get('entry_content_top');
        $data['entry_content_bottom'] = $this->language->get('entry_content_bottom');
        $data['entry_footer'] = $this->language->get('entry_footer');
        $data['entry_quality'] = $this->language->get('entry_quality');
        $data['text_clear_webp_cache'] = $this->language->get('text_clear_webp_cache');

        $data['token'] = $this->token;


        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', $this->token, true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->extension_link
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('title'),
            'href' => $this->url->link('module/webp_image', $this->token, true)
        );

        $data['action'] = $this->url->link('module/webp_image', $this->token, true);

        $data['cancel'] = $this->extension_link;

        if (isset($this->request->post['webp_image_status'])) {
          $data['webp_image_status'] = $this->request->post['webp_image_status'];
        } else {
          $data['webp_image_status'] = $this->config->get('webp_image_status');
        }

        if (isset($this->request->post['webp_image_quality'])) {
          $data['webp_image_quality'] = $this->request->post['webp_image_quality'];
        } else {
          $data['webp_image_quality'] = $this->config->get('webp_image_quality');
        }
        
        $data['webp_image_quality'] = $data['webp_image_quality'] ? $data['webp_image_quality'] : 90;
        
        if (isset($this->request->post['webp_image_header'])) {
          $data['webp_image_header'] = $this->request->post['webp_image_header'];
        } else {
          $data['webp_image_header'] = $this->config->get('webp_image_header');
        }
        
        if (isset($this->request->post['webp_image_content_top'])) {
          $data['webp_image_content_top'] = $this->request->post['webp_image_content_top'];
        } else {
          $data['webp_image_content_top'] = $this->config->get('webp_image_content_top');
        }
        
        if (isset($this->request->post['webp_image_content_bottom'])) {
          $data['webp_image_content_bottom'] = $this->request->post['webp_image_content_bottom'];
        } else {
          $data['webp_image_content_bottom'] = $this->config->get('webp_image_content_bottom');
        }
        
        if (isset($this->request->post['webp_image_footer'])) {
          $data['webp_image_footer'] = $this->request->post['webp_image_footer'];
        } else {
          $data['webp_image_footer'] = $this->config->get('webp_image_footer');
        }
        
        $this->load->model('tool/image');
        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 80, 60);
		
        if (isset($this->request->post['webp_image_img'])) {
          $data['webp_image_img'] = $this->request->post['webp_image_img'];
        } else if ($this->config->get('webp_image_img')){
          $data['webp_image_img'] = $this->config->get('webp_image_img');
        } else {
          $data['webp_image_img'] = $this->config->get('config_logo');
        }
        
        if (!empty($data['webp_image_img']) && file_exists(DIR_IMAGE . $data['webp_image_img'])) {
          //$data['thumbnail'] = $this->model_tool_image->resize($this->request->post['webp_image_img'], 100, 100);
          $data['thumbnail'] = HTTP_CATALOG.'image/'.$data['webp_image_img'];
          $thumb_file = DIR_IMAGE . $data['webp_image_img'];
        } else {
          $data['thumbnail'] = HTTP_CATALOG.'image/'.$this->config->get('config_logo');
          $thumb_file = DIR_IMAGE . $this->config->get('config_logo');
        }
        
        $data['orig_size'] = $this->getSize($thumb_file);
        $data['orig_type'] = pathinfo($thumb_file, PATHINFO_EXTENSION);
        
        if(VERSION >= '2.0.0.0'){
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        if(VERSION < '2.2.0.0'){
            $additional_extension = '.tpl';
        } else {
            $additional_extension = '';
        }

        if (VERSION >= '3.0.2.0') {
            $this->config->set('template_engine', 'template');
        }
        $view = $this->load->view('module/webp_image'.$additional_extension, $data);
        $this->response->setOutput($view);
      } else {
          foreach ($data as $k => $v) {
              $this->data[$k] = $v;
          }
          $this->template = 'module/webp_image15.tpl';
          $this->children = array(
              'common/header',
              'common/footer'
          );
          $this->response->setOutput($this->render());
      }
    }

    private function getSize($file) {
      if (file_exists($file)) {
        $size = filesize($file);

        $suffix = array(
          'B',
          'KB',
          'MB',
        );

        $i = 0;

        while (($size / 1024) > 1) {
          $size = $size / 1024;
          $i++;
        }
        
        return round(substr($size, 0, strpos($size, '.') + 4), 2) . $suffix[$i];
      }
    }
    
    public function test() {
      $orig = $this->request->post['image'];
      $quality = (int) $this->request->post['quality'];
      
      if (!file_exists(DIR_IMAGE.$orig)) {
        die('Original image not found');
      }
      
      $this->config->set('webp_image_quality', $quality);
      
      $this->load->model('tool/webp_image');
      $webp = $this->model_tool_webp_image->convert($orig, true);
      
      $origSize = filesize(DIR_IMAGE.$orig);
      $newSize = filesize(DIR_IMAGE.'../'.$webp);
      
      $fileSize = $this->getSize(DIR_IMAGE.'../'.$webp);
      
      $percentageDifference = round((($origSize - $newSize) / $newSize) * 100);
      
      $percentageDifference = round((1 - $origSize / $newSize) * 100);
      
      if ($webp) {
        echo '<div class="img-thumbnail" style="margin-bottom:5px"><img class="img-responsive" src="'.HTTP_CATALOG.$webp.'?q='.$quality.'" alt=""></div>';
        echo '<div>
        <b>WEBP Image</b><br/>
        <i class="fa fa-file-image-o"></i> '. $fileSize . '<br/>
        <i class="fa fa-magic"></i> Quality: '. $quality . '%<br/><br/>';
        if ($percentageDifference > 0) {
          echo '<span style="color:#e15231;font-weight:bold"><i class="fa fa-exclamation-triangle"></i> '. $percentageDifference . '% heavier</span><br/>';
        } else {
          echo '<span style="color:#84ac6e;font-weight:bold"><i class="fa fa-leaf"></i> '. abs($percentageDifference) . '% lighter</span><br/>';
        }
        echo '</div>';
      } else {
        echo '<div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> No test image, please select an image and save settings</div>';
      }
      
      exit;
    }
    
  public function process() {
    if (!$this->user->hasPermission('modify', self::LINK)) {
      $this->load->language(self::LINK);
      die($this->language->get('text_demo_mode'));
    }
    
    //sleep(1);
    ini_set('memory_limit', -1);
    $start_time = time();
    
    if (!empty($this->request->get['start'])) {
      $this->load->model('tool/webp_image');
      $pagesToCache = $this->model_tool_webp_image->getPageList();
      
      $total_items = count($pagesToCache);
      
      $init = ($this->request->get['start'] == 'init') ? true : false;
      
      if ($init) {
        $count = 0;
        $this->removeWebp(DIR_IMAGE.'cache', $count);
      }
      
      $start = (int) $this->request->get['start'];
      
      if (defined('GKD_CRON')) {
        $limit = 9999999999;
      } else {
        $limit = 30;
      }
      
      if ($init) {}
      
      $items_processed = 0;
      
      foreach ($pagesToCache as $i => $url) {
        if ($i < $start) {
          continue;
        }
        
        if (defined('GKD_CRON') && (time() - 10) > $start_time) {
          break;
        }
        
        if ($items_processed > $limit) {
          break;
        }
        
        @file_get_contents($url);
        
        $items_processed++;
      }
      
      $processed = $start + $items_processed;
      
      if ($processed > $total_items) {
        $processed = $total_items;
      }
      
      if ($total_items == 0 || !$items_processed) {
        $progress = 100;
      } else {
        $progress = floor(($processed / $total_items) * 100);
      }
      
      header('Content-type: application/json');
      echo json_encode(array(
        'success'=> 1,
        'processed' => $processed,
        'progress' => $progress,
        'finished' => (($processed >= $total_items) || !$items_processed),
      ));
      
    }
	}
  
  private function removeWebp($dir, &$count){
    $elements = glob($dir.'/*');
    
    foreach ($elements as $element) {
      if (is_dir($element)) {
        $this->removeWebp($element, $count);
      }
      
      if (is_file($element)) {
        if (substr($element, -4) == 'webp') {
          unlink($element);
          $count++;
        }
      }
    }
  }

  public function clearWebpCache() {
    $json = [];
    $count = 0;
    $this->removeWebp(DIR_IMAGE.'cache', $count);
    $json['count'] = $count;
    $json['success'] = 'Success! Webp cache was cleared!';
    $this->response->addHeader('Content-Type: application/json');
    $this->response->setOutput(json_encode($json));
  }

  protected function validate() {
    if (!$this->user->hasPermission('modify', self::LINK)) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    return !$this->error;
  }
}