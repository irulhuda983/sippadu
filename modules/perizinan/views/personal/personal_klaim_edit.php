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
											<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nomor Identitas</label>
												<div class="col-sm-6"><input type="text" name="nokitas" class="form-control" placeholder="Nomor Identitas" value="<?php echo set_value('nokitas',$d->No_Kitas); ?>" /></div>
											</div>                         

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
											   <div class="col-sm-6"><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama',$d->Nm_Personal); ?>"/></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir',$d->Tempat_Lahir); ?>" /></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
												<div class="col-sm-2"><?php echo form_dropdown('tanggal_lahir',op_tanggal(),set_value('tanggal_lahir',TimeFormat($d->Tgl_Lahir,'d')),'id="tanggal_lahir" class="form-control chosen-select"'); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('bulan_lahir',op_bulan(),set_value('bulan_lahir',TimeFormat($d->Tgl_Lahir,'m')),'id="bulan_lahir" class="form-control chosen-select"'); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('tahun_lahir',op_tahun(),set_value('tahun_lahir',TimeFormat($d->Tgl_Lahir,'Y')),'id="tahun_lahir" class="form-control chosen-select"'); ?></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No HP</label>
												<div class="col-sm-6"><input type="text" name="no_hp" id="no_hp" placeholder="Nomor Handphone" class="form-control" value="<?php echo set_value('no_hp',$d->No_HP); ?>" /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Upload Scan Identitas</label>
												<div class="col-sm-6"><input type="file" name="file_kitas" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox"></div>
											</div>
								
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><?php echo form_hidden('oldfile',$d->Filename); ?><input type="submit" name="submit" class="btn" value="Simpan" /></div>							
											</div>
											<?php } ?>
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
