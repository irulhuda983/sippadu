<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_berita'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Berita');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'berita';
		$d['menuactive'] = 'berita';
		$d['data_berita'] = $this->mod_berita->tabel_berita($ID_Kategori,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('berita');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('berita/berita',$d);
	}
	
	public function data($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Berita');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'berita';
		$d['menuactive'] = 'berita';
		$d['data_berita'] = $this->mod_berita->tabel_berita($ID_Kategori,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('berita');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('berita/berita_data',$d);
	}
	
	public function kategori($ID_Kategori=0)
	{
		$d = $this->mod_all->load();
		$data_berita = $this->mod_berita->data_berita_kategori($ID_Kategori);
		if($data_berita->num_rows() > 0){
			$data = $data_berita->row();
			$d['title'] = $title = lang('Kategori Berita').': "'.lang($data->Nm_Kategori,true).'"';
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'berita';
			$d['menuactive'] = 'berita';
			$d['data_berita'] = $this->mod_berita->tabel_berita($ID_Kategori,config('limit'));
			$d['slide_page'] = $this->mod_all->data_slide_page('berita');
			$d['ID_Kategori'] = $ID_Kategori;
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('berita/berita',$d);
		}
		else{
			set_alert('error','Oops, halaman tidak tersedia');
			redirect(fmodule());
		}
		
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
			$d['site_image'] = urlimgsrc($data->Image_Raw.'_original'.$data->Image_Ext,'berita');
			$d['site_description'] = character_limiter(textonly($data->Konten,100));
			$d['site_author'] = $data->Nm_User;
			$d['menuopen'] = 'berita';
			$d['menuactive'] = 'berita';
			$d['data'] = $this->mod_berita->data_berita($id);
			$d['data_latest'] = $this->mod_berita->tabel_berita_latest($id,8);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('berita/berita_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}