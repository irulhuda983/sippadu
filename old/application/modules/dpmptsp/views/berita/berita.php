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
			<section data-script="pl_filtered-list" data-widget="filtered-content-list" data-page-size="10" data-content-type="text" data-page="0" data-tags="News" data-references="" class="mainWidget latestFeatures">
				<section class="pageFilter" data-use-history="true" data-filter-config="editorial" data-widget="tables-filter" data-reset-available="true"></section>
					<ul class="newsList contentListContainer">
						<li>
							<section class="featuredArticle">
								<div class="col-12-m">
									<?php 
									if($data_berita->num_rows() > 0){
										foreach($data_berita->result() as $db){
											echo '
											<a href="'.autolink_berita($db->ID_Berita).'"  class="thumbnail thumbLong">
												<figure>
													<span class="image thumbCrop-news-list">'.imgsrc($db->Image_Raw.'_original'.$db->Image_Ext,'berita','sippadu').'</span>
													<figcaption>
														<span class="tag">'.berita_kategori($db->ID_Berita).'</span>
														<span class="title">'.$db->Judul.'</span>
														<span class="text">'.character_limiter($db->Konten,500).'</span>
													</figcaption>
												</figure>
											</a>';
										}
									}
									?>
								</div>
							</section>
						</li>
					</ul>
				</section>
			</section>
		</div>
	</main>

	<?php $this->load->view('footer'); ?>
</body>
</html>