<!doctype html>
<html class="no-js" lang="">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $site_title; ?></title>
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/vendor/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/summernote/summernote.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/chat.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/tagsinput/bootstrap-tagsinput.css">
				
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.8.2.min.js"></script>
		<style>
		input[type="text"].autonumber, input[type="text"].automoney {
			text-align:right;
		}
		
		</style>
		<script type='text/javascript'>
		var site_url = "<?php echo site_url(); ?>";
		var fmodule = "<?php echo fmodule(); ?>";
		var copyright_year = "<?php echo config('copyright_year'); ?>";
		checked=false;
		function checkedAll (frm1) {
			var aa= document.getElementById(frm1); 
			if(checked == false){
				checked = true
			}
			else{
				checked = false
			}
			for (var i =0; i < aa.elements.length; i++){ 
				aa.elements[i].checked = checked;
			}
		}
		
		function checkedAll2 (frm1) {
			var aa= document.getElementById('form2'); 
			if(checked == false){
				checked = true
			}
			else{
				checked = false
			}
			for (var i =0; i < aa.elements.length; i++){ 
				aa.elements[i].checked = checked;
			}
		}
		
		function formatAngka(objek) {
			var separator = ".";
			a = objek.value;
			b = a.replace(/[^\d]/g,"");
			//b = a.replace(/[^0-9.]/g,"");
			c = "";
			panjang = b.length;
			j = 0;
			for (i = panjang; i > 0; i--) {
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)) {
					c = b.substr(i-1,1) + separator + c;
				} else {
					c = b.substr(i-1,1) + c;
				}
			}
			objek.value = c;
		}
		
		function formatUang(objek) {
			var separator = ".";
			a = objek.value;
			//b = a.replace(/[^\d]/g,"");
			b = a.replace(/[,;]+/g,"");
			c = "";
			panjang = b.length;
			j = 0;
			for (i = panjang; i > 0; i--) {
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)) {
					c = b.substr(i-1,1) + separator + c;
				} else {
					c = b.substr(i-1,1) + c;
				}
			}
			//e = c.replace(/(\d\d?)$/,',');
			objek.value = c;
		}
		
		function formatMoney(el) {
		  el.value = '$' + el.value.replace(/[^\d]/g,'').replace(/(\d\d?)$/,',$1');
		}

		function selectCopy(el) {
			var body = document.body, range, sel;
			if (document.createRange && window.getSelection) {
				range = document.createRange();
				sel = window.getSelection();
				sel.removeAllRanges();
				try {
					range.selectNodeContents(el);
					sel.addRange(range);
				} catch (e) {
					range.selectNode(el);
					sel.addRange(range);
				}
			} else if (body.createTextRange) {
				range = body.createTextRange();
				range.moveToElementText(el);
				range.select();
			}
			document.execCommand("Copy");
		}
		
		function popup(url){
			myWindow=window.open (url,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		function popup_el(url){
			var kode = $("#el").find('option:selected').val();
			myWindow=window.open (url + "/" + kode,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		function popup_aa(url){
			var awal = $("#tgl_awal").val();
			var akhir = $("#tgl_akhir").val();
			aw = awal.replace(/[^\d]/g,"-");
			ak = akhir.replace(/[^\d]/g,"-");
			myWindow=window.open (url+ "/" + aw + "/" + ak,"," ,"menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		function popup_tdp(url){
			var kode = $("#op_bentuk_perusahaan").find('option:selected').val();
			var kbli = $("#kbli").val();
			myWindow=window.open (url + "/" + kode + "/" + kbli,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		//$('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
		

		</script>
		
	</head>
    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
			<section id="header">
                <header class="clearfix">
                    <div class="branding">
                        <a class="brand" href="<?php echo site_url(fmodule()); ?>">
                            <!--<span><strong><?php echo config('sub_title'); ?></strong></span>-->
                        </a>
						<img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/logo-small.png" height="50px" width="180px" />
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    
					<!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="dropdown divided-right settings">
                            <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu">
                                <li>

                                    <ul class="color-schemes list-inline">
                                        <li class="title">Header Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank header-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black header-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea header-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan header-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred header-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light header-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Branding Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank branding-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black branding-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea branding-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan branding-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred branding-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light branding-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Sidebar Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank sidebar-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black sidebar-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea sidebar-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan sidebar-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred sidebar-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light sidebar-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Active Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank color-scheme" data-scheme="drank-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black color-scheme" data-scheme="black-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea color-scheme" data-scheme="greensea-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan color-scheme" data-scheme="cyan-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred color-scheme" data-scheme="lightred-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light color-scheme" data-scheme="light-scheme-color"></a></li>
                                    </ul>

                                </li>

                            </ul>
                        </li>
                    </ul>
                    <!-- Left-side navigation end -->
					
					<!-- Search -->
                    <div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div>
                    <!-- Search end -->
					
                    <ul class="nav-right pull-right list-inline">
					
						<li><a href="<?php echo site_url(smodule()); ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Buka Website <?php echo config('site_title'); ?>"><i class="fa fa-globe"></i></a></li>
						
                        <li class="dropdown nav-profile">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/user-profile.png" alt="" class="img-circle size-30x30">
                                <span>Hai, <?php echo $userfullname; ?> <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                                <li>
                                    <a role="button" tabindex="0" href="<?php echo site_url(fmodule('akun')); ?>">
                                        <i class="fa fa-user"></i>Profil
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo site_url(fmodule('akun/password')); ?>">
                                        <i class="fa fa-lock"></i>Ganti Password
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" href="<?php echo site_url(fmodule('logout')); ?>">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>
	
                            </ul>

                        </li>
						<li class="toggle-right-sidebar">
                            <a role="button" tabindex="0">
                                <i class="fa fa-comments"></i>
								<span class="badge bg-lightred"><span id="badge_chat">0</span></span>
                            </a>
                        </li>
                    </ul>
					<ul class="nav-right pull-right list-inline">
                        <li class="dropdown nav-profile">
                            <a href="<?php echo site_url(fmodule()); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </header>
            </section>
			
			<div id="controls">
                <aside id="sidebar">
                    <div id="sidebar-wrap">
                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <!--<div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>-->
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <ul id="navigation">
                                            <!--<li class="active"><a href="index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>-->
											
											<li class="<?php echo menuactive('dashboard',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule()); ?>">
													<i class="fa fa-dashboard"></i> <span>Dashboard</span>
												</a>
											</li>
											
											<li class="<?php echo menuactive('superadmin',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule('superadmin')); ?>">
													<i class="fa fa-star"></i> <span>Superadmin</span>
												</a>
											</li>
											
											<?php echo GroupMenuAkses(array(7),$DataAkses,'<li class="'.menuopen('web',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('web')).'"><i class="fa fa-globe"></i> <span>Website</span></a>
												<ul>
													'.GroupMenuAkses(array(7),$DataAkses,'<li class="'.menuopen('web_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Berita</span></a>
														<ul>
															'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('web_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(7,$DataAkses,'<li class="'.menuactive('web_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(8),$DataAkses,'<li class="'.menuopen('web_menu',$menuopen2).'"><a href="'.site_url(fmodule('web/menu')).'"><i class="fa fa-circle-o"></i><span class="text">Menu</span></a>
														<ul>
															'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('web_menu',$menuactive).'"><a href="'.site_url(fmodule('web/menu')).'"><i class="fa fa-circle-o"></i><span class="text">Data Menu</span></a></li>').'
															'.MenuAkses(8,$DataAkses,'<li class="'.menuactive('web_menu_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/menu_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Menu</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(12),$DataAkses,'<li class="'.menuopen('web_informasi',$menuopen2).'"><a href="'.site_url(fmodule('web/informasi')).'"><i class="fa fa-circle-o"></i><span class="text">Informasi</span></a>
														<ul>
															'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('web_informasi',$menuactive).'"><a href="'.site_url(fmodule('web/informasi')).'"><i class="fa fa-circle-o"></i><span class="text">Data Informasi</span></a></li>').'
															'.MenuAkses(12,$DataAkses,'<li class="'.menuactive('web_informasi_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/informasi_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Informasi</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(9),$DataAkses,'<li class="'.menuopen('web_download',$menuopen2).'"><a href="'.site_url(fmodule('web/download')).'"><i class="fa fa-circle-o"></i><span class="text">Download</span></a>
														<ul>
															'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('web_download',$menuactive).'"><a href="'.site_url(fmodule('web/download')).'"><i class="fa fa-circle-o"></i><span class="text">Data Download</span></a></li>').'
															'.MenuAkses(9,$DataAkses,'<li class="'.menuactive('web_download_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/download_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Download</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(14),$DataAkses,'<li class="'.menuopen('web_slide',$menuopen2).'"><a href="'.site_url(fmodule('web/slide')).'"><i class="fa fa-circle-o"></i><span class="text">Slide</span></a>
														<ul>
															'.MenuAkses(14,$DataAkses,'<li class="'.menuactive('web_slide',$menuactive).'"><a href="'.site_url(fmodule('web/slide')).'"><i class="fa fa-circle-o"></i><span class="text">Slide Content</span></a></li>').'
															'.MenuAkses(14,$DataAkses,'<li class="'.menuactive('web_slidepage',$menuactive).'"><a href="'.site_url(fmodule('web/slidepage')).'"><i class="fa fa-circle-o"></i><span class="text">Slide Page/Menu</span></a></li>').'
														</ul>
													</li>').'
													'.MenuAkses(13,$DataAkses,'<li class="'.menuactive('web_gallery',$menuactive).'"><a href="'.site_url(fmodule('web/gallery')).'"><i class="fa fa-circle-o"></i><span class="text">Gallery</span></a></li>').'
													'.MenuAkses(10,$DataAkses,'<li class="'.menuactive('web_komentar',$menuactive).'"><a href="'.site_url(fmodule('web/komentar')).'"><i class="fa fa-circle-o"></i><span class="text">Komentar</span></a></li>').'
													'.MenuAkses(15,$DataAkses,'<li class="'.menuactive('web_grafik',$menuactive).'"><a href="'.site_url(fmodule('web/grafik')).'"><i class="fa fa-circle-o"></i><span class="text">Grafik</span></a></li>').'
													'.MenuAkses(16,$DataAkses,'<li class="'.menuactive('web_form',$menuactive).'"><a href="'.site_url(fmodule('web/form')).'"><i class="fa fa-circle-o"></i><span class="text">Formulir</span></a></li>').'
													'.MenuAkses(17,$DataAkses,'<li class="'.menuactive('web_data',$menuactive).'"><a href="'.site_url(fmodule('web/data')).'"><i class="fa fa-circle-o"></i><span class="text">Data</span></a></li>').'
													'.MenuAkses(18,$DataAkses,'<li class="'.menuactive('web_banner',$menuactive).'"><a href="'.site_url(fmodule('web/banner')).'"><i class="fa fa-circle-o"></i><span class="text">Banner</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('web')).'"><i class="fa fa-desktop"></i> <span>Transparansi</span></a>
												<ul>
													'.GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">APBD</span></a>
														<ul>
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">LKPD</span></a>
														<ul>
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
													'.GroupMenuAkses(array(21),$DataAkses,'<li class="'.menuopen('transparansi_berita',$menuopen2).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">SP2D</span></a>
														<ul>
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita',$menuactive).'"><a href="'.site_url(fmodule('web/berita')).'"><i class="fa fa-circle-o"></i><span class="text">Data Berita</span></a></li>').'
															'.MenuAkses(21,$DataAkses,'<li class="'.menuactive('transparansi_berita_kategori',$menuactive).'"><a href="'.site_url(fmodule('web/berita_kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Berita</span></a></li>').'
														</ul>
													</li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(22),$DataAkses,'<li class="'.menuopen('publikasi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('publikasi')).'"><i class="fa fa-file-text-o"></i> <span>Dokumen Publik</span></a>
												<ul>
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('publikasi',$menuactive).'"><a href="'.site_url(fmodule('publikasi')).'"><i class="fa fa-circle-o"></i><span class="text">Data Publikasi</span></a></li>').'
													'.MenuAkses(22,$DataAkses,'<li class="'.menuactive('publikasi',$menuactive).'"><a href="'.site_url(fmodule('publikasi/kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Publikasi</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(23),$DataAkses,'<li class="'.menuopen('regulasi',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('regulasi')).'"><i class="fa fa-gavel"></i> <span>Regulasi</span></a>
												<ul>
													'.MenuAkses(23,$DataAkses,'<li class="'.menuactive('regulasi',$menuactive).'"><a href="'.site_url(fmodule('regulasi')).'"><i class="fa fa-circle-o"></i><span class="text">Data Regulasi</span></a></li>').'
													'.MenuAkses(23,$DataAkses,'<li class="'.menuactive('regulasi',$menuactive).'"><a href="'.site_url(fmodule('regulasi/kategori')).'"><i class="fa fa-circle-o"></i><span class="text">Kategori Regulasi</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(40),$DataAkses,'<li class="'.menuopen('personal',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('personal')).'"><i class="fa fa-male"></i> <span>Personal</span></a>
												<ul>
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo_add',$menuactive).'"><a href="'.site_url(fmodule('personal/fo_add')).'"><i class="fa fa-circle-o"></i><span class="text">Tambah Data Personal</span></a></li>').'
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo',$menuactive).'"><a href="'.site_url(fmodule('personal/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Data Personal</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(50,60,70,80,90,100,110,120,130,140),$DataAkses,'<li class="'.menuopen('fo',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('fo')).'"><i class="fa fa-desktop"></i> <span>Front Office</span> <!--<span class="ntf_subtotal_fo"></span>--></a>
												<!--<ul>
													'.MenuAkses(40,$DataAkses,'<li class="'.menuactive('personal_fo',$menuactive).'"><a href="'.site_url(fmodule('personal/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Data Personal</span></a></li>').'
													'.MenuAkses(50,$DataAkses,'<li class="'.menuactive('siup_fo',$menuactive).'"><a href="'.site_url(fmodule('siup/fo')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(60,$DataAkses,'<li class="'.menuactive('tdp_fo',$menuactive).'"><a href="'.site_url(fmodule('tdp/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(80,$DataAkses,'<li class="'.menuactive('imb_fo',$menuactive).'"><a href="'.site_url(fmodule('imb/fo')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(90,$DataAkses,'<li class="'.menuactive('ho_fo',$menuactive).'"><a href="'.site_url(fmodule('ho/fo')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(100,$DataAkses,'<li class="'.menuactive('iujk_fo',$menuactive).'"><a href="'.site_url(fmodule('iujk/fo')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(130,$DataAkses,'<li class="'.menuactive('tdg_fo',$menuactive).'"><a href="'.site_url(fmodule('tdg/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(140,$DataAkses,'<li class="'.menuactive('tdi_fo',$menuactive).'"><a href="'.site_url(fmodule('tdi/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(70,$DataAkses,'<li class="'.menuactive('reklame_fo',$menuactive).'"><a href="'.site_url(fmodule('reklame/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(120,$DataAkses,'<li class="'.menuactive('itkesehatan_fo',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/fo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(110,$DataAkses,'<li class="'.menuactive('tdup_fo',$menuactive).'"><a href="'.site_url(fmodule('tdup/fo')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(51,61,71,81,91,101,111,121,131,141),$DataAkses,'<li class="'.menuopen('bo',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('bo')).'"><i class="fa fa-tasks"></i> <span>Back Office</span> <span class="ntf_subtotal_bo"></span></a>
												<!--<ul>
													'.MenuAkses(51,$DataAkses,'<li class="'.menuactive('siup_bo',$menuactive).'"><a href="'.site_url(fmodule('siup/bo')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(61,$DataAkses,'<li class="'.menuactive('tdp_bo',$menuactive).'"><a href="'.site_url(fmodule('tdp/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(81,$DataAkses,'<li class="'.menuactive('imb_bo',$menuactive).'"><a href="'.site_url(fmodule('imb/bo')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(91,$DataAkses,'<li class="'.menuactive('ho_bo',$menuactive).'"><a href="'.site_url(fmodule('ho/bo')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(101,$DataAkses,'<li class="'.menuactive('iujk_bo',$menuactive).'"><a href="'.site_url(fmodule('iujk/bo')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(131,$DataAkses,'<li class="'.menuactive('tdg_bo',$menuactive).'"><a href="'.site_url(fmodule('tdg/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(141,$DataAkses,'<li class="'.menuactive('tdi_bo',$menuactive).'"><a href="'.site_url(fmodule('tdi/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(71,$DataAkses,'<li class="'.menuactive('reklame_bo',$menuactive).'"><a href="'.site_url(fmodule('reklame/bo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(121,$DataAkses,'<li class="'.menuactive('itkesehatan_bo',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/bo')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(111,$DataAkses,'<li class="'.menuactive('tdup_bo',$menuactive).'"><a href="'.site_url(fmodule('tdup/bo')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(52,62,72,82,92,102,112,122,132,142),$DataAkses,'<li class="'.menuopen('kabid',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('kabid')).'"><i class="fa fa-check-square-o"></i> <span>Kabid</span> <span class="ntf_subtotal_kabid"></span></a>
												<!--<ul>
													'.MenuAkses(52,$DataAkses,'<li class="'.menuactive('siup_kabid',$menuactive).'"><a href="'.site_url(fmodule('siup/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(62,$DataAkses,'<li class="'.menuactive('tdp_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdp/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(82,$DataAkses,'<li class="'.menuactive('imb_kabid',$menuactive).'"><a href="'.site_url(fmodule('imb/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(92,$DataAkses,'<li class="'.menuactive('ho_kabid',$menuactive).'"><a href="'.site_url(fmodule('ho/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(102,$DataAkses,'<li class="'.menuactive('iujk_kabid',$menuactive).'"><a href="'.site_url(fmodule('iujk/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(132,$DataAkses,'<li class="'.menuactive('tdg_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdg/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(142,$DataAkses,'<li class="'.menuactive('tdi_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdi/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(72,$DataAkses,'<li class="'.menuactive('reklame_kabid',$menuactive).'"><a href="'.site_url(fmodule('reklame/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(122,$DataAkses,'<li class="'.menuactive('itkesehatan_kabid',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(112,$DataAkses,'<li class="'.menuactive('tdup_kabid',$menuactive).'"><a href="'.site_url(fmodule('tdup/kabid')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(53,63,73,83,93,103,113,123,133,143),$DataAkses,'<li class="'.menuopen('kadin',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('kadin')).'"><i class="fa fa-check"></i> <span>Kadin</span> <span class="ntf_subtotal_kadin"></span></a>
												<!--<ul>
													'.MenuAkses(53,$DataAkses,'<li class="'.menuactive('siup_kadin',$menuactive).'"><a href="'.site_url(fmodule('siup/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(63,$DataAkses,'<li class="'.menuactive('tdp_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdp/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(83,$DataAkses,'<li class="'.menuactive('imb_kadin',$menuactive).'"><a href="'.site_url(fmodule('imb/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(93,$DataAkses,'<li class="'.menuactive('ho_kadin',$menuactive).'"><a href="'.site_url(fmodule('ho/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(103,$DataAkses,'<li class="'.menuactive('iujk_kadin',$menuactive).'"><a href="'.site_url(fmodule('iujk/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(133,$DataAkses,'<li class="'.menuactive('tdg_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdg/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(143,$DataAkses,'<li class="'.menuactive('tdi_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdi/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(73,$DataAkses,'<li class="'.menuactive('reklame_kadin',$menuactive).'"><a href="'.site_url(fmodule('reklame/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(123,$DataAkses,'<li class="'.menuactive('itkesehatan_kadin',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(113,$DataAkses,'<li class="'.menuactive('tdup_kadin',$menuactive).'"><a href="'.site_url(fmodule('tdup/kadin')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(54,64,74,84,94,104,114,124,134,144),$DataAkses,'<li class="'.menuopen('tu',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('tu')).'"><i class="fa fa-legal"></i> <span>Tata Usaha</span> <span class="ntf_subtotal_tu"></span></a>
												<!--<ul>
													'.MenuAkses(54,$DataAkses,'<li class="'.menuactive('siup_tu',$menuactive).'"><a href="'.site_url(fmodule('siup/tu')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(64,$DataAkses,'<li class="'.menuactive('tdp_tu',$menuactive).'"><a href="'.site_url(fmodule('tdp/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(84,$DataAkses,'<li class="'.menuactive('imb_tu',$menuactive).'"><a href="'.site_url(fmodule('imb/tu')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(94,$DataAkses,'<li class="'.menuactive('ho_tu',$menuactive).'"><a href="'.site_url(fmodule('ho/tu')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(104,$DataAkses,'<li class="'.menuactive('iujk_tu',$menuactive).'"><a href="'.site_url(fmodule('iujk/tu')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(134,$DataAkses,'<li class="'.menuactive('tdg_tu',$menuactive).'"><a href="'.site_url(fmodule('tdg/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(144,$DataAkses,'<li class="'.menuactive('tdi_tu',$menuactive).'"><a href="'.site_url(fmodule('tdi/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(74,$DataAkses,'<li class="'.menuactive('reklame_tu',$menuactive).'"><a href="'.site_url(fmodule('reklame/tu')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(124,$DataAkses,'<li class="'.menuactive('itkesehatan_tu',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/tu')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(114,$DataAkses,'<li class="'.menuactive('tdup_tu',$menuactive).'"><a href="'.site_url(fmodule('tdup/tu')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(55,65,75,85,95,105,115,125,135,144),$DataAkses,'<li class="'.menuopen('cetak',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('cetak_sk')).'"><i class="fa fa-print"></i> <span>Cetak</span> <span class="ntf_subtotal_cetak"></span></a>
												<!--<ul>
													'.MenuAkses(55,$DataAkses,'<li class="'.menuactive('siup_cetak',$menuactive).'"><a href="'.site_url(fmodule('siup/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(65,$DataAkses,'<li class="'.menuactive('tdp_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdp/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(85,$DataAkses,'<li class="'.menuactive('imb_cetak',$menuactive).'"><a href="'.site_url(fmodule('imb/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(95,$DataAkses,'<li class="'.menuactive('ho_cetak',$menuactive).'"><a href="'.site_url(fmodule('ho/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(105,$DataAkses,'<li class="'.menuactive('iujk_cetak',$menuactive).'"><a href="'.site_url(fmodule('iujk/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(135,$DataAkses,'<li class="'.menuactive('tdg_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdg/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(145,$DataAkses,'<li class="'.menuactive('tdi_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdi/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(75,$DataAkses,'<li class="'.menuactive('reklame_cetak',$menuactive).'"><a href="'.site_url(fmodule('reklame/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(125,$DataAkses,'<li class="'.menuactive('itkesehatan_cetak',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(115,$DataAkses,'<li class="'.menuactive('tdup_cetak',$menuactive).'"><a href="'.site_url(fmodule('tdup/cetak')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(56,66,76,86,96,106,116,126,136,146),$DataAkses,'<li class="'.menuopen('serah',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('serah')).'"><i class="fa fa-male"></i> <span>Pengambilan</span> <span class="ntf_subtotal_serah"></span></a>
												<!--<ul>
													'.MenuAkses(56,$DataAkses,'<li class="'.menuactive('siup_serah',$menuactive).'"><a href="'.site_url(fmodule('siup/serah')).'"><i class="fa fa-circle-o"></i><span class="text">SIUP</span></a></li>').'
													'.MenuAkses(66,$DataAkses,'<li class="'.menuactive('tdp_serah',$menuactive).'"><a href="'.site_url(fmodule('tdp/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(86,$DataAkses,'<li class="'.menuactive('imb_serah',$menuactive).'"><a href="'.site_url(fmodule('imb/serah')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(96,$DataAkses,'<li class="'.menuactive('ho_serah',$menuactive).'"><a href="'.site_url(fmodule('ho/serah')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(106,$DataAkses,'<li class="'.menuactive('iujk_serah',$menuactive).'"><a href="'.site_url(fmodule('iujk/serah')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(136,$DataAkses,'<li class="'.menuactive('tdg_serah',$menuactive).'"><a href="'.site_url(fmodule('tdg/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(146,$DataAkses,'<li class="'.menuactive('tdi_serah',$menuactive).'"><a href="'.site_url(fmodule('tdi/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(76,$DataAkses,'<li class="'.menuactive('reklame_serah',$menuactive).'"><a href="'.site_url(fmodule('reklame/serah')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(126,$DataAkses,'<li class="'.menuactive('itkesehatan_serah',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/serah')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(116,$DataAkses,'<li class="'.menuactive('tdup_serah',$menuactive).'"><a href="'.site_url(fmodule('tdup/serah')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'
												</ul>-->
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuopen('laporan',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('lap_izin')).'"><i class="fa fa-file-o"></i> <span>Laporan</span></a>
												<ul>
													'.GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuactive('rekap_laporan',$menuactive).'"><a href="'.site_url(fmodule('laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Laporan Semua Izin</span></a></li>').'
													'.GroupMenuAkses(array(57,67,77,87,97,107,117,127,137,147),$DataAkses,'<li class="'.menuactive('laporan',$menuactive).'"><a href="'.site_url(fmodule('lap_izin')).'"><i class="fa fa-circle-o"></i><span class="text">Laporan Per Izin</span></a></li>').'
													<!--'.MenuAkses(67,$DataAkses,'<li class="'.menuactive('tdp_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdp/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDP</span></a></li>').'
													'.MenuAkses(87,$DataAkses,'<li class="'.menuactive('imb_laporan',$menuactive).'"><a href="'.site_url(fmodule('imb/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">IMB</span></a></li>').'
													'.MenuAkses(97,$DataAkses,'<li class="'.menuactive('ho_laporan',$menuactive).'"><a href="'.site_url(fmodule('ho/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">HO</span></a></li>').'
													'.MenuAkses(107,$DataAkses,'<li class="'.menuactive('iujk_laporan',$menuactive).'"><a href="'.site_url(fmodule('iujk/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">IUJK</span></a></li>').'
													'.MenuAkses(137,$DataAkses,'<li class="'.menuactive('tdg_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdg/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDG</span></a></li>').'
													'.MenuAkses(147,$DataAkses,'<li class="'.menuactive('tdi_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdi/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDI</span></a></li>').'
													'.MenuAkses(77,$DataAkses,'<li class="'.menuactive('reklame_laporan',$menuactive).'"><a href="'.site_url(fmodule('reklame/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Reklame</span></a></li>').'
													'.MenuAkses(127,$DataAkses,'<li class="'.menuactive('itkesehatan_laporan',$menuactive).'"><a href="'.site_url(fmodule('itkesehatan/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">Izin Tenaga Kesehatan</span></a></li>').'
													'.MenuAkses(117,$DataAkses,'<li class="'.menuactive('tdup_laporan',$menuactive).'"><a href="'.site_url(fmodule('tdup/laporan')).'"><i class="fa fa-circle-o"></i><span class="text">TDUP</span></a></li>').'-->
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(30),$DataAkses,'<li class="'.menuopen('master',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('master')).'"><i class="fa fa-puzzle-piece"></i> <span>Master</span></a>
												<ul>
													'.MenuAkses(32,$DataAkses,'<li class="'.menuactive('dokumen_master_parameter',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_param')).'"><i class="fa fa-circle-o"></i><span class="text">Setting Parameter</span></a></li>').'
													'.MenuAkses(31,$DataAkses,'<li class="'.menuactive('dokumen_master_dok',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_dok')).'"><i class="fa fa-circle-o"></i><span class="text">Dokumen Persyaratan</span></a></li>').'
													'.MenuAkses(30,$DataAkses,'<li class="'.menuactive('dokumen_master_jenis',$menuactive).'"><a href="'.site_url(fmodule('dokumen/master_jenis')).'"><i class="fa fa-circle-o"></i><span class="text">Jenis Dokumen</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(33),$DataAkses,'<li class="'.menuopen('setting',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('setting')).'"><i class="fa fa-cog"></i> <span>Setting</span></a>
												<ul>
													'.MenuAkses(33,$DataAkses,'<li class="'.menuactive('setting_config',$menuactive).'"><a href="'.site_url(fmodule('setting/config')).'"><i class="fa fa-circle-o"></i><span class="text">Konfigurasi Data</span></a></li>').'
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(1,2,3,4),$DataAkses,'<li class="'.menuopen('users',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('users')).'"><i class="fa fa-users"></i> <span>Users</span></a>
												<ul>
													'.MenuAkses(1,$DataAkses,'<li class="'.menuactive('users_akun',$menuactive).'"><a href="'.site_url(fmodule('users')).'"><i class="fa fa-circle-o"></i><span class="text">Akun User</span></a></li>').'
													'.MenuAkses(2,$DataAkses,'<li class="'.menuactive('users_hakaksesusers',$menuactive).'"><a href="'.site_url(fmodule('users/authuser')).'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses User</span></a></li>').'
													'.MenuAkses(3,$DataAkses,'<li class="'.menuactive('users_hakakseslevel',$menuactive).'"><a href="'.site_url(fmodule('users/authlevel')).'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses Level</span></a></li>').' 
													'.MenuAkses(4,$DataAkses,'<li class="'.menuactive('users_hakaksesgroup',$menuactive).'"><a href="'.site_url(fmodule('users/authgroup')).'"><i class="fa fa-circle-o"></i><span class="text">Hak Akses Group</span></a></li>').' 
												</ul>
											</li>'); ?>
											
											<?php echo GroupMenuAkses(array(5,6),$DataAkses,'<li class="'.menuopen('akun',$menuopen).'">
												<a role="button" href="'.site_url(fmodule('akun')).'"><i class="fa fa-user"></i> <span>Akun Saya</span></a>
													<ul>
														'.MenuAkses(5,$DataAkses,'<li class="'.menuactive('akun',$menuactive).'"><a href="'.site_url(fmodule('akun')).'"><i class="fa fa-circle-o"></i><span class="text"> Profil</span></a></li>').'
														'.MenuAkses(6,$DataAkses,'<li class="'.menuactive('akun_password',$menuactive).'"><a href="'.site_url(fmodule('akun/password')).'"><i class="fa fa-circle-o"></i> Ganti Password</a></li>').'
													</ul>
												</li>'); ?>
											
											<li class="<?php echo menuactive('logout',$menuactive); ?>">
												<a href="<?php echo site_url(fmodule('logout')); ?>">
													<i class="fa fa-sign-out"></i> <span>Logout</span>
												</a>
											</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </aside>
                
				<!--================= RIGHTBAR Content ===================
                ================================================== -->
                <aside id="rightbar">

                    <div role="tabpanel">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="users">
                                <h6><strong>Online</strong> Users</h6>

                                <ul id="users_list_online"></ul>
                            </div>
                        </div>

                    </div>

                </aside>
                <!--/ RIGHTBAR Content -->
            </div>
            <!--/ CONTROLS Content -->
			
            <section id="content">
                <div class="page page-dashboard">
                    <!--<div class="pageheader">
						<?php echo $this->breadcrumb->output(); ?>
                    </div>-->

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
								<?php //echo form_open_multipart('',array('name' => 'form', 'id' => 'form')); ?>
									<!--<div class="tile-widget">
										<div class="row">
											<div class="col-sm-12">
												<div id="grafik" class="col-sm-9" style="height: 300px; margin: 0 auto"></div>
											</div>
										</div>
									</div>-->
									<?php echo $contents; ?>
								<?php //echo form_close(); ?>

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


        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
		
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/d3/d3.layout.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/chosen/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/summernote/summernote.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/coolclock.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/coolclock/excanvas.js"></script>
        <!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/tagsinput/bootstrap-tagsinput.js"></script>-->
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.js"></script>
		<!--<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/chat.js"></script>-->
 
        <script>
            $(window).load(function(){
                // Initialize Statistics chart
                var data = [{
                    data: [[1,15],[2,40],[3,35],[4,39],[5,42],[6,50],[7,46],[8,49],[9,59],[10,60],[11,58],[12,74]],
                    label: 'Unique Visits',
                    points: {
                        show: true,
                        radius: 4
                    },
                    splines: {
                        show: true,
                        tension: 0.45,
                        lineWidth: 4,
                        fill: 0
                    }
                }, {
                    data: [[1,50],[2,80],[3,90],[4,85],[5,99],[6,125],[7,114],[8,96],[9,130],[10,145],[11,139],[12,160]],
                    label: 'Page Views',
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        lineWidth: 0,
                        fillColor: { colors: [{ opacity: 0.3 }, { opacity: 0.8}] }
                    }
                }];

                var options = {
                    colors: ['#e05d6f','#61c8b8'],
                    series: {
                        shadowSize: 0
                    },
                    legend: {
                        backgroundOpacity: 0,
                        margin: -7,
                        position: 'ne',
                        noColumns: 2
                    },
                    xaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        },
                        position: 'bottom',
                        ticks: [
                            [ 1, 'JAN' ], [ 2, 'FEB' ], [ 3, 'MAR' ], [ 4, 'APR' ], [ 5, 'MAY' ], [ 6, 'JUN' ], [ 7, 'JUL' ], [ 8, 'AUG' ], [ 9, 'SEP' ], [ 10, 'OCT' ], [ 11, 'NOV' ], [ 12, 'DEC' ]
                        ]
                    },
                    yaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        }
                    },
                    grid: {
                        borderWidth: {
                            top: 0,
                            right: 0,
                            bottom: 1,
                            left: 1
                        },
                        borderColor: 'rgba(255,255,255,.3)',
                        margin:0,
                        minBorderMargin:0,
                        labelMargin:20,
                        hoverable: true,
                        clickable: true,
                        mouseActiveRadius:6
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: '%s: %y',
                        defaultTheme: false,
                        shifts: {
                            x: 0,
                            y: 20
                        }
                    }
                };

                
                $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true,
                    responsive: true
                });

                $('#appointments-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    navigation: true,
                    navigationText : ['<i class=\'fa fa-chevron-left\'></i>','<i class=\'fa fa-chevron-right\'></i>'],
                    singleItem : true
                });
                
                $('#mini-calendar').datetimepicker({
                    inline: true
                });
				
                $('.widget-todo .todo-list li .checkbox').on('change', function() {
                    var todo = $(this).parents('li');

                    if (todo.hasClass('completed')) {
                        todo.removeClass('completed');
                    } else {
                        todo.addClass('completed');
                    }
                });
                
				
                $('#project-progress').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                });
                
                $('#summernote').summernote({
                    toolbar: [
                        //['style', ['style']], // no style button
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        //['insert', ['picture', 'link']], // no insert buttons
                        //['table', ['table']], // no table button
                        //['help', ['help']] //no help button
                    ],
                    height: 143   //set editable area's height
                });
				
				$('.summernote').summernote({
                    toolbar: [
                        //['style', ['style']], // no style button
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        //['insert', ['picture', 'link']], // no insert buttons
                        //['table', ['table']], // no table button
                        //['help', ['help']] //no help button
                    ],
                    height: 143   //set editable area's height
                });
                
            });
			
		if($("#tSortable").length > 0)
		 {
			$("#tSortable").dataTable({"iDisplayLength": 100, "aLengthMenu": [10,25,50,100,500,1000], "sPaginationType": "full_numbers","bSort":false});
			
			$("#tSortable_2").dataTable({"iDisplayLength": 5, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null]});
		 }
		 
		$('#enable').click(function(){
			$('<input />').attr('type','hidden').attr('name','enable').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		 
		$('#disable').click(function(){
			$('<input />').attr('type','hidden').attr('name','disable').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		 
		$('#delete').click(function(){
			 if (confirm('Apakah anda yakin akan menghapus data ini?')) {
				$('<input />').attr('type','hidden').attr('name','delete').attr('value','1').appendTo('#form');
				$('#form').submit(); 
			 }
		});
		
		$('#save').click(function(){
			$('<input />').attr('type','hidden').attr('name','save').attr('value','1').appendTo('#form');
			$('#form').submit(); 
		});
		 
		$(function() {
			$('.upper').keyup(function() {
				this.value = this.value.toLocaleUpperCase();
			});
		});
		
		
		
		$('.autonumber').keyup(function(){
			var separator = ".";
			a = this.value;
			b = a.replace(/[^\d]/g,"");
			//b = a.replace(/[^0-9.]/g,"");
			c = "";
			panjang = b.length;
			j = 0;
			for (i = panjang; i > 0; i--) {
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)) {
					c = b.substr(i-1,1) + separator + c;
				} else {
					c = b.substr(i-1,1) + c;
				}
			}
			this.value = c;
		});
		
		
		
		//setInterval("update()", 10000); 
		//function update() {$.post("<?php echo site_url(fmodule('users/update_user_log')); ?>");} 
		
		//setInterval(function(){$.post("<?php echo site_url(fmodule('users/update_user_log')); ?>")}, 10000);
		//setInterval(function(){$("#badge_chat").load("<?php echo site_url(fmodule('users/cek_user_log')); ?>")}, 10000);
		//setInterval(function(){$("#users_list_online").load("<?php echo site_url(fmodule('users/users_list_online')); ?>")}, 10000);
		
		function UpdateUserLog(){
			$.post("<?php echo site_url(fmodule('users/update_user_log')); ?>/?time=" + new Date().getTime());
		}
		
		function CekUserLog(){
			$("#badge_chat").load("<?php echo site_url(fmodule('users/cek_user_log')); ?>/?time=" + new Date().getTime());
		}
		
		function UserListOnline(){
			$("#users_list_online").load("<?php echo site_url(fmodule('users/users_list_online')); ?>/?time=" + new Date().getTime());
		}
		
		function Notifikasi(){
			$.ajax({
				type: "POST",
				url : "<?php echo site_url(fmodule('notifikasi')); ?>/?time=" + new Date().getTime(),
				dataType: "json",
				success: function(msg){
					$.each(msg,function(i,item){
						console.log(i,item);
						var FO = item.FO;
						var BO = item.BO;
						var Kabid = item.Kabid;
						var Kadin = item.Kadin;
						var TU = item.TU;
						var Serah = item.Serah;
						if(FO!='0'){	$(".ntf_"+item.CLASS+"_fo").addClass("badge bg-lightred").html(FO);}
						if(BO!='0'){	$(".ntf_"+item.CLASS+"_bo").addClass("badge bg-lightred").html(BO);}
						if(Kabid!='0'){	$(".ntf_"+item.CLASS+"_kabid").addClass("badge bg-lightred").html(Kabid);}
						if(Kadin!='0'){	$(".ntf_"+item.CLASS+"_kadin").addClass("badge bg-lightred").html(Kadin);}
						if(TU!='0'){	$(".ntf_"+item.CLASS+"_tu").addClass("badge bg-lightred").html(TU);}
						if(Serah!='0'){	$(".ntf_"+item.CLASS+"_serah").addClass("badge bg-lightred").html(Serah);}
					});
				}
			});
		};
		//Notifikasi();
		// UpdateUserLog();
		//CekUserLog();
		//UserListOnline();
		//setInterval(Notifikasi, 10000); 
		//setInterval(UpdateUserLog, 10000); 
		//setInterval(CekUserLog, 10000); 
		//setInterval(UserListOnline, 10000); 
		
		
        </script>
        <!--/ Page Specific Scripts -->

    </body>
</html>
