@extends('client.ClientDashboard')
@section('title')
Client Settings
@endsection


@section('content')


  <div class="row">			
	<div class="ci col s8 push-s3" style="margin-top:25px;">	
		<ul class="collection with-header" id="collectionActive" >
			<li class="collection-header">
                
				<a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue tooltipped " id = 'buttonDetail' style="margin-right: 20px;" ><i class="material-icons">mode_edit</i></a>
               
				<a  data-position="bottom" data-delay="50" data-tooltip="Change Password" class="btn blue tooltipped" id = 'btnUpdatePassword' style="margin-right: 20px;" ><i class="material-icons">vpn_key</i></a>
				
				<a class="btn green" id = 'btnSaveMachine' >Set this machine to cgr</a>
            </li>
			
			<li class="collection-header">
				<h4 style="font-weight:bold;">Account Information</h4>
			</li>
                
                 <div class="col s12">     
                    <div class="col s6">                        
                    
                        <li class="collection-item" style="font-weight:bold;">Client Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp; {{$client->strClientName}} </div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;{{$client->strAddress}}</div>
                        </li>
						
						<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = ''>{{$client->strPersonInCharge}}&nbsp;&nbsp;&nbsp;</div>
                        </li>                        
						
						<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;{{$client->deciAreaSize}}</div>
                        </li>
                                               
                      
                    </div>
                    <div class="col s6">
                      
                        <li class="collection-item" style="display:hidden;">&nbsp;&nbsp;&nbsp;<div style="font-weight:normal; display:hidden" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        
						<li class="collection-item" style="font-weight:bold;">Contact Number:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;{{$client->strContactNumber}}</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Contact Number(Person in Charge):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;{{$client->strPOICContactNumber}}</div>
                        </li>
                        

                        <li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = ''>{{$client->intPopulation}}&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        
                    </div>
			</div>
				<li class="collection-item" style="font-weight:bold;color:transparent">.
				</li>
		</ul>
      </div>
	</div>
<!-- Change Password Start-->
<div id="modalchangePassword" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Change Password</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strCurrent" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Current Password</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">New Password</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strConfirm" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Confirm New Password</label> 
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">Save
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!-- Change Password End -->

<div class="row"></div>
<div class="row"></div>

<!-- Change Detail Start -->
<div id="modalchangeDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:800px !important; margin-top:10px !important;  max-height:100% !important; height:500px !important; border-radius:10px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Edit Details</center></h3>  
		</div>
	</div>
	<div class="modal-content sidenavhover " id="" style="overflow-x:hidden;" >
		<div class="row">
			<div class="col s12">
						
						
						<div class="input-field col s6 offset-s6 pull-s6">
							
							<input placeholder = " " id="strClientName" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true" value = '{{$client->strClientName}}'>								
							<label class="ci" data-error="Incorrect" for="strClientName">Client Name</label>
						</div>
									
				
				
						<div class="input-field col s6">
							
							<input placeholder = " " id="strAddress" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true" value = '{{$client->strAddress}}'>
							<label class="ci" data-error="Incorrect" for="strAddress">Address</label>
						</div>
				
						<div class="input-field col s6">
							<input placeholder=" " id="strContactNumber" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true" value = '{{$client->strContactNumber}}'>
							<label data-error="Incorrect" for="strContactNumber">Contact Number (Client)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="strPersonInCharge" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" value = '{{$client->strPersonInCharge}}'>
							<label for="strPersonInCharge" data-error="Incorrect">Person in Charge</label>
						</div>
				

						<div class="input-field col s6">
							<input placeholder=" " id="strPOICContactNumber" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true" value = '{{$client->strPOICContactNumber}}'>
							<label data-error="Incorrect" for="strPOICContactNumber">Contact Number (Person In Charge)</label>

						</div>
						
						<div class="input-field col s6">
							<input placeholder=" " id="deciAreaSize" type="text" class="validate" pattern="[0-9. ]{2,}" required="" aria-required="true" value = '{{$client->deciAreaSize}}'>
							<label data-error="Incorrect" for="deciAreaSize">Area Size (approx. in square meters)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="intPopulation" type="text" class="validate" pattern="[0-9, ]{2,}" required="" aria-required="true" value = '{{$client->intPopulation}}'>
							<label data-error="Incorrect" for="intPopulation">Population (approx.)</label>

						</div>
					</div>
		</div>
	</div>
	<!-- Modal Button Save -->
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSaveDetails">Save
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>


<script>

