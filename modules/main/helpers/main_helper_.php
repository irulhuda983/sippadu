<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function berita_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('
	SELECT a.*,b.Nm_Kategori FROM ci_berita_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_berita_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Berita = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('berita/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function informasi_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_informasi_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_informasi_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Info = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('informasi/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function download_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_download_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_download_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Download = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('download/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function dokumen_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_dokumen_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_dokumen_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Dokumen = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('dokumen/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = anchor(fmodule('dokumen'),lang($aa->Nm_Kategori,true),$attr);
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function agenda_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_agenda_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_agenda_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Agenda = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('agenda/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function project_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_project_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_project_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Project = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('project/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function gallery_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_gallery_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_gallery_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Album = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('gallery/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function video_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_video_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_video_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Video = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('video/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function tabel_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_tabel_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_tabel_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Tabel = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('tabel/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function form_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_form_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_form_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Form = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('form/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
		}
		return $h;
}

function banner_kategori($id=0,$url=FALSE,$attr=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_banner_log a LEFT JOIN (select z.ID_Web,z.ID_Kategori,z.Nm_Kategori from ci_form_kategori z union all select 0,0,"Tidak Berkategori") b ON a.ID_Kategori = b.ID_Kategori AND a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.ID_Banner = "'.$id.'"');
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			if($url){
				foreach($a->result() as $aa){
					if($aa->ID_Kategori > 0){
						$k[] = anchor(fmodule('banner/kategori/'.$aa->ID_Kategori.'/'.url_title($aa->Nm_Kategori,'-',TRUE)),lang($aa->Nm_Kategori,true),$attr);
					}
					else{
						$k[] = '<a href="javascript:void(0);" '.$attr.'>'.lang($aa->Nm_Kategori,true).'</a>';
					}
				}
			}
			else{
				foreach($a->result() as $aa){
					$k[] = lang($aa->Nm_Kategori,true);
				}
			}
			$h = implode(', ',$k);
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
	$a = $CI->db->select('Type')->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col');
	$b = $CI->db->where('ID_Web',config())->where('ID_Form',$ID_Form)->where('ID_Col',$ID_Col)->get('ci_form_col_option');
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$Type = $aa->Type;
	}
	
	$h = '';
	switch($Type){
		case 1:
			$h .= form_input('form[]',set_value('form[]',$set_value),'class="form-control searchTextContainer searchInput" placeholder=".........."');
			break;
		case 2:
			$h .= form_textarea('form[]',set_value('form[]',$set_value),'class="searchTextContainer searchInput" style="width:100%;"');
			break;
		case 3:
			$h .= form_upload('form[]',set_value('form[]',$set_value),'class="filestyle searchTextContainer searchInput" data-buttonText="Find file" data-iconName="fa fa-inbox"');
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
					
					$h .= '<label class="checkbox checkbox-custom-alt"><input type="radio" name="form[]" value="'.$bb->Nm_Option.'" '.$set.' class="form-control searchInput"/><i></i> '.$bb->Nm_Option.'</label>&nbsp;&nbsp;&nbsp;';
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
					
					$h .= '<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type="checkbox" name="form[]" value="'.$bb->Nm_Option.'" '.$set.'/><i></i> '.$bb->Nm_Option.'</label>&nbsp;&nbsp;&nbsp;';
				}
			}
			break;
		case 6:
			$op = array();
			if($b->num_rows() > 0){
				$op['0'] = '- Pilih -';
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
			
			$h .= form_dropdown('form[]',$op,set_value('form[]',$set),'class="searchTextContainer searchInput"');
			break;
		default:
			$h .= '';
			break;
	}
	
	return $h;
}

function create_iframe_video($ID_Video=0,$width='300',$height='180',$click=TRUE,$autoplay=FALSE){
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
			$style = ($click ? '' : 'style="pointer-events: none;"');
			$link_ori = str_replace('watch?v=','embed/',$URL);
			$link = ($autoplay ? $link_ori.'?autoplay=1' : $link_ori);
			$h = '<iframe width="'.$width.'" height="'.$height.'" src="'.$link.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen '.$style.'></iframe>';
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
	$h .= level_menu_option(0,0,$selected,$except,$category);
	$h .= '</select>';
	return $h;
}

function level_menu_option($parent=0,$level=0,$selected=0,$except=0,$category=''){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Web',config())->where('ID_Parent',$parent)->like('ID_Kategori',$category)->where('ID_Menu !=',$except)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		foreach($data->result() as $d){
			$h .= '<option value="'.$d->ID_Menu.'" '.($selected==$d->ID_Menu ? 'selected' : '').'>'.tree_menu_level(cek_level_menu($d->ID_Menu)).$d->Nm_Menu.'</option>';
			$h .= level_menu_option($d->ID_Menu,cek_level_menu($d->ID_Menu),$selected,$except,$category);
		}
	}
	return $h;
}


