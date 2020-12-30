PULSE.app.templates.audiodescriptioncta='<span class="label" alt="">{{ audioDesc-label }}</span> <span class="desc">{{ audioDesc-text }}</span> <span class="icon" alt=""></span>',PULSE.app.templates.disableaudiodescriptioncta='<span class="label" alt="">{{ audioDesc-label }}</span> <span class="desc">{{ disAudioDesc-text }}</span> <span class="icon" alt=""></span>';
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
		this.scriptSource = "//players.brightcove.net/{{account}}/{{playerId}}_default/index.min.js?{{elementId}}";
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

		videojs( this.getAttribute( 'data-player' ) ).ready( function() {

			var readyEvent = new Event( 'videoReady' + this.id_ );

			//wrap the video object in brightcove video to add convinience methods
			players[ this.id_ ] = new app.brightCoveVideo( this.el_.parentElement, this );
			playerNames.push( this.id_ );
			window.dispatchEvent(readyEvent);

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
				vttId: videoEl.getAttribute( 'data-webVTT-id'),
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

/*globals PULSE, PULSE.app, PULSE.i18n */


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

( function( app, common, i18n ) {

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

		_self.model =  {
			"audioDesc-label" : i18n.lookup( 'label.audiodescription' ),
			"audioDesc-text" : i18n.lookup( 'label.audiodescriptionavailable' ),
			"disAudioDesc-text" : i18n.lookup( 'label.disableaudiodescription' )
		};

		_self.idToPlayOnLoad = false;
		_self.ready = false;
		_self.element = element;
		_self.metaElements = false;
		_self.attemptToFindMetaDivs();
		_self.hasWebVTT();

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
	 * look for the webVTT id when a video is embedded in an article and has
	 * audio description
	 */
	app.brightCoveVideo.prototype.hasWebVTT = function() {
		var _self = this;

		//the video is wrapped in a parent element, we get the element from a child
		_self.embeddedVTT = _self.element.firstElementChild.getAttribute( 'data-webVTT-id');
		_self.embeddedId = _self.element.firstElementChild.getAttribute( 'data-video-id');

		if ( _self.embeddedVTT && _self.embeddedId ) {
			_self.attachCaptionToEmbeddedVideo();
		}
	}

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
				// data that may remain except for when we have the audio description button

				if ( el.className !== 'audioDesc' ) {
					el.innerHTML = "";
				}

			}

		} );
		if ( metaDatas[ 'contentId' ] ) {

			var videoShare = _self.element.parentNode.getElementsByClassName( 'videoSocialShare' )[0];
			var shareUrl = window.location.hostname + '/video/single/' + metaDatas[ 'contentId' ];

			if( _self.pageShare ) {
				_self.pageShare.setUrl( shareUrl );
			} else {
				_self.pageShare = new common.pageShare( videoShare, shareUrl );
			}


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
	 * @param {boolean} optional, indicates if we're playing the webVTT video
	 */
	app.brightCoveVideo.prototype.playVideoWithID = function( videoID, webVTT ) {

		var _self = this;

		//save the original videoID without the webVTT
		if ( !_self.videoID || !webVTT ) {
			_self.videoID = videoID;
		}

		//if the video is not single or embedded, display it
		if ( !_self.embeddedVTT ) {
			for ( var i=0; i<_self.players.length; i++ ) {
				_self.players[i].style.display = '';
			}
		}

		_self.catalog.getVideo( videoID, function(error, video) {
			//deal with error
			_self.catalog.load( video );
			_self.api.play();
			_self.addCaptions();
		});

		_self.playVideo( videoID );
	};

	/**
	 * add AD cta caption to the video
	 */
	app.brightCoveVideo.prototype.addCaptions = function( autoplay )
	{
		var _self = this;

		if ( _self.api.mediainfo.custom_fields && _self.api.mediainfo.custom_fields['web_vtt'] ) {

			_self.metaElements["audioDesc"] = _self.element.querySelector( '.audioDesc' ) || false;
			var el = _self.metaElements["audioDesc"];

			if( el ) {
				el.innerHTML = Mustache.render( app.templates[ 'audiodescriptioncta' ], _self.model );
				_self.setListeners( el );
			} else {
				el.innerHTML = "";
			}
		}
	};

	/**
	 * add AD cta caption to the embedded video
	 */
	app.brightCoveVideo.prototype.attachCaptionToEmbeddedVideo = function() {

		var _self = this;

		_self.metaElements["audioDesc"] = _self.element.querySelector( '.audioDesc-' + _self.embeddedVTT ) || false;
		var el = _self.metaElements["audioDesc"];

		if( el ) {
			el.innerHTML = Mustache.render( app.templates[ 'audiodescriptioncta' ], _self.model );
			_self.setListeners( el, true );
		} else {
			el.innerHTML = "";
		}

	};

	/**
	 * set listener for the webVTT call to action
	 * @param {obj} element of the dom clickable by the user
	 * @param {boolean} optional, true if the video is embedded in an article
	 *
	 */
	app.brightCoveVideo.prototype.setListeners = function( el, embedded ) {

		var _self = this;

		[ 'keypress', 'click' ].forEach( function( eventType ) {

			el.addEventListener(eventType, function( evt ) {

				if (evt.which === 13 || evt.type === 'click') {
					var vttId = _self.api.mediainfo.custom_fields['web_vtt'];

					if ( vttId ) {

						el.innerHTML = Mustache.render( app.templates[ 'disableaudiodescriptioncta' ], _self.model );
						_self.playVideoWithID( vttId, true );

					} else {

						el.innerHTML = Mustache.render( app.templates[ 'audiodescriptioncta' ], _self.model );

						if ( embedded ) {
							_self.playVideoWithID( _self.embeddedId );
						} else {
							_self.playVideoWithID( _self.videoID );
						}
					}
				}
			} );
		} );
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


} )( PULSE.app, PULSE.app.common, PULSE.I18N );
