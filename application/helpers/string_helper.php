<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('random_string')) {
	function random_string($string_length){
		$CI =& get_instance();
		$str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		return substr(str_shuffle($str),0,$string_length);
	}
}