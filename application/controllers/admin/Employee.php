<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
        $this->load->library('encryption');
        // if($_SESSION['emp_type'] != '4' && $_SESSION['emp_type'] != '3'){
        //     redirect(base_url('admin'));
        // }
	}
    public function index()
	{	
	    $name = $this->input->post('name');
	    $title = $this->input->post('title');
	    $approver_1 =$this->input->post('approver_1');
	    $department = $this->input->post('department');
	  
	    if($this->input->post('submit')){
	        $this->common_model->name = $name;
	        $this->common_model->title = $title;
	        $this->common_model->approver_1 = $approver_1;
	        $this->common_model->department = $department;
	        $data['employees'] = $this->common_model->get_employee_by_filter();
	    }
	    else{
	        $data['employees'] = $this->common_model->get_employee();
	    }
		$data['active'] = 'employee';
        $data['leave_detail'] = $this->common_model->get_from_date();
		$this->load->view('admin/employee/index',$data);
	}
	public function add_employee(){
		$data['active'] = 'employee';
        $data['emp_type'] = $this->common_model->emp_type();
         $data['approver_1'] = $this->common_model->get_approver_1();
        $data['manager'] = $this->common_model->get_employee_by_manager();
         $data['director'] = $this->common_model->get_employee_by_director();
        $data['projects'] = $this->common_model->project();
		$this->load->view('admin/employee/add_employee',$data);
	}
    public function edit_employee($id){
        $data['active'] = 'employee';
        $data['emp_type'] = $this->common_model->emp_type();
        $data['projects'] = $this->common_model->project();
        $data['employee'] = $this->common_model->get_employee_by_id($id);
        // $data['emp'] = $this->common_model->get_employee();
        $data['approver_1'] = $this->common_model->get_approver_1();
        $data['manager'] = $this->common_model->get_employee_by_manager();
        $data['director'] = $this->common_model->get_employee_by_director();
		$this->load->view('admin/employee/edit_employee',$data);
    }
    public function save_employee(){
        $this->common_model->name = $this->input->post('name');
        $this->common_model->surname = $this->input->post('surname');
        $this->common_model->role = $this->input->post('role');
        // $this->common_model->emp_id = $this->input->post('emp_id');
        $this->common_model->emp_type = $this->input->post('emp_type');
        $this->common_model->title = $this->input->post('title');
        $this->common_model->approver_1 = $this->input->post('approver_1');
        $this->common_model->manager = $this->input->post('manager');
        $this->common_model->director = $this->input->post('director');
        // $this->common_model->username = $this->input->post('username');
        $this->common_model->password =  $this->encryption->encrypt($this->input->post('password'));
        $this->common_model->email = $this->input->post('email');
        $this->common_model->phone = $this->input->post('phone');
        $this->common_model->department = $this->input->post('department');
        $this->common_model->start_date = $this->input->post('start_date');
        $this->common_model->education = $this->input->post('education');
        $this->common_model->training = $this->input->post('training');
        $this->common_model->vacation = $this->input->post('vacation');
        $this->common_model->image = $_FILES['image']['name'];
        $return_data = $this->common_model->add_employee();
		// $this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
    }
    public function employee_edit(){
        $this->common_model->id = $this->input->post('id');
        $this->common_model->name = $this->input->post('name');
       $this->common_model->surname = $this->input->post('surname');
        $this->common_model->emp_type = $this->input->post('emp_type');
        // $this->common_model->project_manager = $this->input->post('project_manager');
         $this->common_model->title = $this->input->post('title');
         $this->common_model->approver_1 = $this->input->post('approver_1');
        $this->common_model->manager = $this->input->post('manager');
        $this->common_model->director = $this->input->post('director');
        $this->common_model->phone = $this->input->post('phone');
        // $this->common_model->username = $this->input->post('username');
        $this->common_model->password =  $this->encryption->encrypt($this->input->post('password'));
        $this->common_model->email = $this->input->post('email');
        // $this->common_model->position = $this->input->post('position');
        $this->common_model->department = $this->input->post('department');
        $this->common_model->start_date = $this->input->post('start_date');
        $this->common_model->education = $this->input->post('education');
        $this->common_model->training = $this->input->post('training');
        // $this->common_model->certificate = $this->input->post('certificate');
        $this->common_model->vacation = $this->input->post('vacation');
        $this->common_model->image = $_FILES['image']['name'];
        $return_data = $this->common_model->edit_employee();
		redirect($return_data['return_url']);
    }
    public function delete_employee($id){
        $row = $this->common_model->get_employee_by_id($id);
		unlink(realpath('assets/backend/dist/img/'.$row['image']));		
		$this->db->where('id',$id);
		$this->db->delete('emp_tbl');
        redirect(base_url('admin/employee'));
    }
    public function name_filter(){
    $name = $_GET['name'];
    $department = $_GET['department'];
    }
}