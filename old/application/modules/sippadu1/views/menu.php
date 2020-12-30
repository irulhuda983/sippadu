		<table width="964" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="172" height="0" valign="top"></td>
				<td width="225"></td>
				<td colspan="2" valign="top"></td>
				<td width="454"></td>
				<td width="1" align="center"></td>
			</tr>
			<tr>
				<td height="3" colspan="6" valign="middle"></td>
			</tr>
			<tr>
				<td rowspan="2" valign="top" bgcolor="#0099FF" style="padding-top:2px" class="atv_menu2">&nbsp;
					<a href="<?php echo site_url(fmodule()); ?>"><img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/iduser.gif" class="atv_img1" width="25" height="25" border="0" align="absmiddle">
					&nbsp;&nbsp;<strong><?php echo $this->session->userdata('userfullname'); ?></strong></a><br>
					&nbsp;Level&nbsp;&nbsp;&nbsp;&nbsp;: User Online<br>&nbsp;Lokasi &nbsp;: <?php echo $this->input->ip_address(); ?></font><br><br>
					<table width="100%" border="0" cellspacing="0" cellpadding="3" style="color:#FFFFFF">
						<!--<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule(),'Dashboard'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>-->
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('personal/fo'),'Registrasi Pemohon'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('fo'),'Front Office'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('bo'),'Back Office'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('kabid'),'Validasi Kabid'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('kadin'),'Validasi Kadin'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('tu'),'Tata Usaha'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('cetak_sk'),'Cetak Draft'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><?php echo anchor(fmodule('serah'),'Pengambilan Draft'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="#" target="_self" style="color:#FFFFFF">Laporan</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('laporan'),'Semua Izin'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('rpt'),'Per Jenis Izin'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">Master:</td>
							<td align="center">&nbsp;</td>
						</tr>
						
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('users'),'User Manager'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('dokumen/master_jenis'),'Jenis Dokumen'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('dokumen/master_dok'),'Setting Persyaratan'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('dokumen/master_param'),'Setting Parameter'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">&nbsp;&nbsp;&raquo;&nbsp;<?php echo anchor(fmodule('setting/config'),'Setting Data Pemda'); ?></td>
							<td align="center">&nbsp;</td>
						</tr>
						<!--<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="<?php echo site_url(fmodule('fo')); ?>" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Registrasi Izin</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="
							fo_01.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Belum Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="
							fo_04.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Selesai Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<!--<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">Back Office</td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="
							fo_01.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Belum Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="padding-left:2px;">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="
							fo_04.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Selesai Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">Validasi Kabid:</td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="bo_02.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Belum Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="verifikasi_01.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Selesai Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">Validasi Kadin:</td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="bo_02.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Belum Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="verifikasi_01.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Selesai Diproses</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1">Tata Usaha:</td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="tu_02.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Siap Diserahkan</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr style="display:''">
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="tu_03.jsp" target="_self" style="color:#FFFFFF">&nbsp;&nbsp;&raquo;Izin Sudah Diserahkan</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="https://www.cognitoforms.com/RMC6/FormBantuan" target="_new" style="color:#FFFFFF">Bantuan</a></td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td style="">&nbsp;</td>
							<td style="border-bottom:1px #CCCCCC dotted;" class="atv_menu1"><a href="#" onClick="javascript: if(confirm('Anda ingin keluar?')) window.location.href='../action/signout.jsp'" target="_self" style="color:#FFFFFF">Keluar</a></td>
							<td align="center">&nbsp;</td>
						</tr>-->
					</table>
				</td>
			</tr>
			<tr>
				<td height="500" colspan="4" bgcolor="#FFFFFF" valign="top">