<!doctype html>
	<head>
		<?php $this->load->view('head'); ?>
    </head>

    <body id="minovate" class="appWrapper">
        <div id="wrap" class="animsition">
            <div class="page page-core page-login">
                <div class="text-center">
					<img src="<?php echo base_url('themes/'.config('theme').'/images/logo-small.png'); ?>" />
					<!--<h3 class="text-light text-white"><span class="text-lightred"><?php echo config('site_title'); ?></span></h3>-->
				</div>
                <div class="container w-420 p-15 bg-white mt-40 text-center">
                    <h2 class="text-light text-greensea">Log In <?php echo config('sub_title'); ?></h2>
                    <form name="form" class="form-validation mt-20" novalidate="" method="POST">
						<?php echo alert(); ?>
                        <div class="form-group text-left">
							<i>Username</i>
                            <input type="text" name="username" class="form-control underline-input" placeholder="Isikan username disini">
                        </div>
                        <div class="form-group text-left">
							<i>Password</i>
                            <input type="password" name="password" placeholder="Isikan password disini" class="form-control underline-input">
                        </div>
                        <div class="form-group text-left mt-20">
                            <input type="submit" name="submit" class="btn btn-greensea b-0 br-2 mr-5" value="Login">
                        </div>
                    </form>
					<div class="bg-slategray lt wrap-reset mt-40">
                        <div class="m-0 footer-login"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.js"></script>

        <script>
            $(window).load(function(){


            });
        </script>

    </body>
</html>
