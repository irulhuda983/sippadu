/*globals PULSE, PULSE.app, PULSE.ui */

(function( app, ui, common, core, i18n ){
	"use strict";


	/**
	 * A tabbed UI to manage home page content on small screens
	 * @param {object} element element in which to create/render the tabs
	 * @param {config} config configuration object
	 */
	app.homeTabs = function( element, config ) {

		var _self = this;

		_self.tabMatches = i18n.lookup( "label.hometab.matches" );
		_self.tabLatest = i18n.lookup( "label.hometab.latest" );	

		var createTabItems = function(){
			var items = [];
			var main = document.getElementById( "mainContent" );

			var latestTab = main.querySelectorAll( ".sidebarPush" )[0];
			latestTab.setAttribute( "data-ui-tab", _self.tabLatest );

			var matchesTab = main.querySelectorAll( ".fixedSidebar" )[0];
			matchesTab.setAttribute( "data-ui-tab", _self.tabMatches );

			items.push.apply( items, [ matchesTab, latestTab ] );

			return items;
		};

		var tabConfig = {
			tabItems: createTabItems(),
			tabLinkWrap: element.querySelector( element.getAttribute('data-tab-wrap') ),
			builtClass: "tabbedHome",
			defaultIndex: 1
		};

		_self.tabs = new ui.tab( tabConfig );

	};

	var widgets = document.querySelectorAll( '[data-widget="home-tabs"]' );

	Array.prototype.map.call( widgets, function( widget ){
		widget = new app.homeTabs( widget, {} );
	} );

}( PULSE.app, PULSE.ui, PULSE.app.common, PULSE.core, PULSE.I18N ));

/*globals PULSE, PULSE.app, PULSE.ui */

(function( app, ui, core ){
	"use strict";


	/**
	 * A tabbed UI to manage home page content on small screens
	 * @param {object} element element in which to create/render the tabs
	 * @param {config} config configuration object
	 */
	app.stadiumTabs = function( element, config ) {

		var _self = this;
		_self.element = element;


		var tabItemFilter = function( tab ){
			if(tab.getAttribute !== null){
				return tab.getAttribute( 'data-ui-tab' );
			}
			return false;
		};

		var tabItems = [];

		if ( config.tabClass )
		{
			tabItems = document.getElementsByClassName( config.tabClass );
		}
		else
		{
			tabItems = core.dom.getNextSiblings( element, tabItemFilter );
		}

		// stadiumTabFired event generated and triggered when tab is selected
		// listened for within the stadium map script
		_self.stadiumTabEvent = new Event('stadiumTabFired');
		var tabFired = function( tab ){
			document.dispatchEvent( _self.stadiumTabEvent );
		};

		var tabConfig = {
			tabItems: tabItems,
			tabLinkWrap: element.querySelector( config.tabWrap ),
			tabParam: config.tabParam,
			builtClass: config.builtClass,
			tabCallback: tabFired
		};

		_self.tabs = new ui.tab( tabConfig );


	};


	var widgets = document.querySelectorAll( '[data-widget="stadium-tabs"]' );

	Array.prototype.map.call( widgets, function( widget ){
		var config = {
			tabWrap: widget.getAttribute('data-tab-wrap'),
			tabParam: widget.getAttribute('data-tab-param'),
			builtClass: widget.getAttribute('data-built-class') || "tabbedContent",
			tabClass: widget.getAttribute('data-tab-class')
		};	
		widget = new app.stadiumTabs( widget, config );
	} );

}( PULSE.app, PULSE.ui, PULSE.core ));

/*globals PULSE, PULSE.app, PULSE.ui */

