<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procurement extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
	public function index(){	
		$data['active'] = 'view_all_request';
		$data['employee'] = $this->common_model->get_employee();
		$data['address'] = $this->common_model->get_project();
		$data['emp_type'] =$this->common_model->emp_type();
		$data['Budget'] = $this->common_model->budget();
		$data['Sub_category'] = $this->common_model->get_budget();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['direct_manager'] = $this->common_model->get_direct_manager();
		$data['advisor'] = $this->common_model->get_employee_by_advisor();
		$data['tasks'] = $this->common_model->task();
		$data['manager'] = $this->common_model->get_p_manager();
		$data['b_item'] = $this->common_model->budget_item();
		$this->load->view('admin/procurement/index',$data);
	}
    public function view_all_request(){
        $data['active'] = 'view_all_request';
		$data['request'] = $this->common_model->get_request();
		$this->load->view('admin/procurement/view_all_request',$data);
    }
	public function add_procurement(){
		$this->common_model->name = $this->input->post('name');
		$this->common_model->email = $this->input->post('email');
		$this->common_model->role = $this->input->post('role');
		$this->common_model->item = $this->input->post('item');
		$this->common_model->quantity = $this->input->post('quantity');
		$this->common_model->unit = $this->input->post('unit');
		$this->common_model->task = $this->input->post('task');
// 		$this->common_model->other = $this->input->post('other');
		$this->common_model->address = $this->input->post('address');
		$this->common_model->b_category = $this->input->post('b_category');
		$this->common_model->sub_category = $this->input->post('sub_category');
// 		$this->common_model->b_item = $this->input->post('b_item');
		$this->common_model->direct_manager = $this->input->post('direct_manager');
// 		$this->common_model->qms_manager = $this->input->post('qms_manager');
		$this->common_model->procurement_manager = $this->input->post('procurement_manager');
		$this->common_model->director = $this->input->post('director');
		$this->common_model->featuredImage = $_FILES['featuredImage']['name'];
		$this->common_model->comment = $this->input->post('comment');
		$return_data = $this->common_model->add_procurement();
		redirect($return_data['return_url']);
	}
	public function edit_procurement($id){
		$data['active'] = 'procurement';
		$data['procurement'] = $this->common_model->get_procurement($id);
		$data['employee'] = $this->common_model->get_employee();
		$data['address'] = $this->common_model->get_project();
		$data['emp_type'] =$this->common_model->emp_type();
		$data['Budget'] = $this->common_model->budget();
		$data['Sub_category'] = $this->common_model->get_budget();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['direct_manager'] = $this->common_model->get_direct_manager();
		$data['advisor'] = $this->common_model->get_employee_by_advisor();
		$data['tasks'] = $this->common_model->task();
		$data['manager'] = $this->common_model->get_p_manager();
		$data['b_item'] = $this->common_model->budget_item();
		$this->load->view('admin/procurement/edit_procurement',$data);
	}
	public function edit_approve_procurement($id){
	    $data['active'] = 'procurement';
	    $data['procurement'] = $this->common_model->get_procurement($id);
		$data['employee'] = $this->common_model->get_employee();
		$data['address'] = $this->common_model->get_project();
		$data['emp_type'] =$this->common_model->emp_type();
		$data['Budget'] = $this->common_model->budget();
		$data['Sub_category'] = $this->common_model->get_budget();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['advisor'] = $this->common_model->get_employee_by_advisor();
		$data['direct_manager'] = $this->common_model->get_direct_manager();
		$data['tasks'] = $this->common_model->task();
		$data['manager'] = $this->common_model->get_p_manager();
		$data['b_item'] = $this->common_model->budget_item();
		$this->load->view('admin/procurement/edit_approve_procurement',$data);
	}
	public function edit_approved_procurement($id){
	    $data['active'] = 'procurement_request';
	    $data['procurement'] = $this->common_model->get_procurement($id);
		$data['employee'] = $this->common_model->get_employee();
		$data['address'] = $this->common_model->get_project();
		$data['emp_type'] =$this->common_model->emp_type();
		$data['Budget'] = $this->common_model->budget();
		$data['Sub_category'] = $this->common_model->get_budget();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['advisor'] = $this->common_model->get_employee_by_advisor();
		$data['direct_manager'] = $this->common_model->get_direct_manager();
		$data['tasks'] = $this->common_model->task();
		$data['manager'] = $this->common_model->get_p_manager();
		$data['b_item'] = $this->common_model->budget_item();
		$this->load->view('admin/procurement/edit_approved_procurement',$data);
	}
	public function all_procurement($id){
	    $data['active'] = 'all_request';
	    $data['procurement'] = $this->common_model->get_procurement($id);
		$data['employee'] = $this->common_model->get_employee();
		$data['address'] = $this->common_model->get_project();
		$data['emp_type'] =$this->common_model->emp_type();
		$data['Budget'] = $this->common_model->budget();
		$data['Sub_category'] = $this->common_model->get_budget();
		$data['vendor'] = $this->common_model->get_supply();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['advisor'] = $this->common_model->get_employee_by_advisor();
		$data['direct_manager'] = $this->common_model->get_direct_manager();
		$data['tasks'] = $this->common_model->task();
		$data['manager'] = $this->common_model->get_p_manager();
		$data['add_approver'] = $this->common_model->get_additional_approver($id);
		$data['b_item'] = $this->common_model->budget_item();
		$this->load->view('admin/procurement/all_procurement',$data);
	}
	public function procurement_edit(){
		$this->common_model->id = $this->input->post('id');
		$this->common_model->email = $this->input->post('email');
		$this->common_model->name = $this->input->post('name');
		$this->common_model->role = $this->input->post('role');
		$this->common_model->item = $this->input->post('item');
		$this->common_model->quantity = $this->input->post('quantity');
		$this->common_model->unit = $this->input->post('unit');
		$this->common_model->task = $this->input->post('task');
// 		$this->common_model->other = $this->input->post('other');
		$this->common_model->address = $this->input->post('address');
		$this->common_model->b_category = $this->input->post('b_category');
		$this->common_model->sub_category = $this->input->post('sub_category');
// 		$this->common_model->b_item = $this->input->post('b_item');
		$this->common_model->direct_manager = $this->input->post('direct_manager');
// 		$this->common_model->qms_manager = $this->input->post('qms_manager');
		$this->common_model->procurement_manager = $this->input->post('procurement_manager');
		$this->common_model->director = $this->input->post('director');
		$this->common_model->featuredImage = $_FILES['featuredImage']['name'];
		$this->common_model->comment = $this->input->post('comment');
		$return_data = $this->common_model->edit_procurement();
		redirect($return_data['return_url']);
	}
	public function approve_procurement_edit(){
		$this->common_model->id = $this->input->post('id');
		$this->common_model->name = $this->input->post('name');
		// $this->common_model->emp_id = $this->input->post('emp_id');
		$this->common_model->item = $this->input->post('item');
		$this->common_model->quantity = $this->input->post('quantity');
		$this->common_model->unit = $this->input->post('unit');
		$this->common_model->task = $this->input->post('task');
// 		$this->common_model->other = $this->input->post('other');
		$this->common_model->address = $this->input->post('address');
		$this->common_model->b_category = $this->input->post('b_category');
		$this->common_model->sub_category = $this->input->post('sub_category');
// 		$this->common_model->b_item = $this->input->post('b_item');
		$this->common_model->direct_manager = $this->input->post('direct_manager');
// 		$this->common_model->qms_manager = $this->input->post('qms_manager');
		$this->common_model->procurement_manager = $this->input->post('procurement_manager');
		$this->common_model->director = $this->input->post('director');
		$this->common_model->featuredImage = $_FILES['featuredImage']['name'];
		$this->common_model->comment = $this->input->post('comment');
// 		$this->common_model->status = $this->input->post('status');
		$return_data = $this->common_model->approve_procurement_edit();
		redirect($return_data['return_url']);
	}
	public function manage_procurement($id){
	    $data['active'] = 'procurement';
	    $data['procurement'] = $this->common_model->get_procurement($id);
		$data['employee'] = $this->common_model->get_employee();
		$data['address'] = $this->common_model->get_project();
		$data['emp_type'] =$this->common_model->emp_type();
		$data['Budget'] = $this->common_model->budget();
		$data['Sub_category'] = $this->common_model->get_budget();
		$data['vendor'] = $this->common_model->get_supply();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['advisor'] = $this->common_model->get_employee_by_advisor();
		$data['direct_manager'] = $this->common_model->get_direct_manager();
		$data['tasks'] = $this->common_model->task();
		$data['manager'] = $this->common_model->get_p_manager();
		$data['add_approver'] = $this->common_model->get_approver_1();
		$data['b_item'] = $this->common_model->budget_item();
		$this->load->view('admin/procurement/manage_procurement',$data);
	}
	public function procurement_manage(){
	    $this->common_model->id = $this->input->post('id');
		$this->common_model->name = $this->input->post('name');
		// $this->common_model->emp_id = $this->input->post('emp_id');
		$this->common_model->item = $this->input->post('item');
		$this->common_model->quantity = $this->input->post('quantity');
		$this->common_model->unit = $this->input->post('unit');
		$this->common_model->task = $this->input->post('task');
// 		$this->common_model->other = $this->input->post('other');
		$this->common_model->address = $this->input->post('address');
		$this->common_model->b_category = $this->input->post('b_category');
		$this->common_model->sub_category = $this->input->post('sub_category');
// 		$this->common_model->b_item = $this->input->post('b_item');
		$this->common_model->direct_manager = $this->input->post('direct_manager');
// 		$this->common_model->qms_manager = $this->input->post('qms_manager');
		$this->common_model->procurement_manager = $this->input->post('procurement_manager');
		$this->common_model->director = $this->input->post('director');
		$this->common_model->featuredImage = $_FILES['featuredImage']['name'];
		$this->common_model->comment = $this->input->post('comment');
		$this->common_model->price = $this->input->post('price');
		$this->common_model->supplier = $this->input->post('supplier');
		$this->common_model->qutation = $this->input->post('qutation');
		$this->common_model->add_approver = $this->input->post('add_approver');
// 		$this->common_model->final_approver = $this->input->post('final_approver');
		$return_data = $this->common_model->procurement_manage();
		redirect($return_data['return_url']);
	}
	public function delete_procurement($id){
		$row = $this->common_model->get_procurement($id);
		$this->db->where('id',$id);
		$this->db->delete('procurement_tbl');
        redirect(base_url('admin/view-all-request'));
	}
	public function delete_all($id){
		$row = $this->common_model->get_procurement($id);
		$this->db->where('id',$id);
		$this->db->delete('procurement_tbl');
        redirect(base_url('admin/all_request'));
	}
	public function view_all($id){
	    $data['active'] = 'procurement';
	    $data['procurement'] = $this->common_model->get_procurement($id);
	    $this->load->view('admin/procurement/show_procurement',$data);
	}
	 public function request_yes($id){
	   $return_data = $this->common_model->get_request_yes($id);
	   redirect(base_url('admin/view-all-request'));
	}
	public function request_no($id){
	    $return_data = $this->common_model->get_request_no($id);
	    redirect(base_url('admin/view-all-request'));
	}
