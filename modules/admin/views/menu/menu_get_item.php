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
			<section class="tile">

				<div class="tile-header dvd dvd-btm">
					<h1 class="custom-font"><?php echo $title; ?></h1>
				</div>
				<div class="tile-body">
					<?php echo alert(); ?> 
					<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
						<div class="tile-widget">

							<div class="row">
								
								<div class="col-sm-8">
									<div class="btn-group mb-10">
										<input class="btn" type="button" name="close" value="Tutup" onclick="window.close()"/>
									</div>
								</div>
								
							</div>

						</div>
									
						<div class="tile-body p-0">
							<div class="table-responsive">
								<table  class="table table-hover" id="tSortable">
									<thead>
										<tr class="active">            
											<th width="">Jenis Item</th>
										</tr>
									</thead>
									<tbody>
										<?php
											if($data->num_rows() > 0){
												foreach($data->result() as $d){
													echo '
													<tr>                     
														<td>'.anchor(site_url(fmodule('menu/get_item2/'.$ID_Apps.'/'.$d->ID_Config)),$d->Nm_Config).'</td>
													</tr>  '; 
												}
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</section>
        </div>
		<?php $this->load->view('footer_1'); ?>

    </body>
</html>
