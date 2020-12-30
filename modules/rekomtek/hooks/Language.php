<?php
class LanguageLoader
{
    function initialize() {
        $this->ci =& get_instance();
        $this->ci->load->helper('language');
		
        $site_lang = $this->ci->session->userdata('site_lang');
        if (isset($site_lang)) {
            $this->ci->lang->load('default',$site_lang);
        } else {
			$default = config('language');
			/* $a = $this->ci->db->query('SELECT Kd_Lang FROM ci_lang WHERE Class_Lang = "'.$default.'" OR Kd_Lang = "'.$default.'"');
			$lang = 'en';
			if($a->num_rows() > 0){
				$aa = $a->first_row();
				$lang = $aa->Kd_Lang;
			} */
            $this->ci->lang->load('default',$default);
			$this->ci->session->set_userdata('site_lang',$default);
        }
    }
}