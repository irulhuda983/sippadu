<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_superadmin extends CI_Model {
	
	//================== WEBSITE ================//
	
	function tabel_website($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Web ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Domain like "%'.$keyword.'%") OR (a.Title like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Code_Color AS FColor_Code,c.Code_Color AS BColor_Code FROM ci_domain a LEFT JOIN ci_apps_color b ON a.FColor = b.Class_Color LEFT JOIN ci_apps_color c ON a.BColor = c.Class_Color WHERE a.ID_Web >= 0 AND a.Parent = 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_website(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$cek = $this->db->where('Parent',$id)->get('ci_domain');
				if($cek->num_rows() < 1){
					$wh['ID_Web'] = $id;
					$this->db->delete('ci_domain',$wh);
					$this->ClearDataWeb($id);
				}
				else{
					set_alert('error','Ada domain alias di data yang dipilih');
					redirect(current_url());
				}
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_website(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = $id;
				$this->db->update('ci_domain',$in,$wh);
				
				$in2['Status'] = 1;
				$wh2['Parent'] = $id;
				$this->db->update('ci_domain',$in2,$wh2);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_website(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = $id;
				$this->db->update('ci_domain',$in,$wh);
				
				$in2['Status'] = 0;
				$wh2['Parent'] = $id;
				$this->db->update('ci_domain',$in2,$wh2);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_website($id=0){
		$a = $this->db->where('ID_Web',$id)->get('ci_domain');
		return $a;
	}
	
	function data_apps($id=0){
		$a = $this->db->where('ID_Apps',$id)->get('ci_apps');
		return $a;
	}
	
	function insert_website($image=NULL,$raw=NULL,$ext=NULL,$image2=NULL,$raw2=NULL,$ext2=NULL,$favicon=NULL){
		$this->form_validation->set_rules('Domain','Domain','required');
		$this->form_validation->set_rules('Title','Title','required');
		$this->form_validation->set_rules('Short_Title','Short Title','required');
		$this->form_validation->set_rules('Subtitle','Sub Title','');
		$this->form_validation->set_rules('Slogan','Slogan','');
		$this->form_validation->set_rules('Description','Deskripsi','');
		$this->form_validation->set_rules('Keyword','Keyword','');
		$this->form_validation->set_rules('Author','Author','');
		$this->form_validation->set_rules('EmailAuthor','Email Author','');
		$this->form_validation->set_rules('Email_Sys_Name','Email System Name','required');
		$this->form_validation->set_rules('Email_Sys_Address','Email System Address','required');
		$this->form_validation->set_rules('op_fcolor','Warna Depan','');
		$this->form_validation->set_rules('op_bcolor','Warna Belakang','');
		$this->form_validation->set_rules('Google_Code','Google Code','');
		$this->form_validation->set_rules('op_default','Default Aplikasi','is_natural_no_zero');
		$this->form_validation->set_rules('Copyright','Copyright Year','required');
		
		if($this->form_validation->run() == TRUE){
			$domain 	= $this->input->post('Domain');
			$cek = $this->db->where('Domain',$domain)->get('ci_domain');
			$cek_id = $this->db->select_max('ID_Web','ID_Web')->get('ci_domain');
			$web_id = 1;
			if($cek_id->num_rows() > 0){
				$get_id = $cek_id->row();
				$web_id = $get_id->ID_Web+1;
			}
			
			if($cek->num_rows() < 1){
				$in['ID_Web'] = $web_id;
				$in['Domain'] 	= $this->input->post('Domain');
				$in['Parent'] 	= 0;
				$in['Title'] 	= $this->input->post('Title');
				$in['Short_Title'] 	= $this->input->post('Short_Title');
				$in['Sub_Title'] = $this->input->post('Subtitle');
				$in['Slogan'] = $this->input->post('Slogan');
				$in['Description'] = $this->input->post('Description');
				$in['Keyword'] = $this->input->post('Keyword');
				$in['Author'] = $this->input->post('Author');
				$in['Email_Author'] = $this->input->post('EmailAuthor');
				$in['Email_Sys_Name'] = $this->input->post('Email_Sys_Name');
				$in['Email_Sys_Address'] = $this->input->post('Email_Sys_Address');
				$in['FColor'] = $this->input->post('op_fcolor');
				$in['BColor'] = $this->input->post('op_bcolor');
				$in['Google_Code'] = $this->input->post('GoogleCode');
				$in['Copyright_Year'] = $this->input->post('Copyright');
				$in['Default_Apps'] = $this->input->post('op_default');
				if($image != ''){
				$in['Image'] = $image;
				$in['Image_Raw'] = $raw;
				$in['Image_Ext'] = $ext;
				}
				if($image2 != ''){
				$in['Logo'] = $image2;
				$in['Logo_Raw'] = $raw2;
				$in['Logo_Ext'] = $ext2;
				}
				if($favicon != ''){
				$in['Favicon'] = $favicon;
				}
				$in['Date_Created'] = db_time(TimeNow());
				$in['Status'] = 1;			
				$a = $this->db->insert('ci_domain',$in);
				
				$last_id = $this->db->insert_id();
				$qlast = $this->db->select_max('ID_User','Last_ID')->where('ID_Web',$last_id)->get('ci_user');
				if($qlast->num_rows() > 0){
					$ls = $qlast->row();
					$last = $ls->Last_ID;
					if($last < 1){
						$in2['ID_Web'] = $last_id;
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
					}
				} 
				
				
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
				set_alert('error','Domain sudah ada');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_website($id=0,$image=NULL,$raw=NULL,$ext=NULL,$image2=NULL,$raw2=NULL,$ext2=NULL,$favicon=NULL){
		$this->form_validation->set_rules('Domain','Domain','required');
		$this->form_validation->set_rules('Title','Title','required');
		$this->form_validation->set_rules('Short_Title','Short Title','required');
		$this->form_validation->set_rules('Subtitle','Sub Title','');
		$this->form_validation->set_rules('Slogan','Slogan','');
		$this->form_validation->set_rules('Description','Deskripsi','');
		$this->form_validation->set_rules('Keyword','Keyword','');
		$this->form_validation->set_rules('Author','Author','');
		$this->form_validation->set_rules('EmailAuthor','Email Author','');
		$this->form_validation->set_rules('Email_Sys_Name','Email System Name','required');
		$this->form_validation->set_rules('Email_Sys_Address','Email System Address','required');
		$this->form_validation->set_rules('op_fcolor','Warna Depan','');
		$this->form_validation->set_rules('op_bcolor','Warna Belakang','');
		$this->form_validation->set_rules('GoogleCode','Google Code','');
		$this->form_validation->set_rules('op_default','Default Aplikasi','is_natural_no_zero');
		$this->form_validation->set_rules('Copyright','Copyright Year','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = $id;
			$in['Domain'] 	= $this->input->post('Domain');
			$in['Title'] 	= $this->input->post('Title');
			$in['Short_Title'] 	= $this->input->post('Short_Title');
			$in['Sub_Title'] = $this->input->post('Subtitle');
			$in['Slogan'] = $this->input->post('Slogan');
			$in['Description'] = $this->input->post('Description');
			$in['Keyword'] = $this->input->post('Keyword');
			$in['Author'] = $this->input->post('Author');
			$in['Email_Author'] = $this->input->post('EmailAuthor');
			$in['Email_Sys_Name'] = $this->input->post('Email_Sys_Name');
			$in['Email_Sys_Address'] = $this->input->post('Email_Sys_Address');
			$in['FColor'] = $this->input->post('op_fcolor');
			$in['BColor'] = $this->input->post('op_bcolor');
			$in['Google_Code'] = $this->input->post('GoogleCode');
			$in['Copyright_Year'] = $this->input->post('Copyright');
			$in['Default_Apps'] = $this->input->post('op_default');
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			if($image2 != ''){
			$in['Logo'] = $image2;
			$in['Logo_Raw'] = $raw2;
			$in['Logo_Ext'] = $ext2;
			}
			if($favicon != ''){
				$in['Favicon'] = $favicon;
			}
			//$in['Date_Created'] = db_time(TimeNow());
			//$in['Status'] = 1;			
			$a = $this->db->update('ci_domain',$in,$wh);
			
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
		
	function ClearDataWeb($id=0){
		$db = $this->db->database;
		$a = $this->db->query('SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND COLUMN_NAME = "ID_Web"');
		$not_read = array('ci_domain','ci_domain_apps');
		$return = false;
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$table = $aa->TABLE_NAME;
				if(!in_array($table,$not_read)){
					$wh['ID_Web'] = $id;
					$this->db->delete($table,$wh);
				}
			}
			$return = true;
		}
		return $return;
	}
	
	function CopyDataWeb($idfrom=0,$idto=0){
		$db = $this->db->database;
		$a = $this->db->query('SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND COLUMN_NAME = "ID_Web"');
		$return = false;
		$this->ClearDataWeb($idto);
		$not_read = array('ci_domain','ci_domain_apps','ci_chat','ci_lang_format');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$table = $aa->TABLE_NAME;
				if(!in_array($table,$not_read)){
					$this->CopyDataTable($table,$idfrom,$idto);
				}
			}
			$return = true;
		}
		return $return;
	}
	
	function CopyDataTable($table='',$idfrom=0,$idto=0){
		$db = $this->db->database;
		$a = $this->db->query('SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" AND TABLE_NAME = "'.$table.'"');
		if($a->num_rows() > 0){
			$field = array();
			$field2 = array();
			$sql = '';
			$field_aksen = array('Default');
			foreach($a->result() as $aa){
				$col = $aa->COLUMN_NAME;
				
				if($col == 'ID_Web'){
					$field[] = $col;
					$field2[] = $idto;
				}
				elseif($col == 'Hits'){
					$field[] = $col;
					$field2[] = 0;
				}
				elseif(in_array($col,$field_aksen)){
					$field[] = '`'.$col.'`';
					$field2[] = '`'.$col.'`';
				}
				else{
					$field[] = $col;
					$field2[] = $col;
				}
			}
			$fields = implode(',',$field);
			$fields2 = implode(',',$field2);
			$sql = 'INSERT INTO '.$table.'('.$fields.') SELECT '.$fields2.' FROM '.$table.' WHERE ID_Web = "'.$idfrom.'"';
			$b = $this->db->query($sql);
		}
	}
		
	function tabel_alias($parent=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Web ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Domain like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_domain a WHERE a.ID_Web >= 0 AND a.Parent = '.$parent.' '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function insert_alias($parent=0){
		$this->form_validation->set_rules('Domain','Domain','required');
		
		if($this->form_validation->run() == TRUE){
			$domain 	= $this->input->post('Domain');
			$cek = $this->db->where('Domain',$domain)->get('ci_domain');
			if($cek->num_rows() < 1){
				$cek_id = $this->db->select_max('ID_Web','ID_Web')->get('ci_domain');
				$web_id = 1;
				if($cek_id->num_rows() > 0){
					$get_id = $cek_id->row();
					$web_id = $get_id->ID_Web+1;
				}
				$in['ID_Web']	= $web_id;
				$in['Domain'] 	= $this->input->post('Domain');
				$in['Parent'] 	= $parent;
				$in['Date_Created'] = db_time(TimeNow());
				$in['Status'] = 1;			
				$a = $this->db->insert('ci_domain',$in);
				
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
				set_alert('error','Domain sudah ada');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function op_color(){
		$a = $this->db->order_by('ID_Color','asc')->where('Status',1)->get('ci_apps_color');
		$d = array();
		if($a->num_rows() > 0){
			$d['0'] = '- Pilih Warna -';
			foreach($a->result() as $aa){
				$d[$aa->Class_Color] = $aa->Nm_Color;
			}
		}
		else{
			$d['0']	= 'Tidak ada data';
		}
		return $d;
	}
	
	function op_domain(){
		$a = $this->db->order_by('Domain','asc')->where('Parent',0)->where('Status',1)->get('ci_domain');
		$d = array();
		if($a->num_rows() > 0){
			$d['0']	= '- Silakan Pilih Domain -';
			foreach($a->result() as $aa){
				$d[$aa->ID_Web] = $aa->Domain;
			}
		}
		else{
			$d['0']	= 'Tidak ada data';
		}
		return $d;
	}
	
	function tabel_modul($domain=0,$apps=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Kd_Modul ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Modul like "%'.$keyword.'%") OR (a.Kd_Modul like "%'.$keyword.'%"))';
		}
		
		if($domain > 0 AND $apps > 0){
			$a = $this->db->query('SELECT a.*,b.Nm_Group,(select count(*) from ci_modul_log c WHERE c.Kd_Modul = a.Kd_Modul and c.ID_Web = '.$domain.') AS Cek FROM ci_modul a INNER JOIN ci_modul_group b ON a.Kd_Group = b.Kd_Group WHERE b.ID_Apps = '.$apps.' '.$q_where.' '.$q_order.' '.$q_limit.'');
		}
		else{
			$a = $this->db->query('SELECT a.*,b.Nm_Group,(select count(*) from ci_modul_log c WHERE c.Kd_Modul = a.Kd_Modul and c.ID_Web = 0) AS Cek FROM ci_modul a INNER JOIN ci_modul_group b ON a.Kd_Group = b.Kd_Group WHERE b.ID_Apps = 0');
		}
		return $a;
	}
	
	function insert_modul_log(){
		$domain = $this->input->post('op_domain');
		$apps = $this->input->post('op_apps');
		$del = $this->db->query('DELETE a FROM ci_modul_log a INNER JOIN ci_modul b ON a.Kd_Modul = b.Kd_Modul INNER JOIN ci_modul_group c ON b.Kd_Group = c.Kd_Group WHERE a.ID_Web = '.$domain.' AND c.ID_Apps = '.$apps);
		
		$mdl = $this->input->post('chk');
		$cmdl = count($mdl);
		if(is_array($mdl)){
			for($i=0;$i<$cmdl;$i++){
				$in['ID_Web'] = $domain;
				$in['Kd_Modul'] = $mdl[$i];
				$this->db->insert('ci_modul_log',$in);
			}
		}
		set_alert('success','Otorisasi Modul berhasil disimpan');
		if($this->uri->segment(3) != '' AND $this->uri->segment(4) != ''){
			redirect(current_url());
		}
		else{
			redirect(current_url().'/'.$domain.'/'.$apps);
		}
	}
	
	function op_apps($mapping=FALSE){
		if($mapping){
			$this->db->where('Mapping',1);
		}
		$this->db->where('Status',1)->order_by('ID_Apps','ASC');
		
		$a = $this->db->get('ci_apps');
		
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['no'] = '- Pilih Aplikasi -';
				$h[$aa->ID_Apps] = $aa->Nm_Apps;
			}
		}
		else{
			$h['no'] = '- Pilih Aplikasi -';
		}
		return $h;
	}
	
	function op_apps_active(){
		$a = $this->db->query('
		SELECT a.ID_Apps,a.Nm_Apps from ci_apps a where a.ID_Apps = 2
		UNION ALL
		select a.ID_Apps,a.Nm_Apps from ci_apps a where a.ID_Apps > 2 AND (select count(*) from ci_domain_apps b where b.ID_Apps = a.ID_Apps AND b.ID_Web = '.config().' AND b.Status = 1) = 1');
		
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Aplikasi -';
				$h[$aa->ID_Apps] = $aa->Nm_Apps;
			}
		}
		else{
			$h['0'] = '- Pilih Aplikasi -';
		}
		return $h;
	}
	
	
	function op_apps_modul($ID_Apps=0){
		$h = array();
		$Table_Prefix = '';
		$Table_Modul = '';
		$Table_Mapping = '';
		$Field_Kd = '';
		$Field_Nm = '';
		$ap = $this->db->where('ID_Apps',$ID_Apps)->get('ci_apps');
		if($ap->num_rows() > 0){
			$app = $ap->row();
			$Table_Prefix = $app->Table_Prefix;
			$Table_Modul = $app->Table_Modul;
			$Table_Mapping = $app->Table_Mapping;
			$Field_Kd = $app->Field_Kd;
			$Field_Nm = $app->Field_Nm;
		}
		
		if($Table_Modul != '' AND $Field_Kd != '' AND $Field_Nm != ''){
			$a = $this->db->where('Status',1)->order_by($Field_Kd,'ASC')->get($Table_Modul);
			$h = array();
			if($a->num_rows() > 0){
				foreach($a->result_array() as $aa){
					$kd = $aa[$Field_Kd];
					$nm = $aa[$Field_Nm];
					$h['no'] = '- Pilih Modul -';
					$h[$kd] = $nm;
				}
			}
			else{
				$h['no'] = '- Pilih Modul -';
			}
		}
		else{
			$h['no'] = '- Pilih Modul -';
		}
		return $h;
		
	}
	
	function tabel_modul_mapping($ID_Apps=0,$ID_Modul=0,$limit=0){
		$Table_Prefix = '';
		$Table_Modul = '';
		$Table_Mapping = '';
		$Field_Kd = '';
		$Field_Nm = '';
		$ap = $this->db->where('ID_Apps',$ID_Apps)->get('ci_apps');
		if($ap->num_rows() > 0){
			$app = $ap->row();
			$Table_Prefix = $app->Table_Prefix;
			$Table_Modul = $app->Table_Modul;
			$Table_Mapping = $app->Table_Mapping;
			$Field_Kd = $app->Field_Kd;
			$Field_Nm = $app->Field_Nm;
		}
		
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Kd_Modul ASC';
		
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Modul like "%'.$keyword.'%") OR (a.Kd_Modul like "%'.$keyword.'%"))';
		}
		
		if($Table_Mapping != '' AND $Field_Kd != ''){
			$a = $this->db->query('SELECT a.*,b.Nm_Group,(select count(*) from '.$Table_Mapping.' c WHERE c.Kd_Modul = a.Kd_Modul and c.'.$Field_Kd.' = '.$ID_Modul.') AS Cek FROM ci_modul a INNER JOIN ci_modul_group b ON a.Kd_Group = b.Kd_Group WHERE b.ID_Apps = '.$ID_Apps.' '.$q_where.' '.$q_order.' '.$q_limit.'');
		}
		else{
			$a = $this->db->query('SELECT a.*,b.Nm_Group,0 AS Cek FROM ci_modul a INNER JOIN ci_modul_group b ON a.Kd_Group = b.Kd_Group WHERE b.ID_Apps = '.$ID_Apps.'');
		}
		return $a;
	}
	
	function insert_mapping($ID_Apps=0,$ID_Modul=0){
		$Table_Prefix = '';
		$Table_Modul = '';
		$Table_Mapping = '';
		$Field_Kd = '';
		$Field_Nm = '';
		$ap = $this->db->where('ID_Apps',$ID_Apps)->get('ci_apps');
		if($ap->num_rows() > 0){
			$app = $ap->row();
			$Table_Prefix = $app->Table_Prefix;
			$Table_Modul = $app->Table_Modul;
			$Table_Mapping = $app->Table_Mapping;
			$Field_Kd = $app->Field_Kd;
			$Field_Nm = $app->Field_Nm;
		}
		
		if($Table_Mapping != '' AND $Field_Kd != ''){
			$wh[$Field_Kd] = $ID_Modul;
			$del = $this->db->delete($Table_Mapping,$wh);
			
			$mdl = $this->input->post('chk');
			$cmdl = count($mdl);
			if(is_array($mdl)){
				for($i=0;$i<$cmdl;$i++){
					$in[$Field_Kd] = $ID_Modul;
					$in['Kd_Modul'] = $mdl[$i];
					$this->db->insert($Table_Mapping,$in);
				}
			}
			set_alert('success','Otorisasi Modul berhasil disimpan');
			if($this->uri->segment(3) != '' AND $this->uri->segment(4) != ''){
				redirect(current_url());
			}
			else{
				redirect(current_url().'/'.$domain.'/'.$apps);
			}
		}
		else{
			set_alert('error','Ada kesalahan. Data tidak dapat disimpan');
			if($this->uri->segment(3) != '' AND $this->uri->segment(4) != ''){
				redirect(current_url());
			}
			else{
				redirect(current_url().'/'.$domain.'/'.$apps);
			}
		}
	}
	
	function tabel_apps($ID_Web=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Apps ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Apps like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('select a.ID_Apps,a.Nm_Apps,(select count(*) from ci_domain_apps b where b.ID_Apps = a.ID_Apps AND b.ID_Web = '.$ID_Web.' AND b.Status = 1) AS Status from ci_apps a where a.ID_Apps > 2 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function data_setting_apps($id_web=0,$id_apps=0){
		$a = $this->db->where('ID_Web',$id_web)->where('ID_Apps',$id_apps)->get('ci_domain_apps');
		return $a;
	}
	
	function update_apps($id_web=0,$id_apps=0,$image=NULL,$raw=NULL,$ext=NULL,$image2=NULL,$raw2=NULL,$ext2=NULL){
		$this->form_validation->set_rules('Title','Title','required');
		$this->form_validation->set_rules('Subtitle','Sub Title','');
		$this->form_validation->set_rules('Slogan','Slogan','');
		$this->form_validation->set_rules('Description','Deskripsi','');
		$this->form_validation->set_rules('Keyword','Keyword','');
		$this->form_validation->set_rules('Author','Author','');
		$this->form_validation->set_rules('EmailAuthor','Email Author','');
		$this->form_validation->set_rules('op_fcolor','Warna Depan','');
		$this->form_validation->set_rules('op_bcolor','Warna Belakang','');
		$this->form_validation->set_rules('GoogleCode','Google Code','');
		$this->form_validation->set_rules('Copyright','Copyright Year','required');
		
		if($this->form_validation->run() == TRUE){
			$in['Title'] 	= $this->input->post('Title');
			$in['Sub_Title'] = $this->input->post('Subtitle');
			$in['Slogan'] = $this->input->post('Slogan');
			$in['Description'] = $this->input->post('Description');
			$in['Keyword'] = $this->input->post('Keyword');
			$in['Author'] = $this->input->post('Author');
			$in['Email_Author'] = $this->input->post('EmailAuthor');
			$in['FColor'] = $this->input->post('op_fcolor');
			$in['BColor'] = $this->input->post('op_bcolor');
			$in['Google_Code'] = $this->input->post('GoogleCode');
			$in['Copyright_Year'] = $this->input->post('Copyright');
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			if($image2 != ''){
			$in['Logo'] = $image2;
			$in['Logo_Raw'] = $raw2;
			$in['Logo_Ext'] = $ext2;
			}
			$in['Status'] = $this->input->post('Status');		
			
			$cek = $this->data_setting_apps($id_web,$id_apps);
			if($cek->num_rows() > 0){
				$wh['ID_Web'] = $id_web;
				$wh['ID_Apps'] = $id_apps;
				$a = $this->db->update('ci_domain_apps',$in,$wh);
			}
			else{
				$in['ID_Web'] = $id_web;
				$in['ID_Apps'] = $id_apps;
				$in['Date_Created'] = db_time(TimeNow());
				$a = $this->db->insert('ci_domain_apps',$in);
			}
			
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
	
	function op_config(){
		$a = $this->db->order_by('Nm_Config','ASC')->get('ci_config');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['no'] = '- '.lang('Pilih Konfigurasi').' -';
				$h[$aa->ID_Config] = $aa->Nm_Config;
			}
		}
		else{
			$h['no'] = '- '.lang('Pilih Konfigurasi').' -';
		}
		return $h;
		
	}
	
	
	function get_config($id=0){
		//$a = $this->db->where('ID_Config',$id)->get('ci_config');
		$a = $this->db->query('CALL ci_GetConfig('.config().','.$id.')');
		$a->next_result();
		return $a;
	}
	
	function save_config($idsetting=0,$filename=''){
		$web_config = $this->input->post('Web_Config');
		$wh['ID_Web'] = config();
		$wh['ID_Config'] = $idsetting;
		if($this->input->post('Jn_Config')=='5'){
			$in['Value'] = $filename;
		}
		else{
			$in['Value'] = $this->input->post('value');
		}
		
		if($web_config > 0){
			$cek = $this->db->where('ID_Web',config())->where('ID_Config',$idsetting)->get('ci_config_log');
			if($cek->num_rows() > 0){
				$a = $this->db->update('ci_config_log',$in,$wh);
			}
			else{
				$in['ID_Web'] = config();
				$in['ID_Config'] = $idsetting;
				$a = $this->db->insert('ci_config_log',$in);
			}
		}
		else{
			$wh2['ID_Config'] = $idsetting;
			$a = $this->db->update('ci_config',$in,$wh2);
		}
		
		if($a){
			set_alert('success','Setting berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Setting gagal disimpan');
			redirect(current_url());
		}
	}
	
	
	function tabel_widget($id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = ' ORDER BY z.Status DESC, z.Sort_Order,z.ID_Widget ASC ';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((z.Nm_Widget like "%'.$keyword.'%") OR (z.Deskripsi like "%'.$keyword.'%")) ';
		}
		
		
		$a = $this->db->query('SELECT * FROM (SELECT a.ID_Widget,a.Nm_Widget,a.Deskripsi,a.Source,ifnull((SELECT Sort_Order FROM ci_widget_log b WHERE b.ID_Web = '.$id.' AND b.ID_Widget = a.ID_Widget LIMIT 0,1),0) as Sort_Order,(SELECT COUNT(*) FROM ci_widget_log b WHERE b.ID_Web = '.$id.' AND b.ID_Widget = a.ID_Widget) as Status FROM ci_widget a WHERE a.Status = 1) z WHERE z.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function enable_widget(){
		$ID_Web = $this->input->post('ID_Web');
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['ID_Web'] = $ID_Web;
				$in['ID_Widget'] = $id;
				$this->db->insert('ci_widget_log',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_widget(){
		$ID_Web = $this->input->post('ID_Web');
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = $ID_Web;
				$wh['ID_Widget'] = $id;
				$this->db->delete('ci_widget_log',$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function save_widget(){
		$ID_Web = $this->input->post('ID_Web');
		$ID_Widget = $this->input->post('ID_Widget');
		$Sort_Order = $this->input->post('Sort_Order');
		$Status = $this->input->post('Status');
		if(is_array($ID_Widget)){
			foreach($ID_Widget as $idx => $val){
				$stts = $Status[$idx];
				$sort = $Sort_Order[$idx];
				$id = $ID_Widget[$idx];
				if($stts > 0){
					$this->db->query('UPDATE ci_widget_log SET Sort_Order = "'.$sort.'" WHERE ID_Web = "'.$ID_Web.'" AND ID_Widget = "'.$id.'"');
				}
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function op_domain_copy_from($id=0){
		$a = $this->db->order_by('Domain','asc')->where('ID_Web !=',$id)->where('Parent',0)->where('Status',1)->get('ci_domain');
		$d = array();
		if($a->num_rows() > 0){
			$d['0']	= '- Silakan Pilih Domain -';
			foreach($a->result() as $aa){
				$d[$aa->ID_Web] = $aa->Domain;
			}
		}
		else{
			$d['0']	= 'Tidak ada data';
		}
		return $d;
	}
	
	function copy_from($id=0){
		$idfrom = $this->input->post('op_domain');
		$idto = $id;
		$a = $this->CopyDataWeb($idfrom,$idto);
		if($a){
			set_alert('success','Data berhasil dicopy');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dicopy');
			redirect(current_url());
		}
	}
	
	function clear_data($id=0){
		$a = $this->ClearDataWeb($id);
		if($a){
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function database_repair(){
		$db = $this->db->database;
		$a = $this->db->query('SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.$db.'" GROUP BY TABLE_NAME');
		$not_read = array();
		$return = false;
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$table = $aa->TABLE_NAME;
				if(!in_array($table,$not_read)){
					$this->dbutil->repair_table($table);
				}
			}
			$return = true;
		}
		return $return;
	}
	
	function apps_color($class_color=''){
		$a = $this->db->where('Class_Color',$class_color)->get('ci_apps_color');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Code_Color;
		}
		return $h;
	}
	
	function clear_temp($ID_Web=0){
		//SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "apps_ci3" AND (TABLE_NAME like "%_log"/* OR TABLE_NAME like "%_tags"*/) AND TABLE_NAME != 'ci_config_log' AND TABLE_NAME != 'ci_modul_log' AND TABLE_NAME != 'tb_dokumen_log' AND TABLE_NAME != 'ci_user_log' GROUP BY TABLE_NAME
		
		$a = $this->db->get('ci_temp');
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$cek_tb_utama = $this->db->query('SELECT * FROM '.$aa->Tabel_Log.' WHERE ID_Web = '.$ID_Web);
			}
		}
	}
	
}


