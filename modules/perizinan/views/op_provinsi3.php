<?php echo form_dropdown('op_provinsi3',$op_provinsi3,set_value('op_provinsi3',$slc_op_provinsi3),'id="op_provinsi3" class="chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_provinsi3").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('perizinan/op_kota3')); ?>/?time=" + new Date().getTime(),
				data: {op_provinsi3:$("#op_provinsi3").val()},
				success: function(msg){
					$('#dsp_kota3').html(msg);
					$('#op_kota3').addClass("form-control chosen-select");
				}
		});
	});
</script>


