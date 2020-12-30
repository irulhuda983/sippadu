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
								<?php echo form_open('',array('name' => 'frm', 'id' => 'frm','class' => 'form-horizontal', 'role' => 'form')); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-10">
												<div class="input-group">
													<?php echo form_dropdown('opsetting',$op_setting,set_value('opsetting',$idsetting),'id="opsetting" class="form-control" style="width:300px;" onchange="op_setting(this)"'); ?>&nbsp;&nbsp;&nbsp;
													<?php echo form_dropdown('op_jenissetting',$op_jenis_setting,set_value('op_jenissetting',$idjenis),'id="op_jenissetting" class="form-control" style="width:300px;" onchange="op_jenis_setting(this)"'); ?>&nbsp;&nbsp;&nbsp;
													<input class="btn btn-blue" type="submit" name="simpan" value="Simpan Pengaturan"/>
												</div>
											</div>
											

											
										</div>

									</div>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body">
											<div class="block-fluid">                        
												<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
												<div class="form-group">
													<div class="col-sm-12">
														<textarea name="format" id="summernote"><?php echo $d->Format; ?></textarea>
													</div>
												</div>
												<?php } ?>
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
		function op_setting(id){
			var val = id.value;
			$('<input />').attr('type','hidden').attr('name','op_setting').attr('value',val).appendTo('#frm');
			$('#frm').submit();
		}
		
		function op_jenis_setting(id){
			var val = id.value;
			$('<input />').attr('type','hidden').attr('name','op_jenis_setting').attr('value',val).appendTo('#frm');
			$('#frm').submit();
		}
		</script>
    </body>
</html>
