<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| The URL used to access your application without a trailing slash. The URL
	| does not have to be set. If it isn't we'll try our best to guess the URL
	| of your application.
	|
	*/

	'url' => 'https://www.pastevault.com',

	/*
	|--------------------------------------------------------------------------
	| Application Index
	|--------------------------------------------------------------------------
	|
	| If you are including the "index.php" in your URLs, you can ignore this.
	| However, if you are using mod_rewrite to get cleaner URLs, just set
	| this option to an empty string and we'll take care of the rest.
	|
	*/

	'index' => '',

	/*
	|--------------------------------------------------------------------------
	| Application Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the encryption and cookie classes to generate secure
	| encrypted strings and hashes. It is extremely important that this key
	| remain secret and should not be shared with anyone. Make it about 32
	| characters of random gibberish.
	|
	| Below is currently setup for PHPFog, but a regular string key can be used
	| in most situations.
	|
	*/

	'key' => stripslashes($_SERVER['PV_APPKEY']),

);
