@extends('securityguard.SecurityGuardDashboard1')
@section('title')
Security Homepage
@endsection


@section('content')
<!-- Table Start -->
	<div class="row">
		<div class="col s12 l8 push-l3">
	        
	        <div class="row" style="margin-top:-40px;"> 
	           <div class="col s12 l12 push-s2 push-l4">
	                 <h3 style="font-family:Myriad Pro;margin-top:9.2%;color:#34675C;font-weight:bold">MESSAGES</h3>
	           </div>  
	           <div class="col s12 l12">
	                <hr>
	           </div>
	        </div>	
			<!-- table message -->
			<div id="message" class="col s12 l12">
				<div class="container-fluid grey lighten-2" style="border: 1px solid grey; margin-top:-10px;">	
					<table class="striped" id="inboxTable">					
						<thead>
							<tr>
								<th class="grey lighten-1"></th>
								<th class="grey lighten-1"></th>
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
<!-- Table End -->

<!--modal new client request-->
	<div id="modalNewClientRequest" class="modal modal-fixed-footer ci" style="overflow:hidden;">
	    <div class="modal-header">
	                <div class="h">
	                    <h3><center>New Client</center></h3>  
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
			<div class="row"></div>
	    </div>
	    
	    <div class="modal-footer ci" style="background-color: #00293C;">
	        <div id = "buttons" style="display: none;">	
	            <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnAccept">Accept
	            </button>

	            <button class="btn red waves-effect waves-light modal-close" name="" style="margin-right: 30px;" id = "btnDecline">Decline
	            </button>
	        </div>
	        
	        <div id = "accepted" style="display: none;">
				
				<button class="btn green" name="" style="margin-right: 30px; cursor:default;" id = "">Accepted
	            </button>
	        </div>
	        
	        <div id = "rejected" style="display: none;">
	            <button class="btn red" name="" style="margin-right: 30px; cursor:default;" id = "">Declined
	            </button>
	        </div>
	        
	        <div id = "notAvailable" style="display: none;">
	            <button class="btn grey" name="" style="margin-right: 30px; cursor:default;" id = "">Unavailable
	            </button>
	        </div>
	    </div>
	</div>
<!--modal new client request end-->


<!--modal message approved client/contract-->
	<div id="modalMessage" class="modal modal-fixed-footer ci" style="overflow:hidden;">
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
<!--modal message approved client/contract end-->
	

