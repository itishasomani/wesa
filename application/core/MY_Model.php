<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	public function tableName($name) {
		return $this->db->dbprefix($name);
	}

	/* Helpers Function for data geting and inserting */
	public function parse_args($args, $defaults) {
		if (is_object($args)) {
			$r = get_object_vars($args);
		} elseif (is_array($args)) {
			$r = &$args;
		}

		if (is_array($defaults)) {
			return array_merge($defaults, $r);
		}

		return $r;
	}
	public function db_query_fileds($table = '', $ex = '') {
		$returndata = array();
		if (!empty($ex) && !empty($this->db_query_fileds)) {
			$ex = (string) $ex;

			foreach ($this->db_query_fileds as $filed) {
				if (preg_match("/^$ex/", $filed)) {
					$filed = str_replace($ex, '', $filed);
				}
				$returndata[] = $filed;
			}

			return $returndata;
		}
		if (!empty($table)) {
			return $this->db->list_fields($table);
		}
		return;
	}

	public function update_metadata($meta_type, $object_id, $meta_key, $meta_value) {
		if (!$meta_type || !$meta_key || !is_numeric($object_id)) {
			return false;
		}
		$object_id = absint($object_id);
		if (!$object_id) {
			return false;
		}

		switch ($meta_type) {
		case 'user':
			$tablename = $this->tableName('usermeta');
			break;
		case 'transaction':
			$tablename = $this->tableName('transmeta');
			break;
		case 'term':
			$tablename = $this->tableName('termmeta');
			break;
		default:
			return false;
			break;
		}

		$meta_key = (string) $meta_key;
		$column = (string) $meta_type . '_id';

		$this->db->select("*")
			->where("meta_key", $meta_key)
			->where($column, $object_id);
		$query = $this->db->from($tablename)->get();
		$update = ($query->num_rows()) ? TRUE : FALSE;

		if (is_array($meta_value)) {
			$meta_value = serialize($meta_value);
		}

		if ($update) {
			$this->db->where(['meta_key' => $meta_key, $column => $object_id])
				->update($tablename, array(
					'meta_value' => $meta_value,
				));
			$update = $this->db->affected_rows();
			return TRUE;
		}

		$this->db->insert($tablename, [
			$column => $object_id,
			'meta_key' => $meta_key,
			'meta_value' => $meta_value,
		]);

		return $this->db->insert_id();
	}

	public function get_metadata($meta_type, $object_id, $meta_key = '', $otherConditions = array()) {
		if (!$meta_type || !is_numeric($object_id)) {
			return false;
		}
		$object_id = absint($object_id);
		if (!$object_id) {
			return false;
		}

		switch ($meta_type) {
		case 'user':
			$tablename = $this->tableName('usermeta');
			break;
		case 'transaction':
			$tablename = $this->tableName('transmeta');
			break;
		case 'term':
			$tablename = $this->tableName('termmeta');
			break;
		default:
			return false;
			break;
		}
		$column = (string) $meta_type . '_id';
		$singleRow = FALSE;
		$meta_key = filterRemoveSpace(trim($meta_key));
		$this->db->select("*");
		if (!empty($meta_key)) {
			$meta_key = (string) $meta_key;
			$this->db->where('meta_key', $meta_key);
			$singleRow = TRUE;
		}

		if (!is_null($object_id)) {
			$this->db->where($column, $object_id);
		}

		$this->db->from($tablename);
		$query = $this->db->get();

		if ($query->num_rows()) {
			if ($singleRow) {
				$item = $query->row_array();
				$results = (is_serialized($item['meta_value'])) ? unserialize($item['meta_value']) : $item['meta_value'];
			} else {
				$items = $query->result_array();
				$results = array();
				foreach ($items as $item) {
					$results[$item['meta_key']] = (is_serialized($item['meta_value'])) ? unserialize($item['meta_value']) : $item['meta_value'];
				}
			}
			return $results;
		} else {
			return false;
		}
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */