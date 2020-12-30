<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	var $title_page = 'Agenda';
	var $class_page = 'agenda';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_agenda'));
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
		$d['title'] = $title = lang($this->title_page);
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_agenda->tabel_agenda($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page,$d);
	}
	
	public function data($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang($this->title_page);
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_agenda->tabel_agenda($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_data',$d);
	}
	
	public function kategori($ID_Kategori=0){
		$Nm_Kategori = '';
		$data_kategori = $this->mod_agenda->data_agenda_kategori($ID_Kategori);
		if($data_kategori->num_rows() > 0){
			$dk = $data_kategori->row();
			$Nm_Kategori = $dk->Nm_Kategori;
		}
		
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Kategori Agenda').': '.$Nm_Kategori;
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_agenda->tabel_agenda($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page,$d);
	}
	
	public function open($id=0)
	{
		$data_agenda = $this->mod_agenda->data_agenda($id);
		if($data_agenda->num_rows() > 0){
			$hits = $this->mod_agenda->hits($id);
			$data = $data_agenda->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = lang('Agenda File').': '.$data->Judul;
			$d['site_title'] = site_title($title);
			$d['site_image'] = urlimgsrc($data->Image_Raw.'_original'.$data->Image_Ext,'agenda');
			$d['site_description'] = $description = character_limiter(textonly($data->Konten,100));
			$d['description'] = character_limiter($data->Konten,100);
			$d['menuopen'] = $this->class_page;
			$d['data'] = $this->mod_agenda->tabel_agenda(0,$id);
			$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
			$d['data_latest'] = $this->mod_agenda->tabel_agenda_latest($id);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view($this->class_page.'/'.$this->class_page.'_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}