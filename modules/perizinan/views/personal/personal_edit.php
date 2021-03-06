<!doctype html>
<?php 

$session_p		= false;
$id_pelanggan	= '0';
$no_kitas 		= '';
$name			= '';
$tempat_lahir 	= '';
$tanggal_lahir 	= '';
$bulan_lahir	= '';
$tahun_lahir	= '';
$gender			= '';
$pekerjaan		= '';
$alamat			= '';
$provinsi		= '';
$kota			= '';
$kecamatan		= '';
$desa			= '';
$npwp			= '';
$telepon		= '';
$hp				= '';
$fax			= '';
$email			= '';

if($this->session->userdata('sess_p_op_pelanggan') != ''){
	$session_p		= true;
	$id_pelanggan 	= $this->session->userdata('sess_p_op_pelanggan');
	$no_kitas 		= $this->session->userdata('sess_p_no_kitas');
	$name			= $this->session->userdata('sess_p_nm_user');
	$tempat_lahir 	= $this->session->userdata('sess_p_tempat_lahir');
	$tanggal_lahir 	= TimeFormat($this->session->userdata('sess_p_tgl_lahir'),'d');
	$bulan_lahir	= TimeFormat($this->session->userdata('sess_p_tgl_lahir'),'m');
	$tahun_lahir	= TimeFormat($this->session->userdata('sess_p_tgl_lahir'),'Y');
	$gender			= $this->session->userdata('sess_p_gender');
	$pekerjaan		= $this->session->userdata('sess_p_pekerjaan');
	$alamat			= $this->session->userdata('sess_p_alamat');
	$provinsi		= $this->session->userdata('sess_p_provinsi');
	$kota			= $this->session->userdata('sess_p_kota');
	$kecamatan		= $this->session->userdata('sess_p_kecamatan');
	$desa			= $this->session->userdata('sess_p_desa');
	$npwp			= $this->session->userdata('sess_p_npwp');
	$telepon		= $this->session->userdata('sess_p_telp');
	$hp				= $this->session->userdata('sess_p_no_hp');
	$fax			= $this->session->userdata('sess_p_fax');
	$email			= $this->session->userdata('sess_p_email');
}

else if($data->num_rows() > 0){
	$d = $data->row();
	$session_p		= false;
	$id_pelanggan 	= $id;
	$no_kitas 		= $d->NOKITAS;
	$name			= $d->NM_PELANGGAN;
	$tempat_lahir 	= $d->TEMPAT_LAHIR;
	$tanggal_lahir 	= TimeFormat($d->TGL_LAHIR,'d');
	$bulan_lahir	= TimeFormat($d->TGL_LAHIR,'m');
	$tahun_lahir	= TimeFormat($d->TGL_LAHIR,'Y');
	$gender			= $d->SEX;
	$pekerjaan		= $d->PEKERJAAN;
	$alamat			= $d->ALAMATPELANGGAN;
	$provinsi		= $d->PROVINSI;
	$kota			= $d->KOTA;
	$kecamatan		= $d->KECAMATAN;
	$desa			= $d->DESA;
	$npwp			= $d->NPWP;
	$telepon		= $d->TELP;
	$hp				= $d->NO_HP;
	$fax			= $d->FAX;
	$email			= $d->EMAIL;
}

