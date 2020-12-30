<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPPADU - System Layanan Perijinan Terpadu Bojonegoro</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/dist/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/dist/ionicons-master/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/plugins/iCheck/square/blue.css">
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/favicon.png" rel="SHORTCUT ICON"/>
	<style type="text/css">
	
	body {
		background: url(<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/atv_login_bg.png); 
  		background-position: center center;
  		background-repeat: no-repeat;
  		background-attachment: fixed;
  		background-size: cover;
	}
	</style>
  </head>
  <body>
    <div class="login-box">   
      <div class="login-box-body">
	  <div align="center"><img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/login_headera.png" height="50" />
	  </div>
	  <h3 align="center">
        <font color="#000000"><b>System Layanan Perizinan</b><br/>Kabupaten Bojonegoro</font></h3>
	  
        <p class="login-box-msg"><font color="#FF0000"></font></p>
        <form name="login-form" id="login-form" action="" method="post" target="_parent">
			<?php echo alert(); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" value="" class="form-control" placeholder="Nama Pengguna">
            <span class="fa ion-android-person form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" value="" class="form-control" placeholder="Sandi">
            <span class="fa ion-locked form-control-feedback"></span>
          </div>
		  <div class="form-group has-feedback">
            <?php echo form_dropdown('op_theme',array('0'=>'- Pilih Tema -','sippadu1'=>'Sippadu','sippadu'=>'All New Sippadu'),set_value('op_theme','sippadu'),'class="form-control"'); ?>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="rememberMe" value ="true"> Pengingat
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Masuk">
            </div><!-- /.col -->
          </div>
        </form>
        <br>
    </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
