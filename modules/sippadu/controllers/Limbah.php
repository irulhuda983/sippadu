<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Limbah extends CI_Controller {

	var $nama_izin 	= 'Izin Pembuangan Limbah Cair';
	var $class_izin	= 'limbah';
	var $kode_izin	= 18;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_limbah','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$this->fo(0);
	}
	
	public function fo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(220,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_fo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/fo'));
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
		$this->breadcrumb->append_crumb('Front Office', site_url('sippadu/fo'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_fo',$d);
	}
	
	public function fo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(220,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_fo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/fo_all'));
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
		$this->breadcrumb->append_crumb('Front Office', site_url('sippadu/fo'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_fo',$d);
	}
	
	public function bo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(221,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = $this->class_izin.'_bo';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_bo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/bo'));
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
		$this->breadcrumb->append_crumb('Back Office', site_url(fmodule('sippadu/bo')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_bo',$d);
	}
	
	public function bo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(221,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = $this->class_izin.'_bo';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_bo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/bo_all'));
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
		$this->breadcrumb->append_crumb('Back Office', site_url(fmodule('sippadu/bo')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_bo',$d);
	}
	
	public function kabid($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(222,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('kabid',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = $this->class_izin.'_kabid';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_kabid(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/kabid'));
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
	$this->breadcrumb->append_crumb('Validasi Kabid', site_url('sippadu/kabid'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_kabid',$d);
	}
	
	public function kabid_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(222,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('kabid',0);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = $this->class_izin.'_kabid';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_kabid(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/kabid_all'));
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
		$this->breadcrumb->append_crumb('Validasi Kabid', site_url('sippadu/kabid'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_kabid',$d);
	}
	
	public function kadin($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(223,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('kadin',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = $this->class_izin.'_kadin';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_kadin(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/kadin'));
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
		$this->breadcrumb->append_crumb('Validasi Kadin', site_url('sippadu/kadin'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_kadin',$d);
	}
	
	public function kadin_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(223,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('kadin',0);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = $this->class_izin.'_kadin';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_kadin(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/kadin_all'));
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
		$this->breadcrumb->append_crumb('Validasi Kadin', site_url('sippadu/kadin'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_kadin',$d);
	}
	
	public function tu($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(224,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('tu',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = $this->class_izin.'_tu';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_tu(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/tu'));
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
		$this->breadcrumb->append_crumb('Verifikasi Tata Usaha', site_url('sippadu/tu'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_tu',$d);
	}
	
	public function tu_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(224,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('tu',0);
		}
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = $this->class_izin.'_tu';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_tu(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/tu_all'));
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
		$this->breadcrumb->append_crumb('Verifikasi Tata Usaha', site_url('sippadu/tu'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_tu',$d);
	}
	
	public function cetak($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(225,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_cetak(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/cetak'));
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
		$this->breadcrumb->append_crumb('Cetak', site_url('sippadu/cetak'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak',$d);
	}
	
	public function cetak_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(225,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_cetak(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/cetak_all'));
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
		$this->breadcrumb->append_crumb('Cetak', site_url('sippadu/cetak'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak',$d);
	}
	
	public function serah($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(226,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('serah',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = $this->class_izin.'_serah';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_serah(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/serah'));
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
		$this->breadcrumb->append_crumb('Pengambilan', site_url('sippadu/serah'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_serah',$d);
	}
	
	public function serah_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(226,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_limbah->verifikasi_tbl_limbah('serah',0);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = $this->class_izin.'_serah';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_serah(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/serah_all'));
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
		$this->breadcrumb->append_crumb('Pengambilan', site_url('sippadu/serah'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_serah',$d);
	}
	
	public function serah_win($idizin=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(226,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_limbah->simpan_pengambil($idizin);
		}
		
		$d['title'] = $title = 'Pengambilan Kesehatan';
		$d['site_title'] = site_title($title);
		$d['Class_Izin'] = $this->class_izin;
		$d['ID_Izin'] = $idizin;
		$d['module_izin'] = $this->class_izin;
		$d['data'] = $this->mod_limbah->data_serah($idizin);
		
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_serah_win',$d);
	}
	
	public function serah_ajax()
	{
		$d['data'] = $this->mod_limbah->data_serah_ajax();
		$d['Class_Izin'] = $this->class_izin;
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_serah_ajax',$d);
	}
	
	public function rekom($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(228,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'rekom';
		$d['menuactive'] = $this->class_izin.'_rekom';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_rekom(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_rekom(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/rekom'));
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
		$this->breadcrumb->append_crumb('Rekomendasi', site_url('sippadu/rekom'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_rekom',$d);
	}
	
	public function rekom_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(228,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'rekom';
		$d['menuactive'] = $this->class_izin.'_rekom';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_limbah_rekom(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_limbah_rekom(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/rekom_all'));
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
		$this->breadcrumb->append_crumb('Rekomendasi', site_url('sippadu/rekom'));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_rekom',$d);
	}
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(220,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_limbah->delete_tbl_limbah();
		}
		
		$d['title'] = $title = 'Cari Personal';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Class_Izin'] = $this->class_izin;
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_limbah->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_limbah->get_tbl_personal()->num_rows();
		
		$config['base_url'] = $url_parent = site_url(fmodule($this->class_izin.'/fo_data'));
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
		$this->breadcrumb->append_crumb('Front Office', site_url(fmodule('sippadu/fo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_fo_data',$d);
	}
	
	public function fo_daftar($jenis_izin=1,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(220,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_limbah->insert_limbah_fo();
		}
		
		$d['title'] = $title = 'Registrasi';
		$d['site_title'] = site_title($title);
		$d['Class_Izin'] = $this->class_izin;
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
		$d['op_kota'] = $this->mod_limbah->op_kota();
		$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
		$d['op_desa'] = $this->mod_limbah->op_desa();
		$d['op_perusahaan'] = $this->mod_limbah->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
		$d['data'] = $this->mod_limbah->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_limbah->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_limbah->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
		$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
		$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_limbah->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_limbah->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_limbah->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_limbah->op_kategori_izin();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Front Office', site_url(fmodule('sippadu/fo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb('Cari Personal', site_url(fmodule($this->class_izin.'/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_fo_daftar',$d);
	}
	
	public function fo_edit($id=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_limbah->get_limbah($id);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(220,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_limbah->update_limbah($id);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Kd_Rekom'] = flow_rekom($this->kode_izin);
		$d['SKPD_Rekom'] = skpd_rekom($this->kode_izin);
		$d['Print_SK1'] = print_sk1($this->kode_izin);
		$d['Print_SK2'] = print_sk2($this->kode_izin);
		$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
		$d['op_kota'] = $this->mod_limbah->op_kota();
		$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
		$d['op_desa'] = $this->mod_limbah->op_desa();
		$d['op_perusahaan'] = $this->mod_limbah->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
		$d['data'] = $this->mod_limbah->get_personal($idpelanggan);
		$d['data2'] = $this->mod_limbah->get_data_limbah($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $id;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_limbah->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_limbah->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
		$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
		$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_limbah->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_limbah->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_limbah->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_limbah->op_kategori_izin();
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Front Office', site_url(fmodule('sippadu/fo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_edit',$d);
	}
	
	public function bo_edit($id=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_limbah->get_limbah($id);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(220,221),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_limbah->update_limbah($id);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = $this->class_izin.'_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Kd_Rekom'] = flow_rekom($this->kode_izin);
		$d['SKPD_Rekom'] = skpd_rekom($this->kode_izin);
		$d['Print_SK1'] = print_sk1($this->kode_izin);
		$d['Print_SK2'] = print_sk2($this->kode_izin);
		$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
		$d['op_kota'] = $this->mod_limbah->op_kota();
		$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
		$d['op_desa'] = $this->mod_limbah->op_desa();
		$d['op_perusahaan'] = $this->mod_limbah->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
		$d['data'] = $this->mod_limbah->get_personal($idpelanggan);
		$d['data2'] = $this->mod_limbah->get_data_limbah($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $id;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_limbah->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_limbah->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
		$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
		$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_limbah->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_limbah->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_limbah->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_limbah->op_kategori_izin();
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Back Office', site_url(fmodule('sippadu/bo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/bo')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_edit',$d);
	}
	
	public function rekom_edit($id=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_limbah->get_limbah($id);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(228),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_limbah->update_limbah($id);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'rekom';
		$d['menuactive'] = $this->class_izin.'_rekom';
		$d['Kd_Access'] = 'rekom';
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Kd_Rekom'] = flow_rekom($this->kode_izin);
		$d['SKPD_Rekom'] = skpd_rekom($this->kode_izin);
		$d['Print_SK1'] = print_sk1($this->kode_izin);
		$d['Print_SK2'] = print_sk2($this->kode_izin);
		$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
		$d['op_kota'] = $this->mod_limbah->op_kota();
		$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
		$d['op_desa'] = $this->mod_limbah->op_desa();
		$d['op_perusahaan'] = $this->mod_limbah->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
		$d['data'] = $this->mod_limbah->get_personal($idpelanggan);
		$d['data2'] = $this->mod_limbah->get_data_limbah($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $id;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_limbah->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_limbah->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
		$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
		$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_limbah->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_limbah->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_limbah->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_limbah->op_kategori_izin();
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Rekomendasi', site_url(fmodule('sippadu/rekom')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/rekom')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_edit',$d);
	}
	
	public function tu_edit($id=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_limbah->get_limbah($id);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(224,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_limbah->update_limbah($id);
		}
		
		$d['title'] = $title = 'Verifikasi';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = $this->class_izin.'_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Kd_Rekom'] = flow_rekom($this->kode_izin);
		$d['SKPD_Rekom'] = skpd_rekom($this->kode_izin);
		$d['Print_SK1'] = print_sk1($this->kode_izin);
		$d['Print_SK2'] = print_sk2($this->kode_izin);
		$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
		$d['op_kota'] = $this->mod_limbah->op_kota();
		$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
		$d['op_desa'] = $this->mod_limbah->op_desa();
		$d['op_perusahaan'] = $this->mod_limbah->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
		$d['data'] = $this->mod_limbah->get_personal($idpelanggan);
		$d['data2'] = $this->mod_limbah->get_data_limbah($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $id;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_limbah->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_limbah->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
		$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
		$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_limbah->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_limbah->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_limbah->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_limbah->op_kategori_izin();
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Verifikasi Tata Usaha', site_url(fmodule('sippadu/tu')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/tu')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_edit',$d);
	}
	
	public function fo_proses($id=0,$jenis_izin=0,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(220,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_limbah->update_limbah_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Class_Izin'] = $this->class_izin;
		$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
		$d['op_kota'] = $this->mod_limbah->op_kota();
		$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
		$d['op_desa'] = $this->mod_limbah->op_desa();
		$d['op_perusahaan'] = $this->mod_limbah->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
		$d['data'] = $this->mod_limbah->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_limbah->get_limbah($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Kd_Jenis'] = $jenis_izin;
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_fo_proses',$d);
	}
	
	
	public function tt($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis_Izin'] = $Kd_Jenis_Izin = $this->mod_limbah->get_jenis_izin($id);
		$d['Kd_Kategori_Izin'] = $Kd_Kategori_Izin = $this->mod_limbah->get_kategori_izin($id);
		$d['data'] = $this->mod_limbah->get_limbah($id);
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Nm_Izin'] = $this->nama_izin; //kode limbah
		
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_tt',$d);
	}
	
	public function sk($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['Kd_Izin'] = $this->kode_izin;
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis_Izin'] = $Kd_Jenis_Izin = $this->mod_limbah->get_jenis_izin($id);
		$d['Kd_Kategori_Izin'] = $Kd_Kategori_Izin = $this->mod_limbah->get_kategori_izin($id);
		$d['data'] = $this->mod_limbah->get_limbah($id);
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		switch($Kd_Jenis_Izin){
			case '1':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk',$d);
			break;
			case '2':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk_perpanjangan',$d);
			break;
			case '3':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk_perubahan',$d);
			break;
			case '4':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk_penutupan',$d);
			break;
			default:
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk',$d);
			break;
		}
	}
	
	public function sk2($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['Kd_Izin'] = $this->kode_izin;
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis_Izin'] = $Kd_Jenis_Izin = $this->mod_limbah->get_jenis_izin($id);
		$d['Kd_Kategori_Izin'] = $Kd_Kategori_Izin = $this->mod_limbah->get_kategori_izin($id);
		$d['data'] = $this->mod_limbah->get_limbah($id);
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		switch($Kd_Jenis_Izin){
			case '1':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk2',$d);
			break;
			case '2':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk2_perpanjangan',$d);
			break;
			case '3':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk2_perubahan',$d);
			break;
			case '4':
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk2_penutupan',$d);
			break;
			default:
			$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk2',$d);
			break;
		}
	}
	
	public function sk_rekom($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		$d['Kd_Izin'] = $this->kode_izin;
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis_Izin'] = $Kd_Jenis_Izin = $this->mod_limbah->get_jenis_izin($id);
		$d['Kd_Kategori_Izin'] = $Kd_Kategori_Izin = $this->mod_limbah->get_kategori_izin($id);
		$d['data'] = $this->mod_limbah->get_limbah($id);
		$d['replace'] = $this->mod_limbah->for_replace($id);
		
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk_rekom',$d);
	}
	
	public function get_nomor($id=0,$param=0,$param2=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis_Izin'] = $Kd_Jenis_Izin = $this->mod_limbah->get_jenis_izin($id);
		$d['Kd_Kategori_Izin'] = $Kd_Kategori_Izin = $this->mod_limbah->get_kategori_izin($id);
		$d['no_sk'] = $this->mod_limbah->get_nomor_sk($id,$param,$param2); // Kode Param Manual
		$d['id_sk'] = $this->mod_limbah->get_id_sk($id);;
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Nm_Izin'] = $this->nama_izin; //kode limbah
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_get_nomor',$d);
	}
	
	public function get_agenda($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor Agenda';
		$d['site_title'] = site_title($title);
		$d['Class_Izin'] = $this->class_izin;
		$d['Kd_Jenis_Izin'] = $Kd_Jenis_Izin = $this->mod_limbah->get_jenis_izin($id);
		$d['Kd_Kategori_Izin'] = $Kd_Kategori_Izin = $this->mod_limbah->get_kategori_izin($id);
		$d['no_agenda'] = $this->mod_limbah->get_nomor_agenda($id,2); // Kode Param Manual
		$d['id_agenda'] = $this->mod_limbah->get_id_agenda($id);;
		$d['Kd_Izin'] = $this->kode_izin; //kode limbah
		$d['Nm_Izin'] = $this->nama_izin; //kode limbah
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_get_agenda',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$d['ID_Izin'] = $ID_Izin = $this->input->post('ID_Izin');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = $this->kode_izin; //kode limbah
			$d['Class_Izin'] = $this->class_izin;
			$d['Kd_Jenis'] = $ID_Izin;
			$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
			$d['op_kota'] = $this->mod_limbah->op_kota();
			$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
			$d['op_desa'] = $this->mod_limbah->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
			$d['data'] = $this->mod_limbah->get_data_perusahaan($idperusahaan);
			$d['data2'] = $this->mod_limbah->get_data_limbah($ID_Izin);
			$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
			$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
			$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
			$this->load->view($this->class_izin.'/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = $this->kode_izin; //kode limbah
			$d['Class_Izin'] = $this->class_izin;
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_limbah->op_provinsi();
			$d['op_kota'] = $this->mod_limbah->op_kota();
			$d['op_kecamatan'] = $this->mod_limbah->op_kecamatan();
			$d['op_desa'] = $this->mod_limbah->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_limbah->op_bentuk_perusahaan();
			$d['data'] = $this->mod_limbah->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_limbah->op_status_perusahaan();
			$d['op_kategori_limbah'] = $this->mod_limbah->op_kategori_limbah();
			$d['op_kegiatan_usaha'] = $this->mod_limbah->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_limbah->op_kelembagaan();
			$this->load->view($this->class_izin.'/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(227,$DataAkses);
		
		$d['title'] = $title = 'Rekap '.$this->nama_izin.'';
		$d['q'] = $this->class_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'rekap_laporan_izin';
		$d['Class_Izin'] = $this->class_izin;
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Laporan Per Izin', site_url(fmodule('sippadu/laporan')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(227,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['Class_Izin'] = $this->class_izin;
		$d['data']	= $this->mod_limbah->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
}