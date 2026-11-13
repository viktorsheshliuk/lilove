<?php
class ModelExtensionModuleSpproProductGroup extends Model {
    private $attr_key_sep_attr = '%att%';
    private $attr_key_sep_lang = '%lan%';
    private $attr_key_sep_vals = '%val%';


    private $data = [];

    public function getProductGroupsForList($product_id, $cat = null) {
        $product_groups = [];
        foreach ($this->getProductGroups($product_id, $cat) as $product_group) {
            if ($product_group['category_status']) {
                $product_groups[$product_group['type']][] = $product_group;
            }
        }
        return $product_groups;
    }

    public function getProductGroupAttributeType($current_attribute_id, $current_product, $cat) {
        $attribute_type = null;
        if ($current_attribute_id && $current_product) {
            $product_qroup_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group_products gpgp LEFT JOIN ' . DB_PREFIX . 'sppro_group_product_group gpg ON (gpgp.product_group_id = gpg.product_group_id) WHERE gpgp.product_id = ' . (int)$current_product);
            if ($product_qroup_query->num_rows) {
                if ($cat) {
                    if ($product_qroup_query->row['attribute_types_cat']) {
                        foreach (json_decode($product_qroup_query->row['attribute_types_cat'], true) as $item) {
                            foreach ($item as $row_attribute_id => $type) {
                                if (!empty($type) && $row_attribute_id == $current_attribute_id) {
                                    $attribute_type = $type;
                                    break;
                                }
                            }
                        }
                    }
                    if ($attribute_type == null) {
                        if ($product_qroup_query->row['attribute_types']) {
                            foreach (json_decode($product_qroup_query->row['attribute_types'], true) as $item) {
                                foreach ($item as $row_attribute_id => $type) {
                                    if (!empty($type) && $row_attribute_id == $current_attribute_id) {
                                        $attribute_type = $type;
                                        break;
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if ($product_qroup_query->row['attribute_types']) {
                        foreach (json_decode($product_qroup_query->row['attribute_types'], true) as $item) {
                            foreach ($item as $row_attribute_id => $type) {
                                if (!empty($type) && $row_attribute_id == $current_attribute_id) {
                                    $attribute_type = $type;
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $attribute_type;
    }

    public function getProductGroups($product_id, $cat = false) {
        if (!$this->config->get('module_sppro_product_group_status')) {
            return [];
        }
        $result_groups = [];
        $product_group = $this->getProductGroup($product_id);
        if ($product_group) {
            $product_group_attributes = $this->getProductGroupAttributes($product_group['product_ids'], $product_group['disabled_attributes']);
            if (isset($product_group_attributes[$product_id])) {
                $current_product_attributes = $product_group_attributes[$product_id];
                $groups = $this->getGroupsByAttributes($current_product_attributes);
                if ($groups) {
                    $active_attributes = [];
                    foreach ($groups as $group) {
                        $active_attributes[] = $group['attribute_id'];
                    }
                    $custom_type_product_id = null;
                    foreach ($groups as $group) {
                        $result_group_products = [];
                        foreach ($product_group['product_data'] as $product) {
                            if (isset($product_group_attributes[$product['product_id']][$group['attribute_id']])) {
                                $product_attribute_text = $product_group_attributes[$product['product_id']][$group['attribute_id']];
                                if ($product['product_id'] == $product_id || $this->checkProductAttributes($group['attribute_id'], $active_attributes, $product_group_attributes[$product['product_id']], $current_product_attributes)) {
                                    $result_group_products[$product_attribute_text] = $this->setProductData($group, $product, $product_attribute_text, $cat);
                                }
                            }
                            $custom_type_product_id = $product['product_id'];
                        }
                        foreach ($product_group['product_data'] as $product) {
                            if (isset($product_group_attributes[$product['product_id']][$group['attribute_id']])) {
                                $product_attribute_text = $product_group_attributes[$product['product_id']][$group['attribute_id']];
                                if (empty($result_group_products[$product_attribute_text])) {
                                    $product_data = $this->setProductData($group, $product, $product_attribute_text, $cat);
                                    $product_data['disabled'] = true;
                                    $product_data['quantity'] = 0;
                                    $product_data['stock_status'] = $this->language->get('product_out_of_stock');
                                    if (!empty($product_group['current_product_info']['image'])) {
                                        $product_data['image'] = $product_group['current_product_info']['image'];
                                    } else {
                                        $product_data['image'] = 'placeholder.png';
                                    }
                                    $setting_styles = $this->config->get('module_sppro_product_group_styles');
                                    $image_small_width = !empty($setting_styles['image_width']) ? $setting_styles['image_width'] : 60;
                                    $image_small_height = !empty($setting_styles['image_height']) ? $setting_styles['image_height'] : 60;
                                    $product_data['image_small'] = $this->model_tool_image->resize($product_data['image'], $image_small_width, $image_small_height);
                                    $product_data['image_small_select'] = $this->model_tool_image->resize($product_data['image'], 60, 60);
                                    $product_data['image_big'] = $this->model_tool_image->resize($product_data['image'], 150, 150);
                                    $result_group_products[$product_attribute_text] = $product_data;
                                }
                            }
                        }
                        $custom_attribute_type = $this->getProductGroupAttributeType($group['attribute_id'], $custom_type_product_id, $cat);
                        if ($cat) {
                            if ($group['type_cat'] != null) {
                                $type_attr = $group['type_cat'];
                            } else {
                                $type_attr = $group['type'];
                            }
                        } else {
                            $type_attr = $group['type'];
                        }
                        if ($result_group_products) {
                            $result_groups[] = [
                                'group_id' => $group['group_id'],
                                'name' => $group['name'],
                                'type' => ($custom_attribute_type != null) ? $custom_attribute_type : $type_attr,
                                'help' => $group['help'],
                                'category_status' => $group['category_status'],
                                'title_status' => $group['title_status'],
                                'products' => $result_group_products
                            ];
                        }
                    }
                }
            }
        }
        return $result_groups;
    }

    private function getProductGroup($product_id) {
        if (!isset($this->data['product_groups'][$product_id])) {
            $group_data = [];
            $this->data['product_groups'][$product_id] = [];
            $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group_products WHERE product_id = ' . $product_id);
            if ($query->num_rows) {
                $group_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group WHERE product_group_id = ' . $query->row['product_group_id']);
                if ($group_query->num_rows) {
                    $group_data = array(
                        'main_product_id' => $group_query->row['main_product_id'],
                        'current_product_info' => [],
                        'disabled_attributes' => $group_query->row['disabled_attributes'] ? json_decode($group_query->row['disabled_attributes'], true) : [],
                        'product_ids' => [],
                        'product_data' => [],
                    );
                    $setting_styles = $this->config->get('module_sppro_product_group_styles');
                    $group_products_query = $this->db->query('SELECT *, (SELECT ss.name FROM ' . DB_PREFIX . 'stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = "' . (int)$this->config->get('config_language_id') . '") AS stock_status, (SELECT price FROM ' . DB_PREFIX . 'product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = "' . (int)$this->config->get('config_customer_group_id') . '" AND ((ps.date_start = "0000-00-00" OR ps.date_start < NOW()) AND (ps.date_end = "0000-00-00" OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT price FROM ' . DB_PREFIX . 'product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = "' . (int)$this->config->get('config_customer_group_id') . '" AND pd2.quantity = "1" AND ((pd2.date_start = "0000-00-00" OR pd2.date_start < NOW()) AND (pd2.date_end = "0000-00-00" OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, gpgp.sort_order, gpgp.attr_image FROM ' . DB_PREFIX . 'sppro_group_product_group_products gpgp LEFT JOIN ' . DB_PREFIX . 'product p ON (p.product_id = gpgp.product_id) LEFT JOIN ' . DB_PREFIX . 'product_description pd ON (pd.product_id = gpgp.product_id) WHERE gpgp.product_group_id = ' . $query->row['product_group_id'] . ' AND p.status = 1 AND pd.language_id = ' . (int)$this->config->get('config_language_id') . ' ORDER BY gpgp.sort_order');
                    foreach ($group_products_query->rows as $product) {
                        if ($product['image']) {
                            $image = $product['image'];
                        } else {
                            $image = 'placeholder.png';
                        }
                        if ($product['discount']) {
                            $product['price'] = $product['discount'];
                        }
                        if (isset($product['attr_image']) && is_file(DIR_IMAGE . $product['attr_image'])) {
                            $attr_image = $this->model_tool_image->resize($product['attr_image'], !empty($setting_styles['image_width']) ? $setting_styles['image_width'] : 150, !empty($setting_styles['image_height']) ? $setting_styles['image_height'] : 150);
                        } else {
                            $attr_image = null;
                        }
                        if (isset($product['attr_image']) && is_file(DIR_IMAGE . $product['attr_image'])) {
                            $attr_image_big = $this->model_tool_image->resize($product['attr_image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                        } else {
                            $attr_image_big = $this->model_tool_image->resize($image, $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));;
                        }
                        $image_small_width = !empty($setting_styles['image_width']) ? $setting_styles['image_width'] : 60;
                        $image_small_height = !empty($setting_styles['image_height']) ? $setting_styles['image_height'] : 60;
                        $product_data = array(
                            'product_id' => $product['product_id'],
                            'name' => $product['name'],
                            'model' => $product['model'],
                            'quantity' => $product['quantity'],
                            'stock_status' => $product['stock_status'],
                            'image' => $product['image'],
                            'attr_image' => $attr_image,
                            'attr_image_big' => $attr_image_big,
                            'image_small' => $this->model_tool_image->resize($image, $image_small_width, $image_small_height),
                            'image_small_select' => $this->model_tool_image->resize($image, 60, 60),
                            'image_big' => $this->model_tool_image->resize($image, 150, 150),
                            'price' => $this->currency->format($product['price'], $this->session->data['currency']),
                            'special' => $product['special'] ? $this->currency->format($product['special'], $this->session->data['currency']) : false,
                            'href' => $this->url->link('product/product', 'product_id=' . $product['product_id']),
                        );
                        $group_data['product_data'][] = $product_data;
                        $group_data['product_ids'][] = $product['product_id'];
                        if ($product['product_id'] == $product_id) {
                            $group_data['current_product_info'] = $product_data;
                        }
                    }
                }

            }
            if (!empty($group_data['product_ids'])) {
                foreach ($group_data['product_ids'] as $product_id) {
                    $this->data['product_groups'][$product_id] = $group_data;
                }
            }
        }
        return $this->data['product_groups'][$product_id];
    }

    private function getProductGroupAttributes($products_ids, $disabled_attributes = []) {
        $product_attributes = [];
        $sql = 'SELECT * FROM ' . DB_PREFIX . 'product_attribute WHERE product_id IN (' . implode(', ', $products_ids) . ') AND language_id = ' . (int)$this->config->get('config_language_id');
        if ($disabled_attributes) {
            $sql .= ' AND attribute_id NOT IN (' . implode(', ', $disabled_attributes) . ')';
        }
        $query = $this->db->query($sql);
        foreach ($query->rows as $row) {
            $product_attributes[$row['product_id']][$row['attribute_id']] = $row['text'];
        }
        return $product_attributes;
    }

    private function getGroupsByAttributes($attributes) {
        $groups_data = [];
        $attributes_id = array_keys($attributes);
        $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_attribute ga LEFT JOIN ' . DB_PREFIX . 'sppro_group g ON (ga.group_id = g.group_id) LEFT JOIN ' . DB_PREFIX . 'sppro_group_description gd ON (ga.group_id = gd.group_id) WHERE ga.attribute_id IN (' . implode(', ', $attributes_id) . ') AND gd.language_id = ' . (int)$this->config->get('config_language_id') . ' ORDER BY g.sort_order');
        foreach ($query->rows as $row) {
            $groups_data[] = array(
                'group_id' => $row['group_id'],
                'name' => $row['name'],
                'type' => $row['type'],
                'type_cat' => $row['type_cat'],
                'help' => $row['help'],
                'category_status' => $row['category_status'],
                'title_status' => $row['title_status'],
                'sort_order' => $row['sort_order'],
                'attribute_id' => $row['attribute_id']
            );
        }
        return $groups_data;
    }

    private function checkProductAttributes($attribute_id, $active_attributes, $list_product_attributes, $current_product_attributes) {
        if (isset($list_product_attributes[$attribute_id]) && isset($current_product_attributes[$attribute_id])) {
            if ($list_product_attributes[$attribute_id] != $current_product_attributes[$attribute_id]) {
                $list_other_attributes = [];
                foreach ($list_product_attributes as $attr_id=>$text) {
                    if (in_array($attr_id, $active_attributes)) {
                        if ($attribute_id != $attr_id) {
                            $list_other_attributes[$attr_id] = $text;
                        }
                    }
                }
                $current_other_attributes = [];
                foreach ($current_product_attributes as $attr_id=>$text) {
                    if (in_array($attr_id, $active_attributes)) {
                        if ($attribute_id != $attr_id) {
                            $current_other_attributes[$attr_id] = $text;
                        }
                    }
                }
                ksort($list_other_attributes);
                ksort($current_other_attributes);
                return $current_other_attributes == $list_other_attributes;
            }
        }
        return false;
    }

    private function getGroupAttributeText($group_id, $attribute_id, $text) {
        if (!isset($this->data['group_attribute_text'][$group_id])) {
            $this->data['group_attribute_text'][$group_id] = [];
            $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_attribute_text gat  LEFT JOIN ' . DB_PREFIX . 'sppro_group_attribute_text_description gatd ON (gat.group_id = gatd.group_id AND gat.attribute_value_key = gatd.attribute_value_key) WHERE  gat.group_id = ' . (int)$group_id . ' AND gatd.language_id = ' . (int)$this->config->get('config_language_id'));
            foreach ($query->rows as $row) {
                $attribute_value_key = $this->getCurrentLanguageAttributeValueKey($row['attribute_value_key']);
                $this->data['group_attribute_text'][$group_id][$attribute_value_key] = array(
                    'first_color' => $row['first_color'],
                    'second_color' => $row['second_color'],
                    'text' => $row['text'],
                );
            }
        }
        $attribute_value_key = $this->getAttributeValueKey($attribute_id,  $text);
        if (isset($this->data['group_attribute_text'][$group_id][$attribute_value_key])) {
            return $this->data['group_attribute_text'][$group_id][$attribute_value_key];
        } else {
            return false;
        }
    }

    private function getCurrentLanguageAttributeValueKey($attribute_value_key) {
        $attr_explode = explode($this->attr_key_sep_attr, $attribute_value_key);
        if (!empty($attr_explode[1])) {
            foreach (explode($this->attr_key_sep_vals, $attr_explode[1]) as $lang_val) {
                $lang_eplode = explode($this->attr_key_sep_lang, $lang_val);
                if (count($lang_eplode) == 2) {
                    if ($lang_eplode[0] == $this->config->get('config_language_id')) {
                        return  $this->getAttributeValueKey($attr_explode[0], base64_decode($lang_eplode[1]));
                    }
                }
            }
        }
        return false;
    }

    private function getAttributeValueKey($attribute_id, $text) {
        return $attribute_id . $this->attr_key_sep_attr . base64_encode($text);
    }

    private function setProductData($group, $product, $product_attribute_text, $cat = false) {
        $product['name_in_group'] = $product_attribute_text;
        if ($group['type'] == 'color') {
            $group_attribute_text_data = $this->getGroupAttributeText($group['group_id'], $group['attribute_id'], $product_attribute_text);
            if (isset($group_attribute_text_data['text'])) {
                $product['name_in_group'] = $group_attribute_text_data['text'];
            }
            if (isset($group_attribute_text_data['first_color'])) {
                $product['first_color'] = $group_attribute_text_data['first_color'];
            }
            if (isset($group_attribute_text_data['second_color'])) {
                $product['second_color'] = $group_attribute_text_data['second_color'];
            }
        } elseif ($cat && $group['type_cat'] == 'color') {
            $group_attribute_text_data = $this->getGroupAttributeText($group['group_id'], $group['attribute_id'], $product_attribute_text);
            if (isset($group_attribute_text_data['text'])) {
                $product['name_in_group'] = $group_attribute_text_data['text'];
            }
            if (isset($group_attribute_text_data['first_color'])) {
                $product['first_color'] = $group_attribute_text_data['first_color'];
            }
            if (isset($group_attribute_text_data['second_color'])) {
                $product['second_color'] = $group_attribute_text_data['second_color'];
            }
        }
        return $product;
    }

    public function getShemaData($product_id) {
        $this->load->model('tool/image');
        $product_group_info = [];
        $main_product_id = null;
        $product_ids = [];
        $group = $this->db->query('SELECT * FROM '.DB_PREFIX.'sppro_group_product_group_products WHERE product_id = '.$product_id.' LIMIT 1;');
        if ($group->num_rows) {
            $products = $this->db->query('SELECT * FROM '.DB_PREFIX.'sppro_group_product_group_products WHERE product_group_id = '.$group->row['product_group_id'].' ORDER BY product_id ASC;');
            foreach ($products->rows as $product) {
                $product_ids[] = $product['product_id'];
            }
            foreach ($products->rows as $product) {
                $check_main = $this->db->query('SELECT * FROM '.DB_PREFIX.'sppro_group_product_group WHERE main_product_id = '.$product['product_id'].';');
                if ($check_main->num_rows) {
                    $main_product_id = $product['product_id'];
                    break;
                }
            }
            if ($main_product_id === null) {
                $main_product_id = reset($product_ids);
            }
            $key = array_search($main_product_id, $product_ids);
            if ($key !== false) {
                unset($product_ids[$key]);
            }
            $main_product_info = $this->getShemaProduct($main_product_id);
            $product_group_info['name'] = $main_product_info['name'];

            $clean_description = strip_tags(html_entity_decode($main_product_info['description']));
            $clean_description = str_replace('&nbsp;', ' ', $clean_description);
            $clean_description = preg_replace('/\s+/', ' ', $clean_description);
            $words = explode(' ', trim($clean_description));
            if (count($words) > 10) {
                $short_description = implode(' ', array_slice($words, 0, 35)) . '...';
            } else {
                $short_description = implode(' ', $words);
            }
            $product_group_info['description'] = $short_description;

            $product_group_info['url'] = $this->url->link('product/product', 'product_id=' . $main_product_id);
            $product_group_info['productGroupID'] = ($main_product_id * 2);
            if (!empty($main_product_info['manufacturer_id'])) {
                $this->load->model('catalog/manufacturer');
                $manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($main_product_info['manufacturer_id']);
                if ($manufacturer_info) {
                    $product_group_info['brand_name'] = $manufacturer_info['name'];
                }
            }
            foreach ($product_ids as $product_id) {
                $product_info = $this->getShemaProduct($main_product_id);
                if (isset($product_info['image']) && is_file(DIR_IMAGE . $product_info['image'])) {
                    $image = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                } else {
                    $image = null;
                }
                $clean_description = strip_tags(html_entity_decode($product_info['description']));
                $clean_description = str_replace('&nbsp;', ' ', $clean_description);
                $clean_description = preg_replace('/\s+/', ' ', $clean_description);
                $words = explode(' ', trim($clean_description));
                if (count($words) > 10) {
                    $short_description = implode(' ', array_slice($words, 0, 35)) . '...';
                } else {
                    $short_description = implode(' ', $words);
                }
                $new_description = $short_description;
                $product_group_info['variants'][] = [
                    'model' => !empty($product_info['model']) ? $product_info['model'] : null,
                    'sku' => !empty($product_info['sku']) ? $product_info['sku'] : null,
                    'mpn' => !empty($product_info['mpn']) ? $product_info['mpn'] : null,
                    'image' => $image,
                    'name' => $product_info['name'],
                    'description' => $new_description,
                    'url' => $this->url->link('product/product', 'product_id=' . $product_id),
                    'priceCurrency' => $this->config->get('config_currency'),
                    'price' => (isset($product_info['special'])) ? round($product_info['special'], 2) : round($product_info['price'], 2),
                    'itemCondition' => 'http://schema.org/NewCondition',
                    'availability' => ($product_info['quantity'] > 0) ? 'http://schema.org/InStock' : 'http://schema.org/OutOdStock',
                ];
            }
        } else {
            $product_group_info = null;
        }
        return $product_group_info;
    }

    public function getCanonicalId($product_id) {
        $main_product_id = null;
        $product_ids = [];
        $group = $this->db->query('SELECT * FROM '.DB_PREFIX.'sppro_group_product_group_products WHERE product_id = '.$product_id.' LIMIT 1;');
        if ($group->num_rows) {
            $products = $this->db->query('SELECT * FROM '.DB_PREFIX.'sppro_group_product_group_products WHERE product_group_id = '.$group->row['product_group_id'].' ORDER BY product_id ASC;');
            foreach ($products->rows as $product) {
                $product_ids[] = $product['product_id'];
            }
            foreach ($products->rows as $product) {
                $check_main = $this->db->query('SELECT * FROM '.DB_PREFIX.'sppro_group_product_group WHERE main_product_id = '.$product['product_id'].';');
                if ($check_main->num_rows) {
                    $main_product_id = $product['product_id'];
                    break;
                }
            }
            if ($main_product_id === null) {
                $main_product_id = reset($product_ids);
            }
            $key = array_search($main_product_id, $product_ids);
            if ($key !== false) {
                unset($product_ids[$key]);
            }
        } else {
            $main_product_id = null;
        }
        return $main_product_id;
    }

    public function getShemaProduct($product_id) {
        $query = $this->db->query('SELECT p.product_id, p.model, p.sku, p.mpn, p.quantity, p.image, p.manufacturer_id, p.price, pd.name, pd.description, (SELECT p.price FROM ' . DB_PREFIX . 'product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = "' . (int)$this->config->get('config_customer_group_id') . '" AND ((ps.date_start = "0000-00-00" OR ps.date_start < NOW()) AND (ps.date_end = "0000-00-00" OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special FROM ' . DB_PREFIX . 'product p LEFT JOIN ' . DB_PREFIX . 'product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = "' . (int)$product_id . '" AND pd.language_id = "' . (int)$this->config->get('config_language_id') . '";');
        return $query->row;
    }
}