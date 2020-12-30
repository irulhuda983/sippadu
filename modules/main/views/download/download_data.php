			<?php if($data->num_rows() > 0) {?>
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="200px"><?php echo lang('Nama File'); ?></th>
						<th width="150px"><?php echo lang('Kategori'); ?></th>
						<th width=""><?php echo lang('Deskripsi'); ?></th>
						<th width="50px"><?php echo lang('Didownload'); ?></th>
						<th width="50px"><?php echo lang('Lihat'); ?></th>
						<th width="50px"><?php echo lang('Download'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $d){
						echo '
						<tr>
							<td>'.$d->Judul.'</td>
							<td>'.download_kategori($d->ID_Download,TRUE).'</td>
							<td align="justify">'.character_limiter(textonly($d->Konten),250).'</td>
							<td align="center">'.number($d->Hits).'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('download/open/'.$d->ID_Download.'/'.url_title($d->Judul,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Lihat').'</span></td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('download/get/'.$d->ID_Download.'/'.url_title($d->Judul,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Download').'</span></td>
						</tr>';
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
			<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>