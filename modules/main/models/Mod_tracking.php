<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_tracking extends CI_Model {
	
	function data_tracking($register='',$kitas=''){
		$a = $this->db->query('CALL sippadu_TrackingIzin("'.$register.'","'.$kitas.'")');
		$a->next_result(); 
		return $a;
	}

	public function detailTrack($register)
	{
		$query = "SELECT * FROM `sippadu_track_izin` WHERE `id_reg` = '$register' ORDER BY `tanggal` DESC";
		$data = $this->db->query($query)->result_array();
		return $data;
	}
}
