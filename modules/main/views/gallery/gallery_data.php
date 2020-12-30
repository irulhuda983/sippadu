
				<?php if($data->num_rows() > 0) { ?>
				<ul class="newsList contentListContainer block-list-4">
					<?php foreach($data->result() as $d){ ?>
					<li>
						<a href="<?php echo site_url(fmodule('gallery/open/'.$d->ID_Album.'/'.url_title($d->Nm_Album,'-',TRUE))); ?>" class="thumbnail albumThumb">
							<figure>
								<span class="image">
									<div class='ginfo'><span class="icn photo-w"></span><span class="count"><?php echo number($d->JmlFoto).' '.lang('foto'); ?></span><!--<span class="count" style="filter: brightness(80%);"><?php echo lang('Dilihat').' '.number($d->Hits); ?>x</span>--></div>
										<?php echo imgsrc($d->Cover_Raw.'_original'.$d->Cover_Ext,'gallery',config('main_site'),true); ?>
								</span>
								<figcaption>
									<span class="title"><?php echo lang($d->Nm_Album,true); ?></span>
								</figcaption>
							</figure>
						</a>
					</li>
					<?php } ?>
				</ul>
				<?php } else{ ?>
					<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
				<?php } ?>