<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_personal extends CI_Model {
	
	function get_tbl_personal($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY NM_PELANGGAN ASC';
		//$order = 'p.NM_PELANGGAN ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			//$keyword = 'anggaran';
			$q_where .= 'AND (p.IDPELANGGAN like "%'.$keyword.'%"  or p.NM_PELANGGAN like "%'.$keyword.'%" OR p.NOKITAS like "%'.$keyword.'%" OR p.ALAMATPELANGGAN like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select p.*, v.ID_PROVINSI, v.NAMA_PROVINSI, q.ID_KOTA, q.NAMA_KOTA, k.ID_KECAMATAN,k.NAMA_KECAMATAN, d.ID_DESA, d.NAMA_DESA from tbpelanggan p, tbkecamatan k, tbdesa d, tbkota q, tbprovinsi v where v.ID_PROVINSI = p.PROVINSI AND q.ID_KOTA = p.KOTA and k.ID_KECAMATAN=p.KECAMATAN and d.ID_DESA=p.DESA and d.ID_KECAMATAN=p.KECAMATAN '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
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
	
	function get_personal($id=0){
		$a = $this->db->where('IDPELANGGAN',$id)->get('tbpelanggan');
		return $a;
	}
	
	function delete_fo_tbl(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['IDPELANGGAN'] = $id;
				$this->db->delete('tbpelanggan',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function insert_personal_fo($win=FALSE,$redirect=FALSE){
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','');
		$this->form_validation->set_rules('gender','Jenis Kelamin','is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('nokitas','No Identitas','required|is_unique[tbpelanggan.NOKITAS]');
		$this->form_validation->set_rules('npwp','NPWP','is_unique[tbpelanggan.NPWP]');
		$this->form_validation->set_rules('telepon','Telepon','');
		$this->form_validation->set_rules('hp','HP','');
		$this->form_validation->set_rules('fax','Fax','');
		$this->form_validation->set_rules('email','Email','');
		if($this->form_validation->run() == TRUE){
			
			$q_last_id = $this->db->select_max('ID','ID')->where('YEAR(TGL_DAFTAR)',TimeNow('Y'))->get('tbpelanggan');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}
			$in['ID'] = $last_id;
			$in['IDPELANGGAN'] = $idpelanggan = TimeNow('Y').str_pad($last_id,5,0,STR_PAD_LEFT);
			$in['NM_PELANGGAN'] = $this->input->post('nama');
			$in['TEMPAT_LAHIR'] = $this->input->post('tempat_lahir');
			$in['TGL_LAHIR'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in['SEX'] = $this->input->post('gender');
			$in['PEKERJAAN'] = $this->input->post('pekerjaan');
			$in['ALAMATPELANGGAN'] = $this->input->post('alamat');
			$in['PROVINSI'] = $this->input->post('op_provinsi');
			$in['KOTA'] = $this->input->post('op_kota');
			$in['KECAMATAN'] = $this->input->post('op_kecamatan');
			$in['DESA'] = $this->input->post('op_desa');
			$in['TELP'] = $this->input->post('telepon');
			$in['FAX'] = $this->input->post('fax');
			$in['EMAIL'] = $this->input->post('email');
			$in['IDENTITAS'] = '01';
			$in['NOKITAS'] = $this->input->post('nokitas');
			$in['JNS_PELANGGAN'] = '01';
			$in['TGL_DAFTAR'] = TimeNow('Y-m-d H:i:s');
			$in['NPWP'] = $this->input->post('npwp');
			$in['NO_HP'] = $this->input->post('hp');
			$in['STATUS_DAFTAR'] = 'L';
			$a = $this->db->insert('tbpelanggan',$in);
			if($a){
				set_alert('success','Data berhasil disimpan');
				if($win){
					if($redirect){
						$this->session->set_flashdata('WindowRedirect',1);
						$this->session->set_flashdata('IDRedirect',$idpelanggan);
					}
					else{
						$this->session->set_flashdata('WindowReload',1);
					}
				}
				
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function update_personal_fo($id=0,$win=FALSE,$redirect=FALSE){
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','');
		$this->form_validation->set_rules('bulan_lahir','Bulan Lahir','');
		$this->form_validation->set_rules('tahun_lahir','Tahun Lahir','');
		$this->form_validation->set_rules('gender','Jenis Kelamin','is_natural_no_zero');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('nokitas','No Identitas','required');
		$this->form_validation->set_rules('npwp','NPWP','');
		$this->form_validation->set_rules('telepon','Telepon','');
		$this->form_validation->set_rules('hp','HP','');
		$this->form_validation->set_rules('fax','Fax','');
		$this->form_validation->set_rules('email','Email','');
		if($this->form_validation->run() == TRUE){
			
			$wh['IDPELANGGAN'] = $id;
			$in['NM_PELANGGAN'] = $this->input->post('nama');
			$in['TEMPAT_LAHIR'] = $this->input->post('tempat_lahir');
			$in['TGL_LAHIR'] = db_time($this->input->post('tanggal_lahir').'/'.$this->input->post('bulan_lahir').'/'.$this->input->post('tahun_lahir'));
			$in['SEX'] = $this->input->post('gender');
			$in['PEKERJAAN'] = $this->input->post('pekerjaan');
			$in['ALAMATPELANGGAN'] = $this->input->post('alamat');
			$in['PROVINSI'] = $this->input->post('op_provinsi');
			$in['KOTA'] = $this->input->post('op_kota');
			$in['KECAMATAN'] = $this->input->post('op_kecamatan');
			$in['DESA'] = $this->input->post('op_desa');
			$in['TELP'] = $this->input->post('telepon');
			$in['FAX'] = $this->input->post('fax');
			$in['EMAIL'] = $this->input->post('email');
			$in['IDENTITAS'] = '01';
			$in['NOKITAS'] = $this->input->post('nokitas');
			$in['JNS_PELANGGAN'] = '01';
			$in['TGL_DAFTAR'] = TimeNow('Y-m-d H:i:s');
			$in['NPWP'] = $this->input->post('npwp');
			$in['NO_HP'] = $this->input->post('hp');
			$in['STATUS_DAFTAR'] = 'L';
			$a = $this->db->update('tbpelanggan',$in,$wh);
			if($a){
				set_alert('success','Data berhasil disimpan');
				if($win){
					if($redirect){
						$this->session->set_flashdata('WindowRedirect',1);
						$this->session->set_flashdata('IDRedirect',$idpelanggan);
					}
					else{
						$this->session->set_flashdata('WindowReload',1);
					}
				}
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
}
