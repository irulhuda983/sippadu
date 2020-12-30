/*globals PULSE, PULSE.app */

( function( app ) {
	"use strict";

	/**
	 * club navigation used on pages with a full header
	 * @param {object} element DOM element on which ti init widget
	 * @param {object} config configuration object to init wuth
	 * @constructor
	 */
	app.clubNavigation = function( element, config ) {
		this.element = element;
		this.setListeners();
	};

	/**
	 * set widget event listeners
	 */
	app.clubNavigation.prototype.setListeners = function() {

		var self = this;
		this.element.querySelector( '.clubNavigation .clubSitesHeading' ).addEventListener( 'click', function( e ) {
			self.element.classList.toggle( "open" );
		} );
	};

	var widgets = document.querySelectorAll( '.clubNavigation[data-script="pl_global-header"]' );
	for( var i = 0; i < widgets.length; i ++ ) {
		new app.clubNavigation( widgets[ i ], {} );
	}

} )( PULSE.app );
/*globals PULSE, PULSE.app, PULSE.common, PULSE.core */
(function ( app, common, core ) {
	"use strict";

	/**
	 * constructor of the navigation, collect all the elements necessary
	 * and then set listeners on these
	 *
	 * @param {object} element DOM element on which ti init widget
	 * @param {object} config configuration object to init with
	 * @constructor
	 */
	app.mainNavigation = function( element, config ) {
		var _self = this;

		// elements
		_self.element =  element;
		_self.mainMoreLinksButton = _self.element.querySelector( '.moreLinks' );
		_self.mobileMenuExpander = _self.element.querySelector( '#hamburgerToggle' );

		//Search
		_self.mainSearchButton = _self.element.querySelector( '.headerSearchButton' );
		_self.searchBarContainer = _self.element.querySelector( '.searchBarContainer' );
		_self.searchInputContainer = _self.element.querySelector( '.searchInputContainer' );

		_self.mainLogoElement = document.getElementById( 'mainLogo' );

		_self.pageLinks = _self.element.querySelector( '.pageLinks' );
		_self.dropDownLinks = _self.element.querySelectorAll( '.pageLinks > li:not(.noDrop)' );
		_self.mobileNav = _self.pageLinks.querySelectorAll( '[role="button"].navLink' );

		_self.navElement = _self.element.querySelector( '.navBar' );

		_self.pageLinks = _self.element.querySelector( '.headerSearchButton' );

		//subnavigation
		_self.subNav = document.querySelector( '.subNav .moreList' );
		_self.subNavMore = document.querySelector( '.subNav .moreListBtn' );

		_self.globalNav = document.querySelector( '.masthead .fixedContainer' );

		_self.masthead = document.querySelector( '.masthead' );

		//club list ( refernces clubs-list.ftl )
		_self.clubsList = document.querySelector( 'nav.clubNavigation' );

		//values
		_self.navbarOffsetTop = _self.navElement.offsetHeight;
		_self.bottom = _self.navElement.offsetTop;
		_self.pageOffsetTop = window.pageYOffset;

		_self.setListeners();
	};

	/**
	 * set navbar event listeners
	 */
	app.mainNavigation.prototype.setListeners = function() {
		var _self = this;

		// listener for hamburger menu
		core.event.listenForMultiple( _self.mobileMenuExpander, [ 'keypress', 'click' ], function() {

			document.querySelector( 'body' ).classList.toggle( 'mastheadOpen' );
		} );

		// sub navigation more option
		core.event.listenForMultiple( _self.subNavMore, [ 'keypress', 'click' ], function() {

			_self.subNav.classList.toggle( 'open' );
		} );


		// listen for keyboard enter on elements with dropdowns and toggle open, close on blur
		for ( var i = 0; i < _self.dropDownLinks.length; i ++) {
			_self.dropDownLinks[i].addEventListener( 'keypress', function( evt ) {
				if (evt.which === 13) {
					evt.preventDefault();
					core.style.toggleClass( this, 'open' );
				}
			});

			// _self.dropDownLinks[i].addEventListener( 'blur', function( evt ) {
			// 	common.removeClass( this, 'open' );
			// });

			_self.dropDownLinks[i].addEventListener( 'blur', function( evt ) {
				if (evt.relatedTarget && evt.relatedTarget.closest('.dropdown') !== null) {
					// we've tabbed into a child element so leave open
					return;
				} else {
					core.style.removeClass( this, 'open' );
				}
			}, true);
		}

		if ( _self.mainSearchButton )
		{
			// search button
			core.event.listenForMultiple( _self.mainSearchButton, [ 'keypress', 'click' ], function() {
				core.style.toggleClass( _self.mainSearchButton, 'active' );
				core.style.toggleClass( _self.searchBarContainer, 'open' );
				core.style.toggleClass( _self.masthead, 'searchOpen' );
				_self.searchInputContainer.focus();
			} );
		}

		//mobile navigation items ( div's )
		for ( var x = 0; x < _self.mobileNav.length; x++ ) {

			core.event.listenForMultiple( _self.mobileNav[ x ], [ 'keypress', 'click' ], function( e ) {

				var noChildLink = e.target.getAttribute( 'data-nochildrenlink' );

				if ( noChildLink )
				{
					window.location.href = noChildLink;
				}
				else
				{
					//_self.subNav.classList.toggle( 'open' );
					for ( var y = 0; y < _self.mobileNav.length; y++ ) {
						_self.mobileNav[ y ].classList.remove( 'active' );
					}

					e.target.classList.add( 'active' );

					if( e.target.classList.contains( 'clubListMobileButton' ) ) {
						_self.clubsList.classList.add( "open" );
					} else {
						_self.clubsList.classList.remove( "open" );
					}
				}

			} );
		}

		var restyleGlobalNav = function( _self ) {
			_self.pageOffsetTop = window.pageYOffset;

			var imgHeight = Math.max(120 - _self.pageOffsetTop, 60);
			if(_self.mainLogoElement.clientHeight !== imgHeight){
				_self.mainLogoElement.style.height = imgHeight + 'px';
			}

			if( _self.pageOffsetTop >= _self.navbarOffsetTop ) {
				_self.navElement.classList.add( 'fixed' );
				_self.globalNav.classList.add( 'fixed' );
			} else {
				_self.navElement.classList.remove( 'fixed' );
				_self.globalNav.classList.remove( 'fixed' );
			}
		};

		var windowScrollListener = {
			method: function( args ) {
				restyleGlobalNav( args.scope );
			},
			args: {
				scope: _self
			}
		};

		core.event.windowOnScroll.add( windowScrollListener );
	};

	// initialise on video players
	var widgets = document.querySelectorAll( '.navContainer[data-script="pl_global-header"]' );
	Array.prototype.map.call( widgets, function( widget ){
		widget = new app.mainNavigation( widget , {} );
	} );



})( PULSE.app, PULSE.app.common, PULSE.core );

