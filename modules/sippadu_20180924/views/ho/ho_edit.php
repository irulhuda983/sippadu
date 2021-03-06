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
													$file = cek_dok_checklist($Kd_Izin,$ID_Izin,$dok->Kd_Dok,TRUE);
													?>
													<label class="checkbox checkbox-custom-alt"><?php echo form_checkbox('chk[]',$dok->Kd_Dok,$cek); ?><i></i> <?php echo $dok->Nm_Dok; ?><?php echo ($file !='' ? '--- ('.anchor(base_url('assets/'.config('theme').'/files/berkas/'.$Class_Izin.'/'.$file),'Download File').')' : ''); ?></label>
													<?php } ?>
												</div>
		
											</div>
											<?php } ?>
											
											<?php if($data2->num_rows() > 0){ $d2 = $data2->row(); ?>
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nomor Registrasi</label>
												<div class="col-sm-6"><input type="text" name="id_reg" id="id_reg" placeholder="" class="form-control" value="<?php echo set_value('id_reg',$d2->ID_Reg); ?>" readonly/></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No Surat Permohonan</label>
												<div class="col-sm-6"><input type="text" name="no_mohon" id="no_mohon" placeholder="No Surat Permohonan" class="form-control" value="<?php echo set_value('no_mohon',$d2->No_Surat_Mohon); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Surat:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_mohon',set_value('tgl_mohon',TimeFormat($d2->Tgl_Mohon,'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pengurus Permohonan</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_pengurus_permohonan',$op_pengurus_permohonan,set_value('op_pengurus_permohonan',$d2->Kd_Pengurus),'id="op_pengurus_permohonan" class="form-control"'); ?></div>
											</div>
											<span id="dsp_pengurus" style="display:none;">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Pengurus</label>
												<div class="col-sm-6"><input type="text" name="nama_pengurus" id="nama_pengurus" placeholder="Nama Pengurus" class="form-control" value="<?php echo set_value('nama_pengurus',$d2->Nm_Pengurus); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-6"><input type="text" name="alamat_pengurus" id="alamat_pengurus" placeholder="Alamat Pengurus" class="form-control" value="<?php echo set_value('alamat_pengurus',$d2->Alamat_Pengurus); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. HP</label>
												<div class="col-sm-6"><input type="text" name="hp_pengurus" id="hp_pengurus" placeholder="Nomor HP Pengurus" class="form-control" value="<?php echo set_value('hp_pengurus',$d2->Telp_Pengurus); ?>" /></div>
											</div> 
											</span>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Izin</label>
												<div class="col-sm-6"><?php echo form_dropdown('jenis_izin',$op_jenis_izin,set_value('jenis_izin',$Kd_Jenis),'id="jenis_izin" class="form-control"'); ?></div>
											</div>
											
											<span id="dsp_heregistrasi" style="display:none;">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Registrasi ke</label>
												<div class="col-sm-1"><input type="text" name="urutan" id="urutan" placeholder="0" class="form-control" value="<?php echo set_value('urutan',$d2->Registrasi_Ke); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. SK lama</label>
												<div class="col-sm-6"><input type="text" name="no_sk_lama" id="no_sk_lama" placeholder="No SK Lama" class="form-control" value="<?php echo html_entity_decode(set_value('no_sk_lama',$d2->No_SKL)); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal SK Lama:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk_lama',set_value('tgl_sk_lama',TimeFormat($d2->Tgl_SKL,'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Pelanggan HO (Sebelumnya)</label>
												<div class="col-sm-6"><input type="text" name="nama_l" id="nama_l" placeholder="Nama Pelanggan HO Sebelumnya" class="form-control" value="<?php echo set_value('nama_l',$d2->Nm_Pelanggan_L); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Usaha (Sebelumnya)</label>
												<div class="col-sm-6"><input type="text" name="nama_usaha_l" id="nama_usaha_l" placeholder="Nama Usaha Sebelumnya" class="form-control" value="<?php echo set_value('nama_usaha_l',$d2->Nm_Usaha_L); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Usaha (Sebelumnya)</label>
												<div class="col-sm-6"><input type="text" name="perihal_l" id="perihal_l" placeholder="Jenis Usaha Sebelumnya" class="form-control" value="<?php echo set_value('perihal_l',$d2->Perihal_L); ?>" /></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Provinsi (Sebelumnya)</label>
											   <div class="col-sm-6"><span id="dsp_provinsi2"><?php echo form_dropdown('op_provinsi2',op_provinsi(),set_value('op_provinsi2',ifnull($d2->Kd_Provinsi_L,35)),'id="op_provinsi2" class="form-control chosen-select"'); ?></span></div>
											</div> 

											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kota (Sebelumnya)</label>
											   <div class="col-sm-6"><span id="dsp_kota2"><?php echo form_dropdown('op_kota2',op_kota(ifnull($d2->Kd_Provinsi_L,35)),set_value('op_kota2',ifnull($d2->Kd_Kota_L,3522)),'id="op_kota2" class="form-control chosen-select"'); ?></span></div>
											</div> 

											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kecamatan (Sebelumnya)</label>
											   <div class="col-sm-6"><span id="dsp_kecamatan2"><?php echo form_dropdown('op_kecamatan2',op_kecamatan(ifnull($d2->Kd_Kota_L,3522)),set_value('op_kecamatan2',$d2->Kd_Kecamatan_L),'id="op_kecamatan2" class="form-control chosen-select"'); ?></span></div>
											</div> 

											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Desa (Sebelumnya)</label>
											   <div class="col-sm-6"><span id="dsp_desa2"><?php echo form_dropdown('op_desa2',op_desa($d2->Kd_Kecamatan_L),set_value('op_desa2',$d2->Kd_Desa_L),'id="op_desa2" class="form-control chosen-select"'); ?></span></div>
											</div> 
											
											</span>
											
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Usaha</label>
												<div class="col-sm-6"><input type="text" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha" class="form-control" value="<?php echo set_value('nama_usaha',$d2->Nm_Usaha); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Usaha</label>
												<div class="col-sm-6"><input type="text" name="perihal" id="perihal" placeholder="Jenis Izin" class="form-control" value="<?php echo set_value('perihal',$d2->Perihal); ?>" /></div>
											</div> 
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Perihal Izin (Usaha)</label>
												<div class="col-sm-6"><input type="text" name="perihal" id="perihal" placeholder="Perihal Izin" class="form-control" value="<?php echo set_value('perihal',$d2->Perihal); ?>" /></div>
											</div> -->
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat Usaha</label>
												<div class="col-sm-6"><input type="text" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat Usaha" class="form-control" value="<?php echo set_value('alamat_usaha',$d2->Alamat_Usaha); ?>" /></div>
											</div> 
																						
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Provinsi</label>
											   <div class="col-sm-6"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',$d2->Kd_Provinsi),'id="op_provinsi" class="form-control chosen-select"'); ?></span></div>
											</div> 

											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kota</label>
											   <div class="col-sm-6"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota($d2->Kd_Provinsi),set_value('op_kota',$d2->Kd_Kota),'id="op_kota" class="form-control chosen-select"'); ?></span></div>
											</div> 

											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kecamatan</label>
											   <div class="col-sm-6"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan($d2->Kd_Kota),set_value('op_kecamatan',$d2->Kd_Kecamatan),'id="op_kecamatan" class="form-control chosen-select"'); ?></span></div>
											</div> 

											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Desa</label>
											   <div class="col-sm-6"><span id="dsp_desa"><?php echo form_dropdown('op_desa',op_desa($d2->Kd_Kecamatan),set_value('op_desa',$d2->Kd_Desa),'id="op_desa" class="form-control chosen-select"'); ?></span></div>
											</div>
											
											<?php if($Kd_Access == 'bo' || $Kd_Access == 'tu') { ?>
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Bangunan</label>
												<div class="col-sm-6"><input type="text" name="jenis" id="jenis" placeholder="Jenis Bangunan" class="form-control" value="<?php echo set_value('jenis',$d2->Jenis_Bangunan); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Peruntukan Bangunan</label>
												<div class="col-sm-6"><input type="text" name="peruntukan" id="peruntukan" placeholder="Peruntukan Bangunan" class="form-control" value="<?php echo set_value('peruntukan',$d2->Peruntukan_Bangunan); ?>" /></div>
											</div> -->
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Luas Bangunan (M<sup>2</sup>)</label>
												<div class="col-sm-6"><input type="text" name="luas" id="luas" placeholder="Luas Bangunan" class="form-control" value="<?php echo set_value('luas',$d2->Luas_Bangunan); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nilai Total Retribusi (Rp)</label>
												<div class="col-sm-6"><input type="text" name="retribusi" id="retribusi" placeholder="Nilai Total Retribusi" class="form-control" value="<?php echo set_value('retribusi',$d2->Nilai_Retribusi); ?>" /></div>
											</div> 
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Batas Lokasi</label>
												<label for="" class="col-sm-1 control-label">Utara</label>
												<div class="col-sm-5"><input type="text" name="utara" id="utara" placeholder="Utara" class="form-control" value="<?php echo set_value('utara',$d2->Batas_Utara); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<label for="" class="col-sm-1 control-label">Selatan</label>
												<div class="col-sm-5"><input type="text" name="selatan" id="selatan" placeholder="Selatan" class="form-control" value="<?php echo set_value('selatan',$d2->Batas_Selatan); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<label for="" class="col-sm-1 control-label">Timur</label>
												<div class="col-sm-5"><input type="text" name="timur" id="timur" placeholder="Timur" class="form-control" value="<?php echo set_value('timur',$d2->Batas_Timur); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<label for="" class="col-sm-1 control-label">Barat</label>
												<div class="col-sm-5"><input type="text" name="barat" id="barat" placeholder="Barat" class="form-control" value="<?php echo set_value('barat',$d2->Batas_Barat); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Kepemilikan Tanah</label>
												<div class="col-sm-6"><input type="text" name="kepemilikan" id="kepemilikan" placeholder="Perihal Izin" class="form-control" value="<?php echo set_value('kepemilikan',$d2->Nm_SHM); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Dasar Perthoangan</label>
												<label for="" class="col-sm-3 control-label">Berita Acara Pemeriksaan (BAP)</label>
												<div class="col-sm-3"><input type="text" name="bap" id="bap" placeholder="BAP" class="form-control" value="<?php echo set_value('bap',$d2->BAP); ?>" /></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<label for="" class="col-sm-3 control-label">Tanggal (BAP)</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_bap',set_value('tgl_bap',TimeFormat(iftimezero($d2->Tgl_SK),'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Keterangan Lain</label>
												<div class="col-sm-6"><input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control" value="<?php echo set_value('keterangan',$d2->Keterangan); ?>" /></div>
											</div> -->
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">(SK) Memperhatikan</label>
												<div class="col-sm-10"><textarea name="sk_memperhatikan" id="summernote"><?php echo set_value('sk_memperhatikan',$d2->SK_Memperhatikan); ?></textarea></div>
											</div>
											
											<?php if($Kd_Access == 'tu') { ?>
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. SK</label>
												<div class="col-sm-4"><input type="text" name="no_sk" id="no_sk" placeholder="No SK" class="form-control" value="<?php echo html_entity_decode(set_value('no_sk',$d2->No_SK)); ?>" readonly/></div>
												<div class="col-sm-2"><input type="button" class="btn btn-blue" value="Buat Nomor SK"  onclick="popup_el('<?php echo site_url(fmodule('ho/get_nomor/'.$ID_Izin)); ?>')"/></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No. Urut SK</label>
												<div class="col-sm-2"><input type="text" name="no_urut_sk" id="no_urut_sk" placeholder="No Urut SK" class="form-control" value="<?php echo set_value('no_urut_sk',$d2->ID_SK); ?>" readonly/></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal SK:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk',set_value('tgl_sk',TimeFormat(iftimezero($d2->Tgl_SK),'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  
											 
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Akhir SK:</label>
												<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_ska',set_value('tgl_ska',TimeFormat(iftimezero($d2->Tgl_SKA),'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
												</div>
											</div>  -->
											<?php } ?>
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
													<input class="btn btn-blue" type="button" name="cetak" value="Cetak Tanda Terima" onclick="popup('<?php echo site_url(fmodule('ho/tt/'.$ID_Izin)); ?>')"/>
													<?php if($Kd_Access == 'bo' || $Kd_Access == 'tu') { ?>
													<input class="btn btn-blue" type="button" name="cetak" value="Cetak SK" onclick="popup('<?php echo site_url(fmodule('ho/sk/'.$ID_Izin)); ?>')"/>
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
						url : "<?php echo site_url(fmodule('ho/op_perusahaan')); ?>/?time=" + new Date().getTime(),
						data: {ID_Izin:"<?php echo $ID_Izin; ?>",op_perusahaan:$(this).val(),Kd_Access:"<?php echo $Kd_Access; ?>"},
						success: function(msg){
							$('#dsp_perusahaan').html(msg);
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
