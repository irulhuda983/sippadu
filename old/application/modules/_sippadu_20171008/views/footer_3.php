		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jRespond/jRespond.min.js"></script>

        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.layout.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/rickshaw/rickshaw.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/sparkline/jquery.sparkline.min.js"></script>-->

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/daterangepicker.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/screenfull/screenfull.min.js"></script>

        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>-->

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/raphael/raphael-min.js"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/morris/morris.min.js"></script>-->

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/chosen/chosen.jquery.min.js"></script>-->

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/summernote/summernote.min.js"></script>

        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/coolclock.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/excanvas.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.js"></script>
        <!--/ custom javascripts -->



        <script>
            $(window).load(function(){
				
				$('#delete').click(function(){
					$('<input />').attr('type','hidden').attr('name','delete').attr('value','1').appendTo('#form');
					$('#form').submit(); 
				});
		 
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