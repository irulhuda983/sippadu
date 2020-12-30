<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo $site_title; ?></title>
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/print.css" rel="stylesheet" type="text/css"></link>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>
</head>
<body class="page-border">
	<table class="tb100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr class="ScreenOnly" >
			<td align="center" height="25" colspan="2" valign="top"><input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
			<input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()"></td>
		</tr>
		<tr>
			<td rowspan="5"  align="center" valign="top" class=""><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/<?php echo sippadu('logo_warna'); ?>" width="60px" /></td>
			<td height="" class="font10 black bold tcenter ttop"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td></tr>
		<tr>
			<td height="" class="font11 black bold tcenter ttop"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
		</tr>
		<tr>
			<td height="" class="font9 black tcenter ttop"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
		</tr>
		<tr>
			<td colspan="1" align="center" valign="top" class="font9 black"><div align="center">Website: <?php echo ifnull(sippadu('web_dinas'),'-'); ?>&nbsp;&nbsp;&nbsp;Email: <?php echo ifnull(sippadu('email_dinas'),'-'); ?></div></td>
		</tr>
		<tr>
		   <td class="font16 black tcenter ttop" style="padding-top: 2px;"><div align="center"><b><u><?php echo strtoupper(sippadu('nama_kota')); ?></u></b></div></td>
		</tr>
	</table>

	<br/><br/>
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); ?>
	<table class="tb100 font10 tbpadding2" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="center" class="font16"><b><u>TANDA DAFTAR GUDANG ( TDG )</u></b></td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		
	</table>
	<br/>
	<table class="tb100 font10 tbpadding2 line2" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td colspan="5" ALIGN="left" width="220">Yang bertanda tangan dibawah ini menerangkan bahwa :</td>
		</tr>
		<tr>
			<td width="30px" >1.</td>
			<td width="30px" >a.</td>
			<td width="200px" ALIGN="left">Nama Pemilik / Penanggung Jawab</td>
			<td width="20px">:</td>
			<td align="justify"><b><?php echo pelanggan($d->ID_Pelanggan,'nama'); ?></b></td>
		</tr>
		<tr>
			<td></td>
			<td>b.</td>
			<td ALIGN="left">Nomor KTP atau Paspor dan Kitas</td>
			<td width="20">:</td>
			<td align="justify"><?php echo pelanggan($d->ID_Pelanggan,'kitas'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>c.</td>
			<td ALIGN="left">Alamat Pemilik</td>
			<td width="20">:</td>
			<td align="justify"><?php echo pelanggan($d->ID_Pelanggan,'alamat'); ?> <?php echo desa(pelanggan($d->ID_Pelanggan,'desa')); ?>, <?php echo kecamatan(pelanggan($d->ID_Pelanggan,'kecamatan')); ?>, <?php echo kota(pelanggan($d->ID_Pelanggan,'kota')); ?>, <?php echo provinsi(pelanggan($d->ID_Pelanggan,'provinsi')); ?></td>
		</tr>
		<tr>
			<td></td>
			<td>d.</td>
			<td ALIGN="left">Telepon</td>
			<td width="20">:</td>
			<td align="justify"><?php echo pelanggan($d->ID_Pelanggan,'telepon'); ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td colspan="2" ALIGN="left">Alamat Gudang</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Lokasi,''); ?> <?php echo desa($d->Kd_Desa_Usaha); ?>, <?php echo kecamatan($d->Kd_Kecamatan_Usaha); ?>, <?php echo kota($d->Kd_Kota_Usaha); ?>, <?php echo provinsi($d->Kd_Provinsi_Usaha); ?></td>
		</tr>
		
		<tr>
			<td>3.</td>
			<td colspan="2" ALIGN="left">Titik Koordinat</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Koordinat,'-'); ?></td>
		</tr>
		
		<tr>
			<td>4.</td>
			<td colspan="2" ALIGN="left">Nomor Telepon, Fax, dan E-Mail</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Telp_Usaha,'-').($d->Fax_Usaha != '' ? ', ' : '').ifnull($d->Fax_Usaha,'').($d->Email_Usaha != '' ? ', ' : '').ifnull($d->Email_Usaha,''); ?></td>
		</tr>
		
		<!--<tr>
			<td colspan="5">&nbsp;</td>
		</tr>-->
		<tr>
			<td>5.</td>
			<td colspan="2" ALIGN="left">Luas dan Kapasitas</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Luas_Bangunan,'-'); ?> M<sup>2</sup><?php echo ($d->Kapasitas != '' ? ' / ' : '').ifnull($d->Kapasitas,''); ?></td>
		</tr>
		<!--<tr>
			<td colspan="5">&nbsp;</td>
		</tr>-->
		<tr>
			<td>5.</td>
			<td colspan="2" ALIGN="left">Golongan Gudang</td>
			<td width="20">:</td>
			<td align="justify"><?php echo ifnull($d->Golongan_Usaha,'-'); ?></td>
		</tr>
		
	</table>
	<table class="tb100 font10 tbpadding2 line2" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="justify"><?php echo ifnull(format_parameter(6,14,$replace),'-'); ?></td>
		</tr>
	<table>
	<!--<table class="tb100 font10 tbpadding2" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
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
	<table>-->
	<br/>
	<br/>
	<table class="tbttd font10 fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			
			<td align="center"><?php echo sippadu('nama_kota'); ?>, <?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></b></td>
		</tr>
		<tr>
			<td colspan="1">&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td align="center"><?php echo imgttd($d->Flow_Kadin,300,'','','','0'); ?><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	
	<?php } ?>
</body>
</html>
