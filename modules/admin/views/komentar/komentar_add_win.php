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
											   
							<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-6"><?php echo form_input('Name',$userfullname,'class="form-control"'); ?></div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Isi Komentar</label>
								<div class="col-sm-10"><textarea name="Message" id="summernote"><?php echo $mention; ?></textarea></div>
							</div> 
							
			
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Alamat</label>
								<div class="col-sm-10"><?php echo form_input('Address',set_value('Address','-'),'class="form-control"'); ?></div>
							</div>   											
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Phone</label>
								<div class="col-sm-10"><?php echo form_input('Phone',set_value('Phone','-'),'class="form-control"'); ?></div>
							</div>   
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10"><?php echo form_input('Email',set_value('Email','-'),'class="form-control"'); ?></div>
							</div>   
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">URL</label>
								<div class="col-sm-10"><?php echo form_input('URL',set_value('URL','-'),'class="form-control"'); ?></div>
							</div>   
							
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<input type="submit" name="submit" class="btn btn-blue" value="Simpan & Tutup" />
									<input class="btn btn-blue" type="button" name="close" value="Tutup" onclick="window.close()"/>
								</div>							
							</div>
							
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
