
(function( ui, core ){
	"use strict";

	/**
	 * MoreNav Object:
	 * @typedef {Object} MoreNav
	 */

	var ENTER_KEY = 13;

	/**
	 * Config Object:
	 * @typedef {Object} Config
	 * @property {String} [moreNavUiSelector] Data attribute selector used to wrap the whole nav element
	 * @property {String} [dataNavIndexSelector] data attribute selector used to index the nav items
	 * @property {HTMLElement} [navWrap] A single wrapping HTML element with all the nav elements
	 * @property {String} [navWrapTag] HTML tag used to wrap more nav items
	 * @property {String} [navItemTag] HTML tag used to build more nav items
	 * @property {String} [moreWrapClass] CSS Class used to wrap the generated more nav
	 * @property {String} [moreToggleClass] CSS Class for the more toggle button
	 * @property {String} [moreDropdownClass] CSS Class for the more dropdown
	 * @property {String} [iconPrefix] sprite calling class e.g. icon, icn
	 * @property {String} [iconClass] sprite name class e.g. chevron-down, caret-down
     * @property {String} [moreLabel] Text used on the more element
     * @property {String} [openClass] CSS class used when the more dropdown is open
	 * @property {String} [hideClass] CSS class used for hiding nav elements
	 * @property {Number} [toleranceWidth] Pixel amount to set as tolerance for adjusting items in more nav
	 * @property {Function} [buildCallback] Function to be called when a nav ui is built - receives full nav object
	 */

	/**
	 * @namespace ui.moreNav.private
	 */

	/* PRIVATE VARIABLES */
	var resizeTimer;

	/* PRIVATE METHODS */

	var setDefaults = function( config ){


		if( !config.dataNavIndexSelector ){
			config.dataNavIndexSelector = 'data-nav-index';
		}
		if( !config.navWrap ){
			config.navWrap = document.querySelector( '[data-ui-more-nav]' );
		}
		if( !config.navWrapTag ){
			config.navWrapTag = 'ul';
		}
		if( !config.navItemTag ){
			config.navItemTag = 'li';
		}

		if( !config.moreWrapClass ){
			config.moreWrapClass = 'more';
		}

		if( !config.moreLabel ){
			config.moreLabel = 'More';
		}

		if( !config.moreToggleClass ){
			config.moreToggleClass = 'moreToggle';
		}
		if( !config.moreDropdownClass ){
			config.moreDropdownClass = 'moreToggleDropdown';
		}

		if( !config.iconPrefix ){
			config.iconPrefix = 'icn';
		}
		if( !config.iconClass ){
			config.iconClass = 'chevron-down';
		}

		if( !config.activeClass ){
			config.activeClass = 'active';
		}
		if( !config.openClass ){
			config.openClass = 'open';
		}
		if( !config.hideClass ){
			config.hideClass = 'hide';
		}
		if( !config.toleranceWidth ){
			config.toleranceWidth = 20;
		}
		config.navs = [];
		return config;

	};


	var buildNavs = function( _self ){

		_self.config.navItemsWrap = _self.config.navWrap.querySelector( _self.config.navWrapTag );

		var navIndex = 0;

		Array.prototype.map.call( _self.config.navItemsWrap.children, function( el ){
			if( el.tagName.toLowerCase() === _self.config.navItemTag.toLowerCase() ){
				el.setAttribute( _self.config.dataNavIndexSelector , navIndex++ );
				_self.config.navs.push( el );
			}
		} );

		createMoreToggle( _self );
		checkAndSetActiveTab(_self);

	};

	var createMoreToggle = function( _self ) {
		_self.moreNavs = {};
		_self.moreNavs.visible = false;

		var moreNav = document.createElement(_self.config.navItemTag);
		core.style.addClass( moreNav, _self.config.moreWrapClass );
		_self.moreNavs.nav = moreNav;

		var moreButton = document.createElement('div');
		moreButton.setAttribute( 'tabindex', 0);
		core.style.addClass( moreButton, _self.config.moreToggleClass );
		moreButton.textContent = _self.config.moreLabel;
		moreButton.addEventListener( 'click', function(){
			toggleMoreDropdown( _self );
		});

		moreButton.addEventListener( 'keypress', function(evt){
			var keyCode = evt.which || evt.keyCode;

			if ( keyCode === ENTER_KEY ) {
				toggleMoreDropdown( _self );
			}
		});
		moreNav.appendChild( moreButton );

		var moreIcon = document.createElement('span');
		core.style.addClass( moreIcon, _self.config.iconPrefix );
		core.style.addClass( moreIcon, _self.config.iconClass );
		moreButton.appendChild( moreIcon );
		_self.moreNavs.button = moreButton;

		var moreDropdown = document.createElement(_self.config.navWrapTag);
		core.style.addClass( moreDropdown, _self.config.moreDropdownClass );
		moreNav.appendChild( moreDropdown );
		_self.moreNavs.dropdown = moreDropdown;

		_self.config.navItemsWrap.appendChild( moreNav );
		moreNav.isMoreNav = true;
		_self.config.navs.push( moreNav );

		_self.moreNavs.wrapWidth = 0; // set to 0 to force check on first run
		checkMoreToggle( _self );

		var windowResizeListener = {
			method: function( args ) {
				checkMoreToggle( args.scope );
			},
			args: {
				scope: _self
			}
		};

		core.event.windowResize.add( windowResizeListener );

	};

	var checkMoreToggle = function( _self ) {
		//Take into consideration the nav items wrapper padding
		var navItemsWrapStyle = getComputedStyle( _self.config.navItemsWrap);
		var navItemsWrapPadding = parseInt(navItemsWrapStyle.paddingLeft) + parseInt(navItemsWrapStyle.paddingRight);
		var wrapWidth = core.style.outerWidth(_self.config.navWrap) - (navItemsWrapPadding + _self.config.toleranceWidth);

		// check to see if the width has changed
		if ( _self.moreNavs.wrapWidth !== wrapWidth ) {

			var widthRemaining = wrapWidth;
			toggleShowMoreNav(_self, true);
			widthRemaining -= core.style.outerWidth(_self.moreNavs.nav);
			toggleShowMoreNav(_self, false);

			_self.config.navs.forEach(function(nav, i) {
				if(!nav.isMoreNav) {
					var navActivatorWidth = 0;
					if(widthRemaining !== -1) {
						//We have to show tab before working out the width
						showNavButton( nav, _self );
						navActivatorWidth =  core.style.outerWidth(nav);
					}
					if ( widthRemaining < navActivatorWidth ) {
						hideNavButton( nav, _self );
						widthRemaining = -1;
					} else {
						widthRemaining -= navActivatorWidth;
					}
				}
			});

			if(widthRemaining === -1){
				toggleShowMoreNav(_self, true);
			}

			checkAndSetActiveTab( _self );

			// update stored width
			_self.moreNavs.wrapWidth = wrapWidth;

		}

	};

	var toggleShowMoreNav = function ( _self, show ) {

		if ( show ) {
			core.style.addClass(_self.config.navItemsWrap, 'showMoreEnabled');
			core.event.listenForOutsideClick.addElement( _self.moreNavs.dropdown, function() {
				toggleMoreDropdown( _self, true );
			}, _self.moreNavs.button );
		} else {
			core.style.removeClass(_self.config.navItemsWrap, 'showMoreEnabled');
			core.event.listenForOutsideClick.removeElement( _self.moreNavs.dropdown );
		}

	};

	var toggleMoreDropdown = function ( _self, forceClose ) {

		if ( forceClose ) {
			core.style.removeClass( _self.moreNavs.nav, _self.config.openClass );
		} else {
			core.style.toggleClass( _self.moreNavs.nav, _self.config.openClass );
		}

	};

	var hideNavButton = function ( nav, _self ) {

		if ( core.style.hasClass( nav, _self.config.hideClass ) ) {
			return;
		}

		if ( !nav.navClone ) {
			nav.navClone = nav.cloneNode( true );
		}

		nav.isHidden = true;
		core.style.addClass( nav, _self.config.hideClass );

		var listItems = _self.moreNavs.dropdown.getElementsByTagName( _self.config.navItemTag );
		if ( listItems.length === 0) {
			_self.moreNavs.dropdown.appendChild( nav.navClone );
		} else {
			for (var i = 0; i < listItems.length; i++) {
				if ( nav.index > listItems[i].getAttribute(_self.config.dataNavIndexSelector) ) {
					_self.moreNavs.dropdown.insertBefore( nav.navClone, listItems[i]);
					return;
				} else if ( i === (listItems.length - 1) ) {
					_self.moreNavs.dropdown.appendChild( nav.navClone );
				}
			}
		}

	};

	var showNavButton = function ( nav, _self ) {

		if ( !core.style.hasClass( nav, _self.config.hideClass ) ) {
			return;
		}

		nav.isHidden = false;
		core.style.removeClass( nav, _self.config.hideClass );
		_self.moreNavs.dropdown.removeChild( nav.navClone);

	};


	var checkAndSetActiveTab = function( _self ){
		var activeInMoreTab = false;
		for (var i = 0; i < _self.moreNavs.dropdown.childNodes.length; i++) {
			if(_self.moreNavs.dropdown.childNodes[i].classList.contains(_self.config.activeClass)){
				activeInMoreTab = true;
				break;
			}
		}
		if(activeInMoreTab) {
			core.style.addClass(_self.moreNavs.dropdown.parentNode, _self.config.activeClass );
		} else {
			core.style.removeClass(_self.moreNavs.dropdown.parentNode, _self.config.activeClass );
		}

	};

	var init = function( _self ){
		buildNavs( _self );
	};

	/* PUBLIC OBJECT */

	/**
	 * Constructor for MoreNav object
	 *
	 * @param {Object.<Config>} [config] Config properties used when consructing a nav
	 * @constructor
	 */
	ui.moreNav = function( config ){

		var _self = this;
		_self.config = setDefaults( config || {} );
		init( _self );
		if( typeof _self.config.buildCallback === 'function' ){
			_self.config.buildCallback( _self );
		}

	};

    /**
     * Will perform the calculations again for showing/hiding elements in the more nav
     */
    ui.moreNav.prototype.reset = function() {
        var _self = this;
        _self.moreNavs.wrapWidth = 0;
        checkMoreToggle( _self );
    };

}( PULSE.ui, PULSE.core ));


