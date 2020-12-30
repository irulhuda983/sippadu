<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
		
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts-3d.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php $this->load->view('top'); ?>
            <?php $this->load->view('menu'); ?>
            <section id="content">
                <div class="page page-dashboard">
                    <!--<div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>-->

                    <!-- cards row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
								<?php echo alert(); ?>
								<div class="page page-dashboard">
									<div class="row">

										<!-- col -->
										<div class="card-container col-lg-3 col-sm-6 col-sm-12">
											<div class="card">
												<div class="front bg-greensea">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4">
															<i class="fa fa-users fa-4x"></i>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-8">
															<p class="text-elg text-strong mb-0">0</p>
															<span>Jumlah Pemohon</span>
														</div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
												<div class="back bg-greensea">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4">
															<a href="#"><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
											</div>
										</div>
										<!-- /col -->

										<!-- col -->
										<div class="card-container col-lg-3 col-sm-6 col-sm-12">
											<div class="card">
												<div class="front bg-lightred">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4">
															<i class="fa fa-university fa-4x"></i>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-8">
															<p class="text-elg text-strong mb-0">0</p>
															<span>Perusahaan</span>
														</div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
												<div class="back bg-lightred">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4">
															<a href="#"><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
											</div>
										</div>
										<!-- /col -->

										<!-- col -->
										<div class="card-container col-lg-3 col-sm-6 col-sm-12">
											<div class="card">
												<div class="front bg-blue">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4">
															<i class="fa fa-history fa-4x"></i>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-8">
															<p class="text-elg text-strong mb-0">0</p>
															<span>Jumlah Izin</span>
														</div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
												<div class="back bg-blue">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4">
															<a href="#"><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
											</div>
										</div>
										<!-- /col -->

										<!-- col -->
										<div class="card-container col-lg-3 col-sm-6 col-sm-12">
											<div class="card">
												<div class="front bg-slategray">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4">
															<i class="fa fa-globe fa-4x"></i>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-8">
															<p class="text-elg text-strong mb-0">20</p>
															<span>Izin Online</span>
														</div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
												<div class="back bg-slategray">

													<!-- row -->
													<div class="row">
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4">
															<a href="#"><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
														</div>
														<!-- /col -->
														<!-- col -->
														<div class="col-xs-4"></div>
														<!-- /col -->
													</div>
													<!-- /row -->

												</div>
											</div>
										</div>
										<!-- /col -->

									</div>
									

								</div>
                                
                            </section>
                            <!-- /tile -->

                        </div>
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
