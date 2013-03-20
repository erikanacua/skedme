<div id="editProfile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<h3 id="myModalLabel">Edit Profile</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span7">
				<form class="form-horizontal" id="input_form" method="post" action="sql/updateProfile.php">
					<div class="control-group">
						<label class="control-label" for="inputFName" style="width: 70px;">First Name</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="editFName" id="editFName" value="<?= $_SESSION['user']['firstname'] ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputLName" style="width: 70px;" >Last Name</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="editLName" id="inputLName" value="<?= $_SESSION['user']['lastname'] ?>">
						</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="inputEmail" style="width: 70px;" >Email</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="editEmail" id="editEmail" value="<?= $_SESSION['user']['email'] ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputUName" style="width: 70px;" >User Name</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="editUName" id="editUName" value="<?= $_SESSION['user']['username'] ?>">
						</div>
					</div>
					<label for="inputPassword">Change Password</label>
					<div class="control-group">				
						<label class="control-label" for="currentPassword" style="width: 70px;" >Current password</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="password" name="currentPassword" id="currentPassword">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="width: 70px;">New password</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="password" name="newPassword"id="newPassword" placeholder="Password" disabled="disabled">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="width: 70px;">Confirm password</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Password" disabled="disabled">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="width: 70px;">Upload Photo</label>
						<div class="controls" style="margin-left: 80px;">
							  <div class="input-append">
							    <input  id="appendedInputButton" type="text">
							    <button class="btn" type="button">Upload</button>
							  </div>
						</div>
					</div>
					<div>
						<input type="submit" class="btn btn-primary pull-right" value="Save Changes">
					</div>
				</form>	
			</div>

			<div class="span5"> 
				<form class="form-horizontal" id="edit_warning_form" style="width: 225px; padding-top: 10px;" >
				<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
					<div class="controls" id="edit_firstname" style="margin-left: 0px; color: red;"></div>
				</div>
				<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
					<div class="controls" id="edit_lastname" style="margin-left: 0px; color: red;"></div>
				</div>
				<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
					<div class="controls" id="edit_email" style="margin-left: 0px; color: red;"></div>			
				</div>
				<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
					<div class="controls" id="edit_username" style="margin-left: 0px; color: red;"></div>
				</div>
				<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
					<div class="controls" id="edit_password" style="margin-left: 0px; color: red;"></div>
				</div>
				<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
					<div class="controls" id="edit_conpassword" style="margin-left: 0px; color: red;"></div>
				</div>
				</form>
		</div>
	</div>
</div>

</div>

<script type="text/javascript">

	$('#editFName').bind('keyup blur',function(){ 
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_firstname').html('First name is required.');
			} else if (! $(this).val().match(/^[a-zA-Z() ]+$/) ) {
				granpapi.addClass('error');
				$('#edit_firstname').html('characters from a-z only.');
			}	else {
				granpapi.removeClass('error');
				$('#edit_firstname').html('');
			}
		});
		// last name
		$('#editLName').bind('keyup blur',function(){ 
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_lastname').html('Last name is required.');
			} else if (! $(this).val().match(/^[a-zA-Z() ]+$/) ) {
				granpapi.addClass('error');
				$('#edit_lastname').html('characters from a-z only.');
			}	else {
				granpapi.removeClass('error');
				$('#edit_lastname').html('');
			}
		});

		$('#editUName').keyup( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_username').html('User name is required.');
			}	else if ( $(this).val().length >  20 ) {
				granpapi.addClass('error');
				saveuser = $(this).val().substring(0,20);
				$(this).val(saveuser);
				$('#edit_username').html('up to 20 characters only');
			}	else if (! $(this).val().match(/^[a-zA-Z0-9()]+$/)) {
				granpapi.addClass('error');
				$('#edit_username').html('no spaces and special characters allowed');
			}	else {
				granpapi.removeClass('error');
				$('#edit_username').html('');	
			}
		});

		$('#editUName').blur( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_username').html('User name is required.');
			} else if ( $(this).val().length >  20 ) {
				granpapi.addClass('error');
				saveuser = $(this).val().substring(0,20);
				$(this).val(saveuser);
				$('#edit_username').html('up to 20 characters only');
			}	else if (! $(this).val().match(/^[a-zA-Z0-9()]+$/)) {
				granpapi.addClass('error');
				$('#edit_username').html('no spaces and special characters allowed');
			} else {
				$.get('sql/checkUsername.php', 
					{ username: $(this).val() }, function(result) {
					console.log(result);
					if (result == "true") {
						granpapi.addClass('error');
						$('#edit_username').html('username has already been used');
					} else {
						granpapi.removeClass('error');
						$('#edit_username').html('');	
					}
				});			
			}				
		});


		$('#editEmail').keyup( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_email').html('Email is required.');
			} else if (! $(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
				granpapi.addClass('error');
				$('#edit_email').html('please input valid Email');
			} else {
				granpapi.removeClass('error');
				$('#edit_email').html('');	
			}// console.log($('#email'));
		});

		$('#editEmail').blur( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_email').html('Email is required.');
			} else if (! $(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
				granpapi.addClass('error');
				$('#edit_email').html('please input valid Email');
			} else {
				$.get('sql/checkEmail.php', { 
						email: $(this).val() 
					}, function(result) {
						console.log(result);
						if (result == "true") {
							granpapi.addClass('error');
							$('#edit_email').html('email is already in use');
						} else {
							granpapi.removeClass('error');
							$('#edit_email').html('');
						}
				});					
			}
		});

		$('#newPassword').bind('keyup blur', function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#edit_password').html('Password is required.');
			} else if ( $(this).val().length >  20 ) {
				granpapi.addClass('error');
				savepass = $(this).val().substring(0,20);
				$(this).val(savepass);
				$('#edit_password').html('up to 20 characters only');
			}	else {
				granpapi.removeClass('error');
				$('#edit_password').html('');	
			}
		});
		

		$('#confirmPassword').keyup( function() {
			var granpapi = $(this).parent().parent();
			if (  $('#newPassword').val() != $('#confirmPassword').val() ) {
				granpapi.addClass('error');	
				$('#edit_conpassword').html('Passwords do not match.');
			} else {
				granpapi.removeClass('error');
				$('#edit_conpassword').html('');
			}
		});


</script>