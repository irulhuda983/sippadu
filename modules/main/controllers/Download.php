<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_download'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html','download'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Download');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'download';
		$d['data'] = $this->mod_download->tabel_download($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('download');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('download/download',$d);
	}
	
	public function data($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Download');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'download';
		$d['data'] = $this->mod_download->tabel_download($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('download');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('download/download_data',$d);
	}
	
	public function kategori($ID_Kategori=0){
		$Nm_Kategori = '';
		$data_kategori = $this->mod_download->data_download_kategori($ID_Kategori);
		if($data_kategori->num_rows() > 0){
			$dk = $data_kategori->row();
			$Nm_Kategori = $dk->Nm_Kategori;
		}
		
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Kategori Download').': "'.$Nm_Kategori.'"';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'download';
		$d['data'] = $this->mod_download->tabel_download($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('download');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('download/download',$d);
	}
	
	public function open($id=0)
	{
		$data_download = $this->mod_download->data_download($id);
		if($data_download->num_rows() > 0){
			//$hits = $this->mod_download->hits($id);
			$data = $data_download->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = lang('Download File').': '.$data->Judul;
			$d['site_title'] = site_title($title);
			$d['site_description'] = $description = character_limiter(textonly($data->Konten,100));
			$d['description'] = character_limiter($data->Konten,100);
			$d['menuopen'] = 'download';
			$d['data'] = $this->mod_download->tabel_download(0,$id);
			$d['slide_page'] = $this->mod_all->data_slide_page('download');
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('download/download_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	function get($id=0){
		$hits = $this->mod_download->hits($id);
		$d['data'] = $data = $this->mod_download->get_download($id);
		echo $data;
	}
	
}