<div id="updateEvent" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#up_description">Event Details</a></li>
			<li><a href="#up_update">Update</a></li>
		</ul>
	</div>
	<div class="modal-body">
		
		<div class="tab-content">
			<div class="tab-pane active" id="up_description"> 
				<div class="details" id="event_title"></div>
				<div class="details" id="event_place"></div>
				<div class="details" id="event_start"></div>	
				<div class="details" id="event_time"></div>			
			</div>
			<div class="tab-pane" id="up_update">
				<form id="updateEventForm" class="form-horizontal" id="input_form" style="width: 315px; padding-top: 10px;" method="post" action="sql/updateSchedule.php">	
				<input type="hidden" name="sched_type" id="sched_type" value="event">
				<input type="hidden" name="sid" class="sid_input" value="">
				<div class="control-group">
					<label class="control-label" for="updateEName" style="width: 70px;" >Event Name</label>
					<div class="controls" style="margin-left: 80px;">
						<input type="text" name="updateEName" id="updateEName" placeholder="Event">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="updateEPlace" style="width: 70px;" >Place</label>
					<div class="controls" style="margin-left: 80px;">
						<input type="text" name="updateEPlace" id="updateEPlace" placeholder="Place">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" id="updateETime" for="updateETime" style="width: 70px;">Time</label>
					<div class="controls" style="margin-left: 80px;">
						<select id="updatetime" name="time">
						<? for ($i = 0; $i < 23; $i++) { ?>
							<option value="<?=$i;?>:00"><?=($i % 12 == 0 ? '12' : $i % 12);?>:00 <?=(($i > 12 || $i == 0) ? 'A.M.' : 'P.M.');?></option>
						<? } ?>
						</select>						
					</div>
				</div>			
				<div class="control-group">
				<label class="control-label" for="updateETime" style="width: 70px;">Date</label>
					<div class="controls" style="margin-left: 80px;">
						<input type="text" name="sched_date" id="updateEDate" placeholder="YYYY-MM-DD">
					</div>
				</div>			
					<button class="btn btn-primary pull-right updateSched" >Update</button>
					<button class="btn btn-danger pull-right deleteSched" style="margin-right:10px;">Delete</button>
				</form>	
			</div>		
		</div>
	</div>
</div>


<div id="updatebday" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#bday_description">Birthday Details</a></li>
			<li><a href="#bday_update">Update</a></li>
		</ul>
	</div>
	<div class="modal-body">
		<div class="tab-content">
			<div class="tab-pane active" id="bday_description"> 
				<div class="details" id="bday_celeb"></div>
				<div class="details" id="bday_date"></div>
			</div>
			<div class="tab-pane" id="bday_update">
				<form id="addBdayForm" class="form-horizontal" id="input_form" style="width: 315px; padding-top: 10px;" method="post" action="sql/updateSchedule.php" > <!--  wa pai sure--> 		
					<input type="hidden" name="sched_type" id="sched_type" value="bday">
					<input type="hidden" name="sid" class="sid_input" value="">
					<div class="control-group">
						<label class="control-label" for="inputBName" style="width: 70px;">Name</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="updateBName" id="updateBName" placeholder="name">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputBDate" style="width: 70px;" >Date</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="sched_date" id="updateBDate" placeholder="YYYY-MM-DD">
						</div>
					</div>	
					<button class="btn btn-primary pull-right  updateSched">Update</button>
					<button class="btn btn-danger pull-right deleteSched" style="margin-right:10px;">Delete</button>					
				</form>		
			</div>
		</div>
	</div>	
</div>

<div id="updatememo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="max-width: 380px; margin-left: 0px; left: 35%;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#memo_description">Memo Details</a></li>
			<li><a href="#memo_update">Update</a></li>
		</ul>
	</div>
	<div class="modal-body">			
		<div class="tab-content">
			<div class="tab-pane active" id="description_title"> 
				<div class="details" id="description2"></div>
				<div class="details" id="dateStart"></div>
				<div class="details" id="memo_deadline"></div>
			</div>
			<div class="tab-pane" id="memo_update">
				<form id="addMemoForm" class="form-horizontal" id="input_form" style="width: 315px; padding-top: 10px;" method="post" action="sql/updateSchedule.php" > 					
					<input type="hidden" name="sched_type" id="sched_type" value="memo">
					<input type="hidden" name="sid" class="sid_input" value="">
					<div class="control-group">
						<label class="control-label" for="inputDes" style="width: 70px;">Description</label>
						<div class="controls" style="margin-left: 80px;">
							<textarea id="memodescription" name="memodescription"></textarea> 
						</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="inputETime" style="width: 70px;">Date</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="sched_date" id="updateMDate" placeholder="YYYY-MM-DD">
						</div>
					</div>					
					<div class="control-group">
						<label class="control-label" for="inputDeadline" style="width: 70px;">Deadline</label>
						<div class="controls" style="margin-left: 80px;">
							<input type="text" name="updateMDead" id="updateMDead" placeholder="YYYY-MM-DD">
						</div>
					</div>
					<button class="btn btn-primary pull-right updateSched">Update</button>
					<button class="btn btn-danger pull-right deleteSched" style="margin-right:10px;">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>