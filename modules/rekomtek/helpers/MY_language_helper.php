<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('lang'))
{

	function lang($line, $idweb=FALSE)
	{
		$CI =& get_instance();
		
		$parent = ($idweb ? config() : 0);
		if($parent > 0){
			$string = 'lang_'.$parent.'_'.strtolower(preg_replace('/[^A-Za-z0-9\-]/','_',$line));
			$lines = get_instance()->lang->line($string);
		}
		else{
			$string = strtolower(preg_replace('/[^A-Za-z0-9\-]/','_',$line));
			$lines = get_instance()->lang->line($string);
			
		}
		
		if($lines == ''){
			$lines = str_replace('_',' ',$line);
		}
		
		if(config('grab_language')){
			$a = $CI->db->where('Format',$string)->get('ci_lang_format');
			$b = $CI->db->select_max('ID_Format','ID_Format')->get('ci_lang_format');
			if($a->num_rows() < 1){
				$last_id = ($b->row()->ID_Format)+1;
				$in['ID_Web'] = $parent;
				$in['ID_Format'] = $last_id;
				$in['Kd_Modul'] = 0;
				$in['Format'] = $string;
				$in['Translate'] = $lines;
				$in['Status'] = 1;
				$c = $CI->db->insert('ci_lang_format',$in);
			}
		}
		
		return $lines;
	}
}
