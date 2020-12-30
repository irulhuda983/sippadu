<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_dokumen extends CI_Model {
	
	function get_tbl_dokumen($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY Nm_Dok ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (p.Nm_Dok like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select * from tb_dokumen where Status >= 0 '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function get_dokumen($id=0){
		$a = $this->db->where('Kd_Dok',$id)->get('tb_dokumen');
		return $a;
	}
	
	function delete_master_jenis_dok(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['Kd_Dok'] = $id;
				$this->db->delete('tb_dokumen',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function insert_dokumen_jenis(){
		$this->form_validation->set_rules('nama','Nama Dokumen','required');
		if($this->form_validation->run() == TRUE){
			
			$in['Nm_Dok'] = $this->input->post('nama');
			$in['Status'] = 1;
			$a = $this->db->insert('tb_dokumen',$in);
			if($a){
				set_alert('success','Data berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
		return $a;
	}
	
	function update_dokumen_jenis($id=0){
		$this->form_validation->set_rules('nama','Nama Dokumen','required');
		if($this->form_validation->run() == TRUE){
			
			$wh['Kd_Dok'] = $id;
			$in['Nm_Dok'] = $this->input->post('nama');
			$a = $this->db->update('tb_dokumen',$in,$wh);
			if($a){
				set_alert('success','Data berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function op_izin(){
		$a = $this->db->where('Status',1)->order_by('Nm_Izin','ASC')->get('tb_izin');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['no'] = '- Pilih Izin -';
				$h[$aa->Kd_Izin] = $aa->Nm_Izin;
			}
		}
		else{
			$h['no'] = '- Pilih Izin -';
		}
		return $h;
		
	}
	
	function op_jenis_izin($idizin=0){
		switch($idizin){
			case 3:
				$kd = '2';
				break;
			case 4:
				$kd = '3';
				break;
			default:
				$kd = '';
				break;
		}
		$h = array();
		$h['no'] = '- Pilih Jenis -';
		$h['1'] = label_jenis_izin(1,$kd);
		$h['2'] = label_jenis_izin(2,$kd);
		$h['3'] = label_jenis_izin(3,$kd);
		return $h;
		
	}
	
	function op_jenis_parameter($Kd_Izin=0){
		$a = $this->db->where('Kd_Izin',$Kd_Izin)->order_by('Param','ASC')->get('tb_parameter');
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
	
	function save_master_dok($idizin=0,$idjenis=0){
		if($idizin > 0){
			$wh['Kd_Izin'] = $idizin;
			$wh['Kd_Jenis'] = $idjenis;
			$this->db->delete('tb_dokumen_setting',$wh);
			$mdl = $this->input->post('chk');
			$cmdl = count($mdl);
			if(is_array($mdl)){
				for($i=0;$i<$cmdl;$i++){
					$in['Kd_Izin'] = $idizin;
					$in['Kd_Jenis'] = $idjenis;
					$in['Kd_Dok'] = $mdl[$i];
					$this->db->insert('tb_dokumen_setting',$in);
				}
				set_alert('success','Setting dokumen izin berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Setting dokumen izin gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function get_parameter($idizin=0,$param=0){
		$a = $this->db->where('Kd_Izin',$idizin)->where('Param',$param)->get('tb_parameter');
		return $a;
	}
	
	function save_master_parameter($idizin=0,$param=0){
		$wh['Kd_Izin'] = $idizin;
		$wh['Param'] = $param;
		$in['Format'] = $this->input->post('format');
		$a = $this->db->update('tb_parameter',$in,$wh);
		if($a){
			set_alert('success','Setting parameter berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Setting parameter gagal disimpan');
			redirect(current_url());
		}
	}
}
