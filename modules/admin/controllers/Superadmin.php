<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_superadmin','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_superadmin->delete_website();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_superadmin->enable_website();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_superadmin->disable_website();
		}
		
		$d['title'] = $title = 'Data Domain';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_superadmin->tabel_website($limit,$offset);
		$d['tot'] = $tot = $this->mod_superadmin->tabel_website()->num_rows();
		
		$config['base_url'] = site_url(fmodule('superadmin/index'));
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
		$this->load->view('superadmin/superadmin_web',$d);
		
	}
	
	public function web_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			$filename2	= ''; 
			$raw_name2 	= ''; 
			$ori_ext2	= '';
			$favicon	= ''; 
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/setting/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('userfile')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/setting/';
					$watermark			= TRUE;
					$cropping			= TRUE;

					
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
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
					$filename		= $raw_name.$ori_marker.$ori_ext;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			if ($_FILES['logo']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/logo/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('logo')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/logo/';
					$watermark			= FALSE;
					$cropping			= FALSE;

					
					//=======================================START MANIPULATION IMAGE===========================================//
					$source_image  		= $temp.$u['file_name'];
					$ori_ext2			= $u['file_ext'];
					$raw_name2       	= $u['raw_name'];
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
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
					$filename2		= $raw_name2.$ori_marker.$ori_ext2;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			if ($_FILES['favicon']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/favicon/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('favicon')) {
					$u	 				= $this->upload->data();
					$image_path 		= './assets/'.config('main_site').'/images/favicon/';
					$favicon			= $u['file_name'];
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			$a = $this->mod_superadmin->insert_website($filename,$raw_name,$ori_ext,$filename2,$raw_name2,$ori_ext2,$favicon);
		}
		
		$d['title'] = $title = 'Tambah Data Website';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		$d['op_color'] = $this->mod_superadmin->op_color();
		$d['op_apps_active'] = $this->mod_superadmin->op_apps_active();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Superadmin', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_web_add',$d);
	}
	
	public function web_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			$filename2	= ''; 
			$raw_name2 	= ''; 
			$ori_ext2	= '';
			$filename3	= ''; 
			$raw_name3 	= ''; 
			$ori_ext3	= '';
			if ($this->input->post('hapus_image') || $_FILES['userfile']['name']){
				$dataimg= $this->mod_superadmin->data_website($id);
				$path = './assets/'.config('main_site').'/images/setting/';
				if($dataimg->num_rows() > 0){
					$di = $dataimg->row();
					$f_asli = $di->Image_Raw.$di->Image_Ext;
					$f_original = $di->Image_Raw.'_original'.$di->Image_Ext;
					$f_crop = $di->Image_Raw.'_crop'.$di->Image_Ext;
					$f_thumb = $di->Image_Raw.'_thumb'.$di->Image_Ext;
					$f_wm = $di->Image_Raw.'_wm'.$di->Image_Ext;
					$img_asli = $path.$f_asli;
					$img_original = $path.$f_original;
					$img_crop = $path.$f_crop;
					$img_thumb = $path.$f_thumb;
					$img_wm = $path.$f_wm;
					file_exists($img_asli) ? unlink($img_asli) : '' ;
					file_exists($img_original) ? unlink($img_original) : '' ;
					file_exists($img_crop) ? unlink($img_crop) : '' ;
					file_exists($img_thumb) ? unlink($img_thumb) : '' ;
					file_exists($img_wm) ? unlink($img_wm) : '' ;
				}
				
				$filename	= ' '; 
				$raw_name 	= ' '; 
				$ori_ext	= ' ';
			}
			if ($this->input->post('hapus_logo') || $_FILES['logo']['name']){
				$dataimg= $this->mod_superadmin->data_website($id);
				$path = './assets/'.config('main_site').'/images/logo/';
				if($dataimg->num_rows() > 0){
					$di = $dataimg->row();
					$f_asli = $di->Logo_Raw.$di->Logo_Ext;
					$f_original = $di->Logo_Raw.'_original'.$di->Logo_Ext;
					$f_crop = $di->Logo_Raw.'_crop'.$di->Logo_Ext;
					$f_thumb = $di->Logo_Raw.'_thumb'.$di->Logo_Ext;
					$f_wm = $di->Logo_Raw.'_wm'.$di->Logo_Ext;
					$img_asli = $path.$f_asli;
					$img_original = $path.$f_original;
					$img_crop = $path.$f_crop;
					$img_thumb = $path.$f_thumb;
					$img_wm = $path.$f_wm;
					file_exists($img_asli) ? unlink($img_asli) : '' ;
					file_exists($img_original) ? unlink($img_original) : '' ;
					file_exists($img_crop) ? unlink($img_crop) : '' ;
					file_exists($img_thumb) ? unlink($img_thumb) : '' ;
					file_exists($img_wm) ? unlink($img_wm) : '' ;
				}
				
				$filename2	= ' '; 
				$raw_name2 	= ' '; 
				$ori_ext2	= ' ';
			}
			if ($this->input->post('hapus_favicon') || $_FILES['favicon']['name']){
				$dataimg= $this->mod_superadmin->data_website($id);
				$path = './assets/'.config('main_site').'/images/favicon/';
				if($dataimg->num_rows() > 0){
					$di = $dataimg->row();
					$f_asli = $di->Favicon;
					$img_asli = $path.$f_asli;
					file_exists($img_asli) ? unlink($img_asli) : '' ;
				}
				
				$favicon	= ' '; 
			}
			
			
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/setting/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('userfile')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/setting/';
					$watermark			= TRUE;
					$cropping			= TRUE;

					
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
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
					$filename		= $raw_name.$ori_marker.$ori_ext;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			
			if ($_FILES['logo']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/logo/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('logo')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/logo/';
					$watermark			= FALSE;
					$cropping			= FALSE;

					
					//=======================================START MANIPULATION IMAGE===========================================//
					$source_image  		= $temp.$u['file_name'];
					$ori_ext2			= $u['file_ext'];
					$raw_name2       	= $u['raw_name'];
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
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
					$filename2		= $raw_name2.$ori_marker.$ori_ext2;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			
			if ($_FILES['favicon']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/favicon/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('favicon')) {
					$u	 				= $this->upload->data();
					$image_path 		= './assets/'.config('main_site').'/images/favicon/';
					$favicon			= $u['file_name'];
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			$a = $this->mod_superadmin->update_website($id,$filename,$raw_name,$ori_ext,$filename2,$raw_name2,$ori_ext2,$favicon);
		}
		
		$d['title'] = $title = 'Edit Data Website';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		$d['op_color'] = $this->mod_superadmin->op_color();
		$d['op_apps_active'] = $this->mod_superadmin->op_apps_active();
		$d['data'] = $this->mod_superadmin->data_website($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Superadmin', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_web_edit',$d);
	}
	
	public function alias($id=0,$offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_superadmin->delete_website();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_superadmin->enable_website();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_superadmin->disable_website();
		}
		
		$domain = '';
		$dm = $this->mod_superadmin->data_website($id);
		if($dm->num_rows() > 0){
			$dmm = $dm->row();
			$domain = $dmm->Domain;
		}
		
		$d['title'] = $title = 'Domain Alias: '.$domain;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		$d['id'] = $id;
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_superadmin->tabel_alias($id,$limit,$offset);
		$d['tot'] = $tot = $this->mod_superadmin->tabel_alias($id)->num_rows();
		
		$config['base_url'] = site_url(fmodule('superadmin/alias'));
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
		$this->breadcrumb->append_crumb('Data Domain', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_alias',$d);
		
	}
	
	public function alias_add($id=0,$offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_superadmin->insert_alias($id);
		}
		
		$domain = '';
		$dm = $this->mod_superadmin->data_website($id);
		if($dm->num_rows() > 0){
			$dmm = $dm->row();
			$domain = $dmm->Domain;
		}
		
		$d['title'] = $title = 'Tambah Domain Alias: '.$domain;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Domain', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb('Domain Alias', site_url(fmodule('superadmin/alias/'.$id)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_alias_add',$d);
		
	}
	
	public function copy_from($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_superadmin->copy_from($id);
		}
		
		$domain = '';
		$dm = $this->mod_superadmin->data_website($id);
		if($dm->num_rows() > 0){
			$dmm = $dm->row();
			$domain = $dmm->Domain;
		}
		
		$d['title'] = $title = 'Copy Data Domain to : '.$domain;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		$d['op_domain_copy_from'] = $this->mod_superadmin->op_domain_copy_from($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Domain', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_copy',$d);
		
	}
	
	public function clear_data($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('clear')){
			$a = $this->mod_superadmin->clear_data($id);
		}
		
		$domain = '';
		$dm = $this->mod_superadmin->data_website($id);
		if($dm->num_rows() > 0){
			$dmm = $dm->row();
			$domain = $dmm->Domain;
		}
		
		$d['title'] = $title = 'Clear data : '.$domain;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Domain', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_clear_data',$d);
		
	}
	
	public function otorisasi($domain=0,$apps=0,$offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('save')){
			$a = $this->mod_superadmin->insert_modul_log();
		}
		
		if($this->input->post('refresh')){
			$domain = $this->input->post('op_domain');
			$apps = $this->input->post('op_apps');
		}
		
		$d['title'] = $title = 'Otorisasi Modul';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin_otorisasi';
		
		
		$d['limit'] = $limit = 0;
		$d['data'] = $data = $this->mod_superadmin->tabel_modul($domain,$apps,$limit,$offset);
		$d['tot'] = $tot = $this->mod_superadmin->tabel_modul()->num_rows();
		$d['op_domain'] = $this->mod_superadmin->op_domain();
		$d['op_apps'] = $this->mod_superadmin->op_apps();
		$d['slc_op_domain'] = $domain;
		$d['slc_op_apps'] = $apps;
		
		$config['base_url'] = site_url(fmodule('superadmin/index'));
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
		$this->load->view('superadmin/superadmin_otorisasi',$d);
		
	}
	
	public function mapping_modul($idapps=0,$idmodul=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		$uri = $this->uri->segment(3);
		$uri5 = $this->uri->segment(4);
		
		if($this->input->post('simpan')){
			$a = $this->mod_superadmin->insert_mapping($idapps,$idmodul);
		}
		
		if($this->input->post('op_apps') && $this->input->post('op_apps') != 'no'){
			$url = site_url(fmodule('superadmin/mapping_modul')).'/'.$this->input->post('op_apps').'/'.($uri5 ? $uri5 : '0');
			redirect($url);
		}
		
		else if($this->input->post('op_apps') && $this->input->post('op_apps') == 'no'){
			$url = site_url(fmodule('superadmin/mapping_modul'));
			redirect($url);
		}
		
		if($this->input->post('op_apps_modul') && $this->input->post('op_apps_modul') != 'no'){
			$url = site_url(fmodule('superadmin/mapping_modul')).'/'.($uri ? $uri : '0').'/'.$this->input->post('op_apps_modul');
			redirect($url);
		}
		
		else if($this->input->post('op_apps_modul') && $this->input->post('op_apps_modul') == 'no'){
			$url = site_url(fmodule('superadmin/mapping_modul').'/'.($uri ? $uri : '0'));
			redirect($url);
		}
		
		$d['title'] = $title = 'Mapping Modul';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuactive'] = 'superadmin_mapping_modul';
		$d['op_apps'] = $this->mod_superadmin->op_apps(TRUE);
		$d['op_apps_modul'] = $this->mod_superadmin->op_apps_modul($idapps);
		$d['idapps'] = $idapps;
		$d['idmodul'] = $idmodul;
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_superadmin->tabel_modul_mapping($idapps,$idmodul);
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_mapping',$d);
	}
	
	public function server($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		$d['title'] = $title = 'Server';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'server';
		$d['menuactive'] = 'superadmin_server';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_server',$d);
		
	}
	
	public function php_info($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		$d['title'] = $title = 'PHP Info';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'php_info';
		$d['menuactive'] = 'superadmin_php_info';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_phpinfo',$d);
		
	}
	
	public function database()
	{
		$this->load->dbutil();
		$this->load->helper('download');
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		$user = $this->session->userdata('userid');
		
		if($this->input->post('backup')){
			$this->load->helper('file');
			$domain = $_SERVER['SERVER_NAME'];
			$temp_path = './assets/'.config('theme').'/backup/';
			$filename = 'backup_'.TimeNow('Ymd_His');
			$prefs = array(
				//'tables'     => array('table1', 'table2'),
				//'ignore'     => array(),
				'format'     => 'zip',
				'filename'   => $filename.'.sql',
				'add_drop'   => TRUE, 
				'add_insert' => TRUE
			);
			$backup = $this->dbutil->backup($prefs);
			write_file($temp_path, $backup);
			force_download($filename.'.zip', $backup);
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
		
		if($this->input->post('repair')){
			$result = $this->mod_superadmin->database_repair();
			if($result){
				set_alert('success','Database berhasil di repair');
				redirect(current_url());
			}
			else{
				set_alert('error','Database gagal di repair');
				redirect(current_url());
			}
		}
		
		$d['title'] = $title = 'Tools Database';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuactive'] = 'superadmin_database';
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_database',$d); 
		
	}
	
	public function apps($id=0,$offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('save')){
			$a = $this->mod_superadmin->save_apps($id);
		}
		
		$domain = '';
		$dm = $this->mod_superadmin->data_website($id);
		if($dm->num_rows() > 0){
			$dmm = $dm->row();
			$domain = $dmm->Domain;
		}
		$d['title'] = $title = 'Aplikasi';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		
		$d['id_web'] = $id;
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_superadmin->tabel_apps($id,$limit,$offset);
		$d['tot'] = $tot = $this->mod_superadmin->tabel_apps($id)->num_rows();
		
		$config['base_url'] = site_url(fmodule('superadmin/apps'));
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
		$this->breadcrumb->append_crumb('Data Domain', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_app',$d);
		
	}
	
	public function apps_set($id_web=0,$id_apps=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			$filename2	= ''; 
			$raw_name2 	= ''; 
			$ori_ext2	= '';
			if ($this->input->post('hapus_image') || $_FILES['userfile']['name']){
				$dataimg= $this->mod_superadmin->data_website($id);
				$path = './assets/'.config('main_site').'/images/setting/';
				if($dataimg->num_rows() > 0){
					$di = $dataimg->row();
					$f_asli = $di->Image_Raw.$di->Image_Ext;
					$f_original = $di->Image_Raw.'_original'.$di->Image_Ext;
					$f_crop = $di->Image_Raw.'_crop'.$di->Image_Ext;
					$f_thumb = $di->Image_Raw.'_thumb'.$di->Image_Ext;
					$f_wm = $di->Image_Raw.'_wm'.$di->Image_Ext;
					$img_asli = $path.$f_asli;
					$img_original = $path.$f_original;
					$img_crop = $path.$f_crop;
					$img_thumb = $path.$f_thumb;
					$img_wm = $path.$f_wm;
					file_exists($img_asli) ? unlink($img_asli) : '' ;
					file_exists($img_original) ? unlink($img_original) : '' ;
					file_exists($img_crop) ? unlink($img_crop) : '' ;
					file_exists($img_thumb) ? unlink($img_thumb) : '' ;
					file_exists($img_wm) ? unlink($img_wm) : '' ;
				}
				
				$filename	= ' '; 
				$raw_name 	= ' '; 
				$ori_ext	= ' ';
			}
			if ($this->input->post('hapus_logo') || $_FILES['logo']['name']){
				$dataimg= $this->mod_superadmin->data_website($id);
				$path = './assets/'.config('main_site').'/images/setting/';
				if($dataimg->num_rows() > 0){
					$di = $dataimg->row();
					$f_asli = $di->Logo_Raw.$di->Logo_Ext;
					$f_original = $di->Logo_Raw.'_original'.$di->Logo_Ext;
					$f_crop = $di->Logo_Raw.'_crop'.$di->Logo_Ext;
					$f_thumb = $di->Logo_Raw.'_thumb'.$di->Logo_Ext;
					$f_wm = $di->Logo_Raw.'_wm'.$di->Logo_Ext;
					$img_asli = $path.$f_asli;
					$img_original = $path.$f_original;
					$img_crop = $path.$f_crop;
					$img_thumb = $path.$f_thumb;
					$img_wm = $path.$f_wm;
					file_exists($img_asli) ? unlink($img_asli) : '' ;
					file_exists($img_original) ? unlink($img_original) : '' ;
					file_exists($img_crop) ? unlink($img_crop) : '' ;
					file_exists($img_thumb) ? unlink($img_thumb) : '' ;
					file_exists($img_wm) ? unlink($img_wm) : '' ;
				}
				
				$filename2	= ' '; 
				$raw_name2 	= ' '; 
				$ori_ext2	= ' ';
			}
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/setting/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('userfile')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/setting/';
					$watermark			= TRUE;
					$cropping			= TRUE;

					
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
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
					$filename		= $raw_name.$ori_marker.$ori_ext;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			
			if ($_FILES['logo']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/logo/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('logo')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/logo/';
					$watermark			= FALSE;
					$cropping			= FALSE;

					
					//=======================================START MANIPULATION IMAGE===========================================//
					$source_image  		= $temp.$u['file_name'];
					$ori_ext2			= $u['file_ext'];
					$raw_name2       	= $u['raw_name'];
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
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
					$img['width']  = $new_image_width = $image_width * $percent_resize;
					$img['height'] = $new_image_height = $image_height * $percent_resize;
					$img['thumb_marker'] = $ori_marker = '_original';
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
					$filename2		= $raw_name2.$ori_marker.$ori_ext2;
				}
				else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			$a = $this->mod_superadmin->update_apps($id_web,$id_apps,$filename,$raw_name,$ori_ext,$filename2,$raw_name2,$ori_ext2);
		}
		
		$domain = '';
		$dm = $this->mod_superadmin->data_website($id_web);
		if($dm->num_rows() > 0){
			$dmm = $dm->row();
			$domain = $dmm->Domain;
		}
		
		$apps = '';
		$da = $this->mod_superadmin->data_apps($id_apps);
		if($da->num_rows() > 0){
			$dam = $da->row();
			$apps = $dam->Nm_Apps;
		}
		
		$d['title'] = $title = 'Setting Aplikasi '.$apps.' pada domain: "'.$domain.'"';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin';
		
		$d['domain'] = $domain;
		$d['id_web'] = $id_web;
		$d['limit'] = $limit = config('limit');
		$d['op_color'] = $this->mod_superadmin->op_color();
		$d['data'] = $data = $this->mod_superadmin->data_setting_apps($id_web,$id_apps);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Data Domain', site_url(fmodule('superadmin')));
		$this->breadcrumb->append_crumb('Aplikasi', site_url(fmodule('superadmin/apps/'.$id_web)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_app_set',$d);
		
	}
	
	public function config($idsetting=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		$uri = $this->uri->segment(3);
		$uri4 = $this->uri->segment(4);
		
		if($this->input->post('simpan')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($_FILES['format']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('theme').'/images/setting/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('value')) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= FALSE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('theme').'/images/setting/';
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
					$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$img['quality']      = '90%' ;
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
						$cropimg['quality']      = '90%' ;
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
			$this->mod_superadmin->save_config($idsetting,$filename);
		}
		
		if($this->input->post('op_setting') && $this->input->post('op_setting') != 'no'){
			$url = site_url(fmodule('superadmin/config')).'/'.$this->input->post('op_setting');
			redirect($url);
		}
		
		else if($this->input->post('op_setting') && $this->input->post('op_setting') == 'no'){
			$url = site_url(fmodule('superadmin/config'));
			redirect($url);
		}
		
		
		$d['title'] = $title = lang('Konfigurasi');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuactive'] = 'superadmin_config';
		$d['op_setting'] = $this->mod_superadmin->op_config();
		$d['idsetting'] = $idsetting;
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $this->mod_superadmin->get_config($idsetting);
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('superadmin/superadmin_config',$d);
	}
	
	public function widget($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(20,$DataAkses);
		
		if($this->input->post('enable')){
			$a = $this->mod_superadmin->enable_widget();
		}
		if($this->input->post('disable')){
			$a = $this->mod_superadmin->disable_widget();
		}
		if($this->input->post('save')){
			$a = $this->mod_superadmin->save_widget();
		}
		
		if($this->input->post('op_domain')){
			$this->session->set_userdata('set_domain',$this->input->post('op_domain'));
		}
		
		$id = 0;
		if($this->session->userdata('set_domain') != ''){
			$id = $this->session->userdata('set_domain');
		}
		
		$d['title'] = $title = lang('Widget');
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'superadmin';
		$d['menuopen2'] = 'superadmin';
		$d['menuactive'] = 'superadmin_widget';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_superadmin->tabel_widget($id,$limit,$offset);
		$d['tot'] = $tot = $this->mod_superadmin->tabel_widget()->num_rows();
		$d['op_domain'] = $this->mod_superadmin->op_domain();
		$d['slc_op_domain'] = $this->session->userdata('set_domain');
		
		$config['base_url'] = site_url(fmodule('superadmin/widget'));
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
		$this->load->view('superadmin/superadmin_widget',$d);
		
	}
	
	function apps_color(){
		$class_color = $this->input->post('class_color');
		$d['code'] = $this->mod_superadmin->apps_color($class_color);
		$this->load->view('superadmin/superadmin_color',$d);
	}
}