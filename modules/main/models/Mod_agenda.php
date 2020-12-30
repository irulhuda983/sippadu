<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_agenda extends CI_Model {
	
	function tabel_agenda($category=0,$id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_group = 'GROUP BY b.ID_Agenda';
		$q_order = 'ORDER BY b.Time_Mulai ASC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.'';
		}
		
		if($category>0){
			$q_where .= ' and a.ID_Kategori = '.$category;
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Agenda = '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Judul like "%'.$keyword.'%") OR (b.Konten like "%'.$keyword.'%")) ';
		}
				
		/* $a = $this->db->query('select b.*,c.Nm_User from ci_agenda_log a inner join ci_agenda b on a.ID_Agenda=b.ID_Agenda and a.ID_Web = b.ID_Web inner join ci_user c ON b.Author = c.ID_User
		WHERE a.ID_Web = '.config().' AND b.Status = 1 AND b.Time_Mulai >= "'.TimeNow('Y-m-d').'" '.$q_where.' '.$q_group.' '.$q_order.' '.$q_limit.''); */
		
		$a = $this->db->query('SELECT * FROM 
		(
		select 1 as Kode, b.*,c.Nm_User from ci_agenda_log a inner join ci_agenda b on a.ID_Agenda=b.ID_Agenda and a.ID_Web = b.ID_Web 
		inner join ci_user c ON b.Author = c.ID_User
		WHERE a.ID_Web = '.config().' AND b.Status = 1 AND b.Time_Mulai >= "'.TimeNow('Y-m-d').'" '.$q_where.' GROUP BY a.ID_Agenda ORDER BY b.Time_Mulai ASC
		) a
		UNION ALL
		SELECT * FROM
		(
		select 0 as Kode, b.*,c.Nm_User from ci_agenda_log a inner join ci_agenda b on a.ID_Agenda=b.ID_Agenda and a.ID_Web = b.ID_Web 
		inner join ci_user c ON b.Author = c.ID_User
		WHERE a.ID_Web = '.config().' AND b.Status = 1 AND b.Time_Mulai < "'.TimeNow('Y-m-d').'" '.$q_where.' GROUP BY a.ID_Agenda ORDER BY b.Time_Mulai DESC
		) b');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_agenda SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Agenda = "'.$id.'"');
		return $a;
	}
	
	function tabel_agenda_latest($id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'GROUP BY a.ID_Agenda ORDER BY b.Time_Mulai ASC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.'';
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Agenda != '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Judul like "%'.$keyword.'%") OR (b.Konten like "%'.$keyword.'%")) ';
		}
				
		$a = $this->db->query('select a.ID_Agenda,b.*,c.Nm_User from ci_agenda_log a inner join ci_agenda b on a.ID_Agenda=b.ID_Agenda and a.ID_Web = b.ID_Web inner join ci_user c ON b.Author = c.ID_User
		WHERE a.ID_Web = '.config().' AND b.Status = 1 AND b.Time_Mulai >= "'.TimeNow('Y-m-d').'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function data_agenda($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Agenda',$id)->get('ci_agenda');
		return $a;
	}
	
	function data_agenda_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_agenda_kategori');
		return $a;
	}
	
	function data_agenda_open($id=0){
		$b = $this->data_agenda($id);
		$q_orderby = 'ORDER BY ID ASC';
		if($b->num_rows() > 0){
			$bb = $b->row();
			$order = $bb->Sort_Order_By;
			$asc_desc = $bb->Asc_Desc;
			if($order != '' && $asc_desc != ''){
				$q_orderby = 'ORDER BY '.$order.' '.$asc_desc;
			}
		}
		
		$a = $this->db->query('SELECT * FROM ci_agenda_data WHERE ID_Web = '.config().' AND ID_Agenda = '.$id.' '.$q_orderby);
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Agenda',$id)->where('ID_Web',config())->get('ci_agenda');
		return $a;
	}
	
	
}
