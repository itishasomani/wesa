<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
	public function index()
	{	
		$data['active'] = 'log';
		$data['log'] = $this->common_model->get_budget();
		$this->load->view('admin/log/index',$data);
	}
}
?>