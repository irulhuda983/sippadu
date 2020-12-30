			<?php
			if($this->config->item('tampilan_layout_berita') == 'tabel'){
			?>
				
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th width="100px">Gambar</th>
						<th width="300px">Judul</th>
						<th width="">Deskripsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($data_berita->num_rows() > 0){
						$i = 1;
						foreach($data_berita->result() as $d){
						echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.imgsrc($d->Image_Raw.'_original'.$d->Image_Ext,'informasi',config('main_site'),TRUE,'style="width:200px;height:200px;"').'</td>
								<td><a href="'.autolink_berita($d->ID_Info).'"><b>'.$d->Judul.'</b></a></td>
								<td align="justify" style="padding-bottom:50px">'.character_limiter(textonly($d->Konten),250).'</td>
							</tr>';
							++$i;
						}
					}
					?>
				</tbody>
			</table>
			<?php
			}
			elseif($this->config->item('tampilan_layout_berita') == 'list'){
			?>
				
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width=""></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($data_berita->num_rows() > 0){
						foreach($data_berita->result() as $d){
						echo '
							<tr>
								<td><a href="'.autolink_berita($d->ID_Berita).'"><b>'.$d->Judul.'</b></a></td>
							</tr>
							<tr>
								<td align="justify" style="padding-bottom:50px">'.character_limiter(textonly($d->Konten),250).'</td>
							</tr>';
						}
					}
					?>
				</tbody>
			</table>
			<?php
			}
			else{
			?>
				
			<section data-script="pl_filtered-list" data-widget="filtered-content-list" data-page-size="10" data-content-type="text" data-page="0" data-tags="News" data-references="" class="mainWidget latestFeatures">
				<section class="pageFilter" data-use-history="true" data-filter-config="editorial" data-widget="tables-filter" data-reset-available="true"></section>
					<ul class="newsList contentListContainer">
						<li>
							<section class="featuredArticle">
								<div class="col-12-m">
									<?php 
									if($data_berita->num_rows() > 0){
										foreach($data_berita->result() as $db){
											echo '
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
										}
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
			<?php 
			}
			?>