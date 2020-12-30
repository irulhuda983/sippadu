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
			window.opener.location.href = "<?php echo $url.'/1/'.$this->session->flashdata('IDRedirect'); ?>";
			self.close();
		</script>
		<?php endif; ?>
		<?php if($data): ?>
		<script type="text/javascript">
			window.setTimeout(function(){self.close();}, 500);
			//self.close();
		</script>
		<?php endif; ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<section class="tile">
				<div class="tile-body">
					<?php echo alert(); ?> 
					<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
								
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="submit" name="savenext" class="btn btn-blue" value="Simpan & Lanjutkan" />
								<input type="submit" name="saveclose" class="btn btn-blue" value="Simpan & Tutup" />
								<input class="btn btn-blue" type="button" name="close" value="Tutup" onclick="window.close()"/>
							</div>							
						</div>
							
				</div>
			</section>
        </div>

		<?php $this->load->view('footer_2'); ?>

    </body>
</html>
