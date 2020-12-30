	<?php 
	$slide = '';
	$n = 1;
	$tot = $data_slide_home->num_rows();
	if($data_slide_home->num_rows() > 0){
		$slide .= '
		<div class="slideshow-container">
			<div class="slide-container">';
				foreach($data_slide_home->result() as $dsh){
					$slide .= '
					<div class="mySlides fade">
					<section class="full-width-poppy-promo">
					<picture class="full-width-poppy-promo__img">';
					$slide .= imgsrc($dsh->Image_Raw.$dsh->Image_Ext,'slide');
					$slide .= '
					</picture>
					<div class="full-width-poppy-promo__content">
						<div class="full-width-poppy-promo__headline">
							<div class="full-width-poppy-promo__text">
								<h1 class="full-width-poppy-promo__heading">'.($dsh->Show_Title > 0 ? $dsh->Nm_Slide : '').'</h1>
							</div>
						</div>
						<div class="full-width-poppy-promo__explainer">
							<h4 class="full-width-poppy-promo__secondary-heading">'.($dsh->Show_Desc > 0 ? $dsh->Description : '').'</h2>
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
			<div class="div-dot" style="text-align:center">';
				$i = 1;
				foreach($data_slide_home->result() as $dsh){
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
	?>