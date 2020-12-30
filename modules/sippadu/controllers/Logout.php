<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all'));
		$this->load->library(array('auth','session'));
		$this->load->helper(array('url','date','apps','query'));
		//load_cache();
	}	
	
	public function index($uri=0)
	{
		//$this->session->unset_userdata('logged_in');
		//$this->session->unset_userdata('userfullname');
		//$this->session->unset_userdata('username');
		//$this->session->unset_userdata('userid');
		
		
		//$this->session->unset_userdata('usergroupid');
		//$this->session->unset_userdata('usergroupname');
		//$this->session->unset_userdata('userlevelid');
		//$this->session->unset_userdata('userlevelclass');
		//$this->session->unset_userdata('userlevelname');
		//$this->session->unset_userdata('userlevel');
		$this->session->sess_destroy();
		set_alert('success','Anda telah berhasil logout');
		redirect(fmodule('login'));
		//redirect();
	}
	
}