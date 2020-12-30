<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siup extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_siup','mod_all'));
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
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Register SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'siup_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_fo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/fo'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_fo',$d);
	}
	
	public function fo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Register SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'siup_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_fo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/fo_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_fo',$d);
	}
	
	public function bo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(51,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Register SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'siup_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_bo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/bo'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_bo',$d);
	}
	
	public function bo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(51,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Register SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'siup_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_bo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/bo_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_bo',$d);
	}
	
	public function kabid($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(52,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('kabid',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'siup_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_kabid(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/kabid'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_kabid',$d);
	}
	
	public function kabid_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(52,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('kabid',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'siup_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_kabid(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/kabid_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_kabid',$d);
	}
	
	public function kadin($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(53,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('kadin',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'siup_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_kadin(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/kadin'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_kadin',$d);
	}
	
	public function kadin_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(53,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('kadin',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'siup_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_kadin(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/kadin_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_kadin',$d);
	}
	
	public function tu($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(54,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('tu',1);
		}
		
		$d['title'] = $title = 'Verifikasi TU Atas Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'siup_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_tu(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/tu'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_tu',$d);
	}
	
	public function tu_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(54,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('tu',0);
		}
		$d['title'] = $title = 'Verifikasi TU Atas Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'siup_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_tu(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/tu_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_tu',$d);
	}
	
	public function cetak($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Cetak Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'siup_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_cetak(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/cetak'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_cetak',$d);
	}
	
	public function cetak_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Cetak Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'siup_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_cetak(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/cetak_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_cetak',$d);
	}
	
	public function serah($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(56,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('serah',1);
		}
		
		$d['title'] = $title = 'Pengambilan Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'siup_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_serah(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/serah'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_serah',$d);
	}
	
	public function serah_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(56,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_siup->verifikasi_tbl_siup('serah',0);
		}
		
		$d['title'] = $title = 'Pengambilan Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'siup_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_siup_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_siup_serah(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/serah_all'));
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
		$this->breadcrumb->append_crumb('SIUP', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_serah',$d);
	}
	
	public function serah_win($idizin=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(56,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_siup->simpan_pengambil($idizin);
		}
		
		$d['title'] = $title = 'Pengambilan Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['ID_Izin'] = $idizin;
		$d['module_izin'] = 'siup';
		$d['data'] = $this->mod_siup->data_serah($idizin);
		
		$this->load->view('siup/siup_serah_win',$d);
	}
	
	public function serah_ajax()
	{
		$d['data'] = $this->mod_siup->data_serah_ajax();
		
		$this->load->view('siup/siup_serah_ajax',$d);
	}
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_siup->delete_tbl_siup();
		}
		
		$d['title'] = $title = 'Registrasi Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'siup_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_siup->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_siup->get_tbl_personal()->num_rows();
		
		$config['base_url'] = $url_parent = site_url(fmodule('siup/fo_data'));
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
		$this->breadcrumb->append_crumb('SIUP', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb('Register SIUP', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('siup/siup_fo_data',$d);
	}
	
	public function fo_daftar($jenis_izin=1,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_siup->insert_siup_fo();
		}
		
		$d['title'] = $title = 'Registrasi SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'siup_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 1; //kode siup
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_siup->op_provinsi();
		$d['op_kota'] = $this->mod_siup->op_kota();
		$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
		$d['op_desa'] = $this->mod_siup->op_desa();
		$d['op_perusahaan'] = $this->mod_siup->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
		$d['data'] = $this->mod_siup->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_siup->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_siup->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_siup->op_status_perusahaan();
		$d['op_kategori_siup'] = $this->mod_siup->op_kategori_siup();
		$d['op_kegiatan_usaha'] = $this->mod_siup->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_siup->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_siup->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_siup->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_siup->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('SIUP', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb('Register SIUP', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('siup/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_fo_daftar',$d);
	}
	
	public function fo_edit($idsiup=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_siup->get_data_siup($idsiup);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->JENIS_IZIN,-1);
			$idpelanggan = $aa->IDPELANGGAN;
			$idperusahaan = $aa->IDPERUSAHAAN;
			$Kd_Pengurus = substr($aa->STATUS_PENGURUS,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_siup->update_siup($idsiup);
		}
		
		$d['title'] = $title = 'Edit Registrasi SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'siup_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 1; //kode siup
		$d['op_provinsi'] = $this->mod_siup->op_provinsi();
		$d['op_kota'] = $this->mod_siup->op_kota();
		$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
		$d['op_desa'] = $this->mod_siup->op_desa();
		$d['op_perusahaan'] = $this->mod_siup->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
		$d['data'] = $this->mod_siup->get_personal($idpelanggan);
		$d['data2'] = $this->mod_siup->get_data_siup($idsiup);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idsiup;
		$d['op_jenis_izin'] = $this->mod_siup->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_siup->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_siup->op_status_perusahaan();
		$d['op_kategori_siup'] = $this->mod_siup->op_kategori_siup();
		$d['op_kegiatan_usaha'] = $this->mod_siup->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_siup->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_siup->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_siup->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_siup->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('SIUP', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb('Register SIUP', site_url(fmodule('siup/fo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('siup/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_edit',$d);
	}
	
	public function bo_edit($idsiup=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_siup->get_data_siup($idsiup);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->JENIS_IZIN,-1);
			$idpelanggan = $aa->IDPELANGGAN;
			$idperusahaan = $aa->IDPERUSAHAAN;
			$Kd_Pengurus = substr($aa->STATUS_PENGURUS,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(50,51),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_siup->update_siup($idsiup);
		}
		
		$d['title'] = $title = 'Edit Registrasi SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'siup_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = 1; //kode siup
		$d['op_provinsi'] = $this->mod_siup->op_provinsi();
		$d['op_kota'] = $this->mod_siup->op_kota();
		$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
		$d['op_desa'] = $this->mod_siup->op_desa();
		$d['op_perusahaan'] = $this->mod_siup->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
		$d['data'] = $this->mod_siup->get_personal($idpelanggan);
		$d['data2'] = $this->mod_siup->get_data_siup($idsiup);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idsiup;
		$d['op_jenis_izin'] = $this->mod_siup->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_siup->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_siup->op_status_perusahaan();
		$d['op_kategori_siup'] = $this->mod_siup->op_kategori_siup();
		$d['op_kegiatan_usaha'] = $this->mod_siup->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_siup->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_siup->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_siup->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_siup->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('SIUP', site_url(fmodule('siup/bo')));
		$this->breadcrumb->append_crumb('Register SIUP', site_url(fmodule('siup/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('siup/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_edit',$d);
	}
	
	public function tu_edit($idsiup=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_siup->get_data_siup($idsiup);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->JENIS_IZIN,-1);
			$idpelanggan = $aa->IDPELANGGAN;
			$idperusahaan = $aa->IDPERUSAHAAN;
			$Kd_Pengurus = substr($aa->STATUS_PENGURUS,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_siup->update_siup($idsiup);
		}
		
		$d['title'] = $title = 'Edit Registrasi SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'siup_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = 1; //kode siup
		$d['op_provinsi'] = $this->mod_siup->op_provinsi();
		$d['op_kota'] = $this->mod_siup->op_kota();
		$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
		$d['op_desa'] = $this->mod_siup->op_desa();
		$d['op_perusahaan'] = $this->mod_siup->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
		$d['data'] = $this->mod_siup->get_personal($idpelanggan);
		$d['data2'] = $this->mod_siup->get_data_siup($idsiup);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idsiup;
		$d['op_jenis_izin'] = $this->mod_siup->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_siup->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_siup->op_status_perusahaan();
		$d['op_kategori_siup'] = $this->mod_siup->op_kategori_siup();
		$d['op_kegiatan_usaha'] = $this->mod_siup->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_siup->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_siup->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_siup->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_siup->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('SIUP', site_url(fmodule('siup/tu')));
		$this->breadcrumb->append_crumb('Register SIUP', site_url(fmodule('siup/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('siup/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('siup/siup_edit',$d);
	}
	
	public function fo_proses($id=0,$jenis_izin=0,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(50,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_siup->update_siup_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'siup_fo';
		$d['op_provinsi'] = $this->mod_siup->op_provinsi();
		$d['op_kota'] = $this->mod_siup->op_kota();
		$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
		$d['op_desa'] = $this->mod_siup->op_desa();
		$d['op_perusahaan'] = $this->mod_siup->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
		$d['data'] = $this->mod_siup->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_siup->get_siup($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = 1; //kode siup
		$d['Kd_Jenis'] = $jenis_izin;
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('SIUP', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('siup/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('siup/siup_fo_proses',$d);
	}
	
	
	public function tt($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'siup_cetak';
		$d['data'] = $this->mod_siup->get_siup($id);
		$d['Kd_Izin'] = 1; //kode siup
		$d['Nm_Izin'] = 'SIUP'; //kode siup
		
		$this->load->view('siup/siup_cetak_tt',$d);
	}
	
	public function sk($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin SIUP';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'siup_cetak';
		$d['data'] = $this->mod_siup->get_siup($id);
		
		$this->load->view('siup/siup_cetak_sk',$d);
	}
	
	public function get_nomor($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['no_sk'] = $this->mod_siup->get_nomor_sk($id,$param);
		$d['id_sk'] = $this->mod_siup->get_id_sk($id);;
		$d['Kd_Izin'] = 1; //kode siup
		$d['Nm_Izin'] = 'SIUP'; //kode siup
		$this->load->view('siup/siup_get_nomor',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 1; //kode siup
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_siup->op_provinsi();
			$d['op_kota'] = $this->mod_siup->op_kota();
			$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
			$d['op_desa'] = $this->mod_siup->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
			$d['data'] = $this->mod_siup->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_siup->op_status_perusahaan();
			$d['op_kategori_siup'] = $this->mod_siup->op_kategori_siup();
			$d['op_kegiatan_usaha'] = $this->mod_siup->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_siup->op_kelembagaan();
			$this->load->view('siup/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 1; //kode siup
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_siup->op_provinsi();
			$d['op_kota'] = $this->mod_siup->op_kota();
			$d['op_kecamatan'] = $this->mod_siup->op_kecamatan();
			$d['op_desa'] = $this->mod_siup->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_siup->op_bentuk_perusahaan();
			$d['data'] = $this->mod_siup->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_siup->op_status_perusahaan();
			$d['op_kategori_siup'] = $this->mod_siup->op_kategori_siup();
			$d['op_kegiatan_usaha'] = $this->mod_siup->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_siup->op_kelembagaan();
			$this->load->view('siup/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(57,$DataAkses);
		
		$d['title'] = $title = 'Data Rekap SIUP';
		$d['q'] = 'siup';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'siup_laporan';
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(57,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN SIUP';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['data']	= $this->mod_siup->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
	
}