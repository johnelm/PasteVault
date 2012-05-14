<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Temporary Encrypted Text</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('css/reveal.css') }}
	{{ HTML::style('css/QapTcha.jquery.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<body>
	<div id="centerwrap"> 
		<div id="sidebar">
			<h1>{{ __('pv.heading') }}</h1>
			<p>{{ __('pv.intro') }}</p>
			<p>{{ __('pv.intro2') }}</p>
			<p>{{ __('pv.great') }}</p>

			<ul>
				<li>{{ __('pv.pt1') }}</li>
				<li>{{ __('pv.pt2') }}</li>
				<li>{{ __('pv.pt3') }}</li>
			</ul>
		</div>
		
		<div id="content">

			@yield('page')

		</div>

		<div id="footer">
			{{ __('pv.footer', array('year'=>date('Y'))) }}
		</div>
	</div>

	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js') }}
	{{ HTML::script('js/jquery.ui.touch.js') }}
	{{ HTML::script('js/QapTcha.jquery.min.js') }}
	{{ HTML::script('js/jquery.base64.js') }}
	{{ HTML::script('js/jquery.reveal.js') }}
	{{ HTML::script('js/jquery.zclip.min.js') }}
	{{ HTML::script('js/sjcl.js') }}
	{{ HTML::script('js/logic.js') }}

</body>
</html>