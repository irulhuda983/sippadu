		
	  
	    <?php if(data_informasi(config('widget_limit_informasi'))->num_rows() > 0) { ?>
		<section class="mainWidget latestFeatures ">
			
			<header><h3 class="subHeader"><?php echo lang('Informasi'); ?></h3></header>
			<ul class="block-list-4">
				<?php 
				
				$brt = ''; 
				foreach(data_informasi(config('widget_limit_informasi'))->result() as $br){
					$brt .= '
					<li>
						<a href="javascript:void(0);" onclick="window.location.href=\''.autolink_informasi($br->ID_Info).'\'" class="thumbnail">
							<figure>
								<span class="image thumbCrop-latestnews">'.imgsrc($br->Image_Raw.'_thumb'.$br->Image_Ext,'informasi',config('main_site')).'</span>
								<figcaption><span class="tag">'.informasi_kategori($br->ID_Info).'</span><span class="title">'.$br->Judul.'</span></figcaption>
							</figure>
						</a>
					</li>';
				}
				echo $brt;
				?>
			</ul>
			<a class="btn moreBtn" href="<?php echo site_url(fmodule('informasi')); ?>"><?php echo lang('Informasi Lainnya'); ?><span class="visuallyHidden">: <?php echo lang('Informasi'); ?></span><span class="icn arrow-right"></span></a>
		</section>
		<?php } ?>