<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_employee();
		get_emp_assets();
		get_emp_leave();
		get_emp_procurement();
        $this->load->model('employee_model');
	}
	public function index()
	{	
		$data['active'] = 'employee/dashboard';
// 		$data['get_emp_leave'] = get_emp_leave($this->session->userdata('id'));
// 		$data['get_emp_assets'] = get_emp_assets($this->session->userdata('id'));
// 		$data['get_emp_procurement'] = get_emp_procurement($this->session->userdata('id'));
        $data['comment'] =$this->employee_model->comment();
		$this->load->view('employee/dashboard/index',$data);
	}
	 
}

/* End of file Dashboard.php */
/* Location:application/admin/controllers/Dashboard.php */