function level_menu_tabel($parent=0,$level=0){
	$CI =& get_instance();
	$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Web',config())->where('ID_Parent',$parent)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		foreach($data->result() as $d){
			$h .= '<tr>
						<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Menu).'<i></i></label></td>
						<td>'.tree_menu_level(cek_level_menu($d->ID_Menu)).$d->Nm_Menu.' </td>
						<td>'.form_input('Sort[]',set_value('Sort[]',$d->Sort_Order),'style="width:50px;text-align:right;"').form_hidden('ID_Menu[]',$d->ID_Menu).'</td>
						<td>'.$d->Hits.'</td> 
						<td align="center">'.icon_status($d->Status).'</td>
						<td align="center">'.icon_edit(site_url(fmodule('web/menu_edit/'.$d->ID_Menu))).'</td>
					</tr>';
			$h .= level_menu_tabel($d->ID_Menu,cek_level_menu($d->ID_Menu));
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

function cek_top_menu($id=0){
	$CI =& get_instance();
	//$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
	$h = 0;
	if($data->num_rows() > 0){
		$d = $data->row();
		if(ifnull($d->ID_Parent,0) == 0){
			$h = $d->ID_Menu;
		}
		else{
			$h = cek_top_menu($d->ID_Parent);
		}
	}
	return $h;
}

function icon_dropdown_menu($id=0,$attribute=''){
	$CI =& get_instance();
	//$db_group = 'default';
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
	$ID_Apps = 0;
	$Jn_Item = '';
	$Format_URI = '';
	$URL = '';
	$ID_Config = 0;
	$Item = 0;
	$Nm_Item = '';
	$Table_Name = 'ci_berita';
	$Field_ID = 'ID_Berita';
	$Field_Name = 'Judul';
	$data = $CI->db->where('ID_Web',config())->where('ID_Menu',$id)->get('ci_menu');
	$d = $data->row();
	$h = site_url(fmodule('menu/open/'.$id.'/'.url_title($d->Nm_Menu,'-',TRUE)));
	if($data->num_rows() > 0){
		$ID_Apps = $d->ID_Apps;
		switch($d->Jn_Menu){
			case '1':
				$h = $h;
				break;
			default:
				if($data->num_rows() > 0){
					$aa = $data->row();
					$ID_Config = $aa->ID_Config;
					$Item = $aa->Item;
				}
				
				$b = $CI->db->query('SELECT * FROM ci_menu_config WHERE ID_Config="'.$ID_Config.'"');
				if($b->num_rows() > 0){
					$bb = $b->row();
					$Jn_Item = $bb->Nm_Config;
					$Format_URI = $bb->Format_URI;
					$Table_Name = $bb->Table_Name;
					$Field_ID = $bb->Field_ID;
					$Field_Name = $bb->Field_Name;
					
					if($Table_Name != ''){
						$c = $CI->db->query('SELECT '.$Field_ID.' AS Field_ID,'.$Field_Name.' AS Field_Name FROM '.$Table_Name.' WHERE ID_Web = '.config().' AND '.$Field_ID.' = "'.$Item.'"');
					}
					else{
						$c = $CI->db->query('SELECT "" AS Field_ID,"- Semua -" AS Field_Name');
					}
				}
				else{
					$c = $CI->db->query('SELECT "" AS Field_ID,"- Semua -" AS Field_Name');
				}
				
				if($c->num_rows() > 0){
					$cc = $c->row();
					$Nm_Item = $cc->Field_Name;
				}
				
				$URL = str_replace(array('{id}','{uri_string}'),array($Item,url_title($Nm_Item,'-',TRUE)),$Format_URI);
				
				$h = apps_url($ID_Apps,fmodule($URL));
				if($ID_Apps == 0 AND (substr_count($d->URL,'http://') || substr_count($d->URL,'https://'))){
					$h = $d->URL;
				}
				else if($ID_Apps == 0){
					$h = site_url(fmodule($d->URL));
				}
				break;
			/* case 3:
				//$h = str_replace(array('http://','https://'),'',$d->URL);
				$h = apps_url($ID_Apps,fmodule($d->URL));
				if(substr_count($d->URL,'http://') || substr_count($d->URL,'https://')){
					$h = $d->URL;
				} */
		}
	}
	return $h;
}

