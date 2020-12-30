<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function config($s=''){
	$fmodule			= 'sippadu';
	$site_title 		= 'SIPPADU'; //SIMDAWEB
	$sub_title	 		= 'SIPPADU'; //SIMDAWEB
	$site_slogan 		= '';
	$site_description 	= '';
	$site_keyword 		= '';
	$site_image			= 'noimage.jpg';
	$site_author 		= 'Administrator';
	$google_code 		= '';
	$email_author		= 'mroziqin26@gmail.com';
	$cache_enable 		= FALSE;
	$time_cache			= 15;
	$theme				= 'sippadu';
	$limit				= 50;
	$dbprefix			= 'ci_';
	$dbprefix2			= 'tb';
	$copyright_year		= 2017;
	
	switch($s){
		case 'fmodule':
			$h = $fmodule;
		break;
		case 'site_title':
			$h = $site_title;
		break;
		case 'sub_title':
			$h = $sub_title;
		break;
		case 'site_slogan':
			$h = $site_slogan;
		break;
		case 'site_description':
			$h = $site_description;
		break;
		case 'site_keyword':
			$h = $site_keyword;
		break;
		case 'site_image':
			$h = $site_image;
		break;
		case 'site_author':
			$h = $site_author;
		break;
		case 'google_code':
			$h = $google_code;
		break;
		case 'email_author':
			$h = $email_author;
		break;
		case 'cache_enable':
			$h = $cache_enable;
		break;
		case 'time_cache':
			$h = $time_cache;
		break;
		case 'theme':
			$h = $theme;
		break;
		case 'limit':
			$h = $limit;
		break;
		case 'dbprefix':
			$h = $dbprefix;
		break;
		case 'dbprefix2':
			$h = $dbprefix2;
		break;
		case 'copyright_year':
			$h = $copyright_year;
		break;
		default:
			$h = '';
		break;
	}		
	
	return $h;
}

function db_mysql(){
	$CI =& get_instance();
	$db_group = $CI->db->groupname;
	$db = $CI->load->database($db_group,TRUE);
	return $a;
}

function dbprefix(){
	$a = config('dbprefix');
	return $a;
}

function dbprefix2(){
	$a = config('dbprefix2');
	return $a;
}

function fmodule($url=''){
	$a = config('fmodule');
	if($url != ''){
		$h = $a.'/'.$url;
	}
	else{
		$h = $a;
	}
	return $h;
}

function site_title($subtitle=''){
	$CI =& get_instance();
	if($subtitle != ''){
		$a = $subtitle.' | '.config('site_title');
	}
	else{
		$a = config('site_title');
	}
	return $a;
}

function site_description($desc=''){
	$CI =& get_instance();
	if($desc != ''){
		$a = character_limiter(preg_replace('/<[^>]+\>/i','',$desc),300);
	}
	else{
		$a = $CI->config->item('site_description');
	}
	return $a;
}

function site_keywords($keyword=''){
	$CI =& get_instance();
	if($keyword != ''){
		$a = $keyword;
	}
	else{
		$a = $CI->config->item('site_keyword');
	}
	return $a;
}

function site_author($author=''){
	$CI =& get_instance();
	if($author != ''){
		$a = $author;
	}
	else{
		$a = $CI->config->item('site_author');
	}
	return $a;
}

function site_image($url=''){
	$CI =& get_instance();
	if($url != ''){
		$a = $url;
	}
	else{
		$a = base_url('assets/images/'.$CI->config->item('site_image'));
	}
	return $a;
}

function google_code($code=''){
	$CI =& get_instance();
	if($code != ''){
		$a = $code;
	}
	else{
		$a = $CI->config->item('google_code');
	}
	return $a;
}

function convert_url($url=''){
	$CI =& get_instance();
	$h = str_replace($CI->config->item('domain_url'),base_url(),$url);
	return $h;
}

function convert_file_url($url=''){
	$h = str_replace(array('wp-content'),array('assets'),convert_url($url));
	return $h;
}


