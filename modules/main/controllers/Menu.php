<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_all','mod_menu'));
		$this->load->library(array('auth','pagination','breadcrumb','form_validation'));
		$this->load->helper(array('url','apps','query','main','date','file','html'));
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
	
	public function open($id=0,$string='')
	{
		$data_menu = $this->mod_menu->data_menu($id);
		if($data_menu->num_rows() > 0){
			$hits = $this->mod_menu->hits($id);
			$data = $data_menu->row();
			$Jn_Menu = $data->Jn_Menu;
			$Class_Menu = $data->Class_Menu;
			switch($Jn_Menu){
				default:
					$d = $this->mod_all->load();
					$d['title'] = $title = lang($data->Nm_Menu,true);
					$d['site_title'] = site_title($title);
					$d['site_description'] = character_limiter(textonly($data->Konten),100);
					$d['desc1'] = $data->Description1;
					$d['desc2'] = $data->Description2;
					$d['desc_image'] = $data->Image;
					$d['desc_image_raw'] = $data->Image_Raw;
					$d['desc_image_ext'] = $data->Image_Ext;
					$d['menuopen'] = $this->mod_menu->get_menu_class(cek_top_menu($id));
					$d['data'] = $this->mod_menu->data_menu($id);
					
					$this->breadcrumb->append_crumb(lang('Beranda'), '/');
					$this->load->view('menu/menu_open',$d);
					break;
				case 2:
					redirect(autolink_menu($id));
					break;
				case 3:
					$d = $this->mod_all->load();
					$d['title'] = $title = lang($data->Nm_Menu,true);
					$d['site_title'] = site_title($title);
					$d['site_description'] = character_limiter(textonly($data->Konten),100);
					$d['desc1'] = $data->Description1;
					$d['desc2'] = $data->Description2;
					$d['desc_image'] = $data->Image;
					$d['desc_image_raw'] = $data->Image_Raw;
					$d['desc_image_ext'] = $data->Image_Ext;
					$d['menuopen'] = $this->mod_menu->get_menu_class(cek_top_menu($id));
					$d['data'] = $this->mod_menu->data_menu($id);
					$d['url'] = autolink_menu($id);
					$d['hits'] = $data->Hits;
					$d['h_frame'] = $data->H_Frame;
					$d['w_frame'] = $data->W_Frame;
					$d['head_frame'] = $data->Head_Frame;
					
					$this->breadcrumb->append_crumb(lang('Beranda'), '/');
					$this->load->view('menu/menu_frame',$d);
					break;
			}
		}
		else{
			set_alert('error','Oops, halaman yang anda cari tidak tersedia');
			redirect(fmodule());
		}
		
	}
	
	
}