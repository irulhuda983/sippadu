<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_personal','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		//$config['tag_open'] = '<div class="page-bar"><ul class="page-breadcrumb">';
		//$config['tag_close'] = '</ul></div>';
		//$config['li_open'] = '<li>';
		//$config['li_close'] = '</li>';
		//$config['divider'] = '';
		//$this->breadcrumb->initialize($config);
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
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_personal->delete_fo_tbl();
		}
		
		$d['title'] = $title = 'Data Personal';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_personal->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_personal->get_tbl_personal()->num_rows();
		
		$config['base_url'] = site_url(fmodule('personal/fo'));
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
		$this->load->view('personal/personal_fo',$d);
	}
	
	
	public function fo_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_personal->insert_personal_fo();
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('personal/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_fo_add',$d);
	}
	
	public function fo_add_win($urlfrom='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('savenext')){
			$this->mod_personal->insert_personal_fo(TRUE,TRUE);
		}
		
		if($this->input->post('saveclose')){
			$this->mod_personal->insert_personal_fo(TRUE,FALSE);
		}
		
		$d['title'] = $title = 'Tambah Data Pemohon';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		$d['url']	= decrypt($urlfrom);
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('personal/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_fo_add_win',$d);
	}
	
	public function fo_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_personal->update_personal_fo($id);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		$d['data'] = $this->mod_personal->get_personal($id);
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('personal/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_fo_edit',$d);
	}
	
	public function fo_edit_win($id=0,$urlfrom='')
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_personal->update_personal_fo($id,TRUE,FALSE);
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		$d['data'] = $this->mod_personal->get_personal($id);
		$d['url']	= decrypt($urlfrom);
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('personal/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_fo_edit_win',$d);
	}
	
}