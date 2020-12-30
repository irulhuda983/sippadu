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
		height: 30px;
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
			<td ALIGN="center" class="atv_judul1"><b><u>TANDA DAFTAR GUDANG ( TDG )</u></b></td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		
	</table>
	<br/><br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td colspan="5" ALIGN="left" width="220">Yang bertanda tangan dibawah ini menerangkan bahwa :</td>
		</tr>
		<tr>
			<td width="30px" >1.</td>
			<td width="30px" >a.</td>
			<td width="200px" ALIGN="left">Nama Perusahaan</td>
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
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td width="30px" >2.</td>
			<td width="30px" >a.</td>
			<td width="200px" ALIGN="left">Nama Pemilik</td>
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
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td>3.</td>
			<td colspan="2" ALIGN="left">Lokasi Gudang</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Lokasi,'-'); ?> <?php echo desa($d->Kd_Desa_Usaha); ?>, <?php echo kecamatan($d->Kd_Kecamatan_Usaha); ?>, <?php echo kota($d->Kd_Kota_Usaha); ?>, <?php echo provinsi($d->Kd_Provinsi_Usaha); ?></td>
		</tr>
		
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td>4.</td>
			<td colspan="2" ALIGN="left">Luas Gudang</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Luas_Bangunan,'-'); ?> M<sup>2</sup></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td>5.</td>
			<td colspan="2" ALIGN="left">Klasifikasi Gudang</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Klasifikasi,'-'); ?></td>
		</tr>
		
	</table>
	<br/>
	<br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td width="150px" >Kesatu</td>
			<td width="30px" >:</td>
			<td align="justify"><?php echo ifnull(format_parameter(6,11,$replace),'-'); ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Kedua</td>
			<td>:</td>
			<td align="justify"><?php echo ifnull(format_parameter(6,12,$replace),'-'); ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Ketiga</td>
			<td>:</td>
			<td align="justify"><?php echo ifnull(format_parameter(6,13,$replace),'-'); ?></td>
		</tr>
	<table>
	<br/>
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
