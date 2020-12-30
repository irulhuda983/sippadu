<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title><?php echo $site_title; ?></title>
	<!--<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/cetak/Master-Print.css" rel="stylesheet" type="text/css">-->
	<style>
		/* ------- */
		.judul {
			color: #000000;
			font-weight: normal;
			font-size: 16px;
			font-family: Times New Roman;
		}
		
		.judul2 {
			color: #000000;
			font-weight: normal;
			font-size: 20px;
			font-family: Times New Roman;
		}
		
		.desc {
			color: #000000;
			font-weight: normal;
			font-size: 14px;
			font-family: Times New Roman;
		}
		
		table {
			width: 100%;
			max-width: 100%;
			margin-bottom: 20px;
			border-collapse: collapse;
		}
		
		.thead tr, .thead td, .tr tr, .tr td {
			padding: 2px;
		}

		.thead{
			background-color: #ccc;
			font-family: Times New Roman;
			font-size: 8px;
			font-weight: bold;
			color: #000000;
			text-align: center;
		}
		
		.tr {	
			font-family: Times New Roman;
			font-weight: normal;
			font-size: 8px;
			color: #000000;
			page-break-inside: avoid;
			text-align: left;
			vertical-align: top;
		}
		
		@media screen {
			.PrintOnly {
				display:none
			}
		}
		
		@media print {
			@page {
				size: F4 landscape
				page-break-after: always; 
				counter-increment: page;
				counter-reset: page 1;
				@top-right {
					content: "Page " counter(page) " of " counter(pages);
				}
			}
			
			
			.ScreenOnly {
				display:none
			}
			.thead {
				background-color: #ccc !important;
				-webkit-print-color-adjust: exact; 
			}
		}
		/*@page { size: F4 landscape }
		
		#content {
			display: table;
		}

		#pageFooter {
			display: table-footer-group;
		}

		#pageFooter:after {
			counter-increment: page;
			content:"Page " counter(page);
			left: 0; 
			top: 100%;
			white-space: nowrap; 
			z-index: 20px;
			-moz-border-radius: 5px; 
			-moz-box-shadow: 0px 0px 4px #222;  
			background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);  
			background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);  
		}*/
		
		@page:left{
		  @bottom-left {
			content: "Page " counter(page) " of " counter(pages);
		  }
		}
	</style>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/cetak/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/cetak/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/cetak/qrcode.js"></script>
</head>
<body>		
	<form method="post" enctype="multipart/form-data" name="frm" target="content" id="frm">
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td colspan="3" height="25" align="center" valign="top">
				<input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()">
			</td>
		</tr>
		<tr>
			<td rowspan="4" width="150px" align="right"><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="60px" /></td>
			<td height="20" align="center" valign="top" class="judul"><b><?php echo strtoupper(sippadu('nama_pemda')); ?></b></td>
			<td rowspan="4" width="150px"><div style="width:100px;"></div></td>
		</tr>
		<tr>
			<td height="20" align="center" valign="top" class="judul2"><b><?php echo strtoupper(sippadu('nama_dinas')); ?></b></td>
		</tr>
		<tr>
			<td height="20" align="center" valign="top" class="desc"><?php echo sippadu('alamat_dinas'); ?></td>
		</tr>
		<tr>
			<td height="20" align="center" valign="top" class="judul2"><b><?php echo strtoupper(sippadu('nama_kota')); ?></b></td>
		</tr>
		<tr>
			<td colspan="3" height="20" align="center" valign="top" class="judul" style="border-top: 2px black solid">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" height="20" align="center" valign="top" class="judul"><b><?php echo $title; ?></b></td>
		</tr>
		<tr>
			<td colspan="3" height="20" align="center" valign="top" class="desc">Periode <?php echo Date_Indo(TimeFormat($tgl_start,'d F Y')) .' s/d '. Date_Indo(TimeFormat($tgl_end,'d F Y')); ?></td>
		</tr>
	</table>
	<table width="1100" border="1" align="center" cellpadding="0" cellspacing="0" style="">
		<thead>
		<tr class="thead">
			<td width="3%" valign="middle" rowspan="2">No</td>
			<td width="5%" valign="middle" rowspan="2">Pendaftaran</td>
			<td width="6%" valign="middle" rowspan="2">Jenis Izin</td>
			<td width="4%" valign="middle" rowspan="2">No. Reg</td>
			<td width="11%" valign="middle" rowspan="2">Nama</td>
			<td width="16%" valign="middle" rowspan="2">Alamat</td>
			<td width="4%" valign="middle" rowspan="2">No. HP</td>
			<td width="8%" valign="middle" rowspan="2">Perusahaan /<br/>Nama Usaha</td>
			<td width="5%" valign="middle" rowspan="2">Nilai Investasi</td>
			<td width="6%" colspan="2">Tenaga Kerja</td>
			<td width="8%" valign="middle" rowspan="2">Kuasa Pengurus</td>
			<td width="7%" valign="middle" rowspan="2">Penerima Berkas</td>
			<td width="7%" valign="middle" rowspan="2">Pemroses Izin</td>
			<td width="5%" valign="middle" rowspan="2">Tgl. Selesai</td>
			<td width="5%" valign="middle" rowspan="2">Tgl. Diambil</td>
		</tr>
		<tr class="thead">
			<td>L</td>
			<td>P</td>
		</tr>
		</thead>
		<?php $i = 0; if($data->num_rows() > 0){
			foreach($data->result() as $d){ 
			echo '
			<tr class="tr">
				<td>'.++$i.'</td>
				<td>'.Date_Indo(iftimezero($d->TGL_BUAT,'-','d-m-Y H:i')).'</td>
				<td><b>'.$d->NM_IZIN.'</b>'.($d->JENIS_IZIN != '' ? '<br/>' : '').'<i>'.strtoupper(label_jenis_izin($d->JENIS_IZIN,$d->KODEJENIS)).'</i></td>
				<td>'.$d->ID_IZIN.'</td>
				<td>'.$d->NM_PELANGGAN.'</td>
				<td>'.$d->ALAMATPELANGGAN.' '.$d->NAMA_DESA.', '.$d->NAMA_KECAMATAN.', '.$d->NAMA_KOTA.', '.$d->NAMA_PROVINSI.'</td>
				<td>'.$d->NO_HP.'</td>
				<td>'.strtoupper(ifnull($d->NM_PERUSAHAAN,'')).'</td>
				<td align="right">'.fnumber($d->INVESTASI).'</td>
				<td align="center">'.fnumber($d->NAKER_L).'</td>
				<td align="center">'.fnumber($d->NAKER_P).'</td>
				<td>'.ifnull($d->NM_PENGURUS,'-').'</td>
				<td>'.ifnull($d->Nm_FO,'-').'</td>
				<td>'.ifnull($d->Nm_BO,'-').'</td>
				<td>'.Date_Indo(iftimezero($d->TGL_SELESAI,'-','d-m-Y H:i')).'</td>
				<td>'.Date_Indo(iftimezero($d->TGL_DIAMBIL,'-','d-m-Y H:i')).'</td>
			</tr>';
			}
		}
		else{
			echo '
			<tr class="tr"><td colspan="16" style="text-align:center;"><i>Tidak ada data</i></td></tr>
			';
		}
		?>
		
	</table>
	<!--<div id="content">
	  <div id="pageFooter">Page </div>
	</div>-->
	</form>
</body>
</html>
