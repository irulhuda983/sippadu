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
														<label for="username" class="col-sm-2 control-label"><?php echo lang('Nomor KTP/SIM/Kitas',true); ?>: </label>
														<div class="col-sm-4"><input type="text" name="username" class="form-control" value="<?php echo set_value('username',$this->session->userdata('sippadu_daftar_nokitas')); ?>"></div>
														<label for="username" class="col-sm-6 control-label" style="text-align:left"><i><?php echo lang('Silakan gunakan KTP/SIM/Kitas anda yang telah terdaftar, jika belum terdaftar silakan klik tombol "Daftar" terlebih dahulu',true); ?></i></label>
													</div>

													<div class="form-group">
														<label for="password" class="col-sm-2 control-label"><?php echo lang('Password'); ?>: </label>
														<div class="col-sm-4"><input type="password" name="password" class="form-control"></div>
														<label for="username" class="col-sm-6 control-label" style="text-align:left"><i><?php echo lang('Silakan masukkan password anda disini',true); ?></i></label>
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
															<input type="submit" name="submit" class="btn btn-blue" value="Login" />
															<input type="button" class="btn btn-greensea" onclick="window.location.href='<?php echo site_url(fmodule('registrasi')); ?>'" value="<?php echo lang('Belum punya user? Daftar disini',true); ?>" />
															<input type="button" class="btn btn-red" onclick="window.location.href='<?php echo site_url(fmodule('login/lupa')); ?>'" value="<?php echo lang('Lupa Password',true); ?>" />
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
