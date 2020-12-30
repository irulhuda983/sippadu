<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_login extends CI_Model {
	
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
	
	function send_email_lupa(){
		$this->form_validation->set_rules('email',lang('Email',true),'required|valid_email');
		if($this->form_validation->run() == TRUE){
			if($this->validasi_captcha()){
				$email = $this->input->post('email');
				$c = 0;
				$cek = $this->db->query('SELECT * FROM sippadu_user WHERE Email = "'.$email.'" AND ID_Web = "'.config().'" LIMIT 0,1');
				if($cek->num_rows() > 0){
					$cc = $cek->row();
					$userid = $cc->ID_User;
					$username = $cc->Username;
					$password = $cc->Password;
					$code = encrypt($userid.'|'.$username.'|'.$email.'|'.$password.'|'.TimeNow('Ymd'));
					$this->email->to($email);
					$this->email->from(config('email_sys_address'),config('email_sys_name'));
					$this->email->reply_to(config('email_author'),config('author'));
					$this->email->subject('Lupa Password');
					$this->email->message('
						Silakan klik link berikut untuk melanjutkan reset password anda<br/><br/>
						<i>'.anchor(site_url(fmodule('login/reset_password/'.$code))).'</i>
						<br/>
						<br/>
						Terimakasih,<br/>
						<b>Administrator<b>
					');
					$this->email->set_mailtype('html');
					$this->email->send();
					
					set_alert('success','Konfirmasi lupa password anda telah dikirim ke email anda. Silakan cek email untuk melanjutkan reset password');
					redirect(current_url());
				}
				
			}
			else{
				set_alert('error','Silakan isi kode captcha dengan benar');
				redirect(current_url());
			}
		}
	}
	
	function reset_password($code=''){
		$this->form_validation->set_rules('password', lang('Password',true), 'required');
		$this->form_validation->set_rules('passwordconf', lang('Konfirmasi Password',true), 'required|matches[password]');
		if($this->form_validation->run() == TRUE){
			if($this->validasi_captcha()){
				$decrypt = decrypt($code);
				$key = explode('|',$decrypt);
				
				if(count($key) >= 5){
					$userid = $key[0];
					$username = $key[1];
					$email = $key[2];
					$password = $key[3];
					$time = $key[4];
					$passwordnew = md5($this->input->post('password'));
					
					$wh['ID_User'] = $userid;
					$wh['Username'] = $username;
					$wh['Email'] = $email;
					$in['Password'] = $passwordnew;
					
					$cek = $this->db->query('SELECT * FROM sippadu_user WHERE Email = "'.$email.'" AND ID_Web = "'.config().'" LIMIT 0,1');
					if($cek->num_rows() > 0){
						$cc = $cek->row();
						$password_old = $cc->Password;
						if($password == $password_old && $time == TimeNow('Ymd')){
							$a = $this->db->update('sippadu_user',$in,$wh);
							if($a){
								$this->email->to($email);
								$this->email->from(config('email_sys_address'),config('email_sys_name'));
								$this->email->reply_to(config('email_author'),config('author'));
								$this->email->subject('Password Berhasil di Ganti');
								$this->email->message('
									Password anda berhasil di ganti
									<br/>
									<br/>
									Terimakasih,<br/>
									<b>Administrator<b>
								');
								$this->email->set_mailtype('html');
								$this->email->send();
								set_alert('success','Password anda berhasil diganti, silakan login kembali');
								redirect(fmodule('login'));
							}
							else{
								set_alert('error','Password anda gagal diganti, silakan ulangi kembali');
								redirect(current_url());
							}
						}
						else{
							set_alert('error','Opps, link reset password ini sudah tidak berlaku !!');
							redirect(current_url());
						}
					}
					else{
						set_alert('error','Opps, link reset password ini sudah tidak berlaku !!!');
						redirect(current_url());
					}
				}
				else{
					set_alert('error','Opps, link reset password salah, silakan ulangi lagi !!!!');
					redirect(current_url());
				}
			}
			else{
				set_alert('error','Silakan isi kode captcha dengan benar');
				redirect(current_url());
			}
		}
		
	}

}
