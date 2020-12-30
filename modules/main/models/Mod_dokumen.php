<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_dokumen extends CI_Model {
	
	function tabel_dokumen($category=0,$id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'GROUP BY a.ID_Dokumen ORDER BY a.ID_Dokumen DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		if($category>0){
			$q_where .= ' and a.ID_Kategori = '.$category;
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Dokumen = '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Judul like "%'.$keyword.'%") OR (b.Konten like "%'.$keyword.'%"))';
		}
				
		$a = $this->db->query('select a.ID_Dokumen,b.Judul,b.Konten,b.Hits,b.Download from ci_dokumen_log a inner join ci_dokumen b on a.ID_Dokumen=b.ID_Dokumen and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND b.Status = 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_dokumen SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Dokumen = "'.$id.'"');
		return $a;
	}
	
	function hits_download($id=0){
		$a = $this->db->query('UPDATE ci_dokumen SET Download=Download+1 WHERE ID_Web = "'.config().'" and ID_Dokumen = "'.$id.'"');
		return $a;
	}
	
	
	function data_dokumen($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Dokumen',$id)->get('ci_dokumen');
		return $a;
	}
	
	function data_dokumen_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_dokumen_kategori');
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Dokumen',$id)->where('ID_Web',config())->get('ci_dokumen');
		return $a;
	}
	
	function get_dokumen($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Dokumen',$id)->get('ci_dokumen');
		$upload_path = './assets/'.config('main_site').'/files/dokumen/';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$judul = $aa->Judul.$aa->File_Ext;
			$file = file_get_contents($upload_path.$aa->File_Name);
			
			$h = FALSE;
			force_download($judul, $file);
		}
		else{
			$h ='Dokumen gagal, File tidak ditemukan!';
		}
		return $h;
	}
	
}
