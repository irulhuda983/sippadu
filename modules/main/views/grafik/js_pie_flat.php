	<!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.8.2.min.js"></script>-->
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts-3d.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
	<script type="text/javascript">
	$(function () {
		$(document).ready(function () {
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
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo $title; ?>'
				},
				subtitle: {
					text: 'Data terakhir diperbarui: <?php echo $time_update; ?>'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: '<?php echo $series_angka; ?>',
					data: [
						<?php 
						if($data->num_rows() > 0){
							$ya = '';
							foreach($data->result() as $y){
								$ya .= '["'.$y->Nm_Data.'",'.$y->Angka_Data.'],';
							}
							echo $ya;
						}
						?>
					]
				}]
			});
		});
	});
	</script>