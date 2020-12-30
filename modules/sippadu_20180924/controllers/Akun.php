<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_akun','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		//$config['tag_open'] = '<div class="page-bar"><ul class="page-breadcrumb">';
		//$config['tag_close'] = '</ul></div>';
		//$config['li_open'] = '<li>';
		//$config['li_close'] = '</li>';
		//$config['divider'] = '';
		//$this->breadcrumb->initialize($config);
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(5,$DataAkses);
		
		$user = $this->session->userdata('userid');
		if($this->input->post('submit')){
			$a = $this->mod_akun->update_profil($user);
		}
		
		$d['title'] = $title = 'Ubah Profil';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'akun';
		$d['menuactive'] = 'akun';
		$d['data'] = $this->mod_akun->get_data_users($user);
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('akun/akun',$d);
	}
	
	public function password($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(5,$DataAkses);
		
		$user = $this->session->userdata('userid');
		if($this->input->post('submit')){
			$a = $this->mod_akun->update_password($user);
		}
		
		$d['title'] = $title = 'Ganti Password';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'akun';
		$d['menuactive'] = 'akun_password';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('akun/akun_password',$d);
	}
}