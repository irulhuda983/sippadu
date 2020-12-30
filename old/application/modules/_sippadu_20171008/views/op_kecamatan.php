<?php echo form_dropdown('op_kecamatan',$op_kecamatan,set_value('op_kecamatan',$slc_op_kecamatan),'id="op_kecamatan" class="slc" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kecamatan").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_desa')); ?>",
				data: {op_kecamatan:$("#op_kecamatan").val()},
				success: function(msg){
					$('#dsp_desa').html(msg);
					$('#op_desa').addClass("form-control");
				}
		});
	});
</script>

