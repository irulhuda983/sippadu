<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_users extends CI_Model {
	
	
	function data_users($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$order = 'ci_user.Nm_User ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			//$keyword = 'anggaran';
			$q_where .= 'AND (ci_user.Nm_User like "%'.$keyword.'%" OR ci_user.Username like "%'.$keyword.'%")';
		}
		
		$order = $this->session->userdata('op_sorting_users');
		switch($order){
			case 1:
				$q_order = 'ORDER BY ci_user.Username ASC';
				break;
			case 2:
				$q_order = 'ORDER BY ci_user.Username DESC';
				break;
			case 3:
				$q_order = 'ORDER BY ci_user.Nm_User ASC';
				break;
			case 4:
				$q_order = 'ORDER BY ci_user.Nm_User DESC';
				break;
			case 5:
				$q_order = 'ORDER BY ci_user.ID_User ASC';
				break;
			case 6:
				$q_order = 'ORDER BY ci_user.ID_User DESC';
				break;
			default:
				$q_order = 'ORDER BY ci_user.Username ASC';
				break;
		}
		
		
		$a = $this->db->query('SELECT
			ci_user.ID_User,
			ci_user.Nm_User,
			ci_user.Username,
			ci_user.Password,
			ci_user.Email,
			ci_user.Auth_Mode,
			ci_user.ID_Level,
			ci_user.ID_Group,
			ci_user.Admin,
			ci_user.`Status`,
			ci_auth_mode.Nm_Auth_Mode,
			ci_user_level.Nm_Level,
			ci_user_group.Nm_Group
			FROM
			ci_user
			Inner Join ci_auth_mode ON ci_auth_mode.Kd_Auth_Mode = ci_user.Auth_Mode
			Inner Join ci_user_level ON ci_user_level.ID_Level = ci_user.ID_Level AND ci_user_level.ID_Web = ci_user.ID_Web
			Inner Join ci_user_group ON ci_user_group.ID_Group = ci_user.ID_Group AND ci_user_group.ID_Web = ci_user.ID_Web
			WHERE
			ci_user.ID_User != 1 AND ci_user.ID_Web = "'.config().'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function insert_users(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passwordconf','Konfirmasi Password','required|matches[password]');
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('Email','Email','');
		$this->form_validation->set_rules('op_level','Level','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_group','Group','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_auth_mode','Auth Mode','required|is_natural_no_zero');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_User','Last_ID')->where('ID_Web',config())->get('ci_user');
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last = $ls->Last_ID;
				if($last > 0){
					$last_id = $last+1;
				}
				else{
					$in2['ID_Web'] = config();
					$in2['ID_User'] = 1;
					$in2['Username'] = 'admin';
					$in2['Nm_User'] = 'Administrator';
					$in2['Email'] = '';
					$in2['Password'] = config('secret_code');
					$in2['ID_Level'] =1;
					$in2['ID_Group'] = 1;
					$in2['Auth_Mode'] = 1;
					$in2['Admin'] = 1;
					$in2['Status'] = 1;
					$a = $this->db->insert('ci_user',$in2);
					$last_id = 2;
				}
			} 
			
			$cek = $this->db->where('Username',$this->input->post('username'))->get('ci_user');
			if($cek->num_rows() == 0){
				$in['ID_Web'] = config();
				$in['ID_User'] = $last_id;
				$in['Username'] = $this->input->post('username');
				$in['Nm_User'] = $this->input->post('name');
				$in['Email'] = $this->input->post('email');
				$in['Password'] = md5($this->input->post('password'));
				$in['ID_Level'] = $this->input->post('op_level');
				$in['ID_Group'] = $this->input->post('op_group');
				$in['Auth_Mode'] = $this->input->post('op_auth_mode');
				$in['Admin'] = 0;
				$in['Status'] = 1;
				$a = $this->db->insert('ci_user',$in);
				if($a){
					set_alert('success','Data berhasil ditambahkan');
					redirect(current_url());
				}
				else{
					set_alert('error','Data gagal ditambahkan');
					redirect(current_url());
				}
			}
			else{
				set_alert('error','User sudah ada, data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function update_users($id=0){
		//$this->form_validation->set_rules('username','Username','required');
		if($this->input->post('password')!= '' && $this->input->post('passwordconf') != ''){
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('passwordconf','Konfirmasi Password','required|matches[password]');
		}
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('Email','Email','');
		$this->form_validation->set_rules('op_level','Level','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_group','Group','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_auth_mode','Auth Mode','required|is_natural_no_zero');
		
		if($this->form_validation->run() == TRUE){
			//$in['_username'] = $this->input->post('username');
			$wh['ID_Web'] = config();
			$wh['ID_User'] = $id;
			$in['Nm_User'] = $this->input->post('name');
			$in['Email'] = $this->input->post('email');
			if($this->input->post('password')!= '' && $this->input->post('passwordconf') != ''){
				$in['Password'] = md5($this->input->post('password'));
			}
			$in['ID_Level'] = $this->input->post('op_level');
			$in['ID_Group'] = $this->input->post('op_group');
			$in['Auth_Mode'] = $this->input->post('op_auth_mode');
			$a = $this->db->update('ci_user',$in,$wh);
			if($a){
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
		}
	}
	
	function delete_users(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				//$in['_status'] = 1;
				$wh['ID_User'] = $id;
				$wh['ID_Web'] = config();
				$this->db->delete('ci_user',$wh);
				$this->db->delete('ci_auth_user',$wh);
				$this->db->delete('ci_user_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_users(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_User'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_user',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_users(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_User'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_user',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function get_data_users($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_User',$id)->get('ci_user');
		return $a;
	}
	
	function table_users_group($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Group ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Group like "%'.$keyword.'%")';
		}
	
		$a = $this->db->query('SELECT a.ID_Group,a.Nm_Group,a.Status FROM ci_user_group a WHERE a.ID_Group >= 0 AND a.ID_Web = "'.config().'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_users_group(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Group'] = $id;
				$this->db->delete('ci_user_group',$wh);
				$this->db->delete('ci_auth_group',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_users_group(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$in['Status'] = 1;
				$wh['ID_Group'] = $id;
				$this->db->update('ci_user_group',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_users_group(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Group'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_user_group',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_users_group($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Group',$id)->get('ci_user_group');
		return $a;
	}
	
	function insert_users_group(){
		$this->form_validation->set_rules('Nm_Group','Nama Group','required');
		
		if($this->form_validation->run() == TRUE){
			$last_id = 1;
			$x = $this->db->select_max('ID_Group','ID_Group')->where('ID_Web',config())->get('ci_user_group');
			if($x->num_rows() > 0){
				$xx = $x->row();
				$last_id = $xx->ID_Group+1;
			}
			$in['ID_Web'] = config();
			$in['ID_Group'] = $last_id;
			$in['Nm_Group'] = $this->input->post('Nm_Group');
			$in['Status'] = 1;
			$a = $this->db->insert('ci_user_group',$in);
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function update_users_group($id=0){
		$this->form_validation->set_rules('Nm_Group','Nama Group','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Group'] = $id;
			$in['Nm_Group'] = $this->input->post('Nm_Group');
			$a = $this->db->update('ci_user_group',$in,$wh);
			if($a){
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function table_users_level($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Level ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Level like "%'.$keyword.'%" OR a.Class_Level like "%'.$keyword.'%")';
		}
	
		$a = $this->db->query('SELECT a.ID_Level,a.Nm_Level,a.Class_Level,a.Status FROM ci_user_level a WHERE a.ID_Level != 1  AND a.ID_Web = "'.config().'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_users_level(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Level'] = $id;
				$wh['ID_Web'] = config();
				$this->db->delete('ci_user_level',$wh);
				$this->db->delete('ci_auth_level',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_users_level(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Level'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_user_level',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_users_level(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Level'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_user_level',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_users_level($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Level',$id)->get('ci_user_level');
		return $a;
	}
	
	function insert_users_level(){
		$this->form_validation->set_rules('Nm_Level','Nama Level','required');
		/* $this->form_validation->set_rules('Class_Level','Class Level','required'); */
		
		if($this->form_validation->run() == TRUE){
			//$last_id = 1;
			$x = $this->db->select_max('ID_Level','ID_Level')->where('ID_Web',config())->get('ci_user_level');
			if($x->num_rows() > 0){
				$xx = $x->row();
				$last = $xx->ID_Level;
				if($last > 0){
					$last_id = $last+1;
				}
				else{
					$in2['ID_Web'] = config();
					$in2['ID_Level'] = 1;
					$in2['Nm_Level'] = 'Super Administrator';
					$in2['Class_Level'] = 'super';
					$in2['Status'] = 1;
					$a = $this->db->insert('ci_user_level',$in2);
					$last_id = 2;
				}
			}
			$in['ID_Web'] = config();
			$in['ID_Level'] = $last_id;
			$in['Nm_Level'] = $this->input->post('Nm_Level');
			$in['Class_Level'] = url_title($this->input->post('Nm_Level'),'-',true);
			$in['Status'] = 1;
			$a = $this->db->insert('ci_user_level',$in);
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function update_users_level($id=0){
		$this->form_validation->set_rules('Nm_Level','Nama Level','required');
		/* $this->form_validation->set_rules('Class_Level','Class Level','required'); */
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Level'] = $id;
			$in['Nm_Level'] = $this->input->post('Nm_Level');
			$in['Class_Level'] = $this->input->post('Class_Level');
			$a = $this->db->update('ci_user_level',$in,$wh);
			if($a){
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
			return $a;
		}
	}
	function op_level(){
		$a = $this->db->where('ID_Web',config())->where('ID_Level !=',1)->where('Status',1)->get('ci_user_level');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih Level -';
				$d[$aa->ID_Level] = $aa->Nm_Level;
			}
		}
		else{
			$d[] = 'Tidak ada data';
		}
		return $d;
	}
	
	function op_group(){
		$a = $this->db->where('ID_Web',config())->where('Status',1)->get('ci_user_group');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih Group -';
				$d[$aa->ID_Group] = $aa->Nm_Group;
			}
		}
		else{
			$d[] = 'Tidak ada data';
		}
		return $d;
	}
	
	function op_auth_mode(){
		$a = $this->db->where('Status',1)->get('ci_auth_mode');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih Auth Mode -';
				$d[$aa->Kd_Auth_Mode] = $aa->Nm_Auth_Mode;
			}
		}
		else{
			$d[] = 'Tidak ada data';
		}
		return $d;
	}
	
	function data_modul(){
		//$a = $this->db->where('Status',1)->order_by('Sort_Order','asc')->order_by('Nm_Modul','asc')->get('ci_modul');
		$a = $this->db->query('SELECT b.Kd_Modul,b.Nm_Modul,c.Nm_Group,d.Nm_Apps FROM ci_modul_log a 
		INNER JOIN ci_modul b ON a.Kd_Modul=b.Kd_Modul 
		INNER JOIN ci_modul_group c ON b.Kd_Group=c.Kd_Group
		INNER JOIN ci_apps d ON c.ID_Apps=d.ID_Apps
		WHERE a.ID_Web = '.config().' AND b.Status = 1
		ORDER BY c.ID_Apps,c.Sort_Order,b.Sort_Order ASC');
		return $a;
	}
	
	function op_users(){
		$a = $this->db->where('ID_Web',config())->order_by('Username','asc')->where('ID_User !=',1)->where('Status',1)->get('ci_user');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih User -';
				$d[$aa->ID_User] = $aa->Username.' ('.$aa->Nm_User.')';
			}
		}
		else{
			$d[] = 'Tidak ada data';
		}
		return $d;
	}
	
	function op_region(){
		$a = $this->db->where('Status',1)->get('ci_region');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0']	= '- Pilih Region -';
				$d[$aa->ID_Region] = $aa->Nm_Region;
			}
		}
		else{
			$d[] = 'Tidak ada data';
		}
		return $d;
	}
	
	function op_negara(){
		$a = $this->db->where('Status',1)->order_by('Nm_Negara','asc')->get('ci_negara');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0'] = '- Pilih Negara -';
				$d[$aa->Kd_Negara] = $aa->Nm_Negara;
			}
		}
		else{
			$d[] = '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_provinsi(){
		$a = $this->db->where('Status',1)->order_by('Nm_Provinsi','asc')->get('ci_provinsi');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['0'] = '- Pilih Provinsi -';
				$d[$aa->Kd_Provinsi] = $aa->Nm_Provinsi;
			}
		}
		else{
			$d[] = '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_kabupaten(){
		$a = $this->db->where('Status',1)->order_by('Nm_Kabupaten','asc')->get('ci_kabupaten');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->Kd_Kabupaten] = $aa->Nm_Kabupaten;
			}
		}
		else{
			$d[] = '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_kecamatan(){
		$a = $this->db->query('SELECT
		ci_kecamatan.Kd_Kecamatan,
		ci_kecamatan.Nm_Kecamatan,
		ci_kabupaten.Nm_Kabupaten
		FROM
		ci_kecamatan
		Inner Join ci_kabupaten ON ci_kabupaten.Kd_Negara = ci_kecamatan.Kd_Negara AND ci_kabupaten.Kd_Provinsi = ci_kecamatan.Kd_Provinsi AND ci_kabupaten.Kd_Kabupaten = ci_kecamatan.Kd_Kabupaten
		WHERE ci_kecamatan.Status = 1 ORDER BY ci_kecamatan.Nm_Kecamatan ASC
		');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->Kd_Kecamatan] = $aa->Nm_Kecamatan;
			}
		}
		else{
			$d[] = '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_desa(){
		//$a = $this->db->where('Status',1)->get('ci_desa');
		$a = $this->db->query('SELECT
		ci_desa.Kd_Kecamatan,
		ci_kecamatan.Nm_Kecamatan,
		ci_desa.Kd_Desa,
		ci_desa.Nm_Desa
		FROM
		ci_desa
		Inner Join ci_kecamatan ON ci_desa.Kd_Negara = ci_kecamatan.Kd_Negara AND ci_desa.Kd_Provinsi = ci_kecamatan.Kd_Provinsi AND ci_desa.Kd_Kabupaten = ci_kecamatan.Kd_Kabupaten AND ci_desa.Kd_Kecamatan = ci_kecamatan.Kd_Kecamatan
		WHERE ci_desa.Status = 1 ORDER BY ci_desa.Nm_Desa ASC
		');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->Kd_Desa] = $aa->Nm_Desa.', '.$aa->Nm_Kecamatan;
			}
		}
		else{
			$d[] = '- Tidak ada data -';
		}
		return $d;
	}
	
	function op_dusun(){
		//$a = $this->db->where('Status',1)->get('ci_dusun');
		$a = $this->db->query('SELECT
		ci_dusun.Kd_Dusun,
		ci_dusun.Nm_Dusun,
		ci_desa.Kd_Desa,
		ci_desa.Nm_Desa,
		ci_kecamatan.Kd_Kecamatan,
		ci_kecamatan.Nm_Kecamatan
		FROM
		ci_dusun
		Inner Join ci_desa ON ci_dusun.Kd_Negara = ci_desa.Kd_Negara AND ci_dusun.Kd_Provinsi = ci_desa.Kd_Provinsi AND ci_dusun.Kd_Kabupaten = ci_desa.Kd_Kabupaten AND ci_dusun.Kd_Kecamatan = ci_desa.Kd_Kecamatan AND ci_dusun.Kd_Desa = ci_desa.Kd_Desa
		Inner Join ci_kecamatan ON ci_dusun.Kd_Negara = ci_kecamatan.Kd_Negara AND ci_dusun.Kd_Provinsi = ci_kecamatan.Kd_Provinsi AND ci_dusun.Kd_Kabupaten = ci_kecamatan.Kd_Kabupaten AND ci_dusun.Kd_Kecamatan = ci_kecamatan.Kd_Kecamatan
		WHERE ci_dusun.Status = 1 ORDER BY ci_dusun.Nm_Dusun ASC
		');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->Kd_Dusun] = $aa->Nm_Dusun.', '.$aa->Nm_Desa.', '.$aa->Nm_Kecamatan;
			}
		}
		else{
			$d[] = '- Tidak ada data -';
		}
		return $d;
	}
	
	
	function insert_auth_users(){
		$usr = $this->input->post('op_user');
		$this->session->set_flashdata('op_user',$usr);
		$wh['ID_User'] = $usr;
		$wh['ID_Web'] = config();
		$del = $this->db->delete('ci_auth_user',$wh);
		
		
		$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_Web'] = config();
				$in['ID_User'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert('ci_auth_user',$in);
			}
		}
		
		$this->session->set_flashdata('op_user',$usr);
		set_alert('success','Hak akses user berhasil disimpan');
		redirect(current_url());
	}
	
	function slc_region($user=0){
		$a = $this->db->where('ID_User',$user)->get('ci_relation_user_region');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_Region;
		}
		return $h;
	}
	
	function slc_negara($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',1)->get('ci_relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Negara;
			}
		}
		return $h;
	}
	
	function slc_provinsi($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',2)->get('ci_relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Provinsi;
			}
		}
		return $h;
	}
	
	function slc_kabupaten($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',3)->get('ci_relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kabupaten;
			}
		}
		return $h;
	}
	
	function slc_kecamatan($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',4)->get('ci_relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kecamatan;
			}
		}
		return $h;
	}
	
	function slc_desa($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',5)->get('ci_relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Desa;
			}
		}
		return $h;
	}
	
	function slc_dusun($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',6)->get('ci_relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Dusun;
			}
		}
		return $h;
	}
	
	function insert_auth_level(){
		$usr = $this->input->post('op_level');
		$this->session->set_flashdata('op_level',$usr);
		$wh['ID_Web'] = config();
		$wh['ID_Level'] = $usr;
		$del = $this->db->delete('ci_auth_level',$wh);
		
		$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_Web'] = config();
				$in['ID_Level'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert('ci_auth_level',$in);
			}
			$this->session->set_flashdata('op_level',$usr);
			set_alert('success','Hak akses level berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Hak akses level gagal disimpan');
			redirect(current_url());
		}
	}
	
	function slc_region_level($user=0){
		$a = $this->db->where('ID_Level',$user)->get('ci_relation_level_region');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_Region;
		}
		return $h;
	}
	
	function slc_negara_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',1)->get('ci_relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Negara;
			}
		}
		return $h;
	}
	
	function slc_provinsi_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',2)->get('ci_relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Provinsi;
			}
		}
		return $h;
	}
	
	function slc_kabupaten_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',3)->get('ci_relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kabupaten;
			}
		}
		return $h;
	}
	
	function slc_kecamatan_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',4)->get('ci_relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kecamatan;
			}
		}
		return $h;
	}
	
	function slc_desa_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',5)->get('ci_relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Desa;
			}
		}
		return $h;
	}
	
	function slc_dusun_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',6)->get('ci_relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Dusun;
			}
		}
		return $h;
	}
	
	function insert_auth_group(){
		$usr = $this->input->post('op_group');
		$this->session->set_flashdata('op_group',$usr);
		$wh['ID_Group'] = $usr;
		$wh['ID_Web'] = config();
		$del = $this->db->delete('ci_auth_group',$wh);
				
		$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_Web'] = config();
				$in['ID_Group'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert('ci_auth_group',$in);
			}
			$this->session->set_flashdata('op_group',$usr);
			set_alert('success','Hak akses group berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Hak akses group gagal disimpan');
			redirect(current_url());
		}
	}
	
	function get_last_id(){
		$a = $this->db->order_by('ID_User','desc')->get('ci_user');
		$result = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$result = $aa->ID_User;
		}
		return $result;
	}
	
	function update_user_log(){
		$userid = $this->session->userdata('userid');
		$a = $this->db->where('ID_Web',config())->where('ID_User',$userid)->get('ci_user_log');
		$wh['ID_Web'] = config();
		$wh['ID_User'] = $userid;
		$in['LastCekLogin'] = TimeNow('Y-m-d H:i:s');
		if($a->num_rows() > 0){
			$aa = $this->db->update('ci_user_log',$in,$wh);
		}
		else{
			$in['ID_Web'] = config();
			$in['ID_User'] = $userid;
			$aa = $this->db->insert('ci_user_log',$in);
		}
	}
	
	function cek_user_log(){
		$userid = $this->session->userdata('userid');
		if($userid==1){
			$a = $this->db->query('SELECT a.Username,b.LastCekLogin,IFNULL(b.`Status`,0) AS `Status` from ci_user a LEFT JOIN (select *,1 AS Status from ci_user_log where (NOW()-LastCekLogin) <= 120) b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = "'.config().'" AND b.`Status` = 1 ORDER BY b.`Status` DESC, a.Username ASC');
		}
		else{
			$a = $this->db->query('SELECT a.Username,b.LastCekLogin,IFNULL(b.`Status`,0) AS `Status` from ci_user a LEFT JOIN (select *,1 AS Status from ci_user_log where (NOW()-LastCekLogin) <= 120) b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = "'.config().'" AND b.`Status` = 1 AND a.ID_User != 1 ORDER BY b.`Status` DESC, a.Username ASC');
		}
		return $a;
	}
	
	
	function users_list_online(){
		$userid = $this->session->userdata('userid');
		if($userid==1){
			$a = $this->db->query('
			SELECT * FROM
			(
				(
					SELECT 1 AS ID, a.ID_User, a.Username,b.LastCekLogin,IFNULL(b.`Status`,0) AS `Status` from ci_user a LEFT JOIN (select *,1 AS Status from ci_user_log where (NOW()-LastCekLogin) <= 120) b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = "'.config().'" AND a.ID_User = '.$userid.' ORDER BY IFNULL(b.`Status`,0) DESC, a.Username ASC
				)
				UNION ALL
				(
					SELECT 2 AS ID, a.ID_User, a.Username,b.LastCekLogin,IFNULL(b.`Status`,0) AS `Status` from ci_user a LEFT JOIN (select *,1 AS Status from ci_user_log where (NOW()-LastCekLogin) <= 120) b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = "'.config().'" AND a.ID_User != '.$userid.' ORDER BY IFNULL(b.`Status`,0) DESC, a.Username ASC
				)
			) AS A
			ORDER BY A.ID ASC, A.Status DESC, A.Username ASC
			');
		}
		else{
			$a = $this->db->query('
			SELECT * FROM
			(
				(
					SELECT 1 AS ID, a.ID_User, a.Username,b.LastCekLogin,IFNULL(b.`Status`,0) AS `Status` from ci_user a LEFT JOIN (select *,1 AS Status from ci_user_log where (NOW()-LastCekLogin) <= 120) b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = "'.config().'" AND a.ID_User = '.$userid.' AND a.ID_User != 1 ORDER BY IFNULL(b.`Status`,0) DESC, a.Username ASC
				)
				UNION ALL
				(
					SELECT 2 AS ID, a.ID_User, a.Username,b.LastCekLogin,IFNULL(b.`Status`,0) AS `Status` from ci_user a LEFT JOIN (select *,1 AS Status from ci_user_log where (NOW()-LastCekLogin) <= 120) b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = "'.config().'" AND a.ID_User != '.$userid.' AND a.ID_User != 1 ORDER BY IFNULL(b.`Status`,0) DESC, a.Username ASC
				)
			) AS A
			ORDER BY A.ID ASC, A.Status DESC, A.Username ASC
			');
		}
		return $a;
	}
}
