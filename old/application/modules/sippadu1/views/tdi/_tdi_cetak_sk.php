<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/cetak/srt.css" rel="stylesheet" type="text/css"></link>
<title>SIPPADU - System Layanan Perijinan Terpadu Bojonegoro</title>
	<style>
	@media screen {.PrintOnly {display:none}}
	@media print {.ScreenOnly {display:none}}

	.atv_layout_txt11 {
		font-size: 25px;
	}
	.atv_judul1 {
		font-size: 35px;
	}
	.atv_teks1 {
		font-size: 20px;
	}
	</style>

	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/qrcode.js"></script>
</head>
<body>
<br>
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="">
		<tr>
			<td align="center" height="25" colspan="2" valign="top"><input name="cmdcetak" type="button" class="ScreenOnly" id="cmdcetak" value="  Cetak  " onClick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
			<input name="cmdselesai" type="submit" class="ScreenOnly" id="cmdselesai" value="  Selesai  " onClick="window.close()"></td>
		</tr>
		<tr>
			<td rowspan="4"  align="center" valign="top" class=""><img src="<?php echo base_url(); ?>assets/<?php echo config('theme'); ?>/images/logo_hp.png" width="100px" /></td>
			<td height="33" colspan="1" align="center" valign="top" class="atv_layout_txt11" style="font-weight:bold;color:black;"><div align="center"><?php echo strtoupper(sippadu('nama_pemda')); ?></div></td></tr>
		<tr>
			<td height="35" colspan="1" align="center" valign="top" class="atv_layout_txt11" style="font-weight:bold;color:black;"><div align="center"><?php echo strtoupper(sippadu('nama_dinas')); ?></div></td>
		</tr>
		<tr>
			<td height="33" colspan="1" align="center" valign="top" class="atv_layout_txt11" style="color:black;"><div align="center"><?php echo sippadu('alamat_dinas'); ?></div></td>
		</tr>
		<tr>
		   <td height="33" colspan="1" align="center" valign="top" class="" style="font-size:30px;color:black;"><div align="center"><b><u><?php echo strtoupper(sippadu('nama_kota')); ?></u></b></div></td>
		</tr>
	</table>

	<br/><br/><br/>
	<?php 
	if($data->num_rows() > 0){ 
	$d = $data->row(); ?>
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;">
		<tr>
			<td height="35" colspan="5" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td height="39" colspan="5" class="atv_judul1">TANDA DAFTAR PERUSAHAAN<br>
				<?php 
				$bntk_perusahaan = $d->BNTK_PERUSAHAAN;
				switch($bntk_perusahaan){
					case '1': echo 'PERSEROAN TERBATAS'; break;
					case '2': echo 'PERSEROAN TERBATAS BELUM BERBADAN HUKUM'; break;
					case '3': echo 'PERSEKUTUAN KOMANDITER'; break;
					case '4': echo 'FIRMA'; break;
					case '5': echo 'KOPERASI'; break;
					case '6': echo 'PERUSAHAAN PERORANGAN'; break;
					case '7': echo 'BENTUK PERUSAHAAN LAINNYA'; break;
					default: echo ''; break;
				}
				?>
			</td>
		</tr>
		<tr>
			<td height="63" colspan="5" class="atv_teks1" style="text-align:center;">
				<?php echo format_parameter(2,11); ?>
				<?php if($bntk_perusahaan == 1) {echo format_parameter(2,12);} ?>
		</tr>
		<tr>
			<td height="22" colspan="5" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="30%" align="center" valign="top" class="atv_teks1" style="border-top:1px solid #000000; border-left:1px solid #000000; border-bottom:1px solid #000000">NOMOR TDI<br>
			<b><?php echo $d->NO_SK; ?></b>
			</td>
			<td align="center" width="30%" valign="top" class="atv_teks1" style="border-top:1px solid #000000; border-left:1px solid #000000;border-right:1px solid #000000 ; border-bottom:1px solid #000000">BERLAKU S/D TANGGAL<br>
			<b><?php echo strtoupper(Date_Indo(TimeFormat($d->TGL_SKA,'d F Y'))); ?></b></td>
			<td width="20%" valign="top" class="atv_teks1" style="border-top:1px solid #fff;  border-right:1px solid #000000"></td>
			<td width="10%" align="center" valign="middle" class="atv_teks1" style="border-top:1px solid #000000; border-bottom:1px solid #000000;border-right:1px solid #000000">
			<b><?php if($d->DAFTAR_ULANG >= 10 and $d->DAFTAR_ULANG > 0) {echo substr($d->DAFTAR_ULANG,0,1);} else if($d->DAFTAR_ULANG > 0) {echo '0';} else {echo '-';} ?></b></td>
			<td width="10%" align="center" valign="middle" class="atv_teks1" style="border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000">
			<b><?php if($d->DAFTAR_ULANG) {echo substr($d->DAFTAR_ULANG,-1);} else {echo '-';} ?></b></td>
		</tr>
		<tr>
			<td height="20" colspan="5" valign="top">&nbsp;</td>
		</tr>
	</table>
        
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="color:black;">
		<tr>
            <td colspan="2" height="20" width="30%" align="left" valign="top" class="atv_teks1" style="border-top:1px solid #000000; border-left:1px solid #000000;border-right:1px solid #000000 ; ">AGENDA PENDAFTARAN</td>
        </tr>
        <tr>
            <td height="20" width="60%" align="left" valign="top" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">
			NOMOR: <?php echo ifnull($d->NO_AGENDA,'-'); ?></td>
            <td align="center" width="40%" valign="top" class="atv_teks1" style="border-right:1px solid #000000 ; border-bottom:1px solid #000000">TANGGAL: <?php echo ifnull(strtoupper(Date_Indo(TimeFormat($d->TGL_AGENDA,'d F Y'))),'-'); ?></td>
        </tr>
	</table>
	
		<br/>
		<table width="1100" border="0" align="center" cellpadding="8" cellspacing="0">
          <tr>
            <td width="310" height="45" valign="middle" class="atv_teks1" style="border-top:1px solid #000000; border-left:1px solid #000000; border-bottom:1px solid #000000">NAMA PERUSAHAAN</td>
            <td width="12" align="center" valign="middle" class="atv_teks1" style="border-top:1px solid #000000; border-bottom:1px solid #000000">:</td>
            <td valign="middle" class="atv_teks1" style="border-top:1px solid #000000; border-bottom:1px solid #000000;border-right:1px solid #000000;font-size:25px; "><strong><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'nama')); ?>
            </strong></td>
          </tr>
		  <tr>
            <td width="" height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">STATUS</td>
            <td width="" align="center" valign="middle" class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
            <td valign="middle" class="atv_teks1" style="border-bottom:1px solid #000000;border-right:1px solid #000000; "><?php echo strtoupper(status_kantor($d->STATUS_PERUSAHAAN)); ?></td>
          </tr>
		  <tr>
            <td height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">ALAMAT PERUSAHAAN</td>
            <td valign="middle" align="center" class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
            <td valign="middle" align="justify" class="atv_teks1" style="border-right:1px solid #000000; border-bottom:1px solid #000000">
			<?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'alamat')); ?>
			<?php echo desa(perusahaan($d->IDPERUSAHAAN,'desa')); ?>, <?php echo kecamatan(perusahaan($d->IDPERUSAHAAN,'kecamatan')); ?>, <?php echo kota(perusahaan($d->IDPERUSAHAAN,'kota')); ?>, <?php echo provinsi(perusahaan($d->IDPERUSAHAAN,'provinsi')); ?></td>
          </tr>
		  <tr>
            <td height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">NPWP</td>
            <td valign="middle" align="center" class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
            <td valign="middle" class="atv_teks1" style="border-right:1px solid #000000; border-bottom:1px solid #000000"><?php echo perusahaan($d->IDPERUSAHAAN,'npwp'); ?></td>
          </tr>
		  <tr>
            <td height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">NOMOR TELEPON</td>
            <td valign="middle" align="center" class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
            <td valign="middle" class="atv_teks1" style="border-bottom:1px solid #000000;border-right:1px solid #000000; "><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'telepon')); ?></td>
	      </tr>
		  <tr>
            <td height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">PENANGGUNG JAWAB / PENGURUS</td>
            <td valign="middle" align="center" class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
            <td valign="middle" class="atv_teks1" style="border-right:1px solid #000000; border-bottom:1px solid #000000"><strong><?php echo strtoupper(pelanggan($d->IDPELANGGAN,'nama')); ?></strong></td>
          </tr>
		  <tr>
            <td height="45" valign="top" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">KEGIATAN USAHA POKOK<br>
            KBLI : <?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'kbli')); ?><br/></td>
            <td valign="top" align="center" class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
            <td valign="top" align="justify" class="atv_teks1" style="border-bottom:1px solid #000000;border-right:1px solid #000000;"><font style="font-size:20px"><?php echo strtoupper(perusahaan($d->IDPERUSAHAAN,'usaha_pokok')); ?><br/><br/></font></td>
          </tr>
		  
        </table>
		
		<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
            <td colspan="6" height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-right:1px solid #000000; "><u>PENGESAHAN MENTERI KEHAKIMAN : </u></td>
          </tr>
		  <tr height="20" valign="middle">
			<td width="100px" class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">NOMOR</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
			<td width="600px" class="atv_teks1" style="border-bottom:1px solid #000000"><?php echo ifnull($d->NO_KEHAKIMAN,'-'); ?></td>
			<td width="100px" class="atv_teks1" style="border-bottom:1px solid #000000">TANGGAL</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
			<td class="atv_teks1" style="border-right:1px solid #000000; border-bottom:1px solid #000000"><?php echo ifnull(strtoupper(Date_Indo(TimeFormat($d->TGL_KEHAKIMAN,'d F Y'))),'-'); ?></td>
          </tr>
		   <tr>
            <td colspan="6" height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-right:1px solid #000000; "><u>PERUBAHAN MENTERI KEHAKIMAN ATAS AKTA PERUBAHAN ANGGARAN DASAR : </u></td>
          </tr>
		  <tr height="20" valign="middle">
			<td class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">NOMOR</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">-</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">TANGGAL</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
			<td class="atv_teks1" style="border-right:1px solid #000000; border-bottom:1px solid #000000">-</td>
          </tr>
		   <tr>
            <td colspan="6" height="45" valign="middle" class="atv_teks1" style="border-left:1px solid #000000; border-right:1px solid #000000; "><u>PERUBAHAN LAPORAN PERUBAHAN ANGGARAN DASAR : </u></td>
          </tr>
		  <tr height="20" valign="middle">
			<td class="atv_teks1" style="border-left:1px solid #000000; border-bottom:1px solid #000000">NOMOR</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">-</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">TANGGAL</td>
			<td class="atv_teks1" style="border-bottom:1px solid #000000">:</td>
			<td class="atv_teks1" style="border-right:1px solid #000000; border-bottom:1px solid #000000">-</td>
          </tr>
        </table>
		<br/>
		<table width="1100" border="0" align="center" cellpadding="10" cellspacing="0" style="font-size:12px;">
			<tr>
				<td height="27" valign="middle">&nbsp;</td>
				<td height="27" valign="middle">&nbsp;</td>
				<td colspan="1" align="center" valign="top" class="atv_teks1"><?php echo strtoupper(sippadu('nama_kota')); ?>, <?php echo strtoupper(Date_Indo(TimeFormat($d->TGL_SK,'d F Y'))); ?></td>
			</tr>
			<tr>
				<td width="15%" height="215" align="left" colspan="1" valign="top" class="atv_teks1" style="padding-top:15px;">
					<div id="qrcodeCanvas"></div>
					
					<script>	
					jQuery('#qrcodeCanvas').qrcode({
						text	: "<?php echo $d->NO_SK; ?>"
					});
					</script>	
				</td>
				<td width="" align="left" colspan="1" valign="top" class="atv_teks1" style="padding-top:15px;"></td>
				<td width="410" colspan="1" align="center" valign="top" class="atv_teks1">
					<b>KEPALA <?php echo sippadu('nama_dinas'); ?><br/><?php echo strtoupper(sippadu('nama_kota2')); ?></b><br>
					<div style="width:320px;height:135px;"></div>
					<b><u><?php echo sippadu('nama_kadin'); ?></u></b><br>
					<?php echo sippadu('pangkat_kadin'); ?><br>
					NIP.&nbsp;<?php echo sippadu('nip_kadin'); ?>
					
				</td>
			</tr>
		</table>
	<?php } ?>
</body>
</html>
