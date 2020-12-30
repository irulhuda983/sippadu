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
								
								<div class="tile-body">
									<?php echo alert(); ?> 
									<?php echo form_open('',array('id'=>'frm1','name'=>'frm1')); ?>
					
									<div class="block-fluid">  
										<br/>
										<div class="form-group">
											<div class="col-sm-4"><?php echo form_dropdown('op_user',$op_users,set_value('op_user',$slc_op_users),'class="chosen-select form-control" style="width:100%"'); ?></div>
											<div class="col-sm-4"><?php echo form_submit('refresh','Refresh','class="btn"'); ?></div>
										</div> 
									</div>
									<br/>
									<br/>
									<div class="block-fluid">
										<ul class="list-type caret-right">
										<?php 
										if($data_modul->num_rows() > 0){ 
											foreach($data_modul->result() as $dm){
												echo '<li>'.form_checkbox('modul[]',$dm->Kd_Modul,(cek_modul_akses($slc_op_users,$dm->Kd_Modul) ? TRUE : FALSE)).' '.$dm->Nm_Modul.'</li>';
											}
										} 
										?>
										</ul>                 
									</div>                     
									<div class="block-fluid">	
										<br/>
										<div class="form-group">
											<?php echo form_submit('submit','Simpan Hak Akses','class="btn"'); ?>
										</div> 
										<div class="dr"><span></span></div>
									</div>
									<?php echo form_close(); ?>
								</div>
								
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

		<?php $this->load->view('footer_2'); ?>

    </body>
</html>