// 	public function show_procurement($id){
// 		$data['active'] = 'procurement';
// 		$data['procurement'] = $this->common_model->get_procurement($id);
// 		$this->load->view('admin/procurement/show_procurement',$data);
// 	}
	public function procurement_request(){
	    $data['active'] = 'procurement_request';
	    $data['request'] = $this->common_model->get_procurement_request();
	    $data['req'] = $this->common_model->get_procurementrequest();
	    $this->load->view('admin/procurement/procurement_request',$data);
	}
	public function all_request(){
	    $data['active'] = 'all_request';
	    $start_date = $this->input->post('start_date');
	    if(isset($start_date)){
		    $this->common_model->start_date = $start_date;
		    $this->common_model->end_date = $this->input->post('end_date');
		    $data['start_date'] = $start_date;
		    $data['end_date'] = $this->input->post('end_date');
		    $data['request'] = $this->common_model->download_request_csv_by_filter();
		}
		$task = $this->input->post('task');
		$action = $this->input->post('action');
		$name = $this->input->post('name');
		$budget = $this->input->post('b_category');
		$supplier = $this->input->post('supplier');
		if($action == 'submit'){
		    $this->common_model->task = $task;
		    $this->common_model->name = $name;
		    $this->common_model->supplier = $supplier;
		    $this->common_model->b_category = $budget;
		    $data['request'] = $this->common_model->get_all_request_filter();
		}
		else{
		    $data['request'] = $this->common_model->get_all_request();
		}
	    $this->load->view('admin/procurement/all_request',$data);
	}
	public function advisor_request(){
	     $data['active'] = 'advisor_request';
	     $data['request'] = $this->common_model->get_advisor_request();
	     $this->load->view('admin/procurement/advisor_approver_request',$data);
	}
	public function procurement_manager_request(){
	     $data['active'] = 'procurement_manager_request';
	     $data['request'] = $this->common_model->get_procurement_manager_request();
	    $this->load->view('admin/procurement/procurement_manager_request',$data);
	}
