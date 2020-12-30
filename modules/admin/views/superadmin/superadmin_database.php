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
										
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Backup Database</label>
											<div class="col-sm-6"><input type="submit" name="backup" class="btn" value="Backup" /></div>							
										</div>
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Optimize Database</label>
											<div class="col-sm-6"><input type="submit" name="optimize" class="btn" value="Optimize" /></div>							
										</div>
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Repair Database</label>
											<div class="col-sm-6"><input type="submit" name="repair" class="btn" value="Repair" /></div>							
										</div>
										<!--<div class="form-group">
											<label for="" class="col-sm-2 control-label">Repair Database</label>
											<div class="col-sm-6"><input type="submit" name="repair" class="btn" value="Repair" /></div>							
										</div>-->
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
