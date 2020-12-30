<div id="wrap" class="animsition">
			<section id="header">
                <header class="clearfix">
                    <div class="branding">
                        <a class="brand" href="#">

                        </a>
						<img src="<?php echo base_url(); ?>themes/rekomtek/images/logo-small.png" height="50px" width="180px" />
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    
					<!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="dropdown divided-right settings">
                            <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu">
                                <li>

                                    <ul class="color-schemes list-inline">
                                        <li class="title">Header Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank header-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black header-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea header-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan header-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred header-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light header-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Branding Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank branding-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black branding-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea branding-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan branding-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred branding-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light branding-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Sidebar Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank sidebar-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black sidebar-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea sidebar-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan sidebar-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred sidebar-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light sidebar-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Active Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank color-scheme" data-scheme="drank-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black color-scheme" data-scheme="black-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea color-scheme" data-scheme="greensea-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan color-scheme" data-scheme="cyan-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred color-scheme" data-scheme="lightred-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light color-scheme" data-scheme="light-scheme-color"></a></li>
                                    </ul>

                                </li>

                            </ul>
                        </li>
                    </ul>
                    <!-- Left-side navigation end -->
					
					<!-- Search -->
                    <div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div>
                    <!-- Search end -->
					
                    <ul class="nav-right pull-right list-inline">
					
						<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Buka Website <?php echo config('site_title'); ?>"><i class="fa fa-globe"></i></a></li>
						
                        <li class="dropdown nav-profile">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                
                                <img src="<?php echo base_url(); ?>assets/admin/images/user_rekom/<?= $this->session->userdata('foto'); ?>" alt="" class="img-circle size-30x30">
                                <span>Hai, <?= $this->session->userdata('nama'); ?></span>
                            </a>

                        </li>
                    </ul>
					<ul class="nav-right pull-right list-inline">
                        <li class="dropdown nav-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </header>
            </section>
			
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
											
											<li class="<?= $menu == 'dashboard' ? "active" : ""; ?>">
												<a href="<?= site_url(); ?>">
													<i class="fa fa-dashboard"></i> <span>Dashboard</span>
												</a>
											</li>

                                            <?php if($this->session->userdata('role') == 2 OR $this->session->userdata('role') == 1) : ?>
											<li class="<?= $menu == 'frontoffice' ? "active" : ""; ?>">
												<a href="<?= site_url('frontOffice'); ?>">
													<i class="fa fa-desktop"></i> <span>Front Office</span>
												</a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php if($this->session->userdata('role') == 3 OR $this->session->userdata('role') == 1) : ?>
                                            <li class="<?= $menu == 'backoffice' ? "active" : ""; ?>">
												<a href="<?= site_url('backOffice'); ?>">
													<i class="fa fa-tasks"></i> <span>Back Office</span>
												</a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php if($this->session->userdata('role') == 4 OR $this->session->userdata('role') == 1) : ?>
                                            <li class="<?= $menu == 'kabid' ? "active" : ""; ?>">
												<a href="<?= site_url('kabid'); ?>">
													<i class="fa fa-check-square-o"></i> <span>Validasi Kabid</span>
												</a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php if($this->session->userdata('role') == 5 OR $this->session->userdata('role') == 1) : ?>
                                            <li class="<?= $menu == 'kadin' ? "active" : ""; ?>">
												<a href="<?= site_url('kadin'); ?>">
													<i class="fa fa-check"></i> <span>Validasi Kadin</span>
												</a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php if($this->session->userdata('role') == 6 OR $this->session->userdata('role') == 1) : ?>
                                            <li class="<?= $menu == 'tu' ? "active" : ""; ?>">
												<a href="<?= site_url('tu'); ?>">
													<i class="fa fa-legal"></i> <span>Validasi TU</span>
												</a>
                                            </li>
                                            <?php endif; ?>

                                            <li class="<?= $menu == 'tolak' ? "active" : ""; ?>">
												<a href="<?= site_url('tolak'); ?>">
													<i class="fa fa-legal"></i> <span>Izin Ditolak</span>
												</a>
                                            </li>
                                            
                                            <li class="<?= $menu == 'arsip' ? "active" : ""; ?>">
												<a href="<?= site_url('arsip'); ?>">
													<i class="fa fa-list"></i> <span>Arsip Berkas</span>
												</a>
                                            </li>
                                            
                                            <li class="<?= $menu == 'user' ? "active" : ""; ?>">
												<a href="<?= site_url('ManagemenUser'); ?>">
													<i class="fa fa-users"></i> <span>Managemen User</span>
												</a>
											</li>
											
                                            <li class="">
												<a href="<?= site_url('/login/logout'); ?>">
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
                
				<!--================= RIGHTBAR Content ===================
                ================================================== -->
                <aside id="rightbar">

                    <div role="tabpanel">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="users">
                                <h6><strong>Online</strong> Users</h6>

                                <ul id="users_list_online"></ul>
                            </div>
                        </div>

                    </div>

                </aside>
                <!--/ RIGHTBAR Content -->
            </div>
            <!--/ CONTROLS Content -->