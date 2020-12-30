<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php $this->load->view('top'); ?>
            <?php $this->load->view('menu'); ?>
            <section id="content">
                <div class="page page-dashboard">
                    <div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>

                    <!-- cards row -->
                    <div class="row">
						<div class="col-md-12">
							
							<?php echo alert('success','Halo, '.$this->session->userdata('userfullname').'. Selamat datang di halaman dashboard '.config('site_title').''); ?>
                            <!-- tile -->
                            <section class="tile">
							
							</section>
						</div>
					</div>
						
						
                        <!-- col -->
                        <!--<div class="card-container col-lg-3 col-sm-6 col-sm-12">
							
                            <div class="card">
                                <div class="front bg-greensea">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-users fa-4x"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">30</p>
                                            <span>Users</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="back bg-greensea">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-lightred">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-bank fa-4x"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">74</p>
                                            <span>SKPD</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="back bg-lightred">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-blue">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-usd fa-4x"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">3,345 T</p>
                                            <span>APBD</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="back bg-blue">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-slategray">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-eye fa-4x"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">14</p>
                                            <span>User Aktif</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="back bg-slategray">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- /col -->

                    </div>
                    <!-- /row -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->

		<?php $this->load->view('footer_1'); ?>
        

    </body>
</html>
