			<?php if($data->num_rows() > 0) { ?>
			<br/>
			<table id="dataTables" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="30px"><?php echo lang('Nomor'); ?></th>
						<th width="200px"><?php echo lang('Nama Dokumen'); ?></th>
						<th width="150px"><?php echo lang('Kategori'); ?></th>
						<th width=""><?php echo lang('Deskripsi'); ?></th>
						<th width="50px"><?php echo lang('Dilihat'); ?></th>
						<th width="50px"><?php echo lang('Didownload'); ?></th>
						<th width="50px"><?php echo lang('Lihat'); ?></th>
						<th width="50px"><?php echo lang('Download'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($data->result() as $d){
						echo '
						<tr>
							<td align="right">'.number($i).'.</td>
							<td>'.$d->Judul.'</td>
							<td>'.dokumen_kategori($d->ID_Dokumen,TRUE).'</td>
							<td align="justify">'.character_limiter(textonly($d->Konten),250).'</td>
							<td align="center">'.number($d->Hits).'x</td>
							<td align="center">'.number($d->Download).'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('dokumen/open/'.$d->ID_Dokumen.'/'.url_title($d->Judul,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Lihat').'</span></td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('dokumen/download/'.$d->ID_Dokumen.'/'.url_title($d->Judul,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Download').'</span></td>
						</tr>';
						++$i;
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
			<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>