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
												<input class="btn btn-blue" type="button" id="add" value="Tambah Data" onclick="window.location.href='<?php echo site_url(fmodule('daftar')); ?>'"/>
											</div>

											<div class="col-sm-4">
												
												<div class="input-group">
													<input type="text" name="keyword" class="input-sm form-control" placeholder="Search...">
													  <span class="input-group-btn">
														<input type="submit" name="search" class="btn btn-sm btn-default" value="Cari">
													  </span>
												</div>
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="">
												<thead>
													<tr class="active">                                   
														<th width="">Jenis Izin</th>
														<th width="">ID Registrasi</th>
														<th width="">Nama Pemohon</th>
														<th width="">No Identitas</th>
														<th width="">Tanggal</th>
														<th width="20px">Cetak</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                 
																	<td>'.$d->NM_IZIN.'</td>
																	<td>'.$d->ID_IZIN.'</td>
																	<td>'.$d->NM_PELANGGAN.'</td> 
																	<td>'.$d->NOKITAS.'</td> 
																	<td>'.TimeFormat($d->TGL_BUAT).'</td> 
																	<td align="center">'.anchor_popup_label(site_url(fmodule($d->KD_IZIN.'/cetak_tt/'.$d->ID)),'Cetak','info',$popup).'</td>	
																</tr>  '; 
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
