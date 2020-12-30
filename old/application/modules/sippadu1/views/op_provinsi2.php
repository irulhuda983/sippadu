<?php echo form_dropdown('op_provinsi2',$op_provinsi2,set_value('op_provinsi2',$slc_op_provinsi2),'id="op_provinsi2" class="slc" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_provinsi2").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kota2')); ?>",
				data: {op_provinsi2:$("#op_provinsi2").val()},
				success: function(msg){
					$('#dsp_kota2').html(msg);
					$('#op_kota2').addClass("form-control");
				}
		});
	});
</script>