/*globals PULSE.ui, PULSE.core */
( function( ui, core ) {


	/**
	 * @namespace ui.pagination.private
	 */

	/**
	 * draw the pagination from the template
	 *
	 * @param {ui.scrollpagination} _self contextual reference to the object that is calling the function
	 */
	var drawPagination = function( _self )
	{
		_self.element.innerHTML = Mustache.render( _self.paginationTemplate, {} );
		_self.previousContainer = _self.element.getElementsByClassName( 'paginationPreviousContainer' )[ 0 ];
		_self.nextContainer = _self.element.getElementsByClassName( 'paginationNextContainer' )[ 0 ];
	};

	/**
	 * set the next/previous listeners for the pagination
	 *
	 * @param {ui.pagination} _self contextual reference to the object that is calling the function
	 */
	var setListeners = function( _self )
	{
		_self.previousContainer.addEventListener( 'click', function( evt ) {
			if ( ! core.style.hasClass( _self.previousContainer, 'inactive' ) )
			{
				_self.pageInfo.page--;
				_self.refreshPagination( _self.config.callback );
			}
		} );

		_self.nextContainer.addEventListener( 'click', function( evt ) {
			if ( ! core.style.hasClass( _self.nextContainer, 'inactive' ) )
			{
				_self.pageInfo.page++;
				_self.refreshPagination( _self.config.callback );
			}
		} );
	};

	/**
	 * create pagination, for requesting more content
	 *
	 * @param {HTMLElement} element Element to hold the pagination
	 * @param {config} config Configuration for the pagination :
	 	- pageInfo : Pagination Object:
	 		- page
	 		- pageSize
	 		- numEntries
	 		- numPages
	 	- callback: Callback when a new page is requested
	 */
	ui.pagination = function( element, config ) {
		var _self = this;

		_self.config = config || {};
		_self.element = element;
		_self.paginationTemplate = config.paginationTemplate;

		drawPagination( _self );
		_self.initPagination( config.pageInfo );

		setListeners( _self );
	};

	ui.pagination.prototype.initPagination = function( pageInfo )
	{
		var _self = this;

		_self.pageInfo = pageInfo || {};
		if ( !_self.pageInfo.page )
		{
			_self.pageInfo.page = 0;
		}

		if ( !_self.pageInfo.pageSize )
		{
			_self.pageInfo.pageSize = 10;
		}

		if ( !_self.pageInfo.numEntries )
		{
			_self.pageInfo.numEntries = 0;
		}

		if ( !_self.pageInfo.numPages && parseInt( _self.pageInfo.numEntries ) > -1 )
		{
			_self.pageInfo.numPages = Math.ceil( parseInt( _self.pageInfo.numEntries ) / parseInt( _self.pageInfo.pageSize ) );
		}
		_self.refreshPagination();
	};

	/**
	 * refresh pagination to calculate whether a button should be inactive or not. Do callback if applicable
	 *
	 * @param {function} callback Optional callback when refreshing pagination
	 */
	ui.pagination.prototype.refreshPagination = function( callback )
	{
		var _self = this;

		if  ( ( _self.pageInfo.numPages !== undefined && ( _self.pageInfo.page >= _self.pageInfo.numPages - 1 || _self.pageInfo.numPages < 1 ) ) || ( _self.pageInfo.numPages === undefined && _self.pageInfo.currentSize < _self.pageInfo.pageSize ) )
		{
			_self.pageInfo.page = ( _self.pageInfo.numPages !== undefined ) ? _self.pageInfo.numPages - 1 : _self.pageInfo.page;
			core.style.addClass( _self.nextContainer, 'inactive' );
		}
		else
		{
			core.style.removeClass( _self.nextContainer, 'inactive' );
		}

		if ( _self.pageInfo.page > 0 )
		{
			core.style.removeClass( _self.previousContainer, 'inactive' );
		}
		else
		{
			_self.pageInfo.page = 0;
			core.style.addClass( _self.previousContainer, 'inactive' );
		}
		if ( callback && _self.config.target )
		{
			callback.call( _self.config.target, _self.pageInfo );
		}
	};

	ui.pagination.prototype.updateCurrentSize = function( size )
	{
		var _self = this;

		_self.pageInfo.currentSize = size;
		_self.refreshPagination();
	};

} )( PULSE.ui, PULSE.core );

/*globals PULSE, PULSE.ui, PULSE.core */

(function( ui, core ){
	"use strict";

	/**
	 * ShareText Object:
	 * @typedef {Object} ShareText
	 */

	/**
	 * Config Object:
	 * @typedef {Object} Config
     * @property {String} [activeClass] CSS class used when the share option is displayed
     * @property {String} [socialService] Data attribute of a social channel
     * @property {boolean} [hideUrl] Flag if the current page URL should also be shared with the selected text - default: true
     * @property {Integer} [delay] delay time in ms of when the social options should appear after selecting text
	 */

	/**
	 * @namespace ui.shareText.private
	 */

	/* PRIVATE METHODS */

	var setDefaults = function( config ) {

		if (!config.activeClass) {
			config.activeClass = 'active';
		}
        if (!config.socialService) {
            config.socialService = 'data-social-service';
        }
        if (config.hideUrl === undefined) {
            config.hideUrl = true;
        }
        if (!config.delay) {
            config.delay = 250;
        }

		return config;

	};

	var setEventListeners = function( _self ) {

        _self.contentElement.addEventListener('mousedown', function(e) {
            _self.mouseDown = true;
        });
        _self.contentElement.addEventListener('touchstart', function(e) {
            _self.mouseDown = true;
        });

        document.body.addEventListener('mouseup', function(e) {
            onPointerUp(e, _self);
        });

        document.body.addEventListener('touchend', function(e) {
           if (e.changedTouches.length) {
               onPointerUp(e.changedTouches[0], _self);
           }
        });

        document.body.addEventListener('mousedown', function() {
            closeShareOptions(_self);
        });

        document.body.addEventListener('keydown', function() {
            closeShareOptions(_self);
        });

        if (_self.shareChannels.length) {
            var eventFunc = function(e) {
                e.preventDefault();
                e.stopPropagation();

                if (typeof _self.config.channelSelectionCallback === 'function') {
                    _self.config.channelSelectionCallback( this, _self.selectedText );
                } else {
                    channelSelectionCallback( e, _self );
                }
            };
            var preventAction = function(e) {
                e.preventDefault();
            };

            for (var i = 0; i < _self.shareChannels.length; i++) {
                _self.shareChannels[i].addEventListener('mousedown', eventFunc);
                _self.shareChannels[i].addEventListener('touchstart', eventFunc);
                if (_self.shareChannels[i].getAttribute('prevent-action') !== null) {
                    _self.shareChannels[i].addEventListener('click', preventAction);
                }
            }
        }

	};

    var channelSelectionCallback = function(evt, _self) {
        // handle clicks on individual social clicks
        var clicked = _self.getSocialDataset( evt.currentTarget );
        if ( clicked && clicked.socialService ) {
            ui.socialHelpers[ clicked.socialService ].sharePage( null, false, _self.selectedText, _self.config.hideUrl, evt.currentTarget );
        }
    };

    var onPointerUp = function(e, _self) {
        if (_self.mouseDown) {
            _self.pointer = e;

            setTimeout(function() {
                checkTextSelection(_self);
                _self.mouseDown = false;
            }, _self.config.delay);
        }
    };

    var checkTextSelection = function (_self) {
        _self.selectedText = getSelectedText();

        if (_self.selectedText && _self.selectedText.length) {
            showShareOptions(_self);
        } else {
            closeShareOptions(_self);
        }
    };

    var getSelectedText = function () {

        var text = '';

        if (typeof window.getSelection !== 'undefined') {
            text = window.getSelection().toString();
        } else if (typeof document.selection !== 'undefined' && document.selection.type == 'Text') {
            text = document.selection.createRange().text;
        }

        if (String.prototype.trim) {
            text = text.trim();
        }

        return text;
    };

    var showShareOptions = function(_self) {
        core.style.addClass(_self.shareOptions, _self.config.activeClass);

        var y = _self.pointer.pageY - _self.contentElement.offsetTop;

        _self.shareOptions.style.left = (_self.shareOptions.offsetWidth ? _self.pointer.clientX - (_self.shareOptions.offsetWidth / 2) : _self.pointer.clientX) + 'px';
        _self.shareOptions.style.top = (_self.pointer.clientY + document.body.scrollTop) + 'px';
    };

    var closeShareOptions = function(_self) {
        core.style.removeClass(_self.shareOptions, _self.config.activeClass);
    };

	var init = function( _self ) {
        _self.contentElement = document.querySelector(_self.config.content);
        _self.shareOptions = document.querySelector(_self.config.shareOptions);
        _self.shareChannels = document.querySelectorAll(_self.config.shareChannels);

        if (_self.contentElement && _self.shareOptions) {
    		setEventListeners( _self );
        }
	};

	/* PUBLIC OBJECT */

	/**
	 * Constructor for shareText object
	 *
	 * @param {Object.<Config>} [config] Config properties used when consructing the text share functionality
	 * @constructor
	 */
	ui.shareText = function( config ){

		var _self = this;
		_self.config = setDefaults( config || {} );

		init( _self );

		if ( typeof _self.config.buildCallback === 'function' ) {
			_self.config.buildCallback( _self );
		}

	};

    /**
	 * move up the dom tree to find the element containing the desired data attributes. Do not traverse up past the
	 * widget container. return the data set attribute of the element.
	 *
	 * @param {object} element DOM Element on which to begin the traversal
	 * @returns {object} hash - dataset attribute of the element or fale if no element can be found
	 */
	ui.shareText.prototype.getSocialDataset = function( element ) {
		var _self = this,
            inspecting = element;

		do {
            if (inspecting) {
    			if( inspecting.getAttribute( 'data-social-service' ) ) {
    				return inspecting.dataset;
    			}
    			inspecting = inspecting.parentElement;
            } else {
                break;
            }
		} while ( inspecting !== _self.element );

		return false;
	};

}( PULSE.ui, PULSE.core ));


