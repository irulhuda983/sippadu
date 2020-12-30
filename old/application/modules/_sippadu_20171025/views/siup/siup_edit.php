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
								
								<div class="tile-body form-horizontal">
									<?php echo alert(); ?> 
										<div class="block-fluid">
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">ID Pelanggan</div>
												<div class="col-sm-6"><b><?php echo $d->IDPELANGGAN; ?></b></div>
											</div>
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Nama Lengkap</div>
												<div class="col-sm-6"><?php echo $d->NM_PELANGGAN; ?></div>
											</div>

											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Jenis Kelamin</div>
												<div class="col-sm-6"><?php echo ($d->SEX=='01' ? 'Laki-Laki' : 'Perempuan'); ?></div>
											</div>

											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Alamat</div>
												<div class="col-sm-6"><?php echo ifnull($d->ALAMATPELANGGAN,'-'); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:left;">Provinsi</div>
												<div class="col-sm-6"><?php echo provinsi($d->PROVINSI); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:left;">Kota</div>
												<div class="col-sm-6"><?php echo kota($d->KOTA); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:left;">Kecamatan</div>
												<div class="col-sm-6"><?php echo kecamatan($d->KECAMATAN); ?></div>
											</div> 
											
											<div class="form-group" id="">
												<div for="" class="col-sm-2" style="text-align:left;">Desa</div>
												<div class="col-sm-6"><?php echo desa($d->DESA); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">No Identitas</div>
												<div class="col-sm-6"><?php echo ifnull($d->NOKITAS); ?></div>
											</div> 
											
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">NPWP</div>
												<div class="col-sm-6"><?php echo ifnull($d->NPWP); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Telepon</div>
												<div class="col-sm-6"><?php echo ifnull($d->TELP); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">No HP</div>
												<div class="col-sm-6"><?php echo ifnull($d->NO_HP); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Fax</div>
												<div class="col-sm-6"><?php echo ifnull($d->FAX); ?></div>
											</div> 
											
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;">Email</div>
												<div class="col-sm-6"><?php echo ifnull($d->EMAIL); ?></div>
											</div> 
											<div class="form-group">
												<div for="" class="col-sm-2" style="text-align:left;"></div>
												<div class="col-sm-6"><input class="btn btn-blue" type="button" name="add" value="Update Data" onclick="popup('<?php echo site_url(fmodule('personal/fo_edit_win/'.$d->IDPELANGGAN)); ?>')"/></div>
											
										</div>
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
                                <div class="tile-body">
									<?php echo form_open('',array('id'=>'form','class' => 'form-horizontal', 'role' => 'frm')); ?>
										<div class="block-fluid">                        
											<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
											
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
											
											<?php if($data2->num_rows() > 0){ $d2 = $data2->row(); ?>
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nomor Registrasi</label>
												<div class="col-sm-6"><input type="text" name="id_reg" id="id_reg" placeholder="" class="form-control" value="<?php echo set_value('id_reg',$d2->IDSIUP); ?>" readonly/></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No Surat Permohonan</label>
												<div class="col-sm-6"><input type="text" name="no_mohon" id="no_mohon" placeholder="No Surat Permohonan" class="form-control" value="<?php echo set_value('no_mohon',$d2->NO_MOHON); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Surat:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_mohon',set_value('tgl_mohon',TimeFormat($d2->TGL_MOHON,'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pengurus Permohonan</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_pengurus_permohonan',$op_pengurus_permohonan,set_value('op_pengurus_permohonan',substr($d2->STATUS_PENGURUS,-1)),'id="op_pengurus_permohonan" class="form-control chosen-select"'); ?></div>
											</div>
											<span id="dsp_pengurus" style="display:none;">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Pengurus</label>
												<div class="col-sm-6"><input type="text" name="nama_pengurus" id="nama_pengurus" placeholder="Nama Pengurus" class="form-control" value="<?php echo set_value('nama_pengurus',$d2->NM_PENGURUS); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-6"><input type="text" name="alamat_pengurus" id="alamat_pengurus" placeholder="Alamat Pengurus" class="form-control" value="<?php echo set_value('alamat_pengurus',$d2->ALAMAT_PENGURUS); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. HP</label>
												<div class="col-sm-6"><input type="text" name="hp_pengurus" id="hp_pengurus" placeholder="Nomor HP Pengurus" class="form-control" value="<?php echo set_value('hp_pengurus',$d2->TELP_PENGURUS); ?>" /></div>
											</div> 
											</span>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Izin</label>
												<div class="col-sm-6"><?php echo form_dropdown('jenis_izin',$op_jenis_izin,set_value('jenis_izin',$Kd_Jenis),'id="jenis_izin" class="form-control chosen-select"'); ?></div>
											</div>
											
											<span id="dsp_heregistrasi" style="display:none;">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Registrasi ke</label>
												<div class="col-sm-1"><input type="text" name="urutan" id="urutan" placeholder="0" class="form-control" value="<?php echo set_value('urutan',$d2->URUTAN); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. SK lama</label>
												<div class="col-sm-6"><input type="text" name="no_sk_lama" id="no_sk_lama" placeholder="No SK Lama" class="form-control" value="<?php echo html_entity_decode(set_value('no_sk_lama',$d2->NO_REF)); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal SK Lama:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk_lama',set_value('tgl_sk_lama',TimeFormat($d2->TGL_REF,'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											</span>
											
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pilih Nama Usaha</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_perusahaan',$op_perusahaan,set_value('op_perusahaan'),'id="op_perusahaan" class="form-control chosen-select"'); ?></div>
											</div>
											<span id="dsp_perusahaan">
												<?php if($Kd_Access == 'fo' || $Kd_Access == 'bo') { ?>
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
													<div class="col-sm-6"><input type="text" name="web_perusahaan" id="web_perusahaan" placeholder="Website" class="form-control" value="<?php echo set_value('web_perusahaan'); ?>" /></div>
												</div> 
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Bentuk Usaha</label>
													<div class="col-sm-6"><?php echo form_dropdown('op_bentuk_perusahaan',$op_bentuk_perusahaan,set_value('op_bentuk_perusahaan'),'id="op_bentuk_perusahaan" class="form-control chosen-select"'); ?></div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Jabatan</label>
													<div class="col-sm-6"><input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control upper" value="<?php echo set_value('jabatan'); ?>" /></div>
												</div> 
												<?php } ?>

												<?php if($Kd_Access == 'bo') { ?>
												<hr class="line-solid line-full"/>
												
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Kategori SIUP</label>
													<div class="col-sm-6"><?php echo form_dropdown('op_kategori_siup',$op_kategori_siup,set_value('op_kategori_siup'),'id="el" class="form-control chosen-select"'); ?></div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Status Usaha</label>
													<div class="col-sm-6"><?php echo form_dropdown('op_status_perusahaan',$op_status_perusahaan,set_value('op_status_perusahaan'),'id="op_status_perusahaan" class="form-control chosen-select"'); ?></div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Daftar ulang ke</label>
													<div class="col-sm-2"><input type="text" name="daftar_ulang" id="daftar_ulang" placeholder="0" class="form-control autonumber" value="<?php echo set_value('daftar_ulang'); ?>" /></div>
												</div> 
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Nilai Modal dan Kekayaan</label>
													<div class="col-sm-2"><input type="text" name="nilai_modal" id="nilai_modal" placeholder="(Rupiah)" class="form-control autonumber" value="<?php echo set_value('nilai_modal'); ?>" /></div>
												</div> 
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Nilai Tanah</label>
													<div class="col-sm-2"><input type="text" name="nilai_tanah" id="nilai_tanah" placeholder="(Rupiah)" class="form-control autonumber" value="<?php echo set_value('nilai_tanah'); ?>" /></div>
												</div> 
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Nilai Bangunan</label>
													<div class="col-sm-2"><input type="text" name="nilai_bangunan" id="nilai_bangunan" placeholder="(Rupiah)" class="form-control autonumber" value="<?php echo set_value('nilai_bangunan'); ?>" /></div>
												</div> 
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Jumlah Tenaga Kerja</label>
													<div class="col-sm-1"><input type="text" name="naker_a" id="naker_a" placeholder="Laki-Laki" class="form-control autonumber" value="<?php echo set_value('naker_a'); ?>" /></div>
													<div class="col-sm-1"><input type="text" name="naker_b" id="naker_b" placeholder="Perempuan" class="form-control autonumber" value="<?php echo set_value('naker_b'); ?>" /></div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Kegiatan Usaha</label>
													<div class="col-sm-6"><?php echo form_dropdown('op_kegiatan_usaha',$op_kegiatan_usaha,set_value('op_kegiatan_usaha'),'id="op_kegiatan_usaha" class="form-control chosen-select"'); ?></div>
												</div>
												
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Kelembagaan</label>
													<div class="col-sm-6"><?php echo form_dropdown('op_kelembagaan',$op_kelembagaan,set_value('op_kelembagaan'),'id="op_kelembagaan" class="form-control chosen-select"'); ?></div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">KBLI</label>
													<div class="col-sm-2"><input type="text" name="kbli" id="kbli" placeholder="" class="form-control" value="<?php echo set_value('kbli'); ?>" /></div>
												</div> 
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Barang/Jasa Dagangan Utama</label>
													<div class="col-sm-6"><textarea name="jenis_barang" id="jenis_barang" placeholder="" class="form-control"><?php echo set_value('jenis_barang'); ?></textarea></div>
												</div> 
												<span id="dsp_menteri">
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">No SK <span id="dsp_jenis_menteri"></span></label>
													<div class="col-sm-6"><input type="text" name="no_sk_menteri" id="no_sk_menteri" placeholder="" class="form-control" value="<?php echo set_value('no_sk_menteri'); ?>" /></div>
												</div>  
												<div class="form-group">
													<label for="" class="col-sm-2 control-label">Tanggal SK <span id="dsp_jenis_menteri2"></span></label>
													<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk_menteri',set_value('tgl_sk_menteri',TimeNow('d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
													<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
													</div>
												</div>  
												</span>
												<?php } ?>
											</span>
											
											<?php if($Kd_Access == 'bo') { ?>
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. SK</label>
												<div class="col-sm-4"><input type="text" name="no_sk" id="no_sk" placeholder="No SK" class="form-control" value="<?php echo html_entity_decode(set_value('no_sk',$d2->NO_SK)); ?>" readonly/></div>
												<div class="col-sm-2"><input type="button" class="btn btn-blue" value="Buat Nomor SK"  onclick="popup_el('<?php echo site_url(fmodule('siup/get_nomor/'.$ID_Izin)); ?>')"/></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. Urut SK</label>
												<div class="col-sm-2"><input type="text" name="no_urut_sk" id="no_urut_sk" placeholder="No Urut SK" class="form-control" value="<?php echo set_value('no_urut_sk',$d2->ID_SK); ?>" readonly/></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal SK:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk',set_value('tgl_sk',TimeFormat(iftimezero($d2->TGL_SK),'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											<?php } ?>
											
											<br/>
											<div class="form-group">
												<?php echo form_hidden('berkas',$berkas); ?>
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6">
													<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />	
													<input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $Kd_Pelanggan; ?>" />	
													<?php echo form_hidden('Kd_Access',$Kd_Access); ?>
													<?php echo form_hidden('Kd_Izin',$Kd_Izin); ?>
													<input type="submit" name="submit" class="btn btn-blue" value="Simpan Data" />
													<input class="btn btn-blue" type="button" name="cetak" value="Cetak Tanda Terima" onclick="popup('<?php echo site_url(fmodule('siup/tt/'.$ID_Izin)); ?>')"/>
													<?php if($Kd_Access == 'bo') { ?>
													<input class="btn btn-blue" type="button" name="cetak" value="Cetak SK" onclick="popup('<?php echo site_url(fmodule('siup/sk/'.$ID_Izin)); ?>')"/>
													<?php } ?>
												</div>							
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

		
        <!--/ Page Specific Scripts -->
		
		
		<?php $this->load->view('footer_2'); ?>
		<script type="text/javascript">
		
			$("#op_perusahaan").change(function(){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule('siup/op_perusahaan')); ?>",
						data: {op_perusahaan:$(this).val(),Kd_Access:"<?php echo $Kd_Access; ?>"},
						success: function(msg){
							$('#dsp_perusahaan').html(msg);
							$('#op_provinsi').addClass("form-control chosen-select");
							$('#op_kota').addClass("form-control chosen-select");
							$('#op_kecamatan').addClass("form-control chosen-select");
							$('#op_desa').addClass("form-control chosen-select");
							$('#op_bentuk_perusahaan').addClass("form-control chosen-select");
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
			$("#op_pengurus_permohonan").val("<?php echo $Kd_Pengurus; ?>").trigger("change");
			$("#op_perusahaan").val("<?php echo $Kd_Perusahaan; ?>").trigger("change");
			$("#jenis_izin").val("<?php echo $Kd_Jenis; ?>").trigger("change");
		</script>
    </body>
</html>
