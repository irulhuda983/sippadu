<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_download extends CI_Model {
	
	function tabel_download($category=0,$id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'GROUP BY a.ID_Download ORDER BY a.ID_Download DESC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.'';
		}
		
		if($category>0){
			$q_where .= ' and a.ID_Kategori = '.$category;
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Download = '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Judul like "%'.$keyword.'%") OR (b.Konten like "%'.$keyword.'%")) ';
		}
				
		$a = $this->db->query('select a.ID_Download,b.Judul,b.Konten,b.Hits from ci_download_log a inner join ci_download b on a.ID_Download=b.ID_Download and a.ID_Web = b.ID_Web 
		WHERE a.ID_Web = '.config().' AND b.Status = 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_download SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Download = "'.$id.'"');
		return $a;
	}
	
	
	function data_download($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Download',$id)->get('ci_download');
		return $a;
	}
	
	function data_download_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_download_kategori');
		return $a;
	}
	
	function data_download_open($id=0){
		$b = $this->data_download($id);
		$q_orderby = 'ORDER BY ID ASC';
		if($b->num_rows() > 0){
			$bb = $b->row();
			$order = $bb->Sort_Order_By;
			$asc_desc = $bb->Asc_Desc;
			if($order != '' && $asc_desc != ''){
				$q_orderby = 'ORDER BY '.$order.' '.$asc_desc;
			}
		}
		
		$a = $this->db->query('SELECT * FROM ci_download_data WHERE ID_Web = '.config().' AND ID_Download = '.$id.' '.$q_orderby);
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Download',$id)->where('ID_Web',config())->get('ci_download');
		return $a;
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
