<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reklame extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_reklame','mod_all'));
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
		$d['PageAkses'] = PageAkses(70,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Register Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'reklame_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_fo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/fo'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_fo',$d);
	}
	
	public function fo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(70,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Register Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'reklame_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_fo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/fo_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_fo',$d);
	}
	
	public function bo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(71,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Register Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'reklame_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_bo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/bo'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_bo',$d);
	}
	
	public function bo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(71,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Register Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'reklame_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_bo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/bo_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_bo',$d);
	}
	
	public function kabid($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(72,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('kabid',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'reklame_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_kabid(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/kabid'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_kabid',$d);
	}
	
	public function kabid_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(72,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('kabid',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'reklame_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_kabid(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/kabid_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_kabid',$d);
	}
	
	public function kadin($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(73,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('kadin',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'reklame_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_kadin(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/kadin'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_kadin',$d);
	}
	
	public function kadin_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(73,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('kadin',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'reklame_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_kadin(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/kadin_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_kadin',$d);
	}
	
	public function tu($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(74,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('tu',1);
		}
		
		$d['title'] = $title = 'Verifikasi TU Atas Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'reklame_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_tu(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/tu'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_tu',$d);
	}
	
	public function tu_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(74,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('tu',0);
		}
		$d['title'] = $title = 'Verifikasi TU Atas Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'reklame_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_tu(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/tu_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_tu',$d);
	}
	
	public function cetak($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(75,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Cetak Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'reklame_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_cetak(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/cetak'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_cetak',$d);
	}
	
	public function cetak_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(75,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Cetak Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'reklame_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_cetak(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/cetak_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_cetak',$d);
	}
	
	public function serah($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(76,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('serah',1);
		}
		
		$d['title'] = $title = 'Pengambilan Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'reklame_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_serah(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/serah'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_serah',$d);
	}
	
	public function serah_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(76,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_reklame->verifikasi_tbl_reklame('serah',0);
		}
		
		$d['title'] = $title = 'Pengambilan Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'reklame_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_reklame_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_reklame_serah(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/serah_all'));
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
		$this->breadcrumb->append_crumb('Reklame', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_serah',$d);
	}
	
	public function serah_win($idizin=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(76,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_reklame->simpan_pengambil($idizin);
		}
		
		$d['title'] = $title = 'Pengambilan Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['ID_Izin'] = $idizin;
		$d['module_izin'] = 'reklame';
		$d['data'] = $this->mod_reklame->data_serah($idizin);
		
		$this->load->view('reklame/reklame_serah_win',$d);
	}
	
	public function serah_ajax()
	{
		$d['data'] = $this->mod_reklame->data_serah_ajax();
		$this->load->view('reklame/reklame_serah_ajax',$d);
	}
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(70,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_reklame->delete_tbl_reklame();
		}
		
		$d['title'] = $title = 'Registrasi Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'reklame_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_reklame->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_reklame->get_tbl_personal()->num_rows();
		
		$config['base_url'] = $url_parent = site_url(fmodule('reklame/fo_data'));
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
		$this->breadcrumb->append_crumb('Reklame', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb('Register Reklame', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('reklame/reklame_fo_data',$d);
	}
	
	public function fo_daftar($jenis_izin=1,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(70,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_reklame->insert_reklame_fo();
		}
		
		$d['title'] = $title = 'Registrasi Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'reklame_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 8; //kode reklame
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
		$d['op_kota'] = $this->mod_reklame->op_kota();
		$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
		$d['op_desa'] = $this->mod_reklame->op_desa();
		$d['op_perusahaan'] = $this->mod_reklame->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
		$d['data'] = $this->mod_reklame->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_reklame->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_reklame->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_reklame->op_status_perusahaan();
		$d['op_kategori_reklame'] = $this->mod_reklame->op_kategori_reklame();
		$d['op_kegiatan_usaha'] = $this->mod_reklame->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_reklame->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_reklame->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_reklame->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_reklame->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Reklame', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb('Register Reklame', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('reklame/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_fo_daftar',$d);
	}
	
	public function fo_edit($idreklame=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_reklame->get_reklame($idreklame);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(70,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_reklame->update_reklame($idreklame);
		}
		
		$d['title'] = $title = 'Edit Registrasi Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'reklame_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 8; //kode reklame
		$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
		$d['op_kota'] = $this->mod_reklame->op_kota();
		$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
		$d['op_desa'] = $this->mod_reklame->op_desa();
		$d['op_perusahaan'] = $this->mod_reklame->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
		$d['data'] = $this->mod_reklame->get_personal($idpelanggan);
		$d['data2'] = $this->mod_reklame->get_data_reklame($idreklame);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idreklame;
		$d['op_jenis_izin'] = $this->mod_reklame->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_reklame->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_reklame->op_status_perusahaan();
		$d['op_kategori_reklame'] = $this->mod_reklame->op_kategori_reklame();
		$d['op_kegiatan_usaha'] = $this->mod_reklame->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_reklame->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_reklame->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_reklame->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_reklame->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Reklame', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb('Register Reklame', site_url(fmodule('reklame/fo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('reklame/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_edit',$d);
	}
	
	public function bo_edit($idreklame=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_reklame->get_reklame($idreklame);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(70,71),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_reklame->update_reklame($idreklame);
		}
		
		$d['title'] = $title = 'Edit Registrasi Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'reklame_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = 8; //kode reklame
		$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
		$d['op_kota'] = $this->mod_reklame->op_kota();
		$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
		$d['op_desa'] = $this->mod_reklame->op_desa();
		$d['op_perusahaan'] = $this->mod_reklame->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
		$d['data'] = $this->mod_reklame->get_personal($idpelanggan);
		$d['data2'] = $this->mod_reklame->get_data_reklame($idreklame);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idreklame;
		$d['op_jenis_izin'] = $this->mod_reklame->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_reklame->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_reklame->op_status_perusahaan();
		$d['op_kategori_reklame'] = $this->mod_reklame->op_kategori_reklame();
		$d['op_kegiatan_usaha'] = $this->mod_reklame->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_reklame->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_reklame->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_reklame->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_reklame->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Reklame', site_url(fmodule('reklame/bo')));
		$this->breadcrumb->append_crumb('Register Reklame', site_url(fmodule('reklame/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('reklame/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_edit',$d);
	}
	
	
	
	public function tu_edit($idreklame=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_reklame->get_reklame($idreklame);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(74,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_reklame->update_reklame($idreklame);
		}
		
		$d['title'] = $title = 'Edit Registrasi Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'reklame_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = 8; //kode reklame
		$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
		$d['op_kota'] = $this->mod_reklame->op_kota();
		$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
		$d['op_desa'] = $this->mod_reklame->op_desa();
		$d['op_perusahaan'] = $this->mod_reklame->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
		$d['data'] = $this->mod_reklame->get_personal($idpelanggan);
		$d['data2'] = $this->mod_reklame->get_data_reklame($idreklame);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idreklame;
		$d['op_jenis_izin'] = $this->mod_reklame->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_reklame->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_reklame->op_status_perusahaan();
		$d['op_kategori_reklame'] = $this->mod_reklame->op_kategori_reklame();
		$d['op_kegiatan_usaha'] = $this->mod_reklame->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_reklame->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_reklame->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_reklame->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_reklame->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Reklame', site_url(fmodule('reklame/tu')));
		$this->breadcrumb->append_crumb('Register Reklame', site_url(fmodule('reklame/tu')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('reklame/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('reklame/reklame_edit',$d);
	}
	
	public function fo_proses($id=0,$jenis_izin=0,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(70,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_reklame->update_reklame_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'reklame_fo';
		$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
		$d['op_kota'] = $this->mod_reklame->op_kota();
		$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
		$d['op_desa'] = $this->mod_reklame->op_desa();
		$d['op_perusahaan'] = $this->mod_reklame->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
		$d['data'] = $this->mod_reklame->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_reklame->get_reklame($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = 8; //kode reklame
		$d['Kd_Jenis'] = $jenis_izin;
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Reklame', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('reklame/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('reklame/reklame_fo_proses',$d);
	}
	
	
	public function tt($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'reklame_cetak';
		$d['data'] = $this->mod_reklame->get_reklame($id);
		$d['Kd_Izin'] = 8; //kode reklame
		$d['Nm_Izin'] = 'Reklame'; //kode reklame
		
		$this->load->view('reklame/reklame_cetak_tt',$d);
	}
	
	public function sk($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin Reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'reklame_cetak';
		$d['data'] = $this->mod_reklame->get_reklame($id);
		$d['replace'] = $this->mod_reklame->for_replace($id);
		
		$this->load->view('reklame/reklame_cetak_sk',$d);
	}
	
	public function get_nomor($id=0,$param=0,$param2=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['no_sk'] = $this->mod_reklame->get_nomor_sk($id,$param,$param2); // Kode Param Manual
		$d['id_sk'] = $this->mod_reklame->get_id_sk($id);;
		$d['Kd_Izin'] = 8; //kode reklame
		$d['Nm_Izin'] = 'Reklame'; //kode reklame
		$this->load->view('reklame/reklame_get_nomor',$d);
	}
	
	public function get_agenda($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor Agenda';
		$d['site_title'] = site_title($title);
		$d['no_agenda'] = $this->mod_reklame->get_nomor_agenda($id,2); // Kode Param Manual
		$d['id_agenda'] = $this->mod_reklame->get_id_agenda($id);;
		$d['Kd_Izin'] = 8; //kode reklame
		$d['Nm_Izin'] = 'Reklame'; //kode reklame
		$this->load->view('reklame/reklame_get_agenda',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$d['ID_Izin'] = $ID_Izin = $this->input->post('ID_Izin');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 8; //kode reklame
			$d['Kd_Jenis'] = $ID_Izin;
			$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
			$d['op_kota'] = $this->mod_reklame->op_kota();
			$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
			$d['op_desa'] = $this->mod_reklame->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
			$d['data'] = $this->mod_reklame->get_data_perusahaan($idperusahaan);
			$d['data2'] = $this->mod_reklame->get_data_reklame($ID_Izin);
			$d['op_status_perusahaan'] = $this->mod_reklame->op_status_perusahaan();
			$d['op_kategori_reklame'] = $this->mod_reklame->op_kategori_reklame();
			$d['op_kegiatan_usaha'] = $this->mod_reklame->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_reklame->op_kelembagaan();
			$this->load->view('reklame/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 8; //kode reklame
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_reklame->op_provinsi();
			$d['op_kota'] = $this->mod_reklame->op_kota();
			$d['op_kecamatan'] = $this->mod_reklame->op_kecamatan();
			$d['op_desa'] = $this->mod_reklame->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_reklame->op_bentuk_perusahaan();
			$d['data'] = $this->mod_reklame->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_reklame->op_status_perusahaan();
			$d['op_kategori_reklame'] = $this->mod_reklame->op_kategori_reklame();
			$d['op_kegiatan_usaha'] = $this->mod_reklame->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_reklame->op_kelembagaan();
			$this->load->view('reklame/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(77,$DataAkses);
		
		$d['title'] = $title = 'Data Rekap Reklame';
		$d['q'] = 'reklame';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'reklame_laporan';
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(77,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN Reklame';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['data']	= $this->mod_reklame->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
}