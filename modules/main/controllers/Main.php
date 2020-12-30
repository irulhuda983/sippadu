<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_main'));
		$this->load->library(array('pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
		//$this->lang->load('default','id');
	}	
		
	public function index()
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Beranda');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'beranda';
		$d['menuactive'] = 'beranda';
		//$d['data_slide_home'] = $this->mod_all->data_slide(10);
		//$d['data_berita'] = $this->mod_all->data_berita(4);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), '/');
		$this->load->view('home',$d);
		
	}
	
	
	
}