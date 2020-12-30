<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function berita_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('
	SELECT a.*,b.Nm_Kategori FROM ci_berita_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_berita_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Berita = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function informasi_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_informasi_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_informasi_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Info = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function download_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_download_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_download_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Download = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function dokumen_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_dokumen_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_dokumen_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Dokumen = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function agenda_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_agenda_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_agenda_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Agenda = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function project_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_project_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_project_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Project = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function gallery_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_gallery_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_gallery_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Album = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function video_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_video_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_video_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Video = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}


function grafik_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_grafik_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_grafik_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Grafik = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}


function tabel_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_tabel_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_tabel_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Tabel = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function form_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_form_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_form_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Form = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function banner_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_banner_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_form_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Banner = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function menu_kategori($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT z.Nm_Kategori FROM
	(
	SELECT a.ID_Menu,a.Nm_Menu,b.Nm_Kategori FROM ci_menu a INNER JOIN ci_menu_kategori b ON a.ID_Kategori = b.ID_Kategori WHERE b.ID_Kategori <= 2 AND a.ID_Web = '.config().'
	UNION ALL
	SELECT a.ID_Menu,a.Nm_Menu,b.Nm_Kategori FROM ci_menu a INNER JOIN ci_menu_kategori b ON a.ID_Web = b.ID_Web AND a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE b.ID_Kategori > 2 AND a.ID_Web = '.config().'
	) z WHERE z.ID_Menu = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function anggota_kategori($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_anggota_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_anggota_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Anggota = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = lang($aa->Nm_Kategori,true);
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function get_item_kategori($id=0,$class='berita'){
	$id = ($id=='' ? 0 : $id);
	switch($class){
		case 'berita':
			$h = berita_kategori($id);
			break;
		case 'informasi':
			$h = informasi_kategori($id);
			break;
		case 'download':
			$h = download_kategori($id);
			break;
		case 'dokumen':
			$h = dokumen_kategori($id);
			break;
		case 'agenda':
			$h = agenda_kategori($id);
			break;
		case 'project':
			$h = project_kategori($id);
			break;
		case 'gallery':
			$h = gallery_kategori($id);
			break;
		case 'video':
			$h = video_kategori($id);
			break;
		case 'grafik':
			$h = grafik_kategori($id);
			break;
		case 'tabel':
			$h = tabel_kategori($id);
			break;
		case 'form':
			$h = form_kategori($id);
			break;
		case 'menu':
			$h = menu_kategori($id);
			break;
		default:
			$h = '';
			break;
	}
	return $h;
}

function get_tabel_val($ID_Row=0,$ID_Col=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Web',config())->where('ID_Row',$ID_Row)->where('ID_Col',$ID_Col)->get('ci_tabel_data');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function get_tabel_id($ID_Row=0,$ID_Col=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Web',config())->where('ID_Row',$ID_Row)->where('ID_Col',$ID_Col)->get('ci_tabel_data');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$h = $aa->ID;
	}
	return $h;
}

function get_form_val($ID_Row=0,$ID_Col=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Web',config())->where('ID_Row',$ID_Row)->where('ID_Col',$ID_Col)->get('ci_form_data');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function get_form_id($ID_Row=0,$ID_Col=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Web',config())->where('ID_Row',$ID_Row)->where('ID_Col',$ID_Col)->get('ci_form_data');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$h = $aa->ID;
	}
	return $h;
}

function get_form_ket($ID_Row=0,$ID_Col=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Web',config())->select('Keterangan')->where('ID_Row',$ID_Row)->where('ID_Col',$ID_Col)->get('ci_form_data');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$h = $aa->Keterangan;
	}
	return $h;
}

