<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_login'));
		$this->load->library(array('auth','form_validation'));
		$this->load->helper(array('url','apps','date','captcha'));
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
				
				if($this->mod_login->validasi_captcha()){
					$get = $this->auth->do_login($data);
					
					if($get){
						
						$ID_Apps = 2;
						$a = $this->db->query('CALL ci_sp_UserLoginStart("'.config().'","'.$this->session->userdata('userid').'","'.$this->session->userdata('ID_Apps').'")');
						if($a->num_rows() > 0){
							$aa = $a->row();
							$ID_Apps = $aa->Default_Apps;
						}
						$a->next_result(); 
						set_alert('success','Hai, '.$this->session->userdata('userfullname').'. Anda berhasil login, Selamat datang di halaman dashboard '.site_title().'!');
						redirect(apps_url($ID_Apps));
					}
					else{
						set_alert('error','Anda gagal login, silakan ulangi!');
						redirect(fmodule('login'));
					}
				}
				else{
					set_alert('error','Silakan isi kode captcha dengan benar');
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
		
		$vals = array(
			'img_path'      => './assets/'.config('theme').'/captcha/',
			'img_url'       => base_url('assets/'.config('theme').'/captcha/'),
			'font_path'     => './assets/'.config('theme').'/fonts/pl.ttf',
			'img_width'     => '200',
			'img_height'    => 50,
			'expiration'    => 7200,
			'word_length'   => 4,
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