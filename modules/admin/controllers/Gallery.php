<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_gallery','mod_all'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','image_lib'));
		$this->load->helper(array('url','apps','query','admin','date','file','html','form'));
		$this->auth->restrict(fmodule('login'));
	}
	
	public function index(){
		$this->gallery();
	}
	
	public function gallery($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_gallery->delete_gallery_album();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_gallery->enable_gallery_album();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_gallery->disable_gallery_album();
		}
		
		$d['title'] = $title = 'Album Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_gallery->tabel_gallery_album($limit,$offset);
		$d['tot'] = $tot = $this->mod_gallery->tabel_gallery_album()->num_rows();
		
		$config['base_url'] = site_url(fmodule('gallery/index'));
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
		$this->load->view('gallery/gallery_album',$d);
		
	}
	
	public function album_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_gallery->insert_gallery_album();
		}
		
		$d['title'] = $title = 'Tambah Album Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery_add';
		$d['op_gallery_kategori'] = $this->mod_gallery->op_gallery_kategori();
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Album Gallery', site_url(fmodule('gallery')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_album_add',$d);
		
	}
	
	public function album_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_gallery->update_gallery_album($id);
		}
		
		$d['title'] = $title = 'Edit Album Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery';
		$d['data'] = $this->mod_gallery->data_gallery_album($id);
		$d['op_gallery_kategori'] = $this->mod_gallery->op_gallery_kategori();
		$d['slc_op_gallery_kategori'] = $this->mod_gallery->slc_op_gallery_kategori($id);
		$d['slc_tags'] = $this->mod_gallery->slc_album_tags($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Album Gallery', site_url(fmodule('gallery')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_album_edit',$d);
		
	}
	
	public function kategori($offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_gallery->delete_gallery_kategori();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_gallery->enable_gallery_kategori();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_gallery->disable_gallery_kategori();
		}
		
		$d['title'] = $title = 'Kategori Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery_kategori';
		
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_gallery->tabel_gallery_kategori($limit,$offset);
		$d['tot'] = $tot = $this->mod_gallery->tabel_gallery_kategori()->num_rows();
		
		$config['base_url'] = site_url(fmodule('gallery/kategori'));
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
		$this->load->view('gallery/gallery_kategori',$d);
		
	}
	
	public function kategori_add()
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('submit')){
			
			$a = $this->mod_gallery->insert_gallery_kategori();
		}
		
		$d['title'] = $title = 'Tambah Kategori Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery_kategori';
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori Gallery', site_url(fmodule('gallery/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_kategori_add',$d);
		
	}
	
	public function kategori_edit($id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('submit')){
			$a = $this->mod_gallery->update_gallery_kategori($id);
		}
		
		$d['title'] = $title = 'Edit Kategori Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery_kategori';
		$d['data'] = $this->mod_gallery->data_gallery_kategori($id);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kategori Gallery', site_url(fmodule('gallery/kategori')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_kategori_edit',$d);
		
	}
	
	public function detail($album=0,$offset=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('delete')){
			$a = $this->mod_gallery->delete_gallery();
		}
		elseif($this->input->post('enable')){
			$a = $this->mod_gallery->enable_gallery();
		}
		elseif($this->input->post('disable')){
			$a = $this->mod_gallery->disable_gallery();
		}
		
		$Nm_Kategori = $this->mod_gallery->get_gallery_album($album);
		$d['title'] = $title = $Nm_Kategori;
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery';
		$d['album'] = $album;
		
		$d['limit'] = $limit = config('limit');
		$d['data'] = $data = $this->mod_gallery->tabel_gallery($album,$limit,$offset);
		$d['tot'] = $tot = $this->mod_gallery->tabel_gallery($album)->num_rows();
		
		$config['base_url'] = site_url(fmodule('gallery/detail'));
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
		$this->breadcrumb->append_crumb('Album Gallery', site_url(fmodule('gallery')));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_detail',$d);
		
	}
	
	
	public function add($kategori=0)
	{
		if($kategori<1){
			redirect(fmodule('gallery/album_add'));
		}
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/gallery/';
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
					$image_path 		= './assets/'.config('main_site').'/images/gallery/';
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
			$a = $this->mod_gallery->insert_gallery($filename,$raw_name,$ori_ext,$kategori);
		}
		
		$d['title'] = $title = 'Tambah Data Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery';
		$Nm_Kategori = $this->mod_gallery->get_gallery_album($kategori);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Album Gallery', site_url(fmodule('gallery')));
		$this->breadcrumb->append_crumb($Nm_Kategori, site_url(fmodule('gallery/detail/'.$kategori)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_add',$d);
	}
	
	public function edit($kategori=0,$id=0)
	{
		$d = $this->mod_all->load();
		$d['DataAkses']	= $DataAkses = DataAkses($this->session->userdata('userid'));
		$d['PageAkses'] = PageAkses(13,$DataAkses);
		
		if($this->input->post('submit')){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($this->input->post('hapus_image') || $_FILES['userfile']['name']){
				$dataimg= $this->mod_gallery->data_gallery($id);
				$path = './assets/'.config('main_site').'/images/gallery/';
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
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/gallery/';
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
					$image_path 		= './assets/'.config('main_site').'/images/gallery/';
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
			$a = $this->mod_gallery->update_gallery($id,$filename,$raw_name,$ori_ext);
		}
		
		$d['title'] = $title = 'Edit Gallery';
		$d['site_title'] = site_title($title);
		$d['menuopen'] = 'gallery';
		$d['menuopen2'] = 'gallery';
		$d['menuactive'] = 'gallery';
		$d['data'] = $this->mod_gallery->data_gallery($id);
		$Nm_Kategori = $this->mod_gallery->get_gallery_album($kategori);
		
		$this->breadcrumb->append_crumb(lang('Dashboard'), site_url(fmodule()));
		$this->breadcrumb->append_crumb('Album Gallery', site_url(fmodule('gallery')));
		$this->breadcrumb->append_crumb($Nm_Kategori, site_url(fmodule('gallery/detail/'.$kategori)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('gallery/gallery_edit',$d);
	}
	
	public function cover($kategori=0,$id=0)
	{
		$this->mod_gallery->gallery_cover($kategori,$id);
	}
	
}