<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Release extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('release_model','release');
		$this->load->model('asset_model','asset');
		$this->load->model('user_model','user');
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

	public function ajax_list_asset()
	{
		$list = $this->asset->_get_vanilla_datatables_query();
		$assets = array();
		foreach ($list as $asset) {
      			$assets[] =  array('device_id' => ($asset->device_id), 'device_name' => ($asset->name));
		}

		// log_message('error', json_encode($assets));
		echo json_encode($assets);
	}

	public function ajax_list_user()
	{
		$list = $this->user->_get_vanilla_datatables_query();
		$users = array();
		foreach ($list as $user) {
      			$users[] =  array('user_id' => ($user->id), 'user_name' => ($user->username));
		}

		// log_message('error', json_encode($users));
		echo json_encode($users);
	}

	public function ajax_save_potchi()
	{
		// $this->_validate();
		// log_message('error', json_encode($_POST));
		// log_message('error', $this->input->post('select-item'));
		// log_message('error', $this->input->post('select-user'));
		// log_message('error', $this->input->post('release-date'));

		$data = array(
	      	'dev_id' => $this->input->post('select-item'),
	      	'emp_id' => $this->input->post('select-user'),
	      	'release_date' => $this->input->post('release-date'),
	      	'status' => $this->input->post('select-status')
		);

		log_message('error', json_encode($data));

		$insert = $this->release->save($data);
		echo json_encode("Success");
	}

	public function ajax_populate()
	{
		// $list = $this->release->get_datatables();
		// $data = array();
		// $no = $_POST['start'];
		// foreach ($list as $release) {
		// 	$no++;
		// 	$row = array();
		//       $row[] = $release->asset_id;
		//       $row[] = $release->name;
		//       $row[] = $release->status;
		//       $row[] = $release->username;



		// 	//add html for action
		// 	// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_asset('."'".$asset->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
		// 	// 	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_asset('."'".$asset->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		// 	$data[] = $row;
		// }
		
		// $output = array(
		// 				"draw" => $_POST['draw'],
		// 				"recordsTotal" => $this->release->count_all(),
		// 				"recordsFiltered" => $this->release->count_filtered(),
		// 				"data" => $data,
		// 		);
		// //output to json format
		// echo json_encode($output);
	}
}
