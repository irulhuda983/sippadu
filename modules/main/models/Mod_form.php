<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_form extends CI_Model {
	
	function tabel_form($category=0,$id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'GROUP BY a.ID_Form ORDER BY b.Time DESC';
		
		if($limit){
			$q_limit = ' LIMIT '.$offset.','.$limit.'';
		}
		
		if($category>0){
			$q_where .= ' and a.ID_Kategori = '.$category;
		}
		
		if($id>0){
			$q_where .= ' and a.ID_Form = '.$id;
		}
		
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= ' AND ((b.Nm_Form like "%'.$keyword.'%") OR (b.Deskripsi like "%'.$keyword.'%")) ';
		}
				
		$a = $this->db->query('select a.ID_Form,b.*,c.Nm_User from ci_form_log a inner join ci_form b on a.ID_Form=b.ID_Form and a.ID_Web = b.ID_Web inner join ci_user c ON b.Author = c.ID_User and b.ID_Web = c.ID_Web 
		WHERE a.ID_Web = '.config().' AND b.Status = 1 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->query('UPDATE ci_form SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Form = "'.$id.'"');
		return $a;
	}
	
	
	function data_form($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Form',$id)->get('ci_form');
		return $a;
	}
	
	function data_form_kategori($id=0){
		$a = $this->db->where('ID_Web',config())->where('ID_Kategori',$id)->get('ci_form_kategori');
		return $a;
	}
	
	function data_form_open($id=0){
		$b = $this->data_form($id);
		$q_orderby = 'ORDER BY ID ASC';
		if($b->num_rows() > 0){
			$bb = $b->row();
			$order = $bb->Sort_Order_By;
			$asc_desc = $bb->Asc_Desc;
			if($order != '' && $asc_desc != ''){
				$q_orderby = 'ORDER BY '.$order.' '.$asc_desc;
			}
		}
		
		$a = $this->db->query('SELECT * FROM ci_form_data WHERE ID_Web = '.config().' AND ID_Form = '.$id.' '.$q_orderby);
		return $a;
	}
	
	function data_slide_page($id=0){
		$a = $this->db->where('ID_Form',$id)->where('ID_Web',config())->get('ci_form');
		return $a;
	}
	
	function data_kolom($id=0){
		$a = $this->db->where('ID_Web',config())->order_by('Nomor','asc')->where('ID_Form',$id)->get('ci_form_col');
		return $a;
	}
	
	function data_baris($id=0){
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		
		$a = $this->db->query('SELECT ID_Row FROM ci_form_data a where a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
	
	function data_col($id=0){
		$a = $this->db->query('SELECT ID_Col FROM ci_form_col a where a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" GROUP BY ID_Col ORDER BY a.Nomor ASC');
		return $a;
	}
	
	function data_row($id=0){
		$data_kolom = $this->data_kolom($id);
		$q_order = '';
		$a = $this->db->query('SELECT ID_Row FROM ci_form_data a where a.ID_Web = "'.config().'" and a.ID_Form = "'.$id.'" GROUP BY ID_Row '.$q_order.'');
		return $a;
	}
	
	function save_data_form(){
		$col = $this->input->post('col');
		$form = $this->input->post('form');
		$ID_Form = $this->input->post('ID_Form');
		$ID_Row = $this->input->post('ID_Row');
		if($ID_Row != '0'){
			if(is_array($col)){
				foreach($col as $i => $key){
					$wh['ID_Web'] = config();
					$wh['ID_Form'] = $ID_Form;
					$wh['ID_Col'] = $col[$i];
					$wh['ID_Row'] = $ID_Row;
					$in['Value'] = $form[$i];
					$a = $this->db->update('ci_form_data',$in,$wh);
				}
			}
			
			$h = 'Data berhasil diupdate';
		}
		else{
			//$b = $this->db->query('SELECT (max(ID_Row)+1) as ID_Row FROM ci_form_data WHERE ID_Web = "'.config().'" and ID_Form = "'.$ID_Form.'"');
			$b = $this->db->select_max('ID_Row','ID_Row')->where('ID_Web',config())->where('ID_Form',$ID_Form)->get('ci_form_data');
			$last_id = 1;
			if($b->num_rows() > 0){
				$bb = $b->row();
				$last_id = $bb->ID_Row+1;
			}
			
			if(is_array($col)){
				foreach($col as $i => $key){
					$in['ID_Web'] = config();
					$in['ID_Form'] = $ID_Form;
					$in['ID_Col'] = $col[$i];
					$in['ID_Row'] = $last_id;
					$in['Value'] = $form[$i];
					$in['Status'] = 1;
					$a = $this->db->insert('ci_form_data',$in);
				}
			}
			
			$h = 'Data berhasil ditambahkan';
		} 
		
		return $h;
	}
}