function alert($type='',$msg=''){
	$CI =& get_instance();
	$flash = $CI->session->flashdata('alert_type');
	if($type != ''){
		$a = $type;
		$m = $msg;
	}
	elseif($flash != ''){
		$a = $flash;
		$m = $CI->session->flashdata('alert_msg');
	}
	elseif(validation_errors()!=''){
		$a = 'error';
		$m = validation_errors();
	}
	else{
		$a = '';
		$m = '';
	}
	
	switch($a){
		case 'success':
			$h = '<div class="alert alert-success"><i>'.$m.'</i></div>';
			break;
		case 'error':
			$h = '<div class="alert alert-lightred"><i>'.$m.'</i></div>';
			break;
		case 'warning':
			$h = '<div class="alert alert-warning"><i>'.$m.'</i></div>';
			break;
		case 'info':
			$h = '<div class="alert alert-cyan"><i>'.$m.'</i></div>';
			break;
		default:
			$h = '';
			break;
	}
	return $h;
}

function set_alert($type='',$msg=''){
	$CI =& get_instance();
	$a = $CI->session->set_flashdata('alert_type',$type);
	$m = $CI->session->set_flashdata('alert_msg',$msg);
}


function db_time($date=0,$second=TRUE){
	if($date != ''){
		if(is_numeric($date)){
			$time_unix = $date;
		}
		else{
			$c_date = str_replace('/','-',$date);
			$time_unix = strtotime($c_date);
			
			/*$time_unix = human_to_unix($date);
			$time_id = gmt_to_local($time_unix, 'UP7', FALSE);
			$time = gmdate($format, $time_id);*/
		}

		$time = unix_to_human($time_unix,FALSE,'Y-m-d');
	}
	else{
		$time = null;
	}
	return $time;
}

function human_time($time=0,$format='d/m/Y'){
	$unix = strtotime($time);
	//$h = gmdate('d/m/Y',$unix);
	$time_id = gmt_to_local($unix, 'UP7', FALSE);
	$time = gmdate($format, $time_id);
	return $time;
}

function TimeNow($format='d/m/Y H:i'){
	$h = gmdate($format,time()+3600*7);
	return $h;
}

function TimeFormat($time=0,$format='Y-m-d H:i'){
	$strtotime = strtotime($time)+3600*7;
	$h = gmdate($format,$strtotime);
	return $h;
}

function TimeIntFormat($time=0,$format='Y-m-d H:i'){
	$h = gmdate($format,$time);
	return $h;
}

function gender($id=0,$long=FALSE){
	switch($id){
		case 1:
			$h = $long? 'Laki-Laki' : 'L';
			break;
		case 2:
			$h = $long? 'Perempuan' : 'P';
			break;
		default:
			$h = '';
			break;
	}
	return $h;
}

function icon_edit($url=''){
	$h = anchor($url,'<i class="fa fa-edit"></i>','class="tip" title="Edit"');
	return $h;
}

function icon_delete($url=''){
	$h = anchor($url,'<i class="icon-delete"></i>');
	return $h;
}

function icon_status($id=0){
	switch($id){
		case 0:
			$h = '<span class="label bg-red">Disable</span>';
			break;
		case 1:
			$h = '<span class="label bg-greensea">Enable</span>';
			break;
		default:
			$h = '<span class="label bg-red">Disable</span>';
			break;
	}
	return $h;
}

function view_desc($view=0,$tot=0){
	$h = '';
	if($view <= $tot){
		$h = $view .' dari '.$tot.' data ditampilkan &nbsp;&nbsp;';
	}
	else{
		$h = $tot.' data ditampilkan &nbsp;&nbsp;';
	}
	return $h;
}

function menuopen($class='',$active=''){
	$h = '';
	if($class==$active){
		$h = 'open active';
	}
	return $h;
}

function menuactive($class='',$active=''){
	$h = '';
	if($class==$active){
		$h = 'active';
	}
	return $h;
}

function label($type='',$msg='&nbsp;&nbsp;&nbsp;'){
	switch($type){
		case 'success':
			$h = '<span class="label bg-greensea">'.$msg.'</span>';
			break;
		case 'error':
			$h = '<span class="label bg-red">'.$msg.'</span>';
			break;
		case 'warning':
			$h = '<span class="label bg-drank">'.$msg.'</span>';
			break;
		case 'info':
			$h = '<span class="label bg-cyan">'.$msg.'</span>';
			break;
		case 'inverse':
			$h = '<span class="label bg-dutch">'.$msg.'</span>';
			break;
		default:
			$h = '<span class="label bg-primary">'.$msg.'</span>';
			break;
	}
	return $h;
}

