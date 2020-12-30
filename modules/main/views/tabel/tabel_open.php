<!DOCTYPE html>
<html lang="en">
<head>
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/dataTables/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/dataTables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php $this->load->view('header'); ?>
	<style>
	
	table, th, td {
	   border: 1px solid #e8e8e8;
	}
	</style>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		<section class="full-width-poppy-promo">
			<picture class="full-width-poppy-promo__img">
				<?php echo imgpage($image_raw.'_original'.$image_ext,'tabel',config('main_site')); ?>
			</picture>
			<div class="full-width-poppy-promo__content">
				<div class="full-width-poppy-promo__headline">
					<div class="full-width-poppy-promo__logo"></div>
					<div class="full-width-poppy-promo__text">
						<h1 class="full-width-poppy-promo__heading"><?php echo ($image_raw != '' ? '' : $title); ?></h1>
					</div>
				</div>
				<div class="full-width-poppy-promo__explainer">
					<h4 class="full-width-poppy-promo__secondary-heading"></h2>
				</div>
			</div>

		</section>
		
		<?php if($data->num_rows() > 0){ $d = $data->row();?>
		<div class="wrapper">
			<div class="col-12">
				<section class="standardArticle">
					<div class="articleHeaderContent">
						<h1 class="articleTitle"><?php echo $d->Nm_Tabel; ?></h1>
						<span class="articleAuth"><?php echo lang('Last update').': '.TimeFormat($d->Time,'d F Y H:i').' | '.lang('Dilihat').': '.number($d->Hits).' '.lang('kali'); ?></span>
					</div>
					<div style="width:100%;border-bottom: 2px solid #e8e8e8;padding: 5px 0;"></div>
					<p class="copy" align="justify"><?php echo $d->Deskripsi; ?></p>
				</section>
				
			</div>
		</div>
			
			
		<div class="wrapper col-12" style="border:1px solid #e8e8e8">
			
			<section id="content" class="mainWidget latestFeatures">
				<?php if($data->num_rows() > 0) {?>
				<table id="dataTables" class="table table-striped table-hover table-border" style="width:100%;">
					<thead>
						<tr class="active">
							<?php 
							$h = '';
							$col = $data_kolom->num_rows();
							$y = 1;
							if($col > 0){
								foreach($data_kolom->result() as $k){
									$h .= '<th width="">'.($k->Nm_Col != '' ? lang($k->Nm_Col,true) : lang('Kolom').' '.$y).'</th>';
									++$y;
								}
								
							}
							echo $h;
							?>
						</tr>
					</thead>
					<tbody>
						<?php
							$m = 0;
							if($data_row->num_rows() > 0){
								$j = '';
								foreach($data_row->result() as $r){
									$j .= '<tr id="tr_'.$m.'">';
									$i = 0;
									if($data_col->num_rows() > 0){
										foreach($data_col->result() as $c){
											$j .= '<td>'.get_tabel_val($r->ID_Row,$c->ID_Col).'</td>';
											++$i;
										}
									}
									++$m;
									$j .= '</tr>';
								}
								echo $j;
							}
						?>
					</tbody>
				</table>
				<?php }else{ ?>
				<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
				<?php } ?>
			</section>
		</div>
		<?php } ?>
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