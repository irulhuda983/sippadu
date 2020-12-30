/*globals PULSE, PULSE.app */

( function( app, core ) {

	/**
	 * @namespace app.videoPlayerManager.private
	 */

	/**
	 * the player manager will maintain a list of the active players on the page.
	 * each time a video player controller instantiates in the page it will pass a
	 * reference to itself to the player manager.
	 *
	 * The manager will also handle creating the single brightcove script in the page.
	 * when brightcove creates the players the manager will handle the onload callback and
	 * add the api functionality to the controller
	 *
	 * @constructor
	 *
	 */
	var playerManager = function() {
		playerNames = [];
		this.scriptSource = "//players.brightcove.net/{{account}}/{{playerId}}_default/index.min.js";
		this.createScripts();

	};

	//statically define the play arrays
	var players = {};
	var playerNames = [];

	/**
	 * return a player we can use to start a video
	 * @returns {object} instance that implements the video player superclass
	 */
	playerManager.prototype.getPlayer = function() {

		if( playerNames[ 0 ] ) {
			return this.players[ playerNames[ 0 ] ];
		}
	};

	playerManager.prototype.getPlayersMap = function() {

		return players;
	};

	playerManager.prototype.getPlayerNameArray = function() {

		return playerNames;
	};

	/**
	 * get a player with a specific name ( BrightcoveID )
	 * @param {string} name the name of the player
	 * @param {boolean} ensureReturn weather to return a player if the specified player cant be found
	 * @returns {object} video player controller implementing the video player superclass ( app.brightCoveVideo )
	 */
	playerManager.prototype.getPlayerWithName = function( name, ensureReturn) {

		var lookup =  playerNames.filter( function( player ) {
			return player === name;
		} );

		if( lookup.length > 0  ) {
			return players[ lookup[ 0 ] ];
		}

		if( ensureReturn && players[ 0 ] ) {
			return players[ 0 ];
		}

		return false;

	};

	/**
	 * create the brightcove player and add a representation of it to the global brightcove object
	 */
	playerManager.prototype.createPlayers = function( event ) {
		var _self = this;

		console.log( 'SCRIPT EVENT FIRED!!!!!!!', event, this );

		videojs( this.getAttribute( 'data-player' ) ).ready( function() {

			//wrap the video object in brightcove video to add convinience methods
			players[ this.id_ ] = new app.brightCoveVideo( this.el_.parentElement, this );
			playerNames.push( this.id_ );
			/*
			myPlayer.catalog.getVideo('2114345471001', function(error, video) {
				//deal with error
				myPlayer.catalog.load(video);
			});
			*/

		});
	};

	/**
	 * allow us to register our internal callback functions before loading the brightcove script
	 * otherwise load events are called before functions actually exist
	 */
	playerManager.prototype.createScripts = function() {
		var _self = this;

		//make sure we dont append the same script twice
		var createdScripts = [];

		//loop over the video elements in the page

		var videos = document.querySelectorAll( 'video' );

		Array.prototype.map.call( videos, function( videoEl, idx, array ) {

			var videoDetails = {
				account: videoEl.getAttribute( 'data-account' ),
				playerId: videoEl.getAttribute( 'data-player' ),
				elementId: videoEl.getAttribute( 'id' )
			};

			var src = core.common.formatString( _self.scriptSource, videoDetails );

			if( createdScripts.indexOf( src ) === -1 ) {

				var scrpt =  document.createElement( "script" );
				scrpt.setAttribute( 'data-player', videoDetails.elementId );
				document.getElementsByTagName( 'body' )[ 0 ].appendChild( scrpt );

				scrpt.onload = _self.createPlayers;
				scrpt.src = src;

				createdScripts.push( src );

			}


		} );


	};

	// create the manager immediately so it available for players from the get-go
	app.videoPlayerManager = new playerManager();

	/**
	 * static method that brightcove player will use as a callback ( referenced in the HTML )
	 * @param {String} brightcoveID the id given to the <object> of the player in HTML
	 */
	app.videoPlayerManager.onTemplateLoaded = function( brightcoveID ) {

		var player = brightcove.api.getExperience( brightcoveID );
		var playerAPI = player.getModule( brightcove.api.modules.APIModules.VIDEO_PLAYER );

		app.videoPlayerManager.registerPlayerApi( brightcoveID, player, playerAPI );

	};

	app.videoPlayerManager.onTemplateReady = function( brightcoveID ) {


	};



} )( PULSE.app, PULSE.core );

