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

	<br/>
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); ?>
	<table class="tb100 font10" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;">
		<tr>
			<td ALIGN="center"><b>KEPUTUSAN<br/>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?></b></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center"><b>TENTANG<br/>IJIN GANGGUAN ( HO )</b></td>
		</tr>
		<tr>
			<td ALIGN="center">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?></b></td>
		</tr>
	</table>
	<br/><br/>
	<table class="font10 tb100" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;" >
		<tr>
			<td ALIGN="left" width="150">MENIMBANG</td>
			<td width="20">:</td>
			<td align="justify"><?php echo format_parameter(4,11,$replace); ?></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="left">MENGINGAT</td>
			<td>:</td>
			<td align="justify"><?php echo format_parameter(4,12,$replace); ?></td>
		</tr>
		<!--<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>-->
		<tr>
			<td ALIGN="left">MEMPERHATIKAN</td>
			<td>:</td>
			<td align="justify"><?php echo $d->SK_Memperhatikan; ?></td>
		</tr>
		<!--<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>-->
		<tr>
			<td ALIGN="center" colspan="3"><br/><b>MEMUTUSKAN</b><br/></td>
		</tr>
		<!--<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>-->
		<tr>
			<td ALIGN="left">MENETAPKAN</td>
			<td>:</td>
			<td></td>
		</tr>
		<tr>
			<td ALIGN="left">KESATU</td>
			<td>:</td>
			<td align="justify">
			Memberikan Ijin Gangguan (HO) tempat usaha kepada:<br/>
			<table>
				<tr>
					<td width="13px">1.</td>
					<td width="150px">Nama</td>
					<td>:</td>
					<td><b><?php echo pelanggan($d->ID_Pelanggan,'nama'); ?></b></td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Alamat</td>
					<td>:</td>
					<td><b><?php echo pelanggan($d->ID_Pelanggan,'alamat'); ?> <?php echo desa(pelanggan($d->ID_Pelanggan,'desa')); ?>, <?php echo kecamatan(pelanggan($d->ID_Pelanggan,'kecamatan')); ?>, <?php echo kota(pelanggan($d->ID_Pelanggan,'kota')); ?>, <?php echo provinsi(pelanggan($d->ID_Pelanggan,'provinsi')); ?></b></td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Jenis Usaha</td>
					<td>:</td>
					<td><b>" <?php echo $d->Nm_Usaha; ?> "</b></td>
				</tr>
				<tr>
					<td>4.</td>
					<td>Alamat Usaha</td>
					<td>:</td>
					<td><b><?php echo ifnull($d->Alamat_Usaha,'-'); ?> <?php echo desa($d->Kd_Desa); ?>, <?php echo kecamatan($d->Kd_Kecamatan); ?>, <?php echo kota($d->Kd_Kota); ?>, <?php echo provinsi($d->Kd_Provinsi); ?></b></td>
				</tr>
				<tr>
					<td>5.</td>
					<td>Luas Lahan</td>
					<td>:</td>
					<td><b><?php echo ifnull($d->Luas_Bangunan,'-'); ?> m<sup>2</sup></b></td>
				</tr>
				<tr>
					<td>6.</td>
					<td>Keterangan</td>
					<td>:</td>
					<td><b>Ijin Baru</b></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="left">KEDUA</td>
			<td>:</td>
			<td align="justify"><?php echo format_parameter(4,14,$replace); ?></td>
		</tr>
		<!--<tr>
			<td ALIGN="left">KETIGA</td>
			<td>:</td>
			<td align="justify"><?php echo format_parameter(4,15,$replace); ?></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="left">KEEMPAT</td>
			<td>:</td>
			<td align="justify"><?php echo format_parameter(4,16,$replace); ?></td>
		</tr>-->
	</table>
	<table class="font10 tbtgl fright tleft" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;" >
		<tr>
			<!--<td width="600px"></td>-->
			<td width="">Ditetapkan di</td>
			<td>:</td>
			<td><?php echo sippadu('nama_kota'); ?></td>
		</tr>
		<tr>
			<!--<td width="600px"></td>-->
			<td width="">Pada tanggal</td>
			<td>:</td>
			<td><?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></td>
		</tr>
	</table>
    <br/>
	<br/>
	<table class="font10 tbttd fright" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:0px;" >
		<tr>
			<!--<td width="500px"></td>-->
			<td align="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<!--<td width="500px"></td>-->
			<td align="center"><?php echo imgttd($d->Flow_Kadin,300,'','','','0'); ?><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	
	<?php } ?>
</body>
</html>
