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
											
											<div class="input-group">
												<div class="col-sm-12">
												<?php echo form_dropdown('op_izin',$op_izin,set_value('op_izin',$idizin),'id="op_izin" class="chosen-select form-control" style="width:300px;" onchange="opizin(this)"'); ?>&nbsp;&nbsp;&nbsp;
												<?php echo form_dropdown('op_jenis_izin',$op_jenis_izin,set_value('op_jenis_izin',$idjenis),'id="op_jenis_izin" class="chosen-select form-control" style="width:430px;" onchange="opjenisizin(this)"'); ?>&nbsp;&nbsp;&nbsp;
												<input class="btn btn-blue" type="submit" name="simpan" value="Simpan"/>
												<?php if($idizin > 0 && ($this->session->userdata('userid') == 1)){ ?>
												&nbsp;
												<input class="btn btn-greensea" type="button" value="Edit" onclick="window.location.href='<?php echo site_url(fmodule('dokumen/master_param_edit/'.$idizin.'/'.$idjenis)); ?>'"/>
												&nbsp;
												<input class="btn btn-greensea" type="button" value="Add" onclick="window.location.href='<?php echo site_url(fmodule('dokumen/master_param_add/'.$idizin.'/'.$idjenis)); ?>'"/>
												&nbsp;
												<input class="btn btn-red" type="submit" name="delete" value="Del" onclick="return confirm('Hati-hati jika anda akan melakukan penghapusan terhadap data ini, apa anda yakin?');"/>
												<?php } ?>
												</div>
											</div>
											
										</div>

									</div>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body">
											<div class="block-fluid">                        
												<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
													<?php //if($d->Type_Format == 1){ ?>
													<!--<div class="form-group">
														<div class="col-sm-12">
															<input type="text" name="format" id="format" placeholder="Format" class="form-control" value="<?php echo set_value('format',$d->Format); ?>" />
														</div>
													</div>-->
													<?php //}else{ ?>
													<div class="form-group">
														<div class="col-sm-12">
															<textarea name="format" id="summernote"><?php echo $d->Format; ?></textarea>
														</div>
													</div>
													<?php //} ?>
												<?php } ?>
											</div>
											Daftar Variabel:<br/>
											<?php echo $Parameter; ?>
											<!--<table>
												<tr><td>[NOURUT]</td><td>:</td><td>Nomor urut</td></tr>
												<tr><td>[TAHUN]</td><td>:</td><td>Tahun</td></tr>
												<tr><td>[KDUSAHA]</td><td>:</td><td>Kode Usaha</td></tr>
												<tr><td>[KBLI]</td><td>:</td><td>KBLI</td></tr>
												<tr><td>[BULANROMAWI]</td><td>:</td><td>Bulan dalam Huruf Romawi</td></tr>
												<tr><td>[NAMAPELANGGAN]</td><td>:</td><td>Nama Pelanggan</td></tr>
												<tr><td>[PEKERJAANPELANGGAN]</td><td>:</td><td>Pekerjaan Pelanggan</td></tr>
												<tr><td>[ALAMATPELANGGAN]</td><td>:</td><td>Alamat Pelanggan</td></tr>
												<tr><td>[NAMAUSAHA]</td><td>:</td><td>Nama Usaha</td></tr>
												<tr><td>[PERIHAL]</td><td>:</td><td>Jenis Usaha</td></tr>
												<tr><td>[ALAMATUSAHA]</td><td>:</td><td>Alamat Usaha</td></tr>
												<tr><td>[NOSHM]</td><td>:</td><td>Nomor Sertifikat Hak Milik</td></tr>
												<tr><td>[NAMASHM]</td><td>:</td><td>Nama Pemilik Sertifikat Hak Milik</td></tr>
												<tr><td>[JENISUSAHA]</td><td>:</td><td>Jenis/Kategori Izin</td></tr>
												<tr><td>[JENISAJUAN]</td><td>:</td><td>Jenis Ajuan Izin (Baru,Perpanjangan,Perubahan)</td></tr>
												<tr><td>[TGLSKA]</td><td>:</td><td>Tanggal SK Terakhir</td></tr>
											</table>-->
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
