<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {
	
	var $title_page		= 'Language';
	var $class_page		= 'language';
	var $menu_open		= 'tools';
	var $menu_active	= 'tools_language';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_language','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0){
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(27,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_language->delete_language();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_language->enable_language();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_language->disable_language();
		}
		
		if($this->input->post('op_language')){
			$this->session->set_userdata('set_lang',$this->input->post('op_language'));
		}
		
		$d['title'] = $title = lang('Language');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'language';
		$d['menuactive'] = 'language';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_language->tabel_language($limit,$offset);
		$d['tot'] = $tot = $this->mod_language->tabel_language()->num_rows();
		$d['op_language'] = $this->mod_language->op_language();
		$d['slc_op_language'] = $this->session->userdata('set_lang');
		
		$config['base_url'] = site_url(fmodule($this->class_page.'/index'));
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
		$this->load->view('language/language',$d);
	}
	
	public function add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(27,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_language->insert_language();
		}
		
		$d['title'] = $title = 'Tambah';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'language';
		$d['menuactive'] = 'language';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Language', site_url(fmodule('language')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('language/language_add',$d);
	}
	
	public function edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(27,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_language->update_language($id);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'language';
		$d['menuactive'] = 'language';
		$d['data'] = $this->mod_language->data_language($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Language', site_url(fmodule('language')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('language/language_edit',$d);
	}
	
	public function translate($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(27,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_language->delete_translate();
		}
		
		if($this->input->post('enable')){
			$a = $this->mod_language->enable_translate();
		}
		
		if($this->input->post('disable')){
			$a = $this->mod_language->disable_translate();
		}
		
		if($this->input->post('save')){
			$a = $this->mod_language->save_translate();
		}
		
		if($this->input->post('op_language')){
			$this->session->set_userdata('set_lang',$this->input->post('op_language'));
		}
		
		$d['title'] = $title = lang('Translate');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'language';
		$d['menuactive'] = 'language_translate';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_language->tabel_translate($limit,$offset);
		$d['tot'] = $tot = $this->mod_language->tabel_translate()->num_rows();
		$d['op_language'] = $this->mod_language->op_language();
		$d['slc_op_language'] = $set_lang = $this->session->userdata('set_lang');
		$d['ID_Lang'] = $this->mod_language->get_id_lang($set_lang);
		
		$config['base_url'] = site_url(fmodule($this->class_page.'/translate'));
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
		$this->load->view('language/language_translate',$d);
		
	}
	
	public function translate_ori($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(27,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_language->delete_translate();
		}
		
		if($this->input->post('enable')){
			$a = $this->mod_language->enable_translate();
		}
		
		if($this->input->post('disable')){
			$a = $this->mod_language->disable_translate();
		}
		
		if($this->input->post('save')){
			$a = $this->mod_language->save_translate();
		}
		
		if($this->input->post('op_language')){
			$this->session->set_userdata('set_lang',$this->input->post('op_language'));
		}
		
		$d['title'] = $title = lang('Translate');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'language';
		$d['menuactive'] = 'language_translate_ori';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_language->tabel_translate_ori($limit,$offset);
		$d['tot'] = $tot = $this->mod_language->tabel_translate_ori()->num_rows();
		$d['op_language'] = $this->mod_language->op_language();
		$d['slc_op_language'] = $set_lang = $this->session->userdata('set_lang');
		$d['ID_Lang'] = $this->mod_language->get_id_lang($set_lang);
		
		$config['base_url'] = site_url(fmodule($this->class_page.'/translate_ori'));
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
		$this->load->view('language/language_translate_ori',$d);
		
	}
	
	function get($language = '') {
        $language = ($language != '') ? $language : 'id';
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER'].'/?time='.TimeNow('YmdHis'));
    }
	
	function update($lang='id'){
       $this->mod_language->update_lang($lang);
		//set_alert('success','Database Language berhasil diupdate');
		//redirect($_SERVER['HTTP_REFERER']);
    }
	
	
}