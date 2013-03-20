<div id="updateEvent" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	</div>
	<div class="modal-body">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#up_description">Event Details</a></li>
			<li><a href="#up_update">Update</a></li>
		</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="up_description"> 
			<div id="eventdet"></div>
		</div>
		<div class="tab-pane" id="up_update">
			<form id="addEventForm" class="form-horizontal" id="input_form" style="width: 315px; padding-top: 10px;" method="post" action="sql/schedule.php">	
			<input type="hidden" name="sched_type" id="sched_type" value="event">
			<input type="hidden" name="sid" class="sid_input" value="">
			<div class="control-group">
				<label class="control-label" for="inputEName" style="width: 70px;" >Event Name</label>
				<div class="controls" style="margin-left: 80px;">
					<input type="text" name="inputEName" id="inputEName" placeholder="Event">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEPlace" style="width: 70px;" >Place</label>
				<div class="controls" style="margin-left: 80px;">
					<input type="text" name="inputEPlace" id="inputEPlace" placeholder="Place">
				</div>
			</div>
			<div class="control-group">
			<label class="control-label" for="inputETime" style="width: 70px;">Time</label>
				<div class="controls" style="margin-left: 80px;">
					<select id="mytime" name="time">
					<? for ($i = 0; $i < 23; $i++) { ?>
						<option value="<?=$i;?>:00"><?=($i % 12 == 0 ? '12' : $i % 12);?>:00 <?=(($i > 12 || $i == 0) ? 'A.M.' : 'P.M.');?></option>
					<? } ?>
					</select>						
				</div>
			</div>			
			<div class="control-group">
			<label class="control-label" for="inputETime" style="width: 70px;">Date</label>
				<div class="controls" style="margin-left: 80px;">
					<input type="text" name="sched_date" id="inputEDate" placeholder="YYYY-MM-DD">
				</div>
			</div>			
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<input type="submit" class="btn btn-primary" value="Update Event">
			</form>	
		</div>		
		</div>
	</div>
</div>