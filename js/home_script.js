				<!-- This script and many more are available free online at -->
				<!-- The JavaScript Source!! http://www.javascriptsource.com -->
				<!-- Begin
				
	$(document).ready(function() {

		var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
		var dayNames= ["SUN","MON","TUE","WED","THUR","FRI","SAT"]

		var newDate = new Date();
							
		newDate.setDate(newDate.getDate());
					   
		$('#Date').html(dayNames[newDate.getDay()] + " [" + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getDate() + ' ' + newDate.getFullYear() + "]");

		setInterval( function() {
			var seconds = new Date().getSeconds();
			$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
						
		setInterval( function() {
			var minutes = new Date().getMinutes();
			$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		},1000);
						
		setInterval( function() {
			var hours = new Date().getHours();
			var mval = true;
			if (hours == 0) {
				hours = 12;
			}

			if (hours > 12) {
				hours = hours - 12; 
				mval = false;
			} 

			// Add a leading zero to the hours value
			$("#hours").html('   ' + ( hours < 10 ? "0" : "" ) + hours);
			$("#M").html(" " + ((mval == true) ? "am" : "pm" ));	
			}, 1000);

	});


	// $(document).ready(function() {
	
	// 	var date = new Date();
	// 	var d = date.getDate();
	// 	var m = date.getMonth();
	// 	var y = date.getFullYear();
		
	// 	$('#calendar').fullCalendar({
	// 		header: {
	// 			left: 'prev,next today',
	// 			center: 'title',
	// 			right: 'month,agendaWeek,agendaDay'
	// 		},
	// 		editable: true,
	// 		events: [
	// 			{
	// 				title: 'All Day Event',
	// 				start: new Date(y, m, 1)
	// 			},
	// 			{
	// 				title: 'Long Event',
	// 				start: new Date(y, m, d-5),
	// 				end: new Date(y, m, d-2)
	// 			},
	// 			{
	// 				id: 999,
	// 				title: 'Repeating Event',
	// 				start: new Date(y, m, d-3, 16, 0),
	// 				allDay: false
	// 			},
	// 			{
	// 				id: 999,
	// 				title: 'Repeating Event',
	// 				start: new Date(y, m, d+4, 16, 0),
	// 				allDay: false
	// 			},
	// 			{
	// 				title: 'Meeting',
	// 				start: new Date(y, m, d, 10, 30),
	// 				allDay: false
	// 			},
	// 			{
	// 				title: 'Lunch',
	// 				start: new Date(y, m, d, 12, 0),
	// 				end: new Date(y, m, d, 14, 0),
	// 				allDay: false
	// 			},
	// 			{
	// 				title: 'Birthday Party',
	// 				start: new Date(y, m, d+1, 19, 0),
	// 				end: new Date(y, m, d+1, 22, 30),
	// 				allDay: false
	// 			},
	// 			{
	// 				title: 'Click for Google',
	// 				start: new Date(y, m, 28),
	// 				end: new Date(y, m, 29),
	// 				url: 'http://google.com/'
	// 			}
	// 		]
	// 	});
		
	// });


	$('#caldereta').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					editable: true,
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
									start: '<?=( date("Y-", strtotime("today") ) );?><?=( date( "m-d", strtotime( $bday["date"] ) ) );?>',
									sid: '<?=$bday["S_ID"];?>'
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
									start: '<?=( date( "Y-m-d", strtotime( $event["date"] ) ) );?>',
									sid: '<?=$event["S_ID"];?>'
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
									sid: '<?=$memo["S_ID"];?>'
								}
							<? } ?>
						<? } ?>
							],
		            color: 'black',     // an option!
		            textColor: 'black', // an option!
		            backgroundColor: 'yellow'
		        }        
					], eventClick: function(calEvent, jsEvent, view) {

		        alert('Event: ' + calEvent.title);
		        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        alert('View: ' + view.name);
		        alert('sid: ' + calEvent.sid);

		        // change the border color just for fun
		        $(this).css('border-color', 'red');

		    		}
				});				
			});

			//  End -->