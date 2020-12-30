<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
	<?php
		switch($jn_grafik){
			case 1:
				$this->load->view('grafik/js_line');
			break;
			case 2:
				$this->load->view('grafik/js_area');
			break;
			case 3:
				$this->load->view('grafik/js_bar');
			break;
			case 4:
				$this->load->view('grafik/js_column');
			break;
			case 5:
				$this->load->view('grafik/js_pie_flat');
			break;
			case 6:
				$this->load->view('grafik/js_pie_3d');
			break;
			default:
				$this->load->view('grafik/js_line');
			break;
		}
	?>
	<style>
	#mdiv {
		margin: auto;
		width: 50%;
		border: 1px solid #ccc;
		padding: 10px;
	}
	</style>
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
			$nm_slide = $ds->Nm_Grafik;
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
						<h1 class="full-width-poppy-promo__heading"><?php echo ($img_raw != '' ? '' : $nm_slide); ?></h1>
					</div>
				</div>
				<div class="full-width-poppy-promo__explainer">
					<h4 class="full-width-poppy-promo__secondary-heading"><?php echo ($img_raw != '' ? '' : $desc); ?></h2>
				</div>
			</div>

		</section>
		
		
		<div class="wrapper">
			<div class="col-12">
				<section class="standardArticle">
					<div class="articleHeaderContent">
						<h1 class="articleTitle"><?php echo $title; ?></h1>
						<span class="articleAuth"><?php echo lang('Last Update').': '.$time_update.' | '.lang('Dilihat').': '.number($hits).' '.lang('kali'); ?></span>
					</div>
					<hr/>
					<p class="copy" align="justify"><?php echo $konten; ?></p>
				</section>
				
			</div>
		</div>
		
		<div class="wrapper">
			<?php if($data->num_rows() > 0) { ?>
			<hr/>
			
			<?php
				switch($jn_grafik){
					case 1:
						echo '<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
					break;
					case 2:
						echo '<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
					break;
					case 3:
						echo '<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
					break;
					case 4:
						echo '<div id="container" style="min-width: 310px; height: 600px; margin: 0 auto"></div>';
					break;
					case 5:
						echo '<div id="container" style="min-width: 310px; height: 600px; margin: 0 auto"></div>';
					break;
					case 6:
						echo '<div id="container" style="min-width: 310px; height: 600px; margin: 0 auto"></div>';
					break;
					default:
						echo '<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
					break;
				}
			?>
			<!--<div id="container" style="min-width: 310px; height: 800px; margin: 0 auto"></div>-->
			
			
			<div id="mdiv">
			<table id="dataTables" class="table table-striped table-hover" style="padding-top:600px;width:100%">
				<thead>
					<tr>
						<th width="20px"><?php echo lang('Nomor'); ?></th>
						<th width="40%"><?php echo lang($series_nama,true); ?></th>
						<th width="50%"><?php echo $series_angka.' ('.$satuan.')'; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $d){
						echo '
						<tr style="text-align:center;">
							<td>'.$d->ID.'</td>
							<td>'.$d->Nm_Data.'</td>
							<td>'.number($d->Angka_Data,2).'</td>
						</tr>';
					}
					?>
				</tbody>
			</table>
			</div>
			<?php } ?>
		</div>
		
		
	</main>
	<?php $this->load->view('footer'); ?>
</body>
</html>