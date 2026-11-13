<?php
class ControllerExtensionModuleSpproProductGroups extends Controller {
    public function getProductForList() {
        if(isset($this->request->get['product'])){

            $this->load->model('catalog/product');
            $this->load->model('tool/image');

            $result = $this->model_catalog_product->getProduct($this->request->get['product']);

            if($result){

                if(isset($this->request->get['list_type'])){
                    $data['list_type'] = $this->request->get['list_type'];
                } else {
                    $data['list_type'] = '';
                }

                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if (!is_null($result['special']) && (float)$result['special'] >= 0) {
                    $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    $tax_price = (float)$result['special'];
                } else {
                    $special = false;
                    $tax_price = (float)$result['price'];
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format($tax_price, $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('config_review_status')) {
                    $rating = (int)$result['rating'];
                } else {
                    $rating = false;
                }

                $result = (isset($product_info) && $product_info) ? $product_info : $result;

                if ($result['quantity'] <= 0) {
                    $stock = $result['stock_status'];
                } else {
                    $stock = false;
                }

                $data['product'] = array(
                    'product_id'        => $result['product_id'],
                    'you_save'          => $result['you_save'],
                    'thumb'             => $image,
                    'name'              => $result['name'],
                    'description'       => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                    'price'             => $price,
                    'special'           => $special,
                    'stock'             => $stock,
                    'tax'               => $tax,
                    'product_group'     => $this->model_catalog_product->getProductGroupsForList($result['product_id']),
                    'minimum'           => $result['minimum'] > 0 ? $result['minimum'] : 1,
                    'rating'            => $this->config->get('config_review_status') ? $result['rating'] : false,
                    'oct_model'         => $this->config->get('theme_oct_deals_data_model') ? $result['model'] : '',
                    'reviews'           => $result['reviews'],
                    'quantity'          => $result['quantity'] <= 0 ? true : false,
                    'href'              => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );

                $this->response->setOutput($this->load->view('extension/module/sppro_product_group/sppro_product_groups_list', $data));
            }
        }
    }
}