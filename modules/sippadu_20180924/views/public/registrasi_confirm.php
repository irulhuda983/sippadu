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
											<li class="active"><a href="javascript:void(0);">Login - Registrasi<span class="badge badge-default pull-right wizard-step">1</span></a></li>
											<li><a href="javascript:void(0);">Isi Data Pemohon<span class="badge badge-default pull-right wizard-step">2</span></a></li>
											<li><a href="javascript:void(0);">Isi Data Izin<span class="badge badge-default pull-right wizard-step">3</span></a></li>
											<li><a href="javascript:void(0);">Upload Berkas<span class="badge badge-default pull-right wizard-step">4</span></a></li>
											<li><a href="javascript:void(0);">Selesai<span class="badge badge-default pull-right wizard-step">5</span></a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab1">
												<?php echo alert(); ?>
												<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>

													<div class="form-group">
														<label for="username" class="col-sm-2 control-label">Nomor KTP/SIM/Kitas: </label>
														<div class="col-sm-6"><input type="text" name="kitas" class="form-control" value="<?php echo $kitas; ?>" readonly/></div>
													</div>
												
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label">Email: </label>
														<div class="col-sm-6"><input type="text" name="email" class="form-control" value="<?php echo $email; ?>" readonly/></div>
													</div>
													
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label">Password: </label>
														<div class="col-sm-6"><input type="password" name="password" class="form-control" /></div>
													</div>
												
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label">Konfirmasi Password: </label>
														<div class="col-sm-6"><input type="password" name="passwordconf" class="form-control" /></div>
													</div>
													<hr/>
												
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label">Nama Lengkap: </label>
														<div class="col-sm-6"><input type="text" name="name" class="form-control" value="<?php echo $name; ?>" /></div>
													</div>
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
														<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir'); ?>" /></div>
													</div>
													
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
														<div class="col-sm-2"><?php echo form_dropdown('tanggal_lahir',op_tanggal(),set_value('tanggal_lahir'),'id="tanggal_lahir" class="form-control chosen-select"'); ?></div>
														<div class="col-sm-2"><?php echo form_dropdown('bulan_lahir',op_bulan(),set_value('bulan_lahir'),'id="bulan_lahir" class="form-control chosen-select"'); ?></div>
														<div class="col-sm-2"><?php echo form_dropdown('tahun_lahir',op_tahun(),set_value('tahun_lahir'),'id="tahun_lahir" class="form-control chosen-select"'); ?></div>
													</div>


													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
														<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','01',(set_value('gender')=='01' ? TRUE : FALSE)).'<i></i> Laki-Laki '; ?></label></div>
														<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','02',(set_value('gender')=='02' ? TRUE : FALSE)).'<i></i> Perempuan '; ?></label></div>
													</div>
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Pekerjaan</label>
														<div class="col-sm-6"><input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" class="form-control" value="<?php echo set_value('pekerjaan'); ?>" /></div>
													</div>

													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Alamat</label>
													   <div class="col-sm-6"><textarea type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" ><?php echo set_value('alamat'); ?></textarea></div>
													</div> 
													
													<div class="form-group" id="">
														<label for="" class="col-sm-2 control-label">Provinsi</label>
													   <div class="col-sm-6"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',35),'id="op_provinsi" class="form-control chosen-select"'); ?></span></div>
													</div> 
													
													<div class="form-group" id="">
														<label for="" class="col-sm-2 control-label">Kota</label>
													   <div class="col-sm-6"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota(35),set_value('op_kota',3522),'id="op_kota" class="form-control chosen-select"'); ?></span></div>
													</div> 
													
													<div class="form-group" id="">
														<label for="" class="col-sm-2 control-label">Kecamatan</label>
													   <div class="col-sm-6"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan(3522),set_value('op_kecamatan'),'id="op_kecamatan" class="form-control chosen-select"'); ?></span></div>
													</div> 
													
													<div class="form-group" id="">
														<label for="" class="col-sm-2 control-label">Desa</label>
													   <div class="col-sm-6"><span id="dsp_desa"><?php echo form_dropdown('op_desa',$op_desa,set_value('op_desa'),'id="op_desa" class="form-control chosen-select"'); ?></span></div>
													</div> 
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">NPWP</label>
														<div class="col-sm-6"><input type="text" name="npwp" id="npwp" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp'); ?>" /></div>
													</div> 
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Telepon</label>
														<div class="col-sm-6"><input type="text" name="telepon" id="telepon" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon'); ?>" /></div>
													</div> 
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">HP</label>
														<div class="col-sm-6"><input type="text" name="hp" id="hp" placeholder="Handphone" class="form-control" value="<?php echo set_value('hp'); ?>" /></div>
													</div> 
													
													<div class="form-group">
														<label for="" class="col-sm-2 control-label">Fax</label>
														<div class="col-sm-6"><input type="text" name="fax" id="fax" placeholder="Fax" class="form-control" value="<?php echo set_value('fax'); ?>" /></div>
													</div>
		
													<div class="row">
														<div class="form-group">
															<label for="password" class="col-sm-3 control-label"></label>
															<div class="col-sm-6">
																<input type="submit" class="btn btn-blue" value="Daftar" />
															</div>
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


        <?php $this->load->view('public/footer_2'); ?>

    </body>
</html>