<!--modal leave request from other guard////releiver-->
	<div id="modalLeaveRequestNotification" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:600px; margin-top:-50px;">
	    <div class="modal-header">
	      	<div class="h">
				<h3><center>Reliever Notice</center></h3>  
			</div>
	    </div>
		
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<ul class="collection with-header" id="collectionActive">
						<li class="collection-header">
							<div class="row">
								<div class="col s6">	
									From:<div style="font-size:18px;" id = "dateStart">&nbsp;</div>
								</div>
								<div class="col s6">
									To:<div style="font-size:18px;" id = "dateEnd">&nbsp;</div>
								</div>
							</div>
						
						</li>
						
						<li class="collection-header" ><h4 style="font-weight:bold;">Details</h4></li>
	                <div>
	                    <li class="collection-item" style="font-weight:bold;">
							<div class="row">
								<div class="col s6">	
									Nature of Business:<div style="font-weight:normal;" id = 'strNatureOfBusiness'>&nbsp;&nbsp;&nbsp;Bank</div>
								</div>
								<div class="col s6">
									Client Name:<div style="font-weight:normal;" id = 'strClientName'>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
	                    </li>
						
						
						<li class="collection-item" style="font-weight:bold;">
							<div class="row">
								<div class="col s6">	
									Address:<div style="font-weight:normal;" id = 'strAddress'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								<div class="col s6">
									Contact Number (Client):<div style="font-weight:normal;" id = 'strContactNumberClient'>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
	                    </li>

	                    <li class="collection-item" style="font-weight:bold;">
							<div class="row">
								<div class="col s6">	
									Person in Charge:<div style="font-weight:normal;" id = 'strPersonInCharge'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								<div class="col s6">
									Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'strContactNumberPIC'>&nbsp;&nbsp;&nbsp;09123456789</div>
								</div>
							</div>
	                    </li>

	                    
	                    <li class="collection-item" style="font-weight:bold;">
							<div class="row">
								<div class="col s4">	
									Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'deciAreaSize'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								<div class="col s4">
									Population (approx.):<div style="font-weight:normal;" id = 'intPopulation'>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
	                    </li>

	                    <li class="collection-item" style="font-weight:bold;">Shift/s:
	                        <div style="font-weight:normal;">
	                            <table class="" style="font-family:Myriad Pro" id = 'shiftTableLeaveRequest'>
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
					<div class="row"></div>
				</div>
			</div>
		</div>
			
		<div class="modal-footer ci modal-close" style="background-color: #00293C;">
			<div id = "buttonsLeaveRequest" style="display: none;">	
	            <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnAcceptLeaveRequest">Accept
	            </button>

	            <button class="btn red waves-effect waves-light modal-close" name="" style="margin-right: 30px;" id = "btnDeclineLeaveRequest">Decline
	            </button>
	        </div>
	        
	        <div id = "acceptedLeaveRequest" style="display: none;">            			
				<button class="btn green" name="" style="margin-right: 30px; cursor:default;" id = "">Accepted
	            </button>
	        </div>
	        
	        <div id = "rejectedLeaveRequest" style="display: none;">			
	            <button class="btn red" name="" style="margin-right: 30px; cursor:default;" id = "">Declined
	            </button>
	        </div>
	        
	        <div id = "notAvailableLeaveRequest" style="display: none;">
	            <button class="btn grey" name="" style="margin-right: 30px; cursor:default;" id = "">Unavailable
	            </button>
	        </div>
		</div>
	</div>
<!--modal leave request from other guard////releiver end-->
	
<!--modal kapwa guard notice-->
	<div id="swapguardModal" class="modal modal-fixed-footer ci" style="overflow:hidden;">
	    <div class="modal-header">
	                <div class="h">
	                    <h3><center>Swap Guard Notice</center></h3>  
					</div>

	            </div>
	    <div class="modal-content">
	        <div class="row">
	            <div class="col s12">
	                <ul class="collection with-header" >
						<li class="collection-header" >
							<div class='row'>
								<div class='col s6'>
									<h5 style="font-weight:bold;">Guard to be Replaced:</h5>
								</div>
											
								<div class="col s4" >
									<h5 id = 'swapguardGuardName'></h5>
								</div>
							</div>
						</li>

						<li class="collection-header" >
							<div class='row'>
								<div class='col s6'>
									<h5 style="font-weight:bold;">Contact Number:</h5>
								</div>
											
								<div class="col s4" >
									<h5 id = 'swapguardContactNumber'></h5>
								</div>
							</div>
						</li>
						
						<li class="collection-header"><h5 style="font-weight:bold;">Details</h5></li>
						
							<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;" id = 'swapguardNatureOfBusiness'>&nbsp;&nbsp;&nbsp;Bar</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Client Name:<div style="font-weight:normal;" id = 'swapguardClientName'>&nbsp;&nbsp;&nbsp;The Bar</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;" id = 'swapguardContactNumberClient'>&nbsp;&nbsp;&nbsp;09123456789</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = 'swapguardPerson'>&nbsp;&nbsp;&nbsp;Choco Bar</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'swapguardPersonContact'>&nbsp;&nbsp;&nbsp;09123456789</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'swapguardAddress'>&nbsp;&nbsp;&nbsp;123 Welcome Street Pasig Metro Manila</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'swapguardAreaSize'>&nbsp;&nbsp;&nbsp;100</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = 'swapguardPopulation'>&nbsp;&nbsp;&nbsp;10</div>
							</li>
							<li class="collection-item" style="font-weight:bold;">Shift/s:
								<div style="font-weight:normal;">
									<table class="" style="font-family:Myriad Pro" id = 'swapguardShiftTable'>
										<thead>
										<tr>
											<th data-field="st">Shift</th>
											<th data-field="fr">From</th>
											<th data-field="to">To</th>
										</tr>
										</thead>

										<tbody>
											<tr>
												
											</tr>

										</tbody>
									</table>
								</div>
							</li>
	                
	                </ul>
	            </div>
	        </div>
			<div class="row"></div>
	    </div>
	    
	    <div class="modal-footer ci" style="background-color: #00293C;">
	        <div id = "swapguardButton" style="display: none;">	
	            <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "swapguardAccept">Accept</button>

	            <button class="btn red waves-effect waves-light modal-close" name="" style="margin-right: 30px;" id = "swapguardDecline">Decline</button>
	        </div>
	        
	        <div id = "swapguardAccepted" style="display: none;">
				
				<button class="btn green" name="" style="margin-right: 30px; cursor:default;" id = "">Accepted
	            </button>
	        </div>
	        
	        <div id = "swapguardRejected" style="display: none;">
	            <button class="btn red" name="" style="margin-right: 30px; cursor:default;" id = "">Declined
	            </button>
	        </div>
	        
	        <div id = "swapguardNotAvailable" style="display: none;">
	            <button class="btn grey" name="" style="margin-right: 30px; cursor:default;" id = "">Unavailable
	            </button>
	        </div>
	    </div>
	</div>
