<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_sippadu extends CI_Model {
	
	function op_provinsi(){
		/*if($this->input->post('op_provinsi')){
			$this->session->set_userdata('op_provinsi',$this->input->post('op_provinsi'));
		}*/
		
		$a = $this->db->order_by('NAMA_PROVINSI','ASC')->get('tbprovinsi');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Provinsi -';
				$h[$aa->ID_PROVINSI] = $aa->NAMA_PROVINSI;
			}
		}
		else{
			$h['0'] = '- Pilih Provinsi -';
		}
		return $h;
	}
	
	function op_kota(){
		
		/*if($this->input->post('op_provinsi')){
			$op_provinsi = $this->input->post('op_provinsi');
			$this->session->set_userdata('op_provinsi',$this->input->post('op_provinsi'));
		}
		else{
			$op_provinsi = $this->session->userdata('op_provinsi');
		}
		
		if($this->input->post('op_kota')){
			$this->session->set_userdata('op_kota',$this->input->post('op_kota'));
		}
		*/
		$op_provinsi = $this->input->post('op_provinsi');
		$a = $this->db->where('ID_PROVINSI',$op_provinsi)->order_by('NAMA_KOTA','ASC')->get('tbkota');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Kota -';
				$h[$aa->ID_KOTA] = $aa->NAMA_KOTA;
			}
		}
		else{
			$h['0'] = '- Pilih Kota -';
		}
		return $h;
	}
	
	function op_kecamatan(){
		
		/*if($this->input->post('op_kota')){
			$op_kota = $this->input->post('op_kota');
			$this->session->set_userdata('op_kota',$this->input->post('op_kota'));
		}
		else{
			$op_kota = $this->session->userdata('op_kota');
		}
		
		if($this->input->post('op_kecamatan')){
			$this->session->set_userdata('op_kecamatan',$this->input->post('op_kecamatan'));
		}
		*/
		$op_kota = $this->input->post('op_kota');
		$a = $this->db->where('ID_KOTA',$op_kota)->order_by('NAMA_KECAMATAN','ASC')->get('tbkecamatan');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Kecamatan -';
				$h[$aa->ID_KECAMATAN] = $aa->NAMA_KECAMATAN;
			}
		}
		else{
			$h['0'] = '- Pilih Kecamatan -';
		}
		return $h;
	}
	
	function op_desa(){
		
		/*if($this->input->post('op_kecamatan')){
			$op_kecamatan = $this->input->post('op_kecamatan');
			$this->session->set_userdata('op_kecamatan',$this->input->post('op_kecamatan'));
		}
		else{
			$op_kecamatan = $this->session->userdata('op_kecamatan');
		}
		
		if($this->input->post('op_desa')){
			$this->session->set_userdata('op_desa',$this->input->post('op_desa'));
		}
		*/
		$op_kecamatan = $this->input->post('op_kecamatan');
		$a = $this->db->where('ID_KECAMATAN',$op_kecamatan)->order_by('NAMA_DESA','ASC')->get('tbdesa');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Desa -';
				$h[$aa->ID_DESA] = $aa->NAMA_DESA;
			}
		}
		else{
			$h['0'] = '- Pilih Desa -';
		}
		return $h;
	}
	
	
	function op_provinsi2(){
		/*if($this->input->post('op_provinsi')){
			$this->session->set_userdata('op_provinsi',$this->input->post('op_provinsi'));
		}*/
		
		$a = $this->db->order_by('NAMA_PROVINSI','ASC')->get('tbprovinsi');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Provinsi -';
				$h[$aa->ID_PROVINSI] = $aa->NAMA_PROVINSI;
			}
		}
		else{
			$h['0'] = '- Pilih Provinsi -';
		}
		return $h;
	}
	
	function op_kota2(){
		
		/*if($this->input->post('op_provinsi')){
			$op_provinsi = $this->input->post('op_provinsi');
			$this->session->set_userdata('op_provinsi',$this->input->post('op_provinsi'));
		}
		else{
			$op_provinsi = $this->session->userdata('op_provinsi');
		}
		
		if($this->input->post('op_kota')){
			$this->session->set_userdata('op_kota',$this->input->post('op_kota'));
		}
		*/
		$op_provinsi = $this->input->post('op_provinsi2');
		$a = $this->db->where('ID_PROVINSI',$op_provinsi)->order_by('NAMA_KOTA','ASC')->get('tbkota');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Kota -';
				$h[$aa->ID_KOTA] = $aa->NAMA_KOTA;
			}
		}
		else{
			$h['0'] = '- Pilih Kota -';
		}
		return $h;
	}
	
	function op_kecamatan2(){
		
		/*if($this->input->post('op_kota')){
			$op_kota = $this->input->post('op_kota');
			$this->session->set_userdata('op_kota',$this->input->post('op_kota'));
		}
		else{
			$op_kota = $this->session->userdata('op_kota');
		}
		
		if($this->input->post('op_kecamatan')){
			$this->session->set_userdata('op_kecamatan',$this->input->post('op_kecamatan'));
		}
		*/
		$op_kota = $this->input->post('op_kota2');
		$a = $this->db->where('ID_KOTA',$op_kota)->order_by('NAMA_KECAMATAN','ASC')->get('tbkecamatan');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Kecamatan -';
				$h[$aa->ID_KECAMATAN] = $aa->NAMA_KECAMATAN;
			}
		}
		else{
			$h['0'] = '- Pilih Kecamatan -';
		}
		return $h;
	}
	
	function op_desa2(){
		
		/*if($this->input->post('op_kecamatan')){
			$op_kecamatan = $this->input->post('op_kecamatan');
			$this->session->set_userdata('op_kecamatan',$this->input->post('op_kecamatan'));
		}
		else{
			$op_kecamatan = $this->session->userdata('op_kecamatan');
		}
		
		if($this->input->post('op_desa')){
			$this->session->set_userdata('op_desa',$this->input->post('op_desa'));
		}
		*/
		$op_kecamatan = $this->input->post('op_kecamatan2');
		$a = $this->db->where('ID_KECAMATAN',$op_kecamatan)->order_by('NAMA_DESA','ASC')->get('tbdesa');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '- Pilih Desa -';
				$h[$aa->ID_DESA] = $aa->NAMA_DESA;
			}
		}
		else{
			$h['0'] = '- Pilih Desa -';
		}
		return $h;
	}
	
	function op_bentuk_perusahaan(){
		$h = array();
		$h['0'] = '- Pilih Bentuk Usaha -';
		$h['1'] = 'Perseroan Terbatas (PT)';
		$h['2'] = 'Perseroan Terbatas Belum Berbadan Hukum';
		$h['3'] = 'Persekutuan Comanditer (CV)';
		$h['4'] = 'Firma (FA)';
		$h['5'] = 'Koperasi';
		$h['6'] = 'Perusahaan Perorangan';
		$h['7'] = 'Bentuk Perusahaan Lainnya';
		return $h;
	}
	
	function get_data_perusahaan($id=0){
		$a = $this->db->where('IDPERUSAHAAN',$id)->get('tbperusahaan');
		return $a;
	}
	
	
	function get_data_izin(){
		$a = $this->db->order_by('Kd_Izin','ASC')->where('Status',1)->get('tb_izin');
		return $a;
	}
}
