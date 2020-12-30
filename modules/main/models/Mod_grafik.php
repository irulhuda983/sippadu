<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_grafik extends CI_Model {
	
	function tabel_grafik($category=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_Grafik DESC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Grafik like "%'.$keyword.'%") OR (a.Deskripsi like "%'.$keyword.'%"))';
		}
				
		$a = $this->db->query('select * from ci_grafik a WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_grafik SET Hits=ifnull(Hits,0)+1 WHERE ID_Web = "'.config().'" AND ID_Grafik = "'.$id.'"');
		return $a;
	}
	
	
	function data_grafik($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Grafik',$id)->get('ci_grafik');
		return $a;
	}
	
	function data_grafik_open($id=0){
		$b = $this->data_grafik($id);
		$q_orderby = 'ORDER BY ID ASC';
		if($b->num_rows() > 0){
			$bb = $b->row();
			$order = $bb->Sort_Order_By;
			$asc_desc = $bb->Asc_Desc;
			if($order != '' && $asc_desc != ''){
				$q_orderby = 'ORDER BY '.$order.' '.$asc_desc;
			}
		}
		
		$a = $this->db->query('SELECT * FROM ci_grafik_data WHERE ID_Web = '.config().' AND ID_Grafik = '.$id.' AND Status = 1 '.$q_orderby);
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Grafik',$id)->where('ID_Web',config())->get('ci_grafik');
		return $a;
	}
	
	function data_slide_page_sippadu($id=0){
		$a = $this->db->where('ID_Menu',$id)->where('ID_Web',config())->get('ci_menu');
		return $a;
	}
	
	function grafik_sippadu($tahun=0){
		$b = $this->db->where('Status','1')->get('tb_izin');
		$c = array();
		$cc = '';
		if($b->num_rows() > 0){
			foreach($b->result() as $bb){
				$c[] = $bb->Kd_Izin;
			}
			$cc = implode(',',$c);
		}
		
		
		
		$a = $this->db->query('CALL sippadu_RptIzinRekapTahun("'.$cc.'",'.$tahun.')');
		$a->next_result(); 
		return $a;
	}
	
}
