					<nav class="mainNav">
						<ul class="pageLinks" role="menu">
							<?php 
							if($data_menu_atas->num_rows() > 0){ 
								$dma = '';
								foreach($data_menu_atas->result() as $ma){
								$dma .= '<li class="" tabindex="0" aria-haspopup="true" role="menuitem">
											<div onclick="window.location.href=\''.autolink_menu($ma->ID_Menu).'\'" role="button" class="navLink '.menuopen($ma->Class_Menu,$menuopen).'" tabindex="index">'.$ma->Nm_Menu.icon_dropdown_menu($ma->ID_Menu,'<span class="icn chevron-down-sm-w"></span>').'</div>
											'.child_menu($ma->ID_Menu).'
										</li>';
								}
								echo $dma;
							} 
							
							?>
						</ul>
					</nav>