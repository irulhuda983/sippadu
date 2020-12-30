	<!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.8.2.min.js"></script>-->
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts-3d.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
	<script type="text/javascript">
	(function($) {
		$.noConflict();
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
				title: {
					text: '<?php echo $title; ?>',
					x: -20 //center
				},
				subtitle: {
					text: 'Data terakhir diperbarui: <?php echo $time_update; ?>',
					x: -20
				},
				xAxis: {
					title: {
						text: '<?php echo $series_angka; ?>'
					},
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
					]
				},
				yAxis: {
					title: {
						text: '<?php echo $series_angka; ?>'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: { 
					/* formatter: function() {
						 return this.x+': <b>'+this.y+'</b>';
					} */
					valueSuffix: ' (<?php echo $satuan; ?>)'
				},
				lang: {
					decimalPoint: '.',
					thousandsSep: ','
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0,
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
	
	}(jQuery));
	</script>