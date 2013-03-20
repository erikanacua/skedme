<script>
	var shown = false;
	$('#login_button').click( 
		function() {
		if (!shown) {
			$('#my_div').animate({
				'top': '50px'
				}, 300, function() {
				shown = true;
			});
		} else {
			$('#my_div').animate( {
			'top': '-195px'
			}, 300, function() {
				shown = false;	
			});
		}
			
	});
	
	$('#sign_in').click ( function() {
		// $('#my_div').animate( {
		// 	'top': '50px'
		// 	}, 300, function() {
		// 	shown = false;
		// });
		// return false;
		$('#signinform').submit();
	});
	
	$('#signup_button').click ( 
		function() {
			$('#signupMod').modal();
		}	
	);
	//first name
	$('#inputFName').bind('keyup blur',function(){ 
		if ( $(this).val().trim() == '' )
			$('#firstname').html('First name is required.');
    else if (! $(this).val().match(/^[a-zA-Z() ]+$/) )
			$('#firstname').html('characters from a-z only.');
		else
			$('#firstname').html('');		
	});
	// last name
	$('#inputLName').bind('keyup blur',function(){ 
		if ( $(this).val().trim() == '' )
			$('#lastname').html('Last name is required.');
    else if (! $(this).val().match(/^[a-zA-Z() ]+$/) )
			$('#lastname').html('characters from a-z only.');
		else
			$('#lastname').html('');					
	});
	//user name
	var saveuser = "";
	$('#inputUName').bind('keyup blur', function() {
		// console.log($(this).val().length);
		if ( $(this).val().trim() == '' )
			$('#username').html('User name is required.');
		else if ( $(this).val().length >  20 ) {
			saveuser = $(this).val().substring(0,20);
			$(this).val(saveuser);
			$('#username').html('up to 20 characters only');
		}	else if (! $(this).val().match(/^[a-zA-Z0-9()]+$/))
			$('#username').html('no spaces and special characters allowed');
		else
			$('#username').html('');	
	});
	
	//password
	var savepass = "";
	$('#inputPassword').bind('keyup blur', function() {
		console.log("hey");
		console.log($(this).val());
		if ( $(this).val().trim() == '' )
			$('#password').html('Password is required.');
		else if ( $(this).val().length >  20 ) {
			savepass = $(this).val().substring(0,20);
			$(this).val(savepass);
			$('#password').html('up to 20 characters only');
		}	else if (! $(this).val().match(/^[a-zA-Z0-9()]+$/))
			$('#password').html('no spaces and special characters allowed');
		else
			$('#password').html('');	
	});
	
	//conpass
	$('#inputPassword2').bind('keyup blur', function() {
		if (!($(this).val() == $('#inputPassword').val()))
			$('#conpassword').html('Passwords do not match.');
		else 
			$('#conpassword').html('');
	});
	
	$('#signup').click(function() {
		$('#input_form').submit();
		// var controls = $('#warning_form').find('.controls');
		// var allow_submit = true;
		// $.each( controls, function(i, item) {
		// 	if ( $(item).html().trim() != '') {
		// 		allow_submit = false;
		// 	}
		// });
		// var inputs = $('#input_form').find('input'); 
		// $.each( inputs, function(i, item) {
		// 	if ( $(item).val().trim() == '') {
		// 		allow_submit = false;
		// 	}
		// });		
		// console.log(allow_submit);
		// return false;
	})
	
	
	</script>