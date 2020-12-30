			
									<?php 
									if($data_berita->num_rows() > 0){
										foreach($data_berita->result() as $db){
											echo '
											<a href="'.autolink_berita($db->ID_Berita).'"  class="thumbnail thumbLong">
												<figure>
													<span class="image thumbCrop-news-list">'.imgsrc($db->Image_Raw.'_original'.$db->Image_Ext,'berita',config('main_site')).'</span>
													<figcaption>
														<span class="tag">'.berita_kategori($db->ID_Berita).'</span>
														<span class="title">'.$db->Judul.'</span>
														<span class="text">'.character_limiter($db->Konten,500).'</span>
													</figcaption>
												</figure>
											</a>';
										}
									}
									else{
										echo '<div class="center" style="text-align:center;">Oops, tidak ada data !!!</div>';
									}
									?>