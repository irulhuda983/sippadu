		<?php if(data_video(0,config('widget_limit_video'))->num_rows() > 0) { ?>
		
			<section data-script="pl_filtered-list" data-widget="filtered-content-list" data-page-size="20" data-playlist-restriction="photo" data-content-type="playlist" data-page="0" data-tags="" data-references="" class="mainWidget latestFeatures">
				<ul class="newsList contentListContainer block-list-4">
					<?php foreach(data_video(0,config('widget_limit_video'))->result() as $d){ ?>
					<li>
						<a href="<?php echo site_url(fmodule('video/open/'.$d->ID_Video.'/'.url_title($d->Nm_Video,'-',TRUE))); ?>" class="thumbnail albumThumb">
							<figure>
								<span class="image">
									<div class='ginfo'><span class="icn play"></span><span class="count"><?php echo lang('Ditonton').' '.number($d->Hits); ?>x</span></div>
										<?php echo create_iframe_video($d->ID_Video,'300','180',false); ?>
								</span>
								<figcaption>
									<span class="title"><?php echo $d->Nm_Video; ?></span>
								</figcaption>
							</figure>
						</a>
					</li>
					<?php } ?>
				</ul>
			</section>
	
		<?php } ?>