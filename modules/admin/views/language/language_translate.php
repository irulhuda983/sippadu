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
												<!--<input class="btn btn-blue" type="button" id="add" value="Tambah Data" onclick="window.location.href='<?php echo site_url(fmodule('language/translate_add')); ?>'"/>-->
												<input class="btn btn-blue" type="button" id="enable" value="Enable">
												<input class="btn btn-blue" type="button" id="disable" value="Disable">
												<input class="btn btn-red" type="button" id="delete" value="Hapus">
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
													<?php echo form_dropdown('op_language',$op_language,set_value('op_language',$slc_op_language),'id="op_language" class="form-control chosen-select" onchange="frm.submit();"'); ?>
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->
									</form>
									
									<?php echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<?php echo form_hidden('ID_Lang',$ID_Lang); ?>
									<?php echo form_hidden('Kd_Lang',$slc_op_language); ?>
									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="">
												<thead>
													<tr class="active">                                    
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width="400px"><?php echo lang('Nama_Format_Language'); ?></th>
														<th width=""><?php echo lang('Translate'); ?></th>
														<th width="20px">Type</th>
														<th width="20px">Status</th>
														<th width="20px">Edit</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0 && $ID_Lang > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->ID_Format).'<i></i></label></td>
																	<td><div style="width:400px;word-wrap: break-word;">'.str_replace('lang_'.config().'_','',$d->Format).'</div></td>
																	<td>'.form_hidden('ID_Format[]',$d->ID_Format).form_input('Translate[]',set_value('Translate[]',$d->Translate),'class="form-control"').'</td>
																	<td align="center">'.($d->ID_Web > 0 ? label('error','Web') : label('success','Global')).'</td>
																	<td align="center">'.icon_status($d->Status).'</td>
																	<td align="center">'.icon_edit(site_url(fmodule('language/edit/'.$d->ID_Format))).'</td>	
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
								
								<?php if($data->num_rows() > 0 && $ID_Lang > 0){ echo $pagination;} ?>
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
