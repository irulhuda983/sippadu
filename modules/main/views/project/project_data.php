			<?php if($data->num_rows() > 0) {?>
			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="20px"><?php echo lang('Nomor'); ?></th>
						<th width=""><?php echo lang('Nama Project'); ?></th>
						<th width=""><?php echo lang('Lokasi'); ?></th>
						<th width="200px"><?php echo lang('Nama Instansi'); ?></th>
						<th width=""><?php echo lang('Jumlah Pelaksana'); ?></th>
						<th width=""><?php echo lang('Anggaran'); ?></th>
						<th width="300px"><?php echo lang('Waktu Pelaksanaan'); ?></th>
						<th width="50px"><?php echo lang('Lihat'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $n = 1; foreach($data->result() as $d){
						echo '
						<tr '.($d->Kode ? '' : 'style="background-color:#e8e8e8;"').'>
							<td>'.$n.'.</td>
							<td>'.$d->Nm_Project.'</td>
							<td>'.$d->Lokasi.'</td>
							<td>'.$d->Nm_Instansi.'</td>
							<td>'.$d->Jml_Pelaksana.'</td>
							<td>'.number($d->Anggaran).'</td>
							<td style="text-align:center;">'.(($d->Time_Mulai == $d->Time_Akhir) ? Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')) : '<table style="text-align: left;"><tr><td>'.lang('Mulai').':</td><td style="text-align:center;"> '.Date_Indo(TimeFormat($d->Time_Mulai,'d F Y')).'</td></tr><tr><td>'.lang('Selesai').':</td><td style="text-align:center;">'.Date_Indo(TimeFormat($d->Time_Akhir,'d F Y')).'</td></tr></table>').'</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('project/open/'.$d->ID_Project.'/'.url_title($d->Nm_Project,'-',TRUE))).'\'" class="btn quickView" role="button" data-modal-active="true">'.lang('Lihat').'</span></td>
						</tr>';
						++$n;
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
			<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
			<?php } ?>