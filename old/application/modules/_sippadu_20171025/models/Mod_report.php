<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_report extends CI_Model {
	
	
	
	function data_laporan($ID=0,$skpd=0,$jenis=0,$merk=0,$tahun=0){
		$db_group = $this->db->groupname;
		$db = $this->load->database($db_group,TRUE);
		$a = $db->query('CALL sikb_sp_LapKendaraan('.$ID.','.$skpd.','.$jenis.','.$merk.','.$tahun.')');
		return $a;
	}
	
	function data_print_skpd($skpd=0,$jenis=0,$merk=0,$tahun=0){
		$db_group = $this->db->groupname;
		$db = $this->load->database($db_group,TRUE);
		$a = $db->query('CALL sikb_sp_DataPrintSKPD('.$skpd.','.$jenis.','.$merk.','.$tahun.')');
		return $a;
	}
	
	function data_print_kab($jenis=0,$merk=0,$tahun=0){
		$db_group = $this->db->groupname;
		$db = $this->load->database($db_group,TRUE);
		$a = $db->query('CALL sikb_sp_DataPrintKab('.$jenis.','.$merk.','.$tahun.')');
		return $a;
	}
	
}
