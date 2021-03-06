<div class="table-responsive">
											<table  class="table table-hover" id="" style="font-size:12px;">
												<thead>
													<tr class="active">
														<th width="60px">No</th>
														<th width="">No. Reg Izin</th>
														<th width="">Nama Personal</th>
														<th width="">Tanggal</th>
														<!-- <th width="20px">Berkas</th>
														<th width="20px"></th> -->
														<th style="text-align: center" colspan="3">Aksi</th>
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
                                                        <td align="center" width="20px">
															<a href="frontOffice/cekDokumen/<?= $data['id_rekom_izin']; ?>" class="label bg-primary">
																Cek Berkas
															</a>
														</td>
														<?php if($data['fo'] == 0) : ?>
														<td align="center" width="20px">
															<a href="<?= site_url('dinkes/tolakFo'); ?>" data-reg="<?= $izin['ID_Reg']; ?>" data-id="<?= $data['id_rekom_izin']; ?>" class="label bg-danger btn-tolak-fo">Tolak</a>
														</td>	
                                                        <td align="center" width="20px">
														
															<a href="#" class="label bg-greensea validasi-apotek" data-toggle="modal" data-target="#exampleModal" data-url="<?= site_url('dinkes/getDataValidasi/'.$data['id_rekom_izin']); ?>">
																Terima
															</a>
														</td>
														<?php else : ?>
														<td align="center" width="20px">
															<a href="#" class="label bg-danger hapus-validasi-apotek">
																Batalkan Validasi
															</a>
														</td>
														<?php endif; ?>	
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
																		<input type="hidden" id="url" value="<?= site_url('dinkes/validasiFo'); ?>">
																		<input type="hidden" id="id_rekom">
																		<tr>
																			<td>No. Reg</td>
																			<td>:</td>
																			<td id="noReg"></td>
																		</tr>
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
																<div class="col-sm-12 table-responsive">
																	<table class="table">
																		<thead>
																			<tr>
																				<th colspan="2"><h4>Kelengkapan Berkas</h4></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td class="text-success">
																					<i class="fa fa-check"></i>
																				</td>
																				<td>Permohonan Rekomendasi dari DPTMPTSP Bojonegoro</td>
																				<td>
																					<a href="" class="text-success">
																						<i class="glyphicon glyphicon-download-alt"></i>
																					</a>
																				</td>
																			</tr>
																			<tr>
																				<td class="text-success">
																					<i class="fa fa-check"></i>
																				</td>
																				<td>Permohonan Surat Izin Penyelenggara Apotik kepada Badan Perizinan Kabupaten Bojonegoro</td>
																				<td>
																					<a href="" class="text-success">
																						<i class="glyphicon glyphicon-download-alt"></i>
																					</a>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Validasi</button>
													</div>
													</form>
												</div>
											</div>
										</div>
																	
										<script>
											
											$('.validasi-apotek').on('click', function(e){
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
														console.log(izin)
                                                        
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
												 console.log(id)

												$.ajax({
													url: url+'/'+id,
													method: 'GET',
													dataType: 'json',
													success: (res) => {
														console.log(res)
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

											// ketika tolak
											$('.btn-tolak-fo').on('click', function(e) {
												e.preventDefault()
												let url = $(this).attr('href')
												let id = $(this).data('id')
												let reg = $(this).data('reg')

												Swal.fire({
													title: 'Apa anda yakin ingin menolak?',
													text: "Semua data akan di kembalikan ke DPTMPTSP!",
													icon: 'warning',
													showCancelButton: true,
													confirmButtonColor: '#3085d6',
													cancelButtonColor: '#d33',
													confirmButtonText: 'Ya, Tolak!'
													}).then((result) => {
														// console.log(result)
													if (result.isConfirmed) {
														$.ajax({
															url: url,
															data: {
																id: id,
																reg: reg
															},
															method: 'POST',
															dataType: 'json',
															beforeSend: console.log('tunggu'),
															success: (res) => {
																if(res.izin == true){
																	Swal.fire(
																		'Sukses!',
																		'Permintaan rekom berhasil di tolak.',
																		'success'
																	)
																}else{
																	Swal.fire(
																		'Gagal',
																		'Permintaan rekom gagal di tolak :)',
																		'error'
																	)
																}

																document.location.href = 'frontOFfice'
															}
														})
													}
												})
											})

											// end form

										</script>


                                        