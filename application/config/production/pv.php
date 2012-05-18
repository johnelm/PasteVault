<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Google Analytics ID
	|--------------------------------------------------------------------------
	|
	| If you enter your analytics ID the GA code will be added to the site.
	|
	| Below is currently setup for PHPFog, but a regular string key can be used
	| in most situations.	
	*/

	'google_analytics' => stripslashes($_SERVER['PV_GOOGLE_STATS']),		

	/*
	|--------------------------------------------------------------------------
	| Terms of service company
	|--------------------------------------------------------------------------
	|
	| The company running this hosted instance of PasteVault
	|
	| Below is currently setup for PHPFog, but a regular string key can be used
	| in most situations.	
	*/

	'company' => stripslashes($_SERVER['PV_COMPANY']),	
);