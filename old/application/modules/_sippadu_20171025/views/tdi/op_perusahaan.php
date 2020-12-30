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
$no_agenda = '';
$id_agenda = '';
$tgl_agenda = '';
$daftar_ulang = 0;

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
	//$daftar_ulang = $d->TDI_DAFTAR_ULANG;
}

if($data2->num_rows() > 0){ 
	$d2 = $data2->row(); 
	$no_agenda = $d2->NO_AGENDA;
	$id_agenda = $d2->ID_AGENDA;
	$tgl_agenda = $d2->TGL_AGENDA;
	
}

?>
<?php if($Kd_Access == 'fo' || $Kd_Access == 'bo') { ?>
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
   <div class="col-sm-6"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',$provinsi),'id="op_provinsi" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Kota</label>
   <div class="col-sm-6"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota($provinsi),set_value('op_kota',$kota),'id="op_kota" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Kecamatan</label>
   <div class="col-sm-6"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan($kota),set_value('op_kecamatan',$kecamatan),'id="op_kecamatan" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Desa</label>
   <div class="col-sm-6"><span id="dsp_desa"><?php echo form_dropdown('op_desa',op_desa($kecamatan),set_value('op_desa',$desa),'id="op_desa" class="form-control chosen-select"'); ?></span></div>
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
	<div class="col-sm-6"><?php echo form_dropdown('op_bentuk_perusahaan',$op_bentuk_perusahaan,set_value('op_bentuk_perusahaan',$bentuk_perusahaan),'id="op_bentuk_perusahaan" class="form-control"'); ?></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Jabatan</label>
	<div class="col-sm-6"><input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control upper" value="<?php echo set_value('jabatan',$jabatan); ?>" /></div>
</div> 
<?php } ?>

