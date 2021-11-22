<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procurement extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_employee();
		$this->load->model('employee_model');
	}
	public function index()
	{	
		$data['active'] = 'employee/procurement';
		$data['request'] = $this->employee_model->get_all_request();
		$this->load->view('employee/procurement/my_request',$data);
	}
	public function approve_procurement(){
	    $data['active'] = 'employee/approve_procurement';
	    $data['request'] = $this->employee_model->get_approve_procurement();
	    $this->load->view('employee/procurement/approve_procurement',$data);
	}
	public function add_procurement(){
	    $data['active'] = 'employee/procurement';
		$data['address'] = $this->employee_model->get_project();
		$data['emp_type'] =$this->employee_model->emp_type();
		$data['Budget'] = $this->employee_model->budget();
		$data['Sub_category'] = $this->employee_model->get_budget();
		$data['tasks'] = $this->employee_model->task();
		$data['direct_manager'] = $this->employee_model->get_approver_1();
		$data['director'] = $this->employee_model->get_employee_by_director();
		$data['advisor'] = $this->employee_model->get_employee_by_advisor();
		$data['manager'] = $this->employee_model->get_p_manager();
		$data['b_item'] = $this->employee_model->budget_item();
    	$this->load->view('employee/procurement/add_procurement',$data);
	}
	public function procurement_add(){
	    $this->employee_model->role = $this->input->post('role');
	    $this->employee_model->name = $this->input->post('name');
		$this->employee_model->email = $this->input->post('email');
		$this->employee_model->item = $this->input->post('item');
		$this->employee_model->quantity = $this->input->post('quantity');
		$this->employee_model->unit = $this->input->post('unit');
		$this->employee_model->task = $this->input->post('task');
// 		$this->employee_model->other = $this->input->post('other');
		$this->employee_model->address = $this->input->post('address');
		$this->employee_model->b_category = $this->input->post('b_category');
		$this->employee_model->sub_category = $this->input->post('sub_category');
// 		$this->employee_model->b_item = $this->input->post('b_item');
		$this->employee_model->direct_manager = $this->input->post('direct_manager');
// 		$this->employee_model->qms_manager = $this->input->post('qms_manager');
		$this->employee_model->procurement_manager = $this->input->post('procurement_manager');
		$this->employee_model->director = $this->input->post('director');
		$this->employee_model->featuredImage = $_FILES['featuredImage']['name'];
		$this->employee_model->comment = $this->input->post('comment');
		$return_data = $this->employee_model->add_procurement();
		redirect($return_data['return_url']);
	}
	public function edit_procurement($id){
		$data['active'] = 'procurement';
		$data['procurement'] = $this->employee_model->get_procurement($id);
		$data['address'] = $this->employee_model->get_project();
		$data['emp_type'] =$this->employee_model->emp_type();
		$data['Budget'] = $this->employee_model->get_budget();
		$data['Sub_category'] = $this->employee_model->get_budget();
		$data['tasks'] = $this->employee_model->task();
		$data['direct_manager'] = $this->employee_model->get_approver_1();
		$data['director'] = $this->employee_model->get_employee_by_director();
		$data['advisor'] = $this->employee_model->get_employee_by_advisor();
		$data['manager'] = $this->employee_model->get_p_manager();
		$data['b_item'] = $this->employee_model->budget_item();
		$this->load->view('employee/procurement/edit_procurement',$data);
	}
	public function procurement_edit(){
	    $this->employee_model->id = $this->input->post('id');
		$this->employee_model->email = $this->input->post('email');
		$this->employee_model->name = $this->input->post('name');
		$this->employee_model->role = $this->input->post('role');
		$this->employee_model->item = $this->input->post('item');
		$this->employee_model->quantity = $this->input->post('quantity');
		$this->employee_model->unit = $this->input->post('unit');
		$this->employee_model->task = $this->input->post('task');
// 		$this->employee_model->other = $this->input->post('other');
		$this->employee_model->address = $this->input->post('address');
		$this->employee_model->b_category = $this->input->post('b_category');
		$this->employee_model->sub_category = $this->input->post('sub_category');
// 		$this->employee_model->b_item = $this->input->post('b_item');
		$this->employee_model->direct_manager = $this->input->post('direct_manager');
// 		$this->employee_model->qms_manager = $this->input->post('qms_manager');
		$this->employee_model->procurement_manager = $this->input->post('procurement_manager');
		$this->employee_model->director = $this->input->post('director');
		$this->employee_model->featuredImage = $_FILES['featuredImage']['name'];
		$this->employee_model->comment = $this->input->post('comment');
		$return_data = $this->employee_model->edit_procurement();
		redirect($return_data['return_url']);
	}
	public function approve($id){
	   $return_data = $this->employee_model->approve_procurement($id);
	   redirect(base_url('employee/approve_procurement'));
	}
	public function approve_second($id){
	   $return_data = $this->employee_model->approve_second_procurement($id);
	   redirect(base_url('employee/approve_procurement'));
	}
	public function reject($id){
	    $return_data = $this->employee_model->reject_procurement($id);
	    redirect(base_url('employee/approve_procurement'));
	}
	public function reject_second($id){
	    $return_data = $this->employee_model->reject_second_procurement($id);
	    redirect(base_url('employee/approve_procurement'));
	}
	public function approverapproveprocurement($id){
	   $return_data = $this->employee_model->approverapproveprocurement($id);
	    redirect(base_url('employee/approve_procurement'));
	}
	public function approverrejectprocurement($id){
	    $return_data = $this->employee_model->approverrejectprocurement($id);
	    redirect(base_url('employee/approve_procurement'));
	}
	public function fetch_task()
	{
	    if($this->input->post('task'))
		{
		    echo $this->employee_model->fetch_task($this->input->post('task'));
		}
	}
	public function fetch_category()
	{
	    if($this->input->post('b_category'))
		{
		    echo $this->employee_model->fetch_category($this->input->post('b_category'));
		}
	}
	public function fetch_item()
	{
	    if($this->input->post('task'))
		{
		    echo $this->employee_model->get_item($this->input->post('task'));
		}
	}
	public function duplicate($id){
         $return_data = $this->employee_model->duplicate_procurement($id);
	    redirect(base_url('employee/procurement'));
    }
    public function request_yes($id){
	   $return_data = $this->employee_model->get_request_yes($id);
	   redirect(base_url('employee/procurement'));
	}
	public function request_no($id){
	    $return_data = $this->employee_model->get_request_no($id);
	    redirect(base_url('employee/procurement'));
	}
	public function get_procurement_sub_category(){
	     $task = $this->input->post('task');
	    $this->db->where('task',$task);
	    $this->db->where('amount >',0);
	    $this->db->group_by('sub_category');
	    $row = $this->db->get('budget_tbl')->result_array();
	    echo json_encode($row);
	}
	public function fetchcategory(){
	    $task = $this->input->post('task');
		$this->db->where('task',$task);
	    $this->db->group_by('category');
	    $row = $this->db->get('budget_tbl')->result_array();
	    echo json_encode($row);
	}
}
?>