<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lpks extends CI_Controller {

	var $nama_izin 	= 'Izin Pendirian LPK Swasta';
	var $class_izin	= 'lpks';
	var $kode_izin	= 15;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_lpks','mod_all'));
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
		$d['PageAkses'] = PageAkses(190,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_fo(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(190,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_fo(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(191,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = $this->class_izin.'_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_bo(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(191,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = $this->class_izin.'_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_bo(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(192,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('kabid',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = $this->class_izin.'_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_kabid(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(192,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('kabid',0);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = $this->class_izin.'_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_kabid(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(193,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('kadin',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = $this->class_izin.'_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_kadin(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(193,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('kadin',0);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = $this->class_izin.'_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_kadin(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(194,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('tu',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = $this->class_izin.'_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_tu(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(194,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('tu',0);
		}
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = $this->class_izin.'_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_tu(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(195,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_cetak(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(195,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = $this->class_izin.'_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_cetak(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(196,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('serah',1);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = $this->class_izin.'_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_serah(0)->num_rows();
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
		$d['PageAkses'] = PageAkses(196,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_lpks->verifikasi_tbl_lpks('serah',0);
		}
		
		$d['title'] = $title = $this->nama_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = $this->class_izin.'_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_lpks_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_lpks_serah(1)->num_rows();
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
		$d['PageAkses'] = PageAkses(196,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_lpks->simpan_pengambil($idizin);
		}
		
		$d['title'] = $title = 'Pengambilan Kesehatan';
		$d['site_title'] = site_title($title);
		$d['ID_Izin'] = $idizin;
		$d['module_izin'] = $this->class_izin;
		$d['data'] = $this->mod_lpks->data_serah($idizin);
		
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_serah_win',$d);
	}
	
	public function serah_ajax()
	{
		$d['data'] = $this->mod_lpks->data_serah_ajax();
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_serah_ajax',$d);
	}
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(190,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_lpks->delete_tbl_lpks();
		}
		
		$d['title'] = $title = 'Cari Personal';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['offset'] = $offset;
		$d['data'] = $this->mod_lpks->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_lpks->get_tbl_personal()->num_rows();
		
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
		$d['PageAkses'] = PageAkses(190,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_lpks->insert_lpks_fo();
		}
		
		$d['title'] = $title = 'Registrasi';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
		$d['op_kota'] = $this->mod_lpks->op_kota();
		$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
		$d['op_desa'] = $this->mod_lpks->op_desa();
		$d['op_perusahaan'] = $this->mod_lpks->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['data'] = $this->mod_lpks->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_lpks->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_lpks->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_lpks->op_status_perusahaan();
		$d['op_kategori_lpks'] = $this->mod_lpks->op_kategori_lpks();
		$d['op_kegiatan_usaha'] = $this->mod_lpks->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_lpks->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_lpks->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_lpks->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_lpks->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_lpks->op_kategori_izin();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Front Office', site_url(fmodule('sippadu/fo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb('Cari Personal', site_url(fmodule($this->class_izin.'/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_fo_daftar',$d);
	}
	
	public function fo_edit($idlpks=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_lpks->get_lpks($idlpks);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(190,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_lpks->update_lpks($idlpks);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
		$d['op_kota'] = $this->mod_lpks->op_kota();
		$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
		$d['op_desa'] = $this->mod_lpks->op_desa();
		$d['op_perusahaan'] = $this->mod_lpks->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['data'] = $this->mod_lpks->get_personal($idpelanggan);
		$d['data2'] = $this->mod_lpks->get_data_lpks($idlpks);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idlpks;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_lpks->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_lpks->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_lpks->op_status_perusahaan();
		$d['op_kategori_lpks'] = $this->mod_lpks->op_kategori_lpks();
		$d['op_kegiatan_usaha'] = $this->mod_lpks->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_lpks->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_lpks->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_lpks->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_lpks->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_lpks->op_kategori_izin();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Front Office', site_url(fmodule('sippadu/fo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/fo')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_edit',$d);
	}
	
	public function bo_edit($idlpks=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_lpks->get_lpks($idlpks);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(120,121),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_lpks->update_lpks($idlpks);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = $this->class_izin.'_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
		$d['op_kota'] = $this->mod_lpks->op_kota();
		$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
		$d['op_desa'] = $this->mod_lpks->op_desa();
		$d['op_perusahaan'] = $this->mod_lpks->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['data'] = $this->mod_lpks->get_personal($idpelanggan);
		$d['data2'] = $this->mod_lpks->get_data_lpks($idlpks);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idlpks;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_lpks->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_lpks->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_lpks->op_status_perusahaan();
		$d['op_kategori_lpks'] = $this->mod_lpks->op_kategori_lpks();
		$d['op_kegiatan_usaha'] = $this->mod_lpks->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_lpks->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_lpks->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_lpks->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_lpks->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_lpks->op_kategori_izin();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Back Office', site_url(fmodule('sippadu/bo')));
		$this->breadcrumb->append_crumb($this->nama_izin, site_url(fmodule($this->class_izin.'/bo')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_edit',$d);
	}
	
	
	
	public function tu_edit($idlpks=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_lpks->get_lpks($idlpks);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(194,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_lpks->update_lpks($idlpks);
		}
		
		$d['title'] = $title = 'Verifikas';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = $this->class_izin.'_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
		$d['op_kota'] = $this->mod_lpks->op_kota();
		$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
		$d['op_desa'] = $this->mod_lpks->op_desa();
		$d['op_perusahaan'] = $this->mod_lpks->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['data'] = $this->mod_lpks->get_personal($idpelanggan);
		$d['data2'] = $this->mod_lpks->get_data_lpks($idlpks);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idlpks;
		$d['Class_Izin'] = $this->class_izin;
		$d['op_jenis_izin'] = $this->mod_lpks->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_lpks->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_lpks->op_status_perusahaan();
		$d['op_kategori_lpks'] = $this->mod_lpks->op_kategori_lpks();
		$d['op_kegiatan_usaha'] = $this->mod_lpks->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_lpks->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_lpks->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_lpks->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_lpks->op_bukti_terima();
		$d['op_kategori_izin'] = $this->mod_lpks->op_kategori_izin();
		
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
		$d['PageAkses'] = PageAkses(190,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_lpks->update_lpks_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = $this->class_izin.'_fo';
		$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
		$d['op_kota'] = $this->mod_lpks->op_kota();
		$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
		$d['op_desa'] = $this->mod_lpks->op_desa();
		$d['op_perusahaan'] = $this->mod_lpks->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
		$d['data'] = $this->mod_lpks->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_lpks->get_lpks($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
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
		$d['data'] = $this->mod_lpks->get_lpks($id);
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['Nm_Izin'] = $this->nama_izin; //kode lpks
		
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
		$d['data'] = $this->mod_lpks->get_lpks($id);
		$d['replace'] = $this->mod_lpks->for_replace($id);
		
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_cetak_sk',$d);
	}
	
	public function get_nomor($id=0,$param=0,$param2=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['no_sk'] = $this->mod_lpks->get_nomor_sk($id,$param,$param2); // Kode Param Manual
		$d['id_sk'] = $this->mod_lpks->get_id_sk($id);;
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['Nm_Izin'] = $this->nama_izin; //kode lpks
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_get_nomor',$d);
	}
	
	public function get_agenda($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor Agenda';
		$d['site_title'] = site_title($title);
		$d['no_agenda'] = $this->mod_lpks->get_nomor_agenda($id,2); // Kode Param Manual
		$d['id_agenda'] = $this->mod_lpks->get_id_agenda($id);;
		$d['Kd_Izin'] = $this->kode_izin; //kode lpks
		$d['Nm_Izin'] = $this->nama_izin; //kode lpks
		$this->load->view($this->class_izin.'/'.$this->class_izin.'_get_agenda',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$d['ID_Izin'] = $ID_Izin = $this->input->post('ID_Izin');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = $this->kode_izin; //kode lpks
			$d['Kd_Jenis'] = $ID_Izin;
			$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
			$d['op_kota'] = $this->mod_lpks->op_kota();
			$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
			$d['op_desa'] = $this->mod_lpks->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
			$d['data'] = $this->mod_lpks->get_data_perusahaan($idperusahaan);
			$d['data2'] = $this->mod_lpks->get_data_lpks($ID_Izin);
			$d['op_status_perusahaan'] = $this->mod_lpks->op_status_perusahaan();
			$d['op_kategori_lpks'] = $this->mod_lpks->op_kategori_lpks();
			$d['op_kegiatan_usaha'] = $this->mod_lpks->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_lpks->op_kelembagaan();
			$this->load->view($this->class_izin.'/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = $this->kode_izin; //kode lpks
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_lpks->op_provinsi();
			$d['op_kota'] = $this->mod_lpks->op_kota();
			$d['op_kecamatan'] = $this->mod_lpks->op_kecamatan();
			$d['op_desa'] = $this->mod_lpks->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_lpks->op_bentuk_perusahaan();
			$d['data'] = $this->mod_lpks->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_lpks->op_status_perusahaan();
			$d['op_kategori_lpks'] = $this->mod_lpks->op_kategori_lpks();
			$d['op_kegiatan_usaha'] = $this->mod_lpks->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_lpks->op_kelembagaan();
			$this->load->view($this->class_izin.'/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(197,$DataAkses);
		
		$d['title'] = $title = 'Rekap '.$this->nama_izin.'';
		$d['q'] = $this->class_izin;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'rekap_laporan_izin';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Laporan Per Izin', site_url(fmodule('sippadu/laporan')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(197,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN '.$this->nama_izin.'';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['data']	= $this->mod_lpks->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
}