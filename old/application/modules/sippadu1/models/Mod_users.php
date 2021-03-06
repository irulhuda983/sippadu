<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_users extends CI_Model {
	
	
	function data_users($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$order = ''.dbprefix().'user.Nm_User ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			//$keyword = 'anggaran';
			$q_where .= 'AND ('.dbprefix().'user.Nm_User like "%'.$keyword.'%" OR '.dbprefix().'user.Username like "%'.$keyword.'%")';
		}
		
		$order = $this->session->userdata('op_sorting_users');
		switch($order){
			case 1:
				$q_order = 'ORDER BY '.dbprefix().'user.Username ASC';
				break;
			case 2:
				$q_order = 'ORDER BY '.dbprefix().'user.Username DESC';
				break;
			case 3:
				$q_order = 'ORDER BY '.dbprefix().'user.Nm_User ASC';
				break;
			case 4:
				$q_order = 'ORDER BY '.dbprefix().'user.Nm_User DESC';
				break;
			case 5:
				$q_order = 'ORDER BY '.dbprefix().'user.ID_User ASC';
				break;
			case 6:
				$q_order = 'ORDER BY '.dbprefix().'user.ID_User DESC';
				break;
			default:
				$q_order = 'ORDER BY '.dbprefix().'user.Username ASC';
				break;
		}
		
		
		$a = $this->db->query('SELECT
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
			'.dbprefix().'user.Status = 1 and '.dbprefix().'user.ID_User != 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function insert_users(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passwordconf','Konfirmasi Password','required|matches[password]');
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('op_level','Level','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_group','Group','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_auth_mode','Auth Mode','required|is_natural_no_zero');
		
		if($this->form_validation->run() == TRUE){
			$in['Username'] = $this->input->post('username');
			$in['Nm_User'] = $this->input->post('name');
			$in['Password'] = md5($this->input->post('password'));
			$in['ID_Level'] = $this->input->post('op_level');
			$in['ID_Group'] = $this->input->post('op_group');
			$in['Auth_Mode'] = $this->input->post('op_auth_mode');
			$in['Admin'] = 0;
			$in['Status'] = 1;
			$a = $this->db->insert(''.dbprefix().'user',$in);
			/*if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}*/
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
		$this->form_validation->set_rules('op_level','Level','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_group','Group','required|is_natural_no_zero');
		$this->form_validation->set_rules('op_auth_mode','Auth Mode','required|is_natural_no_zero');
		
		if($this->form_validation->run() == TRUE){
			//$in['_username'] = $this->input->post('username');
			$wh['ID_User'] = $id;
			$in['Nm_User'] = $this->input->post('name');
			if($this->input->post('password')!= '' && $this->input->post('passwordconf') != ''){
				$in['Password'] = md5($this->input->post('password'));
			}
			$in['ID_Level'] = $this->input->post('op_level');
			$in['ID_Group'] = $this->input->post('op_group');
			$in['Auth_Mode'] = $this->input->post('op_auth_mode');
			$a = $this->db->update(''.dbprefix().'user',$in,$wh);
			/*if($a){
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}*/
		}
	}
	
	function delete_users(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				//$in['_status'] = 1;
				$wh['ID_User'] = $id;
				$this->db->delete(''.dbprefix().'user',$wh);
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
				$this->db->update(''.dbprefix().'user',$in,$wh);
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
				$this->db->update(''.dbprefix().'user',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function get_data_users($id=0){
		$a = $this->db->where('ID_User',$id)->get(''.dbprefix().'user');
		return $a;
	}
	
	function op_level(){
		$a = $this->db->where('Status',1)->get(''.dbprefix().'user_level');
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
		$a = $this->db->where('Status',1)->get(''.dbprefix().'user_group');
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
		$a = $this->db->where('Status',1)->get(''.dbprefix().'auth_mode');
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
		//$a = $this->db->where('Status',1)->order_by('Sort_Order','asc')->order_by('Nm_Modul','asc')->get(''.dbprefix().'modul');
		$a = $this->db->query('SELECT
		'.dbprefix().'modul.Kd_Modul,
		'.dbprefix().'modul.Kd_Group,
		'.dbprefix().'modul_group.Nm_Group,
		'.dbprefix().'modul.Nm_Modul,
		'.dbprefix().'modul.Sort_Order,
		'.dbprefix().'modul.`Status`
		FROM
		'.dbprefix().'modul
		Inner Join '.dbprefix().'modul_group ON '.dbprefix().'modul_group.Kd_Group = '.dbprefix().'modul.Kd_Group
		WHERE
		'.dbprefix().'modul.`Status` = 1
		ORDER BY
		'.dbprefix().'modul_group.Sort_Order ASC,
		'.dbprefix().'modul.Sort_Order ASC');
		return $a;
	}
	
	function op_users(){
		$a = $this->db->where('Status',1)->get(''.dbprefix().'user');
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
		$a = $this->db->where('Status',1)->get(''.dbprefix().'region');
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
		$a = $this->db->where('Status',1)->order_by('Nm_Negara','asc')->get(''.dbprefix().'negara');
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
		$a = $this->db->where('Status',1)->order_by('Nm_Provinsi','asc')->get(''.dbprefix().'provinsi');
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
		$a = $this->db->where('Status',1)->order_by('Nm_Kabupaten','asc')->get(''.dbprefix().'kabupaten');
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
		'.dbprefix().'kecamatan.Kd_Kecamatan,
		'.dbprefix().'kecamatan.Nm_Kecamatan,
		'.dbprefix().'kabupaten.Nm_Kabupaten
		FROM
		'.dbprefix().'kecamatan
		Inner Join '.dbprefix().'kabupaten ON '.dbprefix().'kabupaten.Kd_Negara = '.dbprefix().'kecamatan.Kd_Negara AND '.dbprefix().'kabupaten.Kd_Provinsi = '.dbprefix().'kecamatan.Kd_Provinsi AND '.dbprefix().'kabupaten.Kd_Kabupaten = '.dbprefix().'kecamatan.Kd_Kabupaten
		WHERE '.dbprefix().'kecamatan.Status = 1 ORDER BY '.dbprefix().'kecamatan.Nm_Kecamatan ASC
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
		//$a = $this->db->where('Status',1)->get(''.dbprefix().'desa');
		$a = $this->db->query('SELECT
'.dbprefix().'desa.Kd_Kecamatan,
'.dbprefix().'kecamatan.Nm_Kecamatan,
'.dbprefix().'desa.Kd_Desa,
'.dbprefix().'desa.Nm_Desa
FROM
'.dbprefix().'desa
Inner Join '.dbprefix().'kecamatan ON '.dbprefix().'desa.Kd_Negara = '.dbprefix().'kecamatan.Kd_Negara AND '.dbprefix().'desa.Kd_Provinsi = '.dbprefix().'kecamatan.Kd_Provinsi AND '.dbprefix().'desa.Kd_Kabupaten = '.dbprefix().'kecamatan.Kd_Kabupaten AND '.dbprefix().'desa.Kd_Kecamatan = '.dbprefix().'kecamatan.Kd_Kecamatan
WHERE '.dbprefix().'desa.Status = 1 ORDER BY '.dbprefix().'desa.Nm_Desa ASC
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
		//$a = $this->db->where('Status',1)->get(''.dbprefix().'dusun');
		$a = $this->db->query('SELECT
'.dbprefix().'dusun.Kd_Dusun,
'.dbprefix().'dusun.Nm_Dusun,
'.dbprefix().'desa.Kd_Desa,
'.dbprefix().'desa.Nm_Desa,
'.dbprefix().'kecamatan.Kd_Kecamatan,
'.dbprefix().'kecamatan.Nm_Kecamatan
FROM
'.dbprefix().'dusun
Inner Join '.dbprefix().'desa ON '.dbprefix().'dusun.Kd_Negara = '.dbprefix().'desa.Kd_Negara AND '.dbprefix().'dusun.Kd_Provinsi = '.dbprefix().'desa.Kd_Provinsi AND '.dbprefix().'dusun.Kd_Kabupaten = '.dbprefix().'desa.Kd_Kabupaten AND '.dbprefix().'dusun.Kd_Kecamatan = '.dbprefix().'desa.Kd_Kecamatan AND '.dbprefix().'dusun.Kd_Desa = '.dbprefix().'desa.Kd_Desa
Inner Join '.dbprefix().'kecamatan ON '.dbprefix().'dusun.Kd_Negara = '.dbprefix().'kecamatan.Kd_Negara AND '.dbprefix().'dusun.Kd_Provinsi = '.dbprefix().'kecamatan.Kd_Provinsi AND '.dbprefix().'dusun.Kd_Kabupaten = '.dbprefix().'kecamatan.Kd_Kabupaten AND '.dbprefix().'dusun.Kd_Kecamatan = '.dbprefix().'kecamatan.Kd_Kecamatan
WHERE '.dbprefix().'dusun.Status = 1 ORDER BY '.dbprefix().'dusun.Nm_Dusun ASC
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
		$del = $this->db->delete(''.dbprefix().'auth_user',$wh);
		
		//HAPUS DULU RELATIONNYA//
		/*$this->db->delete(''.dbprefix().'relation_user_region',$wh);
		$region = $this->input->post('op_region');
		$negara = $this->input->post('op_negara');
		$provinsi = $this->input->post('op_provinsi');
		$kabupaten = $this->input->post('op_kabupaten');
		$kecamatan = $this->input->post('op_kecamatan');
		$desa = $this->input->post('op_desa');
		$dusun = $this->input->post('op_dusun');
		switch($region){
			case 1:
				if(is_array($negara)){
					$cnegara = count($negara);
					for($n=0;$n<$cnegara;$n++){
						$a = $this->db->where('Kd_Negara',$negara[$n])->get(''.dbprefix().'negara');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = 0;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 2:
				if(is_array($provinsi)){
					$cprovinsi = count($provinsi);
					for($n=0;$n<$cprovinsi;$n++){
						$a = $this->db->where('Kd_Provinsi',$provinsi[$n])->get(''.dbprefix().'provinsi');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 3:
				if(is_array($kabupaten)){
					$ckabupaten = count($kabupaten);
					for($n=0;$n<$ckabupaten;$n++){
						$a = $this->db->where('Kd_Kabupaten',$kabupaten[$n])->get(''.dbprefix().'kabupaten');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 4:
				if(is_array($kecamatan)){
					$ckecamatan = count($kecamatan);
					for($n=0;$n<$ckecamatan;$n++){
						$a = $this->db->where('Kd_Kecamatan',$kecamatan[$n])->get(''.dbprefix().'kecamatan');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 5:
				if(is_array($desa)){
					$cdesa = count($desa);
					for($n=0;$n<$cdesa;$n++){
						$a = $this->db->where('Kd_Desa',$desa[$n])->get(''.dbprefix().'desa');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 6:
				if(is_array($dusun)){
					$cdusun = count($dusun);
					for($n=0;$n<$cdusun;$n++){
						$a = $this->db->where('Kd_Dusun',$dusun[$n])->get(''.dbprefix().'dusun');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = $aa->Kd_Dusun;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
		}
		*/
		
		$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_User'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert(''.dbprefix().'auth_user',$in);
			}
		}
		
		set_alert('success','Hak akses user berhasil disimpan');
		redirect(current_url());
	}
	
	function slc_region($user=0){
		$a = $this->db->where('ID_User',$user)->get(''.dbprefix().'relation_user_region');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_Region;
		}
		return $h;
	}
	
	function slc_negara($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',1)->get(''.dbprefix().'relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Negara;
			}
		}
		return $h;
	}
	
	function slc_provinsi($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',2)->get(''.dbprefix().'relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Provinsi;
			}
		}
		return $h;
	}
	
	function slc_kabupaten($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',3)->get(''.dbprefix().'relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kabupaten;
			}
		}
		return $h;
	}
	
	function slc_kecamatan($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',4)->get(''.dbprefix().'relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kecamatan;
			}
		}
		return $h;
	}
	
	function slc_desa($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',5)->get(''.dbprefix().'relation_user_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Desa;
			}
		}
		return $h;
	}
	
	function slc_dusun($user=0){
		$a = $this->db->where('ID_User',$user)->where('ID_Region',6)->get(''.dbprefix().'relation_user_region');
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
		$wh['ID_Level'] = $usr;
		$del = $this->db->delete(''.dbprefix().'auth_level',$wh);
		
		//HAPUS DULU RELATIONNYA//
		/*$this->db->delete(''.dbprefix().'relation_level_region',$wh);
		$region = $this->input->post('op_region');
		$negara = $this->input->post('op_negara');
		$provinsi = $this->input->post('op_provinsi');
		$kabupaten = $this->input->post('op_kabupaten');
		$kecamatan = $this->input->post('op_kecamatan');
		$desa = $this->input->post('op_desa');
		$dusun = $this->input->post('op_dusun');
		switch($region){
			case 1:
				if(is_array($negara)){
					$cnegara = count($negara);
					for($n=0;$n<$cnegara;$n++){
						$a = $this->db->where('Kd_Negara',$negara[$n])->get(''.dbprefix().'negara');
						foreach($a->result() as $aa){
							$in2['ID_Level'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = 0;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_level_region',$in2);
						}
					}
				}
				break;
			case 2:
				if(is_array($provinsi)){
					$cprovinsi = count($provinsi);
					for($n=0;$n<$cprovinsi;$n++){
						$a = $this->db->where('Kd_Provinsi',$provinsi[$n])->get(''.dbprefix().'provinsi');
						foreach($a->result() as $aa){
							$in2['ID_Level'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_level_region',$in2);
						}
					}
				}
				break;
			case 3:
				if(is_array($kabupaten)){
					$ckabupaten = count($kabupaten);
					for($n=0;$n<$ckabupaten;$n++){
						$a = $this->db->where('Kd_Kabupaten',$kabupaten[$n])->get(''.dbprefix().'kabupaten');
						foreach($a->result() as $aa){
							$in2['ID_Level'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_level_region',$in2);
						}
					}
				}
				break;
			case 4:
				if(is_array($kecamatan)){
					$ckecamatan = count($kecamatan);
					for($n=0;$n<$ckecamatan;$n++){
						$a = $this->db->where('Kd_Kecamatan',$kecamatan[$n])->get(''.dbprefix().'kecamatan');
						foreach($a->result() as $aa){
							$in2['ID_Level'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_level_region',$in2);
						}
					}
				}
				break;
			case 5:
				if(is_array($desa)){
					$cdesa = count($desa);
					for($n=0;$n<$cdesa;$n++){
						$a = $this->db->where('Kd_Desa',$desa[$n])->get(''.dbprefix().'desa');
						foreach($a->result() as $aa){
							$in2['ID_Level'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_level_region',$in2);
						}
					}
				}
				break;
			case 6:
				if(is_array($dusun)){
					$cdusun = count($dusun);
					for($n=0;$n<$cdusun;$n++){
						$a = $this->db->where('Kd_Dusun',$dusun[$n])->get(''.dbprefix().'dusun');
						foreach($a->result() as $aa){
							$in2['ID_Level'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = $aa->Kd_Dusun;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_level_region',$in2);
						}
					}
				}
				break;
		}
		*/
		
		$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_Level'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert(''.dbprefix().'auth_level',$in);
			}
			set_alert('success','Hak akses level berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Hak akses level gagal disimpan');
			redirect(current_url());
		}
	}
	
	function slc_region_level($user=0){
		$a = $this->db->where('ID_Level',$user)->get(''.dbprefix().'relation_level_region');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_Region;
		}
		return $h;
	}
	
	function slc_negara_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',1)->get(''.dbprefix().'relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Negara;
			}
		}
		return $h;
	}
	
	function slc_provinsi_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',2)->get(''.dbprefix().'relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Provinsi;
			}
		}
		return $h;
	}
	
	function slc_kabupaten_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',3)->get(''.dbprefix().'relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kabupaten;
			}
		}
		return $h;
	}
	
	function slc_kecamatan_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',4)->get(''.dbprefix().'relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kecamatan;
			}
		}
		return $h;
	}
	
	function slc_desa_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',5)->get(''.dbprefix().'relation_level_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Desa;
			}
		}
		return $h;
	}
	
	function slc_dusun_level($user=0){
		$a = $this->db->where('ID_Level',$user)->where('ID_Region',6)->get(''.dbprefix().'relation_level_region');
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
		$del = $this->db->delete(''.dbprefix().'auth_group',$wh);
		
		//HAPUS DULU RELATIONNYA//
		/*$this->db->delete(''.dbprefix().'relation_group_region',$wh);
		$region = $this->input->post('op_region');
		$negara = $this->input->post('op_negara');
		$provinsi = $this->input->post('op_provinsi');
		$kabupaten = $this->input->post('op_kabupaten');
		$kecamatan = $this->input->post('op_kecamatan');
		$desa = $this->input->post('op_desa');
		$dusun = $this->input->post('op_dusun');
		switch($region){
			case 1:
				if(is_array($negara)){
					$cnegara = count($negara);
					for($n=0;$n<$cnegara;$n++){
						$a = $this->db->where('Kd_Negara',$negara[$n])->get(''.dbprefix().'negara');
						foreach($a->result() as $aa){
							$in2['ID_Group'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = 0;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_group_region',$in2);
						}
					}
				}
				break;
			case 2:
				if(is_array($provinsi)){
					$cprovinsi = count($provinsi);
					for($n=0;$n<$cprovinsi;$n++){
						$a = $this->db->where('Kd_Provinsi',$provinsi[$n])->get(''.dbprefix().'provinsi');
						foreach($a->result() as $aa){
							$in2['ID_Group'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_group_region',$in2);
						}
					}
				}
				break;
			case 3:
				if(is_array($kabupaten)){
					$ckabupaten = count($kabupaten);
					for($n=0;$n<$ckabupaten;$n++){
						$a = $this->db->where('Kd_Kabupaten',$kabupaten[$n])->get(''.dbprefix().'kabupaten');
						foreach($a->result() as $aa){
							$in2['ID_Group'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_group_region',$in2);
						}
					}
				}
				break;
			case 4:
				if(is_array($kecamatan)){
					$ckecamatan = count($kecamatan);
					for($n=0;$n<$ckecamatan;$n++){
						$a = $this->db->where('Kd_Kecamatan',$kecamatan[$n])->get(''.dbprefix().'kecamatan');
						foreach($a->result() as $aa){
							$in2['ID_Group'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_group_region',$in2);
						}
					}
				}
				break;
			case 5:
				if(is_array($desa)){
					$cdesa = count($desa);
					for($n=0;$n<$cdesa;$n++){
						$a = $this->db->where('Kd_Desa',$desa[$n])->get(''.dbprefix().'desa');
						foreach($a->result() as $aa){
							$in2['ID_Group'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_group_region',$in2);
						}
					}
				}
				break;
			case 6:
				if(is_array($dusun)){
					$cdusun = count($dusun);
					for($n=0;$n<$cdusun;$n++){
						$a = $this->db->where('Kd_Dusun',$dusun[$n])->get(''.dbprefix().'dusun');
						foreach($a->result() as $aa){
							$in2['ID_Group'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = $aa->Kd_Dusun;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_group_region',$in2);
						}
					}
				}
				break;
		}
		*/
		
		$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_Group'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert(''.dbprefix().'auth_group',$in);
			}
			set_alert('success','Hak akses group berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Hak akses group gagal disimpan');
			redirect(current_url());
		}
	}
	
	function slc_region_group($user=0){
		$a = $this->db->where('ID_Group',$user)->get(''.dbprefix().'relation_group_region');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_Region;
		}
		return $h;
	}
	
	function slc_negara_group($user=0){
		$a = $this->db->where('ID_Group',$user)->where('ID_Region',1)->get(''.dbprefix().'relation_group_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Negara;
			}
		}
		return $h;
	}
	
	function slc_provinsi_group($user=0){
		$a = $this->db->where('ID_Group',$user)->where('ID_Region',2)->get(''.dbprefix().'relation_group_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Provinsi;
			}
		}
		return $h;
	}
	
	function slc_kabupaten_group($user=0){
		$a = $this->db->where('ID_Group',$user)->where('ID_Region',3)->get(''.dbprefix().'relation_group_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kabupaten;
			}
		}
		return $h;
	}
	
	function slc_kecamatan_group($user=0){
		$a = $this->db->where('ID_Group',$user)->where('ID_Region',4)->get(''.dbprefix().'relation_group_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Kecamatan;
			}
		}
		return $h;
	}
	
	function slc_desa_group($user=0){
		$a = $this->db->where('ID_Group',$user)->where('ID_Region',5)->get(''.dbprefix().'relation_group_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Desa;
			}
		}
		return $h;
	}
	
	function slc_dusun_group($user=0){
		$a = $this->db->where('ID_Group',$user)->where('ID_Region',6)->get(''.dbprefix().'relation_group_region');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->Kd_Dusun;
			}
		}
		return $h;
	}
	
	function insert_auth_region($id=0){
		if($id != 0){
			$usr = $id;
		}
		else{
			$usr = $this->get_last_id();
		}
		//$usr = $this->input->post('op_user');
		//$this->session->set_flashdata('op_user',$usr);
		$wh['ID_User'] = $usr;
		//$del = $this->db->delete(''.dbprefix().'auth_user',$wh);
		
		//HAPUS DULU RELATIONNYA//
		/*$this->db->delete(''.dbprefix().'relation_user_region',$wh);
		$region = $this->input->post('op_region');
		$negara = $this->input->post('op_negara');
		$provinsi = $this->input->post('op_provinsi');
		$kabupaten = $this->input->post('op_kabupaten');
		$kecamatan = $this->input->post('op_kecamatan');
		$desa = $this->input->post('op_desa');
		$dusun = $this->input->post('op_dusun');
		switch($region){
			case 1:
				if(is_array($negara)){
					$cnegara = count($negara);
					for($n=0;$n<$cnegara;$n++){
						$a = $this->db->where('Kd_Negara',$negara[$n])->get(''.dbprefix().'negara');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = 0;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 2:
				if(is_array($provinsi)){
					$cprovinsi = count($provinsi);
					for($n=0;$n<$cprovinsi;$n++){
						$a = $this->db->where('Kd_Provinsi',$provinsi[$n])->get(''.dbprefix().'provinsi');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = 0;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 3:
				if(is_array($kabupaten)){
					$ckabupaten = count($kabupaten);
					for($n=0;$n<$ckabupaten;$n++){
						$a = $this->db->where('Kd_Kabupaten',$kabupaten[$n])->get(''.dbprefix().'kabupaten');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = 0;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 4:
				if(is_array($kecamatan)){
					$ckecamatan = count($kecamatan);
					for($n=0;$n<$ckecamatan;$n++){
						$a = $this->db->where('Kd_Kecamatan',$kecamatan[$n])->get(''.dbprefix().'kecamatan');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = 0;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 5:
				if(is_array($desa)){
					$cdesa = count($desa);
					for($n=0;$n<$cdesa;$n++){
						$a = $this->db->where('Kd_Desa',$desa[$n])->get(''.dbprefix().'desa');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = 0;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
			case 6:
				if(is_array($dusun)){
					$cdusun = count($dusun);
					for($n=0;$n<$cdusun;$n++){
						$a = $this->db->where('Kd_Dusun',$dusun[$n])->get(''.dbprefix().'dusun');
						foreach($a->result() as $aa){
							$in2['ID_User'] = $usr;
							$in2['ID_Region'] = $region;
							$in2['Kd_Negara'] = $aa->Kd_Negara;
							$in2['Kd_Provinsi'] = $aa->Kd_Provinsi;
							$in2['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
							$in2['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
							$in2['Kd_Desa'] = $aa->Kd_Desa;
							$in2['Kd_Dusun'] = $aa->Kd_Dusun;
							$in2['RT'] = 0;
							$in2['RW'] = 0;
							$in2['No_KK'] = 0;
							$in2['NIK'] = 0;
							$this->db->insert(''.dbprefix().'relation_user_region',$in2);
						}
					}
				}
				break;
		}
		*/
		
		/*$mdl = $this->input->post('modul');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_User'] = $usr;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert(''.dbprefix().'auth_user',$in);
			}
		}*/
		
		//set_alert('success','Akses region berhasil disimpan');
		//redirect(current_url());
	}
	
	function get_last_id(){
		$a = $this->db->order_by('ID_User','desc')->get(''.dbprefix().'user');
		$result = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$result = $aa->ID_User;
		}
		return $result;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//=======================
	
	function op_tahun_ajaran(){
		if($this->input->post('op_ta')){
			$a = $this->session->set_userdata('op_ta',$this->input->post('op_ta'));
		}
		
		if($this->session->userdata('op_ta') == ''){
			$b = $this->session->set_userdata('op_ta','ALL');
		}
		
		$a = $this->db->where('_status',1)->order_by('_name','desc')->get('_sysfo_paud_ta');
		$d = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d['ALL'] = '- Semua Tahun Ajaran -';
				$d[$aa->_id] = $aa->_name;
			}
		}
		return $d;
	}
	
	function op_sorting(){
		if($this->input->post('op_sorting')){
			$a = $this->session->set_userdata('op_sorting_users',$this->input->post('op_sorting'));
		}
		elseif($this->session->userdata('op_sorting') == ''){
			$b = $this->session->set_userdata('op_sorting_users','1');
		}
		
		$d = array();	
		$d['0'] = '- Pilih Sorting -';
		$d['1'] = 'Username (ASC)';
		$d['2'] = 'Username (DESC)';
		$d['3'] = 'Name (ASC)';
		$d['4'] = 'Name (DESC)';
		$d['5'] = 'User ID (ASC)';
		$d['6'] = 'User ID (DESC)';
		return $d;
	}
	
	function op_view(){
		if($this->input->post('op_view')){
			$a = $this->session->set_userdata('op_view',$this->input->post('op_view'));
		}
		
		if($this->session->userdata('op_view') == ''){
			$b = $this->session->set_userdata('op_view','25');
		}
		
		$d = array();		
		$d['25'] = '25 data';
		$d['50'] = '50 data';
		$d['100'] = '100 data';
		$d['250'] = '250 data';
		return $d;
	}
	
	function op_status_reg(){
		if($this->input->post('op_status_reg')){
			$a = $this->session->set_userdata('op_status_reg',$this->input->post('op_status_reg'));
		}
		
		if($this->session->userdata('op_status_reg') == ''){
			$b = $this->session->set_userdata('op_status_reg','ALL');
		}
		
		$a = $this->db->where('_status',1)->order_by('_id','asc')->get('_sysfo_paud_reg_status');
		$result = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $ab)
			{
				$result['ALL'] = '- Semua Status -';
				$result[$ab->_id] = $ab->_name;
			}
		}
		return $result;
	}
	
	function op_ubah_status(){
		if($this->input->post('op_status_reg')){
			$a = $this->session->set_userdata('op_status_reg',$this->input->post('op_status_reg'));
		}
		
		if($this->session->userdata('op_status_reg') == ''){
			$b = $this->session->set_userdata('op_status_reg','ALL');
		}
		
		$a = $this->db->where('_status',1)->order_by('_id','asc')->get('_sysfo_paud_reg_status');
		$result = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $ab)
			{
				$result[$ab->_id] = $ab->_name;
			}
		}
		return $result;
	}
	
	function insert_registrasi(){
		$a = '';
		$this->form_validation->set_rules('ta','Tahun Akademi','is_natural_no_zero');
		//$this->form_validation->set_rules('fakultas','Fakultas','is_natural_no_zero');
		//$this->form_validation->set_rules('prodi','Program Studi','is_natural_no_zero');
		//$this->form_validation->set_rules('jalur','Jalur','is_natural_no_zero');
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('nickname','Nama Panggilan','required');
		$this->form_validation->set_rules('gender','Jenis Kelamin','required');
		$this->form_validation->set_rules('tmp_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','is_natural_no_zero');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('rt','RT','');
		$this->form_validation->set_rules('rw','RW','');
		$this->form_validation->set_rules('desa','Desa','required');
		$this->form_validation->set_rules('kecamatan','Kecamatan','required');
		$this->form_validation->set_rules('kota','Kota','required');
		$this->form_validation->set_rules('provinsi','Provinsi','required');
		$this->form_validation->set_rules('negara','Negara','required');
		$this->form_validation->set_rules('anak_ke','Anak ke','required');
		$this->form_validation->set_rules('jml_saudara','Jumlah Saudara','required');
		$this->form_validation->set_rules('penyakit','Riwayat Penyakit','');
		
		$this->form_validation->set_rules('nama_ayah','Nama Ayah','required');
		$this->form_validation->set_rules('tmp_lahir_ayah','Tempat Lahir Ayah','required');
		$this->form_validation->set_rules('tgl_lahir_ayah','Tanggal Lahir Ayah','required');
		$this->form_validation->set_rules('agama_ayah','Agama Ayah','is_natural_no_zero');
		$this->form_validation->set_rules('pendidikan_ayah','Pendidikan Ayah','required|is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan_ayah','Pekerjaan Ayah','required');
				
		$this->form_validation->set_rules('nama_ibu','Nama Ibu','required');
		$this->form_validation->set_rules('tmp_lahir_ibu','Tempat Lahir Ibu','required');
		$this->form_validation->set_rules('tgl_lahir_ibu','Tanggal Lahir Ibu','required');
		$this->form_validation->set_rules('agama_ibu','Agama Ibu','is_natural_no_zero');
		$this->form_validation->set_rules('pendidikan_ibu','Pendidikan Ibu','required|is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan_ibu','Pekerjaan Ibu','required');
		
		
		$this->form_validation->set_rules('email','Email','');
		$this->form_validation->set_rules('phone','Telp. Rumah','');
		
		if($this->form_validation->run() == TRUE){
		
			$ta = $this->input->post('ta');
			$code_ta = $this->get_code_ta($ta);
			$id = $this->get_last_id();
			$no = $this->get_last_no($ta);
			$in['_id'] = $id;
			$in['_no'] = $no;
			$in['_no_daftar'] = $no_daftar = $code_ta.str_pad($no, 5, '0', STR_PAD_LEFT);
			$in['_ta'] 	= $this->input->post('ta');
			$in['_name'] = $this->input->post('name');
			$in['_nickname'] = $this->input->post('nickname');
			$in['_gender'] = $this->input->post('gender');
			$in['_tmp_lahir'] = $this->input->post('tmp_lahir');
			$in['_tgl_lahir'] = $timeq = db_time($this->input->post('tgl_lahir'));
			$in['_agama'] = $this->input->post('agama');
			$in['_alamat'] = $this->input->post('alamat');
			$in['_rt'] = $this->input->post('rt');
			$in['_rw'] = $this->input->post('rw');
			$in['_desa'] = $this->input->post('desa');
			$in['_kecamatan'] = $this->input->post('kecamatan');
			$in['_kota'] = $this->input->post('kota');
			$in['_provinsi'] = $this->input->post('provinsi');
			$in['_negara'] = $this->input->post('negara');
			$in['_anak_ke'] = $this->input->post('anak_ke');
			$in['_jml_saudara'] = $this->input->post('jml_saudara');
			$in['_penyakit'] = $this->input->post('penyakit');
			
			$in['_nama_ayah'] = $this->input->post('nama_ayah');
			$in['_tmp_lahir_ayah'] = $this->input->post('tmp_lahir_ayah');
			$in['_tgl_lahir_ayah'] = db_time($this->input->post('tgl_lahir_ayah'));
			$in['_agama_ayah'] = $this->input->post('agama_ayah');
			$in['_pendidikan_ayah'] = $this->input->post('pendidikan_ayah');
			$in['_pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');
			$in['_nama_ibu'] = $this->input->post('nama_ibu');
			$in['_tmp_lahir_ibu'] = $this->input->post('tmp_lahir_ibu');
			$in['_tgl_lahir_ibu'] = db_time($this->input->post('tgl_lahir_ibu'));
			$in['_agama_ibu'] = $this->input->post('agama_ibu');
			$in['_pendidikan_ibu'] = $this->input->post('pendidikan_ibu');
			$in['_pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');
			
			$in['_email'] = $this->input->post('email');
			$in['_phone'] = $this->input->post('phone');
			
			$in['_time'] = db_time(time());
			$in['_status'] = 1;
			
			$a = $this->db->insert('_sysfo_paud_reg_data',$in);
			if($a){
				set_alert('success','Pendaftaran anda berhasil dikirim.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else{
				set_alert('error','Pendaftaran anda gagal dikirim, silakan ulangi lagi ');
				redirect(current_url());
			}
		}
	}
	
	function update_registrasi($id){
		$a = '';
		$this->form_validation->set_rules('ta','Tahun Akademi','is_natural_no_zero');
		//$this->form_validation->set_rules('fakultas','Fakultas','is_natural_no_zero');
		//$this->form_validation->set_rules('prodi','Program Studi','is_natural_no_zero');
		//$this->form_validation->set_rules('jalur','Jalur','is_natural_no_zero');
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('nickname','Nama Panggilan','required');
		$this->form_validation->set_rules('gender','Jenis Kelamin','required');
		$this->form_validation->set_rules('tmp_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','is_natural_no_zero');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('rt','RT','');
		$this->form_validation->set_rules('rw','RW','');
		$this->form_validation->set_rules('desa','Desa','required');
		$this->form_validation->set_rules('kecamatan','Kecamatan','required');
		$this->form_validation->set_rules('kota','Kota','required');
		$this->form_validation->set_rules('provinsi','Provinsi','required');
		$this->form_validation->set_rules('negara','Negara','required');
		$this->form_validation->set_rules('anak_ke','Anak ke','required');
		$this->form_validation->set_rules('jml_saudara','Jumlah Saudara','required');
		$this->form_validation->set_rules('penyakit','Riwayat Penyakit','');
		
		$this->form_validation->set_rules('nama_ayah','Nama Ayah','required');
		$this->form_validation->set_rules('tmp_lahir_ayah','Tempat Lahir Ayah','required');
		$this->form_validation->set_rules('tgl_lahir_ayah','Tanggal Lahir Ayah','required');
		$this->form_validation->set_rules('agama_ayah','Agama Ayah','is_natural_no_zero');
		$this->form_validation->set_rules('pendidikan_ayah','Pendidikan Ayah','required|is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan_ayah','Pekerjaan Ayah','required');
				
		$this->form_validation->set_rules('nama_ibu','Nama Ibu','required');
		$this->form_validation->set_rules('tmp_lahir_ibu','Tempat Lahir Ibu','required');
		$this->form_validation->set_rules('tgl_lahir_ibu','Tanggal Lahir Ibu','required');
		$this->form_validation->set_rules('agama_ibu','Agama Ibu','is_natural_no_zero');
		$this->form_validation->set_rules('pendidikan_ibu','Pendidikan Ibu','required|is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan_ibu','Pekerjaan Ibu','required');
		
		
		$this->form_validation->set_rules('email','Email','');
		$this->form_validation->set_rules('phone','Telp. Rumah','');
		
		if($this->form_validation->run() == TRUE){
		
			$ta = $this->input->post('ta');
			$code_ta = $this->get_code_ta($ta);
			//$id = $this->get_last_id();
			//$no = $this->get_last_no($ta);
			$wh['_id'] = $id;
			//$in['_no'] = $no;
			//$in['_no_daftar'] = $no_daftar = $code_ta.str_pad($no, 5, '0', STR_PAD_LEFT);
			$in['_ta'] 	= $this->input->post('ta');
			$in['_name'] = $this->input->post('name');
			$in['_nickname'] = $this->input->post('nickname');
			$in['_gender'] = $this->input->post('gender');
			$in['_tmp_lahir'] = $this->input->post('tmp_lahir');
			$in['_tgl_lahir'] = $timeq = db_time($this->input->post('tgl_lahir'));
			$in['_agama'] = $this->input->post('agama');
			$in['_alamat'] = $this->input->post('alamat');
			$in['_rt'] = $this->input->post('rt');
			$in['_rw'] = $this->input->post('rw');
			$in['_desa'] = $this->input->post('desa');
			$in['_kecamatan'] = $this->input->post('kecamatan');
			$in['_kota'] = $this->input->post('kota');
			$in['_provinsi'] = $this->input->post('provinsi');
			$in['_negara'] = $this->input->post('negara');
			$in['_anak_ke'] = $this->input->post('anak_ke');
			$in['_jml_saudara'] = $this->input->post('jml_saudara');
			$in['_penyakit'] = $this->input->post('penyakit');
			
			$in['_nama_ayah'] = $this->input->post('nama_ayah');
			$in['_tmp_lahir_ayah'] = $this->input->post('tmp_lahir_ayah');
			$in['_tgl_lahir_ayah'] = db_time($this->input->post('tgl_lahir_ayah'));
			$in['_agama_ayah'] = $this->input->post('agama_ayah');
			$in['_pendidikan_ayah'] = $this->input->post('pendidikan_ayah');
			$in['_pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');
			$in['_nama_ibu'] = $this->input->post('nama_ibu');
			$in['_tmp_lahir_ibu'] = $this->input->post('tmp_lahir_ibu');
			$in['_tgl_lahir_ibu'] = db_time($this->input->post('tgl_lahir_ibu'));
			$in['_agama_ibu'] = $this->input->post('agama_ibu');
			$in['_pendidikan_ibu'] = $this->input->post('pendidikan_ibu');
			$in['_pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');
			
			$in['_email'] = $this->input->post('email');
			$in['_phone'] = $this->input->post('phone');
			
			//$in['_time'] = db_time(time());
			//$in['_status'] = 1;
			
			$a = $this->db->update('_sysfo_paud_reg_data',$in,$wh);
			if($a){
				set_alert('success','Pendaftaran anda berhasil diupdate.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else{
				set_alert('error','Pendaftaran anda gagal diupdate, silakan ulangi lagi ');
				redirect(current_url());
			}
		}
	}
	
	function get_code_ta($id=0){
		$a = $this->db->where('_id',$id)->get('_sysfo_paud_ta');
		$result = '';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$result = $aa->_code;
		}
		return $result;
	}
	
	/*function get_last_id(){
		$a = $this->db->order_by('_id','desc')->get('_sysfo_paud_reg_data');
		$result = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$result = $aa->_id;
		}
		return $result+1;
	}*/
	
	function get_last_no($ta=0){
		$a = $this->db->where('_ta',$ta)->order_by('_id','desc')->get('_sysfo_paud_reg_data');
		$result = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$result = $aa->_no;
		}
		return $result+1;
	}
	
	function op_agama(){
		$a = $this->db->where('_status',1)->get('_form_agama');
		$result = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $ab)
			{
				$result[0] = '- Pilih -';
				$result[$ab->_id] = $ab->_name;
			}
		}
		return $result;
	}
	
	function op_pendidikan(){
		$a = $this->db->where('_status',1)->order_by('_id','asc')->get('_form_pendidikan');
		$result = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $ab)
			{
				$result[0] = '- Pilih -';
				$result[$ab->_id] = $ab->_name;
			}
		}
		return $result;
	}
	
	function get_data_reg($id=0){
		$a = $this->db->where('_id',$id)->get('_sysfo_paud_reg_data');
		return $a;
	}
	
	function get_data_report($id=0){
		$a = $this->db->query('select a.*,
		(select _name from _sysfo_paud_ta where _id=a._ta) as _ta_name,
		(select _name from _form_agama where _id=a._agama) as _agama_name,
		(select _name from _form_agama where _id=a._agama_ayah) as _agama_ayah_name,
		(select _name from _form_agama where _id=a._agama_ibu) as _agama_ibu_name,
		(select _name from _form_pendidikan where _id=a._pendidikan_ayah) as _pendidikan_ayah_name,
		(select _name from _form_pendidikan where _id=a._pendidikan_ibu) as _pendidikan_ibu_name
		from _sysfo_paud_reg_data a where a._id = "'.$id.'"');
		return $a;
	}
	
	function get_data_report_name($id=0){
		$a = $this->db->where('_id',$id)->get('_sysfo_paud_reg_data');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = $aa->_name;
		}
		return $h;
	}
	
	function delete_reg(){
		$data = $this->input->post('chk');
		if(is_array($data) > 0){
			foreach($data as $d){
				$id['_id'] = $d;
				$this->db->delete('_sysfo_paud_reg_data',$id);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ups... ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function ubah_status_reg(){
		$data = $this->input->post('chk');
		$status = $this->input->post('ubah_status_reg');
		if(is_array($data) > 0){
			foreach($data as $d){
				$id['_id'] = $d;
				$in['_status'] = $status;
				$this->db->update('_sysfo_paud_reg_data',$in,$id);
			}
			set_alert('success','Data berhasil diupdate');
			redirect(current_url());
		}
		else{
			set_alert('error','Ups... ada kesalahan, data gagal diupdate');
			redirect(current_url());
		}
	}
	
	function ubah_status_reg2(){
		$data = $this->input->post('chk');
		$status = $this->input->post('ubah_status_reg2');
		if(is_array($data) > 0){
			foreach($data as $d){
				$id['_id'] = $d;
				$in['_status'] = $status;
				$this->db->update('_sysfo_paud_reg_data',$in,$id);
			}
			set_alert('success','Data berhasil diupdate');
			redirect(current_url());
		}
		else{
			set_alert('error','Ups... ada kesalahan, data gagal diupdate');
			redirect(current_url());
		}
	}
	
	// ---------- PEMBAYARAN ----------//
	
	function column_bayar(){
		$a = $this->db->where('_status',1)->order_by('_id','asc')->get('_sysfo_paud_reg_bayar');
		return $a;
	}
	
	function insert_bayar(){
		$tahun = $ta = $this->input->post('ta');
		$in['_nominal'] = $nominal = str_replace('.','',$this->input->post('nominal'));
		$in['_user'] = $user = $this->input->post('user');
		$in['_item'] = $item = $this->input->post('item');
		$in['_time'] = $time = db_time($this->input->post('time'));
		$this->db->insert('_sysfo_paud_reg_bayar_log',$in);
		$this->session->set_flashdata('WindowClose',1);
		
		//===== input ke field keuangan ====/
		$ket = $this->get_name_bayar($item);
		$keu['_user'] = 0;
		$keu['_d'] =  $nominal;
		$keu['_term'] = 'reg';
		$keu['_time'] = db_time(TimeNow());
		$keu['_keterangan'] = 'Pembayaran '.$ket.' a.n '.$this->input->post('name');
		$this->db->insert('_keu_transaksi',$keu);
		
		$sisa_bayar = get_sisa_bayar($user,$item,$tahun);
		if($sisa_bayar == 0){
			$a = $this->db->where('_id',$user)->get('_sysfo_paud_reg_data');
			$status_now = 2; // Sesuai ID Status Registrasi
			if($a->num_rows() > 0){
				$aa = $a->row();
				$status = $aa->_status;
				if($status < $status_now){
					$wh['_id'] = $user;
					$in2['_status'] = 2;
					$this->db->update('_sysfo_paud_reg_data',$in2,$wh);
				}
			}
			
		}
		set_alert('success','Pembayaran berhasil ditambahkan');
		redirect(current_url());
	}
	
	function get_ta_user($id=0){
		$a = $this->db->where('_id',$id)->get('_sysfo_paud_reg_data');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->_ta;
		}
		return $h;
	}
	
	function get_name_bayar($id=0){
		$h = '';
		$a = $this->db->where('_id',$id)->get('_sysfo_paud_reg_bayar');
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->_name;
		}
		return $h;
	}
	
	function data_daftar_diterima($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$order = 'ORDER BY  _sysfo_paud_reg_data._name ASC';
		
		/*if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}*/
		
		if($this->session->userdata('op_ta') != 'ALL'){
			$q_where .= 'AND _sysfo_paud_reg_data._ta = "'.$this->session->userdata('op_ta').'" '; 
		}
		
		if($this->session->userdata('op_status_reg') != 'ALL'){
			$q_where .= 'AND _sysfo_paud_reg_data._status = "'.$this->session->userdata('op_status_reg').'" '; 
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('search');
			$q_where .= 'AND (_sysfo_paud_reg_data._no_daftar like "%'.$keyword.'%" OR _sysfo_paud_reg_data._name like "%'.$keyword.'%" OR _sysfo_paud_reg_data._desa like "%'.$keyword.'%" OR _sysfo_paud_reg_data._kecamatan like "%'.$keyword.'%" OR _sysfo_paud_reg_data._kota like "%'.$keyword.'%")';
		}
		
		/*$order = $this->session->userdata('op_sorting');
		switch($order){
			case 1:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._time ASC';
				break;
			case 2:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._time DESC';
				break;
			case 3:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._name ASC';
				break;
			case 4:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._name DESC';
				break;
			case 5:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._status,_sysfo_paud_reg_data._id ASC';
				break;
			case 6:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._status DESC, _sysfo_paud_reg_data._id ASC';
				break;
			default:
				$q_order = 'ORDER BY _sysfo_paud_reg_data._name ASC';
				break;
		}*/
		
		
		$a = $this->db->query('SELECT
			_sysfo_paud_reg_data.*,
			_sysfo_paud_reg_status._name as _status_name
			FROM
			_sysfo_paud_reg_data
			Inner Join _sysfo_paud_reg_status ON _sysfo_paud_reg_status._id = _sysfo_paud_reg_data._status
			WHERE
			_sysfo_paud_reg_data._status = 10 AND _sysfo_paud_reg_data._induk_status = 0 '.$q_where.' '.$order.' '.$q_limit.'');
		return $a;
	}
	
	function get_last_induk(){
		$h = 0;
		$a = $this->db->order_by('_no_induk','desc')->get('_sysfo_paud_data_siswa');
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->_no_induk;
		}
		return $h+1;
	}
	
	function cek_last_induk(){
		$h = 0;
		$last = ($this->get_last_induk())-1;
		$last2 = $this->get_last_induk();
		$a = $this->db->order_by('_no_induk','asc')->get('_sysfo_paud_reg_data');
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$new = ($aa->_induk)+1;
		}
		
		if($last > $new){
			$h = $last2;
		}
		else{
			$h = $new;
		}
		
	}
	
	function generate_noinduk(){
		
		$id = $this->input->post('regid');
		$induk = $this->input->post('induk');
		$cnt = count($id);
		if(is_array($id)){
			for($i=0;$i<$cnt;$i++){
				$wh['_id'] = $id[$i];
				$in['_induk'] = $induk[$i];
				$this->db->update('_sysfo_paud_reg_data',$in,$wh);
			}
			$this->db->query('INSERT INTO _sysfo_paud_data_siswa (_no_induk,_ta,_name,_nickname,_gender,_tmp_lahir,_tgl_lahir,_agama,_alamat,_rt,_rw,_desa,_kecamatan,_kota,_provinsi,_negara,_email,_phone,_anak_ke,_jml_saudara,_penyakit,_nama_ayah,_tmp_lahir_ayah,_tgl_lahir_ayah,_agama_ayah,_pendidikan_ayah,_pekerjaan_ayah,_nama_ibu,_tmp_lahir_ibu,_tgl_lahir_ibu,_agama_ibu,_pendidikan_ibu,_pekerjaan_ibu,_time,_status)
								SELECT _induk,_ta,_name,_nickname,_gender,_tmp_lahir,_tgl_lahir,_agama,_alamat,_rt,_rw,_desa,_kecamatan,_kota,_provinsi,_negara,_email,_phone,_anak_ke,_jml_saudara,_penyakit,_nama_ayah,_tmp_lahir_ayah,_tgl_lahir_ayah,_agama_ayah,_pendidikan_ayah,_pekerjaan_ayah,_nama_ibu,_tmp_lahir_ibu,_tgl_lahir_ibu,_agama_ibu,_pendidikan_ibu,_pekerjaan_ibu,"'.db_time(TimeNow()).'",1 from _sysfo_paud_reg_data where _status = 10 AND _induk_status = 0 ORDER BY _name asc');
			$up['_induk_status'] = 1;
			$where['_status'] = 10;
			$where['_induk_status'] = 0;
			$this->db->update('_sysfo_paud_reg_data',$up,$where);
			set_alert('success','Pembuatan nomor induk telah berhasil');
			redirect(current_url());
		}
		else{
			set_alert('error','Pembuatan nomor induk gagal, silakan ulangi');
			redirect(current_url());
		}
	}
}
