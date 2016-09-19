@extends('CGR.CGRMain')
@section('title')
Reports
@endsection

@section('content')

<div class="row"></div>

<!-- Incident Report Form Start -->
<div class= "row">

	<div class="col s8 push-s3">
        <div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:15px;margin-left:-6%">
            <div class=""><center><h3>Report</h3></center></div>
				
				<div class="row">
				    <div class='row'>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
						<legend><h5>Security Guard Information</h5></legend>
						<div class="col s12">
							
							<div class="input-field col s6">
								<select id = 'selectGuard'>
								<option disabled="" selected="">Choose Guard</option>
								@foreach($clientGuard as $value)
									<option value = '{{$value->intGuardID}}'>{{$value->strFirstName}} {{$value->strLastName}}</option>
								@endforeach
								</select>
							</div>
							
						</div>
						
						<div class="row"></div>
					</div>
					
					</div>
					
					<div class='row'>

						<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
							<legend><h5>Information on Incident</h5></legend>
							<div class="col s12">
								
								<div class="input-field col s6">

									<label class="active" style="color:#64b5f6;"  for="dateIncident">Date of the Incident</label>	
									<input placeholder=""  id="dateIncident" type="date" class="datepicker">
								</div>
								
								<div class="input-field col s6">

									<label for="timeIncident">Time</label>
									<input id="timeIncident" input-clock data-twelvehour="false" type="text" class="timepicker" placeholder="">
								</div>
								
								<div class="input-field col s6">
									<input placeholder = " " id="location" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">
									<label class="ci" data-error="Incorrect">Exact Location of the Incident</label>
								</div>
								
								<div class="input-field col s12">								 
									 <textarea placeholder=" " class="materialize-textarea" id="incidentDescription" type="text" length="224"></textarea>
									 <label for="input_text">Description of Incident</label> 
								</div>
									
								<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px;">
									<legend><h4>Witness</h4></legend>
									<button style="margin-top:-15%; margin-left:380px;" class="z-depth-1 btn green" id = "btnAddWitness">
									<i class="material-icons left">add</i>ADD
									</button>
			                        
									<div class="col s10 push-s1">
										<table class="bordered grey lighten-1" id = "tableWitness" style="margin-bottom:15px;">
											<thead>
												<tr>
													<th style="width:20px;"><center>Action</center></th>
													<th style="width:20px;"><center>Witness Name</center></th>
													<th style="width:10px;"><center>Contact Number</center></th>
												</tr>
											</thead>
											<tbody> 
											</tbody>
										</table>
									</div>
								</div>
								
							</div>
							
							<div class="row"></div>												
							
							<div class="row"></div>
						</div>						
						
					</div>
						<center><button class="btn blue" style="margin:1%;" id ='btnSubmit'>Submit</button></center>
				</div>
		</div>
	</div>
</div>
<!-- Incident Report Form End -->

<!-- Adding Witness Start -->
<div id="modalWitness" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
  <div class="modal-header">
    <div class="h">
      <h3><center>Add Witness</center></h3>  
    </div>
  </div>
  <div class="modal-content">
    <div class="row">
      <div class="col s10 push-s1" style="margin-top:-30px;">      
        <div class="row"></div>  
        <div class="input-field col s12">
          <i class="material-icons prefix" style="font-size:35px;">account_circle</i>
          <input id="witnessName" type="text" class="validate" required="" aria-required="true">
          <label for="">Witness Name</label> 
        </div>
      </div>
      <div class="col s10 push-s1" style="margin-top:-30px;">      
        <div class="row"></div>
        <div class="row"></div>  
        <div class="input-field col s12">
          <i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
          <input id="contactNumber" type="text" class="validate" name = "" required="" aria-required="true">
          <label for="">Contact Number</label> 
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal-footer" style="background-color: #00293C;">
    <button class="btn large green" style="margin-right: 30px;" id = "btnOkay">OK
    </button>
  </div>  
</div>
<!-- Adding Witness End -->

<!-- sg login Start-->
<div id="modalLogin" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Login</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input id="username" type="text" class="validate" required="" aria-required="true">
					<label for="">Username</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="password" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Password</label> 
				</div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light green" name="action" style="margin-right: 30px;" id = "btnLogin">OK
		</button>
	</div>	
