<div id="addEvent" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<h3 class="myModalLabel">Add Event</h3>
	</div>
	<div class="modal-body">
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
				<input type="submit" class="btn btn-success pull-right" value="Add Event">
		</form>			
	</div>
</div>


<div id="addBday" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<h3 class="myModalLabel">Add Birthday</h3>
	</div>
	<div class="modal-body">
		<form id="addBdayForm" class="form-horizontal" id="input_form" style="width: 315px; padding-top: 10px;" method="post" action="sql/schedule.php" > <!--  wa pai sure--> 		
		<input type="hidden" name="sched_type" id="sched_type" value="bday">
		<input type="hidden" name="sid" class="sid_input" value="">
		<div class="control-group">
			<label class="control-label" for="inputBName" style="width: 70px;">Name</label>
			<div class="controls" style="margin-left: 80px;">
				<input type="text" name="inputBName" id="inputBName" placeholder="name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputBDate" style="width: 70px;" >Date</label>
			<div class="controls" style="margin-left: 80px;">
				<input type="text" name="sched_date" id="inputBDate" placeholder="YYYY-MM-DD">
			</div>
		</div>
		<input type="submit" class="btn btn-success pull-right" value="Add Birthday">					
		</form>			
	</div>	
</div>

<div id="addMemo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<h3 class="myModalLabel">Add Memo</h3>
	</div>
	<div class="modal-body">
		<form id="addMemoForm" class="form-horizontal" id="input_form" style="width: 315px; padding-top: 10px;" method="post" action="sql/schedule.php" > 					
			<input type="hidden" name="sched_type" id="sched_type" value="memo">
			<input type="hidden" name="sid" class="sid_input" value="">
			<div class="control-group">
				<label class="control-label" for="inputDes" style="width: 70px;">Description</label>
				<div class="controls" style="margin-left: 80px;">
					<textarea id="description" name="description"></textarea> 
				</div>
			</div>
			<div class="control-group">
			<label class="control-label" for="inputETime" style="width: 70px;">Date</label>
				<div class="controls" style="margin-left: 80px;">
					<input type="text" name="sched_date" id="inputMDate" placeholder="YYYY-MM-DD">
				</div>
			</div>					
			<div class="control-group">
				<label class="control-label" for="inputDeadline" style="width: 70px;">Deadline</label>
				<div class="controls" style="margin-left: 80px;">
					<input type="text" name="inputMDead" id="inputMDead" placeholder="YYYY-MM-DD">
				</div>
			</div>
				<input type="submit" class="btn btn-success pull-right" value="Add Memo">
		</form>	
	</div>
</div>