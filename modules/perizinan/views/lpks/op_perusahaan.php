<?php 
$nm_perusahaan = '';
$alamat_perusahaan = '';
$provinsi = 35;
$kota = 3522;
$kecamatan = '';
$desa = '';
$npwp = '';
$telp = '';
$fax = '';
$email = '';
$website = '';
$bentuk_perusahaan = 0; 
$jabatan = '';
$kategori_izin = '';
$status_perusahaan = '';
$daftar_ulang = '';
$nilai_modal = '';
$nilai_tanah = '';
$nilai_bangunan = '';
$naker_l = '';
$naker_p = '';
$keg_usaha = '';
$kelembagaan = '';
$kbli = '';
$keg_usaha_pokok = '';
$no_menteri = '';
$tgl_menteri = '';

if($data->num_rows() > 0){ 
	$d = $data->row(); 
	$nm_perusahaan = $d->NM_PERUSAHAAN;
	$alamat_perusahaan = $d->ALAMAT;
	$provinsi = $d->PROVINSI;
	$kota = $d->KOTA;
	$kecamatan = $d->KECAMATAN;
	$desa = $d->DESA;
	$npwp = $d->NPWP;
	$telp = $d->TELP;
	$fax = $d->FAX;
	$email = $d->EMAIL;
	$website = $d->WEB;
	$bentuk_perusahaan = substr($d->BNTK_PERUSAHAAN,-1); 
	$jabatan = $d->JABATAN;
	$kategori_izin = $d->KATEGORI_IZIN;
	$status_perusahaan = $d->STATUS_PERUSAHAAN;
	$daftar_ulang = $d->DAFTAR_ULANG;
	$nilai_modal = $d->NILAI_MODAL;
	$nilai_tanah = $d->NILAI_TANAH;
	$nilai_bangunan = $d->NILAI_BANGUNAN;
	$naker_l = $d->NAKER_L;
	$naker_p = $d->NAKER_P;
	$keg_usaha = $d->KEG_USAHA;
	$kelembagaan = $d->KELEMBAGAAN;
	$kbli = $d->KBLI;
	$keg_usaha_pokok = $d->KEG_USAHA_POKOK;
	$no_menteri = $d->NO_MENTERI;
	$tgl_menteri = $d->TGL_MENTERI;
}
?>

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nama Usaha</label>
	<div class="col-sm-6"><input type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Usaha" class="form-control upper" value="<?php echo set_value('nama_perusahaan',$nm_perusahaan); ?>" /></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Alamat Usaha</label>
   <div class="col-sm-6"><textarea type="text" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Alamat Usaha" class="form-control upper" ><?php echo set_value('alamat_perusahaan',$alamat_perusahaan); ?></textarea></div>
</div> 
<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Provinsi</label>
   <div class="col-sm-6"><span id="dsp_provinsi2"><?php echo form_dropdown('op_provinsi2',op_provinsi(),set_value('op_provinsi2',$provinsi),'id="op_provinsi2" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Kota</label>
   <div class="col-sm-6"><span id="dsp_kota2"><?php echo form_dropdown('op_kota2',op_kota($provinsi),set_value('op_kota2',$kota),'id="op_kota2" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Kecamatan</label>
   <div class="col-sm-6"><span id="dsp_kecamatan2"><?php echo form_dropdown('op_kecamatan2',op_kecamatan($kota),set_value('op_kecamatan2',$kecamatan),'id="op_kecamatan2" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Desa</label>
   <div class="col-sm-6"><span id="dsp_desa2"><?php echo form_dropdown('op_desa2',op_desa($kecamatan),set_value('op_desa2',$desa),'id="op_desa2" class="form-control chosen-select"'); ?></span></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">NPWP</label>
	<div class="col-sm-6"><input type="text" name="npwp_perusahaan" id="npwp_perusahaan" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp_perusahaan',$npwp); ?>" /></div>
</div> 

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Telpon</label>
	<div class="col-sm-6"><input type="text" name="telepon_perusahaan" id="telepon_perusahaan" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon_perusahaan',$telp); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Fax</label>
	<div class="col-sm-6"><input type="text" name="fax_perusahaan" id="fax_perusahaan" placeholder="Fax" class="form-control" value="<?php echo set_value('fax_perusahaan',$fax); ?>" /></div>
</div> 

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-6"><input type="text" name="email_perusahaan" id="email_perusahaan" placeholder="Email" class="form-control" value="<?php echo set_value('email_perusahaan',$email); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Website</label>
	<div class="col-sm-6"><input type="text" name="web_perusahaan" id="web_perusahaan" placeholder="Website" class="form-control" value="<?php echo set_value('web_perusahaan',$website); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Bentuk Usaha</label>
	<div class="col-sm-6"><?php echo form_dropdown('op_bentuk_perusahaan',$op_bentuk_perusahaan,set_value('op_bentuk_perusahaan',$bentuk_perusahaan),'id="op_bentuk_perusahaan" class="form-control chosen-select"'); ?></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Jabatan</label>
	<div class="col-sm-6"><input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control upper" value="<?php echo set_value('jabatan',$jabatan); ?>" /></div>
</div> 


<script type="text/javascript">
		
	
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
	
	/*$("#op_bentuk_perusahaan").change(function(){
		var status = $(this).val();
		if(status=='1' || status=='5'){
			if(status=='1'){
				document.getElementById('dsp_jenis_menteri').innerHTML ='Menkumham';
				document.getElementById('dsp_jenis_menteri2').innerHTML ='Menkumham';
			}
			else{
				document.getElementById('dsp_jenis_menteri').innerHTML ='Menteri Koperasi';
				document.getElementById('dsp_jenis_menteri2').innerHTML ='Menteri Koperasi';
			}
			document.getElementById('dsp_menteri').style.display='';
		}
		else{
			document.getElementById('dsp_menteri').style.display='none';
		}
	});*/
	
	$(function() {
		$('.upper').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
	
	$('.autonumber').keyup(function(){
		var separator = ".";
		a = this.value;
		b = a.replace(/[^\d]/g,"");
		//b = a.replace(/[^0-9.]/g,"");
		c = "";
		panjang = b.length;
		j = 0;
		for (i = panjang; i > 0; i--) {
			j = j + 1;
			if (((j % 3) == 1) && (j != 1)) {
				c = b.substr(i-1,1) + separator + c;
			} else {
				c = b.substr(i-1,1) + c;
			}
		}
		this.value = c;
	});
	
	
	$('.datepicker').datetimepicker({
		format: 'DD/MM/YYYY'
	});

	
	$("#op_bentuk_perusahaan").val("<?php echo $bentuk_perusahaan; ?>").trigger("change");
</script>

