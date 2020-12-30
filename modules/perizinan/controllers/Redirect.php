<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redirect extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
	}	
	
	public function index($class='',$nokitas='')
	{
		$this->nokitas($class,$nokitas);
	}
	
	public function daftar($class='',$nokitas=''){
		$this->session->set_userdata('sippadu_daftar_izin',$class);
		$this->session->set_userdata('sippadu_daftar_nokitas',$nokitas);
		redirect(fmodule($class));
	}
	
}