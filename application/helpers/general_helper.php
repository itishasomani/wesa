<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('check_login_admin')) {
    function check_login_admin() {
        $CI = get_instance();
        if ($CI->session->userdata('admin_login') != TRUE) {
            $CI->session->sess_destroy();
            redirect(base_url('login'));
        }
    }
}
if (!function_exists('check_login_employee')) {
    function check_login_employee() {
        $CI = get_instance();
        if ($CI->session->userdata('employee_login') != TRUE) {
            $CI->session->sess_destroy();
            redirect(base_url('login'));
        }
    }
}
if (!function_exists('encrypt')){
	function encrypt($data){
		$CI =& get_instance();
		$CI->load->library('encryption');
		return $CI->encryption->encrypt($data);		
	}
}

if (!function_exists('decrypt')){
	function decrypt($data){
		$CI =& get_instance();
		$CI->load->library('encryption');
		return $CI->encryption->decrypt($data);			
	}
}

if(!function_exists('get_user_field')){
	function get_user_field($field){
		$CI =& get_instance();
		if(isset($CI->session->userdata['userid'])){
			$CI->db->where('id',$CI->session->userdata['userid']);
			$CI->db->where('role','user');
			$row = $CI->db->get('user_tbl')->row_array();
			return $row[$field];
		};
	}
}

if(!function_exists('get_emp_field_by_id')){
	function get_emp_field_by_id($id){
		$CI =& get_instance();
		if(!empty($id)){
			$CI->db->where('id',$id);
			$row = $CI->db->get('emp_tbl')->row_array();
			return $row;
		};
	}
}

if(!function_exists('get_website_field')){
	function get_website_field($field){
		$CI =& get_instance();
		$row = $CI->db->get('website_settings_tbl')->row_array();
		return $row[$field];
	}
}

if(!function_exists('get_pages_content_by_id')){
	function get_pages_content_by_id($pageid){
		$CI =& get_instance();		
		$CI->db->where('id',$pageid);
		$row = $CI->db->get('pages_tbl')->row_array();
		return $row;
	}
}

if(!function_exists('preg_space')){
	function preg_space($url){
		return str_replace(' ', '-', $url);
	}
}


if(!function_exists('get_leave')){
	function get_leave(){
		$CI =& get_instance();		
		$query = $CI->db->query('SELECT * FROM leave_manage_tbl');
  		return count($query->result());
	}
}
if(!function_exists('get_emp_leave')){
	function get_emp_leave(){
		$email = $_SESSION['email'];
		$CI =& get_instance();
		$CI->db->select('*');
 		$CI->db->from("leave_manage_tbl");		
		$CI->db->where('email',$_SESSION['email']);
		$query = $CI->db->get();

  		return count($query->result());
	}
}
if(!function_exists('get_emp_assets')){
	function get_emp_assets(){
		$email = $_SESSION['email'];
		$CI =& get_instance();
		$CI->db->select('*');
 		$CI->db->from("assets_tbl");
		$CI->db->where('email',$_SESSION['email']);
		$query = $CI->db->get();

  		return count($query->result());
	}
}
if(!function_exists('get_emp_procurement')){
	function get_emp_procurement(){
		$email = $_SESSION['email'];
		$CI =& get_instance();
		$CI->db->select('*');
 		$CI->db->from("procurement_tbl");
		$CI->db->where('email',$_SESSION['email']);
		$query = $CI->db->get();

  		return count($query->result());
	}
}
if(!function_exists('get_emp')){
	function get_emp(){
		$CI =& get_instance();		
		$query = $CI->db->query('SELECT * FROM emp_tbl');
  		return count($query->result());
	}
}

if(!function_exists('get_emp_by_id')){
	function get_emp_by_id($id){
		$CI =& get_instance();
		$CI->db->where('id',$id);
		$row = $CI->db->get('emp_tbl')->row_array();
  		return $row;
	}
}
if(!function_exists('get_supplier')){
	function get_supplier($name){
		$CI =& get_instance();
		$CI->db->where('v_name',$name);
		$row = $CI->db->get('supply_tbl')->row_array();
  		return $row;
	}
}

if(!function_exists('get_assets')){
	function get_assets(){
		$CI =& get_instance();
		$query = $CI->db->query('SELECT * FROM assets_tbl');
  		return count($query->result());
	}
}
if(!function_exists('get_procurement')){
	function get_procurement(){
		$CI =& get_instance();
		$query = $CI->db->query('SELECT * FROM procurement_tbl');
  		return count($query->result());
	}
}
if(!function_exists('get_prev_year_total_leave_by_user')){
	function get_prev_year_total_leave_by_user($user){
	    $prevYear = date('Y',strtotime('-1 year',strtotime(date('Y'))));
		$CI =& get_instance();
		$CI->db->where('userid',$user);
		$CI->db->where('year',$prevYear);
		$row = $CI->db->get('year_leave_maintante_tbl')->row_array();
		if(!empty($row)){
		    return 32 - $row['total_leave'];   
		}
		else{
		    return 0;
		}
	}
}