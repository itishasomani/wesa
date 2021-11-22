<?php
class Login_model extends CI_Model {
    public function login_process(){
        $return_data = $this->login();
        if($return_data['status'] == 1 && $return_data['email']== $this->email && $return_data['emp_type']== 4){
            $return_data['response_status'] = 1;
            $return_data['response_msg'] = 'Wellcome Admin';
            $return_data['return_url'] = base_url('admin/dashboard');
        }
        else if($return_data['status'] == 1 && $return_data['email']== $this->email && $return_data['emp_type']== 3){
            $return_data['response_status'] = 1;
            $return_data['response_msg'] = 'Wellcome Admin';
            $return_data['return_url'] = base_url('admin/dashboard');
        }
        else if($return_data['status'] == 1 && $return_data['email']== $this->email && $return_data['emp_type']== 6){
            $return_data['response_status'] = 1;
            $return_data['response_msg'] = 'Wellcome Admin';
            $return_data['return_url'] = base_url('admin/dashboard');
        }
        else if($return_data['status'] == 1 && $return_data['email']== $this->email && $return_data['emp_type']== 2){
            $return_data['response_status'] = 1;
            $return_data['response_msg'] = 'Wellcome Admin';
            $return_data['return_url'] = base_url('admin/dashboard');
        }
        else if($return_data['status'] == 1 && $return_data['email']== $this->email && $return_data['emp_type']== 5){
            $return_data['response_status'] = 1;
            $return_data['response_msg'] = 'Wellcome Admin';
            $return_data['return_url'] = base_url('admin/dashboard');
        }
        else if($return_data['status'] == 1 && $return_data['email']== $this->email && $return_data['emp_type']== 1){
            $return_data['response_status'] = 1;
            $return_data['response_msg'] = 'Wellcome '.$_SESSION['name'].'';
            $return_data['return_url'] = base_url('employee/dashboard');
        }
        else{
            $return_data['response_status'] = 0;
            $return_data['response_msg'] = 'Invalid Credentials';
            $return_data['return_url'] = base_url('login');
        }
        return $return_data;
    }

    public function login(){
        $return_data = array('status'=>0);
        $this->db->select('id,name,email,role,password,emp_type');
        $this->db->where('email',$this->email);
        $this->db->from('emp_tbl');
        $query = $this->db->get();
        $row = $query->row_array();
        $email = $row['email'];
        $role = $row['role'];
        $password =  decrypt($row['password']);
        $emp_type = $row['emp_type'];
        if(!empty($row)){
            if($password == $this->password  && $email == $row['email'] && $emp_type == '4'){
                $return_data = array('status'=>1,'emp_type' =>'4','email'=>$row['email'],'role'=>'admin');
                $this->setSession($row);
            }
            else if($password == $this->password  && $email == $row['email'] && $emp_type == '3'){
                $return_data = array('status'=>1,'emp_type' =>'3','email'=>$row['email']);
                $this->setSession($row);
            }
            else if($password == $this->password  && $email == $row['email'] && $emp_type == '6'){
                $return_data = array('status'=>1,'emp_type' =>'6','email'=>$row['email']);
                $this->setSession($row);
            }
            else if($password == $this->password  && $email == $row['email'] && $emp_type == '2'){
                $return_data = array('status'=>1,'emp_type' =>'2','email'=>$row['email']);
                $this->setSession($row);
            }
            else if($password == $this->password  && $email == $row['email'] && $emp_type == '5'){
                $return_data = array('status'=>1,'emp_type' =>'5','email'=>$row['email']);
                $this->setSession($row);
            }
            else if($password == $this->password && $email == $row['email'] && $emp_type == 1){
                $return_data = array('status'=>1,'role'=>'employee','email'=>$row['email'],'emp_type' =>1);
                $this->session($row);
            }
        }
        return $return_data;
    }
    
    public function reset_password(){
		if(!empty($this->token)){
			$return_data =  $this->get_user_by_token($this->token);
			if($return_data['status'] == 1){
				$data = array(
					'password'=> encrypt($this->password)
				);
				$this->db->where('token',$this->token);
				$res = $this->db->update('emp_tbl',$data);
				if($res > 0){
					$return_data['response_status'] = 1;
					$return_data['response_msg'] = 'Password has been reset successfully';
					$return_data['return_url'] = base_url('login');
				}
				else{
					$return_data['response_status'] = 0;
					$return_data['response_msg'] = 'Password not reset';
					$return_data['return_url'] = base_url('login');
				}
			}
			else{
				$return_data['response_status'] = 0;
				$return_data['response_msg'] = 'Something else wrong';
				$return_data['return_url'] = base_url('login/forget_password');
			}
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'Something else wrong';
			$return_data['return_url'] = base_url('login/forget_password');
		}				
		return $return_data;
	}

	public function get_user_by_token($token){
		$this->db->where('token',$token);
		$row = $this->db->get('emp_tbl')->row_array();
		if($row > 0){
			$return_data = array('status' => 1);
		}
		else{
			$return_data = array('status' => 0);
		}
		return $return_data;
	}

    public function setSession($arr){
        $userdata = array(
            'id'=>$arr['id'],
            'name'=>$arr['name'],
            'email'=>$arr['email'],
            'role'=>$arr['role'],
            'emp_type'=>$arr['emp_type'],
            'admin_login'=>TRUE,
        );
        $this->session->set_userdata($userdata);
    }
    
    public function session($arr){
        $userdata = array(
            'id'=>$arr['id'],
            'name'=>$arr['name'],
            'email'=>$arr['email'],
            'role'=>$arr['role'],
            'emp_type'=>$arr['emp_type'],
            'employee_login'=>TRUE,
        );
        $this->session->set_userdata($userdata);
    }
}