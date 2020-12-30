<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_all extends CI_Model {
	
	function load(){
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
		$d['popup'] = $this->popup();
		$d['popup2'] = $this->popup2();
		$d['menuopen'] = '';
		$d['menuopen2'] = '';
		$d['menuactive'] = '';
		$d['uri_string'] = $this->uri->uri_string();
		$d['winpopup'] = FALSE;
		$d['insert_counter'] = $this->insert_counter();
		$d['data_menu_atas'] = $this->data_menu(1);
		$d['data_menu_tengah'] = $this->data_menu(2,'Sort_Order','ASC');
		$d['data_menu_bawah'] = $this->data_menu_bawah();
		$d['data_language'] = $this->data_language();
		$d['asset_update'] = (config('asset_update') ? '?v='.TimeNow('YmdHi') : '');
		$d['search_keyword'] = ($this->uri->segment(1) == 'search' ? urldecode($this->uri->segment(3)) : '');
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
	
	/* function menu_apps(){
		$a = $this->db->query('
		SELECT a.ID_Apps,a.Nm_Apps,a.Index_Page,"_blank" as Target from ci_apps a where a.ID_Apps = 1
		UNION ALL
		SELECT a.ID_Apps,a.Nm_Apps,a.Index_Page,"" as Target from ci_apps a where a.ID_Apps = 2
		UNION ALL
		select a.ID_Apps,a.Nm_Apps,a.Index_Page,"" as Target from ci_apps a where a.ID_Apps > 2 AND (select count(*) from ci_domain_apps b where b.ID_Apps = a.ID_Apps AND b.ID_Web = '.config().' AND b.Status = 1) = 1');
		return $a;
	} */
	
	function data_menu($kategori=0,$table_sort='Sort_Order',$method_sort='asc'){
		$a = $this->db->order_by($table_sort,$method_sort)->order_by('ID_Menu','asc')->where('ID_Web',config())->where('Status',1)->where('ID_Kategori',$kategori)->where('ID_Parent',0)->get('ci_menu');
		return $a;
	}
	
	function data_menu_bawah(){
		$a = $this->db->order_by('Sort_Order','asc')->where('ID_Web',config())->where('ID_Kategori >',2)->where('Status',1)->get('ci_menu_kategori');
		return $a;
	}
	
	/* function data_berita($limit=0,$offset=0){
		$a = $this->db->order_by('Time','desc')->where('ID_Web',config())->where('Status',1)->get('ci_berita',$limit,$offset);
		return $a;
	} */
	
	/* function data_slide($limit=0,$offset=0){
		$a = $this->db->order_by('Time','desc')->where('ID_Web',config())->where('Status',1)->get('ci_slide',$limit,$offset);
		return $a;
	} */
	
	function data_slide_page($class='berita',$limit=0,$offset=0){
		$a = $this->db->where('Class',$class)->where('ID_Web',config())->where('Status',1)->get('ci_page');
		return $a;
	}
	
	/* function data_widget($id=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = ' AND b.ID_Widget NOT IN(1) ';
		$q_order = ' ORDER BY a.Sort_Order ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		if($id>0){
			$q_where = ' AND b.ID_Widget = '.$id;
		}
		
		$a = $this->db->query('SELECT b.Nm_Widget,b.Deskripsi,b.Source FROM ci_widget_log a inner join ci_widget b on a.ID_Widget = b.ID_Widget WHERE a.ID_Web = '.config().' AND b.Status = 1  '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	} */
	
	function insert_counter(){
		setcookie('myWebVisitorCookie', 'myWebVisitorCookie', time() + 3600);
		if (!isset($_COOKIE['myWebVisitorCookie'])) {
			$this->db->query('UPDATE ci_counter SET Visits=Visits+1 where Time = "'.TimeNow('Y-m-d').'" and ID_Web = '.config().'');
		}
		$a = $this->db->where('ID_Web',config())->where('Time',TimeNow('Y-m-d'))->get('ci_counter');
		
		if($a->num_rows() > 0){
			$b = $this->db->query('UPDATE ci_counter SET Hits=Hits+1 where Time = "'.TimeNow('Y-m-d').'" and ID_Web = '.config().'');
		}else{
			$in['ID_Web'] = config();
			$in['Time'] = TimeNow('Y-m-d');
			$in['Visits'] = 1;
			$in['Hits'] = 1;
			$this->db->insert('ci_counter',$in);
		}
	}
	
	function data_language(){
		$a = $this->db->order_by('ID_Lang','asc')->where('Status',1)->get('ci_lang');
		return $a;
	}
	
	
}
