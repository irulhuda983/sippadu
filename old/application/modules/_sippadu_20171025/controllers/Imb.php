<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imb extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_imb','mod_all'));
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
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Register IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'imb_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_fo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_fo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/fo'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_fo',$d);
	}
	
	public function fo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Register IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'imb_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_fo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_fo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/fo_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_fo',$d);
	}
	
	public function bo($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(81,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Register IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'imb_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_bo(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_bo(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/bo'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_bo',$d);
	}
	
	public function bo_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(81,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Register IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'imb_bo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_bo(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_bo(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/bo_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_bo',$d);
	}
	
	public function kabid($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(82,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('kabid',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'imb_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_kabid(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_kabid(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/kabid'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_kabid',$d);
	}
	
	public function kabid_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(82,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('kabid',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kabid Atas Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kabid';
		$d['menuactive'] = 'imb_kabid';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_kabid(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_kabid(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/kabid_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_kabid',$d);
	}
	
	public function kadin($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(83,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('kadin',1);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'imb_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_kadin(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_kadin(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/kadin'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_kadin',$d);
	}
	
	public function kadin_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(83,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('kadin',0);
		}
		
		$d['title'] = $title = 'Verifikasi Kadin Atas Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'kadin';
		$d['menuactive'] = 'imb_kadin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_kadin(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_kadin(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/kadin_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_kadin',$d);
	}
	
	public function tu($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(84,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
				
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('tu',1);
		}
		
		$d['title'] = $title = 'Verifikasi TU Atas Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'imb_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_tu(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_tu(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/tu'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_tu',$d);
	}
	
	public function tu_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(84,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('tu',0);
		}
		$d['title'] = $title = 'Verifikasi TU Atas Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'imb_tu';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_tu(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_tu(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/tu_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_tu',$d);
	}
	
	public function cetak($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(85,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Cetak Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'imb_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_cetak(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_cetak(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/cetak'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_cetak',$d);
	}
	
	public function cetak_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(85,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Cetak Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'imb_cetak';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_cetak(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_cetak(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/cetak_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_cetak',$d);
	}
	
	public function serah($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(86,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('serah',1);
		}
		
		$d['title'] = $title = 'Pengambilan Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'imb_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_serah(0,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_serah(0)->num_rows();
		$d['Kd_Verifikasi'] = 1;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/serah'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_serah',$d);
	}
	
	public function serah_all($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(86,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		if($this->input->post('verifikasi')){
			$this->mod_imb->verifikasi_tbl_imb('serah',0);
		}
		
		$d['title'] = $title = 'Pengambilan Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'serah';
		$d['menuactive'] = 'imb_serah';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_imb_serah(1,$limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_imb_serah(1)->num_rows();
		$d['Kd_Verifikasi'] = 0;
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/serah_all'));
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
		$this->breadcrumb->append_crumb('IMB', $url_parent);
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_serah',$d);
	}
	
	public function serah_win($idizin=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(86,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_imb->simpan_pengambil($idizin);
		}
		
		$d['title'] = $title = 'Pengambilan Izin IMB';
		$d['site_title'] = site_title($title);
		$d['ID_Izin'] = $idizin;
		$d['module_izin'] = 'imb';
		$d['data'] = $this->mod_imb->data_serah($idizin);
		
		$this->load->view('imb/imb_serah_win',$d);
	}
	
	public function serah_ajax()
	{
		$d['data'] = $this->mod_imb->data_serah_ajax();
		$this->load->view('imb/imb_serah_ajax',$d);
	}
	
	
	public function fo_data($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_imb->delete_tbl_imb();
		}
		
		$d['title'] = $title = 'Registrasi Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'imb_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_imb->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_imb->get_tbl_personal()->num_rows();
		
		$config['base_url'] = $url_parent = site_url(fmodule('imb/fo_data'));
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
		$this->breadcrumb->append_crumb('IMB', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb('Register IMB', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('imb/imb_fo_data',$d);
	}
	
	public function fo_daftar($jenis_izin=1,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_imb->insert_imb_fo();
		}
		
		$d['title'] = $title = 'Registrasi IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'imb_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 3; //kode imb
		$d['ID_Izin'] = 0;
		$d['op_provinsi'] = $this->mod_imb->op_provinsi();
		$d['op_kota'] = $this->mod_imb->op_kota();
		$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
		$d['op_desa'] = $this->mod_imb->op_desa();
		$d['op_perusahaan'] = $this->mod_imb->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
		$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
		$d['data'] = $this->mod_imb->get_personal($idpelanggan);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['op_jenis_izin'] = $this->mod_imb->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_imb->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_imb->op_status_perusahaan();
		$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
		$d['op_kegiatan_usaha'] = $this->mod_imb->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_imb->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_imb->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_imb->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_imb->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IMB', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb('Register IMB', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('imb/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_fo_daftar',$d);
	}
	
	public function fo_edit($idimb=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_imb->get_imb($idimb);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_imb->update_imb($idimb);
		}
		
		$d['title'] = $title = 'Edit Registrasi IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'imb_fo';
		$d['Kd_Access'] = 'fo';
		$d['Kd_Izin'] = 3; //kode imb
		$d['op_provinsi'] = $this->mod_imb->op_provinsi();
		$d['op_kota'] = $this->mod_imb->op_kota();
		$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
		$d['op_desa'] = $this->mod_imb->op_desa();
		$d['op_perusahaan'] = $this->mod_imb->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
		$d['data'] = $this->mod_imb->get_personal($idpelanggan);
		$d['data2'] = $this->mod_imb->get_data_imb($idimb);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idimb;
		$d['op_jenis_izin'] = $this->mod_imb->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_imb->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_imb->op_status_perusahaan();
		$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
		$d['op_kegiatan_usaha'] = $this->mod_imb->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_imb->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_imb->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_imb->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_imb->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IMB', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb('Register IMB', site_url(fmodule('imb/fo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('imb/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_edit',$d);
	}
	
	public function bo_edit($idimb=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_imb->get_imb($idimb);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(array(80,81),$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_imb->update_imb($idimb);
		}
		
		$d['title'] = $title = 'Edit Registrasi IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'bo';
		$d['menuactive'] = 'imb_bo';
		$d['Kd_Access'] = 'bo';
		$d['Kd_Izin'] = 3; //kode imb
		$d['op_provinsi'] = $this->mod_imb->op_provinsi();
		$d['op_kota'] = $this->mod_imb->op_kota();
		$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
		$d['op_desa'] = $this->mod_imb->op_desa();
		$d['op_perusahaan'] = $this->mod_imb->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
		$d['data'] = $this->mod_imb->get_personal($idpelanggan);
		$d['data2'] = $this->mod_imb->get_data_imb($idimb);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idimb;
		$d['op_jenis_izin'] = $this->mod_imb->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_imb->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_imb->op_status_perusahaan();
		$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
		$d['op_kegiatan_usaha'] = $this->mod_imb->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_imb->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_imb->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_imb->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_imb->op_bukti_terima();
		$d['op_peruntukan_imb'] = $this->mod_imb->op_peruntukan_imb();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IMB', site_url(fmodule('imb/bo')));
		$this->breadcrumb->append_crumb('Register IMB', site_url(fmodule('imb/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('imb/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_edit',$d);
	}
	
	
	
	public function tu_edit($idimb=0)
	{
		
		$jenis_izin = 1;
		$idpelanggan = 0;
		$idperusahaan = 0;
		$Kd_Pengurus = 0;
		$data = $this->mod_imb->get_imb($idimb);
		if($data->num_rows() > 0){
			$aa = $data->row();
			$jenis_izin = substr($aa->Jenis_Izin,-1);
			$idpelanggan = $aa->ID_Pelanggan;
			$idperusahaan = $aa->ID_Usaha;
			$Kd_Pengurus = substr($aa->Kd_Pengurus,-1);
		}
		
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_imb->update_imb($idimb);
		}
		
		$d['title'] = $title = 'Edit Registrasi IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tu';
		$d['menuactive'] = 'imb_tu';
		$d['Kd_Access'] = 'tu';
		$d['Kd_Izin'] = 3; //kode imb
		$d['op_provinsi'] = $this->mod_imb->op_provinsi();
		$d['op_kota'] = $this->mod_imb->op_kota();
		$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
		$d['op_desa'] = $this->mod_imb->op_desa();
		$d['op_perusahaan'] = $this->mod_imb->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
		$d['data'] = $this->mod_imb->get_personal($idpelanggan);
		$d['data2'] = $this->mod_imb->get_data_imb($idimb);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Jenis'] = $jenis_izin;
		$d['Kd_Pengurus'] = $Kd_Pengurus;
		$d['ID_Izin'] = $idimb;
		$d['op_jenis_izin'] = $this->mod_imb->op_jenis_izin();
		$d['op_pengurus_permohonan'] = $this->mod_imb->op_pengurus_permohonan();
		$d['op_status_perusahaan'] = $this->mod_imb->op_status_perusahaan();
		$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
		$d['op_kegiatan_usaha'] = $this->mod_imb->op_kegiatan_usaha();
		$d['op_kelembagaan'] = $this->mod_imb->op_kelembagaan();
		$d['op_verifikasi'] = $this->mod_imb->op_verifikasi();
		$d['op_serah_terima'] = $this->mod_imb->op_serah_terima();
		$d['op_bukti_terima'] = $this->mod_imb->op_bukti_terima();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IMB', site_url(fmodule('imb/tu')));
		$this->breadcrumb->append_crumb('Register IMB', site_url(fmodule('imb/bo')));
		//$this->breadcrumb->append_crumb('Registrasi Izin', site_url(fmodule('imb/fo_data')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('imb/imb_edit',$d);
	}
	
	public function fo_proses($id=0,$jenis_izin=0,$idpelanggan=0,$idperusahaan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(80,$DataAkses);
		
		if($this->input->post('submit')){
			$idperusahaan = $this->input->post('op_perusahaan');
			$this->mod_imb->update_imb_fo($idperusahaan);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'imb_fo';
		$d['op_provinsi'] = $this->mod_imb->op_provinsi();
		$d['op_kota'] = $this->mod_imb->op_kota();
		$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
		$d['op_desa'] = $this->mod_imb->op_desa();
		$d['op_perusahaan'] = $this->mod_imb->op_perusahaan($idpelanggan);
		$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
		$d['data'] = $this->mod_imb->get_personal($idpelanggan);
		$d['data_p'] = $this->mod_imb->get_imb($id);
		$d['Kd_Pelanggan'] = $idpelanggan;
		$d['Kd_Perusahaan'] = $idperusahaan;
		$d['Kd_Izin'] = 3; //kode imb
		$d['Kd_Jenis'] = $jenis_izin;
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('IMB', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('imb/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('imb/imb_fo_proses',$d);
	}
	
	
	public function tt($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Tanda Terima Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'imb_cetak';
		$d['data'] = $this->mod_imb->get_imb($id);
		$d['Kd_Izin'] = 3; //kode imb
		$d['Nm_Izin'] = 'IMB'; //kode imb
		
		$this->load->view('imb/imb_cetak_tt',$d);
	}
	
	public function sk($id=0)
	{
		$d = $this->mod_all->load();
		//$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		//$d['PageAkses'] = PageAkses(55,$DataAkses);
		
		$d['title'] = $title = 'Preview Cetak Izin IMB';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'cetak';
		$d['menuactive'] = 'imb_cetak';
		$d['data'] = $data = $this->mod_imb->get_imb($id);
		$d['replace'] = $this->mod_imb->for_replace($id);
		
		$aa = $data->row();
		$jenis = $aa->Jenis_Bangunan;
		switch($jenis){
			case 1 :
				$this->load->view('imb/imb_cetak_sk',$d);
				break;
			case 2 :
				$this->load->view('imb/imb_cetak_sk_reklame',$d);
				break;
			default:
				$this->load->view('imb/imb_cetak_sk',$d);
				break;
		}
	}
	
	public function get_nomor($id=0,$param=0,$param2=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor SK';
		$d['site_title'] = site_title($title);
		$d['no_sk'] = $this->mod_imb->get_nomor_sk($id,$param,$param2); // Kode Param Manual
		$d['id_sk'] = $this->mod_imb->get_id_sk($id);;
		$d['Kd_Izin'] = 3; //kode imb
		$d['Nm_Izin'] = 'IMB'; //kode imb
		$this->load->view('imb/imb_get_nomor',$d);
	}
	
	public function get_agenda($id=0,$param=0)
	{
		$d = $this->mod_all->load();
		$d['title'] = $title = 'Get Nomor Agenda';
		$d['site_title'] = site_title($title);
		$d['no_agenda'] = $this->mod_imb->get_nomor_agenda($id,2); // Kode Param Manual
		$d['id_agenda'] = $this->mod_imb->get_id_agenda($id);;
		$d['Kd_Izin'] = 3; //kode imb
		$d['Nm_Izin'] = 'IMB'; //kode imb
		$this->load->view('imb/imb_get_agenda',$d);
	}
	
	public function op_perusahaan(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$d['ID_Izin'] = $ID_Izin = $this->input->post('ID_Izin');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 3; //kode imb
			$d['Kd_Jenis'] = $ID_Izin;
			$d['op_provinsi'] = $this->mod_imb->op_provinsi();
			$d['op_kota'] = $this->mod_imb->op_kota();
			$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
			$d['op_desa'] = $this->mod_imb->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
			$d['data'] = $this->mod_imb->get_data_perusahaan($idperusahaan);
			$d['data2'] = $this->mod_imb->get_data_imb($ID_Izin);
			$d['op_status_perusahaan'] = $this->mod_imb->op_status_perusahaan();
			$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
			$d['op_kegiatan_usaha'] = $this->mod_imb->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_imb->op_kelembagaan();
			$this->load->view('imb/op_perusahaan',$d);
		//}
	}
	
	public function op_perusahaan2(){
		//if('IS_AJAX') {
			$idperusahaan = $this->input->post('op_perusahaan');
			$jenis_izin = $this->input->post('op_perusahaan');
			$d['Kd_Access'] = $this->input->post('Kd_Access');
			$d['Kd_Perusahaan'] = $idperusahaan;
			$d['Kd_Izin'] = 3; //kode imb
			$d['Kd_Jenis'] = $jenis_izin;
			$d['op_provinsi'] = $this->mod_imb->op_provinsi();
			$d['op_kota'] = $this->mod_imb->op_kota();
			$d['op_kecamatan'] = $this->mod_imb->op_kecamatan();
			$d['op_desa'] = $this->mod_imb->op_desa();
			$d['op_bentuk_perusahaan'] = $this->mod_imb->op_bentuk_perusahaan();
			$d['data'] = $this->mod_imb->get_data_perusahaan($idperusahaan);
			$d['op_status_perusahaan'] = $this->mod_imb->op_status_perusahaan();
			$d['op_kategori_imb'] = $this->mod_imb->op_kategori_imb();
			$d['op_kegiatan_usaha'] = $this->mod_imb->op_kegiatan_usaha();
			$d['op_kelembagaan'] = $this->mod_imb->op_kelembagaan();
			$this->load->view('imb/op_perusahaan2',$d);
		//}
	}
	
	public function laporan()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(87,$DataAkses);
		
		$d['title'] = $title = 'Data Rekap IMB';
		$d['q'] = 'imb';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'laporan';
		$d['menuactive'] = 'imb_laporan';
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/opsi',$d);
	}
	
	public function report($start='',$end='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(87,$DataAkses);
		
		$d['title'] = $title = 'DATA REKAP PENGAJUAN IZIN IMB';
		$d['site_title'] = site_title($title);
		//$d['menuopen'] = 'laporan';
		//$d['menuactive'] = 'rekap_laporan';
		$d['data']	= $this->mod_imb->tbl_print($start,$end);
		$d['tgl_start'] = $start;
		$d['tgl_end'] = $end;
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('laporan/print',$d);
	}
	
}