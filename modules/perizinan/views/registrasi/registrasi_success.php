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

									
									<?php echo alert('success','Pendaftaran anda telah berhasil, silakan melanjutkan tahap selanjutnya'); ?>
									<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>

										<div class="form-group">
											<div class="col-sm-6">
												<input type="button" class="btn btn-greensea" onclick="window.location.href='<?php echo site_url(fmodule('personal')); ?>'" value="<?php echo lang('Next',true); ?>" />
											</div>
										</div>
									</form>

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
