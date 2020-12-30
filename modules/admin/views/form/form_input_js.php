<div class="tile-body hidden" id="form-add">
<?php echo alert(); ?> 
<?php echo form_open_multipart(fmodule($class_page.'/save'),array('id'=>'form', 'class' => 'form-horizontal', 'role' => 'form')); ?>
	<div class="block-fluid">                        
		<?php 
		$w = '';
		if($data_kolom->num_rows() > 0){
			$w .= form_hidden('ID_Row','0','id="ID_Row" class="form-control"');
			
			foreach($data_kolom->result() as $l){
				$w .= '
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">'.$l->Nm_Col.'</label>
					<div class="col-sm-6">'.form_hidden('col[]',set_value('col[]',$l->ID_Col)).create_form($ID_Form,$l->ID_Col).'</div>
				</div> ';
			}
			$w .= '
			<div class="form-group">
				<label for="" class="col-sm-2 control-label"></label>
				<div class="col-sm-6"><input type="hidden" name="method" value="save" /><input type="hidden" name="ID_Form" value="'.$ID_Form.'" /><input type="submit" name="submit" id="save" class="btn btn-greensea" value="Simpan" /><input type="reset" id="reset" name="reset" class="btn" value="Reset" /></div>
			</div> ';
		
		}
		echo $w;
		?>
	</div>
	</form>
</div>

<script>
$("#form").submit(function(event){
	event.preventDefault(); //prevent default action 
	var post_url = $(this).attr("action"); //get form action url
	var request_method = $(this).attr("method"); //get form GET/POST method
	var form_data = $(this).serialize(); //Encode form elements for submission
	
	var add = $("#add_form").clone();
	var close = $("#close_form").clone();
	$("#add_form").val("Sedang menyimpan data.....");
	$("#close_form").val("Sedang menyimpan data.....");
				
	$.ajax({
		url : '<?php echo site_url(fmodule($class_page.'/save/')); ?>?time=' + new Date().getTime(),
		type: request_method,
		data : form_data
	}).done(function(response){
		//$("#result").html(response);
		reload();
		$("#reset").click();
		$("#add_form").val("Simpan Data Berhasil !").removeClass("btn-blue").addClass("btn-greensea");
		$("#close_form").val("Simpan Data Berhasil !").removeClass("btn-blue").addClass("btn-greensea");
		setTimeout(function() {
			$("#add_form").replaceWith(add);
			$("#close_form").replaceWith(close);
		}, 3000);
	});
	
});


</script>