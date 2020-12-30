<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_daftar extends CI_Model {
	
	function tabel_izin(){
		$a = $this->db->query('SELECT * FROM tb_izin WHERE Kd_Izin IN('.AuthIzin().') AND Reg_Online = 1 AND Status = 1 ORDER BY Kd_Izin ASC');
		return $a;
	}
	
}