/*globals PULSE, PULSE.app */


/**
 * outlines the format of a meta data object that should be passed into a
 * call to a video player's setMeta function. strings may be plain or can
 * be HTML strings, as innerHTML will be used to set element content
 *
 * @typedef {object} videoMeta
 * @property {string} title
 * @property {string} description
 * @property {string} date
 */

( function( app, common ) {

	/**
	 * basis set of functionality shared by all video players. extend this class
	 * when creating a new type of video player
	 *
	 * @param {object} element the dom element in which the player resides
	 * @param {object} config configuration for the video player
	 */
	app.brightCoveVideo = function( element, apiObject ) {

		var _self = this;

		_self.name = apiObject.id_ || "default_player";
		_self.api = apiObject;
		_self.catalog = _self.api.catalog;

		_self.players = document.querySelectorAll( '[data-widget="video-player"]' );

		_self.idToPlayOnLoad = false;
		_self.ready = false;
		_self.element = element;
		_self.metaElements = false;
		_self.attemptToFindMetaDivs();
	};

	/**
	 * look for meta data holding divs in the containing div and add references to them
	 * if found. These will be set through the 'setMeta' option.
	 */
	app.brightCoveVideo.prototype.attemptToFindMetaDivs = function() {
		var _self = this;

		_self.metaElements = {
			"title" : _self.element.querySelector( '.videoTitle' ) || false,
			"description" : _self.element.querySelector( '.videoDescription' ) || false,
			"date" : _self.element.querySelector( '.videoDate' ) || false

		};
	};

	/**
	 * given a settings object set the metadata on the video, assuming that the
	 * meta divs exist, you should strictly conform to using the same
	 * property names as defined in the videoMeta typedef
	 *
	 * @param {videoMeta} metaDatas
	 */
	app.brightCoveVideo.prototype.setMeta = function( metaDatas ) {
		var _self = this;

		var properties = Object.keys( _self.metaElements );
		properties.map( function( metaElementname ) {

			var el = _self.metaElements[ metaElementname ];
			if( el && metaDatas[ metaElementname ] ) {
				el.innerHTML = metaDatas[ metaElementname ];
			} else if( el ) {
				//if we dont have data to show, then ensure that we, clear any
				// data that may remain
				el.innerHTML = "";
			}

		} );
		if ( metaDatas[ 'contentId' ] )
		{
			var videoShare = _self.element.parentNode.getElementsByClassName( 'videoSocialShare' )[0];
			var shareUrl = window.location.hostname + '/video/single/' + metaDatas[ 'contentId' ];
			var pageShare = new common.pageShare( videoShare, shareUrl );
		}

	};

	/**
	 * set api controllers
	 */
	app.brightCoveVideo.prototype.setApiControllers = function( player, api) {

		var _self = this;

		_self.player = player;
		_self.api = api;
		_self.ready = true;

		if( _self.idToPlayOnLoad ) {
			_self.playVideoWithID( _self.idToPlayOnLoad );
			_self.api.pause( false );
		}
	};

	/**
	 * play a video using a brightcove video id
	 * @param {int} videoID the brightcove ID of the video to
	 */
	app.brightCoveVideo.prototype.playVideoWithID = function( videoID ) {

		var _self = this;

		Array.prototype.map.call( _self.players, function( player )
		{
			player.style.display = '';
		} );
		_self.catalog.getVideo( videoID, function(error, video) {
			//deal with error
			_self.catalog.load( video );
			_self.api.play();
		});

		_self.playVideo( videoID );
	};

	/**
	 * stop this brightcove instance from playing
	 */
	app.brightCoveVideo.prototype.stopVideo = function() {

		var _self = this;
		_self.api.pause();

	};

	/**
	 * play a video using a brightcove video id
	 * @param {string} videoID brightcove video id
	 */
	app.brightCoveVideo.prototype.playVideo = function( videoID ) {

		var _self = this;


	};

	// initialise on video players
	var widgets = document.querySelectorAll( '[data-widget="video-player"]' );
/*
	Array.prototype.map.call( widgets, function( widget ){
		var playerName = widget.querySelector( 'object' ).getAttribute( 'id' );
		widget = new app.brightCoveVideo( widget, { name: playerName } );
	} );
	*/

} )( PULSE.app, PULSE.app.common );
