var LOOK = {
	// scroller box size: [width, height]
	'size': [511, 72]
},

BEHAVE = {
	// autoscroll - true, on-demand - false
	'auto': true,
	// vertical - true, horizontal - false
	'vertical': true,
	// scrolling speed, pixels per 40 milliseconds;
	// for auto mode use negative value to reverse scrolling direction
	'speed': 2
},

// a data to build scroll window content
ITEMS = [
	{	// file to get content for item from; if is set 'content' property doesn't matter
		// only body of HTML document is taken to become scroller item content
		// note: external files require time for loading 
		// it is RECOMMENDED to use content property to speed loading up
		// please, DON'T forget to set ALL IMAGE SIZES 
		// in either external file or in 'content' string for scroller script 
		// to be able to estimate item sizes
		'file': '',
		'content': 'Plain Text Item',
		'pause_b': 2,
		'pause_a': 0
	},
	{
		'file': '',
		'content' : '<b>Item with some <font color="red">HTML</font></b>',
		'pause_b': 2,
		'pause_a': 0
	},
	{
		'file': '',
		// note: image path is relative to the ts_files directory
		'content' : 'Item with image<br><img src="../../images/logo.gif">',
		'pause_b': 2,
		'pause_a': 0
	}
// add as many items here as you need.
// don't forget to separate them with commas, make sure there is no comma after the last item
]