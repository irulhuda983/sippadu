<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_sippadu','mod_all'));
		$this->load->library(array('auth','breadcrumb','form_validation','session','template'));
		$this->load->helper(array('url','apps','query','admin','date','file','html'));
		/* $config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config); */
		$this->auth->restrict(fmodule('login'));
		//$this->output->enable_profiler(TRUE);
		//load_cache();
		//$this->output->cache(1); 
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Dashboard';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'dashboard';
		$d['menuactive'] = 'dashboard';
		$d['statistik'] = $this->mod_all->statistik(30);
		//$d['data']	= $this->mod_sippadu->tbl_dashboard();
		//$d['grafik_registrasi']	= $this->mod_sippadu->grafik_registrasi();
		//$d['pie_hari']	= $this->mod_sippadu->pie_hari();
		//$d['pie_bulan']	= $this->mod_sippadu->pie_bulan();
		//$d['pie_tahun']	= $this->mod_sippadu->pie_tahun();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), '/');
		$this->load->view('dashboard',$d);
		//$this->template->view('dashboard','head',$d);
		
	}
	
	public function cari($string=''){
		$keyword = $_GET['keyword'];
		$tot = $this->mod_simda->search($keyword);
		$limit = 10;
		$offset = $this->uri->segment(3);
		$str = '?keyword='. $_GET['keyword'];
		$config['base_url'] = site_url('main/cari/');
		$config['first_url'] = '0'.$str;
		$config['suffix'] = $str;
		$config['total_rows'] = $tot->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2;
		$config['first_link'] = lang('First');
		$config['last_link'] = lang('Last');
		$config['next_link'] = lang('Next');
		$config['prev_link'] = lang('Prev');
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li><a class="current" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
	
		$d = $this->mod_all->load();
		$d['data'] = $this->mod_simda->search($keyword,$limit,$offset);
		$d['pagination'] = $this->pagination->create_links();
		$d['keyword'] = $keyword;
		$this->load->view('pencarian',$d);
		//echo $this->uri->segment(3);
	}
	
	public function op_provinsi(){
		if('IS_AJAX') {
			$d['op_provinsi'] = $this->mod_sippadu->op_provinsi();
			$d['slc_op_provinsi'] = $this->session->userdata('op_provinsi');
			$this->load->view('op_provinsi',$d);
		}
	}
	
	public function op_kota(){
		if('IS_AJAX') {
			$d['op_kota'] = $this->mod_sippadu->op_kota();
			$d['slc_op_kota'] = $this->session->userdata('op_kota');
			$this->load->view('op_kota',$d);
		}
	}
	
	public function op_kecamatan(){
		if('IS_AJAX') {
			$d['op_kecamatan'] = $this->mod_sippadu->op_kecamatan();
			$d['slc_op_kecamatan'] = $this->session->userdata('op_kecamatan');
			$this->load->view('op_kecamatan',$d);
		}
	}
	
	public function op_desa(){
		if('IS_AJAX') {
			$d['op_desa'] = $this->mod_sippadu->op_desa();
			$d['slc_op_desa'] = $this->session->userdata('op_desa');
			$this->load->view('op_desa',$d);
		}
	}
	
	public function op_provinsi2(){
		if('IS_AJAX') {
			$d['op_provinsi2'] = $this->mod_sippadu->op_provinsi2();
			$d['slc_op_provinsi2'] = $this->session->userdata('op_provinsi2');
			$this->load->view('op_provinsi2',$d);
		}
	}
	
	public function op_kota2(){
		if('IS_AJAX') {
			$d['op_kota2'] = $this->mod_sippadu->op_kota2();
			$d['slc_op_kota2'] = $this->session->userdata('op_kota2');
			$this->load->view('op_kota2',$d);
		}
	}
	
	public function op_kecamatan2(){
		if('IS_AJAX') {
			$d['op_kecamatan2'] = $this->mod_sippadu->op_kecamatan2();
			$d['slc_op_kecamatan2'] = $this->session->userdata('op_kecamatan2');
			$this->load->view('op_kecamatan2',$d);
		}
	}
	
	public function op_desa2(){
		if('IS_AJAX') {
			$d['op_desa2'] = $this->mod_sippadu->op_desa2();
			$d['slc_op_desa2'] = $this->session->userdata('op_desa2');
			$this->load->view('op_desa2',$d);
		}
	}
	
	public function slc_desa(){
		//if('IS_AJAX') {
			$d['op_desa'] = $this->mod_sippadu->slc_desa();
			//$d['slc_op_desa'] = $this->session->userdata('op_desa');
			//$this->load->view('op_desa',$d);
		//}
	}
	
	public function modal(){
		$this->load->view('modal');
	}
	
	
	
	public function fo(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Front Office';
		$d['q'] = 'fo';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'fo';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function bo(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Back Office';
		$d['q'] = 'bo';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'bo';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function kabid(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Validasi Kabid';
		$d['q'] = 'kabid';
		$d['site_title'] = site_title($title);
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'kabid';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function kadin(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Validasi Kadin';
		$d['q'] = 'kadin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'kadin';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function tu(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Tata Usaha';
		$d['q'] = 'tu';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'tu';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function cetak_sk(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Cetak Draft';
		$d['q'] = 'cetak';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'cetak';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function serah(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Pengambilan SK';
		$d['q'] = 'serah';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'serah';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function lap_izin(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Laporan';
		$d['q'] = 'laporan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'laporan';
		$d['data']		= $this->mod_sippadu->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function notifikasi(){
		$d['data'] = $this->mod_sippadu->notifikasi();
		$this->load->view('notifikasi',$d);
	}
	
	public function notifikasi2(){
		$d['data'] = $this->mod_sippadu->notifikasi2();
		$this->load->view('notifikasi2',$d);
	}
	
}