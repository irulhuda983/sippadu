<section id="content">
                <div class="page page-dashboard">

                    <?php if($this->session->flashdata('alert')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="tile">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Surat Rekomendasi</strong> Berhasil di setting.
                                </div>
                            </section>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- cards row -->
                    <div class="row">
						
						<!-- col -->
                        <div class="col-md-12">
							

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h1 class="custom-font"><?php echo $title; ?></h1>
                                        </div>
                                        <div class="col-md-4">
                                            No. Registrasi : <?= $izin['ID_Reg']; ?> | 
                                            <a class="btn btn-primary" href="<?= site_url('backOffice'); ?>">Kembali</a>
                                        </div>
                                    </div>
                                </div>
								<!-- /tile header -->

                                <!-- tile widget -->
								<form action="<?= site_url('sk/saveSk'); ?>" method="POST">
									<!-- <div class="tile-widget">

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

									</div> -->
                                    <!-- /tile widget -->
                                    <input type="hidden" name="no_reg" value="<?= $izin['ID_Reg']; ?>">
                                    <input type="hidden" name="id_rekom" value="<?= $rekom; ?>">

									<!-- tile body -->
									<div class="tile-body">
                                        <h4>Header</h4>
                                        <hr class="line-solid line-full">
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">No Surat</label>
											<div class="col-sm-6">
                                                <input type="text" name="no_surat" id="no_surat" placeholder="Nomor Surat" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Sifat</label>
											<div class="col-sm-6">
                                                <input type="text" name="sifat" id="sifat" placeholder="Sifat Surat" class="form-control" value="Penting">
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Lampiran</label>
											<div class="col-sm-6">
                                                <input type="text" name="lam" id="lam" placeholder="Lampiran Surat" class="form-control" value="1 (Bendel)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Perihal</label>
											<div class="col-sm-6">
                                                <textarea name="hal" id="hal" rows="3" class="form-control">Pemeriksaan Ijin Lab. Klinik "<?= $izin['Nm_Usaha']; ?>" <?= $izin['Alamat_Usaha']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Tempat & Tanggal</label>
											<div class="col-sm-3">
                                                <input type="text" name="tempat" id="tempat" class="form-control" value="Bojonegoro">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 control-label">Kepada</label>
                                            <div class="col-sm-1">
                                                Yth.
                                            </div>
											<div class="col-sm-5">
                                                <textarea name="kepada" id="kepada" rows="3" class="form-control">Kepala Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu Kabupaten Bojonegoro</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr class="line-solid line-full">
                                    <div class="tile-body">
                                        <h4>Badan Surat</h4>
                                        <div class="form-group">
											<label for="jenis_izin" class="control-label">Jenis Izin Klinik Yang Diterbitkan</label>
											<textarea name="jenis_izin" id="jenis_izin" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
											<label for="jenis_pelayanan" class="control-label">Jenis Pelayanan Yang Diberikan</label>
											<textarea name="jenis_pelayanan" id="jenis_pelayanan" rows="3" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
											<label for="dokter" class="control-label">Dokter Penanggung Jawab</label>
											<input type="text" name="dokter" class="form-control">
                                        </div>
                                        <div class="form-group">
											<label for="alamat" class="control-label">Alamat Klinik</label>
											<textarea name="alamat" id="alamat" rows="3" class="form-control"><?= $izin['Alamat_Usaha']; ?></textarea>
                                        </div>
                                    </div>

                                    <hr class="line-solid line-full">
                                    <div class="tile-body">
                                        <h4>Footer Surat</h4>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Nama Kepala Dinas</label>
											<div class="col-sm-6">
                                                <input type="text" name="kadin" id="kadin" placeholder="Nama Kepala Dinas" class="form-control" value="Dr. Sunhadi, M.Kes.">
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Pangkat</label>
											<div class="col-sm-6">
                                                <input type="text" name="pangkat" id="pangkat" class="form-control" value="Pembina Utama Muda">
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">NIP</label>
											<div class="col-sm-6">
                                                <input type="text" name="nip" id="nip" class="form-control" value="195907211987011001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
											<label for="" class="col-sm-2 control-label">Tembusan</label>
											<div class="col-sm-6">
                                                <input type="text" name="tembusan1" id="tembusan1" class="form-control" value="Dr. Tjetjep Sutisna">
                                            </div>
                                        </div> 
                                    </div>
                                    <hr class="line-solid line-full">
                                    <div class="tile-body">
                                        <button class="btn btn-success" type="submit">Simpan</button>
                                        <a href="<?= site_url('backOffice'); ?>" class="btn btn-warning">Kembali</a>
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
			




                                        