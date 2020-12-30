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
												<input class="btn btn-cyan" type="button" name="button" value="Refresh" onclick="window.location.href='<?php echo current_url(); ?>'"/>
												<input class="btn btn-greensea" type="button" name="button" value="Izin Belum Diproses" onclick="window.location.href='<?php echo site_url(fmodule('tdup/cetak')); ?>'"/>
												<input class="btn btn-dutch" type="button" name="button" value="Izin Telah Diproses" onclick="window.location.href='<?php echo site_url(fmodule('tdup/cetak_all')); ?>'"/>
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
														<th width="">Nama Usaha</th>
														<th width="">Nama Personal</th>
														<th width="">Jenis Izin</th>
														<th width="">Tanggal</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>          
																	<td>'.$d->ID_Reg.'</td>
																	<td>'.$d->Nm_Usaha.'</td>
																	<td>'.$d->NM_PELANGGAN.'</td>
																	<td>'.label_jenis_izin($d->Jenis_Izin,$d->Kd_Jns).'</td>
																	<td>'.TimeFormat($d->Time_Buat,'d/m/Y H:i').'</td> 
																	<td align="center">'.anchor_popup_label(site_url(fmodule('tdup/sk/'.$d->ID)),'Cetak','info',$popup).'</td>	
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
