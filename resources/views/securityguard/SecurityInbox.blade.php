@extends('securityguard.SecurityGuardDashboard')
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
					<button class="btn blue buttonTest modal-trigger" href="#modalLeaveRequestfromSG">Test</button>
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

<!--modal new client request-->
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

<!--modal new client request end-->

<!--modal message approved client/contract-->

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
	
<!--modal message approved client/contract end-->
	
<!--modal leave request from other guard////releiver-->

<div id="modalLeaveRequestfromSG" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:600px; margin-top:-50px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Message</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header">
						<div class="row">
							<div class="col s6">	
								From:<div style="font-size:18px;" id = "">&nbsp;01/10/2016</div>
							</div>
							<div class="col s6">
								To:<div style="font-size:18px;" id = "">&nbsp;01/12/2016</div>
							</div>
						</div>
					
					</li>
					
					<li class="collection-header" ><h4 style="font-weight:bold;">Details</h4></li>
                <div>
                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;Bank</div>
							</div>
							<div class="col s6">
								Client Name:<div style="font-weight:normal;" id = 'clientName'>&nbsp;&nbsp;&nbsp;LandBank</div>
							</div>
						</div>
                    </li>
					
					
					<li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;123 Hello Street Pasig, Metro Manila</div>
							</div>
							<div class="col s6">
								Contact Number (Client):<div style="font-weight:normal;" id = 'contactNumberClient'>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
						</div>
                    </li>

                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;Mang Tomas</div>
							</div>
							<div class="col s6">
								Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'contactNumberPIC'>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
						</div>
                    </li>

                    
                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;1000</div>
							</div>
							<div class="col s4">
								Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;10</div>
							</div>
							<div class="col s4">
								Number of Guards:<div style="font-weight:normal;" id = 'guardCounter'>&nbsp;&nbsp;&nbsp;1</div>
							</div>
						</div>
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
									<tr>
										<td>1</td>
										<td>12AM</td>
										<td>8AM</td>
										
									</tr>

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

<!--modal leave request from other guard////releiver end-->

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
    
    $.ajax({
            
        type: "GET",
        url: "{{action('InboxController@getInbox')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            console.log(data);
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
        }
    });//get inbox 
    
    $('#inboxTable').on('click', '.buttonRead', function(){
        var type = $('#type' + this.id).val();
        inboxID = this.id;
        readMessage();

        if (type == 0){
            message();
        }else if (type == 2){//new client request
            newClient();
        }
    });
    
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
                    inboxID:inboxID
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
    
    function commaSeparateNumber(val){
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
    }
    
    function getHour(hour){
        var hour12;
        if (hour == 0 || hour == 24){
            hour12 = '12 AM';
        }else if (hour == 1){
            hour12 = '1 AM';
        }else if (hour == 2){
            hour12 = '2 AM';
        }else if (hour == 3){
            hour12 = '3 AM';
        }else if (hour == 4){
            hour12 = '4 AM';
        }else if (hour == 5){
            hour12 = '5 AM';
        }else if (hour == 6){
            hour12 = '6 AM';
        }else if (hour == 7){
            hour12 = '7 AM';
        }else if (hour == 8){
            hour12 = '8 AM';
        }else if (hour == 9){
            hour12 = '9 AM';
        }else if (hour == 10){
            hour12 = '10 AM';
        }else if (hour == 11){
            hour12 = '11 AM';
        }else if (hour == 12){
            hour12 = '12 PM';
        }else if (hour == 13){
            hour12 = '1 PM';
        }else if (hour == 14){
            hour12 = '2 PM';
        }else if (hour == 15){
            hour12 = '3 PM';
        }else if (hour == 16){
            hour12 = '4 PM';
        }else if (hour == 17){
            hour12 = '5 PM';
        }else if (hour == 18){
            hour12 = '6 PM';
        }else if (hour == 19){
            hour12 = '7 PM';
        }else if (hour == 20){
            hour12 = '8 PM';
        }else if (hour == 21){
            hour12 = '9 PM';
        }else if (hour == 22){
            hour12 = '10 PM';
        }else if (hour == 23){
            hour12 = '11 PM';
        }
        
        return hour12;
    }
    
    function newClient(){
        $.ajax({
            type: "GET",
            url: "/securityInbox/get/clientinformation?inboxID=" + inboxID ,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
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
                            '<td>' + getHour(value.timeFrom) + '</td>' +
                            '<td>' + getHour(value.timeTo) + '</td>' +
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
    
    function getMessage(id){
        var message;
        $.ajax({
            type: "GET",
            url: "/securityInbox/get/message?id=" + id ,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                message = data;
            },
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            },
            async:false
        });//ajax get client information
        return message;
    }
    
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
        }//if else
    }//function readMessage

    function message(){
        $('#modalMessage').openModal();
        getMessage();
    }

    function getMessage(){
        $.ajax({
            type: "GET",
            url: "/adminInbox/get/message?inboxID=" + inboxID,
            success: function(data){
                console.log(data);
                $('#messageSubject').text(data.strSubject);
                $('#messageInbox').text(data.strMessage);
            },async:false
        });//get guard waiting
    }
});
	
	
</script>

@stop
