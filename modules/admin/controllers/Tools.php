<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_tools','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$this->database();
	}
	
	public function database()
	{
		$this->load->dbutil();
		$this->load->helper('download');
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(19,$DataAkses);
		
		$user = $this->session->userdata('userid');
		
		if($this->input->post('backup')){
			$backup = $this->dbutil->backup();
			$this->load->helper('file');
			$temp_path = './assets/'.config('theme').'/temp/';
			write_file($temp_path, $backup);
			$domain = $_SERVER['SERVER_NAME'];
			force_download($domain.'_'.TimeNow('Ymd_His').'.gz', $backup);
		}
		
		if($this->input->post('optimize')){
			$result = $this->dbutil->optimize_database();
			if ($result !== FALSE)
			{
				set_alert('success','Database berhasil di optimize');
				redirect(current_url());
			}
			else{
				set_alert('error','Database gagal di optimize');
				redirect(current_url());
			}
		}
		
		$d['title'] = $title = 'Tools Database';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tools';
		$d['menuactive'] = 'tools_database';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('tools/tools_database',$d); 
		
	}
	
	public function backup()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(19,$DataAkses);
		
		if($this->input->post('backup')){
			$this->mod_tools->backup();
		}
		
		$d['title'] = $title = lang('Backup');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tools';
		$d['menuactive'] = 'tools_backup';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('tools/tools_backup',$d); 
		
	}
	
	public function restore()
	{
		$this->load->helper('download');
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(19,$DataAkses);
		
		if($this->input->post('restore')){
			$this->mod_tools->restore();
		}
		
		$d['title'] = $title = lang('Restore');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'tools';
		$d['menuactive'] = 'tools_restore';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('tools/tools_restore',$d); 
		
	}
	
	function test(){
		echo $this->mod_tools->GetDataWeb('ci_berita');
	}
	
}