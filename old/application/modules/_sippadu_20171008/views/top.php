			<section id="header">
                <header class="clearfix">
                    <div class="branding">
                        <a class="brand" href="<?php echo site_url(fmodule()); ?>">
                            <span><strong><?php echo config('sub_title'); ?></strong></span>
                        </a>
						<!--<img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/logo-small.png" height="50px" width="180px" />-->
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    
                    <ul class="nav-right pull-right list-inline">
                        <li class="dropdown nav-profile">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/user-profile.png" alt="" class="img-circle size-30x30">
                                <span>Hai, <?php echo $userfullname; ?> <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                                <li>
                                    <a role="button" tabindex="0" href="<?php echo site_url(fmodule('akun')); ?>">
                                        <i class="fa fa-user"></i>Profil
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo site_url(fmodule('akun/password')); ?>">
                                        <i class="fa fa-lock"></i>Ganti Password
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo site_url(fmodule('logout')); ?>">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>

                            </ul>

                        </li>
                    </ul>
					<ul class="nav-right pull-right list-inline">
                        <li class="dropdown nav-profile">
                            <a href="<?php echo site_url(fmodule()); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                <span><?php echo $top_simda_title; ?></span>
                            </a>
                        </li>
                    </ul>
                </header>
            </section>