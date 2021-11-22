<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
	public function index()
	{	
		$data['active'] = 'assets';
		$data['employee'] = $this->common_model->get_admin();
		$data['admin'] = $this->common_model->get_admin();
		$this->load->view('admin/assets/index',$data);
	}
	public function add_assets(){
		$this->common_model->role = $this->input->post('role');
		$this->common_model->email = $this->input->post('email');
		$this->common_model->asset_type = $this->input->post('asset_type');
		$this->common_model->c_owner = $this->input->post('c_owner');
		$this->common_model->created_by = $this->input->post('created_by');
		$this->common_model->purchase_date = $this->input->post('purchase_date');
		$this->common_model->assign_date = $this->input->post('assign_date');
		$this->common_model->image = $_FILES['image']['name'];
		$return_data = $this->common_model->add_assets();
		// $this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
	}
    public function view_my_assets(){
        $asset_type = $this->input->post('asset_type');
	    $c_owner = $this->input->post('c_owner');
	    $assign_date =$this->input->post('assign_date');
	    if($this->input->post('submit')){
	        $this->common_model->asset_type = $asset_type;
	        $this->common_model->c_owner = $c_owner;
	        $this->common_model->assign_date = $assign_date;
	        $data['assets'] = $this->common_model->get_assets_by_filter();
	    }
	    else{
	        $data['assets'] = $this->common_model->get_assets();
	    }
        $data['active'] = 'view_my_assets';
		$this->load->view('admin/assets/view_my_assets',$data);
    }
    
	public function my_assets(){
        $data['active'] = 'my_assets';
		$data['my_assets'] = $this->common_model->get_my_assets();
		$this->load->view('admin/assets/my_assets',$data);
    }
    public function hr_assets(){
        $data['active'] = 'hr_assets';
		$data['my_assets'] = $this->common_model->get_hr_assets();
		$this->load->view('admin/assets/hr_assets',$data);
    }
	public function show_assets($id){
		$data['active'] = 'assets';
		$data['assets'] = $this->common_model->get_assets_by_id($id);
		$data['employee'] = $this->common_model->get_admin();
		$data['admin'] = $this->common_model->get_admin();
		$this->load->view('admin/assets/edit_assets',$data);
	}
	public function edit_assets(){
		$this->common_model->id = $this->input->post('id');
		$this->common_model->role = $this->input->post('role');
		$this->common_model->email = $this->input->post('email');
		$this->common_model->asset_type = $this->input->post('asset_type');
		$this->common_model->created_by = $this->input->post('created_by');
		$this->common_model->c_owner = $this->input->post('c_owner');
		$this->common_model->purchase_date = $this->input->post('purchase_date');
		$this->common_model->assign_date = $this->input->post('assign_date');
		$this->common_model->image = $_FILES['image']['name'];
		$return_data = $this->common_model->edit_assets();
		redirect($return_data['return_url']);
	}
	public function delete_assets($id){
		$row = $this->common_model->get_assets_by_id($id);		
		$this->db->where('id',$id);
		$this->db->delete('assets_tbl');
        redirect(base_url('admin/view_my_assets'));
	}
	public function deleteassets($id){
	   $row = $this->common_model->get_assets_by_id($id);	
		$this->db->where('id',$id);
		$this->db->delete('assets_tbl');
        redirect(base_url('admin/my_assets'));
	}
	
}
