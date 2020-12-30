	<!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.8.2.min.js"></script>-->
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts-3d.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
	<script type="text/javascript">
	$(function () {
		Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
			return {
				radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
				stops: [
					[0, color],
					[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
				]
			};
		});
		
		$('#container').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: '<?php echo $title; ?>'
			},
			subtitle: {
				text: 'Data berdasarkan Aplikasi SIPPADU pada <?php echo $time_update; ?>'
			},
			xAxis: {
				categories: [
						<?php 
						if($grafik_sippadu->num_rows() > 0){
							$xa = '';
							foreach($grafik_sippadu->result() as $x){
								$xa .= '"'.$x->NM_IZIN.'",';
							}
							echo $xa;
						}
						?>
				],
				title: {
					text: '<?php echo $series_nama; ?>'
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: '<?php echo $series_angka; ?>',
					align: 'high'
				},
				labels: {
					overflow: 'justify'
				}
			},
			tooltip: {
				valueSuffix: ' (<?php echo $satuan; ?>)'
			},
			plotOptions: {
				bar: {
					dataLabels: {
						enabled: true
					}
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -40,
				y: 100,
				floating: true,
				borderWidth: 1,
				backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				shadow: true,
				enabled: false
			},
			credits: {
				enabled: false
			},
			series: [{
				name: '<?php echo $series_angka; ?>',
				data: [
						<?php 
						if($grafik_sippadu->num_rows() > 0){
							$ya = '';
							foreach($grafik_sippadu->result() as $y){
								$ya .= $y->JML.',';
							}
							echo $ya;
						}
						?>
				]
			}]
		});
	});
	</script>