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
			function pilih(item)
			{
				var a_self = item.getAttribute('attr-id-config');
				var a_opener = window.opener.document.getElementById('ID_Config');
				a_opener.value = a_self;
				var b_self = item.getAttribute('attr-jn-item');
				var b_opener = window.opener.document.getElementById('Jn_Item');
				b_opener.value = b_self;
				var c_self = item.getAttribute('attr-item');
				var c_opener = window.opener.document.getElementById('Item');
				c_opener.value = c_self;
				var d_self = item.getAttribute('attr-nm-item');
				var d_opener = window.opener.document.getElementById('Nm_Item');
				d_opener.value = d_self;
				var e_self = item.getAttribute('attr-class');
				var e_opener = window.opener.document.getElementById('Class_Menu');
				e_opener.value = e_self;
				e_opener.setAttribute('readonly',true);
				self.close();
				
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
				<div class="tile-widget">

					<div class="row">
						
						<div class="col-sm-8">
							<div class="btn-group mb-10">
								<input class="btn btn-blue" type="button" value="Kembali" onclick="window.location.href='<?php echo site_url(fmodule('menu/get_item/'.$ID_Apps)); ?>'"/>
								<input class="btn" type="button" name="close" value="Tutup" onclick="window.close()"/>
							</div>
						</div>
						
					</div>

				</div>
				
				<div class="tile-body">
					<?php echo alert(); ?> 
					<?php echo form_open('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
											   
						<div class="tile-body p-0">
							<div class="table-responsive">
								<table  class="table table-hover" id="tSortable">
									<thead>
										<tr class="active">           
											<th width="">Nama Item</th>
											<?php if(substr_count($Format,'/open/')){ ?>
											<th width="">Kategori Item</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
											if($data->num_rows() > 0){
												foreach($data->result() as $d){
													$kategori = (substr_count($Format,'/open/') ? '<td>'.get_item_kategori($d->Field_ID,$Class).'</td>' : '');
													echo '
													<tr>                     
														<td><a href="javascript:void(0);" id="item-'.$d->Field_ID.'" attr-id-config="'.$ID_Config.'" attr-jn-item="'.$Nm_Config.'" attr-item="'.$d->Field_ID.'" attr-nm-item="'.$d->Field_Name.'" attr-class="'.$Class.'" onclick="pilih(this);">'.$d->Field_Name.'</a></td>
														'.$kategori.'
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
