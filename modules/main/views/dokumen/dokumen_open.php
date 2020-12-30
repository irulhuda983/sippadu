<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
	
</head>
<body style="">
	<?php $this->load->view('top'); ?>
	<main id="mainContent" tabindex="0">
		<?php if($head_frame){ ?>
		<header class="articleHeader">
			<div class="wrapper">
				<div class="col-9 col-8-m">
					<div class="articleHeaderContent">
						<h5 class="newsTag"><?php echo dokumen_kategori($id,TRUE,'style="color:#9e9e9e;text-decoration:none;font-style:italic;"'); ?></h5>
						<h1 class="articleTitle"><?php echo $judul; ?></h1>
						<h5><span class="articleAuth"><?php echo $upload_time.' | '.lang('Dilihat').': '.number($Hits).' '.lang('kali').' | '.lang('Didownload').': '.number($Download).' '.lang('kali').''; ?></span></h5>
					</div>
				</div>
			</div>
		</header>
		<?php } ?>
		<div id="mdiv" align="center" style="<?php echo 'margin: auto;border:1px #fff solid;width:'.$w_frame.';height:'.$h_frame.';'; ?>"><iframe style="width:100%;height:100%;" frameborder="0" src="<?php echo $url; ?>" /></iframe></div>
	</main>
	<?php $this->load->view('footer'); ?>
</body>
</html>