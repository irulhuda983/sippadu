<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_main extends CI_Model {
	
	function data_tracking($register='',$kitas=''){
		$a = $this->db->query('CALL sippadu_TrackingIzin("'.$register.'","'.$kitas.'")');
		$a->next_result(); 
		return $a;
	}
	
}
