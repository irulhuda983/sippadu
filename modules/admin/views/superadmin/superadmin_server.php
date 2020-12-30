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
									<!-- tile body -->
									<div class="tile-body p-0">

										<div class="table-responsive">
											<table  class="table table-hover" id="" style="">
												<thead>
													<tr class="active">
														<th width="">Key</th>
														<th width="">Value</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$indicesServer = array('PHP_SELF', 
													'argv', 
													'argc', 
													'GATEWAY_INTERFACE', 
													'SERVER_ADDR', 
													'SERVER_NAME', 
													'SERVER_SOFTWARE', 
													'SERVER_PROTOCOL', 
													'REQUEST_METHOD', 
													'REQUEST_TIME', 
													'REQUEST_TIME_FLOAT', 
													'QUERY_STRING', 
													'DOCUMENT_ROOT', 
													'HTTP_ACCEPT', 
													'HTTP_ACCEPT_CHARSET', 
													'HTTP_ACCEPT_ENCODING', 
													'HTTP_ACCEPT_LANGUAGE', 
													'HTTP_CONNECTION', 
													'HTTP_HOST', 
													'HTTP_REFERER', 
													'HTTP_USER_AGENT', 
													'HTTPS', 
													'REMOTE_ADDR', 
													'REMOTE_HOST', 
													'REMOTE_PORT', 
													'REMOTE_USER', 
													'REDIRECT_REMOTE_USER', 
													'SCRIPT_FILENAME', 
													'SERVER_ADMIN', 
													'SERVER_PORT', 
													'SERVER_SIGNATURE', 
													'PATH_TRANSLATED', 
													'SCRIPT_NAME', 
													'REQUEST_URI', 
													'PHP_AUTH_DIGEST', 
													'PHP_AUTH_USER', 
													'PHP_AUTH_PW', 
													'AUTH_TYPE', 
													'PATH_INFO', 
													'ORIG_PATH_INFO') ; 
 
													foreach ($indicesServer as $arg) { 
														if (isset($_SERVER[$arg])) { 
															echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
														} 
														else { 
															echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
														} 
													} 

													$domain = $_SERVER['SERVER_NAME'];
													$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
													$tmp = explode('.', $domain); // split into parts
													$subdomain = current($tmp);
													$result = parse_url($actual_link);
													$prs = $result['scheme']."://".$result['host'];
													echo '<tr><td>SUBDOMAIN</td><td>'.$subdomain.'</td></tr>' ; 
													echo '<tr><td>MAINDOMAIN</td><td>'.$prs.'</td></tr>' ;  
													echo '<tr><td>ENVIRONMENT</td><td>'.ENVIRONMENT.'</td></tr>' ; 
													echo '<tr><td>CURRENT URL</td><td>'.current_url().'</td></tr>' ; 
													echo '<tr><td>ANCHOR</td><td>'.anchor('test','Anchor').'</td></tr>' ; 
													echo '<tr><td>SITE URL 1</td><td>'.apps_url(1).'</td></tr>' ; 
													echo '<tr><td>SITE URL 2</td><td>'.apps_url(2).'</td></tr>' ; 
													echo '<tr><td>SITE URL 3</td><td>'.apps_url(3).'</td></tr>' ; 
													echo '<tr><td>FRAMEWORK VERSION</td><td>'.CI_VERSION.'</td></tr>' ; 
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

    </body>
</html>
