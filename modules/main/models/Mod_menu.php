<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_menu extends CI_Model {
	
	function data_menu($id=0){
		$a = $this->db->order_by('Sort_Order','asc')->order_by('ID_Menu','asc')->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
		return $a;
	}
	
	function hits($id=0){
		$a = $this->db->where('ID_Web',config())->query('UPDATE ci_menu SET Hits=Hits+1 WHERE ID_Web = "'.config().'" AND ID_Menu = "'.$id.'"');
		return $a;
	}
	
	function get_menu_jenis($id=0){
		$h = 1;
		$a = $this->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = ifnull($aa->Jn_Menu,1);
		}
		return $h;
	}
	
	function get_menu_class($id=0){
		$h = '';
		$a = $this->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
		if($a->num_rows() > 0){
			$aa = $a->row();
			$h = ifnull($aa->Class_Menu,'');
		}
		return $h;
	}
}
