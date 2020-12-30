<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_download','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form','download'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_download->delete_download();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_download->enable_download();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_download->disable_download();
		}
		
		$d['title'] = $title = 'Download';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'download';
		$d['menuopen2'] = 'download';
		$d['menuactive'] = 'download';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_download->tabel_download($limit,$offset);
		$d['tot'] = $tot = $this->mod_download->tabel_download()->num_rows();
		
		$config['base_url'] = site_url(fmodule('download/index'));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = lang('First');
		$config['last_link'] = lang('Last');
		$config['next_link'] = lang('Next');
		$config['prev_link'] = lang('Prev');
		$config['full_tag_open'] = '<div class="tile-footer dvd dvd-top"><div class="row"><div class="col-sm-4 text-left"><ul class="pagination pagination-sm m-0">';
		$config['full_tag_close'] = '</ul></div></div></div>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$d['pagination'] = $this->pagination->create_links();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('download/download',$d);
		
	}
	
	public function add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_download->insert_download();
		}
		
		$d['title'] = $title = 'Tambah Data Download';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'download';
		$d['menuopen2'] = 'download';
		$d['menuactive'] = 'download_add';
		$d['op_download_kategori'] = $this->mod_download->op_download_kategori();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Download', site_url(fmodule('download')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('download/download_add',$d);
	}
	
	public function edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_download->update_download($id);
		}
		
		$d['title'] = $title = 'Edit Data Download';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'download';
		$d['menuopen2'] = 'download';
		$d['menuactive'] = 'download';
		$d['op_download_kategori'] = $this->mod_download->op_download_kategori();
		$d['data'] = $this->mod_download->data_download($id);
		$d['slc_op_download_kategori'] = $this->mod_download->slc_op_download_kategori($id);
		$d['slc_tags'] = $this->mod_download->slc_download_tags($id);
		$d['ID_Download'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Download', site_url(fmodule('download')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('download/download_edit',$d);
	}
	
	public function kategori($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_download->delete_download_kategori();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_download->enable_download_kategori();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_download->disable_download_kategori();
		}
		
		$d['title'] = $title = 'Kategori Download';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'download';
		$d['menuopen2'] = 'download';
		$d['menuactive'] = 'download_kategori';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_download->tabel_download_kategori($limit,$offset);
		$d['tot'] = $tot = $this->mod_download->tabel_download_kategori()->num_rows();
		
		$config['base_url'] = site_url(fmodule('download/kategori'));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = lang('First');
		$config['last_link'] = lang('Last');
		$config['next_link'] = lang('Next');
		$config['prev_link'] = lang('Prev');
		$config['full_tag_open'] = '<div class="tile-footer dvd dvd-top"><div class="row"><div class="col-sm-4 text-left"><ul class="pagination pagination-sm m-0">';
		$config['full_tag_close'] = '</ul></div></div></div>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$d['pagination'] = $this->pagination->create_links();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('download/download_kategori',$d);
		
	}
	
	
	public function kategori_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		
		if($this->input->post('submit')){
			
			$a = $this->mod_download->insert_download_kategori();
		}
		
		$d['title'] = $title = 'Tambah Kategori Download';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'download';
		$d['menuopen2'] = 'download';
		$d['menuactive'] = 'download_kategori';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori Download', site_url(fmodule('download/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('download/download_kategori_add',$d);
		
	}
	
	public function kategori_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_download->update_download_kategori($id);
		}
		
		$d['title'] = $title = 'Edit Kategori Download';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'download';
		$d['menuopen2'] = 'download';
		$d['menuactive'] = 'download_kategori';
		$d['data'] = $this->mod_download->data_download_kategori($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori Download', site_url(fmodule('download/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('download/download_kategori_edit',$d);
		
	}	
	
	function get($id=0){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(9,$DataAkses);
		$d['data'] = $data = $this->mod_download->get_download($id);
		echo $data;
	}

}