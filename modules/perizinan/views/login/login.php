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
                                <!--<div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>-->
                                <!-- /tile header -->

                                <!-- tile body -->
								<div class="pagecontent">

									<div id="rootwizard" class="tab-container tab-wizard">
										<ul class="nav nav-tabs nav-justified nav-pills">
											<li class="active"><a href="javascript:void(0);">Login<span class="badge badge-default pull-right wizard-step">1</span></a></li>
											<li><a href="javascript:void(0);">Isi Data Pemohon<span class="badge badge-default pull-right wizard-step">2</span></a></li>
											<li><a href="javascript:void(0);">Isi Data Izin<span class="badge badge-default pull-right wizard-step">3</span></a></li>
											<li><a href="javascript:void(0);">Upload Berkas<span class="badge badge-default pull-right wizard-step">4</span></a></li>
											<li><a href="javascript:void(0);">Selesai<span class="badge badge-default pull-right wizard-step">5</span></a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab1">
												<form name="step1" role="form" novalidate="" _lpchecked="1">

													<div class="row">
														<div class="form-group col-md-12">
															<label for="username">Name: </label>
															<input type="text" name="name" id="name" class="form-control parsley-error" required="" data-parsley-id="6592"><ul class="parsley-errors-list filled" id="parsley-id-6592"><li class="parsley-required">This value is required.</li></ul>
														</div>

													</div>

													<div class="row">

														<div class="form-group col-md-12">
															<label for="password">Password: </label>
															<input type="password" name="password" id="password" class="form-control parsley-error" minlength="6" required="" data-parsley-id="6907"><ul class="parsley-errors-list filled" id="parsley-id-6907"><li class="parsley-required">This value is required.</li></ul>
														</div>

													</div>

												</form>

											</div>
											<ul class="pager wizard">
												<li class="previous"><button class="btn btn-greensea">Belum punya user? Daftar disini</button></li>
												<li class="next"><button class="btn btn-blue">Next</button></li>
												<!--<li class="next"><button class="btn btn-default">Next</button></li>
												<li class="next finish" style="display: none;"><button class="btn btn-success">Finish</button></li>-->
											</ul>
										</div>
									</div>

								</div>
                                <!--<div class="tile-body">
									<?php echo alert(); ?> 
									<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No Identitas</label>
												<div class="col-sm-6"><input type="text" name="nokitas" id="nokitas" placeholder="No Identitas (KTP, Passpor, dll)" class="form-control" value="<?php echo set_value('nokitas'); ?>" /></div>
											</div> 
											
											<div class="form-group" id="dsp_cek_data" style="display:none;">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><span id="cek_data"></span></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
												<div class="col-sm-6"><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo set_value('nama'); ?>" /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir'); ?>" /></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn btn-blue" value="Simpan" /></div>							
											</div>
											<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />
											
											
											<?php //} ?>
										</div>
									</form>
                                </div>-->
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
