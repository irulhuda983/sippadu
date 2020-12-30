<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_dokumen','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form','download'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_dokumen->delete_dokumen();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_dokumen->enable_dokumen();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_dokumen->disable_dokumen();
		}
		
		$d['title'] = $title = 'Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'dokumen';
		$d['menuopen2'] = 'dokumen';
		$d['menuactive'] = 'dokumen';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_dokumen->tabel_dokumen($limit,$offset);
		$d['tot'] = $tot = $this->mod_dokumen->tabel_dokumen()->num_rows();
		
		$config['base_url'] = site_url(fmodule('dokumen/index'));
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
		$this->load->view('dokumen/dokumen',$d);
		
	}
	
	public function add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_dokumen->insert_dokumen();
		}
		
		$d['title'] = $title = 'Tambah Data Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'dokumen';
		$d['menuopen2'] = 'dokumen';
		$d['menuactive'] = 'dokumen_add';
		$d['op_dokumen_kategori'] = $this->mod_dokumen->op_dokumen_kategori();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Dokumen', site_url(fmodule('dokumen')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_add',$d);
	}
	
	public function edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_dokumen->update_dokumen($id);
		}
		
		$d['title'] = $title = 'Edit Data Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'dokumen';
		$d['menuopen2'] = 'dokumen';
		$d['menuactive'] = 'dokumen';
		$d['op_dokumen_kategori'] = $this->mod_dokumen->op_dokumen_kategori();
		$d['data'] = $this->mod_dokumen->data_dokumen($id);
		$d['slc_op_dokumen_kategori'] = $this->mod_dokumen->slc_op_dokumen_kategori($id);
		$d['slc_tags'] = $this->mod_dokumen->slc_dokumen_tags($id);
		$d['ID_Dokumen'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Dokumen', site_url(fmodule('dokumen')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_edit',$d);
	}
	
	public function kategori($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_dokumen->delete_dokumen_kategori();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_dokumen->enable_dokumen_kategori();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_dokumen->disable_dokumen_kategori();
		}
		
		$d['title'] = $title = 'Kategori Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'dokumen';
		$d['menuopen2'] = 'dokumen';
		$d['menuactive'] = 'dokumen_kategori';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_dokumen->tabel_dokumen_kategori($limit,$offset);
		$d['tot'] = $tot = $this->mod_dokumen->tabel_dokumen_kategori()->num_rows();
		
		$config['base_url'] = site_url(fmodule('dokumen/kategori'));
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
		$this->load->view('dokumen/dokumen_kategori',$d);
		
	}
	
	
	public function kategori_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		
		if($this->input->post('submit')){
			
			$a = $this->mod_dokumen->insert_dokumen_kategori();
		}
		
		$d['title'] = $title = 'Tambah Kategori Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'dokumen';
		$d['menuopen2'] = 'dokumen';
		$d['menuactive'] = 'dokumen_kategori';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori Dokumen', site_url(fmodule('dokumen/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_kategori_add',$d);
		
	}
	
	public function kategori_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_dokumen->update_dokumen_kategori($id);
		}
		
		$d['title'] = $title = 'Edit Kategori Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'dokumen';
		$d['menuopen2'] = 'dokumen';
		$d['menuactive'] = 'dokumen_kategori';
		$d['data'] = $this->mod_dokumen->data_dokumen_kategori($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori Dokumen', site_url(fmodule('dokumen/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_kategori_edit',$d);
		
	}	
	
	function download($id=0){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		$d['data'] = $data = $this->mod_dokumen->dokumen_download($id);
		echo $data;
	}
	
	function view($id=0){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(22,$DataAkses);
		$d['data'] = $data = $this->mod_dokumen->data_dokumen($id);
		$d['filename'] = '';
		if($data->num_rows() > 0){
			$da = $data->row();
			$d['filename'] = $da->File_Raw.$da->File_Ext;
		}
		$this->load->view('dokumen/dokumen_view',$d);
	}

}