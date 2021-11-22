<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_employee();
		$this->load->model('employee_model');
	}
	public function index()
	{	
		$data['active'] = 'employee/change_password';
		$this->load->view('employee/profile/change_password',$data);
	}
	public function password_change(){
		$this->employee_model->password = $this->input->post('password');
		$return_data = $this->employee_model->password_change();
		$this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
	}
}
