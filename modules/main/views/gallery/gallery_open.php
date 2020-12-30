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
							<h5 class="newsTag"><?php echo gallery_kategori($ID_Album,TRUE,'style="color:#9e9e9e;text-decoration:none;font-style:italic;"'); ?></h5>
							<h1 class="pageTitle"><?php echo $title; ?></h1>
							<time><?php echo lang('Diupload pada'); ?>: <?php echo $time_upload; ?> | <?php echo lang('Oleh'); ?>: <?php echo $author; ?></time>
							<div class="subHeader"><?php echo $description; ?></div>
						</header>
							<ul class="block-list-4 block-list-3-m block-list-2-s" data-widget="gallery">
							
								<?php if($data->num_rows() > 0){ ?>
								<?php foreach($data->result() as $d){ ?>
								<li class="galleryItem" data-ui-src="<?php echo urlimgsrc($d->Image_Raw.$d->Image_Ext,'gallery'); ?>">
									<div class="thumbnail">
										<figure>
											<picture class="image">
												<source srcset="<?php echo urlimgsrc($d->Image_Raw.$d->Image_Ext,'gallery'); ?>" media="(max-width: 550px)">
												<?php echo imgsrc($d->Image_Raw.'_original'.$d->Image_Ext,'gallery'); ?>
												<span class="openModal" data-ui-modal="#galleryModal" role="button" tabindex="0">
													<svg class="expandIcon" version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
														 viewBox="0 0 75 75" style="enable-background:new 0 0 75 75;" xml:space="preserve">
													<path d="M39.8,65.2H13.5c-1.2,0-2.2-1-2.2-2.2V36.7c0-0.9,0.5-1.7,1.4-2.1c0.8-0.4,1.8-0.2,2.4,0.4l8.4,8c0.9,0.9,0.9,2.3,0.1,3.2
														c-0.9,0.9-2.3,0.9-3.2,0.1l-4.6-4.4v18.9h18.9l-4.4-4.6c-0.8-0.9-0.8-2.2,0-3.1l12.5-12.9c0.9-0.9,2.3-0.9,3.2-0.1
														c0.9,0.9,0.9,2.3,0.1,3.2L35,54.6l6.5,6.8c0.6,0.7,0.8,1.6,0.4,2.4C41.6,64.7,40.7,65.2,39.8,65.2z M63,42.1c-0.6,0-1.1-0.2-1.5-0.6
														l-8.4-8c-0.9-0.9-0.9-2.3-0.1-3.2c0.9-0.9,2.3-0.9,3.2-0.1l4.6,4.4V15.8H41.9l4.4,4.6c0.8,0.9,0.8,2.2,0,3.1L33.7,36.4
														c-0.9,0.9-2.3,0.9-3.2,0.1c-0.9-0.9-0.9-2.3-0.1-3.2l11-11.4L35,15c-0.6-0.7-0.8-1.6-0.4-2.4c0.4-0.8,1.2-1.4,2.1-1.4H63
														c1.2,0,2.2,1,2.2,2.2v26.3c0,0.9-0.5,1.7-1.4,2.1C63.6,42,63.3,42.1,63,42.1z"/>
													</svg>
												<span class="ieOpenModal icn expand-w"></span>

											</picture>

											<figcaption>
												<!--<span class="captionTitle"></span>-->
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