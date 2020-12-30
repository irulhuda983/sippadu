<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php $this->load->view('top'); ?>
            <?php $this->load->view('menu'); ?>
            <section id="content">
                <div class="page page-dashboard">
                    <div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>

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
								<?php echo alert(); ?>
								<?php echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-8">
												<div class="btn-group mb-10">
													<input class="btn btn-blue" type="button" name="add" value="Tambah Data Pemohon" onclick="popup('<?php echo site_url(fmodule('personal/fo_add_win/'.encrypt(site_url(fmodule($Class_Izin.'/fo_daftar'))))); ?>')"/>
												</div>
											</div>

											<div class="col-sm-4">
												
												<div class="input-group">
													<input type="text" name="keyword" class="input-sm form-control" value="<?php echo set_value('keyword'); ?>" placeholder="Search...">
													  <span class="input-group-btn">
														<input type="submit" id="search" name="search" class="btn btn-sm btn-default" value="Cari">
													  </span>
												</div>
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="font-size:12px;">
												<thead>
													<tr class="active">  
														<th width="60px">ID</th>
														<th width="">Nama Personal</th>
														<th width="">Alamat</th>
														<th width="">No Identitas</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr style="font-weight: bold;">          
																	<td>'.$d->IDPELANGGAN.'</td>
																	<td>'.$d->NM_PELANGGAN.'</td>
																	<td>'.$d->ALAMATPELANGGAN.', '.$d->NAMA_DESA.'<br/>'.$d->NAMA_KECAMATAN.', '.$d->NAMA_KOTA.', '.$d->NAMA_PROVINSI.'</td>
																	<td>'.$d->NOKITAS.'</td> 
																	<td align="center">'.anchor_label(site_url(fmodule($Class_Izin.'/fo_daftar/1/'.$d->IDPELANGGAN)),'Daftar Baru','info').'</td>	
																</tr>  ';
																echo cari_history_tdp($d->IDPELANGGAN);
															}
														}
													?>
												</tbody>
											</table>
										</div>


									</div>
									<!-- /tile body -->
								</form>

                                <!-- tile footer -->
								
								<?php echo $pagination; ?>
                                <!-- /tile footer -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->

		<?php $this->load->view('footer_1'); ?>

    </body>
</html>
