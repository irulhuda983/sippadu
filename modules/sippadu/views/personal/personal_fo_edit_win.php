<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
		<?php if($this->session->flashdata('WindowReload')): ?>
		<script type="text/javascript">
			window.opener.location.reload();
			self.close();
		</script>
		<?php endif; ?>
		<?php if($this->session->flashdata('WindowRedirect')): ?>
		<script type="text/javascript">
			window.opener.location.href = "<?php echo $url.'/'.$this->session->flashdata('IDRedirect'); ?>";
			self.close();
		</script>
		<?php endif; ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php //$this->load->view('top'); ?>
            <?php //$this->load->view('menu'); ?>
			
                        <!-- col -->

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
							<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">No Identitas</label>
								<div class="col-sm-10"><input type="text" name="nokitas" id="nokitas" placeholder="No Identitas (KTP, Passpor, dll)" class="form-control" value="<?php echo set_value('nokitas',$d->NOKITAS); ?>" /></div>
							</div> 
							
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
								<div class="col-sm-10"><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo set_value('nama',$d->NM_PELANGGAN); ?>" /></div>
							</div>
							
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
								<div class="col-sm-10"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir',$d->TEMPAT_LAHIR); ?>" /></div>
							</div>
							
							
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
								<div class="col-sm-3"><?php echo form_dropdown('tanggal_lahir',op_tanggal(),set_value('tanggal_lahir',TimeFormat($d->TGL_LAHIR,'d')),'id="tanggal_lahir" class="form-control chosen-select"'); ?></div>
								<div class="col-sm-3"><?php echo form_dropdown('bulan_lahir',op_bulan(),set_value('bulan_lahir',TimeFormat($d->TGL_LAHIR,'m')),'id="bulan_lahir" class="form-control chosen-select"'); ?></div>
								<div class="col-sm-3"><?php echo form_dropdown('tahun_lahir',op_tahun(),set_value('tahun_lahir',TimeFormat($d->TGL_LAHIR,'Y')),'id="tahun_lahir" class="form-control chosen-select"'); ?></div>
							</div>


							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','01',(set_value('gender',$d->SEX)=='01' ? TRUE : FALSE)).'<i></i> Laki-Laki '; ?></label></div>
								<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','02',(set_value('gender',$d->SEX)=='02' ? TRUE : FALSE)).'<i></i> Perempuan '; ?></label></div>
							</div>
							

							<div>
												<p>Silahkan Isi Sendiri Data di Bawah Ini</p>
											</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Pekerjaan</label>
								<div class="col-sm-10"><input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" class="form-control" value="<?php echo set_value('pekerjaan',$d->PEKERJAAN); ?>" /></div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Alamat</label>
							   <div class="col-sm-10"><textarea type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" ><?php echo set_value('alamat',$d->ALAMATPELANGGAN); ?></textarea></div>
							</div> 
							
							<div class="form-group" id="">
								<label for="" class="col-sm-2 control-label">Provinsi</label>
							   <div class="col-sm-10"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',$d->PROVINSI),'id="op_provinsi" class="form-control"'); ?></span></div>
							</div> 
							
							<div class="form-group" id="">
								<label for="" class="col-sm-2 control-label">Kota</label>
							   <div class="col-sm-10"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota($d->PROVINSI),set_value('op_kota',$d->KOTA),'id="op_kota" class="form-control"'); ?></span></div>
							</div> 
							
							<div class="form-group" id="">
								<label for="" class="col-sm-2 control-label">Kecamatan</label>
							   <div class="col-sm-10"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan($d->KOTA),set_value('op_kecamatan',$d->KECAMATAN),'id="op_kecamatan" class="form-control"'); ?></span></div>
							</div> 
							
							<div class="form-group" id="">
								<label for="" class="col-sm-2 control-label">Desa</label>
							   <div class="col-sm-10"><span id="dsp_desa"><?php echo form_dropdown('op_desa',op_desa($d->KECAMATAN),set_value('op_desa',$d->DESA),'id="op_desa" class="form-control"'); ?></span></div>
							</div> 
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">NPWP</label>
								<div class="col-sm-10"><input type="text" name="npwp" id="npwp" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp',$d->NPWP); ?>" /></div>
							</div> 
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Telpon</label>
								<div class="col-sm-10"><input type="text" name="telepon" id="telepon" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon',$d->TELP); ?>" /></div>
							</div> 
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">HP</label>
								<div class="col-sm-10"><input type="text" name="hp" id="hp" placeholder="Handphone" class="form-control" value="<?php echo set_value('hp',$d->NO_HP); ?>" /></div>
							</div> 
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Fax</label>
								<div class="col-sm-10"><input type="text" name="fax" id="fax" placeholder="Fax" class="form-control" value="<?php echo set_value('fax',$d->FAX); ?>" /></div>
							</div> 
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10"><input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo set_value('email',$d->EMAIL); ?>" /></div>
							</div> 
				
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-10"><input type="submit" name="submit" class="btn btn-blue" value="Simpan" />
								<input class="btn btn-blue" type="button" name="close" value="Tutup" onclick="window.close()"/>	</div>							
							</div>
							<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />
							
							
							<?php } ?>
					</form>
				</div>
			<!-- /tile -->

		
		<!-- /col -->

	<!-- /row -->
			</section>
        </div>
        <!--/ Application Content -->

		<?php $this->load->view('footer_2'); ?>
        <!--/ Page Specific Scripts -->

    </body>
</html>