?>
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
										<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pilih Data Pemohon</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_pelanggan',$op_pelanggan,set_value('op_pelanggan',$id_pelanggan),'id="op_pelanggan" class="form-control" style="width:100%;"'); ?></div>
											</div> 
											
											<span id="dsp_pelanggan">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No Identitas</label>
												<div class="col-sm-6"><input type="text" name="nokitas" id="nokitas" placeholder="No Identitas (KTP, Passpor, dll)" class="form-control" value="<?php echo set_value('nokitas',$no_kitas); ?>" /></div>
											</div> 
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
												<div class="col-sm-6"><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo set_value('nama',$name); ?>" /></div>
											</div>
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tempat Lahir</label>
												<div class="col-sm-6"><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tempat_lahir',$tempat_lahir); ?>" /></div>
											</div>
											
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
												<div class="col-sm-2"><?php echo form_dropdown('tanggal_lahir',op_tanggal(),set_value('tanggal_lahir',$tanggal_lahir),'id="tanggal_lahir" class="form-control chosen-select"'); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('bulan_lahir',op_bulan(),set_value('bulan_lahir',$bulan_lahir),'id="bulan_lahir" class="form-control chosen-select"'); ?></div>
												<div class="col-sm-2"><?php echo form_dropdown('tahun_lahir',op_tahun(),set_value('tahun_lahir',$tahun_lahir),'id="tahun_lahir" class="form-control chosen-select"'); ?></div>
											</div>


											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','01',(set_value('gender',$gender)=='01' ? TRUE : FALSE)).'<i></i> Laki-Laki '; ?></label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('gender','02',(set_value('gender',$gender)=='02' ? TRUE : FALSE)).'<i></i> Perempuan '; ?></label></div>
											</div>

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Pekerjaan</label>
												<div class="col-sm-6"><input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" class="form-control" value="<?php echo set_value('pekerjaan',$pekerjaan); ?>" /></div>
											</div>

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Alamat</label>
											   <div class="col-sm-6"><textarea type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" ><?php echo set_value('alamat',$alamat); ?></textarea></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Provinsi</label>
											   <div class="col-sm-6"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',$provinsi),'id="op_provinsi" class="form-control" style="width:100%;"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kota</label>
											   <div class="col-sm-6"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota($provinsi),set_value('op_kota',$kota),'id="op_kota" class="form-control"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kecamatan</label>
											   <div class="col-sm-6"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan($kota),set_value('op_kecamatan',$kecamatan),'id="op_kecamatan" class="form-control"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Desa</label>
											   <div class="col-sm-6"><span id="dsp_desa"><?php echo form_dropdown('op_desa',op_desa($kecamatan),set_value('op_desa',$desa),'id="op_desa" class="form-control"'); ?></span></div>
											</div> 
											
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">NPWP</label>
												<div class="col-sm-6"><input type="text" name="npwp" id="npwp" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp',$npwp); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Telpon</label>
												<div class="col-sm-6"><input type="text" name="telepon" id="telepon" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon',$telepon); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">HP</label>
												<div class="col-sm-6"><input type="text" name="hp" id="hp" placeholder="Handphone" class="form-control" value="<?php echo set_value('hp',$hp); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Fax</label>
												<div class="col-sm-6"><input type="text" name="fax" id="fax" placeholder="Fax" class="form-control" value="<?php echo set_value('fax',$fax); ?>" /></div>
											</div> 
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-6"><input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo set_value('email',$email); ?>" /></div>
											</div> 
											</span>
								
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn btn-blue" value="<?php echo lang('Next'); ?>" /></div>							
											</div>
											<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />
											
											
											</div>
										</form>
									</div>
									</div>
									</div>
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
		<script type="text/javascript">
			$("#op_pelanggan").change(function(){
				var op = $(this).val();
				if(op != '0'){
					$('#dsp_pelanggan').show();
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('personal/op_pelanggan')); ?>/?time=" + new Date().getTime(),
							data: {op_pelanggan:$(this).val()},
							success: function(msg){
								$('#dsp_pelanggan').html(msg);
								$('#op_provinsi').addClass("form-control chosen-select");
								$('#op_kota').addClass("form-control chosen-select");
								$('#op_kecamatan').addClass("form-control chosen-select");
								$('#op_desa').addClass("form-control chosen-select");
							}
					});
				}
				else{
					$('#dsp_pelanggan').hide();
				}
			});
			
			<?php if($session_p == false){ ?>
			$("#op_pelanggan").val("<?php echo set_value('op_pelanggan',$id_pelanggan); ?>").trigger("change");
			<?php } ?>
		</script>
    </body>
</html>
