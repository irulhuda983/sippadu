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
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
								<div class="pagecontent">

									<div id="rootwizard" class="tab-container tab-wizard">
										<?php //$this->load->view('tab_registrasi'); ?>
										<div class="tab-content">
											<div class="tab-pane active" id="tab1">
												<?php echo alert(); ?>
												<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>

													<div class="form-group">
														<label for="username" class="col-sm-2 control-label"><?php echo lang('Email Anda',true); ?>: </label>
														<div class="col-sm-4"><input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="email@domain.com"></div>
													</div>

													
													<div class="form-group">
														<label for="password" class="col-sm-2 control-label"></label>
														<div class="col-sm-4"><span align="center"><?php echo $captcha; ?></span></div>
													</div>
													
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label"></label>
														<div class="col-sm-4"><input type="text" name="captcha" placeholder="Isikan captcha" class="form-control"></div>
													</div>
													
													<div class="form-group">
														<label for="password" class="col-sm-2 control-label"></label>
														<div class="col-sm-4">
															<input type="submit" name="submit" class="btn btn-blue" value="Kirim Link ke Email" />
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


        <?php $this->load->view('footer_1'); ?>

    </body>
</html>
