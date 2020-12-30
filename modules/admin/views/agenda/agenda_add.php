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
												<label for="" class="col-sm-2 control-label">Nama Agenda</label>
												<div class="col-sm-10"><?php echo form_input('Judul',set_value('Judul'),'class="form-control"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Mulai</label>
												<div class="col-sm-3">
												<div class="input-group datetimepicker">
                                                    <input type="text" name="Time_Mulai" class="form-control" value="<?php echo set_value('Time_Mulai',TimeNow('d/m/Y H:i')); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div>  

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Berakhir</label>
												<div class="col-sm-3">
												<div class="input-group datetimepicker">
                                                    <input type="text" name="Time_Akhir" class="form-control" value="<?php echo set_value('Time_Akhir',TimeNow('d/m/Y H:i')); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div>  
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Tampilkan Jam</label>
												<div class="col-sm-2">
													<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_checkbox('Tampilkan_Jam',1,TRUE); ?><i></i> Ya</label>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Acara Sehari Penuh</label>
												<div class="col-sm-2">
													<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_checkbox('All_Day',1,''); ?><i></i> Ya</label>
												</div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Lokasi</label>
												<div class="col-sm-10"><?php echo form_input('Lokasi',set_value('Lokasi'),'class="form-control"'); ?></div>
											</div>

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
											   <div class="col-sm-10"><textarea name="Konten" id="summernote"></textarea></div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_multiselect('op_agenda_kategori[]',$op_agenda_kategori,set_value('op_agenda_kategori[]'),'class="form-control chosen-select"'); ?></div>
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
