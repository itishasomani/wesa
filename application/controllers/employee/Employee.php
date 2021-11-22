<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_employee();
		$this->load->model('employee_model');
	}
    public function index()
	{	
	   $name = $this->input->post('name');
	    $title = $this->input->post('title');
	    $approver_1 =$this->input->post('approver_1');
	    $department = $this->input->post('department');
	    if($this->input->post('submit')){
	        $this->employee_model->name = $name;
	        $this->employee_model->title = $title;
	        $this->employee_model->approver_1 = $approver_1;
	        $this->employee_model->department = $department;
	        $data['employees'] = $this->employee_model->get_employee_by_filter();
	    }
	   // if(isset($name)){
	   //     $this->employee_model->name = $name;
	   //     $this->employee_model->title = $this->input->post('title');
	   //     $this->employee_model->approver_1 = $this->input->post('approver_1');
	   //     $this->employee_model->department = $this->input->post('department');
	   //     $data['employees'] = $this->employee_model->get_employee_by_filter();
	   // }
	    else{
	        $data['employees'] = $this->employee_model->get_all_employee();
	    }
		$data['active'] = 'employee/employee';
        $data['leave_detail'] = $this->employee_model->get_from_date();
		$this->load->view('employee/employee/index',$data);
	}
}