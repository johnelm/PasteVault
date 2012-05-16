<?php

/*
|
| The homepage route
|
*/
Route::get('/', function()
{
	return View::make('app.index');
});

/*
|
| Here we save the encrypted text using Lara's Cache system as a key/value store.
| This makes it possible to change the storage engine just through the config files.
|
*/
Route::post('save', function()
{
	$max 		= Config::get('pv.max_size');
	$minutes 	= implode(',', array_keys(Config::get('pv.minutes')));
	$honeypot   = 'first_name';
	$honeytime  = 'first_name_time';

	$rules = array(
		'text' 		=> "max:{$max}",
		'expire' 	=> "in:{$minutes}",
		$honeypot 	=> 'honeypot',
		$honeytime	=> 'required|honeytime:4'
	);

	$validator = Validator::make(Input::get(), $rules);

	// Currently Laravel can't check for required on an empty string (like the honeypot)
	// so we have to do that check ourselves. (Input::has also doesn't work)
	if(!$validator->fails() && isset($_POST[$honeypot]))
	{
		// We're going to encrypt again as a second line of defence should
		// there be a vulnerability with the JS encryption lib.
		$text = Crypter::encrypt(Input::get('text'));

		// Create a key for the text.
		$key = sha1($text);

		// Save the text using Laravel's cache.
		Cache::put($key, $text, Input::get('expire') );

		// Return the generated URL
		return Response::make(URL::to("view/{$key}", true), 200);
	}

	return Response::json($validator->errors->all(':message'), 400);
});


/*
|
| Show a specific note. We'll check to make sure it's still valid, if not send to 
| the expired page.
|
*/
Route::get('view/(:any)', function($key)
{
	if(Cache::has($key))
	{
		// Get text and decrypt our encryption
		$text = Crypter::decrypt(Cache::get($key));

		return View::make('app.view')->with('encrypted_text', $text);
	}

	return Redirect::to('expired', 301);
});


/*
|
| Expired notes are all 301 redirected to here
|
*/
Route::get('expired', function()
{
	return View::make('app.expired');
});

/*
|
| The terms of service page
|
*/
Route::get('tos', function()
{
	return View::make('biz.tos');
});

/*
|
| Privacy policy
|
*/
Route::get('privacy', function()
{
	return View::make('biz.privacy');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Only accept HTTPS when in production mode
	if($_SERVER['LARAVEL_ENV'] == 'production')
	{
		if($_SERVER['HTTP_X_FORWARDED_PROTO'] !== 'https') 
		{
			return Redirect::to("https://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}", 301, true);
		}
	}
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});