function label_span($type='',$msg='&nbsp;&nbsp;&nbsp;',$width=60){
	switch($type){
		case 'success':
			$h = '<span class="label bg-greensea" style="width:'.$width.'px;">'.$msg.'</span>';
			break;
		case 'error':
			$h = '<span class="label bg-red" style="width:'.$width.'px;">'.$msg.'</span>';
			break;
		case 'warning':
			$h = '<span class="label bg-drank" style="width:'.$width.'px;">'.$msg.'</span>';
			break;
		case 'info':
			$h = '<span class="label bg-cyan" style="width:'.$width.'px;">'.$msg.'</span>';
			break;
		case 'inverse':
			$h = '<span class="label bg-dutch" style="width:'.$width.'px;">'.$msg.'</span>';
			break;
		default:
			$h = '<span class="label bg-primary" style="width:'.$width.'px;">'.$msg.'</span>';
			break;
	}
	return $h;
}

function anchor_label($url='',$msg='',$type='',$att=''){
	switch($type){
		case 'success':
			$h = anchor($url,'<span class="label bg-greensea">'.$msg.'</span>',$att);
			break;
		case 'error':
			$h = anchor($url,'<span class="label bg-red">'.$msg.'</span>',$att);
			break;
		case 'warning':
			$h = anchor($url,'<span class="label bg-drank">'.$msg.'</span>',$att);
			break;
		case 'info':
			$h = anchor($url,'<span class="label bg-cyan">'.$msg.'</span>',$att);
			break;
		case 'inverse':
			$h = anchor($url,'<span class="label bg-dutch">'.$msg.'</span>',$att);
			break;
		default:
			$h = anchor($url,'<span class="label bg-primary">'.$msg.'</span>',$att);
			break;
	}
	return $h;
}

function anchor_popup_label($url='',$msg='',$type='',$popup=''){
	switch($type){
		case 'success':
			$h = anchor_popup($url,'<span class="label bg-greensea">'.$msg.'</span>',$popup);
			break;
		case 'error':
			$h = anchor_popup($url,'<span class="label bg-red">'.$msg.'</span>',$popup);
			break;
		case 'warning':
			$h = anchor_popup($url,'<span class="label bg-drank">'.$msg.'</span>',$popup);
			break;
		case 'info':
			$h = anchor_popup($url,'<span class="label bg-cyan">'.$msg.'</span>',$popup);
			break;
		case 'inverse':
			$h = anchor_popup($url,'<span class="label bg-dutch">'.$msg.'</span>',$popup);
			break;
		default:
			$h = anchor_popup($url,'<span class="label bg-primary">'.$msg.'</span>',$popup);
			break;
	}
	return $h;
}

function anchor_popup_label_span($url='',$msg='',$type='',$width=100,$popup=''){
	switch($type){
		case 'success':
			$h = anchor_popup($url,'<span class="label bg-greensea" style="width:'.$width.'px;">'.$msg.'</span>',$popup);
			break;
		case 'error':
			$h = anchor_popup($url,'<span class="label bg-red" style="width:'.$width.'px;">'.$msg.'</span>',$popup);
			break;
		case 'warning':
			$h = anchor_popup($url,'<span class="label bg-drank" style="width:'.$width.'px;">'.$msg.'</span>',$popup);
			break;
		case 'info':
			$h = anchor_popup($url,'<span class="label bg-cyan" style="width:'.$width.'px;">'.$msg.'</span>',$popup);
			break;
		case 'inverse':
			$h = anchor_popup($url,'<span class="label bg-dutch" style="width:'.$width.'px;">'.$msg.'</span>',$popup);
			break;
		default:
			$h = anchor_popup($url,'<span class="label bg-primary" style="width:'.$width.'px;">'.$msg.'</span>',$popup);
			break;
	}
	return $h;
}

function usia($tgl=0,$long=FALSE){
	$a = strtotime(db_time($tgl));
	$b = strtotime(db_time(TimeNow()));
	if($long){
		$h = timespan($a,$b);
	}
	else{
		$h = time_span($a,$b);
	}
	return $h;
}

function number($number=0,$decimal=0,$string_decimal=',',$string_front=''){
	$a = $string_front.number_format($number,$decimal,$string_decimal,'.');
	return $a;
}

