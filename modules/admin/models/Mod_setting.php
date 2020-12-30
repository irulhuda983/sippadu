<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_setting extends CI_Model {
	
	function op_config(){
		$a = $this->db->where('Web_Config',1)->order_by('Nm_Config','ASC')->get('ci_config');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['no'] = '- '.lang('Pilih Konfigurasi').' -';
				$h[$aa->ID_Config] = $aa->Nm_Config;
			}
		}
		else{
			$h['no'] = '- '.lang('Pilih Konfigurasi').' -';
		}
		return $h;
		
	}
	
	
	function get_config($id=0){
		$ID_Web = config();
		$a = $this->db->query('CALL ci_GetConfig('.$ID_Web.','.$id.')');
		$a->next_result();
		return $a;
	}
	
	function save_config($idsetting=0,$filename=''){
		$wh['ID_Web'] = config();
		$wh['ID_Config'] = $idsetting;
		if($this->input->post('Jn_Config')=='5'){
			$in['Value'] = $filename;
		}
		else{
			$in['Value'] = $this->input->post('value');
		}
		
		$cek = $this->db->where('ID_Web',config())->where('ID_Config',$idsetting)->get('ci_config_log')->num_rows();
		if($cek > 0){
			$a = $this->db->update('ci_config_log',$in,$wh);
		}
		else{
			$in['ID_Web'] = config();
			$in['ID_Config'] = $idsetting;
			$a = $this->db->insert('ci_config_log',$in);
		}
		
		if($a){
			set_alert('success','Setting berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Setting gagal disimpan');
			redirect(current_url());
		}
	}
}
