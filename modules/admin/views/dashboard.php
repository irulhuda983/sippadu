<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
        <?php //echo $head; ?>
		
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts-3d.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
		<script type="text/javascript">
		(function($) {
			$.noConflict();
			
			Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
				return {
					radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
					stops: [
						[0, color],
						[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
					]
				};
			});
			
			$(function () {
				$('#grafik').highcharts({
					chart: {
						type: 'line'
					},
					title: {
						text: 'Statistik Kunjungan Website'
					},
					subtitle: {
						text: ''
					},
					xAxis: {
						categories: [
							<?php 
								foreach($statistik->result() as $s){
									echo '"'.TimeFormat($s->Time,'d M Y').'",';
								}						
							?>
						],
						labels: {
							enabled: false
						}
					},
					yAxis: {
						title: {
							text: 'Jumlah'
						},
						labels: {
							formatter: function () {
								//return this.value / 1000 + 'k';
								return this.value;
							}
						}
					},
					tooltip: {
						pointFormat: '{series.name} sebanyak <b>{point.y:,.0f} kali'
					},
					plotOptions: {
						area: {
							marker: {
								enabled: false,
								symbol: 'circle',
								radius: 2,
								states: {
									hover: {
										enabled: true
									}
								}
							}
						}
					},
					exporting: { enabled: false },
					series: [{
						name: 'Klik',
						data: [
						<?php
						foreach($statistik->result() as $s){
							echo $s->Hits.',';
						}
						?>
						
						]
					}, {
						name: 'Kunjungan',
						data: [
						<?php
						foreach($statistik->result() as $s){
							echo $s->Visits.',';
						}
						?>
						]
					}]
				});
			});
		
		}(jQuery));

		</script>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php $this->load->view('top'); ?>
            <?php $this->load->view('menu'); ?>
            <section id="content">
                <div class="page page-dashboard">
                    <!--<div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>-->

                    <!-- cards row -->
                    <div class="row">
						
						<!-- col -->
                        <div class="col-md-12">
							

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile widget -->
								<?php echo alert(); ?>
								<?php echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<div class="tile-widget">
										<div class="row">
											<div class="col-sm-12">
												<div id="grafik" class="col-sm-9" style="height: 300px; margin: 0 auto"></div>
											</div>
										</div>
								</form>

                                <!-- tile footer -->
								
								<?php //echo $pagination; ?>
                                <!-- /tile footer -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->


        <?php $this->load->view('footer_1'); ?>

    </body>
</html>
