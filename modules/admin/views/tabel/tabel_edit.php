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
												<label for="" class="col-sm-2 control-label">Nama Tabel</label>
												<div class="col-sm-10"><?php echo form_input('Nm_Tabel',set_value('Nm_Tabel',$d->Nm_Tabel),'class="form-control"'); ?></div>
											</div>                         
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
											   <div class="col-sm-10"><textarea name="Deskripsi" id="summernote"><?php echo $d->Deskripsi; ?></textarea></div>
											</div> 
											
											
											<div class="input_fields_wrap">
											<?php 
											$h = '';
											$n = 1;
											if($data_kolom->num_rows() > 0){ 
												foreach($data_kolom->result() as $k){
													$nomor = $n;
													$h .= '<div id="el_'.$nomor.'" class="form-group"><label for="" class="col-sm-2 control-label"></label><div class="col-sm-1">
													<input type="hidden" id="id_col_'.$nomor.'" name="ID_Col[]" value="'.$k->ID_Col.'" />
													<input type="hidden" id="id_'.$nomor.'" name="ID[]" value="'.$nomor.'" />
													<input type="text" id="no_'.$nomor.'" name="Nomor[]" value="'.$nomor.'" class="form-control" placeholder="No" /></div><div class="col-sm-4"><input type="text" id="val_'.$nomor.'" name="Kolom[]" value="'.$k->Nm_Col.'"  class="form-control" placeholder="Nama Kolom" /></div><div class="col-sm-2"><input type="text"  id="sort_'.$nomor.'"name="Sort[]" value="'.$k->Sort_Order.'" class="form-control" placeholder="Sortir data ke..." /></div><div class="col-sm-2"><input type="button" id="remove_'.$nomor.'" class="btn btn-red" onclick="remove('.$nomor.');" value="Hapus" /><input type="button" id="undo_'.$nomor.'" class="btn btn-greensea" onclick="undo('.$nomor.');" value="Undo" style="display:none"/></div></div>';
													++$n;
												}
												echo $h;
											}
											?>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-4">
													<button type="button" class="btn btn-greensea add_field_button">Tambah Kolom</button>
													<input class="btn btn-blue" type="button" id="add" value="Isi Data" onclick="window.location.href='<?php echo site_url(fmodule($class_page.'/data/'.$id)); ?>'"/>
													<!--<button type="button" class="btn btn-red remove_field_button">Hapus Kolom</button>-->
												</div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-5">
													<?php echo imgsrc($d->Image_Raw.'_thumb'.$d->Image_Ext,'tabel',config('main_site')); ?>
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
												<div class="col-sm-5"><?php echo form_multiselect('op_tabel_kategori[]',$op_tabel_kategori,set_value('op_tabel_kategori[]',$slc_op_tabel_kategori),'class="form-control chosen-select"'); ?></div>
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
		
		<?php 
			$x = 0;
			if($data_kolom->num_rows() > 0){
				$x = 1;
			}
		?>
		
		<script type="text/javascript">
		window.onload=function(){

			var max_fields      = 20;
			var wrapper         = $(".input_fields_wrap"); 
			var add_button      = $(".add_field_button");
			var remove_button   = $(".remove_field_button");
			var x				= '<?php echo $x; ?>';

			$(add_button).click(function(e){
				e.preventDefault();
				var id = (wrapper[0].childNodes.length)- Number(x);
				if(id <= max_fields){
					$(wrapper).append('<div id="el_'+id+'" class="form-group"><label for="" class="col-sm-2 control-label"></label><div class="col-sm-1"><input type="hidden" id="id_col_'+id+'" name="ID_Col[]" value="0" /><input type="hidden" id="id_'+ id +'" name="ID[]" value="'+id+'" /><input type="text" id="no_'+ id +'" name="Nomor[]" value="'+id+'" class="form-control" placeholder="No" /></div><div class="col-sm-4"><input type="text" id="val_'+ id +'" name="Kolom[]" value=""  class="form-control" placeholder="Nama Kolom" /></div><div class="col-sm-2"><input type="text"  id="sort_'+ id +'"name="Sort[]" value="" class="form-control" placeholder="Sortir data ke..." /></div><div class="col-sm-2"><input type="button" id="remove_'+id+'" class="btn btn-red" onclick="remove('+id+');" value="Hapus" /><input type="button" id="undo_'+id+'" class="btn btn-greensea" onclick="undo('+id+');" value="Undo" style="display:none"/></div></div>');
				}
			});
			
			$(remove_button).click(function(e){
				e.preventDefault();
				var id = wrapper[0].childNodes.length;
				if(id>0){
					wrapper[0].childNodes[id-1].remove();
				}
			});

		}
		
		function remove(e){
			$('#id_' + e).val('0');
			$('#no_' + e).attr('readonly', true);
			$('#val_' + e).attr('disabled',true);
			$('#sort_' + e).attr('disabled',true);
			$('#remove_' + e).hide();
			$('#undo_' + e).show();
			return false;
		}
		
		function undo(e){
			$('#id_' + e).val(e);
			$('#no_' + e).attr('readonly', false);
			$('#val_' + e).attr('disabled',false);
			$('#sort_' + e).attr('disabled',false);
			$('#remove_' + e).show();
			$('#undo_' + e).hide();
			return false;
		}

		</script>

    </body>
</html>
