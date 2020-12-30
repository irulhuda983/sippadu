<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function DataAkses($userid=0){
	$CI =& get_instance();
	$db_group = $CI->db->groupname;
	$db = $CI->load->database($db_group,TRUE);
	$a = $db->query('CALL '.dbprefix().'sp_HakAkses('.$userid.')');
	$d = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d[] = $aa->Kd_Modul;
		}
	}
	return $d;
}


function PageAkses($modul=0,$data=array(),$redirect=TRUE){
	$cek = in_array($modul,$data);
	$h = 1;
	if($cek == FALSE){
		if($redirect){
			set_alert('error','Error 404: Anda tidak berhak mengakses halaman ini');
			redirect(fmodule());
		}
		else{
			$h = 0;
		}
	}
	return $h;
}

function GroupModulAkses($modul=0,$data=array(),$string=''){
	$x = array();
	if(is_array($modul)){
		foreach($modul as $m){
			$x[] = in_array($m,$data);
		}
		$cek = array_sum($x);
	}
	else{
		$cek = in_array($modul,$data);
	}
	
	$h = '';
	if($cek > 0){
		$h = $string;
	}
	return $h;
	
}


function ModulAkses($modul=0,$data=array(),$string=''){
	$cek = in_array($modul,$data);
	$h = '';
	if($cek == TRUE){
		$h = $string;
	}
	return $h;
}

function GroupMenuAkses($modul=0,$data=array(),$string=''){
	$x = array();
	if(is_array($modul)){
		foreach($modul as $m){
			$x[] = in_array($m,$data);
		}
		$cek = array_sum($x);
	}
	else{
		$cek = in_array($modul,$data);
	}
	
	$h = '';
	if($cek > 0){
		$h = $string;
	}
	return $h;
	
}

function MenuAkses($modul=0,$data=array(),$string=''){
	//$h = akses_modul($modul,$string);
	$cek = in_array($modul,$data);
	$h = '';
	if($cek > 0){
		$h = $string;
	}
	return $h;
}


function cek_modul_akses($user=0,$modul=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_User',$user)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_user');
	$h = 0;
	if($a->num_rows() > 0){
		$h = 1;
	}
	return $h;
}

function level_modul_akses($user=0,$modul=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Level',$user)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_level');
	$h = 0;
	if($a->num_rows() > 0){
		$h = 1;
	}
	return $h;
}

function group_modul_akses($user=0,$modul=0){
	$CI =& get_instance();
	$a = $CI->db->where('ID_Group',$user)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_group');
	$h = 0;
	if($a->num_rows() > 0){
		$h = 1;
	}
	return $h;
}

function akses_modul_group($modul=array(),$string=''){
	$cmodul = count($modul);
	$d = array();
	for($i=0;$i<$cmodul;$i++){
		$d[] = akses_modul($modul[$i]);
	}
	$cek = array_sum($d);
	$h = ($string!='' ? '' : 0);
	if($cek > 0){
		$h = ($string!='' ? $string : 1);
	}
	return $h;
}


function akses_modul($modul=0,$string=''){
	$CI =& get_instance();
	$user = $CI->session->userdata('userid');
	$a = $CI->db->where('ID_User',$user)->get(''.dbprefix().'user');
	$auth_mode = 0;
	$id_level = 0;
	$id_group = 0;
	if($a->num_rows() > 0){
		$aa = $a->row();
		$auth_mode = $aa->Auth_Mode;
		$id_level = $aa->ID_Level;
		$id_group = $aa->ID_Group;
	}
	
	switch($auth_mode){
		case 1:
			$b = $CI->db->where('ID_User',$user)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_user');
			break;
		case 2:
			$b = $CI->db->where('ID_Level',$id_level)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_level');
			break;
		case 3:
			$b = $CI->db->where('ID_Group',$id_group)->where('Kd_Modul',$modul)->get(''.dbprefix().'auth_group');
			break;
	}
	
	$h = '';
	if($b->num_rows() > 0){
		$h = ($string!='' ? $string : 1);
	}
	return $h;
}

function akses_menu($modul=array(),$string=''){
	$cmodul = count($modul);
	$d = array();
	for($i=0;$i<$cmodul;$i++){
		$d[] = akses_sub_menu($modul[$i]);
	}
	$cek = array_sum($d);
	$h = ($string!='' ? '' : 0);
	if($cek > 0){
		$h = ($string!='' ? $string : 1);
	}
	return $h;
}

function akses_sub_menu($modul=0,$string=''){
	$h = akses_modul($modul,$string);
	return $h;
}

function akses_relation_user($user=0,$group=''){
	$CI =& get_instance();
	if($group != ''){
		$CI->db->group_by($group);
	}
	$a = $CI->db->where('ID_User',$user)->get(''.dbprefix().'relation_user_region');
	return $a;
}

function akses_relation_level($user=0){
	$CI =& get_instance();
	$h = 0;
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		$h = $aa->ID_Region;
	}
	else{
		$aa = $b->first_row();
		$h = $aa->ID_Region;
	}
	return $h;
}


