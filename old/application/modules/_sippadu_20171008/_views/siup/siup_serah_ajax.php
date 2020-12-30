<?php if($data->num_rows() > 0){ $d = $data->first_row(); ?>
<div class="form-group">
	<label for="" class="col-sm-3 control-label">Nama Pengambil Berkas</label>
	<div class="col-sm-9"><input type="text" name="nama" id="nama" placeholder="Nama Pengambil Berkas" class="form-control" value="<?php echo set_value('nama',$d->NM_PENGURUS); ?>" /></div>
</div>

<div class="form-group">
	<label for="" class="col-sm-3 control-label">Alamat</label>
	<div class="col-sm-9"><input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" value="<?php echo set_value('alamat',$d->ALAMAT_PENGURUS); ?>" /></div>
</div>

<div class="form-group">
	<label for="" class="col-sm-3 control-label">No. HP</label>
	<div class="col-sm-9"><input type="text" name="hp" id="hp" placeholder="No HP" class="form-control" value="<?php echo set_value('hp',$d->TELP_PENGURUS); ?>" /></div>
</div>
<?php }else{ ?>
<div class="form-group">
	<label for="" class="col-sm-3 control-label">Nama Pengambil Berkas</label>
	<div class="col-sm-9"><input type="text" name="nama" id="nama" placeholder="Nama Pengambil Berkas" class="form-control" value="<?php echo set_value('nama'); ?>" /></div>
</div>

<div class="form-group">
	<label for="" class="col-sm-3 control-label">Alamat</label>
	<div class="col-sm-9"><input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" value="<?php echo set_value('alamat'); ?>" /></div>
</div>

<div class="form-group">
	<label for="" class="col-sm-3 control-label">No. HP</label>
	<div class="col-sm-9"><input type="text" name="hp" id="hp" placeholder="No HP" class="form-control" value="<?php echo set_value('hp'); ?>" /></div>
</div>
<?php } ?>