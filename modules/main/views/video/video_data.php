			<?php if($data->num_rows() > 0) { ?>
				<ul class="newsList contentListContainer block-list-4">
					<?php foreach($data->result() as $d){ ?>
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
			<?php } else{ ?>
				<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>