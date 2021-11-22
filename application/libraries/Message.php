<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message {

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function set_message($msg, $status) {
        $this->CI->session->set_userdata('s_msg', $msg);
        $this->CI->session->set_userdata('s_status', $status);
    }

    public function get_message() {
        $msg = '';
        $msgHtml = '';
        if (
            
            isset($this->CI->session->userdata['s_msg']) && trim($this->CI->session->userdata['s_msg']) <> "" &&
            isset($this->CI->session->userdata['s_status']) && trim($this->CI->session->userdata['s_status']) <> "") {

            $msg = $this->CI->session->userdata['s_msg'];
            $status = $this->CI->session->userdata['s_status'];

            $this->CI->session->unset_userdata('s_msg');
            $this->CI->session->unset_userdata('s_status');

            if ($status == 1){
                $msgHtml = '<div class="alert alert-success hide_msg pull">';
                $msgHtml.= '<i class="fa fa-thumbs-up mr-3"></i><strong class="mr-2">Well done!</strong>' .$msg;
                $msgHtml.='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                $msgHtml.= '</div>';
            }
            else{
                $msgHtml = '<div class="alert alert-danger hide_msg pull">';
                $msgHtml.= '<i class="fa fa-remove mr-3"></i><strong class="mr-2">Oh snap!</strong>' .$msg;
                $msgHtml.='<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
                $msgHtml.= '</div>';
            }
       
        }
        return($msgHtml);
    }


    public function admin_get_message() {
        $msg = '';
        $msgHtml = '';
        if (
                isset($this->CI->session->userdata['s_msg']) && trim($this->CI->session->userdata['s_msg']) <> "" &&
                isset($this->CI->session->userdata['s_status']) && trim($this->CI->session->userdata['s_status']) <> "") {
            $msg = $this->CI->session->userdata['s_msg'];
            $status = $this->CI->session->userdata['s_status'];

            $this->CI->session->unset_userdata('s_msg');
            $this->CI->session->unset_userdata('s_status');

            if ($status == 1)
                $class = "alert-success";
            else
                $class = "alert-danger";

            $msgHtml = '<div class="alert alert-dismissible text-center ' . $class . '"  role="alert">';
            $msgHtml.='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $msgHtml.= $msg;
            $msgHtml.= '</div>';
            
        }
        return($msgHtml);
    }


}

/* End of file Message.php */