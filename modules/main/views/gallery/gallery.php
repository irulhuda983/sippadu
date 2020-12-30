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
				<div class="searchContainer"><div class="searchInputContainer" role="search"><label for="search-input" class="visuallyHidden"><?php echo lang('Cari'); ?>...</label><input id="keyword" type="text" name="keyword" value="" placeholder="<?php echo lang('Search...'); ?>" class="searchTextContainer searchInput"><div id="btn-search" class="searchIconContainer searchCommit" role="button" tabindex="0" onclick="search();"><div alt="" class="icn search-sm"><span class="visuallyHidden">Submit search</span></div></div></div></div>
				<div class="right"></div>
			</div>
		</header>
		
		<div class="wrapper">
			<hr/>
			<section data-script="pl_filtered-list" data-widget="filtered-content-list" data-page-size="20" data-playlist-restriction="photo" data-content-type="playlist" data-page="0" data-tags="" data-references="" class="mainWidget latestFeatures">
			<div id="content"></div>
			</section>
		</div>
		
		
	</main>

	<?php $this->load->view('footer'); ?>
	<script>
	
	function search() {
		var q = $('#keyword').val();
		$("#content").html("<div class='center' style='text-align:center;'>Sedang mencari data. Silakan tunggu........</div>");
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('gallery/data/'.$ID_Kategori)); ?>/?time=" + new Date().getTime(),
				data: {keyword:q,search:"true"},
				success: function(msg){
					$('#content').html(msg);
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