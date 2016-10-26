<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Release extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('release_model','release');
		$this->load->model('panel_model');
		$this->load->model('login_model');
		$user_id=$this->session->userdata("id");
		if(empty($user_id)){
			 redirect(base_url(),'refresh');
		 }
	}
	public function logout(){
				$this->session->userdata = array();
				$this->session->sess_destroy();
				redirect('', 'refresh');
	}

	public function index()
	{
		$user_id=$this->session->userdata("id");
		$this->load->helper('url');
		$this->load->view('content/release');
	}

	public function ajax_list()
	{
		$list = $this->release->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $asset) {
			$no++;
			$row = array();
			$row[] = $asset->device_id;
			$row[] = $asset->name;
			$row[] = $asset->model;
			$row[] = $asset->resolution;
			$row[] = $asset->processor;
			$row[] = $asset->ram;
			$row[] = $asset->os;
			$row[] = $asset->gpu;
			$row[] = $asset->bit;
			$row[] = $asset->simSupport;
			$row[] = $asset->categName;
			$row[] = $asset->condition;
			$row[] = $asset->status;

			if ($asset->status_id == "1") {
				$row[] = '
						<a class="btn btn-sm btn-warning disabled" href="javascript:void(0)" title="Delete" onclick="return_asset('."'".$asset->id."'".')"><i class="glyphicon glyphicon-arrow-up"></i> Return</a>';
			}else{
				$row[] = '
						<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Delete" onclick="return_asset('."'".$asset->id."'".')"><i class="glyphicon glyphicon-arrow-up"></i> Return</a>';
			}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->release->count_all(),
						"recordsFiltered" => $this->release->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function select_employee(){
		$id = $this->input->get('name',true);
		$result = $this->release->select_employee($id);
		$got_result='';
		if(!empty($result)){
			foreach ($result as $key) {
				$got_result[]=array("id"=>$key['id'],"text"=>$key['firstName']);
			}
		}
		//print_r($got_result);
		echo json_encode($got_result);
	}

	public function select_item(){
		$id = $this->input->get('name',true);
		$result = $this->release->select_item($id);
		$got_result='';
		if(!empty($result)){
			foreach ($result as $key) {
				$got_result[]=array("id"=>$key['id'],"text"=>$key['name']);
			}
		}
		//print_r($got_result);
		echo json_encode($got_result);
	}

}
