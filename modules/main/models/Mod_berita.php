<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_berita extends CI_Model {
	
	function tabel_berita($category=0,$limit=0,$offset=0){
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
		
		$tbl_category = '(SELECT ID_Web,ID_Berita FROM ci_berita_log WHERE ID_Web = "'.config().'" GROUP BY ID_Berita)';
		if($category){
			$tbl_category = '(SELECT * FROM ci_berita_log WHERE ID_Web = "'.config().'" and ID_Kategori = '.$category.')';
		}
		
		
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM '.$tbl_category.' c INNER JOIN ci_berita a ON c.ID_Berita = a.ID_Berita AND c.ID_Web = a.ID_Web LEFT JOIN ci_user b ON a.Author = b.ID_User and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
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
	
	function data_berita($id=0){
		$a = $this->db->query('SELECT a.*,b.Nm_User,b.Username FROM ci_berita a LEFT JOIN ci_user b ON a.Author = b.ID_User and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 AND a.ID_Berita = "'.$id.'"');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_berita SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Berita = "'.$id.'"');
		return $a;
	}
	
	function data_berita_kategori($id=0){
		$a = $this->db->select('Nm_Kategori')->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_berita_kategori');
		return $a;
	}
	
}
