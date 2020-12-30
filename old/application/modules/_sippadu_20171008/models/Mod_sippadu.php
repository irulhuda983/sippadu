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
	
	function query_all($depan='*',$belakang='',$filter=''){
		$a = '
		SELECT '.$depan.' FROM
			(
				(
					SELECT
					tbsiup.ID,
					"siup" AS KD_IZIN,
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
					tbsiup.Nm_Kabid,
					tbsiup.Nm_Kadin,
					tbsiup.Nm_TU,
					tbsiup.Nm_Serah,
					/* tbsiup.Flow_FO,
					tbsiup.Flow_BO,
					tbsiup.Flow_Kabid,
					tbsiup.Flow_Kadin,
					tbsiup.Flow_TU,
					tbsiup.Flow_Serah, */
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
				)
				UNION ALL
				(
					SELECT
					tbtdp.ID,
					"tdp" AS KD_IZIN,
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
					tbtdp.Nm_Kabid,
					tbtdp.Nm_Kadin,
					tbtdp.Nm_TU,
					tbtdp.Nm_Serah,
					/* tbtdp.Flow_FO,
					tbtdp.Flow_BO,
					tbtdp.Flow_Kabid,
					tbtdp.Flow_Kadin,
					tbtdp.Flow_TU,
					tbtdp.Flow_Serah, */
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
				)
				
				/* IMB */
				
				UNION ALL
				(
					SELECT
					tbimb.ID,
					"imb" AS KD_IZIN,
					tbimb.ID_Reg AS ID_IZIN,
					tbimb.Time_Buat AS TGL_BUAT,
					"IMB" AS NM_IZIN,
					"2" AS KODEJENIS,
					right(tbimb.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					tbimb.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbimb.Nm_FO,
					tbimb.Nm_BO,
					tbimb.Nm_Kabid,
					tbimb.Nm_Kadin,
					tbimb.Nm_TU,
					tbimb.Nm_Serah,
					/* tbimb.Flow_FO,
					tbimb.Flow_BO,
					tbimb.Flow_Kabid,
					tbimb.Flow_Kadin,
					tbimb.Flow_TU,
					tbimb.Flow_Serah, */
					tbimb.Nm_Pengurus AS NM_PENGURUS,
					tbimb.Time_Selesai AS TGL_SELESAI,
					tbimb.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbimb
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbimb.ID_Pelanggan
					/*INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbimb.ID_Usaha*/
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* HO */
				
				UNION ALL
				(
					SELECT
					tbho.ID,
					"ho" AS KD_IZIN,
					tbho.ID_Reg AS ID_IZIN,
					tbho.Time_Buat AS TGL_BUAT,
					"HO" AS NM_IZIN,
					"3" AS KODEJENIS,
					right(tbho.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/*tbperusahaan.NM_PERUSAHAAN,*/
					tbho.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbho.Nm_FO,
					tbho.Nm_BO,
					tbho.Nm_Kabid,
					tbho.Nm_Kadin,
					tbho.Nm_TU,
					tbho.Nm_Serah,
					/* tbho.Flow_FO,
					tbho.Flow_BO,
					tbho.Flow_Kabid,
					tbho.Flow_Kadin,
					tbho.Flow_TU,
					tbho.Flow_Serah, */
					tbho.Nm_Pengurus AS NM_PENGURUS,
					tbho.Time_Selesai AS TGL_SELESAI,
					tbho.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbho
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbho.ID_Pelanggan
					/*INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbho.ID_Usaha*/
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* IUJK */
				
				UNION ALL
				(
					SELECT
					tbiujk.ID,
					"iujk" AS KD_IZIN,
					tbiujk.ID_Reg AS ID_IZIN,
					tbiujk.Time_Buat AS TGL_BUAT,
					"IUJK" AS NM_IZIN,
					"" AS KODEJENIS,
					right(tbiujk.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/*tbperusahaan.NM_PERUSAHAAN,*/
					tbiujk.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbiujk.Nm_FO,
					tbiujk.Nm_BO,
					tbiujk.Nm_Kabid,
					tbiujk.Nm_Kadin,
					tbiujk.Nm_TU,
					tbiujk.Nm_Serah,
					/* tbiujk.Flow_FO,
					tbiujk.Flow_BO,
					tbiujk.Flow_Kabid,
					tbiujk.Flow_Kadin,
					tbiujk.Flow_TU,
					tbiujk.Flow_Serah, */
					tbiujk.Nm_Pengurus AS NM_PENGURUS,
					tbiujk.Time_Selesai AS TGL_SELESAI,
					tbiujk.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbiujk
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbiujk.ID_Pelanggan
					/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbiujk.ID_Usaha */
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* TDG */
				
				UNION ALL
				(
					SELECT
					tbtdg.ID,
					"tdg" AS KD_IZIN,
					tbtdg.ID_Reg AS ID_IZIN,
					tbtdg.Time_Buat AS TGL_BUAT,
					"TDG" AS NM_IZIN,
					"" AS KODEJENIS,
					right(tbtdg.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/* tbperusahaan.NM_PERUSAHAAN, */
					tbtdg.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbtdg.Nm_FO,
					tbtdg.Nm_BO,
					tbtdg.Nm_Kabid,
					tbtdg.Nm_Kadin,
					tbtdg.Nm_TU,
					tbtdg.Nm_Serah,
					/* tbtdg.Flow_FO,
					tbtdg.Flow_BO,
					tbtdg.Flow_Kabid,
					tbtdg.Flow_Kadin,
					tbtdg.Flow_TU,
					tbtdg.Flow_Serah, */
					tbtdg.Nm_Pengurus AS NM_PENGURUS,
					tbtdg.Time_Selesai AS TGL_SELESAI,
					tbtdg.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbtdg
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdg.ID_Pelanggan
					/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdg.ID_Usaha */
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* TDI */
				
				UNION ALL
				(
					SELECT
					tbtdi.ID,
					"tdi" AS KD_IZIN,
					tbtdi.ID_Reg AS ID_IZIN,
					tbtdi.Time_Buat AS TGL_BUAT,
					"TDI" AS NM_IZIN,
					"" AS KODEJENIS,
					right(tbtdi.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/* tbperusahaan.NM_PERUSAHAAN, */
					tbtdi.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbtdi.Nm_FO,
					tbtdi.Nm_BO,
					tbtdi.Nm_Kabid,
					tbtdi.Nm_Kadin,
					tbtdi.Nm_TU,
					tbtdi.Nm_Serah,
					/* tbtdi.Flow_FO,
					tbtdi.Flow_BO,
					tbtdi.Flow_Kabid,
					tbtdi.Flow_Kadin,
					tbtdi.Flow_TU,
					tbtdi.Flow_Serah, */
					tbtdi.Nm_Pengurus AS NM_PENGURUS,
					tbtdi.Time_Selesai AS TGL_SELESAI,
					tbtdi.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbtdi
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdi.ID_Pelanggan
					/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdi.ID_Usaha */
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* IT KESEHATAN */
				
				UNION ALL
				(
					SELECT
					tbitkesehatan.ID,
					"itkesehatan" AS KD_IZIN,
					tbitkesehatan.ID_Reg AS ID_IZIN,
					tbitkesehatan.Time_Buat AS TGL_BUAT,
					"Izin Tenaga Kesehatan" AS NM_IZIN,
					"" AS KODEJENIS,
					right(tbitkesehatan.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/* tbperusahaan.NM_PERUSAHAAN, */
					tbitkesehatan.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbitkesehatan.Nm_FO,
					tbitkesehatan.Nm_BO,
					tbitkesehatan.Nm_Kabid,
					tbitkesehatan.Nm_Kadin,
					tbitkesehatan.Nm_TU,
					tbitkesehatan.Nm_Serah,
					/* tbitkesehatan.Flow_FO,
					tbitkesehatan.Flow_BO,
					tbitkesehatan.Flow_Kabid,
					tbitkesehatan.Flow_Kadin,
					tbitkesehatan.Flow_TU,
					tbitkesehatan.Flow_Serah, */
					tbitkesehatan.Nm_Pengurus AS NM_PENGURUS,
					tbitkesehatan.Time_Selesai AS TGL_SELESAI,
					tbitkesehatan.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbitkesehatan
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbitkesehatan.ID_Pelanggan
					/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbitkesehatan.ID_Usaha */
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* REKLAME */
				
				UNION ALL
				(
					SELECT
					tbreklame.ID,
					"reklame" AS KD_IZIN,
					tbreklame.ID_Reg AS ID_IZIN,
					tbreklame.Time_Buat AS TGL_BUAT,
					"REKLAME" AS NM_IZIN,
					"" AS KODEJENIS,
					right(tbreklame.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/* tbperusahaan.NM_PERUSAHAAN, */
					tbreklame.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbreklame.Nm_FO,
					tbreklame.Nm_BO,
					tbreklame.Nm_Kabid,
					tbreklame.Nm_Kadin,
					tbreklame.Nm_TU,
					tbreklame.Nm_Serah,
					/* tbreklame.Flow_FO,
					tbreklame.Flow_BO,
					tbreklame.Flow_Kabid,
					tbreklame.Flow_Kadin,
					tbreklame.Flow_TU,
					tbreklame.Flow_Serah, */
					tbreklame.Nm_Pengurus AS NM_PENGURUS,
					tbreklame.Time_Selesai AS TGL_SELESAI,
					tbreklame.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbreklame
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbreklame.ID_Pelanggan
					/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbreklame.ID_Usaha */
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
				
				/* TDUP */
				
				UNION ALL
				(
					SELECT
					tbtdup.ID,
					"tdup" AS KD_IZIN,
					tbtdup.ID_Reg AS ID_IZIN,
					tbtdup.Time_Buat AS TGL_BUAT,
					"TDUP" AS NM_IZIN,
					"" AS KODEJENIS,
					right(tbtdup.Jenis_Izin,1) AS JENIS_IZIN,
					tbpelanggan.NM_PELANGGAN,
					tbpelanggan.ALAMATPELANGGAN,
					tbprovinsi.NAMA_PROVINSI,
					tbkota.NAMA_KOTA,
					tbkecamatan.NAMA_KECAMATAN,
					tbdesa.NAMA_DESA,
					/* tbperusahaan.NM_PERUSAHAAN, */
					tbtdup.Nm_Usaha AS NM_PERUSAHAAN,
					tbpelanggan.NO_HP,
					0 AS INVESTASI,
					0 AS NAKER_L,
					0 AS NAKER_P,
					tbtdup.Nm_FO,
					tbtdup.Nm_BO,
					tbtdup.Nm_Kabid,
					tbtdup.Nm_Kadin,
					tbtdup.Nm_TU,
					tbtdup.Nm_Serah,
					/* tbtdup.Flow_FO,
					tbtdup.Flow_BO,
					tbtdup.Flow_Kabid,
					tbtdup.Flow_Kadin,
					tbtdup.Flow_TU,
					tbtdup.Flow_Serah, */
					tbtdup.Nm_Pengurus AS NM_PENGURUS,
					tbtdup.Time_Selesai AS TGL_SELESAI,
					tbtdup.Time_Diambil AS TGL_DIAMBIL
					FROM
					tbtdup
					INNER JOIN tbpelanggan ON tbpelanggan.IDPELANGGAN = tbtdup.ID_Pelanggan
					/* INNER JOIN tbperusahaan ON tbperusahaan.IDPERUSAHAAN = tbtdup.ID_Usaha */
					INNER JOIN tbprovinsi ON tbprovinsi.ID_PROVINSI = tbpelanggan.PROVINSI
					INNER JOIN tbkota ON tbkota.ID_KOTA = tbpelanggan.KOTA
					INNER JOIN tbkecamatan ON tbkecamatan.ID_KECAMATAN = tbpelanggan.KECAMATAN
					INNER JOIN tbdesa ON tbdesa.ID_DESA = tbpelanggan.DESA
				)
			) AS A WHERE A.TGL_BUAT > 0 '.$filter.' '.$belakang.'
		';
		return $a;
	}
	
	
	
	function tbl_dashboard($start='',$end=''){
		$q_limit = '';
		$q_where = '';
		$status = 1;
		$offset = 0;
		$limit = 100;
		if($status==1){
			$q_order = 'ORDER BY A.TGL_BUAT DESC';
		}
		else{
			$q_order = 'ORDER BY A.TGL_BUAT ASC';
		}
		
		if($limit){
			$q_limit = 'LIMIT '.$offset.','.$limit.'';
		}
		
		
		if($this->input->post('keyword') != '' OR $this->input->post('search') != ''){
			$keyword = $this->input->post('keyword');
			$q_where .= 'AND (A.NM_PELANGGAN like "%'.$keyword.'%" OR A.NM_PERUSAHAAN like "%'.$keyword.'%" OR A.ID_IZIN like "%'.$keyword.'%")';
			$q_limit = '';
		}
		
		$st = TimeFormat($start,'Y-m-d');
		$en = TimeFormat($end,'Y-m-d');
		$a = $this->db->query($this->query_all('*','ORDER BY A.TGL_BUAT DESC LIMIT 0,50',$q_where));
		
		return $a;
	}
	
	function grafik_registrasi($limit=60){
		$a = $this->db->query('SELECT * FROM ('.$this->query_all('TGL_BUAT,COUNT(ID) AS JML','GROUP BY DATE_FORMAT(TGL_BUAT,"%Y-%m-%d") ORDER BY A.TGL_BUAT DESC LIMIT 0,'.$limit.'','').') AS Z ORDER BY TGL_BUAT ASC');
		return $a;
	}
	
	function pie_hari($limit=100){
		$a = $this->db->query('SELECT * FROM ('.$this->query_all('NM_IZIN,COUNT(ID) AS JML','GROUP BY A.NM_IZIN ORDER BY A.NM_IZIN ASC LIMIT 0,'.$limit.'','AND DATE_FORMAT(A.TGL_BUAT,"%d") = "'.TimeNow('d').'"').') AS Z ORDER BY NM_IZIN ASC');
		return $a;
	}
	
	function pie_bulan($limit=100){
		$a = $this->db->query('SELECT * FROM ('.$this->query_all('NM_IZIN,COUNT(ID) AS JML','GROUP BY A.NM_IZIN ORDER BY A.NM_IZIN ASC LIMIT 0,'.$limit.'','AND DATE_FORMAT(A.TGL_BUAT,"%m") = "'.TimeNow('m').'"').') AS Z ORDER BY NM_IZIN ASC');
		return $a;
	}
	function pie_tahun($limit=100){
		$a = $this->db->query('SELECT * FROM ('.$this->query_all('NM_IZIN,COUNT(ID) AS JML','GROUP BY A.NM_IZIN ORDER BY A.NM_IZIN ASC LIMIT 0,'.$limit.'','AND DATE_FORMAT(A.TGL_BUAT,"%Y") = "'.TimeNow('Y').'"').') AS Z ORDER BY NM_IZIN ASC');
		return $a;
	}
	
}
