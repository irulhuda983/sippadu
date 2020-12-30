<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_master','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$this->provinsi(0);
	}
	
	public function provinsi($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_master->delete_provinsi();
		}
		
		if($this->input->post('enable')){
			$this->mod_master->enable_provinsi();
		}
		
		if($this->input->post('disable')){
			$this->mod_master->disable_provinsi();
		}
		
		$d['title'] = $title = 'Provinsi';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$d['limit'] = $limit = 1000;
		$d['offset'] = $offset = 0;
		$d['data'] = $this->mod_master->tbl_provinsi($limit,$offset);
		$d['tot'] = $tot = $this->mod_master->tbl_provinsi()->num_rows();
		
		$config['base_url'] = site_url(fmodule('master/provinsi'));
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
		$this->load->view('master/master_provinsi',$d);
	}
	
	
	public function provinsi_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->insert_provinsi();
		}
		
		$d['title'] = $title = 'Tambah Provinsi';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_provinsi_add',$d);
	}
	
	public function provinsi_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->update_provinsi($id);
		}
		
		$d['title'] = $title = 'Edit Provinsi';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		$d['data'] = $this->mod_master->data_provinsi($id);
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_provinsi_edit',$d);
	}
	
	public function kota($provinsi=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_master->delete_kota();
		}
		
		if($this->input->post('enable')){
			$this->mod_master->enable_kota();
		}
		
		if($this->input->post('disable')){
			$this->mod_master->disable_kota();
		}
		
		$d['title'] = $title = 'Kota';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$d['limit'] = $limit = 1000;
		$d['offset'] = $offset = 0;
		$d['data'] = $this->mod_master->tbl_kota($provinsi,$limit,$offset);
		$d['tot'] = $tot = $this->mod_master->tbl_kota($provinsi)->num_rows();
		$d['provinsi'] = $provinsi;
		
		$config['base_url'] = site_url(fmodule('master/kota'));
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
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('master/master_kota',$d);
	}
	
	
	public function kota_add($provinsi=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->insert_kota($provinsi);
		}
		
		$d['title'] = $title = 'Tambah Kota';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_kota_add',$d);
	}
	
	public function kota_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->update_kota($id);
		}
		
		$d['title'] = $title = 'Edit Kota';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		$d['data'] = $this->mod_master->data_kota($id);
		
		$provinsi = $this->mod_master->parent_kota($id);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_kota_edit',$d);
	}
	
	
	public function kecamatan($kota=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_master->delete_kecamatan();
		}
		
		if($this->input->post('enable')){
			$this->mod_master->enable_kecamatan();
		}
		
		if($this->input->post('disable')){
			$this->mod_master->disable_kecamatan();
		}
		
		$d['title'] = $title = 'Kecamatan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$d['limit'] = $limit = 1000;
		$d['offset'] = $offset = 0;
		$d['data'] = $this->mod_master->tbl_kecamatan($kota,$limit,$offset);
		$d['tot'] = $tot = $this->mod_master->tbl_kecamatan($kota)->num_rows();
		$d['kota'] = $kota;
		
		$config['base_url'] = site_url(fmodule('master/kecamatan'));
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
		
		$provinsi = $this->mod_master->parent_kota($kota);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('master/master_kecamatan',$d);
	}
	
	
	public function kecamatan_add($kota=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->insert_kecamatan($kota);
		}
		
		$d['title'] = $title = 'Tambah Kecamatan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$provinsi = $this->mod_master->parent_kota($kota);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('master/kecamatan/'.$kota)));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_kecamatan_add',$d);
	}
	
	public function kecamatan_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->update_kecamatan($id);
		}
		
		$d['title'] = $title = 'Edit Kecamatan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		$d['data'] = $this->mod_master->data_kecamatan($id);
		
		$kota = $this->mod_master->parent_kecamatan($id);
		$provinsi = $this->mod_master->parent_kota($kota);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('master/kecamatan/'.$kota)));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_kecamatan_edit',$d);
	}
	
	
	public function desa($kecamatan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('delete')){
			$this->mod_master->delete_desa();
		}
		
		if($this->input->post('enable')){
			$this->mod_master->enable_desa();
		}
		
		if($this->input->post('disable')){
			$this->mod_master->disable_desa();
		}
		
		$d['title'] = $title = 'Desa/Kelurahan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$d['limit'] = $limit = 1000;
		$d['offset'] = $offset = 0;
		$d['data'] = $this->mod_master->tbl_desa($kecamatan,$limit,$offset);
		$d['tot'] = $tot = $this->mod_master->tbl_desa($kecamatan)->num_rows();
		$d['kecamatan'] = $kecamatan;
		
		$config['base_url'] = site_url(fmodule('master/desa'));
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
		
		$kota = $this->mod_master->parent_kecamatan($kecamatan);
		$provinsi = $this->mod_master->parent_kota($kota);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('master/kecamatan/'.$kota)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('master/master_desa',$d);
	}
	
	
	public function desa_add($kecamatan=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->insert_desa($kecamatan);
		}
		
		$d['title'] = $title = 'Tambah Desa/Kelurahan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		
		$kota = $this->mod_master->parent_kecamatan($kecamatan);
		$provinsi = $this->mod_master->parent_kota($kota);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('master/kecamatan/'.$kota)));
		$this->breadcrumb->append_crumb('Desa/Kelurahan', site_url(fmodule('master/desa/'.$kecamatan)));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_desa_add',$d);
	}
	
	public function desa_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(34,$DataAkses);
		
		if($this->input->post('submit')){
			$this->mod_master->update_desa($id);
		}
		
		$d['title'] = $title = 'Edit Desa/Kelurahan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'master';
		$d['menuactive'] = 'master_region';
		$d['data'] = $this->mod_master->data_desa($id);
		
		$kecamatan = $this->mod_master->parent_desa($id);
		$kota = $this->mod_master->parent_kecamatan($kecamatan);
		$provinsi = $this->mod_master->parent_kota($kota);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Provinsi', site_url(fmodule('master/provinsi')));
		$this->breadcrumb->append_crumb('Kota', site_url(fmodule('master/kota/'.$provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('master/kecamatan/'.$kota)));
		$this->breadcrumb->append_crumb('Desa/Kelurahan', site_url(fmodule('master/desa/'.$kecamatan)));
		$this->breadcrumb->append_crumb($title);
		$this->load->view('master/master_desa_edit',$d);
	}
	
}