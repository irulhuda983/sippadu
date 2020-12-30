<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {
	
	var $title_page = 'Video';
	var $class_page = 'video';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_video'));
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
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_video->tabel_video($id,20);
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'',$d);
	}
	
	public function data($id=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang($this->title_page);
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_video->tabel_video($id,20);
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_data',$d);
	}
	
	public function kategori($id=0)
	{
		$d = $this->mod_all->load();
		$data_kategori = $this->mod_video->data_video_kategori($id);
		$Nm_Kategori = '';
		if($data_kategori->num_rows() > 0){
			$data = $data_kategori->row();
			$Nm_Kategori = $data->Nm_Kategori;
		}
		$d['title'] = $title = lang('Kategori Video').': "'.$Nm_Kategori.'"';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_video->tabel_video($id,20);
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'',$d);
		
	}
	
	public function open($id=0)
	{
		$data_video = $this->mod_video->data_video_open($id);
		if($data_video->num_rows() > 0){
			$hits = $this->mod_video->hits($id);
			$data = $data_video->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Nm_Video;
			$d['site_title'] = site_title($title);
			$d['site_description'] = character_limiter(textonly($data->Deskripsi,100));
			$d['description'] = $data->Deskripsi;
			$d['author'] = $data->Nm_User;
			$d['time_upload'] = human_time($data->Time,'d F Y');
			$d['menuopen'] = $this->class_page;
			$d['data'] = $this->mod_video->data_video_open($id);
			$d['ID_Video'] = $id;
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view($this->class_page.'/'.$this->class_page.'_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}