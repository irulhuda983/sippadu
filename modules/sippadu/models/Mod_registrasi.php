<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_registrasi extends CI_Model {
	
		
	function send_email_registrasi(){
		$this->form_validation->set_rules('nokitas',lang('No Identitas',true),'required|is_unique[sippadu_user.Username]');
		$this->form_validation->set_rules('email',lang('Email',true),'required|valid_email|is_unique[sippadu_user.Email]');
		$this->form_validation->set_rules('password', lang('Password',true), 'required');
		$this->form_validation->set_rules('passconf', lang('Konfirmasi Password',true), 'required|matches[password]');
		if($this->form_validation->run() == TRUE){
			$nokitas = $this->input->post('nokitas');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$code = encrypt($nokitas.'|'.$email.'|'.$password);
			$this->email->to($email);
			$this->email->from(config('email_sys_address'),config('email_sys_name'));
			$this->email->reply_to(config('email_author'),config('author'));
			$this->email->subject('Konfirmasikan Email Anda');
			$this->email->message('
				Silakan klik link berikut untuk melanjutkan pendaftaran anda<br/><br/>
				<i>'.anchor(site_url(fmodule('confirm/'.$code))).'</i>
				<br/>
				<br/>
				Terimakasih,
				<b>Administrator<b>
			');
			$this->email->set_mailtype('html');
			$this->email->send();
		}
	}
	
	function insert_registrasi($code=''){
		$decrypt = decrypt($code);
		$key = explode('|',$decrypt);
		
		$qlast = $this->db->select_max('ID_User','Last_ID')->where('ID_Web',config())->get('sippadu_user');
		if($qlast->num_rows() > 0){
			$ls = $qlast->row();
			$last = $ls->Last_ID + 1;
		} 
			
		if(count($key) >= 3){
			$in['ID_Web'] = config();
			$in['ID_User'] = $last;
			$in['Username'] = $key[0];
			$in['No_Kitas'] = $key[0];
			$in['Email'] = $key[1];
			$in['Password'] = $key[2];
			$in['Status'] = 1;
			$a = $this->db->insert('sippadu_user',$in);
			if($a){
				set_alert('success','Pendaftaran anda telah berhasil, silakan melanjutkan tahap selanjutnya');
				redirect(site_url(fmodule('registrasi/success')));
			}
			else{
				set_alert('error','Pendaftaran gagal. Silakan ulangi lagi');
				redirect(site_url(fmodule('registrasi')));
			}
		}
		else{
			set_alert('error','Pendaftaran gagal. Silakan ulangi lagi');
			redirect(site_url(fmodule('registrasi')));
		}
	}
}
