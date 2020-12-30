			<?php if($data->num_rows() > 0) { ?>
			<table id="dataTables" class="table table-striped table-hover" style="width:100%;word-wrap: break-word;">
				<thead>
					<tr>
						<th width="30px"><?php echo lang('Nomor'); ?></th>
						<th width="300px"><?php echo lang('Nama Grafik'); ?></th>
						<th><?php echo lang('Deskripsi'); ?></th>
						<th width="50px"><?php echo lang('Dilihat'); ?></th>
						<th width="50px"><?php echo lang('Lihat'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($data->result() as $d){
						echo '
						<tr>
							<td align="right">'.number($i).'.</td>
							<td>'.$d->Nm_Grafik.'</td>
							<td align="justify">'.character_limiter(textonly($d->Deskripsi),250).'</td>
							<td>'.number($d->Hits).'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('grafik/open/'.$d->ID_Grafik.'/'.url_title($d->Nm_Grafik,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Lihat').'</span></td>
						</tr>';
						++$i;
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
			<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>