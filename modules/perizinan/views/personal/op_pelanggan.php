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
$provinsi		= '35';
$kota			= '3522';
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

if($this->session->userdata('sippadu_daftar_nokitas') != ''){
	$no_kitas = $this->session->userdata('sippadu_daftar_nokitas');
}

?>

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
											
			<script>
			$("#op_provinsi").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('perizinan/op_kota')); ?>/?time=" + new Date().getTime(),
							data: {op_provinsi:$("#op_provinsi").val()},
							success: function(msg){
								$('#dsp_kota').html(msg);
								$('#op_kota').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kota").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('perizinan/op_kecamatan')); ?>/?time=" + new Date().getTime(),
							data: {op_kota:$("#op_kota").val()},
							success: function(msg){
								$('#dsp_kecamatan').html(msg);
								$('#op_kecamatan').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kecamatan").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('perizinan/op_desa')); ?>/?time=" + new Date().getTime(),
							data: {op_kecamatan:$("#op_kecamatan").val()},
							success: function(msg){
								$('#dsp_desa').html(msg);
								$('#op_desa').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_provinsi2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('perizinan/op_kota2')); ?>/?time=" + new Date().getTime(),
							data: {op_provinsi2:$("#op_provinsi2").val()},
							success: function(msg){
								$('#dsp_kota2').html(msg);
								$('#op_kota2').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kota2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('perizinan/op_kecamatan2')); ?>/?time=" + new Date().getTime(),
							data: {op_kota2:$("#op_kota2").val()},
							success: function(msg){
								$('#dsp_kecamatan2').html(msg);
								$('#op_kecamatan2').addClass("form-control chosen-select");
							}
					});
				});
				
				$("#op_kecamatan2").change(function(){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('perizinan/op_desa2')); ?>/?time=" + new Date().getTime(),
							data: {op_kecamatan2:$("#op_kecamatan2").val()},
							success: function(msg){
								$('#dsp_desa2').html(msg);
								$('#op_desa2').addClass("form-control chosen-select");
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
				
				
			</script>
