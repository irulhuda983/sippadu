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
									<?php echo form_open_multipart('',array('class' => 'form-horizontal', 'role' => 'form')); ?>
										<div class="block-fluid">                        
											<?php //if($data->num_rows() > 0){ $d = $data->row(); ?>
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Domain</label>
												<div class="col-sm-10"><?php echo form_input('Domain',set_value('Domain'),'class="form-control" placeholder="namadomain.com"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Title</label>
												<div class="col-sm-10"><?php echo form_input('Title',set_value('Title'),'class="form-control" placeholder="Nama Judul Website"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Short Title</label>
												<div class="col-sm-10"><?php echo form_input('Short_Title',set_value('Short_Title'),'class="form-control" placeholder="Nama Pendek Website"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Subtitle</label>
												<div class="col-sm-10"><?php echo form_input('Subtitle',set_value('Subtitle'),'class="form-control"  placeholder="Sub Title"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Slogan</label>
												<div class="col-sm-10"><?php echo form_input('Slogan',set_value('Slogan'),'class="form-control"  placeholder="Slogan"'); ?></div>
											</div>											

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
											   <div class="col-sm-10"><textarea name="Description" class="summernote"></textarea></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Keyword</label>
												<div class="col-sm-10"><?php echo form_input('Keyword',set_value('Keyword'),'class="form-control"  placeholder="domain,website,keyword"'); ?></div>
											</div>	
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Favicon</label>
												<div class="col-sm-5">
													<input type="file" name="favicon" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Logo</label>
												<div class="col-sm-5">
													<input type="file" name="logo" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
											</div>
  											

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Author</label>
												<div class="col-sm-10"><?php echo form_input('Author',set_value('Author'),'class="form-control" placeholder="Nama Pemilik"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email Author</label>
												<div class="col-sm-10"><?php echo form_input('EmailAuthor',set_value('EmailAuthor'),'class="form-control" placeholder="email@namadomain.com"'); ?></div>
											</div>	
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email System Name</label>
												<div class="col-sm-10"><?php echo form_input('Email_Sys_Name',set_value('Email_Sys_Name','noreply'),'class="form-control" placeholder="Nama Email System"'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email System Address</label>
												<div class="col-sm-10"><?php echo form_input('Email_Sys_Address',set_value('Email_Sys_Address','noreply@domain.com'),'class="form-control" placeholder="Alamat Email System"'); ?></div>
											</div>	
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Warna Depan</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_fcolor',$op_color,set_value('op_fcolor'),'id="op_fcolor" class="form-control chosen-select"'); ?></div>
												<span id="fcolor"><div class="col-sm-2" style="height:30px;">&nbsp;</div></span>
											</div>		
											<!--<div class="form-group">
												<label for="" class="col-sm-2 control-label">Warna Belakang</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_bcolor',$op_color,set_value('op_bcolor'),'id="op_bcolor" class="form-control chosen-select"'); ?></div>
												<div class="col-sm-1"></div>
												<span id="bcolor"><div class="col-sm-2" style="height:30px;background-color:red;">&nbsp;</div></span>
											</div>	-->
												
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Google Code</label>
												<div class="col-sm-10"><?php echo form_input('GoogleCode',set_value('GoogleCode'),'class="form-control"'); ?></div>
											</div>	
												
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Copyright Year</label>
												<div class="col-sm-10"><?php echo form_input('Copyright',set_value('Copyright'),'class="form-control" placeholder="2018"'); ?></div>
											</div>	
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Default Apps</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_default',$op_apps_active,set_value('op_default'),'id="op_default" class="form-control chosen-select"'); ?></div>
											</div>

											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label"></label>
												<div class="col-sm-6"><input type="submit" name="submit" class="btn" value="Simpan" /></div>							
											</div>
											<?php //} ?>
										</div>
									</form>
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
		<script>
		$("#op_fcolor").change(function(){
			$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('superadmin/apps_color/')); ?>?time=" + new Date().getTime(),
				data: {class_color:$(this).val()},
				success: function(msg){
					$('#fcolor').html(msg);
				}
			});
		});
		</script>

    </body>
</html>
