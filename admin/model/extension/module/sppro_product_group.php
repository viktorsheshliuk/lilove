<?php

class ModelExtensionModuleSpproProductGroup extends Model
{
    private $attr_key_sep_attr = '%att%';
    private $attr_key_sep_lang = '%lan%';
    private $attr_key_sep_vals = '%val%';
    private $ext = 'sppro_product_group';
    private $data = [];

    public function addGroup($data) {
        $this->db->query('INSERT INTO ' . DB_PREFIX . 'sppro_group SET type = "' . $this->db->escape($data['type']) . '", type_cat = "' . $this->db->escape($data['type_cat']) . '", help = "' . $this->db->escape($data['help']) . '", sort_order = "' . (int)$data['sort_order'] . '", category_status = "' . (isset($data['category_status']) ? 1 : 0) . '", title_status = "' . (isset($data['title_status']) ? 1 : 0) . '"');
        $group_id = $this->db->getLastId();
        foreach ($data['group_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_description SET group_id = '" . (int)$group_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "'");
        }
        if (!empty($data['group_attribute'])) {
            foreach ($data['group_attribute'] as $attribute_id) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute SET group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "'");
            }
        }
        if (!empty($data['group_attribute_text'])) {
            foreach ($data['group_attribute_text'] as $attribute_text) {
                $attribute_value_key = '';
                $attribute_id = '';
                if (empty($attribute_text['attribute_id'])) {
                    $attribute_id = $this->searchAttributeByText($attribute_text['description']);
                    if ($attribute_id) {
                        $attribute_value_key = $this->getAttributeValueKey($attribute_id, $attribute_text['description']);
                        $this->db->query("DELETE FROM " . DB_PREFIX . "sppro_group_attribute WHERE group_id = '" . (int)$group_id . "' AND attribute_id = " . (int)$attribute_id);
                        $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute SET group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "'");
                    }
                } else {
                    $attribute_value_key = $attribute_text['attribute_value_key'];
                    $attribute_id = $attribute_text['attribute_id'];
                }
                if ($attribute_value_key) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute_text SET attribute_value_key  = '" . $this->db->escape($attribute_value_key) . "', group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "', first_color = '" . $this->db->escape($attribute_text['first_color']) . "', second_color = '" . $this->db->escape($attribute_text['second_color']) . "'");
                    foreach ($attribute_text['description'] as $language_id => $attribute_text_description) {
                        $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute_text_description SET attribute_value_key  = '" . $this->db->escape($attribute_value_key) . "', language_id = '" . (int)$language_id . "', group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "', text = '" . $this->db->escape($attribute_text_description['text']) . "'");
                    }
                }
            }
        }
        return $group_id;
    }

    public function editGroup($group_id, $data) {
        $this->db->query('UPDATE ' . DB_PREFIX . 'sppro_group SET type = "' . $this->db->escape($data['type']) . '", type_cat = "' . $this->db->escape($data['type_cat']) . '", help = "' . $this->db->escape($data['help']) . '", sort_order = "' . (int)$data['sort_order'] . '", category_status = "' . (isset($data['category_status']) ? 1 : 0) . '", title_status = "' . (isset($data['title_status']) ? 1 : 0) . '" WHERE group_id = ' . (int)$group_id);
        $this->db->query("DELETE FROM " . DB_PREFIX . "sppro_group_description WHERE group_id = '" . (int)$group_id . "'");
        foreach ($data['group_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_description SET group_id = '" . (int)$group_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "'");
        }
        $this->db->query("DELETE FROM " . DB_PREFIX . "sppro_group_attribute WHERE group_id = '" . (int)$group_id . "'");
        if (!empty($data['group_attribute'])) {
            foreach ($data['group_attribute'] as $attribute_id) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute SET group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "'");
            }
        }
        $this->db->query("DELETE FROM " . DB_PREFIX . "sppro_group_attribute_text WHERE group_id = '" . (int)$group_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "sppro_group_attribute_text_description WHERE group_id = '" . (int)$group_id . "'");
        if (!empty($data['group_attribute_text'])) {
            foreach ($data['group_attribute_text'] as $attribute_text) {
                $attribute_value_key = '';
                $attribute_id = '';
                if (empty($attribute_text['attribute_id'])) {
                    $attribute_id = $this->searchAttributeByText($attribute_text['description']);
                    if ($attribute_id) {
                        $attribute_value_key = $this->getAttributeValueKey($attribute_id, $attribute_text['description']);
                        $this->db->query("DELETE FROM " . DB_PREFIX . "sppro_group_attribute WHERE group_id = '" . (int)$group_id . "' AND attribute_id = " . (int)$attribute_id);
                        $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute SET group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "'");
                    }
                } else {
                    $attribute_value_key = $attribute_text['attribute_value_key'];
                    $attribute_id = $attribute_text['attribute_id'];
                }
                if ($attribute_value_key) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute_text SET attribute_value_key  = '" . $this->db->escape($attribute_value_key) . "', group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "', first_color = '" . $this->db->escape($attribute_text['first_color']) . "', second_color = '" . $this->db->escape($attribute_text['second_color']) . "'");
                    foreach ($attribute_text['description'] as $language_id => $attribute_text_description) {
                        $this->db->query("INSERT INTO " . DB_PREFIX . "sppro_group_attribute_text_description SET attribute_value_key  = '" . $this->db->escape($attribute_value_key) . "', language_id = '" . (int)$language_id . "', group_id = '" . (int)$group_id . "', attribute_id = '" . (int)$attribute_id . "', text = '" . $this->db->escape($attribute_text_description['text']) . "'");
                    }
                }
            }
        }
        return $group_id;
    }

    public function getGroup($group_id) {
        $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group WHERE group_id = ' . (int)$group_id);
        return $query->row;
    }

    public function getGroupDescriptions($group_id) {
        $group_description_data = [];
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sppro_group_description WHERE group_id = '" . (int)$group_id . "'");
        foreach ($query->rows as $result) {
            $group_description_data[$result['language_id']] = array(
                'name' => $result['name'],
            );
        }
        return $group_description_data;
    }

    public function getGroupAttributes($group_id) {
        $group_attributes_data = [];
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sppro_group_attribute WHERE group_id = '" . (int)$group_id . "'");
        foreach ($query->rows as $result) {
            $group_attributes_data[] = $result['attribute_id'];
        }
        return $group_attributes_data;
    }

    public function getGroups() {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sppro_group g LEFT JOIN " . DB_PREFIX . "sppro_group_description gd ON (g.group_id = gd.group_id) WHERE gd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY g.sort_order, gd.name");
        return $query->rows;
    }

    public function removeGroup($group_id) {
        $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group WHERE group_id = ' . (int)$group_id);
        $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_description WHERE group_id = ' . (int)$group_id);
        $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_attribute WHERE group_id = ' . (int)$group_id);
        $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_attribute_text WHERE group_id = ' . (int)$group_id);
        $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_attribute_text_description WHERE group_id = ' . (int)$group_id);
    }

    public function getGroupAttributeValues($group_id) {
        $group_attribute_values_data = [];
        $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_attribute_text WHERE group_id = ' . (int)$group_id);
        $group_attribute_values_description_data = [];
        $description_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_attribute_text_description WHERE group_id = ' . (int)$group_id);
        foreach ($description_query->rows as $row) {
            $group_attribute_values_description_data[$row['attribute_value_key']][$row['language_id']] = array(
                'text' => $row['text'],
            );
        }
        foreach ($query->rows as $row) {
            if (isset($group_attribute_values_description_data[$row['attribute_value_key']])) {
                $group_attribute_values_data[] = array(
                    'attribute_value_key' => $row['attribute_value_key'],
                    'attribute_id' => $row['attribute_id'],
                    'first_color' => $row['first_color'],
                    'second_color' => $row['second_color'],
                    'description' => $group_attribute_values_description_data[$row['attribute_value_key']],
                );
            }
        }
        return $group_attribute_values_data;
    }

    public function getAttributeValues($attributes_id) {
        $attribute_values_data = [];
        $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'product_attribute WHERE attribute_id IN (' . implode(', ', $attributes_id) . ')');
        $attributes_by_products = [];
        foreach ($query->rows as $row) {
            $attributes_by_products[$row['product_id']][$row['attribute_id']][$row['language_id']] = array(
                'text' => trim($row['text']),
            );
        }
        foreach ($attributes_by_products as $attribute) {
            foreach ($attribute as $atribute_id => $description) {
                $attribute_key = $this->getAttributeValueKey($atribute_id, $description);
                if (empty($attribute_values_data[$attribute_key])) {
                    $attribute_values_data[$attribute_key] = array(
                        'attribute_id' => $atribute_id,
                        'description' => $description,
                    );
                }
            }
        }
        return $attribute_values_data;
    }

    public function getAttributeNames() {
        if (!isset($this->data['attribute_names'])) {
            $this->data['attribute_names'] = [];
            $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'attribute_description');
            foreach ($query->rows as $row) {
                $this->data['attribute_names'][$row['attribute_id']][$row['language_id']] = $row['name'];
            }
        }
        return $this->data['attribute_names'];
    }

    public function searchAttributeByText($texts) {
        if (!isset($this->data['attribute_by_keys'])) {
            $this->data['attribute_by_keys'] = [];
            $temp_attribute_by_keys = [];
            $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'product_attribute');
            foreach ($query->rows as $row) {
                $temp_attribute_by_keys[$row['attribute_id']][$row['language_id']] = array(
                    'text' => $row['text'],
                );
            }
            foreach ($temp_attribute_by_keys as $attribute_id => $text) {
                $attribute_value_key = $this->getAttributeValueKey(0, $text);
                $this->data['attribute_by_keys'][$attribute_value_key] = $attribute_id;
            }
        }
        $attribute_value_key = $this->getAttributeValueKey(0, $texts);
        if (isset($this->data['attribute_by_keys'][$attribute_value_key])) {
            return $this->data['attribute_by_keys'][$attribute_value_key];
        } else {
            return false;
        }
    }

    public function setAttributeValue($attribute_value_key, $attribute_id, $attribute_value) {
        $attribute_value_data = [];
        if (!$attribute_value_key) {
            $attribute_value_key = $this->getAttributeValueKey($attribute_id, $attribute_value['description']);
        }
        $attribute_names = $this->getAttributeNames();
        if (isset($attribute_names[$attribute_id])) {
            $description = [];
            foreach ($attribute_value['description'] as $language_id => $attribute_description) {
                $description[$language_id] = array(
                    'base_name' => isset($attribute_names[$attribute_id][$language_id]) ? $attribute_names[$attribute_id][$language_id] : '',
                    'base_text' => $attribute_description['text'],
                    'text' => $attribute_description['text'],
                );
            }
            $attribute_value_data = array(
                'attribute_value_key' => $attribute_value_key,
                'attribute_id' => $attribute_id,
                'first_color' => isset($attribute_value['first_color']) ? $attribute_value['first_color'] : '',
                'second_color' => isset($attribute_value['second_color']) ? $attribute_value['second_color'] : '',
                'description' => $description,
            );
        }
        return $attribute_value_data;
    }

    public function getAttributeValueKey($attribute_id, $attribute_description) {
        ksort($attribute_description);
        $attribute_text = [];
        foreach ($attribute_description as $language_id => $description) {
            if (!empty($description['text'])) {
                $attribute_text[$language_id] = $language_id . $this->attr_key_sep_lang . base64_encode($description['text']);
            }

        }
        if ($attribute_text) {
            $attribute_key = $attribute_id . $this->attr_key_sep_attr . implode($this->attr_key_sep_vals, array_map(array($this->db, 'escape'), $attribute_text));
            return $attribute_key;
        } else {
            return false;
        }
    }

    public function getProducts($filter_data = []) {
        $sql = 'SELECT * FROM ' . DB_PREFIX . 'product p LEFT JOIN ' . DB_PREFIX . 'product_description pd ON (p.product_id = pd.product_id) WHERE pd.language_id = "' . (int)$this->config->get('config_language_id') . '"';
        if (!empty($filter_data['search'])) {
            $search = $filter_data['search'];
            $search = trim($search);
            $search = mb_strtolower($search);
            $sql .= 'AND ( LCASE(p.model) LIKE ("%' . $this->db->escape($search) . '%") OR LCASE(pd.name) LIKE ("%' . $this->db->escape($search) . '%") )';
        }
        if (!empty($filter_data['products'])) {
            $sql .= ' AND p.product_id IN (' . implode(', ', array_unique($filter_data['products'])) . ')';
        }
        $query = $this->db->query($sql);
        return $query->rows;
    }

    public function addProductsToGroup($product_group) {
        if (!empty($product_group['products'])) {
            $enabled_attributes = isset($product_group['enabled_attribute']) ? $product_group['enabled_attribute'] : [];
            $disabled_attributes = [];
            foreach ($this->getProductGroupAttributes($product_group['products']) as $attribute) {
                if (!in_array($attribute['attribute_id'], $enabled_attributes)) {
                    $disabled_attributes[] = $attribute['attribute_id'];
                }
            }
            $attribute_type = isset($product_group['attribute_type']) ? $product_group['attribute_type'] : [];
            $attribute_type_cat = isset($product_group['attribute_type_cat']) ? $product_group['attribute_type_cat'] : [];
            $attribute_types = [];
            $attribute_types_cat = [];
            foreach ($attribute_type as $attribute_id => $value) {
                $attribute_types[] = [$attribute_id => $value];
            }
            foreach ($attribute_type_cat as $attribute_id => $value) {
                $attribute_types_cat[] = [$attribute_id => $value];
            }
            if (!empty($product_group['main_product'])) {
                $main_product = $product_group['main_product'];
            } else {
                $main_product = 0;
            }
            $this->db->query('INSERT INTO ' . DB_PREFIX . 'sppro_group_product_group SET main_product_id = ' . (int)$main_product . ', disabled_attributes = "' . $this->db->escape(json_encode($disabled_attributes)) . '", attribute_types = "' . $this->db->escape(json_encode($attribute_types)) . '", attribute_types_cat = "' . $this->db->escape(json_encode($attribute_types_cat)) . '";');
            $product_group_id = $this->db->getLastId();
            foreach ($product_group['products'] as $product_id => $product) {
                $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_product_group_products WHERE product_id = ' . (int)$product_id);
                $show_in_category = !isset($product['show_in_category']) ? 0 : 1;
                $this->db->query('INSERT INTO ' . DB_PREFIX . 'sppro_group_product_group_products SET product_group_id = ' . (int)$product_group_id . ', product_id = ' . (int)$product_id . ', attr_image = "' . $this->db->escape($product['attr_image']) . '", show_in_category = ' . (int)$show_in_category . ', sort_order = ' . (int)$product['sort_order']);
            }
        }
        $this->clearEmptyProductGroups();
    }

    public function removeProductsFromGroup($product_group) {
        if (!empty($product_group['products'])) {
            foreach ($product_group['products'] as $product_id => $product) {
                $this->db->query('UPDATE  ' . DB_PREFIX . 'sppro_group_product_group SET main_product_id = 0 WHERE main_product_id = ' . (int)$product_id);
                $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_product_group_products WHERE product_id = ' . (int)$product_id);
            }
        }
        $this->clearEmptyProductGroups();
    }

    private function clearEmptyProductGroups() {
        $query = $this->db->query('SELECT *, (SELECT COUNT(*) FROM ' . DB_PREFIX . 'sppro_group_product_group_products gpgp WHERE gpgp.product_group_id = gpg.product_group_id) as total FROM ' . DB_PREFIX . 'sppro_group_product_group gpg');
        foreach ($query->rows as $row) {
            $query = $this->db->query('SELECT product_group_id, COUNT(*) as total FROM ' . DB_PREFIX . 'sppro_group_product_group_products GROUP BY product_group_id');
            if ($row['total'] <= 1) {
                $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_product_group WHERE product_group_id = ' . (int)$row['product_group_id']);
            }
            if ($row['total'] == 1) {
                $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_product_group_products WHERE product_group_id = ' . (int)$row['product_group_id']);
            }
        }
    }

    public function getProductGroupByProductId($product_id) {
        $group_data = [];
        $query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group_products WHERE product_id = ' . $product_id);
        if ($query->num_rows) {
            $group_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group WHERE product_group_id = ' . $query->row['product_group_id']);
            if ($group_query->num_rows) {
                $group_data = array(
                    'main_product_id' => $group_query->row['main_product_id'],
                    'products' => [],
                );
                $group_products_query = $this->db->query('SELECT *, gpgp.attr_image, gpgp.sort_order FROM ' . DB_PREFIX . 'sppro_group_product_group_products gpgp LEFT JOIN ' . DB_PREFIX . 'product p ON (p.product_id = gpgp.product_id) LEFT JOIN ' . DB_PREFIX . 'product_description pd ON (pd.product_id = gpgp.product_id) WHERE gpgp.product_group_id = ' . $query->row['product_group_id'] . ' AND pd.language_id = ' . (int)$this->config->get('config_language_id'));
                foreach ($group_products_query->rows as $row) {
                    $group_data['products'][] = $row;
                }
            }
        }
        return $group_data;
    }

    public function getProductGroupAttributeType($current_attribute_id, $current_product, $cat = 'false') {
        $attribute_type = null;
        $product_qroup_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group_products gpgp LEFT JOIN ' . DB_PREFIX . 'sppro_group_product_group gpg ON (gpgp.product_group_id = gpg.product_group_id) WHERE gpgp.product_id = ' . (int)$current_product);
        if ($product_qroup_query->num_rows) {
            if ($cat == 'true') {
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
        return $attribute_type;
    }

    public function getProductGroupAttributes($products) {
        $product_attributes = [];
        if ($products) {
            $current_product = false;
            $products_ids = [];
            foreach ($products as $product_id => $product) {
                if (!empty($product['product_id'])) {
                    $products_ids[] = $product['product_id'];
                    if (!empty($product['current_product'])) {
                        $current_product = $product['product_id'];
                    }
                } else {
                    $products_ids[] = $product_id;
                }
            }
            $attributes_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'product_attribute pa LEFT JOIN ' . DB_PREFIX . 'sppro_group_attribute ga ON (pa.attribute_id = ga.attribute_id) LEFT JOIN ' . DB_PREFIX . 'attribute_description ad ON (pa.attribute_id = ad.attribute_id) WHERE pa.product_id IN (' . implode(', ', $products_ids) . ') AND pa.language_id = ' . (int)$this->config->get('config_language_id') . ' AND ad.language_id = ' . (int)$this->config->get('config_language_id') . ' GROUP BY pa.attribute_id ');
            foreach ($attributes_query->rows as $row) {
                $product_attributes[$row['attribute_id']] = [
                    'attribute_id' => $row['attribute_id'],
                    'name' => $row['name'],
                    'disabled' => false,
                    'type' => ($current_product) ? $this->getProductGroupAttributeType($row['attribute_id'], $current_product, 'false') : null,
                    'type_cat' => ($current_product) ? $this->getProductGroupAttributeType($row['attribute_id'], $current_product, 'true') : null,
                ];
            }
            if ($current_product) {
                $product_qroup_query = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'sppro_group_product_group_products gpgp LEFT JOIN ' . DB_PREFIX . 'sppro_group_product_group gpg ON (gpgp.product_group_id = gpg.product_group_id) WHERE gpgp.product_id = ' . (int)$current_product);
                if ($product_qroup_query->num_rows) {
                    if ($product_qroup_query->row['disabled_attributes']) {
                        foreach (json_decode($product_qroup_query->row['disabled_attributes'], true) as $attribute_id) {
                            if (!empty($product_attributes[$attribute_id])) {
                                $product_attributes[$attribute_id]['disabled'] = true;
                            }
                        }
                    }
                }
            }
        }
        return $product_attributes;
    }

    public function getCategoriesByProduct($product_id) {
        $categories = $this->db->query('SELECT * FROM ' . DB_PREFIX . 'product_to_category WHERE product_id = ' . (int)$product_id);
        if ($categories->num_rows) {
            return $categories->rows;
        }
        return [];
    }

    public function checkDB() {
        if (!$this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "sppro_group'")->num_rows) {
            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group` (`group_id` int(11) NOT NULL, `type` varchar(100) NOT NULL, `help` varchar(100) NOT NULL, `category_status` int(11) NOT NULL, `title_status` int(11) NOT NULL, `sort_order` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group` ADD PRIMARY KEY (`group_id`)");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group` MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0");

            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group_attribute` (`group_id` int(11) NOT NULL, `attribute_id` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_attribute` ADD UNIQUE KEY `group_id` (`group_id`,`attribute_id`)");

            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group_attribute_text` (`attribute_value_key` varchar(1000) NOT NULL, `group_id` int(11) NOT NULL, `attribute_id` int(11) NOT NULL, `first_color` varchar(100) NOT NULL, `second_color` varchar(100) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_attribute_text` ADD UNIQUE KEY `attribute_key` (`attribute_value_key`,`group_id`)");

            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group_attribute_text_description` (`attribute_value_key` varchar(1000) NOT NULL, `language_id` int(11) NOT NULL, `group_id` int(11) NOT NULL, `attribute_id` int(11) NOT NULL, `text` varchar(1000) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_attribute_text_description` ADD UNIQUE KEY `attribute_value_key` (`attribute_value_key`,`language_id`,`group_id`)");

            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group_description` (`group_id` int(11) NOT NULL, `language_id` int(11) NOT NULL, `name` varchar(1000) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_description` ADD UNIQUE KEY `group_id` (`group_id`,`language_id`)");

            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group_product_group` (`product_group_id` int(11) NOT NULL, `main_product_id` int(11) NOT NULL, `auto` int(11) NOT NULL, `disabled_attributes` varchar(2000) NOT NULL, `attribute_types` varchar(2000) NOT NULL, `attribute_types_cat` varchar(2000) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_product_group` ADD PRIMARY KEY (`product_group_id`), ADD KEY `main_product_id` (`main_product_id`)");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_product_group` MODIFY `product_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0");

            $this->db->query("CREATE TABLE `" . DB_PREFIX . "sppro_group_product_group_products` (`product_group_id` int(11) NOT NULL, `product_id` int(11) NOT NULL, `attr_image` varchar(255) NOT NULL, `sort_order` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            $this->db->query("ALTER TABLE `" . DB_PREFIX . "sppro_group_product_group_products` ADD UNIQUE KEY `product_group_id` (`product_group_id`,`product_id`)");
        }
        if (!$this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "sppro_group_product_group_products` LIKE 'attr_image'")->num_rows) {
            $this->db->query('ALTER TABLE `' . DB_PREFIX . 'sppro_group_product_group_products` ADD COLUMN attr_image VARCHAR(255) NOT NULL');
        }
        if (!$this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "sppro_group_product_group` LIKE 'attribute_types'")->num_rows) {
            $this->db->query('ALTER TABLE `' . DB_PREFIX . 'sppro_group_product_group` ADD COLUMN `attribute_types` varchar(2000) NOT NULL');
        }
        if (!$this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "sppro_group_product_group` LIKE 'attribute_types_cat'")->num_rows) {
            $this->db->query('ALTER TABLE `' . DB_PREFIX . 'sppro_group_product_group` ADD COLUMN `attribute_types_cat` varchar(2000) NOT NULL AFTER `attribute_types`;');
        }
        if (!$this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "sppro_group_product_group` LIKE 'auto'")->num_rows) {
            $this->db->query('ALTER TABLE `' . DB_PREFIX . 'sppro_group_product_group` ADD COLUMN `auto` INT(11) NOT NULL AFTER `main_product_id`;');
        }
        if (!$this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "sppro_group` LIKE 'type_cat'")->num_rows) {
            $this->db->query('ALTER TABLE `' . DB_PREFIX . 'sppro_group` ADD COLUMN `type_cat` varchar(100) NOT NULL AFTER `type`;');
        }
        if (!$this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "sppro_group_product_group_products` LIKE 'show_in_category'")->num_rows) {
            $this->db->query('ALTER TABLE `' . DB_PREFIX . 'sppro_group_product_group_products` ADD COLUMN `show_in_category`  TINYINT(1) DEFAULT 0 AFTER `attr_image`;');
        }
    }

    /*-----------auto-group-----------*/
    public function autoGroupGetProductValues() {
        $this->load->language('extension/module/' . $this->ext);
        return [
            'name' => $this->language->get('txt_filter_by_name'),
            'model' => $this->language->get('txt_filter_by_model'),
            'sku' => $this->language->get('txt_filter_by_sku'),
            'upc' => $this->language->get('txt_filter_by_upc'),
            'ean' => $this->language->get('txt_filter_by_ean'),
            'jan' => $this->language->get('txt_filter_by_jan'),
            'isbn' => $this->language->get('txt_filter_by_isbn'),
            'mpn' => $this->language->get('txt_filter_by_mpn'),
        ];
    }

    public function autoGroupSet($setting) {
        $result = 0;
        $products = $this->autoGroupGetProducts($setting);
        if ($products) {
            $grouped_products = [];
            $grouped_products_query = $this->db->query('SELECT DISTINCT(product_id) FROM ' . DB_PREFIX . 'sppro_group_product_group_products');
            foreach ($grouped_products_query->rows as $row) {
                $grouped_products[] = $row['product_id'];
            }
            $products_by_groups = [];
            foreach ($products as $product) {
                if (!in_array($product['product_id'], $grouped_products)) {
                    foreach ($this->autoGroupGetProductValues() as $value => $description) {
                        if (!empty($product[$value]) && !empty($setting['products'][$value])) {
                            $products_by_groups[$value][$product[$value]][] = $product;
                        }
                    }
                }
            }
            // name part
            if (!empty($setting['products']['name_part']) && !empty($setting['products']['name_part_diff'])) {
                if ((int)$setting['products']['name_part_diff']) {
                    $products_data = [];
                    $products_groups = [];
                    $groups_products = [];
                    foreach ($products as $product) {
                        $products_data[$product['product_id']] = $product;
                        $name_explode = explode(' ', $product['name']);
                        for ($i = 1; $i <= (int)$setting['products']['name_part_diff']; $i++) {
                            $group = implode('_', array_slice($name_explode, 0, (count($name_explode) - $i)));
                            $groups_products[$group][] = $product;
                            $products_groups[$product['product_id']][] = $group;
                        }
                    }
                    foreach ($products_groups as $product_id => $product_groups) {
                        $product_group_key = false;
                        $product_group_count = false;
                        foreach ($product_groups as $product_group) {
                            if (isset($groups_products[$product_group])) {
                                if (!$product_group_count || ($product_group_count < count($groups_products[$product_group]))) {
                                    $product_group_count = count($groups_products[$product_group]);
                                    $product_group_key = $product_group;
                                }
                            }
                        }
                        if ($product_group_key) {
                            $products_by_groups['name_part'][$product_group_key][$product_id] = $products_data[$product_id];
                        }
                    }
                }
            }
            if (!empty($setting['attributes'])) {
                $enabled_attributes = array_keys($setting['attributes']);
            } else {
                $enabled_attributes = [];
            }
            $groups = [];
            foreach ($products_by_groups as $value_key => $product_groups) {
                foreach ($product_groups as $value_product => $group_products) {
                    $products = [];
                    $products_id = [];
                    foreach ($group_products as $product) {
                        if (!in_array($product['product_id'], $grouped_products)) {
                            $products[] = $product;
                            $products_id[] = $product['product_id'];
                        }
                    }
                    if (count($products) > 1) {
                        $disabled_attributes = [];
                        $allowed_attributes = [];
                        foreach ($this->getProductGroupAttributes($products) as $attribute) {
                            if (in_array($attribute['attribute_id'], $enabled_attributes)) {
                                $allowed_attributes[] = $attribute['attribute_id'];
                            } else {
                                $disabled_attributes[] = $attribute['attribute_id'];
                            }
                        }
                        if ($allowed_attributes) {
                            $grouped_products = array_merge($grouped_products, $products_id);
                            $groups[] = array(
                                'main_product' => 0,
                                'disabled_attributes' => $disabled_attributes,
                                'products' => $products,
                            );
                        }
                    }
                }
            }
            if ($groups) {
                foreach ($groups as $group) {
                    $this->db->query('INSERT INTO ' . DB_PREFIX . 'sppro_group_product_group SET main_product_id = ' . (int)$group['main_product'] . ', disabled_attributes = "' . $this->db->escape(json_encode($group['disabled_attributes'])) . '", auto = 1');
                    $product_group_id = $this->db->getLastId();
                    foreach ($group['products'] as $product) {
                        $this->db->query('DELETE FROM ' . DB_PREFIX . 'sppro_group_product_group_products WHERE product_id = ' . (int)$product['product_id']);
                        $show_in_category = !isset($product['show_in_category']) ? 0 : 1;
                        $this->db->query('INSERT INTO ' . DB_PREFIX . 'sppro_group_product_group_products SET product_group_id = ' . (int)$product_group_id . ', product_id = ' . (int)$product['product_id'] . ', show_in_category = ' . (int)$show_in_category . ', sort_order = ' . (int)$product['sort_order']);
                    }
                    $result++;
                }
            }
        }
        return $result;
    }

    public function autoGroupRemove() {
        $this->db->query("DELETE pgp, pg FROM " . DB_PREFIX . "sppro_group_product_group_products pgp LEFT JOIN " . DB_PREFIX . "sppro_group_product_group pg ON (pgp.product_group_id = pg.product_group_id) WHERE pg.auto = 1");
        return true;
    }

    public function autoGroupGetAttributes($setting) {
        $attributes = [];
        $products = $this->autoGroupGetProducts($setting);
        if ($products) {
            $sql = "SELECT DISTINCT(pa.attribute_id), ad.name FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (pa.attribute_id = ad.attribute_id) WHERE ad.language_id = " . $this->config->get('config_language_id');
            $sql .= " AND pa.product_id IN (" . implode(',', array_map(function ($product) {
                    return $product['product_id'];
                }, $products)) . ")";
            $sql .= " ORDER BY ad.name";
            $query = $this->db->query($sql);
            $module_setting = $this->config->get('module_sppro_product_group_auto_setting');
            foreach ($query->rows as $row) {
                $attributes[] = array(
                    'attribute_id' => $row['attribute_id'],
                    'name' => $row['name'],
                    'checked' => isset($module_setting['attributes'][$row['attribute_id']]),
                );
            }
        }
        return $attributes;
    }

    public function autoGroupGetProducts($setting) {
        $sql = "SELECT p.product_id, p.model, p.sku, p.upc, p.ean, p.jan, p.isbn, p.mpn, p.sort_order, pd.name";
        if (!empty($setting['categories'])) {
            $sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
            $sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
        } else {
            $sql .= " FROM " . DB_PREFIX . "product p";
        }
        $sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";
        $sql .= " WHERE pd.language_id = " . $this->config->get('config_language_id');
        if (!empty($setting['manufacturers'])) {
            $sql .= " AND p.manufacturer_id IN (" . implode(',', $setting['manufacturers']) . ")";
        }
        if (!empty($setting['categories'])) {
            $sql .= " AND cp.path_id IN (" . implode(',', $setting['categories']) . ")";
        }
        $sql .= " ORDER BY pd.name";
        $query = $this->db->query($sql);
        return $query->rows;
    }
    /*-----------/auto-group-----------*/

    /*-----------get-data-----------*/
    public function getOtherData() {
        $data = [];
        return $data;
    }
    /*-----------get-data-----------*/
}