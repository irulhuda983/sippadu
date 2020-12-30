<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_login'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation','email'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','captcha'));
		$this->auth->loginpage(fmodule());
	}
	
	public function index()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			
			if($this->form_validation->run() == TRUE){
				
				
				if($this->mod_login->validasi_captcha()){
					$data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
					$get = $this->auth->do_login($data);
					//set_alert('error','Anda gagal login, silakan ulangi!');
					if($this->session->userdata('sippadu_daftar_izin')){
						redirect(fmodule($this->session->userdata('sippadu_daftar_izin')));
					}
					else{
						redirect(fmodule());
					}
				}
				else{
					set_alert('error','Silakan isi kode captcha dengan benar');
					redirect(fmodule('login'));
				}
			}
		}
		
		$d = $this->mod_all->load();
		
		$d['title'] = $title = lang('Login');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'login';
		$d['menuactive'] = 'login';
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
		$this->mod_login->insert_captcha($cap['word'],$cap['time']);
		$d['captcha'] = $cap['image'];
		
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('login',$d);
	}
	
	public function lupa()
	{
		if($this->input->post('submit')){
			$this->mod_login->send_email_lupa();
		}
		
		$d = $this->mod_all->load();
		
		$d['title'] = $title = lang('Lupa Password');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'login';
		$d['menuactive'] = 'login';
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
		$this->mod_login->insert_captcha($cap['word'],$cap['time']);
		$d['captcha'] = $cap['image'];
		
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('login/lupa',$d);
	}
	
	public function reset_password($code='')
	{
		if($code != ''){
			if($this->input->post('submit')){
				$this->mod_login->reset_password($code);
			}
			
			$d = $this->mod_all->load();
			
			$d['title'] = $title = lang('Lupa Password');
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'login';
			$d['menuactive'] = 'login';
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
			$this->mod_login->insert_captcha($cap['word'],$cap['time']);
			$d['captcha'] = $cap['image'];
			
			$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
			$this->breadcrumb->append_crumb($title);
			$this->load->view('login/reset_password',$d);
		}
		else{
			redirect(fmodule());
		}
	}
	
}