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
						<h5 class="newsTag"><?php echo project_kategori($d->ID_Project,TRUE,'style="color:#9e9e9e;text-decoration:none;font-style:italic;"'); ?></h5>
						<h1 class="articleTitle"><?php echo $d->Nm_Project; ?></h1>
						<h5><span class="articleAuth"><?php echo lang('Lokasi').': '.$d->Lokasi.' | '.lang('Waktu Pelaksanaan').': '.(($d->Time_Mulai == $d->Time_Akhir) ? Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')) : Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')).' - '.Date_Indo(TimeFormat($d->Time_Akhir,'d F Y'))); ?></span></h5>
					</div>
				</div>
			</div>
		</header>

		<div class="wrapper">
			<div class="col-9">
				<section class="standardArticle">
					<div class="socialShareSticky">
						<div class="socialShareHover articleShare">
							<div data-script="pl_social-share" data-widget="social-page-share" data-open="true" data-render="pagehover" data-body="<?php echo $d->Nm_Project; ?>" ></div>
						</div>
					</div>
					<div data-script="pl_editorial-lists" data-widget="video-list" class="articleImage">
						<?php echo imgsrc($d->Image_Raw.'_original'.$d->Image_Ext,'project'); ?>
					</div>
						
						<table class="table table-striped table-hover" style="width:100%;text-align:left">
							<tbody>
								<tr><td><?php echo lang('Nama Project'); ?></td><td><?php echo ifnull($d->Nm_Project,'-'); ?></td></tr>
								<tr><td><?php echo lang('Lokasi'); ?></td><td><?php echo ifnull($d->Lokasi,'-'); ?></td></tr>
								<tr><td><?php echo lang('Waktu Pelaksanaan'); ?></td><td><?php echo (($d->Time_Mulai == $d->Time_Akhir) ? Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')) : Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')).' - '.Date_Indo(TimeFormat($d->Time_Akhir,'d F Y'))); ?></td></tr>
								<tr><td><?php echo lang('Nama Instansi'); ?></td><td><?php echo ifnull($d->Nm_Instansi,'-'); ?></td></tr>
								<tr><td><?php echo lang('Jumlah Pelaksana'); ?></td><td><?php echo ifnull($d->Jml_Pelaksana,'-'); ?></td></tr>
								<tr><td><?php echo lang('Nama-nama Pelaksana'); ?></td><td><?php echo ifnull($d->Nm_Pelaksana,'-'); ?></td></tr>
								<tr><td><?php echo lang('Anggaran'); ?></td><td><?php echo number($d->Anggaran); ?></td></tr>
								<tr><td><?php echo lang('Deskripsi'); ?></td><td><?php echo ifnull($d->Deskripsi,'-'); ?></td></tr>
							</tbody>
						</table>
				</section>
				
				
			</div>
		</div>
		<?php } ?>
	</main>

	<?php $this->load->view('footer'); ?>
</body>
</html>