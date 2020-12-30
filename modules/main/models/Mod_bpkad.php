<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_bpkad extends CI_Model {
	
	function skpd(){
		$tahun = TimeNow('Y');
		$a = $this->db->like('_name','Dinas')->where('_tahun',$tahun)->get(dbprefix2().'skpd');
		return $a;
	}
	
	function skpd2(){
		$tahun = TimeNow('Y');
		$a = $this->db->like('_name','Badan')->where('_tahun',$tahun)->get(dbprefix2().'skpd');
		return $a;
	}
	
	function skpd3(){
		$tahun = TimeNow('Y');
		$a = $this->db->like('_name','Kecamatan')->where('_tahun',$tahun)->get(dbprefix2().'skpd');
		return $a;
	}
}
