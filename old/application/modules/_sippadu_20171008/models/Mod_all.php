<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_all extends CI_Model {
	
	function load(){
		$this->load->helper('query');
		$d['cfg_site_title'] = $this->config->item('site_title');
		$d['cfg_site_description'] = $this->config->item('site_title');
		$d['input_keyword'] = $this->keyword();
		$d['title'] = site_title();
		$d['slogan'] = $this->config->item('site_slogan');
		$d['site_title'] = site_title();
		$d['site_description'] = site_description();
		$d['site_keywords'] = site_keywords();
		$d['site_author'] = site_author();
		$d['site_image'] = site_image();
		$d['google_code'] = google_code();
		$d['userfullname'] = $this->session->userdata('userfullname');
		$d['popup'] = $this->popup();
		$d['popup2'] = $this->popup2();
		$d['menuopen'] = '';
		$d['menuopen2'] = '';
		$d['menuactive'] = '';
		$d['top_simda_title'] = $this->session->userdata('sess_Nm_Db');
		$d['sess_Tahun_Db'] = $this->session->userdata('sess_Tahun_Db');
		//$d['menu_group_query'] = $this->menu_group_query();
		$d['uri_string'] = $this->uri->uri_string();
		$d['winpopup'] = FALSE;
		return $d;
	}
	
	function keyword(){
		$keyword = '';
		if(!empty($_GET['keyword'])){
			$keyword = $_GET['keyword'];
		}
		return $keyword;
	}
	
	function popup(){
		$atts = array(
              'width'      => '800',
              'height'     => '700',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		return $atts;
	}
	
	function popup2(){
		$atts = array(
              'width'      => '1100',
              'height'     => '700',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		return $atts;
	}
	
	function menu_group_query(){
		$db_group = $this->db->groupname;
		$db = $this->load->database($db_group,TRUE);
		$a = $db->where('Status',1)->order_by('Nm_Group','asc')->get('simda_query_group');
		return $a;
	}
	
	function data_urusan(){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Nm_Urusan FROM dbo.Ref_Urusan ORDER BY Kd_Urusan');
		return $a;
	}
	
	function data_bidang(){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Nm_Bidang, Kd_Fungsi FROM dbo.Ref_Bidang ORDER BY Kd_Urusan, Kd_Bidang');
		return $a;
	}
	
	function data_unit(){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Kd_Unit, Nm_Unit FROM dbo.Ref_Unit ORDER BY Kd_Urusan, Kd_Bidang, Kd_Unit');
		return $a;
	}
	
	function data_skpd(){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Nm_Sub_Unit FROM dbo.Ref_Sub_Unit ORDER BY Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub');
		return $a;
	}
	
	function data_desa(){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Kd_Desa, Nm_Desa FROM dbo.tbl_sikda_desa ORDER BY Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Kd_Desa');
		return $a;
	}
	
	function data_bidang_f($Kd_Urusan=0){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Nm_Bidang, Kd_Fungsi FROM dbo.Ref_Bidang WHERE Kd_Urusan="'.$Kd_Urusan.'" ORDER BY Kd_Urusan, Kd_Bidang');
		return $a;
	}
	
	function data_unit_f($Kd_Urusan=0,$Kd_Bidang=0){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Kd_Unit, Nm_Unit FROM dbo.Ref_Unit WHERE Kd_Urusan="'.$Kd_Urusan.'" AND Kd_Bidang="'.$Kd_Bidang.'" ORDER BY Kd_Urusan, Kd_Bidang, Kd_Unit');
		return $a;
	}
	
	function data_skpd_f($Kd_Urusan=0,$Kd_Bidang=0,$Kd_Unit=0){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Nm_Sub_Unit FROM dbo.Ref_Sub_Unit WHERE Kd_Urusan="'.$Kd_Urusan.'" AND Kd_Bidang="'.$Kd_Bidang.'" AND Kd_Unit="'.$Kd_Unit.'" ORDER BY Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub');
		return $a;
	}
	
	function data_desa_f($Kd_Urusan=0,$Kd_Bidang=0,$Kd_Unit=0,$Kd_Sub=0){
		$sess_db = $this->session->userdata('sess_db');
		$db = $this->load->database($sess_db, TRUE);
		
		$a = $db->query('SELECT TOP (100) PERCENT Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Kd_Desa, Nm_Desa FROM dbo.tbl_sikda_desa WHERE Kd_Urusan="'.$Kd_Urusan.'" AND Kd_Bidang="'.$Kd_Bidang.'" AND Kd_Unit="'.$Kd_Unit.'" AND Kd_Sub="'.$Kd_Sub.'" ORDER BY Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Kd_Desa');
		return $a;
	}
}
