<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_all extends CI_Model {
	
	function load(){
		$d['cfg_site_title'] = $this->config->item('site_title');
		$d['cfg_site_description'] = $this->config->item('site_title');
		$d['input_keyword'] = $this->keyword();
		$d['title'] = site_title();
		$d['slogan'] = $this->config->item('site_slogan');
		$d['site_title'] = site_title();
		$d['site_description'] = site_description();
		$d['site_keywords'] = site_keywords();
		$d['site_author'] = site_author();
		$d['site_image'] = site_image();
		$d['google_code'] = google_code();
		$d['userfullname'] = ($this->session->userdata('sippadu_userfullname') != '' ? $this->session->userdata('sippadu_userfullname') : $this->session->userdata('sippadu_username'));
		$d['popup'] = $this->popup();
		$d['popup2'] = $this->popup2();
		$d['menuopen'] = '';
		$d['menuopen2'] = '';
		$d['menuactive'] = '';
		$d['uri_string'] = $this->uri->uri_string();
		$d['winpopup'] = FALSE;
		$d['insert_counter'] = $this->insert_counter();
		//$d['menu_apps'] = $this->menu_apps();
		$d['data_language'] = $this->data_language();
		$d['asset_update'] = (config('asset_update') ? '?v='.TimeNow('YmdHi') : '');
		$d['step1'] = '';
		$d['step2'] = '';
		$d['step3'] = '';
		$d['step4'] = '';
		$d['step5'] = '';
		$d['step6'] = '';
		$d['step7'] = '';
		$d['step8'] = '';
		return $d;
	}
	
	function data_language(){
		$a = $this->db->order_by('ID_Lang','asc')->where('Status',1)->get('ci_lang');
		return $a;
	}
	
	
	function keyword(){
		$keyword = '';
		if(!empty($_GET['keyword'])){
			$keyword = $_GET['keyword'];
		}
		return $keyword;
	}
	
	function popup(){
		$atts = array(
              'width'      => '800',
              'height'     => '700',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		return $atts;
	}
	
	function popup2(){
		$atts = array(
              'width'      => '1100',
              'height'     => '700',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		return $atts;
	}
	
	function create_captcha(){
		$this->load->helper('captcha');
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
		return $cap;
	}
	
	function insert_captcha($word='',$time=''){
		$data = array(
				'captcha_time'  => $time,
				'ip_address'    => $this->input->ip_address(),
				'word'          => $word
		);

		$query = $this->db->insert_string('ci_captcha', $data);
		$this->db->query($query);
	}
	
	function validasi_captcha(){
		$expiration = time() - 7200;
		$this->db->where('captcha_time < ', $expiration)
				->delete('ci_captcha');

		$sql = 'SELECT COUNT(*) AS count FROM ci_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		return $row->count;
	}	
	
	function insert_counter(){
		setcookie('myWebVisitorCookie', 'myWebVisitorCookie', time() + 3600);
		if (!isset($_COOKIE['myWebVisitorCookie'])) {
			$this->db->query('UPDATE ci_counter SET Visits=Visits+1 where Time = "'.TimeNow('Y-m-d').'" and ID_Web = '.config().'');
		}
		$a = $this->db->where('ID_Web',config())->where('Time',TimeNow('Y-m-d'))->get('ci_counter');
		
		if($a->num_rows() > 0){
			$b = $this->db->query('UPDATE ci_counter SET Hits=Hits+1 where Time = "'.TimeNow('Y-m-d').'" and ID_Web = '.config().'');
		}else{
			$in['ID_Web'] = config();
			$in['Time'] = TimeNow('Y-m-d');
			$in['Visits'] = 1;
			$in['Hits'] = 1;
			$this->db->insert('ci_counter',$in);
		}
	}
}
