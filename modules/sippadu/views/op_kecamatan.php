<?php echo form_dropdown('op_kecamatan',$op_kecamatan,set_value('op_kecamatan',$slc_op_kecamatan),'id="op_kecamatan" class="chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kecamatan").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('sippadu/op_desa')); ?>/?time=" + new Date().getTime(),
				data: {op_kecamatan:$("#op_kecamatan").val()},
				success: function(msg){
					$('#dsp_desa').html(msg);
					$('#op_desa').addClass("form-control chosen-select");
				}
		});
	});
</script>

