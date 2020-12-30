<!DOCTYPE html>
<html lang="en">
<head>
	<!--<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/dataTables/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/dataTables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">-->
    <?php $this->load->view('header'); ?>
	<style>
	
	table, th, td {
	   /*border: 1px solid #e8e8e8;*/
	   padding: 10px 30px;
	}
	
	table tr:nth-child(odd){
	  background:#e6e6e6; /* Baris ganjil Dihitung dari Header*/
	}
	table tr:nth-child(even){
	  background:#f2f2f2; /* Baris Genap */
	}
	
	::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
		font-style:italic;
		opacity: 1; /* Firefox */
	}

	:-ms-input-placeholder { /* Internet Explorer 10-11 */
		font-style:italic;
	}

	::-ms-input-placeholder { /* Microsoft Edge */
		font-style:italic;
	}
	</style>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
		<section class="full-width-poppy-promo">
			<picture class="full-width-poppy-promo__img">
				<?php echo imgpage($image_raw.''.$image_ext,'form',config('main_site')); ?>
			</picture>
			<div class="full-width-poppy-promo__content">
				<div class="full-width-poppy-promo__headline">
					<div class="full-width-poppy-promo__logo"></div>
					<div class="full-width-poppy-promo__text">
						<h1 class="full-width-poppy-promo__heading"><?php echo ($image_raw != '' ? '' : $title); ?></h1>
					</div>
				</div>
				<div class="full-width-poppy-promo__explainer">
					<h4 class="full-width-poppy-promo__secondary-heading"></h2>
				</div>
			</div>

		</section>
		
		<?php if($data->num_rows() > 0){ $d = $data->row();?>
		<div class="wrapper">
			<div class="col-12">
				<section class="standardArticle" style="margin-top:20px;text-align:justify">
					<div class="articleHeaderContent">
						<h1 class="articleTitle"><?php echo $d->Nm_Form; ?></h1>
						<span class="articleAuth"><?php echo lang('Dilihat').': '.number($d->Hits).' '.lang('kali'); ?></span>
					</div>
					<div style="width:100%;border-bottom: 2px solid #e8e8e8;padding: 5px 0;"></div>
					<p class="copy"><?php echo $d->Deskripsi; ?></p>
				</section>
			</div>
		</div>
			
			
		<div class="wrapper col-12 wp" style="border:1px solid #e8e8e8">
			
			<div id="result"></div>
			<section id="content" class="mainWidget latestFeatures">
				<?php if($data->num_rows() > 0) {?>
				
					<?php echo form_open_multipart('',array('id'=>'form', 'class' => 'form-horizontal', 'role' => 'form')); ?>
						<div class="block-fluid">                        
							<?php 
							$w = '<table style="width:100%;">';
							if($data_kolom->num_rows() > 0){
								
								$w .= form_hidden('ID_Row','0','id="ID_Row" class="form-control"');
								
								foreach($data_kolom->result() as $l){
									$w .= '<tr>';
									$w .= '<td width="60%">';
									$w .= '
									<div class="form-group">
										'.$l->Nm_Col.'
										<div class="searchInputContainer" role="search" >'.form_hidden('col[]',set_value('col[]',$l->ID_Col)).create_form($ID_Form,$l->ID_Col).'</div>
									</div> ';
									$w .= '</td>';
									$w .= '<td>';
									$w .= '<i>'.$l->Keterangan.'</i>';
									$w .= '</td>';
									$w .= '</tr>';
									
								}
								$w .= '
								<tr>
								<td colspan="2">
								<div class="form-group">
									<div class="col-sm-6" style="width:50%">
										<input type="hidden" name="method" value="save" />
										<input type="hidden" name="ID_Form" value="'.$ID_Form.'" />
										<!--<input type="submit" name="save" value="Save" class="btn reset" role="button" tabindex="0"/>-->
										<div class="btn reset" role="button" tabindex="0" id="btn-save" onclick="simpan();">'.lang('Submit').'</div>
										<div style="display:none;"><input type="reset" id="btn-reset" name="reset" role="button" tabindex="0" class="btn reset" value="'.lang('Reset').'" /></div>
									</div>
								</div> 
								</td>
								</tr>';
							
							}
							$w .='</table>';
							echo $w;
							?>
						</div>
						</form>
				<?php }else{ ?>
				<div class="center" style="text-align:center;"><?php echo lang('Oops, tidak ada data !!!'); ?></div>
				<?php } ?>
			</section>
		</div>
		<br/>
		<br/>
		<br/>
		<?php } ?>
	</main>
	<!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/dataTables/jquery-1.12.4.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/dataTables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/dataTables/dataTables.bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable({"iDisplayLength": 50});
	} );
	</script>-->
	
	<?php $this->load->view('footer'); ?>
	<script>
	function simpan(){
		var form_data = $("#form").serialize();
		
		var divbtn = $("#btn-save").clone();
		$("#btn-save").html("Sedang menyimpan data.....");	
		$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule($class_page.'/save')); ?>/?time=" + new Date().getTime(),
				data: form_data,
				success: function(msg){
					$("#btn-reset").click();
					var content = $("#content").clone();
					$("#btn-save").html("Simpan berhasil !");	
					$(".wp").css('background-color', '#ccffcc');
					$("#content").html("Data berhasil disimpan");
					 setTimeout(function() {
						$(".wp").css('background-color', '#ffffff');
						$("#content").html(content);	
						$("#btn-save").html("Submit");
					}, 5000);
				}
		});
		
	};
	
	$(".form-control").keyup(function(event) {
		if (event.keyCode === 13) {
			simpan();
		}
	});

	</script>
</body>
</html>