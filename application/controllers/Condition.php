<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condition extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('condition_model','condition');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('content/setup/condition_setup');
    }

    public function ajax_list()
    {
        $list = $this->condition->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $condition) {
            $no++;
            $row = array();
            $row[] = $condition->name;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_condition('."'".$condition->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_condition('."'".$condition->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->condition->count_all(),
                        "recordsFiltered" => $this->condition->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'name' => $this->input->post('name')

            );
        $insert = $this->condition->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'name' => $this->input->post('name')

            );
        $this->condition->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->condition->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }



        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}
