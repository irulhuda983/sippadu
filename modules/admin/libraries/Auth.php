<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	function __construct()
	{
		$this->CI =& get_instance();
	}
	function do_login($login = NULL)
	{
		
		if(!isset($login))
			return FALSE;
	
		if(count($login) != 2)
			return FALSE;
		
		$username = $u = $login['username'];
		$password = $p = md5($login['password']);
		
		$a = $this->CI->db->query('select 2 AS ID_Apps,ID_User,Username,Nm_User,ID_Group,ID_Level,Admin  from ci_user where ID_Web = "'.config().'" and Username="'.$username.'" and Password="'.$password.'" and Status=1');
		
		if($a->num_rows() > 0)
		{
			$aa = $a->row();
			$sess_data['logged_in'] = 'yesGetMeLoginBaby';
			$sess_data['userfullname'] = $aa->Nm_User;
			$sess_data['username'] = $aa->Username;
			$sess_data['userid'] = $aa->ID_User;
			$sess_data['usergroupid'] = $aa->ID_Group;
			$sess_data['userlevelid'] = $aa->ID_Level;
			$sess_data['is_admin'] = $aa->Admin;
			$sess_data['ID_Apps'] = $aa->ID_Apps;
			$this->CI->session->set_userdata($sess_data);
			
			return TRUE;
			
		}
		else{
			
			loginerror('error','Anda gagal login, silakan ulangi!', $u, $p);
			redirect(fmodule('login'));
			return FALSE;
		}
	}
 
	function restrict($redirect='')
	{
		if ($this->CI->session->userdata('logged_in') != 'yesGetMeLoginBaby')
		{
			redirect($redirect);
		}
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
