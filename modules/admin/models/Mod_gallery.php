<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_gallery extends CI_Model {
	
	//================== GALLERY ================//
	
	function tabel_gallery_album($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Nm_Album like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM ci_gallery_album a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_gallery_album(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Album'] = $id;
				$this->db->delete('ci_gallery_album',$wh);
				$this->db->delete('ci_gallery',$wh);
				$this->db->delete('ci_gallery_log',$wh);
				$this->db->delete('ci_gallery_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_gallery_album(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Album'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_gallery_album',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_gallery_album(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Album'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_gallery_album',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_gallery_album($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Album',$id)->get('ci_gallery_album');
		return $a;
	}
	
	function get_gallery_album($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Album',$id)->get('ci_gallery_album');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Nm_Album;
		}
		return $h;
	}
	
	
	function insert_gallery_album(){
		$this->form_validation->set_rules('Nm_Album','Nama Album','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Album','ID_Album')->where('ID_Web',config())->get('ci_gallery_album');
			$idd = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$idd = $bb->ID_Album+1;
			}
			$in['ID_Web'] = config();
			$in['ID_Album'] = $idd;
			$in['Nm_Album'] = $this->input->post('Nm_Album');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Time'] = db_time($this->input->post('Time'));
			$in['Author'] = $this->session->userdata('userid');
			$in['Status'] = 1;
			$a = $this->db->insert('ci_gallery_album',$in);
			$insert_id = $idd;
			
			$op_gallery_kategori = $this->input->post('op_gallery_kategori');
			if(is_array($op_gallery_kategori)){
				foreach($op_gallery_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Album'] = $insert_id;
					$this->db->insert('ci_gallery_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Album'] = $insert_id;
				$this->db->insert('ci_gallery_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Album'] = $insert_id;
						$this->db->insert('ci_gallery_tags',$in3);
					}
				}
			}
			
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(site_url(fmodule('gallery/detail/'.$idd)));
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_gallery_album($id=0){
		$this->form_validation->set_rules('Nm_Album','Nama Album','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Album'] = $id;
			$in['Nm_Album'] = $this->input->post('Nm_Album');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Time'] = db_time($this->input->post('Time'));
			$a = $this->db->update('ci_gallery_album',$in,$wh);
			
			$op_gallery_kategori = $this->input->post('op_gallery_kategori');
			$this->db->delete('ci_gallery_log',$wh);
			if(is_array($op_gallery_kategori)){
				foreach($op_gallery_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Album'] = $id;
					$this->db->insert('ci_gallery_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Album'] = $id;
				$this->db->insert('ci_gallery_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_gallery_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Album'] = $id;
						$this->db->insert('ci_gallery_tags',$in3);
					}
				}
			}
			
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
	
	function tabel_gallery_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_gallery_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_gallery_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_gallery_kategori',$wh);
				$this->db->delete('ci_gallery_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_gallery_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_gallery_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_gallery_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_gallery_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_gallery_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_gallery_kategori');
		return $a;
	}
	
	function get_gallery_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_gallery_kategori');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Nm_Kategori;
		}
		return $h;
	}
	
	
	function insert_gallery_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->where('ID_Web',config())->get('ci_gallery_kategori');
			$idd = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$idd = $bb->ID_Kategori+1;
			}
			$in['ID_Web'] = config();
			$in['ID_Kategori'] = $idd;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$in['Time'] = db_time(TimeNow());
			$in['Status'] = 1;
			$a = $this->db->insert('ci_gallery_kategori',$in);
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
		
	function update_gallery_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_gallery_kategori',$in,$wh);
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
	
	function tabel_gallery($kategori=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.Deskripsi like "%'.$keyword.'%")';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_gallery a LEFT JOIN ci_user b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Album = '.$kategori.' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_gallery(){
		$upload_path = './assets/'.config('main_site').'/images/gallery/';
		$chk = $this->input->post('chk');
		
		if(is_array($chk)){
			foreach($chk as $id){
				$raw = $this->input->post('Image_Raw'.$id);
				$ext = $this->input->post('Image_Ext'.$id);
		
				file_exists($upload_path.$raw.'_original'.$ext) ? unlink($upload_path.$raw.'_original'.$ext) : '' ;
				file_exists($upload_path.$raw.'_crop'.$ext) ? unlink($upload_path.$raw.'_crop'.$ext) : '' ;
				file_exists($upload_path.$raw.'_thumb'.$ext) ? unlink($upload_path.$raw.'_thumb'.$ext) : '' ;
				file_exists($upload_path.$raw.'_wm'.$ext) ? unlink($upload_path.$raw.'_wm'.$ext) : '' ;
				file_exists($upload_path.$raw.$ext) ? unlink($upload_path.$raw.$ext) : '' ;
				
				$wh['ID_Web'] = config();
				$wh['ID'] = $id;
				$this->db->delete('ci_gallery',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_gallery(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_gallery',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_gallery(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_gallery',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_gallery($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID',$id)->get('ci_gallery');
		return $a;
	}
	
	function insert_gallery($image=NULL,$raw=NULL,$ext=NULL,$ID_Album=0){
		$qlast = $this->db->select_max('ID','ID')->where('ID_Web',config())->get('ci_gallery');
		$last_id = 1;
		if($qlast->num_rows() > 0){
			$ls = $qlast->row();
			$last_id = $ls->ID+1;
		} 
		$in['ID_Web'] = config();
		$in['ID'] = $last_id;
		$in['ID_Album'] = $ID_Album;
		$in['Deskripsi'] = $this->input->post('Deskripsi');
		$in['Time'] = db_time(TimeNow());
		if($image != ''){
		$in['Image'] = $image;
		$in['Image_Raw'] = $raw;
		$in['Image_Ext'] = $ext;
		}
		$in['ID_User'] = $this->session->userdata('userid');
		$in['Status'] = 1;			
		$a = $this->db->insert('ci_gallery',$in);
			
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
		
	function update_gallery($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$wh['ID_Web'] = config();
		$wh['ID'] = $id;
		$in['Deskripsi'] = $this->input->post('Deskripsi');
		if($image != '' or $this->input->post('hapus_image')){
		$in['Image'] = $image;
		$in['Image_Raw'] = $raw;
		$in['Image_Ext'] = $ext;
		}
		$a = $this->db->update('ci_gallery',$in,$wh);
		
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
	
	function gallery_cover($kategori=0,$id=0){
		$wh['ID_Web'] = config();
		$wh['ID_Album'] = $kategori;
		$in['Cover'] = 0;
		$this->db->update('ci_gallery',$in,$wh);
		
		$wh2['ID_Web'] = config();
		$wh2['ID'] = $id;
		$wh2['ID_Album'] = $kategori;
		$in2['Cover'] = 1;
		$a = $this->db->update('ci_gallery',$in2,$wh2);
		if($a){
			set_alert('success','Data berhasil diupdate');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			set_alert('error','Data gagal diupdate');
			redirect($_SERVER['HTTP_REFERER']);
		}
		return $a;
	}
	
	function op_gallery_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_gallery_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
	
	function slc_op_gallery_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Album',$id)->get('ci_gallery_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_album_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Album',$id)->get('ci_gallery_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
}