</div>
<!-- sg login End -->

@stop

@section('script')

<script>
$(document).ready(function(){
	var tableWitness = $('#tableWitness').DataTable();
	var arrWitnessName = [];
	var arrContactNumber = [];

	$('#btnSubmit').click(function(){
		
		if (checkInput()){
			$('#modalLogin').openModal();	
		}else{
			var toastContent = $('<span>Check your input. All fields are required.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
		
	});//btn submit

	$('#btnLogin').click(function(){
		if (login()){
			var guardID = $('#selectGuard').val();
			var location = $('#location').val();
			var description = $('#incidentDescription').val();
			var date = $('#dateIncident').val();
			var militaryTime = moment($('#timeIncident').val(), ["h:mmA"]).format("HH:mm");

			var dateTime = moment(date + ' ' + militaryTime, 'YYYY-MM-DD HH:mm').format();
			$.ajax({
	            type: "POST",
	            url: "{{action('CGRReportsController@postReport')}}",
	            beforeSend: function (xhr) {
	                var token = $('meta[name="csrf_token"]').attr('content');

	                if (token) {
	                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                }
	            },
	            data: {
	                intGuardID: guardID,
	                datetimeIncident: dateTime,
	                location: location,
	                description: description,
	                arrWitnessName: arrWitnessName,
	                arrContactNumber: arrContactNumber
	            },
	            success: function(data){
					swal({
						title: "Success!",
						text: "Incident Reported.",
						type: "success"
					},
					function(){
						window.location.href = '{{ URL::to("/cgrguardattendance") }}';
					});

	            }
	        });//ajax
		}else{
			var toastContent = $('<span>Login Failed.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	$('#btnAddWitness').click(function(){
		$('#modalWitness').openModal();
		$('#witnessName').val('');
		$('#contactNumber').val('');
	});//btn add witness

	$('#btnOkay').click(function(){
		var witnessName = $('#witnessName').val().trim();
		var contactNumber = $('#contactNumber').val().trim();

		if (witnessName != '' && contactNumber != ''){
			$('#modalWitness').closeModal();
			arrWitnessName.push(witnessName);
			arrContactNumber.push(contactNumber);
			refreshTable();
		}else{
			var toastContent = $('<span>All inputs are required.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}// if else
	});//btn okay

	$('#tableWitness').on('click', '.btnDelete', function(){
		arrWitnessName.splice(this.id,1);
		arrContactNumber.splice(this.id,1);
		refreshTable();
	});

	function refreshTable(){
		tableWitness.clear().draw(); //clear all the row

		for (intLoop = 0; intLoop < arrWitnessName.length; intLoop ++){
			var buttonDelete = '<button class = "btn red btnDelete" id = "'+intLoop+'">X</button>';
			var name = '<h>'+arrWitnessName[intLoop]+'</h>';
			var contact = '<h>'+arrContactNumber[intLoop]+'</h>';
			tableWitness.row.add([
	            buttonDelete,
	            name,
	            contact
	          ]).draw();
		}		
	}

	function login(){
		var username = $('#username').val();
		var password = $('#password').val();
		var intGuardID = $('#selectGuard').val();
		var checker;
		$.ajax({
            type: "POST",
            url: "{{action('CGRGuardAttendanceController@login')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
               	username: username,
               	password: password,
               	intGuardID: intGuardID
            },
            success: function(data){
            	if (data){
            		checker = true;
            	}else{
            		checker = false;
            	}
            },async:false
        });//ajax

        return checker;
	}

	function checkInput(){
		var checker;
		var guardID = $('#selectGuard').val();
		var location = $('#location').val().trim();
		var description = $('#incidentDescription').val().trim();
		var date = $('#dateIncident').val();
		var dateChecker = moment(date, 'YYYY-MM-DD').isValid();
		var militaryTime = moment($('#timeIncident').val(), ["h:mmA"]).format("HH:mm");

		var dateTime = new Date(moment(date + ' ' + militaryTime, 'YYYY-MM-DD HH:mm').format());
		var now = new Date();

		if (guardID == null || !(dateChecker) || description == '' || location == '' || (now < dateTime)){
			checker = false;
		}else{
			checker = true;
		}
		return checker;
	}
});
</script>
@stop