			<section class="mainWidget latestFeatures " style="">
				<div class="allTablesContainer">
					<div class="wrapper col-12">
						<div class="tableContainer" data-round="">
							<div class="table wrapper col-12">
								<table>
									<thead>
										<tr>
											<!--<th class="revealMoreHeader text-centre" style="display: table-cell;" scope="col">More</th>-->
											<th class="hideSmall" scope="col"><div class="thFull">Jenis</div><div class="thShort">Jn</div></th>
											<th class="hideSmall" scope="col"><div class="thFull">No Registrasi</div><div class="thShort">Reg</div></th>
											<th class="team" scope="col"><div class="thFull">Nama Usaha</div><div class="thShort">Usaha</div></th>
											<th class="hideMed" scope="col"><div class="thFull">No KITAS</div><div class="thShort">KITAS</div></th>
											<th class="hideMed" scope="col"><div class="thFull">Pemohon</div><div class="thShort">Pmh</div></th>
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
													<!--<td class="revealMore" style="display: table-cell" datanya="1" tabindex="0" role="button"><div class="icn chevron-down-g"></div></td>-->
													<td class="hideSmall">'.$d->NM_IZIN.'</td>
													<td class="hideSmall" scope="row"><span class="long">'.$d->ID_IZIN.'</span><span class="short">'.$d->ID_IZIN.'</span></td>
													<td class="team" scope="row"><span class="long">'.$d->NM_PERUSAHAAN.'</span> <span class="short">'.character_limiter($d->NM_PERUSAHAAN,20).'</span></td>
													<td class="hideMed" scope="row"><span class="long">'.$d->NOKITAS.'</span> <span class="short">'.$d->NOKITAS.'</span></td>
													<td class="hideMed" scope="row"><span class="long">'.$d->NM_PELANGGAN.'</span> <span class="short">'.$d->NM_PELANGGAN.'</span></td>
													<td class="form">
														<ul>
															<li tabindex="0" class="'.LblTrack($d->Flow_FO).' button-tooltip" id="Tooltip" role="tooltip">O 
															<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
															Front Office : "'.LblProses($d->Flow_FO).'"</span></span></span></span></a></li>
														</ul>
													</td>
													<td class="form">
														<ul>
															<li tabindex="0" class="'.LblTrack($d->Flow_BO).' button-tooltip" id="Tooltip" role="tooltip">O 
															<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
															Back Office : "'.LblProses($d->Flow_BO).'"</span></span></span></span></a></li>
														</ul>
													</td> 
													<td class="form">
														<ul>
															<li tabindex="0" class="'.LblTrack($d->Flow_Kabid).' button-tooltip" id="Tooltip" role="tooltip">O 
															<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
															Kepala Bidang : "'.LblProses($d->Flow_Kabid).'"</span></span></span></span></a></li>
														</ul>
													</td> 
													<td class="form">
														<ul>
															<li tabindex="0" class="'.LblTrack($d->Flow_Kadin).' button-tooltip" id="Tooltip" role="tooltip">O 
															<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
															Kepala Dinas : "'.LblProses($d->Flow_Kadin).'"'.$d->Nm_Kadin.'</span></span></span></span></a></li>
														</ul>
													</td> 
													<td class="form">
														<ul>
															<li tabindex="0" class="'.LblTrack($d->Flow_TU).' button-tooltip" id="Tooltip" role="tooltip">O 
															<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
															Tata Usaha : "'.LblProses($d->Flow_TU).'"</span></span></span></span></a></li>
														</ul>
													</td> 
													<td class="form">
														<ul>
															<li tabindex="0" class="'.LblTrack($d->Flow_Serah).' button-tooltip" id="Tooltip" role="tooltip">O 
															<a href="javascript:void(0);" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="teamName">
															'.($d->Flow_Serah == '1' ? 'Telah Diambil Pemohon' : 'Belum Diambil Pemohon').'</span></span></span></span></a></li>
														</ul>
													</td> 
												</tr>
												<!--<tr class="expandable" data-filtered-table-row-expander="12">
													<td colspan="13">
														<a href="//localhost/clubs/12/Manchester-United/overview" class="expandableTeam"><span class="badge-50 t1"></span> <span class="teamName">Manchester United</span></a><div class="expandableFixtures"><div class="resultWidget"><div class="label"><strong>Latest Result</strong> - Saturday 26 August 2017</div><a href="//localhost/match/22367" class="matchAbridged pre"><span class="teamName">MUN</span> <span class="badge-20 t1"></span> <span class="score">2<span>-</span>0 </span><span class="badge-20 t13"></span> <span class="teamName">LEI</span> <span class="icn arrow-right"></span></a></div> <div class="resultWidget"><div class="label"><strong>label.latestfixture</strong> - Friday 8 September 2017</div><a href="//localhost/match/22379" class="matchAbridged pre"><span class="teamName">STK</span> <span class="badge-20 t110"></span> <time>21:53</time> <span class="badge-20 t1"></span> <span class="teamName">MUN</span> <span class="icn arrow-right"></span></a></div><div class="btnContainer"><a href="//localhost/clubs/12/Manchester-United/overview" class="btn-highlight" role="btn">Visit Club Page<span class="icn arrow-right-w"></span></a></div></div><div class="teamPerformanceStandingsArea" style="display:none"><header><h3 class="subHeader left"></h3><a href="/stats/comparison" class="btn right">Compare against another team<span class="icn arrow-right"></span></a></header><div class="teamPerformanceStandingsContainer"></div></div>
													</td>-->
												</tr> ';
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
			</section>
			<!--<section class="mainWidget latestFeatures "></section>-->
			
			
			
			<script>
			$('.revealMore').click(function() {
				var datanya = $(this).attr('datanya');
				if($('tr[datanya="'+datanya+'"]').hasClass('expanded')){
					$('tr[datanya="'+datanya+'"]').removeClass('expanded');
				}
				else{
					$('tr[datanya="'+datanya+'"]').addClass('expanded');
				}
			});

			</script>