		<section id="trackingresult" class="mainWidget latestFeatures hide"></section>
	  
	    <?php if($data_berita->num_rows() > 0) { ?>
		<section class="mainWidget latestFeatures ">
			
			<header><h3 class="subHeader"><?php echo lang('Berita'); ?></h3></header>
			<ul class="block-list-4">
				<?php 
				
				$brt = ''; 
				foreach($data_berita->result() as $br){
					$brt .= '
					<li>
						<a href="javascript:void(0);" onclick="window.location.href=\''.autolink_berita($br->ID_Berita).'\'" class="thumbnail">
							<figure>
								<span class="image thumbCrop-latestnews">'.imgsrc($br->Image_Raw.'_thumb'.$br->Image_Ext,'berita',config('main_site')).'</span>
								<figcaption><span class="tag">'.berita_kategori($br->ID_Berita).'</span><span class="title">'.$br->Judul.'</span></figcaption>
							</figure>
						</a>
					</li>';
				}
				echo $brt;
				?>
			</ul>
			<a class="btn moreBtn" href="<?php echo site_url(fmodule('berita')); ?>"><?php echo lang('Berita Lainnya'); ?><span class="visuallyHidden">: <?php echo lang('Berita'); ?></span><span class="icn arrow-right"></span></a>
		</section>
		<?php } ?>