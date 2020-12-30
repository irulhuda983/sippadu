<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_login'));
		$this->load->library(array('auth','breadcrumb','session','form_validation'));
		$this->load->helper(array('url','apps','date'));
	}	
	
	public function index()
	{
		redirect(apps_url(2,'login'));
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Login');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'home';
		
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('public/login',$d);
	}
	
	/* public function index()
	{
		//redirect(apps_url(2,'login'));
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			
			if($this->form_validation->run() == TRUE){
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$get = $this->auth->do_login($data);
				
				if($get){
					set_alert('success','Hai, '.$this->session->userdata('userfullname').'. Anda berhasil login, Selamat datang di halaman dashboard '.site_title().'!');
					redirect(fmodule());
				}
				else{
					set_alert('error','Anda gagal login, silakan ulangi!');
					redirect(fmodule('login'));
				}
			}
		}
		$ta = $this->session->userdata('sess_db');
		
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Login';
		$d['site_title'] = site_title($title);
		//$d['op_ta'] = $this->mod_login->op_ta();
		//$d['slc_op_ta'] = $ta;
		$this->load->view('login',$d);
	} */
	
	
}