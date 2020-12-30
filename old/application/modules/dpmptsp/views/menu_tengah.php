			<nav class="subNav" role="menubar">
				<ul>
				<?php
					if($data_menu_tengah->num_rows() > 0){
						$dmt = '';
						foreach($data_menu_tengah->result() as $mt){
							$dmt .= '<li><a href="javascript:void(0);"  onclick="window.location.href=\''.site_url(fmodule('menu/open/'.$mt->ID_Menu)).'\'" class ="'.menuopen($mt->Class_Menu,$menuopen).'" data-link-index="0" role="menuitem">'.$mt->Nm_Menu.'</a></li>';
						}
						echo $dmt;
					}
				?>
				</ul>
			</nav>