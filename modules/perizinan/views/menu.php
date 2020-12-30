			<div id="controls">
                <aside id="sidebar">
                    <div id="sidebar-wrap">
                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
								<br/>
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <ul id="navigation">
											<!--<li class="<?php echo menuactive('home',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule()); ?>">
													<i class="fa fa-home"></i> <span><?php echo lang('Beranda'); ?></span>
												</a>
											</li>
											
											
											
											<?php echo '<li class="'.menuopen('home',$menuopen).'">
												<a role="button" href="'.site_url(fmodule()).'"><i class="fa fa-home"></i> <span>'.lang('Home').'</span></a>
												<ul>
													<li class="'.menuactive('home',$menuactive).'"><a href="'.site_url(fmodule()).'"><i class="fa fa-home"></i><span class="text"> '.lang('Home').'</span></a></li>
												</ul>
											</li>'; ?>
											-->
											
											<?php 
											if($this->session->userdata('sippadu_logged_in') != ''){
												echo '
												<li class="'.menuactive('home',$menuactive).'">
													<a role="button" href="'.site_url(fmodule()).'"><i class="fa fa-home"></i> <span>'.lang('Home').'</span></a>
												</li>
												<li class="'.menuactive('daftar',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('daftar')).'"><i class="fa fa-paper-plane-o"></i> <span>'.lang('Pendaftaran Izin').'</span></a>
												</li>
												<li class="'.menuactive('pemohon',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('personal')).'"><i class="fa fa-male"></i> <span>'.lang('Data Pemohon').'</span></a>
												</li>
												<li class="'.menuactive('perusahaan',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('perusahaan')).'"><i class="fa fa-university"></i> <span>'.lang('Data Perusahaan').'</span></a>
												</li>
												<li class="'.menuactive('history',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('history')).'"><i class="fa fa-history"></i> <span>'.lang('Riwayat Izin').'</span></a>
												</li>
												<li class="'.menuactive('klaim',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('personal/klaim')).'"><i class="fa fa-exchange"></i> <span>'.lang('Klaim Data').'</span></a>
												</li>
												<li class="'.menuactive('akun',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('akun')).'"><i class="fa fa-user"></i> <span>'.lang('Akun Saya').'</span></a>
												</li>
												<li class="'.menuactive('akun_password',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('akun/password')).'"><i class="fa fa-lock"></i> <span>'.lang('Ganti Password').'</span></a>
												</li>
												<li class="'.menuactive('logout',$menuactive).'">
													<a role="button" href="'.site_url(fmodule('logout')).'"><i class="fa fa-sign-out"></i> <span>'.lang('Logout').'</span></a>
												</li>
												'; 
											}
											else{
												echo '
												<li class="'.menuopen('login',$menuopen).'">
													<a role="button" href="'.site_url(fmodule('login')).'"><i class="fa fa-sign-in"></i> <span>'.lang('Login').'</span></a>
												</li>
												<li class="'.menuopen('registrasi',$menuopen).'">
													<a role="button" href="'.site_url(fmodule('registrasi')).'"><i class="fa fa-user"></i> <span>'.lang('Daftar').'</span></a>
												</li>
												'; 
											}
											?>
											
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