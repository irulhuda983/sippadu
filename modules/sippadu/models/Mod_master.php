<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_master extends CI_Model {
	
	
	function tbl_provinsi($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY ID_PROVINSI ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'WHERE (NAMA_PROVINSI like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select * from tbprovinsi '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_provinsi(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_PROVINSI'] = $id;
				$this->db->delete('tbprovinsi',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_provinsi(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 1;
				$wh['ID_PROVINSI'] = $id;
				$this->db->update('tbprovinsi',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_provinsi(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 0;
				$wh['ID_PROVINSI'] = $id;
				$this->db->update('tbprovinsi',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_provinsi($id=0){
		$a = $this->db->where('ID_PROVINSI',$id)->get('tbprovinsi');
		return $a;
	}
	
	function insert_provinsi(){
		$this->form_validation->set_rules('provinsi','Nama Provinsi','required');
		
		if($this->form_validation->run() == TRUE){
			$in['ID_PROVINSI'] = $this->input->post('kode_provinsi');
			$in['NAMA_PROVINSI'] = $this->input->post('provinsi');
			$in['STATUS'] = 1;			
			$a = $this->db->insert('tbprovinsi',$in);
			
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
		
	function update_provinsi($id=0){
		$this->form_validation->set_rules('provinsi','Nama Provinsi','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_PROVINSI'] = $id;
			$in['ID_PROVINSI'] = $this->input->post('kode_provinsi');
			$in['NAMA_PROVINSI'] = $this->input->post('provinsi');
			$a = $this->db->update('tbprovinsi',$in,$wh);
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
	
	
	function tbl_kota($provinsi=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_KOTA ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.NAMA_KOTA like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select a.*,b.ID_PROVINSI,b.NAMA_PROVINSI from tbkota a inner join tbprovinsi b ON a.ID_PROVINSI = b.ID_PROVINSI WHERE a.ID_PROVINSI LIKE "'.$provinsi.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_kota(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_KOTA'] = $id;
				$this->db->delete('tbkota',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_kota(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 1;
				$wh['ID_KOTA'] = $id;
				$this->db->update('tbkota',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_kota(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 0;
				$wh['ID_KOTA'] = $id;
				$this->db->update('tbkota',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_kota($id=0){
		$a = $this->db->where('ID_KOTA',$id)->get('tbkota');
		return $a;
	}
	
	function insert_kota($provinsi=0){
		$this->form_validation->set_rules('kota','Nama Kota','required');
		
		if($this->form_validation->run() == TRUE){
			$in['ID_PROVINSI'] = $provinsi;
			$in['ID_KOTA'] = $this->input->post('kode_kota');
			$in['NAMA_KOTA'] = $this->input->post('kota');
			$in['STATUS'] = 1;			
			$a = $this->db->insert('tbkota',$in);
			
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
		
	function update_kota($id=0){
		$this->form_validation->set_rules('kota','Nama Kota','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_KOTA'] = $id;
			//$in['ID_PROVINSI'] = $this->input->post('provinsi');
			$in['ID_KOTA'] = $this->input->post('kode_kota');
			$in['NAMA_KOTA'] = $this->input->post('kota');
			$a = $this->db->update('tbkota',$in,$wh);
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
	
	
	
	
	function tbl_kecamatan($kota=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_KECAMATAN ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.NAMA_KECAMATAN like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select a.*,b.ID_KOTA,b.NAMA_KOTA,c.ID_PROVINSI,c.NAMA_PROVINSI from tbkecamatan a inner join tbkota b ON a.ID_KOTA = b.ID_KOTA INNER JOIN tbprovinsi c ON b.ID_PROVINSI = c.ID_PROVINSI WHERE a.ID_KOTA LIKE "'.$kota.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_kecamatan(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_KECAMATAN'] = $id;
				$this->db->delete('tbkecamatan',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_kecamatan(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 1;
				$wh['ID_KECAMATAN'] = $id;
				$this->db->update('tbkecamatan',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_kecamatan(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 0;
				$wh['ID_KECAMATAN'] = $id;
				$this->db->update('tbkecamatan',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_kecamatan($id=0){
		$a = $this->db->where('ID_KECAMATAN',$id)->get('tbkecamatan');
		return $a;
	}
	
	function insert_kecamatan($kota=0){
		$this->form_validation->set_rules('kecamatan','Nama Kecamatan','required');
		
		if($this->form_validation->run() == TRUE){
			$in['ID_KOTA'] = $kota;
			$in['ID_KECAMATAN'] = $this->input->post('kode_kecamatan');
			$in['NAMA_KECAMATAN'] = $this->input->post('kecamatan');
			$in['STATUS'] = 1;			
			$a = $this->db->insert('tbkecamatan',$in);
			
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
		
	function update_kecamatan($id=0){
		$this->form_validation->set_rules('kecamatan','Nama Kecamatan','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_KECAMATAN'] = $id;
			//$in['ID_KOTA'] = $this->input->post('kota');
			$in['ID_KECAMATAN'] = $this->input->post('kode_kecamatan');
			$in['NAMA_KECAMATAN'] = $this->input->post('kecamatan');
			$a = $this->db->update('tbkecamatan',$in,$wh);
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
	
	function tbl_desa($kecamatan=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY a.ID_DESA ASC';
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (a.NAMA_DESA like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select a.*,b.ID_KOTA,b.NAMA_KECAMATAN,b.ID_KECAMATAN,c.ID_KOTA,c.NAMA_KOTA,d.ID_PROVINSI,d.NAMA_PROVINSI from tbdesa a inner join tbkecamatan b ON a.ID_KECAMATAN = b.ID_KECAMATAN INNER JOIN tbkota c ON b.ID_KOTA = c.ID_KOTA INNER JOIN tbprovinsi d ON c.ID_PROVINSI = d.ID_PROVINSI WHERE a.ID_KECAMATAN LIKE "'.$kecamatan.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function delete_desa(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID_DESA'] = $id;
				$this->db->delete('tbdesa',$wh);
			}
			set_alert('success','Data berhasil dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function enable_desa(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 1;
				$wh['ID_DESA'] = $id;
				$this->db->update('tbdesa',$in,$wh);
			}
			set_alert('success','Data berhasil diaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal diaktifkan');
			redirect(current_url());
		}
	}
	
	function disable_desa(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$in['STATUS'] = 0;
				$wh['ID_DESA'] = $id;
				$this->db->update('tbdesa',$in,$wh);
			}
			set_alert('success','Data berhasil dinonaktifkan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dinonaktifkan');
			redirect(current_url());
		}
	}
	
	function data_desa($id=0){
		$a = $this->db->where('ID_DESA',$id)->get('tbdesa');
		return $a;
	}
	
	function insert_desa($kecamatan=0){
		$this->form_validation->set_rules('desa','Nama Kecamatan','required');
		
		if($this->form_validation->run() == TRUE){
			$in['ID_KECAMATAN'] = $kecamatan;
			$in['ID_DESA'] = $this->input->post('kode_desa');
			$in['NAMA_DESA'] = $this->input->post('desa');
			$in['JENIS'] = $this->input->post('jenis');
			$in['STATUS'] = 1;			
			$a = $this->db->insert('tbdesa',$in);
			
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
		
	function update_desa($id=0){
		$this->form_validation->set_rules('desa','Nama Kecamatan','required');
		
		if($this->form_validation->run() == TRUE){
			$wh['ID_DESA'] = $id;
			//$in['ID_KOTA'] = $this->input->post('kota');
			$in['ID_DESA'] = $this->input->post('kode_desa');
			$in['NAMA_DESA'] = $this->input->post('desa');
			$in['JENIS'] = $this->input->post('jenis');
			$a = $this->db->update('tbdesa',$in,$wh);
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
	
	
	
	function parent_kota($id=0){
		$a = $this->db->where('ID_KOTA',$id)->get('tbkota');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_PROVINSI;
		}
		return $h;
	}
	
	function parent_kecamatan($id=0){
		$a = $this->db->where('ID_KECAMATAN',$id)->get('tbkecamatan');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_KOTA;
		}
		return $h;
	}
	
	function parent_desa($id=0){
		$a = $this->db->where('ID_DESA',$id)->get('tbdesa');
		$h = 0;
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_KECAMATAN;
		}
		return $h;
	}
	
}