// 	public function advisor_request_approve($id){
// 	    $return_data = $this->common_model->advisor_request_approve($id);
// 	    redirect(base_url('admin/advisor_request'));
// 	}

// 	public function advisor_request_reject($id){
// 	    $return_data = $this->common_model->advisor_request_reject($id);
// 	    redirect(base_url('admin/advisor_request'));
// 	}
	public function procurement_manager_request_approve($id){
	    $return_data = $this->common_model->procurement_manager_request_approve($id);
	    redirect(base_url('admin/procurement_manager_request'));
	}

	public function procurement_manager_request_reject($id){
	    $return_data = $this->common_model->procurement_manager_request_reject($id);
	    redirect(base_url('admin/procurement_manager_request'));
	}
    public function duplicate($id){
         $return_data = $this->common_model->duplicate_procurement($id);
	    redirect(base_url('admin/view-all-request'));
    }
    public function approve_procurement($id){
	    $return_data = $this->common_model->approve_procurement($id);
	    redirect(base_url('admin/procurement_request'));
	}

	public function reject_procurement($id){
	    $return_data = $this->common_model->reject_procurement($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function approveprocurement($id){
	   $return_data = $this->common_model->approveprocurement($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function approveprocurementsecond($id){
	   $return_data = $this->common_model->approveprocurementsecond($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function rejectprocurement($id){
	    $return_data = $this->common_model->rejectprocurement($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function rejectprocurementsecond($id){
	    $return_data = $this->common_model->rejectprocurementsecond($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function approverapproveprocurement($id){
	   $return_data = $this->common_model->approverapproveprocurement($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function approverrejectprocurement($id){
	    $return_data = $this->common_model->approverrejectprocurement($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function complete($id){
	    $return_data = $this->common_model->complete_request($id);
	    redirect(base_url('admin/all_request'));
	}
	public function fetch_task()
	{
	    if($this->input->post('task'))
		{
		    echo $this->common_model->fetch_task($this->input->post('task'));
		}
	}
	public function fetch_item()
	{
	    if($this->input->post('task'))
		{
		    echo $this->common_model->get_item($this->input->post('task'));
		}
	}
    public function fetch_category()
	{
	    if($this->input->post('b_category'))
		{
		    echo $this->common_model->fetch_category($this->input->post('b_category'));
		}
	}
	public function add_approver(){
	    $direct_manager = $this->input->post('direct_manager');
	    $approver_two = $this->input->post('approver_two');
	    $approver_three = $this->input->post('approver_three');
	    if($this->input->post('direct_manager') || $this->input->post('approver_two') ||$this->input->post('approver_three')){
	        echo $this->common_model->fetch_approver($direct_manager,$approver_two,$approver_three);
	    }
	}
	public function fetchcategory(){
	    $task = $this->input->post('task');
		$this->db->where('task',$task);
	    $this->db->group_by('category');
	    $row = $this->db->get('budget_tbl')->result_array();
	    echo json_encode($row);
	}

	public function get_procurement_sub_category(){
	    $b_category =  $this->input->post('b_category');
		$this->db->where('category',$b_category );
		$this->db->where('sub_category !=','');
		$row = $this->db->get('budget_tbl')->result_array();
		echo json_encode($row);
	}
	public function director_second_approve($id){
	    $return_data = $this->common_model->director_second_approve($id);
	    redirect(base_url('admin/procurement_request'));
	}
	public function director_second_reject(){
	    $return_data = $this->common_model->director_second_reject($id);
	    redirect(base_url('admin/procurement_request'));
	}
}
