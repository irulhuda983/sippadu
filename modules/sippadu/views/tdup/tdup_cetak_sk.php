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
	<table class="tb100 font10" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="center" class="font16"><b><u>TANDA DAFTAR USAHA PARIWISATA</u></b></td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		
	</table>
	<br/><br/>
	<table class="tb100 font10" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="left" width="150">MENGINGAT</td>
			<td ALIGN="center" width="20">:</td>
			<td ALIGN="left"><?php echo ifnull(format_parameter(10,11,$replace),'-'); ?></td>
		</tr>
	</table>
	<table class="tb100 font10 tbpadding4x4" border="1" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td width="30px" >1.</td>
			<td width="200" ALIGN="left">Tanggal Pendaftaran</td>
			<td align="justify"><b><?php echo ifnull(Date_Indo(TimeFormat($d->Tgl_Mohon,'d F Y')),'-'); ?></b></td>
		</tr>
		<tr>
			<td>2.</td>
			<td ALIGN="left">Pendaftaran / Pemutakhiran</td>
			<td align="justify"><b><?php echo ifnull(label_jenis_izin($d->Jenis_Izin),'-'); ?></b></td>
		</tr>
		<tr>
			<td>3.</td>
			<td ALIGN="left">Nama Pengusaha / Badan Hukum</td>
			<td align="justify"><b><?php echo pelanggan($d->ID_Pelanggan,'nama'); ?></b></td>
		</tr>
		<tr>
			<td>4.</td>
			<td ALIGN="left">Alamat Pengusaha / Badan Hukum</td>
			<td align="justify"><b><?php echo pelanggan($d->ID_Pelanggan,'alamat'); ?> <?php echo desa(pelanggan($d->ID_Pelanggan,'desa')); ?>, <?php echo kecamatan(pelanggan($d->ID_Pelanggan,'kecamatan')); ?>, <?php echo kota(pelanggan($d->ID_Pelanggan,'kota')); ?>, <?php echo provinsi(pelanggan($d->ID_Pelanggan,'provinsi')); ?></b></td>
		</tr>
		<tr>
			<td>5.</td>
			<td ALIGN="left">Nama Pengurus Badan Usaha</td>
			<td align="justify"><b><?php echo ifnull($d->Nm_Pengurus,'-'); ?></b></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td ALIGN="left">Jenis Usaha</td>
			<td align="justify"><b><?php echo ifnull($d->Perihal,'-'); ?></b></td>
		</tr>
		<tr>
			<td>7.</td>
			<td ALIGN="left">Nama Usaha</td>
			<td align="justify"><b><?php echo ifnull($d->Nm_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td>8.</td>
			<td ALIGN="left">Alamat Tempat Usaha</td>
			<td align="justify"><b><?php echo ifnull($d->Alamat_Usaha,'-'); ?> <?php echo desa($d->Kd_Desa); ?>, <?php echo kecamatan($d->Kd_Kecamatan); ?>, <?php echo kota($d->Kd_Kota); ?>, <?php echo provinsi($d->Kd_Provinsi); ?></b></td>
		</tr>
		<tr>
			<td>9.</td>
			<td ALIGN="left">Kapasitas</td>
			<td align="justify"><b><?php echo ifnull($d->Kapasitas,'-'); ?></b></td>
		</tr>
		<tr>
			<td>10.</td>
			<td ALIGN="left">Nomor dan Tanggal Akte Pendirian Badan Usaha</td>
			<td align="justify"><b><?php echo ifnull($d->No_Akte,'-').($d->Tgl_Akte ? '<br/>Tanggal '.Date_Indo(TimeFormat($d->Tgl_Akte,'d F Y')) : ''); ?></b></td>
		</tr>
		<tr>
			<td>11.</td>
			<td ALIGN="left">Nama Ijin dan Nomor Ijin Teknis</td>
			<td align="justify"><b><?php echo ifnull($d->Nm_Izin_Teknis,'-').($d->No_Izin_Teknis ? '<br/>'.$d->No_Izin_Teknis : ''); ?></b></td>
		</tr>
		<tr>
			<td>12.</td>
			<td ALIGN="left">Nomor dan Tanggal Ijin Gangguan (HO)</td>
			<td align="justify"><b><?php echo ifnull($d->No_HO,'-').($d->Tgl_HO ? '<br/>Tanggal '.Date_Indo(TimeFormat($d->Tgl_HO,'d F Y')) : ''); ?></b></td>
		</tr>
		<tr>
			<td>13.</td>
			<td ALIGN="left">Nomor dan Tanggal Ijin Mendirikan Bangunan (IMB)</td>
			<td align="justify"><b><?php echo ifnull($d->No_IMB,'-').($d->Tgl_IMB ? '<br/>Tanggal '.Date_Indo(TimeFormat($d->Tgl_IMB,'d F Y')) : ''); ?></b></td>
		</tr>
		<tr>
			<td>14.</td>
			<td ALIGN="left">Masa berlaku sampai dengan</td>
			<td align="justify"><b><?php echo Date_Indo(TimeFormat($d->Tgl_SKA,'d F Y')); ?></b></td>
		</tr>
	</table>
	<br/>
	<br/>
	<table class="tb100 font10" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="justify"><?php echo ifnull(format_parameter(10,12,$replace),'-'); ?></td>
		</tr>
	</table>
	<br/>
	<table class="tbttd font10 fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td align="center">
				<table width="150" border="0">
					<tr>
						<!--<td width="500px"></td>
						<td width="100px"></td>-->
						<td align="left">Ditetapkan di</td>
						<td>:</td>
						<td><?php echo sippadu('nama_kota'); ?></td>
					</tr>
					<tr>
						<!--<td></td>
						<td></td>-->
						<td align="left" style="border-bottom: 1px solid #000">Pada tanggal</td>
						<td style="border-bottom: 1px solid #000">:</td>
						<td style="border-bottom: 1px solid #000"><?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br/>
	<br/>
	<table class="tbttd font10 fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<!--<td width="500px"></td>-->
			<td colspan="3" align="center"><b><?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_jabatan')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<!--<td width="500px"></td>-->
			<td colspan="3" align="center"><?php echo imgttd($d->Flow_Kadin,330,'','','','0'); ?><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	<br/>
	<br/>
	<table class="font10 tbtembusan fleft" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td width="500px" align="justify"><?php echo ifnull($d->Tembusan,''); ?></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
	<br/>
	
	<?php } ?>
</body>
</html>
