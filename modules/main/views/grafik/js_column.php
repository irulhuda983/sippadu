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
				type: 'column'
			},
			title: {
				text: '<?php echo $title; ?>'
			},
			subtitle: {
				text: 'Data terakhir diperbarui: <?php echo $time_update; ?>'
			},
			/*colors: ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce','#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'],*/
			xAxis: {
				categories: [
						<?php 
						if($data->num_rows() > 0){
							$xa = '';
							foreach($data->result() as $x){
								$xa .= $x->Nm_Data.',';
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
						if($data->num_rows() > 0){
							$ya = '';
							foreach($data->result() as $y){
								$ya .= $y->Angka_Data.',';
							}
							echo $ya;
						}
						?>
				]
			}]
		});
	});
	</script>