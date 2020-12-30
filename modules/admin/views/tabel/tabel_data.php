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
								<?php echo form_open('',array('name' => 'form', 'id' => 'form')); ?>
									<div class="tile-widget">

										<div class="row">
											
											<div class="col-sm-8">
												<input class="btn btn-blue add_field_button" type="button" id="" value="Tambah Baris" />
												<input class="btn btn-greensea" type="button" id="save" value="Simpan">
												
											</div>

											<div class="col-sm-4">
												
											</div>
											
											
										</div>

									</div>
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="">
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
															$h .= '<th width="">Hapus</th>';
															
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
																$j .= '<input type="hidden" name="ID_Row[]" value="'.$r->ID_Row.'" /><input type="hidden" id="marker_'.$m.'" name="marker_'.$m.'" value="1" /><input type="hidden" name="exist_'.$m.'" value="1" />';
																$i = 0;
																if($data_col->num_rows() > 0){
																	foreach($data_col->result() as $c){
																		$j .= '<td><input type="text" class="form-control class_'.$m.'" name="col_val_'.$m.'_'.$i.'" value="'.get_tabel_val($r->ID_Row,$c->ID_Col).'" /></td>';
																		++$i;
																	}
																	$j .= '<td><input type="button" id="remove_'.$m.'" class="btn btn-red" onclick="remove(\''.$m.'\');" value="Hapus" /><input type="button" id="undo_'.$m.'" class="btn btn-greensea" onclick="undo(\''.$m.'\');" value="Undo" style="display:none;" /></td>';
																}
																++$m;
																$j .= '</tr>';
															}
															echo $j;
														}
													?>
												</tbody>
											</table>
										</div>


									</div>
									<!-- /tile body -->
								</form>

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
			
			$x = 1;
			if($data_row->num_rows() > 0){
				$x = 2;
			}
		?>
			
		<script type="text/javascript">
			window.onload=function(){
				
				var max_fields      = 50;
				var wrapper         = $(".input_fields_wrap"); 
				var add_button      = $(".add_field_button");
				var remove_button   = $(".remove_field_button");
				var x				= '<?php echo $x; ?>';
				
				$(add_button).click(function(e){
					e.preventDefault();
					var id = (wrapper[0].childNodes.length)- Number(x);
					if(id <= max_fields){
						var i;
						var col = '<?php echo $col; ?>';
						var txt = '<tr id="tr_'+id+'">';
						txt += '<input type="hidden" name="ID_Row[]" value="'+id+'" /><input type="hidden" id="marker_'+id+'" name="marker_'+id+'" value="1" /><input type="hidden" name="exist_'+id+'" value="0" />';
						for(i=0;i < col;i++){
							txt += '<td><input type="hidden" name="col_id_'+id+'_'+i+'" class="class_'+id+'" value="0" /><input type="text" class="class_'+id+' form-control" name="col_val_'+id+'_'+i+'" value="" /></td>';
						}
						txt += '<td><input type="button" id="remove_'+ id +'" class="btn btn-red" onclick="remove('+id+');" value="Hapus" /><input type="button" id="undo_'+ id +'" class="btn btn-greensea" onclick="undo('+id+');" value="Undo" style="display:none;"/></td>';
						txt += '</tr>';
						$(wrapper).append(txt);
					}
				});
				

			}
			
			function remove(e){
				$('#marker_' + e).val('0');
				/* $('#no_' + e).attr('readonly', true);
				$('#val_' + e).attr('disabled',true); */
				$('.class_' + e).attr('disabled',true);
				$('#tr_'+ e).addClass('danger');
				$('#remove_' + e).hide();
				$('#undo_' + e).show();
				return false;
			}
			
			function undo(e){
				$('#marker_' + e).val('1');
				/* $('#no_' + e).attr('readonly', false);
				$('#val_' + e).attr('disabled',false);
				$('#sort_' + e).attr('disabled',false); */
				$('.class_' + e).attr('disabled',false);
				$('#tr_'+ e).removeClass('danger');
				$('#remove_' + e).show();
				$('#undo_' + e).hide();
				return false;
			}
		
		</script>

    </body>
</html>
