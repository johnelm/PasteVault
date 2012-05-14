<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Hours to cache
	|--------------------------------------------------------------------------
	|
	| The selection of hours text can be cached
	|
	*/

	'hours' => array(
		'1'    => __('pv.hour', array('hour'=>1)),
		'12'   => __('pv.hours', array('hours'=>12)),
		'24'   => __('pv.hours', array('hours'=>24)),
		'48'   => __('pv.hours', array('hours'=>48)),
		'168'  => __('pv.days', array('days'=>7)),
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
);