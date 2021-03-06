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
												<div class="col-sm-10"><?php echo form_input('Nama',set_value('Nama',$d->Nama),'class="form-control"'); ?></div>
											</div>  

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-10"><?php echo form_input('Tempat_Lahir',set_value('Tempat_Lahir',$d->Tempat_Lahir),'class="form-control"'); ?></div>
											</div>				

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
												<div class="col-sm-3">
												<div class="input-group datepicker">
                                                    <input type="text" name="Tgl_Lahir" class="form-control" value="<?php echo set_value('Tgl_Lahir',TimeFormat($d->Tgl_Lahir, 'd/m/Y')); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-10"><?php echo form_input('Alamat',set_value('Alamat',$d->Alamat),'class="form-control"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Telepon</label>
												<div class="col-sm-10"><?php echo form_input('Telepon',set_value('Telepon',$d->Telepon),'class="form-control"'); ?></div>
											</div>	
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10"><?php echo form_input('Email',set_value('Email',$d->Email),'class="form-control"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Website</label>
												<div class="col-sm-10"><?php echo form_input('Website',set_value('Website',$d->Website),'class="form-control"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jabatan</label>
												<div class="col-sm-10"><?php echo form_input('Jabatan',set_value('Jabatan',$d->Jabatan),'class="form-control"'); ?></div>
											</div>  											

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Keterangan</label>
											   <div class="col-sm-10"><textarea name="Keterangan" id="summernote"><?php echo $d->Keterangan; ?></textarea></div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-5">
													<?php echo imgsrc($d->Image_Raw.'_thumb'.$d->Image_Ext,'anggota',config('main_site')); ?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
												<div class="col-sm-2">
													<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_checkbox('hapus_image',1,''); ?><i></i> Hapus Gambar</label>
												</div>
											</div>
  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_multiselect('op_anggota_kategori[]',$op_anggota_kategori,set_value('op_anggota_kategori[]',$slc_op_anggota_kategori),'class="form-control chosen-select"'); ?></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tags</label>
												<div class="col-sm-10"><?php echo form_input('Tags',set_value('Tags',$slc_tags),'class="form-control tags"'); ?></div>
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
