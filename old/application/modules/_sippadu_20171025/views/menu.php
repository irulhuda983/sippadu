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
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(40),$DataAkses,'<li class="'.menuopen('personal',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('personal')).'"><i class="fa fa-male"></i> <span>Personal</span></a>
												<ul>
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo_add',$menuactive).'"><a href="'.site_url(fmodule('personal/fo_add')).'"><i class="fa fa-circle-o"></i><span class="text">Tambah Data Personal</span></a></li>').'
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo',$menuactive).'"><a href="'.site_url(fmodule('personal/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Data Personal</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(50,60,70,80,90,100,110,120,130,140),$DataAkses,'<li class="'.menuopen('fo',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('fo')).'"><i class="fa fa-desktop"></i> <span>Front Office</span> <!--<span class="ntf_subtotal_fo"></span>--></a>
												<!--<ul>
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo',$menuactive).'"><a href="'.site_url(fmodule('personal/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Data Personal</span></a></li>').'
													'.MenuAkses(50,$DataAkses,'<li class="'.menuactive('siup_fo',$menuactive).'"><a href="'.site_url(fmodule('siup/fo')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(60,$DataAkses,'<li class="'.menuactive('tdp_fo',$menuactive).'"><a href="'.site_url(fmodule('tdp/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(80,$DataAkses,'<li class="'.menuactive('imb_fo',$menuactive).'"><a href="'.site_url(fmodule('imb/fo')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(90,$DataAkses,'<li class="'.menuactive('ho_fo',$menuactive).'"><a href="'.site_url(fmodule('ho/fo')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(100,$DataAkses,'<li class="'.menuactive('iujk_fo',$menuactive).'"><a href="'.site_url(fmodule('iujk/fo')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(130,$DataAkses,'<li class="'.menuactive('tdg_fo',$menuactive).'"><a href="'.site_url(fmodule('tdg/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(140,$DataAkses,'<li class="'.menuactive('tdi_fo',$menuactive).'"><a href="'.site_url(fmodule('tdi/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(70,$DataAkses,'<li class="'.menuactive('reklame_fo',$menuactive).'"><a href="'.site_url(fmodule('reklame/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(120,$DataAkses,'<li class="'.menuactive('itkesehatan_fo',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(110,$DataAkses,'<li class="'.menuactive('tdup_fo',$menuactive).'"><a href="'.site_url(fmodule('tdup/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(51,61,71,81,91,101,111,121,131,141),$DataAkses,'<li class="'.menuopen('bo',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('bo')).'"><i class="fa fa-tasks"></i> <span>Back Office</span> <span class="ntf_subtotal_bo"></span></a>
												<!--<ul>
													'.MenuAkses(51,$DataAkses,'<li class="'.menuactive('siup_bo',$menuactive).'"><a href="'.site_url(fmodule('siup/bo')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(61,$DataAkses,'<li class="'.menuactive('tdp_bo',$menuactive).'"><a href="'.site_url(fmodule('tdp/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(81,$DataAkses,'<li class="'.menuactive('imb_bo',$menuactive).'"><a href="'.site_url(fmodule('imb/bo')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(91,$DataAkses,'<li class="'.menuactive('ho_bo',$menuactive).'"><a href="'.site_url(fmodule('ho/bo')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(101,$DataAkses,'<li class="'.menuactive('iujk_bo',$menuactive).'"><a href="'.site_url(fmodule('iujk/bo')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(131,$DataAkses,'<li class="'.menuactive('tdg_bo',$menuactive).'"><a href="'.site_url(fmodule('tdg/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(141,$DataAkses,'<li class="'.menuactive('tdi_bo',$menuactive).'"><a href="'.site_url(fmodule('tdi/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(71,$DataAkses,'<li class="'.menuactive('reklame_bo',$menuactive).'"><a href="'.site_url(fmodule('reklame/bo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(121,$DataAkses,'<li class="'.menuactive('itkesehatan_bo',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/bo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(111,$DataAkses,'<li class="'.menuactive('tdup_bo',$menuactive).'"><a href="'.site_url(fmodule('tdup/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(52,62,72,82,92,102,112,122,132,142),$DataAkses,'<li class="'.menuopen('kabid',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('kabid')).'"><i class="fa fa-check-square-o"></i> <span>Kabid</span> <span class="ntf_subtotal_kabid"></span></a>
												<!--<ul>
													'.MenuAkses(52,$DataAkses,'<li class="'.menuactive('siup_kabid',$menuactive).'"><a href="'.site_url(fmodule('siup/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(62,$DataAkses,'<li class="'.menuactive('tdp_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdp/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(82,$DataAkses,'<li class="'.menuactive('imb_kabid',$menuactive).'"><a href="'.site_url(fmodule('imb/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(92,$DataAkses,'<li class="'.menuactive('ho_kabid',$menuactive).'"><a href="'.site_url(fmodule('ho/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(102,$DataAkses,'<li class="'.menuactive('iujk_kabid',$menuactive).'"><a href="'.site_url(fmodule('iujk/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(132,$DataAkses,'<li class="'.menuactive('tdg_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdg/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(142,$DataAkses,'<li class="'.menuactive('tdi_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdi/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(72,$DataAkses,'<li class="'.menuactive('reklame_kabid',$menuactive).'"><a href="'.site_url(fmodule('reklame/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(122,$DataAkses,'<li class="'.menuactive('itkesehatan_kabid',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(112,$DataAkses,'<li class="'.menuactive('tdup_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdup/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(53,63,73,83,93,103,113,123,133,143),$DataAkses,'<li class="'.menuopen('kadin',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('kadin')).'"><i class="fa fa-check"></i> <span>Kadin</span> <span class="ntf_subtotal_kadin"></span></a>
												<!--<ul>
													'.MenuAkses(53,$DataAkses,'<li class="'.menuactive('siup_kadin',$menuactive).'"><a href="'.site_url(fmodule('siup/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(63,$DataAkses,'<li class="'.menuactive('tdp_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdp/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(83,$DataAkses,'<li class="'.menuactive('imb_kadin',$menuactive).'"><a href="'.site_url(fmodule('imb/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(93,$DataAkses,'<li class="'.menuactive('ho_kadin',$menuactive).'"><a href="'.site_url(fmodule('ho/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(103,$DataAkses,'<li class="'.menuactive('iujk_kadin',$menuactive).'"><a href="'.site_url(fmodule('iujk/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(133,$DataAkses,'<li class="'.menuactive('tdg_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdg/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(143,$DataAkses,'<li class="'.menuactive('tdi_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdi/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(73,$DataAkses,'<li class="'.menuactive('reklame_kadin',$menuactive).'"><a href="'.site_url(fmodule('reklame/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(123,$DataAkses,'<li class="'.menuactive('itkesehatan_kadin',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(113,$DataAkses,'<li class="'.menuactive('tdup_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdup/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(54,64,74,84,94,104,114,124,134,144),$DataAkses,'<li class="'.menuopen('tu',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('tu')).'"><i class="fa fa-legal"></i> <span>Tata Usaha</span> <span class="ntf_subtotal_tu"></span></a>
												<!--<ul>
													'.MenuAkses(54,$DataAkses,'<li class="'.menuactive('siup_tu',$menuactive).'"><a href="'.site_url(fmodule('siup/tu')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(64,$DataAkses,'<li class="'.menuactive('tdp_tu',$menuactive).'"><a href="'.site_url(fmodule('tdp/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(84,$DataAkses,'<li class="'.menuactive('imb_tu',$menuactive).'"><a href="'.site_url(fmodule('imb/tu')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(94,$DataAkses,'<li class="'.menuactive('ho_tu',$menuactive).'"><a href="'.site_url(fmodule('ho/tu')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(104,$DataAkses,'<li class="'.menuactive('iujk_tu',$menuactive).'"><a href="'.site_url(fmodule('iujk/tu')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(134,$DataAkses,'<li class="'.menuactive('tdg_tu',$menuactive).'"><a href="'.site_url(fmodule('tdg/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(144,$DataAkses,'<li class="'.menuactive('tdi_tu',$menuactive).'"><a href="'.site_url(fmodule('tdi/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(74,$DataAkses,'<li class="'.menuactive('reklame_tu',$menuactive).'"><a href="'.site_url(fmodule('reklame/tu')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(124,$DataAkses,'<li class="'.menuactive('itkesehatan_tu',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/tu')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(114,$DataAkses,'<li class="'.menuactive('tdup_tu',$menuactive).'"><a href="'.site_url(fmodule('tdup/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(55,65,75,85,95,105,115,125,135,144),$DataAkses,'<li class="'.menuopen('cetak',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('cetak_sk')).'"><i class="fa fa-print"></i> <span>Cetak</span> <span class="ntf_subtotal_cetak"></span></a>
												<!--<ul>
													'.MenuAkses(55,$DataAkses,'<li class="'.menuactive('siup_cetak',$menuactive).'"><a href="'.site_url(fmodule('siup/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(65,$DataAkses,'<li class="'.menuactive('tdp_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdp/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(85,$DataAkses,'<li class="'.menuactive('imb_cetak',$menuactive).'"><a href="'.site_url(fmodule('imb/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(95,$DataAkses,'<li class="'.menuactive('ho_cetak',$menuactive).'"><a href="'.site_url(fmodule('ho/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(105,$DataAkses,'<li class="'.menuactive('iujk_cetak',$menuactive).'"><a href="'.site_url(fmodule('iujk/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(135,$DataAkses,'<li class="'.menuactive('tdg_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdg/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(145,$DataAkses,'<li class="'.menuactive('tdi_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdi/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(75,$DataAkses,'<li class="'.menuactive('reklame_cetak',$menuactive).'"><a href="'.site_url(fmodule('reklame/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(125,$DataAkses,'<li class="'.menuactive('itkesehatan_cetak',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(115,$DataAkses,'<li class="'.menuactive('tdup_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdup/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(56,66,76,86,96,106,116,126,136,146),$DataAkses,'<li class="'.menuopen('serah',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('serah')).'"><i class="fa fa-male"></i> <span>Pengambilan</span> <span class="ntf_subtotal_serah"></span></a>
												<!--<ul>
													'.MenuAkses(56,$DataAkses,'<li class="'.menuactive('siup_serah',$menuactive).'"><a href="'.site_url(fmodule('siup/serah')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(66,$DataAkses,'<li class="'.menuactive('tdp_serah',$menuactive).'"><a href="'.site_url(fmodule('tdp/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(86,$DataAkses,'<li class="'.menuactive('imb_serah',$menuactive).'"><a href="'.site_url(fmodule('imb/serah')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(96,$DataAkses,'<li class="'.menuactive('ho_serah',$menuactive).'"><a href="'.site_url(fmodule('ho/serah')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(106,$DataAkses,'<li class="'.menuactive('iujk_serah',$menuactive).'"><a href="'.site_url(fmodule('iujk/serah')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(136,$DataAkses,'<li class="'.menuactive('tdg_serah',$menuactive).'"><a href="'.site_url(fmodule('tdg/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(146,$DataAkses,'<li class="'.menuactive('tdi_serah',$menuactive).'"><a href="'.site_url(fmodule('tdi/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(76,$DataAkses,'<li class="'.menuactive('reklame_serah',$menuactive).'"><a href="'.site_url(fmodule('reklame/serah')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(126,$DataAkses,'<li class="'.menuactive('itkesehatan_serah',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/serah')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(116,$DataAkses,'<li class="'.menuactive('tdup_serah',$menuactive).'"><a href="'.site_url(fmodule('tdup/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuopen('laporan',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('lap_izin')).'"><i class="fa fa-file-o"></i> <span>Laporan</span></a>
												<ul>
													'.GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuactive('rekap_laporan',$menuactive).'"><a href="'.site_url(fmodule('laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Laporan Semua Izin</span></a></li>').'
													'.GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuactive('laporan',$menuactive).'"><a href="'.site_url(fmodule('lap_izin')).'"><i class="fa fa-circle-o"></i><span class="text">Laporan Per Izin</span></a></li>').'
													<!--'.MenuAkses(67,$DataAkses,'<li class="'.menuactive('tdp_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdp/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(87,$DataAkses,'<li class="'.menuactive('imb_laporan',$menuactive).'"><a href="'.site_url(fmodule('imb/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(97,$DataAkses,'<li class="'.menuactive('ho_laporan',$menuactive).'"><a href="'.site_url(fmodule('ho/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(107,$DataAkses,'<li class="'.menuactive('iujk_laporan',$menuactive).'"><a href="'.site_url(fmodule('iujk/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(137,$DataAkses,'<li class="'.menuactive('tdg_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdg/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(147,$DataAkses,'<li class="'.menuactive('tdi_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdi/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(77,$DataAkses,'<li class="'.menuactive('reklame_laporan',$menuactive).'"><a href="'.site_url(fmodule('reklame/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(127,$DataAkses,'<li class="'.menuactive('itkesehatan_laporan',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(117,$DataAkses,'<li class="'.menuactive('tdup_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdup/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'-->
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(30),$DataAkses,'<li class="'.menuopen('master',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('master')).'"><i class="fa fa-puzzle-piece"></i> <span>Master</span></a>
												<ul>
													'.MenuAkses(32,$DataAkses,'<li class="'.menuactive('dokumen_master_parameter',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_param')).'"><i class="fa fa-circle-o"></i><span class="text">Setting Parameter</span></a></li>').'
													'.MenuAkses(31,$DataAkses,'<li class="'.menuactive('dokumen_master_dok',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_dok')).'"><i class="fa fa-circle-o"></i><span class="text">Dokumen Persyaratan</span></a></li>').'
													'.MenuAkses(30,$DataAkses,'<li class="'.menuactive('dokumen_master_jenis',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_jenis')).'"><i class="fa fa-circle-o"></i><span class="text">Jenis Dokumen</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(33),$DataAkses,'<li class="'.menuopen('setting',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('setting')).'"><i class="fa fa-cog"></i> <span>Setting</span></a>
												<ul>
													'.MenuAkses(33,$DataAkses,'<li class="'.menuactive('setting_config',$menuactive).'"><a href="'.site_url(fmodule('setting/config')).'"><i class="fa fa-circle-o"></i><span class="text">Konfigurasi Data</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(1,2,3,4),$DataAkses,'<li class="'.menuopen('users',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('users')).'"><i class="fa fa-users"></i> <span>Users</span></a>
												<ul>
													'.MenuAkses(1,$DataAkses,'<li class="'.menuactive('users_akun',$menuactive).'"><a href="'.site_url(fmodule('users')).'"><i class="fa fa-circle-o"></i><span class="text">Akun User</span></a></li>').'
													'.MenuAkses(2,$DataAkses,'<li class="'.menuactive('users_hakaksesusers',$menuactive).'"><a href="'.site_url(fmodule('users/authuser')).'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses User</span></a></li>').'
													'.MenuAkses(3,$DataAkses,'<li class="'.menuactive('users_hakakseslevel',$menuactive).'"><a href="'.site_url(fmodule('users/authlevel')).'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses Level</span></a></li>').' 
													'.MenuAkses(4,$DataAkses,'<li class="'.menuactive('users_hakaksesgroup',$menuactive).'"><a href="'.site_url(fmodule('users/authgroup')).'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses Group</span></a></li>').' 
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(5,6),$DataAkses,'<li class="'.menuopen('akun',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('akun')).'"><i class="fa fa-user"></i> <span>Akun Saya</span></a>
													<ul>
														'.MenuAkses(5,$DataAkses,'<li class="'.menuactive('akun',$menuactive).'"><a href="'.site_url(fmodule('akun')).'"><i class="fa fa-circle-o"></i><span class="text"> Profil</span></a></li>').'
														'.MenuAkses(6,$DataAkses,'<li class="'.menuactive('akun_password',$menuactive).'"><a href="'.site_url(fmodule('akun/password')).'"><i class="fa fa-circle-o"></i> Ganti Password</a></li>').'
													</ul>
												</li>'); ?>
											
											<li class="<?php echo menuactive('logout',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule('logout')); ?>">
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
                
				<?php echo $this->load->view('chats'); ?>
            </div>
            <!--/ CONTROLS Content -->