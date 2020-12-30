<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {

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
		$d['menuopen'] = 'personal';
		$d['menuactive'] = 'personal_fo';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_personal->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_personal->get_tbl_personal()->num_rows();
		
		$config['base_url'] = site_url(fmodule('personal/fo'));
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
		$d['menuopen'] = 'personal';
		$d['menuactive'] = 'personal_fo_add';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
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
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
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
		
		$d['title'] = $title = 'Edit Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		$d['data'] = $this->mod_personal->get_personal($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
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
		
		$d['title'] = $title = 'Edit Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'fo';
		$d['menuactive'] = 'personal_fo';
		$d['op_provinsi'] = $this->mod_personal->op_provinsi();
		$d['op_kota'] = $this->mod_personal->op_kota();
		$d['op_kecamatan'] = $this->mod_personal->op_kecamatan();
		$d['op_desa'] = $this->mod_personal->op_desa();
		$d['data'] = $this->mod_personal->get_personal($id);
		$d['url']	= decrypt($urlfrom);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Personal', site_url(fmodule('personal/fo')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_fo_edit_win',$d);
	}
	
	public function cek_data_personal(){
		$d['kitas'] = $kitas = $this->input->post('kitas');
		$d['idpelanggan'] = $idpelanggan = $this->mod_personal->cek_id_personal($kitas);
		$d['nmpelanggan'] = $nmpelanggan = $this->mod_personal->cek_nama_personal($kitas);
		$d['data'] = $this->mod_personal->cek_data_personal($kitas);
		
		$this->load->view('personal/personal_cek_data',$d);
	}
	
	public function klaim($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_personal->delete_klaim();
		}
		
		$d['title'] = $title = 'Klaim Data Personal';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'personal';
		$d['menuactive'] = 'personal_klaim';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_personal->get_tbl_klaim($limit,$offset);
		$d['tot'] = $tot = $this->mod_personal->get_tbl_klaim()->num_rows();
		
		$config['base_url'] = site_url(fmodule('personal/fo'));
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
		$this->load->view('personal/personal_klaim',$d);
	}
	
	public function klaim_detail($id=0){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(40,$DataAkses);
		
		if($this->input->post('submit')){
			
			$this->mod_personal->accept_klaim($id);
		}
		
		$d['title'] = $title = 'Detail Klaim Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'klaim';
		$d['menuactive'] = 'klaim';
		$d['data'] = $this->mod_personal->get_data_klaim($id);
		$d['data2'] = $this->mod_personal->get_data_klaim2($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb(lang('Klaim Data'), site_url(fmodule('personal/klaim')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_klaim_detail',$d);
	}
	
}