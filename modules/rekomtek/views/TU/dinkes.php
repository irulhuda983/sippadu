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
												<ul class="nav nav-pills">
													<?php foreach($menuIzin as $i) : ?>
														<li role="presentation" data-id="<?= $i['Kd_Izin']; ?>" data-url="<?= site_url('dinkes/getDataTu'); ?>" class="btn-menu-tu"><a href="#"><?= $i['Kd_Class']; ?></a></li>
													<?php endforeach; ?>
												</ul>
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
									<div class="tile-body p-0" id="kotak-data-tu">

										
									<div class="table-responsive">
										<div class="alert alert-warning alert-dismissible" role="alert">
											<strong>Pilih Menu Izin!</strong> Silahkan pilih salah satu menu izin.
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
			



