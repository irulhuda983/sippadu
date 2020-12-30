<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/cetak/srt.css" rel="stylesheet" type="text/css"></link>-->
<title>SIPPADU - System Layanan Perijinan Terpadu Bojonegoro</title>
	<style>
	@page 
	{
		size:  auto;
		margin: 15mm 15mm 15mm 15mm;
	}

	@media screen {.PrintOnly {display:none}}
	@media print {.ScreenOnly {display:none}}

	.atv_layout_txt11 {
		font-size: 25px;
	}
	.atv_judul1 {
		font-size: 30px;
	}
	.atv_teks1 {
		font-size: 20px;
	}
	.atv_teks2 {
		font-size: 20px;
	}
	
	table, th, td {
		vertical-align: top;
		height: 10px;
	}
	
	ol{
		margin-left: -20px;
		margin-top: 0px;
	}
	
	p{
		margin-top: 0px;
		margin-bottom: 0px;
	}
	
	</style>

	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>
</head>
<body>
<br>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td align="center" height="25" colspan="2" valign="top"><input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
			<input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()"></td>
		</tr>
		<tr>
			<td rowspan="4"  align="center" valign="top" class=""><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="100px" /></td>
			<td height="20" colspan="1" align="center" valign="top" class="atv_layout_txt11" style="font-weight:bold;color:black;"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td></tr>
		<tr>
			<td height="20" colspan="1" align="center" valign="top" class="atv_layout_txt11" style="font-weight:bold;color:black;"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
		</tr>
		<tr>
			<td height="20" colspan="1" align="center" valign="top" class="atv_layout_txt11" style="color:black;"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
		</tr>
		<tr>
		   <td height="20" colspan="1" align="center" valign="top" class="" style="font-size:30px;color:black;"><div align="center"><b><u><?php echo strtoupper(sippadu('nama_kota')); ?></u></b></div></td>
		</tr>
	</table>

	<br/><br/>
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); ?>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td colspan="2" ALIGN="center" class="atv_judul1"><b><u>TANDA DAFTAR INDUSTRI ( TDI )</u></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		<tr>
			<td width="800px"></td>
			<td ALIGN="center" style="border:1px #000 solid;">Pdf.II-IK</b></td>
		</tr>
	</table>
	<br/><br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		
