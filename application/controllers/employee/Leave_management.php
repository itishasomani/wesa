<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_management extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_employee();
		$this->load->model('employee_model');
	}
    public function index()
	{	
		$data['active'] = 'employee/leave_management';
		$data['leave_detail'] = $this->employee_model->get_all_leave_detail();
		$this->load->view('employee/leave_management/index',$data);
	}
	public function approve_request(){
		$data['active'] = 'employee/approve_request';
		$data['approve'] = $this->employee_model->get_approve_leave();
		$this->load->view('employee/leave_management/approve_request',$data);
	}
	public function add_leave_management(){
		$data['active'] = 'employee/leave_management';
	    $data['employee'] = $this->employee_model->get_employee();
		$data['vacation'] = $this->employee_model->get_employee_by_vacation();
		$data['vacend'] = $this->employee_model->get_approver_for_leave();
		$data['director'] = $this->employee_model->get_employee_by_director();
		$data['manager'] = $this->employee_model->get_employee_by_manager();
		$this->load->view('employee/leave_management/add_leave_management',$data);
	}
	public function save_leave_management(){
		$this->employee_model->email = $this->input->post('email');
		$this->employee_model->role = $this->input->post('role');
		$this->employee_model->name = $this->input->post('name');
		$this->employee_model->leave_type = $this->input->post('leave_type');
		$this->employee_model->from = $this->input->post('from');
		$this->employee_model->leave_to = $this->input->post('leave_to');
		$this->employee_model->days = $this->input->post('days');
		$this->employee_model->remaining_leave = $this->input->post('remaining_leave');
		$this->employee_model->back_to = $this->input->post('back_to');
		$this->employee_model->replacement = $this->input->post('replacement');
		$this->employee_model->approver = $this->input->post('approver');
		$this->employee_model->approver_two = $this->input->post('approver_two');
		$this->employee_model->manager = $this->input->post('manager');
		$this->employee_model->comment = $this->input->post('comment');
		$return_data = $this->employee_model->add_leave_management();
		redirect(base_url('employee/leave_management'));
	}
	public function fetch_name()
	{
	if($this->input->post('name'))
	
		{
		echo $this->employee_model->fetch_name($this->input->post('name'));
		}
	}
	public function edit_leave_management($id){
		$data['active'] = 'employee/leave_management';
    	$data['employee'] = $this->employee_model->get_employee();
		$data['vacation'] = $this->employee_model->get_employee_by_vacation();
		$data['vacend'] = $this->employee_model->get_approver_for_leave();
		$data['director'] = $this->employee_model->get_employee_by_director();
		$data['leave_management'] = $this->employee_model->get_management_by_id($id);
		$data['manager'] = $this->employee_model->get_employee_by_manager();
		$this->load->view('employee/leave_management/edit_leave_management',$data);
	}
	public function leave_management_edit(){
		$this->employee_model->id = $this->input->post('id');
		$this->employee_model->email = $this->input->post('email');
		$this->employee_model->role = $this->input->post('role');
		$this->employee_model->name = $this->input->post('name');
// 		$this->employee_model->emp_id = $this->input->post('emp_id');
		$this->employee_model->leave_type = $this->input->post('leave_type');
		$this->employee_model->from = $this->input->post('from');
		$this->employee_model->leave_to = $this->input->post('leave_to');
		$this->employee_model->days = $this->input->post('days');
		$this->employee_model->remaining_leave = $this->input->post('remaining_leave');
		$this->employee_model->back_to = $this->input->post('back_to');
		$this->employee_model->replacement = $this->input->post('replacement');
		$this->employee_model->approver = $this->input->post('approver');
		$this->employee_model->approver_two = $this->input->post('approver_two');
		$this->employee_model->manager = $this->input->post('manager');
		$this->employee_model->comment = $this->input->post('comment');
		$return_data = $this->employee_model->edit_leave_management();
		redirect(base_url('employee/leave_management'));
	}
	public function pdf($id){
	    $row = $this->employee_model->get_leave_detail_by_id($id);
	    $data['manager'] = $row['manager'];
	    $data['f_name'] = $row['name'];
	    $data['surname'] = $row['surname'];
	    $data['l_name'] = $row['emp_name'];
	    $data['email'] = $row['email'];
	    $data['l_type'] = $row['leave_type'];
	    $data['l_from'] = $row['from'];
	    $data['l_to'] = $row['leave_to'];
	    $data['back_to'] = $row['back_to'];
	    $data['days'] = $row['days'];
	    $data['replace'] = $row['replacement'];
	    $data['approver'] = $row['approver'];
	    $data['approver2'] = $row['approver_two'];
	    $data['r_days'] = 30 - $row['days'];
	    $data['comment'] = $row['comment'];
	    $data['date'] = $row['date'];
	    $data['approve_date'] = $row['approve_date'];
	     if($data['l_type'] == "Annual"){
	       $this->load->view('employee/leave_management/pdf/annualpdf',$data);
	    }
	    else if($data['l_type'] == "Business Trip"){
	        $this->load->view('employee/leave_management/pdf/businesspdf',$data);
	    }
	    else if($data['l_type'] == "Compasionate Leave"){
	        $this->load->view('employee/leave_management/pdf/compasionatepdf',$data);
	    }
	    else if($data['l_type'] == "Maternity Leave"){
	        $this->load->view('employee/leave_management/pdf/maternitypdf',$data);
	    }
	    else if($data['l_type'] == "No paid"){
	        $this->load->view('employee/leave_management/pdf/unpaidpdf',$data);
	    }
	    else {
	        $this->load->view('employee/leave_management/pdf/unpaidpdf',$data);
	    }
	    $html = $this->output->get_output();
	    
	    // Load pdf library
	    //$html ='dfdf';
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->set_option('isRemoteEnabled', TRUE);
        // Render the HTML as PDF
        $this->dompdf->render();
        $name = 'user-'.date('d-m-Y');
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
	}
	public function waybillpdf($id){
	    $row = $this->employee_model->get_leave_detail_by_id($id);
	    $data['manager'] = $row['manager'];
	    $data['f_name'] = $row['name'];
	    $data['surname'] = $row['surname'];
	    $data['l_name'] = $row['emp_name'];
	    $data['email'] = $row['email'];
	    $data['l_type'] = $row['leave_type'];
	    $data['l_from'] = $row['from'];
	    $data['l_to'] = $row['leave_to'];
	    $data['back_to'] = $row['back_to'];
	    $data['days'] = $row['days'];
	    $data['replace'] = $row['replacement'];
	    $data['approver'] = $row['approver'];
	    $data['approver2'] = $row['approver_two'];
	    $data['r_days'] = 30 - $row['days'];
	    $data['comment'] = $row['comment'];
	    $data['date'] = $row['date'];
	    $data['approve_date'] = $row['approve_date'];
	    if($data['l_type'] == "Business Trip"){
	        $this->load->view('employee/leave_management/pdf/waybill_template',$data);
	    }
	    else if($data['l_type'] == "Maternity Leave"){
	        $this->load->view('employee/leave_management/pdf/maternity_protocol',$data);
	    }
	    $html = $this->output->get_output();
	    
	    // Load pdf library
	    //$html ='dfdf';
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->set_option('isRemoteEnabled', TRUE);
        // Render the HTML as PDF
        $this->dompdf->render();
        $name = 'user-'.date('d-m-Y');
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
	}
	public function download_pdf($id){
	    $row = $this->employee_model->get_leave_detail_by_id($id);
	    $data['manager'] = $row['manager'];
	    $data['f_name'] = $row['name'];
	    $data['surname'] = $row['surname'];
	    $data['l_name'] = $row['emp_name'];
	    $data['email'] = $row['email'];
	    $data['l_type'] = $row['leave_type'];
	    $data['r_days'] = 30 - $row['days'];
	    $data['l_from'] = $row['from'];
	    $data['l_to'] = $row['leave_to'];
	    $data['back_to'] = $row['back_to'];
	    $data['days'] = $row['days'];
	    $data['replace'] = $row['replacement'];
	    $data['approver'] = $row['approver'];
	    $data['approver2'] = $row['approver_two'];
	    $data['comment'] = $row['comment'];
	    $data['date'] = $row['date'];
	    $data['approve_date'] = $row['approve_date'];
	   // $this->load->view('admin/leave_management/pdf-design',$data);
	    if($data['l_type'] == "Annual"){
	       $this->load->view('employee/leave_management/pdf/annual_pdf',$data);
	       
	    }
	    else if($data['l_type'] == "Business Trip"){
	        $this->load->view('employee/leave_management/pdf/business_pdf',$data);
	    }
	    else if($data['l_type'] == "Compasionate Leave"){
	        $this->load->view('employee/leave_management/pdf/compasionate_pdf',$data);
	    }
	    else if($data['l_type'] == "Maternity Leave"){
	        $this->load->view('employee/leave_management/pdf/maternity_pdf',$data);
	    }
	    else if($data['l_type'] == "No paid"){
	        $this->load->view('employee/leave_management/pdf/unpaid_pdf',$data);
	    }
	    else {
	        $this->load->view('employee/leave_management/pdf/unpaid_pdf',$data);
	    }
	    $html = $this->output->get_output();
	    
	    // Load pdf library
	    //$html ='dfdf';
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->set_option('isRemoteEnabled', TRUE);
        // Render the HTML as PDF
        $this->dompdf->render();
        $name = 'user-'.date('d-m-Y');
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
	}
	public function show_leave_details($id){
		$data['active'] = 'employee/leave_management';
		$data['leave_management'] = $this->employee_model->get_management_by_id($id);
		$this->load->view('employee/leave_management/show_leave_details',$data);
	}
	public function approve_two($id){
	   $return_data = $this->employee_model->get_approver_two($id);
	   redirect(base_url('employee/approve_request'));
	}
	public function reject_two($id){
	    $return_data = $this->employee_model->get_reject_two($id);
	    redirect(base_url('employee/approve_request'));
	}
	public function get_persent_employee(){
	    $startDate = $this->input->post('start_date');
	    $fromDate = $this->input->post('from_date');
	    $startDate = date('Y-m-d',strtotime($startDate));
	    $fromDate = date('Y-m-d',strtotime($fromDate));
	    
	    $this->db->where('from >=',$startDate);
	    $this->db->where('leave_to <=',$fromDate);
	    $row = $this->db->get('leave_manage_tbl')->result_array();
	    foreach($row as $value){
	        $users[] = $value['emp_id'];
	    }
	    
	    foreach($users as $user){
	        $this->db->where('id !=',$user);
	    }
	    $getEmployee = $this->db->get('emp_tbl')->result_array();
	    echo json_encode($getEmployee);
	}
	public function get_user_remaining_leave_by_ajax(){
        // $id = $this->input->post('user_id');
        // $this->db->select('*');
        // $this->db->where('name',$id);
        // $this->db->select_sum('v_leave');
        // $row = $this->db->get('vacation')->row_array();
        // $days = $row['v_leave'];
        // if($row['name'] == $id){
        //     $start_date = date('Y').'-01-01';
        //     $end_date = date('Y').'-12-31';
        //     $this->db->select_sum('days');
        //     $this->db->where('name',$id);
        //     $this->db->where('date >=',$start_date);
        //     $this->db->where('date <=',$end_date);
        //     $row = $this->db->get('leave_manage_tbl')->row();
        //     echo $days - ($row->days);
        // }
        // else {
        //     echo 32;
        // }
        $id = $this->input->post('user_id');
        $this->db->select('*');
        $this->db->where('name',$id);
        $this->db->select_sum('v_leave');
        $row = $this->db->get('vacation')->row_array();
        $days = $row['v_leave'];
        $this->db->where('name',$id);
        $row1 = $this->db->get('leave_manage_tbl');
        if($row['name'] == $id){
            $start_date = date('Y').'-01-01';
            $end_date = date('Y').'-12-31';
            $this->db->select_sum('days');
            $this->db->where('name',$id);
            $this->db->where('date >=',$start_date);
            $this->db->where('date <=',$end_date);
            $row = $this->db->get('leave_manage_tbl')->row();
            echo $days;
        }
        else if(empty($row['name'])) {
            echo $days;
        }
    }
}
?>