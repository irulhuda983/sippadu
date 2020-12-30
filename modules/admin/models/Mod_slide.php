<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_slide extends CI_Model {
	
	//================== SLIDE ================//
	
	function tabel_slide($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Slide like "%'.$keyword.'%") OR (a.Konten like "%'.$keyword.'%") OR (a.Description1 like "%'.$keyword.'%") OR (a.Description2 like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_slide a LEFT JOIN ci_user b ON a.Author = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function tabel_slidepage($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = ' ORDER BY A.NoClass,A.Title ASC,A.ID DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Title like "%'.$keyword.'%") OR (a.Deskripsi like "%'.$keyword.'%") OR (a.Class like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('
		SELECT * FROM
		(
			SELECT ID_Web,ID_Menu AS ID,Nm_Menu AS Title,Description1 AS Deskripsi,Konten,Image,Image_Raw,Image_Ext,`Status`,"menu" AS Class,1 AS NoClass FROM ci_menu
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"berita",2 FROM ci_berita_kategori
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"info",3 FROM ci_informasi_kategori
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"download",4 FROM ci_download_kategori
			UNION ALL
			SELECT ID_Web,ID_Page,Nm_Page,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"page",5 FROM ci_page
		) A WHERE A.ID_Web = '.config().' AND A.Status = 1
		'.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_slide(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Slide'] = $id;
				$this->db->delete('ci_slide',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_slide(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Web'] = config();
				$wh['ID_Slide'] = $id;
				$this->db->update('ci_slide',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_slide(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Slide'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_slide',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_slide($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Slide',$id)->get('ci_slide');
		return $a;
	}
	
	function insert_slide($image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Slide','Nama Slide','required');
		$this->form_validation->set_rules('Konten','Isi Konten','');
		//$this->form_validation->set_rules('op_berita_kategori','Kategori Berita','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Slide','Last_ID')->where('ID_Web',config())->get('ci_slide');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->Last_ID+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Slide'] = $last_id;
			$in['Nm_Slide'] = $this->input->post('Nm_Slide');
			$in['Description'] = $this->input->post('Description');
			$in['Konten'] = $this->input->post('Konten');
			$in['Show_Title'] = $this->input->post('Show_Title');
			$in['Show_Desc'] = $this->input->post('Show_Desc');
			$in['URL'] = $this->input->post('URL');
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Author'] = $this->session->userdata('userid');
			$in['Sort_Order'] = 0;			
			$in['Time'] = db_time($this->input->post('Time'));
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_slide',$in);
			
			
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
		
	function update_slide($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Nm_Slide','Nama Slide','required');
		$this->form_validation->set_rules('Konten','Isi Konten','');
		//$this->form_validation->set_rules('op_berita_kategori','Kategori Berita','is_natural_no_zero');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Slide'] = $id;
			$in['Nm_Slide'] = $this->input->post('Nm_Slide');
			$in['Description'] = $this->input->post('Description');
			$in['Konten'] = $this->input->post('Konten');
			$in['Show_Title'] = $this->input->post('Show_Title');
			$in['Show_Desc'] = $this->input->post('Show_Desc');
			$in['URL'] = $this->input->post('URL');
			if($image != ''){
			$in['Image'] = $image;
			$in['Image_Raw'] = $raw;
			$in['Image_Ext'] = $ext;
			}
			$in['Time'] = db_time($this->input->post('Time'));
			$a = $this->db->update('ci_slide',$in,$wh);
			
			
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
	
	function update_slidepage($id=0,$image=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Title','Title','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			switch($this->input->post('Class')){
				case 'menu':
					$wh['ID_Menu'] = $id;
					$in['Nm_Menu'] = $this->input->post('Title');
					$in['Description1'] = $this->input->post('Description');
					if($image != ''){
					$in['Image'] = $image;
					$in['Image_Raw'] = $raw;
					$in['Image_Ext'] = $ext;
					}
					$a = $this->db->update('ci_menu',$in,$wh);
					break;
				case 'berita':
					$wh['ID_Kategori'] = $id;
					$in['Nm_Kategori'] = $this->input->post('Title');
					$in['Deskripsi'] = $this->input->post('Description');
					if($image != ''){
					$in['Image'] = $image;
					$in['Image_Raw'] = $raw;
					$in['Image_Ext'] = $ext;
					}
					$a = $this->db->update('ci_berita_kategori',$in,$wh);
					break;
				case 'info':
					$wh['ID_Kategori'] = $id;
					$in['Nm_Kategori'] = $this->input->post('Title');
					$in['Deskripsi'] = $this->input->post('Description');
					if($image != ''){
					$in['Image'] = $image;
					$in['Image_Raw'] = $raw;
					$in['Image_Ext'] = $ext;
					}
					$a = $this->db->update('ci_informasi_kategori',$in,$wh);
					break;
				case 'download':
					$wh['ID_Kategori'] = $id;
					$in['Nm_Kategori'] = $this->input->post('Title');
					$in['Deskripsi'] = $this->input->post('Description');
					if($image != ''){
					$in['Image'] = $image;
					$in['Image_Raw'] = $raw;
					$in['Image_Ext'] = $ext;
					}
					$a = $this->db->update('ci_download_kategori',$in,$wh);
					break;
				case 'page':
					$wh['ID_Page'] = $id;
					$in['Nm_Page'] = $this->input->post('Title');
					$in['Deskripsi'] = $this->input->post('Description');
					if($image != ''){
					$in['Image'] = $image;
					$in['Image_Raw'] = $raw;
					$in['Image_Ext'] = $ext;
					}
					$a = $this->db->update('ci_page',$in,$wh);
					break;
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
	
	function data_slidepage($id=0,$class=''){
		$a = $this->db->query('
		SELECT * FROM
		(
			SELECT ID_Web,ID_Menu AS ID,Nm_Menu AS Title,Description1 AS Deskripsi,Konten,Image,Image_Raw,Image_Ext,`Status`,"menu" AS Class,1 AS NoClass FROM ci_menu
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"berita",2 FROM ci_berita_kategori
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"info",3 FROM ci_informasi_kategori
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"download",4 FROM ci_download_kategori
			UNION ALL
			SELECT ID_Web,ID_Page,Nm_Page,Deskripsi,NULL,Image,Image_Raw,Image_Ext,`Status`,"page",5 FROM ci_page
		) A WHERE A.ID_Web = '.config().' AND A.ID = '.$id.' AND A.Class = "'.$class.'"');
		return $a;
	}
}


