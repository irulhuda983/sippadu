<?php if($data->num_rows() > 0){ ?>
<div class="allTablesContainer">
<div class="wrapper col-12">
<div class="tableContainer" data-round="">
<div class="table wrapper col-12">
<table>
	<thead>
		<tr>
			<th class="hideSmall" scope="col"><div class="thFull">Jenis</div><div class="thShort">Jn</div></th>
			<th class="hideSmall" scope="col"><div class="thFull">No Registrasi</div><div class="thShort">Reg</div></th>
			<th class="team" scope="col"><div class="thFull">Nama Usaha</div><div class="thShort">Usaha</div></th>
			<!--<th class="hideMed" scope="col"><div class="thFull">No KITAS</div><div class="thShort">KITAS</div></th>-->
			<th class="team" scope="col"><div class="thFull">Pemohon</div><div class="thShort">Pemohon</div></th>
			<th class="teamForm" scope="col"><abbr title="Diproses Front Office">FO</abbr></th> 
			<th class="teamForm" scope="col"><abbr title="Diproses Back Office">BO</abbr></th> 
			<th class="teamForm" scope="col"><abbr title="Diproses Kepala Bidang">KB</abbr></th> 
			<th class="teamForm" scope="col"><abbr title="Diproses Kepala Dinas">KD</abbr></th> 
			<th class="teamForm" scope="col"><abbr title="Diproses Tata Usaha">TU</abbr></th> 
			<th class="teamForm" scope="col"><abbr title="SK Diambil Pemohon">OK</abbr></th> 
		</tr>
	</thead>
	<tbody class="tableBodyContainer"> 
		<?php 
		
		if($data->num_rows() > 0){
			foreach($data->result() as $d){
				echo '
				<tr class="tableDark" datanya="1"> <!-- tableDark / tableLight -->
					<td class="hideSmall" style="text-align:center;">'.$d->NM_IZIN.'</td>
					<td class="hideSmall" scope="row"><span class="thFull" style="text-align:center;">'.$d->ID_IZIN.'</span><span class="thShort">'.$d->ID_IZIN.'</span></td>
					<td class="team" scope="row"><span class="thFull" style="text-align:center;">'.$d->NM_PERUSAHAAN.'</span> <span class="thShort">'.character_limiter($d->NM_PERUSAHAAN,20).'</span></td>
					<!--<td class="hideMed" scope="row"><span class="thFull">'.$d->NOKITAS.'</span> <span class="thShort">'.$d->NOKITAS.'</span></td>-->
					<td class="team" scope="row"><span class="thFull" style="text-align:center;">'.$d->NM_PELANGGAN.'</span> <span class="thShort">'.$d->NM_PELANGGAN.'</span></td>
					<td class="form" style="text-align:center;">
						<ul>
							<li tabindex="0" class="'.LblTrack($d->Flow_FO).' button-tooltip" id="Tooltip" role="tooltip">O 
							<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
							Front Office : "'.LblProses($d->Flow_FO).'"</span></span></span></span></a></li>
						</ul>
					</td>
					<td class="form" style="text-align:center;">
						<ul>
							<li tabindex="0" class="'.LblTrack($d->Flow_BO).' button-tooltip" id="Tooltip" role="tooltip">O 
							<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
							Back Office : "'.LblProses($d->Flow_BO).'"</span></span></span></span></a></li>
						</ul>
					</td> 
					<td class="form" style="text-align:center;">
						<ul>
							<li tabindex="0" class="'.LblTrack($d->Flow_Kabid).' button-tooltip" id="Tooltip" role="tooltip">O 
							<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
							Kepala Bidang : "'.LblProses($d->Flow_Kabid).'"</span></span></span></span></a></li>
						</ul>
					</td> 
					<td class="form" style="text-align:center;">
						<ul>
							<li tabindex="0" class="'.LblTrack($d->Flow_Kadin).' button-tooltip" id="Tooltip" role="tooltip">O 
							<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
							Kepala Dinas : "'.LblProses($d->Flow_Kadin).'"</span></span></span></span></a></li>
						</ul>
					</td> 
					<td class="form" style="text-align:center;">
						<ul>
							<li tabindex="0" class="'.LblTrack($d->Flow_TU).' button-tooltip" id="Tooltip" role="tooltip">O 
							<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
							Tata Usaha : "'.LblProses($d->Flow_TU).'"</span></span></span></span></a></li>
						</ul>
					</td> 
					<td class="form" style="text-align:center;">
						<ul>
							<li tabindex="0" class="'.LblTrack($d->Flow_Serah).' button-tooltip" id="Tooltip" role="tooltip">O 
							<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
							'.($d->Flow_Serah == '1' ? 'Telah Diambil Pemohon' : 'Belum Diambil Pemohon').'</span></span></span></span></a></li>
						</ul>
					</td> 
				</tr>';
			}
		}
		else{
			echo '
				<tr class="tableDark" datanya="1"> <!-- tableDark / tableLight -->
					<td colspan="11"><br/><i>Data yang anda cari tidak ditemukan</i></td>
				</tr> ';
		}
		?>
	</tbody>
</table>
</div>
</div>
</div>
</div>
<?php }else{ ?>
<div class="center" style="text-align:center;">Oops, tidak ada data !!!</div>
<?php } ?>