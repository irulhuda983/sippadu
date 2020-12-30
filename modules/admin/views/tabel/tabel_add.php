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
												<label for="" class="col-sm-2 control-label">Nama Tabel</label>
												<div class="col-sm-10"><?php echo form_input('Nm_Tabel',set_value('Nm_Tabel'),'class="form-control"'); ?></div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
											   <div class="col-sm-10"><textarea name="Deskripsi" id="summernote"></textarea></div>
											</div> 
											
											
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kolom Tabel</label>
											    <div class="col-sm-1"><?php echo form_input('Nomor[]',set_value('Nomor[]'),'placeholder="No" class="form-control"'); ?></div>
												<div class="col-sm-4"><?php echo form_input('Kolom[]',set_value('Kolom[]'),'placeholder="Nama Kolom" class="form-control"'); ?></div>
											    <div class="col-sm-2"><?php echo form_input('Sort[]',set_value('Sort[]'),'placeholder="Sortir data ke..." class="form-control"'); ?></div>
											</div> -->
											
											<div class="input_fields_wrap"></div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-4">
													<button type="button" class="btn btn-greensea add_field_button">Tambah Kolom</button>
													<!--<button type="button" class="btn btn-red remove_field_button">Hapus Kolom</button>-->
												</div>
											</div> 
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kategori</label>
												<div class="col-sm-5"><?php echo form_multiselect('op_tabel_kategori[]',$op_tabel_kategori,set_value('op_tabel_kategori[]'),'class="form-control chosen-select"'); ?></div>
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
		
		<script type="text/javascript">
		window.onload=function(){

			var max_fields      = 20;
			var wrapper         = $(".input_fields_wrap"); 
			var add_button      = $(".add_field_button");
			var remove_button   = $(".remove_field_button");

			$(add_button).click(function(e){
				e.preventDefault();
				var id = (wrapper[0].childNodes.length) + 1;
				if(id <= max_fields){
					$(wrapper).append('<div id="el_'+id+'" class="form-group"><label for="" class="col-sm-2 control-label"></label><div class="col-sm-1"><input type="hidden" id="id_'+ id +'" name="ID[]" value="'+id+'" /><input type="text" id="no_'+ id +'" name="Nomor[]" value="'+id+'" class="form-control" placeholder="No" /></div><div class="col-sm-4"><input type="text" id="val_'+ id +'" name="Kolom[]" value=""  class="form-control" placeholder="Nama Kolom" /></div><div class="col-sm-2"><input type="text"  id="sort_'+ id +'"name="Sort[]" value="" class="form-control" placeholder="Sortir data ke..." /></div><div class="col-sm-2"><input type="button" id="remove_'+id+'" class="btn btn-red" onclick="remove('+id+');" value="Hapus" /><input type="button" id="undo_'+id+'" class="btn btn-greensea" onclick="undo('+id+');" value="Undo" style="display:none"/></div></div>');
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
