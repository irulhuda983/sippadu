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
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
									<?php echo alert(); ?> 
									<?php echo form_open_multipart('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
											<?php if($data2->num_rows() > 0){ $d2 = $data2->row(); ?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nomor Identitas</label>
												<div class="col-sm-6"><input type="text" name="nokitas" class="form-control" placeholder="Nomor Identitas" value="<?php echo set_value('nokitas',$d->No_Kitas); ?>" readonly /></div>
											</div>                         

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
											   <div class="col-sm-6"><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama',$d->Nm_Personal); ?>" readonly /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir',$d->Tempat_Lahir); ?>" readonly  /></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
												<div class="col-sm-2"><?php echo form_dropdown('tanggal_lahir',op_tanggal(),set_value('tanggal_lahir',TimeFormat($d->Tgl_Lahir,'d')),'id="tanggal_lahir" class="form-control " disabled '); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('bulan_lahir',op_bulan(),set_value('bulan_lahir',TimeFormat($d->Tgl_Lahir,'m')),'id="bulan_lahir" class="form-control " disabled '); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('tahun_lahir',op_tahun(),set_value('tahun_lahir',TimeFormat($d->Tgl_Lahir,'Y')),'id="tahun_lahir" class="form-control " disabled '); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No HP</label>
												<div class="col-sm-6"><input type="text" name="no_hp" id="no_hp" placeholder="No Handphone" class="form-control" value="<?php echo set_value('tempat_lahir',$d->No_HP); ?>" readonly  /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Upload Scan Identitas</label>
												<div class="col-sm-6"><?php echo '<input class="btn btn-blue" type="button" name="cetak" value="Scan Identitas" onclick="popup(\''.base_url('assets/'.config('theme').'/files/berkas/personal/'.$d->Filename).'\')"/>';?></div>
											</div>
								
											<hr class="line-solid line-full"/>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">ID</label>
												<div class="col-sm-6"><input type="text" name="idpelanggan2" class="form-control" placeholder="ID Pelanggan" value="<?php echo set_value('id_pelanggan',$d2->IDPELANGGAN); ?>" readonly /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Identitas yg Diklaim</label>
												<div class="col-sm-6"><input type="text" name="nokitas2" class="form-control" placeholder="Nomor Identitas" value="<?php echo set_value('nokitas',$d2->NOKITAS); ?>" readonly /></div>
											</div>                         

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama yg Diklaim</label>
											   <div class="col-sm-6"><input type="text" name="nama2" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama',$d2->NM_PELANGGAN); ?>" readonly /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir2" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir',$d2->TEMPAT_LAHIR); ?>" readonly  /></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
												<div class="col-sm-2"><?php echo form_dropdown('tanggal_lahir2',op_tanggal(),set_value('tanggal_lahir2',TimeFormat($d2->TGL_LAHIR,'d')),'id="tanggal_lahir" class="form-control " disabled '); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('bulan_lahir2',op_bulan(),set_value('bulan_lahir2',TimeFormat($d2->TGL_LAHIR,'m')),'id="bulan_lahir" class="form-control " disabled '); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('tahun_lahir2',op_tahun(),set_value('tahun_lahir2',TimeFormat($d2->TGL_LAHIR,'Y')),'id="tahun_lahir" class="form-control " disabled '); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="no_hp2" id="no_hp2" placeholder="No Handphone" class="form-control" value="<?php echo set_value('no_hp2',$d2->NO_HP); ?>" readonly  /></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6">
													<?php echo form_hidden('oldfile',$d->Filename); ?>
													<?php echo form_hidden('ID_Klaim',$d->ID); ?>
													<?php echo form_hidden('IDPELANGGAN',$d2->IDPELANGGAN); ?>
													<?php echo form_hidden('No_Kitas',$d->No_Kitas); ?>
													<?php echo form_hidden('ID_User',$d->ID_User); ?>
													<input type="submit" name="submit" class="btn btn-greensea" value="Terima Klaim" />
													<input class="btn" type="button" name="back" value="Batal" onclick="window.location.href='<?php echo site_url(fmodule('personal/klaim')); ?>'"/>
													</div>							
											</div>
											<?php } ?>
											<?php } ?>
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

    </body>
</html>
