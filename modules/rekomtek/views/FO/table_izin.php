<div class="table-responsive">
											<table  class="table table-hover" id="" style="font-size:12px;">
												<thead>
													<tr class="active">
														<th width="60px">No</th>
														<th width="">Nama Usaha</th>
														<th width="">Nama Personal</th>
														<th width="">Tanggal</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php if($rekom != NULL) :?>
													<?php foreach($rekom as $data) : ?>
                                                    <tr> 
                                                        <td>1</td>
                                                        <td>izin apotek</td>
                                                        <td><?= $data['NM_PELANGGAN']; ?></td>
                                                        <td><?= $data['Tanggal_Minta']; ?></td> 
                                                        <!-- <td align="center">
															<a href="">
																Cek Berkas
															</a>
														</td>	 -->
                                                        <td align="center">
															<a href="<?= site_url('frontoffice/validasi/'.$data['ID_Reg']); ?>" class="label bg-greensea" data-toggle="modal" data-target="#exampleModal">
																Validasi
															</a>
														</td>	
													</tr>
													<?php endforeach; ?>
													<?php else : ?>
													<tr colspan="5">
														<td>Tidak Ada Data</td>
													</tr>
													<?php endif; ?>
												</tbody>
											</table>
                                        </div>
                                        