/*globals PULSE, PULSE.ui*/

( function( ui ) {

	/**
	 * @namespace ui.socialHelpers.private
	 */

	/**
	 * Create a set of basic functionality that social widgets will share
	 * Individual social helpers can be extended with extra functions in ./social-service
	 *
	 * @param {string} serviceName name of the social service, should correlate to an entry
	 * in socialLinks object
	 *
	 * @constructor
	 */
	var socialHelper = function( serviceName ) {

        var _self = this;
		_self.name = serviceName;

		_self.socialLinks = {
			"twitter" : { "shareUrl" : "http://www.twitter.com/intent/tweet?text=" },
			"facebook" : { "shareUrl" : "http://www.facebook.com/sharer/sharer.php?u=" },
			"googleplus" : { "shareUrl" : "http://plus.google.com/share?url=" },
			"whatsapp" : { "shareUrl" : "whatsapp://send?text=" },
			"email" : { }
		};

		_self.defaultWindowConfiguration = {
			"width" : "500",
			"height" : "500",
			"menubar" : 0,
			"location" : 1,
			"resizable" : 0,
			"scrollbars" : 0,
			"status" : 0,
			"titlebar" : 0,
			"toolbar" : 0
		};

	};

	/**
	 * Share a page url or the current page url ( if no url passed ) to the social
	 * media site with which the instance was created
	 *
	 * @param {string} url the url to share on the social media site
	 * @param {string} body optionally provide a text to share
	 * @param {boolean} doNotDisplayUrl flag if a URL should be shown with the shared text
     * @returns {string} url string inclusive of the encoded url
	 */
	socialHelper.prototype.buildShareUrl = function( url, body, service, doNotDisplayUrl ) {

		var _self = this,
            href = url ? url : window.location.href,
            share = doNotDisplayUrl ? '' : href;

		if ( body ) {
			share += " " + body;
		}
        if (service === 'facebook') {
            share = href;
        }

		return _self.socialLinks[ _self.name ].shareUrl + encodeURIComponent( share );
	};

	/**
	 * create s string representation of the configuration object provided so it can be
	 * used in the call to window.open, for example;
	 *
	 * "menubar=no,location=yes,resizable=yes,scrollbars=yes,status=yes"
	 *
	 * @param {object} windowConfiguration the configuration object to stringify
	 * @returns {string} comma separated list of configuration parameters
	 */
	socialHelper.prototype.makeWindowConfigurationString = function( windowConfiguration ) {

		if ( windowConfiguration ) {

			var settings = Object.keys( windowConfiguration );
			var configurationString = "";

			for ( c = 0; c < settings.length; c++ ) {

				configurationString += settings[ c ] + '=' + windowConfiguration[ settings[ c ] ];

				if ( c < ( settings.length -1 ) ) {
					configurationString += ',';
				}
			}

			return configurationString;
		}

		return false;
	};

	/**
	 * create a share url for the service with which the instance was created and open a
	 * new window using the parameters provided, or the defaults.
	 *
	 * @param {string} url optionally provide a specific url to link to, otherwise the current window.location
	 * will be used to create a share url link
     * @param {object} windowConfiguration optionally provide a window configuration object
	 * @param {string} body optionally provide a text to share
	 * @param {boolean} doNotDisplayUrl flag if a URL should be shown with the shared text
	 */
	socialHelper.prototype.sharePage = function( url, windowConfiguration, body, doNotDisplayUrl, elem ) {

        var _self = this, link;

        switch (_self.name) {
            case 'email':
                if (elem) {
                    link = 'mailto:?body=' + body;
                    elem.setAttribute('href', link);
                }
                break;
            case 'whatsapp':
                if (elem) {
                    link = _self.socialLinks.whatsapp.shareUrl + body;
                    elem.setAttribute('href', link);
                }
                break;
            default:
                window.open( _self.buildShareUrl( url, body, _self.name, doNotDisplayUrl ), "_blank", _self.makeWindowConfigurationString(
                    windowConfiguration || _self.defaultWindowConfiguration ) );
        }
	};

	/**
	 * keep the social helpers under the ui object
	 *
	 * @type {{twitter: socialHelper, facebook: socialHelper, google: socialHelper}}
	 */
	ui.socialHelpers = {
		"twitter" : new socialHelper( 'twitter' ),
		"facebook" : new socialHelper( 'facebook' ),
        "google" : new socialHelper( 'googleplus' ),
		"email" : new socialHelper( 'email' ),
		"whatsapp" : new socialHelper( 'whatsapp' )
	};

} )( PULSE.ui );

