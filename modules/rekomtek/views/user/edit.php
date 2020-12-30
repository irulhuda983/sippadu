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
                                    <h1 class="custom-font"><?php echo $title; ?> / Edit User</h1>
                                </div>
								<!-- /tile header -->

                                <!-- tile widget -->
								<?php echo $this->session->flashdata('pesan'); ?>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body p-0">
                                        <div class="row">
                                            <div class="col-ms-12">
                                                <br>
                                                <div class="block-fluid mt-2">

                                                    <form action="<?= site_url('ManagemenUser/edit'); ?>" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $user['id_user_rekom']; ?>">
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Nama lengkap</div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="nama" class="form-control" value="<?= $user['nama_user_rekom']; ?>">
                                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Username</div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="username" class="form-control" value="<?= $user['username_rekom']; ?>">
                                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Role</div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="role">
                                                                <?php foreach($role as $r ) : ?>
                                                                <?php if($user['role_id'] == $r['id_role']) : ?>
                                                                    <option value="<?= $r['id_role']; ?>" selected><?= $r['role']; ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?= $r['id_role']; ?>"><?= $r['role']; ?></option>
                                                                <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                    <input type="hidden" name="foto_lama" value="<?= $user['foto']; ?>">
                                                        <div for="" class="col-sm-2" style="text-align:right;">Foto</div>
                                                        <div class="col-sm-6">
                                                            <input type="file" name="foto" class="form-control">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <img src="<?= base_url('assets/admin/images/user_rekom/'.$user['foto']); ?>" alt="">
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
			



