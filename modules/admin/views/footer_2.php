		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js<?php echo $asset_update; ?>"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jquery/jquery-1.11.2.min.js<?php echo $asset_update; ?>"><\/script>')</script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/bootstrap/bootstrap.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jRespond/jRespond.min.js<?php echo $asset_update; ?>"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.layout.min.js<?php echo $asset_update; ?>"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/rickshaw/rickshaw.min.js<?php echo $asset_update; ?>"></script>-->
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/sparkline/jquery.sparkline.min.js<?php echo $asset_update; ?>"></script>-->
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/slimscroll/jquery.slimscroll.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/js/jquery.animsition.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/moment.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/daterangepicker.js<?php echo $asset_update; ?>"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/screenfull/screenfull.min.js<?php echo $asset_update; ?>"></script>-->
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/flot/jquery.flot.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/flot-spline/jquery.flot.spline.min.js<?php echo $asset_update; ?>"></script>-->
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/easypiechart/jquery.easypiechart.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/raphael/raphael-min.js<?php echo $asset_update; ?>"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/morris/morris.min.js<?php echo $asset_update; ?>"></script>-->
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.carousel.min.js<?php echo $asset_update; ?>"></script>-->
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/js/jquery.dataTables.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/extensions/dataTables.bootstrap.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/chosen/chosen.jquery.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/summernote/summernote.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/filestyle/bootstrap-filestyle.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/tagsinput/bootstrap-tagsinput.js<?php echo $asset_update; ?>"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/coolclock.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/excanvas.js<?php echo $asset_update; ?>"></script>-->
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/autoNumeric.js<?php echo $asset_update; ?>"></script>
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.js<?php echo $asset_update; ?>"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/chat.js<?php echo $asset_update; ?>"></script>
        <!--/ custom javascripts -->








        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                
                //load wysiwyg editor
                $('#summernote').summernote({
                    height: 200,   //set editable area's height
					width: "100%",                 // set editor height
					minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					dialogsInBody: true
                });
				
				$('.summernote').summernote({
                    height: 200,   //set editable area's height
					width: "100%",                 // set editor height
					minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					dialogsInBody: true
                });
				
				/*
				$('.summernote').summernote({
                    toolbar: [
                        //['style', ['style']], // no style button
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        //['insert', ['picture', 'link']], // no insert buttons
                        //['table', ['table']], // no table button
                        //['help', ['help']] //no help button
                    ],
                    height: 143   //set editable area's height
                });*/
				
				$(".tags").tagsinput('items');
  
                //*load wysiwyg editor
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
							url : "<?php echo site_url(fmodule('op_kota')); ?>?time=" + new Date().getTime(),
							data: {op_provinsi:$("#op_provinsi").val()},
							success: function(msg){
								$('#dsp_kota').html(msg);
								$('#op_kota').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kota").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('op_kecamatan')); ?>?time=" + new Date().getTime(),
							data: {op_kota:$("#op_kota").val()},
							success: function(msg){
								$('#dsp_kecamatan').html(msg);
								$('#op_kecamatan').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kecamatan").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('op_desa')); ?>?time=" + new Date().getTime(),
							data: {op_kecamatan:$("#op_kecamatan").val()},
							success: function(msg){
								$('#dsp_desa').html(msg);
								$('#op_desa').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_provinsi2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('op_kota2')); ?>?time=" + new Date().getTime(),
							data: {op_provinsi2:$("#op_provinsi2").val()},
							success: function(msg){
								$('#dsp_kota2').html(msg);
								$('#op_kota2').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kota2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('op_kecamatan2')); ?>?time=" + new Date().getTime(),
							data: {op_kota2:$("#op_kota2").val()},
							success: function(msg){
								$('#dsp_kecamatan2').html(msg);
								$('#op_kecamatan2').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kecamatan2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('op_desa2')); ?>?time=" + new Date().getTime(),
							data: {op_kecamatan2:$("#op_kecamatan2").val()},
							success: function(msg){
								$('#dsp_desa2').html(msg);
								$('#op_desa2').addClass("form-control chosen-select");
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
				
				
				//$(".tags").tagsinput('items');
            });
			
			
			function UpdateUserLog(){
				$.post("<?php echo apps_url(2,fmodule('users/update_user_log/')); ?>?time=" + new Date().getTime());
			}
			
			function CekUserLog(){
				$("#badge_chat").load("<?php echo apps_url(2,fmodule('users/cek_user_log/')); ?>?time=" + new Date().getTime());
			}
			
			function UserListOnline(){
				$("#users_list_online").load("<?php echo apps_url(2,fmodule('users/users_list_online/')); ?>?time=" + new Date().getTime());
			}
			
			UpdateUserLog();
			CekUserLog();
			UserListOnline();
			setInterval(UpdateUserLog, 10000); 
			setInterval(CekUserLog, 10000); 
			setInterval(UserListOnline, 10000); 
		
		/*$('#save').click(function(){
			$('<input />').attr('type','hidden').attr('name','save').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});*/
        </script>