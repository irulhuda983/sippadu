<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_project extends CI_Model {
	
	//================== AGENDA ================//
	
	function tabel_project($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Judul like "%'.$keyword.'%") OR (a.Konten like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_project a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_project(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Project'] = $id;
				$this->db->delete('ci_project',$wh);
				$this->db->delete('ci_project_log',$wh);
				$this->db->delete('ci_project_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_project(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Project'] = $id;
				$this->db->update('ci_project',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_project(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Project'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_project',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_project($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Project',$id)->get('ci_project');
		return $a;
	}
	
	function insert_project($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Project','Nama Project','required');
		$this->form_validation->set_rules('Nm_Instansi','Nama Instansi','required');
		$this->form_validation->set_rules('Alamat_Instansi','Alamat Instansi','');
		$this->form_validation->set_rules('Lokasi','Lokasi Project','');
		$this->form_validation->set_rules('Latitude','Latitude','');
		$this->form_validation->set_rules('Longitude','Longitude','');
		$this->form_validation->set_rules('Time_Mulai','Time Mulai','required');
		$this->form_validation->set_rules('Time_Akhir','Time Akhir','');
		$this->form_validation->set_rules('Anggaran','Anggaran','');
		$this->form_validation->set_rules('Jml_Pelaksana','Jumlah Pelaksana','');
		$this->form_validation->set_rules('Nm_Pelaksana','Nama Pelaksana','');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		$this->form_validation->set_rules('op_project_kategori','Kategori Project','');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Project','Last_ID')->where('ID_Web',config())->get('ci_project');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->Last_ID+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Project'] = $last_id;
			$in['Nm_Project'] = $this->input->post('Nm_Project');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Nm_Instansi'] = $this->input->post('Nm_Instansi');
			$in['Alamat_Instansi'] = $this->input->post('Alamat_Instansi');
			$in['Jml_Pelaksana'] = $this->input->post('Jml_Pelaksana');
			$in['Nm_Pelaksana'] = $this->input->post('Nm_Pelaksana');
			$in['Time_Mulai'] = db_time($this->input->post('Time_Mulai'));
			$in['Time_Akhir'] = db_time($this->input->post('Time_Akhir'));
			$in['Lokasi'] = $this->input->post('Lokasi');
			$in['Latitude'] = $this->input->post('Latitude');
			$in['Longitude'] = $this->input->post('Longitude');
			$in['Anggaran'] = str_replace('.','',$this->input->post('Anggaran'));
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_project',$in);
			$insert_id = $last_id;
			
			$op_project_kategori = $this->input->post('op_project_kategori');
			if(is_array($op_project_kategori)){
				foreach($op_project_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Project'] = $insert_id;
					$this->db->insert('ci_project_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Project'] = $insert_id;
				$this->db->insert('ci_project_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Project'] = $insert_id;
						$this->db->insert('ci_project_tags',$in3);
					}
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
			return $a;
		}
	}
		
	function update_project($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Project','Nama Project','required');
		$this->form_validation->set_rules('Nm_Instansi','Nama Instansi','required');
		$this->form_validation->set_rules('Alamat_Instansi','Alamat Instansi','');
		$this->form_validation->set_rules('Lokasi','Lokasi Project','');
		$this->form_validation->set_rules('Latitude','Latitude','');
		$this->form_validation->set_rules('Longitude','Longitude','');
		$this->form_validation->set_rules('Time_Mulai','Time Mulai','required');
		$this->form_validation->set_rules('Time_Akhir','Time Akhir','');
		$this->form_validation->set_rules('Anggaran','Anggaran','');
		$this->form_validation->set_rules('Jml_Pelaksana','Jumlah Pelaksana','');
		$this->form_validation->set_rules('Nm_Pelaksana','Nama Pelaksana','');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		$this->form_validation->set_rules('op_project_kategori','Kategori Project','');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Project'] = $id;
			$in['Nm_Project'] = $this->input->post('Nm_Project');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Nm_Instansi'] = $this->input->post('Nm_Instansi');
			$in['Alamat_Instansi'] = $this->input->post('Alamat_Instansi');
			$in['Jml_Pelaksana'] = $this->input->post('Jml_Pelaksana');
			$in['Nm_Pelaksana'] = $this->input->post('Nm_Pelaksana');
			$in['Time_Mulai'] = db_time($this->input->post('Time_Mulai'));
			$in['Time_Akhir'] = db_time($this->input->post('Time_Akhir'));
			$in['Lokasi'] = $this->input->post('Lokasi');
			$in['Latitude'] = $this->input->post('Latitude');
			$in['Longitude'] = $this->input->post('Longitude');
			$in['Anggaran'] = str_replace('.','',$this->input->post('Anggaran'));
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_project',$in,$wh);
			
			$op_project_kategori = $this->input->post('op_project_kategori');
			$this->db->delete('ci_project_log',$wh);
			if(is_array($op_project_kategori)){
				foreach($op_project_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Project'] = $id;
					$this->db->insert('ci_project_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Project'] = $id;
				$this->db->insert('ci_project_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_project_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Project'] = $id;
						$this->db->insert('ci_project_tags',$in3);
					}
				}
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
	
	function slc_op_project_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Project',$id)->get('ci_project_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_project_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Project',$id)->get('ci_project_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_project_kategori($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Nm_Kategori ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Kategori like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_project_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_project_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_project_kategori',$wh);
				$this->db->delete('ci_project_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_project_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_project_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_project_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_project_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_project_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_project_kategori');
		return $a;
	}
	
	
	function insert_project_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_project_kategori');
			$idd = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$idd = $bb->ID_Kategori+1;
			}
			$in['ID_Web'] = config();
			$in['ID_Kategori'] = $idd;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Status'] = 1;
			$a = $this->db->insert('ci_project_kategori',$in);
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
		
	function update_project_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_project_kategori',$in,$wh);
			if($a){
				set_alert('success','Data berhasil diubah');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diubah');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function op_project_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_project_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
}


