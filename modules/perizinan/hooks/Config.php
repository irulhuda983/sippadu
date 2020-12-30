<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config{    function initialize() {        $CI =& get_instance();		$CI->load->helper('apps');		$a = $CI->db->query('CALL ci_DataConfig('.config().')');		if($a->num_rows() > 0){
			foreach($a->result() as $b){
				$CI->config->set_item($b->Nm_Config,$b->Value);
			}
		}		$a->next_result();
    }
}