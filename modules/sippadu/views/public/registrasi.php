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
														<label for="username" class="col-sm-2 control-label"><?php echo lang('Nomor KTP/SIM/Kitas',true); ?>: </label>
														<div class="col-sm-4"><input type="text" name="nokitas" class="form-control"></div>
														<label for="username" class="col-sm-6 control-label" style="text-align:left"><i><?php echo lang('Wajib diisi dengan nomor KTP/SIM/Kitas anda',true); ?></i></label>
													</div>
												
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label"><?php echo lang('Email',true); ?>: </label>
														<div class="col-sm-4"><input type="text" name="email" class="form-control"></div>
														<label for="username" class="col-sm-6 control-label" style="text-align:left"><i><?php echo lang('Pastikan email yang anda daftarkan masih aktif dan bisa dibuka, sebab semua transaksi anda akan dikirimkan ke email yang anda daftarkan',true); ?></i></label>
													</div>
													
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label"><?php echo lang('Password',true); ?>: </label>
														<div class="col-sm-4"><input type="password" name="password" class="form-control" /></div>
														<label for="username" class="col-sm-6 control-label" style="text-align:left"><i><?php echo lang('Buatlah password yang selalu anda ingat yang terdiri dari huruf, angka, dan symbol minimal sepanjang 6 karakter',true); ?></i></label>
													</div>
												
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label"><?php echo lang('Konfirmasi Password',true); ?>: </label>
														<div class="col-sm-4"><input type="password" name="passconf" class="form-control" /></div>
														<label for="username" class="col-sm-6 control-label" style="text-align:left"><i><?php echo lang('Konfirmasikan password anda (harus sama dengan kolom password diatas)',true); ?></i></label>
													</div>
													<div class="form-group">
														<label for="password" class="col-sm-2 control-label"></label>
														<div class="col-sm-6">
															<input type="submit" name="submit" class="btn btn-blue" value="<?php echo lang('Daftar',true); ?>" />
															<input type="button" class="btn btn-greensea" onclick="window.location.href='<?php echo site_url(fmodule('login')); ?>'" value="<?php echo lang('Sudah punya user? Login disini',true); ?>" />
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
