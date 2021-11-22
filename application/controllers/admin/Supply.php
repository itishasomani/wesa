<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supply extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
    public function index()
	{	
		$data['active'] = 'supply';
		$data['supply'] = $this->common_model->get_supply();
		$this->load->view('admin/supply/index',$data);
	}
	public function add_supply(){
	    $data['active'] = 'supply';
	    $this->load->view('admin/supply/add_supply',$data);
	}
	public function save_supply(){
	    $this->common_model->v_name = $this->input->post('v_name');
        $this->common_model->tin = $this->input->post('tin');
        $this->common_model->t_group = $this->input->post('t_group');
        $this->common_model->type = $this->input->post('type');
        $return_data = $this->common_model->add_supply();
		redirect($return_data['return_url']);
	}
	public function edit_supply($id){
	    $data['active'] = 'supply';
	    $data['data'] = $this->common_model->get_supply_by_id($id);
	    $this->load->view('admin/supply/edit_supply',$data);
	}
	public function update_supply(){
	    $this->common_model->id = $this->input->post('id');
	    $this->common_model->v_name = $this->input->post('v_name');
        $this->common_model->tin = $this->input->post('tin');
        $this->common_model->t_group = $this->input->post('t_group');
        $this->common_model->type = $this->input->post('type');
        $return_data = $this->common_model->edit_supply();
		redirect($return_data['return_url']);
	}
	public function delete_supply($id){
	    $row = $this->common_model->get_supply($id);
		$this->db->where('id',$id);
		$this->db->delete('supply_tbl');
        redirect(base_url('admin/supply'));
	}
}
?>