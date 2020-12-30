<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo $site_title; ?></title>
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/print.css" rel="stylesheet" type="text/css"></link>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>
	<style>
	@media print{
		 body, table tr td {font-size:13pt}
		 .kop tr td {font-size:16pt}
	}
	</style>
</head>
<body class="no-border">
	<table class="tb100 kop" border="0" align="center" cellpadding="0" cellspacing="0" style="">
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

	<br/>
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); ?>
	<table class="tb100 font10" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="center"><b>KEPUTUSAN<br/>KEPALA <?php echo str_replace('DAN PELAYANAN','DAN PELAYANAN',sippadu('nama_dinas')).'<br/>'.strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo str_replace(' ','&nbsp;',$d->No_SK); ?></b></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center"><b>TENTANG<br/>IZIN LEMBAGA PELATIHAN KERJA</b></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<!--<tr>
			<td ALIGN="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','DAN PELAYANAN',sippadu('nama_dinas')); ?></b></td>
		</tr>-->
	</table>
	<br/>
	<table  class="tb100 font10" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<!--<tr>
			<td ALIGN="left" width="150"><b>MEMBACA</b></td>
			<td width="20">:</td>
			<td align="justify"><?php echo format_parameter($Kd_Izin,11,$replace); ?></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>-->
		<tr>
			<td ALIGN="left" width="150"><b>MENGINGAT</b></td>
			<td width="20">:</td>
			<td align="justify"><?php echo format_parameter($Kd_Izin,11,$replace); ?></td>
		</tr>
		<tr>
			<td ALIGN="left"><b>MEMPERHATIKAN</b></td>
			<td>:</td>
			<td align="justify"><?php echo format_parameter($Kd_Izin,12,$replace); ?></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center" colspan="3"><b>MEMUTUSKAN</b></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="justify" colspan="3"><?php echo format_parameter($Kd_Izin,13,$replace); ?></td>
		</tr>
	</table>
	<br/>
	<br/>
	<table class="font10 tbtgl fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td width="">Ditetapkan di</td>
			<td>:</td>
			<td><?php echo sippadu('nama_kota'); ?></td>
		</tr>
		<tr>
			<td width="">Pada tanggal</td>
			<td>:</td>
			<td><?php echo Date_Indo(iftimezero($d->Tgl_SK,'&nbsp;','d F Y')); ?></td>
		</tr>
	</table>
	
    <br/>
	<br/>
	<br/>
	<table class="font10 tbttd fright" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td><div style="margin-left:-5cm;position:absolute;width:3cm;height:3.9cm;border: 1px solid #000;"></div></td>
			<td align="center"><b><?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_jabatan')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td></td>
			<td align="center"><?php echo imgttd($d->Flow_Kadin,300,'','','','0'); ?><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	<table class="font11 tbtembusan fleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="justify"><?php echo ifnull($d->Tembusan,''); ?></td>
		</tr>
	</table>
	<?php } ?>
</body>
</html>
