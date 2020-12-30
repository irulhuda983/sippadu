<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iujk extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_iujk','mod_all'));
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
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Register IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'iujk_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_fo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/fo'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_fo',$d);
	}
	
	public function fo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Register IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'iujk_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_fo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/fo_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_fo',$d);
	}
	
	public function bo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(101,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Register IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'iujk_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_bo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/bo'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_bo',$d);
	}
	
	public function bo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(101,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Register IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'iujk_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_bo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/bo_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_bo',$d);
	}
	
	public function kabid($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(102,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('kabid',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'iujk_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_kabid(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/kabid'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_kabid',$d);
	}
	
	public function kabid_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(102,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('kabid',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'iujk_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_kabid(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/kabid_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_kabid',$d);
	}
	
	public function kadin($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(103,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('kadin',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'iujk_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_kadin(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/kadin'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_kadin',$d);
	}
	
	public function kadin_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(103,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('kadin',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'iujk_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_kadin(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/kadin_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_kadin',$d);
	}
	
	public function tu($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(104,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('tu',1);
		}
		
		$d['title'] = $title = 'Verifikasi TU Atas Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'iujk_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_tu(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/tu'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_tu',$d);
	}
	
	public function tu_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(104,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('tu',0);
		}
		$d['title'] = $title = 'Verifikasi TU Atas Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'iujk_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_tu(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/tu_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_tu',$d);
	}
	
	public function cetak($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(105,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Cetak Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'iujk_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_cetak(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/cetak'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_cetak',$d);
	}
	
	public function cetak_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(105,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Cetak Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'iujk_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_cetak(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/cetak_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_cetak',$d);
	}
	
	public function serah($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(106,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('serah',1);
		}
		
		$d['title'] = $title = 'Pengambilan Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'iujk_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_serah(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/serah'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_serah',$d);
	}
	
	public function serah_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(106,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_iujk->verifikasi_tbl_iujk('serah',0);
		}
		
		$d['title'] = $title = 'Pengambilan Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'iujk_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_iujk_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_iujk_serah(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/serah_all'));
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
		$this->breadcrumb->append_crumb('IUJK', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_serah',$d);
	}
	
	public function serah_win($idizin=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(106,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_iujk->simpan_pengambil($idizin);
		}
		
		$d['title'] = $title = 'Pengambilan Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['ID_Izin'] = $idizin;
		$d['module_izin'] = 'iujk';
		$d['data'] = $this->mod_iujk->data_serah($idizin);
		
		$this->load->view('iujk/iujk_serah_win',$d);
	}
	
	public function serah_ajax()
	{
		$d['data'] = $this->mod_iujk->data_serah_ajax();
		$this->load->view('iujk/iujk_serah_ajax',$d);
	}
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_iujk->delete_tbl_iujk();
		}
		
		$d['title'] = $title = 'Registrasi Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'iujk_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_iujk->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_iujk->get_tbl_personal()->num_rows();
		
		$config['base_url'] = $url_parent = site_url(fmodule('iujk/fo_data'));
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
		$this->breadcrumb->append_crumb('IUJK', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb('Register IUJK', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('iujk/iujk_fo_data',$d);
	}
	
	public function fo_daftar($jenis_izin=1,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_iujk->insert_iujk_fo();
		}
		
		$d['title'] = $title = 'Registrasi IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'iujk_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 5; //kode iujk
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
		$d['op_kota'] = $this->mod_iujk->op_kota();
		$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
		$d['op_desa'] = $this->mod_iujk->op_desa();
		$d['op_perusahaan'] = $this->mod_iujk->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
		$d['data'] = $this->mod_iujk->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_iujk->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_iujk->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_iujk->op_status_perusahaan();
		$d['op_kategori_iujk'] = $this->mod_iujk->op_kategori_iujk();
		$d['op_kegiatan_usaha'] = $this->mod_iujk->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_iujk->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_iujk->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_iujk->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_iujk->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IUJK', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb('Register IUJK', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('iujk/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_fo_daftar',$d);
	}
	
	public function fo_edit($idiujk=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_iujk->get_iujk($idiujk);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_iujk->update_iujk($idiujk);
		}
		
		$d['title'] = $title = 'Edit Registrasi IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'iujk_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 5; //kode iujk
		$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
		$d['op_kota'] = $this->mod_iujk->op_kota();
		$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
		$d['op_desa'] = $this->mod_iujk->op_desa();
		$d['op_perusahaan'] = $this->mod_iujk->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
		$d['data'] = $this->mod_iujk->get_personal($idpelanggan);
		$d['data2'] = $this->mod_iujk->get_data_iujk($idiujk);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idiujk;
		$d['op_jenis_izin'] = $this->mod_iujk->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_iujk->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_iujk->op_status_perusahaan();
		$d['op_kategori_iujk'] = $this->mod_iujk->op_kategori_iujk();
		$d['op_kegiatan_usaha'] = $this->mod_iujk->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_iujk->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_iujk->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_iujk->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_iujk->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IUJK', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb('Register IUJK', site_url(fmodule('iujk/fo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('iujk/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_edit',$d);
	}
	
	public function bo_edit($idiujk=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_iujk->get_iujk($idiujk);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(100,101),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_iujk->update_iujk($idiujk);
		}
		
		$d['title'] = $title = 'Edit Registrasi IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'iujk_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = 5; //kode iujk
		$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
		$d['op_kota'] = $this->mod_iujk->op_kota();
		$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
		$d['op_desa'] = $this->mod_iujk->op_desa();
		$d['op_perusahaan'] = $this->mod_iujk->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
		$d['data'] = $this->mod_iujk->get_personal($idpelanggan);
		$d['data2'] = $this->mod_iujk->get_data_iujk($idiujk);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idiujk;
		$d['op_jenis_izin'] = $this->mod_iujk->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_iujk->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_iujk->op_status_perusahaan();
		$d['op_kategori_iujk'] = $this->mod_iujk->op_kategori_iujk();
		$d['op_kegiatan_usaha'] = $this->mod_iujk->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_iujk->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_iujk->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_iujk->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_iujk->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IUJK', site_url(fmodule('iujk/bo')));
		$this->breadcrumb->append_crumb('Register IUJK', site_url(fmodule('iujk/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('iujk/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_edit',$d);
	}
	
	
	
	public function tu_edit($idiujk=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_iujk->get_iujk($idiujk);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_iujk->update_iujk($idiujk);
		}
		
		$d['title'] = $title = 'Edit Registrasi IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'iujk_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = 5; //kode iujk
		$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
		$d['op_kota'] = $this->mod_iujk->op_kota();
		$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
		$d['op_desa'] = $this->mod_iujk->op_desa();
		$d['op_perusahaan'] = $this->mod_iujk->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
		$d['data'] = $this->mod_iujk->get_personal($idpelanggan);
		$d['data2'] = $this->mod_iujk->get_data_iujk($idiujk);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idiujk;
		$d['op_jenis_izin'] = $this->mod_iujk->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_iujk->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_iujk->op_status_perusahaan();
		$d['op_kategori_iujk'] = $this->mod_iujk->op_kategori_iujk();
		$d['op_kegiatan_usaha'] = $this->mod_iujk->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_iujk->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_iujk->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_iujk->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_iujk->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IUJK', site_url(fmodule('iujk/tu')));
		$this->breadcrumb->append_crumb('Register IUJK', site_url(fmodule('iujk/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('iujk/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('iujk/iujk_edit',$d);
	}
	
	public function fo_proses($id=0,$jenis_izin=0,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(100,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_iujk->update_iujk_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'iujk_fo';
		$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
		$d['op_kota'] = $this->mod_iujk->op_kota();
		$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
		$d['op_desa'] = $this->mod_iujk->op_desa();
		$d['op_perusahaan'] = $this->mod_iujk->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
		$d['data'] = $this->mod_iujk->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_iujk->get_iujk($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = 5; //kode iujk
		$d['Kd_Jenis'] = $jenis_izin;
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IUJK', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('iujk/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('iujk/iujk_fo_proses',$d);
	}
	
	
	public function tt($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'iujk_cetak';
		$d['data'] = $this->mod_iujk->get_iujk($id);
		$d['Kd_Izin'] = 5; //kode iujk
		$d['Nm_Izin'] = 'IUJK'; //kode iujk
		
		$this->load->view('iujk/iujk_cetak_tt',$d);
	}
	
	public function sk($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin IUJK';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'iujk_cetak';
		$d['data'] = $this->mod_iujk->get_iujk($id);
		$d['replace'] = $this->mod_iujk->for_replace($id);
		
		$this->load->view('iujk/iujk_cetak_sk',$d);
	}
	
	public function get_nomor($id=0,$param=0,$param2=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['no_sk'] = $this->mod_iujk->get_nomor_sk($id,$param,$param2); // Kode Param Manual
		$d['id_sk'] = $this->mod_iujk->get_id_sk($id);;
		$d['Kd_Izin'] = 5; //kode iujk
		$d['Nm_Izin'] = 'IUJK'; //kode iujk
		$this->load->view('iujk/iujk_get_nomor',$d);
	}
	
	public function get_agenda($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor Agenda';
		$d['site_title'] = site_title($title);
		$d['no_agenda'] = $this->mod_iujk->get_nomor_agenda($id,2); // Kode Param Manual
		$d['id_agenda'] = $this->mod_iujk->get_id_agenda($id);;
		$d['Kd_Izin'] = 5; //kode iujk
		$d['Nm_Izin'] = 'IUJK'; //kode iujk
		$this->load->view('iujk/iujk_get_agenda',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$d['ID_Izin'] = $ID_Izin = $this->input->post('ID_Izin');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 5; //kode iujk
			$d['Kd_Jenis'] = $ID_Izin;
			$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
			$d['op_kota'] = $this->mod_iujk->op_kota();
			$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
			$d['op_desa'] = $this->mod_iujk->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
			$d['data'] = $this->mod_iujk->get_data_perusahaan($idperusahaan);
			$d['data2'] = $this->mod_iujk->get_data_iujk($ID_Izin);
			$d['op_status_perusahaan'] = $this->mod_iujk->op_status_perusahaan();
			$d['op_kategori_iujk'] = $this->mod_iujk->op_kategori_iujk();
			$d['op_kegiatan_usaha'] = $this->mod_iujk->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_iujk->op_kelembagaan();
			$this->load->view('iujk/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 5; //kode iujk
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_iujk->op_provinsi();
			$d['op_kota'] = $this->mod_iujk->op_kota();
			$d['op_kecamatan'] = $this->mod_iujk->op_kecamatan();
			$d['op_desa'] = $this->mod_iujk->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_iujk->op_bentuk_perusahaan();
			$d['data'] = $this->mod_iujk->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_iujk->op_status_perusahaan();
			$d['op_kategori_iujk'] = $this->mod_iujk->op_kategori_iujk();
			$d['op_kegiatan_usaha'] = $this->mod_iujk->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_iujk->op_kelembagaan();
			$this->load->view('iujk/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(107,$DataAkses);
		
		$d['title'] = $title = 'Data Rekap IUJK';
		$d['q'] = 'iujk';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'iujk_laporan';
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(107,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN IUJK';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['data']	= $this->mod_iujk->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
}