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
											<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Nama Izin</div>
												<div class="col-sm-6"><b><?php echo $Nm_Izin; ?></b></div>
											</div>
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Nomor Registrasi Izin</div>
												<div class="col-sm-6"><b><?php echo $d->IDSIUP; ?></b></div>
											</div>
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Cetak Tanda Terima</div>
												<div class="col-sm-6"><input class="btn btn-blue" type="button" name="cetak" value="Cetak Tanda Terima" onclick="popup('<?php echo site_url(fmodule($Class_Izin.'/tt/'.$this->session->userdata('sess_id_izin'))); ?>')"/></div>
											</div>
											<?php } ?>
											<br/>
											<div class="form-group">
												<div class="col-sm-6">
													<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />	
													<input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $Kd_Pelanggan; ?>" />	
													<?php echo form_hidden('Kd_Access',$Kd_Access); ?>
													<?php echo form_hidden('Kd_Izin',$Kd_Izin); ?>
													<input class="btn btn-blue" type="button" value="<?php echo lang('Next'); ?>" onclick="window.location.href='<?php echo site_url(fmodule('perizinan/selesai')); ?>'"/>
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
