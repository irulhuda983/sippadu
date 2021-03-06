<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function AuthIzin($userid=0){
	$CI =& get_instance();
	$userid = $CI->session->userdata('userid');
	$ID_Web = config();
	$a = $CI->db->query('CALL sippadu_AksesIzin('.$ID_Web.','.$userid.')');
	$d = array();
	$h = 0;
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$d[] = $aa->Kd_Modul;
		}
		$h = implode(',',$d);
	}
	$a->next_result(); 
	return $h;
}

function sippadu($s=''){
	$nama_pemda			= format_setting(1,1); //'PEMERINTAH KABUPATEN BOJONEGORO';
	$nama_dinas 		= format_setting(1,2); //'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU';
	$alamat_dinas	 	= format_setting(1,3); //'Jl. P. Mas Tumapel No. 01 ( Gedung Pemkab Baru Lantai 1 & 2 )'; //SIMDAWEB
	$nama_kota 			= format_setting(1,4); //'Bojonegoro';
	$nama_kota2			= format_setting(1,5); //'Kabupaten Bojonegoro';
	$nama_kadin			= format_setting(1,6); //'Drs. KAMIDIN, M.Si';	
	$pangkat_kadin		= format_setting(1,7); //'Pembina Utama Muda';	
	$nip_kadin			= format_setting(1,8); //'19611015 198202 1 002';	
	$email_dinas		= format_setting(1,9);
	$web_dinas			= format_setting(1,10);
	$logo_warna			= format_setting(1,11);
	$logo_hp			= format_setting(1,12);
	$ttd_kadin			= format_setting(1,13);
	$ttd_elektronik		= format_setting(1,14);
	$nama_jabatan		= format_setting(1,15);
	
	switch($s){
		case 'nama_pemda':
			$h = $nama_pemda;
		break;
		case 'nama_dinas':
			$h = $nama_dinas;
		break;
		case 'alamat_dinas':
			$h = $alamat_dinas;
		break;
		case 'nama_kota':
			$h = $nama_kota;
		break;
		case 'nama_kota2':
			$h = $nama_kota2;
		break;
		case 'nama_kadin':
			$h = $nama_kadin;
		break;
		case 'pangkat_kadin':
			$h = $pangkat_kadin;
		break;
		case 'nip_kadin':
			$h = $nip_kadin;
		break;
		case 'email_dinas':
			$h = $email_dinas;
		break;
		case 'web_dinas':
			$h = $web_dinas;
		break;
		case 'logo_warna':
			$h = $logo_warna;
		break;
		case 'logo_hp':
			$h = $logo_hp;
		break;
		case 'ttd_kadin':
			$h = $ttd_kadin;
		break;
		case 'ttd_elektronik':
			$h = $ttd_elektronik;
		break;
		case 'nama_jabatan':
			$h = $nama_jabatan;
		break;
		default:
			$h = '';
		break;
	}		
	
	return $h;
}

function pelanggan($id=0,$string='nama'){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('IDPELANGGAN',$id)->get('tbpelanggan');
	if($a->num_rows() > 0){
		$d = $a->row();
		switch($string){
			case 'nama': 		$h = $d->NM_PELANGGAN; break;
			case 'alamat': 		$h = $d->ALAMATPELANGGAN; break;
			case 'tempat_lahir': $h = $d->TEMPAT_LAHIR; break;
			case 'tgl_lahir': 	$h = $d->TGL_LAHIR; break;
			case 'sex': 		$h = $d->SEX; break;
			case 'pekerjaan': 		$h = $d->PEKERJAAN; break;
			case 'provinsi': 	$h = $d->PROVINSI; break;
			case 'kota': 		$h = $d->KOTA; break;
			case 'kecamatan': 	$h = $d->KECAMATAN; break;
			case 'desa': 		$h = $d->DESA; break;
			case 'telepon': 	$h = ($d->TELP != '' ? $d->TELP : '').($d->TELP != '' && $d->NO_HP != '' ? '/' : '').($d->NO_HP != '' ? $d->NO_HP : ''); break;
			case 'email': 		$h = $d->EMAIL; break;
			case 'kitas': 		$h = $d->NOKITAS; break;
			case 'npwp': 		$h = $d->NPWP; break;
			default: 			$h = ''; break;
		}
	}
	return $h;
}

