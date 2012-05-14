<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Minutes to cache
	|--------------------------------------------------------------------------
	|
	| The selection of minutes text can be cached for
	|
	*/

	'minutes' => array(
		'10'     => __('pv.minutes', array('minutes'=>10)),
		'60'     => __('pv.hour', array('hour'=>1)),
		'720'    => __('pv.hours', array('hours'=>12)),
		'1440'   => __('pv.hours', array('hours'=>24)),
		'2880'   => __('pv.hours', array('hours'=>48)),
		'10080'  => __('pv.days', array('days'=>7)),
	),

	/*
	|--------------------------------------------------------------------------
	| Max text size (in bytes)
	|--------------------------------------------------------------------------
	|
	| Generally PasteVault is designed to store small bits of text so don't allow
	| text larger than this. Note, this limit is checked after the text has been
	| encrypted and base 64 encoded client side which means is't significantly 
	| larger than the original text entered by the user.
	|
	*/

	'max_size' => 32000,

	/*
	|--------------------------------------------------------------------------
	| Google Analytics ID
	|--------------------------------------------------------------------------
	|
	| If you enter your analytics ID the GA code will be added to the site.
	|
	*/

	'google_analytics' => false,		
);