<?php if($Kd_Access == 'bo') { ?>
<hr class="line-solid line-full"/>

<!--<div class="form-group">
	<label for="" class="col-sm-2 control-label">Kategori SIUP</label>
	<div class="col-sm-6"><?php echo form_dropdown('op_kategori_siup',$op_kategori_siup,set_value('op_kategori_siup',$kategori_izin),'id="el" class="form-control"'); ?></div>
</div>-->
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Status Usaha</label>
	<div class="col-sm-6"><?php echo form_dropdown('op_status_perusahaan',$op_status_perusahaan,set_value('op_status_perusahaan',$status_perusahaan),'id="op_status_perusahaan" class="form-control"'); ?></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Daftar ulang ke</label>
	<div class="col-sm-2"><input type="text" name="daftar_ulang" id="daftar_ulang" placeholder="0" class="form-control autonumber" value="<?php echo set_value('daftar_ulang',$daftar_ulang); ?>" /></div>
</div> 
<!--<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nilai Modal dan Kekayaan</label>
	<div class="col-sm-2"><input type="text" name="nilai_modal" id="nilai_modal" placeholder="(Rupiah)" class="form-control autonumber" value="<?php echo set_value('nilai_modal',number($nilai_modal)); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nilai Tanah</label>
	<div class="col-sm-2"><input type="text" name="nilai_tanah" id="nilai_tanah" placeholder="(Rupiah)" class="form-control autonumber" value="<?php echo set_value('nilai_tanah',number($nilai_tanah)); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nilai Bangunan</label>
	<div class="col-sm-2"><input type="text" name="nilai_bangunan" id="nilai_bangunan" placeholder="(Rupiah)" class="form-control autonumber" value="<?php echo set_value('nilai_bangunan',number($nilai_bangunan)); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Jumlah Tenaga Kerja</label>
	<div class="col-sm-1"><input type="text" name="naker_a" id="naker_a" placeholder="Laki-Laki" class="form-control autonumber" value="<?php echo set_value('naker_a',$naker_l); ?>" /></div>
	<div class="col-sm-1"><input type="text" name="naker_b" id="naker_b" placeholder="Perempuan" class="form-control autonumber" value="<?php echo set_value('naker_b',$naker_p); ?>" /></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Kegiatan Usaha</label>
	<div class="col-sm-6"><?php echo form_dropdown('op_kegiatan_usaha',$op_kegiatan_usaha,set_value('op_kegiatan_usaha',$keg_usaha),'id="op_kegiatan_usaha" class="form-control"'); ?></div>
</div>

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Kelembagaan</label>
	<div class="col-sm-6"><?php echo form_dropdown('op_kelembagaan',$op_kelembagaan,set_value('op_kelembagaan',$kelembagaan),'id="op_kelembagaan" class="form-control"'); ?></div>
</div>-->
<div class="form-group">
	<label for="" class="col-sm-2 control-label">KBLI</label>
	<div class="col-sm-2"><input type="text" name="kbli" id="kbli" placeholder="" class="form-control" value="<?php echo set_value('kbli',$kbli); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Barang/Jasa Dagangan Utama</label>
	<div class="col-sm-6"><textarea name="jenis_barang" id="jenis_barang" placeholder="" class="form-control"><?php echo set_value('jenis_barang',$keg_usaha_pokok); ?></textarea></div>
</div>
<span id="dsp_menteri" style="display:none;">
<?php if($data2->num_rows() > 0){ $d2 = $data2->row(); ?>
<span id="dsp_agenda" style="display:none;">
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">No. Agenda</label>
		<div class="col-sm-4"><input type="text" name="no_agenda" id="no_agenda" placeholder="No Agenda" class="form-control" value="<?php echo set_value('no_agenda',$no_agenda); ?>" readonly/></div>
		<div class="col-sm-2"><input type="button" class="btn btn-blue" value="Buat Nomor Agenda"  onclick="popup('<?php echo site_url(fmodule('tdi/get_agenda/'.$ID_Izin)); ?>')"/></div>
	</div> 
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">No. Urut Agenda</label>
		<div class="col-sm-2"><input type="text" name="id_agenda" id="id_agenda" placeholder="No Urut Agenda" class="form-control" value="<?php echo set_value('id_agenda',$id_agenda); ?>" readonly/></div>
	</div> 
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">Tanggal Agenda:</label>
		<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_agenda',set_value('tgl_agenda',iftimezero($tgl_agenda,TimeNow('d/m/Y'),'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
		<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
		</div>
	</div>  
</span>
<?php } ?>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">No SK <span id="dsp_jenis_menteri"></span></label>
	<div class="col-sm-6"><input type="text" name="no_sk_menteri" id="no_sk_menteri" placeholder="" class="form-control" value="<?php echo set_value('no_sk_menteri',$no_menteri); ?>" /></div>
</div>  
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Tanggal SK <span id="dsp_jenis_menteri2"></span></label>
	<div class="col-sm-2"><div class="input-group datepicker" data-format="DD/MM/YYYY"><?php echo form_input('tgl_sk_menteri',set_value('tgl_sk_menteri',TimeFormat(iftimezero($tgl_menteri),'d/m/Y')),'class="form-control" id="mask_date" placeholder="Isikan Tanggal"'); ?>
	<span class="input-group-addon"><span class="fa fa-calendar"></span></span></div>
	</div>
</div>  

</span>
<?php } ?>


<script type="text/javascript">
		
	
	$("#op_provinsi").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kota')); ?>",
				data: {op_provinsi:$("#op_provinsi").val()},
				success: function(msg){
					$('#dsp_kota').html(msg);
					$('#op_kota').addClass("form-control");
				}
		});
	});
			
	$("#op_kota").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kecamatan')); ?>",
				data: {op_kota:$("#op_kota").val()},
				success: function(msg){
					$('#dsp_kecamatan').html(msg);
					$('#op_kecamatan').addClass("form-control");
				}
		});
	});
	
	$("#op_kecamatan").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_desa')); ?>",
				data: {op_kecamatan:$("#op_kecamatan").val()},
				success: function(msg){
					$('#dsp_desa').html(msg);
					$('#op_desa').addClass("form-control");
				}
		});
	});
	
	$("#op_bentuk_perusahaan").change(function(){
		var status = $(this).val();
		if(status=='1' || status=='5'){
			if(status=='1'){
				document.getElementById('dsp_jenis_menteri').innerHTML ='Menkumham';
				document.getElementById('dsp_jenis_menteri2').innerHTML ='Menkumham';
				document.getElementById('dsp_agenda').style.display='';
			}
			else{
				document.getElementById('dsp_jenis_menteri').innerHTML ='Menteri Koperasi';
				document.getElementById('dsp_jenis_menteri2').innerHTML ='Menteri Koperasi';
				document.getElementById('dsp_agenda').style.display='none';
			}
			document.getElementById('dsp_menteri').style.display='';
		}
		else{
			document.getElementById('dsp_menteri').style.display='none';
			document.getElementById('dsp_agenda').style.display='none';
		}
	});
	
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

