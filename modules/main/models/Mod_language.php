<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_language extends CI_Model {
	
	function update_lang($language='id'){
		if(config_item('sess_save_path') != '' && config_item('sess_driver') == 'database'){
		$in['lang'] = $language;
		$wh['id'] = session_id();
		$this->db->update(config_item('sess_save_path'),$in,$wh);
		}
	}
}
