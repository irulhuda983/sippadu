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
                                                <a href="ManagemenUser/tambah" class="btn btn-success">Tambah User</a>
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
														<th width="">Nama User</th>
														<th width="">Username</th>
														<th width="">Role</th>
														<th colspan="3">Aksi</th>
													</tr>
												</thead>
												<tbody>
                                                <?php if($user != NULL) : ?>
													<?php $no=1; foreach($user as $data) : ?>
                                                    <tr> 
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $data['nama_user_rekom']; ?></td>
                                                        <td><?= $data['username_rekom']; ?></td> 
                                                        <td><?= $data['role']; ?></td> 
                                                        <!-- <td align="center">
															<a href="">
																Cek Berkas
															</a>
														</td>	 -->
                                                        <td align="center" width="20px">
															<a href="<?= site_url('ManagemenUser/ubah_password/'.$data['id_user_rekom']); ?>" class="label bg-greensea">
																Ubah Password
															</a>
                                                        </td>
                                                        <td align="center" width="20px">
                                                            <a href="<?= site_url('ManagemenUser/edit/'.$data['id_user_rekom']); ?>" class="label bg-primary">
																Edit
															</a>
                                                        </td>

                                                        <td align="center" width="20px">
                                                            <a href="<?= site_url('ManagemenUser/delete/'.$data['id_user_rekom']); ?>" class="label bg-danger">
																Hapus
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
			



