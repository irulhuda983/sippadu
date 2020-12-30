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
				<h1 class="pageTitle">SIPPADU Online</h1>
				<p class="headerDescription" style="width:100%;text-align:justify;">Mohon gunakan layanan online ini dengan bijak dengan data permohonan yang dapat dipertanggungjawabkan. Pengajuan permohonan online ini tanpa User ID, sehingga pengajuan hanya dapat dilakukan 1 (satu) kali proses atau izin baru saja, kecuali anda sudah memiliki User ID. Untuk mendapatkan User ID, anda harus datang ke DPMPTSP dengan membawa berkas-berkas dasar asli pada saat pengambilan SK. Pastikan anda sudah memiliki email, nomor handphone (hp), dan nomor identitas (KTP)</p>

			</div>
		</header>
		<br/>
		<br/>
		
		
		<div class="wrapper col-12">
			<section class="mainWidget latestFeatures " style="">
				<div class="col-5 centered">
					<div class="searchDataContainer" data-placeholder="Search" for="" a="" club="">
						<div class="searchInputContainer" role="search">
							<label><span class="visuallyHidden">Tracking</span> <input id="" type="text" value="" placeholder="Isikan Nomor Registrasi Pendaftaran Izin Anda Disini" class="searchTextContainer searchInput"></label>
						</div>
					</div>
					<div class="searchDataContainer" data-placeholder="Search" for="" a="" club="">
						<div class="searchInputContainer" role="search">
							<label><span class="visuallyHidden">Tracking</span> <input id="" type="text" value="" placeholder="Isikan Nomor Identitas Anda saat Pendaftaran Izin" class="searchTextContainer searchInput"></label>
						</div>
					</div>
					<div class="btn reset" role="button" tabindex="0">Tracking Izin<div class="icn search-sm"></div></div>
				</div>
			</section>
			


		</div>
	</main>

	<?php $this->load->view('footer'); ?>
</body>
</html>