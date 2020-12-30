<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_daftar'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		
		$d['title'] = $title = lang('Daftar Izin');
		$d['site_title'] = site_title($title);
		$d['data'] = $this->mod_daftar->tabel_izin();
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'daftar';
		$d['step1'] = true;
	
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('daftar/tbl_izin',$d);
	}
	
	
}