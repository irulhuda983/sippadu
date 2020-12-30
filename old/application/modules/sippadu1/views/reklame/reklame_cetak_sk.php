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
		font-size: 16px;
	}
	.atv_teks1 {
		font-size: 20px;
	}
	.atv_teks2 {
		font-size: 20px;
	}
	
	table, th, td {
		vertical-align: top;
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
			<td ALIGN="center"><b><u>SURAT IJIN PEMASANGAN REKLAME</u></b></td>
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
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td ALIGN="left" width="200">Dasar</td>
			<td width="20">:</td>
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
			<table>
				<tr>
					<td colspan="3"><b><i>Kepada</i></b></td>
				</tr>
				<tr>
					<td width="250px">Nama / Perusahaan</td>
					<td>:</td>
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
			<td ALIGN="center" colspan="3"><b>DENGAN KETENTUAN</b></td>
		</tr>
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="justify" colspan="3"><?php echo format_parameter(8,12,$replace); ?></td>
		</tr>
	</table>
	<br/>
	<br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td width="600px"></td>
			<td width="150px">Ditetapkan di</td>
			<td>:</td>
			<td><?php echo sippadu('nama_kota'); ?></td>
		</tr>
		<tr>
			<td width="600px"></td>
			<td width="150px">Pada tanggal</td>
			<td>:</td>
			<td><?php echo Date_Indo(TimeFormat($d->Tgl_SK,'d F Y')); ?></td>
		</tr>
	</table>
    <br/>
	<br/>
	<br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td width="500px"></td>
			<td align="center"><b>KEPALA <?php echo str_replace('DAN PELAYANAN','<br/>DAN PELAYANAN',sippadu('nama_dinas')); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b></td>
		</tr>
		<tr>
			<td width="500px"></td>
			<td align="center" style="height:200px"><br/><br/><br/><br/><br/><u><b><?php echo sippadu('nama_kadin'); ?></b></u><br/><?php echo sippadu('pangkat_kadin'); ?><br/>NIP. <?php echo sippadu('nip_kadin'); ?></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td width="500px" align="justify"><?php echo ifnull($d->Tembusan,''); ?></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
	<br/>
	
	<?php } ?>
</body>
</html>
