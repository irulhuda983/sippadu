<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_komentar extends CI_Model {
	
	function tabel_komentar($status='%',$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Comment DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Name like "%'.$keyword.'%") OR (a.Judul like "%'.$keyword.'%")) ';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_Type,b.Class,
		case a.Type 
			when 1 then (select Judul from ci_berita where ID_Web = '.config().' and ID_Berita = a.Item) 
			when 2 then (select Nm_Menu from ci_menu where ID_Web = '.config().' and ID_Menu = a.Item) 
			when 3 then (select Judul from ci_informasi where ID_Web = '.config().' and ID_Info = a.Item) 
			when 4 then (select Judul from ci_download where ID_Web = '.config().' and ID_Download = a.Item) 
			when 5 then (select Nm_Kategori from ci_gallery_kategori where ID_Web = '.config().' and ID_Kategori = a.Item) 
			when 6 then "Buku Tamu" 
		else "-" 
		end as Judul 
		FROM ci_comments a left JOIN ci_comments_type b ON a.Type = b.ID_Type WHERE a.ID_Web = '.config().' AND a.Status like "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function delete_komentar(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_Web'] = config();
				$wh['ID_Comment'] = $id;
				$this->db->delete('ci_comments',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_komentar(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['ID_Comment'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_comments',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_komentar(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['ID_Comment'] = $id;
				$wh['ID_Web'] = config();
				$this->db->update('ci_comments',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_komentar($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Comment',$id)->get('ci_comments');
		return $a;
	}
	
	function mention_komentar($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Comment',$id)->get('ci_comments');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = '@'.$aa->Name.'&nbsp;:&nbsp;';
		}
		return $h;
	}
	
	function insert_komentar($parent=0,$type=0,$item=0){
		$this->form_validation->set_rules('Name','Nama','required');
		$this->form_validation->set_rules('Message','Isi Komentar','required');
		
		if($this->form_validation->run() == TRUE){
			$qlast = $this->db->select_max('ID_Comment','ID_Comment')->where('ID_Web',config())->get('ci_comments');
			$last_id = 1;
			if($qlast->num_rows() > 0){
				$ls = $qlast->row();
				$last_id = $ls->ID_Comment+1;
			} 
			$in['ID_Web'] = config();
			$in['ID_Comment'] = $last_id;
			$in['ID_Parent'] = $parent;
			$in['Type'] = $type;
			$in['Item'] = $item;
			$in['Name'] = $this->input->post('Name');
			$in['Message'] = $this->input->post('Message');
			$in['Address'] = $this->input->post('Address');
			$in['Phone'] = $this->input->post('Phone');
			$in['Email'] = $this->input->post('Email');
			$in['URL'] = $this->input->post('URL');
			$in['Time'] = db_time(TimeNow());
			$in['Status'] = 0;
			$a = $this->db->insert('ci_comments',$in);
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				$this->session->set_flashdata('WindowReload',1);
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
		
	function update_komentar($id=0){
		$this->form_validation->set_rules('Name','Nama','required');
		$this->form_validation->set_rules('Message','Isi Komentar','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_Comment'] = $id;
			//$in['Type'] = $type;
			//$in['Item'] = $item;
			$in['Name'] = $this->input->post('Name');
			$in['Message'] = $this->input->post('Message');
			$in['Address'] = $this->input->post('Address');
			$in['Phone'] = $this->input->post('Phone');
			$in['Email'] = $this->input->post('Email');
			$in['URL'] = $this->input->post('URL');
			//$in['Time'] = db_time(TimeNow());
			//$in['Status'] = 1;
			$a = $this->db->update('ci_comments',$in,$wh);
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
}


