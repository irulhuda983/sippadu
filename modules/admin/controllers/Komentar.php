<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_komentar','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(10,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_komentar->delete_komentar();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_komentar->enable_komentar();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_komentar->disable_komentar();
		}
		
		$d['title'] = $title = 'Komentar';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'komentar';
		$d['menuopen2'] = 'komentar';
		$d['menuactive'] = 'komentar_pending';
		 
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_komentar->tabel_komentar(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_komentar->tabel_komentar(0)->num_rows();
		
		$config['base_url'] = site_url(fmodule('komentar/index'));
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
		$this->load->view('komentar/komentar',$d);
		
	}
	
	public function arsip($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(10,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_komentar->delete_komentar();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_komentar->enable_komentar();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_komentar->disable_komentar();
		}
		
		$d['title'] = $title = 'Arsip Komentar';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'komentar';
		$d['menuopen2'] = 'komentar';
		$d['menuactive'] = 'komentar_arsip';
		 
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_komentar->tabel_komentar(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_komentar->tabel_komentar(1)->num_rows();
		
		$config['base_url'] = site_url(fmodule('komentar/arsip'));
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
		$this->load->view('komentar/komentar',$d);
		
	}
	
	
	public function add($parent=0,$type=0,$item=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(10,$DataAkses);
		
		if($this->input->post('submit')){
			
			$a = $this->mod_komentar->insert_komentar($parent,$type,$item);
		}
		
		$d['title'] = $title = 'Tambah Komentar';
		$d['site_title'] = site_title($title);
		$d['mention'] = $this->mod_komentar->mention_komentar($parent);
		$this->load->view('komentar/komentar_add_win',$d);
		
	}
	
	public function edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(10,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_komentar->update_komentar($id);
		}
		
		$d['title'] = $title = 'Edit Komentar';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'komentar';
		$d['menuopen2'] = 'komentar';
		$d['menuactive'] = 'komentar';
		$d['data'] = $this->mod_komentar->data_komentar($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Komentar', site_url(fmodule('komentar')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('komentar/komentar_edit',$d);
		
	}
}