function create_form($ID_Form=0,$ID_Col=0,$set_value=''){
	$CI =& get_instance();
	$Type = 1;
	$a = $CI->db->where('ID_Web',config())->select('Type')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col');
	$b = $CI->db->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col_option');
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$Type = $aa->Type;
	}
	
	$h = '';
	switch($Type){
		case 1:
			$h .= form_input('form[]',set_value('form[]',$set_value),'class="form-control"');
			break;
		case 2:
			$h .= form_textarea('form[]',set_value('form[]',$set_value),'style="width:100%;"');
			break;
		case 3:
			$h .= form_upload('form[]',set_value('form[]',$set_value),'class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox"');
			break;	
		case 4:
			$h .= '';
			if($b->num_rows() > 0){
				foreach($b->result() as $bb){
					$set = '';
					if($set_value != ''){
						$set = ($bb->Nm_Option==$set_value ? 'checked' : '');
					}
					else if($bb->Default == '1'){
						$set = 'checked';
					}
					
					$h .= '<label class="checkbox checkbox-custom-alt"><input type="radio" name="form[]" value="'.$bb->Nm_Option.'" '.$set.'/><i></i> '.$bb->Nm_Option.'</label>';
				}
			}
			break;
		case 5:
			$h .= '';
			if($b->num_rows() > 0){
				foreach($b->result() as $bb){
					$set = '';
					if($set_value != ''){
						$set = ($bb->Nm_Option==$set_value ? 'checked' : '');
					}
					else if($bb->Default == '1'){
						$set = 'checked';
					}
					
					$h .= '<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type="checkbox" name="form[]" value="'.$bb->Nm_Option.'" '.$set.'/><i></i> '.$bb->Nm_Option.'</label>';
				}
			}
			break;
		case 6:
			$op = array();
			if($b->num_rows() > 0){
				foreach($b->result() as $bb){
					$op[$bb->Nm_Option] = $bb->Nm_Option;
				}
			}
			
			$set = '';
			if($set_value != ''){
				$set = $set_value;
			}
			else{
				$c = $CI->db->select('Nm_Option')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->where('Default',1)->get('ci_form_col_option');
				if($c->num_rows() > 0){
					$cc = $c->first_row();
					$set = $cc->Nm_Option;
				}
			}
			
			$h .= form_dropdown('form[]',$op,set_value('form[]',$set),'class="form-control chosen-select" ');
			break;
		default:
			$h .= '';
			break;
	}
	
	
	return $h;
}

function create_iframe_video($ID_Video=0,$width='300',$height='180'){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Web',config())->where('ID_Video',$ID_Video)->get('ci_video');
	$URL = '';
	$Source = 0;
	if($a->num_rows() > 0){
		$aa = $a->row();
		$URL = $aa->URL;
		$Source = $aa->ID_Source;
	}
	
	switch($Source){
		case 1:
			$link = str_replace('watch?v=','embed/',$URL);
			$h = '<iframe width="'.$width.'" height="'.$height.'" src="'.$link.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
			break;
		default:
			$link = '';
			$h = '';
			break;
	}
	return $h;
}


function level_menu_dropdown($name='',$selected=0,$attribute='',$except=0,$category=''){
	$h	= '<select name="'.$name.'" '.$attribute.'>';
	$h .= '<option value="0" '.($selected==0 ? 'selected' : '').'>Top</option>';
	if($category == '1'){
	$h .= level_menu_option(0,0,$selected,$except,$category);
	}
	$h .= '</select>';
	return $h;
}

function level_menu_option($parent=0,$level=0,$selected=0,$except=0,$category=''){
	$CI =& get_instance();
	$data = $CI->db->where('ID_Web',config())->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Parent',$parent)->like('ID_Kategori',$category)->where('ID_Menu !=',$except)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		foreach($data->result() as $d){
			$h .= '<option value="'.$d->ID_Menu.'" '.($selected==$d->ID_Menu ? 'selected' : '').'>'.tree_menu_level(cek_level_menu($d->ID_Menu)).$d->Nm_Menu.'</option>';
			$h .= level_menu_option($d->ID_Menu,cek_level_menu($d->ID_Menu),$selected,$except,$category);
		}
	}
	return $h;
}


function level_menu_tabel($category=0,$parent=0,$level=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Kategori',$category)->where('ID_Parent',$parent)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		foreach($data->result() as $d){
			$h .= '<tr>
						<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Menu).'<i></i></label></td>
						<td>'.tree_menu_level(cek_level_menu($d->ID_Menu)).$d->Nm_Menu.' </td>
						<td>'.form_input('Sort[]',set_value('Sort[]',$d->Sort_Order),'style="width:50px;text-align:right;"').form_hidden('ID_Menu[]',$d->ID_Menu).'</td>
						<td>'.$d->Hits.'</td> 
						<td align="center">'.icon_status($d->Status).'</td>
						<td align="center">'.icon_edit(site_url(fmodule('menu/edit/'.$d->ID_Menu))).'</td>
					</tr>';
			$h .= level_menu_tabel($category,$d->ID_Menu,cek_level_menu($d->ID_Menu));
		}
	}
	return $h;
}

