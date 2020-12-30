<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_download extends CI_Model {
	
	
	//================== DOWNLOAD ================//
	
	function tabel_download($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_download a LEFT JOIN ci_user b ON a.ID_User = b.ID_User AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_download(){
		$upload_path = './assets/'.config('main_site').'/files/download/';
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$filename = $this->input->post('File'.$id);
				file_exists($upload_path.$filename) ? unlink($upload_path.$filename) : '' ;
				
				$wh['ID_Web'] = config();
				$wh['ID_Download'] = $id;
				$this->db->delete('ci_download',$wh);
				$this->db->delete('ci_download_log',$wh);
				$this->db->delete('ci_download_tags',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_download(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Download'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_download',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_download(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Download'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_download',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_download($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Download',$id)->get('ci_download');
		return $a;
	}
	
	function insert_download(){
		$this->form_validation->set_rules('Judul','Judul','required');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/files/download/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload()) {
					$u	 				= $this->upload->data();
					$in['File_Name']	= $u['file_name'];
					$in['File_Raw']		= $u['raw_name'];
					$in['File_Ext']    	= $u['file_ext'];
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			$qlast = $this->db->select_max('ID_Download','ID_Download')->where('ID_Web',config())->get('ci_download');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Download+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Download'] = $last_id;
			$in['Judul'] = $this->input->post('Judul');
			$in['Konten'] = $this->input->post('Konten');
			$in['Time'] = db_time($this->input->post('Time'));
			$in['ID_User'] = $this->session->userdata('userid');
			$in['Hits'] = 0;
			$in['Status'] = 1;			
			$a = $this->db->insert('ci_download',$in);
			$insert_id = $last_id;
			
			$op_download_kategori = $this->input->post('op_download_kategori');
			if(is_array($op_download_kategori)){
				foreach($op_download_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Download'] = $insert_id;
					$this->db->insert('ci_download_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Download'] = $insert_id;
				$this->db->insert('ci_download_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Download'] = $insert_id;
						$this->db->insert('ci_download_tags',$in3);
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
		
	function update_download($id=0,$file=NULL,$raw=NULL,$ext=NULL){
		$this->form_validation->set_rules('Judul','Judul','required');
		$this->form_validation->set_rules('Time','Time','required');
		
		if($this->form_validation->run() == TRUE){
			
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/files/download/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload()) {
					$u	 				= $this->upload->data();
					$in['File_Name']	= $u['file_name'];
					$in['File_Raw']		= $u['raw_name'];
					$in['File_Ext']    	= $u['file_ext'];
					$oldfile = $this->input->post('oldfile');
					file_exists($upload_path.$oldfile) ? unlink($upload_path.$oldfile) : '';
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			$wh['ID_Web'] = config();
			$wh['ID_Download'] = $id;
			$in['Judul'] = $this->input->post('Judul');
			$in['Konten'] = $this->input->post('Konten');
			$in['Time'] = db_time($this->input->post('Time'));
			$a = $this->db->update('ci_download',$in,$wh);
			
			$op_download_kategori = $this->input->post('op_download_kategori');
			$this->db->delete('ci_download_log',$wh);
			if(is_array($op_download_kategori)){
				foreach($op_download_kategori as $k){
					$in2['ID_Web'] = config();
					$in2['ID_Kategori'] = $k;
					$in2['ID_Download'] = $id;
					$this->db->insert('ci_download_log',$in2);
				}
			}
			else{
				$in2['ID_Web'] = config();
				$in2['ID_Kategori'] = 0;
				$in2['ID_Download'] = $id;
				$this->db->insert('ci_download_log',$in2);
			}
			
			$Tags = $this->input->post('Tags');
			$ar_tags = explode(',',$Tags);
			if(is_array($ar_tags)){
				$this->db->delete('ci_download_tags',$wh);
				foreach($ar_tags as $t){
					if($t != ''){
						$in3['ID_Web'] = config();
						$in3['Tags'] = $t;
						$in3['ID_Download'] = $id;
						$this->db->insert('ci_download_tags',$in3);
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
	
	function slc_op_download_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Download',$id)->get('ci_download_log');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h[] = $aa->ID_Kategori;
			}
		}
		return $h;
	}
	
	function slc_download_tags($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Download',$id)->get('ci_download_tags');
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h .= $aa->Tags.',';
			}
		}
		return $h;
	}
	
	function tabel_download_kategori($limit=0,$offset=0){
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
		
		
		$a = $this->db->query('SELECT a.* FROM ci_download_kategori a WHERE a.ID_Web = '.config().' AND a.Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_download_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Kategori'] = $id;
				$this->db->delete('ci_download_kategori',$wh);
				$this->db->delete('ci_download_log',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_download_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_download_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_download_kategori(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Kategori'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_download_kategori',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_download_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_download_kategori');
		return $a;
	}
	
	
	function insert_download_kategori(){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$b = $this->db->select_max('ID_Kategori','ID_Kategori')->get('ci_download_kategori');
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
			$a = $this->db->insert('ci_download_kategori',$in);
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
		
	function update_download_kategori($id=0){
		$this->form_validation->set_rules('Nm_Kategori','Nama Kategori','required');
		$this->form_validation->set_rules('Deskripsi','Deskripsi','');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Kategori'] = $id;
			$in['Nm_Kategori'] = $this->input->post('Nm_Kategori');
			$in['Deskripsi'] = $this->input->post('Deskripsi');
			$a = $this->db->update('ci_download_kategori',$in,$wh);
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
	
	function op_download_kategori(){
		$a = $this->db->where('ID_Web',config())->order_by('Nm_Kategori','asc')->where('Status',1)->get('ci_download_kategori');
		$d = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$d[$aa->ID_Kategori] = $aa->Nm_Kategori;
			}
		}
		return $d;
	}
	
	function get_download($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Download',$id)->get('ci_download');
		$upload_path = './assets/'.config('main_site').'/files/download/';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$judul = $aa->Judul.$aa->File_Ext;
			$file = file_get_contents($upload_path.$aa->File_Name);
			
			$h = FALSE;
			force_download($judul, $file);
		}
		else{
			$h ='Download gagal, File tidak ditemukan!';
		}
		return $h;
	}

}


