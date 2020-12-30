<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_anggota extends CI_Model {
	
	//================== INFORMASI ================//
	
	function tabel_anggota($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Sort_Order ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nama like "%'.$keyword.'%") OR (a.Alamat like "%'.$keyword.'%") OR (a.Jabatan like "%'.$keyword.'%") OR (a.Keterangan like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_anggota a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_anggota(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Anggota'] = $id;
				$this->db->delete('ci_anggota',$wh);
				$this->db->delete('ci_anggota_log',$wh);
				$this->db->delete('ci_anggota_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_anggota(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Anggota'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_anggota',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_anggota(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Anggota'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_anggota',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function save_anggota(){
		$ID_Web = config();
		$ID_Anggota = $this->input->post('ID_Anggota');
		$Sort_Order = $this->input->post('Sort_Order');
		if(is_array($ID_Anggota)){
			foreach($ID_Anggota as $idx => $val){
				$sort = $Sort_Order[$idx];
				$id = $ID_Anggota[$idx];
				$this->db->query('UPDATE ci_anggota SET Sort_Order = "'.$sort.'" WHERE ID_Web = "'.$ID_Web.'" AND ID_Anggota = "'.$id.'"');
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function data_anggota($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Anggota',$id)->get('ci_anggota');
		return $a;
	}
	
	function insert_anggota($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nama','Nama','required');
		$this->form_validation->set_rules('Tempat_Lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('Tgl_Lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('Alamat','Alamat','');
		$this->form_validation->set_rules('Jabatan','Jabatan','');
		$this->form_validation->set_rules('Telepon','Telepon','');
		$this->form_validation->set_rules('Email','Email','');
		$this->form_validation->set_rules('Web','Web','');
		$this->form_validation->set_rules('Keterangan','Isi Keterangan','');
		$this->form_validation->set_rules('op_anggota_kategori','Kategori Berita','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Anggota','ID_Anggota')->where('ID_Web',config())->get('ci_anggota');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Anggota+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Anggota'] = $last_id;
			$in['Nama'] = $this->input->post('Nama');
			$in['Tempat_Lahir'] = $this->input->post('Tempat_Lahir');
			$in['Tgl_Lahir'] = $this->input->post('Tgl_Lahir');
			$in['Alamat'] = $this->input->post('Alamat');
			$in['Jabatan'] = $this->input->post('Jabatan');
			$in['Telepon'] = $this->input->post('Telepon');
			$in['Email'] = $this->input->post('Email');
			$in['Website'] = $this->input->post('Website');
			$in['Keterangan'] = $this->input->post('Keterangan');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Author'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_anggota',$in);
			$insert_id = $last_id;
			
			$op_anggota_kategori = $this->input->post('op_anggota_kategori');
			if(is_array($op_anggota_kategori)){
				foreach($op_anggota_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Anggota'] = $insert_id;
					$this->db->insert('ci_anggota_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Anggota'] = $insert_id;
				$this->db->insert('ci_anggota_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Anggota'] = $insert_id;
						$this->db->insert('ci_anggota_tags',$in3);
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
		
	function update_anggota($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nama','Nama','required');
		$this->form_validation->set_rules('Tempat_Lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('Tgl_Lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('Alamat','Alamat','');
		$this->form_validation->set_rules('Jabatan','Jabatan','');
		$this->form_validation->set_rules('Telepon','Telepon','');
		$this->form_validation->set_rules('Email','Email','');
		$this->form_validation->set_rules('Web','Web','');
		$this->form_validation->set_rules('Keterangan','Isi Keterangan','');
		$this->form_validation->set_rules('op_anggota_kategori','Kategori Berita','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Anggota'] = $id;
			$in['Nama'] = $this->input->post('Nama');
			$in['Tempat_Lahir'] = $this->input->post('Tempat_Lahir');
			$in['Tgl_Lahir'] = $this->input->post('Tgl_Lahir');
			$in['Alamat'] = $this->input->post('Alamat');
			$in['Jabatan'] = $this->input->post('Jabatan');
			$in['Telepon'] = $this->input->post('Telepon');
			$in['Email'] = $this->input->post('Email');
			$in['Website'] = $this->input->post('Website');
			$in['Keterangan'] = $this->input->post('Keterangan');
			$in['Time'] = db_time($this->input->post('Time'));
			if($image != '' or $this->input->post('hapus_image')){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$a = $this->db->update('ci_anggota',$in,$wh);
			
			$op_anggota_kategori = $this->input->post('op_anggota_kategori');
			$this->db->delete('ci_anggota_log',$wh);
			if(is_array($op_anggota_kategori)){
				foreach($op_anggota_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Anggota'] = $id;
					$this->db->insert('ci_anggota_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Anggota'] = $id;
				$this->db->insert('ci_anggota_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_anggota_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Anggota'] = $id;
						$this->db->insert('ci_anggota_tags',$in3);
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
	
	function slc_op_anggota_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Anggota',$id)->get('ci_anggota_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_anggota_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Anggota',$id)->get('ci_anggota_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_anggota_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_anggota_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_anggota_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_anggota_kategori',$wh);
				$this->db->delete('ci_anggota_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_anggota_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_anggota_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_anggota_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_anggota_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_anggota_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_anggota_kategori');
		return $a;
	}
	
	
	function insert_anggota_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_anggota_kategori');
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
			$a = $this->db->insert('ci_anggota_kategori',$in);
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
		
	function update_anggota_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_anggota_kategori',$in,$wh);
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
	
	function op_anggota_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_anggota_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
}


