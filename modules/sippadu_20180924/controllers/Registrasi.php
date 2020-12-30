<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_registrasi','mod_personal'));
		$this->load->library(array('auth','breadcrumb','session','form_validation','encryption','email'));
		$this->load->helper(array('url','apps','query','sippadu','date'));
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		
		if($this->input->post('submit')){
			$this->mod_registrasi->send_email_registrasi();
		}
		
		$d['title'] = $title = lang('Registrasi');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'home';
		
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('public/registrasi',$d);
	}
	
	public function confirm($code=''){
		$this->mod_registrasi->insert_registrasi($code);
	}
	
	public function success()
	{
		if(alert() != ''){
			$d = $this->mod_all->load();
					
			$d['title'] = $title = lang('Registrasi');
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'home';
			$d['menuactive'] = 'home';
			
			$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
			$this->breadcrumb->append_crumb($title);
			$this->load->view('public/registrasi_success',$d);
		}
		else{
			redirect('registrasi');
		}
	}
	
	public function pemohon($code='am5pa5JmY26VYW9lYpSWY7WApJaZV7Ghp82mrKtViNKxoqiiz66eqtSqn6Sb0phoeZqilJqjlJyn0Q%3D%3D')
	{
		$d = $this->mod_all->load();
		
		$decrypt = decrypt($code);
		$key = explode('|',$decrypt);
		
		$d['title'] = $title = lang('Registrasi');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'home';
		
		$d['kitas'] = '';
		$d['name'] = '';
		$d['email'] = '';
		
		if(count($key) >= 3){
			$d['kitas'] = $key[0];
			$d['name'] = $key[1];
			$d['email'] = $key[2];
		}
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('public/registrasi_confirm',$d);
	}
	
}