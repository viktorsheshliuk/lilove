<?php
class ControllerExtensionModuleManwhocodeCategoryWall extends Controller {
	public function index($setting) {
		static $module = 0;

		$language_id = $this->config->get('config_language_id');

		$this->load->language('extension/module/manwhocode_category_wall');
		$this->load->model('tool/image');
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');

		$data['item_width'] = $setting['item_width'];
		$data['item_gap'] = $setting['item_gap'];
		
		$w = $setting['width'];
		$h = $setting['height'];

		$data['class'] = '';
		$setting['xs_status'] ? $data['class'] .= 'hidden-xs':'';
		$setting['sm_status'] ? $data['class'] .= ' hidden-sm':'';
		$setting['md_status'] ? $data['class'] .= ' hidden-md':'';
		$setting['lg_status'] ? $data['class'] .= ' hidden-lg':'';
		$setting['xl_status'] ? $data['class'] .= ' hidden-xl':'';

		$setting['limit'] < 4 ? $data['class_font'] = 'h5' : $data['class_font'] = 'h6';

		if(isset($setting['retina_status']) && $setting['retina_status']) {
			$data['retina_image'] = $setting['retina_status'];
		} else {
			$data['retina_image'] = false;
		}

		$categories_array = $setting['category'];

    	$categories = array();

    	foreach ($categories_array as $category) {
			$category_data = $this->model_catalog_category->getCategory($category);

			if ($category_data) {
				$categories[] = $category_data;
			}
		}

    	$data['heading_title'] = $setting['title'][$language_id];

		foreach ($categories as $category) {

			$children = $this->model_catalog_category->getCategories($category['category_id']);
			$children = array_slice($children, 0, $setting['limit']);

			$children_data   = array();

			foreach($children as $child) {

				$filter_data = array(
					'filter_category_id' => $child['category_id'], 
					'filter_sub_category' => true
				);

				
				$children_data[] = array(
					'category_id' => $child['category_id'],
					'name'        => $child['name'],
					'count'       => $this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '',
					'href'        => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
				);
			}


			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);

	      if ($category['image']) {
	        $image = $this->model_tool_image->resize($category['image'], $w, $h);

	        if ($data['retina_image']) {
	          $image_2x = $this->model_tool_image->resize($category['image'], $w*2, $h*2);
	          $image_3x = $this->model_tool_image->resize($category['image'], $w*3, $h*3);
	          $image_4x = $this->model_tool_image->resize($category['image'], $w*4, $h*4);
	        }

	      	} else {

	        $image = $this->model_tool_image->resize('placeholder.png', $w, $h);

	        if ($data['retina_image']) {
	          $image_2x = $this->model_tool_image->resize('placeholder.png', $w*2, $h*2);
	          $image_3x = $this->model_tool_image->resize('placeholder.png', $w*3, $h*3);
	          $image_4x = $this->model_tool_image->resize('placeholder.png', $w*4, $h*4);
	        }
	      }


			$data['categories'][] = array(
				'category_id' => $category['category_id'],
		        'image'       => $image,
				'image_2x'    => $data['retina_image'] ? $image_2x : '',
			    'image_3x'    => $data['retina_image'] ? $image_3x : '',
			    'image_4x'    => $data['retina_image'] ? $image_4x : '',		        
				'name'        => $category['name'],
				'count'       => $this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '',
				'children'    => $children_data,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);
		}

		$data['module'] = $module++;

		if ($data['categories']) {
			return $this->load->view('extension/module/manwhocode_category_wall', $data);
		}
	}
}
