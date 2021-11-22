<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
    public function password_change(){
			$data = array(
				'password'=>encrypt($this->password)
			);
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->where('role','employee');
			$res = $this->db->update('emp_tbl',$data);
			if($res > 0){
				$return_data['response_status'] = 1;
				$return_data['response_msg'] = 'Password has been change';
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['response_msg'] = 'Password not change';				
			}
		$return_data['return_url'] = base_url('employee/change-password');
		return $return_data;
    }
    public function get_all_leave_detail(){
    	$id = $_SESSION['id'];
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.name',$id);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function title_group(){
	    $this->db->select('e.*');
	    $this->db->group_by('e.title'); 
	    $this->db->from('emp_tbl as e');
	    $this->db->order_by('e.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
    public function get_employee(){
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];
        $this->db->where('email',$email);
		$this->db->where('id',$id);
		$this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
    public function employee(){
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	 public function user(){
	     $this->db->where('emp_type !=','4');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
    public function fetch_name($name){
		$this->db->where('id',$name);
		$query = $this->db->get('emp_tbl')->row_array();
		
		$id = $query['approver_1'];

		$this->db->where('id',$id);
		$row = $this->db->get('emp_tbl')->row_array();
		if(empty($id)){
		    $row = $this->db->get('emp_tbl')->result_array();
		    foreach($row as $row){
		        $output = '<option value="'.$row['id'].'">'.$row['name'].' '.$row['surname'].'</option>';
		    }
		}
		else{
		    $output = '<option value="'.$row['id'].'">'.$row['name'].' '.$row['surname'].'</option>';
		}
		
		return $output;
	}
	public function get_employee_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('emp_tbl')->row_array();
    	return $row;
	}
    public function add_leave_management(){
    $approver = $this->get_employee_by_id($this->approver)['email'];
    $requestor = $this->get_employee_by_id($this->name)['email'];
		$data = array(
			'role' => $this->role,
            'email' => $this->email,
			'name'=>$this->name,
// 			'emp_id'=>$this->emp_id,
			'leave_type'=>$this->leave_type,
			'from'=>date('Y-m-d',strtotime($this->from)),
			'leave_to'=>date('Y-m-d',strtotime($this->leave_to)),
			'days'=>$this->days,
			'remaining_leave'=>$this->remaining_leave,
			'back_to' =>$this->back_to,
			'replacement'=>$this->replacement,
			'approver'=>$this->approver,
			'approver_two'=>$this->approver_two,
			'manager'=>$this->manager,
			'comment' => $this->comment,
			'date'=>date('Y-m-d')
		);
		$name = $data['name'];
		$data1 = $data['remaining_leave']-$data['days'];
		$result = array(
		       'v_leave' =>$data1,
        );
        $this->db->set($result);
        $this->db->where('name',$name);
        $query = $this->db->update('vacation');
		$this->db->insert('leave_manage_tbl',$data);
		$id = $this->db->insert_id();
	
		if($id > 0){
		    $emailcontent['approver'] = $this->get_employee_by_id($this->approver)['name'];
		    $emailcontent['requester'] = get_emp_by_id($this->name)['name'];
		    $mailBodyContent = $this->load->view('mailTemplates/approver-request',$emailcontent,true);
		    $res = $this->cemail->do_mail("$approver",null,null,'Leave Request',$mailBodyContent);
		    $res = $this->cemail->do_mail("$requestor",null,null,'Leave Request',$mailBodyContent);
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Leave has been add';
			$return_data['return_url'] = base_url('admin/leave-management');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Leave not add';
			$return_data['return_url'] = base_url('admin/add_leave_management');
		}
	return $return_data;
	}
    public function get_management_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('leave_manage_tbl')->row_array();
    	return $row;
	}
    public function edit_leave_management(){
		$row = $this->get_management_by_id($this->id);
		$data = array(
			'name'=>$this->name,
// 			'emp_id'=>$this->emp_id,
			'leave_type'=>$this->leave_type,
			'from'=>date('Y-m-d',strtotime($this->from)),
			'leave_to'=>date('Y-m-d',strtotime($this->leave_to)),
			'days'=>$this->days,
			'remaining_leave'=>$this->remaining_leave,
			'back_to' =>$this->back_to,
			'replacement'=>$this->replacement,
			'approver'=>$this->approver,
			'approver_two'=>$this->approver_two,
			'manager'=>$this->manager,
			'comment' => $this->comment,
		);
		$name = $data['name'];
		$data1 = $data['remaining_leave']-$data['days'];
		$result = array(
		       'v_leave' =>$data1,
        );
        $this->db->set($result);
        $this->db->where('name',$name);
        $query = $this->db->update('vacation');
		$this->db->where('id',$this->id);
		$id = $this->db->update('leave_manage_tbl',$data);

		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'leave Management has been update';
			$return_data['return_url'] = base_url('employee/leave_management');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'leave Management not update';
			$return_data['return_url'] = base_url('employee/leave_management/edit_leave_management/'.$row['id']);
		}
	return $return_data;
	}
    public function get_procurement($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('procurement_tbl')->row_array();
    	return $row;
	}
    public function add_assets(){
		$data = array(
            'email' => $this->email,
            'role'=>$this->role,
			'asset_type'=>$this->asset_type,
			'created_by'=>$this->created_by,
			'c_owner' => $this->c_owner,
			'purchase_date'=>$this->purchase_date,
			'assign_date'=>$this->assign_date,
		);
		$this->db->insert('assets_tbl',$data);
		$id = $this->db->insert_id();
		
		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Assets has been add';
			$return_data['return_url'] = base_url('employee/view_my_assets');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Assets not add';
			$return_data['return_url'] = base_url('employee/assets');
		}
	return $return_data;
	}
    public function get_assets(){
        $email = $_SESSION['email'];
        $this->db->where('email',$email);
		$row = $this->db->get('assets_tbl')->result_array();
    	return $row;
	}
    public function get_assets_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('assets_tbl')->row_array();
    	return $row;
	}
    public function edit_assets(){
		$row = $this->get_assets_by_id($this->id);
		$data = array(
			'asset_type'=>$this->asset_type,
			'created_by'=>$this->created_by,
			'c_owner' => $this->c_owner,
			'purchase_date'=>$this->purchase_date,
			'assign_date'=>$this->assign_date,
		);
		$this->db->where('id',$this->id);
		$id = $this->db->update('assets_tbl',$data);
		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Assets has been update';
			$return_data['return_url'] = base_url('employee/view_my_assets');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Assets not update';
			$return_data['return_url'] = base_url('employee/show_assets/'.$row['id']);
		}
	return $return_data;
	}
	public function get_employee_by_vacation(){
	    $this->db->where('name!=',$_SESSION['name']);
		$this->db->where('vacation','0');
		$this->db->where('emp_type !=','4');
		$this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee_for_approver(){
		$this->db->where('vacation','0');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_approve_two_leave(){
	    $this->db->where('approver_two',$_SESSION['id']);
		$row = $this->db->get('leave_manage_tbl')->result_array();
    	return $row;
	}
	public function get_approve_leave(){
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.approver',$_SESSION['id']);
	    $this->db->or_where('l.approver_two',$_SESSION['id']);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_employee_by_director(){
	    $this->db->where('emp_type','4');
	    $this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee_by_manager(){
	    $this->db->where('emp_type','6');
	    $this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
    public function get_project(){
		$row = $this->db->get('project')->result_array();
    	return $row;
	}
    public function get_approver_two($id){
        $data = array(
            'status_1' => "1",
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('leave_manage_tbl');
    	return $row;
    }
    public function get_reject_two($id){
        $data = array(
            'status_1' => '0',
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('leave_manage_tbl');
    	return $row;
    }
    public function get_my_assets(){
        // $email = $_SESSION['email'];
        $id = $_SESSION['id'];
        $this->db->select('a.*,emp_tbl.name as name,emp_tbl.surname as surname');
		$this->db->from('assets_tbl as a');
		$this->db->where('a.c_owner',$id);
        // $this->db->where('a.email',$email);
		$this->db->join('emp_tbl','emp_tbl.id = a.c_owner','left');
		$this->db->order_by('a.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
    }
	public function emp_type(){
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee_by_advisor(){
	    $this->db->where('emp_type','2');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_budget(){
        $this->db->select('budget_tbl.*,project.task_name as task,project.id as task_id,emp_tbl.name as uploader_user,emp_tbl.name as uploader_email');
		$this->db->from('budget_tbl');
// 		$this->db->where('task','project.id');
		$this->db->join('project','project.id = budget_tbl.task');
		$this->db->join('emp_tbl','emp_tbl.id = budget_tbl.upload_by','left');
// 		$this->db->where('budget_tbl.task',1);
		$this->db->order_by('budget_tbl.id','DESC');
		$this->db->group_by('budget_tbl.task'); 
// 		$this->db->limit('1');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function budget()
	{
	    	$this->db->select('budget_tbl.*');
	    	$this->db->from('budget_tbl');
	    	$this->db->group_by('budget_tbl.category'); 
	    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function add_procurement(){
	    $requesterEmail = $this->get_employee_by_id($this->name)['email'];
	    $approverEmail = $this->get_employee_by_id($this->direct_manager)['email'];
	    $str = random_string(5);
			$name = 'Procureimage-'.$str;
			$config['upload_path'] = './assets/backend/dist/img/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size'] = 10000;			
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('featuredImage')){
				$featuredImage =  $this->upload->data('file_name');
			}
			if(empty($this->upload->do_upload('featuredImage'))){
			    $featuredImage = "";
			}
			$comment = $this->input->post('comment');
// 			$approver_three = $this->input->post('approver_three');
			$data = array(
				'name'=>$this->name,
				'email'=>$this->email,
				'role'=>$this->role,
				'item'=>$this->item,
				'quantity'=>$this->quantity,
				'unit'=>$this->unit,
				'task'=>$this->task,
				// 'other'=>$this->other,
				'address'=>$this->address,
				'b_category'=>$this->b_category,
				'sub_category'=>$this->sub_category,
				// 'b_item'=>$this->b_item,
				'direct_manager' =>$this->direct_manager,
				// 'qms_manager'=>$this->qms_manager,
				'procurement_manager'=>$this->procurement_manager,
				'director'=>$this->director,
				'featuredImage'=>$featuredImage,
				'comment'=>$this->comment	
			);
			$this->db->insert('procurement_tbl',$data);
			$id = $this->db->insert_id();
			
			if($id > 0){
			    $emailcontent['requester'] = $this->get_employee_by_id($this->name)['name'];
    		    $emailcontent['approver1'] = $this->get_employee_by_id($this->direct_manager)['name'];
                $mailBodyContent = $this->load->view('mailTemplates/procurement',$emailcontent,true);
                $this->cemail->do_mail("$approverEmail",null,null,'Procurement',$mailBodyContent);
                $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
				$return_data['response_status'] = 1;
				$return_data['response_msg'] = 'Procurement has been add';
				$return_data['return_url'] = base_url('employee/procurement');
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['response_msg'] = 'Procurement not add';
				$return_data['return_url'] = base_url('employee/add_procurement');
			}
		return $return_data;
	}
	public function get_item($task){
	    $this->db->where('task',$task);
		$query = $this->db->get('procurement_tbl')->row_array();
		$id = $query['task'];
		$this->db->where('task',$task );
		 $this->db->where('free_text != ','');
	    $this->db->group_by('free_text');
		$row = $this->db->get('budget_tbl')->result_array();
		foreach($row as $b_item){
	        $output = '<option value="'.$b_item['free_text'].'">'.$b_item['free_text'] .'</option> ';
		}
		return $output;
	}
	public function budget_item()
	{
	    	$this->db->select('budget_tbl.*');
	    	$this->db->from('budget_tbl');
	    	$this->db->where('free_text != ','');
	        $this->db->group_by('free_text');
	    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_all_request(){
	   // $name = $_SESSION['name'];
    	$this->db->select('p.*,project.task_name as task');
		$this->db->from('procurement_tbl as p');
		$this->db->join('emp_tbl as e','e.id = p.name');
		$this->db->join('project','project.id = p.task');
		$this->db->where('p.name',$_SESSION['id']);
		$this->db->order_by('p.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_approve_procurement(){
	    $id = $_SESSION['id'];
    	$this->db->select('p.*,project.task_name as task');
		$this->db->from('procurement_tbl as p');
		$this->db->where('direct_manager',$id);
		$this->db->or_where('add_approver',$_SESSION['id']);
		$this->db->join('project','project.id = p.task');
		$this->db->order_by('p.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function edit_procurement(){
	    $row = $this->get_procurement($this->id);
		if(!empty($_FILES['featuredImage']['name'])){
			$str = random_string(5);
			$name = 'procurement-'.$str;
			$config['upload_path'] = './assets/backend/dist/img/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size'] = 10000;
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('featuredImage')){
				$featuredImage =  $this->upload->data('file_name');
			}
		}
		else{
			$featuredImage=  $row['featuredImage'];
		}
		$comment = $this->input->post('comment');
		$approver_three = $this->input->post('approver_three');
			$data = array(
				'name'=>$this->name,
				'role'=>$this->role,
				'email'=>$this->email,
				'item'=>$this->item,
				'quantity'=>$this->quantity,
				'unit'=>$this->unit,
				'task'=>$this->task,
				// 'other'=>$this->other,
				'address'=>$this->address,
				'b_category'=>$this->b_category,
				'sub_category'=>$this->sub_category,
				// 'b_item'=>$this->b_item,
				'direct_manager' =>$this->direct_manager,
				// 'qms_manager'=>$this->qms_manager,
				'procurement_manager'=>$this->procurement_manager,
				'director'=>$this->director,
				'featuredImage'=>$featuredImage,
				'comment'=>$this->comment	
		);
		$this->db->where('id',$this->id);
		$res = $this->db->update('procurement_tbl',$data);
		if($res > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Procurement has been update';
			$return_data['return_url'] = base_url('employee/procurement');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Procurement not update';
			$return_data['return_url'] = base_url('employee/procurement/edit_procurement/'.$row['id']);
		}
		return $return_data;
	}
	public function approve_procurement($id){
       	$row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['director'])['email'];
        
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $emailcontent['procurement_manager'] = $this->get_employee_by_id($row['director'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-approve',$emailcontent,true);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_1' => "1",
            'direct_manager_approve_date'=> date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function approve_second_procurement($id){
        $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['director'])['email'];
        
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $emailcontent['procurement_manager'] = $this->get_employee_by_id($row['director'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-approve',$emailcontent,true);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_second_1' => "1",
            'direct_manager_second_approve_date'=> date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function approverrejectprocurement($id){
       
    // 	$row = $this->get_procurement($id);
    //     $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
    //     $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];

    //     $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
    //     $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
    //     $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
    //     $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'approver_status' => "0",
            'approver_approve_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function approverapproveprocurement($id){
        
    // 	$row = $this->get_procurement($id);
    //     $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
    //     $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];
        
    //     $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
    //     $emailcontent['procurement_manager'] = $this->get_employee_by_id($row['procurement_manager'])['name'];
    //     $mailBodyContent = $this->load->view('mailTemplates/procurement-approve',$emailcontent,true);
    //     $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'approver_status' => "1",
            'approver_approve_date'=>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function reject_procurement($id){
        $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['director'])['email'];

        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_1' => "0",
            'direct_manager_second_approve_date'=> date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function reject_second_procurement($id){
        $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['director'])['email'];

        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_second_1' => "0",
            'direct_manager_second_approve_date'=> date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function get_leave_detail_by_id($id){
	    $this->db->select('leave_manage_tbl.*,emp_tbl.name as emp_name,emp_tbl.email as emp_email,e.name as name,e.surname as surname');
		$this->db->from('leave_manage_tbl');
		$this->db->join('emp_tbl','emp_tbl.id = leave_manage_tbl.replacement','left');
		$this->db->join('emp_tbl as e','e.id = leave_manage_tbl.name','left');
		$this->db->where('leave_manage_tbl.id',$id);
    	$row = $this->db->get()->row_array();
    	return $row;
	}
	public function get_employee_by_filter(){
	     $this->db->select('e.*,emp_type.emp_type as emp_type');
	    $this->db->from('emp_tbl as e');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
		
		if($this->name != ''){
	        $this->db->where('e.id',$this->name);
	    }
	    
	    else if($this->title != ''){
	        $this->db->where('e.title',$this->title);
	    }
	    else if($this->approver_1 != ''){
	        $this->db->where('e.approver_1',$this->approver_1);
	    }
	    
	    else if($this->department != ''){
	        $this->db->where('e.department',$this->department);
	    }
	    $row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_from_date(){
	    $this->db->select('*');
		$this->db->from('leave_manage_tbl');
		$this->db->join('emp_tbl','emp_tbl.name = leave_manage_tbl.name');
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function get_all_employee(){
	    $this->db->select('e.*,emp_type.emp_type as emp_type');
		$this->db->from('emp_tbl as e');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
		$this->db->order_by('e.name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
    public function get_p_manager(){
	    $this->db->select('e.*');
		$this->db->from('emp_tbl as e');
		$this->db->where('emp_type','5');
		$this->db->order_by('e.name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_name(){
	    $name = $_SESSION['id'];
	    $this->db->select('*');
	    $this->db->from('emp_tbl');
	    $this->db->where('id',$name);
	    $row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_approver_1(){
    	$this->db->select('e.*,emp_type.emp_type as emp_type');
		$this->db->from('emp_tbl as e');
		$this->db->where('vacation','0');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
		$this->db->order_by('e.name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function fetch_task($task){
		$this->db->where('task',$task);
		$query = $this->db->get('procurement_tbl')->row_array();
		$id = $query['task'];
		$this->db->where('id',$task );
		$row = $this->db->get('project')->result_array();
		foreach($row as $add){
	        $output = '<option value="'.$add['address_1'].'">'.$add['address_1'] .'</option> <option value="'.$add['address_2'].'">'.$add['address_2'] .'</option> <option value="'.$add['address_3'].'">'.$add['address_3'] .'</option>';
		}
		return $output;
	}
	public function get_approver_for_leave(){
	    $this->db->select('e.*,emp_type.emp_type as emp_type');
		$this->db->from('emp_tbl as e');
		$this->db->where('e.vacation','0');
		$this->db->where('e.emp_type','3');
		$this->db->or_where('e.emp_type','5');
		$this->db->or_where('e.emp_type','2');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
		$this->db->order_by('e.name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function fetch_category($b_category){
		$this->db->where('category',$b_category);
		$this->db->group_by('budget_tbl.category');
		$query = $this->db->get('budget_tbl')->row_array();
		$category = $query['category'];
		$this->db->where('category',$category );
		$row = $this->db->get('budget_tbl');
		    foreach ($row->result_array() as $sub){
		        $output = '<option value="'.$sub['sub_category'].'">'.$sub['sub_category'] .'</option>';
    		}
		return $output;
	}
	public function procurment($id){
	    $this->db->select('*');
	    $this->db->where('id',$id);
	    $this->db->from('procurement_tbl');
	    $row = $this->db->get()->row_array();
    	return $row;
	}
	public function duplicate_procurement($id){
		$row = $this->procurment($id);
		$name = $row['name'];
		$item = $row['item'];
		$quantity = $row['quantity'];
		$unit = $row['unit'];
		$task = $row['task'];
		$other = $row['other'];
		$address = $row['address'];
		$b_category = $row['b_category'];
		$sub_category = $row['sub_category'];
		$direct_manager = $row['direct_manager'];
// 		$qms_manager = $row['qms_manager'];
		$procurement_manager = $row['procurement_manager'];
		$director = $row['director'];
		$featuredImage = $row['featuredImage'];
		$comment = $row['comment'];
		$price = $row['price'];
		$supplier = $row['supplier'];
		$add_approver = $row['add_approver'];
		$qutation = $row['qutation'];
		$role = $row['role'];
		$email = $row['email'];
			$data = array(
			    'current_date'=> date('Y-m-d'),
				'name'=>$name,
				'item'=>$item,
				'unit' =>$unit,
				'item'=>$item,
				'quantity'=>$quantity,
				'unit'=>$unit,
				'task'=>$task,
				'other'=>$other,
				'address'=>$address,
				'b_category'=>$b_category,
				'sub_category'=>$sub_category,
				'direct_manager' =>$direct_manager,
				// 'qms_manager'=>$qms_manager,
				'procurement_manager'=>$procurement_manager,
				'director'=>$director,
				'featuredImage'=>$featuredImage,
				'comment'=>$comment,
				'price' => $price,
				'supplier'=>$supplier,
				'add_approver' =>$add_approver,
				'qutation' => $qutation,
				'role'  => $role,
		        'email'  => $email,
		        'status_2' =>'',
		        'status_1' =>'',
		        'final_approver' =>'',
		        'status' =>''
			);
			$res = $this->db->insert('procurement_tbl',$data);
			if($res > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Procurement has been update';
			$return_data['return_url'] = base_url('employee/procurement');
    		}
    		else{
    			$return_data['response_status'] = 0;
    			$return_data['response_msg'] = 'Procurement not update';
    			$return_data['return_url'] = base_url('employee/procurement/duplicate_procurement/'.$row['id']);
    		}
    		return $return_data;
	}
	public function comment(){
	    $this->db->order_by('id',"DESC");
	    $row = $this->db->get('erp_tbl')->result_array();
	    return $row;
	}
	public function get_request_yes($id){
        $data = array(
            'received' => "1",
            'received_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
     public function get_request_no($id){
    	$row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $emailcontent['procurement_manager'] = get_emp_by_id($row['procurement_manager'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/confirmed-received',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement Reject',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement Reject',$mailBodyContent);
        $data = array(
            'received' => '0',
            'received_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function task(){
	    $this->db->where('task','0');
		$row = $this->db->get('project')->result_array();
    	return $row;
	}
	public function get_direct_manager_for_leave(){
    	$this->db->select('*');
		$this->db->from('emp_tbl');
		$this->db->where('emp_type !=','4');
		$this->db->where('emp_type !=','5');
		$this->db->where('emp_type !=','6');
		$this->db->order_by('name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
}

?>