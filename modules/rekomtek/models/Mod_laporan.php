<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_laporan extends CI_Model {
	
	function tbl_print($start='',$end=''){
		$this->load->model('mod_sippadu');
		$st = TimeFormat($start,'Y-m-d');
		$en = TimeFormat($end,'Y-m-d');
		$a = $this->db->query('SELECT * FROM ('.$this->mod_sippadu->query_all('*','ORDER BY A.TGL_BUAT ASC','AND A.TGL_BUAT BETWEEN "'.$st.'" AND "'.$en.'"').') AS Y ORDER BY Y.TGL_BUAT ASC');
		return $a;
	}
	
	function tbl_print_old($start='',$end=''){
		$st = TimeFormat($start,'Y-m-d');
		$en = TimeFormat($end,'Y-m-d');
		$a = $this->db->query('
		SELECT * FROM
			(
				(
					SELECT
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
					tbsiup.Nm_Pengambil,
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
					TGL_BUAT BETWEEN "'.$st.'" AND "'.$en.'"
				)
				UNION ALL
				(
					SELECT
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
					TGL_BUAT BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* IMB */
				
				UNION ALL
				(
					SELECT
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
					tbimb.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* HO */
				
				UNION ALL
				(
					SELECT
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
					tbho.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* IUJK */
				
				UNION ALL
				(
					SELECT
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
					tbiujk.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* TDG */
				
				UNION ALL
				(
					SELECT
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
					tbtdg.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* TDI */
				
				UNION ALL
				(
					SELECT
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
					tbtdi.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* IT KESEHATAN */
				
				UNION ALL
				(
					SELECT
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
					tbitkesehatan.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* REKLAME */
				
				UNION ALL
				(
					SELECT
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
					tbreklame.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
				
				/* TDUP */
				
				UNION ALL
				(
					SELECT
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
					tbtdup.Nm_Pengambil,
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
					WHERE
					Time_Buat BETWEEN "'.$st.'" AND "'.$en.'"
				)
			) AS A ORDER BY A.TGL_BUAT ASC
		');
		
		return $a;
	}
}
