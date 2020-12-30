<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tdg extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_tdg','mod_all'));
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
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Register TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'tdg_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_fo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/fo'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_fo',$d);
	}
	
	public function fo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Register TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'tdg_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_fo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/fo_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_fo',$d);
	}
	
	public function bo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(131,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Register TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'tdg_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_bo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/bo'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_bo',$d);
	}
	
	public function bo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(131,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Register TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'tdg_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_bo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/bo_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_bo',$d);
	}
	
	public function kabid($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(132,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('kabid',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'tdg_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_kabid(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/kabid'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_kabid',$d);
	}
	
	public function kabid_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(132,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('kabid',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'tdg_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_kabid(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/kabid_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_kabid',$d);
	}
	
	public function kadin($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(133,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('kadin',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'tdg_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_kadin(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/kadin'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_kadin',$d);
	}
	
	public function kadin_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(133,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('kadin',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'tdg_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_kadin(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/kadin_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_kadin',$d);
	}
	
	public function tu($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(134,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('tu',1);
		}
		
		$d['title'] = $title = 'Verifikasi TU Atas Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'tdg_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_tu(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/tu'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_tu',$d);
	}
	
	public function tu_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(134,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('tu',0);
		}
		$d['title'] = $title = 'Verifikasi TU Atas Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'tdg_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_tu(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/tu_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_tu',$d);
	}
	
	public function cetak($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(135,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Cetak Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'tdg_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_cetak(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/cetak'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_cetak',$d);
	}
	
	public function cetak_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(135,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Cetak Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'tdg_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_cetak(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/cetak_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_cetak',$d);
	}
	
	public function serah($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(136,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('serah',1);
		}
		
		$d['title'] = $title = 'Pengambilan Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'tdg_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_serah(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/serah'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_serah',$d);
	}
	
	public function serah_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(136,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_tdg->verifikasi_tbl_tdg('serah',0);
		}
		
		$d['title'] = $title = 'Pengambilan Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'tdg_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_tdg_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_tdg_serah(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/serah_all'));
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
		$this->breadcrumb->append_crumb('TDG', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_serah',$d);
	}
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_tdg->delete_tbl_tdg();
		}
		
		$d['title'] = $title = 'Registrasi Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'tdg_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_tdg->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_tdg->get_tbl_personal()->num_rows();
		
		$config['base_url'] = $url_parent = site_url(fmodule('tdg/fo'));
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
		$this->breadcrumb->append_crumb('TDG', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb('Register TDG', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('tdg/tdg_fo_data',$d);
	}
	
	public function fo_daftar($jenis_izin=1,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_tdg->insert_tdg_fo();
		}
		
		$d['title'] = $title = 'Registrasi TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'tdg_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 6; //kode tdg
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
		$d['op_kota'] = $this->mod_tdg->op_kota();
		$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
		$d['op_desa'] = $this->mod_tdg->op_desa();
		$d['op_perusahaan'] = $this->mod_tdg->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
		$d['data'] = $this->mod_tdg->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_tdg->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_tdg->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_tdg->op_status_perusahaan();
		$d['op_kategori_tdg'] = $this->mod_tdg->op_kategori_tdg();
		$d['op_kegiatan_usaha'] = $this->mod_tdg->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_tdg->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_tdg->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_tdg->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_tdg->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('TDG', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb('Register TDG', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('tdg/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_fo_daftar',$d);
	}
	
	public function fo_edit($idtdg=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_tdg->get_tdg($idtdg);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_tdg->update_tdg($idtdg);
		}
		
		$d['title'] = $title = 'Edit Registrasi TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'tdg_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 6; //kode tdg
		$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
		$d['op_kota'] = $this->mod_tdg->op_kota();
		$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
		$d['op_desa'] = $this->mod_tdg->op_desa();
		$d['op_perusahaan'] = $this->mod_tdg->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
		$d['data'] = $this->mod_tdg->get_personal($idpelanggan);
		$d['data2'] = $this->mod_tdg->get_data_tdg($idtdg);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idtdg;
		$d['op_jenis_izin'] = $this->mod_tdg->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_tdg->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_tdg->op_status_perusahaan();
		$d['op_kategori_tdg'] = $this->mod_tdg->op_kategori_tdg();
		$d['op_kegiatan_usaha'] = $this->mod_tdg->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_tdg->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_tdg->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_tdg->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_tdg->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('TDG', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb('Register TDG', site_url(fmodule('tdg/fo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('tdg/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_edit',$d);
	}
	
	public function bo_edit($idtdg=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_tdg->get_tdg($idtdg);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_tdg->update_tdg($idtdg);
		}
		
		$d['title'] = $title = 'Edit Registrasi TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'tdg_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = 6; //kode tdg
		$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
		$d['op_kota'] = $this->mod_tdg->op_kota();
		$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
		$d['op_desa'] = $this->mod_tdg->op_desa();
		$d['op_perusahaan'] = $this->mod_tdg->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
		$d['data'] = $this->mod_tdg->get_personal($idpelanggan);
		$d['data2'] = $this->mod_tdg->get_data_tdg($idtdg);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idtdg;
		$d['op_jenis_izin'] = $this->mod_tdg->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_tdg->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_tdg->op_status_perusahaan();
		$d['op_kategori_tdg'] = $this->mod_tdg->op_kategori_tdg();
		$d['op_kegiatan_usaha'] = $this->mod_tdg->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_tdg->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_tdg->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_tdg->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_tdg->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('TDG', site_url(fmodule('tdg/bo')));
		$this->breadcrumb->append_crumb('Register TDG', site_url(fmodule('tdg/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('tdg/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_edit',$d);
	}
	
	
	
	public function tu_edit($idtdg=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_tdg->get_tdg($idtdg);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_tdg->update_tdg($idtdg);
		}
		
		$d['title'] = $title = 'Edit Registrasi TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'tdg_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = 6; //kode tdg
		$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
		$d['op_kota'] = $this->mod_tdg->op_kota();
		$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
		$d['op_desa'] = $this->mod_tdg->op_desa();
		$d['op_perusahaan'] = $this->mod_tdg->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
		$d['data'] = $this->mod_tdg->get_personal($idpelanggan);
		$d['data2'] = $this->mod_tdg->get_data_tdg($idtdg);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idtdg;
		$d['op_jenis_izin'] = $this->mod_tdg->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_tdg->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_tdg->op_status_perusahaan();
		$d['op_kategori_tdg'] = $this->mod_tdg->op_kategori_tdg();
		$d['op_kegiatan_usaha'] = $this->mod_tdg->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_tdg->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_tdg->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_tdg->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_tdg->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('TDG', site_url(fmodule('tdg/tu')));
		$this->breadcrumb->append_crumb('Register TDG', site_url(fmodule('tdg/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('tdg/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('tdg/tdg_edit',$d);
	}
	
	public function fo_proses($id=0,$jenis_izin=0,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(130,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_tdg->update_tdg_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'tdg_fo';
		$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
		$d['op_kota'] = $this->mod_tdg->op_kota();
		$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
		$d['op_desa'] = $this->mod_tdg->op_desa();
		$d['op_perusahaan'] = $this->mod_tdg->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
		$d['data'] = $this->mod_tdg->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_tdg->get_tdg($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = 6; //kode tdg
		$d['Kd_Jenis'] = $jenis_izin;
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('TDG', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('tdg/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('tdg/tdg_fo_proses',$d);
	}
	
	
	public function tt($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'tdg_cetak';
		$d['data'] = $this->mod_tdg->get_tdg($id);
		$d['Kd_Izin'] = 6; //kode tdg
		$d['Nm_Izin'] = 'TDG'; //kode tdg
		
		$this->load->view('tdg/tdg_cetak_tt',$d);
	}
	
	public function sk($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin TDG';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'tdg_cetak';
		$d['data'] = $this->mod_tdg->get_tdg($id);
		$d['replace'] = $this->mod_tdg->for_replace($id);
		
		$this->load->view('tdg/tdg_cetak_sk',$d);
	}
	
	public function get_nomor($id=0,$param=0,$param2=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['no_sk'] = $this->mod_tdg->get_nomor_sk($id,$param,$param2); // Kode Param Manual
		$d['id_sk'] = $this->mod_tdg->get_id_sk($id);;
		$d['Kd_Izin'] = 6; //kode tdg
		$d['Nm_Izin'] = 'TDG'; //kode tdg
		$this->load->view('tdg/tdg_get_nomor',$d);
	}
	
	public function get_agenda($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor Agenda';
		$d['site_title'] = site_title($title);
		$d['no_agenda'] = $this->mod_tdg->get_nomor_agenda($id,2); // Kode Param Manual
		$d['id_agenda'] = $this->mod_tdg->get_id_agenda($id);;
		$d['Kd_Izin'] = 3; //kode tdg
		$d['Nm_Izin'] = 'TDG'; //kode tdg
		$this->load->view('tdg/tdg_get_agenda',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$d['ID_Izin'] = $ID_Izin = $this->input->post('ID_Izin');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 6; //kode tdg
			$d['Kd_Jenis'] = $ID_Izin;
			$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
			$d['op_kota'] = $this->mod_tdg->op_kota();
			$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
			$d['op_desa'] = $this->mod_tdg->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
			$d['data'] = $this->mod_tdg->get_data_perusahaan($idperusahaan);
			$d['data2'] = $this->mod_tdg->get_data_tdg($ID_Izin);
			$d['op_status_perusahaan'] = $this->mod_tdg->op_status_perusahaan();
			$d['op_kategori_tdg'] = $this->mod_tdg->op_kategori_tdg();
			$d['op_kegiatan_usaha'] = $this->mod_tdg->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_tdg->op_kelembagaan();
			$this->load->view('tdg/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 6; //kode tdg
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_tdg->op_provinsi();
			$d['op_kota'] = $this->mod_tdg->op_kota();
			$d['op_kecamatan'] = $this->mod_tdg->op_kecamatan();
			$d['op_desa'] = $this->mod_tdg->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_tdg->op_bentuk_perusahaan();
			$d['data'] = $this->mod_tdg->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_tdg->op_status_perusahaan();
			$d['op_kategori_tdg'] = $this->mod_tdg->op_kategori_tdg();
			$d['op_kegiatan_usaha'] = $this->mod_tdg->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_tdg->op_kelembagaan();
			$this->load->view('tdg/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(137,$DataAkses);
		
		$d['title'] = $title = 'Data Rekap TDG';
		$d['q'] = 'tdg';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'tdg_laporan';
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(137,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN TDG';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['data']	= $this->mod_tdg->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
}