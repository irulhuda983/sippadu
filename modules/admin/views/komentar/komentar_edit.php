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
												<label for="" class="col-sm-2 control-label">Nama</label>
												<div class="col-sm-10"><?php echo form_input('Name',set_value('Name',$d->Name),'class="form-control"'); ?></div>
											</div>   

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Isi Komentar</label>
											   <div class="col-sm-10"><textarea name="Message" id="summernote"><?php echo $d->Message; ?></textarea></div>
											</div> 
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-10"><?php echo form_input('Address',set_value('Address',$d->Address),'class="form-control"'); ?></div>
											</div>   											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Phone</label>
												<div class="col-sm-10"><?php echo form_input('Phone',set_value('Phone',$d->Phone),'class="form-control"'); ?></div>
											</div>   
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10"><?php echo form_input('Email',set_value('Email',$d->Email),'class="form-control"'); ?></div>
											</div>   
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">URL</label>
												<div class="col-sm-10"><?php echo form_input('URL',set_value('URL',$d->URL),'class="form-control"'); ?></div>
											</div>   
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Time</label>
												<div class="col-sm-3">
												<div class="input-group datetimepicker">
                                                    <input type="text" name="Time" class="form-control" value="<?php echo TimeFormat($d->Time,'d/m/Y H:i'); ?>" />
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
