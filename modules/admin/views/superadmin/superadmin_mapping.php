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
								<?php echo form_open_multipart('',array('name' => 'frm', 'id' => 'frm','class' => 'form-horizontal', 'role' => 'form')); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-10">
												<div class="input-group">
													<?php echo form_dropdown('opsetting',$op_apps,set_value('opsetting',$idapps),'id="opsetting" class="form-control chosen-select" style="width:300px;" onchange="op_apps(this)"'); ?>&nbsp;&nbsp;&nbsp;
													<?php echo form_dropdown('op_jenissetting',$op_apps_modul,set_value('op_jenissetting',$idmodul),'id="op_jenissetting" class="form-control chosen-select" style="width:300px;" onchange="op_apps_modul(this)"'); ?>&nbsp;&nbsp;&nbsp;
													<input class="btn btn-blue" type="submit" name="simpan" value="Simpan Pengaturan"/>
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
														<th width="10px">ID</th>
														<th width="">Nama Modul</th>
														<th width="">Group</th>
														<th width="20px">Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->Kd_Modul,($d->Cek > 0 ? TRUE : FALSE)).'<i></i></label></td>
																	<td>'.$d->Kd_Modul.'</td>
																	<td>'.$d->Nm_Modul.'</td>
																	<td>'.$d->Nm_Group.'</td>
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
		
		<?php $this->load->view('footer_2'); ?>
		<script>
		function op_apps(id){
			var val = id.value;
			$('<input />').attr('type','hidden').attr('name','op_apps').attr('value',val).appendTo('#frm');
			$('#frm').submit();
		}
		
		function op_apps_modul(id){
			var val = id.value;
			$('<input />').attr('type','hidden').attr('name','op_apps_modul').attr('value',val).appendTo('#frm');
			$('#frm').submit();
		}
		</script>
    </body>
</html>