function perusahaan($id=0,$string='nama'){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('IDPERUSAHAAN',$id)->get('tbperusahaan');
	if($a->num_rows() > 0){
		$d = $a->row();
		switch($string){
			case 'nama': 		$h = $d->NM_PERUSAHAAN; break;
			case 'alamat': 		$h = $d->ALAMAT; break;
			case 'idpelanggan': $h = $d->IDPELANGGAN; break;
			case 'provinsi': 	$h = $d->PROVINSI; break;
			case 'kota': 		$h = $d->KOTA; break;
			case 'kecamatan': 	$h = $d->KECAMATAN; break;
			case 'desa': 		$h = $d->DESA; break;
			case 'telepon': 	$h = $d->TELP; break;
			case 'email': 		$h = $d->EMAIL; break;
			case 'web': 		$h = $d->WEB; break;
			case 'npwp': 		$h = $d->NPWP; break;
			case 'jabatan': 	$h = $d->JABATAN; break;
			case 'nilai_modal': 		$h = $d->NILAI_MODAL; break;
			case 'nilai_tanah': 		$h = $d->NILAI_TANAH; break;
			case 'nilai_bangunan': 		$h = $d->NILAI_BANGUNAN; break;
			case 'kelembagaan': 		$h = $d->KELEMBAGAAN; break;
			case 'kbli': 				$h = $d->KBLI; break;
			case 'usaha_pokok': 		$h = $d->KEG_USAHA_POKOK; break;
			case 'kategori_izin': 		$h = substr($d->KATEGORI_IZIN,-1); break;
			default: $h = ''; break;
		}
	}
	return $h;
}

function kelembagaan($string=''){
	$h = '';
	switch(substr($string,-1)){
		case '1': $h = 'MIKRO'; break;
		case '2': $h = 'KECIL'; break;
		case '3': $h = 'MENENGAH'; break;
		case '4': $h = 'BESAR (PERDAGANGAN DALAM NEGERI)'; break;
		case '5': $h = 'BESAR (PERDAGANGAN DALAM NEGERI, EKSPOR, IMPOR)'; break;
		default: $h = ''; break;
	}
	RETURN $h;
}

function status_kantor($string=''){
	$h = '';
	switch(substr($string,-1)){
		case '1': $h = 'Kantor Tunggal'; break;
		case '2': $h = 'Kantor Pusat'; break;
		case '3': $h = 'Kantor Cabang'; break;
		case '4': $h = 'Kantor Pembantu'; break;
		case '5': $h = 'Kantor Perwakilan'; break;
		case '6': $h = 'Kantor Cabang Pembantu'; break;
		case '7': $h = 'Unit Produksi/Pabrik'; break;
		case '8': $h = 'Kantor Kas'; break;
		default: $h = ''; break;
	}
	RETURN $h;
	
}

function op_provinsi($parent=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->order_by('NAMA_PROVINSI','ASC')->get('tbprovinsi');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['0'] = '- Pilih Provinsi -';
			$h[$aa->ID_PROVINSI] = $aa->NAMA_PROVINSI;
		}
	}
	else{
		$h['0'] = '- Pilih Provinsi -';
	}
	return $h;
}

function op_kota($parent=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_PROVINSI',$parent)->order_by('NAMA_KOTA','ASC')->get('tbkota');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['0'] = '- Pilih Kota -';
			$h[$aa->ID_KOTA] = $aa->NAMA_KOTA;
		}
	}
	else{
		$h['0'] = '- Pilih Kota -';
	}
	return $h;
}

function op_kecamatan($parent=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_KOTA',$parent)->order_by('NAMA_KECAMATAN','ASC')->get('tbkecamatan');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['0'] = '- Pilih Kecamatan -';
			$h[$aa->ID_KECAMATAN] = $aa->NAMA_KECAMATAN;
		}
	}
	else{
		$h['0'] = '- Pilih Kecamatan -';
	}
	return $h;
}


function op_desa($parent=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_KECAMATAN',$parent)->order_by('NAMA_DESA','ASC')->get('tbdesa');
	$h = array();
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h['0'] = '- Pilih Desa -';
			$h[$aa->ID_DESA] = $aa->NAMA_DESA;
		}
	}
	else{
		$h['0'] = '- Pilih Desa -';
	}
	return $h;
}

function provinsi($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_PROVINSI',$id)->get('tbprovinsi');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->row();
		$h = $aa->NAMA_PROVINSI;
	}
	return $h;
}

