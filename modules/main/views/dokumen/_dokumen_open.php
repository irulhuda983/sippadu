<!DOCTYPE html>
<html lang="en">
<head>

	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/dataTables/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/dataTables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php $this->load->view('header'); ?>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		<?php
		$img_raw = '';
		$img_ext = '';
		$nm_slide = '';
		$desc = '';
		if($slide_page->num_rows() > 0){
			$ds = $slide_page->row();
			$img_raw = $ds->Image_Raw;
			$img_ext = $ds->Image_Ext;
			$nm_slide = $ds->Nm_Page;
			$desc = $ds->Deskripsi;
		}
		?>
		<section class="full-width-poppy-promo">
			<picture class="full-width-poppy-promo__img">
				<?php echo imgpage($img_raw.$img_ext,'menu',config('main_site')); ?>
			</picture>
			<div class="full-width-poppy-promo__content">
				<div class="full-width-poppy-promo__headline">
					<div class="full-width-poppy-promo__logo"></div>
					<div class="full-width-poppy-promo__text">
						<h1 class="full-width-poppy-promo__heading"><?php echo $title; ?></h1>
					</div>
				</div>
				<div class="full-width-poppy-promo__explainer">
					<h4 class="full-width-poppy-promo__secondary-heading"><?php echo $desc; ?></h2>
				</div>
			</div>

		</section>

		<div class="wrapper col-12">
			
			<?php if($data->num_rows() > 0) { ?>
			<br/>
			<table id="dataTables" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="200px">Nama Berkas</th>
						<th width="150px">Kategori</th>
						<th width="">Deskripsi</th>
						<th width="50px">Didownload</th>
						<th width="50px">Download</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $d){
						echo '
						<tr>
							<td>'.$d->Judul.'</td>
							<td>'.download_kategori($d->ID_Download).'</td>
							<td>'.$d->Konten.'</td>
							<td align="center">'.$d->Hits.'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('download/get/'.$d->ID_Download)).'\'" class="btn quickView" role="button" data-modal-active="true">Download</span></td>
						</tr>';
					}
					?>
				</tbody>
			</table>
			<?php } ?>
		</div>
		
		
	</main>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/dataTables/jquery-1.12.4.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/dataTables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/dataTables/dataTables.bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable({"iDisplayLength": 50});
	} );
	</script>
	<?php $this->load->view('footer'); ?>
</body>
</html>