<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/login_layout.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>
	<? 
		session_start();
		if(! isset($_SESSION['logged_in'])) $_SESSION['logged_in'] = false;

		if ( $_SESSION['logged_in'] ) {
			header ("Location: http://localhost/skedme/skedme_home.php");
		}

	?>
	<body>
	<div class="header">
		<img id="title" src = "img/sked_me_title.png"/>
		<img id="logo" src="img/logo.png">
		<div class="pull-right">			
			<button id="signup_button" class="btn btn-danger pull-right" style="margin-top: 5px; margin-left: 10px; margin-right: 30px">Sign Up</button>
			<button id="login_button" class="btn btn-danger pull-right" style="margin-top: 5px; margin-left: 10px; margin-right: 30px">Login</button>
		</div>
		<div class="alert alert-error" id="incorrect_login" style="margin: 0px auto; width: 235px;"><strong>Ooops!</strong> Wrong email and/or password..00</div>
	</div>
	<!--log in -->
	<div id="my_div" style="background-color: #f5f5f5; border: 1px solid #dddddd; border-radius: 10px 10px 10px 10px; float: right; position: absolute; top: -200px; left: 950px; width: 315px;">
		<form id="signinform" method="post" action="sql/login.php">
			<input type="text" name="inputEmail" id="inputEmail" placeholder="Email">
			<input type="password" name="inputPassword" id="inputPassword" placeholder="Password"><br>
			<input type="checkbox"> Remember me
			<button id="sign_in" class="btn btn-danger" type="submit" style="margin-left: 38px;">Sign in</button> 
				
		</form>
	</div>	
	<!-- sign up -->
	<div id="signupMod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3 id="myModalLabel">Sign Up!</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="span7">
					<form class="form-horizontal" id="input_form" method="post" action="sql/user.php" >
						<div class="control-group">
							<label class="control-label" for="inputFName" style="width: 70px;" >First Name</label>
							<div class="controls" style="margin-left: 80px;">
								<input type="text" name="inputFName" id="inputFName" placeholder="First Name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputLName" style="width: 70px;" >Last Name</label>
							<div class="controls" style="margin-left: 80px;">
								<input type="text" name="inputLName" id="inputLName" placeholder="Last Name">
							</div>
						</div>
						<div class="control-group">
						<label class="control-label" for="inputEmail" style="width: 70px;" >Email</label>
							<div class="controls" style="margin-left: 80px;">
								<input type="text" name="inputEmail2" id="inputEmail2" placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputUName" style="width: 70px;" >User Name</label>
							<div class="controls" style="margin-left: 80px;">
								<input type="text" name="inputUName" id="inputUName" placeholder="User Name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword2" style="width: 70px;">Password</label>
							<div class="controls" style="margin-left: 80px;">
								<input type="password" name="inputPassword2"id="inputPassword2" placeholder="Password">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword3" style="width: 70px;">Confirm Password</label>
							<div class="controls" style="margin-left: 80px;">
								<input type="password" id="inputPassword3" placeholder="Confirm Password">
							</div>
						</div>
					</form>			
				</div>
				<div class="span5"> 
					<form class="form-horizontal" id="warning_form" style="width: 225px; padding-top: 10px;" >
					<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
						<div class="controls" id="firstname" style="margin-left: 0px; color: red;"></div>
					</div>
					<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
						<div class="controls" id="lastname" style="margin-left: 0px; color: red;"></div>
					</div>
					<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
						<div class="controls" id="email" style="margin-left: 0px; color: red;"></div>			
					</div>
					<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
						<div class="controls" id="username" style="margin-left: 0px; color: red;"></div>
					</div>
					<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
						<div class="controls" id="password" style="margin-left: 0px; color: red;"></div>
					</div>
					<div class="control-group" style="margin-top: 8px; margin-bottom: 30px; height: 17px;">
						<div class="controls" id="conpassword" style="margin-left: 0px; color: red;"></div>
					</div>
				</form>
				</div>
			</div>
			<div class="row-fluid">
				<div class="alert alert-error" id="maximal">
				  Please take note of the red warnings on the right
				</div>				
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-danger" id="signup">Sign Up</button>
		</div>
	</div>
	<!-- bodeh -->
	<div class="row-fluid">
		<div class = "span6">
			<div id = "hi"> 
					Welcome,
			</div>
			<div id = "welcome">
				<p id="welcome_text">
					<br>
					Sked Me, is an online <br> interactive planner designed to <br> help users manage and schedule <br> their day to day activities! <br>
				</p>
			 	<p id="plan"><br>Plan your days ahead :)<br></p>
			 </div>
			
		</div>
		<div class = "span6">
			<div id = "featured"> </div>
			<div id = "events"> 
				<div id="myCarousel" class="carousel slide">								
					<div class="carousel-inner">
						<div class="item active"><img src="img/party.jpg"></div>
						<div class="item"><img src="img/meeting.jpg"></div>
						<div class="item"><img src="img/party1.jpg"></div>
						<div class="item"><img src="img/party2.jpg"></div>
						<div class="item"><img src="img/party3.jpg"></div>
						<div class="item"><img src="img/meeting1.jpg"></div>
						<div class="item"><img src="img/party4.jpg"></div>
						<div class="item"><img src="img/party5.jpg"></div>
					</div>
					<ol class="carousel-indicators">
						<li class="active" data-target="#myCarousel" data-slide-to="0"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
						<li data-target="#myCarousel" data-slide-to="3"></li>
						<li data-target="#myCarousel" data-slide-to="4"></li>
						<li data-target="#myCarousel" data-slide-to="5"></li>
						<li data-target="#myCarousel" data-slide-to="6"></li>
					</ol>
					<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div id="copyright">
			<small>
				"Copyright © 2013 Web Designer JAT. All rights reserved"
			</small>
		</div>
	</div>


	<script>
		$('#maximal').hide();
		$('#incorrect_login').hide();

		var shown = false;
		$('#login_button').popover({
			placement : 'bottom',
			html : true,
			content : $('#my_div').html()
		});


		<? if (isset($_GET['error'])) { ?>
			$('#incorrect_login').show();
		<? } ?>
		
		$('#sign_in').click ( function() {
			$('#signinform').submit();
		});
		
		$('#signup_button').click ( function() {
			$('#input_form input').val('');
			$('#signupMod').modal();
		});
		//first name
		$('#inputFName').bind('keyup blur',function(){ 
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#firstname').html('First name is required.');
			} else if (! $(this).val().match(/^[a-zA-Z() ]+$/) ) {
				granpapi.addClass('error');
				$('#firstname').html('characters from a-z only.');
			}	else {
				granpapi.removeClass('error');
				$('#firstname').html('');
			}
		});
		// last name
		$('#inputLName').bind('keyup blur',function(){ 
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#lastname').html('Last name is required.');
			} else if (! $(this).val().match(/^[a-zA-Z() ]+$/) ) {
				granpapi.addClass('error');
				$('#lastname').html('characters from a-z only.');
			}	else {
				granpapi.removeClass('error');
				$('#lastname').html('');
			}
		});
		//user name
		var saveuser = "";
		$('#inputUName').keyup( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#username').html('User name is required.');
			}	else if ( $(this).val().length >  20 ) {
				granpapi.addClass('error');
				saveuser = $(this).val().substring(0,20);
				$(this).val(saveuser);
				$('#username').html('up to 20 characters only');
			}	else if (! $(this).val().match(/^[a-zA-Z0-9()]+$/)) {
				granpapi.addClass('error');
				$('#username').html('no spaces and special characters allowed');
			}	else {
				granpapi.removeClass('error');
				$('#username').html('');	
			}
		});

		$('#inputUName').blur( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#username').html('User name is required.');
			} else if ( $(this).val().length >  20 ) {
				granpapi.addClass('error');
				saveuser = $(this).val().substring(0,20);
				$(this).val(saveuser);
				$('#username').html('up to 20 characters only');
			}	else if (! $(this).val().match(/^[a-zA-Z0-9()]+$/)) {
				granpapi.addClass('error');
				$('#username').html('no spaces and special characters allowed');
			} else {
				$.get('sql/checkUsername.php', 
					{ username: $(this).val() }, function(result) {
					console.log(result);
					if (result == "true") {
						granpapi.addClass('error');
						$('#username').html('username has already been used');
					} else {
						granpapi.removeClass('error');
						$('#username').html('');	
					}
				});			
			}				
		});


		$('#inputEmail2').keyup( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#email').html('Email is required.');
			} else if (! $(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
				granpapi.addClass('error');
				$('#email').html('please input valid Email');
			} else {
				granpapi.removeClass('error');
				$('#email').html('');	
			}// console.log($('#email'));
		});

		$('#inputEmail2').blur( function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#email').html('Email is required.');
			} else if (! $(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
				granpapi.addClass('error');
				$('#email').html('please input valid Email');
			} else {
				$.get('sql/checkEmail.php', { 
						email: $(this).val() 
					}, function(result) {
						console.log(result);
						if (result == "true") {
							granpapi.addClass('error');
							$('#email').html('email is already in use');
						} else {
							granpapi.removeClass('error');
							$('#email').html('');
						}
				});					
			}
		});

		//password
		var savepass = "";
		$('#inputPassword2').bind('keyup blur', function() {
			var granpapi = $(this).parent().parent();
			if ( $(this).val().trim() == '' ) {
				granpapi.addClass('error');
				$('#password').html('Password is required.');
			} else if ( $(this).val().length >  20 ) {
				granpapi.addClass('error');
				savepass = $(this).val().substring(0,20);
				$(this).val(savepass);
				$('#password').html('up to 20 characters only');
			}	else {
				granpapi.removeClass('error');
				$('#password').html('');	
			}
		});
		

		$('#inputPassword3').keyup( function() {
			var granpapi = $(this).parent().parent();
			if (  $('#inputPassword2').val() != $('#inputPassword3').val() ) {
				granpapi.addClass('error');	
				$('#conpassword').html('Passwords do not match.');
			} else {
				granpapi.removeClass('error');
				$('#conpassword').html('');
			}
		});

		$('#signup').click(function() {
			var controls = $('#warning_form').find('.controls');
			var allow_submit = true;
			$.each( controls, function(i, item) {
				if ( $(item).html().trim() != '') {
					allow_submit = false;
					$('#maximal').html("Please take note of the red warnings on the right");
				}
			});
			var inputs = $('#input_form').find('input'); 
			$.each( inputs, function(i, item) {
				if ( $(item).val().trim() == '') {
					allow_submit = false;
					$('#maximal').html("Please fill in all of the input fields");
				}
			});		
			
			if ( allow_submit ) {
				$('#maximal').hide();
				$('#input_form').submit();
				return true;
			} else {
				$('#maximal').show();
				return false;
			}
		})
		
		$('#myCarousel').carousel({
				interval: 2000,
				pause: "hover"
		});
	</script>		
	</body>
</html>