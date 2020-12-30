	<?php 
	
	if(data_widget(1)->num_rows() > 0){
		$slide = '';
		$n = 1;
		$limit_slide = config('widget_limit_slideshow');
		$tot = data_slide($limit_slide)->num_rows();
		if(data_slide($limit_slide)->num_rows() > 0){
			$slide .= '
			<div class="slideshow-container">
				<div class="slide-container" style="margin-bottom:-40px;">';
					foreach(data_slide($limit_slide)->result() as $dsh){
						$slide .= '
						<div class="mySlides fade">
						<section class="full-width-poppy-promo">
						<picture class="full-width-poppy-promo__img">';
						$slide .= imgsrc($dsh->Image_Raw.'_original'.$dsh->Image_Ext,'slide');
						$slide .= '
						</picture>
						<div class="full-width-poppy-promo__content">
							<div class="full-width-poppy-promo__headline">
								<div class="full-width-poppy-promo__text">
									<h1 class="full-width-poppy-promo__heading">'.($dsh->Show_Title > 0 ? $dsh->Nm_Slide : '').'</h1>
								</div>
							</div>
							<div class="full-width-poppy-promo__explainer">
								<h4 class="full-width-poppy-promo__secondary-heading">'.($dsh->Show_Desc > 0 ? $dsh->Description : '').'</h4>
							</div>
						</div>
					</section>
					</div>';
					}

					/* $slide .= '
					<a class="prev" onclick="plusSlides(-1);">&#10094;</a>
					<a class="next" onclick="plusSlides(1);">&#10095;</a>'; */

				$slide .= '
				</div>';
				
				$slide .= '
				<div class="div-dot" style="text-align:center;opacity:0;">';
					$i = 1;
					foreach(data_slide($limit_slide)->result() as $dsh){
						$act = '';
						if($i==1){$act='active';}
						$slide .= '
							<span class="dot"></span>';
							++$i;
					}
				$slide .= '
				</div>';
				
			$slide .= '	
			</div>';
		
		} 
		echo $slide;
	}
	?>