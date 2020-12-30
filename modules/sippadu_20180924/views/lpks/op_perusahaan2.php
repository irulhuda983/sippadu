<?php $bentuk_perusahaan = 0; if($data->num_rows() > 0){ $d = $data->row(); $bentuk_perusahaan = substr($d->BNTK_PERUSAHAAN,-1); ?>
<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nama Usaha</label>
	<div class="col-sm-6"><?php echo form_input('nama_perusahaan',set_value('nama_perusahaan',$d->NM_PERUSAHAAN),'class="form-control" placeholder="Nama Usaha"'); ?></div>
</div>

<?php }else{ ?>

<div class="form-group">
	<label for="" class="col-sm-2 control-label">Nama Usaha</label>
	<div class="col-sm-6"><input type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Usaha" class="form-control" value="<?php echo set_value('nama_perusahaan','y'); ?>" /></div>
</div>
<?php } ?>


