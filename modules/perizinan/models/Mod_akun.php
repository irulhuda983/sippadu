<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_akun extends CI_Model {
	
	function get_data_users($id=0){
		$a = $this->db->query('SELECT * FROM sippadu_user where ID_User = '.$id.'');
		return $a;
	}
	
	function update_profil($id=0){
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_User'] = $id;
			$in['Nm_User'] = $this->input->post('name');
			$a = $this->db->update('sippadu_user',$in,$wh);
			if($a){
				$this->session->set_userdata('sippadu_userfullname',$this->input->post('name'));
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
		}
	}
	
	function update_password($id=0){
		
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passwordconf','Konfirmasi Password','required|matches[password]|min_length[4]');
		if($this->form_validation->run() == TRUE){
			$wh['ID_User'] = $id;
			$in['Password'] = md5($this->input->post('password'));
			
			$a = $this->db->update('sippadu_user',$in,$wh);
			if($a){
				set_alert('success','Password berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Password gagal diupdate');
				redirect(current_url());
			}
		}
	}
}
