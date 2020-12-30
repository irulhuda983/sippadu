<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_tdp extends CI_Model {
	
	function get_tbl_tdp_fo($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOW = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_tdp_bo($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOW = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_tdp_kabid($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOWA = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_tdp_kadin($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOWA = "1" and tbtdp.FLOWB = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_tdp_tu($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOWA = "1" and tbtdp.FLOWB = "1" and tbtdp.FLOWC = "'.$status.'" and tbtdp.FLOWD = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_tdp_cetak($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOWA = 1 and tbtdp.FLOWB = 1 and tbtdp.FLOWC = 1 and tbtdp.FLOWD = 1 AND tbtdp.FLOWE = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
		return $a;
	}
	
	function get_tbl_tdp_serah($status=0,$limit=0,$offset=0){
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
			$q_where .= 'AND (tbtdp.IDPELANGGAN like "%'.$keyword.'%"  or tbpelanggan.NM_PELANGGAN like "%'.$keyword.'%" OR tbperusahaan.NM_PERUSAHAAN like "%'.$keyword.'%" OR tbtdp.IDTDP like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		
		$a = $this->db->query('SELECT
		tbtdp.ID,
		tbtdp.IDTDP,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		"" AS KODEJENIS,
		tbtdp.JENIS_IZIN,
		tbtdp.NO_SK,
		tbtdp.TGL_SK,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbtdp.Nm_Pengambil,
		tbtdp.Time_Diambil,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NM_PELANGGAN,
		tbtdp.TGL_BUAT,
		case tbtdp.JENIS_IZIN when "01" OR "1" then "Baru" when "02" OR "2" then "Perpanjangan" when "03" OR "3" then "Perubahan" end as KET_JENIS
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.FLOWA = 1 and tbtdp.FLOWB = 1 and tbtdp.FLOWC = 1 and tbtdp.FLOWD = 1 and tbtdp.FLOWE = "'.$status.'" '.$q_where.' '.$q_order.' '.$q_limit.'');
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
	
	function get_tdp($id=0){
		$a = $this->db->query('SELECT
		tbtdp.IDTDP,
		tbtdp.TGL_MOHON,
		tbtdp.IDPELANGGAN,
		tbtdp.IDPERUSAHAAN,
		tbtdp.JENIS_PERUSAHAAN,
		tbtdp.STATUS_PENGURUS,
		tbtdp.NM_PENGURUS,
		tbtdp.ALAMAT_PENGURUS,
		tbtdp.JENIS_IZIN,
		tbtdp.LOKASI_USAHA,
		tbtdp.FLOW,
		tbtdp.FLOWA,
		tbtdp.FLOWB,
		tbtdp.FLOWC,
		tbtdp.FLOWD,
		tbtdp.FLOWE,
		tbtdp.ID,
		tbtdp.USAHA_POKOK,
		tbtdp.KDKATEGORI,
		tbtdp.KDIZIN,
		tbtdp.TGL_SK,
		tbtdp.TGL_SKA,
		tbtdp.NO_SK,
		tbtdp.ID_TTD,
		tbtdp.STATUS_DAFTAR,
		tbtdp.ID_SK,
		tbtdp.STATUS_CATATAN,
		tbtdp.CATATAN,
		tbtdp.DOK8,
		tbtdp.FONT_A,
		tbtdp.KEC_LOKASI,
		tbtdp.DESA_LOKASI,
		tbtdp.TELP_PENGURUS,
		tbtdp.NO_MOHON,
		tbtdp.TGL_TERIMA,
		tbtdp.TGL_BUAT,
		tbtdp.IDAKSES,
		tbtdp.NO_KEHAKIMAN,
		tbtdp.TGL_KEHAKIMAN,
		tbtdp.TGL_PENERIMA,
		tbtdp.NM_PENERIMA,
		tbtdp.BUKTI_PENERIMA,
		tbtdp.KET_PENERIMA,
		tbtdp.IDONLA,
		tbtdp.IDONLB,
		tbtdp.STATUS_ONL,
		tbtdp.IDPENERIMA,
		tbtdp.ID_REF,
		tbtdp.NO_REF,
		tbtdp.TGL_REF,
		tbtdp.URUTAN,
		tbtdp.ID_LINK,
		tbtdp.TGL_KA,
		tbtdp.ID_AGENDA,
		tbtdp.NO_AGENDA,
		tbtdp.TGL_AGENDA,
		tbtdp.DAFTAR_ULANG,
		tbtdp.Nm_FO,
		tbperusahaan.NM_PERUSAHAAN,
		tbperusahaan.ALAMAT,
		tbperusahaan.NPWP,
		tbperusahaan.TELP,
		tbperusahaan.FAX,
		tbperusahaan.BNTK_PERUSAHAAN,
		tbperusahaan.NO_MENTERI,
		tbperusahaan.TGL_MENTERI,
		tbperusahaan.KEG_USAHA_POKOK,
		tbperusahaan.KBLI,
		tbperusahaan.STATUS_PERUSAHAAN,
		tbperusahaan.TDP_DAFTAR_ULANG,
		tbpelanggan.NM_PELANGGAN
		FROM
		tbtdp
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN WHERE tbtdp.ID = '.$id);
		return $a;
	}
	
	function delete_tbl_tdp(){
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
				$a = $this->db->get_where('tbtdp',$wh);
				if($a->num_rows() > 0){
					$b = $this->db->delete('tbtdp',$wh);
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
	
	function verifikasi_tbl_tdp($param='',$status=1){
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
							$in['Nm_Serah'] = NULL;
							$in['Kd_Pengambil'] = NULL;
							$in['Nm_Pengambil'] = NULL;
							$in['Alamat_Pengambil'] = NULL;
							$in['Telp_Pengambil'] = NULL;
							$in['Time_Diambil'] = NULL;
						}
						break;
					default:
						$in['FLOWA'] = $status;
						break;
				}
				
				$this->db->update('tbtdp',$in,$wh);
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		else{
			set_alert('error','Ada kesalahan, data gagal disimpan');
			redirect(current_url());
		}
	}
	
	function insert_tdp_fo(){
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
			$this->form_validation->set_rules('op_kategori_tdp','Kategori TDP','is_natural_no_zero');
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
				$in['KATEGORI_IZIN'] = $this->input->post('op_kategori_tdp');
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
			
			$q_last_id = $this->db->select_max('ID','ID')->get('tbtdp');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}
			$q_last_reg = $this->db->select_max('No_Reg','No_Reg')->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbtdp');
			$last_reg = 1;
			if($q_last_reg->num_rows() > 0){
				$a_last_reg = $q_last_reg->row();
				$last_reg = $a_last_reg->No_Reg + 1;
			}
			$in2['No_Reg'] = $last_reg;
			$in2['ID'] = $last_id;
			$in2['IDTDP'] = str_pad($last_reg,5,0,STR_PAD_LEFT).'/TDP/'.TimeNow('Y');
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
			$a = $this->db->insert('tbtdp',$in2);
			
			
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
				redirect(fmodule('tdp/fo'));
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
	
	function update_tdp($id=0){
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
		
		if($Kd_Access == 'bo' || $Kd_Access == 'tu'){
			//$this->form_validation->set_rules('op_kategori_tdp','Kategori TDP','is_natural_no_zero');
			$this->form_validation->set_rules('op_status_perusahaan','Status Perusahaan','is_natural_no_zero');
			/*$this->form_validation->set_rules('daftar_ulang','Daftar Ulang','');
			$this->form_validation->set_rules('nilai_modal','Nilai Modal','');
			$this->form_validation->set_rules('nilai_tanah','Nilai Tanah','');
			$this->form_validation->set_rules('nilai_bangunan','Nilai Bangunan','');
			$this->form_validation->set_rules('naker_a','Jabatan','');
			$this->form_validation->set_rules('naker_b','Jabatan','');
			$this->form_validation->set_rules('op_kegiatan_usaha','Kegiatan Usaha','required');
			$this->form_validation->set_rules('op_kelembagaan','Kelembagaan','required');*/
			$this->form_validation->set_rules('kbli','KBLI','required');
			$this->form_validation->set_rules('jenis_barang','Barang/Jasa Dagangan Utama','required');
			
			/* Agenda */
			if($this->input->post('op_bentuk_perusahaan') == '1'){
			$this->form_validation->set_rules('no_agenda','Nomor Agenda','required');
			$this->form_validation->set_rules('id_agenda','No Urut Agenda','required');
			$this->form_validation->set_rules('tgl_agenda','Tanggal Agenda','required');
			}
			
		}
		
		if($Kd_Access == 'tu'){
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
			
			if($Kd_Access == 'bo' || $Kd_Access == 'tu'){
				//$in['KATEGORI_IZIN'] = $this->input->post('op_kategori_tdp');
				$in['STATUS_PERUSAHAAN'] = $this->input->post('op_status_perusahaan');
				$in['TDP_DAFTAR_ULANG'] = $this->input->post('daftar_ulang');
				/*$in['NILAI_MODAL'] = db_number($this->input->post('nilai_modal'));
				$in['NILAI_TANAH'] = db_number($this->input->post('nilai_tanah'));
				$in['NILAI_BANGUNAN'] = db_number($this->input->post('nilai_bangunan'));
				$in['NAKER_L'] = $this->input->post('naker_a');
				$in['NAKER_P'] = $this->input->post('naker_b');
				$in['KEG_USAHA'] = $this->input->post('op_kegiatan_usaha');
				$in['KELEMBAGAAN'] = $this->input->post('op_kelembagaan');*/
				$in['KEG_USAHA_POKOK'] = $this->input->post('jenis_barang');
				$in['KBLI'] = $this->input->post('kbli');
				
				if($this->input->post('op_bentuk_perusahaan') == '1' || $this->input->post('op_bentuk_perusahaan') == '5'){
				$in['NO_MENTERI'] = $this->input->post('no_sk_menteri');
				$in['TGL_MENTERI'] = db_time($this->input->post('tgl_sk_menteri'));
				}
				
				if($this->input->post('op_bentuk_perusahaan') == '1'){
					$in['NO_AGENDA'] = $this->input->post('no_agenda');
					$in['ID_AGENDA'] = $this->input->post('id_agenda');
					$in['TGL_AGENDA'] = db_time($this->input->post('tgl_agenda'));
				}
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
			
			/*$q_last_id = $this->db->select_max('ID','ID')->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbtdp');
			$last_id = 1;
			if($q_last_id->num_rows() > 0){
				$a_last_id = $q_last_id->row();
				$last_id = $a_last_id->ID + 1;
			}*/
			
			$wh2['ID'] = $id;
			//$in2['IDTDP'] = str_pad($last_id,5,0,STR_PAD_LEFT).'/TDP/'.TimeNow('Y');
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
				$in2['DAFTAR_ULANG'] = $this->input->post('daftar_ulang');
				$in2['FLOW'] = 1; // BO
				$in2['Nm_BO'] = $this->session->userdata('userfullname');
			}
			
			if($Kd_Access == 'tu'){
				$in2['TGL_SK'] = db_time($this->input->post('tgl_sk'));
				$in2['TGL_SKA'] = db_time($this->input->post('tgl_ska'));
				$in2['NO_SK'] = $this->input->post('no_sk');
				$in2['ID_SK'] = $this->input->post('no_urut_sk');
				$in2['ID_TTD'] = 1;
				$in2['FLOWC'] = 1; // BO
				$in2['FLOWD'] = 1; // BO
				$in2['Nm_TU'] = $this->session->userdata('userfullname');
			}
			//$in2['TGL_BUAT'] = TimeNow('Y-m-d H:i:s');
			//$in2['IDAKSES'] = $this->session->userdata('userfullname');
			//$in2['FLOWA'] = 1; // BO
			
			
			if($this->input->post('op_bentuk_perusahaan') == '1' || $this->input->post('op_bentuk_perusahaan') == '5'){
			$in2['NO_KEHAKIMAN'] = $this->input->post('no_sk_menteri');
			$in2['TGL_KEHAKIMAN'] = db_time($this->input->post('tgl_sk_menteri'));
			}
			
			if($this->input->post('op_bentuk_perusahaan') == '1'){
				$in2['NO_AGENDA'] = $this->input->post('no_agenda');
				$in2['ID_AGENDA'] = $this->input->post('id_agenda');
				$in2['TGL_AGENDA'] = db_time($this->input->post('tgl_agenda'));
			}
			
			$a = $this->db->update('tbtdp',$in2,$wh2);
			
			
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
	
	function get_data_tdp($id=0){
		$a = $this->db->where('ID',$id)->get('tbtdp');
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
	
	function op_kategori_tdp(){
		$h = array();
		$h['0'] = '- Pilih Kategori TDP -';
		$h['1'] = 'TDP Mikro';
		$h['2'] = 'TDP Kecil';
		$h['3'] = 'TDP Menengah';
		$h['4'] = 'TDP Besar';
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
	
	function get_nomor_sk($idizin=0,$param=0,$kbli=0){
		
		$a = $this->db->where('ID',$idizin)->get('tbtdp');
		$aa = $a->first_row();
		$id_perusahaan = $aa->IDPERUSAHAAN; // ID Perusahaan
		$h = $aa->NO_SK;
		
		if($h == '' or $this->input->post('submit')){
			/*if($param == ''){
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
			}*/
			
			// Get Format
			$kd_izin = 2; //Kode TDP
			$c = $this->db->where('Kd_Izin',$kd_izin)->where('Param',1)->get('tb_parameter');
			if($c->num_rows() > 0){
			$cc = $c->first_row();
			$format = $cc->Format;
			}
			else{
				$format = '[NOURUT]/[TAHUN]';
			}
			//$format = '[NOURUT]';
			
			$kblia = substr($kbli,0,2);
			
			// Get ID SK
			$no_urut = str_pad($this->get_id_sk($idizin),5,0,STR_PAD_LEFT);
			
			$h = str_replace(array('[NOURUT]','[TAHUN]','[KDUSAHA]','[KBLI]'),array($no_urut,TimeNow('Y'),$param,$kblia),$format);
		}
		
		return $h;
	}
	
	function get_id_sk($idizin=0){
		$a = $this->db->where('ID',$idizin)->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbtdp');
		$h = '';
		if($a->num_rows() > 0){
			$aa = $a->first_row();
			$h = $aa->ID_SK;
		}
		
		if($h=='' or $this->input->post('submit')){
			$d = $this->db->select_max('ID_SK','ID_SK')->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbtdp');
			$h = 1;
			if($d->num_rows() > 0){
				$dd = $d->first_row();
				$h = $dd->ID_SK+1;
			}
		}
		
		return $h;
	}
	
	function get_nomor_agenda($idizin=0,$param=0){
		
		$a = $this->db->where('ID',$idizin)->get('tbtdp');
		$aa = $a->first_row();
		$id_perusahaan = $aa->IDPERUSAHAAN; // ID Perusahaan
		$h = $aa->NO_AGENDA;
		
		if($h == '' or $this->input->post('submit')){
			/*if($param == ''){
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
			}*/
			
			// Get Format
			$kd_izin = 2; //Kode TDP
			$c = $this->db->where('Kd_Izin',$kd_izin)->where('Param',$param)->get('tb_parameter');
			if($c->num_rows() > 0){
			$cc = $c->first_row();
			$format = $cc->Format;
			}
			else{
				$format = '[NOURUT]/[TAHUN]';
			}
			//$format = '[NOURUT]';
			
			
			// Get ID Agenda
			$no_urut = str_pad($this->get_id_agenda($idizin),3,0,STR_PAD_LEFT);
			
			//Bulan Romawi
			$bln_now = TimeNow('m');
			switch($bln_now){
				case '01': $bln = 'I'; break;
				case '02': $bln = 'II'; break;
				case '03': $bln = 'III'; break;
				case '04': $bln = 'IV'; break;
				case '05': $bln = 'V'; break;
				case '06': $bln = 'VI'; break;
				case '07': $bln = 'VII'; break;
				case '08': $bln = 'VIII'; break;
				case '09': $bln = 'IX'; break;
				case '10': $bln = 'X'; break;
				case '11': $bln = 'XI'; break;
				case '12': $bln = 'XII'; break;
			}
			
			$h = str_replace(array('[NOURUT]','[BULANROMAWI]','[TAHUN]'),array($no_urut,$bln,TimeNow('Y')),$format);
		}
		
		return $h;
	}
	
	function get_id_agenda($idizin=0){
		$a = $this->db->where('ID',$idizin)->where('YEAR(TGL_BUAT)',TimeNow('Y'))->get('tbtdp');
		$aa = $a->first_row();
		$h = $aa->ID_AGENDA;
		
		if($h=='' or $this->input->post('submit')){
			$d = $this->db->select_max('ID_AGENDA','ID_AGENDA')->get('tbtdp');
			$dd = $d->first_row();
			
			$h = $dd->ID_AGENDA+1;
		}
		
		return $h;
	}
	
	function tbl_print($start='',$end=''){
		$st = TimeFormat($start,'Y-m-d');
		$en = TimeFormat($end,'Y-m-d');
		$a = $this->db->query('SELECT
		tbtdp.IDTDP AS ID_IZIN,
		tbtdp.TGL_BUAT,
		"TDP" AS NM_IZIN,
		"" AS KODEJENIS,
		right(tbtdp.JENIS_IZIN,1) AS JENIS_IZIN,
		tbpelanggan.NM_PELANGGAN,
		tbpelanggan.ALAMATPELANGGAN,
		tbprovinsi.NAMA_PROVINSI,
		tbkota.NAMA_KOTA,
		tbkecamatan.NAMA_KECAMATAN,
		tbdesa.NAMA_DESA,
		tbperusahaan.NM_PERUSAHAAN,
		tbpelanggan.NO_HP,
		IF(right(tbtdp.JENIS_IZIN,1)=1,tbperusahaan.NILAI_MODAL,0) AS INVESTASI,
		tbperusahaan.NAKER_L AS NAKER_L,
		tbperusahaan.NAKER_P AS NAKER_P,
		tbtdp.Nm_FO,
		tbtdp.Nm_BO,
		tbtdp.Nm_Pengambil,
		tbtdp.NM_PENGURUS AS NM_PENGURUS,
		tbtdp.TGL_PENERIMA AS TGL_SELESAI,
		tbtdp.Time_Diambil AS TGL_DIAMBIL
		FROM
		tbtdp
		INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdp.IDPELANGGAN
		INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdp.IDPERUSAHAAN
		INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
		INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
		INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
		INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
		WHERE
		TGL_BUAT BETWEEN "'.$st.'" AND "'.$en.'"');
		
		return $a;
	}
	
	function data_serah($idizin=0){
		$a = $this->db->query('SELECT IFNULL(Kd_Pengambil,0) AS KD_PENGAMBIL, Nm_Pengambil AS NM_PENGAMBIL, Alamat_Pengambil AS ALAMAT_PENGAMBIL, Telp_Pengambil AS TELP_PENGAMBIL FROM tbtdp WHERE ID = '.$idizin);
		return $a;
	}
	
	function data_serah_ajax(){
		$idizin = $this->input->post('ID_Izin');
		$kdpengambil = $this->input->post('Kd_Pengambil');
		switch($kdpengambil){
			case 1:
				$q = $this->db->query('SELECT NM_PENGURUS AS NM_PENGURUS, ALAMAT_PENGURUS AS ALAMAT_PENGURUS, TELP_PENGURUS AS TELP_PENGURUS FROM tbtdp WHERE ID = '.$idizin);
				if($q->num_rows() > 0){
					$get = $q->row();
					$nm_pengurus = $get->NM_PENGURUS;
					if($nm_pengurus != ''){
						$a = $q;
					}
					else{
						$a = $this->db->query('SELECT b.NM_PELANGGAN AS NM_PENGURUS, b.ALAMATPELANGGAN AS ALAMAT_PENGURUS, REPLACE(NO_HP,"+62","0") AS TELP_PENGURUS FROM tbtdp a INNER JOIN tbpelanggan b ON a.IDPELANGGAN = b.IDPELANGGAN WHERE a.ID = '.$idizin);
					}
				}
				break;
			case 2:
				$a = $this->db->query('SELECT b.NM_PELANGGAN AS NM_PENGURUS, b.ALAMATPELANGGAN AS ALAMAT_PENGURUS, REPLACE(NO_HP,"+62","0") AS TELP_PENGURUS FROM tbtdp a INNER JOIN tbpelanggan b ON a.IDPELANGGAN = b.IDPELANGGAN WHERE a.ID = '.$idizin);
				
				break;
			default:
				$a = $this->db->query('SELECT NULL AS NM_PENGURUS, NULL AS ALAMAT_PENGURUS, NULL AS TELP_PENGURUS');
				break;
		}
		return $a;
	}
	
	function simpan_pengambil($idizin=0){
		$this->form_validation->set_rules('op_pengambil','Opsi Pengambil Berkas','is_natural_no_zero');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('hp','Telepon','required');
		if($this->form_validation->run() == TRUE){
			$wh['ID'] = $idizin;
			$in['FLOWE'] = 1;
			$in['Nm_Serah'] = $this->session->userdata('userfullname');
			$in['Time_Diambil'] = TimeNow('Y-m-d H:i');
			$in['Kd_Pengambil'] = $this->input->post('op_pengambil');
			$in['Nm_Pengambil'] = $this->input->post('nama');
			$in['Alamat_Pengambil'] = $this->input->post('alamat');
			$in['Telp_Pengambil'] = $this->input->post('hp');
			$a = $this->db->update('tbtdp',$in,$wh);
			if($a){
				set_alert('success','Data berhasil disimpan');
				$this->session->set_flashdata('WindowReload',1);
				redirect(current_url());
			}
			else{
				set_alert('error','Data gagal disimpan');
				redirect(current_url());
			}
		}
	}
}
