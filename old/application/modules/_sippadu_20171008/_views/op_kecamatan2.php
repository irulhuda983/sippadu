<?php echo form_dropdown('op_kecamatan2',$op_kecamatan2,set_value('op_kecamatan2',$slc_op_kecamatan2),'id="op_kecamatan2" class="slc" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kecamatan2").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_desa2')); ?>",
				data: {op_kecamatan2:$("#op_kecamatan2").val()},
				success: function(msg){
					$('#dsp_desa2').html(msg);
					$('#op_desa2').addClass("form-control");
				}
		});
	});
</script>

