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
		$d['uri_string'] = $this->uri->uri_string();
		$d['winpopup'] = FALSE;
		
		$d['data_menu_atas'] = $this->data_menu(1);
		$d['data_menu_tengah'] = $this->data_menu(2,'Hits','DESC');
		$d['data_menu_bawah'] = $this->data_menu(3,'Nm_Menu','ASC');
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
	
	function data_menu($kategori=0,$table_sort='Sort_Order',$method_sort='asc'){
		$a = $this->db->order_by($table_sort,$method_sort)->order_by('Nm_Menu','asc')->where('ID_Kategori',$kategori)->where('Status',1)->where('ID_Parent',0)->get('ci_menu');
		return $a;
	}
	
	function data_berita($limit=0){
		$a = $this->db->order_by('Time','desc')->where('Status',1)->get('ci_berita',$limit);
		return $a;
	}
	
}
