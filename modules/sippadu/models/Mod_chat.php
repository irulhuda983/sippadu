<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_chat extends CI_Model {
	
	function chatHeartBeat($username=0){
		$sql = $this->db->query('SELECT * FROM ci_chat where `to` = "'.$username.'" AND recd = 0 ORDER BY id ASC');
		return $sql;
	}
	
	function updateRCD($username=0){
		$sql = $this->db->query('UPDATE ci_chat set recd = 1 where `to` = "'.$username.'" AND recd = 0');
		return $sql;
	}
	
	function InsertChat($from='',$to='',$message=''){
		$sql = $this->db->query('INSERT INTO ci_chat (`from`,`to`,message,sent) values ("'.$from.'", "'.$to.'","'.$message.'",NOW())');
		return $sql;
	}
	
}
