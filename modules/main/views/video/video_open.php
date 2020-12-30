<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<body>
	<?php $this->load->view('top'); ?>
	
	<main id="mainContent" tabindex="0">
		<section class="galleryArticle">
			<div class="wrapper">
				<div class="col-12">
					<div class="articleShare socialShareSticky" data-script="pl_social-share" data-widget="social-page-share" data-render="pagehover"></div>
					<div class="galleryContainer">
						<header class="pageHeader">
							<h5 class="newsTag"><?php echo video_kategori($ID_Video,TRUE,'style="color:#9e9e9e;text-decoration:none;font-style:italic;"'); ?></h5>
							<h1 class="pageTitle"><?php echo $title; ?></h1>
							<time><?php echo lang('Diupload pada'); ?>: <?php echo $time_upload; ?> | <?php echo lang('Oleh'); ?>: <?php echo $author; ?></time>
							<div class="subHeader"></div>
						</header>
							<ul class="block-list-4 block-list-3-m block-list-2-s" data-widget="gallery">
							
								<?php if($data->num_rows() > 0){ ?>
								<?php foreach($data->result() as $d){ ?>
								<li class="galleryItem">
									<div class="thumbnail">
										<figure>
											<picture class="image">
												<?php echo create_iframe_video($d->ID_Video,'800','450',TRUE,TRUE); ?>
												<span class="openModal" data-ui-modal="#galleryModal" role="button" tabindex="0">
												<span class="ieOpenModal icn expand-w"></span>

											</picture>

											<figcaption>
												<span class="captionBody" align="justify"><?php echo $d->Deskripsi; ?></span>
											</figcaption>
										</figure>
									</div>
								</li>
								<?php } ?>
								<?php } ?>
							</ul>
					</div>
				</div>
			</div>
		</section>
		<div data-script="pl_gallery" data-widget="gallery-modal" id="galleryModal" class="galleryModal" style="display:none;"></div>
	
		
	</main>
	
	<?php $this->load->view('footer'); ?>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/widgets/common.min.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl_gallery.min.js"></script>
</body>
</html>