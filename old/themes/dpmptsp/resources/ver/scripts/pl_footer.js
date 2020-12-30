/*globals PULSE, PULSE.app */

(function( app, common ){
	"use strict";

	/**
	 * Footer corporate
	 * @param {object} element element for the corporate footer
	 * @param {config} config configuration object for the corporate footer
	 */
	app.footerCorporate = function( element, config ) {

		var _self = this;

		_self.element = element;
		_self.backToTop = _self.element.getElementsByClassName( 'backToTopContainer' );

		_self.setListeners();
	};

	/**
	 * Set listener for scrolling back to top
	 */
	app.footerCorporate.prototype.setListeners = function()
	{
		var _self = this;

		if ( _self.backToTop && _self.backToTop.length > 0 )
		{
			Array.prototype.map.call( _self.backToTop, function( container )
			{
				container.addEventListener( 'click', function( evt ) {
					evt.preventDefault();
					window.scrollTo( 0 , 0 );
				} );
			} );
		}
	}

	var widgets = document.querySelectorAll( '[data-widget="footer-corporate"]' );
	for( var i = 0; i < widgets.length; i++ ) {
		new app.footerCorporate( widgets[ i ], {} );
	}

}( PULSE.app, PULSE.app.common ));
