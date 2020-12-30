<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_perusahaan','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
		
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$user = $this->session->userdata('sippadu_userid');
		if($this->input->post('submit')){
			//$this->mod_perusahaan->update_perusahaan($id);
			$this->mod_perusahaan->save_session_perusahaan();
		}
		
		$d['title'] = $title = 'Data Perusahaan';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'perusahaan';
		$d['menuactive'] = 'perusahaan';
		$limit = config('max_limit');
		$d['data'] = $this->mod_perusahaan->get_tbl_perusahaan($limit,$offset);
		$d['tot'] = $tot = $this->mod_perusahaan->get_tbl_perusahaan()->num_rows();
		
		$config['base_url'] = site_url(fmodule('perusahaan/index'));
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
		$this->load->view('perusahaan/perusahaan',$d);
	}
	
}