<?php echo form_dropdown('op_kecamatan3',$op_kecamatan3,set_value('op_kecamatan3',$slc_op_kecamatan3),'id="op_kecamatan3" class="chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kecamatan3").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('perizinan/op_desa3')); ?>/?time=" + new Date().getTime(),
				data: {op_kecamatan3:$("#op_kecamatan3").val()},
				success: function(msg){
					$('#dsp_desa3').html(msg);
					$('#op_desa3').addClass("form-control chosen-select");
				}
		});
	});
</script>

