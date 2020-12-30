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
												<input class="btn btn-blue" type="button" id="enable" value="Setujui">
												<input class="btn btn-blue" type="button" id="disable" value="Tolak">
												<input class="btn btn-red" type="button" id="delete" value="Hapus">
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
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width="200px">Nama</th>
														<th width="">Lokasi</th>
														<th width="200px">Item</th>
														<th width="">Komentar</th>
														<th width="20px">Balas</th>
														<th width="100px">Time</th>
														<th width="20px">Status</th>
														<th width="20px">Edit</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Comment).'<i></i></label></td>
																	<td><b>'.$d->Name.'</b><br/>'.$d->Address.'<br/>'.$d->Phone.'<br/>'.mailto($d->Email).'<br/>'.auto_link($d->URL).'</td>
																	<td>'.$d->Nm_Type.'</td>
																	<td>'.$d->Judul.'</td>
																	<td>'.$d->Message.'</td>
																	<td align="center">'.anchor_popup_label(site_url(fmodule('komentar/add/'.$d->ID_Comment.'/'.$d->Type.'/'.$d->Item)),'Balas','info',$popup).'</td>
																	<td>'.TimeFormat($d->Time).'</td> 
																	<td align="center">'.icon_status($d->Status).'</td>
																	<td align="center">'.icon_edit(site_url(fmodule('komentar/edit/'.$d->ID_Comment))).'</td>
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