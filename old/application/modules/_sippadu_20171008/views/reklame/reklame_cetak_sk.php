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
	<table class="tb100 font12" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="center" class="font14"><b><u>SURAT IJIN PEMASANGAN REKLAME</u></b></td>
		</tr>
		<tr>
			<td ALIGN="center">NOMOR : <?php echo $d->No_SK; ?></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center">KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?></td>
		</tr>
	</table>
	<br/><br/>
	<table class="tb100 font11" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="left" width="100px">Dasar</td>
			<td width="30px">:</td>
			<td align="justify"><?php echo format_parameter(8,11,$replace); ?></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center" colspan="3"><b>MEMBERIKAN IJIN</b></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="justify" colspan="3">
			<table class="tbpadding2">
				<tr>
					<td colspan="3"><b><i>Kepada</i></b></td>
				</tr>
				<tr>
					<td width="200px">Nama / Perusahaan</td>
					<td width="20px">:</td>
					<td><?php echo $d->Nm_Usaha; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $d->Alamat_Usaha; ?></td>
				</tr>
				<tr>
					<td>Untuk</td>
					<td>:</td>
					<td><?php echo $d->Perihal; ?></td>
				</tr>
				<tr>
					<td>Naskah</td>
					<td>:</td>
					<td><?php echo $d->Naskah_Reklame; ?></td>
				</tr>
				<tr>
					<td>Ukuran</td>
					<td>:</td>
					<td><?php echo $d->Ukuran_Reklame; ?></td>
				</tr>
				<tr>
					<td>Jangka Waktu</td>
					<td>:</td>
					<td><?php echo Date_Indo(TimeFormat($d->J_Waktu_Awal,'d F Y')); ?> s/d <?php echo Date_Indo(TimeFormat($d->J_Waktu_Akhir,'d F Y')); ?></td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>:</td>
					<td><?php echo $d->Lokasi; ?></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center" colspan="3"><br/><b>DENGAN KETENTUAN</b></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="justify" colspan="3" class="line15"><?php echo format_parameter(8,12,$replace); ?></td>
		</tr>
	</table>
	<table class="font11 tbtgl fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td width="">Ditetapkan di</td>
			<td>:</td>
			<td><?php echo sippadu('nama_kota'); ?></td>
		</tr>
		<tr>
			<td width="">Pada tanggal</td>
			<td>:</td>
			<td><?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></td>
		</tr>
	</table>
    <br/>
	<br/>
	<br/>
	<table class="font11 tbttd2 fright" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td align="center"><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	<table class="font11 tbtembusan fleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="justify"><?php echo ifnull($d->Tembusan,''); ?></td>
		</tr>
	</table>
	<br/>
	
	<?php } ?>
</body>
</html>