function fnumber($number=0,$decimal=0,$string_decimal=',',$string_front=''){
	if($number){
	$a = $string_front.number_format($number,$decimal,$string_decimal,'.');
	}
	else{
	$a = '-';
	}
	return $a;
}

function ftext($string='',$ifnull='belum diupdate',$add_code=TRUE){
	if($string != ''){
		$h = $string;
	}
	else{
		if($add_code){
			$h = '<i>'.$ifnull.'</i>';
		}
		else{
			$h = $ifnull;
		}
	}
	return $h;
}

function ifnull($string='',$ifnull='-',$add_code=FALSE){
	if($string != ''){
		$h = $string;
	}
	else{
		if($add_code){
			$h = '<i>'.$ifnull.'</i>';
		}
		else{
			$h = $ifnull;
		}
	}
	return $h;
}

function iftimezero($string='',$text='',$format='d-m-Y'){
		
	if(TimeFormat($string,'d-m-Y H:i') == '01-01-1970 07:00'){
		if($text != ''){
			$h = $text;
		}
		else{
			$h = TimeNow('Y-m-d');
		}
	}
	else{
		if($format != ''){
			$h = TimeFormat($string,$format);
		}
		else{
			$h = $string;
		}
	}
	return $h;
}

function info($text=''){
	$h = '<a href="javascript:void(0);" class="tt" title="'.$text.'"><i class="icon-info-sign"></i></a>';
	return $h;
}

function percent($val=0,$pembagi=1,$string='%'){
	if($pembagi > 0){
		$all = $pembagi;
	}
	else{
		$all = 1;
	}
	
	$h = number((($val/$all) * 100),2).' '.$string;
	return $h;
}

function usia_hamil($int='0'){
	$h = $int;
	$time = time()+3600*7;
	if($int != '0'){
		$a = $time - $int;
		$b = $a/2592000;
		$h = floor($b);
	}
	return $h;
}

function time_span($seconds = 1, $time = '')
{
	$CI =& get_instance();
	$CI->lang->load('date');

	if ( ! is_numeric($seconds))
	{
		$seconds = 1;
	}

	if ( ! is_numeric($time))
	{
		$time = time();
	}

	if ($time <= $seconds)
	{
		$seconds = 1;
	}
	else
	{
		$seconds = $time - $seconds;
	}

	$str = '';
	$years = floor($seconds / 31536000);

	if ($years > 0)
	{
		$str .= $years.' '.$CI->lang->line((($years	> 1) ? 'date_years' : 'date_year')).', ';
	}

	$seconds -= $years * 31536000;
	$months = floor($seconds / 2628000);

	if ($years > 0 OR $months > 0)
	{
		if ($months > 0)
		{
			$str .= $months.' '.$CI->lang->line((($months	> 1) ? 'date_months' : 'date_month')).', ';
		}

		$seconds -= $months * 2628000;
	}


	return substr(trim($str), 0, -1);
}

function label_kondisi_bayi($jenis=0,$jml=0,$total=0){
	switch($jenis){
		case 1:
			if($jml==0){
				$h = '-';
			}
			elseif($jml == $total){
				$h = label_span('success','Sehat');
			}
			else{
				$h = label_span('success',$jml.' Sehat');
			}
			break;
		case 2:
			if($jml==0){
				$h = '-';
			}
			elseif($jml == $total){
				$h = label_span('warning','Cacat');
			}
			else{
				$h = label_span('warning',$jml.' Cacat');
			}
			break;
		case 3:
			if($jml==0){
				$h = '-';
			}
			elseif($jml == $total){
				$h = label_span('error','Meninggal');
			}
			else{
				$h = label_span('error',$jml.' Meninggal');
			}
			break;
		default:
			$h = '';
			break;
	}
	return $h;
}

function encrypt($str) {
	$hasil = '';
    $kunci = '979a218e0632df2935317f98d47956c7';
    for ($i = 0; $i < strlen($str); $i++) {
        $karakter = substr($str, $i, 1);
        $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
        $karakter = chr(ord($karakter)+ord($kuncikarakter));
        $hasil .= $karakter;
        
    }
    return urlencode(base64_encode($hasil));
}
 
function decrypt($str) {
    $str = base64_decode(urldecode($str));
    $hasil = '';
    $kunci = '979a218e0632df2935317f98d47956c7';
    for ($i = 0; $i < strlen($str); $i++) {
        $karakter = substr($str, $i, 1);
        $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
        $karakter = chr(ord($karakter)-ord($kuncikarakter));
        $hasil .= $karakter;
        
    }
    return $hasil;
}

