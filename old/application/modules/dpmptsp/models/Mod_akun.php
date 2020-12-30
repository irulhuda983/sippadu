<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_akun extends CI_Model {
	
	function get_data_users($id=0){
		/*$a = $this->db->query('SELECT
			'.dbprefix().'user.ID_User,
			'.dbprefix().'user.Nm_User,
			'.dbprefix().'user.Username,
			'.dbprefix().'user.Password,
			'.dbprefix().'user.Auth_Mode,
			'.dbprefix().'user.ID_Level,
			'.dbprefix().'user.ID_Group,
			'.dbprefix().'user.Admin,
			'.dbprefix().'user.`Status`,
			'.dbprefix().'auth_mode.Nm_Auth_Mode,
			'.dbprefix().'user_level.Nm_Level,
			'.dbprefix().'user_group.Nm_Group
			FROM
			'.dbprefix().'user
			Inner Join '.dbprefix().'auth_mode ON '.dbprefix().'auth_mode.Kd_Auth_Mode = '.dbprefix().'user.Auth_Mode
			Inner Join '.dbprefix().'user_level ON '.dbprefix().'user_level.ID_Level = '.dbprefix().'user.ID_Level
			Inner Join '.dbprefix().'user_group ON '.dbprefix().'user_group.ID_Group = '.dbprefix().'user.ID_Group
			WHERE
			'.dbprefix().'user.ID_User = '.$id.'');*/
			$a = $this->db->where('ID_User',$id)->get('ci_user');
		return $a;
	}
	
	function update_profil($id=0){
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		if($this->input->post('password')){
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passwordconf','Konfirmasi Password','required|matches[password]|min_length[4]');
		}
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_User'] = $id;
			$in['Nm_User'] = $this->input->post('name');
			if($this->input->post('password')){
			$in['Password'] = md5($this->input->post('password'));
			}
			$a = $this->db->update(''.dbprefix().'user',$in,$wh);
			if($a){
				$this->session->set_userdata('userfullname',$this->input->post('name'));
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
			
			$a = $this->db->update(''.dbprefix().'user',$in,$wh);
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
