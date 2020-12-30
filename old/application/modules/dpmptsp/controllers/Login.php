<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_login'));
		$this->load->library(array('auth','session','form_validation'));
		$this->load->helper(array('url','apps','date'));
		$this->auth->loginpage(fmodule());
	}	
	
	public function index()
	{
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
					set_alert('success','Hai, '.strtolower($this->session->userdata('userfullname')).'. Anda berhasil login, Selamat datang di halaman dashboard '.site_title().'!');
					redirect(fmodule('dashboard'));
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
	}
	
	public function main()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('op_ta','Tahun Anggaran','is_natural_no_zero');
			
			if($this->form_validation->run() == TRUE){
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$get = $this->auth->do_login($data);
				
				if($get){
					$ta = $this->input->post('op_ta');
					//$Id_Ta = str_replace('simda',$ta);
					$this->mod_login->set_session_name($ta);
					$this->session->set_userdata('sess_db','simda'.$ta);
					set_alert('success','Hai, '.strtolower($this->session->userdata('userfullname')).'. Anda berhasil login, Selamat datang di halaman dashboard '.site_title().'!');
					redirect(fmodule());
				}
				else{
					set_alert('error','Anda gagal login, silakan ulangi!');
					redirect(fmodule('login/maintenance'));
				}
			}
		}
		$ta = $this->session->userdata('sess_db');
		
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Login';
		$d['site_title'] = site_title($title);
		$d['op_ta'] = $this->mod_login->op_ta_maintenance();
		$d['slc_op_ta'] = $ta;
		$this->load->view('login',$d);
	}
}