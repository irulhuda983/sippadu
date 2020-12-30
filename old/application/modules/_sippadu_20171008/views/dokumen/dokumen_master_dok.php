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
											
											<div class="col-sm-10">
												<div class="input-group">
													<?php echo form_dropdown('op_izin',$op_izin,set_value('op_izin',$idizin),'id="op_izin" class="form-control" style="width:300px;" onchange="opizin(this)"'); ?>&nbsp;&nbsp;&nbsp;
													<?php echo form_dropdown('op_jenis_izin',$op_jenis_izin,set_value('op_jenis_izin',$idjenis),'id="op_jenis_izin" class="form-control" style="width:300px;" onchange="opjenisizin(this)"'); ?>&nbsp;&nbsp;&nbsp;
													<input class="btn btn-blue" type="submit" name="simpan" value="Simpan Pengaturan" onclick="return confirm('Apakah anda yakin akan menyimpan pengaturan ini?');"/>
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
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("frm");'><i></i></label></th>
														<th width="">Nama Dokumen</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data->num_rows() > 0){
															foreach($data->result() as $d){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('chk[]',$d->Kd_Dok,cek_dok_izin($idizin,$idjenis,$d->Kd_Dok)).'<i></i></label></td>
																	<td>'.$d->Nm_Dok.'</td>
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
		<script>
		function opizin(id){
			var val = id.value;
			$('<input />').attr('type','hidden').attr('name','opizin').attr('value',val).appendTo('#frm');
			$('#frm').submit();
		}
		
		function opjenisizin(id){
			var val = id.value;
			$('<input />').attr('type','hidden').attr('name','opjenisizin').attr('value',val).appendTo('#frm');
			$('#frm').submit();
		}
		</script>
    </body>
</html>
