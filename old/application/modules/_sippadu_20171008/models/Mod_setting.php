<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_setting extends CI_Model {
	
	function op_setting(){
		$h = array();
		$h['0'] = '- Pilih Setting -';
		$h['1'] = 'Data Pemda';
		return $h;
	}
	
	
	function op_jenis_setting($Kd_Izin=0){
		$a = $this->db->where('Kd_Setting',$Kd_Izin)->order_by('Param','ASC')->get('tb_setting');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['no'] = '- Pilih Parameter -';
				$h[$aa->Param] = $aa->Keterangan;
			}
		}
		else{
			$h['no'] = '- Pilih Parameter -';
		}
		return $h;
		
	}
	
	
	function get_setting($idsetting=0,$param=0){
		$a = $this->db->where('Kd_Setting',$idsetting)->where('Param',$param)->get('tb_setting');
		return $a;
	}
	
	function save_master_parameter($idsetting=0,$param=0){
		$wh['Kd_Setting'] = $idsetting;
		$wh['Param'] = $param;
		$in['Format'] = $this->input->post('format');
		$a = $this->db->update('tb_setting',$in,$wh);
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
