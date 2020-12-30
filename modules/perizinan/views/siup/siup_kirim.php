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
                <div class="page">
                    <div class="pageheader">
                        <!--<h2><?php echo $title; ?></h2>-->
						<?php $this->load->view('breadcrumb'); ?>
                    </div>

                    <!-- cards row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
							
                            <section class="tile">
                                <!-- tile body -->
									<div id="rootwizard" class="tab-container tab-wizard">
									<?php $this->load->view('tab_registrasi'); ?>
									<div class="tab-content">
									<div class="tab-pane active" id="tab1">
									<?php echo alert(); ?> 
									<?php echo form_open_multipart('',array('id'=>'form','class' => 'form-horizontal', 'role' => 'frm')); ?>
										<div class="block-fluid">                        
											<br/>
											<div class="form-group">
												<div class="col-sm-12">
													<label class="checkbox checkbox-custom-alt"><?php echo form_checkbox('setuju',1); ?><i></i> <?php echo lang('Saya telah yakin data yang akan saya kirimkan sudah benar dan saya telah menyetujui ketentuan yang berlaku'); ?></label>
												</div>							
											</div>
											<div class="form-group">
												<div class="col-sm-12"><span align="center"><?php echo $captcha; ?></span></div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-12"><input type="text" name="captcha" placeholder="Isikan captcha" class="form-control"></div>
											</div>
											<div class="form-group">
												<div class="col-sm-6">
													<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />	
													<input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $Kd_Pelanggan; ?>" />	
													<?php echo form_hidden('Kd_Access',$Kd_Access); ?>
													<?php echo form_hidden('Kd_Izin',$Kd_Izin); ?>
													<input type="submit" name="submit" class="btn btn-blue" value="<?php echo lang('Next'); ?>" />
												</div>							
											</div>

										</div>
									</div>
									</div>
									</div>
									</div>
							</section>
							
							</form>
							
							

                        </div>
                        <!-- /col -->

                    </div>
                    <!-- /row -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->
		<?php $this->load->view('footer_2'); ?>
    </body>
</html>
