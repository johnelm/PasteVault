<?php

Route::get('/', function()
{
	return View::make('app.index');
});

// Save the encrypted text
Route::post('save', function()
{
	// Is the custom qaptch session var in place and is the form field send with that vars
	// name equal to empty as it should be.
	if(Session::has('qaptcha_key') && Input::get(Session::get('qaptcha_key')) === "" && in_array(Input::get('expire'), array_keys(Config::get('pv.hours'))))
	{
		// We're going to encrypt again as a second line of defence should
		// there be a vulnerability with the JS encryption lib.
		$text = Crypter::encrypt(Input::get('text'));

		// Create a key for the text.
		$key = sha1($text);

		// Save the text using Laravel's cache. Convert hours to minutes.
		Cache::put($key, $text, (Input::get('expire') * 60) );

		// Return the generated URL
		return Response::make(URL::to("view/{$key}", true), 200);
	}

	return Response::make('error', 400);
});

// View previously stored text
Route::get('view/(:any)', function($key)
{
	if(Cache::has($key))
	{
		// Get text and decrypt our encryption
		$text = Crypter::decrypt(Cache::get($key));

		return View::make('app.view')->with('encrypted_text', $text);
	}

	Event::fire('404');
});

// This simple sets up the form field name that will be sent in the next request
Route::post('captcha', function()
{
	// This is the content of the Qaptcha.jquery.php file laravelized		
	if(Input::has('action') && Input::has('qaptcha_key'))
	{
		Session::put('qaptcha_key', Input::get('qaptcha_key'));

		// It's all good
		return Response::json(array('error'=>false), 200);
	}

	Session::put('qaptcha_key', false);

	return Response::json(array('error'=>true), 200);
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
	// Do stuff before every request to your application...
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