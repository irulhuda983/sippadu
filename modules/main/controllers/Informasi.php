<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informasi extends CI_Controller {

	var $limit = 50;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_informasi'));
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
		$d['title'] = $title = lang('Informasi');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'informasi';
		$d['menuactive'] = 'informasi';
		$d['data_informasi'] = $this->mod_informasi->tabel_informasi($ID_Kategori,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('informasi');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('informasi/informasi',$d);
	}
	
	public function data($ID_Kategori=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Informasi');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'informasi';
		$d['menuactive'] = 'informasi';
		$d['data_informasi'] = $this->mod_informasi->tabel_informasi($ID_Kategori,config('limit'));
		$d['slide_page'] = $this->mod_all->data_slide_page('informasi');
		$d['ID_Kategori'] = $ID_Kategori;
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('informasi/informasi_data',$d);
	}
	
	public function kategori($ID_Kategori=0)
	{
		$d = $this->mod_all->load();
		$data_informasi = $this->mod_informasi->data_informasi_kategori($ID_Kategori);
		if($data_informasi->num_rows() > 0){
			$data = $data_informasi->row();
			$d['title'] = $title = lang('Kategori Informasi').': "'.$data->Nm_Kategori.'"';
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'informasi';
			$d['menuactive'] = 'informasi';
			$d['data_informasi'] = $this->mod_informasi->tabel_informasi($ID_Kategori,config('limit'));
			$d['slide_page'] = $this->mod_all->data_slide_page('informasi');
			$d['ID_Kategori'] = $ID_Kategori;
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('informasi/informasi',$d);
		}
		else{
			set_alert('error','Oops, halaman tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	public function open($id=0)
	{
		$data_informasi = $this->mod_informasi->data_informasi($id);
		if($data_informasi->num_rows() > 0){
			$hits = $this->mod_informasi->hits($id);
			$data = $data_informasi->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Judul;
			$d['site_title'] = site_title($title);
			$d['site_image'] = urlimgsrc($data->Image_Raw.'_original'.$data->Image_Ext,'informasi');
			$d['site_description'] = character_limiter(textonly($data->Konten,100));
			$d['menuopen'] = 'informasi';
			$d['menuactive'] = 'informasi';
			$d['data'] = $this->mod_informasi->data_informasi($id);
			$d['data_latest'] = $this->mod_informasi->tabel_informasi_latest($id,8);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('informasi/informasi_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}