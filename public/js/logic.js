$(document).ready(function(){
	// Setup copy to clipboard
	$('#copy_button').zclip({
	    path: 'swf/ZeroClipboard.swf',
	    copy: function(){return $('#copy_text').val();},
	    afterCopy: function(){ 
	    	$('#results').html($('#copied').html());
	    	setTimeout(function(){
	    		window.location.reload(); 
	    	}, 2000);
	    },
	});		
		

	// Encrypt!
	$('#create_form').submit(function(){
		// If password or text is empty throw up an error
		if(!$('#password').val() || !$('#textbox').val())
		{
			// Make the label red
			$('.required').addClass('red');
			return false;
		}

		// Encrypt!
		var secure_text = sjcl.encrypt($('#password').val(), $('#textbox').val());

		// Base64 encode and add to form
		$('#text').val($.base64.encode(secure_text));

		// Save it. When we serialize don't send the password and original text to the server.
		$.post("save", $('#create_form :input[value][name!="password"][name!="textbox"]').serialize(),
			function(data) {
				// Put link in textarea & password in view box
				$('#copy_text').val($.trim($('#response_template').html()));
				$('#copy_text').val($('#copy_text').val().replace('%link%', data));
				$('#copy_text').val($('#copy_text').val().replace('%password%', $('#password').val()));
			}
		)
		.error(function() { $('#results').html($('#error').html()) });

		// Show modal with results
		$('#results').reveal({
			closeonbackgroundclick: false,
			dismissmodalclass: 'close',
		});

		// Don't really submit form
		return false;
	});

	// Decrypt text
	$('#display_message').click(function(){
		// Base64 decode
		var encrypted_text = $.base64.decode($('#view_body').html());

		// Decrypt!
		try
		{
			var open_text = sjcl.decrypt($('#decrypt_password').val(), encrypted_text);	
			$('#get_password').hide();
			$('#view_body').html(open_text);
		}
		catch(err)
		{
			// Didn't work show error
		}

		return false;
	});
});