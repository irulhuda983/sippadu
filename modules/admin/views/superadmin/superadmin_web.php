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
												<input class="btn btn-blue" type="button" id="add" value="Tambah Data" onclick="window.location.href='<?php echo site_url(fmodule('superadmin/web_add')); ?>'"/>
												<input class="btn btn-blue" type="button" id="enable" value="Enable">
												<input class="btn btn-blue" type="button" id="disable" value="Disable">
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
											<table  class="table table-hover" id="">
												<thead>
													<tr class="active">                                    
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width="">ID</th>
														<th width="">Domain</th>
														<th width="">Title</th>
														<th width="">Color</th>
														<th width="">Copyright</th>
														<th width="">Apps</th>
														<th width="">Alias</th>
														<th width="">Copy</th>
														<th width="">Clear</th>
														<th width="20px">Status</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Web).'<i></i></label></td>
																	<td>'.$d->ID_Web.'</td>
																	<td>'.anchor('http://'.$d->Domain,$d->Domain,'target="_blank"').'</td>
																	<td>'.$d->Title.'</td>
																	<td><div style="width:40px;height:20px;background-color:'.$d->FColor_Code.';"></div></td> 
																	<td align="center">'.$d->Copyright_Year.'</td>
																	<td align="center">'.anchor_label(site_url(fmodule('superadmin/apps/'.$d->ID_Web)),'Apps','warning').'</td>
																	<td align="center">'.anchor_label(site_url(fmodule('superadmin/alias/'.$d->ID_Web)),'Alias','info').'</td>
																	<td align="center">'.anchor_label(site_url(fmodule('superadmin/copy_from/'.$d->ID_Web)),'Copy','success').'</td>
																	<td align="center">'.anchor_label(site_url(fmodule('superadmin/clear_data/'.$d->ID_Web)),'Clear','error').'</td>
																	<td align="center">'.icon_status($d->Status).'</td>
																	<td align="center">'.icon_edit(site_url(fmodule('superadmin/web_edit/'.$d->ID_Web))).'</td>	
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
