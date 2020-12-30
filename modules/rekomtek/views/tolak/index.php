<section id="content">
                <div class="page page-dashboard">

                    <!-- cards row -->
                    <div class="row">
						
						<!-- col -->
                        <div class="col-md-12">
							

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
								<!-- /tile header -->

                                <!-- tile widget -->
								<form action="">
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-9">
												
											</div>

											<div class="col-sm-3">
												
												<div class="input-group">
													<input type="text" name="keyword" class="input-sm form-control" value="" placeholder="Search...">
													  <span class="input-group-btn">
														<input type="submit" id="search" name="search" class="btn btn-sm btn-default" value="Cari">
													  </span>
												</div>
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->
									<?php echo $this->session->flashdata('pesan'); ?>
									<!-- tile body -->
									<div class="tile-body p-0">

										
									<div class="table-responsive">
											<table  class="table table-hover" id="" style="font-size:12px;">
												<thead>
													<tr class="active">
														<th width="60px">No</th>
														<th width="">No Registrasi</th>
														<th width="">Nama Usaha</th>
														<th width="">Pemilik</th>
														<th width="">Status</th>
														<th colspan="2">Aksi</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if($rekom != NULL) : ?>
                                                        <?php $no=1; foreach ($rekom as $data) : ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <?php 
                                                                $izin = $this->db->get_where($data['nama_table'], ['ID' => $data['izin_id']])->row_array();
                                                            ?>
                                                            <td><?= $izin['ID_Reg']; ?></td>
                                                            <td><?= $izin['Nm_Usaha']; ?></td>
                                                            <?php if($data['jenis_izin'] == 11) :?>
                                                                <td><?= $izin['Pemilik_Usaha']; ?></td>
                                                            <?php else : ?>
                                                                <td><?= $izin['Pemilik'] ?></td>
                                                            <?php endif; ?>
                                                            <td>
                                                                <span class="badge badge-warning">Ditolak</span>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('tolak/delete/'.$data['izin_id'].'/'.$data['nama_table']); ?>" class="badge badge-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                    <tr>
                                                        <td colspan="6">Tidak Ada Izin Ditemukan</td>
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
																			<td>Nama Usaha</td>
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
																	<h4>Proses</h4>
																	<!-- <label class="checkbox checkbox-custom-alt">
																		<input type="checkbox" name="chk1" value="1" checked>
																		<i></i> Surat Rekomendasi dari IAI Cabang Bojonegoro
																	</label> -->
																	<label class="checkbox checkbox-custom-alt">
																		<input type="checkbox" name="chk2" value="1">
																		<i></i> Visitasi lapangan Oleh tim teknis perijinan tenaga sarana dan prasarana Dinas Kesehatan
																	</label>
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
																	
										
                                        

									</div>
									<!-- /tile body -->
								</form>

                                <!-- tile footer -->
								
								
                                <!-- /tile footer -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>
			</section>
			



