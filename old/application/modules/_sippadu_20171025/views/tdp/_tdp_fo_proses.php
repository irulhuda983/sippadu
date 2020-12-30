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
							
							<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
							<section class="tile">
								
								<div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font">Data Pemohon</h1>
                                </div>
								
								<div class="tile-body">	
									<?php echo alert(); ?> 
									<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">
											
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">ID Pelanggan</div>
												<div class="col-sm-6"><b><?php echo $d->IDPELANGGAN; ?></b></div>
											</div>
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">Nama Lengkap</div>
												<div class="col-sm-6"><?php echo $d->NM_PELANGGAN; ?></div>
											</div>

											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">Jenis Kelamin</div>
												<div class="col-sm-6"><?php echo ($d->SEX=='01' ? 'Laki-Laki' : 'Perempuan'); ?></div>
											</div>

											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">Alamat</div>
												<div class="col-sm-6"><?php echo ifnull($d->ALAMATPELANGGAN,'-'); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:right;">Provinsi</div>
												<div class="col-sm-6"><?php echo provinsi($d->PROVINSI); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:right;">Kota</div>
												<div class="col-sm-6"><?php echo kota($d->KOTA); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:right;">Kecamatan</div>
												<div class="col-sm-6"><?php echo kecamatan($d->KECAMATAN); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:right;">Desa</div>
												<div class="col-sm-6"><?php echo desa($d->DESA); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">No Identitas</div>
												<div class="col-sm-6"><?php echo ifnull($d->NOKITAS); ?></div>
											</div> 
											
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">NPWP</div>
												<div class="col-sm-6"><?php echo ifnull($d->NPWP); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">Telepon</div>
												<div class="col-sm-6"><?php echo ifnull($d->TELP); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">No HP</div>
												<div class="col-sm-6"><?php echo ifnull($d->NO_HP); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">Fax</div>
												<div class="col-sm-6"><?php echo ifnull($d->FAX); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;">Email</div>
												<div class="col-sm-6"><?php echo ifnull($d->EMAIL); ?></div>
											</div> 
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:right;"></div>
												<div class="col-sm-6"><input class="btn btn-blue" type="button" name="add" value="Update Data" onclick="popup('<?php echo site_url(fmodule('personal/fo_edit_win/'.$d->IDPELANGGAN)); ?>')"/></div>
											<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />	
											<input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $d->IDPELANGGAN; ?>" />	
										</div>
									</form>
                                </div>
                            </section>
							<?php } ?>
                            <!-- /tile -->
							
                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body form-horizontal">
										<div class="block-fluid">                        
											<?php $Kd_Perusahaan = 0; if($data_p->num_rows() > 0){ $d = $data_p->row(); $Kd_Perusahaan = $d->IDPERUSAHAAN;?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Izin</label>
												<div class="col-sm-6"><?php echo form_dropdown('jenis_izin',array('0'=>'- Pilih Jenis -','01'=>'Baru','02'=>'Perpanjangan','03'=>'Perubahan'),set_value('jenis_izin',$d->JENIS_IZIN),'id="jenis_izin" class="form-control"'); ?></div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pilih Nama Usaha</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_perusahaan',$op_perusahaan,set_value('op_perusahaan'),'id="op_perusahaan" class="form-control"'); ?></div>
											</div>
											<span id="dsp_perusahaan">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Usaha</label>
												<div class="col-sm-6"><input type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Usaha" class="form-control upper" value="<?php echo set_value('nama_perusahaan'); ?>" /></div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat Usaha</label>
											   <div class="col-sm-6"><textarea type="text" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Alamat Usaha" class="form-control upper" ><?php echo set_value('alamat_perusahaan'); ?></textarea></div>
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
												<div class="col-sm-6"><input type="text" name="npwp_perusahaan" id="npwp_perusahaan" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp_perusahaan'); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Telpon</label>
												<div class="col-sm-6"><input type="text" name="telepon_perusahaan" id="telepon_perusahaan" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon_perusahaan'); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Fax</label>
												<div class="col-sm-6"><input type="text" name="fax_perusahaan" id="fax_perusahaan" placeholder="Fax" class="form-control" value="<?php echo set_value('fax_perusahaan'); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-6"><input type="text" name="email_perusahaan" id="email_perusahaan" placeholder="Email" class="form-control" value="<?php echo set_value('email_perusahaan'); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Website</label>
												<div class="col-sm-6"><input type="text" name="website_perusahaan" id="website_perusahaan" placeholder="Website" class="form-control" value="<?php echo set_value('website_perusahaan'); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Bentuk Usaha</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_bentuk_perusahaan',$op_bentuk_perusahaan,set_value('op_bentuk_perusahaan'),'id="op_bentuk_perusahaan" class="form-control"'); ?></div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jabatan</label>
												<div class="col-sm-6"><input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control upper" value="<?php echo set_value('jabatan'); ?>" /></div>
											</div> 
											</span>
											
											<?php 
											$berkas = 0;
											$data_dok = dok_checklist($Kd_Izin,$Kd_Jenis);
											if($data_dok->num_rows() > 0){ $berkas = $data_dok->num_rows();?>
											
											<div class="form-group">
												<div class="col-sm-2 control-label">Kelengkapan Berkas</div>
												<div class="col-sm-10">
													<?php foreach($data_dok->result() as $dok){ 
													$cek = cek_dok_checklist($Kd_Izin,$ID_Izin,$dok->Kd_Dok);
													?>
													<label class="checkbox checkbox-custom-alt"><?php echo form_checkbox('chk[]',$dok->Kd_Dok,$cek); ?><i></i> <?php echo $dok->Nm_Dok; ?></label>
													<?php } ?>
												</div>
		
											</div>
											<?php } ?>

											<br/>
											<br/>
											<div class="form-group">
												<?php echo form_hidden('berkas',$berkas); ?>
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn btn-blue" value="Simpan Data" /></div>							
											</div>
											<?php } ?>

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
        <!--/ Page Specific Scripts -->
		
		<script type="text/javascript">
		$("#op_perusahaan").change(function(){
			$.ajax({
					type: "POST",
					url : "<?php echo site_url(fmodule('op_perusahaan')); ?>",
					data: {op_perusahaan:$("#op_perusahaan").val()},
					success: function(msg){
						$('#dsp_perusahaan').html(msg);
						$('#op_provinsi').addClass("form-control");
						$('#op_kota').addClass("form-control");
						$('#op_kecamatan').addClass("form-control");
						$('#op_desa').addClass("form-control");
						$('#op_bentuk_perusahaan').addClass("form-control");
					}
			});
		});
		
		$("#op_perusahaan").val("<?php echo $Kd_Perusahaan; ?>").trigger("change");
		
		</script>

    </body>
</html>
