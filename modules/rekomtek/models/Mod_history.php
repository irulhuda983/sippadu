<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_history extends CI_Model {
	
	function tbl_history($limit=0,$offset=0){
		$user = $this->session->userdata('sippadu_userid');
		$a = $this->db->where('ID_User',$user)->get('sippadu_user_pelanggan');
		$ar = array();
		$imp = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$ar[] = $aa->ID_Pelanggan;
			}
		}
		
		if(is_array($ar)){
			$imp = implode(',',$ar);
		}
		
		if($imp==''){
			$imp = 0;
		}
		
		$b = $this->db->query('CALL sippadu_RptHistoryIzin("'.$imp.'",'.$offset.','.$limit.')');
		$b->next_result();
		return $b;
	}
	
}
