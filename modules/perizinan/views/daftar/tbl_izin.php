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
                    <!--<div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>-->

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

                                <!-- tile body -->
								<div class="pagecontent">

									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<?php echo alert(); ?>
											<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
											
												<table  class="table table-hover" id="tSortable" style="text-align:center">
													<thead>
														<tr class="active">
															<th width="" style="text-align:center"><?php echo lang('Nama Izin'); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															if($data->num_rows() > 0){
																foreach($data->result() as $d){
																	echo '
																	<tr>   
																		<td><a href="javascript:void(0);" onclick="window.location.href=\''.site_url(fmodule($d->Kd_Class)).'\'">'.$d->Nm_Izin.'</a></td>
																	</tr>  '; 
																}
															}
														?>
													</tbody>
												</table>
											</form>
										</div>
									</div>

								</div>
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
