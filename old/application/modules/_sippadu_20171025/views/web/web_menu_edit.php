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
											<?php 
											$ID_Menu = 0; 
											$ID_Parent = 0; 
											$ID_Kategori = 0; 
											
											if($data->num_rows() > 0){ $d = $data->row(); $ID_Menu = $d->ID_Menu; $ID_Parent = $d->ID_Parent; $ID_Kategori = $d->ID_Kategori;?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_menu_kategori',$op_menu_kategori,set_value('op_menu_kategori',$d->ID_Kategori),'id="op_menu_kategori" class="form-control chosen-select"'); ?></div>
											</div> 
											
											<span id="dsp_parent">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Parent</label>
												<div class="col-sm-5"><?php echo level_menu_dropdown('op_parent',$d->ID_Parent,'class="form-control chosen-select"',$d->ID_Menu); ?></div>
											</div>
											</span>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Menu</label>
												<div class="col-sm-6"><?php echo form_input('Nm_Menu',set_value('Nm_Menu',$d->Nm_Menu),'class="form-control"'); ?></div>
											</div>   
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Class Menu</label>
												<div class="col-sm-6"><?php echo form_input('Class_Menu',set_value('Class_Menu',$d->Class_Menu),'class="form-control"'); ?></div>
											</div>   
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Menu</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Jn_Menu',1,(set_value('Jn_Menu',$d->Jn_Menu)==1 ? TRUE : FALSE)); ?><i></i> Konten </label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Jn_Menu',2,(set_value('Jn_Menu',$d->Jn_Menu)==2 ? TRUE : FALSE)); ?><i></i> URL </label> </div>
											</div>   
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">URL</label>
												<div class="col-sm-10"><?php echo form_input('URL',set_value('URL',$d->URL),'class="form-control" placeholder="http://"'); ?></div>
											</div>   
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Konten</label>
											   <div class="col-sm-10"><textarea name="Konten" id="summernote"><?php echo $d->Konten; ?></textarea></div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-5">
													<?php echo imgsrc($d->Image_Raw.'_thumb'.$d->Image_Ext,'menu'); ?>
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
												<label for="" class="col-sm-2 control-label">Time</label>
												<div class="col-sm-3">
												<div class="input-group datepicker">
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
		
		<script>
		$("#op_menu_kategori").change(function(){
			$.ajax({
					type: "POST",
					url : "<?php echo site_url(fmodule('web/op_menu_parent')); ?>",
					data: {ID_Kategori:$(this).val(),ID_Parent:"<?php echo $ID_Parent; ?>",ID_Menu:"<?php echo $ID_Menu; ?>"},
					success: function(msg){
						$('#dsp_parent').html(msg);
						$('#op_parent').addClass("form-control chosen-select");
					}
			});
		});
		
		$("#op_menu_kategori").val("<?php echo $ID_Kategori; ?>").trigger("change");
		</script>
		
    </body>
</html>