/*globals PULSE, PULSE.core */

(function( app, core, common ){
	"use strict";

	/**
	 * Search Redirect which redirects the user to the search page
	 * @param {object} element element in which has a search continer
	 * @param {config} config configuration object for the redirect
	 */
	app.searchHeaderRedirect = function( element, config ) {

		var _self = this;

		_self.element = element;

		_self.url = '/search';

		_self.searchInputContainer = _self.element.querySelector( '.searchInputContainer' );
		_self.searchButtonContainer = _self.element.querySelector( '.searchButtonContainer' );

		_self.term = '';

		_self.setListeners();
	};

	app.searchHeaderRedirect.prototype.setListeners = function()
	{
		var _self = this;

		_self.searchInputContainer.addEventListener( 'keypress', function( e ) {
		    var keyCode = e.keyCode || e.which;
		    if (keyCode == '13'){
		    	_self.searchTerm();
		    }
		} );

		_self.searchInputContainer.addEventListener( 'keyup', function( e )
		{
			if ( _self.searchInputContainer.value.length > 0 )
		    {
		    	core.style.addClass( _self.searchButtonContainer, 'active' );
		    }
		    else
		    {
		    	core.style.removeClass( _self.searchButtonContainer, 'active' );
		    }
		} );

		_self.searchButtonContainer.addEventListener( 'click', function( e ) {
			_self.searchTerm();
		} );
	}

	app.searchHeaderRedirect.prototype.searchTerm = function()
	{
		var _self = this;

		if ( core.style.hasClass( _self.searchButtonContainer, 'active' ) )
		{
			var newUrl = _self.url;
			var term = _self.searchInputContainer.value;

			if ( term && term != '' )
			{
				newUrl += "?term=" + term;
			}

			window.location.href = newUrl;
		}
	}

	var widgets = document.querySelectorAll( '[data-widget="search-header-redirect"]' );
	for( var i = 0; i < widgets.length; i++ ) {
		new app.searchHeaderRedirect( widgets[ i ], {} );
	}

}( PULSE.app, PULSE.core, PULSE.app.common ));