function akses_relation_region($user=0,$group=''){
	$CI =& get_instance();
	if($group != ''){
		$CI->db->group_by($group);
	}
	$a = $CI->db->where('ID_User',$user)->get(''.dbprefix().'user');
	$auth_mode = 0;
	$id_level = 0;
	$id_group = 0;
	if($a->num_rows() > 0){
		$aa = $a->row();
		$auth_mode = $aa->Auth_Mode;
		$id_level = $aa->ID_Level;
		$id_group = $aa->ID_Group;
	}
	
	switch($auth_mode){
		case 1:
			$b = $CI->db->where('ID_User',$user)->get(''.dbprefix().'relation_user_region');
			break;
		case 2:
			$b = $CI->db->where('ID_Level',$id_level)->get(''.dbprefix().'relation_level_region');
			break;
		case 3:
			$b = $CI->db->where('ID_Group',$id_group)->get(''.dbprefix().'relation_group_region');
			break;
	}
	
	return $b;
}

function query_akses_filter($field='',$penghubung='AND'){
	$CI =& get_instance();
	$h = '';
	$d = array();
	$i = array();
	$user = $CI->session->userdata('userid');
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($a->result() as $aa){
			//$q[$i][] = '';
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if($aa->Kd_Kecamatan != 0){
				$q[$i][] = $field.'.Kd_Kecamatan = '.$aa->Kd_Kecamatan;
			}
			
			if($aa->Kd_Desa != 0){
				$q[$i][] = $field.'.Kd_Desa = '.$aa->Kd_Desa;
			}
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	elseif($b->num_rows() > 0){
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($b->result() as $aa){
			$q[$i][] = array();
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if($aa->Kd_Kecamatan != 0){
				$q[$i][] = $field.'.Kd_Kecamatan = '.$aa->Kd_Kecamatan;
			}
			
			if($aa->Kd_Desa != 0){
				$q[$i][] = $field.'.Kd_Desa = '.$aa->Kd_Desa;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	else{
		$h = '';
	}
	
	if($h != ''){
		$h = $penghubung.' ('.$h.')';
	}
	return $h;
}

function query_akses_negara($field='',$penghubung='AND'){
	$CI =& get_instance();
	$h = '';
	$d = array();
	$i = array();
	$user = $CI->session->userdata('userid');
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($a->result() as $aa){
			//$q[$i][] = '';
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	elseif($b->num_rows() > 0){
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($b->result() as $aa){
			$q[$i][] = array();
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	else{
		$h = '';
	}
	
	if($h != ''){
		$h = $penghubung.' ('.$h.')';
	}
	return $h;
}

function query_akses_provinsi($field='',$penghubung='AND'){
	$CI =& get_instance();
	$h = '';
	$d = array();
	$i = array();
	$user = $CI->session->userdata('userid');
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($a->result() as $aa){
			//$q[$i][] = '';
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	elseif($b->num_rows() > 0){
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($b->result() as $aa){
			$q[$i][] = array();
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	else{
		$h = '';
	}
	
	if($h != ''){
		$h = $penghubung.' ('.$h.')';
	}
	return $h;
}

function query_akses_kabupaten($field='',$penghubung='AND'){
	$CI =& get_instance();
	$h = '';
	$d = array();
	$i = array();
	$user = $CI->session->userdata('userid');
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($a->result() as $aa){
			//$q[$i][] = '';
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	elseif($b->num_rows() > 0){
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($b->result() as $aa){
			$q[$i][] = array();
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	else{
		$h = '';
	}
	
	if($h != ''){
		$h = $penghubung.' ('.$h.')';
	}
	return $h;
}

function query_akses_kecamatan($field='',$penghubung='AND'){
	$CI =& get_instance();
	$h = '';
	$d = array();
	$i = array();
	$user = $CI->session->userdata('userid');
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($a->result() as $aa){
			//$q[$i][] = '';
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if($aa->Kd_Kecamatan != 0){
				$q[$i][] = $field.'.Kd_Kecamatan = '.$aa->Kd_Kecamatan;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	elseif($b->num_rows() > 0){
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($b->result() as $aa){
			$q[$i][] = array();
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if($aa->Kd_Kecamatan != 0){
				$q[$i][] = $field.'.Kd_Kecamatan = '.$aa->Kd_Kecamatan;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	else{
		$h = '';
	}
	
	if($h != ''){
		$h = $penghubung.' ('.$h.')';
	}
	return $h;
}

function query_akses_desa($field='',$penghubung='AND'){
	$CI =& get_instance();
	$h = '';
	$d = array();
	$i = array();
	$user = $CI->session->userdata('userid');
	$a = akses_relation_user($user);
	$b = akses_relation_region($user);
	if($a->num_rows() > 0){
		
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($a->result() as $aa){
			//$q[$i][] = '';
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if($aa->Kd_Kecamatan != 0){
				$q[$i][] = $field.'.Kd_Kecamatan = '.$aa->Kd_Kecamatan;
			}
			
			if($aa->Kd_Desa != 0){
				$q[$i][] = $field.'.Kd_Desa = '.$aa->Kd_Desa;
			}
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	elseif($b->num_rows() > 0){
		$q = array();
		$r = array();
		$i = 0;
		$q[$i] = array();
		foreach($b->result() as $aa){
			$q[$i][] = array();
			if($aa->Kd_Negara != 0){
				$q[$i][] = $field.'.Kd_Negara = '.$aa->Kd_Negara;
			}
			
			if($aa->Kd_Provinsi != 0){
				$q[$i][] = $field.'.Kd_Provinsi = '.$aa->Kd_Provinsi;
			}
			
			if($aa->Kd_Kabupaten != 0){
				$q[$i][] = $field.'.Kd_Kabupaten = '.$aa->Kd_Kabupaten;
			}
			
			if($aa->Kd_Kecamatan != 0){
				$q[$i][] = $field.'.Kd_Kecamatan = '.$aa->Kd_Kecamatan;
			}
			
			if($aa->Kd_Desa != 0){
				$q[$i][] = $field.'.Kd_Desa = '.$aa->Kd_Desa;
			}
			
			if(is_array($q[$i])){
				$imp = implode(' AND ',$q[$i]);
				$r[] = ($imp!='' ? '('.$imp.')' : '');
			}
			++$i;
		}
		$h = implode(' OR ',$r);
	}
	else{
		$h = '';
	}
	
	if($h != ''){
		$h = $penghubung.' ('.$h.')';
	}
	return $h;
}

function Get_Kd_Negara($Kd=0){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Negara',$Kd)->get(''.dbprefix().'negara');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['Kd_Negara'] = $aa->Kd_Negara;
			$h['Nm_Negara'] = $aa->Nm_Negara;
		}
	}
	return $h;
}

function Get_Kd_Provinsi($Kd=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	'.dbprefix().'provinsi.Kd_Negara,
	'.dbprefix().'provinsi.Kd_Provinsi,
	'.dbprefix().'negara.Nm_Negara,
	'.dbprefix().'provinsi.Nm_Provinsi
	FROM
	'.dbprefix().'provinsi
	Inner Join '.dbprefix().'negara ON '.dbprefix().'provinsi.Kd_Negara = '.dbprefix().'negara.Kd_Negara WHERE '.dbprefix().'provinsi.Kd_Provinsi = '.$Kd.'');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['Kd_Negara'] = $aa->Kd_Negara;
			$h['Nm_Negara'] = $aa->Nm_Negara;
			$h['Kd_Provinsi'] = $aa->Kd_Provinsi;
			$h['Nm_Provinsi'] = $aa->Nm_Provinsi;
		}
	}
	return $h;
}

function Get_Kd_Kabupaten($Kd=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	'.dbprefix().'kabupaten.Kd_Negara,
	'.dbprefix().'kabupaten.Kd_Provinsi,
	'.dbprefix().'kabupaten.Kd_Kabupaten,
	'.dbprefix().'kabupaten.Nm_Kabupaten,
	'.dbprefix().'provinsi.Nm_Provinsi,
	'.dbprefix().'negara.Nm_Negara
	FROM
	'.dbprefix().'kabupaten
	Inner Join '.dbprefix().'provinsi ON '.dbprefix().'kabupaten.Kd_Negara = '.dbprefix().'provinsi.Kd_Negara AND '.dbprefix().'kabupaten.Kd_Provinsi = '.dbprefix().'provinsi.Kd_Provinsi
	Inner Join '.dbprefix().'negara ON '.dbprefix().'kabupaten.Kd_Negara = '.dbprefix().'negara.Kd_Negara WHERE '.dbprefix().'kabupaten.Kd_Kabupaten = '.$Kd.'
');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['Kd_Negara'] = $aa->Kd_Negara;
			$h['Nm_Negara'] = $aa->Nm_Negara;
			$h['Kd_Provinsi'] = $aa->Kd_Provinsi;
			$h['Nm_Provinsi'] = $aa->Nm_Provinsi;
			$h['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
			$h['Nm_Kabupaten'] = $aa->Nm_Kabupaten;
		}
	}
	return $h;
}

function Get_Kd_Kecamatan($Kd=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	'.dbprefix().'kecamatan.Kd_Negara,
	'.dbprefix().'kecamatan.Kd_Provinsi,
	'.dbprefix().'kecamatan.Kd_Kabupaten,
	'.dbprefix().'kecamatan.Kd_Kecamatan,
	'.dbprefix().'kecamatan.Nm_Kecamatan,
	'.dbprefix().'kabupaten.Nm_Kabupaten,
	'.dbprefix().'provinsi.Nm_Provinsi,
	'.dbprefix().'negara.Nm_Negara
	FROM
	'.dbprefix().'kecamatan
	Inner Join '.dbprefix().'kabupaten ON '.dbprefix().'kecamatan.Kd_Negara = '.dbprefix().'kabupaten.Kd_Negara AND '.dbprefix().'kecamatan.Kd_Provinsi = '.dbprefix().'kabupaten.Kd_Provinsi AND '.dbprefix().'kecamatan.Kd_Kabupaten = '.dbprefix().'kabupaten.Kd_Kabupaten
	Inner Join '.dbprefix().'provinsi ON '.dbprefix().'kecamatan.Kd_Negara = '.dbprefix().'provinsi.Kd_Negara AND '.dbprefix().'kecamatan.Kd_Provinsi = '.dbprefix().'provinsi.Kd_Provinsi
	Inner Join '.dbprefix().'negara ON '.dbprefix().'kecamatan.Kd_Negara = '.dbprefix().'negara.Kd_Negara WHERE '.dbprefix().'kecamatan.Kd_Kecamatan = '.$Kd.'
	');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['Kd_Negara'] = $aa->Kd_Negara;
			$h['Nm_Negara'] = $aa->Nm_Negara;
			$h['Kd_Provinsi'] = $aa->Kd_Provinsi;
			$h['Nm_Provinsi'] = $aa->Nm_Provinsi;
			$h['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
			$h['Nm_Kabupaten'] = $aa->Nm_Kabupaten;
			$h['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
			$h['Nm_Kecamatan'] = $aa->Nm_Kecamatan;
		}
	}
	return $h;
}

function Get_Kd_Desa($Kd=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	'.dbprefix().'desa.Kd_Negara,
	'.dbprefix().'desa.Kd_Provinsi,
	'.dbprefix().'desa.Kd_Kabupaten,
	'.dbprefix().'desa.Kd_Kecamatan,
	'.dbprefix().'desa.Kd_Desa,
	'.dbprefix().'desa.Nm_Desa,
	'.dbprefix().'kecamatan.Nm_Kecamatan,
	'.dbprefix().'kabupaten.Nm_Kabupaten,
	'.dbprefix().'provinsi.Nm_Provinsi,
	'.dbprefix().'negara.Nm_Negara
	FROM
	'.dbprefix().'desa
	Inner Join '.dbprefix().'kecamatan ON '.dbprefix().'desa.Kd_Negara = '.dbprefix().'kecamatan.Kd_Negara AND '.dbprefix().'desa.Kd_Provinsi = '.dbprefix().'kecamatan.Kd_Provinsi AND '.dbprefix().'desa.Kd_Kabupaten = '.dbprefix().'kecamatan.Kd_Kabupaten AND '.dbprefix().'desa.Kd_Kecamatan = '.dbprefix().'kecamatan.Kd_Kecamatan
	Inner Join '.dbprefix().'kabupaten ON '.dbprefix().'desa.Kd_Negara = '.dbprefix().'kabupaten.Kd_Negara AND '.dbprefix().'desa.Kd_Provinsi = '.dbprefix().'kabupaten.Kd_Provinsi AND '.dbprefix().'desa.Kd_Kabupaten = '.dbprefix().'kabupaten.Kd_Kabupaten
	Inner Join '.dbprefix().'provinsi ON '.dbprefix().'desa.Kd_Negara = '.dbprefix().'provinsi.Kd_Negara AND '.dbprefix().'desa.Kd_Provinsi = '.dbprefix().'provinsi.Kd_Provinsi
	Inner Join '.dbprefix().'negara ON '.dbprefix().'desa.Kd_Negara = '.dbprefix().'negara.Kd_Negara WHERE '.dbprefix().'desa.Kd_Desa = '.$Kd.'
	');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['Kd_Negara'] = $aa->Kd_Negara;
			$h['Nm_Negara'] = $aa->Nm_Negara;
			$h['Kd_Provinsi'] = $aa->Kd_Provinsi;
			$h['Nm_Provinsi'] = $aa->Nm_Provinsi;
			$h['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
			$h['Nm_Kabupaten'] = $aa->Nm_Kabupaten;
			$h['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
			$h['Nm_Kecamatan'] = $aa->Nm_Kecamatan;
			$h['Kd_Desa'] = $aa->Kd_Desa;
			$h['Nm_Desa'] = $aa->Nm_Desa;
		}
	}
	return $h;
}

function Get_Kd_KK($Kd=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	'.dbprefix().'kk.Kd_Negara,
	'.dbprefix().'kk.Kd_Provinsi,
	'.dbprefix().'kk.Kd_Kabupaten,
	'.dbprefix().'kk.Kd_Kecamatan,
	'.dbprefix().'kk.Kd_Desa,
	'.dbprefix().'kk.Kd_Dusun,
	'.dbprefix().'kk.RT,
	'.dbprefix().'kk.RW,
	'.dbprefix().'kk.No_KK,
	'.dbprefix().'kk.NIK,
	'.dbprefix().'kk.Alamat,
	'.dbprefix().'kk.Verifikasi,
	'.dbprefix().'kk.`Status`,
	'.dbprefix().'negara.Nm_Negara,
	'.dbprefix().'provinsi.Nm_Provinsi,
	'.dbprefix().'kabupaten.Nm_Kabupaten,
	'.dbprefix().'kecamatan.Nm_Kecamatan,
	'.dbprefix().'desa.Nm_Desa,
	'.dbprefix().'dusun.Nm_Dusun
	FROM
	'.dbprefix().'kk
	Inner Join '.dbprefix().'negara ON '.dbprefix().'negara.Kd_Negara = '.dbprefix().'kk.Kd_Negara
	Inner Join '.dbprefix().'provinsi ON '.dbprefix().'provinsi.Kd_Negara = '.dbprefix().'kk.Kd_Negara AND '.dbprefix().'provinsi.Kd_Provinsi = '.dbprefix().'kk.Kd_Provinsi
	Inner Join '.dbprefix().'kabupaten ON '.dbprefix().'kabupaten.Kd_Negara = '.dbprefix().'kk.Kd_Negara AND '.dbprefix().'kabupaten.Kd_Provinsi = '.dbprefix().'kk.Kd_Provinsi AND '.dbprefix().'kabupaten.Kd_Kabupaten = '.dbprefix().'kk.Kd_Kabupaten
	Inner Join '.dbprefix().'kecamatan ON '.dbprefix().'kecamatan.Kd_Negara = '.dbprefix().'kk.Kd_Negara AND '.dbprefix().'kecamatan.Kd_Provinsi = '.dbprefix().'kk.Kd_Provinsi AND '.dbprefix().'kecamatan.Kd_Kabupaten = '.dbprefix().'kk.Kd_Kabupaten AND '.dbprefix().'kecamatan.Kd_Kecamatan = '.dbprefix().'kk.Kd_Kecamatan
	Inner Join '.dbprefix().'desa ON '.dbprefix().'desa.Kd_Negara = '.dbprefix().'kk.Kd_Negara AND '.dbprefix().'desa.Kd_Provinsi = '.dbprefix().'kk.Kd_Provinsi AND '.dbprefix().'desa.Kd_Kabupaten = '.dbprefix().'kk.Kd_Kabupaten AND '.dbprefix().'desa.Kd_Kecamatan = '.dbprefix().'kk.Kd_Kecamatan AND '.dbprefix().'desa.Kd_Desa = '.dbprefix().'kk.Kd_Desa
	Left Outer Join '.dbprefix().'dusun ON '.dbprefix().'dusun.Kd_Negara = '.dbprefix().'kk.Kd_Negara AND '.dbprefix().'dusun.Kd_Provinsi = '.dbprefix().'kk.Kd_Provinsi AND '.dbprefix().'dusun.Kd_Kabupaten = '.dbprefix().'kk.Kd_Kabupaten AND '.dbprefix().'dusun.Kd_Kecamatan = '.dbprefix().'kk.Kd_Kecamatan AND '.dbprefix().'dusun.Kd_Desa = '.dbprefix().'kk.Kd_Desa AND '.dbprefix().'dusun.Kd_Dusun = '.dbprefix().'kk.Kd_Dusun WHERE '.dbprefix().'kk.No_KK = '.$Kd.'
	');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['Kd_Negara'] = $aa->Kd_Negara;
			$h['Nm_Negara'] = $aa->Nm_Negara;
			$h['Kd_Provinsi'] = $aa->Kd_Provinsi;
			$h['Nm_Provinsi'] = $aa->Nm_Provinsi;
			$h['Kd_Kabupaten'] = $aa->Kd_Kabupaten;
			$h['Nm_Kabupaten'] = $aa->Nm_Kabupaten;
			$h['Kd_Kecamatan'] = $aa->Kd_Kecamatan;
			$h['Nm_Kecamatan'] = $aa->Nm_Kecamatan;
			$h['Kd_Desa'] = $aa->Kd_Desa;
			$h['Nm_Desa'] = $aa->Nm_Desa;
			$h['Kd_Dusun'] = $aa->Kd_Dusun;
			$h['Nm_Dusun'] = $aa->Nm_Dusun;
			$h['RW'] = $aa->RW;
			$h['RT'] = $aa->RT;
			$h['No_KK'] = $aa->No_KK;
			$h['Alamat'] = $aa->Alamat;
		}
	}
	return $h;
}

function Get_Individu($nik=0,$key=''){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT '.dbprefix().'individu.* FROM '.dbprefix().'individu where '.dbprefix().'individu.NIK = '.$nik.' '.query_akses_filter(''.dbprefix().'individu').' ');
	$d = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Lengkap'] = $aa->Nm_Lengkap;
			$d['No_KK'] = $aa->No_KK;
		}
		$h = $d;
		
		if($key!=''){
			$h = $d[$key];
		}
	}
	else{
		$h = '';
	}
	return $h;
}

function array_print($data=array(),$Key=''){
	$h = $data[$Key];
	return $h;
}

function data_kab_item($Kd_Negara=0,$Kd_Provinsi=0,$Kd_Kabupaten=0,$Kd_Item=0,$null_val='',$No_Rinc=0){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Negara',$Kd_Negara)->where('Kd_Provinsi',$Kd_Provinsi)->where('Kd_Kabupaten',$Kd_Kabupaten)->where('Kd_Item',$Kd_Item)->where('No_Rinc',$No_Rinc)->get(''.dbprefix().'kabupaten_data');
	$h = $null_val;
	if($a->num_rows()){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function data_kec_item($Kd_Negara=0,$Kd_Provinsi=0,$Kd_Kabupaten=0,$Kd_Kecamatan=0,$Kd_Item=0,$null_val='',$No_Rinc=0){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Negara',$Kd_Negara)->where('Kd_Provinsi',$Kd_Provinsi)->where('Kd_Kabupaten',$Kd_Kabupaten)->where('Kd_Kecamatan',$Kd_Kecamatan)->where('Kd_Item',$Kd_Item)->where('No_Rinc',$No_Rinc)->get(''.dbprefix().'kecamatan_data');
	$h = $null_val;
	if($a->num_rows()){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function data_desa_item($Kd_Negara=0,$Kd_Provinsi=0,$Kd_Kabupaten=0,$Kd_Kecamatan=0,$Kd_Desa=0,$Kd_Item=0,$null_val='',$No_Rinc=0){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Negara',$Kd_Negara)->where('Kd_Provinsi',$Kd_Provinsi)->where('Kd_Kabupaten',$Kd_Kabupaten)->where('Kd_Kecamatan',$Kd_Kecamatan)->where('Kd_Desa',$Kd_Desa)->where('Kd_Item',$Kd_Item)->where('No_Rinc',$No_Rinc)->get(''.dbprefix().'desa_data');
	$h = $null_val;
	if($a->num_rows()){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function data_kk_item($Kd_Negara=0,$Kd_Provinsi=0,$Kd_Kabupaten=0,$Kd_Kecamatan=0,$Kd_Desa=0,$No_KK=0,$Kd_Item=0,$null_val='',$No_Rinc=0){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Negara',$Kd_Negara)->where('Kd_Provinsi',$Kd_Provinsi)->where('Kd_Kabupaten',$Kd_Kabupaten)->where('Kd_Kecamatan',$Kd_Kecamatan)->where('Kd_Desa',$Kd_Desa)->where('No_KK',$No_KK)->where('Kd_Item',$Kd_Item)->where('No_Rinc',$No_Rinc)->get(''.dbprefix().'kk_data');
	$h = $null_val;
	if($a->num_rows()){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function data_individu_item($Kd_Negara=0,$Kd_Provinsi=0,$Kd_Kabupaten=0,$Kd_Kecamatan=0,$Kd_Desa=0,$NIK=0,$Kd_Item=0,$null_val='',$No_Rinc=0){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Negara',$Kd_Negara)->where('Kd_Provinsi',$Kd_Provinsi)->where('Kd_Kabupaten',$Kd_Kabupaten)->where('Kd_Kecamatan',$Kd_Kecamatan)->where('Kd_Desa',$Kd_Desa)->where('NIK',$NIK)->where('Kd_Item',$Kd_Item)->where('No_Rinc',$No_Rinc)->get(''.dbprefix().'individu_data');
	$h = $null_val;
	if($a->num_rows()){
		$aa = $a->first_row();
		$h = $aa->Value;
	}
	return $h;
}

function insert_form_input($name='',$region='',$upper=FALSE,$value='',$no_rinc=0,$submit='submit'){
	$CI =& get_instance();
	if($CI->input->post($submit)){
		
		$inputs = ($value != '' ? $value : $CI->input->post($name));
		
		if($upper){
			$input = strtoupper($inputs);
		}
		else{
			$input = $inputs;
		}
		$count = count($input);
		
		switch($region){
			case 1:
				$db = ''.dbprefix().'negara_data';
				$id = str_replace('neg_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Item'] = $id;
				break;
			case 2:
				$db = ''.dbprefix().'provinsi_data';
				$id = str_replace('prov_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Item'] = $id;
				break;
			case 3:
				$db = ''.dbprefix().'kabupaten_data';
				$id = str_replace('kab_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Item'] = $id;
				break;
			case 4:
				$db = ''.dbprefix().'kecamatan_data';
				$id = str_replace('kec_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Item'] = $id;
				break;
			case 5:
				$db = ''.dbprefix().'desa_data';
				$id = str_replace('desa_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Item'] = $id;
				break;
			case 6:
				$db = ''.dbprefix().'dusun_data';
				$id = str_replace('dusun_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['Kd_Item'] = $id;
				break;
			case 7:
				$db = ''.dbprefix().'rw_data';
				$id = str_replace('rw_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['Kd_Item'] = $id;
				break;
			case 8:
				$db = ''.dbprefix().'rt_data';
				$id = str_replace('rt_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['RT'] = $CI->input->post('RT');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['RT'] = $CI->input->post('RT');
				$in2['Kd_Item'] = $id;
				break;
			case 9:
				$db = ''.dbprefix().'kk_data';
				$id = str_replace('kk_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				/*$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['RT'] = $CI->input->post('RT');*/
				$wh['No_KK'] = $CI->input->post('No_KK');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['RT'] = $CI->input->post('RT');
				$in2['No_KK'] = $CI->input->post('No_KK');
				$in2['Kd_Item'] = $id;
				break;
			case 10:
				$db = ''.dbprefix().'individu_data';
				$id = str_replace('individu_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				/*$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['RT'] = $CI->input->post('RT');
				$wh['No_KK'] = $CI->input->post('No_KK');*/
				$wh['NIK'] = $CI->input->post('NIK');
				$wh['Kd_Item'] = $id;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['RT'] = $CI->input->post('RT');
				$in2['No_KK'] = $CI->input->post('No_KK');
				$in2['NIK'] = $CI->input->post('NIK');
				$in2['Kd_Item'] = $id;
				break;
			default:
				$db = '';
				$id = 0;
		}
		
		if($db != ''){
			if(is_array($input)){
				for($i=0;$i<$count;$i++){
					$wh['No_Rinc'] = $i;
					//$in['Value'] = $input[$i];
					//$in['No_Rinc'] = $i;
					
					$in2['No_Rinc'] = $i;
					$in2['Value'] = $input[$i];
					$cek = $CI->db->get_where($db,$wh)->num_rows();
					if($cek > 0){
						$CI->db->delete($db,$wh);
					}
					$a = $CI->db->insert($db,$in2);
					return TRUE;
					/*if($cek > 0){
						$a = $CI->db->update($db,$in,$wh);
						return TRUE;
					}
					else{
						$a = $CI->db->insert($db,$in2);
						return TRUE;
					}*/
					//set_alert('success',$cek.' array');
					//redirect(current_url());
				}
			}
			else{
				$wh['No_Rinc'] = $no_rinc;
				$in['Value'] = $input;
				$in2['No_Rinc'] = $no_rinc;
				$in2['Value'] = $input;
				$cek = $CI->db->get_where($db,$wh)->num_rows();
				if($cek > 0){
					$CI->db->delete($db,$wh);
				}
				$a = $CI->db->insert($db,$in2);
				return TRUE;
				/*if($cek > 0){
					$a = $CI->db->update($db,$in,$wh);
					return TRUE;
				}
				else{
					$a = $CI->db->insert($db,$in2);
					return TRUE;
				}*/
				//set_alert('success',$cek);
				//redirect(current_url());
			}
		}
		else{
			return FALSE;
		}
	}
}

function insert_multiple_data($id=0,$Kd_Item=0,$region='',$upper=FALSE,$value='',$no_rinc=0,$submit='submit'){
	$CI =& get_instance();
	if($CI->input->post($submit)){
		
		
		if($upper){
			$input = strtoupper($value);
		}
		else{
			$input = $value;
		}
		$count = count($input);
		
		switch($region){
			case 1:
				$db = ''.dbprefix().'negara_data';
				$wh['Kd_Negara'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 2:
				$db = ''.dbprefix().'provinsi_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 3:
				$db = ''.dbprefix().'kabupaten_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 4:
				$db = ''.dbprefix().'kecamatan_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 5:
				$db = ''.dbprefix().'desa_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 6:
				$db = ''.dbprefix().'dusun_data';
				//$id = str_replace('dusun_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Dusun'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 7:
				$db = ''.dbprefix().'rw_data';
				//$id = str_replace('rw_item_','',$name);
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 8:
				$db = ''.dbprefix().'rt_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['RT'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['RT'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 9:
				$db = ''.dbprefix().'kk_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				/*$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['RT'] = $CI->input->post('RT');*/
				$wh['No_KK'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['RT'] = $CI->input->post('RT');
				$in2['No_KK'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			case 10:
				$db = ''.dbprefix().'individu_data';
				$wh['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$wh['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$wh['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$wh['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$wh['Kd_Desa'] = $CI->input->post('Kd_Desa');
				/*$wh['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$wh['RW'] = $CI->input->post('RW');
				$wh['RT'] = $CI->input->post('RT');
				$wh['No_KK'] = $CI->input->post('No_KK');*/
				$wh['NIK'] = $id;
				$wh['Kd_Item'] = $Kd_Item;
				
				$in2['Kd_Negara'] = $CI->input->post('Kd_Negara');
				$in2['Kd_Provinsi'] = $CI->input->post('Kd_Provinsi');
				$in2['Kd_Kabupaten'] = $CI->input->post('Kd_Kabupaten');
				$in2['Kd_Kecamatan'] = $CI->input->post('Kd_Kecamatan');
				$in2['Kd_Desa'] = $CI->input->post('Kd_Desa');
				$in2['Kd_Dusun'] = $CI->input->post('Kd_Dusun');
				$in2['RW'] = $CI->input->post('RW');
				$in2['RT'] = $CI->input->post('RT');
				$in2['No_KK'] = $CI->input->post('No_KK');
				$in2['NIK'] = $id;
				$in2['Kd_Item'] = $Kd_Item;
				break;
			default:
				$db = '';
				$id = 0;
		}
		
		if($db != ''){
			if(is_array($input)){
				for($i=0;$i<$count;$i++){
					$wh['No_Rinc'] = $i;
					//$in['Value'] = $input[$i];
					//$in['No_Rinc'] = $i;
					
					$in2['No_Rinc'] = $i;
					$in2['Value'] = $input[$i];
					$cek = $CI->db->get_where($db,$wh)->num_rows();
					if($cek > 0){
						$CI->db->delete($db,$wh);
					}
					$a = $CI->db->insert($db,$in2);
					return TRUE;
					/*if($cek > 0){
						$a = $CI->db->update($db,$in,$wh);
						return TRUE;
					}
					else{
						$a = $CI->db->insert($db,$in2);
						return TRUE;
					}*/
					//set_alert('success',$cek.' array');
					//redirect(current_url());
				}
			}
			else{
				//$in['Value'] = $input;
				$wh['No_Rinc'] = $no_rinc;
				
				$in2['No_Rinc'] = $no_rinc;
				$in2['Value'] = $input;
				$cek = $CI->db->get_where($db,$wh)->num_rows();
				if($cek > 0){
					$CI->db->delete($db,$wh);
				}
				$a = $CI->db->insert($db,$in2);
				return TRUE;
				/*if($cek > 0){
					$a = $CI->db->update($db,$in,$wh);
					return TRUE;
				}
				else{
					$a = $CI->db->insert($db,$in2);
					return TRUE;
				}*/
				//set_alert('success',$cek);
				//redirect(current_url());
			}
		}
		else{
			return FALSE;
		}
	}
}

function Item_Kabupaten($Kd_Item=0,$key='Nm_Item'){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Item',$Kd_Item)->get(''.dbprefix().'kabupaten_item');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Item'] = $aa->Nm_Item;
			$d['Keterangan'] = $aa->Keterangan;
		}
		if($key!=''){
			$h = $d[$key];
		}
	}
	return $h;
}

function Item_Kecamatan($Kd_Item=0,$key='Nm_Item'){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Item',$Kd_Item)->get(''.dbprefix().'kecamatan_item');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Item'] = $aa->Nm_Item;
			$d['Keterangan'] = $aa->Keterangan;
		}
		if($key!=''){
			$h = $d[$key];
		}
	}
	return $h;
}

function Item_Desa($Kd_Item=0,$key='Nm_Item'){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Item',$Kd_Item)->get(''.dbprefix().'desa_item');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Item'] = $aa->Nm_Item;
			$d['Keterangan'] = $aa->Keterangan;
		}
		if($key!=''){
			$h = $d[$key];
		}
	}
	return $h;
}

function Item_Dusun($Kd_Item=0,$key='Nm_Item'){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Item',$Kd_Item)->get(''.dbprefix().'dusun_item');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Item'] = $aa->Nm_Item;
			$d['Keterangan'] = $aa->Keterangan;
		}
		if($key!=''){
			$h = $d[$key];
		}
	}
	return $h;
}

function Item_KK($Kd_Item=0,$key='Nm_Item'){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Item',$Kd_Item)->get(''.dbprefix().'kk_item');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Item'] = $aa->Nm_Item;
			$d['Keterangan'] = $aa->Keterangan;
		}
		if($key!=''){
			$h = $d[$key];
		}
	}
	return $h;
}

function Item_Individu($Kd_Item=0,$key='Nm_Item'){
	$CI =& get_instance();
	$a = $CI->db->where('Kd_Item',$Kd_Item)->get(''.dbprefix().'individu_item');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d['Nm_Item'] = $aa->Nm_Item;
			$d['Keterangan'] = $aa->Keterangan;
		}
		if($key!=''){
			$h = $d[$key];
		}
	}
	return $h;
}

function MenuQueryGroup($menuactive='filter_0'){
	$CI =& get_instance();
	$a = $CI->db->where('Status',1)->order_by('Nm_Group','asc')->get(''.dbprefix().'query_group');
	$b = '';
	$exp = explode('_',$menuactive);
	if(strpos($menuactive,'qdata')!== false){
		$group = $exp[1];
	}
	else{
		$group = 0;
	}
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$b .= '<li class="'.menuopen('qdata_'.$aa->Kd_Group,'qdata_'.$group).'"><a href="#"><i class="fa fa-caret-right"></i><span class="text">'.$aa->Nm_Group.'</span></a>'.MenuQuery($aa->Kd_Group,$menuactive).'</li>';
		}
	}
	return $b;
}

function MenuQuery($group=0,$menuactive='query_1'){
	$CI =& get_instance();
	$a = $CI->db->where('Status',1)->where('Kd_Group',$group)->order_by('Nm_Query','asc')->get(''.dbprefix().'query');
	$b = '';
	if($a->num_rows() > 0){
		$b .= '<ul>';
		foreach($a->result() as $aa){
			$b .= '<li class="'.menuactive('qdata_'.$aa->Kd_Group.'_'.$aa->Kd_Query,$menuactive).'"><a href="'.site_url(fmodule('query/get/'.$aa->Kd_Query)).'"><i class="fa fa-caret-right"></i><span class="text">'.$aa->Nm_Query.'</span></a></li>';
		}
		$b .= '</ul>';
	}
	return $b;
}


function nama_skpd($Kd_Urusan=0,$Kd_Bidang=0,$Kd_Unit=0,$Kd_Sub=0){
	$CI =& get_instance();
	$sess_db = $CI->session->userdata('sess_db');
	$db = $CI->load->database($sess_db, TRUE);
	$Tahun = $CI->session->userdata('sess_Tahun_Db');
	$a = $db->where('Kd_Urusan',$Kd_Urusan)->where('Kd_Bidang',$Kd_Bidang)->where('Kd_Unit',$Kd_Unit)->where('Kd_Sub',$Kd_Sub)->get('Ref_Sub_Unit');
	$aa = $a->row();
	return $aa->Nm_Sub_Unit;
}

