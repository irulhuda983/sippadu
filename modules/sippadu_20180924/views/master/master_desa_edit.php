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
									<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kode Desa/Kelurahan</label>
												<div class="col-sm-6"><input type="text" name="kode_desa" class="form-control" placeholder="Kode Desa/Kelurahan" value="<?php echo set_value('kode_desa',$d->ID_DESA); ?>" /></div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Desa/Kelurahan</label>
												<div class="col-sm-6"><input type="text" name="desa" class="form-control" placeholder="Nama Desa/Kelurahan" value="<?php echo set_value('desa',$d->NAMA_DESA); ?>" /></div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('jenis','1',(set_value('jenis',$d->JENIS)=='1' ? TRUE : FALSE)).'<i></i> Desa '; ?></label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('jenis','2',(set_value('jenis',$d->JENIS)=='2' ? TRUE : FALSE)).'<i></i> Kelurahan '; ?></label></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn" value="Simpan" /></div>							
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
