			<section data-script="pl_filtered-list" data-widget="filtered-content-list" data-page-size="10" data-content-type="text" data-page="0" data-tags="News" data-references="" class="mainWidget latestFeatures">
				<section class="pageFilter" data-use-history="true" data-filter-config="editorial" data-widget="tables-filter" data-reset-available="true"></section>
					<ul class="newsList contentListContainer">
						<li>
							<section class="featuredArticle">
								<div class="col-12-m">
									<?php 
									if($data->num_rows() > 0){
										$h = '';
										foreach($data->result() as $db){
											switch($db->Type){
												case 'berita':
													$h .= '
													<a href="'.autolink_berita($db->ID_Berita).'"  class="thumbnail thumbLong">
														<figure>
															<span class="image thumbCrop-latestnews">'.imgsrc($db->Image_Raw.'_original'.$db->Image_Ext,'berita',config('main_site'),TRUE).'</span>
															<figcaption>
																<span class="tag">'.berita_kategori($db->ID_Berita).'</span>
																<span class="title">'.$db->Judul.'</span>
																<span class="text" style="text-align:justify">'.character_limiter(textonly($db->Konten),500).'</span>
															</figcaption>
														</figure>
													</a>';
													break;
												case 'informasi':
													$h .= '
													<a href="'.autolink_informasi($db->ID_Berita).'"  class="thumbnail thumbLong">
														<figure>
															<span class="image thumbCrop-latestnews">'.imgsrc($db->Image_Raw.'_original'.$db->Image_Ext,'informasi',config('main_site'),TRUE).'</span>
															<figcaption>
																<span class="tag">'.informasi_kategori($db->ID_Berita).'</span>
																<span class="title">'.$db->Judul.'</span>
																<span class="text" style="text-align:justify">'.character_limiter(textonly($db->Konten),500).'</span>
															</figcaption>
														</figure>
													</a>';
													break;
											}
										}
										echo $h;
									}
									else{
										echo '<div class="center" style="text-align:center;">'.lang('Oops, tidak ada data !!!').'</div>';
									}
									?>
								</div>
							</section>
						</li>
					</ul>
				</section>