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
											<label for="" class="col-sm-2 control-label">Username</label>
											<div class="col-sm-6"><input type="text" class="form-control" value="<?php echo $d->Username; ?>" disabled/></div>
										</div>                         

										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
										   <div class="col-sm-6"><input type="text" name="name" class="upper form-control" value="<?php echo set_value('name',$d->Nm_User); ?>"/></div>
										</div> 

										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Level</label>
										   <div class="col-sm-6"><input type="text" class="form-control" value="<?php echo $d->Nm_Level; ?>" disabled/></div>
										</div>

										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Grup</label>
										   <div class="col-sm-6"><input type="text" class="form-control" value="<?php echo $d->Nm_Group; ?>" disabled/></div>
										</div> 								
										
										<div class="form-group">
											<label for="" class="col-sm-2 control-label"></label>
											<div class="col-sm-6"><input type="submit" name="submit" class="btn" value="Simpan" /></div>							
										</div>
										<?php } ?>
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
