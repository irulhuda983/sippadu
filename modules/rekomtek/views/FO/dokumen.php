<section id="content">
                <div class="page page-dashboard">

                    <!-- cards row -->
                    <div class="row">
						
						<!-- col -->
                        <div class="col-md-12">
							

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><?php echo $title; ?></h1>
                                    <a href="http://localhost:8080/rekomtek.php/frontoffice">Kembali</a>
                                </div>
								<!-- /tile header -->

                                <!-- tile widget -->
								<?php echo alert(); ?>
								<form action="#">
									<!-- /tile widget -->

									<!-- tile body -->
									<div class="tile-body p-2">

										
									<div class="table-responsive">
                                        <table class="tb-info" id="">
                                            <thead>
												<tr>
													<th colspan="3"><h4>Informasi Izin</h4></th>
												</tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="abu">No. Reg Izin</td>
                                                    <td><?= $izin['ID_Reg']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="abu">Nama Usaha</td>
                                                    <td><?= $izin['Nm_Usaha']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="abu">Pemilik Usaha</td>
                                                    <td><?= $izin['Pemilik_Usaha']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="abu">Alamat Usaha</td>
                                                    <td><?= $izin['Alamat_Usaha']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="abu">Jenis Izin</td>
                                                    <td>
                                                        <?php 
                                                        
                                                            if($izin['Jenis_Izin'] == 1){
                                                                echo "<button class='btn btn-success'>Baru</button>";
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    


									</div>
									<!-- /tile body -->
								</form>

                                <!-- tile footer -->
								
								
                                <!-- /tile footer -->

                            </section>
                            <!-- /tile -->

                            <section class="tile">
                                <!-- tile header -->
                                <div class="tile-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td><h4>Daftar Dokumen</h4></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dokumen as $dok) : ?>
                                                <tr>
                                                    <td><?= $dok['Nm_Dok']; ?></td>
                                                    <?php
                                                        $log = $this->db->get_where('tb_dokumen_log', ['Kd_Izin' => 11, 'ID_Izin' => $izin['ID'], 'Kd_Dok' => $dok['Kd_Dok']])->row_array();
                                                        
                                                        if($log == NULL) :
                                                    ?>
                                                    <td width="200px" class="text-danger">
                                                        <i class="glyphicon glyphicon-remove-sign"></i> Belum Ada
                                                    </td>
                                                    <td></td>
                                                    <?php else : ?>
                                                    <td width="200px" class="text-success">
                                                        <i class="glyphicon glyphicon-ok-sign"></i> Ada
                                                    </td>
                                                        <?php if($log['Nm_File'] != NULL) : ?>
                                                        <td width="60px">
                                                            <a class="text-success">
                                                                <i class="glyphicon glyphicon-cloud-download"></i>
                                                            </a>
                                                        </td>
                                                        <?php else : ?>
                                                        <td></td>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
								<!-- /tile header -->
                            </section>
                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>
			</section>
			