function label_selisih($jumlah=0){
	$nom = (int)str_replace(array(',',''),array('',''),$jumlah);
	switch(true){
		case $nom == 0:
			$h = label_span('success','OK',100);
			break;
		case $nom > 0:
			$h = label_span('warning',$jumlah,100);
			break;
		default:
			$h = label_span('error',$jumlah,100);
			break;
	}
	return $h;
}

function label_pergeseran($url='',$jumlah=0,$nominal=0,$popup=''){
	$nom = (int)str_replace('.','',$nominal);
	if($jumlah == 0){
		$h = label_span('default','BELUM ADA PERGESERAN',150,$popup);
	}
	else{
		switch(true){
			case $nom == 0:
				$h = anchor_popup_label_span($url,'OK','success',150,$popup);
				break;
			case $nom > 0:
				$h = anchor_popup_label_span($url,$nominal,'warning',150,$popup);
				break;
			default:
				$h = anchor_popup_label_span($url,$nominal,'error',150,$popup);
				break;
		}
	}
	return $h;
}

function label_selisih_spd($jumlah=0,$nominal=0){
	$nom = (int)str_replace('.','',$nominal);
	//if($jumlah == 0){
		//$h = label_span('default','TIDAK ADA SPD',150,$popup);
	//}
	//else{
		switch(true){
			case $nom == 0:
				//$h = anchor_popup_label_span($url,'SPD OK','success',150,$popup);
				$h = label_span('success','SPD OK',150);
				break;
			case $nom > 0:
				//$h = anchor_popup_label_span($url,$nominal,'warning',150,$popup);
				$h = label_span('warning',$nominal,150);
				break;
			default:
				//$h = anchor_popup_label_span($url,$nominal,'error',150,$popup);
				$h = label_span('error',$nominal,150);
				break;
		}
	//}
	return $h;
}

function dbMoney($numeric=0){
	$a = str_replace(array('.',','),array('','.'),$numeric);
	return $a;
}

function fGanjil($no=0){
	$h = $no % 2;
	return $h;
}

