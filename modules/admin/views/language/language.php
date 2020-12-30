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
								<?php echo form_open('',array('name' => 'frm', 'id' => 'frm')); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-8">
												<!--<input class="btn btn-blue" type="button" id="add" value="Tambah Data" onclick="window.location.href='<?php echo site_url(fmodule('language/add')); ?>'"/>
												<input class="btn btn-blue" type="button" id="enable" value="Enable">
												<input class="btn btn-blue" type="button" id="disable" value="Disable">-->
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
									</form>
									
									<?php echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="">
												<thead>
													<tr class="active">                                    
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width=""><?php echo lang('Language'); ?></th>
														<th width="300px"><?php echo lang('Class_Language'); ?></th>
														<th width="200px"><?php echo lang('Kode'); ?></th>
														<th width="20px">Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Lang).'<i></i></label></td>
																	<td>'.$d->Nm_Lang.'</td>
																	<td>'.$d->Class_Lang.'</td>
																	<td>'.$d->Kd_Lang.'</td>
																	<td align="center">'.icon_status($d->Status).'</td>
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
								
								<?php //echo $pagination; ?>
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