<tr>
			<td colspan="5" ALIGN="left" width=""><b>KETERANGAN PEMOHON / PERUSAHAAN</b></td>
		</tr>
		<tr>
			<td width="30px" >1.</td>
			<td width="30px" >a.</td>
			<td width="300px" ALIGN="left">Nama Perusahaan</td>
			<td width="20px">:</td>
			<td align="justify"><b><?php echo ifnull($d->Nm_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td></td>
			<td>b.</td>
			<td ALIGN="left">Alamat Perusahaan</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Alamat_Usaha,'-'); ?> <?php echo desa($d->Kd_Desa); ?>, <?php echo kecamatan($d->Kd_Kecamatan); ?>, <?php echo kota($d->Kd_Kota); ?>, <?php echo provinsi($d->Kd_Provinsi); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>c.</td>
			<td ALIGN="left">Nomor Telepon</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo ifnull($d->Telp_Usaha,'-'); ?></td>
		</tr>
		<!--<tr>
			<td colspan="5">&nbsp;</td>
		</tr>-->
		<tr>
			<td>2.</td>
			<td colspan="2" ALIGN="left">Nomor Pokok Wajib Pajak (NPWP)</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->NPWP_Usaha,'-'); ?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td colspan="2" ALIGN="left">Nomor Induk Pendaftaran Industri Kecil (NIPIK)</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->NIPIK,'-'); ?></td>
		</tr>
		<tr>
			<td width="30px" >4.</td>
			<td width="30px" >a.</td>
			<td ALIGN="left">Nama Pemilik</td>
			<td width="20px">:</td>
			<td align="justify"><b><?php echo pelanggan($d->ID_Pelanggan,'nama'); ?></b></td>
		</tr>
		<tr>
			<td></td>
			<td>b.</td>
			<td ALIGN="left">Alamat Pemilik</td>
			<td width="20">:</td>
			<td align="justify"><?php echo pelanggan($d->ID_Pelanggan,'alamat'); ?> <?php echo desa(pelanggan($d->ID_Pelanggan,'desa')); ?>, <?php echo kecamatan(pelanggan($d->ID_Pelanggan,'kecamatan')); ?>, <?php echo kota(pelanggan($d->ID_Pelanggan,'kota')); ?>, <?php echo provinsi(pelanggan($d->ID_Pelanggan,'provinsi')); ?></td>
		</tr>
		<tr>
			<td width="30px" ></td>
			<td width="30px" >c.</td>
			<td ALIGN="left">Nomor Telepon</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo pelanggan($d->ID_Pelanggan,'telepon'); ?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td colspan="2" width="300px" ALIGN="left">Jenis Industri (KLUI)</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->KLUI,'-'); ?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td colspan="2" width="300px" ALIGN="left">Komoditi Industri</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Komoditi,'-'); ?></td>
		</tr>
		<tr>
			<td>7.</td>
			<td colspan="4" ALIGN="left" width="">Lokasi Pabrik :</td>
		</tr>
		<tr>
			<td width="30px" ></td>
			<td width="30px" >a.</td>
			<td width="300px" ALIGN="left">Alamat</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo ifnull($d->Lokasi,'-'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>b.</td>
			<td ALIGN="left">Desa / Kelurahan</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ucwords(desa($d->Kd_Desa_Usaha)); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>c.</td>
			<td ALIGN="left">Kecamatan</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ucwords(kecamatan($d->Kd_Kecamatan_Usaha)); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>d.</td>
			<td ALIGN="left">Kota</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ucwords(kota($d->Kd_Kota_Usaha)); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>e.</td>
			<td ALIGN="left">Propinsi</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ucwords(provinsi($d->Kd_Provinsi_Usaha)); ?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td colspan="4" ALIGN="left" width="">Mesin dan Peralatan Produksi :</td>
		</tr>
		<tr>
			<td width="30px" ></td>
			<td width="30px" >a.</td>
			<td width="300px" ALIGN="left">Mesin / Peralatan Utama</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo ifnull($d->Mesin_Utama,'-'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>b.</td>
			<td ALIGN="left">Mesin / Peralatan Pembantu</td>
			<td width="20">:</td>
			<td align="justify"><?php echo $d->Mesin_Pembantu; ?></td>
		</tr>
		<tr>
			<td></td>
			<td>c.</td>
			<td ALIGN="left">Tenaga Penggerak</td>
			<td width="20">:</td>
			<td align="justify"><?php echo $d->Tenaga_Penggerak; ?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td colspan="2" ALIGN="left">Nilai Investasi tidak termasuk tanah dan bangunan</td>
			<td width="20">:</td>
			<td align="justify"><b>Rp. <?php echo ifnull(number($d->Nilai_Modal),'-'); ?>,- <i>(<?php echo terbilang($d->Nilai_Modal); ?> Rupiah)</i></b></td>
		</tr>
		<tr>
			<td>5.</td>
			<td colspan="2" ALIGN="left">Kapasitas Produksi Terpasang Per Tahun</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Kapasitas,'-'); ?></td>
		</tr>
		
	</table>
	<br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td align="justify"><?php echo format_parameter(7,11,$replace); ?></td>
		</tr>
	<table>
	<br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td width="500px"></td>
			<td align="center"><?php echo sippadu('nama_kota'); ?>, <?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></b></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td width="500px"></td>
			<td align="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td width="500px"></td>
			<td align="center" style="height:200px"><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	<br/>
	
	<?php } ?>
</body>
</html>
