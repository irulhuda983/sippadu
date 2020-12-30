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
			<td height="" class="font12 black bold tcenter ttop"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td></tr>
		<tr>
			<td height="" class="font13 black bold tcenter ttop"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
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
	<table class="tb100 font12 tbpadding2" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="center" class="font18"><b><u><?php echo itkes($d->Kategori,1); ?></u></b></td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		
	</table>
	<br/><br/>
	<table class="tb100 font12 tbpadding2 line2 bold" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td colspan="3" ALIGN="left" class="bold">Yang bertanda tangan dibawah ini, Kepala <?php echo ucwords(strtolower(sippadu('nama_dinas'))); ?> <?php echo sippadu('nama_kota2'); ?>, memberikan Izin Praktek <?php echo itkes($d->Kategori,3); ?> kepada :</td>
		</tr>
		<!--<tr>
			<td colspan="3" style="height:10px;">&nbsp;</td>
		</tr>-->
		<tr>
			<td colspan="3" ALIGN="center" style="font-size:<?php echo ifnull($d->Font_Size,'30'); ?>px"><b><u><?php echo pelanggan($d->ID_Pelanggan,'nama'); ?></u></b></td>
		</tr>
		<!--<tr>
			<td colspan="3" style="height:10px;">&nbsp;</td>
		</tr>-->
		<tr>
			<td width="250px" ALIGN="left">Nomor STR</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo ifnull($d->STR,'-'); ?></td>
		</tr>
		<tr>
			<td ALIGN="left">Tempat, Tanggal Lahir</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo ifnull(pelanggan($d->ID_Pelanggan,'tempat_lahir'),'-').', '.Date_Indo(TimeFormat(pelanggan($d->ID_Pelanggan,'tgl_lahir'),'d F Y')); ?></td>
		</tr>
		<tr>
			<td ALIGN="left">Alamat</td>
			<td width="20">:</td>
			<td align="justify"><?php echo pelanggan($d->ID_Pelanggan,'alamat'); ?> <?php echo desa(pelanggan($d->ID_Pelanggan,'desa')); ?>, <?php echo kecamatan(pelanggan($d->ID_Pelanggan,'kecamatan')); ?>, <?php echo kota(pelanggan($d->ID_Pelanggan,'kota')); ?>, <?php echo provinsi(pelanggan($d->ID_Pelanggan,'provinsi')); ?></td>
		</tr>
		<tr>
			<td ALIGN="left">Untuk berpraktek sebagai <?php echo strtolower(itkes($d->Kategori,3)); ?> di</td>
			<td width="20px">:</td>
			<td align="justify"><?php echo ifnull($d->Nm_Usaha,'-'); ?><br/><?php echo ifnull($d->Alamat_Usaha,''); ?></td>
		</tr>
		<tr>
			<td colspan="3" style="height:10px;">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" ALIGN="left"><?php echo itkes($d->Kategori,2); ?> ini berlaku sampai dengan tanggal <?php echo Date_Indo(TimeFormat($d->Tgl_SKA,'d F Y')); ?></td>
		</tr>
		
	</table>
	<br/>
	<br/>
	<br/>
	<table class="font12 tbttd2 fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="left">Ditetapkan di</td>
			<td>:</td>
			<td><?php echo sippadu('nama_kota'); ?></td>
		</tr>
		<tr>
			<td align="left">Pada tanggal</td>
			<td>:</td>
			<td><?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="left" colspan="3"><b><?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_jabatan')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td align="left"  colspan="3"><?php echo imgttd($d->Flow_Kadin,360,'','','','-80'); ?><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	
	<?php } ?>
</body>
</html>
