<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
		<?php if($this->session->flashdata('WindowClose')): ?>
		<script type="text/javascript">
			window.close();
		</script>
		<?php endif; ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<section class="tile">
				<div class="tile-header dvd dvd-btm">
					<h1 class="custom-font"><?php echo $title; ?></h1>
				</div>
				<div class="tile-body">
					<?php echo alert(); ?> 
					<?php echo form_open('',array('id'=>'form','class' => 'form-horizontal', 'role' => 'form')); ?>
											   
							<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
							
							<div class="form-group" id="">
								<label for="" class="col-sm-2 control-label">Field</label>
							   <div class="col-sm-4"><input type="text"  name="Nm_Col[]" value="<?php echo $Nm_Col; ?>"  class="form-control" placeholder="Nama Kolom" disabled /></div>
							</div> 
							
							<div class="form-group" id="">
								<label for="" class="col-sm-2 control-label">Type</label>
							   <div class="col-sm-4"><?php echo form_dropdown('op_form_type',$op_form_type,set_value('op_form_type',$slc_op_form_type),'id="op_form_type" class="form-control chosen-select" onchange="cek();"'); ?></div>
							</div> 
							
							<div id="result"></div>
							<div class="input_fields_wrap" style="display:none;">
							<?php 
							$h = '';
							$nomor = 1;
							if($data_form_option->num_rows() > 0){ 
								foreach($data_form_option->result() as $k){
									$h .= '
									<div id="el_'.$nomor.'" class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-1">
											<input type="hidden" id="id_col_'.$nomor.'" name="ID_Option[]" value="'.$k->ID_Option.'" />
											<input type="hidden" id="id_'.$nomor.'" name="ID[]" value="'.$nomor.'" />
											<input type="text" id="no_'.$nomor.'" name="Nomor[]" value="'.$nomor.'" class="form-control" placeholder="No" />
										</div>
										<div class="col-sm-4">
											<input type="text" id="val_'.$nomor.'" name="Nm_Option[]" value="'.$k->Nm_Option.'"  class="form-control" placeholder="Nama Option" />
										</div>
										<div class="col-sm-2">
											<label class="checkbox checkbox-custom-alt"><input type="radio" name="Default" value="'.$k->ID_Option.'" '.(ifnull($k->Default,0)==1 ? 'checked' : '').'/><i></i> Default</label>
										</div>
										<div class="col-sm-1">
											<input type="button" id="remove_'.$nomor.'" class="btn btn-red" onclick="remove('.$nomor.');" value="Hapus" />
											<input type="button" id="undo_'.$nomor.'" class="btn btn-greensea" onclick="undo('.$nomor.');" value="Undo" style="display:none"/>
										</div>
									</div>';
									++$nomor;
								}
								echo $h;
							}
							?>
							</div>
							
							<div class="form-group btn-tambah" style="display:none;">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-4">
									<button type="button" class="btn btn-greensea add_field_button">Tambah Kolom</button>
								</div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Keterangan</label>
								<div class="col-sm-10"><textarea name="Keterangan" id="summernote"><?php echo set_value('Keterangan',$Keterangan); ?></textarea></div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<input type="hidden" name="apply" class="btn btn-blue" value="1" />
									<input type="button" name="save" class="btn btn-blue" onclick="simpan(<?php echo $ID_Col; ?>);" value="Simpan" />
									<!--<input type="button" name="saveclose" class="btn btn-blue" onclick="simpan_close(<?php echo $ID_Col; ?>);" value="Simpan & Tutup" />-->
									<input class="btn btn-blue" type="button" name="close" value="Tutup" onclick="window.close()"/>
								</div>							
							</div>
							
							
							<?php //} ?>
					</form>
				</div>
			</section>
        </div>
		<?php $this->load->view('footer_2'); ?>
		
		<?php 
			$x = 0;
			if($data_form_option->num_rows() > 0){
				$x = $data_form_option->num_rows();
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
				var id = (wrapper[0].childNodes.length) - Number(x);
				if(id <= max_fields){
					$(wrapper).append('<div id="el_'+id+'" class="form-group"><label for="" class="col-sm-2 control-label"></label><div class="col-sm-1"><input type="hidden" id="id_col_'+id+'" name="ID_Option[]" value="0" /><input type="hidden" id="id_'+ id +'" name="ID[]" value="'+id+'" /><input type="text" id="no_'+ id +'" name="Nomor[]" value="'+id+'" class="form-control" placeholder="No" /></div><div class="col-sm-4"><input type="text" id="val_'+ id +'" name="Nm_Option[]" value=""  class="form-control" placeholder="Nama Option" /></div><div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><input type="radio" name="Default" value="1" /><i></i> Default</label></div><div class="col-sm-1"><input type="button" id="remove_'+id+'" class="btn btn-red" onclick="remove('+id+');" value="Hapus" /><input type="button" id="undo_'+id+'" class="btn btn-greensea" onclick="undo('+id+');" value="Undo" style="display:none"/></div></div>');
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
		
		
		$("#op_form_type").change(function(){
			var op = $(this).val();
			if(op > 3){
				$(".input_fields_wrap").show();
				$(".btn-tambah").show();
			}
			else{
				$(".input_fields_wrap").hide();
				$(".btn-tambah").hide();
			}
		});
		
		
		function simpan(e){
			var a1 = document.getElementById('op_form_type');
			var txt = a1.options[a1.selectedIndex].text;
			var a2 = window.opener.document.getElementById('type_'+e);
			a2.value = txt;
			$('<input />').attr('type','hidden').attr('name','save').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		}
		
		/* function simpan_close(e){
			var a1 = document.getElementById('op_form_type');
			var txt = a1.options[a1.selectedIndex].text;
			var a2 = window.opener.document.getElementById('type_'+e);
			a2.value = txt;
			$('<input />').attr('type','hidden').attr('name','saveclose').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		} */
		
		<?php if($slc_op_form_type > 0){ ?>
		$("#op_form_type").val("<?php echo $slc_op_form_type; ?>").trigger("change");
		<?php } ?>
		

		</script>
    </body>
</html>
