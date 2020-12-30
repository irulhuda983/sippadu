        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js<?php echo $asset_update; ?>"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jquery/jquery-1.11.2.min.js<?php echo $asset_update; ?>"><\/script>')</script>
		
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/bootstrap/bootstrap.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jRespond/jRespond.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.layout.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/sparkline/jquery.sparkline.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/slimscroll/jquery.slimscroll.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/js/jquery.animsition.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/moment.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/daterangepicker.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/screenfull/screenfull.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/easypiechart/jquery.easypiechart.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/raphael/raphael-min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.carousel.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/js/jquery.dataTables.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/extensions/dataTables.bootstrap.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/chosen/chosen.jquery.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/summernote/summernote.min.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/coolclock.js<?php echo $asset_update; ?>"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/excanvas.js<?php echo $asset_update; ?>"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/tagsinput/bootstrap-tagsinput.js"></script>-->
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.js<?php echo $asset_update; ?>"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/chat.js<?php echo $asset_update; ?>"></script>
 
        <script>
            $(window).load(function(){
                // Initialize Statistics chart
                var data = [{
                    data: [[1,15],[2,40],[3,35],[4,39],[5,42],[6,50],[7,46],[8,49],[9,59],[10,60],[11,58],[12,74]],
                    label: 'Unique Visits',
                    points: {
                        show: true,
                        radius: 4
                    },
                    splines: {
                        show: true,
                        tension: 0.45,
                        lineWidth: 4,
                        fill: 0
                    }
                }, {
                    data: [[1,50],[2,80],[3,90],[4,85],[5,99],[6,125],[7,114],[8,96],[9,130],[10,145],[11,139],[12,160]],
                    label: 'Page Views',
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        lineWidth: 0,
                        fillColor: { colors: [{ opacity: 0.3 }, { opacity: 0.8}] }
                    }
                }];

                var options = {
                    colors: ['#e05d6f','#61c8b8'],
                    series: {
                        shadowSize: 0
                    },
                    legend: {
                        backgroundOpacity: 0,
                        margin: -7,
                        position: 'ne',
                        noColumns: 2
                    },
                    xaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        },
                        position: 'bottom',
                        ticks: [
                            [ 1, 'JAN' ], [ 2, 'FEB' ], [ 3, 'MAR' ], [ 4, 'APR' ], [ 5, 'MAY' ], [ 6, 'JUN' ], [ 7, 'JUL' ], [ 8, 'AUG' ], [ 9, 'SEP' ], [ 10, 'OCT' ], [ 11, 'NOV' ], [ 12, 'DEC' ]
                        ]
                    },
                    yaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        }
                    },
                    grid: {
                        borderWidth: {
                            top: 0,
                            right: 0,
                            bottom: 1,
                            left: 1
                        },
                        borderColor: 'rgba(255,255,255,.3)',
                        margin:0,
                        minBorderMargin:0,
                        labelMargin:20,
                        hoverable: true,
                        clickable: true,
                        mouseActiveRadius:6
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: '%s: %y',
                        defaultTheme: false,
                        shifts: {
                            x: 0,
                            y: 20
                        }
                    }
                };

                $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true,
                    responsive: true
                });

                $('#appointments-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    navigation: true,
                    navigationText : ['<i class=\'fa fa-chevron-left\'></i>','<i class=\'fa fa-chevron-right\'></i>'],
                    singleItem : true
                });
                
                $('#mini-calendar').datetimepicker({
                    inline: true
                });
                $('.widget-todo .todo-list li .checkbox').on('change', function() {
                    var todo = $(this).parents('li');

                    if (todo.hasClass('completed')) {
                        todo.removeClass('completed');
                    } else {
                        todo.addClass('completed');
                    }
                });

                $('#project-progress').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                });
				
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
            });
			
		if($("#tSortable").length > 0)
		 {
			$("#tSortable").dataTable({"iDisplayLength": 100, "aLengthMenu": [10,25,50,100,500,1000], "sPaginationType": "full_numbers","bSort":false});
			
			$("#tSortable_2").dataTable({"iDisplayLength": 5, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null]});
		 }
		 
		$('#enable').click(function(){
			$('<input />').attr('type','hidden').attr('name','enable').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		 
		$('#disable').click(function(){
			$('<input />').attr('type','hidden').attr('name','disable').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		 
		$('#delete').click(function(){
			 if (confirm('Apakah anda yakin akan menghapus data ini?')) {
				$('<input />').attr('type','hidden').attr('name','delete').attr('value','1').appendTo('#form');
				$('#form').submit(); 
			 }
		});
		
		$('#save').click(function(){
			$('<input />').attr('type','hidden').attr('name','save').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
			
		$('#refresh').click(function(){
			$('<input />').attr('type','hidden').attr('name','refresh').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		
		$('#verifikasi').click(function(){
			$('<input />').attr('type','hidden').attr('name','verifikasi').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		 
		$(function() {
			$('.upper').keyup(function() {
				this.value = this.value.toLocaleUpperCase();
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
		
		
		function UpdateUserLog(){
			$.post("<?php echo apps_url(2,fmodule('users/update_user_log')); ?>/?time=" + new Date().getTime());
		}
		
		function CekUserLog(){
			$("#badge_chat").load("<?php echo apps_url(2,fmodule('users/cek_user_log')); ?>/?time=" + new Date().getTime());
		}
		
		function UserListOnline(){
			$("#users_list_online").load("<?php echo apps_url(2,fmodule('users/users_list_online')); ?>/?time=" + new Date().getTime());
		}
		
		function Notifikasi(){
			$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('sippadu/notifikasi')); ?>/?time=" + new Date().getTime(),
				dataType: "json",
				success: function(msg){
					$.each(msg,function(i,item){
						console.log(i,item);
						var FO = item.FO;
						var BO = item.BO;
						var Kabid = item.Kabid;
						var Kadin = item.Kadin;
						var TU = item.TU;
						var Serah = item.Serah;
						if(FO!='0'){	$(".ntf_"+item.CLASS+"_fo").addClass("badge bg-lightred").html(FO);}
						if(BO!='0'){	$(".ntf_"+item.CLASS+"_bo").addClass("badge bg-lightred").html(BO);}
						if(Kabid!='0'){	$(".ntf_"+item.CLASS+"_kabid").addClass("badge bg-lightred").html(Kabid);}
						if(Kadin!='0'){	$(".ntf_"+item.CLASS+"_kadin").addClass("badge bg-lightred").html(Kadin);}
						if(TU!='0'){	$(".ntf_"+item.CLASS+"_tu").addClass("badge bg-lightred").html(TU);}
						if(Serah!='0'){	$(".ntf_"+item.CLASS+"_serah").addClass("badge bg-lightred").html(Serah);}
					});
				}
			});
		};
		
		<?php if(1){ ?>
		Notifikasi();
		UpdateUserLog();
		CekUserLog();
		UserListOnline();
		setInterval(Notifikasi, 60000); 
		setInterval(UpdateUserLog, 60000); 
		setInterval(CekUserLog, 60000); 
		setInterval(UserListOnline, 60000);
		<?php } ?>
		
        </script>
        <!--/ Page Specific Scripts -->