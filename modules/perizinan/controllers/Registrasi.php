<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_registrasi','mod_personal'));
		$this->load->library(array('auth','breadcrumb','session','form_validation','encryption','email'));
		$this->load->helper(array('url','apps','query','sippadu','date','captcha'));
		$this->auth->loginpage(fmodule());
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		
		if($this->input->post('submit')){
			$this->mod_registrasi->send_email_registrasi();
		}
		
		$d['title'] = $title = lang('Registrasi');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'registrasi';
		$d['menuactive'] = 'registrasi';
		$d['step1'] = true;
		
		$vals = array(
			'img_path'      => './assets/'.config('theme').'/captcha/',
			'img_url'       => base_url('assets/'.config('theme').'/captcha/'),
			'font_path'     => './assets/'.config('theme').'/fonts/pl.ttf',
			'img_width'     => '200',
			'img_height'    => 50,
			'expiration'    => 7200,
			'word_length'   => 6,
			'font_size'     => 20,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyz',

			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(153, 153, 153),
					'grid' => array(255, 255, 255)
			)
		);

		$cap = create_captcha($vals);
		$this->mod_registrasi->insert_captcha($cap['word'],$cap['time']);
		$d['captcha'] = $cap['image'];
		
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('registrasi/registrasi',$d);
	}
	
	public function confirm($code=''){
		$this->mod_registrasi->insert_registrasi($code);
	}
	
	public function success()
	{
		if(alert() != ''){
			$d = $this->mod_all->load();
					
			$d['title'] = $title = lang('Registrasi Sukses');
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'home';
			$d['menuactive'] = 'home';
			$d['step1'] = true;
			
			$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
			$this->breadcrumb->append_crumb($title);
			$this->load->view('registrasi/registrasi_success',$d);
		}
		else{
			set_alert('error','Halaman yang anda cari tidak tersedia');
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