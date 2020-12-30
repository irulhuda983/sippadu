			<section id="header">
                <header class="clearfix">
                    <div class="branding">
                        <a class="brand" href="<?php echo site_url(fmodule()); ?>">
                            <!--<span><strong><?php echo config('sub_title'); ?></strong></span>-->
                            <span><img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/logo-small.png" height="50px" width="180px" /></span>
                        </a>
						<!--<img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/logo-small.png" height="50px" width="180px" />-->
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    
					<!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="sidebar-collapse divided-right">
                            <a role="button" tabindex="0" class="collapse-sidebar">
                                <i class="fa fa-outdent"></i>
                            </a>
                        </li>
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
						<?php //echo form_dropdown('op_apps',array('0'=>'- Pilih Aplikasi','1'=>'Sippadu'),set_value('op_apps'),'class="form-control underline-input"'); ?>
                    </div>
                    <!-- Search end -->
					
                    <ul class="nav-right pull-right list-inline">
						<li class="dropdown users">

                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <!--<span class="badge bg-lightred">2</span>-->
                            </a>

                            <!--<div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInDown" role="menu">

                                <div class="panel-heading">
                                    You have <strong>2</strong> requests
                                </div>

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <a role="button" tabindex="0" class="media">
                                            <span class="pull-left media-object thumb thumb-sm">
                                                <img src="assets/images/arnold-avatar.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Arnold sent you a request</span>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                                <div class="panel-footer">
                                    <a role="button" tabindex="0">Show all requests <i class="fa fa-angle-right pull-right"></i></a>
                                </div>

                            </div>-->

                        </li>
						
						<li class="dropdown messages">

                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <!--<span class="badge bg-lightred">4</span>-->
                            </a>

                            <!--<div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInDown" role="menu">

                                <div class="panel-heading">
                                    You have <strong>4</strong> messages
                                </div>

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <a role="button" tabindex="0" class="media">
                                            <span class="pull-left media-object thumb thumb-sm">
                                                <img src="assets/images/ici-avatar.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Imrich sent you a message</span>
                                                <small class="text-muted">12 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                                <div class="panel-footer">
                                    <a role="button" tabindex="0">Show all messages <i class="pull-right fa fa-angle-right"></i></a>
                                </div>

                            </div>-->

                        </li>
						
						<li class="dropdown notifications">

                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                <!--<span class="badge bg-lightred">3</span>-->
                            </a>

                             <ul class="dropdown-menu animated littleFadeInDown" role="menu">
								<?php 
								if($data_language->num_rows() > 0){
									foreach($data_language->result() as $lang){
									echo '<li><a role="button" tabindex="0" href="'.apps_url(2,'language/get/'.$lang->Kd_Lang).'"> <i class="fa fa-globe"></i>'.$lang->Nm_Lang.'</a></li>';
									}
								}
								?>
                            </ul>

                        </li>
						
						<li class="dropdown aplikasi">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo config('apps_name'); ?> <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInDown" role="menu">
								<?php 
								if($menu_apps->num_rows() > 0){
									foreach($menu_apps->result() as $ma){
									echo '<li><a role="button" tabindex="0" href="'.apps_url($ma->ID_Apps).'" target="'.$ma->Target.'"> <i class="fa fa-book"></i>'.$ma->Nm_Apps.'</a></li>';
									}
								}
								?>
                            </ul>

                        </li>
						
                        <li class="dropdown nav-profile">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang('Hai').', '.$userfullname; ?> <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInDown" role="menu">
								
								 <li>
                                    <a role="button" tabindex="0" href="<?php echo apps_url(2,'akun'); ?>" ><div class="pic-circle"><?php echo picprof($this->session->userdata('userid'),'class=""'); ?></div></a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo apps_url(2,'akun'); ?>">
                                        <i class="fa fa-user"></i><?php echo lang('Profil'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo apps_url(2,'akun/password'); ?>">
                                        <i class="fa fa-lock"></i><?php echo lang('Ganti Password'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo apps_url(2,'logout'); ?>">
                                        <i class="fa fa-sign-out"></i><?php echo lang('Logout'); ?>
                                    </a>
                                </li>
	
                            </ul>
                        </li>
						
						<li class="toggle-right-sidebar">
                            <a role="button" tabindex="0">
                                <i class="fa fa-comments"></i>
								<span class="badge bg-lightred"><span id="badge_chat">0</span></span>
                            </a>
                        </li>
                    </ul>
                </header>
            </section>