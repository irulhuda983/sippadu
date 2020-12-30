<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
		<?php if($this->session->flashdata('WindowReload')): ?>
		<script type="text/javascript">
			window.opener.location.reload();
			self.close();
		</script>
		<?php endif; ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php //$this->load->view('top'); ?>
            <?php //$this->load->view('menu'); ?>
			
                        <!-- col -->
                        

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
					<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
							<?php $kdpengambilan = 0; if($data->num_rows() > 0){ $d = $data->row(); $kdpengambilan = $d->KD_PENGAMBIL;?>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Pengambil Berkas</label>
								<div class="col-sm-4"><?php echo form_dropdown('op_pengambil',array('1'=>'Pengurus','2'=>'Yang Bersangkutan','3'=>'Pihak Ketiga'),set_value('op_pengambil',$kdpengambilan),'id="op_pengambil" class="form-control"'); ?></div>
							</div>
							
							<span id="dsp_pengambil">
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Nama Pengambil Berkas</label>
								<div class="col-sm-9"><input type="text" name="nama" id="nama" placeholder="Nama Pengambil Berkas" class="form-control" value="<?php echo set_value('nama',$d->NM_PENGAMBIL); ?>" /></div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9"><input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" value="<?php echo set_value('alamat',$d->ALAMAT_PENGAMBIL); ?>" /></div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">No. HP</label>
								<div class="col-sm-9"><input type="text" name="hp" id="hp" placeholder="No HP" class="form-control" value="<?php echo set_value('hp',$d->TELP_PENGAMBIL); ?>" /></div>
							</div>
							</span>
							
							<div class="form-group">
								<label for="" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<input type="submit" name="submit" class="btn btn-blue" value="Simpan" />
									<input class="btn btn-blue" type="button" name="close" value="Tutup" onclick="window.close()"/>
								</div>							
							</div>
							
							
							<?php } ?>
					</form>
				</div>
			<!-- /tile -->
		<!-- /col -->

		<!-- /row -->
			</section>
        </div>
        <!--/ Application Content -->

		<?php $this->load->view('footer_win_f'); ?>
		<script>
		$("#op_pengambil").change(function(){
			$.ajax({
					type: "POST",
					url : "<?php echo site_url(fmodule($module_izin.'/serah_ajax')); ?>/?time=" + new Date().getTime(), 
					data: {ID_Izin:"<?php echo $ID_Izin; ?>",Kd_Pengambil:$(this).val()},
					success: function(msg){
						$('#dsp_pengambil').html(msg);
					}
			});
		});
		<?php if($kdpengambilan > 0){ ?>
		$("#op_pengambil").val("<?php echo $kdpengambilan;?>").trigger("change");
		<?php }else{ ?>
		$("#op_pengambil").val("1").trigger("change");
		<?php } ?>
		</script>
        <!--/ Page Specific Scripts -->

    </body>
</html>
