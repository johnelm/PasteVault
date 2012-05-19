<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Temporary Encrypted Text :: PasteVault</title>
	<meta name="viewport" content="width=device-width">
	@yield('headers')
	{{ HTML::style('css/reveal.css') }}
	{{ HTML::style('css/style.css') }}

	@if(Config::get('pv.google_analytics'))
		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '{{ Config::get('pv.google_analytics') }}']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>	
	@endif
</head>
<body>
	<div id="centerwrap"> 
		<div id="sidebar">
			<a href="{{ URL::base() }}"><img src="{{ URL::to_asset('img/logo.png') }}" title="{{ __('pv.heading') }}" /></a>
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

	<a href="https://github.com/UserScape/PasteVault"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>	

	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js') }}
	{{ HTML::script('js/jquery.base64.js') }}
	{{ HTML::script('js/jquery.reveal.js') }}
	{{ HTML::script('js/jquery.zclip.min.js') }}
	{{ HTML::script('js/sjcl.js') }}
	{{ HTML::script('js/logic.js') }}

</body>
</html>