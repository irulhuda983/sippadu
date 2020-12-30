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

if($data->num_rows() > 0){
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

$no_mohon		= '';
$tgl_mohon		= '';
$slc_pengurus = '';
$nama_pengurus	= '';
$alamat_pengurus= '';
$hp_pengurus	= '';
$jenis_izin		= '';
$urutan			= '';
$no_sk_lama		= '';
$tgl_sk_lama	= '';
$nm_usaha		= '';
$alamat_usaha	= '';
$slc_provinsi	= '35';
$slc_kota		= '3522';
$slc_kecamatan	= '';
$slc_desa		= '';

?>

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
                    <!--<div class="pageheader">
                        <h2><?php echo $title; ?></h2>
						<?php //$this->load->view('breadcrumb'); ?>
                    </div>-->

                    <!-- page content -->
					<?php echo alert(); ?>
					<?php echo form_open_multipart(); ?>
					<?php echo form_hidden('Kd_Izin',$Kd_Izin); ?>
                    <div class="pagecontent">
						
                        <div id="rootwizard" class="tab-container tab-wizard">
                            <ul class="nav nav-tabs nav-justified nav-pills">
                                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true"><?php echo lang('Data Pemohon',true); ?> <span class="badge badge-default pull-right wizard-step">1</span></a></li>
                                <li><a href="#tab2" data-toggle="tab"><?php echo lang('Isi Data Izin',true); ?><span class="badge badge-default pull-right wizard-step">2</span></a></li>
                                <li><a href="#tab3" data-toggle="tab"><?php echo lang('Upload Berkas',true); ?><span class="badge badge-default pull-right wizard-step">3</span></a></li>
                                <li><a href="#tab4" data-toggle="tab"><?php echo lang('Kirim Data',true); ?><span class="badge badge-default pull-right wizard-step">4</span></a></li>
                            </ul>
							
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">

                                    <div name="step1" role="form" class="form-horizontal" novalidate="">

                                        <div class="row">
                                            <div class="form-group">
												<label for="" class="col-sm-2 control-label">Pilih Data Pemohon</label>
												<div class="col-sm-6"><?php echo form_dropdown('op_pelanggan',$op_pelanggan,set_value('op_pelanggan',$id_pelanggan),'id="op_pelanggan" class="form-control" style="width:100%;"'); ?></div>
											</div> 
											
											<span id="dsp_pelanggan">
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">No Identitas</label>
												<div class="col-sm-6"><input type="text" name="nokitas" id="nokitas" placeholder="No Identitas (KTP, Passpor, dll)" class="form-control" value="<?php echo set_value('nokitas',$no_kitas); ?>" /></div>
											</div> 
											
											<div class="form-group" id="dsp_cek_data" style="display:none;">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><span id="cek_data"></span></div>
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
								
											
											<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab2">

                                    <div name="step2" class="form-horizontal" role="form">
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">No Surat Permohonan</label>
											<div class="col-sm-6"><input type="text" name="no_mohon" id="no_mohon" placeholder="No Surat Permohonan" class="form-control" value="<?php echo set_value('no_mohon',$no_mohon); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Tanggal Surat:</label>
											<div class="col-sm-4"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_mohon',set_value('tgl_mohon',TimeFormat('d/m/Y',$tgl_mohon)),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
											<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
											</div>
										</div>  
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Pengurus Permohonan</label>
											<div class="col-sm-6"><?php echo form_dropdown('op_pengurus_permohonan',$op_pengurus_permohonan,set_value('op_pengurus_permohonan',$slc_pengurus),'id="op_pengurus_permohonan" class="form-control"'); ?></div>
										</div>
										
										<span id="dsp_pengurus" style="display:none;">
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Nama Pengurus</label>
											<div class="col-sm-6"><input type="text" name="nama_pengurus" id="nama_pengurus" placeholder="Nama Pengurus" class="form-control" value="<?php echo set_value('nama_pengurus',$nama_pengurus); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Alamat</label>
											<div class="col-sm-6"><input type="text" name="alamat_pengurus" id="alamat_pengurus" placeholder="Alamat Pengurus" class="form-control" value="<?php echo set_value('alamat_pengurus',$alamat_pengurus); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">No. HP</label>
											<div class="col-sm-6"><input type="text" name="hp_pengurus" id="hp_pengurus" placeholder="Nomor HP Pengurus" class="form-control" value="<?php echo set_value('hp_pengurus',$hp_pengurus); ?>" /></div>
										</div> 
										</span>
											
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Jenis Izin</label>
											<div class="col-sm-6"><?php echo form_dropdown('jenis_izin',$op_jenis_izin,set_value('jenis_izin',$jenis_izin),'id="jenis_izin" class="form-control"'); ?></div>
										</div>
										
										<span id="dsp_heregistrasi" style="display:none;">
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Registrasi ke</label>
											<div class="col-sm-1"><input type="text" name="urutan" id="urutan" placeholder="0" class="form-control" value="<?php echo set_value('urutan',$urutan); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">No. SK lama</label>
											<div class="col-sm-6"><input type="text" name="no_sk_lama" id="no_sk_lama" placeholder="No SK Lama" class="form-control" value="<?php echo set_value('no_sk_lama',$no_sk_lama); ?>" /></div>
										</div> 
										<div class="form-group">
											<label for="" class="col-sm-2 control-label">Tanggal SK Lama:</label>
											<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk_lama',set_value('tgl_sk_lama',$tgl_sk_lama),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
											<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
											</div>
										</div>  
										</span>

                                        <div class="form-group">
											<label for="" class="col-sm-2 control-label">Pilih Nama Usaha</label>
											<div class="col-sm-6"><?php echo form_dropdown('op_perusahaan',$op_perusahaan,set_value('op_perusahaan',0),'id="op_perusahaan" class="form-control"'); ?></div>
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
											   <div class="col-sm-6"><span id="dsp_provinsi2"><?php echo form_dropdown('op_provinsi2',op_provinsi(),set_value('op_provinsi2',35),'id="op_provinsi2" class="form-control"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kota</label>
											   <div class="col-sm-6"><span id="dsp_kota2"><?php echo form_dropdown('op_kota2',op_kota(35),set_value('op_kota2',3522),'id="op_kota2" class="form-control"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Kecamatan</label>
											   <div class="col-sm-6"><span id="dsp_kecamatan2"><?php echo form_dropdown('op_kecamatan2',op_kecamatan(3522),set_value('op_kecamatan2'),'id="op_kecamatan2" class="form-control"'); ?></span></div>
											</div> 
											
											<div class="form-group" id="">
												<label for="" class="col-sm-2 control-label">Desa</label>
											   <div class="col-sm-6"><span id="dsp_desa2"><?php echo form_dropdown('op_desa2',op_desa(),set_value('op_desa2'),'id="op_desa2" class="form-control"'); ?></span></div>
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
												<div class="col-sm-6"><?php echo form_dropdown('op_bentuk_perusahaan',$op_bentuk_perusahaan,set_value('op_bentuk_perusahaan'),'id="op_bentuk_perusahaan" class="form-control"'); ?></div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Jabatan</label>
												<div class="col-sm-6"><input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control upper" value="<?php echo set_value('jabatan'); ?>" /></div>
											</div> 

										</span>

                                    </div>

                                </div>
                                <div class="tab-pane" id="tab3">

                                    <div name="step3" class="form-horizontal" role="form" novalidate="">

                                        <div class="block-fluid" id="dsp_dokumen">                        
											<br/>
											<?php 
											$berkas = 0;
											$data_dok = dok_checklist($Kd_Izin,$Kd_Jenis);
											if($data_dok->num_rows() > 0){ $berkas = $data_dok->num_rows();
												$arrberkas = '';
												foreach($data_dok->result() as $dok){ 
													if($dok->Petugas == 1){
														$arrberkas .= '
														<div class="form-group">
															<div class="col-sm-8 control-label" style="text-align:left;">'.$dok->Nm_Dok.'</div>
															<div class="col-sm-4">
																'.ifnull($dok->Keterangan,'<i>(Dilengkapi petugas)</i>').'
															</div>
														</div>';
													}
													else{
														$arrberkas .= '
														<div class="form-group">
															<div class="col-sm-8 control-label" style="text-align:left;">'.$dok->Nm_Dok.'</div>
															<div class="col-sm-4">
																<input type="file" name="userfile_'.$dok->Kd_Dok.'" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
															</div>
														</div>';
													}
												} 
												echo $arrberkas;
											} 
											?>

										</div>

                                    </div>

                                </div>
                                <div class="tab-pane" id="tab4">

                                    <blockquote class="filled bg-default lter" style="font-size:14px;"><?php echo $Syarat_Ketentuan; ?></blockquote>

                                    <div name="step5" role="form" novalidate="">

                                        <div class="checkbox">
                                            <label class="checkbox checkbox-custom-alt">
                                                <input type="checkbox" name="agree" id="agree" required=""><i></i> Ya, saya menyetujuinya!
                                            </label>
                                        </div>

                                    </div>

                                </div>
                                <ul class="pager wizard">
                                    <li class="previous disabled"><button class="btn btn-default">Previous</button></li>
                                    <li class="next"><button class="btn btn-default">Next</button></li>
                                    <li class="next finish" style="display: none;"><input type="submit" name="submit" value="Kirim Data" class="btn btn-success"></li>
                                </ul>
                            </div>
                        </div>

                    </div>
					</form>
                    <!-- /page content -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->

		
        <!--/ Page Specific Scripts -->
		
		
		<?php $this->load->view('footer_2'); ?>
		<script>
            $(window).load(function(){

                $('#rootwizard').bootstrapWizard({
                    onTabShow: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index+1;

                        if($current >= $total) {
                            $('#rootwizard').find('.pager .next').hide();
                            $('#rootwizard').find('.pager .finish').show();
                            $('#rootwizard').find('.pager .finish').removeClass('disabled');
                        } else {
                            $('#rootwizard').find('.pager .next').show();
                            $('#rootwizard').find('.pager .finish').hide();
                        }

                    }

                });

            });
        </script>
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
			
			$("#op_perusahaan").change(function(){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule($Class_Izin.'/op_perusahaan')); ?>/?time=" + new Date().getTime(),
						data: {op_perusahaan:$(this).val(),Kd_Access:"<?php //echo $Kd_Access; ?>"},
						success: function(msg){
							$('#dsp_perusahaan').html(msg);
						}
				});
			});
			
			$("#op_pengurus_permohonan").change(function(){
				var status = $(this).val();
				if(status=='01'){
					document.getElementById('dsp_pengurus').style.display='none';
					document.getElementById('nama_pengurus').value='';
				}
				else{
					document.getElementById('dsp_pengurus').style.display='';
					document.getElementById('nama_pengurus').value='<?php echo $this->session->userdata('sippadu_userfullname'); ?>';
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
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule($Class_Izin.'/op_dokumen')); ?>/?time=" + new Date().getTime(),
						data: {Kd_Jenis:$(this).val()},
						success: function(msg){
							$('#dsp_dokumen').html(msg);
							$('input[type=file]').addClass('filestyle');
						}
				});
			});
			
			$("#nokitas").keyup(function(){
				var str = $(this).val();
				if(str.length >= 8){
				$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule('personal/cek_data_personal')); ?>/?time=" + new Date().getTime(),
						data: {kitas:$(this).val()},
						success: function(msg){
							$('#cek_data').html(msg);
							$('#dsp_cek_data').css("display",'block');
						}
				});
				}
				else{
					$('#dsp_cek_data').css("display",'none');
				}
			});
			
			$("#op_pengurus_permohonan").val("01").trigger("change");
			$("#op_perusahaan").val("0").trigger("change");
			$("#jenis_izin").val("1").trigger("change");
			
			<?php if($this->session->userdata('sippadu_daftar_nokitas') != ''){?>
			$("#op_pelanggan").val("add").trigger("change");
			<?php } ?>
		</script>
    </body>
</html>
