<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('common_model');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function do_login(){
        $this->login_model->email = $this->input->post('email');
        $this->login_model->password = $this->input->post('password');;
        $return_data = $this->login_model->login_process();
        redirect($return_data['return_url']);
    }
    
    function logout(){
        $userdata = array('id'=>'','name'=>'','email'=>'','role'=>'','admin_login'=>'');
        $this->session->set_userdata($userdata);
        // $this->message->set_message('Logout Successfully',1);
        redirect(base_url());
    }
    
    function forget_password(){
        $this->load->view('forget_password');
    }
    
    public function reset_password(){
		$email = $this->input->get_post('email');
		$return_data = $this->common_model->get_user_by_email($email);

		if($return_data > 0){			
			$emailcontent['link'] = base_url('reset-password?token=').$return_data['token'];
			$mailBodyContent = $this->load->view('mailTemplates/lostPassword',$emailcontent,true);
			$this->cemail->do_mail($return_data['email'],null,null,'Reset Password',$mailBodyContent);
			$return_data['response_status'] = 1;
			$return_data['response_msg'] = 'Password reset link has been sent your email';
			$return_data['return_url'] = base_url('login');
		}
		else{
			$return_data['response_status'] = 0;
			$return_data['response_msg'] = 'This Email is not register';
			$return_data['return_url'] = base_url('login/forget_password');
		}
		$this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
	}
	
	public function reset_password_view(){
		$data['token'] = $this->input->get_post('token');
		$this->load->view('reset-password',$data);
	}
	
	public function password_reset(){
		$this->login_model->token = $this->input->get_post('token');
		$this->login_model->password = $this->input->get_post('password');
		$return_data =  $this->login_model->reset_password();
		$this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
	}
}

/* End of file Login.php */
/* Location: application/controllers/Login.php */