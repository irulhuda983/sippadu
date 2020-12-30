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
												<input class="btn btn-blue" type="button" id="add" value="Tambah Data" onclick="window.location.href='<?php echo site_url(fmodule('users/add')); ?>'"/>
												<input class="btn btn-blue" type="button" id="enable" value="Enable">
												<input class="btn btn-blue" type="button" id="disable" value="Disable">
												<input class="btn btn-red" type="button" id="delete" value="Hapus">
												<?php echo MenuAkses(1,$DataAkses,'<input type="button" name="edit" class="btn" value="Edit Query" onclick="window.location.href=\''.site_url(fmodule('query/edit/'.$id)).'\'">'); ?>
												<input type="button" value="Select and Copy" class="btn btn-blue" onclick="selectCopy( document.getElementById('tSortable') );">
												<input type="button" value="Refresh" class="btn btn-blue" onclick="window.location.href='<?php echo current_url(); ?>';">
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
											<table  class="table table-bordered table-hover" id="tSortable" style="font-size:10px;font-family:Tahoma;color:black;">
												<thead>
													<tr class="active">                                    
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width="60px">ID</th>
														<th width="">Username</th>
														<th width="">Nama</th>
														<th width="">Level</th>
														<th width="">Grup</th>
														<th width="">Auth Mode</th>
														<th width="">Status</th>
														<th width="20px">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_User).'<i></i></label></td>
																	<td>'.$d->ID_User.'</td>
																	<td>'.$d->Username.'</td>
																	<td>'.$d->Nm_User.'</td> 
																	<td>'.$d->Nm_Level.'</td> 
																	<td>'.$d->Nm_Group.'</td> 
																	<td>'.$d->Nm_Auth_Mode.'</td> 
																	<td align="center">'.icon_status($d->Status).'</td>
																	<td align="center">'.icon_edit(site_url(fmodule('users/edit/'.$d->ID_User))).'</td>	
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
