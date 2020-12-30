<table width="964" align="center" border="0" style="border-radius:5px; box-shadow: 0 0 3px rgba(0, 0, 0, .3);" cellpadding="0" cellspacing="0">
	<tr>
		<td width="569" rowspan="2" valign="top">
			<img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/anilogo.png" width="60" height="63"/>
			<img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/header.png"/>
		</td>
		<td width="395" height="39" align="right" valign="middle"class="style15">&nbsp;</td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">&nbsp;</td>
	</tr>
	<tr>
		<td height="21" align="left" valign="top" bgcolor="#0075BD" class="style11">&nbsp;
			<a href="<?php echo site_url(fmodule()); ?>">Dashboard</a> | 
			<!--<?php echo anchor(fmodule('users'),'User Manager'); ?> |-->
			<?php echo anchor(fmodule('logout'),'Keluar'); ?>
		</td>
		<td align="right" valign="top" bgcolor="#0075BD" class="style11">Tanggal: <?php echo Date_Indo(TimeNow('d F Y')); ?>&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td height="5" colspan="2" valign="top" bgcolor="#666666"></td>
	</tr>
</table>