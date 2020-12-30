					<nav class="mainNav">
						<ul class="pageLinks" role="menu">
							<?php 
							if($data_menu_atas->num_rows() > 0){ 
								$dma = '';
								foreach($data_menu_atas->result() as $ma){
								$child_menu = child_menu($ma->ID_Menu);
								$dma .= '<li class="" tabindex="0" aria-haspopup="true" role="menuitem">
											<div onclick="window.location.href=\''.($child_menu !='' ? '#' : site_url(fmodule('menu/open/'.$ma->ID_Menu.'/'.url_title($ma->Nm_Menu,'-',TRUE)))).'\'" role="button" class="navLink '.menuopen($ma->Class_Menu,$menuopen).'" tabindex="index">'.lang($ma->Nm_Menu,TRUE).icon_dropdown_menu($ma->ID_Menu,'<span class="icn chevron-down-sm-w"></span>').'</div>
											'.$child_menu.'
										</li>';
								}
								echo $dma;
							} 
							
							?>
						</ul>
					</nav>