function cek_level_menu($id=0,$count=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
	$h = $count;
	if($data->num_rows() > 0){
		$d = $data->row();
		if(ifnull($d->ID_Parent,0) == 0){
			$h = $h;
		}
		else{
			$h = cek_level_menu($d->ID_Parent,$h)+1;
		}
	}
	return $h;
}

function icon_dropdown_menu($id=0,$attribute=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->where('ID_Parent',$id)->where('Status',1)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		$h = $attribute;
	}
	return $h;
}

function autolink_menu($id=0){
	$CI =& get_instance();
	//$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
	$d = $data->row();
	$h = site_url(fmodule('menu/open/'.$id.'/'.url_title($d->Nm_Menu,'-',TRUE)));
	if($data->num_rows() > 0){
		$ID_Apps = $d->ID_Apps;
		switch($d->Jn_Menu){
			default:
			$h = $h;
			break;
			case 2:
			$h = apps_url($ID_Apps,fmodule($d->URL));
			if(substr_count($d->URL,'http://') || substr_count($d->URL,'https://')){
				$h = $d->URL;
			}
			break;
			case 3:
			//$h = str_replace(array('http://','https://'),'',$d->URL);
			$h = apps_url($ID_Apps,fmodule($d->URL));
			if(substr_count($d->URL,'http://') || substr_count($d->URL,'https://')){
				$h = $d->URL;
			}
		}
	}
	return $h;
}


function child_menu($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->where('ID_Parent',$id)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		$h .= '<div class="dropdown " aria-hidden="true"><ul role="menu">';
		foreach($data->result() as $d){
			$h .= '<li tabindex="-1"><a tabindex="0" href="'.autolink_menu($d->ID_Menu).'" role="menuitem">'.$d->Nm_Menu.'</a></li>';
		}
		$h .= '</ul></div>';
	}
	return $h;
}


function autolink_berita($id=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->where('ID_Berita',$id)->get('ci_berita');
	
	$h = site_url(fmodule('berita/open/'.$id));
	if($data->num_rows() > 0){
		$d = $data->row();
		$h = site_url(fmodule('berita/open/'.$id.'/'.url_title($d->Judul,'-',TRUE)));
	}
	return $h;
}

function menu_content($keyword='',$ID_Kategori=0){
	$CI =& get_instance();
	switch($keyword){
		case 'menu':
			$a = $CI->db->query('SELECT a.ID_Menu,a.Nm_Menu FROM ci_menu a WHERE a.ID_Web = '.config().' AND a.ID_Kategori = "'.$ID_Kategori.'" AND a.Jn_Menu = 1 AND a.Status = 1  ORDER BY a.Sort_Order,a.ID_Menu ASC');
			break;
		case 'kategori':
			$a = $CI->db->query('
			SELECT b.ID_Kategori,b.Nm_Kategori FROM ci_menu a INNER JOIN 
			(
			SELECT '.config().' as ID_Web,ID_Kategori,Nm_Kategori,Sort_Order FROM ci_menu_kategori WHERE ID_Kategori <= 2 AND Status = 1
			UNION ALL
			SELECT ID_Web,ID_Kategori,Nm_Kategori,Sort_Order FROM ci_menu_kategori WHERE ID_Kategori > 2 AND ID_Web = '.config().' AND Status = 1
			) 
			b ON a.ID_Web = b.ID_Web AND a.ID_Kategori = b.ID_Kategori WHERE a.ID_Web = '.config().' AND a.Jn_Menu = 1 AND a.Status=1 GROUP BY b.ID_Kategori ORDER BY b.Sort_Order,b.ID_Kategori ASC
			');
			break;
		default:
			$a = $CI->db->where('ID_Web',config())->where('Jn_Menu',1)->where('Status',1)->get('ci_menu');
			break;
	}
	return $a;
}
