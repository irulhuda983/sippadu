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
                <div class="page">
                    <div class="pageheader">
                        <!--<h2><?php echo $title; ?></h2>-->
						<?php $this->load->view('breadcrumb'); ?>
                    </div>

                    <!-- cards row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
							
                            <section class="tile">
                                <!-- tile body -->
									<div id="rootwizard" class="tab-container tab-wizard">
									<?php $this->load->view('tab_registrasi'); ?>
									<div class="tab-content">
									<div class="tab-pane active" id="tab1">
									<?php echo alert(); ?> 
									<?php echo form_open_multipart('',array('id'=>'form','class' => 'form-horizontal', 'role' => 'frm')); ?>
										<div class="block-fluid">                        
											<br/>
											<?php 
											$berkas = 0;
											$data_dok = dok_checklist($Kd_Izin,$Kd_Jenis);
											if($data_dok->num_rows() > 0){ $berkas = $data_dok->num_rows();
												$arrberkas = '';
												foreach($data_dok->result() as $dok){ 
												$cek = cek_dok_checklist($Kd_Izin,$ID_Izin,$dok->Kd_Dok);
													$arrberkas .= '
													<div class="form-group">
														<div class="col-sm-4 control-label" style="text-align:left;">'.$dok->Nm_Dok.'</div>
														<div class="col-sm-6">
															<input type="file" name="userfile_'.$dok->Kd_Dok.'" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
														</div>
													</div>';
												} 
												echo $arrberkas;
											} 
											?>
											<hr class="line-solid line-full"/>
											
											<br/>
											<div class="form-group">
												<div class="col-sm-6">
													<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />	
													<input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $Kd_Pelanggan; ?>" />	
													<?php echo form_hidden('Kd_Access',$Kd_Access); ?>
													<?php echo form_hidden('Kd_Izin',$Kd_Izin); ?>
													<input type="submit" name="submit" class="btn btn-blue" value="<?php echo lang('Next'); ?>" />
												</div>							
											</div>

										</div>
									</div>
									</div>
									</div>
									</div>
							</section>
							
							</form>
							
							

                        </div>
                        <!-- /col -->

                    </div>
                    <!-- /row -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->
		<?php $this->load->view('footer_2'); ?>
    </body>
</html>
