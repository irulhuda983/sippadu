<?php echo form_dropdown('op_kota2',$op_kota2,set_value('op_kota2',$slc_op_kota2),'id="op_kota2" class="chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kota2").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kecamatan2')); ?>/?time=" + new Date().getTime(),
				data: {op_kota2:$("#op_kota2").val()},
				success: function(msg){
					$('#dsp_kecamatan2').html(msg);
					$('#op_kecamatan2').addClass("form-control chosen-select");
				}
		});
	});
</script>

