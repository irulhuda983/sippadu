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
							
							
                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <!--<div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>-->
                                <!-- /tile header -->

                                <!-- tile body -->
								<div id="rootwizard" class="tab-container tab-wizard">
								<?php $this->load->view('tab_registrasi'); ?>
								<div class="tab-content">
								<div class="tab-pane active" id="tab1">
								<?php echo alert(); ?> 
								<?php echo form_open('',array('id'=>'form','class' => 'form-horizontal', 'role' => 'frm')); ?>
									<div class="block-fluid"> 
										<?php echo form_hidden('no_mohon',''); ?>
										<?php echo form_hidden('tgl_mohon',TimeNow('d/m/Y')); ?> 
										<?php echo form_hidden('op_pengurus_permohonan','01'); ?> 
										<span id="dsp_pengurus" style="display:none;">
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Nama Pengurus</label>
											<div class="col-sm-6"><input type="text" name="nama_pengurus" id="nama_pengurus" placeholder="Nama Pengurus" class="form-control" value="<?php echo set_value('nama_pengurus'); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Alamat</label>
											<div class="col-sm-6"><input type="text" name="alamat_pengurus" id="alamat_pengurus" placeholder="Alamat Pengurus" class="form-control" value="<?php echo set_value('alamat_pengurus'); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">No. HP</label>
											<div class="col-sm-6"><input type="text" name="hp_pengurus" id="hp_pengurus" placeholder="Nomor HP Pengurus" class="form-control" value="<?php echo set_value('hp_pengurus'); ?>" /></div>
										</div> 
										</span>
										
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Jenis Izin</label>
											<div class="col-sm-6"><?php echo form_dropdown('jenis_izin',$op_jenis_izin,set_value('jenis_izin',$Kd_Jenis),'id="jenis_izin" class="form-control"'); ?></div>
										</div>
										
										<span id="dsp_heregistrasi" style="display:none;">
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Registrasi ke</label>
											<div class="col-sm-1"><input type="text" name="urutan" id="urutan" placeholder="0" class="form-control" value="<?php echo set_value('urutan'); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">No. SK lama</label>
											<div class="col-sm-6"><input type="text" name="no_sk_lama" id="no_sk_lama" placeholder="No SK Lama" class="form-control" value="<?php echo set_value('no_sk_lama'); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Tanggal SK Lama:</label>
											<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk_lama',set_value('tgl_sk_lama'),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
											<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
											</div>
										</div>  
										</span>
										
										<hr class="line-solid line-full"/>
										
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Pilih Nama Usaha</label>
											<div class="col-sm-6"><?php echo form_dropdown('op_perusahaan',$op_perusahaan,set_value('op_perusahaan'),'id="op_perusahaan" class="form-control"'); ?></div>
										</div>
										<span id="dsp_perusahaan"></span>
											
										<br/>
										<div class="form-group">
											<label for="" class="col-sm-2 control-label"></label>
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

		
        <!--/ Page Specific Scripts -->
		
		
		<?php $this->load->view('footer_2'); ?>
		<script type="text/javascript">
		
			$("#op_perusahaan").change(function(){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule('siup/op_perusahaan')); ?>/?time=" + new Date().getTime(),
						data: {op_perusahaan:$(this).val(),Kd_Access:"<?php echo $Kd_Access; ?>"},
						success: function(msg){
							//console.log(msg);
							$('#dsp_perusahaan').html(msg);
							//$('#op_provinsi').addClass("form-control");
							//$('#op_kota').addClass("form-control");
							//$('#op_kecamatan').addClass("form-control");
							//$('#op_desa').addClass("form-control");
							//$('#op_bentuk_perusahaan').addClass("form-control");
						}
				});
			});
			
			$("#op_pengurus_permohonan").change(function(){
				var status = $(this).val();
				if(status=='1'){
					document.getElementById('dsp_pengurus').style.display='none';
				}
				else{
					document.getElementById('dsp_pengurus').style.display='';
				}
			});
			
			$("#jenis_izin").change(function(){
				var status = $(this).val();
				if(status=='2' || status=='3'){
					document.getElementById('dsp_heregistrasi').style.display='';
				}
				else{
					document.getElementById('dsp_heregistrasi').style.display='none';
				}
			});
			$("#op_perusahaan").val("<?php echo $Kd_Perusahaan; ?>").trigger("change");
			$("#jenis_izin").val("<?php echo $Kd_Jenis; ?>").trigger("change");
		</script>
    </body>
</html>
