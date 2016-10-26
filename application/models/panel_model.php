<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_model extends MY_Model {

	public function __construct() {
		parent::__construct();

	}


	public function store_emp(){

	}

	public function count_user(){
		$fetch = $this->db->get("users");
		$row = $fetch->num_rows();
		return $row;
	}

	public function count_assets(){
		$fetch = $this->db->get("assets");
		$row = $fetch->num_rows();
		return $row;
	}

	public function count_borrowed(){
		//count borrowed items
	}

	public function select_inventory(){
		$query="SELECT
				a.`device_id`,
				a.`name`,
				a.`model`,
				a.`resolution`,
				a.`processor`,
				a.`ram`,
				a.`os`,
				a.`gpu`,
				a.`bit`,
				a.`simSupport`,
				cat.`categName`,
				con.`condition`
			FROM
				`assets` a
			LEFT JOIN `category` cat
				ON cat.`id` = a.`category_id`
			LEFT JOIN `condition` con
				ON con.`id` = a.`condition_id` ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}
}
?>
