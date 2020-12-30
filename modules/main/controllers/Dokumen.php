<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_dokumen'));
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
		$d['title'] = $title = lang('Dokumen');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'dokumen';
		$d['data'] = $this->mod_dokumen->tabel_dokumen($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('dokumen');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('dokumen/dokumen',$d);
	}
	
	public function data($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Dokumen');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'dokumen';
		$d['data'] = $this->mod_dokumen->tabel_dokumen($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('dokumen');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('dokumen/dokumen_data',$d);
	}
	
	public function kategori($ID_Kategori=0){
		$Nm_Kategori = '';
		$data_kategori = $this->mod_dokumen->data_dokumen_kategori($ID_Kategori);
		if($data_kategori->num_rows() > 0){
			$dk = $data_kategori->row();
			$Nm_Kategori = $dk->Nm_Kategori;
		}
		
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Kategori Dokumen').': "'.$Nm_Kategori.'"';
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'dokumen';
		$d['data'] = $this->mod_dokumen->tabel_dokumen($ID_Kategori,0,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('dokumen');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('dokumen/dokumen',$d);
	}
	
	public function open($id=0)
	{
		$data_dokumen = $this->mod_dokumen->data_dokumen($id);
		if($data_dokumen->num_rows() > 0){
			$hits = $this->mod_dokumen->hits($id);
			$data = $data_dokumen->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = lang('Dokumen');
			$d['site_title'] = site_title($title);
			$d['judul'] = $data->Judul;
			$d['upload_time'] = TimeFormat($data->Time,'d F Y H:i');
			$d['site_description'] = $description = character_limiter(textonly($data->Konten,100));
			$d['description'] = character_limiter($data->Konten,100);
			$d['menuopen'] = 'dokumen';
			$d['h_frame'] = $data->H_Frame;
			$d['w_frame'] = $data->W_Frame;
			$d['head_frame'] = $data->Head_Frame;
			$d['url'] = site_url(fmodule('dokumen/view/'.$id));
			$d['slide_page'] = $this->mod_all->data_slide_page('dokumen');
			$d['id'] = $id;
			$d['Hits'] = ifnull($data->Hits,0);
			$d['Download'] = ifnull($data->Download);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('dokumen/dokumen_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	function view($id=0){
		$d['data'] = $data = $this->mod_dokumen->data_dokumen($id);
		$d['filename'] = '';
		if($data->num_rows() > 0){
			$da = $data->row();
			$d['filename'] = $da->File_Raw.$da->File_Ext;
		}
		$this->load->view('dokumen/dokumen_view',$d);
	}
	
	function download($id=0){
		$hits = $this->mod_dokumen->hits_download($id);
		$d['data'] = $data = $this->mod_dokumen->get_dokumen($id);
		echo $data;
	}
	
}