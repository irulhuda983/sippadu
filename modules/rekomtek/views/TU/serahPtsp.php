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
                                    <h1 class="custom-font"><?php echo $title; ?> / Upload File</h1>
                                </div>
								<!-- /tile header -->

                                <!-- tile widget -->
								<?php echo $this->session->flashdata('pesan'); ?>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body p-0">
                                        <div class="row">
                                            <div class="col-ms-12">
                                                <div class="block-fluid mt-2">
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Kode registrasi</div>
                                                        <div class="col-sm-6"><?php echo $rekom['ID_Reg']; ?></div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Pemilik usaha</div>
                                                        <div class="col-sm-6"><?php echo $rekom['Pemilik_Usaha']; ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Nama Usaha</div>
                                                        <div class="col-sm-6"><?php echo $rekom['Nm_Usaha']; ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Tanggal Minta</div>
                                                        <div class="col-sm-6"><?php echo $rekom['Tgl_Mohon']; ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Alamat</div>
                                                        <div class="col-sm-6"><?php echo $rekom['Alamat_Usaha']; ?></div>
                                                    </div>

                                                    <hr>
                                                    <form action="<?= site_url('/tu/uploadSK'); ?>" method="post" enctype="multipart/form-data">

                                                    <input type="hidden" name="table" value="<?= $izin['nama_table']; ?>">
                                                    <input type="hidden" name="izin_id" value="<?= $izin['izin_id']; ?>">
                                                    <input type="hidden" name="rekom_id" value="<?= $izin['id_rekom_izin']; ?>">
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">No Surat</div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="no_surat" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Tanggal Surat</div>
                                                        <div class="col-sm-6">
                                                            <input type="date" name="tanggal_surat" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">File SK</div>
                                                        <div class="col-sm-6">
                                                            <input type="file" name="file_sk" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;"></div>
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
									<!-- /tile body -->


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
			



