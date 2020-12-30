<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	var $title_page = 'Gallery';
	var $class_page = 'gallery';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_gallery'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($id=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang($this->title_page);
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'gallery';
		$d['data'] = $this->mod_gallery->tabel_gallery_album($id,40);
		$d['slide_page'] = $this->mod_all->data_slide_page('gallery');
		$d['ID_Kategori'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('gallery/gallery',$d);
	}
	
	public function data($id=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang($this->title_page);
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'gallery';
		$d['data'] = $this->mod_gallery->tabel_gallery_album($id,40);
		$d['ID_Kategori'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('gallery/gallery_data',$d);
	}
	
	public function kategori($id=0)
	{
		$d = $this->mod_all->load();
		$data_kategori = $this->mod_gallery->data_gallery_kategori($id);
		$Nm_Kategori = '';
		if($data_kategori->num_rows() > 0){
			$data = $data_kategori->row();
			$Nm_Kategori = $data->Nm_Kategori;
		}
		$d['title'] = $title = lang('Kategori'.' '.$this->title_page).': "'.$Nm_Kategori.'"';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'gallery';
		$d['data'] = $this->mod_gallery->tabel_gallery_album($id,40);
		$d['slide_page'] = $this->mod_all->data_slide_page('gallery');
		$d['ID_Kategori'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('gallery/gallery',$d);
		
	}
	
	public function open($id=0)
	{
		$data_gallery = $this->mod_gallery->data_gallery_album($id);
		if($data_gallery->num_rows() > 0){
			$hits = $this->mod_gallery->hits($id);
			$data = $data_gallery->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Nm_Album;
			$d['site_title'] = site_title($title);
			$d['site_description'] = character_limiter(textonly($data->Deskripsi,100));
			$d['description'] = $data->Deskripsi;
			$d['author'] = $data->Nm_User;
			$d['time_upload'] = human_time($data->Time,'d F Y');
			$d['menuopen'] = 'gallery';
			$d['data'] = $this->mod_gallery->data_gallery_open($id);
			$d['ID_Album'] = $id;
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('gallery/gallery_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}