function Date_Indo($string=''){
	$h = str_replace(array('January','February','March','April','May','June','July','August','September','October','November','December'),array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'),$string);
	return $h;
}

function Bulan($kode=0){
	$int = (int)$kode;
	$h = str_replace(array('1','2','3','4','5','6','7','8','9','10','11','12'),array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'),$int);
	return $h;
}

function fUpper($string=''){
	$h = strtoupper($string);
	return $h;
}

function printPDF($url='',$method='download',$filename='PDF'){
	$a = encrypt(site_url(fmodule($url)));
	$url = site_url(fmodule('cetak/pdf/'.$a.'/'.$method.'/'.$filename.''));
	return $url;
}

function printPDFP($url='',$method='download',$filename='PDF'){
	$a = encrypt(site_url(fmodule($url)));
	$url = site_url(fmodule('cetak/pdfp/'.$a.'/'.$method.'/'.$filename.''));
	return $url;
}

function printPDFL($url='',$method='download',$filename='PDF'){
	$a = encrypt(site_url(fmodule($url)));
	$url = site_url(fmodule('cetak/pdfl/'.$a.'/'.$method.'/'.$filename.''));
	return $url;
}

function anchor_label_spp($url='',$Jn_SPP=0,$Kd_Akses=0,$Kd_Rinc=0,$popup=''){
	$rinc = ($Kd_Rinc == 1 ? ' BY REK' : '');
	switch($Jn_SPP){
		case 1:
			$Jn = 'UP';
			break;
		case 2:
			$Jn = 'GU';
			break;
		case 3:
			$Jn = 'LS';
			break;
		case 4:
			$Jn = 'TU';
			break;
		case 5:
			$Jn = 'Nihil';
			break;
		default:
			$Jn = '';
			break;
	}
	
	/*switch($Kd_Akses){
		case 1 :
			
			$h = anchor_popup_label_span($url,'ADD'.$rinc,'info',100,$popup);
			break;
		case 2 :
			$h = anchor_popup_label_span($url,'UP'.$rinc,'warning',100,$popup);
			break;
		case 3 :
			$h = anchor_popup_label_span($url,'DEL'.$rinc,'inverse',100,$popup);
			break;
		case 4 :
			$h = anchor_popup_label_span($url,'ALL'.$rinc,'success',100,$popup);
			break;
		default :
			$h = anchor_popup_label_span($url,'NO'.$rinc,'error',100,$popup);
			break;
	}*/
	
	switch($Kd_Akses){
		case 1 :
			
			$h = anchor_popup_label_span($url,$Jn.$rinc,'info',100,$popup);
			break;
		case 2 :
			$h = anchor_popup_label_span($url,$Jn.$rinc,'warning',100,$popup);
			break;
		case 3 :
			$h = anchor_popup_label_span($url,$Jn.$rinc,'inverse',100,$popup);
			break;
		case 4 :
			$h = anchor_popup_label_span($url,$Jn.$rinc,'success',100,$popup);
			break;
		default :
			$h = anchor_popup_label_span($url,$Jn.$rinc,'error',100,$popup);
			break;
	}
	
	return $h;
}

function db_number($str='0'){
	$a = str_replace('.','',$str);
	return $a;
}


function op_tanggal(){
	$h = array();
	$h['0'] = '- Pilih Tanggal -';
	$h['01'] = '01';
	$h['02'] = '02';
	$h['03'] = '03';
	$h['04'] = '04';
	$h['05'] = '05';
	$h['06'] = '06';
	$h['07'] = '07';
	$h['08'] = '08';
	$h['09'] = '09';
	$h['10'] = '10';
	$h['11'] = '11';
	$h['12'] = '12';
	$h['13'] = '13';
	$h['14'] = '14';
	$h['15'] = '15';
	$h['16'] = '16';
	$h['17'] = '17';
	$h['18'] = '18';
	$h['19'] = '19';
	$h['20'] = '20';
	$h['21'] = '21';
	$h['22'] = '22';
	$h['23'] = '23';
	$h['24'] = '24';
	$h['25'] = '25';
	$h['26'] = '26';
	$h['27'] = '27';
	$h['28'] = '28';
	$h['29'] = '29';
	$h['30'] = '30';
	$h['31'] = '31';
	return $h;
}

function op_bulan(){
	$h = array();
	$h['0'] = '- Pilih Bulan -';
	$h['01'] = 'Januari';
	$h['02'] = 'Pebruari';
	$h['03'] = 'Maret';
	$h['04'] = 'April';
	$h['05'] = 'Mei';
	$h['06'] = 'Juni';
	$h['07'] = 'Juli';
	$h['08'] = 'Agustus';
	$h['09'] = 'September';
	$h['10'] = 'Oktober';
	$h['11'] = 'Nopember';
	$h['12'] = 'Desember';
	return $h;
}

function op_tahun(){
	$h = array();
	$tahun = TimeNow('Y');
	$awal = $tahun - 100;
	$h['0'] = '- Pilih Tahun -';
	for($i=$tahun; $i >= $awal; $i--){
		$h[$i] = $i;
	}
	
	return $h;
}


function stats_dash($string=''){
	$h = label_span('error','Pending');
	if($string != ''){
		$h = label_span('success','Success');
	}
	
	return $h;
}


function copyright($upper=FALSE){
	$h = '© ';
	$h .= (config('copyright_year') == TimeNow('Y') ? config('copyright_year') : config('copyright_year').' - '.TimeNow('Y')).' ';
	$h .= ($upper ? strtoupper(config('site_title')) : config('site_title'));
	return $h;
}

function imgsrc($filename='',$switch='',$theme='',$required=TRUE){
	if($theme==''){
		$theme = config('theme');
	}
	
	if($switch != ''){
		$switch = $switch.'/';
	}
	
	$path = 'assets/'.$theme.'/images/'.$switch;
	$url = base_url($path.$filename);
	$noimage = base_url('assets/'.$theme.'/images/no-image.png');
	$h = '';
	if($required){
		$h = '<img src="'.$noimage.'" />';
	}
	if(file_exists('./'.$path.$filename)){
		$h = '<img src="'.$url.'" class="thumbnail"/>';
	}
	
	return $h;
}

function tree_menu_level($level=0){
	$h = '';
	if($level > 0){
		$h = '|'.str_repeat('___',ifnull($level,0)).' ';
	}
	return $h;
}

