<!DOCTYPE html>
<html lang=”en”>
	<head>
		<title>Sked Me Home</title> 
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/datepicker.css" rel="stylesheet">
		<link href="css/home_layout.css" rel="stylesheet">
		<link href='css/fullcalendar.css' rel="stylesheet"/>
		<link href='css/fullcalendar.print.css' media='print' rel="stylesheet"/>		
		<script src="js/jquery-1.9.1.js"></script>		
		<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src='js/fullcalendar.min.js'></script>

	</head>
	<? 
		session_start();
		if(! isset($_SESSION['logged_in'])) $_SESSION['logged_in'] = false;

		if (! $_SESSION['logged_in']) {
			header ("Location: http://localhost/skedme/skedme_login.php");
		}
		include("sql/getSchedule.php");

	
	?>
	<body>
		<div class="header" style=" top: 0px;	">
			<a href="http://localhost/skedme/skedme_home.php"><img id="title" src="img/sked_me_title.png"></a>
			<img id="logo" src="img/logo.png">
			<div class="pull-right" style="position: relative;">
				<a href="http://localhost/skedme/sql/logout.php">
				<button id="logout_button" class="btn btn-danger pull-right" style="margin-top: 5px; margin-left: 10px; margin-right: 30px;">Log Out</button>
				</a>
			</div>
		</div>
		<div class="row-fluid">
			<div class="left_wing" style="margin-top: 30px;">
				<div class="user_box">
					<div id="user_pic"></div>
						<div id="user_info">
							<table id="user_data">
								<tr>
									<th id="user_name">Name: <?=$_SESSION['user']['firstname'];?> <?=$_SESSION['user']['lastname'];?></th>
								</tr>
								<tr>
									<th id="user_email">E-mail Address: <?=$_SESSION['user']['email'];?></th>
								</tr>
							</table>
						</div>
						<div id="edit_prof">							
							<button class="btn btn-mini pull-right" style="margin-right: 20px;" type="button" id="editProf" style="">Edit Profile</button>
							<? include("modal/editProfile.php");?>
						</div>
				</div>
			</div>
			<div class="right_wing">
				<div class="button_bar">
					<div class="dropdown">
				    <a href="#" class="dropdown-toggle" id="add-toggle"><i class="icon-plus"></i><p id="add_label">Add Schedule</p></a>
				    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="width: 200px;">
				    	<li class="add"><a href="#" id="addbday">add birthday</a></li>
				    	<li class="add"><a href="#" id="addevent">add event</a></li>
				    	<li class="add"><a href="#" id="addmemo">add memo</a></li>
				    </ul>
			    </div>
				</div>
				<div class="calendar_box">
					 <div class="row-fluid">
						<div class="span12">
							<div id="calendar"></div>
						</div>
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

		<? include ("modal/addSchedule.php"); ?>
		<? include ("modal/updateSchedule.php"); ?>
		<script type="text/javascript">

			$('#editProf').click( function() {
				$('#editProfile').modal();
			});

			$('#add-toggle').dropdown();

			$('#addevent').click( function() {
				$('#addEventForm').attr('action', 'sql/schedule.php');
				$('#addEvent').modal();
			});

			$('#addbday').click( function() {
				$('#addBdayForm').attr('action', 'sql/schedule.php');
				$('#addBday').modal();
			});

			$('#addmemo').click( function() {
				$('#addMemoForm').attr('action', 'sql/schedule.php');
				$('#addMemo').modal();
			});
			
			$('#inputEDate').datepicker();
			$('#inputBDate').datepicker();
			$('#inputMDead').datepicker();
			$('#inputMDate').datepicker();

			$(document).ready(function() {
			
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					editable: false,
					eventSources: [
		        {
							events: [
						<?
							if ( isset( $schedule['bday'] ) ) {
								$commaon = false;
								foreach ( $schedule['bday'] as $bday ) {
									if ( $commaon ) {
										echo ",";
									} else {
										$commaon = true;
									}
						?>
								{
									title: '<?=($bday["celebrant"] . "\'s" . " Birthday");?>',
									start: '<?=( date("Y-") );?><?=( date( "m-d", strtotime( $bday["date"] ) ) );?>',
									sid: '<?=$bday["S_ID"];?>',
									celebrant: '<?=$bday["celebrant"];?>',
									type: 'bday',
									ddate: '<?=( date( "m/d/Y", strtotime( $bday["date"] ) ) );?>' 
								}
							<? } ?>
						<? } ?>
							],
		            color: 'black',     // an option!
		            textColor: 'blue', // an option!
		            backgroundColor: 'red'
		        }, { events: [
						<?
							if ( isset( $schedule['event'] ) ) {
								$commaon = false;
								foreach ( $schedule['event'] as $event ) {
									if ( $commaon ) {
										echo ",";
									} else {
										$commaon = true;
									}
						?>
								{
									title: '<?=$event["event_name"];?>',
									start: '<?=( date( "Y-m-d", strtotime( $event["date"] ) ) );?> <?=( date( "H:00:00", strtotime( $event["time"] ) ) );?>',
									sid: '<?=$event["S_ID"];?>',
									place: '<?=$event["place"];?>',
									mytime: '<?=( date( "H:00", strtotime( $event["time"] ) ) );?>',
									allDay: false,
									type: 'event',
									ddate: '<?=( date( "m/d/Y", strtotime( $event["date"] ) ) );?>'
								}
							<? } ?>
						<? } ?>
							],
		            color: 'black',     // an option!
		            textColor: 'red', // an option!
		            backgroundColor: 'blue'
		        }, { events: [
						<?
							if ( isset( $schedule['memo'] ) ) {
								$commaon = false;
								foreach ( $schedule['memo'] as $memo ) {
									if ( $commaon ) {
										echo ",";
									} else {
										$commaon = true;
									}
						?>
								{
									title: '<?=$memo["description"];?>',
									start: '<?=( date( "Y-m-d", strtotime( $memo["date"] ) ) );?>',
									sid: '<?=$memo["S_ID"];?>',
									type: 'memo',
									ddate: '<?=( date( "m/d/Y", strtotime( $memo["date"] ) ) );?>',
									edate: '<?=( date( "m/d/Y", strtotime( $memo["deadline"] ) ) );?>'
								}
							<? } ?>
						<? } ?>
							],
		            color: 'black',     // an option!
		            textColor: 'black', // an option!
		            backgroundColor: 'yellow'
		        }        
					], eventClick: function(calEvent, jsEvent, view) {
						$('.sid_input').val( calEvent.sid );
						if (calEvent.type == 'bday') {
							$('#bday_celeb').html( calEvent.celebrant );
							$('#bday_date').html( calEvent.ddate );

							$('#updateBName').val( calEvent.celebrant );
							$('#updateBDate').val( calEvent.ddate );
							$('#updateBDate').datepicker( 'setValue', calEvent.ddate );
					
							$('#updatebday').modal();
						} else if (calEvent.type == 'event') {
							$('#event_title').html( calEvent.title );
							$('#event_place').html( calEvent.place );
							$('#event_start').html( calEvent.ddate );
							$('#event_time').html( calEvent.mytime );
				
							$('#updateEName').val( calEvent.title );
							$('#updateEDate').datepicker( 'setValue', calEvent.ddate );							
							$('#updateEPlace').val( calEvent.place );
							$('#mytime').val( calEvent.mytime );
							$('#updateEDate').val( calEvent.ddate );
							$('#updateEDate').datepicker( 'setValue', calEvent.ddate );
			
							$('#updateEvent').modal();
							

						} else if (calEvent.type == 'memo') {
							$('.sid_input').val(calEvent.sid);
							$('#description2').html( calEvent.title );
							$('#dateStart').html( calEvent.ddate);
							$('#memo_deadline').html( calEvent.edate );
							
							$('#memodescription').html( calEvent.title );
							$('#updateMDate').val( calEvent.ddate );
							$('#updateMDate').datepicker( 'setValue', calEvent.ddate );
							$('#updateMDead').val( calEvent.edate );
							$('#updateMDead').datepicker( 'setValue', calEvent.edate );
							
							$('#updatememo').modal();
						}
		        // alert('Event: ' + calEvent.title);
		        // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        // alert('View: ' + view.name);
		        // alert('sid: ' + calEvent.sid);

		        // change the border color just for fun
		        $(this).css('border-color', 'red');

		    	}
				});				
			});

			$('#myTab a').click(function (e) {
		    e.preventDefault();
		    $(this).tab('show');
	    });

	    $('.deleteSched').click( function() {
	    	var current_form = $(this).parent();
	    	current_form.attr('action', 'sql/removeSchedule.php');

	    	current_form.submit();
	    });

	    $('.updateSched').click( function() {
	    	var current_form = $(this).parent();
	    	current_form.attr('action', 'sql/updateSchedule.php');
	    	current_form.submit();
	    });


	    
		</script>
	</body>

</html>