<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_berita extends CI_Model {
	
	//================== BERITA ================//
	
	function tabel_berita($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_berita a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_berita(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Berita'] = $id;
				$this->db->delete('ci_berita',$wh);
				$this->db->delete('ci_berita_log',$wh);
				$this->db->delete('ci_berita_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_berita(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Berita'] = $id;
				$this->db->update('ci_berita',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_berita(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Berita'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_berita',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_berita($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Berita',$id)->get('ci_berita');
		return $a;
	}
	
	function insert_berita($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Judul','Judul','required');
		$this->form_validation->set_rules('Konten','Isi Konten','required');
		//$this->form_validation->set_rules('op_berita_kategori','Kategori Berita','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Berita','ID_Berita')->where('ID_Web',config())->get('ci_berita');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Berita+1;
			} 
			
			$in['ID_Web'] = config();
			$in['ID_Berita'] = $last_id;
			$in['Judul'] = $this->input->post('Judul');
			$in['Konten'] = $this->input->post('Konten');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_berita',$in);
			$insert_id = $last_id;
			
			$op_berita_kategori = $this->input->post('op_berita_kategori');
			if(is_array($op_berita_kategori)){
				foreach($op_berita_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Berita'] = $insert_id;
					$this->db->insert('ci_berita_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Berita'] = $insert_id;
				$this->db->insert('ci_berita_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Berita'] = $insert_id;
						$this->db->insert('ci_berita_tags',$in3);
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
		
	function update_berita($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Judul','Judul','required');
		$this->form_validation->set_rules('Konten','Isi Konten','required');
		$this->form_validation->set_rules('op_berita_kategori','Kategori Berita','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Berita'] = $id;
			$in['Judul'] = $this->input->post('Judul');
			$in['Konten'] = $this->input->post('Konten');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_berita',$in,$wh);
			
			$op_berita_kategori = $this->input->post('op_berita_kategori');
			$this->db->delete('ci_berita_log',$wh);
			if(is_array($op_berita_kategori)){
				foreach($op_berita_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Berita'] = $id;
					$this->db->insert('ci_berita_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Berita'] = $id;
				$this->db->insert('ci_berita_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_berita_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Berita'] = $id;
						$this->db->insert('ci_berita_tags',$in3);
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
	
	function slc_op_berita_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Berita',$id)->get('ci_berita_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_berita_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Berita',$id)->get('ci_berita_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_berita_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_berita_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_berita_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_berita_kategori',$wh);
				$this->db->delete('ci_berita_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_berita_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_berita_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_berita_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->update('ci_berita_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_berita_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_berita_kategori');
		return $a;
	}
	
	
	function insert_berita_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_berita_kategori');
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
			$a = $this->db->insert('ci_berita_kategori',$in);
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
		
	function update_berita_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_berita_kategori',$in,$wh);
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
	
	function op_berita_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_berita_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
}


