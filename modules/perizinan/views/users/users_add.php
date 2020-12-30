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
												<div class="col-sm-2">Username:</div>
												<div class="col-sm-6"><input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>"/></div>
											</div>                         

											<div class="form-group">
												<div class="col-sm-2">Password:</div>
												<div class="col-sm-6"><input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"/></div>                         
											</div> 
											
											<div class="form-group">
												<div class="col-sm-2">Konfirmasi Password:</div>
												<div class="col-sm-6"><input type="password" name="passwordconf" class="form-control" value="<?php echo set_value('passwordconf'); ?>"/></div>                         
											</div> 

											<div class="form-group">
												<div class="col-sm-2">Nama Lengkap:</div>
											   <div class="col-sm-6"><input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>"/></div>
											</div>  
											
											<div class="form-group">
												<div class="col-sm-2">Level:</div>
											   <div class="col-sm-6"><?php echo form_dropdown('op_level',$op_level,set_value('op_level'),'class="chosen-select form-control" style="width:100%"'); ?></div>
											</div>

											<div class="form-group">
												<div class="col-sm-2">Group:</div>
											   <div class="col-sm-6"><?php echo form_dropdown('op_group',$op_group,set_value('op_group'),'class="chosen-select form-control" style="width:100%"'); ?></div>
											</div> 	

											<div class="form-group">
												<div class="col-sm-2">Auth Mode:</div>
											   <div class="col-sm-6"><?php echo form_dropdown('op_auth_mode',$op_auth_mode,set_value('op_auth_mode'),'class="chosen-select form-control" style="width:100%"'); ?></div>
											</div>								
											
											<div class="form-group">
												<div class="col-sm-2"></div>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn" value="Simpan" /></div>							
											</div>
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
