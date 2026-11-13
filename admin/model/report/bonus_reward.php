<?php
class ModelReportBonusReward extends Model {
	public function getCustomerReward($data = array()) {
		$sql = "SELECT cr.* FROM " . DB_PREFIX . "customer_reward cr LEFT JOIN " . DB_PREFIX . "customer c ON (cr.customer_id = c.customer_id)";

		$implode = array();

		if (!empty($data['filter_customer'])) {
			$implode[] = "cr.customer_id > 0 AND CONCAT(c.firstname, ' ', c.lastname) LIKE '" . $this->db->escape($data['filter_customer']) . "'";
		}

		if (!empty($data['filter_type'])) {
			if ($data['filter_type'] == 'add') {
				$implode[] = "cr.points > 0";
			} elseif ($data['filter_type'] == 'remove') {
				$implode[] = "cr.points < 0";
			}
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$sql .= " ORDER BY cr.date_added DESC";

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

	public function getTotalReward($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_reward cr LEFT JOIN " . DB_PREFIX . "customer c ON (cr.customer_id = c.customer_id)";

		$implode = array();

		if (!empty($data['filter_customer'])) {
			$implode[] = "cr.customer_id > 0 AND CONCAT(c.firstname, ' ', c.lastname) LIKE '" . $this->db->escape($data['filter_customer']) . "'";
		}

		if (!empty($data['filter_type'])) {
			if ($data['filter_type'] == 'add') {
				$implode[] = "cr.points > 0";
			} elseif ($data['filter_type'] == 'remove') {
				$implode[] = "cr.points < 0";
			}
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
}
