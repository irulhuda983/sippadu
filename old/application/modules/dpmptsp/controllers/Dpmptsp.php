<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dpmptsp extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_dpmptsp'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','dpmptsp','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Beranda';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'beranda';
		$d['menuactive'] = 'beranda';
		
		$d['data_berita'] = $this->mod_all->data_berita(4);
		
		$this->breadcrumb->append_crumb('Dashboard', '/');
		$this->load->view('home',$d);
		
	}
	
	public function tracking()
	{
		/* $d = $this->mod_all->load();
		$d['title'] = $title = 'Beranda';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'beranda';
		$d['menuactive'] = 'beranda';*/
		$register = $this->input->post('register');
		$kitas = $this->input->post('kitas');
		$d['data'] = $this->mod_dpmptsp->data_tracking($register,$kitas);
		
		$this->breadcrumb->append_crumb('Dashboard', '/'); 
		$this->load->view('tracking',$d);
		
	}
	
	
}