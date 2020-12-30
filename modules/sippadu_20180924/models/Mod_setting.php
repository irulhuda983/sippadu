<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_setting extends CI_Model {
	
	function op_setting(){
		$h = array();
		$h['0'] = '- Pilih Setting -';
		$h['1'] = 'Data Pemda';
		$h['2'] = 'Konten Statis';
		return $h;
	}
	
	
	function op_jenis_setting($Kd_Izin=0){
		$a = $this->db->where('Kd_Setting',$Kd_Izin)->order_by('Sort_Order','ASC')->order_by('Keterangan','ASC')->get('tb_setting');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['no'] = '- Pilih Parameter -';
				$h[$aa->Param] = $aa->Nm_Format;
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
	
	function save_master_parameter($idsetting=0,$param=0,$filename=''){
		$wh['Kd_Setting'] = $idsetting;
		$wh['Param'] = $param;
		if($this->input->post('Jn_Format')=='3'){
			$in['Format'] = $filename;
		}
		else{
			$in['Format'] = $this->input->post('format');
		}
		//$in['Jn_Format'] = $jn_format;
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
	
	function modul_izin($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.Kd_Izin ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
				
		if($this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND ((a.Nm_Izin like "%'.$keyword.'%") OR (a.Kd_Class like "%'.$keyword.'%"))';
		}
		
		
		$a = $this->db->query('SELECT a.* FROM tb_izin a WHERE a.Kd_Izin >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_izin(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['Kd_Izin'] = $id;
				$this->db->delete('tb_izin',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_izin(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 1;
				$wh['Kd_Izin'] = $id;
				$this->db->update('tb_izin',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_izin(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['Status'] = 0;
				$wh['Kd_Izin'] = $id;
				$this->db->update('tb_izin',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_mod_izin($id=0){
		$a = $this->db->where('Kd_Izin',$id)->get('tb_izin');
		return $a;
	}
	
	function insert_mod_izin(){
		$this->form_validation->set_rules('Kd_Izin','Kode Izin','required');
		$this->form_validation->set_rules('Nm_Izin','Nama Izin','required');
		$this->form_validation->set_rules('Kd_Class','Kode Class','required');
		$this->form_validation->set_rules('Syarat_Ketentuan','Syarat & Ketentuan','');
		
		if($this->form_validation->run() == TRUE){
			$in['Kd_Izin'] = $this->input->post('Kd_Izin');
			$in['Nm_Izin'] = $this->input->post('Nm_Izin');
			$in['Kd_Class'] = $this->input->post('Kd_Class');
			$in['Syarat_Ketentuan'] = $this->input->post('Syarat_Ketentuan');
			$in['Kd_Group'] = 1;			
			$in['Status'] = 1;			
			$a = $this->db->insert('tb_izin',$in);
			
			if($a){
				set_alert('success','Data berhasil ditambahkan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal ditambahkan');
				redirect(current_url());
			}
			return $a;
		}
	}
	
	function update_mod_izin($id=0){
		$this->form_validation->set_rules('Kd_Izin','Kode Izin','required');
		$this->form_validation->set_rules('Nm_Izin','Nama Izin','required');
		$this->form_validation->set_rules('Kd_Class','Kode Class','required');
		$this->form_validation->set_rules('Syarat_Ketentuan','Syarat & Ketentuan','');
		
		if($this->form_validation->run() == TRUE){
			$wh['Kd_Izin'] = $id;
			$in['Nm_Izin'] = $this->input->post('Nm_Izin');
			$in['Kd_Class'] = $this->input->post('Kd_Class');
			$in['Syarat_Ketentuan'] = $this->input->post('Syarat_Ketentuan');
			//$in['Kd_Group'] = 1;			
			//$in['Status'] = 1;			
			$a = $this->db->update('tb_izin',$in,$wh);
			
			if($a){
				set_alert('success','Data berhasil diupdate');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal diupdate');
				redirect(current_url());
			}
			return $a;
		}
	}
}
