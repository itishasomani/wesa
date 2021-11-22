<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangSwitch extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		check_login_admin();
		check_login_employee();
	}

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }
}


?>