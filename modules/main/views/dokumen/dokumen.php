<!DOCTYPE html>
<html lang="en">
<head>

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
		<header class="pageHero videoHeader">
			<div class="wrapper col-12">
				<h1 class="pageTitle"><?php echo $title; ?></h1>
				<div class="right"></div>
			</div>
		</header>

		<div class="wrapper col-12">
			<br/>
			<section class="mainWidget latestFeatures " >
				<div class="col-5 centered" style="text-align:center;">
					<div class="searchDataContainer">
						<div class="searchInputContainer" role="search">
							<input id="keyword" type="text" value="" placeholder="<?php echo lang('Cari data disini'); ?>" class="searchTextContainer searchInput" style="text-align:center">
						</div>
					</div>
					<div class="btn reset" role="button" tabindex="0" id="btn-search" onclick="search();"><?php echo lang('Cari'); ?><div class="icn search-sm"></div></div>
				</div>
			</section>
			
			<section id="content" class="mainWidget latestFeatures"></section>
		</div>
		
		
	</main>
	<?php $this->load->view('footer'); ?>
	
	<script>
	
	function search() {
		var q = $('#keyword').val();
		var divClone = $("#btn-search").clone();
		$("#btn-search").html("<?php echo lang('Sedang mencari data. Silakan tunggu'); ?>........");
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('dokumen/data/'.$ID_Kategori)); ?>/?time=" + new Date().getTime(),
				data: {keyword:q,search:"true"},
				success: function(msg){
					$('#content').html(msg);
					$("#btn-search").replaceWith(divClone);
					
				}
		});
	};
	search();
	
	$("#keyword").keyup(function(event) {
		if (event.keyCode === 13) {
			search();
		}
	});
	</script>
</body>
</html>