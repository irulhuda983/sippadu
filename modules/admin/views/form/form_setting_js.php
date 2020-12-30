
		<div class="input_fields_wrap">
		<?php 
		$h = '';
		$nomor = 1;
		if($data_form_option->num_rows() > 0){ 
			foreach($data_form_option->result() as $k){
				$h .= '<div id="el_'.$nomor.'" class="form-group"><label for="" class="col-sm-2 control-label"></label><div class="col-sm-1">
				<input type="hidden" id="id_col_'.$nomor.'" name="ID_Col[]" value="'.$k->ID_Option.'" />
				<input type="hidden" id="id_'.$nomor.'" name="ID[]" value="'.$nomor.'" />
				<input type="text" id="no_'.$nomor.'" name="Nomor[]" value="'.$nomor.'" class="form-control" placeholder="No" /></div><div class="col-sm-4"><input type="text" id="val_'.$nomor.'" name="Kolom[]" value="'.$k->Nm_Option.'"  class="form-control" placeholder="Nama Option" /></div><div class="col-sm-1"><input type="text"  id="sort_'.$nomor.'"name="Sort[]" value="'.$k->Default.'" class="form-control" placeholder="Sortir data ke..." /></div><div class="col-sm-1"><input type="button" id="remove_'.$nomor.'" class="btn btn-red" onclick="remove('.$nomor.');" value="Hapus" /><input type="button" id="undo_'.$nomor.'" class="btn btn-greensea" onclick="undo('.$nomor.');" value="Undo" style="display:none"/></div></div>';
				++$nomor;
			}
			echo $h;
		}
		?>
		</div>
		
		
		<div class="form-group">
			<label for="" class="col-sm-2 control-label"></label>
			<div class="col-sm-4">
				<button type="button" class="btn btn-greensea add_field_button">Tambah Kolom</button>
			</div>
		</div> 
		
		<script type="text/javascript">
		window.onload=function(){

			var max_fields      = 20;
			var wrapper         = $(".input_fields_wrap"); 
			var add_button      = $(".add_field_button");
			var remove_button   = $(".remove_field_button");

			$(add_button).click(function(e){
				e.preventDefault();
				var id = (wrapper[0].childNodes.length)-1;
				if(id <= max_fields){
					$(wrapper).append('<div id="el_'+id+'" class="form-group"><label for="" class="col-sm-2 control-label"></label><div class="col-sm-1"><input type="hidden" id="id_col_'+id+'" name="ID_Col[]" value="0" /><input type="hidden" id="id_'+ id +'" name="ID[]" value="'+id+'" /><input type="text" id="no_'+ id +'" name="Nomor[]" value="'+id+'" class="form-control" placeholder="No" /></div><div class="col-sm-4"><input type="text" id="val_'+ id +'" name="Kolom[]" value=""  class="form-control" placeholder="Nama Option" /></div><div class="col-sm-1"><input type="text"  id="sort_'+ id +'"name="Sort[]" value="0" class="form-control" placeholder="Sortir data ke..." /></div><div class="col-sm-1"><input type="button" id="remove_'+id+'" class="btn btn-red" onclick="remove('+id+');" value="Hapus" /><input type="button" id="undo_'+id+'" class="btn btn-greensea" onclick="undo('+id+');" value="Undo" style="display:none"/></div></div>');
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
		
		function setting(e){
			var id = "<?php echo $ID_Form; ?>";
			myWindow=window.open("<?php echo site_url(fmodule($class_page.'/setting_edit/')); ?>" + id + '/' + e,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}

		</script>