<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_registrasi extends CI_Model {
	
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
	
	function send_email_registrasi(){
		$this->form_validation->set_rules('nokitas',lang('No Identitas',true),'required|is_unique[sippadu_user.Username]');
		$this->form_validation->set_rules('email',lang('Email',true),'required|valid_email|is_unique[sippadu_user.Email]');
		$this->form_validation->set_rules('password', lang('Password',true), 'required');
		$this->form_validation->set_rules('passconf', lang('Konfirmasi Password',true), 'required|matches[password]');
		if($this->form_validation->run() == TRUE){
			if($this->validasi_captcha()){
				$nokitas = $this->input->post('nokitas');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$code = encrypt($nokitas.'|'.$email.'|'.md5($password));
				$this->email->to($email);
				$this->email->from(config('email_sys_address'),config('email_sys_name'));
				$this->email->reply_to(config('email_author'),config('author'));
				$this->email->subject('Konfirmasi Email untuk Pendaftaran Perizinan Online');
				$this->email->message('
					Silakan klik link berikut untuk melanjutkan pendaftaran anda<br/><br/>
					<i>'.anchor(site_url(fmodule('registrasi/confirm/'.$code))).'</i>
					<br/>
					<br/>
					Terimakasih,<br/>
					<b>Administrator<b>
				');
				$this->email->set_mailtype('html');
				$this->email->send();
				$in['Username'] = $nokitas;
				$in['Email'] = $email;
				$in['Password'] = md5($password);
				$in['Key'] = $code;
				$in['Time_Registrasi'] = TimeNow('Y-m-d H:i:s');
				$in['Status'] = 1;
				$this->db->insert('sippadu_user_temp',$in);
				
				set_alert('success','Konfirmasi pendaftaran anda telah dikirim ke email anda. Silakan cek email untuk melanjutkan pendaftaran');
				redirect(current_url());
			}
			else{
				set_alert('error','Silakan isi kode captcha dengan benar');
				redirect(current_url());
			}
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
			$nokitas = $key[0];
			$email = $key[1];
			$password = $key[2];
			
			/* $wh['Username'] = $nokitas;
			$wh['Email'] = $email;
			$wh['Key'] = $code;
			$wh['Status'] = 1; */
			$cek = $this->db->where('Username',$nokitas)->where('Email',$email)->where('Status',1)->get('sippadu_user_temp');
			
			$a = false;
			if($cek->num_rows() > 0){
				$cek_user = $this->db->where('ID_User',$nokitas)->get('sippadu_user');
				$a = true;
				if($cek_user->num_rows() < 1){
					$in['ID_Web'] = config();
					$in['ID_User'] = $last;
					$in['Username'] = $nokitas;
					$in['No_Kitas'] = $nokitas;
					$in['Email'] = $email;
					$in['Password'] = $password;
					$in['Status'] = 1;
					$a = $this->db->insert('sippadu_user',$in);
					
					$this->email->to($email);
					$this->email->from(config('email_sys_address'),config('email_sys_name'));
					$this->email->reply_to(config('email_author'),config('author'));
					$this->email->subject('Selamat datang di Aplikasi Perizinan Online!');
					$this->email->message('
						Yang terhormat pemilik Identitas <b>'.$nokitas.'</b>!,<br/><br/>
						Nomor identitas anda telah berhasil didaftarkan di aplikasi perizinan online. Dimana nomor identitas anda tersebut akan menjadi user untuk bisa mengakses serta mendaftarkan segala bentuk izin lewat aplikasi online. Maka dari itu kami menghimbau kepada anda agar selalu menjaga kerahasian data anda. Baik username(Nomor identias) ataupun password anda.
						<br/>
						<br/>
						Terimakasih,<br/>
						<b>Administrator<b>
					');
					$this->email->set_mailtype('html');
					$this->email->send();
				}
				else{
					set_alert('error','Maaf, registrasi anda gagal dilakukan. Nomor Identitas <b>'.$nokitas.'</b> sudah terdaftar sebelumnya');
					redirect(fmodule());
				}
				
				$wh3['Username'] = $nokitas;
				$wh3['Email'] = $email;
				$b = $this->db->delete('sippadu_user_temp',$wh3);
				
				$data = array(
					'username' => $nokitas,
					'password' => $password
				);
				$get = $this->auth->do_login($data,false);
				set_alert('success','Pendaftaran anda telah berhasil, silakan <a href="'.site_url(fmodule('akun')).'"><b>klik disini<b></a> untuk memperbarui profil anda terlebih dahulu!');
				redirect(fmodule('registrasi/success'));
			}
			else{
				set_alert('error','Link yang anda klik sudah tidak aktif');
				redirect(fmodule());
			}
			
		}
		else{
			set_alert('error','Pendaftaran gagal. Silakan ulangi lagi');
			redirect(fmodule());
		}
	}
}
