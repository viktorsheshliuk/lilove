<?php

class ModelExtensionTotalPrePayment extends Model {

    public function getAllStockStatus() {
        $all_stock_status = $this->db->query("SELECT * FROM " . DB_PREFIX . "stock_status ss WHERE ss.language_id = '" . (int)$this->config->get('config_language_id') . "'" );

        return $all_stock_status->rows;
    }
}