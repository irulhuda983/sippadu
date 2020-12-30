<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
		
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts-3d.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
		<script type="text/javascript">
		<?php //if(0){ ?>
		(function($) {
			$.noConflict();
			$(function () {
				Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
					return {
						radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
						stops: [
							[0, color],
							[1, Highcharts.Color(color).brighten(-0.2).get('rgb')] // darken
						]
					};
				});
				
				<?php if($grafik_registrasi->num_rows() > 0){ ?>
				$('#grafik').highcharts({
					chart: {
						type: 'column',
						animation: false,
						borderWidth: 0
					},
					title: {
						text: 'Grafik Riwayat Pengajuan Izin'
					}, 
					subtitle: {
						text: 'Data berdasarkan Aplikasi <?php echo config('sub_title'); ?> per tanggal <?php echo TimeNow('d F Y'); ?>'
					},
					xAxis: {
						categories: [
							<?php 
								foreach($grafik_registrasi->result() as $g){
									echo '"'.TimeFormat($g->TGL_BUAT,'d M Y').'",';
								}						
							?>
						],
						labels: {
							enabled: false
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Jumlah Pendaftar'
						}
					},
					tooltip: {
						valueSuffix: ' izin'
					},
					plotOptions: {
						column: {
							pointPadding: 0,
							borderWidth: 0,
							dataLabels: {
								enabled: false,
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								},
								connectorColor: 'silver'
							},
						}
					},
					colors: [
						'#009da0'
					],
					exporting: { enabled: false },
					series: [{
						showInLegend: false,
						name: 'Jumlah Registrasi',
						data: [
							<?php 
								foreach($grafik_registrasi->result() as $g){
									echo $g->JML.',';
								}					
							?>
						],
						pointWidth: 10

					}]
				});
				<?php } ?>
				
				
				<?php if($pie_bulan->num_rows() > 0){ ?>
				$('#pie_2').highcharts({
					chart: {
						/* style: {
							fontFamily: 'PremierSans-Regular,Arial,Helvetica Neue,Helvetica,sans-serif'
						}, */
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie',
						options3d: {
							enabled: true,
							alpha: 45,
							beta: 0
						}
					},
					title: {
						text: 'Persentase Pendafaran Izin Bulan Ini'
					},
					subtitle: {
						text: 'Data berdasarkan Aplikasi <?php echo config('sub_title'); ?> per tanggal <?php echo TimeNow('d F Y'); ?>'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							depth: 35,
							dataLabels: {
								enabled: false,
								/* style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								},
								connectorColor: 'silver' */
							},
							showInLegend: true
						}
					},
					/* colors: ['#009da0'], */
					exporting: { enabled: false },
					series: [{
						showInLegend: true,
						type: 'pie',
						name: 'Persentase',
						data: [
							<?php 
							
								foreach($pie_bulan->result() as $p2){
									echo "['".$p2->NM_IZIN."',    ".$p2->JML."],";
								}
							
							?>
						]
					}]
				});
				<?php } ?>
				
				<?php if($pie_tahun->num_rows() > 0){ ?>
				$('#pie_3').highcharts({
					chart: {
						/* style: {
							fontFamily: 'PremierSans-Regular,Arial,Helvetica Neue,Helvetica,sans-serif'
						}, */
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie',
						options3d: {
							enabled: true,
							alpha: 45,
							beta: 0
						}
					},
					title: {
						text: 'Persentase Pendafaran Izin Tahun Ini'
					},
					subtitle: {
						text: 'Data berdasarkan Aplikasi <?php echo config('sub_title'); ?> per tanggal <?php echo TimeNow('d F Y'); ?>'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							depth: 35,
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
					/* colors: ['#009da0'], */
					exporting: { enabled: false },
					series: [{
						showInLegend: true,
						type: 'pie',
						name: 'Persentase',
						data: [
							<?php 
							
								foreach($pie_tahun->result() as $p3){
									echo "['".$p3->NM_IZIN."',    ".$p3->JML."],";
								}
							
							?>
						]
					}]
				});
				<?php } ?>
				
				<?php if($pie_tahun->num_rows() > 0){ ?>
				$('#bar').highcharts({
					chart: {
						type: 'bar'
					},
					title: {
						text: 'Jumlah Pendaftaran Izin di Tahun Berjalan'
					},
					subtitle: {
						text: 'Data berdasarkan Aplikasi <?php echo config('sub_title'); ?> per tanggal <?php echo TimeNow('d F Y'); ?>'
					},
					xAxis: {
						categories: [
							<?php
							foreach($pie_tahun->result() as $pb){
								echo "'".$pb->NM_IZIN."',";
							}
							?>
						
						],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Jumlah Pendafar',
							align: 'high'
						},
						labels: {
							overflow: 'justify'
						}
					},
					tooltip: {
						valueSuffix: ' izin'
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
						shadow: true
					},
					credits: {
						enabled: false
					},
					colors: ['#009da0'],
					exporting: { enabled: false },
					series: [{
						showInLegend: false,
						name: 'Jumlah Pendaftar',
						data: [
							<?php
							foreach($pie_tahun->result() as $pb){
								echo "".$pb->JML.",";
							}
							?>
						]
					}]
				});
				<?php //} ?>
			});
		}(jQuery));
		<?php } ?>
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
									<?php //if(0){ ?>
									<?php //if($data->num_rows() > 0){ ?>
									<div class="tile-widget">
										
										<div class="row">
											
											<!--<button type="button" onclick="notifikasi();" >Test</button>
											<span class="ntf_siup_FO">0</span>
											<span class="ntf_tdp_FO">0</span>
											<span class="ntf_imb_FO">0</span>
											<span class="ntf_iujk_FO">0</span>
											<span class="ntf_tdi_FO">0</span>
											<span class="ntf_total_FO">0</span>-->
											<div class="col-sm-12">
												<div id="grafik" class="col-sm-9" style="height: 300px; margin: 0 auto"></div>
											</div>
											
										</div>
										<br/>
										<br/>
										<hr/>
										<div class="row">
											
											<div class="col-sm-5">
												<?php if($pie_bulan->num_rows() > 0){ ?>
												<div id="pie_2" style="height: 500px; margin: 0 auto"></div>
												<?php } ?>
											</div>
											<div class="col-sm-5">
												<?php if($pie_tahun->num_rows() > 0){ ?>
												<div id="pie_3" style="height: 500px; margin: 0 auto"></div>
												<?php } ?>
											</div>
											
										</div>
										
										<br/>
										<br/>
										<hr/>
										<div class="row">
											<div class="col-sm-12">
												<?php if($pie_tahun->num_rows() > 0){ $cnt = $pie_tahun->num_rows();?>
												<div id="bar" class="col-sm-9" style="height: <?php echo 250+($cnt * 25); ?>px; margin: 0 auto"></div>
												<?php } ?>
											</div>
										</div>
										<br/>
										<br/>
										<hr/>
									<?php //} ?>
									<?php //} ?>
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
