<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
	}	
		
	function get($language = '') {
        $language = ($language != '') ? $language : 'id';
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER'].'/?time='.TimeNow('YmdHis'));
    }
	
	
}