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
								<?php echo form_hidden('Kd_Verifikasi',$Kd_Verifikasi); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-8">
												<input class="btn btn-greensea" type="button" name="add" value="Antrian" onclick="window.location.href='<?php echo site_url(fmodule($Class_Izin.'/rekom')); ?>'"/>
												<input class="btn btn-dutch" type="button" name="add" value="Arsip" onclick="window.location.href='<?php echo site_url(fmodule($Class_Izin.'/rekom_all')); ?>'"/>
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
														<!--<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>-->
														<th width="60px">No</th>
														<th width="60px">ID</th>
														<th width="">Nama Usaha</th>
														<th width="">Nama Personal</th>
														<th width="">Jenis Izin</th>
														<th width="">Tanggal</th>
														<th width="100px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															$n = 1+$offset;
															foreach($data->result() as $d){
																$rekom = $this->db->get_where('rekom_izin', ['jenis_izin' => 11, 'izin_id' => $d->ID])->row_array();
																if($rekom){
																	if($rekom['fo'] == 2){
																		$tombol = anchor_label(site_url(fmodule($Class_Izin.'/rekom_edit/'.$d->ID)),'Kirim Rekomendasi Lagi','warning');
																	}else{
																		if($rekom['serah'] < 1){
																			$tombol = '<span class="badge badge-success">Sedang Diproses</span>';
																		}else{
																			$url = base_url('rekomtek.php/dinkes/downloadSk/'.$rekom['nama_table'].'/'.$d->ID);
																			$tombol = '<a href="'. $url .'" class="badge badge-primary">Download</a>';
																		}
																	}
																}else{
																	$tombol = anchor_label(site_url(fmodule($Class_Izin.'/rekom_edit/'.$d->ID)),'Minta Rekomendasi','primary');
																}
																echo '
																<tr>   
																	<!--<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID).'<i></i></label></td>-->
																	<td>'.$n.'</td>
																	<td>'.$d->ID_Reg.'</td>
																	<td>'.$d->Nm_Usaha.'</td>
																	<td>'.$d->NM_PELANGGAN.'</td>
																	<td>'.label_jenis_izin($d->Jenis_Izin,$d->Kd_Jns).'</td>
																	<td>'.TimeFormat($d->Time_Buat,'d/m/Y H:i').'</td>

																	<td align="center">'.$tombol.'</td>
																</tr>  ';
																++$n;
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
