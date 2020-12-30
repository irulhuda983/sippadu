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
												<label for="" class="col-sm-2 control-label">Nama SKPD</label>
												<div class="col-sm-6"><?php echo form_input('Nm_SKPD',set_value('Nm_SKPD'),'class="form-control" placeholder="Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu"'); ?></div>
											</div>                         

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-6"><?php echo form_input('Alamat',set_value('Alamat'),'class="form-control" placeholder="Jl. P. Mastumapel No. 1"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Kota</label>
												<div class="col-sm-6"><?php echo form_input('Nm_Kota',set_value('Nm_Kota'),'class="form-control" placeholder="Bojonegoro"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Kota 2</label>
												<div class="col-sm-6"><?php echo form_input('Nm_Kota2',set_value('Nm_Kota2'),'class="form-control" placeholder="Kabupaten Bojonegoro"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Telepon</label>
												<div class="col-sm-6"><?php echo form_input('Telp',set_value('Telp'),'class="form-control" placeholder="(0353) 888888"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Fax</label>
												<div class="col-sm-6"><?php echo form_input('Fax',set_value('Fax'),'class="form-control" placeholder="(0353) 888888"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Pimpinan</label>
												<div class="col-sm-6"><?php echo form_input('Nm_Pimpinan',set_value('Nm_Pimpinan'),'class="form-control" placeholder=""'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jabatan Pimpinan</label>
												<div class="col-sm-6"><?php echo form_input('Jab_Pimpinan',set_value('Jab_Pimpinan'),'class="form-control" placeholder=""'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">NIP Pimpinan</label>
												<div class="col-sm-6"><?php echo form_input('NIP_Pimpinan',set_value('NIP_Pimpinan'),'class="form-control" placeholder=""'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pangkat Pimpinan</label>
												<div class="col-sm-6"><?php echo form_input('Pangkat_Pimpinan',set_value('Pangkat_Pimpinan'),'class="form-control" placeholder=""'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Font Size (Nama KOP)</label>
												<div class="col-sm-6"><?php echo form_input('Font_Size',set_value('Font_Size',18),'class="form-control"'); ?></div>
											</div>

											
											<div class="form-group">
												<label class="col-sm-2 control-label">Upload Logo</label>
												<div class="col-sm-5">
													<input type="file" name="Logo" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Upload Logo</label>
												<div class="col-sm-5">
													<input type="file" name="TTD" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Upload Stempel</label>
												<div class="col-sm-5">
													<input type="file" name="Stempel" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
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
