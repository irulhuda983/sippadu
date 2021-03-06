<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	var $title_page	= 'Formulir';
	var $class_page	= 'form';
	var $kode_akses = 16;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_form','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_form->delete_form();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_form->enable_form();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_form->disable_form();
		}
		
		$d['title'] = $title = $this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		//$d['menuopen2'] = 'web_form';
		$d['menuactive'] = $this->class_page;
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_form->tabel_form($limit,$offset);
		$d['tot'] = $tot = $this->mod_form->tabel_form()->num_rows();
		
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
		$this->load->view($this->class_page.'/'.$this->class_page,$d);
		
	}
	
	public function add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/'.$this->class_page.'/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload()) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/'.$this->class_page.'/';
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
			$a = $this->mod_form->insert_form($filename,$raw_name,$ori_ext);
		}
		
		$d['title'] = $title = 'Tambah';
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		//$d['menuopen2'] = 'web_form';
		$d['menuactive'] = $this->class_page.'_add';
		$d['op_form_kategori'] = $this->mod_form->op_form_kategori();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($this->title_page, site_url(fmodule($this->class_page)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('form/form_add',$d);
	}
	
	public function edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($this->input->post('hapus_image') || $_FILES['userfile']['name']){
				$dataimg= $this->mod_form->data_form($id);
				$path = './assets/'.config('main_site').'/images/'.$this->class_page.'/';
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
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/'.$this->class_page.'/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload()) {
					$u	 				= $this->upload->data();
					$new_size 			= 1000;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/'.$this->class_page.'/';
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
			$a = $this->mod_form->update_form($id,$filename,$raw_name,$ori_ext);
		}
		
		$d['title'] = $title = 'Edit';
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		$d['menuactive'] = $this->class_page;
		$d['op_form_kategori'] = $this->mod_form->op_form_kategori();
		$d['data'] = $this->mod_form->data_form($id);
		$d['data_kolom'] = $this->mod_form->data_kolom($id);
		$d['slc_op_form_kategori'] = $this->mod_form->slc_op_form_kategori($id);
		$d['slc_tags'] = $this->mod_form->slc_form_tags($id);
		$d['id'] = $id;
		$d['ID_Form'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb($this->title_page, site_url(fmodule($this->class_page)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_edit',$d);
	}
	
	public function data($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		/* if($this->input->post('save')){
			$a = $this->mod_form->save_data_form($id);
		} */
		
		$d['title'] = $title = 'Data '.$this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		$d['menuactive'] = $this->class_page;		
		
		$d['limit'] = $limit = config('limit');
		$d['data_kolom'] = $data_kolom = $this->mod_form->data_kolom($id);
		$d['data_col'] = $data_col = $this->mod_form->data_col($id);
		$d['data_row'] = $data_row = $this->mod_form->data_row($id);
		$d['ID_Form'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Form', site_url(fmodule($this->class_page)));
		$this->breadcrumb->append_crumb('Edit', site_url(fmodule($this->class_page.'/edit/'.$id)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_data',$d);
		
	}
	
	public function input_js($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['data_kolom'] = $data_kolom = $this->mod_form->data_kolom($id);
		$d['data_col'] = $data_col = $this->mod_form->data_col($id);
		$d['data_row'] = $data_row = $this->mod_form->data_row($id);
		$d['ID_Form'] = $id;
		
		$this->load->view($this->class_page.'/'.$this->class_page.'_input_js',$d);
		
	}
	
	public function edit_js($ID_Form=0,$ID_Row=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['data_kolom'] = $data_kolom = $this->mod_form->data_kolom($ID_Form);
		$d['data_col'] = $data_col = $this->mod_form->data_col($ID_Form);
		$d['data_row'] = $data_row = $this->mod_form->data_row($ID_Form);
		$d['ID_Form'] = $ID_Form;
		$d['ID_Row'] = $ID_Row;
		
		$this->load->view($this->class_page.'/'.$this->class_page.'_edit_js',$d);
		
	}
	
	public function data_js($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		/* if($this->input->post('save')){
			$a = $this->mod_form->save_data_form($id);
		} */
		
		$d['title'] = $title = 'Data '.$this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		$d['menuactive'] = $this->class_page;		
		
		$d['limit'] = $limit = config('limit');
		$d['data_kolom'] = $data_kolom = $this->mod_form->data_kolom($id);
		$d['data_col'] = $data_col = $this->mod_form->data_col($id);
		$d['data_row'] = $data_row = $this->mod_form->data_row($id);
		$d['ID_Form'] = $id;
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Form', site_url(fmodule($this->class_page)));
		$this->breadcrumb->append_crumb('Edit', site_url(fmodule($this->class_page.'/edit/'.$id)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_data_js',$d);
		
	}
	
	public function save(){
		switch($this->input->post('method')){
			case 'save':
				$a = $this->mod_form->save_data_form();
				echo $a;
				break;
			case 'edit':
				$a = $this->mod_form->save_data_form();
				echo $a;
				break;
			case 'delete':
				$a = $this->mod_form->delete_data_form();
				echo $a;
				break;
		}
	}
	
	public function kategori($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_form->delete_form_kategori();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_form->enable_form_kategori();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_form->disable_form_kategori();
		}
		
		$d['title'] = $title = 'Kategori '.$this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		//$d['menuopen2'] = 'web_form';
		$d['menuactive'] = $this->class_page.'_kategori';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_form->tabel_form_kategori($limit,$offset);
		$d['tot'] = $tot = $this->mod_form->tabel_form_kategori()->num_rows();
		
		$config['base_url'] = site_url(fmodule($this->class_page.'/kategori'));
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
		$this->load->view($this->class_page.'/'.$this->class_page.'_kategori',$d);
		
	}
	
	
	public function kategori_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('submit')){
			
			$a = $this->mod_form->insert_form_kategori();
		}
		
		$d['title'] = $title = 'Tambah Kategori '.$this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		//$d['menuopen2'] = 'web_form';
		$d['menuactive'] = $this->class_page.'_kategori';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori '.$this->title_page, site_url(fmodule($this->class_page.'/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_kategori_add',$d);
		
	}
	
	public function kategori_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_form->update_form_kategori($id);
		}
		
		$d['title'] = $title = 'Edit Kategori '.$this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['menuopen'] = $this->class_page;
		$d['menuactive'] = $this->class_page.'_kategori';
		$d['data'] = $this->mod_form->data_form_kategori($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori '.$this->title_page, site_url(fmodule($this->class_page.'/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view($this->class_page.'/'.$this->class_page.'_kategori_edit',$d);
		
	}
	
	public function setting_edit($ID_Form=0,$ID_Col=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
		
		if($this->input->post('save')){
			$a = $this->mod_form->save_setting_edit($ID_Form,$ID_Col);
		}
		
		$d['title'] = $title = 'Setting Option '.$this->title_page;
		$d['site_title'] = site_title($title);
		$d['title_page'] = $this->title_page;
		$d['class_page'] = $this->class_page;
		$d['op_form_type'] = $this->mod_form->op_form_type();
		$d['Nm_Col'] = $this->mod_form->get_nm_col($ID_Form,$ID_Col);
		$d['slc_op_form_type'] = $this->mod_form->slc_op_form_type($ID_Form,$ID_Col);
		$d['Keterangan'] = $this->mod_form->get_keterangan($ID_Form,$ID_Col);
		$d['data_form_option'] = $this->mod_form->data_form_option($ID_Form,$ID_Col);
		$d['ID_Form'] = $ID_Form;
		$d['ID_Col'] = $ID_Col;
		//$d['data'] = $this->mod_form->data_form_kategori($id);
		
		$this->load->view($this->class_page.'/'.$this->class_page.'_setting_edit',$d);
		
	}
	
	public function setting_js($ID_Form=0,$ID_Col=0)
	{
		if($this->input->post('op_form_type') > 3)
		{
			$d = $this->mod_all->load();
			$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
			$d['PageAkses'] = PageAkses($this->kode_akses,$DataAkses);
			
			if($this->input->post('submit')){
				$a = $this->mod_form->update_form_kategori($id);
			}
			
			$d['data_form_option'] = $this->mod_form->data_form_option($ID_Form,$ID_Col);
			//$d['data'] = $this->mod_form->data_form_kategori($id);
			
			$this->load->view($this->class_page.'/'.$this->class_page.'_setting_js',$d);
		}
		
	}
	
	
}