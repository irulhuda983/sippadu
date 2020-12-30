<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	//var $this->CI = null;

	function __construct()
	{
		$this->CI =& get_instance();
		//$this->CI->load->database();
	}
	function do_login($login = NULL)
	{
		// A few safety checks
		// Our array has to be set

		if(!isset($login))
			return FALSE;
	
		//Our array has to have 2 values
		//No more, no less!
		if(count($login) != 2)
		return FALSE;
		
		$max_login = 5;
		$try = $this->CI->session->userdata('login_try');
		$username = $u = $login['username'];
		$password = $p = md5($login['password']);
		//$captcha = $login['captcha'];
		
		$a = $this->CI->db->query('select * from '.dbprefix().'user where Username="'.$username.'" and Password="'.$password.'" and Status=1');
		
		
		if($a->num_rows() > 0)
		{
			$aa = $a->row();
			$sess_data['logged_in'] = 'yesGetMeLoginBaby';
			$sess_data['userfullname'] = $aa->Nm_User;
			$sess_data['username'] = $aa->Username;
			$sess_data['userid'] = $aa->ID_User;
			$this->CI->session->set_userdata($sess_data);
			
			return TRUE;
			
		}
		else{
			
			loginerror('error','Anda gagal login, silakan ulangi!', $u, $p);
			redirect(fmodule('login'));
			return FALSE;
		}
	}
 
	function restrict($redirect='',$logged_out = FALSE)
	{
		if ($this->CI->session->userdata('logged_in') != 'yesGetMeLoginBaby')
		{
			  //$url = $this->CI->session->set_userdata('urlresctrict',current_url());
			  redirect($redirect);
		      //die();
		}
		/*else{
			if($this->CI->session->userdata('urlresctrict')){
				redirect($this->CI->session->userdata('urlresctrict'));
			}
		}*/
		
		/*if ($logged_out && is_logged_in())
		{
			  redirect($redirect);
		      die();
		}
		
		if ( ! $logged_out && !is_logged_in()) 
		{
			  redirect($redirect);
		      die();
		}*/
		
	}
	
	function logout() 
	{
		$this->CI->session->sess_destroy();	
		return TRUE;
	}
	function cek($id,$ret=false)
	{
		$menu = array(
			'data_master'=>'+admin+',
			'manajemen_user'=>'+admin+'
		);
		$allowed = explode('+',$menu[$id]);
		if(!in_array(from_session('level'),$allowed))
		{
			if($ret) return false;
			echo $this->CI->fungsi->warning('Anda tidak diijinkan mengakses halaman ini.',site_url());
			die();
		}
		else
		{
			if($ret) return true;
		}
	}
	function setChaptcha()
	{
		$this->CI->config->load('config');
		$this->CI->load->helper('string');
		$this->CI->load->helper('captcha');
		$captcha_url = $this->CI->config->item('captcha_url');
		$captcha_path = $this->CI->config->item('captcha_path');
		$vals = array(
			'img_path'      	=> $captcha_path,
			'img_url'       	=> $captcha_url,
			'expiration'    	=> 3600,// one hour
			'font_path'	 	=> './system/fonts/georgia.ttf',
			'img_width'	 	=> '140',
			'img_height' 		=> 30,
			'word'			=> random_string('numeric', 6),
        	);
		$cap = create_captcha($vals);
		$capdb = array(
			'captcha_id'      	=> '',
			'captcha_time'    	=> $cap['time'],
			'ip_address'      	=> $this->CI->input->ip_address(),
			'word'            	=> $cap['word']
		);
		$query = $this->CI->db->insert_string('captcha', $capdb);
		$this->CI->db->query($query);
		$data['cap'] = $cap;
		return $data;
	}
	
	function loginpage($url_dashb=''){
		//if(is_logged_in()): redirect($url); endif;
		if($this->CI->session->userdata('logged_in') == 'yesGetMeLoginBaby'){
			redirect($url_dashb);
		}
	}
	
	function akses($modul=0){
		$user = $this->CI->session->userdata('userid');
		$a = $this->CI->db->where('ID_User',$user)->get(''.dbprefix().'user');
		$auth_mode = 0;
		$id_level = 0;
		$id_group = 0;
		if($a->num_rows() > 0){
			$aa = $a->row();
			$auth_mode = $aa->Auth_Mode;
			$id_level = $aa->ID_Level;
			$id_group = $aa->ID_Group;
		}
		
		switch($auth_mode){
			case 1:
				$b = $this->CI->db->where('ID_User',$user)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_user');
				break;
			case 2:
				$b = $this->CI->db->where('ID_Level',$id_level)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_level');
				break;
			case 3:
				$b = $this->CI->db->where('ID_Group',$id_group)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_group');
				break;
		}
		
		if($b->num_rows() == 0){
			set_alert('error','Error 404: Anda tidak berhak mengakses halaman yang dimaksud !');
			redirect(fmodule());
		}
	}
}
// End of library class
// Location: system/application/libraries/Auth.php
