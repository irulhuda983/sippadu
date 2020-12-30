<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title><?php echo $site_title; ?></title>
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/Master-Print.css" rel="stylesheet" type="text/css">
	<style>
		.style2 {
			font-family: Times New Roman;
			font-weight: normal;
			font-size: 22pt;
			color: #000000;
		}
		.style5 {font-family:Times New Roman; font-weight: bold; font-size: 30px; color: #000000; }
		.style6 {
			color: #000000;
			font-weight: normal;
			font-size: 20pt;
			font-family: Times New Roman;
		}
		.style7 {
			font-family: Times New Roman;
			font-weight: normal;
			font-size: 18pt;
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
			font-family: Arial, Helvetica, sans-serif;
			font-weight: normal;
			font-size: 16pt;
			color: #000000;
		}
		.style10 {	font-family: Arial, Helvetica, sans-serif;
			font-weight: normal;
			font-size: 10pt;
			color: #000000;
		}

		@media screen {.PrintOnly {display:none}}
		@media print {.ScreenOnly {display:none}}
	</style>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>
</head>
<body>	
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row();
	?>		
	<form method="post" enctype="multipart/form-data" name="frm" target="content" id="frm">
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td height="25" colspan="8" align="center" valign="top"><input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()"></td>
		</tr>
		<tr>
			<td height="25" colspan="8" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td rowspan="3"  align="center" valign="top" class="style2"><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="100px" /></td>
			<td height="33" colspan="7" align="center" valign="top" class="style2" style="font-size:25px;"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td>
		</tr>
		<tr>
			<td height="35" colspan="7" align="center" valign="top" class="style5" style="font-size:25px;"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
		</tr>
		<tr>
			<td height="33" colspan="7" align="center" valign="top" class="style6"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
		</tr>
		<tr>
			<td height="33" colspan="8" align="center" valign="top" class="style6" style="border-bottom:5px #333333 solid;><div align="center"><?php echo strtoupper(sippadu('nama_kota')); ?></div></td>
		</tr>
		<tr>
			<td height="20" colspan="8" align="center" valign="top">&nbsp;</td>
		</tr>
	</table>
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td height="50" colspan="8" align="center" valign="top" class="style6"><strong>TANDA TERIMA BERKAS<sup></sup></strong></td>
		</tr>
		<tr>
			<td height="30" colspan="8" valign="top" class="style7">Telah diterima secara lengkap berkas permohonan <b><?php echo $Nm_Izin; ?>&nbsp;</b>: </td>
		</tr>
		<tr>
			<td width="55" height="30">&nbsp;</td>
			<td width="291" valign="middle" class="style7">No. Pendaftaran Izin </td>
			<td width="16" valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" class="style7"><b><?php echo $d->ID_Reg; ?></b></td>
		</tr>
		
		
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="middle" class="style7">Nama Pendaftar </td>
			<td valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" class="style7"><?php echo pelanggan($d->ID_Pelanggan,'nama'); ?></td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="middle" class="style7">No. Identitas </td>
			<td valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" class="style7"><?php echo pelanggan($d->ID_Pelanggan,'kitas'); ?></td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="middle" class="style7">Alamat</td>
			<td valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" align="justify" class="style7">
			<?php echo pelanggan($d->ID_Pelanggan,'alamat'); ?>
			<?php echo desa(pelanggan($d->ID_Pelanggan,'desa')); ?>, <?php echo kecamatan(pelanggan($d->ID_Pelanggan,'kecamatan')); ?>, <?php echo kota(pelanggan($d->ID_Pelanggan,'kota')); ?>, <?php echo provinsi(pelanggan($d->ID_Pelanggan,'provinsi')); ?>
			</td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="middle" class="style7">Telepon</td>
			<td valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" align="justify" class="style7">
			<?php echo pelanggan($d->ID_Pelanggan,'telepon'); ?>
			</td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="middle" class="style7">Nama Usaha </td>
			<td valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" class="style7"><?php echo ifnull($d->Nm_Usaha,'-'); ?></td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="middle" class="style7">Jenis Usaha</td>
			<td valign="middle" class="style7">:</td>
			<td colspan="5" valign="middle" class="style7"><?php echo ifnull($d->Perihal,'-'); ?></td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td valign="top" class="style7">Alamat Usaha</td>
			<td valign="top" class="style7">:</td>
			<td colspan="5" valign="top" class="style7" align="justify" >
			<?php echo ifnull($d->Alamat_Usaha,'-'); ?>
			<?php echo desa($d->Kd_Desa); ?>, <?php echo kecamatan($d->Kd_Kecamatan); ?>, <?php echo kota($d->Kd_Kota); ?>, <?php echo provinsi($d->Kd_Provinsi); ?>
		   </td>
		</tr>
	</table>
	<br/><br/><br/>
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td valign="middle" class="style7" colspan="4"><b>Kelengkapan Berkas</b></td>
		</tr>
		<?php 
		$i = 0;
		$data_dok = dok_checklist($Kd_Izin,substr($d->Jenis_Izin,-1));
		if($data_dok->num_rows() > 0){
			foreach($data_dok->result() as $dok){
				$cek = cek_dok_checklist($Kd_Izin,$d->ID,$dok->Kd_Dok);
				echo '
				<tr>
					<td width="" valign="top" class="style7">'.++$i.'.</td>
					<td width="800" valign="top" class="style7">'.$dok->Nm_Dok.'</td>
					<td width="16" valign="top" class="style7">:</td>
					<td colspan="" valign="top" class="style7">'.($cek? 'ADA' : 'TIDAK ADA').'</td>
				</tr>';
			}
		} 
		?>
	</table>
	<br/><br/><br/>
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
		   <td colspan="" rowspan="4" valign="top">
		   <br/><br/>
		   <div id="qrcodeCanvas"></div>
		   <script>	
			jQuery('#qrcodeCanvas').qrcode({
				text	: "<?php echo $d->ID_Reg; ?>",
			});</script></td>
		   <td valign="middle" class="style7" width="500px">&nbsp;</td>
		   <td height="30" colspan="" valign="middle" class="style7"><div align="center"><?php echo strtoupper(sippadu('nama_kota')); ?>, <?php echo strtoupper(Date_Indo(TimeFormat($d->Tgl_Mohon,'d F Y'))); ?></div></font></div></td>
		</tr>
		<tr>
			<td valign="middle" class="style7">&nbsp;</td>
			<td height="30" colspan=""  valign="middle" class="style7"><div align="center">Petugas Pendaftaran </div></td>
		</tr>
		<tr>
			<td valign="middle" class="style7">&nbsp;</td>
			<td height="100" colspan="" valign="middle" class="style7">&nbsp;</td>
		</tr>
		<tr>
		   <td valign="middle" class="style7">&nbsp;</td>
		   <td height="30" colspan="" valign="middle" class="style8"><div align="center"><?php echo $d->Nm_FO; ?></div></td>
		</tr>
	</table>
	<div align="justify"></div>
	</form>
	<?php } ?>
</body>
</html>
