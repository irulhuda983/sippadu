        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.layout.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/chosen/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/summernote/summernote.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/coolclock.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/excanvas.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.js"></script>
 
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

                /*var plot = $.plot($("#statistics-chart"), data, options);

                $(window).resize(function() {
                    // redraw the graph in the correctly sized div
                    plot.resize();
                    plot.setupGrid();
                    plot.draw();
                });*/
                // * Initialize Statistics chart

                //Initialize morris chart
                /*Morris.Donut({
                    element: 'browser-usage',
                    data: [
                        {label: 'Chrome', value: 25, color: '#00a3d8'},
                        {label: 'Safari', value: 20, color: '#2fbbe8'},
                        {label: 'Firefox', value: 15, color: '#72cae7'},
                        {label: 'Opera', value: 5, color: '#d9544f'},
                        {label: 'Internet Explorer', value: 10, color: '#ffc100'},
                        {label: 'Other', value: 25, color: '#1693A5'}
                    ],
                    resize: true
                });*/
                //*Initialize morris chart


                // Initialize owl carousels
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
                //* Initialize owl carousels


                // Initialize rickshaw chart
                /*var graph;

                var seriesData = [ [], []];
                var random = new Rickshaw.Fixtures.RandomData(50);

                for (var i = 0; i < 50; i++) {
                    random.addData(seriesData);
                }

                graph = new Rickshaw.Graph( {
                    element: document.querySelector("#realtime-rickshaw"),
                    renderer: 'area',
                    height: 133,
                    series: [{
                        name: 'Series 1',
                        color: 'steelblue',
                        data: seriesData[0]
                    }, {
                        name: 'Series 2',
                        color: 'lightblue',
                        data: seriesData[1]
                    }]
                });

                var hoverDetail = new Rickshaw.Graph.HoverDetail( {
                    graph: graph,
                });

                graph.render();

                setInterval( function() {
                    random.removeData(seriesData);
                    random.addData(seriesData);
                    graph.update();

                },1000);*/
                //* Initialize rickshaw chart

                //Initialize mini calendar datepicker
                $('#mini-calendar').datetimepicker({
                    inline: true
                });
                //*Initialize mini calendar datepicker


                //todo's
                $('.widget-todo .todo-list li .checkbox').on('change', function() {
                    var todo = $(this).parents('li');

                    if (todo.hasClass('completed')) {
                        todo.removeClass('completed');
                    } else {
                        todo.addClass('completed');
                    }
                });
                //* todo's


                //initialize datatable
                $('#project-progress').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                });
                //*initialize datatable

                //load wysiwyg editor
                $('#summernote').summernote({
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
                });
                //*load wysiwyg editor
            });
			
		if($("#tSortable").length > 0)
		 {
			$("#tSortable").dataTable({"iDisplayLength": 100, "aLengthMenu": [10,25,50,100,500,1000], "sPaginationType": "full_numbers","bSort":false});
			
			$("#tSortable_2").dataTable({"iDisplayLength": 5, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null]});
		 }
		 
		 $('#delete').click(function(){
			$('<input />').attr('type','hidden').attr('name','delete').attr('value','1').appendTo('#form');
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
        </script>
        <!--/ Page Specific Scripts -->