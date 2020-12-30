<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_personal','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form','download'));
		$this->auth->restrict(fmodule('login'));
	}	
		
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$user = $this->session->userdata('sippadu_userid');
		if($this->input->post('submit')){
			//$this->mod_personal->update_personal($id);
			$this->mod_personal->save_session_personal();
		}
		
		
		$d['title'] = $title = 'Data Pemohon';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'pemohon';
		$d['menuactive'] = 'pemohon';
		$limit = config('max_limit');
		$d['data'] = $this->mod_personal->get_tbl_personal($limit,$offset);
		$d['tot'] = $tot = $this->mod_personal->get_tbl_personal()->num_rows();
		
		$config['base_url'] = site_url(fmodule('personal/index'));
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
		$this->load->view('personal/personal',$d);
	}
	
	
	public function cek_data_personal(){
		$d['kitas'] = $kitas = $this->input->post('kitas');
		$d['idpelanggan'] = $idpelanggan = $this->mod_personal->cek_id_personal($kitas);
		$d['nmpelanggan'] = $nmpelanggan = $this->mod_personal->cek_nama_personal($kitas);
		$d['data'] = $this->mod_personal->cek_data_personal($kitas);
		
		$this->load->view('personal/personal_cek_data',$d);
	}
	
	public function op_pelanggan(){
		$id = $this->input->post('op_pelanggan');
		$d['data'] = $this->mod_personal->get_personal($id);
		$this->load->view('personal/op_pelanggan',$d);
	}
	
	public function klaim($offset=0)
	{
		$d = $this->mod_all->load();
		$user = $this->session->userdata('sippadu_userid');
		if($this->input->post('submit')){
			$this->mod_personal->save_session_personal();
		}
		
		if($this->input->post('delete')){
			$this->mod_personal->delete_personal_klaim();
		}
		$d['title'] = $title = 'Klaim Data Pemohon';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'klaim';
		$d['menuactive'] = 'klaim';
		$limit = config('max_limit');
		$d['data'] = $this->mod_personal->get_tbl_klaim($limit,$offset);
		$d['tot'] = $tot = $this->mod_personal->get_tbl_klaim()->num_rows();
		
		$config['base_url'] = site_url(fmodule('personal/klaim'));
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
	
	public function klaim_add(){
		$d = $this->mod_all->load();
		
		if($this->input->post('submit')){
			
			$this->mod_personal->insert_klaim();
		}
		
		$d['title'] = $title = 'Tambah Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'klaim';
		$d['menuactive'] = 'klaim';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb(lang('Klaim Data'), site_url(fmodule('personal/klaim')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_klaim_add',$d);
	}
	
	public function klaim_edit($id=0){
		$d = $this->mod_all->load();
		
		if($this->input->post('submit')){
			
			$this->mod_personal->update_klaim($id);
		}
		
		$d['title'] = $title = 'Edit Data';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'klaim';
		$d['menuactive'] = 'klaim';
		$d['data'] = $this->mod_personal->get_data_klaim($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb(lang('Klaim Data'), site_url(fmodule('personal/klaim')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('personal/personal_klaim_edit',$d);
	}
	
}