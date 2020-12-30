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
											<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kode Parameter</label>
												<div class="col-sm-2"><input type="text" name="param" id="param" placeholder="Kode Parameter" class="form-control" value="<?php echo set_value('param',$last_id); ?>" /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Parameter</label>
												<div class="col-sm-10"><input type="text" name="nm_param" id="nm_param" placeholder="Nama Parameter" class="form-control" value="<?php echo set_value('nm_param'); ?>" /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Type Parameter</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_radio('type',1,(set_value('type')==1 ? TRUE : FALSE)); ?><i></i>Varchar</label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_radio('type',2,(set_value('type')==2 ? TRUE : FALSE)); ?><i></i>Text</label></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-10"><input type="submit" name="submit" class="btn btn-blue" value="Simpan" /></div>							
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
        <!--/ Page Specific Scripts -->

    </body>
</html>
