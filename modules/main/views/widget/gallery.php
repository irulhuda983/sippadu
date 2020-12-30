		<?php if(data_gallery(0,config('widget_limit_gallery'))->num_rows() > 0) { ?>
		
			<section data-script="pl_filtered-list" data-widget="filtered-content-list" data-page-size="20" data-playlist-restriction="photo" data-content-type="playlist" data-page="0" data-tags="" data-references="" class="mainWidget latestFeatures">
				<ul class="newsList contentListContainer block-list-4">
					<?php foreach(data_gallery(0,config('widget_limit_gallery'))->result() as $d){ ?>
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
			</section>
	
		<?php } ?>