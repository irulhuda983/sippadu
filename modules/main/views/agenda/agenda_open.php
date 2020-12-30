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
						<h5 class="newsTag"><?php echo agenda_kategori($d->ID_Agenda,TRUE,'style="color:#9e9e9e;text-decoration:none;font-style:italic;"'); ?></h5>
						<h1 class="articleTitle"><?php echo $d->Judul; ?></h1>
						<!--<h5><span class="articleAuth"><?php echo TimeFormat($d->Time,'d F Y H:i').' | '.lang('Dilihat').': '.$d->Hits.' '.lang('kali').' | '.lang('Oleh').': '.$d->Nm_User; ?></span></h5>-->
						<h5><span class="articleAuth"><?php echo lang('Lokasi').': '.$d->Lokasi.' | '.lang('Waktu Agenda').': '.(($d->All_Day || $d->Time_Mulai == $d->Time_Akhir) ? Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')) : Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')).($d->Tampilkan_Jam ? ' '.TimeFormat($d->Time_Mulai,'H:i') : '').' - '.Date_Indo(TimeFormat($d->Time_Akhir,'d F Y')).($d->Tampilkan_Jam ? ' '.TimeFormat($d->Time_Akhir,'H:i') : '')); ?></span></h5>
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
						<?php echo imgsrc($d->Image_Raw.'_original'.$d->Image_Ext,'agenda'); ?>
					</div>
					<div style="text-align:justify;"><p class="copy"><?php echo $d->Konten; ?></p></div>
				</section>
				
				<?php if($data_latest->num_rows() > 0){ ?>
				<section class="mainWidget latestFeatures ">
					<header><h3 class="subHeader"><?php echo lang('Agenda Lainnya'); ?></h3></header>
					<ul class="block-list-4">
						<?php foreach($data_latest->result() as $dl){ ?>
						<li>
							<a href="<?php echo autolink_agenda($dl->ID_Agenda); ?>"  class="thumbnail">
								<figure>
									<span class="image thumbCrop-latestnews"><?php echo imgsrc($dl->Image_Raw.'_thumb'.$dl->Image_Ext,'agenda'); ?></span>
									<figcaption>
										<span class="tag"><?php echo agenda_kategori($dl->ID_Agenda); ?></span>
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