<!--modal kapwa guard notice end-->
	
	
<!--modal change guard notice-->
	<div id="modalChangeGuard" class="modal modal-fixed-footer ci" style="overflow:hidden; ">
		<div class="modal-header">
			<div class="h">
				<h3><center>Change Guard Request</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<ul class="collection with-header" >
					<li class="collection-header"><h5 style="font-weight:bold;">Details</h5></li>
					<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;" id = 'changeGuardBusiness'>&nbsp;&nbsp;&nbsp;Bank</div></li>
					<li class="collection-item" style="font-weight:bold;">Client Name:<div style="font-weight:normal;" id = 'changeGuardClientName'>&nbsp;&nbsp;&nbsp;ChinaBank</div></li>
					<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;" id = 'changeGuardContactNumber'>&nbsp;&nbsp;&nbsp;09123456789</div></li>
					<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = 'changeGuardPerson'>&nbsp;&nbsp;&nbsp;Chun Li</div></li>
					<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'changeGuardPersonContact'>&nbsp;&nbsp;&nbsp;09123456789</div></li>
					<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'changeGuardAddress'>&nbsp;&nbsp;&nbsp;123 Welcome Street Manila Metro Manila</div></li>
					<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'changeGuardAreaSize'>&nbsp;&nbsp;&nbsp;100</div></li>
					<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = 'changeGuardPopulation'>&nbsp;&nbsp;&nbsp;10</div></li>
					<li class="collection-item" style="font-weight:bold;">Shift/s:
						<div style="font-weight:normal;">
							<table class="" style="font-family:Myriad Pro" id = 'changeGuardShiftTable'>
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
					</ul>
				</div>
			</div>
			<div class="row"></div>
		</div>

		<div class="modal-footer ci" style="background-color: #00293C;">
			<div id = "divChangeButton" style="display: none;">	
				<button class="btn green waves-effect waves-light" style="margin-right: 30px;" id = "btnChangeAccept">Accept</button>
				<button class="btn red waves-effect waves-light modal-close" style="margin-right: 30px;" id = "btnChangeDecline">Decline</button>
			</div>

			<div id = "divChangeAccepted" style="display: none;">           			
				<button class="btn green" style="margin-right: 30px; cursor:default;">Accepted</button>
			</div>

			<div id = "divChangeRejected" style="display: none;">			
				<button class="btn red" style="margin-right: 30px; cursor:default;">Declined</button>
			</div>    

			<div id = "divChangeUnavailable" style="display: none;">
        <button class="btn grey" style="margin-right: 30px; cursor:default;">Unavailable</button>
      </div>            
		</div>
	</div>
