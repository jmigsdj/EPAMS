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
		foreach ($list as $release) {
			$no++;
			$row = array();
      $row[] = $release->device_id;
      $row[] = $release->name;
      $row[] = $release->model;
      $row[] = $release->resolution;
      $row[] = $release->processor;
      $row[] = $release->ram;
      $row[] = $release->os;
      $row[] = $release->gpu;
      $row[] = $release->category_id;
			$row[] = $release->condition_id;
			$row[] = $release->status_id;

			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Borrow" onclick="borrow_asset('."'".$release->id."'".')"><i class="glyphicon glyphicon-hand"></i> Borrow</a>';

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

}
