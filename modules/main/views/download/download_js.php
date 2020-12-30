			<table id="" class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th width="200px">Nama Berkas</th>
						<th width="150px">Kategori</th>
						<th width="">Deskripsi</th>
						<th width="50px">Didownload</th>
						<th width="50px">Lihat</th>
						<th width="50px">Download</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $d){
						echo '
						<tr>
							<td>'.$d->Judul.'</td>
							<td>'.download_kategori($d->ID_Download,TRUE).'</td>
							<td>'.$d->Konten.'</td>
							<td align="center">'.$d->Hits.'x</td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('download/open/'.$d->ID_Download)).'\'" class="btn quickView" role="button" data-modal-active="true">Lihat</span></td>
							<td><span  onclick="window.location.href=\''.site_url(fmodule('download/get/'.$d->ID_Download)).'\'" class="btn quickView" role="button" data-modal-active="true">Download</span></td>
						</tr>';
					}
					?>
				</tbody>
			</table>