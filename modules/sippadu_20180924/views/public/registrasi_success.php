<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('public/head'); ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php $this->load->view('public/top'); ?>
            <?php $this->load->view('public/menu'); ?>
            <section id="content">
                <div class="page page-dashboard">
                    <div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>

                    <!-- cards row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <!--<div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>-->
                                <!-- /tile header -->

                                <!-- tile body -->
								<div class="pagecontent">

									<div id="rootwizard" class="tab-container tab-wizard">
										<ul class="nav nav-tabs nav-justified nav-pills">
											<li class="active"><a href="javascript:void(0);"><?php echo lang('Login - Registrasi',true); ?><span class="badge badge-default pull-right wizard-step">1</span></a></li>
											<li><a href="javascript:void(0);"><?php echo lang('Isi Data Pemohon',true); ?><span class="badge badge-default pull-right wizard-step">2</span></a></li>
											<li><a href="javascript:void(0);"><?php echo lang('Isi Data Izin',true); ?><span class="badge badge-default pull-right wizard-step">3</span></a></li>
											<li><a href="javascript:void(0);"><?php echo lang('Upload Berkas',true); ?><span class="badge badge-default pull-right wizard-step">4</span></a></li>
											<li><a href="javascript:void(0);"><?php echo lang('Selesai',true); ?><span class="badge badge-default pull-right wizard-step">5</span></a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab1">
												<?php echo alert(); ?>
												<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>

													<div class="form-group">
														<div class="col-sm-6">
															<input type="button" class="btn btn-greensea" onclick="window.location.href='<?php echo site_url(fmodule('personal')); ?>'" value="<?php echo lang('Next',true); ?>" />
														</div>
													</div>
												</form>
											</div>
										</div>
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


        <?php $this->load->view('public/footer_1'); ?>

    </body>
</html>
