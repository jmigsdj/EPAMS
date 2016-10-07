<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class Panel extends MY_Controller {
//check if authenticated
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('panel_model');
		$this->load->model('login_model');
		$user_id=$this->session->userdata("user_id");
		if(empty($user_id)){
			 redirect(base_url(),'refresh');
		 }
	}
	public function logout(){
        $this->session->userdata = array();
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }

//************************************************
//			View
//************************************************
	public function index() {
		$user_id=$this->session->userdata("user_id");
		$this->load->view('header_vw');
		$this->load->view('menu_vw');
		$this->load->view('content_hdr');
		$this->load->view('content_ftr');
		$this->load->view('footer_vw');
	}

	public function dashboard(){
		$data['max_users']=$this->panel_model->count_user();
		$this->load->view('content\dashboard',$data);
	}

	//References
	//category methods
	public function category(){
		//call
		$data['category'] = $this->panel_model->get_category();

		//calling the view
		$this->load->view('content\setup\category_setup', $data);
	}

	public function create_category(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a category';

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE)
		{
				$has_error = 2;
				$this->load->view('content\setup\category_setup',$data);
		}
		else
		{
				$has_error = 1;
				$this->panel_model->set_category();
		}
		echo $has_error;
	}




	public function condition(){
		$this->load->view('content\setup\condition_setup');
	}

	public function shift(){
		$this->load->view('content\setup\shift');
	}

	//Users
	public function users(){
		$this->load->view('content\setup\user_setup');
	}

	//Items
	public function assets(){
		$this->load->view('content\setup\asset_setup');
	}

	//Employees
	public function employees(){
		$this->load->view('content\setup\employee_setup');
	}

	//Employee Table
	public function employee_table(){
		$this->load->view('content\employee_table');
	}

	//Inventory
	public function inventory(){
		$this->load->view('content\inventory');
	}

	//Release / In-Out Page
	public function release(){
		$this->load->view('content\release');
	}

	//History
	public function history(){
		$this->load->view('content\history');
	}

}
