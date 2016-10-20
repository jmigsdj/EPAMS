<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_model extends MY_Model {

	public function __construct() {
		parent::__construct();

	}
//************************************************
//			Header
//************************************************
	public function get_emp_dtl($a=''){
		$query="SELECT
				  hr.*
				FROM
				  hr_employee hr
				WHERE  hr.`hr_id` = '{$a}' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}
//************************************************
//			SideBar
//************************************************
	public function get_comp_dtl($a=''){
		$query="SELECT
				  c.*
				FROM
				  company c
				WHERE  c.`comp_id` = '{$a}' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}
//************************************************
//			Company
//************************************************
	public function select_comp($a=''){
		$query="SELECT
				  c.*
				FROM
				  company c
				WHERE c.`comp_id` LIKE '%{$a}%'
				  OR c.`comp_short_name` LIKE '%{$a}%'
				  OR c.`comp_full_name` LIKE '%{$a}%' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}

	public function select_comp_details($a=''){
		$query="SELECT
				  c.`comp_id`,
				  c.`comp_short_name`,
				  c.`comp_full_name`,
				  c.`comp_add`,
				  c.`comp_tel`,
				  c.`comp_mobile_ext`,
				  c.`comp_mobile`,
				  c.`comp_email`,
				  c.`comp_cont_person`,
				  c.`comp_cont_num`,
				  c.`bus_reg`,
				  rsbr.`bus_reg_code`,
				  c.`tax_reg`,
				  rstr.`tax_reg_code`,
				  c.`industry`,
				  rsi.`industry_code`,
				  c.`tin`,
				  c.`sss`,
				  c.`philhealth`,
				  c.`hdmf`,
				  c.`sec_reg_num`,
				  c.`comp_logo`
				FROM
				  company c
				  LEFT JOIN ref_sel_bus_reg rsbr
				    ON rsbr.`bus_reg_id` = c.`bus_reg`
				  LEFT JOIN ref_sel_tax_reg rstr
				    ON rstr.`tax_reg_id` = c.`tax_reg`
				  LEFT JOIN ref_sel_industry rsi
				    ON rsi.`industry_id` = c.`industry`
				WHERE c.`comp_id` = '{$a}' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}

	public function select_bus_reg($a=''){
		$query="SELECT
				  *
				FROM
				  ref_sel_bus_reg
				WHERE bus_reg_code LIKE '%{$a}%' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}

	public function select_tax_reg($a=''){
		$query="SELECT
				  *
				FROM
				  ref_sel_tax_reg
				WHERE tax_reg_code LIKE '%{$a}%' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}

	public function select_industry($a=''){
		$query="SELECT
				  *
				FROM
				  ref_sel_industry
				WHERE industry_code LIKE '%{$a}%' ";
		$fetch=$this->db->query($query);
		$row = $fetch->result_array();
		return $row;
	}

	public function submit_comp($a='',$b=''){
		$has_error['error']="0";
		$user_id = $this->session->userdata("user_id");
		$date =time();
		//print_r($a);
		//print_r($b);
		if($a['ind']=="1"){
			$created_by = $user_id;
			$created_date = $date;
			$a['comp_id'] = $a['company_id'];
		}else{
			$created_by = "";
			$created_date = "";
		}
		$data=[
			'comp_id'=>$a['comp_id'],
			'comp_short_name'=>$a['comp_id'],
			'comp_full_name'=>$a['comp_id'],
			'comp_add'=>$a['comp_id'],
			'comp_tel'=>$a['comp_id'],
			'comp_mobile_ext'=>$a['comp_id'],
			'comp_mobile'=>$a['comp_id'],
			'comp_email'=>$a['comp_id'],
			'comp_cont_person'=>$a['comp_id'],
			'comp_cont_num'=>$a['comp_id'],
			'tin'=>$a['comp_id'],
			'sss'=>$a['comp_id'],
			'philhealth'=>$a['comp_id'],
			'hdmf'=>$a['comp_id'],
			'tax_reg'=>$a['comp_id'],
			'industry'=>$a['comp_id'],
			'bus_reg'=>$a['comp_id'],
			'sec_reg_num'=>$a['comp_id'],
			'comp_logo'=>$a['comp_id'],
			'created_by'=>$created_by,
			'created_date'=>$created_date,
			'last_saved_by'=>$user_id,
			'last_saved'=>$date
		];
		$filtered_data = array_filter($data);
		if($a['ind']=='1'){
			$count = $this->checker_comp($a['comp_id']);
			if($count=='0'){
				//$this->db->insert('company', $filtered_data);
				$has_error["error"]='0';
			}
			else{
				$has_error["error"]='1';
			}

		}
		elseif($a['ind']=='2'){
			//$this->db->where('comp_id', $a['comp_id']);
			//$this->db->update('company', $filtered_data);
			$has_error['error']="2";
		}
		return $has_error;
	}

	public function checker_comp($a=""){
		$query="SELECT
				  *
				FROM
				  company
				WHERE comp_id = '{$a}'
				  AND is_active = '1' ";
		$fetch=$this->db->query($query);
		$row=$fetch->num_rows();
		return $row;
	}

	public function store_emp(){

	}

	public function count_user(){
		$fetch = $this->db->get("users");
		$row = $fetch->num_rows();
		return $row;
	}
}
?>
