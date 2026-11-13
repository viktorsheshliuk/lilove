<?php
class ControllerExtensionModuleMangoSlideshow extends Controller {
	public function index($setting) {
    $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
		$this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');
    
		static $module = 0;

		$this->load->model('tool/image');

		$data['mango_slideshows'] = array();
    $data['css_class'] = (isset($setting['css_class'])) ? $setting['css_class'] : '';
    $data['height'] = $setting['height'];
    $data['width'] = $setting['width'];
    $data['height_mobile'] = $setting['height_mobile'];
    
    $results = array(); 
    // Sort Order for slideshow
    if(isset($setting['slideshow_image'][$this->config->get('config_language_id')])){
      $results = $setting['slideshow_image'][$this->config->get('config_language_id')];
      usort($results, function($a, $b){
        if($a['sort_order'] === $b['sort_order']){
          return 0;
        }
        return $a['sort_order'] > $b['sort_order'] ? 1 : -1;
      });
   
      foreach ($results as $result) {
        if (is_file(DIR_IMAGE . $result['image'])) {
          $image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
          
          if (is_file(DIR_IMAGE . $result['image-mobile'])) {
            $image_mobile = $this->model_tool_image->resize($result['image-mobile'], $setting['width_mobile'], $setting['height_mobile']);
          }else{
            $image_mobile = $image;
          }
          $data['mango_slideshows'][] = array(
            // 'text_1'        => html_entity_decode($result['text_1']),
            // 'text_1_color'  => $result['text_1_color'],
            // 'text_2'        => html_entity_decode($result['text_2']),
            // 'text_2_color'  => $result['text_2_color'],
            // 'button_text'   => $result['button_text'],
            // 'button_style'  => $result['button_style'],
            // 'align'         => $result['align'],
            'link'          => $result['link'],
            'image'         => $image,
            'image_mobile'  => $image_mobile, 
          );
        }
      }
      
      $data['module'] = $module++;

      return $this->load->view('extension/module/mango_slideshow', $data);
    }
	}
}