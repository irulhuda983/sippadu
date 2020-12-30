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
											$Jn_Menu = 0;
											$ID_Apps = 0;
											
											if($data->num_rows() > 0){ 
												$d = $data->row(); 
												$ID_Menu = $d->ID_Menu; 
												$ID_Parent = $d->ID_Parent; 
												$ID_Kategori = $d->ID_Kategori;
												$Jn_Menu = $d->Jn_Menu;
												$ID_Apps = $d->ID_Apps;
											?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_menu_kategori',$op_menu_kategori,set_value('op_menu_kategori',$d->ID_Kategori),'id="op_menu_kategori" class="form-control chosen-select"'); ?></div>
											</div> 
											
											<span id="dsp_parent">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Parent</label>
												<div class="col-sm-5"><?php echo level_menu_dropdown('op_parent',$d->ID_Parent,'id="op_parent" class="form-control chosen-select"',$d->ID_Menu); ?></div>
											</div>
											</span>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Menu</label>
												<div class="col-sm-6"><?php echo form_input('Nm_Menu',set_value('Nm_Menu',$d->Nm_Menu),'class="form-control"'); ?></div>
											</div>   
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Class Menu</label>
												<div class="col-sm-6"><?php echo form_input('Class_Menu',set_value('Class_Menu',$d->Class_Menu),'id="Class_Menu" class="form-control" placeholder="(Opsional)"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Menu</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Jn_Menu',1,(set_value('Jn_Menu',$d->Jn_Menu)==1 ? TRUE : FALSE),'class="Jn_Menu"'); ?><i></i> Konten </label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Jn_Menu',2,(set_value('Jn_Menu',$d->Jn_Menu)==2 ? TRUE : FALSE),'class="Jn_Menu"'); ?><i></i> Item / Link </label> </div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Jn_Menu',3,(set_value('Jn_Menu',$d->Jn_Menu)==3 ? TRUE : FALSE),'class="Jn_Menu"'); ?><i></i> Frame </label> </div>
											</div>   
											
											<div id="div_url" class="form-group" style="<?php echo (($d->Jn_Menu ==1) ? 'display:none' : ''); ?>">
												<label for="" class="col-sm-2 control-label">Apps / URL</label>
												<div class="col-sm-2"><?php echo form_dropdown('op_apps',$op_apps_active,set_value('op_apps',$d->ID_Apps),'id="op_apps" class="form-control chosen-select"'); ?></div>
												<span id="url_external">
												<div class="col-sm-6"><?php echo form_input('URL',set_value('URL',$d->URL),'id="url" class="form-control" placeholder="http://"'); ?></div>
												</span>
												<span id="url_item">
												<div class="col-sm-2"><input type="button" class="btn btn-blue" value="Pilih Item"  onclick="popup_menu('<?php echo site_url(fmodule('menu/get_item')); ?>')"/></div>
												</span>
											</div>									
											
											<div id="div_jenis_item" class="form-group" style="display:none;">
												<label for="" class="col-sm-2 control-label">Jenis Item</label>
												<div class="col-sm-2" style="display:none;"><?php echo form_input('ID_Config',set_value('ID_Config',$ID_Config),'id="ID_Config" class="form-control" placeholder="- Belum dipilih -" readonly'); ?></div>
												<div class="col-sm-9"><?php echo form_input('Jn_Item',set_value('Jn_Item',$Jn_Item),'id="Jn_Item" class="form-control" placeholder="- Belum dipilih -" readonly'); ?></div>
											</div>

											<div id="div_nama_item" class="form-group" style="display:none;">
												<label for="" class="col-sm-2 control-label">Nama Item</label>
												<div class="col-sm-2" style="display:none;"><?php echo form_input('Item',set_value('Item',$Item),'id="Item" class="form-control" placeholder="- Belum dipilih -" readonly'); ?></div>
												<div class="col-sm-9"><?php echo form_input('Nm_Item',set_value('Nm_Item',$Nm_Item),'id="Nm_Item" class="form-control" placeholder="- Belum dipilih -" readonly'); ?></div>
											</div>											
											  
											<div id="div_fr_judul" class="form-group" style="<?php echo (($d->Jn_Menu !=3) ? 'display:none' : ''); ?>">
												<label for="" class="col-sm-2 control-label">Tampilkan Judul</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Head_Frame',1,(set_value('Head_Frame',$d->Head_Frame)==1 ? TRUE : FALSE),'class="Head_Frame"'); ?><i></i> Ya </label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Head_Frame',0,(set_value('Head_Frame',$d->Head_Frame)==0 ? TRUE : FALSE),'class="Head_Frame"'); ?><i></i> Tidak </label> </div>
											</div> 
											
											<div id="div_fr_width" class="form-group" style="<?php echo (($d->Jn_Menu !=3) ? 'display:none' : ''); ?>">
												<label for="" class="col-sm-2 control-label">Width Frame</label>
												<div class="col-sm-2"><?php echo form_input('W_Frame',set_value('W_Frame',ifnull($d->W_Frame,'75%')),'class="form-control" placeholder="75%"'); ?></div>
											</div>   
											
											<div id="div_fr_height" class="form-group" style="<?php echo (($d->Jn_Menu !=3) ? 'display:none' : ''); ?>">
												<label for="" class="col-sm-2 control-label">Height Frame</label>
												<div class="col-sm-2"><?php echo form_input('H_Frame',set_value('H_Frame',ifnull($d->H_Frame,'1000px')),'class="form-control" placeholder="1000px"'); ?></div>
											</div>   
											 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Konten</label>
											   <div class="col-sm-10"><textarea name="Konten" id="summernote"><?php echo $d->Konten; ?></textarea></div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-5">
													<?php echo imgsrc($d->Image_Raw.'_thumb'.$d->Image_Ext,'menu',config('main_site')); ?>
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
												<div class="input-group datetimepicker">
                                                    <input type="text" name="Time" class="form-control" value="<?php echo TimeFormat($d->Time,'d/m/Y H:i'); ?>" />
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
												</div>
											</div> 
											
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi 1</label>
											   <div class="col-sm-9"><textarea name="Deskripsi1" class="summernote"><?php echo $d->Description1; ?></textarea></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi 2</label>
											   <div class="col-sm-9"><textarea name="Deskripsi2" class="summernote"><?php echo $d->Description2; ?></textarea></div>
											</div>-->
											
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
					url : "<?php echo site_url(fmodule('menu/op_menu_parent/')); ?>?time=" + new Date().getTime(),
					data: {ID_Kategori:$(this).val(),ID_Parent:"<?php echo $ID_Parent; ?>",ID_Menu:"<?php echo $ID_Menu; ?>"},
					success: function(msg){
						$('#dsp_parent').html(msg);
						$('#op_parent').addClass("form-control");
						$('#op_parent').addClass("chosen-select");
						
					}
			});
		});
		
		$(".Jn_Menu").change(function(){
			$("#Class_Menu").removeAttr("readonly");
			var v = $(this).val();
			switch(v){
				default:
					//$("#op_apps").val("0").trigger("change");
					$("#div_url").hide();
					$("#div_op_apps").hide();
					$("#div_fr_width").hide();
					$("#div_fr_height").hide();
					$('#div_jenis_item').hide();
					$('#div_nama_item').hide();
					$('#div_fr_judul').hide();
					break;
				case "2":
					//$("#op_apps").val("0").trigger("change");
					$("#div_url").show();
					$("#div_op_apps").hide();
					$("#div_fr_width").hide();
					$("#div_fr_height").hide();
					$('#div_jenis_item').show();
					$('#div_nama_item').show();
					$('#div_fr_judul').hide();
					break;
				case "3":
					//$("#op_apps").val("0").trigger("change");
					$("#div_url").show();
					$("#div_op_apps").show();
					$("#div_fr_width").show();
					$("#div_fr_height").show();
					$('#div_jenis_item').show();
					$('#div_nama_item').show();
					$('#div_fr_judul').show();
					break;
			}
		});
		
		$("#op_apps").change(function(){
			$("#Class_Menu").removeAttr("readonly");
			var v = $(this).val();
			switch(v){
				default:
					$('#url').attr("placeholder", "berita/open/1");
					$('#url_external').hide();
					$('#url_item').show();
					$('#div_jenis_item').show();
					$('#div_nama_item').show();
					break;
				case "0":
					$('#url').attr("placeholder", "http://www.google.com");
					$('#url_external').show();
					$('#url_item').hide();
					$('#div_jenis_item').hide();
					$('#div_nama_item').hide();
					break;
			}
		});
		
		$("#op_menu_kategori").val("<?php echo set_value('op_menu_kategori',$ID_Kategori); ?>").trigger("change");
		<?php if($Jn_Menu > 1){ ?>
		$("#op_apps").val("<?php echo set_value('op_apps',$ID_Apps); ?>").trigger("change");
		<?php } ?>
		</script>
		
    </body>
</html>
