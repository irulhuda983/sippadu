<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_gallery extends CI_Model {
	
	function tabel_gallery_album($category=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.' ';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((a.Nm_Album like "%'.$keyword.'%") OR (a.Deskripsi like "%'.$keyword.'%")) ';
		}
		
		if($category > 0){
			$q_where .= ' AND x.ID_Kategori = "'.$category.'" ';
		}
				
		$a = $this->db->query('select a.*,(select count(b.ID) from ci_gallery b where b.ID_Album = a.ID_Album and b.ID_Web = a.ID_Web) as JmlFoto,(SELECT Image_Raw FROM ci_gallery c WHERE c.ID_Web = a.ID_Web and c.ID_Album = a.ID_Album ORDER BY c.Cover,c.ID DESC LIMIT 0,1) as Cover_Raw,(SELECT Image_Ext FROM ci_gallery c WHERE c.ID_Web = a.ID_Web and c.ID_Album = a.ID_Album ORDER BY c.Cover,c.ID DESC LIMIT 0,1) as Cover_Ext from ci_gallery_album a inner join ci_gallery_log x ON a.ID_Album = x.ID_Album AND a.ID_Web = x.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_gallery_album SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Album = "'.$id.'"');
		return $a;
	}
	
	
	function data_gallery_album($id=0){
		//$a = $this->db->where('ID_Web',config())->where('ID_Album',$id)->get('ci_gallery_album');
		$a = $this->db->query('SELECT a.*,b.Nm_User from ci_gallery_album a inner join ci_user b on a.Author = b.ID_User and a.ID_Web = b.ID_Web where a.ID_Web = "'.config().'" and a.ID_Album = "'.$id.'" order by a.ID_Album desc');
		return $a;
	}
	
	function data_gallery_open($id=0){
		$a = $this->db->order_by('ID','DESC')->where('ID_Web',config())->where('ID_Album',$id)->get('ci_gallery');
		return $a;
	}
	
	function data_gallery_kategori($id=0){
		$a = $this->db->order_by('ID_Kategori','DESC')->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_gallery_kategori');
		return $a;
	}
	
	function tabel_berita_latest($id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Time DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
			
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_berita a LEFT JOIN ci_user b ON a.Author = b.ID_User and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 AND a.ID_Berita != '.$id.' '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	
}
