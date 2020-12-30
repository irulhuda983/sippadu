<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		<?php if($data->num_rows() > 0){ $d = $data->row();?>
		<header class="articleHeader">
			<div class="wrapper">
				<div class="col-9 col-8-m">
					<div class="articleHeaderContent">
						<h1 class="articleTitle"><?php echo $d->Nm_Menu; ?></h1>
						<h5><span class="articleAuth"><?php echo 'Dilihat: '.$d->Hits.' kali'; ?></span></h5>
					</div>
				</div>
			</div>
		</header>

		<div class="wrapper">
			<div class="col-9">
				<section class="standardArticle">
					<div class="socialShareSticky">
						<div class="socialShareHover articleShare">
							<div data-script="pl_social-share" data-widget="social-page-share" data-open="true" data-render="pagehover" data-body="<?php echo $d->Nm_Menu; ?>" ></div>
						</div>
					</div>
					<div data-script="pl_editorial-lists" data-widget="video-list" class="articleImage">
						<?php echo imgsrc($d->Image_Raw.'_original'.$d->Image_Ext,'menu','sippadu'); ?>
					</div>
					<p class="copy"><?php echo $d->Konten; ?></p>
				</section>
				
			</div>
		</div>
		<?php } ?>
	</main>

	<?php $this->load->view('footer'); ?>
</body>
</html>