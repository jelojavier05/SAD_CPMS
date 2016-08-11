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
				<a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue right tooltipped" id = 'buttonDetail'><i class="material-icons">mode_edit</i></a>
                </h4>
				<a  data-position="bottom" data-delay="50" data-tooltip="Change Password" class="btn blue tooltipped" id = 'btnUpdatePassword' style="margin-top:-84px; margin-left:650px;"><i class="material-icons">vpn_key</i></a>
            </li>
                      
                    <div class="col s6">                        
                    
                        <li class="collection-item" style="font-weight:bold;">Client Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Contact Number(Person in Charge):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
						
						<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                                               
                      
                    </div>
                    <div class="col s6">
                      
                        
                        <li class="collection-item" style="font-weight:bold;">Contact Number:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Person in Charge<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        

                        <li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        
						<li class="collection-item" style="display:hidden;"><div style="font-weight:normal;" id = 'contactMobile'>&nbsp;&nbsp;&nbsp;</div>
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
<div id="modalchangeDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:800px !important; margin-top:10px !important;  max-height:100% !important; height:550px !important; border-radius:10px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Edit Details</center></h3>  
		</div>
	</div>
	<div class="modal-content sidenavhover " id="" style="overflow-x:hidden;" >
		<div class="row">
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input placeholder=" " id="strFirstName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">First Name</label> 
				</div>
			</div>
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input  placeholder=" " id="strMiddleName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Middle Name</label> 
				</div>
			</div>
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input  placeholder=" " id="strLastName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Last Name</label> 
				</div>
			</div>
			<div class="col s6">      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">store</i>
					<input placeholder=" " id="strAddress" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Address</label> 
				</div>
			</div>
			<div class="col s3">
				<div class=" input-field col s12">
					<select id = 'selectProvince'>
						
					</select>
				</div>
			</div>
			<div class="col s3">
				<div class=" input-field col s12">
					<select id = 'selectCity'>

					</select>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px; color:#64b5f6;">star</i>
					<input type="date" id="dateOfbirth" class="datepicker"/>
					<label class="active" for="dateOfbirth">Date of Birth</label>
				</div>
			</div>
			<div class="col s6" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">star</i>
					<input placeholder=" " id="strPlaceBirth" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Place of Birth</label> 
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size: 35px;">smartphone</i>
					<input placeholder=" " id="strContactNumberMobile" type="text" class="validate" name="" required="" aria-required="true"/>
					<label for="">Contact Number (Mobile)</label>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size: 35px;">phone</i>
					<input placeholder=" " id="strContactNumberLandline" type="text" class="validate" name="" required="" aria-required="true"/>
					<label for="">Contact Number (Landline)</label>
				</div>
			</div>
			<div class="col s4 push-s2">
				<select id="selectCivilStatus">
					<option selected disabled>Civil Status</option>
					<option>Single</option>
					<option>Married</option>
					<option>Widowed</option>									
				</select>
			</div>
			<div class="col s4 push-s2">
				<select id="selectGender" >
					<option selected disabled>Gender</option>
					<option>Male</option>
					<option>Female</option>																			
				</select>
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
</script>

@stop