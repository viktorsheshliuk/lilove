<?php
class ModelTdslideshowSlide extends Model {
	public function addtdslideshow($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow SET
			name = '" . $this->db->escape($data['name']) . "',
			status = '" . (int)$data['status'] . "',
			auto = '" . (int)$data['auto'] . "',
			delay = '" . (int)$data['delay'] . "',
			hover = '" . (int)$data['hover'] . "',
			nextback = '" . (int)$data['nextback'] . "',
			contrl = '" . (int)$data['contrl'] . "',
			effect = '" . $data['effect'] . "'");

		$tdslideshow_id = $this->db->getLastId();

		if (isset($data['tdslideshow_image'])) {
			foreach ($data['tdslideshow_image'] as $tdslideshow_image) {

				$banner_store = "";
				if(isset($tdslideshow_image['banner_store'])) {
					$banner_store = implode(',', $tdslideshow_image['banner_store']);
				}
				$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow_image SET
					tdslideshow_id = '" . (int)$tdslideshow_id . "',
					link = '" .  $this->db->escape($tdslideshow_image['link']) . "',
					image = '" .  $this->db->escape($tdslideshow_image['image']) . "',
					small_image = '" .  $this->db->escape($tdslideshow_image['small_image']) . "',
					banner_store = '" .$banner_store. "'");

				$tdslideshow_image_id = $this->db->getLastId();

				foreach ($tdslideshow_image['tdslideshow_image_description'] as $language_id => $tdslideshow_image_description) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow_image_description SET
						tdslideshow_image_id = '" . (int)$tdslideshow_image_id . "',
						language_id = '" . (int)$language_id . "',
						tdslideshow_id = '" . (int)$tdslideshow_id . "',
						title = '" .  $this->db->escape($tdslideshow_image_description['title']) . "'");
				}
			}
		}
	}

	public function copySlideshow($tdslideshow_id) {
		$slideshow = $this->gettdslideshow($tdslideshow_id);
		$slideshowImages = $this->gettdslideshowImages($tdslideshow_id);

		$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow SET
			name = '" . $this->db->escape($slideshow['name']) . "',
			status = '" . (int)$slideshow['status'] . "',
			auto = '" . (int)$slideshow['auto'] . "',
			delay = '" . (int)$slideshow['delay'] . "',
			hover = '" . (int)$slideshow['hover'] . "',
			nextback = '" . (int)$slideshow['nextback'] . "',
			contrl = '" . (int)$slideshow['contrl'] . "',
			effect = '" . $slideshow['effect'] . "'");

		$tdslideshow_id = $this->db->getLastId();

		if (isset($slideshowImages)) {
			foreach ($slideshowImages as $tdslideshow_image) {

				$banner_store = "";
				if(isset($tdslideshow_image['banner_store'])) {
					$banner_store = implode(',', $tdslideshow_image['banner_store']);
				}

				$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow_image SET
					tdslideshow_id = '" . (int)$tdslideshow_id . "',
					link = '" .  $this->db->escape($tdslideshow_image['link']) . "',
					image = '" .  $this->db->escape($tdslideshow_image['image']) . "',
					small_image = '" .  $this->db->escape($tdslideshow_image['small_image']) . "',
					banner_store = '" .$banner_store. "'");

				$tdslideshow_image_id = $this->db->getLastId();

				foreach ($tdslideshow_image['tdslideshow_image_description'] as $language_id => $tdslideshow_image_description) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow_image_description SET tdslideshow_image_id = '" . (int)$tdslideshow_image_id . "', language_id = '" . (int)$language_id . "',
						tdslideshow_id = '" . (int)$tdslideshow_id . "',
						title = '" .  $this->db->escape($tdslideshow_image_description['title']) . "'");
				}
			}
		}
	}

	public function edittdslideshow($tdslideshow_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tdslideshow SET
			name = '" . $this->db->escape($data['name']) . "',
			status = '" . (int)$data['status'] . "',
			auto = '" . (int)$data['auto'] . "',
			delay = '" . (int)$data['delay'] . "',
			hover = '" . (int)$data['hover'] . "',
			nextback = '" . (int)$data['nextback'] . "',
			effect = '" . $data['effect'] . "',
			contrl = '" . (int)$data['contrl'] . "' WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "tdslideshow_image WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tdslideshow_image_description WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");
		if (isset($data['tdslideshow_image'])) {

			foreach ($data['tdslideshow_image'] as $tdslideshow_image) {

				$banner_store = "";
				if(isset($data['banner_store'])) {
					$banner_store = implode(',', $data['banner_store']);
				}
				$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow_image SET
					tdslideshow_id = '" . (int)$tdslideshow_id . "',
					link = '" .$this->db->escape($tdslideshow_image['link']) . "',
					image = '" .$this->db->escape($tdslideshow_image['image']) . "',
					small_image = '" .$this->db->escape($tdslideshow_image['small_image']) . "',
					banner_store = '" .  $banner_store . "'");

				$tdslideshow_image_id = $this->db->getLastId();

				foreach ($tdslideshow_image['tdslideshow_image_description'] as $language_id => $tdslideshow_image_description) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "tdslideshow_image_description SET
						tdslideshow_image_id = '" . (int)$tdslideshow_image_id . "',
						language_id = '" . (int)$language_id . "',
						tdslideshow_id = '" . (int)$tdslideshow_id . "',
						title = '" .  $this->db->escape($tdslideshow_image_description['title']) . "'");
				}
			}
		}
	}

	public function deletetdslideshow($tdslideshow_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tdslideshow WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tdslideshow_image WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tdslideshow_image_description WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");
	}

	public function gettdslideshow($tdslideshow_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tdslideshow WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");

		return $query->row;
	}

	public function gettdslideshows($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "tdslideshow";

		$sort_data = array(
			'name',
			'status'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function gettdslideshowImages($tdslideshow_id) {
		$tdslideshow_image_data = array();

		$tdslideshow_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdslideshow_image WHERE tdslideshow_id = '" . (int)$tdslideshow_id . "'");

		foreach ($tdslideshow_image_query->rows as $tdslideshow_image) {
			$tdslideshow_image_description_data = array();

			$tdslideshow_image_description_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdslideshow_image_description WHERE tdslideshow_image_id = '" . (int)$tdslideshow_image['tdslideshow_image_id'] . "' AND tdslideshow_id = '" . (int)$tdslideshow_id . "'");

			foreach ($tdslideshow_image_description_query->rows as $tdslideshow_image_description) {
				$tdslideshow_image_description_data[$tdslideshow_image_description['language_id']] =
				array('title' => $tdslideshow_image_description['title']);
			}

			$tdslideshow_image_data[] = array(
				'tdslideshow_image_description' => $tdslideshow_image_description_data,
				'link'                     => $tdslideshow_image['link'],
				'image'                    => $tdslideshow_image['image'],
				'small_image'			   => $tdslideshow_image['small_image'],
				'banner_store'             => $tdslideshow_image['banner_store']
			);
		}

		return $tdslideshow_image_data;
	}

	public function getTotaltdslideshows() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tdslideshow");

		return $query->row['total'];
	}

	public function deleteTable() {
			$sql = array();
			$sql[] = "DROP TABLE `".DB_PREFIX."tdslideshow";
			$sql[] = "DROP TABLE `".DB_PREFIX."tdslideshow_image";
			$sql[] = "DROP TABLE `".DB_PREFIX."tdslideshow_image_description";
			foreach( $sql as $q ){
				$query = $this->db->query($q);
			}
			return true;
	}

	public function createTable() {
		$sql = array();
		$sql[] = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."tdslideshow` (
					  `tdslideshow_id` int(11) NOT NULL AUTO_INCREMENT,
					  `name` varchar(64) NOT NULL,
					  `status` tinyint(1) NOT NULL,
					  `auto` tinyint(1) DEFAULT NULL,
					  `delay` int(11) DEFAULT NULL,
					  `hover` tinyint(1) DEFAULT NULL,
					  `nextback` tinyint(1) DEFAULT NULL,
					  `contrl` tinyint(1) DEFAULT NULL,
					  `effect` varchar(64) NOT NULL,
					  PRIMARY KEY (`tdslideshow_id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;";
		$sql[] = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."tdslideshow_image` (
					  `tdslideshow_image_id` int(11) NOT NULL AUTO_INCREMENT,
					  `tdslideshow_id` int(11) NOT NULL,
					  `link` varchar(255) NOT NULL,
					  `banner_store` varchar(110) DEFAULT '0',
					  `image` varchar(255) NOT NULL,
					  `small_image` varchar(255) DEFAULT NULL,
					  PRIMARY KEY (`tdslideshow_image_id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;";
		$sql[] = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."tdslideshow_image_description` (
					  `tdslideshow_image_id` int(11) NOT NULL,
					  `language_id` int(11) NOT NULL,
					  `tdslideshow_id` int(11) NOT NULL,
					  `title` varchar(64) NOT NULL,
					  PRIMARY KEY (`tdslideshow_image_id`,`language_id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

		foreach( $sql as $q ){
			$query = $this->db->query($q);
		}
		return true;
	}

	public function alterTable() {
		$check_sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "tdslideshow_image` LIKE 'small_image'";
        $query = $this->db->query($check_sql);
        if($query->rows) {
            return;
        } else {
            $sql = "ALTER TABLE `" . DB_PREFIX . "tdslideshow_image` ADD `small_image` varchar(255) DEFAULT NULL";
            $this->db->query($sql);
            return;
        }
	}
}
?>