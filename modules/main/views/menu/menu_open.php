<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		<?php if($data->num_rows() > 0){ $d = $data->row();?>
		<section class="full-width-poppy-promo">
			<picture class="full-width-poppy-promo__img">
				<?php echo imgpage($d->Image_Raw.$d->Image_Ext,'menu',config('main_site')); ?>
			</picture>
			<div class="full-width-poppy-promo__content">
				<div class="full-width-poppy-promo__headline">
					<div class="full-width-poppy-promo__text">
						<h1 class="full-width-poppy-promo__heading"><?php echo ($d->Image_Raw != '' ? '' : lang($d->Nm_Menu,true)); ?></h1>
					</div>
				</div>
				<div class="full-width-poppy-promo__explainer">
					<h4 class="full-width-poppy-promo__secondary-heading"><?php ($d->Image_Raw != '' ? '' : $d->Description1); ?></h2>
				</div>
			</div>

		</section>

		<div class="wrapper">
			<div class="col-12">
				<section class="standardArticle">
					<div class="articleHeaderContent">
						<h1 class="articleTitle"><?php echo lang($d->Nm_Menu,true); ?></h1>
						<span class="articleAuth"><?php echo lang('Dilihat').': '.number($d->Hits).' '.lang('kali'); ?></span>
					</div>
					<hr/>
					<div style="text-align:justify;"><p class="copy"><?php echo $d->Konten; ?></p></div>
				</section>
				
			</div>
		</div>
		<?php } ?>
		
		
	</main>

	<?php $this->load->view('footer'); ?>
</body>
</html>