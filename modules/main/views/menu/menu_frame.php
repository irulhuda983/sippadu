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
						<h1 class="articleTitle"><?php echo $title; ?></h1>
						<h5><span class="articleAuth"><?php echo lang('Dilihat').': '.number($hits).' '.lang('kali'); ?></span></h5>
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