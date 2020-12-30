			<?php if($data->num_rows() > 0) {?>
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="20px"><?php echo lang('Nomor'); ?></th>
						<th width=""><?php echo lang('Nama Form'); ?></th>
						<th width=""><?php echo lang('Kategori'); ?></th>
						<th width="500px"><?php echo lang('Deskripsi'); ?></th>
						<th width="50px"><?php echo lang('Hits'); ?></th>
						<th width="50px"><?php echo lang('Lihat'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $n = 1; foreach($data->result() as $d){
						echo '
						<tr>
							<td>'.$n.'.</td>
							<td>'.$d->Nm_Form.'</td>
							<td>'.form_kategori($d->ID_Form).'</td>
							<td align="justify">'.character_limiter(textonly($d->Deskripsi),250).'</td>
							<td>'.number($d->Hits).'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('form/open/'.$d->ID_Form.'/'.url_title($d->Nm_Form,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Lihat').'</span></td>
						</tr>';
						++$n;
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
			<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>