<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	var $title_page = 'Form';
	var $class_page = 'form';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_form'));
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
		$d['data'] = $this->mod_form->tabel_form($ID_Kategori,0,config('limit'));
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
		$d['data'] = $this->mod_form->tabel_form($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_data',$d);
	}
	
	public function kategori($ID_Kategori=0){
		$Nm_Kategori = '';
		$data_kategori = $this->mod_form->data_form_kategori($ID_Kategori);
		if($data_kategori->num_rows() > 0){
			$dk = $data_kategori->row();
			$Nm_Kategori = $dk->Nm_Kategori;
		}
		
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Kategori Form').': "'.$Nm_Kategori.'"';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = $this->class_page;
		$d['data'] = $this->mod_form->tabel_form($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view($this->class_page.'/'.$this->class_page,$d);
	}
	
	public function open($id=0)
	{
		$data_form = $this->mod_form->data_form($id);
		if($data_form->num_rows() > 0){
			$hits = $this->mod_form->hits($id);
			$data = $data_form->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Nm_Form;
			$d['site_title'] = site_title($title);
			$d['site_description'] = $description = character_limiter(textonly($data->Deskripsi,100));
			$d['description'] = character_limiter($data->Deskripsi,100);
			$d['image_raw'] = $data->Image_Raw;
			$d['image_ext'] = $data->Image_Ext;
			$d['menuopen'] = $this->class_page;
			$d['class_page'] = $this->class_page;
			$d['data'] = $this->mod_form->tabel_form(0,$id);
			$d['slide_page'] = $this->mod_all->data_slide_page($this->class_page);
			$d['data_kolom'] = $data_col = $this->mod_form->data_kolom($id);
			$d['data_col'] = $data_col = $this->mod_form->data_col($id);
			$d['data_row'] = $data_row = $this->mod_form->data_row($id);
			$d['ID_Form'] = $id;
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view($this->class_page.'/'.$this->class_page.'_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	function save(){
		switch($this->input->post('method')){
			case 'save':
				$a = $this->mod_form->save_data_form();
				echo $a;
				break;
			case 'edit':
				$a = $this->mod_form->save_data_form();
				echo $a;
				break;
		}
	}
	
}