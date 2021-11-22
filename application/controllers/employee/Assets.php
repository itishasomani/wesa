<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_employee();
		$this->load->model('employee_model');
	}
	public function index()
	{	
		$data['active'] = 'employee/assets';
		$data['employee'] = $this->employee_model->employee();
		$this->load->view('employee/assets/index',$data);
	} 
    public function add_assets(){
        $this->employee_model->email = $this->input->post('email');
        $this->employee_model->role = $this->input->post('role');
		$this->employee_model->asset_type = $this->input->post('asset_type');
		$this->employee_model->created_by = $this->input->post('created_by');
		$this->employee_model->c_owner = $this->input->post('c_owner');
		$this->employee_model->purchase_date = $this->input->post('purchase_date');
		$this->employee_model->assign_date = $this->input->post('assign_date');
		$return_data = $this->employee_model->add_assets();
		redirect(base_url('employee/my_assets'));
	}
    public function my_assets(){
        $data['active'] = 'employee/view_my_assets';
		$data['assets'] = $this->employee_model->get_my_assets();
		$this->load->view('employee/assets/view_my_assets',$data);
    }
    public function show_assets($id){
		$data['active'] = 'employee/assets';
		$data['assets'] = $this->employee_model->get_assets_by_id($id);
		$data['employee'] = $this->employee_model->employee();
		$this->load->view('employee/assets/edit_assets',$data);
	}
	public function edit_assets(){
		$this->employee_model->id = $this->input->post('id');
		$this->employee_model->role = $this->input->post('role');
		$this->employee_model->email = $this->input->post('email');
		$this->employee_model->asset_type = $this->input->post('asset_type');
		$this->employee_model->created_by = $this->input->post('created_by');
		$this->employee_model->c_owner = $this->input->post('c_owner');
		$this->employee_model->purchase_date = $this->input->post('purchase_date');
		$this->employee_model->assign_date = $this->input->post('assign_date');
		$return_data = $this->employee_model->edit_assets();
		redirect(base_url('employee/my_assets'));
	}
// 	public function delete_assets($id){
// 		$row = $this->employee_model->get_assets_by_id($id);
// 		$this->db->where('id',$id);
// 		$this->db->delete('assets_tbl');
// 		// $this->message->set_message('Assets has been delete',1);
//         redirect(base_url('employee/view_my_assets'));
// 	}
}
?>
