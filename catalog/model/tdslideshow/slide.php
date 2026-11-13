<?php
class ModelTdslideshowSlide extends Model {
	public function gettdslideshow($banner_id) {
		$select ="SELECT * FROM " . DB_PREFIX . "tdslideshow_image bi LEFT JOIN " . DB_PREFIX . "tdslideshow_image_description bid ON (bi.tdslideshow_image_id  = bid.tdslideshow_image_id) WHERE bi.tdslideshow_id = '" . (int)$banner_id . "' AND bid.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		$query = $this->db->query($select);
		return $query->rows;
	}
	public function getSettingSlide($banner_id) {
		$query = "SELECT * FROM " . DB_PREFIX .  "tdslideshow WHERE tdslideshow_id = ". (int) $banner_id;
		$result = $this->db->query($query);
		return $result->rows;
	}
}