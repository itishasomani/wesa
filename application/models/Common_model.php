<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function get_count($tbl){
        return $this->db->count_all($tbl);
    }
	public function password_change(){
			$data = array(
				'password'=>encrypt($this->password),
			);
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->where('role','admin');
			$res = $this->db->update('emp_tbl',$data);
			if($res > 0){
				$return_data['response_status'] = 1;
				$return_data['response_msg'] = 'Password has been change';
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['response_msg'] = 'Password not change';				
			}
		$return_data['return_url'] = base_url('admin/change-password');
		return $return_data;
    }
    public function check_password(){
		$this->db->where('id',$this->session->userdata('id'));
		$this->db->where('role','admin');
		$row = $this->db->get('emp_tbl')->row_array();
		$password = decrypt($row['password']);
		if($password){
			return array('status'=>1);
		}
		else{
			return array('status'=>0);
		}
	}
	public function add_employee(){
    		$str = random_string(5);
			$name = 'image-'.$str;
			$config['upload_path'] = './assets/backend/dist/img/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 10000;			
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if ($this->upload->do_upload('image')){
				$image =  $this->upload->data('file_name');
			}
			$data = array(
				'token'=>random_string(35),
				'role'=>$this->role,
				'name'=>$this->name,
				'surname'=>$this->surname,
				'emp_type'=>$this->emp_type,
				'title'=>$this->title,
				'approver_1'=>$this->approver_1,
				'manager'=>$this->manager,
				'director'=>$this->director,
				'password'=>$this->password,
				'email'=>$this->email,
				'phone'=>$this->phone,
				'department'=>$this->department,
				'start_date' => $this->start_date,
				'education'=>$this->education,
				'training'=>$this->training,
				'image'=>$image,
			);
			$this->db->insert('emp_tbl',$data);
			$id = $this->db->insert_id();
			if($id > 0){
			    $emailcontent['name'] = $data['name'];
			    $emailcontent['email'] = $data['email'];
			    $emailcontent['password'] = $data['password'];
			    $email = $data['email'];
    		    $mailBodyContent = $this->load->view('mailTemplates/add-employee',$emailcontent,true);
    		    $res = $this->cemail->do_mail("$email",null,null,'Admin',$mailBodyContent);
				$return_data['response_status'] = 1;                              
				$return_data['response_msg'] = 'employee has been add';
				$return_data['return_url'] = base_url('admin/employee');
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['response_msg'] = 'employee not add';
				$return_data['return_url'] = base_url('admin/add-employee');
			}
    	return $return_data;
	}
	public function employee(){
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];
        $this->db->where('email',$email);
		$this->db->where('id',$id);
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee(){
    	$this->db->select('e.*,emp_type.emp_type as emp_type');
		$this->db->from('emp_tbl as e');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
		$this->db->order_by('e.name','ASC');
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
	public function get_p_manager(){
	    $this->db->select('e.*');
		$this->db->from('emp_tbl as e');
		$this->db->where('emp_type','5');
		$this->db->order_by('e.name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_approver_1(){
    	$this->db->select('e.*,emp_type.emp_type as emp_type');
		$this->db->from('emp_tbl as e');
		$this->db->where('vacation','0');
		$this->db->where('e.emp_type !=','1');
		$this->db->where('e.emp_type !=','4');
		$this->db->where('e.emp_type !=','6');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
	
		$this->db->order_by('e.name','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_admin(){
	    $this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee_by_vacation(){
	    $this->db->where('id!=',$_SESSION['id']);
	    $this->db->where('emp_type !=','4');
		$this->db->where('vacation','0');
		$this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee_for_approver(){
	    $this->db->where('name!=',$_SESSION['name']);
	   // $this->db->where('emp_type','1');
		$this->db->where('vacation','0');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_employee_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('emp_tbl')->row_array();
    	return $row;
	}
	public function edit_employee(){
		$row = $this->get_employee_by_id($this->id);
		if(!empty($_FILES['image']['name'])){
			$str = random_string(5);
			$name = 'image-'.$str;
			$config['upload_path'] = './assets/backend/dist/img/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 10000;
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$image =  $this->upload->data('file_name');
			}
		}
		else{
			$image=  $row['image'];
		}
		$data = array(

			'name'=>$this->name,
// 			'emp_id'=>$this->emp_id,
			'emp_type'=>$this->emp_type,
			'surname' =>$this->surname,
// 			'project_manager'=>$this->project_manager,
            'title'=>$this->title,
			'approver_1'=>$this->approver_1,
			'manager'=>$this->manager,
			'director'=>$this->director,
// 			'username'=>$this->username,
			'password'=>$this->password,
			'email'=>$this->email,
			'phone'=>$this->phone,
// 			'position'=>$this->position,
			'department'=>$this->department,
			'start_date' => $this->start_date,
			'education'=>$this->education,
			'training'=>$this->training,
// 			'certificate'=>$this->certificate,
			'image'=>$image,
		);
		$this->db->where('id',$this->id);
		$res = $this->db->update('emp_tbl',$data);
		if($res > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'employee has been update';
			$return_data['return_url'] = base_url('admin/employee');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'employee not update';
			$return_data['return_url'] = base_url('admin/edit_employee/'.$row['id']);
		}
		return $return_data;
	}
	public function fetch_name($name){
		//$this->db->order_by('name','ASC');
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
	public function add_leave_management(){
	    $approver = $this->get_employee_by_id($this->approver)['email'];
	    $requestor = $this->get_employee_by_id($this->name)['email'];
	    //$approver2 = $this->get_employee_by_id($this->approver_two)['email'];
		$data = array(
			'role' => $this->role,
			'email' =>$this->email,
			'name'=>$this->name,
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
	public function get_all_leave_detail(){
	    $this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl as l');
// 		$this->db->group_by('l.name');
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_leave_detail_by_date(){
	    $this->db->select('leave_manage_tbl.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl');
		$this->db->join('emp_tbl','emp_tbl.id = leave_manage_tbl.replacement');
		$this->db->where('leave_manage_tbl.from >=',$this->start_date);
	    $this->db->where('leave_manage_tbl.leave_to <=',$this->end_date);
		$this->db->order_by('leave_manage_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
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
	public function get_my_leave_detail(){
	    $id = $_SESSION['id'];
	    $this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.name',$id);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_my_leave_detail_by_date(){
	    $email = $_SESSION['email'];
	    $this->db->select('leave_manage_tbl.*,emp_tbl.name as emp_name,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl');
		$this->db->join('emp_tbl','emp_tbl.id = leave_manage_tbl.replacement');
		$this->db->where('leave_manage_tbl.email',$email);
		$this->db->where('leave_manage_tbl.from >=',$this->start_date);
	    $this->db->where('leave_manage_tbl.leave_to <=',$this->end_date);
		$this->db->order_by('leave_manage_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_management_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('leave_manage_tbl')->row_array();
    	return $row;
	}
	public function edit_leave_management(){
		$row = $this->get_management_by_id($this->id);
		
		$data = array(
			'role' => $this->role,
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
			$return_data['response_msg'] = 'leave-management has been update';
			$return_data['return_url'] = base_url('admin/leave_management');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'leave-management not update';
			$return_data['return_url'] = base_url('admin/leave_management/edit_leave_management/'.$row['id']);
		}
		return $return_data;
	}
	public function edit_leave(){
	    $row = $this->get_management_by_id($this->id);
		$data = array(
			'role' => $this->role,
			'name'=>$this->name,
// 			'emp_id'=>$this->emp_id,
			'leave_type'=>$this->leave_type,
			'from'=>date('Y-m-d',strtotime($this->from)),
			'leave_to'=>date('Y-m-d',strtotime($this->leave_to)),
			'days'=>$this->days,
			'back_to' =>$this->back_to,
			'replacement'=>$this->replacement,
			'approver'=>$this->approver,
			'approver_two'=>$this->approver_two,
			'manager'=>$this->manager,
			'comment' => $this->comment,
		);
		$this->db->where('id',$this->id);
		$id = $this->db->update('leave_manage_tbl',$data);

		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'leave-management has been update';
			$return_data['return_url'] = base_url('admin/my_leave_management');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'leave-management not update';
			$return_data['return_url'] = base_url('admin/leave_management/edit_leave/'.$row['id']);
		}
		return $return_data;
	}
	public function add_assets(){
	    $row = $this->get_employee_by_id($this->c_owner);
	    
		$str = random_string(5);
			$name = 'image-'.$str;
			$config['upload_path'] = './assets/backend/dist/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 10000;			
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$image =  $this->upload->data('file_name');
			}
		$data = array(
			'role' => $this->role,
			'email' => $this->email,
			'asset_type'=>$this->asset_type,
			'created_by'=>$this->created_by,
			'c_owner' => $this->c_owner,
			'purchase_date'=>$this->purchase_date,
			'assign_date'=>$this->assign_date,
			'image'=>$image,
		);
		$this->db->insert('assets_tbl',$data);
		$id = $this->db->insert_id();
		
		if($id > 0){
		    $email = $row['email'];
		    $emailcontent['user'] = $row['name'];
            $mailBodyContent = $this->load->view('mailTemplates/assets',$emailcontent,true);
            $this->cemail->do_mail("$email",null,null,'Assets',$mailBodyContent);
            
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Assets has been add';
			$return_data['return_url'] = base_url('admin/view_my_assets');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Assets not add';
			$return_data['return_url'] = base_url('admin/assets');
		}
		return $return_data;
	}
	public function get_assets(){
		$this->db->select('a.*,e.name as name');
		$this->db->from('assets_tbl as a');
		$this->db->join('emp_tbl as e','e.id = a.c_owner','LEFT');
		$this->db->order_by('a.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_my_assets(){
	    $id = $_SESSION['id'];
    	$this->db->select('a.*,emp_tbl.name as name');
		$this->db->from('assets_tbl as a');
		$this->db->where('a.c_owner',$id);
		$this->db->join('emp_tbl','emp_tbl.id = a.c_owner','left');
		$this->db->order_by('a.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_name(){
	    $name = $_SESSION['name'];
	    $email = $_SESSION['email'];
	    $this->db->select('*');
	    $this->db->from('emp_tbl');
	    $this->db->where('name',$name);
	    $this->db->where('email',$email);
	    $row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_assets_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('assets_tbl')->row_array();
    	return $row;
	}
	public function edit_assets(){
		$row = $this->get_assets_by_id($this->id);
		if(!empty($_FILES['image']['name'])){
			$str = random_string(5);
			$name = 'image-'.$str;
			$config['upload_path'] = './assets/backend/dist/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 10000;
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$image =  $this->upload->data('file_name');
			}
		}
		else{
			$image=  $row['image'];
		}
		$data = array(
			'asset_type'=>$this->asset_type,
			'created_by'=>$this->created_by,
			'c_owner' => $this->c_owner,
			'purchase_date'=>$this->purchase_date,
			'assign_date'=>$this->assign_date,
			'image'=>$image,
		);
		$this->db->where('id',$this->id);
		$id = $this->db->update('assets_tbl',$data);
		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Assets has been update';
			$return_data['return_url'] = base_url('admin/view_my_assets');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Assets not update';
			$return_data['return_url'] = base_url('admin/show_assets/'.$row['id']);
		}
		return $return_data;
	}
	public function add_procurement(){
	    $requesterEmail = $this->get_employee_by_id($this->name)['email'];
	    $approverEmail = $this->get_employee_by_id($this->direct_manager)['email'];
	   // $qmsEmail = $this->get_employee_by_id($this->qms_manager)['email'];

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
		    $featuredImage = '';
		}
		$comment = $this->input->post('comment');
		$data = array(
			'name'=>$this->name,
			'email'=>$this->email,
			'role' =>$this->role,
			'item'=>$this->item,
			'quantity'=>$this->quantity,
			'unit'=>$this->unit,
			'task'=>$this->task,
// 			'other'=>$this->other,
			'address'=>$this->address,
			'b_category'=>$this->b_category,
			'sub_category'=>$this->sub_category,
// 			'b_item'=>$this->b_item,
			'direct_manager' =>$this->direct_manager,
			'procurement_manager'=>$this->procurement_manager,
			'director'=>$this->director,
			// 'approver'=>$this->approver,
			// 'approver_two'=>$this->approver_two,
			// 'approver_three'=>implode(",",(array)$approver_three),
			'featuredImage'=>$featuredImage ,
			'comment'=>$this->comment,
			'date'=>date("Y-m-d")
		);
		$this->db->insert('procurement_tbl',$data);
		$id = $this->db->insert_id();
		
		if($id > 0){
		    $emailcontent['requester'] = $this->get_employee_by_id($this->name)['name'];
		    $emailcontent['approver1'] = $this->get_employee_by_id($this->direct_manager)['name'];
            $mailBodyContent = $this->load->view('mailTemplates/procurement',$emailcontent,true);
            $this->cemail->do_mail("$approverEmail",null,null,'Procurement',$mailBodyContent);
            // $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Procurement has been add';
			$return_data['return_url'] = base_url('admin/view-all-request');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Procurement not add';
			$return_data['return_url'] = base_url('admin/procurement');
		}
		return $return_data;
	}
	public function get_all_request(){
    	$this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->join('project','project.id = procurement_tbl.task');
		$this->db->order_by('procurement_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function download_request_csv_by_filter(){
	    $this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->join('project','project.id = procurement_tbl.task');
		$this->db->where('date >=',$this->start_date);
        $this->db->where('date <=',$this->end_date);
		$this->db->order_by('procurement_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	$filename = 'Procurement.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
 
        // file creation
        $file = fopen('php://output', 'w');
 
        $header = array("No","Task","Requestor","Request Date","Budget Category","Budget Sub-Category","Item","Direct Manager","Direct Manager approval status","Date Approval status Direct Manager","Procurement Manager","Procurement Manager approval status","Date Approval status Procurement Manager","Director","Director approval status","Date Director approval status","Comment","Tin number","Supplier","Supplier's position","Unit","Quantity","Total Price","Quatations Link","Procurement Status","Received by requestor","Date received by requestor");
        fputcsv($file, $header);
        $i = 1;
        foreach ($row as $fields){
            if($fields['status_1'] == 1){
                $approved = 'Approved';
            }
            else if($fields['status_1'] == 0){
                $approved = 'Rejected';
            }
            else {
                $approved = '';
            }
            if($fields['status_2'] == 1){
                $procurement = 'Approved';
            }
            else if($fields['status_2'] == 0){
                $procurement = 'Rejected';
            }
            else {
                $procurement = '';
            }
            if($fields['status'] == 1){
                $director = 'Approved';
            }
            else if($fields['status'] == 0){
                $director = 'Rejected';
            }
            else {
                $director = '';
            }
            if($fields['received'] == 1){
                $received = 'Yes';
            }
            else if($fields['received'] == 0){
                $received = 'No';
            }
            else{
                $received = '';
            }
           fputcsv($file, array($i++,$fields['task'],get_emp_by_id($fields['name'])['name'].get_emp_by_id($fields['name'])['surname'],$fields['date'],$fields['b_category'],$fields['sub_category'],$fields['item'],get_emp_by_id($fields['direct_manager'])['name'].get_emp_by_id($fields['direct_manager'])['surname'],$approved,$fields['direct_manager_approve_date'],get_emp_by_id($fields['procurement_manager'])['name'].get_emp_by_id($fields['procurement_manager'])['surname'],$procurement,$fields['procurement_manager_approve_date'],get_emp_by_id($fields['director'])['name'].get_emp_by_id($fields['director'])['surname'],$director,$fields['director_approve_date'],$fields['comment'],get_supplier($fields['supplier'])['tin'],$fields['supplier'],get_supplier($fields['supplier'])['type'],$fields['unit'],$fields['quantity'],$fields['price'],$fields['qutation'],$director,$received,$fields['received_date']));
        }
 
        fclose($file);
        exit;
	}
	public function get_request(){
	    $id = $_SESSION['id'];
    	$this->db->select('p.*,project.task_name as task');
		$this->db->from('procurement_tbl as p');
		$this->db->where('p.name',$id);
		$this->db->join('project','project.id = p.task');
		$this->db->order_by('p.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_procurement($id){
    	$this->db->select('p.*,project.task_name as task');
		$this->db->from('procurement_tbl as p');
		$this->db->where('p.id',$id);
		$this->db->join('project','project.id = p.task');
		$this->db->order_by('p.id','DESC');
    	$row = $this->db->get()->row_array();
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
				// 'approver_three'=>implode(",",(array)$approver_three),
				'featuredImage'=>$featuredImage,
				'comment'=>$this->comment	
		);
		$this->db->where('id',$this->id);
		$res = $this->db->update('procurement_tbl',$data);
		if($res > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Procurement has been update';
			$return_data['return_url'] = base_url('admin/view-all-request');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Procurement not update';
			$return_data['return_url'] = base_url('admin/procurement/edit_procurement/'.$row['id']);
		}
		return $return_data;
	}
	public function approve_procurement_edit(){
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
				// 'emp_id'=>$this->emp_id,
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
				// 'approver_three'=>implode(",",(array)$approver_three),
				'featuredImage'=>$featuredImage,
				'comment'=>$this->comment,
				// 'status'=>$this->status
		);
		$this->db->where('id',$this->id);
		$res = $this->db->update('procurement_tbl',$data);
		if($res > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Procurement has been update';
			$return_data['return_url'] = base_url('admin/procurement_request');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Procurement not update';
			$return_data['return_url'] = base_url('admin/procurement/approve_procurement_edit/'.$row['id']);
		}
		return $return_data;
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
// 		$other = $row['other'];
		$address = $row['address'];
		$b_category = $row['b_category'];
		$sub_category = $row['sub_category'];
		$b_item= $row['b_item'];
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
			    'current_date'=>date('Y-m-d'),
				'name'=>$name,
				'item'=>$item,
				'unit' =>$unit,
				'item'=>$item,
				'quantity'=>$quantity,
				'unit'=>$unit,
				'task'=>$task,
				// 'other'=>$other,
				'address'=>$address,
				'b_category'=>$b_category,
				'sub_category'=>$sub_category,
				'b_item'=>$b_item,
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
			$return_data['return_url'] = base_url('admin/view-all-request');
    		}
    		else{
    			$return_data['response_status'] = 0;
    			$return_data['response_msg'] = 'Procurement not update';
    			$return_data['return_url'] = base_url('admin/procurement/duplicate_procurement/'.$row['id']);
    		}
    		return $return_data;
	}
	public function procurement_manage(){
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
		$supplier = $this->input->post('supplier');
			$data = array(
				'name'=>$this->name,
				// 'emp_id'=>$this->emp_id,
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
				// 'approver_three'=>implode(",",(array)$approver_three),
				'featuredImage'=>$featuredImage,
				'comment'=>$this->comment,
				'price'=>$this->price,
				'supplier'=>implode(",",(array)$supplier),
				'qutation'=>$this->qutation,
				'add_approver'=>$this->add_approver,
				// 'final_approver'=>$this->final_approver,
		);
		$this->db->where('id',$this->id);
		$res = $this->db->update('procurement_tbl',$data);
		if($res > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Procurement has been update';
			$return_data['return_url'] = base_url('admin/all_request');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Procurement not update';
			$return_data['return_url'] = base_url('admin/procurement/manage_procurement/'.$row['id']);
		}
		return $return_data;
	    
	}
	public function emp_type(){
		$row = $this->db->get('emp_type')->result_array();
    	return $row;
	}
	public function project(){
		$this->db->where('emp_type','3');
		$this->db->order_by('name','ASC');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function get_project_manager(){
		$this->db->where('project_manager');
		$row = $this->db->get('emp_tbl')->result_array();
    	return $row;
	}
	public function add_project(){
		$emp_name = $this->input->post('emp_name');
		$data = array(
			'task_name' => $this->task_name,
			'address_1' => $this->address_1,
			'address_2'=>$this->address_2,
			'address_3'=>$this->address_3,	
// 			'emp_name' => implode(",",(array)$emp_name),
		);
		$this->db->insert('project',$data);
		$id = $this->db->insert_id();
		
		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Assets has been add';
			$return_data['return_url'] = base_url('admin/project');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Assets not add';
			$return_data['return_url'] = base_url('admin/add-project');
		}
		return $return_data;
	}
	public function get_project(){
		$row = $this->db->get('project')->result_array();
    	return $row;
	}
	public function task(){
	    $this->db->where('task','0');
		$row = $this->db->get('project')->result_array();
    	return $row;
	}
	public function get_project_by_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('project')->row_array();
    	return $row;
	}
	public function edit_project(){
		$row = $this->get_project_by_id($this->id);
		$emp_name = $this->input->post('emp_name');
		$data = array(
			'task_name' => $this->task_name,
			'address_1' => $this->address_1,
			'address_2'=>$this->address_2,
			'address_3'=>$this->address_3,
// 			'emp_name' => implode(",",(array)$emp_name),
		);
		$this->db->where('id',$this->id);
		$id = $this->db->update('project',$data);
		if($id > 0){
			$return_data['response_status'] = 1;
			// $return_data['response_msg'] = 'Assets has been update';
			$return_data['return_url'] = base_url('admin/project');
		}
		else{
			$return_data['response_status'] = 0;
			// $return_data['response_msg'] = 'Assets not update';
			$return_data['return_url'] = base_url('admin/project/edit_project/'.$row['id']);
		}
		return $return_data;
	}
	public function get_from_date(){
	    $this->db->select('*');
		$this->db->from('leave_manage_tbl');
		$this->db->join('emp_tbl','emp_tbl.id = leave_manage_tbl.name');
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	public function add_budget(){
		$str = random_string(5);
			$name = 'budget-'.$str;
			$config['upload_path'] = './assets/backend/dist/img/';
			$config['allowed_types'] = 'jpg|png|jpeg|doc|docx|ppt|pptx|pdf|zip|rar';
			$config['max_size'] = 10000;			
			$config['file_name'] = $name;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('template')){
				$template =  $this->upload->data('file_name');
			}
			$data = array(
			    'date'=>date('Y-m-d'),
				'task' => $this->task,
				'category' => $this->category,
				'sub_category' => $this->sub_category,
				'amount' => $this->amount,
				'upload_by' => $this->upload_by,
				'template'=>$template,
			);
			$this->db->insert('budget_tbl',$data);
			$id = $this->db->insert_id();
			
			if($id > 0){
				$return_data['response_status'] = 1;
				$return_data['return_url'] = base_url('admin/budget');
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['return_url'] = base_url('admin/add_budget');
			}
		return $return_data;
	}
	public function get_budget(){
		$this->db->select('budget_tbl.*,project.task_name as task,project.id as task_id,emp_tbl.name as uploader_user,emp_tbl.email as uploader_email');
		$this->db->select_max('budget_tbl.total_amount' , 'max_total_amount');
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
	public function budget(){
	    	$this->db->select('budget_tbl.*');
	    	$this->db->from('budget_tbl');
	    	$this->db->group_by('budget_tbl.category'); 
	    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function budget_item(){
	    	$this->db->select('budget_tbl.*');
	    	$this->db->from('budget_tbl');
	    	$this->db->where('free_text != ','');
	        $this->db->group_by('free_text');
	    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function save_comment(){
	    $comment = $this->input->post('comment');
	    $data = array('comment'=>implode(",",(array)$comment));
	    $this->db->where('task',$this->task_id);
	    $this->db->update('budget_tbl',$data);
	    $return_data['return_url'] = base_url('admin/budget');
	    return $return_data;
	}
	public function getbudget(){
	    $this->db->select('budget_tbl.category,budget_tbl.sub_category,budget_tbl.free_text,budget_tbl.amount,project.task_name as task,project.id as task_id');
		$this->db->from('budget_tbl');
// 		$this->db->where('task','project.id');
		$this->db->join('project','project.id = budget_tbl.task');
// 		$this->db->where('budget_tbl.task',1);
		$this->db->order_by('budget_tbl.id','DESC');
		$this->db->group_by('budget_tbl.task'); 
// 		$this->db->limit('1');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function getbudget_byid($id){
	    $this->db->select('budget_tbl.*,project.task_name as task,budget_tbl.category,budget_tbl.sub_category,budget_tbl.item,budget_tbl.amount');
		$this->db->from('budget_tbl');
		$this->db->where('budget_tbl.task',$id);
		$this->db->join('project','project.id = budget_tbl.task');
		$this->db->order_by('budget_tbl.id','ASC');
    	$row = $this->db->get()->result_array();
    	return $row;
    	
	}
	public function get_budget_by_id($id){
        $this->db->select("budget_tbl.*,project.task_name as task_name,project.id as task_id");
		$this->db->from('budget_tbl');
		$this->db->where('budget_tbl.task',$id);
		$this->db->where('budget_tbl.amount >', '0');
		$this->db->join('project','project.id = budget_tbl.task');
		$this->db->order_by('budget_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
    }
	public function add_vacation($email){
		$data = array(
			'vacation' => '1'
		);
		   $this->db->set($data);
		   $this->db->where('email', $email);
		   $this->db->update('emp_tbl',$data);
	}
	public function insert_csv($data = array()){
	    if(!empty($data)){
            $insert = $this->db->insert('budget_tbl', $data);
            return $insert?$this->db->insert_id():false;
        }
        return false;
	}
	public function get_leavedetail_by_id($id){
	    $this->db->select('leave_manage_tbl.*,emp_tbl.name as emp_name,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl');
		$this->db->join('emp_tbl','emp_tbl.id = leave_manage_tbl.replacement','left');
		$this->db->where('leave_manage_tbl.id',$id);
    	$row = $this->db->get()->row_array();
    	return $row;
	}
	public function get_approver($id){
	    $row = $this->get_leavedetail_by_id($id);
	    $email_requester = $this->get_employee_by_id($row['name'])['email'];
	    $email = $this->get_employee_by_id($row['approver_two'])['email'];
	    $approver_two = $this->get_employee_by_id($row['approver_two'])['name'];
	    $requester = $this->get_employee_by_id($row['name'])['name'];
        $data = array(
            'status_1' => 'Approve',
            'approve_date' =>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('leave_manage_tbl');
		if($res > 0){
	        $emailcontent2['approver_two'] = $approver_two;
	        $emailcontent2['requester'] = $requester;
	        $mailBodyContent = $this->load->view('mailTemplates/vacation_approved',$emailcontent2,true);
	        $this->cemail->do_mail("$email_requester",null,null,'Leave Request',$mailBodyContent);
	        $this->cemail->do_mail("$email",null,null,'Leave Request',$mailBodyContent);
		}
		
    	return $res;
    }
    public function get_reject($id){
        $row = $this->get_leavedetail_by_id($id);
        $data = array(
            'status_1' => 'Reject',
            'approve_date' => date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('leave_manage_tbl');
		if($res > 0){
		    $email = $this->get_employee_by_id($row['name'])['email'];
	        $emailcontent['requester'] = $this->get_employee_by_id($row['name'])['name'];
	        $mailBodyContent = $this->load->view('mailTemplates/approver-reject',$emailcontent,true);
	        $this->cemail->do_mail("$email",null,null,'Leave Request ',$mailBodyContent);   
		}
    	return $res;
    }
    public function get_approve_manager($id){
	    $row = $this->get_leavedetail_by_id($id);
	    $requester_name = $this->get_employee_by_id($row['name'])['name'];
	    $approver = $this->get_employee_by_id($row['manager'])['name'];
	    $requester = $this->get_employee_by_id($row['name'])['email'];
	    $manager = $this->get_employee_by_id($row['manager'])['email'];
        $data = array(
            'status' => '1',
            'director_approval_date' => date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('leave_manage_tbl');
		if($res > 0){
	        $emailcontent2['manager'] = $approver;
	        $emailcontent2['requester'] = $requester_name;
	        $mailBodyContent2 = $this->load->view('mailTemplates/approver_manager',$emailcontent2,true);
	       // $this->cemail->do_mail("$requester",null,null,'Approver',$mailBodyContent2);
	        $this->cemail->do_mail("$manager",null,null,'Leave Request',$mailBodyContent2);
		}
		
    	return $res;
    }
    public function get_reject_manager($id){
        $row = $this->get_leavedetail_by_id($id);
        $data = array(
            'status' => '0',
            'director_approval_date' => date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('leave_manage_tbl');
		if($res > 0){
		    $email = $this->get_employee_by_id($row['name'])['email'];
	        $emailcontent['requester'] = $this->get_employee_by_id($row['name'])['name'];
	        $mailBodyContent = $this->load->view('mailTemplates/approver-reject',$emailcontent,true);
	        $this->cemail->do_mail("$email",null,null,'Leave Request ',$mailBodyContent);   
		}
    	return $res;
    }
    public function get_reject_hr($id){
        $row = $this->get_leavedetail_by_id($id);
        $data = array(
            'status_2' => '0',
             'hr_approval_date' =>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('leave_manage_tbl');
		if($res > 0){
		    $email = $this->get_employee_by_id($row['name'])['email'];;
	        $emailcontent['requester'] = $this->get_employee_by_id($row['name'])['name'];
	        $mailBodyContent = $this->load->view('mailTemplates/approver-reject',$emailcontent,true);
	        $this->cemail->do_mail("$email",null,null,'Leave Request',$mailBodyContent);   
		}
    	return $res;
    }
    public function get_approver_hr($id){
		$row = $this->get_leavedetail_by_id($id);
	    $approver = $this->get_employee_by_id($row['approver_two'])['name'];
	    $approver_two = $this->get_employee_by_id($row['approver_two'])['email'];
	    $requester = $this->get_employee_by_id($row['name'])['name'];
	    $req_email = $this->get_employee_by_id($row['name'])['email'];
        $data = array(                                                 
            'status_2' => '1',
            'hr_approval_date' =>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('leave_manage_tbl');
		if($res > 0){
	        $emailcontent2['approver'] = $approver;
	        $emailcontent2['requester'] = $requester;
	        $mailBodyContent2 = $this->load->view('mailTemplates/approver',$emailcontent2,true);
	        $this->cemail->do_mail("$approver_two",null,null,'Leave Request',$mailBodyContent2);
	       // $this->cemail->do_mail("$req_email",null,null,'Approver',$mailBodyContent2);
		}
		
    	return $res;
    }
    public function get_approve_leave(){
        $id=$_SESSION['id'];
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('approver_two',$id);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_approve_hr_leave(){
        $id=$_SESSION['id'];
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.manager',$id);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_approve_leave_by_approver($id){
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
        $this->db->where('l.approver',$id);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_director_approve_leave($id){
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.approver_two',$id);
		$this->db->where('l.status_2','1');
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		$this->db->order_by('l.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_manager_approve_leave($id){
    	$this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.manager',$id);
		$this->db->where('l.status','1');
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
	public function get_employee_by_advisor(){
	    $this->db->where('emp_type','2');
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
	public function get_emp_name(){
        $this->db->select('*');
		$this->db->from('emp_tbl');
		$this->db->join('emp_type','emp_type.id = emp_tbl.emp_type','inner');
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function add_supply(){
	    $data = array(
				'v_name' => $this->v_name,
				'tin' => $this->tin,
				't_group' => $this->t_group,
				'type' => $this->type
			);

			$this->db->insert('supply_tbl',$data);
			$id = $this->db->insert_id();
			
			if($id > 0){
				$return_data['response_status'] = 1;
				$return_data['return_url'] = base_url('admin/supply');
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['return_url'] = base_url('admin/add_supply');
			}
		return $return_data;
	}
	public function get_supply(){
		$row = $this->db->get('supply_tbl')->result_array();
    	return $row;
	}
	public function get_supply_by_id($id){
	    $this->db->where('id',$id);
    	$row = $this->db->get('supply_tbl')->row_array();
    	return $row;
	}
	public function	edit_supply(){
	    $row = $this->get_supply_by_id($this->id);
		$data = array(
			'v_name' => $this->v_name,
			'tin' => $this->tin,
			't_group' => $this->t_group,
			'type' => $this->type
		);
		$this->db->where('id',$this->id);
		$id = $this->db->update('supply_tbl',$data);
		if($id > 0){
			$return_data['response_status'] = 1;
			$return_data['return_url'] = base_url('admin/supply');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['return_url'] = base_url('admin/edit_supply/'.$row['id']);
		}
		return $return_data;
	}
	public function get_vendor(){
	    $query = $this->db->get('supply_tbl')->result_array();
		return $query;
	}
	public function get_hr_leave(){
	    $email = $_SESSION['email'];
	     $this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl as l');
		$this->db->where('l.email',$email);
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
// 		$this->db->order_by('leave_manage_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
    public function get_hr_assets(){
        $email = $_SESSION['email'];
    	$this->db->select('a.*,emp_tbl.name as c_owner');
		$this->db->from('assets_tbl as a');
		$this->db->where('a.email',$email);
		$this->db->where('c_owner',$_SESSION['id']);
		$this->db->join('emp_tbl','emp_tbl.id = a.c_owner','left');
		$this->db->order_by('a.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_approver_budget($id){
	    $row = $this->get_budget_by_main_id($id);
	    $name = $this->get_employee_by_id($row['upload_by'])['name'];
	    $email = $this->get_employee_by_id($row['upload_by'])['email'];
	  
        $data = array(
            'status' => "1",
            'approve_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('budget_tbl');
		if($res > 0){
		    $emailcontent['requester'] = $name;
            $mailBodyContent = $this->load->view('mailTemplates/budget-approve',$emailcontent,true);
            $res = $this->cemail->do_mail("$email",null,null,'Budget',$mailBodyContent);
		}
    	return $res;
    }
    public function get_reject_budget($id){
        $row = $this->get_budget_by_main_id($id);
	    $name = $this->get_employee_by_id($row['upload_by'])['name'];
	    $email = $this->get_employee_by_id($row['upload_by'])['email'];
	    
        $data = array(
            'status' => '0',
            'approve_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('budget_tbl');
		if($res > 0){
		    $emailcontent['requester'] = $name;
            $mailBodyContent = $this->load->view('mailTemplates/budget-reject',$emailcontent,true);
            $res = $this->cemail->do_mail("$email",null,null,'Budget',$mailBodyContent);
		}
    	return $res;
    }
    public function get_budget_by_main_id($id){
		$this->db->where('id',$id);
    	$row = $this->db->get('budget_tbl')->row_array();
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
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        $data = array(
            'received' => '0',
            'received_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function get_emp(){
    	$this->db->select('e.*,emp_type.emp_type as emp_type');
		$this->db->from('emp_tbl as e');
		$this->db->where('e.emp_type','1');
		$this->db->join('emp_type','emp_type.id = e.emp_type');
		$this->db->order_by('e.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_advisor_request(){
    	$this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->where('direct_manager',$_SESSION['id']);
		$this->db->or_where('add_approver',$_SESSION['id']);
		$this->db->join('project','project.id = procurement_tbl.task');
		$this->db->order_by('procurement_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_procurement_manager_request(){
	    $this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->where('status',1);
		$this->db->where('procurement_manager',$_SESSION['id']);
		$this->db->or_where('add_approver',$_SESSION['id']);
		$this->db->join('project','project.id = procurement_tbl.task');
		$this->db->order_by('procurement_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_procurement_request(){
    	$this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->where('status_1',1);
		$this->db->where('director',$_SESSION['id']);
		$this->db->or_where('add_approver',$_SESSION['id']);
		$this->db->join('project','project.id = procurement_tbl.task');
		$this->db->order_by('procurement_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_procurementrequest(){
    	$this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->where('direct_manager',$_SESSION['id']);
		$this->db->or_where('add_approver',$_SESSION['id']);
		$this->db->join('project','project.id = procurement_tbl.task');
		$this->db->order_by('procurement_tbl.id','DESC');
    	$row = $this->db->get()->result_array();
    	return $row;
	}
	public function advisor_request_approve($id){
        $data = array(
            'status_2' => "1",
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function advisor_request_reject($id){
        $data = array(
            'status_2' => '0',
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function procurement_manager_request_approve($id){
        $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];

        $emailcontent['procurement_manager'] = $this->get_employee_by_id($row['procurement_manager'])['name'];
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-approve',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'ProcuremenProcurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'ProcuremenProcurement',$mailBodyContent);

        $data = array(
            'status_3' => "1",
            'procurement_manager_approve_date' => date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function procurement_manager_request_reject($id){
        $data = array(
            'status_3' => '0',
            'procurement_manager_approve_date' => date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function is_email_available($email)  {  
           $this->db->where('email', $email);  
           $query = $this->db->get("emp_tbl");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
    }
    public function get_task_name(){
		$row = $this->db->get('project')->result_array();
    	return $row;
    }
    public function get_user_by_email($email){
		$this->db->where('email',$email);
		return $this->db->get('emp_tbl')->row_array();
	}
	public function approve_procurement($id){
	    $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];
        $directorEmail = $this->get_employee_by_id($row['director'])['email'];

        $emailcontent['director'] = $this->get_employee_by_id($row['director'])['name'];
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-director-approve',$emailcontent,true);
        $this->cemail->do_mail("$directorEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status' => "1",
            'director_approve_date' =>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function director_second_approve($id){
	    $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];
        $directorEmail = $this->get_employee_by_id($row['director'])['email'];

        $emailcontent['director'] = $this->get_employee_by_id($row['director'])['name'];
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-director-approve',$emailcontent,true);
        $this->cemail->do_mail("$directorEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'director_status_second_1' => "1",
            'direct_second_approve_date' =>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function reject_procurement($id){
        $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];

        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status' => '0',
            'director_approve_date' =>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function director_second_reject(){
        $row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];

        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'director_status_second_1' => '0',
            'direct_second_approve_date' =>date('Y-m-d'),
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function approveprocurement($id){
        
    	$row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];
        
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $emailcontent['procurement_manager'] = $this->get_employee_by_id($row['procurement_manager'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-approve',$emailcontent,true);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_1' => "1",
            'direct_manager_approve_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function approveprocurementsecond($id){
        
    	$row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];
        
        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $emailcontent['procurement_manager'] = $this->get_employee_by_id($row['procurement_manager'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-approve',$emailcontent,true);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_second_1' => "1",
            'direct_manager_second_approve_date	'=>date('Y-m-d'),
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
    public function rejectprocurement($id){
       
    	$row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];

        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_1' => "0",
            'direct_manager_approve_date'=>date('Y-m-d'),
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function rejectprocurementsecond($id){
       
    	$row = $this->get_procurement($id);
        $requesterEmail = $this->get_employee_by_id($row['name'])['email'];
        $procurementEmail = $this->get_employee_by_id($row['procurement_manager'])['email'];

        $emailcontent['requester'] = get_emp_by_id($row['name'])['name'];
        $mailBodyContent = $this->load->view('mailTemplates/procurement-reject',$emailcontent,true);
        $this->cemail->do_mail("$requesterEmail",null,null,'Procurement',$mailBodyContent);
        $this->cemail->do_mail("$procurementEmail",null,null,'Procurement',$mailBodyContent);
        
        $data = array(
            'status_second_1' => "0",
            'direct_manager_second_approve_date	'=>date('Y-m-d'),
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
    public function complete_request($id){
        $data = array(
            'complete' => "completed",
        );
         $this->db->set($data);
        $this->db->where('id',$id);
		$row = $this->db->update('procurement_tbl');
    	return $row;
    }
    public function download_leave_csv(){
        $this->db->select('l.*');
		$this->db->from('leave_manage_tbl as l');
        $this->db->where('date >=',$this->start_date);
        $this->db->where('date <=',$this->end_date);
        $row = $this->db->get()->result_array();
        $filename = date('d-m-Y').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
 
        // file creation
        $file = fopen('php://output', 'w');
 
        $header = array("id","Full name","Leave Type","Start Date","End Date","Back to Work","days","Remaining leave","Replacement","Direct Manager","Direct Manager Approval Status","Direct Manager Approval Date","HR Manager","HR Manager Approval Status","HR Manager Approval Date","Director","Director Approval Status","Director Approval Date","Comment","Date");
        fputcsv($file, $header);
        $i = 1;
        foreach ($row as $fields){
            if($fields['status_1'] == 'Approve'){
                $approved = 'Approved';
            }
            else if($fields['status_1'] == 'Reject'){
                $approved = 'Rejected';
            }
            else {
                $approved = '';
            }
            if($fields['status_2'] == 1){
                $hr = 'Approved';
            }
            else if($fields['status_2'] == 0){
                $hr = 'Rejected';
            }
            else {
                $hr = '';
            }
            if($fields['status'] == 1){
                $direct_manager = 'Approved';
            }
            else if($fields['status'] == 0){
                $direct_manager = 'Rejected';
            }
            else {
                $direct_manager = '';
            }
            fputcsv($file, array($i++,get_emp_by_id($fields['name'])['name'].get_emp_by_id($fields['name'])['surname'],$fields['leave_type'],$fields['from'],$fields['leave_to'],$fields['back_to'],$fields['days'],$fields['remaining_leave'],get_emp_by_id($fields['replacement'])['name'].get_emp_by_id($fields['replacement'])['surname'],get_emp_by_id($fields['approver'])['name'].get_emp_by_id($fields['approver'])['surname'],$direct_manager,$fields['director_approval_date'],get_emp_by_id($fields['manager'])['name'].get_emp_by_id($fields['manager'])['surname'],$hr,$fields['hr_approval_date'],get_emp_by_id($fields['approver_two'])['name'].get_emp_by_id($fields['approver_two'])['surname'],$approved,$fields['approve_date'],$fields['comment'],$fields['date']));
        }
 
        fclose($file);
        exit;
    }
    public function get_assets_by_filter(){
		$this->db->select('a.*,e.name as name');
		$this->db->from('assets_tbl as a');
		$this->db->join('emp_tbl as e','e.id = a.c_owner');
		if($this->asset_type != ''){
	        $this->db->where('a.asset_type',$this->asset_type);
	    }
	    
	    else if($this->c_owner != ''){
	        $this->db->where('a.c_owner',$this->c_owner);
	    }
	    else if($this->assign_date != ''){
	        $this->db->where('a.assign_date',$this->assign_date);
	    }
	    $row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_leave_by_filter(){
	    $this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl as l');
		
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
		if($this->name != ''){
	        $this->db->where('l.name',$this->name);
	    }
	    else if($this->leave_type != ''){
	        $this->db->where('l.leave_type',$this->leave_type);
	    }
	    else if($this->replacement != ''){
	        $this->db->where('l.replacement',$this->replacement);
	    }
	    else if($this->start_date != '' && $this->end_date != ''){
	        $this->db->where('l.from >=',$this->start_date);
	        $this->db->where('l.leave_to <=',$this->end_date);
	    }
	    $this->db->group_by('l.name');
	    $row = $this->db->get()->result_array();
    	return $row;
	}
	public function get_all_request_filter(){
    	$this->db->select('procurement_tbl.*,project.task_name as task');
		$this->db->from('procurement_tbl');
		$this->db->join('project','project.id = procurement_tbl.task');
		if($this->task != ''){
	        $this->db->where('procurement_tbl.task',$this->task);
	    }
	    else if($this->name != ''){
	        $this->db->where('procurement_tbl.name',$this->name);
	    }
	    else if($this->b_category != ''){
	        $this->db->where('procurement_tbl.b_category',$this->b_category);
	    }
	    else if($this->supplier != ''){
	        $this->db->where('procurement_tbl.supplier',$this->supplier);
	    }
	    $row = $this->db->get()->result_array();
    	return $row;
	}
    public function get_leave_type(){
	    $this->db->select('l.*,emp_tbl.name as emp_name,emp_tbl.surname as emp_surname,emp_tbl.email as emp_email');
		$this->db->from('leave_manage_tbl as l');
		$this->db->group_by('l.leave_type');
		$this->db->join('emp_tbl','emp_tbl.id = l.replacement');
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
	public function get_item($task){
    	$this->db->where('task',$task);
		$query = $this->db->get('procurement_tbl')->row_array();
		$id = $query['task'];
		
		$this->db->where('task',$task );
		$this->db->where('free_text !=','');
	    $this->db->group_by('free_text');
		$row = $this->db->get('budget_tbl')->result_array();
		foreach($row as $b_item){
	        $output = '<option value="'.$b_item['free_text'].'">'.$b_item['free_text'] .'</option> ';
		}
		return $output;
	}

	public function fetch_category($b_category){
		$this->db->where('category',$b_category);
		$this->db->group_by('budget_tbl.category');
		$query = $this->db->get('budget_tbl')->row_array();
		$category = $query['category'];
		$this->db->where('category',$category );
		$row = $this->db->get('budget_tbl')->result_array();
		    foreach ($row->result_array() as $sub){
		        $output = '<option value="'.$sub['sub_category'].'">'.$sub['sub_category'] .'</option>';
    		}
		return $output;
	}
	public function fetch_approver($direct_manager,$approver_two,$approver_three){
	    $this->db->select('id,name,surname');
	    $this->db->where('id !=',$direct_manager);
	    $this->db->where('id !=',$approver_two);
	    $this->db->where('id !=',$approver_three);
	    $row = $this->db->get('emp_tbl')->result();
	     echo json_encode($row);
	    
	}
	public function get_budget_filter(){
	   $this->db->select('budget_tbl.*,project.task_name as task,project.id as task_id,emp_tbl.name as uploader_user,emp_tbl.email as uploader_email');
		$this->db->select_max('budget_tbl.total_amount' , 'max_total_amount');
		$this->db->from('budget_tbl');
		$this->db->join('project','project.id = budget_tbl.task');
		$this->db->join('emp_tbl','emp_tbl.id = budget_tbl.upload_by','left');
		$this->db->order_by('budget_tbl.id','DESC');
		$this->db->group_by('budget_tbl.task'); 
		if($this->task != ''){
	        $this->db->where('task_name',$this->task);
	    }
	    $row = $this->db->get()->result_array();
	    
    	return $row;
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
	public function add_comment(){
	    	
	    	$data = array(
	    	    'date'=>date('Y-m-d H:i:s'),
	    	    'comment'=>$this->comment,
	    	);
	    	$this->db->insert('erp_tbl',$data);
			$id = $this->db->insert_id();
			if($id > 0){
				$return_data['response_status'] = 1;     
				$return_data['return_url'] = base_url('admin');
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['return_url'] = base_url('admin/add_comment');
			}
    	return $return_data;
	}
	public function comment(){
	    $this->db->order_by('id',"DESC");
	    $row = $this->db->get('erp_tbl')->result_array();
	    return $row;
	}
	public function get_direct_manager(){
    	$this->db->select('*');
		$this->db->from('emp_tbl');
		$this->db->where('emp_type !=','4');
		$this->db->where('emp_type !=','5');
		$this->db->order_by('name','ASC');
    	$row = $this->db->get()->result_array();
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
	public function get_task($id){
	     $data = array(                                                 
            'task' => '1',
        );
        $this->db->set($data);
        $this->db->where('id',$id);
		$res = $this->db->update('project');
	}
	public function vacation_save(){
	    $data = array(
			'name' => $this->name,
			'v_leave'=>$this->v_leave
		);
		$name = $data['name'];
		$this->db->select('v_leave');
		$this->db->where('name',$name);
		$query = $this->db->get('vacation')->row_array();
		$qty = $query['v_leave'] + $data['v_leave'];
		if($query > 0){
		    $data1 = array(
    			'v_leave'=>$qty
    		);
    		$this->db->where('name',$name);
    		$query1 = $this->db->update('vacation',$data1);
    		if($query1 > 0){
    			$return_data['response_status'] = 1;
    			$return_data['response_msg'] = 'vacation has been add';
    			$return_data['return_url'] = base_url('admin/numberd_vacation');
    		}
    		else{
    			$return_data['response_status'] = 0;
    			$return_data['response_msg'] = 'vacation not add';
    			$return_data['return_url'] = base_url('admin/vacation_form');
    		}
		}
		else{
    		$this->db->insert('vacation',$data);
    		$id = $this->db->insert_id();
    		
    		if($id > 0){
    			$return_data['response_status'] = 1;
    			$return_data['response_msg'] = 'vacation has been add';
    			$return_data['return_url'] = base_url('admin/numberd_vacation');
    		}
    		else{
    			$return_data['response_status'] = 0;
    			$return_data['response_msg'] = 'vacation not add';
    			$return_data['return_url'] = base_url('admin/vacation_form');
    		}
		}
		return $return_data;
	}
	public function get_leave_no_of_vacation(){
	    $this->db->select('*');
	    $this->db->group_by('name');
	    $this->db->select_sum('v_leave');
		$this->db->from('vacation');
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function get_additional_approver($id){
	    $this->db->where('id',$id);
	    $row = $this->db->get('procurement_tbl')->row_array();
	    $direct_manager = $row['direct_manager'];
	    $procurement_manager = $row['procurement_manager'];
	    $director = $row['director'];
	    $this->db->where('id !=',$direct_manager);
	    $this->db->where('id !=',$procurement_manager);
	    $this->db->where('id !=',$director);
	    $row1 = $this->db->get('emp_tbl')->result_array();
	    return $row1;
	}
}