function child_menu($id=0){
	$CI =& get_instance();
	//$db_group = 'default';
	//$db = $CI->load->database('default',TRUE);
	$data = $CI->db->order_by('Sort_Order','asc')->where('ID_Web',config())->where('ID_Parent',$id)->where('Status',1)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		$h .= '<div class="dropdown " aria-hidden="true"><ul role="menu">';
		foreach($data->result() as $d){
			$h .= '<li tabindex="-1"><a tabindex="0" href="javascript:void(0);"  onclick="window.location.href=\''.site_url(fmodule('menu/open/'.$d->ID_Menu.'/'.url_title($d->Nm_Menu,'-',TRUE))).'\'" role="menuitem">'.lang($d->Nm_Menu,TRUE).'</a></li>';
		}
		$h .= '</ul></div>';
	}
	return $h;
}

function autolink_berita($id=0){
	$CI =& get_instance();
	$data = $CI->db->where('ID_Web',config())->where('ID_Berita',$id)->get('ci_berita');
	
	$h = site_url(fmodule('berita/open/'.$id));
	if($data->num_rows() > 0){
		$d = $data->row();
		$h = site_url(fmodule('berita/open/'.$id.'/'.url_title($d->Judul,'-',TRUE)));
	}
	return $h;
}

function autolink_agenda($id=0){
	$CI =& get_instance();
	$data = $CI->db->where('ID_Web',config())->where('ID_Agenda',$id)->get('ci_agenda');
	
	$h = site_url(fmodule('agenda/open/'.$id));
	if($data->num_rows() > 0){
		$d = $data->row();
		$h = site_url(fmodule('agenda/open/'.$id.'/'.url_title($d->Judul,'-',TRUE)));
	}
	return $h;
}

function autolink_informasi($id=0){
	$CI =& get_instance();
	$data = $CI->db->where('ID_Web',config())->where('ID_Info',$id)->get('ci_informasi');
	
	$h = site_url(fmodule('informasi/open/'.$id));
	if($data->num_rows() > 0){
		$d = $data->row();
		$h = site_url(fmodule('informasi/open/'.$id.'/'.url_title($d->Judul,'-',TRUE)));
	}
	return $h;
}

function data_menu_bawah($ID_Kategori=0){
	$CI =& get_instance();
	$data = $CI->db->order_by('Sort_Order','asc')->order_by('ID_Menu','asc')->where('Status',1)->where('ID_Parent',0)->where('ID_Web',config())->where('ID_Kategori',$ID_Kategori)->get('ci_menu');
	return $data;
}

function LblTrack($id=''){
	switch($id){
		case '1':
			$h = 'win ';
			break;
		case '0':
			$h = 'lose ';
			break;
		default:
			$h = 'lose ';
			break;
	}
	return $h;
}

function LblProses($id=''){
	switch($id){
		case '1':
			$h = 'Selesai Diproses ';
			break;
		case '0':
			$h = 'Belum Diproses ';
			break;
		default:
			$h = 'Belum Diproses ';
			break;
	}
	return $h;
}

