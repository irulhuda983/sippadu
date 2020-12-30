	<?php if(data_banner(config('widget_limit_banner'))->num_rows() > 0){
		$bn = '
		<div class="footerSponsorStrip">
            <ul>';
			foreach(data_banner(config('widget_limit_banner'))->result() as $bnn){	
				$bn .= '
				<li>
					<a href="'.((substr_count($bnn->URL,'http://') || substr_count($bnn->URL,'https://')) ? $bnn->URL : site_url(fmodule($bnn->URL))).'" target="_blank">
						<div class="img-banner">'.imgsrc($bnn->Image_Raw.'_original'.$bnn->Image_Ext,'banner',config('main_site'),TRUE,'title="'.$bnn->Judul.'"').'</div>
						<span alt="" class="type" style="padding-top:3px;">'.$bnn->Keterangan.'<span class="visuallyHidden">'.$bnn->Judul.'</span></span>
					</a>
				</li>';
			}
			$bn .= '
            </ul>
        </div>';
		echo $bn;
	}
	?>