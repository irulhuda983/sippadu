<?php if($data->num_rows() > 0){ $d = $data->row(); ?>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nama Usaha</label>
	<div class="col-sm-6"><input type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Usaha" class="form-control upper" value="<?php echo set_value('nama_perusahaan',$d->NM_PERUSAHAAN); ?>" /></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Alamat Usaha</label>
   <div class="col-sm-6"><textarea type="text" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Alamat Usaha" class="form-control upper" ><?php echo set_value('alamat_perusahaan',$d->ALAMAT); ?></textarea></div>
</div> 
<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Provinsi</label>
   <div class="col-sm-6"><span id="dsp_provinsi"><?php echo form_dropdown('op_provinsi',op_provinsi(),set_value('op_provinsi',$d->PROVINSI),'id="op_provinsi" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Kota</label>
   <div class="col-sm-6"><span id="dsp_kota"><?php echo form_dropdown('op_kota',op_kota($d->PROVINSI),set_value('op_kota',$d->KOTA),'id="op_kota" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Kecamatan</label>
   <div class="col-sm-6"><span id="dsp_kecamatan"><?php echo form_dropdown('op_kecamatan',op_kecamatan($d->KOTA),set_value('op_kecamatan',$d->KECAMATAN),'id="op_kecamatan" class="form-control chosen-select"'); ?></span></div>
</div> 

<div class="form-group" id="">
	<label for="" class="col-sm-2 control-label">Desa</label>
   <div class="col-sm-6"><span id="dsp_desa"><?php echo form_dropdown('op_desa',op_desa($d->KECAMATAN),set_value('op_desa',$d->DESA),'id="op_desa" class="form-control chosen-select"'); ?></span></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">NPWP</label>
	<div class="col-sm-6"><input type="text" name="npwp_perusahaan" id="npwp_perusahaan" placeholder="NPWP" class="form-control" value="<?php echo set_value('npwp_perusahaan',$d->NPWP); ?>" /></div>
</div> 

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Telpon</label>
	<div class="col-sm-6"><input type="text" name="telepon_perusahaan" id="telepon_perusahaan" placeholder="Telepon" class="form-control" value="<?php echo set_value('telepon_perusahaan',$d->TELP); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Fax</label>
	<div class="col-sm-6"><input type="text" name="fax_perusahaan" id="fax_perusahaan" placeholder="Fax" class="form-control" value="<?php echo set_value('fax_perusahaan',$d->FAX); ?>" /></div>
</div> 

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-6"><input type="text" name="email_perusahaan" id="email_perusahaan" placeholder="Email" class="form-control" value="<?php echo set_value('email_perusahaan',$d->EMAIL); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Website</label>
	<div class="col-sm-6"><input type="text" name="website_perusahaan" id="website_perusahaan" placeholder="Website" class="form-control" value="<?php echo set_value('website_perusahaan',$d->WEB); ?>" /></div>
</div> 
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Bentuk Usaha</label>
	<div class="col-sm-6"><?php echo form_dropdown('op_bentuk_perusahaan',$op_bentuk_perusahaan,set_value('op_bentuk_perusahaan',$d->BNTK_PERUSAHAAN),'id="op_bentuk_perusahaan" class="form-control chosen-select"'); ?></div>
</div>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Jabatan</label>
	<div class="col-sm-6"><input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control upper" value="<?php echo set_value('jabatan',$d->JABATAN); ?>" /></div>
</div> 
<?php }else{ ?>

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
	<div class="col-sm-6"><input type="text" name="website_perusahaan" id="website_perusahaan" placeholder="Website" class="form-control" value="<?php echo set_value('website_perusahaan'); ?>" /></div>
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

<script type="text/javascript">
		
	
	$("#op_provinsi").change(function(){
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('op_kota')); ?>",
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
				url : "<?php echo site_url(fmodule('op_kecamatan')); ?>",
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
				url : "<?php echo site_url(fmodule('op_desa')); ?>",
				data: {op_kecamatan:$("#op_kecamatan").val()},
				success: function(msg){
					$('#dsp_desa').html(msg);
					$('#op_desa').addClass("form-control chosen-select");
				}
		});
	});
	
	$("#op_bentuk_perusahaan").change(function(){
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
	});
	
	$(function() {
		$('.upper').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
	//$("#op_bentuk_perusahaan").val("0").trigger("change");
</script>


