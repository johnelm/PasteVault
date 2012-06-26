@layout('layouts.website')

@section('headers')
	<meta name="robots" content="noindex, nofollow">
@endsection

@section('page')

	<div id="get_password">
		{{ Form::label('decrypt_password', __('pv.decrypt_password')) }}
		<span class="help">{{ __('pv.decrypt_password_info') }}</span>
		{{ Form::text('decrypt_password') }}
		{{ Form::button(__('pv.display_message'), array('id'=>'display_message')) }}
	</div>

	<h3>{{ __('pv.message') }}</h3>
	<div id="view_body">{{ trim($encrypted_text) }}</div>

@endsection