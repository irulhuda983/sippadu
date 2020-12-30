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
<body class="no-border">
	<table class="tb100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr class="ScreenOnly" >
			<td align="center" height="25" colspan="2" valign="top"><input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
			<input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()"></td>
		</tr>
	</table>

	<br/>
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); ?>
	<table class="tb100 font12" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;width:90%;margin:0 auto;margin-top:50px;">
		<tr>
			<td align="justify"></td>
			<td align="justify" width="80">Lampiran:</td>
			<td align="justify" width="400">Surat Keputusan Kepala DPMPTSP <?php echo sippadu('nama_kota2'); ?></td>
		</tr>
		<tr>
			<td align="justify">DAFTAR KENDARAAN IZIN USAHA<br/>ANGKUTAN DALAM KABUPATEN<br/>a.n <b><?php echo $d->Nm_Usaha; ?></b></td>
			<td align="justify" width="80"></td>
			<td align="justify" width="400">Nomor : <?php echo ifnull($d->No_SK,'..............'); ?><br/>Tanggal : <?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr align="justify">
			<td colspan="3"><?php echo format_parameter($Kd_Izin,51,$replace); ?></td>
		</tr>
	</table>
	<!--
	<table class="tb100 font12" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;width:90%;margin:0 auto;margin-top:50px;">
		<tr>
			<td align="justify"><?php echo format_parameter($Kd_Izin,51,$replace); ?></td>
		</tr>
	</table>-->
	
	<?php } ?>
</body>
</html>
