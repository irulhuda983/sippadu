<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pdf_create'))
{
	function pdf_create($html, $filename, $orientation='portrait',$paper='folio',$stream=FALSE,$header='',$footer='') 
	{
		require_once("dompdf/dompdf_config.inc.php");
		spl_autoload_register('DOMPDF_autoload');
		
		$CI =& get_instance();
		$CI->load->helper(array('file','apps','download'));
			
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper($paper,$orientation); // cari di include/cpdf_adapter.cls.php
		//$dompdf->AddFont('Comic','I','comici.php');
		//$dompdf->set_protocol(WWW_ROOT);
		$dompdf->set_base_path('./themes/'.config('theme').'/pdf/');
		//$dompdf->set_base_path("themes/gdsc/css/");
		//$dompdf->set_protocol(WWW_ROOT);
		//$dompdf->set_base_path('/');
		
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$w = $canvas->get_width();
		$h = $canvas->get_height();
		$font = Font_Metrics::get_font('times','normal');
		$txtHeight = Font_Metrics::get_font_height($font,8);
		$y = $h - 2 * $txtHeight - 24;
		$color = array(0,0,0);
		//$canvas->page_line(20,$y,$w - 40,$y,$color,1);
		//$canvas->line(860,10,50,10,'',1); // (panjang_menyamping,ataskanan_ke_bawah,kiri_menyamping,ataskiri_kebawah,warna,width)
		$canvas->page_text(865,580,'HALAMAN {PAGE_NUM}', '',6,$color); // $canvas->page_text(860,580,'Hal {PAGE_NUM} of {PAGE_COUNT}', '',8,$color);
		$canvas->page_text(35,580,$footer, '',6,$color);
		//$canvas->page_text(860,580,'Hal {PAGE_NUM}', '',8,$color);
		//$canvas->text(860,580,'PRINTED BY SISTEM INFORMASI KENDARAAN BERMOTOR','',8);
		//$font = Font_Metrics::get_font('Trebuchet','normal');
		$size = 9;
		//$y = $dompdf->get_height() - 24;
		//$x = $dompdf->get_width() - 15 - Font_Metrics::get_text_width('1/1',$font,$size);
		//$dompdf->page_text(10,10,'{PAGE_NUM}/{PAGE_COUNT}',$font,$size);
		
		
		if ($stream) 
		{
			//$file = "./assets/files/export/".$filename.".pdf";
			//$dompdf->output();
			//$dompdf->stream($filename,array('compress'=>'0','Attachment'=>'0'));
			$dompdf->stream('sample.php',array('compress'=>'0','Attachment'=>'0'));
		} else 
		{
			//$dompdf->output();
			write_file('./themes/'.config('theme').'/pdf/export/'.$filename.'.pdf', $dompdf->output( array('compress' => 0)));
			$path = file_get_contents('./themes/'.config('theme').'/pdf/export/'.$filename.'.pdf');
			force_download($filename,$path);
			
			/*header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Type: application/force-download');
			header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;*/
			unlink($path);
		}
	}
	
	/*function wkhtmltopdf($encode='',$filename='pdf',$download='',$orientation='landscape',$paper='folio'){
		$CI =& get_instance();
		$CI->load->helper(array('file','apps','download'));
		$url = decrypt($encode);
		$perintah = 'xvfb-run wkhtmltopdf -T 10mm -B 10mm -L 10mm -R 10mm --margin-bottom 10mm --header-spacing 2 --header-line --print-media-type --header-font-size 6 --footer-line --footer-left "PRINTED BY SISTEM INFORMASI GDSC KABUPATEN BOJONEGORO" --footer-right "HALAMAN [page]  "  --footer-font-name "Trebuchet MS" --footer-font-size 6 --footer-spacing 2  -O '.$orientation.' -s '.$paper.' '.$url.' "/var/www/assets/'.config('theme').'/files/export/'.$filename.'.pdf"';
		$a = shell_exec($perintah);
		
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
	}*/
	
	function wkhtmltopdf($encode='',$filename='pdf',$download='',$orientation='landscape',$paper='folio'){
		$CI =& get_instance();
		$CI->load->helper(array('file','apps','download'));
		$db = $CI->load->database('mysql',TRUE);
		$url = decrypt($encode);
		$perintah = 'xvfb-run wkhtmltopdf -T 10mm -B 10mm -L 10mm -R 10mm --margin-bottom 10mm --header-spacing 2 --header-line --print-media-type --header-font-size 6 --footer-line --footer-left "PRINTED BY SISTEM INFORMASI GDSC KABUPATEN BOJONEGORO" --footer-right "HALAMAN [page]  "  --footer-font-name "Times New Roman" --footer-font-size 6 --footer-spacing 2  -O '.$orientation.' -s '.$paper.' '.$url.' "/var/www/assets/'.config('theme').'/files/export/'.$filename.'.pdf"';
		$a = shell_exec($perintah);
		
		$b = $db->where('Time_Rpt <',(time()-3600))->get('gdsc_report');
		if($b->num_rows() > 0){
			foreach($b->result() as $bb){
				$path = './assets/'.config('theme').'/files/export/'.$bb->Nm_Rpt.'.pdf';
				if($path){
					unlink($path);
				}
			}
			$db->where('Time_Rpt <',(time()-3600))->delete('gdsc_report');
		}
		
		$in['Nm_Rpt'] = $filename;
		$in['Time_Rpt'] = time();
		$db->insert('gdsc_report',$in);
		
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
