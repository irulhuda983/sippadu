			<?php if($data->num_rows() > 0) {?>
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="20px"><?php echo lang('Nomor'); ?></th>
						<th width="200px"><?php echo lang('Judul Agenda'); ?></th>
						<th width="200px"><?php echo lang('Lokasi'); ?></th>
						<th width="300px"><?php echo lang('Waktu Agenda'); ?></th>
						<th width=""><?php echo lang('Deskripsi'); ?></th>
						<th width="120px"><?php echo lang('Status'); ?></th>
						<th width="50px"><?php echo lang('Lihat'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($data->result() as $d){
						echo '
						<tr '.($d->Kode ? '' : 'style="background-color:#e8e8e8;"').'>
							<td>'.$i.'</td>
							<td>'.$d->Judul.'</td>
							<td>'.$d->Lokasi.'</td>
							<td style="text-align:center;">'.(($d->All_Day || $d->Time_Mulai == $d->Time_Akhir) ? '<table style="text-align: left;"><tr><td>Tanggal:</td><td style="text-align:right;"> '.Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')).'</td></tr></table>' : '<table style="text-align: left;"><tr><td>'.lang('Mulai').':</td><td style="text-align:right;"> '.Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')).($d->Tampilkan_Jam ? ' '.TimeFormat($d->Time_Mulai,'H:i') : '').'</td></tr><tr><td>'.lang('Berakhir').':</td><td style="text-align:right;">'.Date_Indo(TimeFormat($d->Time_Akhir,'d F Y')).($d->Tampilkan_Jam ? ' '.TimeFormat($d->Time_Akhir,'H:i') : '').'</td></tr></table>').'</td>
							<td style="text-align:justify;">'.character_limiter(textonly($d->Konten),150).'</td>
							<td style="text-align:center;">'.($d->Kode == 1 ? 'On schedule' : 'Selesai').'</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('agenda/open/'.$d->ID_Agenda.'/'.url_title($d->Judul,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Lihat').'</span></td>
						</tr>';
						++$i;
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
			<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>