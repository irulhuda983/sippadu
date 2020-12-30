	<?php 
		 header("Cache-Control: private, max-age=10800, pre-check=10800");
		 header("Pragma: private");
		 header("Expires: " . date(DATE_RFC822,strtotime("+3 day")));
	?>
	<title><?php echo $site_title; ?></title>
	<meta name="twitter:title" content="<?php echo $site_title; ?>"/>
	<meta name="keywords" content="<?php echo $site_title; ?>"/>
	<meta name="image" content="<?php echo $site_image; ?>" />
	<meta name="description" content="<?php echo $site_description; ?>"/>
	<meta name="twitter:description" content="<?php echo $site_description; ?>"/>
	<meta name="theme-color" content="<?php echo config('color'); ?>"/> <!-- content="#009da0" -->
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="<?php echo $site_title; ?>"/>
	<meta property="og:description" content="<?php echo $site_description; ?>"/>
	<meta property="og:image" content="<?php echo $site_image; ?>" />
	<meta property="article:author" content="<?php echo $site_author; ?>" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>var site_url = "<?php echo site_url(fmodule()); ?>";var fmodule = "<?php echo fmodule(); ?>";</script>
    <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/i18n/i18n-en.min.js<?php echo $asset_update; ?>" charset="UTF-8"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/fontawesome/css/all.css<?php echo $asset_update; ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/main.min.css<?php echo $asset_update; ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/track.css<?php echo $asset_update; ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/styles/badge-abbreviations.css<?php echo $asset_update; ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/styles/screen.min.css<?php echo $asset_update; ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/styles/color/<?php echo config('fcolor'); ?>.min.css<?php echo $asset_update; ?>">
	<style>
	/* BLUE 002158 */
	
	.pageHero{background-image:url(<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/i/bg-elements/page-hero.png);background-repeat:no-repeat;background-position:100% 0;margin-bottom:0rem;padding:6rem 0;position:relative}
	@media (max-width:56.25em){
		.pageHero{background-image:url(<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/i/bg-elements/page-hero-small.png);background-repeat:no-repeat}
	}
	
	
	
	</style>
	
	<?php echo favicon(); ?>
	<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/font.css?family=Poppins:400,700" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/polyfill.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/fastclick/lib/fastclick.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/mustache.js/mustache.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/moment/min/moment-with-locales.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/moment-timezone/moment-timezone.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/object-fit-images/dist/ofi.browser.min.js<?php echo $asset_update; ?>"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/intersection-observer/polyfill/intersection-observer.min.js<?php echo $asset_update; ?>"></script>
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
	<meta name="apple-itunes-app" content="app-id=1138895159">
	