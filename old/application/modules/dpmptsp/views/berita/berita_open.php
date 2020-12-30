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
						<h5 class="newsTag"><?php echo berita_kategori($d->ID_Berita); ?></h5>
						<h1 class="articleTitle"><?php echo $d->Judul; ?></h1>
						<h5><span class="articleAuth"><?php echo TimeFormat($d->Time,'d F Y H:i').' | Dilihat: '.$d->Hits.' kali'; ?></span></h5>
					</div>
				</div>
			</div>
		</header>

		<div class="wrapper">
			<div class="col-9">
				<section class="standardArticle">
					<div class="socialShareSticky">
						<div class="socialShareHover articleShare">
							<div data-script="pl_social-share" data-widget="social-page-share" data-open="true" data-render="pagehover" data-body="<?php echo $d->Judul; ?>" ></div>
						</div>
					</div>
					<div data-script="pl_editorial-lists" data-widget="video-list" class="articleImage">
						<?php echo imgsrc($d->Image_Raw.'_original'.$d->Image_Ext,'berita','sippadu'); ?>
					</div>
					<p class="copy"><?php echo $d->Konten; ?></p>
				</section>
				
				<?php if($data_latest->num_rows() > 0){ ?>
				<section class="mainWidget latestFeatures ">
					<header><h3 class="subHeader">Berita Terakhir</h3></header>
					<ul class="block-list-4">
						<?php foreach($data_latest->result() as $dl){ ?>
						<li>
							<a href="<?php echo autolink_berita($dl->ID_Berita); ?>"  class="thumbnail">
								<figure>
									<span class="image thumbCrop-latestnews"><?php echo imgsrc($dl->Image_Raw.'_original'.$dl->Image_Ext,'berita','sippadu'); ?></span>
									<figcaption>
										<span class="tag"><?php echo berita_kategori($dl->ID_Berita); ?></span>
										<span class="title"><?php echo $dl->Judul; ?></span>
									</figcaption>
								</figure>
							</a>
						</li>
						<?php } ?>
					</ul>
				</section>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</main>

	<?php $this->load->view('footer'); ?>
</body>
</html>