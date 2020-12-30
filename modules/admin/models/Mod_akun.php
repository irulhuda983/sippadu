<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_akun extends CI_Model {
	
	function get_data_users($id=0){
		$a = $this->db->query('SELECT
			ci_user.ID_User,
			ci_user.Nm_User,
			ci_user.Username,
			ci_user.Password,
			ci_user.Email,
			ci_user.Auth_Mode,
			ci_user.ID_Level,
			ci_user.ID_Group,
			ci_user.Admin,
			ci_user.Image,
			ci_user.Image_Raw,
			ci_user.Image_Ext,
			ci_user.`Status`,
			ci_auth_mode.Nm_Auth_Mode,
			ci_user_level.Nm_Level,
			ci_user_group.Nm_Group
			FROM
			ci_user
			Inner Join ci_auth_mode ON ci_auth_mode.Kd_Auth_Mode = ci_user.Auth_Mode
			Inner Join ci_user_level ON ci_user_level.ID_Level = ci_user.ID_Level AND ci_user_level.ID_Web = ci_user.ID_Web
			Inner Join ci_user_group ON ci_user_group.ID_Group = ci_user.ID_Group AND ci_user_group.ID_Web = ci_user.ID_Web
			WHERE
			ci_user.ID_Web = "'.config().'" and ci_user.ID_User = '.$id.'');
		return $a;
	}
	
	function update_profil($id=0){
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() == TRUE){
			$filename	= ''; 
			$raw_name 	= ''; 
			$ori_ext	= '';
			if ($this->input->post('hapus_image') || $_FILES['userfile']['name']){
				$dataimg= $this->get_data_users($id);
				$path = './assets/'.config('main_site').'/images/user/';
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
					if($di->Image != ''){
						file_exists($img_asli) ? unlink($img_asli) : '' ;
						file_exists($img_original) ? unlink($img_original) : '' ;
						file_exists($img_crop) ? unlink($img_crop) : '' ;
						file_exists($img_thumb) ? unlink($img_thumb) : '' ;
						file_exists($img_wm) ? unlink($img_wm) : '' ;
					}
				}
				
				$filename	= ' '; 
				$raw_name 	= ' '; 
				$ori_ext	= ' ';
			}
			
			if ($_FILES['userfile']['name']){
				$config['upload_path'] 	= $upload_path = './assets/'.config('main_site').'/images/user/';
				$config['encrypt_name']	= FALSE;
				$config['remove_spaces']= TRUE;	
				$config['allowed_types']= '*';
				$config['max_size']     = '500';
				$this->upload->initialize($config); 

 				if ($this->upload->do_upload('userfile')) {
					$u	 				= $this->upload->data();
					$new_size 			= 600;
					$thumb 				= TRUE;
					$thumb_size 		= 200;
					$delete_image_ori 	= FALSE;
					$temp				= $upload_path;
					$image_path 		= './assets/'.config('main_site').'/images/user/';
					$watermark			= FALSE;
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
					$filename		= $raw_name.$ori_marker.$ori_ext;
					$in['Image'] = $filename;
					$in['Image_Raw'] = $raw_name;
					$in['Image_Ext'] = $ori_ext;
				}
				else{
					set_alert('error',$this->upload->display_errors());
					redirect(current_url());
				}
			}
			
			$wh['ID_Web'] = config();
			$wh['ID_User'] = $id;
			$in['Nm_User'] = $this->input->post('name');
			$in['Email'] = $email = $this->input->post('email');
			$a = $this->db->update('ci_user',$in,$wh);
			if($a){
				$this->session->set_userdata('userfullname',$this->input->post('name'));
				
				if($email != ''){
					
					$this->load->library('email');
					$this->email->to($email);
					$this->email->from(config('email_sys_address'),config('email_sys_name'));
					$this->email->reply_to(config('email_author'),config('author'));
					$this->email->subject(config('short_title').': Profil anda berhasil diupdate !');
					$this->email->message('Profil anda berhasil diupdate !');
					$this->email->send();
					/* 
					if(!$send){
						set_alert('warning',$this->email->print_debugger());
						redirect(current_url());
					} */
				}
		
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
		}
	}
	
	function update_password($id=0){
		
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passwordconf','Konfirmasi Password','required|matches[password]|min_length[4]');
		if($this->form_validation->run() == TRUE){
			$wh['ID_Web'] = config();
			$wh['ID_User'] = $id;
			$in['Password'] = md5($this->input->post('password'));
			
			$a = $this->db->update('ci_user',$in,$wh);
			if($a){
				set_alert('success','Password berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Password gagal diupdate');
				redirect(current_url());
			}
		}
	}
	
	function send_email(){
		
	}
}
