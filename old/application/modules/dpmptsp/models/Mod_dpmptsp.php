<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_dpmptsp extends CI_Model {
	
	function data_tracking($register='',$kitas=''){
		$a = $this->db->query($this->query_tracking('*','ORDER BY A.TGL_BUAT ASC','AND A.ID_IZIN = "'.$register.'" AND A.NOKITAS = "'.$kitas.'"'));
		return $a;
	}
	
	function query_tracking($depan='*',$belakang='',$filter=''){
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
					tbpelanggan.NOKITAS,
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
					1 AS Flow_FO,
					tbsiup.FLOW AS Flow_BO,
					tbsiup.FLOWA AS Flow_Kabid,
					tbsiup.FLOWB AS Flow_Kadin,
					tbsiup.FLOWC AS Flow_TU,
					tbsiup.FLOWE AS Flow_Serah,
					tbsiup.NM_PENGURUS AS NM_PENGURUS,
					tbsiup.TGL_PENERIMA AS TGL_SELESAI,
					tbsiup.Time_Diambil AS TGL_DIAMBIL,
					tbsiup.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					1 AS Flow_FO,
					tbtdp.FLOW AS Flow_BO,
					tbtdp.FLOWA AS Flow_Kabid,
					tbtdp.FLOWB AS Flow_Kadin,
					tbtdp.FLOWC AS Flow_TU,
					tbtdp.FLOWE AS Flow_Serah,
					tbtdp.NM_PENGURUS AS NM_PENGURUS,
					tbtdp.TGL_PENERIMA AS TGL_SELESAI,
					tbtdp.Time_Diambil AS TGL_DIAMBIL,
					tbtdp.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbimb.Flow_FO,
					tbimb.Flow_BO,
					tbimb.Flow_Kabid,
					tbimb.Flow_Kadin,
					tbimb.Flow_TU,
					tbimb.Flow_Serah,
					tbimb.Nm_Pengurus AS NM_PENGURUS,
					tbimb.Time_Selesai AS TGL_SELESAI,
					tbimb.Time_Diambil AS TGL_DIAMBIL,
					tbimb.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbho.Flow_FO,
					tbho.Flow_BO,
					tbho.Flow_Kabid,
					tbho.Flow_Kadin,
					tbho.Flow_TU,
					tbho.Flow_Serah,
					tbho.Nm_Pengurus AS NM_PENGURUS,
					tbho.Time_Selesai AS TGL_SELESAI,
					tbho.Time_Diambil AS TGL_DIAMBIL,
					tbho.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbiujk.Flow_FO,
					tbiujk.Flow_BO,
					tbiujk.Flow_Kabid,
					tbiujk.Flow_Kadin,
					tbiujk.Flow_TU,
					tbiujk.Flow_Serah,
					tbiujk.Nm_Pengurus AS NM_PENGURUS,
					tbiujk.Time_Selesai AS TGL_SELESAI,
					tbiujk.Time_Diambil AS TGL_DIAMBIL,
					tbiujk.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbtdg.Flow_FO,
					tbtdg.Flow_BO,
					tbtdg.Flow_Kabid,
					tbtdg.Flow_Kadin,
					tbtdg.Flow_TU,
					tbtdg.Flow_Serah,
					tbtdg.Nm_Pengurus AS NM_PENGURUS,
					tbtdg.Time_Selesai AS TGL_SELESAI,
					tbtdg.Time_Diambil AS TGL_DIAMBIL,
					tbtdg.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbtdi.Flow_FO,
					tbtdi.Flow_BO,
					tbtdi.Flow_Kabid,
					tbtdi.Flow_Kadin,
					tbtdi.Flow_TU,
					tbtdi.Flow_Serah,
					tbtdi.Nm_Pengurus AS NM_PENGURUS,
					tbtdi.Time_Selesai AS TGL_SELESAI,
					tbtdi.Time_Diambil AS TGL_DIAMBIL,
					tbtdi.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbitkesehatan.Flow_FO,
					tbitkesehatan.Flow_BO,
					tbitkesehatan.Flow_Kabid,
					tbitkesehatan.Flow_Kadin,
					tbitkesehatan.Flow_TU,
					tbitkesehatan.Flow_Serah,
					tbitkesehatan.Nm_Pengurus AS NM_PENGURUS,
					tbitkesehatan.Time_Selesai AS TGL_SELESAI,
					tbitkesehatan.Time_Diambil AS TGL_DIAMBIL,
					tbitkesehatan.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbreklame.Flow_FO,
					tbreklame.Flow_BO,
					tbreklame.Flow_Kabid,
					tbreklame.Flow_Kadin,
					tbreklame.Flow_TU,
					tbreklame.Flow_Serah,
					tbreklame.Nm_Pengurus AS NM_PENGURUS,
					tbreklame.Time_Selesai AS TGL_SELESAI,
					tbreklame.Time_Diambil AS TGL_DIAMBIL,
					tbreklame.Nm_Pengambil
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
					tbpelanggan.NOKITAS,
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
					tbtdup.Flow_FO,
					tbtdup.Flow_BO,
					tbtdup.Flow_Kabid,
					tbtdup.Flow_Kadin,
					tbtdup.Flow_TU,
					tbtdup.Flow_Serah,
					tbtdup.Nm_Pengurus AS NM_PENGURUS,
					tbtdup.Time_Selesai AS TGL_SELESAI,
					tbtdup.Time_Diambil AS TGL_DIAMBIL,
					tbtdup.Nm_Pengambil
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
}
