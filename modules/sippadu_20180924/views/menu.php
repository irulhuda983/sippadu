			<div id="controls">
                <aside id="sidebar">
                    <div id="sidebar-wrap">
                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <!--<div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>-->
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <ul id="navigation">
                                            <!--<li class="active"><a href="index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>-->
											
											<li class="<?php echo menuactive('dashboard',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule()); ?>">
													<i class="fa fa-dashboard"></i> <span>Dashboard</span>
												</a>
											</li>
											
											
											<?php echo GroupMenuAkses(array(40),$DataAkses,'<li class="'.menuopen('personal',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('personal')).'"><i class="fa fa-male"></i> <span>Personal</span></a>
												<ul>
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo_add',$menuactive).'"><a href="'.site_url(fmodule('personal/fo_add')).'"><i class="fa fa-circle-o"></i><span class="text">Tambah Data Personal</span></a></li>').'
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo',$menuactive).'"><a href="'.site_url(fmodule('personal/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Data Personal</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(50,60,70,80,90,100,110,120,130,140),$DataAkses,'<li class="'.menuopen('fo',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/fo')).'"><i class="fa fa-desktop"></i> <span>Front Office</span> <span class="ntf_subtotal_fo"></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(51,61,71,81,91,101,111,121,131,141),$DataAkses,'<li class="'.menuopen('bo',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/bo')).'"><i class="fa fa-tasks"></i> <span>Back Office</span> <span class="ntf_subtotal_bo"></span></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(52,62,72,82,92,102,112,122,132,142),$DataAkses,'<li class="'.menuopen('kabid',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/kabid')).'"><i class="fa fa-check-square-o"></i> <span>Validasi Kabid</span> <span class="ntf_subtotal_kabid"></span></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(53,63,73,83,93,103,113,123,133,143),$DataAkses,'<li class="'.menuopen('kadin',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/kadin')).'"><i class="fa fa-check"></i> <span>Validasi Kadin</span> <span class="ntf_subtotal_kadin"></span></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(54,64,74,84,94,104,114,124,134,144),$DataAkses,'<li class="'.menuopen('tu',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/tu')).'"><i class="fa fa-legal"></i> <span>Verifikasi Tata Usaha</span> <span class="ntf_subtotal_tu"></span></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(55,65,75,85,95,105,115,125,135,144),$DataAkses,'<li class="'.menuopen('cetak',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/cetak')).'"><i class="fa fa-print"></i> <span>Cetak</span> <span class="ntf_subtotal_cetak"></span></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(56,66,76,86,96,106,116,126,136,146),$DataAkses,'<li class="'.menuopen('serah',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('sippadu/serah')).'"><i class="fa fa-male"></i> <span>Pengambilan</span> <span class="ntf_subtotal_serah"></span></a></li>'); ?>
											
											<?php echo GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuopen('laporan',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('lap_izin')).'"><i class="fa fa-file-o"></i> <span>Laporan</span></a>
												<ul>
													'.GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuactive('rekap_laporan',$menuactive).'"><a href="'.site_url(fmodule('laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Laporan Semua Izin</span></a></li>').'
													'.GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuactive('rekap_laporan_izin',$menuactive).'"><a href="'.site_url(fmodule('sippadu/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Laporan Per Izin</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(30,31,32,34),$DataAkses,'<li class="'.menuopen('master',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('master')).'"><i class="fa fa-puzzle-piece"></i> <span>Master</span></a>
												<ul>
													'.MenuAkses(32,$DataAkses,'<li class="'.menuactive('dokumen_master_parameter',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_param')).'"><i class="fa fa-circle-o"></i><span class="text">Setting Parameter</span></a></li>').'
													'.MenuAkses(31,$DataAkses,'<li class="'.menuactive('dokumen_master_dok',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_dok')).'"><i class="fa fa-circle-o"></i><span class="text">Dokumen Persyaratan</span></a></li>').'
													'.MenuAkses(30,$DataAkses,'<li class="'.menuactive('dokumen_master_jenis',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_jenis')).'"><i class="fa fa-circle-o"></i><span class="text">Jenis Dokumen</span></a></li>').'
													'.MenuAkses(34,$DataAkses,'<li class="'.menuactive('master_region',$menuactive).'"><a href="'.site_url(fmodule('master')).'"><i class="fa fa-circle-o"></i><span class="text">Wilayah/Sub Wilayah</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(33,35),$DataAkses,'<li class="'.menuopen('setting',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('setting')).'"><i class="fa fa-cog"></i> <span>Setting</span></a>
												<ul>
													'.MenuAkses(35,$DataAkses,'<li class="'.menuactive('setting_mod_izin',$menuactive).'"><a href="'.site_url(fmodule('setting/mod_izin')).'"><i class="fa fa-circle-o"></i><span class="text">Modul Izin</span></a></li>').'
													'.MenuAkses(33,$DataAkses,'<li class="'.menuactive('setting_config',$menuactive).'"><a href="'.site_url(fmodule('setting/config')).'"><i class="fa fa-circle-o"></i><span class="text">Konfigurasi Data</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php if(0){ ?>
											<?php echo GroupMenuAkses(array(1,2,3,4),$DataAkses,'<li class="'.menuopen('users',$menuopen).'">
												<a role="button" href="'.apps_url(2,'users').'"><i class="fa fa-users"></i> <span>Users</span></a>
												<ul>
													'.MenuAkses(1,$DataAkses,'<li class="'.menuactive('users_akun',$menuactive).'"><a href="'.apps_url(2,'users').'"><i class="fa fa-circle-o"></i><span class="text">Akun User</span></a></li>').'
													'.MenuAkses(2,$DataAkses,'<li class="'.menuactive('users_hakaksesusers',$menuactive).'"><a href="'.apps_url(2,'users/authuser').'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses User</span></a></li>').'
													'.MenuAkses(3,$DataAkses,'<li class="'.menuactive('users_hakakseslevel',$menuactive).'"><a href="'.apps_url(2,'users/authlevel').'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses Level</span></a></li>').' 
													'.MenuAkses(4,$DataAkses,'<li class="'.menuactive('users_hakaksesgroup',$menuactive).'"><a href="'.apps_url(2,'users/authgroup').'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses Group</span></a></li>').' 
												</ul>
											</li>'); ?>
											<?php } ?>
											
											<?php echo GroupMenuAkses(array(5,6),$DataAkses,'<li class="'.menuopen('akun',$menuopen).'">
												<a role="button" href="'.apps_url(2,'akun').'"><i class="fa fa-user"></i> <span>Akun Saya</span></a>
												<ul>
													'.MenuAkses(5,$DataAkses,'<li class="'.menuactive('akun',$menuactive).'"><a href="'.apps_url(2,'akun').'"><i class="fa fa-circle-o"></i><span class="text"> Profil</span></a></li>').'
													'.MenuAkses(6,$DataAkses,'<li class="'.menuactive('akun_password',$menuactive).'"><a href="'.apps_url(2,'akun/password').'"><i class="fa fa-circle-o"></i> Ganti Password</a></li>').'
												</ul>
											</li>'); ?>
											
											<li class="<?php echo menuactive('logout',$menuactive); ?>">
												<a href="<?php echo apps_url(2,'logout'); ?>">
													<i class="fa fa-sign-out"></i> <span>Logout</span>
												</a>
											</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </aside>
                
				<?php $this->load->view('chats'); ?>
            </div>
            <!--/ CONTROLS Content -->