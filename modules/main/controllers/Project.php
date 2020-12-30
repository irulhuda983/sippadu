<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

	var $title_page = 'Project';
	var $class_page = 'project';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_project'));
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
		$d['data'] = $this->mod_project->tabel_project($ID_Kategori,0,config('limit'));
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
		$d['data'] = $this->mod_project->tabel_project($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_data',$d);
	}
	
	public function kategori($ID_Kategori=0){
		$Nm_Kategori = '';
		$data_kategori = $this->mod_project->data_project_kategori($ID_Kategori);
		if($data_kategori->num_rows() > 0){
			$dk = $data_kategori->row();
			$Nm_Kategori = $dk->Nm_Kategori;
		}
		
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Kategori Project').': "'.$Nm_Kategori.'"';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_project->tabel_project($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page,$d);
	}
	
	public function open($id=0)
	{
		$data_project = $this->mod_project->data_project($id);
		if($data_project->num_rows() > 0){
			$hits = $this->mod_project->hits($id);
			$data = $data_project->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = lang('Project File').': '.$data->Nm_Project;
			$d['site_title'] = site_title($title);
			$d['site_description'] = character_limiter(textonly($data->Deskripsi,100));
			$d['description'] = character_limiter($data->Deskripsi,100);
			$d['menuopen'] = $this->class_page;
			$d['data'] = $this->mod_project->tabel_project(0,$id);
			$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view($this->class_page.'/'.$this->class_page.'_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	function get($id=0){
		$hits = $this->mod_project->hits($id);
		$d['data'] = $data = $this->mod_project->get_project($id);
		echo $data;
	}
	
}