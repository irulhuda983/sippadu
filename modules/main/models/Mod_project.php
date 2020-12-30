<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_project extends CI_Model {
	
	function tabel_project($category=0,$id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'GROUP BY a.ID_Project ORDER BY (case when b.Time_Mulai >= "'.TimeNow('Y-m-d').'" then 1 else 0 end) desc, b.Time_Mulai ASC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.'';
		}
		
		if($category>0){
			$q_where .= ' and a.ID_Kategori = '.$category;
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Project = '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Nm_Project like "%'.$keyword.'%") OR (b.Deskripsi like "%'.$keyword.'%")) ';
		}
				
		$a = $this->db->query('select (case when b.Time_Mulai >= "'.TimeNow('Y-m-d').'" then 1 else 0 end) as Kode,a.ID_Project,b.*,c.Nm_User from ci_project_log a inner join ci_project b on a.ID_Project=b.ID_Project and a.ID_Web = b.ID_Web inner join ci_user c ON b.Author = c.ID_User and b.ID_Web = c.ID_Web 
		WHERE a.ID_Web = '.config().' AND b.Status = 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_project SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Project = "'.$id.'"');
		return $a;
	}
	
	
	function data_project($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Project',$id)->get('ci_project');
		return $a;
	}
	
	function data_project_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_project_kategori');
		return $a;
	}
	
	function data_project_open($id=0){
		$b = $this->data_project($id);
		$q_orderby = 'ORDER BY ID ASC';
		if($b->num_rows() > 0){
			$bb = $b->row();
			$order = $bb->Sort_Order_By;
			$asc_desc = $bb->Asc_Desc;
			if($order != '' && $asc_desc != ''){
				$q_orderby = 'ORDER BY '.$order.' '.$asc_desc;
			}
		}
		
		$a = $this->db->query('SELECT * FROM ci_project_data WHERE ID_Web = '.config().' AND ID_Project = '.$id.' '.$q_orderby);
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Project',$id)->where('ID_Web',config())->get('ci_project');
		return $a;
	}
	
	function get_project($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Project',$id)->get('ci_project');
		$upload_path = './assets/'.config('main_site').'/files/project/';
		if($a->num_rows() > 0){
			$aa = $a->row();
			$judul = $aa->Judul.$aa->File_Ext;
			$file = file_get_contents($upload_path.$aa->File_Name);
			
			$h = FALSE;
			force_project($judul, $file);
		}
		else{
			$h ='Project gagal, File tidak ditemukan!';
		}
		return $h;
	}
	
}
