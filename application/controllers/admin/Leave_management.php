<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_management extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->helper('download');
		$this->load->model('common_model');
	}
	
    public function index()
	{
		$data['active'] = 'leave_management';
		$start_date = $this->input->post('start_date');
		$action = $this->input->post('action');
		$name = $this->input->post('name');
		$leave_type = $this->input->post('leave_type');
		$replacement = $this->input->post('replacement');
		if($_SESSION['emp_type'] == 4 || $_SESSION['emp_type'] == 3 ||$_SESSION['emp_type'] == 6){
    		if(isset($start_date)){
    		    if($action == 'search'){
        		    $this->common_model->start_date = $start_date;
        		    $this->common_model->end_date = $this->input->post('end_date');
        		    $this->common_model->name = $name;
        		    $this->common_model->leave_type = $leave_type;
        		    $this->common_model->replacement = $replacement;
        		    $data['start_date'] = $start_date;
        		    $data['end_date'] = $this->input->post('end_date');
        		  //  $data['leave_detail'] = $this->common_model->get_leave_detail_by_date();
        		    $data['leave_detail'] = $this->common_model->get_leave_by_filter();
    		    }

    		    if($action == 'csv'){
    		        $this->common_model->start_date = $start_date;
        		    $this->common_model->end_date = $this->input->post('end_date');
    		        $this->common_model->download_leave_csv();
    		    }
    		}
    		else{
    		    $data['leave_detail'] = $this->common_model->get_all_leave_detail();
    		}
		}
// 		else if($_SESSION['emp_type'] == 6){
// 		    if(isset($start_date)){
// 		        if($action == 'search'){
//         		    $this->common_model->start_date = $start_date;
//         		    $this->common_model->end_date = $this->input->post('end_date');
//         		    $this->common_model->name = $name;
//         		    $this->common_model->leave_type = $leave_type;
//         		    $this->common_model->replacement = $replacement;
//         		    $data['start_date'] = $start_date;
//         		    $data['end_date'] = $this->input->post('end_date');
//         		  //  $data['leave_detail'] = $this->common_model->get_my_leave_detail_by_date();
//         		   $data['leave_detail'] = $this->common_model->get_my_leave_by_filter();
// 		        }
		        
// 		        if($action == 'csv'){
//                     $this->common_model->start_date = $start_date;
//         		    $this->common_model->end_date = $this->input->post('end_date');
//     		        $this->common_model->download_leave_csv();
//     		    }
//     		}
//     		else{
//     		    $data['leave_detail'] = $this->common_model->get_my_leave_detail();
//     		}
// 		}
		$this->load->view('admin/leave_management/index',$data);
	}
	public function pdf($id){
	    $row = $this->common_model->get_leave_detail_by_id($id);
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
	   // $this->load->view('admin/leave_management/pdf-design',$data);
	    if($data['l_type'] == "Annual"){
	       $this->load->view('admin/leave_management/pdf/annualpdf',$data);
	    }
	    else if($data['l_type'] == "Business Trip"){
	        $this->load->view('admin/leave_management/pdf/businesspdf',$data);
	    }
	    else if($data['l_type'] == "Compasionate Leave"){
	        $this->load->view('admin/leave_management/pdf/compasionatepdf',$data);
	    }
	    else if($data['l_type'] == "Maternity Leave"){
	        $this->load->view('admin/leave_management/pdf/maternitypdf',$data);
	    }
	    else if($data['l_type'] == "No paid"){
	        $this->load->view('admin/leave_management/pdf/unpaidpdf',$data);
	    }
	    else {
	        $this->load->view('admin/leave_management/pdf/unpaidpdf',$data);
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
	    $row = $this->common_model->get_leave_detail_by_id($id);
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
	        $this->load->view('admin/leave_management/pdf/waybill_template',$data);
	    }
	    else if($data['l_type'] == "Maternity Leave"){
	        $this->load->view('admin/leave_management/pdf/maternity_protocol',$data);
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
	    $row = $this->common_model->get_leave_detail_by_id($id);
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
	       $this->load->view('admin/leave_management/pdf/annual_pdf',$data);
	       
	    }
	    else if($data['l_type'] == "Business Trip"){
	        $this->load->view('admin/leave_management/pdf/business_pdf',$data);
	    }
	    else if($data['l_type'] == "Compasionate Leave"){
	        $this->load->view('admin/leave_management/pdf/compasionate_pdf',$data);
	    }
	    else if($data['l_type'] == "Maternity Leave"){
	        $this->load->view('admin/leave_management/pdf/maternity_pdf',$data);
	    }
	    else if($data['l_type'] == "No paid"){
	        $this->load->view('admin/leave_management/pdf/unpaid_pdf',$data);
	    }
	    else {
	        $this->load->view('admin/leave_management/pdf/unpaid_pdf',$data);
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
	public function approve_request(){
		$data['active'] = 'approve_request';
// 		if($_SESSION['emp_type'] == 4){
// 		    $data['approve'] = $this->common_model->get_director_approve_leave($_SESSION['id']);
// 		}
// 		else if($_SESSION['emp_type'] == 6){
// 		    $data['approve'] = $this->common_model->get_manager_approve_leave($_SESSION['id']);
// 		}
// 		else{
// 		    $data['approve'] = $this->common_model->get_approve_leave_by_approver($_SESSION['id']);
// 		}
        $data['approve'] = $this->common_model->get_director_approve_leave($_SESSION['id']);
		$this->load->view('admin/leave_management/approve_request',$data);
	}
	public function my_leave_management(){
	    $data['active'] = 'my_leave_management';
	    $name = $this->input->post('name');
		$leave_type = $this->input->post('leave_type');
		$replacement = $this->input->post('replacement');
		if(isset($start_date)){
    		    if($action == 'search'){
        		    $this->common_model->start_date = $start_date;
        		    $this->common_model->end_date = $this->input->post('end_date');
        		    $this->common_model->name = $name;
        		    $this->common_model->leave_type = $leave_type;
        		    $this->common_model->replacement = $replacement;
        		    $data['start_date'] = $start_date;
        		    $data['end_date'] = $this->input->post('end_date');
        		  //  $data['leave_detail'] = $this->common_model->get_leave_detail_by_date();
        		    $data['leave_detail'] = $this->common_model->get_my_leave_by_filter();
    		    }

    		    if($action == 'csv'){
    		        $this->common_model->start_date = $start_date;
        		    $this->common_model->end_date = $this->input->post('end_date');
    		        $this->common_model->download_leave_csv();
    		    }
    		}
    		else{
    		    $data['leave_detail'] = $this->common_model->get_my_leave_detail();
    		}
		
		$this->load->view('admin/leave_management/my_leave',$data);
	}
	public function approve_hr_request(){
	    $data['active'] = 'approve_hr_request';
		$data['approve'] = $this->common_model->get_manager_approve_leave($_SESSION['id']);
		$this->load->view('admin/leave_management/approve_hr_request',$data);
	}
	public function approve_manager_request(){
	    $data['active'] = 'approve_manager_request';
		$data['approve'] = $this->common_model->get_approve_leave_by_approver($_SESSION['id']);
		$this->load->view('admin/leave_management/approve_manager_request',$data);
	}
	public function add_leave_management(){
		$data['active'] = 'leave_management';
		$data['employee'] = $this->common_model->get_employee();
		$data['vacation'] = $this->common_model->get_employee_by_vacation();
// 		$data['vacend'] = $this->common_model->get_approver_for_leave();
        $data['vacend'] = $this->common_model->get_direct_manager_for_leave();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['manager'] = $this->common_model->get_employee_by_manager();
		$this->load->view('admin/leave_management/add_leave_management',$data);
	}
	public function save_leave_management(){
		$this->common_model->role = $this->input->post('role');
		$this->common_model->email = $this->input->post('email');
		$this->common_model->name = $this->input->post('name');
// 		$this->common_model->emp_id = $this->input->post('emp_id');
		$this->common_model->leave_type = $this->input->post('leave_type');
		$this->common_model->from = $this->input->post('from');
		$this->common_model->leave_to = $this->input->post('leave_to');
		$this->common_model->days = $this->input->post('days');
		$this->common_model->remaining_leave = $this->input->post('remaining_leave');
		$this->common_model->back_to = $this->input->post('back_to');
		$this->common_model->replacement = $this->input->post('replacement');
		$this->common_model->approver = $this->input->post('approver');
		$this->common_model->approver_two = $this->input->post('approver_two');
		$this->common_model->manager = $this->input->post('manager');
		$this->common_model->comment = $this->input->post('comment');
		$return_data = $this->common_model->add_leave_management();
		redirect(base_url('admin/my_leave_management'));
	}
	public function fetch_name()
	{
	    if($this->input->post('name'))
		{
		    echo $this->common_model->fetch_name($this->input->post('name'));
		}

	}
	public function edit_leave_management($id){
		$data['active'] = 'leave_management';
		$data['employee'] = $this->common_model->get_employee();
		$data['vacation'] = $this->common_model->get_employee_by_vacation();
		$data['vacend'] = $this->common_model->get_direct_manager_for_leave();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['leave_management'] = $this->common_model->get_management_by_id($id);
		$data['manager'] = $this->common_model->get_employee_by_manager();
		$this->load->view('admin/leave_management/edit_leave_management',$data);
	}
	public function edit_leave($id){
		$data['active'] = 'my_leave_management';
		$data['employee'] = $this->common_model->get_employee();
		$data['vacation'] = $this->common_model->get_employee_by_vacation();
		$data['vacend'] = $this->common_model->get_direct_manager_for_leave();
		$data['director'] = $this->common_model->get_employee_by_director();
		$data['leave_management'] = $this->common_model->get_management_by_id($id);
		$data['manager'] = $this->common_model->get_employee_by_manager();
		$this->load->view('admin/leave_management/edit_leave',$data);
	}
	public function leave_management_edit(){
		$this->common_model->id = $this->input->post('id');
		$this->common_model->role = $this->input->post('role');
// 		$this->common_model->email = $this->input->post('email');
		$this->common_model->name = $this->input->post('name');
// 		$this->common_model->emp_id = $this->input->post('emp_id');
		$this->common_model->leave_type = $this->input->post('leave_type');
		$this->common_model->from = $this->input->post('from');
		$this->common_model->leave_to = $this->input->post('leave_to');
		$this->common_model->days = $this->input->post('days');
		$this->common_model->remaining_leave = $this->input->post('remaining_leave');
		$this->common_model->back_to = $this->input->post('back_to');
		$this->common_model->replacement = $this->input->post('replacement');
		$this->common_model->approver = $this->input->post('approver');
		$this->common_model->approver_two = $this->input->post('approver_two');
		$this->common_model->manager = $this->input->post('manager');
		$this->common_model->comment = $this->input->post('comment');
		$return_data = $this->common_model->edit_leave_management();
		redirect($return_data['return_url']);
	}
	public function leave_edit(){
	    $this->common_model->id = $this->input->post('id');
		$this->common_model->role = $this->input->post('role');
// 		$this->common_model->email = $this->input->post('email');
		$this->common_model->name = $this->input->post('name');
// 		$this->common_model->emp_id = $this->input->post('emp_id');
		$this->common_model->leave_type = $this->input->post('leave_type');
		$this->common_model->from = $this->input->post('from');
		$this->common_model->leave_to = $this->input->post('leave_to');
		$this->common_model->days = $this->input->post('days');
		$this->common_model->back_to = $this->input->post('back_to');
		$this->common_model->replacement = $this->input->post('replacement');
		$this->common_model->approver = $this->input->post('approver');
		$this->common_model->approver_two = $this->input->post('approver_two');
		$this->common_model->manager = $this->input->post('manager');
		$this->common_model->comment = $this->input->post('comment');
		$return_data = $this->common_model->edit_leave();
		redirect($return_data['return_url']);
	}
	public function delete_leave_management($id){
		$row = $this->common_model->get_management_by_id($id);
		$this->db->where('id',$id);
		$this->db->delete('leave_manage_tbl');
        redirect(base_url('admin/leave-management'));
	}
	public function delete_leave($id){
		$row = $this->common_model->get_management_by_id($id);
		$this->db->where('id',$id);
		$this->db->delete('leave_manage_tbl');
        redirect(base_url('admin/my_leave_management'));
	}
// 	public function send_email(){
// 	    $emp1 = $this->input->post('emp1');
// 	    $emp2 = $this->input->post('emp2');
// 	    $email1 = $this->common_model->get_employee_by_id($emp1)['email'];
// 	    $email2 = $this->common_model->get_employee_by_id($emp2)['email'];
// 	    $mailBodyContent = 'test';
// 		$res = $this->cemail->do_mail("$email1",null,null,'Leave Request',$mailBodyContent);
// 		$res = $this->cemail->do_mail("$email2",null,null,'Leave Request',$mailBodyContent);
// 		echo $res;
// 	}
	public function status($id){
	    $this->common_model->role = $this->input->post('role');
		$this->common_model->email = $this->input->post('email');
		$return_data = $this->common_model->add_approver($id);
	   redirect(base_url('admin/approve_request'));
	}
	public function get_persent_employee(){
	    $startDate = $this->input->post('start_date');
	    $fromDate = $this->input->post('from_date');
	    $startDate = date('Y-m-d',strtotime($startDate));
	    $fromDate = date('Y-m-d',strtotime($fromDate));
	   // $this->db->where('id!=',$_SESSION['id']);
	    $this->db->where('emp_type !=','4');
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
	public function approve($id){
	   $return_data = $this->common_model->get_approver($id);
	   redirect(base_url('admin/approve_request'));
	}
	public function reject($id){
	    $return_data = $this->common_model->get_reject($id);
	    redirect(base_url('admin/approve_request'));
	}
	public function approve_hr($id){
	   $return_data = $this->common_model->get_approver_hr($id);
	   redirect(base_url('admin/approve_hr_request'));
	}
	public function reject_hr($id){
	    $return_data = $this->common_model->get_reject_hr($id);
	    redirect(base_url('admin/approve_hr_request'));
	}
	public function approve_manager($id){
	   $return_data = $this->common_model->get_approve_manager($id);
	   redirect(base_url('admin/approve_manager_request'));
	}
	public function reject_manager($id){
	    $return_data = $this->common_model->get_reject_manager($id);
	    redirect(base_url('admin/approve_manager_request'));
	}
    public function hr_leave(){
        $data['active'] = 'leave_management';
		$data['leave_detail'] = $this->common_model->get_hr_leave();
		$this->load->view('admin/leave_management/hr_leave',$data);
    }
    // public function get_user_remaining_leave_by_ajax(){
    //     $id = $this->input->post('user_id');
    //     $pl = get_prev_year_total_leave_by_user($id);
        
    //     $start_date = date('Y').'-01-01';
    //     $end_date = date('Y').'-12-31';
        
    //     $this->db->select_sum('days');
    //     $this->db->where('name',$id);
    //     $this->db->where('date >=',$start_date);
    //     $this->db->where('date <=',$end_date);
    //     $row = $this->db->get('leave_manage_tbl')->row();
    //     echo 32 - ($row->days) + $pl;
    // }
    public function get_user_remaining_leave_by_ajax(){
        $id = $this->input->post('user_id');
        // print_r($id);
        // exit;
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
