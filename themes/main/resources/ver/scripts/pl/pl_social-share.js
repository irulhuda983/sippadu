/*globals PULSE, PULSE.app*/

( function( app, i18n, common ) {


	/**
	 * constructor for the page share widget. Widget requires following data attributes to be
	 * present on target button elements;
	 *
	 * data-social - if this contains a url then it will be used as the page share url
	 * data-social-service - the service name ( should correlate to a n entry in the socialLinks
	 * object that is defined in socialHelper Class - ../../js/social-helpers.js)
	 *
	 * @param {Object} element element defining the page share widget
	 * @constructor
	 */
	app.pageShare = function( element, url ) {

		var pageShare = new common.pageShare( element, url );
	};

	/**
	 * create the widget instances
	 */
	var widgets = document.querySelectorAll( '[data-widget="social-page-share"]' );
	for( x=0; x < widgets.length; x++) {
		new app.pageShare( widgets[ x ] );
	}

} )( PULSE.app, PULSE.I18N, PULSE.app.common );