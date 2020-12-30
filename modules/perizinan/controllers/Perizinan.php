<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perizinan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_perizinan'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		
		$d['title'] = $title = lang('Home');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'home';
		$d['step1'] = true;
	
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('home',$d);
	}
	
	public function daftar()
	{
		$d = $this->mod_all->load();
		
		//$this->session->set_userdata('sess_step',0);
		//$this->session->set_userdata('sess_izin',0);
		
		$d['title'] = $title = lang('Daftar Izin');
		$d['site_title'] = site_title($title);
		$d['data'] = $this->mod_perizinan->tabel_izin();
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'daftar';
		$d['step1'] = true;
	
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	
	
	public function pilih($id=0,$class='',$nm_izin=''){
		if($this->session->userdata('sess_class_izin') != $class){
			$this->session->unset_userdata('sess_kd_izin');
			$this->session->unset_userdata('sess_class_izin');
			$this->session->unset_userdata('sess_nm_izin');
			$this->session->unset_userdata('sess_id_pelanggan');
			$this->session->unset_userdata('sess_id_izin');
			$this->session->unset_userdata('sess_jenis_izin');
		}
		$this->session->set_userdata('sess_kd_izin',$id);
		$this->session->set_userdata('sess_class_izin',$class);
		$this->session->set_userdata('sess_nm_izin',$nm_izin);
		redirect(site_url(fmodule('personal')));
	}
	
	public function selesai()
	{
		$d = $this->mod_all->load();
		$this->session->set_userdata('sess_step',0);
		$this->session->set_userdata('sess_izin',0);
		$this->session->unset_userdata('sess_kd_izin');
		$this->session->unset_userdata('sess_class_izin');
		$this->session->unset_userdata('sess_nm_izin');
		$this->session->unset_userdata('sess_id_pelanggan');
		$this->session->unset_userdata('sess_id_izin');
		$this->session->unset_userdata('sess_jenis_izin');
		
		$d['title'] = $title = lang('Pendaftaran Izin');
		$d['site_title'] = site_title($title);
		$d['data'] = $this->mod_perizinan->tabel_izin();
		
		$d['menuopen'] = 'home';
		$d['menuactive'] = 'home';
		$d['step8'] = true;
	
		$this->breadcrumb->append_crumb(lang('Home'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('registrasi/registrasi_selesai',$d);
	}
	
	public function op_provinsi(){
		if('IS_AJAX') {
			$d['op_provinsi'] = $this->mod_perizinan->op_provinsi();
			$d['slc_op_provinsi'] = $this->session->userdata('op_provinsi');
			$this->load->view('op_provinsi',$d);
		}
	}
	
	public function op_kota(){
		if('IS_AJAX') {
			$d['op_kota'] = $this->mod_perizinan->op_kota();
			$d['slc_op_kota'] = $this->session->userdata('op_kota');
			$this->load->view('op_kota',$d);
		}
	}
	
	public function op_kecamatan(){
		if('IS_AJAX') {
			$d['op_kecamatan'] = $this->mod_perizinan->op_kecamatan();
			$d['slc_op_kecamatan'] = $this->session->userdata('op_kecamatan');
			$this->load->view('op_kecamatan',$d);
		}
	}
	
	public function op_desa(){
		if('IS_AJAX') {
			$d['op_desa'] = $this->mod_perizinan->op_desa();
			$d['slc_op_desa'] = $this->session->userdata('op_desa');
			$this->load->view('op_desa',$d);
		}
	}
	
	public function op_provinsi2(){
		if('IS_AJAX') {
			$d['op_provinsi2'] = $this->mod_perizinan->op_provinsi2();
			$d['slc_op_provinsi2'] = $this->session->userdata('op_provinsi2');
			$this->load->view('op_provinsi2',$d);
		}
	}
	
	public function op_kota2(){
		if('IS_AJAX') {
			$d['op_kota2'] = $this->mod_perizinan->op_kota2();
			$d['slc_op_kota2'] = $this->session->userdata('op_kota2');
			$this->load->view('op_kota2',$d);
		}
	}
	
	public function op_kecamatan2(){
		if('IS_AJAX') {
			$d['op_kecamatan2'] = $this->mod_perizinan->op_kecamatan2();
			$d['slc_op_kecamatan2'] = $this->session->userdata('op_kecamatan2');
			$this->load->view('op_kecamatan2',$d);
		}
	}
	
	public function op_desa2(){
		if('IS_AJAX') {
			$d['op_desa2'] = $this->mod_perizinan->op_desa2();
			$d['slc_op_desa2'] = $this->session->userdata('op_desa2');
			$this->load->view('op_desa2',$d);
		}
	}
	
	public function op_provinsi3(){
		if('IS_AJAX') {
			$d['op_provinsi3'] = $this->mod_perizinan->op_provinsi3();
			$d['slc_op_provinsi3'] = $this->session->userdata('op_provinsi3');
			$this->load->view('op_provinsi3',$d);
		}
	}
	
	public function op_kota3(){
		if('IS_AJAX') {
			$d['op_kota3'] = $this->mod_perizinan->op_kota3();
			$d['slc_op_kota3'] = $this->session->userdata('op_kota3');
			$this->load->view('op_kota3',$d);
		}
	}
	
	public function op_kecamatan3(){
		if('IS_AJAX') {
			$d['op_kecamatan3'] = $this->mod_perizinan->op_kecamatan3();
			$d['slc_op_kecamatan3'] = $this->session->userdata('op_kecamatan3');
			$this->load->view('op_kecamatan3',$d);
		}
	}
	
	public function op_desa3(){
		if('IS_AJAX') {
			$d['op_desa3'] = $this->mod_perizinan->op_desa3();
			$d['slc_op_desa3'] = $this->session->userdata('op_desa3');
			$this->load->view('op_desa3',$d);
		}
	}
	
	public function slc_desa(){
		//if('IS_AJAX') {
			$d['op_desa'] = $this->mod_perizinan->slc_desa();
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
		$d['data']		= $this->mod_perizinan->get_data_izin();
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
		$d['data']		= $this->mod_perizinan->get_data_izin();
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
		$d['data']		= $this->mod_perizinan->get_data_izin();
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
		$d['data']		= $this->mod_perizinan->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function tu(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Verifikasi Tata Usaha';
		$d['q'] = 'tu';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'tu';
		$d['data']		= $this->mod_perizinan->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function cetak(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Cetak';
		$d['q'] = 'cetak';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'cetak';
		$d['data']		= $this->mod_perizinan->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function serah(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Pengambilan';
		$d['q'] = 'serah';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'serah';
		$d['data']		= $this->mod_perizinan->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function laporan(){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		
		$d['title'] = $title = 'Laporan Per Izin';
		$d['q'] = 'laporan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'rekap_laporan_izin';
		$d['data']		= $this->mod_perizinan->get_data_izin();
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tbl_izin',$d);
	}
	
	public function notifikasi(){
		$d['data'] = $this->mod_perizinan->notifikasi();
		$this->load->view('notifikasi',$d);
	}
	
	public function notifikasi2(){
		$d['data'] = $this->mod_perizinan->notifikasi2();
		$this->load->view('notifikasi2',$d);
	}
	
}