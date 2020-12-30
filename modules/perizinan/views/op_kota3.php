<?php echo form_dropdown('op_kota3',$op_kota3,set_value('op_kota3',$slc_op_kota3),'id="op_kota3" class="chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_kota3").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('perizinan/op_kecamatan3')); ?>/?time=" + new Date().getTime(),
				data: {op_kota3:$("#op_kota3").val()},
				success: function(msg){
					$('#dsp_kecamatan3').html(msg);
					$('#op_kecamatan3').addClass("form-control chosen-select");
				}
		});
	});
</script>