(function( ui, core ) {
    "use strict";

    ui.photoGalleries = [];

    /**
    * Config Object:
    * @typedef {Object} Config
    * @property {String} [itemSelector] CSS selector for the gallery items
    * @property {String} [imageSelector] CSS selector for the gallery item photos
    * @property {Array} [instances] Array which contains all instances of galleries - default []
    * @property {Float} [attractionStrength] Physics setting - strength of the attraction power to a position
    * @property {Float} [friction] Physics setting - friction from 0 to 1, where 0 is no friction
    * @property {Integer} [initialIndex] Display item at this index when gallery is created
    * @property {Boolean} [draggable] Is slider draggable on non touch devices - default false
    * @property {Boolean} [resize] Does the gallery resize when browser size changes - default true
    * @property {Boolean} [expandable] Can open image in full screen - default true
    * @property {Object} [thumbnails] Show photo thumbnails - default null
    * @property {Object} [controls] Will contain all control elements (prev, next, expand, ...)
    * @property {Boolean} [singlePhotoViewer] Flag if it's only a gallery for a single photo (e.g. a simple photo modal)
    * @property {Boolean} [keyboardNavigation] Is keyboard navigation of the gallery activated
    *
    * @property {Function} [onGalleryBuilt] Callback event when the gallery has been loaded and built
    * @property {Function} [onFullscreenOpened] Callback event when the fullscreen mode has been opened
    * @property {Function} [onFullscreenClosed] Callback event when the fullscreen mode has been closed
    * @property {Function} [isVisibleEvent] Callback event when the gallery becomes visible in the browser viewport
    * /

    /* PRIVATE METHODS */

    var setDefaults = function( config ){

        var defaults = {
            itemSelector: '.swingSloth__item',
            imageSelector: '.swingSloth__image',
            instances: [],
            attractionStrength: 0.025,
            friction: 0.16,
            initialIndex: 0,
            draggable: false,
            resize: true,
            expandable: true,
            thumbnails: null,
            controls: {},
            singlePhotoViewer: false,
            keyboardNavigation: true,

            // event callbacks
            onGalleryBuilt: function() { },
            onFullscreenOpened: function() { },
            onFullscreenClosed: function() { },
            isVisibleEvent: function() { }
        };

        config.singlePhotoViewer = config.singlePhotoViewer === 'true' ? true : false;

        config = core.object.extend(defaults, config);

        return config;

    };

    var setupGallery = function( _self ){

        // initial properties
        _self.selectedIndex = _self.config.initialIndex;
        _self.sliderPos = 0;
        _self.sliderPosTarget = 0;
        _self.firstItemLoaded = false;
        _self.highestItem = _self.config.maxHeight ? 99999 : 0;
        _self.controls = {};

        // initial physics properties
        _self.velocityX = 0;
        _self.acceleration = 0;
        _self.friction = 1 - _self.config.friction;
        _self.attractStrength = _self.config.attractionStrength;

        // create wrapper, viewport & slider
        createWrapper(_self);
        createViewport(_self);
        createSliderContainer(_self);

        createDrag(_self); // add drag event & functionality
        create(_self); // create gallery content
        createCSSStyles(_self); // add gallery specific css

        if (_self.selectedIndex > 0 && _self.selectedIndex < _self.items.length) {
            // move slide to specified index from config.initialIndex
            _self.moveSlideTo(_self.selectedIndex, 1, true);
        } else {
            _self.selectedIndex = 0;
        }

    };

    var createWrapper = function(_self) {
        _self.wrapper = document.createElement('div');
        _self.wrapper.className = 'swingSloth__wrapper';
    };

    var createViewport = function(_self) {
        _self.viewport = document.createElement('div');
        _self.viewport.className = 'swingSloth__viewport';
        _self.viewport.style.position = 'relative';

        _self.viewport.style.overflow = !_self.config.singlePhotoViewer ? 'hidden' : 'visible';
    };

    var createSliderContainer = function( _self ){
        // slider element does all the positioning
        var slider = document.createElement('div');
        slider.className = 'swingSloth__slider';
        _self.slider = slider;
    };

    /* CSS specificetly needed for gallery */
    var createCSSStyles = function( _self ) {

        if (!document.getElementById('swingsloth__css-styles')) {

            var css = '.swingSloth__wrapper.expanded { position: fixed; width: 100%; height: 100%; max-width: none; top: 0; left: 0; }';
            css += '.swingSloth__viewport { width: 100%; }';
            css += '.swingSloth__wrapper.expanded .bigger-than-viewport img { height: 100%; width: auto; margin: 0 auto; }';

            var style = document.createElement('style');
            style.type = 'text/css';
            style.setAttribute('id', 'swingsloth__css-styles');

            if (style.styleSheet){
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.querySelector("head").appendChild(style);

        }

    };

    var createDrag = function(_self) {
        // initialise all drag events
        _self.dragging.initHandlers(_self);
    };

    /* creates the whole gallery content */
    var create = function( _self ) {

        _self.viewport.appendChild( _self.slider );
        _self.wrapper.appendChild( _self.viewport );
        _self.element.insertBefore( _self.wrapper, _self.element.firstChild );
        core.style.addClass(_self.element, 'swingSloth');

        var galleryItems = _self.element.querySelectorAll(_self.config.itemSelector);

        if ( _self.isActive || !galleryItems.length) {
            return;
        }

        _self.isActive = true;

        moveElements( galleryItems, _self.slider );

        reInitiateItems(_self);
        createControls(_self);

        _self.width = _self.viewport.offsetWidth;

        if (_self.config.resize) {
            // add resize event & functionality
            var resize = {
                method: function() {
                    windowResize(_self);
                }
            };
            core.event.windowResize.add(resize);
        }

        setEventListeners(_self);

        // last step, kick off animations!
        _self.animation.animate(_self);

        if (typeof _self.config.onGalleryBuilt === 'function') {
            setTimeout(function(){
                _self.config.onGalleryBuilt();
            }, 0);
        }

    };

    /* move an element into another one */
    var moveElements = function( elems, toElem ) {
        elems = core.object.makeArray( elems );
        while ( elems.length ) {
            toElem.appendChild( elems.shift() );
        }
    };

    var reInitiateItems = function( _self ) {
        _self.items = createItems( _self ); // creates all gallery items
        updateItemSizes(_self);
        positionItems(_self); // positions the items in the slider
        setGallerySize(_self); // sets the gallery size to fit the biggest item

        if (_self.config.created) {
            refreshControls(_self);
        }
    };

    var setEventListeners = function(_self) {
        // scroll event for visibility callback
        window.addEventListener("scroll", isGalleryVisible, false);

        document.onkeydown = checkKeyDownEvent;
    };

    var updateItemSizes = function( _self ) {
        var item, image, content;
        // goes through all gallery items and updates their sizes in the instance
        for ( var i = 0, len = _self.items.length; i < len; i++ ) {
            item = _self.items[i];

            item.width = item.element.offsetWidth;
            item.height = item.element.offsetHeight;
            item.positionX = (i * item.width);

            if (_self.expanded && item.height >= window.innerHeight) {
                core.style.addClass(item.element, 'bigger-than-viewport');
                item.width = item.element.offsetWidth;
                item.height = item.element.offsetHeight;
                item.positionX = (i * item.width);
            } else {
                core.style.removeClass(item.element, 'bigger-than-viewport');
            }

            if (item.height < _self.highestItem) {
                // center image vertically in viewport
                item.element.style.top = '50%';
                if (!_self.config.singlePhotoViewer || (_self.config.singlePhotoViewer && _self.expanded)) {
                    item.element.style.marginTop = -(item.height/2) + 'px';
                } else {
                    item.element.style.marginTop = 0;
                }
            } else {
                item.element.style.top = 0;
                item.element.style.marginTop = 0;
            }
        }
    };

    /* Image load event callback function */
    var itemImageLoaded = function(_self, item) {
        item.height = item.element.offsetHeight;
        item.width = item.element.offsetWidth;
        var higher = _self.config.maxHeight ? (item.height < _self.highestItem) : (item.height > _self.highestItem);

        if (higher) {
            _self.highestItem = item.height;
            setGallerySize(_self);
        }

        if (_self.items) {
            updateItemSizes(_self);
        }
    };

    /* Aligns the content to the viewport when creating the gallery or expanding/closing the modal */
    var alignContent = function(_self, item) {
        if (_self.expanded) {
            var offset = _self.expanded ? window.innerHeight : _self.viewport.offsetHeight,
                spacing = (offset - item.height) / 2;
            item.element.style.marginTop = spacing + 'px';
        }
    };

    /* Creates the gallery items */
    var createItems = function(_self) {
        var itemElems = _self.element.querySelectorAll(_self.config.itemSelector),
            item, items = [], i, len;

        for ( i = 0, len = itemElems.length; i < len; i++ ) {
            item = new _self.Item( itemElems[i], _self, itemImageLoaded);
            items.push( item );
        }

        return items;
    };

    /* Positions the gallery items in the viewport */
    var positionItems = function(_self) {
        var item;
        for ( var i = 0, len = _self.items.length; i < len; i++ ) {
            item = _self.items[i];
            item.positionX = (i * item.width);
            // item.target = item.positionX;
            item.element.style.left = (i * 100) + '%';
        }
    };

    /* Adds controls for gallery navigation */
    var createControls = function( _self ) {
        createPrevNextArrows(_self);

        if (_self.config.expandable) {
            createExpandButton(_self);
        }

        if (_self.config.thumbnails) {
            createThumbnails(_self);
        }

        _self.config.created = true;
    };

    var refreshControls = function( _self ) {
        // refreshs the prev/nav buttons depending on which slide we are
        // e.g. 1st slide - left arrow is hidden
        if (_self.items.length > 1) {
            if (_self.selectedIndex === 0) {
                _self.controls.arrowLeft.style.display = 'none';
                _self.controls.arrowRight.style.display = 'block';
            } else if(_self.selectedIndex === _self.items.length -1) {
                _self.controls.arrowLeft.style.display = 'block';
                _self.controls.arrowRight.style.display = 'none';
            }
        }
    };

    var createPrevNextArrows = function( _self ) {
        var arrowLeft, arrowRight;

        if (_self.config.controls.prev) {
            arrowLeft = _self.config.controls.prev;
        } else {
            arrowLeft = document.createElement('span');
            arrowLeft.className = 'swingSloth__arrowleft';
            arrowLeft.innerHTML = '<';
        }

        if (_self.config.controls.next) {
            arrowRight = _self.config.controls.next;
        } else {
            arrowRight = document.createElement('span');
            arrowRight.className = 'swingSloth__arrowright';
            arrowRight.innerHTML = '>';
        }

        _self.wrapper.appendChild(arrowLeft);
        _self.wrapper.appendChild(arrowRight);

        arrowLeft.style.display = 'none';
        arrowRight.style.display = 'none';

        arrowLeft.addEventListener('click', function(e) { moveSliderEvent(_self, -1, false); });
        arrowRight.addEventListener('click', function(e) { moveSliderEvent(_self, 1, false); });

        _self.controls.arrowLeft = arrowLeft;
        _self.controls.arrowRight = arrowRight;

        // refresh controls for hiding/displaying the appropriate buttons
        refreshControls(_self);
    };

    var createThumbnails = function( _self ) {

        var thumbs, wrapper, list, item, i;

        thumbs = new _self.Thumbnails(_self, _self.config.thumbnails);

    };


    var createExpandButton = function( _self ) {
        var expand = _self.config.controls.expand;

        if (!expand) {
            expand = document.createElement('span');
            expand.className = 'swingSloth__expandicon';
            expand.innerHTML = 'F';

            _self.wrapper.appendChild(expand);
        } else {
            core.style.addClass(expand, 'swingSloth__expandicon');
        }

        _self.controls.expand = expand;

        expand.addEventListener('click', function(e) { _self.toggleGalleryFullscreen(); });
        _self.viewport.addEventListener('touchend', function(e) { onImageTapEnd(_self); }); // on tap on image for touch devices
    };

    var onImageTapEnd = function(_self) {
        if (!_self.hasBeenDragged) {
            _self.toggleGalleryFullscreen();
        }
    };

    /* Event handler fired from controls when the slide needs to be moved to a new item */
    var moveSliderEvent = function( _self, dir, instantMove ) {
        _self.moveSlideTo(_self.selectedIndex + dir, instantMove);
    };

    /* Update the gallery viewport size according to the biggest item */
    var setGallerySize = function(_self) {

        if (_self.items && _self.items.length >= 0) {

            if (_self.highestItem <= 0) {
                _self.highestItem = _self.items[0].height;
            } else if (window.innerHeight < _self.highestItem) {
                _self.highestItem = window.innerHeight;
            }

            _self.viewport.style.height = _self.highestItem + 'px';
            _self.slider.style.height = _self.highestItem + 'px';
        }
    };

    /* Gets the hightest item so we can set the size of the gallery wrapper */
    var updateHighestItem = function(_self) {
        updateItemSizes(_self);

        var highest, i;
        _self.highestItem = -1; // reset

        for (i = 0; i < _self.items.length; i++) {
            _self.items[i].height = _self.items[i].element.offsetHeight;
            highest = _self.config.maxHeight ? (_self.items[i].height < _self.highestItem) : (_self.items[i].height > _self.highestItem);

            if (highest) {
                _self.highestItem = _self.items[i].height;
            }
        }

        setGallerySize(_self);
    };

    /* Event handler which is fired when screen resizes */
    var windowResize = function(_self) {

        var viewport = _self.viewport.offsetWidth;

        if (viewport !== _self.width) {
            _self.width = viewport;
            updateHighestItem(_self);

            _self.moveSlideTo(_self.selectedIndex, true);

            if (_self.expanded) {
                updateViewportPosition(_self);
            }
        }

    };

    /* Updates gallery dimensions, slide dimensions & positions, and viewport */
    var repaintGallery = function(_self) {
        _self.viewport.style.marginTop = 0;
        _self.viewport.style.height = '100%';
        _self.slider.style.height = '100%';

        updateHighestItem(_self);

        _self.moveSlideTo(_self.selectedIndex, true);

        if (_self.expanded) {
            updateViewportPosition(_self);
        }
    };

    /* Event handler keyboard pressing */
    var checkKeyDownEvent = function(e) {
        var i, gallery;
        e = e || window.event;

        for (i = 0; i < ui.photoGalleries.length; i++) {
            if (ui.photoGalleries[i].expanded) {
                gallery = ui.photoGalleries[i];
                break;
            }
        }

        if (gallery && gallery.expanded) {
            switch (e.keyCode) {
                case 37: // left arrow
                    if (gallery.selectedIndex > 0) {
                        gallery.moveSlideTo(gallery.selectedIndex - 1);
                    }
                    break;
                case 39: // right arrow
                    gallery.moveSlideTo(gallery.selectedIndex + 1);
                    break;
                case 27: // escape button
                    gallery.toggleGalleryFullscreen();
                    break;
            }

            e.stopPropagation();
        }
    };

    /* Check if an element is visible in the viewport */
    var isGalleryVisible = function() {

        var rect, i,
            html = document.documentElement,
            windowHeight = window.innerHeight || html.clientHeight;

        for (i = 0; i < ui.photoGalleries.length; i++) {
            rect = ui.photoGalleries[i].element.getBoundingClientRect();

            if (rect.top >= 0 && rect.top <= windowHeight ||
                    rect.bottom >= 0 && rect.bottom <= windowHeight) {

                ui.photoGalleries[i].isInViewport = true;

                if (typeof ui.photoGalleries[i].config.isVisibleEvent === 'function') {
                    ui.photoGalleries[i].config.isVisibleEvent();
                }

            } else {
                ui.photoGalleries[i].isInViewport = false;
            }
        }

    };

    /* Updates the viewport height according to the highest item and centers it vertically */
    var updateViewportPosition = function(_self) {
        var clientHeight = window.innerHeight || document.documentElement.clientHeight,
            spacing;

        spacing = (clientHeight - _self.highestItem) / 2;

        _self.viewport.style.marginTop = spacing + 'px';
    };

    /* Switch photo variant when toggling fullscreen */
    var switchPhotoVariants = function(_self, fullscreen) {

        var thumbVariant, fullscreenVariant,
            loadedCallback = function(item) {
                item.imageVariants.fullscreen.image.onload = null;
                item.imageVariants.fullscreen.loaded = true;
                core.style.addClass(item.imageVariants.preview.image, 'u-hide');
                core.style.removeClass(item.imageVariants.fullscreen.image, 'u-hide');

                repaintGallery(_self);
                updateViewportPosition(_self);
            };

        for (var i = 0; i < _self.items.length; i++) {
            if (fullscreen && _self.items[i].imageVariants.fullscreen) {
                if (!_self.items[i].imageVariants.fullscreen.loaded) {
                    // if the fullscreen image has not been loaded yet, do it now and swap images on the loadedCallback
                    _self.items[i].imageVariants.fullscreen.image.onload = loadedCallback.bind(this, _self.items[i]);
                    _self.items[i].imageVariants.fullscreen.image.src = _self.items[i].imageVariants.fullscreen.url;
                } else {
                    core.style.addClass(_self.items[i].imageVariants.preview.image, 'u-hide');
                    core.style.removeClass(_self.items[i].imageVariants.fullscreen.image, 'u-hide');
                }
            } else if (!fullscreen && _self.items[i].imageVariants.fullscreen) {
                core.style.removeClass(_self.items[i].imageVariants.preview.image, 'u-hide');
                core.style.addClass(_self.items[i].imageVariants.fullscreen.image, 'u-hide');
            }
        }
    };



    /* PUBLIC OBJECT */

    /**
    * Constructor for modal object
    *
    * @param {Object.<Config>} [config] Config properties used when consructing a modal
    * @constructor
    */
    ui.swingSloth = function( element, config ){

        if (!element) {
            return;
        }

        var _self = this;

        _self.element = element;
        _self.config = setDefaults( config || {} );

        ui.photoGalleries.push(_self);

        setupGallery( _self );

    };

    /**
    * Move slide to new index
    *
    * @param {Integer} [index] Index of the gallery item to display
    * @param {Boolean} [instantMove] Instantly move slider to new index without animations
    */
    ui.swingSloth.prototype.moveSlideTo = function(index, instantMove) {
        var _self = this;

        _self.selectedIndex = index;

        if (_self.selectedIndex < _self.items.length && _self.selectedIndex >= 0) {

            _self.selectedItem = _self.items[_self.selectedIndex];

            // update controls
            if (_self.selectedIndex === _self.items.length - 1) {
                _self.controls.arrowRight.style.display = 'none';
            } else {
                _self.controls.arrowRight.style.display = 'block';
            }

            if(_self.selectedIndex === 0) {
                _self.controls.arrowLeft.style.display = 'none';
            } else {
                _self.controls.arrowLeft.style.display = 'block';
            }

            // move slides
            _self.sliderPosTarget = -_self.selectedItem.positionX;
            if (instantMove) {
                _self.sliderPos = -_self.selectedItem.positionX;
            }

        } else {
            if (_self.selectedIndex === _self.items.length) {
                _self.selectedIndex = _self.items.length -1;
            } else if (_self.selectedIndex < 0) {
                _self.selectedIndex = 0;
            }
        }
    };

    /**
    * Add a new item to gallery
    *
    * @param {HTML Object} [item] HTML element to add as an item to the gallery
    */
    ui.swingSloth.prototype.addItem = function(item) {
        var _self = this;

        if (!item) {
            return;
        }

        if (!core.object.isArray(item)) {
            _self.slider.appendChild(item);
        } else {
            for (var i = 0; i < item.length; i++) {
                if(item[i]) {
                    _self.slider.appendChild(item[i]);
                }
            }
        }

        reInitiateItems(_self);
        _self.animation.animate(_self);
    };

    /**
    * Remove an item from gallery
    *
    * @param {Integer} [index] Index of item to remove
    */
    ui.swingSloth.prototype.removeItem = function(index) {
        var _self = this;

        if (index >= 0 && index < _self.items.length) {

            _self.slider.removeChild(_self.items[index].element);
            _self.items.splice(index, 1);

        }

        reInitiateItems(_self);
    };

    /**
    * Toggle the gallery fullscreen mode
    */
    ui.swingSloth.prototype.toggleGalleryFullscreen = function() {

        var _self = this;

        switchPhotoVariants(_self, !_self.expanded);

        if (!_self.expanded) {

            _self.expanded = true;

            core.style.addClass(_self.wrapper, 'expanded');
            _self.element.style.height = _self.highestItem;

            repaintGallery(_self);
            updateViewportPosition(_self);

            if (typeof _self.config.onFullscreenOpened === 'function') {
                _self.config.onFullscreenOpened();
            }

        } else {
            _self.viewport.style.marginTop = 0;
            _self.element.style.height = 'auto';
            core.style.removeClass(_self.wrapper, 'expanded');
            _self.expanded = false;
            repaintGallery(_self);

            if (typeof _self.config.onFullscreenClosed === 'function') {
                _self.config.onFullscreenClosed();
            }
        }

    };

    /**
    * Add a custom event listener
    *
    * @param {String} [eventName] Name of the event to add
    * @param {Funcction} [callback] Custom callback function you want to call
    */
    ui.swingSloth.prototype.setEventListener = function(eventName, callback) {
        var _self = this,
            event = _self.config[eventName];

        if (typeof event === 'function') {
            _self.config[eventName] = callback;
        }
    };

    /**
    * Remove a custom event listener
    *
    * @param {String} [eventName] Name of the event to remove
    */
    ui.swingSloth.prototype.removeEventListener = function(eventName) {
        var _self = this,
            event = _self.config[eventName];

        if (typeof event === 'function') {
            _self.config[eventName] = function() {};
        }
    };

    /**
    * Refresh gallery items (sizes, positioning, ...)
    */
    ui.swingSloth.prototype.refresh = function() {
        var _self = this;
        reInitiateItems(_self);
    };








    /* for the dot example */
    ui.Particle = function( elem ){

        if (!elem) {
            return;
        }

        this.element = elem;
        this.positionX = 0;
        this.dragPositionX = 0;
        this.velocityX = 1;
        this.friction = 0.95;
        this.accelerationX = 1;
        this.isDragging = false;

    };

    ui.Particle.prototype.render = function() {
        // position particle with transform
        this.element.style.transform = 'translateX(' + this.positionX + 'px)';
    };

    ui.Particle.prototype.update = function() {
        this.velocityX += this.accelerationX;
        this.velocityX *= this.friction;
        this.positionX += this.velocityX;
        // this.applyDragForce();
        // reset acceleration
        this.accelerationX = 0;
    };

    ui.Particle.prototype.applyForce = function(force) {
        this.accelerationX += force;
    };




}( PULSE.ui, PULSE.core ));

/*globals PULSE, PULSE.ui, PULSE.core */

(function( ui, core ){
	"use strict";

	/**
	 * Tab Object:
	 * @typedef {Object} Tab
	 * @property {String} title Title text for tab activator
	 * @property {HTMLElement} activator HTML element that triggers this Instance content to be set in the modal
	 * @property {HTMLElement} content HTML element that is the target content displayed for this instance
	 * @property {String} uiArgs Arguments to be used within callback methods as stringified JSON
	 */

	/**
	 * Config Object:
	 * @typedef {Object} Config
	 * @property {HTMLElement} [tabItems] A Nodelist/Array of tab content items - defaults to all elements with the attribute '[data-ui-tab]'
	 * @property {String} [builtClass] CSS class applied to wrap object when the tabs are built - defaults to 'tabbed'
	 * @property {String} [activeClass] CSS class used to define active tab objects - defaults to 'active'
	 * @property {String} [tablistClass] CSS class used to wrap the tabs - defaults to 'tablist'
	 * @property {HTMLElement} [tabLinkWrap] A single wrapping HTML element - if provided the tab links are placed within this element, else they are placed as the first-child of wrap
	 * @property {String} [tabNavClass] CSS class used in the nav element that wraps the links, when tabLinkWrap is not provided - defaults to 'tabs'
	 * @property {String} [tabParam] Query string param used to set default active tab - defaults to 'tab'
	 * @property {Function} [tabCallback] Function to be called when a tab is opened - receives full tab object
	 * @property {Function} [buildCallback] Function to be called when a tab ui is built - receives full tab object
	 * @property {String} [moreClass] CSS class used in the 'more' tab - defaults to 'more'
	 * @property {String} [moreToggleClass] CSS class applied to the 'more' button - defaults to 'moreToggle'
	 * @property {String} [moreToggleDropdownClass] CSS class applied to the 'more' dropdown - defaults to 'moreToggleDropdown'
	 * @property {String} [showMoreEnabledClass] CSS class applied to the nav list - defaults to 'showMoreEnabled'
	 * @property {String} [hideClass] CSS class applied to hide the tab button  - defaults to 'hide'
	 * @property {String} [openClass] CSS class applied to open the tab button  - defaults to 'open'
	 */

	/**
	 * @namespace ui.tab.private
	 */

	/* PRIVATE VARIABLES */
	var resizeTimer;

	var ENTER_KEY = 13;

	/* PRIVATE METHODS */

	var setDefaults = function( config ){

		if( !config.tabItems ){
			config.tabItems = document.querySelectorAll( '[data-ui-tab]' );
		}
		if( !config.builtClass ){
			config.builtClass = 'tabbed';
		}
		if ( !config.tablistClass ) {
			config.tablistClass = 'tablist';
		}
		if ( !config.tabNavClass ) {
			config.tabNavClass = 'tabs';
		}
		if ( !config.defaultIndex ){
			config.defaultIndex = 0;
		}
		if( !config.activeClass ){
			config.activeClass = 'active';
		}
		if ( !config.disableClass ){
			config.disableClass = 'disabled';
		}
		if( !config.tabParam ){
			config.tabParam = 'tab';
		}
		if( !config.moreToggle ){
			config.moreToggle = false;
		}
		if( !config.moreLabel ){
			config.moreLabel = 'More';
		}
		if( !config.moreClass ){
			config.moreClass = 'more';
		}
		if( !config.moreToggleClass ){
			config.moreToggleClass = 'moreToggle';
		}
		if( !config.moreToggleDropdownClass ){
			config.moreToggleDropdownClass = 'moreToggleDropdown';
		}
		if( !config.showMoreEnabledClass ){
			config.showMoreEnabledClass = 'showMoreEnabled';
		}
		if( !config.hideClass ){
			config.hideClass = 'hide';
		}
		if( !config.openClass ){
			config.openClass = 'open';
		}

		config.tabs = [];
		return config;

	};


	var buildTabs = function( _self ){

		_self.config.wrap = document.createElement('div');
		_self.config.tabItems[0].parentNode.insertBefore( _self.config.wrap, _self.config.tabItems[0] );

		_self.config.nav = document.createElement('ul');
		_self.config.nav.classList.add(_self.config.tablistClass);
		_self.config.nav.setAttribute( 'role', 'tablist' );

		Array.prototype.map.call( _self.config.tabItems, function( el, index ){
			var title = el.getAttribute('data-ui-tab');
			var args;
			if( el.getAttribute('data-ui-args') ){
				args = JSON.parse( el.getAttribute('data-ui-args') );
			}
			var tab = {
				index: index,
				title: title,
				content: el,
				activator: document.createElement('li'),
				uiArgs: args,
				isHidden: false
			};
			tab.title = tab.content.getAttribute('data-ui-tab');
			tab.activator.textContent = tab.title;
			tab.activator.setAttribute( 'role', 'tab' );
			tab.activator.setAttribute( 'tabindex', '0' );
			tab.activator.setAttribute( 'data-tab-index', tab.index );
			tab.activator.addEventListener( 'click', function(){
				setActiveTab( tab, _self );
			});

			tab.activator.addEventListener( 'keyup', function (evt) {
				var keyPressed = evt.which || evt.keyCode;
				if ( keyPressed === ENTER_KEY ) {
					setActiveTab(tab, _self);
				}
			});

			if (_self.config.setTabClass) {
							tab.activator.classList.add(_self.config.setTabClass);
			}

			var customClass = tab.content.getAttribute('data-ui-class');
			if ( customClass )
			{
				tab.activator.classList.add( customClass );
			}

			if ( tab.content.getAttribute('data-ui-disabled') )
			{
				tab.activator.classList.add( _self.config.disableClass );
			}

			_self.config.tabs.push( tab );
			_self.config.wrap.appendChild( tab.content );
			_self.config.nav.appendChild( tab.activator );
		} );

		if ( _self.config.tabs.length - 1 < _self.config.defaultIndex )
		{
			_self.config.defaultIndex = _self.config.tabs.length - 1;
		}

		if( _self.config.tabLinkWrap ){
			_self.config.tabLinkWrap.appendChild( _self.config.nav );
		}
		else {
			var navWrap = document.createElement('nav');
			navWrap.classList.add(_self.config.tabNavClass);
			navWrap.appendChild( _self.config.nav );
		 	_self.config.wrap.insertBefore( navWrap, _self.config.wrap.firstChild );
		}
		_self.config.wrap.classList.add( _self.config.builtClass );

		if ( _self.config.moreToggle ) {
			createMoreToggle( _self );
		}

	};

	var setActiveTab = function( tab, _self, noCallback ){

		if ( _self.config.current === tab ) {
			return;
		}

		if ( core.style.hasClass( tab.activator, _self.config.disableClass ) )
		{
			return;
		}

		_self.config.tabs.map( function( item ){
			core.style.removeClass( item.content, _self.config.activeClass );
			core.style.removeClass( item.activator, _self.config.activeClass );
			if ( _self.config.moreToggle) {
				if ( item.activatorClone ) {
					core.style.removeClass( item.activatorClone, _self.config.activeClass );
				}
				core.style.removeClass( _self.moreTabs.tab, _self.config.activeClass );
			}
		} );

		core.style.addClass( tab.content, _self.config.activeClass );
		core.style.addClass( tab.activator, _self.config.activeClass );

		if ( _self.config.moreToggle ) {
			toggleMoreDropdown( _self, true );
			if ( tab.activatorClone ) {
				core.style.addClass( tab.activatorClone, _self.config.activeClass );
			}
			if ( _self.moreTabs.visible && tab.isHidden ) {
				core.style.addClass( _self.moreTabs.tab, _self.config.activeClass );
			}
		}

		_self.config.current = tab;
		if( typeof _self.config.tabCallback === 'function' && !noCallback ){
			_self.config.tabCallback( _self );
		}

	};

	var getTabByTitle = function( _self, title )
	{
		var targetTab = _self.config.tabs[ _self.config.defaultIndex ];
		if ( _self.config.tabs.length > 1 )
		{
			for ( var i = 0; i < _self.config.tabs.length; i++ )
			{
				if ( _self.config.tabs[ i ].title === title )
				{
					return _self.config.tabs[ i ];
				}
			}
		}
		return targetTab;
	};

	var getNonDisabledTab = function( _self )
	{
		var i = 0;
		var startIndex = _self.config.defaultIndex;
		while ( i < _self.config.tabs.length )
		{
			if ( startIndex > _self.config.tabs.length - 1 )
			{
				startIndex = 0;
			}
			if ( !core.style.hasClass( _self.config.tabs[ startIndex ].activator, _self.config.disableClass ) )
			{
				return _self.config.tabs[ startIndex ];
			}
			startIndex++;
			i++;
		}
		return _self.config.tabs[ _self.config.defaultIndex ];
	};

	var defaultTab = function( _self, tabTitle ){

		var defaultTabTitle = ( _self.config.defaultTitle ) ? _self.config.defaultTitle : core.url.getParam( _self.config.tabParam );
		var tabParam = tabTitle || defaultTabTitle;
		var targetTab = _self.config.tabs[ _self.config.defaultIndex ];
		if( tabParam ){
			targetTab = getTabByTitle( _self, tabParam );
		}
		if ( core.style.hasClass( targetTab.activator, _self.config.disableClass ) )
		{
			targetTab = getNonDisabledTab( _self );
		}
		setActiveTab( targetTab, _self, true );
		if( typeof _self.config.buildCallback === 'function' ){
			_self.config.buildCallback( _self );
		}

	};

	var createMoreToggle = function( _self ) {
		_self.moreTabs = {};
		_self.moreTabs.visible = false;

		var moreTab = document.createElement('li');
		core.style.addClass( moreTab, _self.config.moreClass );
		_self.moreTabs.tab = moreTab;

		var moreButton = document.createElement('div');
		core.style.addClass( moreButton, _self.config.moreToggleClass );
		moreButton.textContent = _self.config.moreLabel;
		moreButton.addEventListener( 'click', function(){
			toggleMoreDropdown( _self );
		});
		moreTab.appendChild( moreButton );

		var moreIcon = document.createElement('div');
		core.style.addClass( moreIcon, 'icn' );
		core.style.addClass( moreIcon, 'chevron-down' );
		moreButton.appendChild( moreIcon );

		var moreDropdown = document.createElement('ul');
		core.style.addClass( moreDropdown, _self.config.moreToggleDropdownClass );
		moreTab.appendChild( moreDropdown );
		_self.moreTabs.dropdown = moreDropdown;

		_self.config.nav.appendChild( moreTab );

		_self.moreTabs.wrapWidth = 0; // set to 0 to force check on first run
		checkMoreToggle( _self );

		var windowResizeListener = {
			method: function( args ) {
				checkMoreToggle( args.scope );
			},
			args: {
				scope: _self
			}
		};

		core.event.windowResize.add( windowResizeListener );

	};

	var checkMoreToggle = function( _self ) {
		var wrapWidth = _self.config.wrap.offsetWidth;

		// check to see if the width has changed
		if ( _self.moreTabs.wrapWidth !== wrapWidth ) {
			// measure total width of all tabs (not including show more tab)
			var totalTabWidths = 0;
			_self.config.tabs.forEach(function(tab) {
				var width = core.style.outerWidth(tab.activator);
				totalTabWidths += width;
				tab.activatorWidth = width;
			});

			// check to see if tabs fit in new wrap width
			if ( wrapWidth <= totalTabWidths ) {
				var widthRemaining = wrapWidth;
				widthRemaining -= core.style.outerWidth(_self.moreTabs.tab);

				_self.moreTabs.visible = true;
				core.style.addClass( _self.config.nav, _self.config.showMoreEnabledClass );

				_self.config.tabs.forEach(function(tab, i) {
					if ( widthRemaining < tab.activatorWidth ) {
						hideTabButton( tab, _self );
						widthRemaining = -1;
						if ( _self.config.current === tab ) {
							core.style.addClass( _self.moreTabs.tab, _self.config.activeClass );
						}
					} else {
						showTabButton( tab, _self );
						widthRemaining -= tab.activatorWidth;
						if ( _self.config.current === tab ) {
							core.style.removeClass( _self.moreTabs.tab, _self.config.activeClass );
						}
					}
				});
			} else {
				_self.moreTabs.visible = false;
				core.style.removeClass( _self.config.nav, _self.config.showMoreEnabledClass );

				_self.config.tabs.forEach(function(tab) {
					showTabButton( tab, _self );
				});
			}

			// update stored width
			_self.moreTabs.wrapWidth = wrapWidth;
		}

	};

	var toggleMoreDropdown = function ( _self, forceClose ) {

		if ( forceClose ) {
			core.style.removeClass( _self.moreTabs.tab, _self.config.openClass );
		} else {
			core.style.toggleClass( _self.moreTabs.tab, _self.config.openClass );
		}

	};

	var hideTabButton = function ( tab, _self ) {

		if ( core.style.hasClass( tab.activator, _self.config.hideClass ) ) {
			return;
		}

		if ( !tab.activatorClone ) {
			tab.activatorClone = tab.activator.cloneNode( true );
			tab.activatorClone.addEventListener( 'click', function(){
				setActiveTab( tab, _self );
			});
		}

		tab.isHidden = true;
		core.style.addClass( tab.activator, _self.config.hideClass );

		var listItems = _self.moreTabs.dropdown.getElementsByTagName( 'li' );
		if ( listItems.length === 0) {
			_self.moreTabs.dropdown.appendChild( tab.activatorClone );
		} else {
			for (var i = 0; i < listItems.length; i++) {
				if ( tab.index < listItems[i].getAttribute('data-tab-index') ) {
					_self.moreTabs.dropdown.insertBefore( tab.activatorClone, listItems[i]);
					return;
				} else if ( i === (listItems.length - 1) ) {
					_self.moreTabs.dropdown.appendChild( tab.activatorClone );
				}
			}
		}

	};

	var showTabButton = function ( tab, _self ) {

		if ( !core.style.hasClass( tab.activator, _self.config.hideClass ) ) {
			return;
		}

		tab.isHidden = false;
		core.style.removeClass( tab.activator, _self.config.hideClass );
		_self.moreTabs.dropdown.removeChild( tab.activatorClone );

	};

	var init = function( _self ){

		buildTabs( _self );
		defaultTab( _self );

	};

	var disableTab = function( targetTab, _self ) {
		core.style.addClass( targetTab.activator, _self.config.disableClass );
		if ( core.style.hasClass( targetTab.activator, _self.config.activeClass ) )
		{
			var nonDisabledTab = getNonDisabledTab( _self );
			setActiveTab( nonDisabledTab, _self );
		}
	};

	/* PUBLIC OBJECT */

	/**
	 * Constructor for tab object
	 *
	 * @param {Object.<Config>} [config] Config properties used when consructing a tab
	 * @constructor
	 */
	ui.tab = function( config ){

		if( config.tabItems && config.tabItems.length < 1 ){
			return "no tab items to build";
		}

		var _self = this;
		_self.config = setDefaults( config || {} );
		init( _self );

	};

	/**
	 * Show a tab based on the given index
	 * If no match is found, first tab is set to active
	 * @return {Object} Full tab object
	 */
	ui.tab.prototype.showTabByIndex = function( index ){

		var _self = this;
		var targetTab = _self.config.tabs[index] || _self.config.tabs[0];
		setActiveTab( targetTab, _self );

		return _self;

	};

	/**
	 * Show a tab based on the given title
	 * If no match is found, first tab is set to active
	 * @return {Object} Full tab object
	 */
	ui.tab.prototype.showTabByTitle = function( title ){

		var _self = this;
		defaultTab( _self, title );

		return _self;

	};

	/**
	 * Enable a tab based on the given index
	 * If no match is found, first tab is enabled
	 * @return {Object} Full tab object
	 */
	ui.tab.prototype.enableTabByIndex = function( index ){

		var _self = this;
		var targetTab = _self.config.tabs[index] || _self.config.tabs[0];
		core.style.removeClass( targetTab.activator, _self.config.disableClass );

		return _self;
	};

	/**
	 * Enable a tab based on the given index
	 * If no match is found, first tab is enabled
	 * @return {Object} Full tab object
	 */
	ui.tab.prototype.enableTabByTitle = function( title ){

		var _self = this;
		var targetTab = getTabByTitle( _self, title );
		core.style.removeClass( targetTab.activator, _self.config.disableClass );

		return _self;
	};

	/**
	 * Disable tab based on index
	 * If no match is found, first tab is disabled
	 * @return {Object} Full tab object
	 */
	ui.tab.prototype.disableTabByIndex = function( index ){
		var _self = this;
		var targetTab = _self.config.tabs[index] || _self.config.tabs[0];
		disableTab( targetTab, _self );

		return _self;
	};

	/**
	 * Disable tab based on index
	 * If no match is found, first tab is disabled
	 * @return {Object} Full tab object
	 */
	ui.tab.prototype.disableTabByTitle = function( title ){
		var _self = this;
		var targetTab = getTabByTitle( _self, title );
		disableTab( targetTab, _self );

		return _self;
	};

}( PULSE.ui, PULSE.core ));

/*globals PULSE, PULSE.ui */

(function( swingSloth ){
    "use strict";

    var Animation = {};

    Animation.lastSliderPos = 0;

    Animation.render = function(_self) {
        // position particle with transform
        var diff = _self.sliderPos - Animation.lastSliderPos;
        if (diff < 0) {
            diff = -diff;
        }
        if (diff > 0.1) {
            _self.slider.style.transform = 'translateX(' + _self.sliderPos + 'px)';
            Animation.lastSliderPos = _self.sliderPos;
        }
    };

    Animation.applyPhysics = function(_self) {
        _self.velocityX += _self.acceleration;
        _self.sliderPos += _self.velocityX;
        _self.velocityX *= _self.friction;
        // _self.applyDragForce();
        // reset acceleration
        _self.acceleration = 0;
    };

    Animation.applyForce = function(force, _self) {
        _self.acceleration += force;
    };

    Animation.animate = function(_self) {
        var attraction = ( _self.sliderPosTarget - _self.sliderPos ) * _self.attractStrength;

        if (!isNaN(attraction)) {
            Animation.applyForce(attraction, _self);
        }
        Animation.applyPhysics(_self);
        Animation.render(_self);
        requestAnimationFrame(function(){ Animation.animate(_self); });
    };

    swingSloth.prototype.animation = Animation;

}( PULSE.ui.swingSloth ));

(function( swingSloth ){
    "use strict";

    var getClientX = function(event) {
        if (event.clientX) {
            return event.clientX;
        }
        if (event.touches && event.touches[0]) {
            return event.touches[0].clientX;
        }
        return 0;
    };

    var Drag = {
        gallery: null
    };

    Drag.initHandlers = function(_self) {

        Drag.gallery = _self;

        if (_self.config.draggable) {
            // dragability for non touch devices
            Drag.gallery.viewport.addEventListener('dragstart', Drag.onDragStart, false);
            Drag.gallery.viewport.addEventListener('drag', Drag.onDrag, false);
            Drag.gallery.viewport.addEventListener('dragend', Drag.onDragEnd, false);
        }

        Drag.gallery.viewport.addEventListener('touchstart', Drag.onDragStart, false);
        Drag.gallery.viewport.addEventListener('touchmove', Drag.onDrag, false);
        Drag.gallery.viewport.addEventListener('touchend', Drag.onDragEnd, false);

    };

    Drag.onDragStart = function(event, pointer) {

        if (event.type === 'touchstart') {
            event.preventDefault();
        }

        var _self = Drag.gallery;

        _self.hasBeenDragged = false;

        _self.dragStartPosition = getClientX(event);
        _self.dragLastPosition = getClientX(event);
    };

    Drag.onDrag = function(event, pointer, moveVector) {

        event.preventDefault();

        var _self = Drag.gallery,
            clientX = getClientX(event);

        if (clientX === _self.dragLastPosition) {
            return;
        }

        var moved = clientX - _self.dragLastPosition;

        if (moved < 150 && moved > -150) {
            _self.sliderPosTarget += moved;
        }

        if (clientX !== 0) {
            _self.dragLastPosition = clientX;
        }

        _self.hasBeenDragged = true;

    };

    Drag.onDragEnd = function(event, pointer) {

        var _self = Drag.gallery,
            snapToItem, dir = 1;

        event.preventDefault();

        // get drag direction
        if (_self.dragStartPosition > _self.dragLastPosition) {
            dir = -1;
        } else if (_self.dragStartPosition === self.dragLastPosition) {
            dir = 0;
        }

        if (dir !== 0) {
            snapToItem = Drag.getNextSnappingPoint(dir);
            _self.moveSlideTo(snapToItem);
        }

    };

    Drag.getPointer = function( pointer ) {
        return {
            x: pointer.pageX !== undefined ? pointer.pageX : pointer.clientX,
            y: pointer.pageY !== undefined ? pointer.pageY : pointer.clientY
        };
    };

    /* Gets the index of the next nearest snapping point of an item  */
    Drag.getNextSnappingPoint = function(dir) {
        var _self = Drag.gallery,
            pos = -_self.sliderPosTarget,
            nearest = 99999, i,
            nearestItem, diff;

        dir = dir || 1;

        for (i = 0; i < _self.items.length; i++) {
            diff = pos - _self.items[i].positionX - (dir * (_self.items[i].width / 2.25));
            if (diff < 0) {
                diff = -diff;
            }

            if (diff < nearest) {
                nearest = diff;
                nearestItem = i;
            }
        }

        return nearestItem;

    };

    swingSloth.prototype.dragging = Drag;

}( PULSE.ui.swingSloth ));

(function( swingSloth, core ){
    "use strict";

    var Item = function(element, parent, callback) {
        var _self = this;

        _self.element = element;
        _self.parent = parent;

        _self.create(callback);
    };

    var resetVariants = function(img) {
        var fs = img.nextElementSibling;
        if (fs && core.style.hasClass('js-item-fullscreen')) {
            fs.remove();
        }
    };

    var createImageVariants = function(_self) {

        var fullscreenImg;

        resetVariants(_self);

        _self.imageVariants = {
            preview: {}, fullscreen: {}, current: {}
        };

        _self.imageVariants.preview.imageContainer = _self.element.querySelector(_self.parent.config.imageSelector);
        _self.imageVariants.preview.image = _self.imageVariants.preview.imageContainer.querySelector('img');
        core.style.addClass(_self.imageVariants.preview.image, 'js-item-preview');

        _self.imageVariants.current = _self.imageVariants.preview;

        if (_self.imageVariants.preview.imageContainer.dataset.fullscreen) {
            fullscreenImg = document.createElement('img');
            if (_self.imageVariants.preview.image.classList && _self.imageVariants.preview.image.classList.length) {
                fullscreenImg.className = _self.imageVariants.preview.image.classList.toString();
            }
            core.style.addClass(fullscreenImg, 'js-item-fullscreen');
            core.style.addClass(fullscreenImg, 'u-hide');

            _self.imageVariants.fullscreen.imageContainer = _self.imageVariants.preview.imageContainer;
            _self.imageVariants.fullscreen.image = fullscreenImg;
            _self.imageVariants.fullscreen.url = _self.imageVariants.preview.imageContainer.dataset.fullscreen;
            _self.imageVariants.fullscreen.loaded = false;

            _self.imageVariants.preview.imageContainer.appendChild(_self.imageVariants.fullscreen.image);
        } else {
            _self.imageVariants.fullscreen = null;
        }
    };

    Item.prototype.create = function(callback) {
        var _self = this;

        if (!_self.parent.config.singlePhotoViewer) {
            _self.element.style.position = 'absolute';
        }
        _self.element.style.width = '100%';

        createImageVariants(_self);

        _self.positionX = 0;
        _self.target = 0;
        _self.width = _self.imageVariants.current.image.offsetWidth;
        _self.height = _self.imageVariants.current.image.offsetHeight;

        if (_self.height <= 20) {
            _self.imageVariants.current.image.onload = function(e) {
                callback(_self.parent, _self);
            };
        } else {
            callback(_self.parent, _self);
        }
    };

    Item.prototype.setPosition = function( x ) {
        var _self = this;
        _self.positionX = x;
    };

    swingSloth.prototype.Item = Item;

}( PULSE.ui.swingSloth, PULSE.core ));

(function( swingSloth, core ){
    "use strict";

    var Thumbnails = function(gallery, config) {

        var _self = this,
            clickEventFunction, i, thumbList;

        _self.gallery = gallery;
        _self.config = config;

        if (_self.config.thumbnails) {
            _self.items = document.querySelectorAll(_self.config.thumbnails);

            if (_self.items.length) {
                _self.previousActiveThumb = _self.items[0];

                clickEventFunction = function(index) {
                    _self.items[index].addEventListener('click', function(e) { onThumbClick(_self, index, e.target); });
                };

                for (i = 0; i < _self.items.length; i++) {
                    clickEventFunction(i);
                }

                if (_self.config.controls && _self.config.list) {
                    _self.thumbList = document.querySelector(_self.config.list);

                    document.querySelector(_self.config.controls.left).addEventListener('click', function(e) { galleryNavigationClick(_self, -1); });
                    document.querySelector(_self.config.controls.right).addEventListener('click', function(e) { galleryNavigationClick(_self, 1); });
                }
            }
        }

    };

    var onThumbClick = function(_self, index, thumb) {
        _self.gallery.moveSlideTo(index);

        if (_self.previousActiveThumb && _self.previousActiveThumb !== thumb) {
            core.style.removeClass(_self.previousActiveThumb, 'is-active');
        }

        core.style.addClass(thumb, 'is-active');
        _self.previousActiveThumb = thumb;

        var width = _self.thumbList.offsetWidth;
        _self.thumbList.scrollLeft = thumb.offsetLeft - (width / 2);
    };

    var galleryNavigationClick = function(_self, dir) {
        var width = _self.thumbList.offsetWidth;
        _self.thumbList.scrollLeft += dir * width;
    };

    swingSloth.prototype.Thumbnails = Thumbnails;

}( PULSE.ui.swingSloth, PULSE.core ));