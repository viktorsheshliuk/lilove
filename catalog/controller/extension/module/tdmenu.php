<?php
class ControllerExtensionModuleTdmenu extends Controller {

	public function index() {

		$this->load->model('catalog/category');
		$this->load->model('tool/image');
		$this->load->model('catalog/information');
		$this->load->model('catalog/manufacturer');
		$this->language->load('common/footer');
	    $this->language->load('extension/module/category');

		$data['direction'] = $this->language->get('direction');

		$baname = $this->config->get('tdmenu_brandsdname');
		$data['brands_text'] = $newbranddname = !empty($baname[$this->config->get('config_language_id')]) ? $baname[$this->config->get('config_language_id')] : $this->language->get('text_manufacturer');

		$caname = $this->config->get('tdmenu_mobilemenuname');
		$data['categ_text'] = !empty($caname[$this->config->get('config_language_id')]) ? $caname[$this->config->get('config_language_id')] : $this->language->get('heading_title');

		$infodrname = $this->config->get('tdmenu_infodname');
		$infodrnamenew = !empty($infodrname[$this->config->get('config_language_id')]) ? $infodrname[$this->config->get('config_language_id')] : false;
		$data['tophomelink'] = $this->config->get('tdmenu_tophomelink') ? $this->config->get('tdmenu_tophomelink') : 'no';

		$this->language->load('extension/module/account');
	    $data['mitems'] = array();
		$mitems = array();
		$items = $this->config->get('tdmenu_item');
		$tdmenu_showstatus = $this->config->get('tdmenu_showstatus');
		if ($items) {
		 	foreach ($items as $iorder) {
				if (isset($iorder['sorder'])) {
            	    if(is_numeric($iorder['sorder'])) { $itemsorder[] = $iorder['sorder']; } else { $itemsorder[] = 99; }
				} else {
					$itemsorder[] = 99;
				}
         	}
		 	array_multisort($itemsorder,SORT_NUMERIC,$items);
		}

		$tdmenucache = $this->config->get('tdmenu_cache') ? true : false;
		$c_items = false;
		if ($items && !$tdmenu_showstatus) { /*check for items*/
			$increaseid = 0;
			if ($tdmenucache) {
                $c_items = $this->cache->get('tdmenu.items.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id'));
            } else {
                $c_items= false;
            }
		 	if (!$c_items) { /* check for cache */
				foreach ($items as $item) { /* loop trough items */
			  		$increaseid++;
			  		$item_name = '';
			  		if ($item['type'] == 'cat') {
	           			$katid = $item['category_id'];
			   			$cssid = 'supcat' . $item['category_id'];
	           			$kat_info = $this->model_catalog_category->getCategory($katid);
			    		if ($kat_info) {
			     			$item_name = $kat_info['name'];
				 			if (isset($item['customname'][$this->config->get('config_language_id')]) && strlen($item['customname'][$this->config->get('config_language_id')]) > 2) $item_name = $item['customname'][$this->config->get('config_language_id')];
				 			$item_view = $item['view'];
				 			$item_id = $kat_info['category_id'];
				 			$item_url = $this->url->link('product/category', 'path=' . $item_id);
				 			$firstkids_data = array();
				 			if($item['subcatdisplay'] != 'none') {
				 				$firstkids = $this->model_catalog_category->getCategories($item_id);
				 				foreach ($firstkids as $firstkid) {
				  					$secondkids_data = array();
				  					if ($firstkid['image']) {
										$image = $this->model_tool_image->resize($firstkid['image'], $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
				  					} else {
										$image = $this->model_tool_image->resize('no_image.png', $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
				  					}

									if ($item['subcatdisplay'] != 'none' && $item['subcatdisplay'] != 'level1') {
				  						$secondkids = $this->model_catalog_category->getCategories($firstkid['category_id']);
				  						foreach ($secondkids as $secondkid) {
											$thirdkids_data = array();
											if ($item['subcatdisplay'] != 'none' && $item['subcatdisplay'] != 'level1') {
												$thirdkids = $this->model_catalog_category->getCategories($secondkid['category_id']);
												foreach ($thirdkids as $thirdkid) {
													$thirdkids_data[] = array(
														'category_id' => $thirdkid['category_id'],
														'cssid'       => "morecatc" . $thirdkid['category_id'],
														'name'        => $thirdkid['name'],
														'href'        => $this->url->link('product/category', 'path=' . $firstkid['category_id'] . '_' . $secondkid['category_id'] . '_' . $thirdkid['category_id'])
													);
												}
											}

											if ($secondkid['image']) {
												$secondimage = $this->model_tool_image->resize($secondkid['image'], $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
											} else {
												$secondimage = $this->model_tool_image->resize('no_image.png', $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
											}

											$secondkids_data[] = array(
												'category_id' => $secondkid['category_id'],
												'cssid'       => "supcat" . $secondkid['category_id'],
												'name'        => $secondkid['name'],
												'thumb'	      => $secondimage,
												'ggchildren'  => $thirdkids_data,
												'href'        => $this->url->link('product/category', 'path=' . $item_id . '_' . $firstkid['category_id'] . '_' . $secondkid['category_id'])
											);
				  						}
									}

				  					$firstkids_data[] = array(
										'category_id' => $firstkid['category_id'],
										'cssid'       => "supcat" . $firstkid['category_id'],
										'name'        => $firstkid['name'],
										'thumb'       => $image,
										'gchildren'   => $secondkids_data,
										'href'        => $this->url->link('product/category', 'path=' . $item_id . '_' . $firstkid['category_id'])
									);
				 				}
				 			}

				 			if ($kat_info['image']) {
								$item_image = $this->model_tool_image->resize($kat_info['image'], 100, 100);
				 			} else {
								$item_image = $this->model_tool_image->resize('no_image.png', 100, 100);
				 			}
			    		}
			  		} elseif ($item['type'] == 'more' || $item['type'] == 'more2') {
				 		$itm = ($item['type'] == 'more2') ? $this->config->get('tdmenu_more2_title') : $this->config->get('tdmenu_more_title');
					 	$item_name = !empty($itm[$this->config->get('config_language_id')]) ? $itm[$this->config->get('config_language_id')] : 'More';
				 		$cssid = 'notcat' . $increaseid;
				 		$item_view = $item['view'];
				 		$item_id = '';
				 		$item_url = '';
				 		$firstkids_data = array();
				 		$order = array();
				 		$firstkids = ($item['type'] == 'more2') ? $this->config->get('tdmenu_more2') : $this->config->get('tdmenu_more');
				 		if (!is_array($firstkids)) $firstkids = array();
						foreach ($firstkids as $kid) {
				 			$firstkid = $this->model_catalog_category->getCategory($kid);
				 			if($firstkid) {
				  				$secondkids_data = array();
				  				if ($firstkid['image']) {
									$image = $this->model_tool_image->resize($firstkid['image'], $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
	             				} else {
									$image = $this->model_tool_image->resize('no_image.png', $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
				  				}
				  				if($item['subcatdisplay'] != 'none') {
				  					$secondkids = $this->model_catalog_category->getCategories($firstkid['category_id']);
				  					foreach ($secondkids as $secondkid) {
				    					$thirdkids_data = array();
				   						if ($item['subcatdisplay'] != 'none' && $item['subcatdisplay'] != 'level1') {
				    						$thirdkids = $this->model_catalog_category->getCategories($secondkid['category_id']);
											foreach ($thirdkids as $thirdkid) {
												$thirdkids_data[] = array(
													'category_id' => $thirdkid['category_id'],
													'cssid'       => "morecatc" . $thirdkid['category_id'],
													'name'        => $thirdkid['name'],
													'href'        => $this->url->link('product/category', 'path=' . $firstkid['category_id'] . '_' . $secondkid['category_id'] . '_' . $thirdkid['category_id'])
												);
											}
				   						}

				   						if ($secondkid['image']) {
											$secondimage = $this->model_tool_image->resize($secondkid['image'], $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
	               						} else {
											$secondimage = $this->model_tool_image->resize('no_image.png', $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
				   						}

			    						$secondkids_data[] = array(
											'category_id' => $secondkid['category_id'],
											'cssid'       => "morecat" . $secondkid['category_id'],
											'name'        => $secondkid['name'],
											'thumb'       => $secondimage,
											'ggchildren'  => $thirdkids_data,
											'href'        => $this->url->link('product/category', 'path=' . $firstkid['category_id'] . '_' . $secondkid['category_id'])
										);
				  					}
								}
				  				$firstkids_data[] = array(
									'category_id' => $firstkid['category_id'],
									'cssid'       => "morecat" . $firstkid['category_id'],
									'name'        => $firstkid['name'],
									'thumb'       => $image,
									'order'       => $firstkid['sort_order'],
									'gchildren'   => $secondkids_data,
									'href'        => $this->url->link('product/category', 'path=' . $firstkid['category_id'])
								);
				 			}
						}

				 		foreach ($firstkids_data as $itemsmore) {
	                		$order[] = $itemsmore['order'];
	             		}
						array_multisort($order,SORT_NUMERIC,$firstkids_data);
				 		$item_image = false;
			  		} elseif ($item['type'] == 'infol') {
			   			$info_id = $item['information_id'];
			   			$cssid = 'notcat' . $increaseid;
			   			$item_view = '';
	           			$info_info = $this->model_catalog_information->getInformation($info_id);
			   			if ($info_info) {
				 			$item_name = $info_info['title'];
				 			$item_id = $info_info['information_id'];
				 			$item_url = $this->url->link('information/information', 'information_id=' . $item_id);
				 			$firstkids_data = array();
				 			$item_image = false;
			   			}
					} elseif ($item['type'] == 'infod') {
						$item_name = $infodrnamenew ? $infodrnamenew : $this->language->get('text_information');
						$item_view = '';
				 		$cssid = 'notcat' . $increaseid;
				 		$item_id = '';
				 		$item_url = '';
				 		$firstkids_data = array();
				 		foreach ($this->model_catalog_information->getInformations() as $infolinks) {
							$firstkids_data[] = array(
								'category_id' => false,
								'cssid'       => "supinfo" . $infolinks['information_id'],
								'name'        => $infolinks['title'],
								'gchildren'   => false,
								'href'        => $this->url->link('information/information', 'information_id=' . $infolinks['information_id'])
							);
						}
				 		$item_image = false;
			  		} elseif ($item['type'] == 'mand') {
			  			$item_name = $newbranddname;
				 		$item_view = $item['view'];
				 		$cssid = 'notcat' . $increaseid;
						$item_id = '';
				 		$item_url = '';
				 		$firstkids_data = array();
				 		foreach ($this->model_catalog_manufacturer->getManufacturers() as $brandlinks) {
				     		if ($brandlinks['image']) {
					  			$image = $this->model_tool_image->resize($brandlinks['image'],  $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
	                 		} else {
				 	  			$image = $this->model_tool_image->resize('no_image.png',  $this->config->get('tdmenu_image_width'), $this->config->get('tdmenu_image_height'));
				     		}
	                    	$firstkids_data[] = array(
								'category_id' => false,
								'name'        => $brandlinks['name'],
								'cssid'       => "supbrand" . $brandlinks['manufacturer_id'],
								'thumb'       => $image,
								'gchildren'   => false,
								'href'        => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $brandlinks['manufacturer_id'])
							);
	    	     		}
				 		$item_image = false;
				 		$item_description = false;
			  		} else {
			     		$item_name = $item['customname'][$this->config->get('config_language_id')];
				 		$item_view = '';
				 		$item_id = '';
				 		$cssid = 'notcat' . $increaseid;
				 		$item_url = $item['customurl'][$this->config->get('config_language_id')];
				 		$firstkids_data = array();
				 		$item_image = false;
			  		}
			  		$item_addurl = $item['addurl'][$this->config->get('config_language_id')];
			  		if ($item_name) {
				   		if (!$item_url && isset($item['customurl'][$this->config->get('config_language_id')]) && $item['customurl'][$this->config->get('config_language_id')]) $item_url = $item['customurl'][$this->config->get('config_language_id')];

			  			$mitems[] = array(
							'name'        => $item_name,
							'id'          => $item_id,
							'cssid'       => $cssid,
							'children'    => $firstkids_data,
							'image'       => $item_image,
							'view'        => $item_view,
							'add'         => $item['image'],
							'addurl'      => $item_addurl,
							'href'        => $item_url,
							'tlcolor'     => $item['tlcolor'],
							'tlstyle'     => $item['tlstyle'],
							'dwidth'      => $item['dwidth'],
							'iwidth'      => $item['iwidth'],
							'tntab'       => !empty($item['tntab']) ? true : false,
							'mflyl'       => !empty($item['mflyl']) ? true : false,
							'type' 		  => $item['type']
				 		);
			  		}
			  	} /* end loop trough items */
			  	if ($tdmenucache && $mitems) { /* set cache if enabled */
			  		$this->cache->set('tdmenu.items.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id'), $mitems);
			  	}
	   		} /* end check for cache */
        } /* end check for items */

		$mitems = $c_items ? $c_items : $mitems;
		foreach ($mitems as $item) { /* loop again trough items to not include html areas in cache */

			if ($item['dwidth']) {
				$dwidth = $item['dwidth'];
			} else {
				$dwidth = '';
			}

			$item_add = isset($item['add'][$this->config->get('config_language_id')]) ? $item['add'][$this->config->get('config_language_id')] : '';
			$data['mitems'][] = array(
				'name'        => $item['name'],
				'id'          => $item['id'],
				'cssid'       => $item['cssid'],
				'children'    => $item['children'],
				'image'       => $item['image'],
				'view'        => $item['view'],
				'add'         => $item_add,
				'addurl'      => $item['addurl'],
				'href'        => $item['href'],
				'tlcolor'     => $item['tlcolor'],
				'tlstyle'     => $item['tlstyle'],
				'dwidth'      => $dwidth,
				'iwidth'      => $item['iwidth'],
				'tntab'       => !empty($item['tntab']) ? true : false,
				'mflyl'       => !empty($item['mflyl']) ? true : false
			);
		}

		 /* in case the account dropdown is enabled */
		$data['logged'] = $this->customer->isLogged();
		$data['logout'] = $this->url->link('account/logout', '', 'SSL');
		$data['forgotten'] = $this->url->link('account/forgotten', '', 'SSL');
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['edit'] = $this->url->link('account/edit', '', 'SSL');
		$data['password'] = $this->url->link('account/password', '', 'SSL');
		$data['address'] = $this->url->link('account/address', '', 'SSL');
		$data['wishlist'] = $this->url->link('account/wishlist');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['download'] = $this->url->link('account/download', '', 'SSL');
		$data['return'] = $this->url->link('account/return', '', 'SSL');
		$data['transaction'] = $this->url->link('account/transaction', '', 'SSL');
		$data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');
		$data['recurring'] = $this->url->link('account/recurring', '', 'SSL');

		return $this->load->view('extension/module/tdmenu', $data);
  	}

    public function beforeHeader(&$route, &$data) {
		$this->document->addScript('catalog/view/javascript/themedelights/tdmegamenu.js');
    }

    public function afterHeader(&$route, &$data) {
    	if (!$this->config->get('tdmenu_showstatus') && $this->config->get('tdmenu_item')) {
    		$data['menu'] = $this->load->controller('extension/module/tdmenu');
    	}
    }
}