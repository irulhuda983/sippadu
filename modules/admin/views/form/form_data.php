<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php $this->load->view('head'); ?>
    </head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<?php $this->load->view('top'); ?>
            <?php $this->load->view('menu'); ?>
            <section id="content">
                <div class="page page-dashboard">
                    <div class="pageheader">
						<?php $this->load->view('breadcrumb'); ?>
                    </div>

                    <!-- cards row -->
                    <div class="row">
						
						<!-- col -->
                        <div class="col-md-12">
							

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                </div>
                                <!-- /tile header -->

                                <!-- tile widget -->
								<?php echo alert(); ?>
								<?php //echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-8">
												<input class="btn btn-blue" type="button" id="add_form" onclick="add_form();" value="Tambah" />
												<input class="btn btn-blue" type="button" id="close_form" onclick="close_form();" value="Tutup" style="display:none;" />
												<!--<input class="btn btn-blue add_field_button" type="button" id="" value="Tambah Baris" />
												<input class="btn btn-greensea" type="button" id="save" value="Simpan">-->
												
											</div>

											<div class="col-sm-4">
												
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->
									
									<div id="div_input"></div>
									<div id="result"></div>
									
									<!-- tile body -->
									<div class="tile-body p-0">

										<div id="tb_result" class="table-responsive">
											<!--<table  class="table table-hover" id="" style="">
												<thead>
													<tr class="active">
														<?php 
														$h = '';
														$col = $data_kolom->num_rows();
														$y = 1;
														if($col > 0){
															foreach($data_kolom->result() as $k){
																$h .= '<th width="">'.($k->Nm_Col != '' ? $k->Nm_Col : 'Kolom '.$y).'<input type="hidden" name="col[]" value="'.$k->ID_Col.'" /></th>';
																++$y;
															}
															$h .= '<th width="50px">Hapus</th>';
															
														}
														echo $h;
														?>
													</tr>
												</thead>
												<tbody class="input_fields_wrap">
													<?php
														$m = 0;
														if($data_row->num_rows() > 0){
															$j = '';
															foreach($data_row->result() as $r){
																$j .= '<tr id="tr_'.$m.'">';
																$i = 0;
																if($data_col->num_rows() > 0){
																	foreach($data_col->result() as $c){
																		$j .= '<td>'.get_form_val($r->ID_Row,$c->ID_Col).'</td>';
																		++$i;
																	}
																	$j .= '<td><input type="button" id="remove_'.$m.'" class="btn btn-red btn-xs" onclick="remove(\''.$m.'\');" value="Hapus" /><input type="button" id="undo_'.$m.'" class="btn btn-greensea btn-xs" onclick="undo(\''.$m.'\');" value="Undo" style="display:none;" /></td>';
																}
																++$m;
																$j .= '</tr>';
															}
															echo $j;
														}
													?>
												</tbody>
											</table>-->
										</div>


									</div>
									<!-- /tile body -->
								<!--</form>-->

                                <!-- tile footer -->
								
								<?php //echo $pagination; ?>
                                <!-- /tile footer -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>
            </section>
        </div>
        <!--/ Application Content -->

		<?php $this->load->view('footer_1'); ?>
		<?php 
			$jh = '<tr>';
			if($data_col->num_rows() > 0){
				foreach($data_col->result() as $c){
					$jh .= '<td><input type="text" class="txt-IDX" name="col_'.$c->ID_Col.'[]" value="" /></td>';
				}
				$jh .= '<td><input type="button" class="btn-IDX btn btn-red" value="Hapus" /></td>';
				
			}
			$jh .= '</tr>';
			
			$x = 1;
			if($data_row->num_rows() > 0){
				$x = 2;
			}
		?>
			
		<script type="text/javascript">
			function add_form(){
				$('#form-add').removeClass('hidden');
				$('#add_form').hide();
				$('#close_form').show();
			}
			
			function close_form(e){
				$('#form-add').addClass('hidden');
				$('#add_form').show();
				$('#close_form').hide();
			}
			
			function remove(e){
				var jawab = confirm('Apakah anda yakin?');
				var add = $("#add_form").clone();
				var close = $("#close_form").clone();
				$("#add_form").val("Sedang menghapus data.....");
				$("#close_form").val("Sedang menghapus data.....");
				if(jawab){
					$.ajax({
						type: "POST",
						url : "<?php echo site_url(fmodule($class_page.'/save/')); ?>?time=" + new Date().getTime(),
						data: {ID_Row:e,method:'delete'},
						success: function(msg){
							//$('#result').html(msg);
							reload();
							$("#add_form").replaceWith(add);
							$("#close_form").replaceWith(close);
							/* setTimeout(function() {
							$('#result').html("");
							}, 3000); */
						}
					});
				}
			}
			
			function edit(e){
				var add = $("#add_form").clone();
				var close = $("#close_form").clone();
				$("#add_form").val("Sedang memuat data.....");
				$("#close_form").val("Sedang memuat data.....");
				$.ajax({
					type: "POST",
					url : "<?php echo site_url(fmodule($class_page.'/edit_js/'.$ID_Form.'/')); ?>" + e + "/?time=" + new Date().getTime(),
					data: {method:'edit'},
					success: function(msg){
						$('#div_input').html(msg);
						$("#add_form").replaceWith(add);
						$("#close_form").replaceWith(close);
						$("#add_form").click();
						$('.summernote').summernote({
							height: 200, 
							width: "90%",  
							minHeight: null, 
							maxHeight: null, 
							dialogsInBody: true
						});
					}
				});
			}
			
			
			function input(){
				$.ajax({
					url : "<?php echo site_url(fmodule($class_page.'/input_js/'.$ID_Form)); ?>/?time=" + new Date().getTime(),
					success: function(msg){
						$('#div_input').html(msg);
						$('.summernote').summernote({
							height: 200, 
							width: "90%",  
							minHeight: null, 
							maxHeight: null, 
							dialogsInBody: true
						});
					}
				});
			}
			
			function input2(){
				$.ajax({
					url : "<?php echo site_url(fmodule($class_page.'/input_js/'.$ID_Form)); ?>/?time=" + new Date().getTime(),
					success: function(msg){
						$('#div_input').html(msg);
						$('#form-add').removeClass('hidden');
						$('#add_form').hide();
						$('#close_form').show();
					}
				});
				
			}
			
			function reload(){
				$.ajax({
					url : "<?php echo site_url(fmodule($class_page.'/data_js/'.$ID_Form)); ?>/?time=" + new Date().getTime(),
					success: function(msg){
						$('#tb_result').html(msg);
					}
				});
				//$("#tb_result").load("<?php echo site_url(fmodule($class_page.'/data_js/'.$ID_Form)); ?>");
			}
			
			
			input();
			reload();
			setInterval(reload, 30000); 
		
		</script>

    </body>
</html>
