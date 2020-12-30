			<div id="controls">
                <aside id="sidebar">
                    <div id="sidebar-wrap">
                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
								<br/>
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <ul id="navigation">
											<li class="<?php echo menuactive('home',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule()); ?>">
													<i class="fa fa-user"></i> <span><?php echo lang('Login'); ?></span>
												</a>
											</li>
											<li class="<?php echo menuactive('daftar',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule()); ?>">
													<i class="fa fa-dashboard"></i> <span><?php echo lang('Pendaftaran Izin'); ?></span>
												</a>
											</li>
											
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </aside>
                
				<?php $this->load->view('chats'); ?>
            </div>
            <!--/ CONTROLS Content -->