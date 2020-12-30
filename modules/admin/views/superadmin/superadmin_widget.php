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
												<input class="btn btn-blue" type="button" id="enable" value="Enable">
												<input class="btn btn-blue" type="button" id="disable" value="Disable">
												<input class="btn btn-greensea" type="button" id="save" value="Simpan">
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
										<br/>
										<div class="row">

											<div class="col-sm-4">
													<?php echo form_dropdown('op_domain',$op_domain,set_value('op_domain',$slc_op_domain),'id="op_domain" class="form-control chosen-select" onchange="frm.submit();"'); ?>
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->
									</form>
									
									<?php echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<?php echo form_hidden('ID_Web',$slc_op_domain); ?>
									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="">
												<thead>
													<tr class="active">                                    
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width=""><?php echo lang('Nama Widget'); ?></th>
														<th width="100px"><?php echo lang('Urutan'); ?></th>
														<th width="20px">Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0 && $slc_op_domain > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Widget).'<i></i></label></td>
																	<td>'.$d->Nm_Widget.'</td>
																	<td>'.form_hidden('ID_Widget[]',$d->ID_Widget).form_hidden('Status[]',$d->Status).form_input('Sort_Order[]',set_value('Sort_Order[]',$d->Sort_Order),'class="form-control"').'</td>
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
								
								<?php if($data->num_rows() > 0 && $slc_op_domain > 0){ echo $pagination;} ?>
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
