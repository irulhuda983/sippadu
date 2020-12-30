<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_filter','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','sippadu','date','file','html'));
		/*$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);*/
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(12,$DataAkses);
		
		$d['title'] = $title = 'Dashboard';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'query';
		$d['menuactive'] = 'query';
		$this->breadcrumb->append_crumb('Dashboard', '/');
		$this->load->view('dashboard',$d);
		
	}
	
	public function view($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(12,$DataAkses);
		
		$d['title'] = $title = 'Query';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'query';
		$d['menuactive'] = 'query_view';
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Query', '/');
		$this->load->view('query/view',$d);
		
	}
	
	public function get($id=0)
	{
		if($id > 0){
			$Kd_Group = $this->mod_filter->get_group_query($id);
			$d = $this->mod_all->load();
			$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
			$d['PageAkses'] = PageAkses(12,$DataAkses);
			
			$d['title'] = $title = $this->mod_filter->get_nm_query($id);
			$d['site_title'] = site_title($title);
			$d['menuopen'] = 'filter';
			$d['menuactive'] = 'filter_'.$Kd_Group.'_'.$id;
			$d['data'] = $this->mod_filter->execute($id);
			$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
			$this->breadcrumb->append_crumb('Query', site_url(fmodule('query')));
			$this->breadcrumb->append_crumb($title, '/');
			$this->load->view('filter/get',$d);
		}
		else{
			set_alert('error','URL yang anda kunjungi salah');
			redirect(fmodule('query/view'));
		}
	}
	
	public function execute($query='')
	{
		$sql = $query;
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(12,$DataAkses);
		
		$d['title'] = $title = 'Query';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'query';
		$d['menuactive'] = 'query';
		$d['data'] = $this->mod_filter->execute();
		$this->breadcrumb->append_crumb('Query', '/');
		$this->load->view('query/execute',$d);
		
	}
}