<!--modal change guard notice end-->
@stop

@section('script')
<script>
$(document).ready(function(){
    var tableRowCounter = 0;
    var table = $('#inboxTable').DataTable();
    var inboxID;
    var type; 

    // Inbox Start
	    $.ajax({    
	      type: "GET",
	      url: "{{action('InboxController@getInbox')}}",
	      success: function(data){
	        if (data){

		      $.each(data, function(index,value){
	            if (value.tinyintStatus == 1){
                 
	              radio = '<input name="" type="radio" id="radio'+value.intInboxID+'" checked/> <label for="'+value.intInboxID+'"></label>';
	            }else{
                  
	                radio = '<input name="" type="radio" id="radio'+value.intInboxID+'" /> <label for="'+value.intInboxID+'"></label>';
	            }
              
	            button = '<center><a class="material-icons buttonRead" id="'+value.intInboxID+'"><i class="material-icons">markunread</i></a></center>';
	            
                   
	            table.row.add([
	                radio,
	                button,
	                '<h>' + value.datetimeSend + '</h>',
	                '<h>' + value.nameSender + '</h>',
	                '<h>' + value.strSubject + '</h>' + 
	                '<input type = "hidden" id = "type'+value.intInboxID+'" value="'+value.tinyintType+'">'
	            ]).draw(false);
		        });//foreach
	        }//if else
	      }
	    });//get inbox 
	    
	    $('#inboxTable').on('click', '.buttonRead', function(){
	        type = $('#type' + this.id).val();
	        inboxID = this.id;
	        readMessage();

	        if (type == 0){
	            message();
	        }else if (type == 2 || type == 6){//new client request
	            newClient();
	        }else if (type == 3){
	            leaveRequest();
	        }else if (type == 8 ){
	        	swapRequest();
	        }else if (type == 11){
	        	changeGuard();
	        }
	    });

		   function readMessage(){
	      if($('#radio' + inboxID).is(':checked')){
	          $('#radio' + inboxID).attr('checked', false); // all read mark as unread        
	          $.ajax({
	              type: "POST",
	              url: "{{action('InboxController@readInbox')}}",
	              beforeSend: function (xhr) {
	                  var token = $('meta[name="csrf_token"]').attr('content');

	                  if (token) {
	                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                  }
	              },
	              data: {
	                  inboxID: inboxID
	              }
	          });//ajax

	          $.ajax({
	              type: "GET",
	              url: "{{action('InboxController@getNumberOfUnreadMessages')}}",
	              success: function(data){
	                  if (data > 0){
	                      $('#notification_count').text(data);
	                      $('#notification_count').show();
	                  }else{
	                      $('#notification_count').hide();    
	                  }
	              }
	          });//notification update
	      }//if else
	    }//function readMessage

	    function message(){
	      $('#modalMessage').openModal();
	      $.ajax({
	        type: "GET",
	        url: "/adminInbox/get/message?inboxID=" + inboxID,
	        success: function(data){
	            $('#messageSubject').text(data.strSubject);
	            $('#messageInbox').text(data.strMessage);
	        }
	      });//get guard waiting
	    }
    // Inbox End
    
    // New Client Start
	    $('#btnAccept').click(function(){
	      var statusChecker;
	      $.ajax({
	          type: "GET",
	          url: "{{action('SecurityHomepageController@getGuardInformation')}}",
	          success: function(data){
	              if (data.intStatusIdentifier == 0){
	                  statusChecker = true;
	              }else{
	                  statusChecker = false;
	              }
	          },async:false
	      });//guard information

	      if (statusChecker){
	          $.ajax({
	              type: "POST",
	              url: "{{action('SecurityHomepageController@acceptNewClient')}}",
	              beforeSend: function (xhr) {
	                  var token = $('meta[name="csrf_token"]').attr('content');
	                  if (token) {
	                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                  }
	              },
	              data: {
	                  inboxID:inboxID,
	                  type: type
	              },
	              success: function(data){
	                  $('#modalNewClientRequest').closeModal();
	                  swal("Accepted", "You accepted the offer. Wait for announcement.", "success");
	              }
	              
	          });//accept
	      }else{
	          var toastContent = $('<span>You are now committed to other client.</span>');
	          Materialize.toast(toastContent, 1500,'red', 'edit');
	      }
	    });
	    
	    $('#btnDecline').click(function(){
	        $.ajax({
	            type: "POST",
	            url: "{{action('SecurityHomepageController@declineNewClient')}}",
	            beforeSend: function (xhr) {
	                var token = $('meta[name="csrf_token"]').attr('content');
	                if (token) {
	                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                }
	            },
	            data: {
	                inboxID:inboxID
	            },
	            success: function(data){
	                swal("Declined", "You declined the offer.", "success");
	            }
	            
	        });//decline
	    });

			function newClient(){
	      $.ajax({
	        type: "GET",
	        url: "/securityInbox/get/clientinformation?inboxID=" + inboxID ,
	        success: function(data){
	          var areaSize = commaSeparateNumber(data.deciAreaSize);
	          var population = commaSeparateNumber(data.intPopulation);
	          var arrayShift = data.shift;
	          var statusIdentifier = data.intStatusIdentifier;
	          
	          $('#modalNewClientRequest').openModal();
	          $('#natureOfBusiness').text(data.strNatureOfBusiness);
	          $('#clientName').text(data.strClientName);
	          $('#contactNumberClient').text(data.strContactNumber);
	          $('#personInCharge').text(data.strPersonInCharge);
	          $('#contactNumberPIC').text(data.strPOICContactNumber);
	          $('#address').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
	          $('#areaSize').text(areaSize);
	          $('#population').text(population);
	          $('#guardCounter').text(data.intNumberOfGuard);
	          
	          $('#shiftTable tr').not(function(){ return !!$(this).has('th').length; }).remove(); 
	          $.each(arrayShift, function (index, value) {
	              
	              $('#shiftTable tr:last').after(
	                  '<tr>'+
	                      '<td>' + value.strShiftNumber +'</td>' +
	                      '<td>' + value.timeFrom + '</td>' +
	                      '<td>' + value.timeTo + '</td>' +
	                  '</tr>'
	              );
	          });

	          if (statusIdentifier == 1){
	              $('#buttons').show();
	              $('#accepted').hide();
	              $('#rejected').hide();
	              $('#notAvailable').hide();
	          }else if (statusIdentifier == 2){
	              $('#buttons').hide();
	              $('#accepted').show();
	              $('#rejected').hide();
	              $('#notAvailable').hide();
	          }else if (statusIdentifier == 0){
	              $('#buttons').hide();
	              $('#accepted').hide();
	              $('#rejected').show();
	              $('#notAvailable').hide();
	          }else if (statusIdentifier == 3){
	              $('#buttons').hide();
	              $('#accepted').hide();
	              $('#rejected').hide();
	              $('#notAvailable').show();
	          }
	        },
	        error: function(data){
	          var toastContent = $('<span>Error Occured. </span>');
	          Materialize.toast(toastContent, 1500,'red', 'edit');
	        }
	      });//ajax get client information
	    }
    // New Client End

    // Leave Request 
	    $('#btnAcceptLeaveRequest').click(function(){
	        $.ajax({
	            type: "POST",
	            url: "{{action('SecurityHomepageController@acceptLeaveRequest')}}",
	            beforeSend: function (xhr) {
	                var token = $('meta[name="csrf_token"]').attr('content');

	                if (token) {
	                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                }
	            },
	            data: {
	                intInboxID: inboxID,
	            },
	            success: function(data){
	                swal("Accepted", "You accepted the request.", "success");
	            }
	        });//ajax
	    });

	    $('#btnDeclineLeaveRequest').click(function(){
	        $.ajax({
	            type: "POST",
	            url: "{{action('SecurityHomepageController@declineLeaveRequest')}}",
	            beforeSend: function (xhr) {
	                var token = $('meta[name="csrf_token"]').attr('content');

	                if (token) {
	                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                }
	            },
	            data: {
	                intInboxID: inboxID,
	            },
	            success: function(data){
	                swal("Decline", "You decline the request.", "error");
	            }
	        });//ajax
	    });

		  function leaveRequest(){
	      $.ajax({
	        type: "GET",
	        url: "/securityInbox/get/getLeaveRequestInformation?inboxID=" + inboxID,
	        success: function(data){
	          $('#modalLeaveRequestNotification').openModal();
	          $('#dateStart').text(data.dateStart);
	          $('#dateEnd').text(data.dateEnd);
	          $('#strNatureOfBusiness').text(data.strNatureOfBusiness);
	          $('#strClientName').text(data.strClientName);
	          $('#strAddress').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
	          $('#strContactNumberClient').text(data.strContactNumber);
	          $('#strPersonInCharge').text(data.strPersonInCharge);
	          $('#strContactNumberPIC').text(data.strPOICContactNumber);
	          $('#deciAreaSize').text(data.deciAreaSize);
	          $('#intPopulation').text(data.intPopulation);

	          $('#shiftTableLeaveRequest tr').not(function(){ return !!$(this).has('th').length; }).remove(); 
	          $.each(data.shift, function(index, value){
	              $('#shiftTableLeaveRequest > tbody:last-child').append(
	                  '<tr>'+
	                  '<td>'+value.strShiftNumber+'</td>'+
	                  '<td>'+value.timeFrom+'</td>'+
	                  '<td>'+value.timeTo+'</td>'+
	                  '</tr>'
	              );
	          });

	          var boolStatus = data.boolStatus;
	          if (boolStatus == 1){
	              $('#buttonsLeaveRequest').show();
	              $('#acceptedLeaveRequest').hide();
	              $('#rejectedLeaveRequest').hide();
	              $('#notAvailableLeaveRequest').hide();
	          }else if (boolStatus == 2){
	              $('#buttonsLeaveRequest').hide();
	              $('#acceptedLeaveRequest').show();
	              $('#rejectedLeaveRequest').hide();
	              $('#notAvailableLeaveRequest').hide();
	          }else if (boolStatus == 0){
	              $('#buttonsLeaveRequest').hide();
	              $('#acceptedLeaveRequest').hide();
	              $('#rejectedLeaveRequest').show();
	              $('#notAvailableLeaveRequest').hide();
	          }else if (boolStatus == 3){
	              $('#buttonsLeaveRequest').hide();
	              $('#acceptedLeaveRequest').hide();
	              $('#rejectedLeaveRequest').hide();
	              $('#notAvailableLeaveRequest').show();
	          }
	        }
	      });//ajax
	    }
    // Leave Request End

    // Swap Location Start
    	$('#swapguardAccept').click(function(){
					$.ajax({
	            type: "POST",
	            url: "{{action('SecurityHomepageController@acceptSwapRequest')}}",
	            beforeSend: function (xhr) {
	                var token = $('meta[name="csrf_token"]').attr('content');

	                if (token) {
	                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	                }
	            },
	            data: {
	                inboxID: inboxID
	            },
	            success: function(data){

	            	swal({
							title: "You accepted the request!",
							text: "Please wait for the response of the admin.",
							type: "success"
						},
						function(){
						$('#swapguardModal').closeModal();
					});

	            },
	            error: function(data){
					var toastContent = $('<span>Error Database </span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
	            }
	        });//ajax
	    });

	    function swapRequest(){
	    	$.ajax({
	        type: "GET",
	        url: "/securityInbox/get/SwapRequest?inboxID=" + inboxID,
	        success: function(data){
	        		var areaSize = commaSeparateNumber(data.deciAreaSize);
	            var population = commaSeparateNumber(data.intPopulation);
	            var arrayShift = data.shift;
	            var statusIdentifier = data.boolStatus;
	            $('#swapguardModal').openModal();
	          	$('#swapguardGuardName').text(data.strFirstName + ' ' + data.strLastName);
	          	$('#swapguardContactNumber').text(data.strContactNumberMobile);
	          	$('#swapguardNatureOfBusiness').text(data.strNatureOfBusiness);
	            $('#swapguardClientName').text(data.strClientName);
	            $('#swapguardContactNumberClient').text(data.strContactNumber);
	            $('#swapguardPerson').text(data.strPersonInCharge);
	            $('#swapguardPersonContact').text(data.strPOICContactNumber);
	            $('#swapguardAddress').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
	            $('#swapguardAreaSize').text(areaSize);
	            $('#swapguardPopulation').text(population);
	            
	            $('#swapguardShiftTable tr').not(function(){ return !!$(this).has('th').length; }).remove(); 
	            $.each(arrayShift, function (index, value) {
	                
	                $('#swapguardShiftTable tr:last').after(
	                    '<tr>'+
	                        '<td>' + value.strShiftNumber +'</td>' +
	                        '<td>' + value.timeFrom + '</td>' +
	                        '<td>' + value.timeTo + '</td>' +
	                    '</tr>'
	                );
	            });

	            if (statusIdentifier == 1){
	                $('#swapguardButton').show();
	                $('#swapguardAccepted').hide();
	                $('#swapguardRejected').hide();
	                $('#swapguardNotAvailable').hide();
	            }else if (statusIdentifier == 3){
	                $('#swapguardButton').hide();
	                $('#swapguardAccepted').show();
	                $('#swapguardRejected').hide();
	                $('#swapguardNotAvailable').hide();
	            }else if (statusIdentifier == 0){
	                $('#swapguardButton').hide();
	                $('#swapguardAccepted').hide();
	                $('#swapguardRejected').show();
	                $('#swapguardNotAvailable').hide();
	            }	
	        },
	        error: function(data){
						var toastContent = $('<span>Error Database </span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');
	        }
	      });//ajax
	    }
    // Swap Location End
	    
	  // Change Guard Start
	  	$('#btnChangeAccept').click(function(){
				$.ajax({
          type: "POST",
          url: "{{action('ChangeGuardController@accept')}}",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');

              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          data: {
          	inboxID: inboxID
          },
          success: function(data){
	          swal({
							title: "Success!",
							text: "You accepted the offer. Please wait for further announcement.",
							type: "success"
						},function(){
							$('#modalChangeGuard').closeModal();
						});

          },
          error: function(data){
	 					var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');
          }
        });//ajax
	  	});

	  	$('#btnChangeDecline').click(function(){
				$.ajax({
          type: "POST",
          url: "{{action('ChangeGuardController@decline')}}",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');

              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          data: {
          	inboxID: inboxID
          },
          success: function(data){
          	swal({
							title: "Declined!",
							text: "You declined the offer.",
							type: "success"
						},function(){
							$('#modalChangeGuard').closeModal();
						});
          },
          error: function(data){
						var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
	  	});

	  	function changeGuard(){
				$.ajax({
            type: "GET",
            url: "/changeguardrequest/get/ClientRequested?inboxID=" + inboxID,
            success: function(data){
            	var areaSize = commaSeparateNumber(data.deciAreaSize);
	            var population = commaSeparateNumber(data.intPopulation);
	            var arrayShift = data.shift;
	            var statusIdentifier = data.boolStatus;
	            $('#modalChangeGuard').openModal();

	          	$('#changeGuardBusiness').text(data.strNatureOfBusiness);
	          	$('#changeGuardClientName').text(data.strClientName);
	          	$('#changeGuardContactNumber').text(data.strContactNumber);
	            $('#changeGuardPerson').text(data.strPersonInCharge);
	            $('#changeGuardPersonContact').text(data.strPOICContactNumber);
	            $('#changeGuardAddress').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
	            $('#changeGuardAreaSize').text(areaSize);
	            $('#changeGuardPopulation').text(population);

	            var arrayShift = data.shift;
							$('#changeGuardShiftTable tr').not(function(){ return !!$(this).has('th').length; }).remove(); 
	            $.each(arrayShift, function (index, value) {
                $('#changeGuardShiftTable tr:last').after(
                  '<tr>'+
                    '<td>' + value.strShiftNumber +'</td>' +
                    '<td>' + value.timeFrom + '</td>' +
                    '<td>' + value.timeTo + '</td>' +
                  '</tr>'
                );
	            });

	            var responseStatus = data.boolStatus;
	            if (responseStatus == 1){//waiting
	            	showHideButton('divChangeButton', 'divChangeAccepted', 'divChangeRejected', 'divChangeUnavailable');
	            }else if (responseStatus == 2){//accepted
	            	showHideButton('divChangeAccepted', 'divChangeButton', 'divChangeRejected', 'divChangeUnavailable');
	            }else if (responseStatus == 0){//rejected
	            	showHideButton('divChangeRejected', 'divChangeAccepted', 'divChangeButton', 'divChangeUnavailable');
	            }else if (responseStatus == 3){//N/A
	            	showHideButton('divChangeUnavailable', 'divChangeAccepted', 'divChangeRejected', 'divChangeButton');
	            }
            },
            error: function(data){
							var toastContent = $('<span>Error Database.</span>');
							Materialize.toast(toastContent, 1500,'red', 'edit');
            }
        });//ajax
	  	}

	  	function showHideButton(show, hide1, hide2,hide3){
	  		$('#' + show).show();
      	$('#' + hide1).hide();
      	$('#' + hide2).hide();
      	$('#' + hide3).hide();
	  	}
	  // Change Guard End

    function commaSeparateNumber(val){
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
    }
});
</script>

<!-- Pusher Real Time Start -->
	<script>
	  var table = $('#inboxTable').DataTable();
	  var pusher = new Pusher("{{env('PUSHER_KEY')}}");
	  var channel = pusher.subscribe('notification');
	  channel.bind('new-message', function(data) {
	    $.ajax({
	        type: "GET",
	        url: "{{action('InboxController@getInbox')}}",
	        success: function(data){
	            if (data){

	                $.each(data, function(index,value){
	                    if (value.tinyintStatus == 1){
	                        radio = '<input name="" type="radio" id="radio'+value.intInboxID+'" checked/> <label for="'+value.intInboxID+'"></label>';  
	                    }else{
	                        radio = '<input name="" type="radio" id="radio'+value.intInboxID+'" /> <label for="'+value.intInboxID+'"></label>';
	                    }
	                    button = '<center><button class="btn blue darken-4 buttonRead" id="'+value.intInboxID+'"><i class="material-icons">keyboard_arrow_right</i></button></center>';
	                    
	                    table.row.add([
	                        radio,
	                        button,
	                        '<h>' + value.datetimeSend + '</h>',
	                        '<h>' + value.nameSender + '</h>',
	                        '<h>' + value.strSubject + '</h>' + 
	                        '<input type = "hidden" id = "type'+value.intInboxID+'" value="'+value.tinyintType+'">'
	                    ]).draw(false);
	                });//foreach
	            }//if else
	        },async:false
	    });//get inbox 
	  });
	</script>
<!-- Pusher Real Time End -->
@stop
