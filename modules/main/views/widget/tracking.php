<section class="mainWidget latestFeatures" >
			<div class="col-6" style="text-align:center;margin-bottom:20px;">
			<header><h3 class="subHeader"><?php echo lang('Pendaftaran Izin Online'); ?></h3></header>
				<div class="searchDataContainer">
					<div class="searchInputContainer" role="search">
						<?php echo form_dropdown('op_izin',op_izin(),0,'id="reg_izin" class="searchTextContainer searchInput" style="text-align-last:center;"'); ?>
					</div>
				</div>
				<div class="searchDataContainer">
					<div class="searchInputContainer" role="search">
						<input id="reg_nokitas" type="text" value="<?php echo $this->input->get('nokitas'); ?>" name="nokitas" placeholder="<?php echo lang('Nomor Identitas (KTP)'); ?>" class="searchTextContainer searchInput trackInput" style="text-align:center;">
					</div>
				</div>
				<div class="btn reset" role="button" tabindex="0" id="btn-register" onclick="register();"><?php echo lang('Registrasi Izin'); ?></div>
			</div>
			<div class="col-6" style="text-align:center;margin-bottom:20px;">
			<header><h3 class="subHeader"><?php echo lang('Tracking Izin Online'); ?></h3></header>
				<div class="searchDataContainer">
					<div class="searchInputContainer" role="search">
						<input id="register" type="text" value="<?php echo $this->input->get('register'); ?>" name="register" placeholder="<?php echo lang('Nomor Registrasi'); ?>" class="searchTextContainer searchInput trackInput" style="text-align:center;">
					</div>
				</div>
				<div class="searchDataContainer">
					<div class="searchInputContainer" role="search">
						<input id="nokitas" type="text" value="<?php echo $this->input->get('nokitas'); ?>" name="nokitas" placeholder="<?php echo lang('Nomor Identitas (KTP)'); ?>" class="searchTextContainer searchInput trackInput" style="text-align:center;">
					</div>
				</div>
				<div class="btn reset" role="button" tabindex="0" id="btn-search" onclick="tracking();"><?php echo lang('Tracking Izin'); ?></div>
			</div>
		</section>
		
		<section id="trackingresult" class="mainWidget latestFeatures hide"></section>


		<!-- moadal -->
		<div class="modal-track" id="modal-track">
			<div id="track">
				<!-- <div id="close">
					x
				</div> -->
				<div class="nav-track">
					<div class="back">
						<a href="#" id="close">Kembali</a>
					</div>
					<div class="id">
						NO. REGISTRASI : <span id="no-reg"></span>
					</div>
				</div>
				<div class="map-track">
					<div class="detail" id="fo">
						<div class="box-map">
							<i class="fas fa-clipboard-list"></i>
							<!-- <img src="img/fo.svg" alt=""> -->
						</div>
						<div class="tanggal">
							Front Office<br>
							<span class="ket">Pendaftaran Izin</span> <br>
							<span class="waktu"></span>
						</div>
					</div>

					<div class="detail" id="bo">
						<div class="box-map">
							<!-- <img src="img/bo.png" alt=""> -->
							<i class="fas fa-user-cog"></i>
						</div>
						<div class="tanggal">
							Back Office<br>
							<span class="ket">Pengecekan Berkas</span> <br>
							<span class="waktu"></span>
						</div>
					</div>

					<div class="detail" id="kabid">
						<div class="box-map">
							<i class="fas fa-user-check"></i>
						</div>
						<div class="tanggal">
							KA. Bidang<br>
							<span class="ket">Validasi Kabid</span> <br>
							<span class="waktu"></span>
						</div>
					</div>

					<div class="detail" id="kadin">
						<div class="box-map">
							<i class="fas fa-pen-alt"></i>
						</div>
						<div class="tanggal">
							KA. Dinas<br>
							<span class="ket">Penandatangan Izin</span> <br>
							<span class="waktu"></span>
						</div>
					</div>

					<div class="detail" id="serah">
						<div class="box-map">
							<i class="fas fa-clipboard-check"></i>
						</div>
						<div class="tanggal">
							Izin Diserahkan<br>
							<span class="ket">Dokumen Diterima</span> <br>
							<span class="waktu"></span>
						</div>
					</div>

					<div class="detail" id="tu">
						<div class="box-map">
							<i class="fas fa-check-double"></i>
						</div>
						<div class="tanggal">
							Izin Selesai<br>
							<span class="ket">Perizinan Selesai</span> <br>
							<span class="waktu"></span>
						</div>
					</div>

				</div>
				<div class="detail-izin">
					<h3>Informasi Perizinan</h3>
					<table id="table-data">
						<tr>
							<td>IZIN</td>
							<td>:</td>
							<td id="izin"></td>
						</tr>
						<tr>
							<td>Nama Usaha</td>
							<td>:</td>
							<td id="usaha"></td>
						</tr>
						<tr>
							<td>Pemohon</td>
							<td>:</td>
							<td id="pelanggan"></td>
						</tr>
					</table>
				</div>
				<div class="detail-track">
					<p>Detail Perizinan</p>
					<div id="list">
						<ul>
							<!-- <li><span class="dns">[DPTMPTS]</span> Validasi Kabid <span class="tgl">20-11-2020 08:00</span></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			function tracking() {
				var noregister = $('#register').val();
				var nokitas = $('#nokitas').val();
				var divClone = $("#btn-search").clone();
				$("#btn-search").html("<?php echo lang('Sedang mencari data. Silakan tunggu'); ?>........");
				if(noregister != '' && nokitas != ''){
					$.ajax({
							type: "POST",
							url : "<?php echo site_url(fmodule('tracking')); ?>/?time=" + new Date().getTime(),
							data: {register:noregister,kitas:nokitas},
							dataType: 'json',
							success: function(res){
								let data = res.track
								$('#modal-track').toggleClass('show')
								$('#no-reg').html(data.ID_IZIN);
								$('#izin').html(data.NM_IZIN);
								$('#usaha').html(data.NM_PERUSAHAAN);
								$('#pelanggan').html(data.NM_PELANGGAN);

								if(data.Flow_FO == 1){
									$('#fo').find('.box-map').addClass('fix')
								}

								if(data.Flow_BO == 1){
									$('#bo').find('.box-map').addClass('fix')
								}

								if(data.Flow_Kabid == 1){
									$('#kabid').find('.box-map').addClass('fix')
								}

								if(data.Flow_Kadin == 1){
									$('#kadin').find('.box-map').addClass('fix')
								}

								if(data.Flow_Serah == 1){
									$('#serah').find('.box-map').addClass('fix')
								}

								if(data.Flow_TU == 1){
									$('#tu').find('.box-map').addClass('fix')
								}

								if(res.detail.length == 0){
									$('#list').html('Tidak ada Log')
								}else{
									let det = res.detail
									let li = ''

									det.forEach(r => {
										li += `<li><span class="dns">[${r.unit}]</span> ${r.pesan} <br><span class="tgl">${r.tanggal}</span></li><hr>`
									});
									$('#list ul').html(li)

								}
								// $('#trackingresult').removeClass('hide');
								// console.log(res)
								$("#btn-search").html('Lacak Izin');
							}
					});
				}
				else{
					alert('tidak ada Data')
					// $('#trackingresult').html('<div class="center" style="text-align:center;">Silakan isi data dengan lengkap !!!</div>');
					// $('#trackingresult').removeClass('hide');
					$("#btn-search").html('Lacak Izin');
				}
			};

			$('#close').on('click', (e) => {
				e.preventDefault()
				$('#modal-track').toggleClass('show')
			})

			// function tracking() {
			// 	var noregister = $('#register').val();
			// 	var nokitas = $('#nokitas').val();
			// 	var divClone = $("#btn-search").clone();
			// 	$("#btn-search").html("<?php echo lang('Sedang mencari data. Silakan tunggu'); ?>........");
			// 	if(noregister != '' && nokitas != ''){
			// 		$.ajax({
			// 				type: "POST",
			// 				url : "<?php echo site_url(fmodule('tracking')); ?>/?time=" + new Date().getTime(),
			// 				data: {register:noregister,kitas:nokitas},
			// 				success: function(msg){
			// 					$('#trackingresult').html(msg);
			// 					$('#trackingresult').removeClass('hide');
			// 					$("#btn-search").replaceWith(divClone);
			// 				}
			// 		});
			// 	}
			// 	else{
			// 		$('#trackingresult').html('<div class="center" style="text-align:center;">Silakan isi data dengan lengkap !!!</div>');
			// 		$('#trackingresult').removeClass('hide');
			// 		$("#btn-search").replaceWith(divClone);
			// 	}
			// };
			
			function register(){
				var reg_izin = $("#reg_izin").val();
				var reg_nokitas = $("#reg_nokitas").val();
				if(reg_izin == '0' || reg_nokitas == ''){
					alert('Silakan isi data dengan lengkap !!');
				}
				else{
					window.location.href = '<?php echo apps_url(4); ?>';
				}
			};
			
			$(".trackInput").keyup(function(event) {
				if (event.keyCode === 13) {
					tracking();
				}
			});
			
			<?php if($this->input->get('register') != '' AND $this->input->get('nokitas') != ''){ ?>
			tracking();
			<?php } ?>
	
		</script>