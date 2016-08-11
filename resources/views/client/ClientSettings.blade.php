@extends('client.ClientDashboard')
@section('title')
Client Settings
@endsection


@section('content')


  <div class="row">			
	<div class="ci col s8 push-s3" style="margin-top:25px;">	
		<ul class="collection with-header" id="collectionActive" >
			<li class="collection-header">
                <h4 style="font-weight:bold;">Account Information
				<a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue right tooltipped " id = 'buttonDetail' ><i class="material-icons">mode_edit</i></a>
                </h4>
				<a  data-position="bottom" data-delay="50" data-tooltip="Change Password" class="btn blue tooltipped" id = 'btnUpdatePassword' style="margin-top:-84px; margin-left:650px;"><i class="material-icons">vpn_key</i></a>
            </li>
                      
                    <div class="col s6">                        
                    
                        <li class="collection-item" style="font-weight:bold;">Client Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
						
						<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>                        
						
						<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                                               
                      
                    </div>
                    <div class="col s6">
                      
                        <li class="collection-item" style="display:hidden;">&nbsp;&nbsp;&nbsp;<div style="font-weight:normal; display:hidden" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        
						<li class="collection-item" style="font-weight:bold;">Contact Number:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Contact Number(Person in Charge):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        

                        <li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        
						

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
							
							<input placeholder = " " id="clientName" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">								
							<label class="ci" data-error="Incorrect" for="address">Client Name</label>
						</div>
									
				
				
						<div class="input-field col s6">
							
							<input placeholder = " " id="address" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">
							<label class="ci" data-error="Incorrect" for="address">Address</label>
						</div>
				
						<div class="input-field col s6">
							<input placeholder=" " id="clientNumberEdit" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientNumberEdit">Contact Number (Client)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="personInChargeEdit" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
							<label for="personInChargeEdit" data-error="Incorrect">Person in Charge</label>
						</div>
				

						<div class="input-field col s6">
							<input placeholder=" " id="personNumberEdit" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
							<label data-error="Incorrect" for="personNumberEdit">Contact Number (Person In Charge)</label>

						</div>
						
						<div class="input-field col s6">
							<input placeholder=" " id="areaSizeEdit" type="text" class="validate" pattern="[0-9. ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="areaSizeEdit">Area Size (approx. in square meters)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="populationEdit" type="text" class="validate" pattern="[0-9, ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="populationEdit">Population (approx.)</label>

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
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("Check Input!");
					return false
				}
 
});
				
		
    });
	
</script>

@stop