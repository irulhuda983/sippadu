<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_siup extends CI_Model {
	
	function get_tbl_siup_fo($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOW = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_siup_bo($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOW = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_siup_kabid($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOWA = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_siup_kadin($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOWA = "1" and tbsiup.FLOWB = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_siup_tu($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOWA = "1" and tbsiup.FLOWB = "1" and tbsiup.FLOWC = "'.$status.'" and tbsiup.FLOWD = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_siup_cetak($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOWA = 1 and tbsiup.FLOWB = 1 and tbsiup.FLOWC = 1 and tbsiup.FLOWD = 1 AND tbsiup.FLOWE = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_siup_serah($status=0,$limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		if($status==1){
			$q_order = 'ORDER BY ID DESC';
		}
		else{
			$q_order = 'ORDER BY ID ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (tbsiup.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbsiup.IDSIUP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbsiup.ID,
		tbsiup.IDSIUP,
		tbsiup.IDPELANGGAN,
		tbsiup.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbsiup.JENIS_IZIN,
		tbsiup.NO_SK,
		tbsiup.TGL_SK,
		tbsiup.FLOW,
		tbsiup.FLOWA,
		tbsiup.FLOWB,
		tbsiup.FLOWC,
		tbsiup.FLOWD,
		tbsiup.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbsiup.TGL_BUAT,
		case tbsiup.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbsiup
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN WHERE tbsiup.FLOWA = 1 and tbsiup.FLOWB = 1 and tbsiup.FLOWC = 1 and tbsiup.FLOWD = 1 and tbsiup.FLOWE = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_personal($limit=0,$offset=0){
		$q_limit = '';
		$q_where = '';
		$q_order = 'ORDER BY NM_PELANGGAN ASC';
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (p.IDPELANGGAN like "%'.$keyword.'%"  or p.NM_PELANGGAN like "%'.$keyword.'%" OR p.NOKITAS like "%'.$keyword.'%" OR p.ALAMATPELANGGAN like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('select p.*, v.ID_PROVINSI, v.NAMA_PROVINSI, q.ID_KOTA, q.NAMA_KOTA, k.ID_KECAMATAN,k.NAMA_KECAMATAN, d.ID_DESA, d.NAMA_DESA from tbpelanggan p, tbkecamatan k, tbdesa d, tbkota q, tbprovinsi v where v.ID_PROVINSI = p.PROVINSI AND q.ID_KOTA = p.KOTA and k.ID_KECAMATAN=p.KECAMATAN and d.ID_DESA=p.DESA and d.ID_KECAMATAN=p.KECAMATAN '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	
	function op_provinsi(){
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
	
	function get_siup($id=0){
		$a = $this->db->where('ID',$id)->get('tbsiup');
		return $a;
	}
	
	function delete_tbl_siup(){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			$count_success = array();
			$count_error = array();
			foreach($chk as $id){
				$wh['ID'] = $id;
				$wh['FLOWB'] = '0';
				$wh['FLOWC'] = '0';
				$wh['FLOWD'] = '0';
				$wh['FLOWE'] = '0';
				$a = $this->db->get_where('tbsiup',$wh);
				if($a->num_rows() > 0){
					$b = $this->db->delete('tbsiup',$wh);
					$count_success[] = 1; 
				}
				else{
					$count_error[] = 1;
				}
				
			}
			set_alert('info',count($count_success).' data berhasil dihapus. '.count($count_error).' data gagal dihapus');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal dihapus');
			redirect(current_url());
		}
	}
	
	function verifikasi_tbl_siup($param='',$status=1){
		$chk = $this->input->post('chk');
		if(is_array($chk)){
			foreach($chk as $id){
				$wh['ID'] = $id;
				switch($param){
					case 'bo':
						$in['FLOW'] = $status;
						$in['Nm_BO'] = $this->session->userdata('userfullname');
						break;
					case 'kabid':
						$in['FLOWA'] = $status;
						$in['Nm_Kabid'] = $this->session->userdata('userfullname');
						break;
					case 'kadin':
						$in['FLOWB'] = $status;
						$in['Nm_Kadin'] = $this->session->userdata('userfullname');
						break;
					case 'tu':
						$in['FLOWC'] = $status;
						$in['FLOWD'] = $status;
						$in['Nm_TU'] = $this->session->userdata('userfullname');
						if($status=='1'){
							$in['TGL_PENERIMA'] = TimeNow('Y-m-d H:i');
						}
						else{
							$in['TGL_PENERIMA'] = NULL;
						}
						break;
					case 'serah':
						$in['FLOWE'] = $status;
						$in['Nm_Serah'] = $this->session->userdata('userfullname');
						if($status=='1'){
							$in['Time_Diambil'] = TimeNow('Y-m-d H:i');
						}
						else{
							$in['Time_Diambil'] = NULL;
						}
						break;
					default:
						$in['FLOWA'] = $status;
						break;
				}
				
				$this->db->update('tbsiup',$in,$wh);
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function insert_siup_fo(){
		$Kd_Access = $this->input->post('Kd_Access');
		$Kd_Izin = $this->input->post('Kd_Izin');
		$Kd_Jenis = $this->input->post('jenis_izin');
		
		$this->form_validation->set_rules('no_mohon','No Surat Mohon','');
		$this->form_validation->set_rules('tgl_mohon','Tanggal Mohon','');
		$this->form_validation->set_rules('op_pengurus_permohonan','Pengurus Permohonan','is_natural_no_zero');
		$this->form_validation->set_rules('nama_pengurus','Nama Pengurus','');
		$this->form_validation->set_rules('alamat_pengurus','Alamat Pengurus','');
		$this->form_validation->set_rules('hp_pengurus','No HP Pengurus','');
		
		$this->form_validation->set_rules('jenis_izin','Jenis Izin','is_natural_no_zero');
		$this->form_validation->set_rules('urutan','Registrasi Ke','');
		$this->form_validation->set_rules('no_sk_lama','Nomor SK Lama','');
		$this->form_validation->set_rules('tgl_sk_lama','Tanggal SK Lama','');
		
		$this->form_validation->set_rules('op_perusahaan','Pilih Perusahaan','');
		$this->form_validation->set_rules('nama_perusahaan','Nama Usaha','required');
		$this->form_validation->set_rules('alamat_perusahaan','Alamat Usaha','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('npwp_perusahaan','NPWP','');
		$this->form_validation->set_rules('telepon_perusahaan','Telepon','');
		$this->form_validation->set_rules('fax_perusahaan','Fax','');
		$this->form_validation->set_rules('email','Email','valid_email');
		$this->form_validation->set_rules('web_perusahaan','Website','');
		$this->form_validation->set_rules('op_bentuk_perusahaan','Bentuk Perusahaan','is_natural_no_zero');
		$this->form_validation->set_rules('jabatan','Jabatan','required');
		
		if($Kd_Access == 'bo'){
			$this->form_validation->set_rules('op_kategori_siup','Kategori SIUP','is_natural_no_zero');
			$this->form_validation->set_rules('op_status_perusahaan','Status Perusahaan','is_natural_no_zero');
			$this->form_validation->set_rules('daftar_ulang','Daftar Ulang','');
			$this->form_validation->set_rules('nilai_modal','Nilai Modal','');
			$this->form_validation->set_rules('nilai_tanah','Nilai Tanah','');
			$this->form_validation->set_rules('nilai_bangunan','Nilai Bangunan','');
			$this->form_validation->set_rules('naker_a','Jabatan','');
			$this->form_validation->set_rules('naker_b','Jabatan','');
			$this->form_validation->set_rules('op_kegiatan_usaha','Kegiatan Usaha','required');
			$this->form_validation->set_rules('op_kelembagaan','Kelembagaan','required');
			$this->form_validation->set_rules('kbli','KBLI','required');
			$this->form_validation->set_rules('jenis_barang','Barang/Jasa Dagangan Utama','required');
			$this->form_validation->set_rules('no_sk','Nomor SK','required');
			$this->form_validation->set_rules('no_urut_sk','No Urut SK','required');
			$this->form_validation->set_rules('tgl_sk','Tanggal SK','required');
		}
		
		
		if($this->form_validation->run() == TRUE){
			
			$idperusahaan = $this->input->post('op_perusahaan');
			$in['IDPELANGGAN'] = $this->input->post('idpelanggan');
			$in['NM_PERUSAHAAN'] = $this->input->post('nama_perusahaan');
			$in['ALAMAT'] = $this->input->post('alamat_perusahaan');
			$in['PROVINSI'] = $this->input->post('op_provinsi');
			$in['KOTA'] = $this->input->post('op_kota');
			$in['KECAMATAN'] = $this->input->post('op_kecamatan');
			$in['DESA'] = $this->input->post('op_desa');
			$in['NPWP'] = $this->input->post('npwp_perusahaan');
			$in['TELP'] = $this->input->post('telepon_perusahaan');
			$in['FAX'] = $this->input->post('fax_perusahaan');
			$in['EMAIL'] = $this->input->post('email_perusahaan');
			$in['WEB'] = $this->input->post('web_perusahaan');
			$in['BNTK_PERUSAHAAN'] = $this->input->post('op_bentuk_perusahaan');
			$in['JABATAN'] = $this->input->post('jabatan');
			
			if($Kd_Access == 'bo'){
				$in['KATEGORI_IZIN'] = $this->input->post('op_kategori_siup');
				$in['STATUS_PERUSAHAAN'] = $this->input->post('op_status_perusahaan');
				$in['DAFTAR_ULANG'] = $this->input->post('daftar_ulang');
				$in['NILAI_MODAL'] = db_number($this->input->post('nilai_modal'));
				$in['NILAI_TANAH'] = db_number($this->input->post('nilai_tanah'));
				$in['NILAI_BANGUNAN'] = db_number($this->input->post('nilai_bangunan'));
				$in['NAKER_L'] = $this->input->post('naker_a');
				$in['NAKER_P'] = $this->input->post('naker_b');
				$in['KEG_USAHA'] = $this->input->post('op_kegiatan_usaha');
				$in['KELEMBAGAAN'] = $this->input->post('op_kelembagaan');
				$in['NO_MENTERI'] = $this->input->post('no_sk_menteri');
				$in['TGL_MENTERI'] = db_time($this->input->post('tgl_sk_menteri'));
				$in['KEG_USAHA_POKOK'] = $this->input->post('jenis_barang');
				$in['KBLI'] = $this->input->post('kbli');
			}
			
			if($idperusahaan == '0'){
				$q_last_id = $this->db->select_max('IDPERUSAHAAN','IDPERUSAHAAN')->get('tbperusahaan');
				if($q_last_id->num_rows() > 0){
					$a_last_id = $q_last_id->row();
					$idperusahaan = $a_last_id->IDPERUSAHAAN + 1;
				}
				
				$in['IDPERUSAHAAN'] = $idperusahaan;
				$this->db->insert('tbperusahaan',$in);
			}
			else{
				$wh['IDPERUSAHAAN'] = $idperusahaan;
				$this->db->update('tbperusahaan',$in,$wh);
			}
			
			$q_last_id = $this->db->select_max('ID','ID')->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbsiup');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}
			
			$in2['ID'] = $last_id;
			$in2['IDSIUP'] = str_pad($last_id,5,0,STR_PAD_LEFT).'/SIUP/'.TimeNow('Y');
			$in2['NO_MOHON'] = $this->input->post('no_mohon');
			$in2['TGL_MOHON'] = db_time($this->input->post('tgl_mohon'));
			$in2['IDPELANGGAN'] = $this->input->post('idpelanggan');
			$in2['IDPERUSAHAAN'] = $idperusahaan;
			$in2['URUTAN'] = $this->input->post('urutan');
			$in2['JENIS_PERUSAHAAN'] = '02';
			
			$in2['NM_PENGURUS'] = $this->input->post('nama_pengurus');
			$in2['ALAMAT_PENGURUS'] = $this->input->post('alamat_pengurus');
			$in2['TELP_PENGURUS'] = $this->input->post('hp_pengurus');
			$in2['JENIS_IZIN'] = $this->input->post('jenis_izin');
			$in2['TGL_REF'] = db_time($this->input->post('tgl_sk_lama'));
			$in2['NO_REF'] = $this->input->post('no_sk_lama');
			$in2['ID_REF'] = 0;
			
			if($Kd_Access == 'bo'){
			$in2['TGL_SK'] = db_time($this->input->post('tgl_sk'));
			$in2['NO_SK'] = $this->input->post('no_sk');
			$in2['ID_SK'] = $this->input->post('no_urut_sk');
			$in2['ID_TTD'] = 1;
			$in2['FLOW'] = 1; // BO
			}
			$in2['TGL_BUAT'] = TimeNow('Y-m-d H:i:s');
			$in2['IDAKSES'] = $this->session->userdata('userfullname');
			$in2['Nm_FO'] = $this->session->userdata('userfullname');
			$a = $this->db->insert('tbsiup',$in2);
			
			
			if($a){
				$chk = $this->input->post('chk');
				if(is_array($chk)){
					$wh3['ID_Izin'] = $last_id;
					$wh3['Kd_Izin'] = $Kd_Izin;
					$this->db->delete('tb_dokumen_log',$wh3);
					foreach($chk as $c){
						$in4['ID_Izin'] = $last_id;
						$in4['Kd_Izin'] = $Kd_Izin;
						$in4['Kd_Dok'] = $c;
						$this->db->insert('tb_dokumen_log',$in4);
					}
				}
				set_alert('success','Data berhasil disimpan');
				redirect(fmodule('siup/fo'));
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function update_siup($id=0){
		$Kd_Access = $this->input->post('Kd_Access');
		$Kd_Izin = $this->input->post('Kd_Izin');
		$Kd_Jenis = $this->input->post('jenis_izin');
		
		$this->form_validation->set_rules('no_mohon','No Surat Mohon','');
		$this->form_validation->set_rules('tgl_mohon','Tanggal Mohon','');
		$this->form_validation->set_rules('op_pengurus_permohonan','Pengurus Permohonan','is_natural_no_zero');
		$this->form_validation->set_rules('nama_pengurus','Nama Pengurus','');
		$this->form_validation->set_rules('alamat_pengurus','Alamat Pengurus','');
		$this->form_validation->set_rules('hp_pengurus','No HP Pengurus','');
		
		$this->form_validation->set_rules('jenis_izin','Jenis Izin','is_natural_no_zero');
		$this->form_validation->set_rules('urutan','Registrasi Ke','');
		$this->form_validation->set_rules('no_sk_lama','Nomor SK Lama','');
		$this->form_validation->set_rules('tgl_sk_lama','Tanggal SK Lama','');
		
		$this->form_validation->set_rules('op_perusahaan','Pilih Perusahaan','');
		$this->form_validation->set_rules('nama_perusahaan','Nama Usaha','required');
		$this->form_validation->set_rules('alamat_perusahaan','Alamat Usaha','required');
		$this->form_validation->set_rules('op_provinsi','Provinsi','is_natural_no_zero');
		$this->form_validation->set_rules('op_provinsi','Kota','is_natural_no_zero');
		$this->form_validation->set_rules('op_kecamatan','Kecamatan','is_natural_no_zero');
		$this->form_validation->set_rules('op_desa','Desa','is_natural_no_zero');
		$this->form_validation->set_rules('npwp_perusahaan','NPWP','');
		$this->form_validation->set_rules('telepon_perusahaan','Telepon','');
		$this->form_validation->set_rules('fax_perusahaan','Fax','');
		$this->form_validation->set_rules('email','Email','valid_email');
		$this->form_validation->set_rules('web_perusahaan','Website','');
		$this->form_validation->set_rules('op_bentuk_perusahaan','Bentuk Perusahaan','is_natural_no_zero');
		$this->form_validation->set_rules('jabatan','Jabatan','required');
		
		if($Kd_Access == 'bo'){
			$this->form_validation->set_rules('op_kategori_siup','Kategori SIUP','is_natural_no_zero');
			$this->form_validation->set_rules('op_status_perusahaan','Status Perusahaan','is_natural_no_zero');
			$this->form_validation->set_rules('daftar_ulang','Daftar Ulang','');
			$this->form_validation->set_rules('nilai_modal','Nilai Modal','');
			$this->form_validation->set_rules('nilai_tanah','Nilai Tanah','');
			$this->form_validation->set_rules('nilai_bangunan','Nilai Bangunan','');
			$this->form_validation->set_rules('naker_a','Jabatan','');
			$this->form_validation->set_rules('naker_b','Jabatan','');
			$this->form_validation->set_rules('op_kegiatan_usaha','Kegiatan Usaha','required');
			$this->form_validation->set_rules('op_kelembagaan','Kelembagaan','required');
			$this->form_validation->set_rules('kbli','KBLI','required');
			$this->form_validation->set_rules('jenis_barang','Barang/Jasa Dagangan Utama','required');
			$this->form_validation->set_rules('no_sk','Nomor SK','required');
			$this->form_validation->set_rules('no_urut_sk','No Urut SK','required');
			$this->form_validation->set_rules('tgl_sk','Tanggal SK','required');
		}
		
		
		if($this->form_validation->run() == TRUE){
			
			$idperusahaan = $this->input->post('op_perusahaan');
			$in['IDPELANGGAN'] = $this->input->post('idpelanggan');
			$in['NM_PERUSAHAAN'] = $this->input->post('nama_perusahaan');
			$in['ALAMAT'] = $this->input->post('alamat_perusahaan');
			$in['PROVINSI'] = $this->input->post('op_provinsi');
			$in['KOTA'] = $this->input->post('op_kota');
			$in['KECAMATAN'] = $this->input->post('op_kecamatan');
			$in['DESA'] = $this->input->post('op_desa');
			$in['NPWP'] = $this->input->post('npwp_perusahaan');
			$in['TELP'] = $this->input->post('telepon_perusahaan');
			$in['FAX'] = $this->input->post('fax_perusahaan');
			$in['EMAIL'] = $this->input->post('email_perusahaan');
			$in['WEB'] = $this->input->post('web_perusahaan');
			$in['BNTK_PERUSAHAAN'] = $this->input->post('op_bentuk_perusahaan');
			$in['JABATAN'] = $this->input->post('jabatan');
			
			if($Kd_Access == 'bo'){
				$in['KATEGORI_IZIN'] = $this->input->post('op_kategori_siup');
				$in['STATUS_PERUSAHAAN'] = $this->input->post('op_status_perusahaan');
				$in['DAFTAR_ULANG'] = $this->input->post('daftar_ulang');
				$in['NILAI_MODAL'] = db_number($this->input->post('nilai_modal'));
				$in['NILAI_TANAH'] = db_number($this->input->post('nilai_tanah'));
				$in['NILAI_BANGUNAN'] = db_number($this->input->post('nilai_bangunan'));
				$in['NAKER_L'] = $this->input->post('naker_a');
				$in['NAKER_P'] = $this->input->post('naker_b');
				$in['KEG_USAHA'] = $this->input->post('op_kegiatan_usaha');
				$in['KELEMBAGAAN'] = $this->input->post('op_kelembagaan');
				//$in['NO_MENTERI'] = $this->input->post('no_sk_menteri');
				//$in['TGL_MENTERI'] = db_time($this->input->post('tgl_sk_menteri'));
				$in['KEG_USAHA_POKOK'] = $this->input->post('jenis_barang');
				$in['KBLI'] = $this->input->post('kbli');
			}
			
			if($idperusahaan == '0'){
				$q_last_id = $this->db->select_max('IDPERUSAHAAN','IDPERUSAHAAN')->get('tbperusahaan');
				if($q_last_id->num_rows() > 0){
					$a_last_id = $q_last_id->row();
					$idperusahaan = $a_last_id->IDPERUSAHAAN + 1;
				}
				
				$in['IDPERUSAHAAN'] = $idperusahaan;
				$this->db->insert('tbperusahaan',$in);
			}
			else{
				$wh['IDPERUSAHAAN'] = $idperusahaan;
				$this->db->update('tbperusahaan',$in,$wh);
			}
			
			/*$q_last_id = $this->db->select_max('ID','ID')->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbsiup');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}*/
			
			$wh2['ID'] = $id;
			//$in2['IDSIUP'] = str_pad($last_id,5,0,STR_PAD_LEFT).'/SIUP/'.TimeNow('Y');
			$in2['NO_MOHON'] = $this->input->post('no_mohon');
			$in2['TGL_MOHON'] = db_time($this->input->post('tgl_mohon'));
			$in2['IDPELANGGAN'] = $this->input->post('idpelanggan');
			$in2['IDPERUSAHAAN'] = $idperusahaan;
			$in2['URUTAN'] = $this->input->post('urutan');
			$in2['JENIS_PERUSAHAAN'] = '02';
			
			$in2['NM_PENGURUS'] = $this->input->post('nama_pengurus');
			$in2['ALAMAT_PENGURUS'] = $this->input->post('alamat_pengurus');
			$in2['TELP_PENGURUS'] = $this->input->post('hp_pengurus');
			$in2['JENIS_IZIN'] = $this->input->post('jenis_izin');
			$in2['TGL_REF'] = db_time($this->input->post('tgl_sk_lama'));
			$in2['NO_REF'] = $this->input->post('no_sk_lama');
			$in2['ID_REF'] = 0;
			
			if($Kd_Access == 'fo'){
				$in2['Nm_FO'] = $this->session->userdata('userfullname');
			}
			
			if($Kd_Access == 'bo'){
			$in2['TGL_SK'] = db_time($this->input->post('tgl_sk'));
			$in2['NO_SK'] = $this->input->post('no_sk');
			$in2['ID_SK'] = $this->input->post('no_urut_sk');
			$in2['ID_TTD'] = 1;
			$in2['FLOW'] = 1; // BO
			$in2['Nm_BO'] = $this->session->userdata('userfullname');
			}
			//$in2['TGL_BUAT'] = TimeNow('Y-m-d H:i:s');
			//$in2['IDAKSES'] = $this->session->userdata('userfullname');
			//$in2['FLOWA'] = 1; // BO
			
			$a = $this->db->update('tbsiup',$in2,$wh2);
			
			
			if($a){
				$chk = $this->input->post('chk');
				if(is_array($chk)){
					$wh3['ID_Izin'] = $id;
					$wh3['Kd_Izin'] = $Kd_Izin;
					$this->db->delete('tb_dokumen_log',$wh3);
					foreach($chk as $c){
						$in4['ID_Izin'] = $id;
						$in4['Kd_Izin'] = $Kd_Izin;
						$in4['Kd_Dok'] = $c;
						$this->db->insert('tb_dokumen_log',$in4);
					}
				}
				set_alert('success','Data berhasil disimpan');
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function get_data_perusahaan($id=0){
		$a = $this->db->where('IDPERUSAHAAN',$id)->get('tbperusahaan');
		return $a;
	}
	
	function get_data_siup($id=0){
		$a = $this->db->where('ID',$id)->get('tbsiup');
		return $a;
	}
	
	function op_perusahaan($idpelanggan=0){
		$a = $this->db->where('IDPELANGGAN',$idpelanggan)->order_by('NM_PERUSAHAAN','ASC')->get('tbperusahaan');
		$h = array();
		if($a->num_rows() > 0){
			foreach($a->result() as $aa){
				$h['0'] = '+ Tambah Usaha +';
				$h[$aa->IDPERUSAHAAN] = $aa->NM_PERUSAHAAN;
			}
		}
		else{
			$h['0'] = '+ Tambah Usaha +';
		}
		return $h;
	}
	
	function op_jenis_izin(){
		$h = array();
		$h['1'] = 'Baru';
		$h['2'] = 'Perpanjangan';
		$h['3'] = 'Perubahan';
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
	
	function op_pengurus_permohonan(){
		$h = array();
		$h['1'] = 'Sendiri';
		$h['2'] = 'Pihak Kedua';
		return $h;
	}
	
	function op_status_perusahaan(){
		$h = array();
		$h['0'] = '- Pilih Status -';
		$h['1'] = 'Kantor Tunggal';
		$h['2'] = 'Kantor Pusat';
		$h['3'] = 'Kantor Cabang';
		$h['4'] = 'Kantor Pembantu';
		$h['5'] = 'Kantor Perwakilan';
		$h['6'] = 'Kantor Cabang Pembantu';
		$h['7'] = 'Unit Produksi/Pabrik';
		$h['8'] = 'Kantor Kas';
		return $h;
	}
	
	function op_kategori_siup(){
		$h = array();
		$h['0'] = '- Pilih Kategori SIUP -';
		$h['1'] = 'SIUP Mikro';
		$h['2'] = 'SIUP Kecil';
		$h['3'] = 'SIUP Menengah';
		$h['4'] = 'SIUP Besar';
		return $h;
	}
	
	function op_kegiatan_usaha(){
		$h = array();
		$h['0'] = '- Pilih Kegiatan Usaha -';
		$h['1'] = 'Perdagangan Barang';
		$h['2'] = 'Perdagangan Jasa';
		$h['3'] = 'Perdagangan Barang dan Jasa';
		return $h;
	}
	
	function op_kelembagaan(){
		$h = array();
		$h['0'] = '- Pilih Kelembagaan -';
		$h['1'] = 'Perdagangan Skala Mikro';
		$h['2'] = 'Perdagangan Skala Kecil';
		$h['3'] = 'Perdagangan Skala Menengah';
		$h['4'] = 'Perdagangan Skala Besar (Perdagangan Dalam Negeri)';
		$h['5'] = 'Perdagangan Skala Besar (Perdagangan Dalam Negeri,Ekspor,Impor)';
		return $h;
	}
	
	function op_verifikasi(){
		$h = array();
		$h['0'] = 'Belum Disetujui';
		$h['1'] = 'Telah Disetujui';
		return $h;
	}
	
	function op_serah_terima(){
		$h = array();
		$h['0'] = 'Belum Diserahkan';
		$h['1'] = 'Telah Diserahkan Pada Orang Yang Sama';
		$h['2'] = 'Telah Diserahkan Pada Orang Lain';
		return $h;
	}
	
	function op_bukti_terima(){
		$h = array();
		$h['0'] = '-';
		$h['1'] = 'BUKTI PEMBAYARAN/KITAS, SURAT REGISTER';
		$h['2'] = 'BUKTI PEMBAYARAN/KITAS, SURAT REGISTER, SURAT KUASA ASLI';
		return $h;
	}
	
	function get_nomor_sk($idizin=0,$param=0){
		
		$a = $this->db->where('ID',$idizin)->get('tbsiup');
		$aa = $a->first_row();
		$id_perusahaan = $aa->IDPERUSAHAAN; // ID Perusahaan
		$h = $aa->NO_SK;
		
		if($h == '' or $this->input->post('submit')){
			if($param == ''){
				$e = $this->db->where('IDPERUSAHAAN',$id_perusahaan)->get('tbperusahaan');
				$ee = $e->first_row();
				$kategori_izin = $ee->KATEGORI_IZIN; // Jenis Mikro, Menengah, Besar
				$kode = substr($kategori_izin,-1);
				switch($kode){
					case '1': $param = '1'; break;
					case '2': $param = '2'; break;
					case '3': $param = '3'; break;
					case '4': $param = '4'; break;
					default: $param = '0'; break;
				}
			}
			
			// Get Format
			$kd_izin = 1; //Kode SIUP
			$c = $this->db->where('Kd_Izin',$kd_izin)->where('Param',$param)->get('tb_parameter');
			if($c->num_rows() > 0){
			$cc = $c->first_row();
			$format = $cc->Format;
			}
			else{
				$format = '[NOURUT]/[TAHUN]';
			}
			//$format = '[NOURUT]';
			
			
			// Get ID SK
			$no_urut = $this->get_id_sk($idizin);;
			
			$h = str_replace(array('[NOURUT]','[TAHUN]'),array($no_urut,TimeNow('Y')),$format);
		}
		
		return $h;
	}
	
	function get_id_sk($idizin=0){
		$a = $this->db->where('ID',$idizin)->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbsiup');
		$aa = $a->first_row();
		$h = $aa->ID_SK;
		
		if($h=='' or $this->input->post('submit')){
			$d = $this->db->select_max('ID_SK','ID_SK')->get('tbsiup');
			$dd = $d->first_row();
			
			$h = $dd->ID_SK+1;
		}
		
		return $h;
	}
	
	function tbl_print($start='',$end=''){
		$st = TimeFormat($start,'Y-m-d');
		$en = TimeFormat($end,'Y-m-d');
		$a = $this->db->query('SELECT
		tbsiup.IDSIUP AS ID_IZIN,
		tbsiup.TGL_BUAT,
		"SIUP" AS NM_IZIN,
		"" AS KODEJENIS,
		right(tbsiup.JENIS_IZIN,1) AS JENIS_IZIN,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbprovinsi.NAMA_PROVINSI,
		tbkota.NAMA_KOTA,
		tbkecamatan.NAMA_KECAMATAN,
		tbdesa.NAMA_DESA,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NO_HP,
		IF(right(tbsiup.JENIS_IZIN,1)=1,tbperusahaan.NILAI_MODAL,0) AS INVESTASI,
		tbperusahaan.NAKER_L AS NAKER_L,
		tbperusahaan.NAKER_P AS NAKER_P,
		tbsiup.Nm_FO,
		tbsiup.Nm_BO,
		tbsiup.NM_PENGURUS AS NM_PENGURUS,
		tbsiup.TGL_PENERIMA AS TGL_SELESAI,
		tbsiup.Time_Diambil AS TGL_DIAMBIL
		FROM
		tbsiup
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbsiup.IDPELANGGAN
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbsiup.IDPERUSAHAAN
		INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
		INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
		INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
		INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
		WHERE
		TGL_BUAT BETWEEN "'.$st.'" AND "'.$en.'"');
		
		return $a;
	}
}
