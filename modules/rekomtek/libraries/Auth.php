<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	function __construct()
	{
		$this->CI =& get_instance();
	}
	function do_login($login = NULL, $encrypt=TRUE)
	{
		if(!isset($login))
			return FALSE;
		if(count($login) != 2)
			return FALSE;
		
		$username = $u = $login['username'];
		if($encrypt){
			$password = $p = md5($login['password']);
		}
		else{
			$password = $p = $login['password'];
		}
		
		$a = $this->CI->db->query('select 3 AS ID_Apps,ID_User,Username,Nm_User from sippadu_user where ID_Web = "'.config().'" and Username="'.$username.'" and Password="'.$password.'" and Status=1');
		
		
		if($a->num_rows() > 0)
		{
			$aa = $a->row();
			$sess_data['sippadu_logged_in'] = 'yesGetMeLoginBaby';
			$sess_data['sippadu_userfullname'] = $aa->Nm_User;
			$sess_data['sippadu_username'] = $aa->Username;
			$sess_data['sippadu_userid'] = $aa->ID_User;
			$this->CI->session->set_userdata($sess_data);
			
			return TRUE;
			
		}
		else{
			if($encrypt){
				loginerror('error','Anda gagal login, silakan ulangi!', $u, $p);
				redirect(fmodule('login'));
			}
			return FALSE;
		}
	}
 
	function restrict($redirect='',$logged_out = FALSE)
	{
		if ($this->CI->session->userdata('sippadu_logged_in') != 'yesGetMeLoginBaby')
		{
			redirect($redirect);
		}
		
		
	}
	
	function logout() 
	{
		$this->CI->session->sess_destroy();	
		return TRUE;
	}
	
	
	function loginpage($url_dashb=''){
		if($this->CI->session->userdata('sippadu_logged_in') == 'yesGetMeLoginBaby'){
			redirect($url_dashb);
		}
	}
	
}
// End of library class
// Location: system/application/libraries/Auth.php
