	<footer class="mainFooter">
		<!--<div class="footerSponsorStrip">
            <ul>
				<li>
					<a href="https://www.easports.com/fifa?utm_source=premier-league-website&utm_campaign=website&utm_medium=link" target="_blank">
						<span alt="" class="large icn sponsor-footer-ea"></span>
						<span alt="" class="small icn sponsor-footer-ea-sm"></span>
						<img src="http://dpmptsp.com/ci3/assets/main/images/berita/1_tSyuv3ZRCfsSD5aXB7v8DQ_original.png" />
						<span alt="" class="type">Lead Partner<span class="visuallyHidden">EA SPORTS</span></span>
					</a>
				</li>
            </ul>
        </div>-->
		
		<?php if($data_menu_bawah->num_rows() > 0){ ?>
		<div class="footerContent">
			<div class="wrapper">
				<?php foreach($data_menu_bawah->result() as $kb){ ?>
				<div class="footerCol double">
					<h3 class="subHeader"><?php echo ($kb->Show_Title ? lang($kb->Nm_Kategori,true) : '&nbsp;'); ?></h3>
					<ul role="menu">
						<?php 
						foreach(data_menu_bawah($kb->ID_Kategori)->result() as $mb){
							echo '
							<li><a href="'.autolink_menu($mb->ID_Menu).'" role="menuitem"><span class=" link">'.lang($mb->Nm_Menu,TRUE).'</span></a></li>';
						}
						?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		
		<div class="footerCorporate" data-script="pl_footer" data-widget="footer-corporate">
			<div class="wrapper col-12">
				<ul role="menu">
					<li><strong class=""><?php echo copyright(true); ?></strong></li>
					<!--<li><a href="#" class="" role="menuitem">Terms & Conditions</a></li>-->
					<!--<li><a href="#" class="backToTopContainer" role="menuitem">Back To Top</a></li>-->
					<?php 
					if($data_language->num_rows() > 0){
						$h = '';
						foreach($data_language->result() as $lang){
							$site_lang = $this->session->userdata('site_lang');
							if($lang->Kd_Lang == $site_lang){
								$h .= '<li><b>'.$lang->Nm_Lang.'</b></li>';
							}
							else{
								$h .= '<li><a role="menuitem" href="javascript:void(0);" onclick="window.location.href=\''.site_url(fmodule('language/get/'.$lang->Kd_Lang)).'\'">'.$lang->Nm_Lang.'</a></li>';
							}
						}
						echo $h;
					} 
					?>
				</ul>
			</div>
		</div>
	</footer>

	<script>$("#searchPremierLeagueInput").keyup(function(event) {if (event.keyCode === 13) {search_data();}});</script>
	<script async="async" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/bower/pulse-js/dist/pulse.min.js<?php echo $asset_update; ?>"></script>
	<script async="async" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/main.min.js<?php echo $asset_update; ?>"></script>
	<script async="async" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl/pl_global-header.min.js<?php echo $asset_update; ?>"></script>
	<script async="async" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl/pl_video-player.min.js<?php echo $asset_update; ?>"></script>
	<script async="async" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/scripts/pl/pl_footer.min.js<?php echo $asset_update; ?>"></script>
	<script async="async" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/main.min.js<?php echo $asset_update; ?>"></script>
	