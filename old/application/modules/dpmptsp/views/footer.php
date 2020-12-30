	<footer class="mainFooter">
		<div class="footerContent">
			<?php if($data_menu_bawah->num_rows() > 0){ ?>
			<div class="wrapper">
				<div class="footerCol double">
					<h3 class="subHeader">Layanan Perizinan</h3>
					<ul role="menu">
						<?php 
						foreach($data_menu_bawah->result() as $mb){
							echo '
							<li><a href="'.autolink_menu($mb->ID_Menu).'" role="menuitem"><span class=" link">'.$mb->Nm_Menu.'</span></a></li>';
						}
						?>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="footerCorporate" data-script="pl_footer" data-widget="footer-corporate">
			<div class="wrapper col-12">
				<ul role="menu">
					<li><strong class=""><?php echo copyright(true); ?></strong></li>
					<li><a href="#" class="" role="menuitem">Terms & Conditions</a></li>
					<li><a href="#" class="backToTopContainer" role="menuitem">Back To Top</a></li>
				</ul>
			</div>
		</div>
	</footer>

	
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/pulse-js/dist/pulse.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/main.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl/pl_global-header.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl/pl_video-player.js"></script>
	<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl/pl_footer.js"></script>