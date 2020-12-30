<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_setting','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$this->config();
	}
	
	public function config ($idsetting=0,$idjenis=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(33,$DataAkses);
		$uri = $this->uri->segment(4);
		$uri5 = $this->uri->segment(5);
		
		if($this->input->post('simpan')){
			$this->mod_setting->save_master_parameter($idsetting,$idjenis);
		}
		
		if($this->input->post('op_setting') && $this->input->post('op_setting') != 'no'){
			$url = site_url(fmodule('setting/config')).'/'.$this->input->post('op_setting').'/'.($uri5 ? $uri5 : '0');
			redirect($url);
		}
		
		else if($this->input->post('op_setting') && $this->input->post('op_setting') == 'no'){
			$url = site_url(fmodule('setting/config'));
			redirect($url);
		}
		
		if($this->input->post('op_jenis_setting') && $this->input->post('op_jenis_setting') != 'no'){
			$url = site_url(fmodule('setting/config')).'/'.($uri ? $uri : '0').'/'.$this->input->post('op_jenis_setting');
			redirect($url);
		}
		
		else if($this->input->post('op_jenis_setting') && $this->input->post('op_jenis_setting') == 'no'){
			$url = site_url(fmodule('setting/config').'/'.($uri ? $uri : '0'));
			redirect($url);
		}
		
		$d['title'] = $title = 'Setting';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'setting';
		$d['menuactive'] = 'setting_config';
		$d['op_setting'] = $this->mod_setting->op_setting();
		$d['op_jenis_setting'] = $this->mod_setting->op_jenis_setting($idsetting);
		$d['idsetting'] = $idsetting;
		$d['idjenis'] = $idjenis;
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_setting->get_setting($idsetting,$idjenis);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('setting/setting_config',$d);
	}
	
}