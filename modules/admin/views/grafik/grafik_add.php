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
												<label for="" class="col-sm-2 control-label">Nama Grafik</label>
												<div class="col-sm-10"><?php echo form_input('Nm_Grafik',set_value('Nm_Grafik'),'class="form-control"'); ?></div>
											</div>                         
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
												<div class="col-sm-10"><?php echo form_input('Deskripsi',set_value('Deskripsi'),'class="form-control"'); ?></div>
											</div>  
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Konten</label>
											   <div class="col-sm-10"><textarea name="Konten" id="summernote"></textarea></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Grafik</label>
												<div class="col-sm-3"><?php echo form_dropdown('Jn_Grafik',$op_grafik_jenis, set_value('Jn_Grafik'),'class="form-control chosen-select"'); ?></div>
											</div>                 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Series Nama</label>
												<div class="col-sm-4"><?php echo form_input('Series_Nama',set_value('Series_Nama'),'class="form-control"'); ?></div>
											</div>  
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Series Angka</label>
												<div class="col-sm-4"><?php echo form_input('Series_Angka',set_value('Series_Angka'),'class="form-control"'); ?></div>
											</div>           
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Satuan</label>
												<div class="col-sm-4"><?php echo form_input('Satuan',set_value('Satuan'),'placeholder="" class="form-control"'); ?></div>
											</div>                          
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pembagi (Opsional)</label>
												<div class="col-sm-4"><?php echo form_input('Pembagi',set_value('Pembagi'),'class="form-control"'); ?></div>
											</div>  
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Urut Berdasarkan</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Sort_Order_By','ID',(set_value('Sort_Order_By')=='ID' ? TRUE : FALSE)); ?><i></i> ID </label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Sort_Order_By','Nm_Data',(set_value('Sort_Order_By')=='Nm_Data' ? TRUE : FALSE)); ?><i></i> Nama Data </label> </div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Sort_Order_By','Angka_Data',(set_value('Sort_Order_By')=='Angka_Data' ? TRUE : FALSE)); ?><i></i> Angka Data </label> </div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Sort_Order_By','Sort_Order',(set_value('Sort_Order_By')=='Sort_Order' ? TRUE : FALSE)); ?><i></i> Sort Order </label> </div>
											</div>   
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Urutan</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Asc_Desc','ASC',(set_value('Asc_Desc')=='ASC' ? TRUE : FALSE)); ?><i></i> Kecil ke Besar </label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Asc_Desc','DESC',(set_value('Sort_Order_By')=='DESC' ? TRUE : FALSE)); ?><i></i> Besar ke Kecil </label> </div>
											</div>   
											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_multiselect('op_grafik_kategori[]',$op_grafik_kategori,set_value('op_grafik_kategori[]'),'class="form-control chosen-select"'); ?></div>
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