(function( app, ui, common, core ){
	"use strict";

	/**
	 * A list of League tables that is initialised in freemarker and displayed within tabs
	 * @param {object} element element in which to create/render the league table
	 * @param {config} config configuration object for the league table
	 */
	app.tabbedContent = function( element, config ) {

		var _self = this;

		var tabItemFilter = function( tab ){
			if(tab.getAttribute !== null){
				return tab.getAttribute( 'data-ui-tab' );
			}
			return false;
		};

		var tabItems = [];

		if ( config.tabClass )
		{
			tabItems = document.getElementsByClassName( config.tabClass );
		}
		else
		{
			tabItems = core.dom.getNextSiblings( element, tabItemFilter );
		}

		if( tabItems.length === 0 ){
			tabItems = document.querySelectorAll( '[data-ui-tab]' );
		}

		app.updateTabParam = config.updateTabParam;

		var tabConfig = {
			tabItems: tabItems,
			tabLinkWrap: element.querySelector( config.tabWrap ),
			tabParam: config.tabParam,
			builtClass: config.builtClass,
			buildCallback: config.buildCallback,
			tabCallback: config.tabCallback
		};

		_self.tabs = new ui.tab( tabConfig );

		// Activate tab as referenced by a query param in the url.
		// Teams would ideally be referenced by the tab name however that is a language dependant field,
		// instead using "data-filter-list" on the table as this is explicitly set to FIRST, U21 or U18
		var activeTab = core.url.getParameterByName("team");
		if (activeTab) {
			for (var i=0; i < _self.tabs.config.tabItems.length; i++) {
				if (_self.tabs.config.tabItems[i].getAttribute( 'data-filter-list' ).toLowerCase() === activeTab.toLowerCase()) {
					_self.tabs.showTabByIndex(i);
					// timeout to allow tabAwareWidgets to initialise ensuring content loads
					setTimeout(function(){
						app.globalTabbedContentCallback( _self.tabs, config );
					},750)
					break;
				}
			}
		}
	};

	/**
	 * add an indication to the widget html that will be picked up if it is tab aware
	 * we cannot rely on the fact that the tab aware instance will be initialised at this
	 * point
	 *
	 * @param {object} tab the tab passed by PULSE.ui.tab
	 */
	app.globalTabbedContentBuildCallback = function( tab ) {
		tab.config.current.content.setAttribute( "data-tab-aware-default", "true" );
	};

	/**
	 * when we select another tab outside of the default tab, look for tab aware widgets in the
	 * page and if we find this html widget element in the list, activate it. The tab
	 * aware element will do nothing in the case that this has already been called
	 *
	 * update the url based on the tab selected
	 *
	 * @param {object} tab the tab passed by PULSE.ui.tab
	 */
	app.globalTabbedContentCallback = function( tab, config ) {

		if( app.tabAwareWidgets && app.tabAwareWidgets.length ) {
			app.tabAwareWidgets.map( function( widget ) {

				if( widget.match( tab.config.current.content ) ) {
					widget.activate();
				}
			} );
		}

		if ( app.updateTabParam )
		{
			//Update url query string to reflect selected tab
			var tabItems = tab.config.tabItems;
			for (var i=0; i < tabItems.length; i++) {
				if ( core.style.hasClass( tabItems[i], 'active' ) ) {
					var url = core.url.updateUrlStringParam( window.location.href, 'team', tabItems[i].getAttribute( 'data-filter-list' ) );
					window.history.pushState({}, document.title, url );
					break;
				}
			}
		}
	};

	var widgets = document.querySelectorAll( '[data-widget="tabbed-content"]' );

	Array.prototype.map.call( widgets, function( widget ){
		var config = {
			tabWrap: widget.getAttribute('data-tab-wrap'),
			tabParam: widget.getAttribute('data-tab-param'),
			builtClass: widget.getAttribute('data-built-class') || "tabbedContent",
			tabClass: widget.getAttribute('data-tab-class'),
			buildCallback: app.globalTabbedContentBuildCallback,
			tabCallback: app.globalTabbedContentCallback,
			updateTabParam : widget.getAttribute('data-update-tab-param')
		};
		widget = new app.tabbedContent( widget, config );
	} );

}( PULSE.app, PULSE.ui, PULSE.app.common, PULSE.core ));
