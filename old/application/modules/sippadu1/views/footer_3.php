
				</td>
			</tr>
		</table>
		
		<table width="964" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="22" align="right" valign="middle" style="border-radius:5px; box-shadow: 0 0 3px rgba(0, 0, 0, .5); font-family:Questrial;" bgcolor="#034B7A" class="style15">&copy;2017 SIPPADU - System Layanan Perijinan Terpadu Bojonegoro&nbsp;</td>
			</tr>
		</table>
		
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js"></script>
		<script>
            $(window).load(function(){
				
				$(function() {
					$('.upper').keyup(function() {
						this.value = this.value.toLocaleUpperCase();
					});
				});
				
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
				
				$("#op_kota2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('op_kecamatan2')); ?>",
							data: {op_kota2:$("#op_kota2").val()},
							success: function(msg){
								$('#dsp_kecamatan2').html(msg);
								$('#op_kecamatan2').addClass("form-control");
							}
					});
				});
				
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
				
				
				$('.autonumber').keyup(function(){
					var separator = ".";
					a = this.value;
					b = a.replace(/[^\d]/g,"");
					//b = a.replace(/[^0-9.]/g,"");
					c = "";
					panjang = b.length;
					j = 0;
					for (i = panjang; i > 0; i--) {
						j = j + 1;
						if (((j % 3) == 1) && (j != 1)) {
							c = b.substr(i-1,1) + separator + c;
						} else {
							c = b.substr(i-1,1) + c;
						}
					}
					this.value = c;
				});
				
            });
			
			
        </script>
		
    </body>
</html>