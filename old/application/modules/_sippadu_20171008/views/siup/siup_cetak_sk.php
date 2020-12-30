<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title><?php echo $site_title; ?></title>
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/Print.css" rel="stylesheet" type="text/css">
	<style>
		@media screen {.PrintOnly {display:none}}
		@media print {.ScreenOnly {display:none}}
		.style7 {font-size: 14px}
		.style10 {	font-family: Times New Roman, Arial, Helvetica, sans-serif;
			font-weight: normal;
			font-size: 16pt;
			color: #000000;
		}
		.atv_layout_txt11 {
			font-size: 25px;
		}
		.atv_judul1 {
			font-size: 35px;
		}
		.atv_layout_txt21 {
			font-size: 20px;
		}
	</style>

	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>
</head>
<body LEFTMARGIN="10" TOPMARGIN="10" MARGINWIDTH="10" MARGINHEIGHT="10">
	<font color="#0000FF" size="2" face="Times New Roman, Arial, Helvetica, sans-serif"></font><br/>
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td align="center" height="25" colspan="7" valign="top"><input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
			<input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()"></td>
		</tr>
		<tr>
			<td rowspan="4"  align="center" valign="top" class=""><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="100px" /></td>
			<td height="33" colspan="6" align="center" valign="top" class="atv_layout_txt11" style="font-weight:bold;color:black;"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td></tr>
		<tr>
			<td height="35" colspan="6" align="center" valign="top" class="atv_layout_txt11" style="font-weight:bold;color:black;"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
		</tr>
		<tr>
			<td height="33" colspan="6" align="center" valign="top" class="atv_layout_txt11" style="color:black;"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
		</tr>
		<tr>
		   <td height="33" colspan="6" align="center" valign="top" class="" style="font-size:30px;color:black;"><div align="center"><b><u><?php echo strtoupper(sippadu('nama_kota')); ?></u></b></div></td>
		</tr>
	</table>
			
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); 
	$kd_izin = perusahaan($d->IDPERUSAHAAN,'kategori_izin');
	switch($kd_izin){
		case '1': $k_izin = 'MIKRO'; break;
		case '2': $k_izin = 'KECIL'; break;
		case '3': $k_izin = 'MENENGAH'; break;
		case '4': $k_izin = 'BESAR'; break;
		default: $k_izin = ''; break;
	}
	?>		
	<table width="1100" border="0" align="center" cellpadding="10" cellspacing="0" style="font-size:12px; ">
		<tr>
			<td height="35" colspan="17" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="17" align="center" valign="bottom" class="atv_judul1"><strong><u>SURAT IZIN USAHA PERDAGANGAN (SIUP) <?php echo $k_izin; ?></u></strong></td>
		</tr>
		<tr>
			<td colspan="17" align="center" valign="top" class="atv_layout_txt21" style="font-size:25px;">NOMOR : <?php echo $d->NO_SK; ?></td>
		</tr>
		<tr>
			<td colspan="17" align="center" valign="top" class="style12" style="height:35px;">&nbsp;</td>
		</tr>
		<tr>
			<td width="" colspan="5" valign="middle" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;width:35%;height:50px;">NAMA PERUSAHAAN</td>
			<td valign="middle" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="center" align="justify" class="atv_layout_txt21" style="border-top:1px solid #000000;border-right:1px solid #000000;font-size:25px;"><strong><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'nama')); ?></strong></td>
		</tr>
		<tr>
			<td colspan="5" valign="middle" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">NAMA PENANGGUNG JAWAB DAN JABATAN</td>
			<td valign="top" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="middle" align="left" class="atv_layout_txt21" style="border-right:1px solid #000000;border-top:1px solid #000000;padding-right:1px"><strong><?php echo strtoupper(pelanggan($d->IDPELANGGAN,'nama')); ?></strong><br/><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'jabatan')); ?></td>
		</tr>
		<tr>
			<td colspan="5" valign="top" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">ALAMAT PERUSAHAAN</td>
			<td valign="top" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="top" align="justify" class="atv_layout_txt21" style="border-right:1px solid #000000;border-top:1px solid #000000;padding-right:1px">
			<?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'alamat')); ?>
			<?php echo strtoupper(desa(perusahaan($d->IDPERUSAHAAN,'desa'))); ?>, <?php echo strtoupper(kecamatan(perusahaan($d->IDPERUSAHAAN,'kecamatan'))); ?>, <?php echo strtoupper(kota(perusahaan($d->IDPERUSAHAAN,'kota'))); ?>, <?php echo strtoupper(provinsi(perusahaan($d->IDPERUSAHAAN,'provinsi'))); ?>
			</td>
		</tr>
		<tr>
			<td colspan="5" valign="middle" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">NOMOR TELEPON</td>
			<td valign="middle" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="middle" class="atv_layout_txt21" style="border-top:1px solid #000000;border-right:1px solid #000000;">
			<div align="justify"><?php echo perusahaan($d->IDPERUSAHAAN,'telepon'); ?></div></td>
		</tr>
		<tr>
			<td colspan="5" valign="top" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">MODAL DAN KEKAYAAN BERSIH PERUSAHAAN <br/><font style="font-size:16px;">(TIDAK TERMASUK TANAH DAN BANGUNAN)</font></td>
			<td valign="middle" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="middle" class="atv_layout_txt21" style="border-right:1px solid #000000;border-top:1px solid #000000;"><div align="justify">Rp. <?php echo number(perusahaan($d->IDPERUSAHAAN,'nilai_modal')); ?>,-
			<!--<br>
			( Satu Milyar Dua Ratus Empat Belas Juta Sembilan Ratus Delapan Puluh Tiga Ribu Enam Ratus Dua Puluh Satu Rupiah )--></div></td>
		</tr>
		<tr>
			<td colspan="5" valign="top" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">KELEMBAGAAN</td>
			<td valign="top" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="top" class="atv_layout_txt21" style="border-right:1px solid #000000;border-top:1px solid #000000;"><div align="justify">PEDAGANG SKALA <?php echo kelembagaan(perusahaan($d->IDPERUSAHAAN,'kelembagaan')); ?></div></td>
		</tr>
		<tr>
			<td colspan="5" valign="top" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">KEGIATAN USAHA (KBLI)</td>
			<td valign="top" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="top" align="justify" class="atv_layout_txt21" style="border-right:1px solid #000000;border-top:1px solid #000000;"><?php echo perusahaan($d->IDPERUSAHAAN,'kbli'); ?></td>
		</tr>
		<tr>
			<td colspan="5" valign="top" class="atv_layout_txt21" style="border-left:1px solid #000000;border-top:1px solid #000000;">BARANG/JASA DAGANGAN UTAMA</td>
			<td valign="top" class="atv_layout_txt21" style="border-top:1px solid #000000;"><span class="style12">:</span></td>
			<td colspan="11" valign="top" align="justify" class="atv_layout_txt21" style="border-top:1px solid #000000;border-right:1px solid #000000;padding-right:1px"><font style="font-size:20px"><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'usaha_pokok')); ?></font></td>
		</tr>
		<tr>
			<td colspan="17" valign="top" align="justify" class="atv_layout_txt21" style="font-size:20px;border-left:1px solid #000000;border-top:1px solid #000000;border-bottom:1px solid #000000;border-right:1px solid #000000;padding:1px">
			<ul>
			
				<li>IJIN INI BERLAKU UNTUK MELAKUKAN KEGIATAN USAHA PERDAGANGAN DI SELURUH WILAYAH REPUBLIK INDONESIA, SELAMA PERUSAHAAN MASIH MENJALANKAN USAHANYA</li>
				<li>TIDAK UNTUK MELAKUKAN KEGIATAN USAHA YANG BERTENTANGAN DENGAN PERATURAN PERUNDANG-UNDANGAN YANG BERLAKU</li>
				<li>APABILA PEMEGANG IJIN MELAKUKAN KEGIATAN USAHA MELANGGAR PERATURAN PERUNDANG-UNDANGAN YANG BERLAKU, MAKA IJIN INI BATAL DEMI HUKUM</li>
			</ul>
			</td>
		</tr>
		</table>

		<table width="1100" border="0" align="center" cellpadding="10" cellspacing="0" style="font-size:12px;">
		<tr>
			<td height="27" colspan="3" valign="middle">&nbsp;</td>
		</tr>
		<tr>
			<td height="27" colspan="2" valign="middle">&nbsp;</td>
			<td colspan="1" align="center" valign="top" class="atv_layout_txt21"><?php echo strtoupper(sippadu('nama_kota')); ?>, <?php echo strtoupper(Date_Indo(TimeFormat($d->TGL_SK,'d F Y'))); ?></td>
		</tr>
		<tr>
			<td width="15%" height="215" align="left" colspan="1" valign="top" class="atv_layout_txt21" style="padding-top:15px;">
			<div id="qrcodeCanvas"></div>
			<script>	
			jQuery('#qrcodeCanvas').qrcode({
				text	: "<?php echo $d->NO_SK; ?>",
			});
			</script>	
			</td>
			<td width="" align="left" colspan="1" valign="top" class="atv_layout_txt21" style="padding-top:15px;"><div style="width:5cm;height:6.5cm;border: 1px solid #000;"></div></td>
			<td width="410" colspan="1" align="center" valign="top" class="atv_layout_txt21">
				<b>KEPALA <?php echo sippadu('nama_dinas'); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b><br>
				<div style="width:320px;height:135px;"></div>
				<b><u><?php echo sippadu('nama_kadin'); ?></u></b><br>
				<?php echo sippadu('pangkat_kadin'); ?><br>
				NIP.&nbsp;<?php echo sippadu('nip_kadin'); ?>
				
			</td>
		</tr>
		</table>
		<div align="justify"></div>
	<?php } ?>
</body>
</html>
