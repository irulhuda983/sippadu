<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_sippadu','mod_all'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
		/* $config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config); */
		$this->auth->restrict(fmodule('login'));
		//load_cache();
	}	
	
	
	public function index(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Front Office';
		$d['q'] = 'fo';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'fo';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
}