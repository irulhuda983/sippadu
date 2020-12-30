<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_tabel extends CI_Model {
	
	function tabel_tabel($category=0,$id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'GROUP BY a.ID_Tabel ORDER BY b.Time DESC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.'';
		}
		
		if($category>0){
			$q_where .= ' and a.ID_Kategori = '.$category;
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Tabel = '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Nm_Tabel like "%'.$keyword.'%") OR (b.Deskripsi like "%'.$keyword.'%")) ';
		}
				
		$a = $this->db->query('select a.ID_Tabel,b.*,c.Nm_User from ci_tabel_log a inner join ci_tabel b on a.ID_Tabel=b.ID_Tabel and a.ID_Web = b.ID_Web inner join ci_user c ON b.Author = c.ID_User and b.ID_Web = c.ID_Web 
		WHERE a.ID_Web = '.config().' AND b.Status = 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_tabel SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Tabel = "'.$id.'"');
		return $a;
	}
	
	
	function data_tabel($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Tabel',$id)->get('ci_tabel');
		return $a;
	}
	
	function data_tabel_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_tabel_kategori');
		return $a;
	}
	
	function data_tabel_open($id=0){
		$b = $this->data_tabel($id);
		$q_orderby = 'ORDER BY ID ASC';
		if($b->num_rows() > 0){
			$bb = $b->row();
			$order = $bb->Sort_Order_By;
			$asc_desc = $bb->Asc_Desc;
			if($order != '' && $asc_desc != ''){
				$q_orderby = 'ORDER BY '.$order.' '.$asc_desc;
			}
		}
		
		$a = $this->db->query('SELECT * FROM ci_tabel_data WHERE ID_Web = '.config().' AND ID_Tabel = '.$id.' '.$q_orderby);
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Tabel',$id)->where('ID_Web',config())->get('ci_tabel');
		return $a;
	}
	
	function data_kolom($id=0){
		$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Tabel',$id)->get('ci_tabel_col');
		return $a;
	}
	
	function data_baris($id=0){
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		
		$a = $this->db->query('SELECT ID_Row FROM ci_tabel_data a where a.ID_Web = "'.config().'" and a.ID_Tabel = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
	
	function data_col($id=0){
		$a = $this->db->query('SELECT ID_Col FROM ci_tabel_col a where a.ID_Web = "'.config().'" and a.ID_Tabel = "'.$id.'" GROUP BY ID_Col ORDER BY a.Nomor ASC');
		return $a;
	}
	
	function data_row($id=0){
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		$a = $this->db->query('SELECT ID_Row FROM ci_tabel_data a where a.ID_Web = "'.config().'" and a.ID_Tabel = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
}
