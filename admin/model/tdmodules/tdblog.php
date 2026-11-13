<?php
class ModeltdmodulesTdblog extends Model {
	public function createBlogs() {
		$create_tdblog = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tdblog` (`tdblog_id` int(11) NOT NULL auto_increment, `module_id` int(11) NOT NULL, `status` int(1) NOT NULL default '0', `image` varchar(255) default NULL, `date_added` datetime NOT NULL default '0000-00-00 00:00:00', `date_modified` datetime NOT NULL default '0000-00-00 00:00:00', PRIMARY KEY (`tdblog_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tdblog);

		$create_tdblog_description = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tdblog_description` (`tdblog_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` varchar(64) NOT NULL default '', `description` text NOT NULL, PRIMARY KEY (`tdblog_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tdblog_description);

		$create_tdblog_comment = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tdblog_comment` (`tdblog_comment_id` int(11) NOT NULL auto_increment, `tdblog_id` int(11) NOT NULL, `approved` int(1) NOT NULL default '0', `author` varchar(64) NOT NULL default '', `email` varchar(96) NOT NULL, `date_added` datetime NOT NULL default '0000-00-00 00:00:00', PRIMARY KEY (`tdblog_comment_id`, `tdblog_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tdblog_comment);

		$create_tdblog_comment_description = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tdblog_comment_description` (`tdblog_comment_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `comment` text NOT NULL, PRIMARY KEY (`tdblog_comment_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
		$this->db->query($create_tdblog_comment_description);
	}

	public function dropBlogs() {
		$drop_tdblog = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tdblog`;";
		$this->db->query($drop_tdblog);

		$drop_tdblog_description = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tdblog_description`;";
		$this->db->query($drop_tdblog_description);

		$drop_tdblog_comment = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tdblog_comment`;";
		$this->db->query($drop_tdblog_comment);

		$drop_tdblog_comment_description = "DROP TABLE IF EXISTS `" . DB_PREFIX . "tdblog_comment_description`;";
		$this->db->query($drop_tdblog_comment_description);
	}

	public function addModule($code, $data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "module` SET `name` = '" . $this->db->escape($data['name']) . "', `code` = '" . $this->db->escape($code) . "', `setting` = '" . $this->db->escape(json_encode($data)) . "'");

		$module_id = $this->db->getLastId();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "'");

		$settings = json_decode($query->row['setting'], true);

		$settings['module_id'] = $module_id;

		$this->db->query("UPDATE " . DB_PREFIX . "module SET setting = '" . $this->db->escape(json_encode($settings)) . "' WHERE module_id = '" . (int)$module_id . "'");

		return $module_id;
	}

	public function addBlog($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "tdblog SET module_id = '" . (int)$data['module_id'] . "', status = '" . (int)$data['status'] . "', date_added = now(), date_modified = now()");

		$tdblog_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "tdblog SET image = '" . $this->db->escape($data['image']) . "' WHERE tdblog_id = '" . (int)$tdblog_id . "'");
		}

		foreach ($data['tdblog_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tdblog_description SET tdblog_id = '" . (int)$tdblog_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function editBlog($tdblog_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "tdblog SET module_id = '" . (int)$data['module_id'] . "', status = '" . (int)$data['status'] . "', date_modified = now() WHERE tdblog_id = '" . (int)$tdblog_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "tdblog SET image = '" . $this->db->escape($data['image']) . "' WHERE tdblog_id = '" . (int)$tdblog_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "tdblog_description WHERE tdblog_id = '" . (int)$tdblog_id . "'");

		foreach ($data['tdblog_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "tdblog_description SET tdblog_id = '" . (int)$tdblog_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function deleteBlog($tdblog_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tdblog WHERE tdblog_id = '" . (int)$tdblog_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "tdblog_description WHERE tdblog_id = '" . (int)$tdblog_id . "'");
	}

	public function getBlog($tdblog_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tdblog WHERE tdblog_id = '" . (int)$tdblog_id . "'");

		return $query->row;
	}

	public function getBlogTitle($tdblog_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog_description WHERE language_id = '" . (int)$this->config->get('config_language_id') . "' AND tdblog_id = '" . (int)$tdblog_id . "'");

		if ($query->row) {
			return $query->row['title'];
		} else {
			return false;
		}
	}

	public function getBlogDescriptions($tdblog_id) {
		$tdblog_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog_description WHERE tdblog_id = '" . (int)$tdblog_id . "'");

		foreach ($query->rows as $result) {
			$tdblog_description_data[$result['language_id']] = array(
				'title'       => $result['title'],
				'description' => $result['description']
			);
		}

		return $tdblog_description_data;
	}

	public function deleteBlogComment($tdblog_comment_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tdblog_comment WHERE tdblog_comment_id = '" . (int)$tdblog_comment_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "tdblog_comment_description WHERE tdblog_comment_id = '" . (int)$tdblog_comment_id . "'");
	}

	public function approveComment($tdblog_comment_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "tdblog_comment SET approved = '1' WHERE tdblog_comment_id = '" . (int)$tdblog_comment_id . "'");
	}

	public function disapproveComment($tdblog_comment_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "tdblog_comment SET approved = '0' WHERE tdblog_comment_id = '" . (int)$tdblog_comment_id . "'");
	}

	public function getTotalBlogComments($tdblog_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tdblog_comment WHERE tdblog_id = '" . (int)$tdblog_id . "'");

		if ($query->row) {
			return $query->row['total'];
		} else {
			return false;
		}
	}

	public function getBlogComments($tdblog_id, $data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "tdblog_comment WHERE tdblog_id = '" . (int)$tdblog_id . "'";

			$sort_data = array(
				'author',
				'date_added'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY date_added";
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
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog_comment WHERE tdblog_id = '" . (int)$tdblog_id . "'");

			return $query->rows;
		}
	}

	public function getBlogComment($tdblog_comment_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog_comment WHERE tdblog_comment_id = '" . (int)$tdblog_comment_id . "'");

		return $query->row;
	}

	public function getBlogCommentDescriptions($tdblog_comment_id) {
		$tdblog_comment_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog_comment_description WHERE tdblog_comment_id = '" . (int)$tdblog_comment_id . "'");

		foreach ($query->rows as $result) {
			$tdblog_comment_data[$result['language_id']] = array(
				'comment' => $result['comment']
			);
		}

		return $tdblog_comment_data;
	}

	public function getBlogsByModule($module_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog b LEFT JOIN " . DB_PREFIX . "tdblog_description bd ON (b.tdblog_id = bd.tdblog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.module_id = '" . (int)$module_id . "' ORDER BY b.date_added");

		return $query->rows;
	}

	public function getBlogs($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "tdblog b LEFT JOIN " . DB_PREFIX . "tdblog_description bd ON (b.tdblog_id = bd.tdblog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

			$sort_data = array(
				'bd.title',
				'b.module_id',
				'b.date_added'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY b.module_id, b.date_added";
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
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tdblog b LEFT JOIN " . DB_PREFIX . "tdblog_description bd ON (b.tdblog_id = bd.tdblog_id) WHERE bd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY b.date_added ASC");

			return $query->rows;
		}
	}

	public function getTotalBlogs() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tdblog");

		return $query->row['total'];
	}

	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "module` WHERE `module_id` = '" . (int)$module_id . "'");

		return $query->row;
	}
}