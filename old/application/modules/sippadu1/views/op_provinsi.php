<?php echo form_dropdown('op_provinsi',$op_provinsi,set_value('op_provinsi',$slc_op_provinsi),'id="op_provinsi" class="slc" style=""'); ?>
<script type="text/javascript">
		
	$("#op_provinsi").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kota')); ?>",
				data: {op_provinsi:$("#op_provinsi").val()},
				success: function(msg){
					$('#dsp_kota').html(msg);
					$('#op_kota').addClass("form-control");
				}
		});
	});
</script>

<!--
<script type="text/javascript">
		
	$("#op_provinsi").change(function(){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule('op_kota')); ?>",
						data: {op_provinsi:$("#op_provinsi").val()},
						success: function(msg){
							$('#dsp_kota').html(msg);
							$('#op_kota').addClass("form-control");
						}
				});
			});
			
			$("#op_kota").change(function(){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule('op_kecamatan')); ?>",
						data: {op_kota:$("#op_kota").val()},
						success: function(msg){
							$('#dsp_kecamatan').html(msg);
							$('#op_kecamatan').addClass("form-control");
						}
				});
			});
			
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


-->

