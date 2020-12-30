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
			<td ALIGN="center" class="atv_judul1"><b><u>IJIN USAHA JASA KONSTRUKSI NASIONAL</u></b></td>
		</tr>
		<tr>
			<td ALIGN="center"><b>NOMOR : <?php echo $d->No_SK; ?></b></td>
		</tr>
		
	</table>
	<br/><br/>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;padding-left:80px;" class="atv_teks2">
		<tr>
			<td colspan="2" ALIGN="left" width="220">Nama Badan Usaha</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo $d->Nm_Usaha; ?></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">Alamat Kantor Badan Usaha</td>
			<td width="20">:</td>
			<td align="justify"></td>
		</tr>
		<tr>
			<td width="50px">&nbsp;</td>
			<td ALIGN="left">Jalan / Dusun</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo $d->Alamat_Usaha; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">RT / RW</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->RT_Usaha,'-'); ?> / <?php echo ifnull($d->RW_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Desa / Kelurahan</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull(desa($d->Kd_Desa),'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Kecamatan</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull(kecamatan($d->Kd_Kecamatan),'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Kabupaten</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull(kota($d->Kd_Kota),'-'); ?></b></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Kode Pos</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->Kodepos_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Nomor Telepon</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->Telp_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Nomor Fax</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->Fax_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="4" ALIGN="left">Nama Penanggung Jawab Utama Badan Usaha/Direktur Utama/Direktur :</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Nama 1</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->PJ_1,'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Nama 2</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->PJ_2,'-'); ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ALIGN="left">Nama 3</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->PJ_3,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">NPWP Badan Usaha</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->NPWP_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="4" ALIGN="left">Ijin Usaha Jasa Konstruksi (IUJK) ini berlaku untuk melakukan Kegiatan Usaha Jasa <b><?php echo iujk($d->Jenis_Usaha); ?></b> Konstruksi di seluruh wilayah Republik Indonesia.</td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">Kualifikasi</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->Kualifikasi_Usaha,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">Nama PJT</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->Nm_PJT,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">No. PJT-BU</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->No_PJT,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">Klasifikasi</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull($d->Klasifikasi,'-'); ?></b></td>
		</tr>
		<tr>
			<td colspan="2" ALIGN="left">Berlaku sampai dengan tanggal</td>
			<td width="20">:</td>
			<td align="justify"><b><?php echo ifnull(Date_Indo(TimeFormat($d->Tgl_SKA,'d F Y')),'-'); ?></b></td>
		</tr>
		<!--<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td ALIGN="left">Mengingat</td>
			<td>:</td>
			<td align="justify"><?php echo format_parameter(4,12,$replace); ?></td>
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
			<td ALIGN="left">Menetapkan</td>
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
					<td>1.</td>
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
					<td><b><?php echo $d->Lokasi; ?></b></td>
				</tr>
				<tr>
					<td>5.</td>
					<td>Luas Lahan</td>
					<td>:</td>
					<td><b><?php echo $d->Luas_Bangunan; ?> m<sup>2</sup></b></td>
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
		<tr>
			<td ALIGN="left" colspan="3">&nbsp;</td>
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
	<br/>
	
	<?php } ?>
</body>
</html>
