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
											<?php 
											$Title = '';
											$Subtitle = '';
											$Slogan = '';
											$Description = '';
											$Keyword = '';
											$Logo_Raw = '';
											$Logo_Ext = '';
											$Image_Raw = '';
											$Image_Ext = '';
											$Author = '';
											$EmailAuthor = '';
											$FColor = '';
											$BColor = '';
											$GoogleCode = '';
											$Copyright = '';
											$Status = 0;
											if($data->num_rows() > 0){ 
												$d = $data->row(); 
												$Title = $d->Title;
												$Subtitle = $d->Sub_Title;
												$Slogan = $d->Slogan;
												$Description = $d->Description;
												$Keyword = $d->Keyword;
												$Logo_Raw = $d->Logo_Raw;
												$Logo_Ext = $d->Logo_Ext;
												$Image_Raw = $d->Image_Raw;
												$Image_Ext = $d->Image_Ext;
												$Author = $d->Author;
												$EmailAuthor = $d->Email_Author;
												$FColor = $d->FColor;
												$BColor = $d->BColor;
												$GoogleCode = $d->Google_Code;
												$Copyright = $d->Copyright_Year;
												$Status = $d->Status;
											}
											?>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Domain</label>
												<div class="col-sm-10"><?php echo form_input('Domain',set_value('Domain',$domain),'class="form-control" readonly'); ?></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Status Konfigurasi</label>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Status','1',(set_value('Status',$Status)=='1' ? TRUE : FALSE)).'<i></i> Aktif '; ?></label></div>
												<div class="col-sm-2"><label class="checkbox checkbox-custom-alt"><?php echo form_radio('Status','0',(set_value('Status',$Status)=='0' ? TRUE : FALSE)).'<i></i> Non-Aktif '; ?></label></div>
											</div>
											
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Title</label>
												<div class="col-sm-10"><?php echo form_input('Title',set_value('Title',$Title),'class="form-control" placeholder="Nama Judul Website"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Subtitle</label>
												<div class="col-sm-10"><?php echo form_input('Subtitle',set_value('Subtitle',$Subtitle),'class="form-control"  placeholder="Sub Title"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Slogan</label>
												<div class="col-sm-10"><?php echo form_input('Slogan',set_value('Slogan',$Slogan),'class="form-control"  placeholder="Slogan"'); ?></div>
											</div>											

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Deskripsi</label>
											   <div class="col-sm-10"><textarea name="Description" class="summernote"><?php echo set_value('Description',$Description); ?></textarea></div>
											</div> 
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Keyword</label>
												<div class="col-sm-10"><?php echo form_input('Keyword',set_value('Keyword',$Keyword),'class="form-control"  placeholder="domain,website,keyword"'); ?></div>
											</div>	
											
											
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-5">
													<?php echo imgsrc($Logo_Raw.'_thumb'.$Logo_Ext,'logo',config('main_site')); ?>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Logo</label>
												<div class="col-sm-5">
													<input type="file" name="logo" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
												<div class="col-sm-2">
													<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_checkbox('hapus_logo',1,''); ?><i></i> Hapus Logo</label>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-5">
													<?php echo imgsrc($Image_Raw.'_thumb'.$Image_Ext,'setting',config('main_site')); ?>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Gambar</label>
												<div class="col-sm-5">
													<input type="file" name="userfile" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
												</div>
												<div class="col-sm-2">
													<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><?php echo form_checkbox('hapus_image',1,''); ?><i></i> Hapus Gambar</label>
												</div>
											</div>
  											
  											

											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Author</label>
												<div class="col-sm-10"><?php echo form_input('Author',set_value('Author',$Author),'class="form-control" placeholder="Nama Pemilik"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Email Author</label>
												<div class="col-sm-10"><?php echo form_input('EmailAuthor',set_value('EmailAuthor',$EmailAuthor),'class="form-control" placeholder="email@namadomain.com"'); ?></div>
											</div>	
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Warna Depan</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_fcolor',$op_color,set_value('op_fcolor',$FColor),'id="op_fcolor" class="form-control chosen-select"'); ?></div>
											</div>		
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Warna Belakang</label>
												<div class="col-sm-5"><?php echo form_dropdown('op_bcolor',$op_color,set_value('op_bcolor',$BColor),'id="op_bcolor" class="form-control chosen-select"'); ?></div>
											</div>	
												
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Google Code</label>
												<div class="col-sm-10"><?php echo form_input('GoogleCode',set_value('GoogleCode',$GoogleCode),'class="form-control"'); ?></div>
											</div>	
												
											<div class="form-group">
												<label for="" class="col-sm-2 control-label">Copyright Year</label>
												<div class="col-sm-10"><?php echo form_input('Copyright',set_value('Copyright',$Copyright),'class="form-control" placeholder="2018"'); ?></div>
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

    </body>
</html>
