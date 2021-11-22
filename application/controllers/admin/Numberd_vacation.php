<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Numberd_vacation extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
	public function index(){
	    	$data['active'] = 'numberd_vacation';
	    	$data['leave_detail'] = $this->common_model->get_leave_no_of_vacation();
	    	$this->load->view('admin/leave_management/no_of_vacation',$data);
	}
	public function vacation_form(){
	    	$data['active'] = 'numberd_vacation';
	    	$data['employee'] = $this->common_model->get_employee();
	    	$this->load->view('admin/leave_management/vacation_form',$data);
	}
	public function vacation_save(){
	   // $this->common_model->c_date = $this->input->post('c_date');
	    $this->common_model->name = $this->input->post('name');
	    $this->common_model->v_leave = $this->input->post('v_leave');
	    $return_data = $this->common_model->vacation_save();
		redirect(base_url('admin/numberd_vacation'));
	}
}
?>