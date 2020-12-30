<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_berita'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','dpmptsp','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($id=0){
		$this->kategori($id);
	}
	
	public function detail($id=0){
		$this->kategori($id);
	}
	
	public function kategori($id=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Berita';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'berita';
		$d['data_berita'] = $this->mod_berita->tabel_berita($id,10);
		
		$this->breadcrumb->append_crumb('Beranda', '/');
		$this->load->view('berita/berita',$d);
		
	}
	
	public function open($id=0)
	{
		$data_berita = $this->mod_berita->data_berita($id);
		if($data_berita->num_rows() > 0){
			$hits = $this->mod_berita->hits($id);
			$data = $data_berita->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Judul;
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'berita';
			$d['data'] = $this->mod_berita->data_berita($id);
			$d['data_latest'] = $this->mod_berita->tabel_berita_latest($id);
			
			$this->breadcrumb->append_crumb('Beranda', '/');
			$this->load->view('berita/berita_open',$d);
		}
		else{
			redirect(fmodule());
		}
		
	}
	
	
}