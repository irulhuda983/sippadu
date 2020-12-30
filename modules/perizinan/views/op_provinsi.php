<?php echo form_dropdown('op_provinsi',$op_provinsi,set_value('op_provinsi',$slc_op_provinsi),'id="op_provinsi" class="chosen-select" style="width:100%;"'); ?>
<script type="text/javascript">
		
	$("#op_provinsi").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('perizinan/op_kota')); ?>/?time=" + new Date().getTime(),
				data: {op_provinsi:$("#op_provinsi").val()},
				success: function(msg){
					$('#dsp_kota').html(msg);
					$('#op_kota').addClass("form-control chosen-select");
				}
		});
	});
</script>

<!--
<script type="text/javascript">
		
	$("#op_provinsi").change(function(){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule('sippadu/op_kota')); ?>/?time=" + new Date().getTime(),
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
						url : "<?php echo site_url(fmodule('sippadu/op_kecamatan')); ?>/?time=" + new Date().getTime(),
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
						url : "<?php echo site_url(fmodule('sippadu/op_desa')); ?>/?time=" + new Date().getTime(),
						data: {op_kecamatan:$("#op_kecamatan").val()},
						success: function(msg){
							$('#dsp_desa').html(msg);
							$('#op_desa').addClass("form-control");
						}
				});
			});
</script>


-->

