<div class="table-responsive">
											<table  class="table table-hover" id="" style="font-size:12px;">
												<thead>
													<tr class="active">
														<th width="60px">No</th>
														<th width="">No. Reg</th>
														<th width="">Nama Personal</th>
														<th width="">Tanggal</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
												<?php if($rekom != NULL) : ?>
													<?php $no=1; foreach($rekom as $data) : ?>
                                                    <tr> 
                                                        <td><?= $no++; ?></td>
                                                        <td>
														<?php
                                                                $izin = $this->rekom->getDetailIzin($data['id_rekom_izin']);
                                                                echo $izin['ID_Reg'];
                                                            ?>
														</td>
                                                        <td><?= $data['NM_PELANGGAN']; ?></td>
                                                        <td><?= date('d-m-Y', $data['tanggal_minta']); ?></td> 
                                                        <!-- <td align="center">
															<a href="">
																Cek Berkas
															</a>
														</td>	 -->
                                                        <td align="center">
															<a href="<?= site_url('tu/serahPtsp/'.$data['id_rekom_izin']); ?>" class="label bg-greensea">
																Serahkan Ke PTSP
															</a>
														</td>	
													</tr>
													<?php endforeach; ?>
													<?php else : ?>
													<tr>
														<td colspan="5" align="center">Tidak Ada Izin Ditemukan</td>
													</tr>
													<?php endif; ?>
												</tbody>
											</table>
										</div>

										<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Verifikasi Izin</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="#" id="form-valid">
													<div class="modal-body">
														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<h4>Data Apotek</h4>
																	<table class="table">
																		<input type="hidden" id="url" value="<?= site_url('/dinkes/validasiTu'); ?>">
																		<input type="hidden" id="id_rekom">
																		<tr>
																			<td>Nama Usaha</td>
																			<td>:</td>
																			<td id="nama_usaha"></td>
																		</tr>

																		<tr>
																			<td>Pemilik Usaha</td>
																			<td>:</td>
																			<td id="pemilik_usaha"></td>
																		</tr>

																		<tr>
																			<td>Alamat Usaha</td>
																			<td>:</td>
																			<td id="alamat_usaha"></td>
																		</tr>

																		<tr>
																			<td>Status Izin</td>
																			<td>:</td>
																			<td id="status_izin"></td>
																		</tr>

																	</table>
																</div>
															</div>

															<hr>
															<div class="row">
																<div class="col-sm-12">
																	<label class="checkbox checkbox-custom-alt">
																		Apakah anda yakin ingin menyerahkan rekomendasi ini ke PTSP ?
																	</label>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Serahkan Ke DPTMPTS</button>
													</div>
													</form>
												</div>
											</div>
										</div>
																	
										<script>
											
											$('.validasi-dinkes-tu').on('click', function(e){
												e.preventDefault()
												let url = $(this).data('url')

												$.ajax({
													url: url,
													method: 'GET',
													dataType: 'json',
													success: (res) => {
                                                        let labelIzin;
                                                        let pemilik
                                                        let izin = res.izin
                                                        let data = res.rekom
                                                        
                                                        if(izin.nama_table == 'sippadu_apotek'){
                                                            pemilik = data.Pemilik_Usaha
                                                        }else {
                                                            pemilik = data.Pemilik
                                                        }

														$('#id_rekom').val(izin.id_rekom_izin)
														$('#noReg').html(data.ID_Reg)
														$('#nama_usaha').html(data.Nm_Usaha)
														$('#pemilik_usaha').html(pemilik)
														$('#alamat_usaha').html(data.Alamat_Usaha)
														if(data.Jenis_Izin == 1){
															labelIzin = `<a href="#" class="label bg-greensea">
																Baru
															</a>`;
														}else if(data.Jenis_Izin == 2){
															labelIzin = `<a href="#" class="label bg-primary">
																Perpanjangan
															</a>`;
														}else if(data.Jenis_Izin == 3){
															labelIzin = `<a href="#" class="label bg-danger">
																Perubahan
															</a>`;
														}
														$('#status_izin').html(labelIzin)

														
													}
												})
											})

											// ketika verivikasi
											$('#form-valid').on('submit', function(e) {
												e.preventDefault();

												let id = $('#id_rekom').val();
												let url = $('#url').val()

												$.ajax({
													url: url+'/'+id,
													method: 'GET',
													dataType: 'json',
													success: (res) => {
														if(res.status == 1){
															Swal.fire({
																position: 'top-end',
																icon: 'success',
																title: res.pesan,
																showConfirmButton: false,
																timer: 1500
															}).then((result) => {
																location.reload();
															})
														}
													}
												})
											})

											// end form

										</script>
                                        