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
                <div class="page">
                    <div class="pageheader">
                        <!--<h2><?php echo $title; ?></h2>-->
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

                                <!-- tile body -->
								<?php echo alert(); ?> 
								<?php echo form_open('',array('id'=>'form','name'=>'form')); ?>
								
									<div class="tile-body">
						
										<div class="block-fluid">  
											<div class="form-group">
												<div class="col-sm-4"><?php echo form_dropdown('op_group',$op_group,set_value('op_group',$slc_op_group),'class="chosen-select form-control" style="width:100%"'); ?></div>
												<div class="col-sm-1"><?php echo form_submit('refresh','Refresh','class="btn btn-blue"'); ?></div>
												<div class="col-sm-2"><?php echo form_submit('button','Simpan Hak Akses','id="save_table" class="btn btn-greensea"'); ?></div>
											</div> 
										</div>
										<br/>
										<br/>
										
										<div class="table-responsive">
											<table  class="table table-hover" id="tSortable" style="">
												<thead>
													<tr class="active">                                    
														<th width="10px"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type='checkbox' name='checkall' onclick='checkedAll("form");'><i></i></label></th>
														<th width="">Nama Modul</th>
														<th width="">Nama Group</th>
														<th width="">Nama Apps</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($data_modul->num_rows() > 0){
															foreach($data_modul->result() as $dm){
																echo '
																<tr>                                    
																	<td class="center"><label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">'.form_checkbox('modul[]',$dm->Kd_Modul,(group_modul_akses($slc_op_group,$dm->Kd_Modul) ? TRUE : FALSE)).'<i></i></label></td>
																	<td>'.$dm->Nm_Modul.'</td>	
																	<td>'.$dm->Nm_Group.'</td>	
																	<td>'.$dm->Nm_Apps.'</td>	
																</tr>  '; 
															}
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								<?php echo form_close(); ?>
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

    </body>
</html>