$(document).ready(function(){
	$('.slider').slider({full_width: true});

	$('#buttonDetail').click(function(){
		$('#modalchangeDetails').openModal();
	});

	$('#btnUpdatePassword').click(function(){
		$('#modalchangePassword').openModal();
	});

	$('#btnSaveDetails').click(function(){
		swal({
			title: "Confirm Password",
			text: "Please Enter Password",
			type: "input",
			inputType: "password",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Enter Password"
		}, 
		function(inputValue) {
			if (checkPassword(inputValue) == false) {
				swal.showInputError("Check Input!");
				return false;
			}else{
				if (checkInput()){
					var strClientName = $('#strClientName').val().trim();
					var strAddress = $('#strAddress').val().trim();
					var strPersonInCharge = $('#strPersonInCharge').val().trim();
					var deciAreaSize = $('#deciAreaSize').val().trim();
					var strContactNumber = $('#strContactNumber').val().trim();
					var strPOICContactNumber = $('#strPOICContactNumber').val().trim();
					var intPopulation = $('#intPopulation').val().trim();

					$.ajax({
		                type: "POST",
		                url: "{{action('ClientSettingsController@update')}}",
		                beforeSend: function (xhr) {
		                    var token = $('meta[name="csrf_token"]').attr('content');

		                    if (token) {
		                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		                    }
		                },
		                data: {
		                    strClientName: strClientName, 
		                    strAddress: strAddress, 
		                    strPersonInCharge: strPersonInCharge,
		                    strPOICContactNumber: strPOICContactNumber,
		                    deciAreaSize: deciAreaSize,
		                    strContactNumber: strContactNumber,
		                    intPopulation: intPopulation
		                },
		                success: function(data){

		                	swal({
								title: "Success!",
								text: "Profile Updated!",
								type: "success"
							},
							function(){
								window.location.href = '{{ URL::to("/clientsettings") }}';
							});
		                },
		                error: function(data){
		                }
		            });//ajax
				}else{
					var toastContent = $('<span>Check your input. All fields are required.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}//if else check input()
			}
		});
	});

	$('#btnChangePasswordSave').click(function(){
		var strCurrent = $('#strCurrent').val();
		var strNew = $('#strNew').val();
		var strConfirm = $('#strConfirm').val();
		if (checkInputPassword() && checkPassword(strCurrent) && (strNew == strConfirm)){
			$.ajax({
                type: "POST",
                url: "{{action('SecuritySettingsController@updatePassword')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    strNewPassword: strNew
                },
                success: function(data){
                	swal({
						title: "Success!",
						text: "Password Updated!",
						type: "success"
					},
					function(){
						window.location.href = '{{ URL::to("/clientsettings") }}';
					});
                },
                error: function(data){
                	var toastContent = $('<span>Check your input.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
                }
            });//ajax
		}else{

		}
	});

	$('#btnSaveMachine').click(function(){
		
		swal({
			title: "Confirm Password",
			text: "Please Enter Password",
			type: "input",
			inputType: "password",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Enter Password"
		}, 
		 function(inputValue) {
			if (checkPassword(inputValue) == false) {
				swal.showInputError("Check Input!");
				return false;
			}else{
				$.ajax({
	                type: "POST",
	                url: "{{action('ClientSettingsController@updateMacAddress')}}",
	                beforeSend: function (xhr) {
	                    var token = $('meta[name="csrf_token"]').attr('content');

	                    if (token) {
	                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                    }
	                },
	                data: {
	                    
	                },
	                success: function(data){
						swal("Success!", "This PC is now registered to CGRM. You can access CGRM through only this PC.", "success");
	                },
	            });//ajax
			}// if else checking password
		});//swal
	});//button

	function checkInput(){
		var strClientName = $('#strClientName').val().trim();
		var strAddress = $('#strAddress').val().trim();
		var strPersonInCharge = $('#strPersonInCharge').val().trim();
		var deciAreaSize = $('#deciAreaSize').val().trim();
		var strContactNumber = $('#strContactNumber').val().trim();
		var strPOICContactNumber = $('#strPOICContactNumber').val().trim();
		var intPopulation = $('#intPopulation').val().trim();

		if (strClientName == '' || strAddress == '' || strPersonInCharge == '' || deciAreaSize == '' ||
			strContactNumber == '' || strPOICContactNumber == '' || intPopulation == '' || intPopulation < 0 || 
			deciAreaSize < 0){
			
			return false;
		}else{
			return true;
		}
	}

	function checkPassword(password){
		var checker;
		$.ajax({
            type: "POST",
            url: "{{action('SecuritySettingsController@checkPassword')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                password: password
            },
            success: function(data){
            	console.log(data);
            	if (data){
	        		checker = true;
	        	}else{
	        		checker = false;
	        	}
            },
            error: function(data){
            },async:false
        });//ajax
        return checker;
	}

	function checkInputPassword(){
		var strCurrent = $('#strCurrent').val();
		var strNew = $('#strNew').val();
		var strConfirm = $('#strConfirm').val();

		if (strCurrent == '' || strNew == '' || strConfirm == ''){
			return false;
		}else{
			return true;
		}
	}
});
</script>

@stop