function kota($id=0,$ext=TRUE){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_KOTA',$id)->get('tbkota');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->row();
		$h = $aa->NAMA_KOTA;
	}
	$h = ($ext ? $h : str_replace(array('Kabupaten ','Kota '),array('',''),$h));
	return $h;
}

function kecamatan($id=0,$ext=TRUE){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_KECAMATAN',$id)->get('tbkecamatan');
	$h = '';
	if($a->num_rows() > 0){
		$aa = $a->row();
		$h = $aa->NAMA_KECAMATAN;
	}
	$h = ($ext ? 'Kecamatan ' : '').$h;
	return $h;
}

function desa($id=0,$ext=TRUE){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('ID_DESA',$id)->get('tbdesa');
	$h = '';
	//$addstr = 'Desa ';
	if($a->num_rows() > 0){
		$aa = $a->row();
		//if($id == '3174071001' || $id == '3522160001' || $id == '3522160004' || $id == '3522160005' || $id == '3522160006' || $id == '3522160007' || $id == '3522160008' || $id == '3522160009' || $id == '3522160010' || $id == '3522160015' || $id == '3522160016' || $id == '3522160018' || $id == '3578080004' )
		if($aa->JENIS == 2){
			$addstr = 'Kelurahan';
		}
		else{
			$addstr = 'Desa';
		}
		$h = ($ext ? $addstr.' ' : '').$aa->NAMA_DESA;
	}
	return $h;
}


function cek_dok_izin($Kd_Izin=0,$Kd_Jenis=0,$Kd_Dok=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('Kd_Izin',$Kd_Izin)->where('Kd_Jenis',$Kd_Jenis)->where('Kd_Dok',$Kd_Dok)->get('tb_dokumen_setting');
	$h = FALSE;
	if($a->num_rows() > 0){
		$h = TRUE;
	}
	return $h;
}

function dok_checklist($Kd_Izin=0,$Kd_Jenis=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tb_dokumen_setting.Kd_Izin,
	tb_dokumen_setting.Kd_Dok,
	tb_dokumen.Nm_Dok,
	tb_dokumen.Petugas,
	tb_dokumen.Keterangan
	FROM
	tb_dokumen_setting
	INNER JOIN tb_dokumen ON tb_dokumen.Kd_Dok = tb_dokumen_setting.Kd_Dok
	where tb_dokumen_setting.Kd_Izin = "'.$Kd_Izin.'" AND tb_dokumen_setting.Kd_Jenis = "'.$Kd_Jenis.'" order by Nm_Dok ASC');
	return $a;
}

function cek_dok_checklist($Kd_Izin=0,$ID_Izin=0,$Kd_Dok=0,$Nm_File=FALSE){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('Kd_Izin',$Kd_Izin)->where('ID_Izin',$ID_Izin)->where('Kd_Dok',$Kd_Dok)->get('tb_dokumen_log');
	$h = '';
	if($Nm_File){
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->Nm_File;
		}
	}
	else{
		$h = FALSE;
		if($a->num_rows() > 0){
			$h = TRUE;
		}
	}
	return $h;
}

function label_jenis_izin($id='',$jenis=''){
	switch($jenis.substr($id,-1)){
		case '1':
			$a = label('info','Baru');
			break;
		case '2':
			$a = label('success','Perpanjangan');
			break;
		case '3':
			$a = label('error','Perubahan');
			break;
		/* ======== */
		case '21':
			$a = label('info','Baru');
			break;
		case '22':
			$a = label('success','Balik Nama');
			break;
		case '23':
			$a = label('error','Balik Nama dan Tambahan Bangunan');
			break;
		/* ======== */
		case '31':
			$a = label('info','Baru');
			break;
		case '32':
			$a = label('success','Balik Nama');
			break;
		case '33':
			$a = label('error','Alih Fungsi');
			break;
		default:
			$a = '';
			break;
	}
	return $a;
}

function format_parameter($id_izin=0,$parameter=0,$string=array(),$replace=array()){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('Kd_Izin',$id_izin)->where('Param',$parameter)->where('Status',1)->get('tb_parameter');
	$h = '';
	$type = 0;
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		/* $type = $aa->Type_Format; */
		if(is_array($string)){
			$b = $aa->Format;
			$h = strtr($b,$string);
		}
		else{
			$h = $aa->Format;
		}
	}
	
	/* 
	switch($type){
		case '1':
			$h = str_replace('&nbsp;',' ',$h);
			break;
		default:
			$h = $h;
			break;
	} */
	
	return $h;
}

