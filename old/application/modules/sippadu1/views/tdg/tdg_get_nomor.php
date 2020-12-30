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
		<?php if($this->session->flashdata('WindowRedirect')): ?>
		<script type="text/javascript">
			window.opener.location.href = "<?php echo $url.'/'.$this->session->flashdata('IDRedirect'); ?>";
			self.close();
		</script>
		<?php endif; ?>
		<script type="text/javascript">
			function pilih()
			{
				var a1 = document.getElementById('no_sk');
				var a2 = window.opener.document.getElementById('no_sk');
				a2.value = a1.value;
				var b1 = document.getElementById('id_sk');
				var b2 = window.opener.document.getElementById('no_urut_sk');
				b2.value = b1.value;
				window.close();
			}
		</script>
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
											   
							<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nomor SK</label>
								<div class="col-sm-10"><input type="text" name="no_sk" id="no_sk" placeholder="Nomor SK" class="form-control" value="<?php echo set_value('',$no_sk); ?>" /></div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">ID SK</label>
								<div class="col-sm-10"><input type="text" name="id_sk" id="id_sk" placeholder="Nomor SK" class="form-control" value="<?php echo set_value('',$id_sk); ?>" /></div>
							</div>

							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<input type="button" name="saveclose" class="btn btn-blue" onclick="pilih();" value="Ambil Nomor" />
									<input type="submit" name="submit" class="btn btn-blue" value="Buat Nomor Baru" />
									<input class="btn btn-blue" type="button" name="close" value="Tutup" onclick="window.close()"/>
								</div>							
							</div>
							<input type="hidden" name="jenis_pelanggan" id="jenis_pelanggan" value="01" />
							
							
							<?php //} ?>
					</form>
				</div>
			<!-- /tile -->

		
		<!-- /col -->

	<!-- /row -->
			</section>
        </div>
        <!--/ Application Content -->

		<?php $this->load->view('footer_2'); ?>
        <!--/ Page Specific Scripts -->

    </body>
</html>
