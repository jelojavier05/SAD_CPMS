@extends('securityguard.SecurityGuardDashboard1')
@section('title')
Security Homepage
@endsection


@section('content')
  <!--MESSAGE-->
<div class="row">
	<div class="col s8 push-s2">
		
		<ul class="tabs" style="">
        	<li style="color:white"class="tab col l3"><a href="#message" class="active">Messages</a></li>
        </ul>	
		<!-- table message -->
		<div id="message">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="inboxTable">
					<thead>
						<tr>
							<th class="grey lighten-1" style="width: 20px;"></th>
							<th class="grey lighten-1" style="width: 30px;"></th>
							<th class="grey lighten-1">Date</th>
							<th class="grey lighten-1">From</th>
							<th class="grey lighten-1">Subject</th>
						</tr>
					</thead>

					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="modalNewClientRequest" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:570px; margin-top:-30px;">
    <div class="modal-header">
                <div class="h">
                    <h3><center>Message</center></h3>  
				</div>

            </div>
    <div class="modal-content">
        <div class="row">
            <div class="col s12">
                <ul class="collection with-header" id="collectionActive">
                <li class="collection-header" ><h4 style="font-weight:bold;">Details</h4></li>
                <div>
                    <li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Client Name:<div style="font-weight:normal;" id = 'clientName'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;" id = 'contactNumberClient'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'contactNumberPIC'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Number of Guards:<div style="font-weight:normal;" id = 'guardCounter'>&nbsp;&nbsp;&nbsp;</div>
                    </li>
                    <li class="collection-item" style="font-weight:bold;">Shift/s:
                        <div style="font-weight:normal;">
                            <table class="" style="font-family:Myriad Pro" id = 'shiftTable'>
                                <thead>
                                <tr>
                                    <th data-field="st">Shift</th>
                                    <th data-field="fr">From</th>
                                    <th data-field="to">To</th>
                                </tr>
                                </thead>
                                
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="modal-footer ci" style="background-color: #00293C;">
        <div id = "buttons" style="display: none;">	
            <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnAccept">Accept
            </button>

            <button class="btn red waves-effect waves-light modal-close" name="" style="margin-right: 30px;" id = "btnDecline">Decline
            </button>
        </div>
        
        <div id = "accepted" style="display: none;">
            <button class="btn blue left" style="margin-right: 10px" id="">I've changed my mind</button>
			
			<button class="btn green" name="" style="margin-right: 30px; cursor:default;" id = "">Accepted
            </button>
        </div>
        
        <div id = "rejected" style="display: none;">
			<button class="btn blue left" style="margin-right: 10px" id="">I've changed my mind</button>
            <button class="btn red" name="" style="margin-right: 30px; cursor:default;" id = "">Declined
            </button>
        </div>
        
        <div id = "notAvailable" style="display: none;">
            <button class="btn grey" name="" style="margin-right: 30px; cursor:default;" id = "">Unavailable
            </button>
        </div>
    </div>
</div>

<div id="modalMessage" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:470px; margin-top:-10px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Message</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header"><div style="font-size:18px;" id = "messageSubject">&nbsp;</div></li>
					<li class="collection-item"><p id = 'messageInbox'></p>
                    </li>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK
            </button>
	</div>
</div>

<script>
$(document).ready(function(){
    
    var tableRowCounter = 0;
    var table = $('#inboxTable').DataTable();
    var inboxID;
    
    $.ajax({
            
        type: "GET",
        url: "{{action('SecurityHomepageController@getGuardInformation')}}",
        success: function(data){
            if (data){
                $('#strProfileName').text(data.strFirstName + ' ' + data.strLastName);
                $('#strProfileLicenseNumber').text(data.strLicenseNumber);    
            }
        }
    });//guard information
    
   
});
</script>

@stop
