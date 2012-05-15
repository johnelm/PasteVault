<style type="text/css">
#{{ Config::get('honeypot::default.honeypot_field') }} 
{
	display: none !important;
}
</style>

{{ Form::text(Config::get('honeypot::default.honeypot_field'), '', array('id' => Config::get('honeypot::default.honeypot_field'))) }}
{{ Form::hidden(Config::get('honeypot::default.honeypot_field').'_time', time()) }}