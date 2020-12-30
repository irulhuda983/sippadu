<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_search'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($keyword='',$offset=0){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Search');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'search';
		$d['menuactive'] = 'search';
		$d['keyword'] = urldecode($keyword);
		//$d['data'] = $this->mod_search->tabel_search($search,config('limit'),$offset);
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('search/search',$d);
	}
	
	public function data($keyword=''){
		$d = $this->mod_all->load();
		$d['title'] = $title = lang('Search');
		$d['site_title'] = site_title($title);
		
		$d['menuopen'] = 'search';
		$d['menuactive'] = 'search';
		$d['data'] = $this->mod_search->tabel_search($keyword,config('limit'));
		
		$this->breadcrumb->append_crumb(lang('Beranda'), '/');
		$this->load->view('search/search_data',$d);
	}
	
	public function kategori($ID_Kategori=0)
	{
		$d = $this->mod_all->load();
		$data_search = $this->mod_search->data_search_kategori($ID_Kategori);
		if($data_search->num_rows() > 0){
			$data = $data_search->row();
			$d['title'] = $title = lang('Kategori Search').': "'.lang($data->Nm_Kategori,true).'"';
			$d['site_title'] = site_title($title);
			
			$d['menuopen'] = 'search';
			$d['menuactive'] = 'search';
			$d['data_search'] = $this->mod_search->tabel_search($ID_Kategori,config('limit'));
			$d['slide_page'] = $this->mod_all->data_slide_page('search');
			$d['ID_Kategori'] = $ID_Kategori;
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('search/search',$d);
		}
		else{
			set_alert('error','Oops, halaman tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	public function open($id=0)
	{
		$data_search = $this->mod_search->data_search($id);
		if($data_search->num_rows() > 0){
			$hits = $this->mod_search->hits($id);
			$data = $data_search->row();
			
			$d = $this->mod_all->load();
			$d['title'] = $title = $data->Judul;
			$d['site_title'] = site_title($title);
			$d['site_image'] = urlimgsrc($data->Image_Raw.'_original'.$data->Image_Ext,'search');
			$d['site_description'] = character_limiter(textonly($data->Konten,100));
			$d['site_author'] = $data->Nm_User;
			$d['menuopen'] = 'search';
			$d['menuactive'] = 'search';
			$d['data'] = $this->mod_search->data_search($id);
			$d['data_latest'] = $this->mod_search->tabel_search_latest($id,8);
			
			$this->breadcrumb->append_crumb(lang('Beranda'), '/');
			$this->load->view('search/search_open',$d);
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}