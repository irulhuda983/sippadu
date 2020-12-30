<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
    </head>
    <body>
		<?php $this->load->view('top'); ?>
		<?php $this->load->view('menu'); ?>
		
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20" colspan="8" valign="top" class="path1" bgcolor="#666666">&nbsp;Home</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td width="4" height="38" align="center" valign="top">&nbsp;</td>
				<td colspan="7" align="justify" valign="top" bgcolor="#FFFFFF" class="atv_txt1"><br><center><b>Selamat Datang di SIPPADU - System Layanan Perijinan Terpadu Bojonegoro</b></center></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td height="19" align="center" valign="top">&nbsp;</td>
				<td colspan="7" align="center" valign="top" style="color:#FFFFFF">&nbsp;</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td colspan="2" rowspan="2" valign="top">&nbsp;</td>
				<td width="246" height="22" align="center" valign="middle">&nbsp;</td>
				<td width="10">&nbsp;</td>
				<td width="252" bgcolor="#FFFFFF" align="center" valign="middle" >&nbsp;</td>
				<td width="11">&nbsp;</td>
				<td width="248" align="center" bgcolor="#FFFFFF" valign="middle" >&nbsp;</td>
				<td width="10">&nbsp;</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td height="131" valign="top" >&nbsp;</td>
				<td>&nbsp;</td>
				<td valign="middle" align="center" ><img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/logo.png" width="120" height="120"></td>
				<td>&nbsp;</td>
				<td valign="top" >&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		
		<?php $this->load->view('footer'); ?>
