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
								<div class="tile-header">
									<h1 class="custom-font">
										Cek No Identitas Personal
									</h1>
								</div>

								<div class="tile-body">
									<form action="#" method="post" id="form-cek-nik">
									<p>Gunakan form ini untuk ambil data dari Dukcapil</p>
									<div class="form-group row">
											<label for="" class="col-sm-2 control-label">No Identitas</label>
											<div class="col-sm-6"><input type="text" name="cek_nik" id="cek_nik" placeholder="No Identitas (KTP, Passpor, dll)" class="form-control" /></div>
											<div class="col-sm-2">
												<button class="btn btn-primary" id="btn-cek-nik" type="submit">Cek</button>
											</div>
									</div>
									</form>
								</div>
							</section>

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
									<?php echo alert(); ?> 
									<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No Identitas</label>
												<div class="col-sm-6"><input type="text" name="nokitas" id="nokitas" placeholder="No Identitas (KTP, Passpor, dll)" class="form-control" value="<?php echo set_value('nokitas'); ?>" /></div>
											</div> 
											
											<div class="form-group" id="dsp_cek_data" style="display:none;">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><span id="cek_data"></span></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
												<div class="col-sm-6"><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo set_value('nama'); ?>" /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir'); ?>" /></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
												<div class="col-sm-6">
													<input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
												</div>
											</div>


											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','01',(set_value('gender')=='01' ? TRUE : FALSE)).'<i></i> Laki-Laki '; ?></label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','02',(set_value('gender')=='02' ? TRUE : FALSE)).'<i></i> Perempuan '; ?></label></div>
											</div>

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
											   <div class="col-sm-6"><textarea type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" ><?php echo set_value('alamat'); ?></textarea></div>
											</div>


											<div>
												<p>Silahkan Isi Sendiri Data di Bawah Ini</p>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pekerjaan</label>
												<div class="col-sm-6"><input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" class="form-control" value="<?php echo set_value('pekerjaan'); ?>" /></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Provinsi</label>
											   <div class="col-sm-6"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',35),'id="op_provinsi" class="form-control chosen-select"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kota</label>
											   <div class="col-sm-6"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota(35),set_value('op_kota',3522),'id="op_kota" class="form-control chosen-select"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kecamatan</label>
											   <div class="col-sm-6"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan(3522),set_value('op_kecamatan'),'id="op_kecamatan" class="form-control chosen-select"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Desa</label>
											   <div class="col-sm-6"><span id="dsp_desa"><?php echo form_dropdown('op_desa',$op_desa,set_value('op_desa'),'id="op_desa" class="form-control chosen-select"'); ?></span></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">NPWP</label>
												<div class="col-sm-6"><input type="text" name="npwp" id="npwp" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp'); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Telpon</label>
												<div class="col-sm-6"><input type="text" name="telepon" id="telepon" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon'); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">HP</label>
												<div class="col-sm-6"><input type="text" name="hp" id="hp" placeholder="Handphone" class="form-control" value="<?php echo set_value('hp'); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Fax</label>
												<div class="col-sm-6"><input type="text" name="fax" id="fax" placeholder="Fax" class="form-control" value="<?php echo set_value('fax'); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-6"><input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo set_value('email'); ?>" /></div>
											</div> 
								
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn btn-blue" value="Simpan" /></div>							
											</div>
											<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />
											
											
											<?php //} ?>
										</div>
									</form>
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

		<?php $this->load->view('footer_2'); ?>
        <!--/ Page Specific Scripts -->
		
		<script>
		// $("#nokitas").keyup(function(){
		// 	var str = $(this).val();
		// 	if(str.length >= 8){
		// 	$.ajax({
		// 			type: "POST",
		// 			url : "<?php echo site_url(fmodule('personal/cek_data_personal')); ?>/?time=" + new Date().getTime(),
		// 			data: {kitas:$(this).val()},
		// 			success: function(msg){
		// 				$('#cek_data').html(msg);
		// 				$('#dsp_cek_data').css("display",'block');
		// 			}
		// 	});
		// 	}
		// 	else{
		// 		$('#dsp_cek_data').css("display",'none');
		// 	}
		// });
		</script>

    </body>
</html>
