<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		get_leave();
		get_emp();
		get_assets();
		get_procurement();
		$this->load->model('common_model');
	}
	public function index()
	{	
		$data['active'] = 'dashboard';
		$data['comment'] =$this->common_model->comment();
		$this->load->view('admin/dashboard/index',$data);
	}
	public function add(){
	    $data['active'] = 'dashboard';
		$this->load->view('admin/dashboard/add_comment',$data);
	}
	public function add_comment(){
	   $this->common_model->comment = $this->input->post('comment');
	   $return_data = $this->common_model->add_comment();
	   redirect($return_data['return_url']);
	}


}

/* End of file Dashboard.php */
/* Location:application/admin/controllers/Dashboard.php */