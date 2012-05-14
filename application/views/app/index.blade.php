@layout('layouts.website')

@section('page')

	{{ Form::open('', 'post', array('id'=>'create_form'), true) }}

		{{ Form::label('textbox', __('pv.text')) }}
		<span class="help">{{ __('pv.text_info') }}</span>
		{{ Form::textarea('textbox') }}

		{{ Form::label('password', __('pv.shared_password')) }}
		<span class="help">{{ __('pv.shared_password_info') }}</span>
		{{ Form::text('password') }}

		{{ Form::label('expire', __('pv.expire_after')) }}
		{{ Form::select('expire', Config::get('pv.hours'), '24') }}			

		{{ Form::label('expire', __('pv.pull_to_encrypt')) }}

		<div class="QapTcha"></div>

		<!-- note this is hidden, it's only here for the qaptcha -->
		<input type="submit" id="submit" value="Submit form" />

	{{ Form::close() }}

	<div id="sponsor">
		{{ __('pv.builtby') }}
	</div>	
			
	<div id="results" class="reveal-modal">
		<p>{{ __('pv.modal_message') }}</p>
		
		{{ Form::text('copy_text', '', array('id'=>'copy_text')) }}
		{{ Form::button(__('pv.copy_to_clipboard'), array('id'=>'copy_button')) }}
		{{ __('pv.shared_password') }}: <span id="view_password"></span>

	</div>
	<div id="copied"><h2>Copied!</h2></div>
@endsection