function format_setting($id_izin=0,$parameter=0,$string=array(),$replace=array()){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->where('Kd_Setting',$id_izin)->where('Param',$parameter)->get('tb_setting');
	$h = '';
	$type = 0;
	if($a->num_rows() > 0){
		$aa = $a->first_row();
		if(is_array($string)){
			$b = $aa->Format;
			$h = strtr($b,$string);
		}
		else{
			$h = $aa->Format;
		}
	}
	
	
	return $h;
}

function skformat($text=''){
	//$a = str_replace(array('&nbsp;'),array('\t'),$text);
	//$a = preg_replace('/&#?[a-z0-9]{2,8};/i','',$text); 
	$a = html_entity_decode($text);
	return $a;
}

// SIUP
function cari_history_siup($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbsiup.IDPELANGGAN,
	tbsiup.IDPERUSAHAAN,
	tbsiup.TGL_SK,
	tbsiup.FLOWE,
	tbsiup.NO_SK,
	tbperusahaan.NM_PERUSAHAAN
	FROM
	tbsiup
	INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN WHERE tbsiup.IDPELANGGAN = "'.$id.'" ORDER BY IDPERUSAHAAN,TGL_SK ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->NM_PERUSAHAAN.'</td>
				<td style="font-style: italic;">NO SK : '.$aa->NO_SK.'</td>
				<td></td>';
				if($aa->FLOWE == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('siup/fo_daftar/2/'.$aa->IDPELANGGAN.'/'.$aa->IDPERUSAHAAN),'Dafta Ulang','success').''.anchor_label(fmodule('siup/fo_daftar/3/'.$aa->IDPELANGGAN.'/'.$aa->IDPERUSAHAAN),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}


// TDP
function cari_history_tdp($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbtdp.IDPELANGGAN,
	tbtdp.IDPERUSAHAAN,
	tbtdp.TGL_SK,
	tbtdp.FLOWE,
	tbtdp.NO_SK,
	tbperusahaan.NM_PERUSAHAAN
	FROM
	tbtdp
	INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN WHERE tbtdp.IDPELANGGAN = "'.$id.'" ORDER BY IDPERUSAHAAN,TGL_SK ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->NM_PERUSAHAAN.'</td>
				<td style="font-style: italic;">NO SK : '.$aa->NO_SK.'</td>
				<td></td>';
				if($aa->FLOWE == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('tdp/fo_daftar/2/'.$aa->IDPELANGGAN.'/'.$aa->IDPERUSAHAAN),'Dafta Ulang','success').''.anchor_label(fmodule('tdp/fo_daftar/3/'.$aa->IDPELANGGAN.'/'.$aa->IDPERUSAHAAN),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}



// IMB
function cari_history_imb($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbimb.ID_Pelanggan,
	tbimb.ID_Usaha,
	tbimb.Tgl_SK,
	tbimb.Flow_Serah,
	tbimb.Nm_Usaha
	FROM
	tbimb WHERE tbimb.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('imb/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Balik Nama','success').''.anchor_label(fmodule('imb/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Balik Nama dan Tambahan Bangunan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}




// HO
function cari_history_ho($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbho.ID_Pelanggan,
	tbho.ID_Usaha,
	tbho.Tgl_SK,
	tbho.Flow_Serah,
	tbho.Nm_Usaha
	FROM
	tbho WHERE tbho.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('ho/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Balik Nama','success').''.anchor_label(fmodule('ho/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Alih Fungsi','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}




// IUJK
function cari_history_iujk($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbiujk.ID_Pelanggan,
	tbiujk.ID_Usaha,
	tbiujk.Tgl_SK,
	tbiujk.Flow_Serah,
	tbiujk.Nm_Usaha
	FROM
	tbiujk WHERE tbiujk.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('iujk/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('iujk/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}



// TDG
function cari_history_tdg($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbtdg.ID_Pelanggan,
	tbtdg.ID_Usaha,
	tbtdg.Tgl_SK,
	tbtdg.Flow_Serah,
	tbtdg.Nm_Usaha
	FROM
	tbtdg WHERE tbtdg.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('tdg/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('tdg/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}



// TDI
function cari_history_tdi($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbtdi.ID_Pelanggan,
	tbtdi.ID_Usaha,
	tbtdi.Tgl_SK,
	tbtdi.Flow_Serah,
	tbtdi.Nm_Usaha
	FROM
	tbtdi WHERE tbtdi.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('tdi/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('tdi/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}


// Reklame
function cari_history_reklame($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbreklame.ID_Pelanggan,
	tbreklame.ID_Usaha,
	tbreklame.Tgl_SK,
	tbreklame.Flow_Serah,
	tbreklame.Nm_Usaha
	FROM
	tbreklame WHERE tbreklame.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('reklame/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('reklame/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}



// ITKesehatan
function cari_history_itkesehatan($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbitkesehatan.ID_Pelanggan,
	tbitkesehatan.ID_Usaha,
	tbitkesehatan.Tgl_SK,
	tbitkesehatan.Flow_Serah,
	tbitkesehatan.Nm_Usaha
	FROM
	tbitkesehatan WHERE tbitkesehatan.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('itkesehatan/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('itkesehatan/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}



// TDUP
function cari_history_tdup($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT
	tbtdup.ID_Pelanggan,
	tbtdup.ID_Usaha,
	tbtdup.Tgl_SK,
	tbtdup.Flow_Serah,
	tbtdup.Nm_Usaha
	FROM
	tbtdup WHERE tbtdup.ID_Pelanggan = "'.$id.'" ORDER BY ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('tdup/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('tdup/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

// APOTEK
function cari_history_apotek($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_apotek a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('apotek/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('apotek/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function cari_history_labklinik($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_labklinik a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('labklinik/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('labklinik/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function cari_history_lingkungan($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_lingkungan a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('lingkungan/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('lingkungan/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function cari_history_opklinik($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_opklinik a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('opklinik/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('opklinik/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function cari_history_lpks($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_lpks a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('lpks/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('lpks/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function cari_history_huller($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_huller a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('huller/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('huller/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function cari_history_optik($id=0){
	$CI =& get_instance();
	$a = $CI->db->query('SELECT
	a.ID_Pelanggan,
	a.ID_Usaha,
	a.Tgl_SK,
	a.Flow_Serah,
	a.Nm_Usaha
	FROM
	sippadu_optik a WHERE a.ID_Pelanggan = "'.$id.'" ORDER BY a.ID_Pelanggan ASC');
	$h = '';
	if($a->num_rows() > 0){
		foreach($a->result() as $aa){
			$h .= '
			<tr class="success" style="">
				<td></td>
				<td style="font-style: italic;">--- '.$aa->Nm_Usaha.'</td>
				<td style="font-style: italic;"></td>
				<td></td>';
				if($aa->Flow_Serah == '1'){
					$h .= '
					<td align="center">'.anchor_label(fmodule('optik/fo_daftar/2/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Dafta Ulang','success').''.anchor_label(fmodule('optik/fo_daftar/3/'.$aa->ID_Pelanggan.'/'.$aa->ID_Usaha),'Perubahan','error').'</td>';
				}
				else{
					$h .= '
					<td align="center">'.label('warning','Dalam Proses').'</td>';
				}
			$h .= '
			</tr>
			';
		}
	}
	return $h;
}

function terbilang($x)
{
	$ambil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	if ($x < 12)
		$h = " " . $ambil[$x];
	elseif ($x < 20)
		$h =  Terbilang($x - 10) . " belas";
	elseif ($x < 100)
		$h = Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
	elseif ($x < 200)
		$h = " seratus" . Terbilang($x - 100);
	elseif ($x < 1000)
		$h = Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
	elseif ($x < 2000)
		$h = " seribu" . Terbilang($x - 1000);
	elseif ($x < 1000000)
		$h = Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
	elseif ($x < 1000000000)
		$h = Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
	
	if(substr($h,0,1) == ' '){
		$h = substr($h,1);
	}
	return ucwords($h);
}

function iujk($x=0){
	$h = '';
	switch($x){
		case '1':
			$h = 'Perencanaan';
			break;
		case '2':
			$h = 'Pelaksanaan';
			break;
		case '3':
			$h = 'Pengawasan';
			break;
		case '4':
			$h = 'Perencanaan, Pelaksanaan dan Pengawasan';
			break;
		case '5':
			$h = 'Perencanaan dan Pengawasan';
			break;
		default:
			$h = '';
			break;
	}
	return $h;
}

function itkes($x=0,$type=0){
	$h = '';
	switch($type.$x){
		case '01':
			$h = 'SIKB';
			break;
		case '02':
			$h = 'SIKP';
			break;
		case '11':
			$h = 'SURAT IZIN KERJA BIDAN (SIKB)';
			break;
		case '12':
			$h = 'SURAT IZIN KERJA PERAWAT (SIKP)';
			break;
		case '21':
			$h = 'Surat Izin Kerja Bidan (SIKB)';
			break;
		case '22':
			$h = 'Surat Izin Kerja Perawat (SIKP)';
			break;
		case '31':
			$h = 'Bidan';
			break;
		case '32':
			$h = 'Perawat';
			break;
		default:
			$h = '';
			break;
	}
	return $h;
}

function berita_kategori($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$a = $CI->db->query('SELECT a.*,b.Nm_Kategori FROM ci_berita_log a LEFT JOIN ci_berita_kategori b ON a.ID_Kategori = b.ID_Kategori WHERE a.ID_Berita = '.$id);
		$k = array();
		$h = '';
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$k[] = $aa->Nm_Kategori;
			}
			$h = implode(', ',$k);
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
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Parent',$parent)->like('ID_Kategori',$category)->where('ID_Menu !=',$except)->get('ci_menu');
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
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->order_by('Sort_Order','asc')->order_by('Nm_Menu','asc')->where('ID_Kategori',$category)->where('ID_Parent',$parent)->get('ci_menu');
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
			$h .= level_menu_tabel($category,$d->ID_Menu,cek_level_menu($d->ID_Menu));
		}
	}
	return $h;
}

function cek_level_menu($id=0,$count=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->where('ID_Menu',$id)->get('ci_menu');
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
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->where('ID_Parent',$id)->where('Status',1)->get('ci_menu');
	$h = '';
	if($data->num_rows() > 0){
		$h = $attribute;
	}
	return $h;
}

function autolink_menu($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->where('ID_Menu',$id)->get('ci_menu');
	$h = site_url(fmodule('menu/open/'.$id));
	if($data->num_rows() > 0){
		$d = $data->row();
		if($d->Jn_Menu==2){
			$h = site_url(fmodule($d->URL));
			if(substr_count($d->URL,'http://') || substr_count($d->URL,'https://')){
				$h = $d->URL;
			}
		}
	}
	return $h;
}


function child_menu($id=0){
	$CI =& get_instance();
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->where('ID_Parent',$id)->get('ci_menu');
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
	//$db_group = $CI->db->groupname;
	//$db = $CI->load->database($db_group,TRUE);
	$data = $CI->db->where('ID_Berita',$id)->get('ci_berita');
	
	$h = site_url(fmodule('berita/open/'.$id));
	if($data->num_rows() > 0){
		$d = $data->row();
		$h = site_url(fmodule('berita/open/'.$id.'/'.url_title($d->Judul,'-',TRUE)));
	}
	return $h;
}

function LblTrack($id=0){
	switch($id){
		case 1:
			$h = 'won';
			break;
		case 0:
			$h = 'lose';
			break;
		default:
			$h = 'draw';
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

function imgttd($verifikasi=0,$width=450,$top='',$right='',$bottom='',$left=''){
	$set = sippadu('ttd_kadin');
	$ttd_elektronik = sippadu('ttd_elektronik');
	$h = '';
	$ori_width = 450;
	$ori_height = 200;
	$ori_margin_top = -30;
	$ori_margin_right = -65;
	$ori_margin_bottom = -35;
	$ori_margin_left = -65;
	
	$x = ($width/$ori_width);
	$new_width = $ori_width*$x;
	$new_height = $ori_height*$x;
	$new_margin_top = ($top != '' ? $top : $ori_margin_top*$x);
	$new_margin_right = ($right != '' ? $right : $ori_margin_right*$x);
	$new_margin_bottom = ($bottom != '' ? $bottom : $ori_margin_bottom*$x);
	$new_margin_left = ($left != '' ? $left : $ori_margin_left*$x);
	
	
	if($verifikasi && $ttd_elektronik){
		$h 		= '<div style="margin:'.$new_margin_top.'px '.$new_margin_right.'px '.$new_margin_bottom.'px '.$new_margin_left.'px;position:absolute;width:'.$new_width.'px;height:'.$new_height.'px;background:url(\''.base_url('assets/'.config('theme').'/images/'.sippadu('ttd_kadin')).'\')no-repeat top center;background-size: '.$new_width.'px '.$new_height.'px;"></div>';
	}
	return $h;
}
