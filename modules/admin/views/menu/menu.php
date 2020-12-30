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
											
											<div class="col-sm-7">
												<input class="btn btn-blue" type="button" id="add" value="Tambah Data" onclick="window.location.href='<?php echo site_url(fmodule('menu/add')); ?>'"/>
												<input class="btn btn-blue" type="button" id="enable" value="Enable">
												<input class="btn btn-blue" type="button" id="disable" value="Disable">
												<input class="btn btn-red" type="button" id="delete" value="Hapus">
												<input class="btn btn-greensea" type="button" id="save" value="Simpan">
											</div>
										</div>
										<br/>
										<div class="row">

											<div class="col-sm-4">
													<?php echo form_dropdown('op_menu_kategori',$op_menu_kategori,set_value('op_menu_kategori',$slc_op_menu_kategori),'id="op_menu_kategori" class="form-control chosen-select" onchange="frm.submit();"'); ?>
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
														<th width="">Nama Menu</th>
														<th width="100px">Sort Order</th>
														<th width="20px">Hits</th>
														<th width="20px">Status</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														
														echo level_menu_tabel(set_value('op_menu_kategori',$slc_op_menu_kategori),0,0);
														
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
