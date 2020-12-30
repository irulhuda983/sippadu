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

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
									<?php echo alert(); ?> 
									<?php echo form_open_multipart('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Project</label>
												<div class="col-sm-10"><?php echo form_input('Nm_Project',set_value('Nm_Project'),'class="form-control" placeholder="Pembangunan Jalan Sumberrejo-Kedungadem"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Lokasi Project</label>
												<div class="col-sm-10"><?php echo form_input('Lokasi',set_value('Lokasi'),'class="form-control" placeholder="Jalan Utama Sumberrejo-Kedungadem"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Instansi</label>
												<div class="col-sm-10"><?php echo form_input('Nm_Instansi',set_value('Nm_Instansi'),'class="form-control" placeholder="Dinas PU Bina Marga"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat Instansi</label>
												<div class="col-sm-10"><?php echo form_input('Alamat_Instansi',set_value('Alamat_Instansi'),'class="form-control" placeholder="Jl. P.Mastumapel Bojonegoro"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Latitude</label>
												<div class="col-sm-3"><?php echo form_input('Latitude',set_value('Latitude'),'class="form-control" placeholder="(Opsional)"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Longitude</label>
												<div class="col-sm-3"><?php echo form_input('Longitude',set_value('Longitude'),'class="form-control" placeholder="(Opsional)"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Mulai</label>
												<div class="col-sm-3">
												<div class="input-group datepicker">
                                                    <input type="text" name="Time_Mulai" class="form-control" value="<?php echo TimeNow('d/m/Y H:i'); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div>  

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Berakhir</label>
												<div class="col-sm-3">
												<div class="input-group datepicker">
                                                    <input type="text" name="Time_Akhir" class="form-control" value="<?php echo TimeNow('d/m/Y H:i'); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Anggaran</label>
												<div class="col-sm-3"><?php echo form_input('Anggaran',set_value('Anggaran'),'class="form-control autonumber" placeholder="200000000"'); ?></div>
											</div>
											
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Type</label>
												<div class="col-sm-3"><?php echo form_input('Type',set_value('Type'),'class="form-control"'); ?></div>
											</div>-->
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jumlah Pelaksana</label>
												<div class="col-sm-3"><?php echo form_input('Jml_Pelaksana',set_value('Jml_Pelaksana'),'class="form-control" placeholder="30 orang"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Pelaksana</label>
											   <div class="col-sm-9"><textarea name="Nm_Pelaksana" class="summernote"><?php echo set_value('Nm_Pelaksana'); ?></textarea></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
											   <div class="col-sm-10"><textarea name="Deskripsi" id="summernote"><?php echo set_value('Deskripsi'); ?></textarea></div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_multiselect('op_project_kategori[]',$op_project_kategori,set_value('op_project_kategori[]'),'class="form-control chosen-select"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tags</label>
												<div class="col-sm-10"><?php echo form_input('Tags',set_value('Tags',set_value('Tags')),'class="form-control tags"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Time</label>
												<div class="col-sm-3">
												<div class="input-group datetimepicker">
                                                    <input type="text" name="Time" class="form-control" value="<?php echo TimeNow('d/m/Y H:i'); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn" value="Simpan" /></div>							
											</div>
											<?php //} ?>
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


		<?php $this->load->view('footer_2'); ?>

    </body>
</html>
