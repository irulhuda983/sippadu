<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_agenda extends CI_Model {
	
	//================== AGENDA ================//
	
	function tabel_agenda($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_agenda a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_agenda(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Agenda'] = $id;
				$this->db->delete('ci_agenda',$wh);
				$this->db->delete('ci_agenda_log',$wh);
				$this->db->delete('ci_agenda_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_agenda(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Agenda'] = $id;
				$this->db->update('ci_agenda',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_agenda(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Agenda'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_agenda',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_agenda($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Agenda',$id)->get('ci_agenda');
		return $a;
	}
	
	function insert_agenda($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Judul','Judul','required');
		$this->form_validation->set_rules('Konten','Isi Konten','required');
		$this->form_validation->set_rules('Time_Mulai','Time Mulai','required');
		$this->form_validation->set_rules('Time_Akhir','Time Akhir','');
		$this->form_validation->set_rules('Lokasi','Lokasi','');
		//$this->form_validation->set_rules('op_agenda_kategori','Kategori Agenda','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Agenda','ID_Agenda')->where('ID_Web',config())->get('ci_agenda');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Agenda+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Agenda'] = $last_id;
			$in['Judul'] = $this->input->post('Judul');
			$in['Konten'] = $this->input->post('Konten');
			$in['Time_Mulai'] = db_time($this->input->post('Time_Mulai'));
			$in['Time_Akhir'] = db_time($this->input->post('Time_Akhir'));
			$in['All_Day'] = $this->input->post('All_Day');
			$in['Tampilkan_Jam'] = $this->input->post('Tampilkan_Jam');
			$in['Lokasi'] = $this->input->post('Lokasi');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_agenda',$in);
			$insert_id = $last_id;
			
			$op_agenda_kategori = $this->input->post('op_agenda_kategori');
			if(is_array($op_agenda_kategori)){
				foreach($op_agenda_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Agenda'] = $insert_id;
					$this->db->insert('ci_agenda_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Agenda'] = $insert_id;
				$this->db->insert('ci_agenda_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Agenda'] = $insert_id;
						$this->db->insert('ci_agenda_tags',$in3);
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
		
	function update_agenda($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Judul','Judul','required');
		$this->form_validation->set_rules('Konten','Isi Konten','required');
		$this->form_validation->set_rules('Time_Mulai','Time Mulai','required');
		$this->form_validation->set_rules('Time_Akhir','Time Akhir','');
		$this->form_validation->set_rules('Lokasi','Lokasi','');
		$this->form_validation->set_rules('op_agenda_kategori','Kategori Agenda','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Agenda'] = $id;
			$in['Judul'] = $this->input->post('Judul');
			$in['Konten'] = $this->input->post('Konten');
			
			$Time_Mulai = strtotime(str_replace('/','-',$this->input->post('Time_Mulai')));
			$Time_Akhir = strtotime(str_replace('/','-',$this->input->post('Time_Akhir')));
			
			$in['Time_Mulai'] = db_time($this->input->post('Time_Mulai'));
			if($Time_Mulai <= $Time_Akhir){
				$warning = 0;
				$in['Time_Akhir'] = db_time($this->input->post('Time_Akhir'));
			}
			else{
				$warning = 1;
				$in['Time_Akhir'] = db_time($this->input->post('Time_Mulai'));
			}
			
			$in['All_Day'] = $this->input->post('All_Day');
			$in['Tampilkan_Jam'] = $this->input->post('Tampilkan_Jam');
			$in['Lokasi'] = $this->input->post('Lokasi');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_agenda',$in,$wh);
			
			$op_agenda_kategori = $this->input->post('op_agenda_kategori');
			$this->db->delete('ci_agenda_log',$wh);
			if(is_array($op_agenda_kategori)){
				foreach($op_agenda_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Agenda'] = $id;
					$this->db->insert('ci_agenda_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Agenda'] = $id;
				$this->db->insert('ci_agenda_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_agenda_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Agenda'] = $id;
						$this->db->insert('ci_agenda_tags',$in3);
					}
				}
			}
			
			if($a){
				if($warning){
					set_alert('warning','Data berhasil disimpan, namun terdapat kesalahan, silakan cek kembali waktu agenda anda !');
				}
				else{
					set_alert('success','Data berhasil diupdate');
				}
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function slc_op_agenda_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Agenda',$id)->get('ci_agenda_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_agenda_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Agenda',$id)->get('ci_agenda_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_agenda_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_agenda_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_agenda_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_agenda_kategori',$wh);
				$this->db->delete('ci_agenda_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_agenda_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_agenda_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_agenda_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_agenda_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_agenda_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_agenda_kategori');
		return $a;
	}
	
	
	function insert_agenda_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_agenda_kategori');
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
			$a = $this->db->insert('ci_agenda_kategori',$in);
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
		
	function update_agenda_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_agenda_kategori',$in,$wh);
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
	
	function op_agenda_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_agenda_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
}


