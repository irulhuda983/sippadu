<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		
		<header class="pageHero videoHeader">
			<div class="wrapper col-12">
				<h1 class="pageTitle"><?php echo $title; ?></h1>
			</div>
		</header>

		<div class="wrapper col-12">
			
			<?php if($data->num_rows() > 0) { ?>
			<br/>
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="200px"><?php echo lang('Nama File'); ?></th>
						<th width="150px"><?php echo lang('Kategori'); ?></th>
						<th width=""><?php echo lang('Deskripsi'); ?></th>
						<th width="50px"><?php echo lang('Didownload'); ?></th>
						<th width="50px"><?php echo lang('Download'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $d){
						echo '
						<tr>
							<td>'.$d->Judul.'</td>
							<td>'.download_kategori($d->ID_Download,TRUE).'</td>
							<td>'.$d->Konten.'</td>
							<td align="center">'.number($d->Hits).'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('download/get/'.$d->ID_Download)).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Download').'</span></td>
						</tr>';
					}
					?>
				</tbody>
			</table>
			<?php } ?>
		</div>
		
		
	</main>
	<?php $this->load->view('footer'); ?>
</body>
</html>