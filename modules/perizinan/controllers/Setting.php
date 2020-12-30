<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_setting','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
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
		$uri = $this->uri->segment(3);
		$uri5 = $this->uri->segment(4);
		
		if($this->input->post('simpan')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($_FILES['format']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('theme').'/images/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('format')) {
					$u	 				= $this->upload->data();
					$new_size 			= 600;
					$thumb 				= FALSE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('theme').'/images/';
					$watermark			= FALSE;
					$cropping			= FALSE;

					
					//=======================================START MANIPULATION IMAGE===========================================//
					$source_image  		= $temp.$u['file_name'];
					$ori_ext			= $u['file_ext'];
					$raw_name       	= $u['raw_name'];
					$new_path			= $image_path;
					$thumb_path			= $thumb ? $image_path : '';			 
					list($img_w, $img_h)= getimagesize($source_image);	
					$image_width		= $img_w;
					$image_height		= $img_h;
					chmod($source_image, 0777) ;

					$limit_use  		= $image_width > $image_height ? $image_width : $image_height ;
					$limit_use > $new_size	? $percent_resize = $new_size/$limit_use 	: $percent_resize = 1;
					$limit_use > $thumb_size? $percent_thumb  = $thumb_size/$limit_use: $percent_thumb = 1;
					
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = FALSE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '70%' ;
					$img['source_image'] = $source_image ;
					$img['new_image']    = $new_path ;
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;
					
					if($thumb){
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
						$img['width']  = $image_width * $percent_thumb;
						$img['height'] = $image_height * $percent_thumb;
						$img['thumb_marker'] = $thumb_marker = '_thumb';
						$img['quality']      = '70%' ;
						$img['source_image'] = $source_image ;
						$img['new_image']    = $image_path ;
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
					}
					
					if($watermark){
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
						$img['width']  = $image_width * $percent_resize;
						$img['height'] = $image_height * $percent_resize;
						$img['thumb_marker'] = $wm_marker = '_wm';
						$img['quality']      = '70%' ;
						$img['source_image'] = $source_image ;
						$img['new_image']    = $image_path ;
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$wmconfig['source_image'] = $image_path.$raw_name.$wm_marker.$ori_ext;
						$wmconfig['wm_text'] = 'Copyright by '.config('site_title');
						$wmconfig['wm_type'] = 'text';
						$wmconfig['wm_font_path'] = './system/fonts/texb.ttf';
						$wmconfig['wm_font_size'] = '16';
						$wmconfig['wm_font_color'] = 'ffffff';
						$wmconfig['wm_vrt_alignment'] = 'middle';
						$wmconfig['wm_hor_alignment'] = 'center';
						$wmconfig['wm_padding'] = '0';
						$wmconfig['wm_shadow_color']    = '999999' ;
						$wmconfig['wm_shadow_distance']    = '3' ;
						$this->image_lib->initialize($wmconfig);
						$this->image_lib->watermark();
						$this->image_lib->clear() ;
					}
					
					if($cropping){
						$cropimg['image_library'] = 'GD2';
						$cropimg['create_thumb']  = TRUE;
						$cropimg['maintain_ratio']= TRUE;
						$cropimg['thumb_marker'] = $crop_marker = '_crop';
						$cropimg['quality']      = '70%' ;
						$cropimg['source_image'] = $source_image ;
						$cropimg['new_image']    = $image_path ;
						if ($image_width > $image_height) {
							$cropimg['width'] = number_format($new_image_height,0);
							$cropimg['height'] = number_format($new_image_height,0);
							$cropimg['x_axis'] = number_format($new_image_height,0);
							$cropimg['y_axis'] = number_format($new_image_height,0);
						}
						else {
							$cropimg['height'] = number_format($new_image_width,0);
							$cropimg['width'] = number_format($new_image_width,0);
							$cropimg['x_axis'] = number_format($new_image_width,0);
							$cropimg['y_axis'] = number_format($new_image_width,0);
						}

						$this->image_lib->initialize($cropimg);
						$this->image_lib->crop();
						$this->image_lib->clear() ;
						
					}

					$delete_image_ori && file_exists($source_image) ? unlink($source_image) : '' ;

					//=======================================END MANIPULATION IMAGE===========================================//
					$filename		= $raw_name.$ori_ext;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			$this->mod_setting->save_master_parameter($idsetting,$idjenis,$filename);
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
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('setting/setting_config',$d);
	}
	
	public function mod_izin ($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(35,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_setting->delete_izin();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_setting->enable_izin();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_setting->disable_izin();
		}
		
		$d['title'] = $title = 'Modul Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'setting';
		$d['menuactive'] = 'setting_mod_izin';
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_setting->modul_izin($limit,$offset);
		$d['tot'] = $tot = $this->mod_setting->modul_izin()->num_rows();
		$config['base_url'] = $url_parent = site_url(fmodule('setting/mod_izin'));
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
		$this->load->view('setting/setting_mod_izin',$d);
	}
	
	public function mod_izin_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(35,$DataAkses);
		
		if($this->input->post('submit')){
			
			$a = $this->mod_setting->insert_mod_izin();
		}
		
		$d['title'] = $title = 'Tambah Modul Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'setting';
		$d['menuopen2'] = 'setting';
		$d['menuactive'] = 'setting_mod_izin';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Modul Izin', site_url(fmodule('setting/mod_izin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('setting/setting_mod_izin_add',$d);
		
	}
	
	public function mod_izin_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(35,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_setting->update_mod_izin($id);
		}
		
		$d['title'] = $title = 'Edit Modul Izin';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'setting';
		$d['menuopen2'] = 'setting';
		$d['menuactive'] = 'setting_mod_izin';
		$d['data'] = $this->mod_setting->data_mod_izin($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Modul Izin', site_url(fmodule('setting/mod_izin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('setting/setting_mod_izin_edit',$d);
		
	}
	
}