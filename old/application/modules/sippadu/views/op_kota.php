<?php echo form_dropdown('op_kota',$op_kota,set_value('op_kota',$slc_op_kota),'id="op_kota" class="form-control chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kota").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kecamatan')); ?>",
				data: {op_kota:$("#op_kota").val()},
				success: function(msg){
					$('#dsp_kecamatan').html(msg);
					$('#op_kecamatan').addClass("form-control chosen-select");
				}
		});
	});
</script>

