<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_dokumen','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$this->master_jenis(0);
	}
	
	public function master_jenis($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(30,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_dokumen->delete_master_jenis_dok();
		}
		
		$d['title'] = $title = 'Jenis Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'dokumen_master_jenis';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_dokumen->get_tbl_dokumen($limit,$offset);
		$d['tot'] = $tot = $this->mod_dokumen->get_tbl_dokumen()->num_rows();
		
		$config['base_url'] = site_url(fmodule('dokumen/master_jenis'));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
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
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_master_jenis',$d);
	}
	
	
	public function master_jenis_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(30,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_dokumen->insert_dokumen_jenis();
		}
		
		$d['title'] = $title = 'Tambah Jenis Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'dokumen_master_jenis';
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Jenis Dokumen', site_url(fmodule('dokumen/master_jenis')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('dokumen/dokumen_master_jenis_add',$d);
	}
	
	public function master_jenis_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(30,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_dokumen->update_dokumen_jenis($id);
		}
		
		$d['title'] = $title = 'Ubah Jenis Dokumen';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'dokumen_master_jenis';
		$d['data'] = $this->mod_dokumen->get_dokumen($id);
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Jenis Dokumen', site_url(fmodule('dokumen/master_jenis')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_master_jenis_edit',$d);
	}
	
	public function master_dok($idizin=0,$idjenis=0,$offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(31,$DataAkses);
		$uri = $this->uri->segment(4);
		$uri5 = $this->uri->segment(5);
		//$offset = $this->uri->segment(6);
		
		if($this->input->post('simpan')){
			$this->mod_dokumen->save_master_dok($idizin,$idjenis);
		}
		
		if($this->input->post('opizin') && $this->input->post('opizin') != 'no'){
			$url = site_url(fmodule('dokumen/master_dok')).'/'.$this->input->post('opizin').'/'.($uri5 ? $uri5 : '0').'/'.($offset ? $offset : '0');
			redirect($url);
		}
		
		else if($this->input->post('opizin') && $this->input->post('opizin') == 'no'){
			$url = site_url(fmodule('dokumen/master_dok'));
			redirect($url);
		}
		
		if($this->input->post('opjenisizin') && $this->input->post('opjenisizin') != 'no'){
			$url = site_url(fmodule('dokumen/master_dok')).'/'.($uri ? $uri : '0').'/'.$this->input->post('opjenisizin');
			redirect($url);
		}
		
		else if($this->input->post('opjenisizin') && $this->input->post('opjenisizin') == 'no'){
			$url = site_url(fmodule('dokumen/master_dok').'/'.($uri ? $uri : '0'));
			redirect($url);
		}
		
		$d['title'] = $title = 'Dokumen Persyaratan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'dokumen_master_dok';
		$d['op_izin'] = $this->mod_dokumen->op_izin();
		$d['op_jenis_izin'] = $this->mod_dokumen->op_jenis_izin($idizin);
		$d['idizin'] = $idizin;
		$d['idjenis'] = $idjenis;
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_dokumen->get_tbl_dokumen();
		$d['tot'] = $tot = $this->mod_dokumen->get_tbl_dokumen()->num_rows();
		
		$config['base_url'] = site_url(fmodule('dokumen/master_dok/'.($uri ? $uri : '0').'/'.($uri5 ? $uri5 : '0')));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 6;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
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
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_master_dok',$d);
	}
	
	public function master_param($idizin=0,$idjenis=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(31,$DataAkses);
		$uri = $this->uri->segment(4);
		$uri5 = $this->uri->segment(5);
		
		if($this->input->post('simpan')){
			$this->mod_dokumen->save_master_parameter($idizin,$idjenis);
		}
		
		if($this->input->post('opizin') && $this->input->post('opizin') != 'no'){
			$url = site_url(fmodule('dokumen/master_param')).'/'.$this->input->post('opizin').'/'.($uri5 ? $uri5 : '0');
			redirect($url);
		}
		
		else if($this->input->post('opizin') && $this->input->post('opizin') == 'no'){
			$url = site_url(fmodule('dokumen/master_param'));
			redirect($url);
		}
		
		if($this->input->post('opjenisizin') && $this->input->post('opjenisizin') != 'no'){
			$url = site_url(fmodule('dokumen/master_param')).'/'.($uri ? $uri : '0').'/'.$this->input->post('opjenisizin');
			redirect($url);
		}
		
		else if($this->input->post('opjenisizin') && $this->input->post('opjenisizin') == 'no'){
			$url = site_url(fmodule('dokumen/master_param').'/'.($uri ? $uri : '0'));
			redirect($url);
		}
		
		$d['title'] = $title = 'Setting Parameter';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'dokumen_master_parameter';
		$d['op_izin'] = $this->mod_dokumen->op_izin();
		$d['op_jenis_izin'] = $this->mod_dokumen->op_jenis_parameter($idizin);
		$d['idizin'] = $idizin;
		$d['idjenis'] = $idjenis;
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_dokumen->get_parameter($idizin,$idjenis);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('dokumen/dokumen_master_param',$d);
	}
	
}