function data_banner(){
	$CI =& get_instance();
	$a = $CI->db->order_by('Time','desc')->where('ID_Web',config())->where('Status',1)->get('ci_banner');
	return $a;
}

function data_berita($limit=0,$offset=0){
	$CI =& get_instance();
	$a = $CI->db->order_by('Time','desc')->where('ID_Web',config())->where('Status',1)->get('ci_berita',$limit,$offset);
	return $a;
}

function data_informasi($limit=0,$offset=0){
	$CI =& get_instance();
	$a = $CI->db->order_by('Time','desc')->where('ID_Web',config())->where('Status',1)->get('ci_informasi',$limit,$offset);
	return $a;
}

function data_widget($id=0,$limit=0,$offset=0){
	$CI =& get_instance();
	$q_limit = '';
	$q_where = ' AND b.ID_Widget NOT IN(1) ';
	$q_order = ' ORDER BY a.Sort_Order ASC';
	
	if($limit){
		$q_limit = 'LIMIT '.$offset.','.$limit.'';
	}
	
	if($id>0){
		$q_where = ' AND b.ID_Widget = '.$id;
	}
	
	$a = $CI->db->query('SELECT b.Nm_Widget,b.Deskripsi,b.Source FROM ci_widget_log a inner join ci_widget b on a.ID_Widget = b.ID_Widget WHERE a.ID_Web = '.config().' AND b.Status = 1  '.$q_where.' '.$q_order.' '.$q_limit.'');
	return $a;
}

function data_slide($limit=0,$offset=0){
	$CI =& get_instance();
	$a = $CI->db->order_by('Time','desc')->where('ID_Web',config())->where('Status',1)->get('ci_slide',$limit,$offset);
	return $a;
}

function data_gallery($category=0,$limit=0,$offset=0){
	$CI =& get_instance();
	$q_limit = '';
	$q_where = '';
	$q_order = 'ORDER BY a.Time DESC';
	
	if($limit){
		$q_limit = ' LIMIT '.$offset.','.$limit.' ';
	}
	
	if($category > 0){
		$q_where .= ' AND x.ID_Kategori = "'.$category.'" ';
	}
			
	$a = $CI->db->query('select a.*,(select count(b.ID) from ci_gallery b where b.ID_Album = a.ID_Album and b.ID_Web = a.ID_Web) as JmlFoto,(SELECT Image_Raw FROM ci_gallery c WHERE c.ID_Web = a.ID_Web and c.ID_Album = a.ID_Album ORDER BY c.Cover,c.ID DESC LIMIT 0,1) as Cover_Raw,(SELECT Image_Ext FROM ci_gallery c WHERE c.ID_Web = a.ID_Web and c.ID_Album = a.ID_Album ORDER BY c.Cover,c.ID DESC LIMIT 0,1) as Cover_Ext from ci_gallery_album a inner join ci_gallery_log x ON a.ID_Album = x.ID_Album AND a.ID_Web = x.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
	return $a;
}

function data_video($category=0,$limit=0,$offset=0){
	$CI =& get_instance();
	$q_limit = '';
	$q_where = '';
	$q_order = 'ORDER BY a.Time DESC';
	
	if($limit){
		$q_limit = 'LIMIT '.$offset.','.$limit.'';
	}
		
	$tbl_category = '(SELECT ID_Web,ID_Video FROM ci_video_log WHERE ID_Web = "'.config().'" GROUP BY ID_Video)';
	if($category){
		$tbl_category = '(SELECT * FROM ci_video_log WHERE ID_Web = "'.config().'" and ID_Kategori = '.$category.')';
	}
	
	
	$a = $CI->db->query('SELECT a.*,b.Nm_User,b.Username FROM '.$tbl_category.' c INNER JOIN ci_video a ON c.ID_Video = a.ID_Video and c.ID_Web = a.ID_Web LEFT JOIN ci_user b ON a.Author = b.ID_User and a.ID_Web = b.ID_Web WHERE a.ID_Web = '.config().' AND a.Status > 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
	return $a;
}