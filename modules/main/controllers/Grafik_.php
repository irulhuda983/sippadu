<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_grafik'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($offset=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Grafik');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'grafik';
		$d['data'] = $this->mod_grafik->tabel_grafik();
		$d['slide_page'] = $this->mod_all->data_slide_page('grafik');
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('grafik/grafik',$d);
	}
	
	public function data($offset=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Grafik');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'grafik';
		$d['data'] = $this->mod_grafik->tabel_grafik();
		$d['slide_page'] = $this->mod_all->data_slide_page('grafik');
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('grafik/grafik_data',$d);
	}
	
	public function open($id=0)
	{
		$data_grafik = $this->mod_grafik->data_grafik($id);
		if($data_grafik->num_rows() > 0){
			$hits = $this->mod_grafik->hits($id);
			$data = $data_grafik->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Nm_Grafik;
			$d['site_title'] = site_title($title);
			$d['site_description'] = character_limiter(textonly($data->Deskripsi,100));
			$d['description'] = $data->Deskripsi;
			$d['konten'] = $data->Konten;
			$d['hits'] = $data->Hits;
			$d['menuopen'] = 'grafik';
			$d['jn_grafik'] = $data->Jn_Grafik;
			$d['series_nama'] = $data->Series_Nama;
			$d['series_angka'] = $data->Series_Angka;
			$d['satuan'] = $data->Satuan;
			$d['time_update'] = $data->Time_Modified != '' ? human_time($data->Time_Modified,'d F Y H:i') : human_time($data->Time_Created,'d F Y H:i');
			$d['data'] = $this->mod_grafik->data_grafik_open($id);
			$d['slide_page'] = $this->mod_grafik->data_slide_page($id);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('grafik/grafik_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	public function sippadu($tahun=0)
	{
		//$data_grafik = $this->mod_grafik->data_grafik($id);
		//if($data_grafik->num_rows() > 0){
		//	$hits = $this->mod_grafik->hits($id);
		//	$data = $data_grafik->row();
			
			$id = 1;
			$d = $this->mod_all->load();
			$d['title'] = $title = 'Grafik Pengajuan Izin: Tahun '.$tahun;
			$d['site_title'] = site_title($title);
			$d['site_description'] = '';
			$d['description'] = '';
			$d['konten'] = '';
			$d['hits'] = 0;
			$d['menuopen'] = 'grafik';
			$d['jn_grafik'] = 3;
			$d['series_nama'] = 'Jenis Izin';
			$d['series_angka'] = 'Jumlah Pemohon';
			$d['satuan'] = 'org/usaha';
			$d['time_update'] = TimeNow('d F Y H:i');
			$d['data'] = $this->mod_grafik->data_grafik_open($id);
			$d['grafik_sippadu'] = $this->mod_grafik->grafik_sippadu($tahun);
			$d['slide_page'] = $this->mod_grafik->data_slide_page($id);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('grafik/grafik_sippadu',$d);
		//}
		//else{
		//	set_alert('error','Oops, halaman yang anda cari tidak tersedia');
		//	redirect(fmodule());
		//}
		
	}
	
	public function sippadu2($tahun=0)
	{
		//$data_grafik = $this->mod_grafik->data_grafik($id);
		//if($data_grafik->num_rows() > 0){
			//$hits = $this->mod_grafik->hits($id);
			//$data = $data_grafik->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = 'Riwayat Pengajuan Izin Online';
			$d['site_title'] = site_title($title);
			//$d['site_description'] = '';
			//$d['description'] = $data->Deskripsi;
			//$d['konten'] = $data->Konten;
			$d['hits'] = 0;
			$d['menuopen'] = 'grafik';
			$d['jn_grafik'] = 3;
			$d['series_nama'] = '';
			$d['series_angka'] = '';
			$d['satuan'] = '';
			$d['time_update'] = '';
			$d['data'] = $this->mod_grafik->data_grafik_open($tahun);
			$d['grafik_sippadu'] = $this->mod_grafik->grafik_sippadu($tahun);
			$d['slide_page'] = $this->mod_all->data_slide_page('grafik');
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('grafik/grafik_sippadu',$d);
		//}
		//else{
		//	set_alert('error','Oops, halaman yang anda cari tidak tersedia');
		//	redirect(fmodule());
		//}
		
	}
	
	
}