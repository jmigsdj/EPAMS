<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class Panel extends MY_Controller {
//check if authenticated
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('panel_model');
		$this->load->model('login_model');
		$this->load->model('User_model');
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

//************************************************
//			View
//************************************************
	public function index() {
		$user_id=$this->session->userdata("id");
		$this->load->view('header_vw');
		$this->load->view('menu_vw');
		$this->load->view('content_hdr');
		$this->dashboard();
		$this->load->view('content_ftr');
		$this->load->view('footer_vw');
	}

	public function dashboard(){
		$data['max_users']=$this->panel_model->count_user();
		$this->load->view('content\dashboard',$data);
	}

	//Release / In-Out Page
	public function release(){
		$this->load->view('content\release');
	}

	//History
	public function history(){
		$this->load->view('content\history');
	}

	public function contact(){
		$this->load->view('content\contact');
	}

	public function about(){
		$this->load->view('content\about');
	}

	public function help(){
		$this->load->view('content\help');
	}

}
