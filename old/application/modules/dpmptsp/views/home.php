<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js"></script>
	
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/exporting.js"></script>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		
		<header class="pageHero">
			<div class="wrapper col-12">
				<h1 class="pageTitle"><?php echo format_setting(2,1); ?></h1>
				<p class="headerDescription" style="width:100%;text-align:justify;"><?php echo format_setting(2,2); ?></p>

			</div>
		</header>
		<br/>
		<br/>
		
		
		<div class="wrapper col-12">
			<section class="mainWidget latestFeatures " style="">
				<div class="col-5 centered">
					<div class="searchDataContainer">
						<div class="searchInputContainer" role="search">
							<input id="register" type="text" value="<?php echo $this->input->get('register'); ?>" name="register" placeholder="Isikan Nomor Registrasi Pendaftaran Izin Anda Disini" class="searchTextContainer searchInput">
						</div>
					</div>
					<div class="searchDataContainer">
						<div class="searchInputContainer" role="search">
							<input id="nokitas" type="text" value="<?php echo $this->input->get('nokitas'); ?>" name="nokitas" placeholder="Isikan Nomor Identitas Anda saat Pendaftaran Izin" class="searchTextContainer searchInput">
						</div>
					</div>
					<div class="btn reset" role="button" tabindex="0" id="btn-tracking">Tracking Izin<div class="icn search-sm"></div></div>
				</div>
			</section>
			
			<section class="mainWidget latestFeatures tracking-wrapper hide">
				<div id="trackload" class="col-12" style="text-align:center;">Sedang mencari data. Silakan tunggu.........</div>
				<div id="trackingresult"></div>
			</section>
				
			<?php if($data_berita->num_rows() > 0) { ?>
			<section class="mainWidget latestFeatures ">
				
				<header><h3 class="subHeader">Berita</h3></header>
				<ul class="block-list-4">
					<?php 
					
					$brt = ''; 
					foreach($data_berita->result() as $br){
						$brt .= '
						<li>
							<a href="javascript:void(0);" onclick="window.location.href=\''.autolink_berita($br->ID_Berita).'\'" class="thumbnail">
								<figure>
									<span class="image thumbCrop-latestnews">'.imgsrc($br->Image_Raw.'_original'.$br->Image_Ext,'berita','sippadu').'</span>
									<figcaption><span class="tag">'.berita_kategori($br->ID_Berita).'</span><span class="title">'.$br->Judul.'</span></figcaption>
								</figure>
							</a>
						</li>';
					}
					echo $brt;
					?>
				</ul>
				<a class="btn moreBtn" href="<?php echo site_url(fmodule('berita')); ?>">Berita Lainnya<span class="visuallyHidden">: News</span><span class="icn arrow-right"></span></a>
			</section>
			<?php } ?>
			


		</div>
	</main>

	<?php $this->load->view('footer'); ?>
	<script>
	$('#btn-tracking').click(function() {
		var noregister = $('#register').val();
		var nokitas = $('#nokitas').val();
		$('.tracking-wrapper').removeClass('hide');
		$('#trackload').removeClass('hide');
		$('#trackingresult').addClass('hide');
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('tracking')); ?>",
				data: {register:noregister,kitas:nokitas},
				success: function(msg){
					$('#trackingresult').html(msg);
					$('#trackload').addClass('hide');
					$('#trackingresult').removeClass('hide');
					
				}
		});
	});
	
	<?php if($this->input->get('register') != '' AND $this->input->get('nokitas') != ''){ ?>
	$('#btn-tracking').trigger('click');
	<?php } ?>
	
	</script>
</body>
</html>