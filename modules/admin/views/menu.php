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
													<i class="fa fa-dashboard"></i> <span><?php echo lang('Dashboard'); ?></span>
												</a>
											</li>
											
											<?php echo GroupMenuAkses(array(20),$DataAkses,'<li class="'.menuopen('superadmin',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('superadmin')).'"><i class="fa fa-star"></i> <span>'.lang('Superadmin').'</span></a>
												<ul>
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin',$menuactive).'"><a href="'.site_url(fmodule('superadmin')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Domain').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_otorisasi',$menuactive).'"><a href="'.site_url(fmodule('superadmin/otorisasi')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Otorisasi Modul').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_mapping_modul',$menuactive).'"><a href="'.site_url(fmodule('superadmin/mapping_modul')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Mapping Modul').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_server',$menuactive).'"><a href="'.site_url(fmodule('superadmin/server')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Server Info').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_php_info',$menuactive).'"><a href="'.site_url(fmodule('superadmin/php_info')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('PHP Info').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_database',$menuactive).'"><a href="'.site_url(fmodule('superadmin/database')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Database').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_config',$menuactive).'"><a href="'.site_url(fmodule('superadmin/config')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Konfigurasi').'</span></a></li>').'
													'.MenuAkses(20,$DataAkses,'<li class="'.menuactive('superadmin_widget',$menuactive).'"><a href="'.site_url(fmodule('superadmin/widget')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Widget').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(8),$DataAkses,'<li class="'.menuopen('menu',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('menu')).'"><i class="fa fa-list"></i> <span>'.lang('Menu').'</span></a>
												<ul>
													'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('menu_add',$menuactive).'"><a href="'.site_url(fmodule('menu/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Menu').'</span></a></li>').'
													'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('menu',$menuactive).'"><a href="'.site_url(fmodule('menu')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Menu').'</span></a></li>').'
													'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('menu_kategori',$menuactive).'"><a href="'.site_url(fmodule('menu/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Bottom Menu').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php 
											$hal = '';
											if(menu_content()->num_rows() > 0){ 
												$hal .= '<li class="'.menuopen('menu_content',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('menu')).'"><i class="fa fa-file-text-o"></i> <span>'.lang('Halaman').'</span></a>';
												if(menu_content('kategori')->num_rows() > 0){
													$hal .= '<ul>';
													foreach(menu_content('kategori')->result() as $mck){
														$hal .= '<li class="'.menuopen('menu_content_'.$mck->ID_Kategori,$menuopen2).'"><a href="'.site_url(fmodule('menu/content')).'"><i class="fa fa-circle-o"></i><span class="text">'.($mck->ID_Kategori <= 2 ? lang($mck->Nm_Kategori) : lang($mck->Nm_Kategori,true)).'</span></a>';
															if(menu_content('menu',$mck->ID_Kategori)){
																$hal .= '<ul>';
																foreach(menu_content('menu',$mck->ID_Kategori)->result() as $mmck){
																	$hal .= '<li class="'.menuactive('menu_content_'.$mck->ID_Kategori.'_'.$mmck->ID_Menu,$menuactive).'"><a href="'.site_url(fmodule('menu/content/'.$mmck->ID_Menu)).'"><i class="fa fa-circle-o"></i><span class="text">'.lang($mmck->Nm_Menu,true).'</span></a></li>';
																}
																$hal .= '</ul>';
															}
														$hal .= '</li>';
													}
													$hal .= '</ul>';
												}
												$hal .= '</li>'; 
												echo GroupMenuAkses(array(8),$DataAkses,$hal); 
											} 
											?>
											
											<?php echo GroupMenuAkses(array(7),$DataAkses,'<li class="'.menuopen('berita',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('berita')).'"><i class="fa fa-file-text"></i> <span>'.lang('Berita').'</span></a>
												<ul>
													'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('berita_add',$menuactive).'"><a href="'.site_url(fmodule('berita/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Berita').'</span></a></li>').'
													'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('berita',$menuactive).'"><a href="'.site_url(fmodule('berita')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Berita').'</span></a></li>').'
													'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('berita/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Berita').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											
											<?php echo GroupMenuAkses(array(12),$DataAkses,'<li class="'.menuopen('informasi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('informasi')).'"><i class="fa fa-bullhorn"></i> <span>'.lang('Informasi').'</span></a>
												<ul>
													'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('informasi_add',$menuactive).'"><a href="'.site_url(fmodule('informasi/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Informasi').'</span></a></li>').'
													'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('informasi',$menuactive).'"><a href="'.site_url(fmodule('informasi')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Informasi').'</span></a></li>').'
													'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('informasi_kategori',$menuactive).'"><a href="'.site_url(fmodule('informasi/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Informasi').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(24),$DataAkses,'<li class="'.menuopen('agenda',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('agenda')).'"><i class="fa fa-calendar"></i> <span>'.lang('Agenda').'</span></a>
												<ul>
													'.MenuAkses(24,$DataAkses,'<li class="'.menuactive('agenda_add',$menuactive).'"><a href="'.site_url(fmodule('agenda/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Agenda').'</span></a></li>').'
													'.MenuAkses(24,$DataAkses,'<li class="'.menuactive('agenda',$menuactive).'"><a href="'.site_url(fmodule('agenda')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Agenda').'</span></a></li>').'
													'.MenuAkses(24,$DataAkses,'<li class="'.menuactive('agenda_kategori',$menuactive).'"><a href="'.site_url(fmodule('agenda/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Agenda').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											
											<?php echo GroupMenuAkses(array(9),$DataAkses,'<li class="'.menuopen('download',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('download')).'"><i class="fa fa-download"></i> <span>'.lang('Download').'</span></a>
												<ul>
													'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('download_add',$menuactive).'"><a href="'.site_url(fmodule('download/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Download').'</span></a></li>').'
													'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('download',$menuactive).'"><a href="'.site_url(fmodule('download')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Download').'</span></a></li>').'
													'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('download_kategori',$menuactive).'"><a href="'.site_url(fmodule('download/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Download').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(13),$DataAkses,'<li class="'.menuopen('gallery',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('gallery')).'"><i class="fa fa-camera"></i> <span>'.lang('Gallery').'</span></a>
												<ul>
													'.MenuAkses(13,$DataAkses,'<li class="'.menuactive('gallery_add',$menuactive).'"><a href="'.site_url(fmodule('gallery/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Gallery').'</span></a></li>').'
													'.MenuAkses(13,$DataAkses,'<li class="'.menuactive('gallery',$menuactive).'"><a href="'.site_url(fmodule('gallery')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Gallery').'</span></a></li>').'
													'.MenuAkses(13,$DataAkses,'<li class="'.menuactive('gallery_kategori',$menuactive).'"><a href="'.site_url(fmodule('gallery/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Gallery').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(26),$DataAkses,'<li class="'.menuopen('video',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('video')).'"><i class="fa fa-video-camera"></i> <span>'.lang('Video').'</span></a>
												<ul>
													'.MenuAkses(26,$DataAkses,'<li class="'.menuactive('video_add',$menuactive).'"><a href="'.site_url(fmodule('video/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Video').'</span></a></li>').'
													'.MenuAkses(26,$DataAkses,'<li class="'.menuactive('video',$menuactive).'"><a href="'.site_url(fmodule('video')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Video').'</span></a></li>').'
													'.MenuAkses(26,$DataAkses,'<li class="'.menuactive('video_kategori',$menuactive).'"><a href="'.site_url(fmodule('video/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Video').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(14),$DataAkses,'<li class="'.menuopen('slide',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('slide')).'"><i class="fa fa-file-image-o"></i> <span>'.lang('Slide').'</span></a>
												<ul>
													'.MenuAkses(14,$DataAkses,'<li class="'.menuactive('slide',$menuactive).'"><a href="'.site_url(fmodule('slide')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Slide Content').'</span></a></li>').'
													'.MenuAkses(14,$DataAkses,'<li class="'.menuactive('slidepage',$menuactive).'"><a href="'.site_url(fmodule('slide/slidepage')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Slide Page').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(22),$DataAkses,'<li class="'.menuopen('dokumen',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('dokumen')).'"><i class="fa fa-file-pdf-o"></i> <span>'.lang('Dokumen').'</span></a>
												<ul>
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('dokumen_add',$menuactive).'"><a href="'.site_url(fmodule('dokumen/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Dokumen').'</span></a></li>').'
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('dokumen',$menuactive).'"><a href="'.site_url(fmodule('dokumen')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Dokumen').'</span></a></li>').'
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('dokumen_kategori',$menuactive).'"><a href="'.site_url(fmodule('dokumen/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Dokumen').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(25),$DataAkses,'<li class="'.menuopen('project',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('project')).'"><i class="fa fa-truck"></i> <span>'.lang('Project').'</span></a>
												<ul>
													'.MenuAkses(25,$DataAkses,'<li class="'.menuactive('project_add',$menuactive).'"><a href="'.site_url(fmodule('project/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Project').'</span></a></li>').'
													'.MenuAkses(25,$DataAkses,'<li class="'.menuactive('project',$menuactive).'"><a href="'.site_url(fmodule('project')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Project').'</span></a></li>').'
													'.MenuAkses(25,$DataAkses,'<li class="'.menuactive('project_kategori',$menuactive).'"><a href="'.site_url(fmodule('project/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Project').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(17),$DataAkses,'<li class="'.menuopen('tabel',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('tabel')).'"><i class="fa fa-table"></i> <span>'.lang('Tabel').'</span></a>
												<ul>
													'.MenuAkses(17,$DataAkses,'<li class="'.menuactive('tabel_add',$menuactive).'"><a href="'.site_url(fmodule('tabel/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Tabel').'</span></a></li>').'
													'.MenuAkses(17,$DataAkses,'<li class="'.menuactive('tabel',$menuactive).'"><a href="'.site_url(fmodule('tabel')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Tabel').'</span></a></li>').'
													'.MenuAkses(17,$DataAkses,'<li class="'.menuactive('tabel_kategori',$menuactive).'"><a href="'.site_url(fmodule('tabel/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Tabel').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(16),$DataAkses,'<li class="'.menuopen('form',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('form')).'"><i class="fa fa-list"></i> <span>'.lang('Formulir').'</span></a>
												<ul>
													'.MenuAkses(16,$DataAkses,'<li class="'.menuactive('form_add',$menuactive).'"><a href="'.site_url(fmodule('form/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Formulir').'</span></a></li>').'
													'.MenuAkses(16,$DataAkses,'<li class="'.menuactive('form',$menuactive).'"><a href="'.site_url(fmodule('form')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Formulir').'</span></a></li>').'
													'.MenuAkses(16,$DataAkses,'<li class="'.menuactive('form_kategori',$menuactive).'"><a href="'.site_url(fmodule('form/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Formulir').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(15),$DataAkses,'<li class="'.menuopen('grafik',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('grafik')).'"><i class="fa fa-bar-chart-o"></i> <span>'.lang('Grafik').'</span></a>
												<ul>
													'.MenuAkses(15,$DataAkses,'<li class="'.menuactive('grafik_add',$menuactive).'"><a href="'.site_url(fmodule('grafik/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Grafik').'</span></a></li>').'
													'.MenuAkses(15,$DataAkses,'<li class="'.menuactive('grafik',$menuactive).'"><a href="'.site_url(fmodule('grafik')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Grafik').'</span></a></li>').'
													'.MenuAkses(15,$DataAkses,'<li class="'.menuactive('grafik_kategori',$menuactive).'"><a href="'.site_url(fmodule('grafik/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Grafik').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(18),$DataAkses,'<li class="'.menuopen('banner',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('banner')).'"><i class="fa fa-credit-card"></i> <span>'.lang('Banner').'</span></a>
												<ul>
													'.MenuAkses(18,$DataAkses,'<li class="'.menuactive('banner_add',$menuactive).'"><a href="'.site_url(fmodule('banner/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Banner').'</span></a></li>').'
													'.MenuAkses(18,$DataAkses,'<li class="'.menuactive('banner',$menuactive).'"><a href="'.site_url(fmodule('banner')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Banner').'</span></a></li>').'
													'.MenuAkses(18,$DataAkses,'<li class="'.menuactive('banner_kategori',$menuactive).'"><a href="'.site_url(fmodule('banner/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Banner').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(29),$DataAkses,'<li class="'.menuopen('anggota',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('anggota')).'"><i class="fa fa-graduation-cap"></i> <span>'.lang('Anggota').'</span></a>
												<ul>
													'.MenuAkses(29,$DataAkses,'<li class="'.menuactive('anggota_add',$menuactive).'"><a href="'.site_url(fmodule('anggota/add')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Tambah Anggota').'</span></a></li>').'
													'.MenuAkses(29,$DataAkses,'<li class="'.menuactive('anggota',$menuactive).'"><a href="'.site_url(fmodule('anggota')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Data Anggota').'</span></a></li>').'
													'.MenuAkses(29,$DataAkses,'<li class="'.menuactive('anggota_kategori',$menuactive).'"><a href="'.site_url(fmodule('anggota/kategori')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Kategori Anggota').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(10),$DataAkses,'<li class="'.menuopen('komentar',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('komentar')).'"><i class="fa fa-comment"></i> <span>'.lang('Komentar').'</span></a>
												<ul>
													'.MenuAkses(10,$DataAkses,'<li class="'.menuactive('komentar_pending',$menuactive).'"><a href="'.site_url(fmodule('komentar')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Pending').'</span></a></li>').'
													'.MenuAkses(10,$DataAkses,'<li class="'.menuactive('komentar_arsip',$menuactive).'"><a href="'.site_url(fmodule('komentar/arsip')).'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Arsip').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php if(0){ ?>
											<?php echo GroupMenuAkses(array(7),$DataAkses,'<li class="'.menuopen('web',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('web')).'"><i class="fa fa-globe"></i> <span>Website</span></a>
												<ul>
													'.GroupMenuAkses(array(7),$DataAkses,'<li class="'.menuopen('web_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Berita</span></a>
														<ul>
															'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('web_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('web_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(8),$DataAkses,'<li class="'.menuopen('web_menu',$menuopen2).'"><a href="'.site_url(fmodule('web/menu')).'"><i class="fa fa-circle-o"></i><span class="text">Menu</span></a>
														<ul>
															'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('web_menu',$menuactive).'"><a href="'.site_url(fmodule('web/menu')).'"><i class="fa fa-circle-o"></i><span class="text">Data Menu</span></a></li>').'
															'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('web_menu_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/menu_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Menu</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(12),$DataAkses,'<li class="'.menuopen('web_informasi',$menuopen2).'"><a href="'.site_url(fmodule('web/informasi')).'"><i class="fa fa-circle-o"></i><span class="text">Informasi</span></a>
														<ul>
															'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('web_informasi',$menuactive).'"><a href="'.site_url(fmodule('web/informasi')).'"><i class="fa fa-circle-o"></i><span class="text">Data Informasi</span></a></li>').'
															'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('web_informasi_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/informasi_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Informasi</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(9),$DataAkses,'<li class="'.menuopen('web_download',$menuopen2).'"><a href="'.site_url(fmodule('web/download')).'"><i class="fa fa-circle-o"></i><span class="text">Download</span></a>
														<ul>
															'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('web_download',$menuactive).'"><a href="'.site_url(fmodule('web/download')).'"><i class="fa fa-circle-o"></i><span class="text">Data Download</span></a></li>').'
															'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('web_download_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/download_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Download</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(14),$DataAkses,'<li class="'.menuopen('web_slide',$menuopen2).'"><a href="'.site_url(fmodule('web/slide')).'"><i class="fa fa-circle-o"></i><span class="text">Slide</span></a>
														<ul>
															'.MenuAkses(14,$DataAkses,'<li class="'.menuactive('web_slide',$menuactive).'"><a href="'.site_url(fmodule('web/slide')).'"><i class="fa fa-circle-o"></i><span class="text">Slide Content</span></a></li>').'
															'.MenuAkses(14,$DataAkses,'<li class="'.menuactive('web_slidepage',$menuactive).'"><a href="'.site_url(fmodule('web/slidepage')).'"><i class="fa fa-circle-o"></i><span class="text">Slide Page/Menu</span></a></li>').'
														</ul>
													</li>').'
													'.MenuAkses(13,$DataAkses,'<li class="'.menuactive('web_gallery',$menuactive).'"><a href="'.site_url(fmodule('web/gallery')).'"><i class="fa fa-circle-o"></i><span class="text">Gallery</span></a></li>').'
													'.MenuAkses(10,$DataAkses,'<li class="'.menuactive('web_komentar',$menuactive).'"><a href="'.site_url(fmodule('web/komentar')).'"><i class="fa fa-circle-o"></i><span class="text">Komentar</span></a></li>').'
													'.MenuAkses(15,$DataAkses,'<li class="'.menuactive('web_grafik',$menuactive).'"><a href="'.site_url(fmodule('web/grafik')).'"><i class="fa fa-circle-o"></i><span class="text">Grafik</span></a></li>').'
													'.MenuAkses(16,$DataAkses,'<li class="'.menuactive('web_form',$menuactive).'"><a href="'.site_url(fmodule('web/form')).'"><i class="fa fa-circle-o"></i><span class="text">Formulir</span></a></li>').'
													'.MenuAkses(17,$DataAkses,'<li class="'.menuactive('web_data',$menuactive).'"><a href="'.site_url(fmodule('web/data')).'"><i class="fa fa-circle-o"></i><span class="text">Data</span></a></li>').'
													'.MenuAkses(18,$DataAkses,'<li class="'.menuactive('web_banner',$menuactive).'"><a href="'.site_url(fmodule('web/banner')).'"><i class="fa fa-circle-o"></i><span class="text">Banner</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('web')).'"><i class="fa fa-desktop"></i> <span>Transparansi</span></a>
												<ul>
													'.GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">APBD</span></a>
														<ul>
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">LKPD</span></a>
														<ul>
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">SP2D</span></a>
														<ul>
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(22),$DataAkses,'<li class="'.menuopen('publikasi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('publikasi')).'"><i class="fa fa-file-text-o"></i> <span>Dokumen Publik</span></a>
												<ul>
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('publikasi',$menuactive).'"><a href="'.site_url(fmodule('publikasi')).'"><i class="fa fa-circle-o"></i><span class="text">Data Publikasi</span></a></li>').'
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('publikasi',$menuactive).'"><a href="'.site_url(fmodule('publikasi/kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Publikasi</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(23),$DataAkses,'<li class="'.menuopen('regulasi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('regulasi')).'"><i class="fa fa-gavel"></i> <span>Regulasi</span></a>
												<ul>
													'.MenuAkses(23,$DataAkses,'<li class="'.menuactive('regulasi',$menuactive).'"><a href="'.site_url(fmodule('regulasi')).'"><i class="fa fa-circle-o"></i><span class="text">Data Regulasi</span></a></li>').'
													'.MenuAkses(23,$DataAkses,'<li class="'.menuactive('regulasi',$menuactive).'"><a href="'.site_url(fmodule('regulasi/kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Regulasi</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php } ?>
											
											<?php echo GroupMenuAkses(array(27),$DataAkses,'<li class="'.menuopen('language',$menuopen).'">
												<a role="button" href="'.apps_url(2,'language').'"><i class="fa fa-globe"></i> <span>'.lang('Language').'</span></a>
												<ul>
													'.MenuAkses(27,$DataAkses,'<li class="'.menuactive('language',$menuactive).'"><a href="'.apps_url(2,'language').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Language').'</span></a></li>').'
													'.MenuAkses(27,$DataAkses,'<li class="'.menuactive('language_translate',$menuactive).'"><a href="'.apps_url(2,'language/translate').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Translate').'</span></a></li>').'
													'.MenuAkses(27,$DataAkses,'<li class="'.menuactive('language_translate_ori',$menuactive).'"><a href="'.apps_url(2,'language/translate_ori').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('System_Translate').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(1,2,3,4),$DataAkses,'<li class="'.menuopen('users',$menuopen).'">
												<a role="button" href="'.apps_url(2,'users').'"><i class="fa fa-users"></i> <span>'.lang('Users').'</span></a>
												<ul>
													'.MenuAkses(1,$DataAkses,'<li class="'.menuactive('users_akun',$menuactive).'"><a href="'.apps_url(2,'users').'"><i class="fa fa-circle-o"></i><span class="text">'.lang('User').'</span></a></li>').'
													'.MenuAkses(1,$DataAkses,'<li class="'.menuactive('users_group',$menuactive).'"><a href="'.apps_url(2,'users/group').'"><i class="fa fa-circle-o"></i><span class="text">'.lang('Group').'</span></a></li>').'
													'.MenuAkses(1,$DataAkses,'<li class="'.menuactive('users_level',$menuactive).'"><a href="'.apps_url(2,'users/level').'"><i class="fa fa-circle-o"></i><span class="text">'.lang('Level').'</span></a></li>').'
													'.MenuAkses(2,$DataAkses,'<li class="'.menuactive('users_hakaksesusers',$menuactive).'"><a href="'.apps_url(2,'users/authuser').'"><i class="fa fa-circle-o"></i><span class="text">'.lang('Hak Akses User').'</span></a></li>').'
													'.MenuAkses(4,$DataAkses,'<li class="'.menuactive('users_hakaksesgroup',$menuactive).'"><a href="'.apps_url(2,'users/authgroup').'"><i class="fa fa-circle-o"></i><span class="text">'.lang('Hak Akses Group').'</span></a></li>').' 
													'.MenuAkses(3,$DataAkses,'<li class="'.menuactive('users_hakakseslevel',$menuactive).'"><a href="'.apps_url(2,'users/authlevel').'"><i class="fa fa-circle-o"></i><span class="text">'.lang('Hak Akses Level').'</span></a></li>').' 
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(5,6),$DataAkses,'<li class="'.menuopen('akun',$menuopen).'">
												<a role="button" href="'.apps_url(2,'akun').'"><i class="fa fa-user"></i> <span>'.lang('Akun Saya').'</span></a>
												<ul>
													'.MenuAkses(5,$DataAkses,'<li class="'.menuactive('akun',$menuactive).'"><a href="'.apps_url(2,'akun').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Profil').'</span></a></li>').'
													'.MenuAkses(6,$DataAkses,'<li class="'.menuactive('akun_password',$menuactive).'"><a href="'.apps_url(2,'akun/password').'"><i class="fa fa-circle-o"></i> '.lang('Ganti Password').'</a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(19),$DataAkses,'<li class="'.menuopen('tools',$menuopen).'">
												<a role="button" href="'.apps_url(2,'tools').'"><i class="fa fa-gears"></i> <span>'.lang('Tools').'</span></a>
												<ul>
													<!--'.MenuAkses(19,$DataAkses,'<li class="'.menuactive('tools_database',$menuactive).'"><a href="'.apps_url(2,'tools/database').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Database').'</span></a></li>').'-->
													'.MenuAkses(19,$DataAkses,'<li class="'.menuactive('tools_backup',$menuactive).'"><a href="'.apps_url(2,'tools/backup').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Backup').'</span></a></li>').'
													'.MenuAkses(19,$DataAkses,'<li class="'.menuactive('tools_restore',$menuactive).'"><a href="'.apps_url(2,'tools/restore').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Restore').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(28),$DataAkses,'<li class="'.menuopen('setting',$menuopen).'">
												<a role="button" href="'.apps_url(2,'setting').'"><i class="fa fa-gear"></i> <span>'.lang('Setting').'</span></a>
												<ul>
													'.MenuAkses(28,$DataAkses,'<li class="'.menuactive('setting_config',$menuactive).'"><a href="'.apps_url(2,'setting/config').'"><i class="fa fa-circle-o"></i><span class="text"> '.lang('Konfigurasi').'</span></a></li>').'
												</ul>
											</li>'); ?>
											
												
											<li class="<?php echo menuactive('logout',$menuactive); ?>">
												<a href="<?php echo apps_url(2,'logout'); ?>">
													<i class="fa fa-sign-out"></i> <span><?php echo lang('Logout'); ?></span>
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