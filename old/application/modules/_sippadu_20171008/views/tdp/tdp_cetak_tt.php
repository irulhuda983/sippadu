<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title><?php echo $site_title; ?></title>
	<style>
		@page 
		{
			size:  auto;   /* auto is the initial value */
			margin: 0mm 10mm; /* this affects the margin in the printer settings */
		}
		
		.style2 {
			font-family: Times New Roman;
			font-weight: normal;
			font-size: 14pt;
			color: #000000;
		}
		.style5 {
			font-family:Times New Roman; 
			font-weight: bold; 
			font-size: 16pt; 
			color: #000000; }
		.style6 {
			color: #000000;
			font-weight: normal;
			font-size: 14pt;
			font-family: Times New Roman;
		}
		.style7 {
			font-family: Times New Roman;
			font-weight: normal;
			font-size: 12pt;
			color: #000000;
		}
		.style8 {
			font-family: Times New Roman;
			font-weight: bold;
			font-size: 18pt;
			color: #000000;
			text-decoration: underline;
		}
		.style9 {
			font-family: Times New Roman;
			font-weight: normal;
			font-size: 16pt;
			color: #000000;
		}
		.style10 {	font-family: Times New Roman;
			font-weight: normal;
			font-size: 9pt;
			color: #000000;
		}

		@media screen {.PrintOnly {display:none}}
		@media print {.ScreenOnly {display:none}}
	</style>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<!--<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-barcode.js"></script>
</head>
<body>	
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row();
	?>
	<table width="1000" border="0" cellpadding="10" class="ScreenOnly">
		<tr>
			<td align="center">
				<input name="cmdcetak" type="button" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="cmdselesai" type="submit" id="cmdselesai" value="  Selesai  " onClick="window.close()">
			</td>
		</tr>
	</table>
	<br/><br/>
	<table width="1000" border="2" cellpadding="10" style="border-collapse: collapse;">
		<tr>
			<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td rowspan="4"  align="center" valign="top" class="style7"><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="60px" /></td>
						<td align="center" valign="top" class="style7"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td>
					</tr>
					<tr>
						<td align="center" valign="top" class="style5"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
					</tr>
					<tr>
						<td align="center" valign="top" class="style7"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
					</tr>
					<tr>
						<td align="center" valign="top" class="style7"><div align="center">Website: <?php echo ifnull(sippadu('web_dinas'),'-'); ?>&nbsp;&nbsp;&nbsp;Email: <?php echo ifnull(sippadu('email_dinas'),'-'); ?></div></td>
					</tr>
					<tr>
						<td colspan="2" align="center" valign="top" class="style7" style="border-bottom:5px #333333 solid;"><div align="center"><b><?php echo strtoupper(sippadu('nama_kota')); ?></b></div></td>
					</tr>
					<tr>
						<td colspan="2" align="center" valign="top">&nbsp;</td>
					</tr>
				</table>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td colspan="3" align="left" valign="top" class="style2"><strong>TANDA TERIMA BERKAS<sup></sup></strong></td>
						<td width="500" rowspan="4" align="right" valign="top" class="style7">
							<div id="barcode"></div>
							<script>
							var settings = {
								barWidth: 2,
								barHeight: 50,
								moduleSize: 5,
								showHRI: true,
								addQuietZone: true,
								marginHRI: 5,
								bgColor: "#FFFFFF",
								color: "#000000",
								fontSize: 12,
								output: "css",
								posX: 0,
								posY: 0
							};
							jQuery('#barcode').barcode("<?php echo $d->IDTDP; ?>","code128",settings);
							</script>
						</td>
					</tr>
					<tr>
						<td colspan="3" valign="top" class="style7">&nbsp;</td>
					</tr>
					<tr>
						<td width="150" valign="middle" class="style7">Nama Izin </td>
						<td width="16" valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><b><?php echo $Nm_Izin; ?></b></td>
					</tr>
					<tr>
						<td width="150" valign="middle" class="style7">No. Register </td>
						<td width="16" valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><b><?php echo $d->IDTDP; ?></b></td>
					</tr>
					
					<tr>
						<td valign="middle" class="style7">Nama Pendaftar </td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><?php echo strtoupper(pelanggan($d->IDPELANGGAN,'nama')); ?></td>
						<td></td>
					</tr>
					<tr>
						<td valign="middle" class="style7">No. Identitas </td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><?php echo pelanggan($d->IDPELANGGAN,'kitas'); ?></td>
						<td></td>
					</tr>
					<tr>
						<td valign="middle" class="style7">Alamat</td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" colspan="2" align="left" class="style7">
						<?php echo strtoupper(pelanggan($d->IDPELANGGAN,'alamat')); ?>
						<?php echo strtoupper(desa(pelanggan($d->IDPELANGGAN,'desa'))); ?>, <?php echo strtoupper(kecamatan(pelanggan($d->IDPELANGGAN,'kecamatan'))); ?>, <?php echo strtoupper(kota(pelanggan($d->IDPELANGGAN,'kota'))); ?>, <?php echo strtoupper(provinsi(pelanggan($d->IDPELANGGAN,'provinsi'))); ?>
						</td>
					</tr>
					<tr>
						<td valign="middle" class="style7">Telepon</td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" colspan="2" align="justify" class="style7">
						<?php echo pelanggan($d->IDPELANGGAN,'telepon'); ?>
						</td>
					</tr>
					
					<tr>
						<td valign="middle" class="style7">Nama Usaha </td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" colspan="2" class="style7"><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'nama')); ?></td>
					</tr>
					<tr>
						<td valign="top" class="style7">Lokasi Usaha</td>
						<td valign="top" class="style7">:</td>
						<td valign="top" colspan="2" class="style7" align="left" >
						<?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'alamat')); ?>
						<?php echo strtoupper(desa(perusahaan($d->IDPERUSAHAAN,'desa'))); ?>, <?php echo strtoupper(kecamatan(perusahaan($d->IDPERUSAHAAN,'kecamatan'))); ?>, <?php echo strtoupper(kota(perusahaan($d->IDPERUSAHAAN,'kota'))); ?>, <?php echo strtoupper(provinsi(perusahaan($d->IDPERUSAHAAN,'provinsi'))); ?>
					   </td>
					</tr>
				</table>
				<br/>
				<br/>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td width="40%" align="left" class="style10"><i>Dicetak pada: <?php echo Date_Indo(TimeNow('d F Y H:i')); ?></i></td>
						<td width="20%" align="center" style="border:1px #000 solid;" class="style7"><b>UNTUK PEMOHON</b></td>
						<td width="40%" align="right" class="style10"><i>Petugas Pendaftaran : <?php echo ifnull($d->Nm_FO,'-'); ?></i></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br/>
	<br/>
	<table width="1000" border="2" cellpadding="10" style="border-collapse: collapse;">
		<tr>
			<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td rowspan="4"  align="center" valign="top" class="style7"><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="60px" /></td>
						<td colspan="7" align="center" valign="top" class="style7"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td>
					</tr>
					<tr>
						<td colspan="7" align="center" valign="top" class="style5"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
					</tr>
					<tr>
						<td colspan="7" align="center" valign="top" class="style7"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
					</tr>
					<tr>
						<td colspan="7" align="center" valign="top" class="style7"><div align="center">Website: <?php echo ifnull(sippadu('web_dinas'),'-'); ?>&nbsp;&nbsp;&nbsp;Email: <?php echo ifnull(sippadu('email_dinas'),'-'); ?></div></td>
					</tr>
					<tr>
						<td colspan="8" align="center" valign="top" class="style7" style="border-bottom:5px #333333 solid;"><div align="center"><b><?php echo strtoupper(sippadu('nama_kota')); ?></b></div></td>
					</tr>
					<tr>
						<td colspan="8" align="center" valign="top">&nbsp;</td>
					</tr>
				</table>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td colspan="3" align="left" valign="top" class="style2"><strong>TANDA TERIMA BERKAS<sup></sup></strong></td>
						<td width="500" rowspan="4" align="right" valign="top" class="style7">
							<div id="barcode2"></div>
							<script>
							var settings = {
								barWidth: 2,
								barHeight: 50,
								moduleSize: 5,
								showHRI: true,
								addQuietZone: true,
								marginHRI: 5,
								bgColor: "#FFFFFF",
								color: "#000000",
								fontSize: 12,
								output: "css",
								posX: 0,
								posY: 0
							};
							jQuery('#barcode2').barcode("<?php echo $d->IDTDP; ?>","code128",settings);
							</script>
						</td>
					</tr>
					<tr>
						<td colspan="3" valign="top" class="style7">&nbsp;</td>
					</tr>
					<tr>
						<td width="150" valign="middle" class="style7">Nama Izin </td>
						<td width="16" valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><b><?php echo $Nm_Izin; ?></b></td>
					</tr>
					<tr>
						<td width="150" valign="middle" class="style7">No. Register </td>
						<td width="16" valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><b><?php echo $d->IDTDP; ?></b></td>
					</tr>
					
					<tr>
						<td valign="middle" class="style7">Nama Pendaftar </td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><?php echo strtoupper(pelanggan($d->IDPELANGGAN,'nama')); ?></td>
						<td></td>
					</tr>
					<tr>
						<td valign="middle" class="style7">No. Identitas </td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" class="style7"><?php echo pelanggan($d->IDPELANGGAN,'kitas'); ?></td>
						<td></td>
					</tr>
					<tr>
						<td valign="middle" class="style7">Alamat</td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" colspan="2" align="left" class="style7">
						<?php echo strtoupper(pelanggan($d->IDPELANGGAN,'alamat')); ?>
						<?php echo strtoupper(desa(pelanggan($d->IDPELANGGAN,'desa'))); ?>, <?php echo strtoupper(kecamatan(pelanggan($d->IDPELANGGAN,'kecamatan'))); ?>, <?php echo strtoupper(kota(pelanggan($d->IDPELANGGAN,'kota'))); ?>, <?php echo strtoupper(provinsi(pelanggan($d->IDPELANGGAN,'provinsi'))); ?>
						</td>
					</tr>
					<tr>
						<td valign="middle" class="style7">Telepon</td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" colspan="2" align="justify" class="style7">
						<?php echo pelanggan($d->IDPELANGGAN,'telepon'); ?>
						</td>
					</tr>
					
					<tr>
						<td valign="middle" class="style7">Nama Usaha </td>
						<td valign="middle" class="style7">:</td>
						<td valign="middle" colspan="2" class="style7"><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'nama')); ?></td>
					</tr>
					<tr>
						<td valign="top" class="style7">Lokasi Usaha</td>
						<td valign="top" class="style7">:</td>
						<td valign="top" colspan="2" class="style7" align="left" >
						<?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'alamat')); ?>
						<?php echo strtoupper(desa(perusahaan($d->IDPERUSAHAAN,'desa'))); ?>, <?php echo strtoupper(kecamatan(perusahaan($d->IDPERUSAHAAN,'kecamatan'))); ?>, <?php echo strtoupper(kota(perusahaan($d->IDPERUSAHAAN,'kota'))); ?>, <?php echo strtoupper(provinsi(perusahaan($d->IDPERUSAHAAN,'provinsi'))); ?>
					   </td>
					</tr>
				</table>
				<br/>
				<hr/>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td valign="middle" class="style7" colspan="4"><b>KELENGKAPAN BERKAS</b></td>
					</tr>
					<?php 
					$i = 0;
					$data_dok = dok_checklist($Kd_Izin,substr($d->JENIS_IZIN,-1));
					if($data_dok->num_rows() > 0){
						foreach($data_dok->result() as $dok){
							$cek = cek_dok_checklist($Kd_Izin,$d->ID,$dok->Kd_Dok);
							echo '
							<tr>
								<td width="20" valign="top" class="style10">'.++$i.'.</td>
								<td width="400" valign="top" class="style10">'.$dok->Nm_Dok.'</td>
								<td width="16" valign="top" class="style10">:</td>
								<td valign="top" class="style10">'.($cek? 'ADA' : '-').'</td>
							</tr>';
						}
					} 
					?>
				</table>
				<br/>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
					<tr>
						<td width="40%" align="left" class="style10"><i>Dicetak pada: <?php echo Date_Indo(TimeNow('d F Y H:i')); ?></i></td>
						<td width="20%" align="center" style="border:1px #000 solid;" class="style7"><b>UNTUK PETUGAS</b></td>
						<td width="40%" align="right" class="style10"><i>Petugas Pendaftaran : <?php echo ifnull($d->Nm_FO,'-'); ?></i></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<?php } ?>
</body>
</html>
