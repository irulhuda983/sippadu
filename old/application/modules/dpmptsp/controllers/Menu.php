<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_menu'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','dpmptsp','date','file','html'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
	}	
	
	public function index($id=0){
		$this->open($id);
	}
	
	public function open($id=0)
	{
		$data_menu = $this->mod_menu->data_menu($id);
		if($data_menu->num_rows() > 0){
			$hits = $this->mod_menu->hits($id);
			$data = $data_menu->row();
			$Jn_Menu = $data->Jn_Menu;
			$Class_Menu = $data->Class_Menu;
			if($Jn_Menu == 1){
				$d = $this->mod_all->load();
				$d['title'] = $title = $data->Nm_Menu;
				$d['site_title'] = site_title($title);
				
				$d['menuopen'] = $this->mod_menu->get_menu_class(cek_top_menu($id));
				$d['data'] = $this->mod_menu->data_menu($id);
				
				$this->breadcrumb->append_crumb('Beranda', '/');
				$this->load->view('menu/menu_open',$d);
			}
			else{
				redirect(autolink_menu($id));
			}
		}
		else{
			redirect(fmodule());
		}
		
	}
	
	
}