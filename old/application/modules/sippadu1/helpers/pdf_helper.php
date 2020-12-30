<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pdf_create'))
{
	
	function wkhtmltopdf($encode='',$filename='pdf',$download='',$orientation='landscape',$paper='folio'){
		$CI =& get_instance();
		$CI->load->helper(array('file','apps','download'));
		$db = $CI->load->database('mysql',TRUE);
		$url = decrypt($encode);
		$perintah = 'application\third_party\wkhtml\bin\wkhtmltopdf -T 10mm -B 10mm -L 10mm -R 10mm --margin-bottom 10mm --header-spacing 2 --header-line --print-media-type --header-font-size 6 --footer-line --footer-left "PRINTED BY '.strtoupper(config('site_title')).'" --footer-right "HALAMAN [page]  "  --footer-font-name "Times New Roman" --footer-font-size 6 --footer-spacing 2  -O '.$orientation.' -s '.$paper.' '.$url.' "./assets/'.config('theme').'/files/export/'.$filename.'.pdf"';
		$a = shell_exec($perintah);
		
		$b = $db->where('Time_Rpt <',(time()-3600))->get('report');
		if($b->num_rows() > 0){
			foreach($b->result() as $bb){
				$path = './assets/'.config('theme').'/files/export/'.$bb->Nm_Rpt.'.pdf';
				if($path){
					unlink($path);
				}
			}
			$db->where('Time_Rpt <',(time()-3600))->delete('report');
		}
		
		$in['Nm_Rpt'] = $filename;
		$in['Time_Rpt'] = time();
		$db->insert('report',$in);
		
		if($download == 'download'){
			$d['path']  = $path = file_get_contents('./assets/'.config('theme').'/files/export/'.$filename.'.pdf');
			$d['filename'] = $filename;
			force_download($filename.'.pdf',$path);
		}
		else{
			$d['path'] = './assets/'.config('theme').'/files/export/'.$filename.'.pdf';
			$d['filename'] = $filename;
		}
		
		return $d;
	}
}

