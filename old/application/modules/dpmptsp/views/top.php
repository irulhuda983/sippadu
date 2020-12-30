<header class="masthead">
		<!--<a class="skipTo" href="#mainNav">Skip to main navigation</a>
		<a class="skipTo" href="#mainContent">Skip to main content</a>-->
		
		<div class="fixedContainer fixed">
			<div class="navContainer"  data-script="pl_global-header">
				<section id="mainNav" class="navBar fixed" role="menubar">
					<div class="menuBtn" role="button" id="hamburgerToggle">
						<span>Menu</span>
						<div class="menuBtnContainer">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
					<a href="<?php echo site_url(fmodule()); ?>" class="plLogo">
						<picture>
							<img id="mainLogo" src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/i/elements/logo.png">
						</picture>
						<span class="mobile"><img src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/resources/ver/i/elements/logo.png"></span>
					</a>
					
					<?php $this->load->view('menu_atas'); ?>
					
					<a href="<?php echo site_url('sippadu'); ?>" class="navLink navOption" role="button" tabindex="0"><div class="icn user-w show-m"></div><span class="fantasySignInLabel">Login</span></a>
					<div class="navOption search">
						<div class="searchBtn headerSearchButton" role="button" tabindex="0"><span class="visuallyHidden">Search</span><div alt="" class="icn search-w"></div></div>
					</div>
				</section>
				<div class="searchBar searchBarContainer" role="search">
					<div class="searchBox">
						<div class="plSearch">
							<input id="searchPremierLeagueInput" class="searchInput searchInputContainer" type="text" placeholder="Search">
							<label for="searchPremierLeagueInput" class="visuallyHidden">Search</label>
							<span class="focusBorder"></span>
							<span class="searchBtnContainer searchButtonContainer">
								<input type="submit" class="searchInputBtn" tabindex="0">
								<span class="btnBg"></span>
								<span alt="" class="icn search-sm"><span class="visuallyHidden">Submit search</span></span>
							</span>
						</div>
					</div>
				</div>
				<div class="searchOverlay"></div>
			</div>
			
			<?php $this->load->view('menu_tengah'); ?>
			
		</div>
	</header>