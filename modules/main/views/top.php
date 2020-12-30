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
							<?php echo imglogo(config('site_logo'),'logo',config('themes'),'id="mainLogo"'); ?>
						</picture>
						<span class="mobile"><?php echo imglogo(config('site_logo'),'logo',config('themes')); ?></span>
					</a>
					
					<?php $this->load->view('menu_atas'); ?>
					
					<!--<a href="<?php echo apps_url(3); ?>" class="navLink navOption" role="button" tabindex="0"><div class="icn user-w show-m"></div><span class="fantasySignInLabel">Sippadu</span></a>-->
					<a href="<?php echo apps_url(2); ?>" class="navLink navOption" role="button" tabindex="0"><div class="icn user-w show-m"></div><span class="fantasySignInLabel"><?php echo lang('Login'); ?></span></a>
					<div class="navOption search">
						<div class="searchBtn headerSearchButton" role="button" tabindex="0"><span class="visuallyHidden">Search</span><div alt="" class="icn search-w"></div></div>
					</div>
				</section>
				<div class="searchBar searchBarContainer" role="search">
					<div class="searchBox">
						<div class="plSearch">
							<input id="searchPremierLeagueInput" class="searchGlobal searchInput searchInputContainer" type="text" placeholder="Search" value="<?php echo $search_keyword; ?>">
							<label for="searchPremierLeagueInput" class="visuallyHidden">Search</label>
							<span class="focusBorder"></span>
							<span class="searchBtnContainer searchButtonContainer">
								<input type="submit" class="searchInputBtn" onclick="search_data();" tabindex="0">
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