@extends('securityguard.SecurityGuardDashboard')
@section('title')
Security Homepage
@endsection


@section('content')
  <!--MESSAGE-->
<div class="row">
    <div class="col l12 ci">
        <div class="col l6" >
            <div class="card large z-depth-2 " style="overflow:scroll; overflow-x:hidden;">
                <div class="row">
                    <div class="col l12">
                        <div class="col l3">
                            <i class="material-icons left" style="font-size:6rem">email</i> 
                        </div>
                        <div class="col l9">
                            <div class="row"></div>
                            <span class="black-text" style="font-size:20px;font-family:Verdana">INBOX MESSAGE</span>
                        </div>
                    </div>
                </div>
                
                <table class="centered" style="background-color:" id = 'inboxTable'>
                    <thead>
                        <tr>
                            <th></th>
                            <th data-field="">Date</th>
                            <th data-field="">Title</th>
                            <th data-field=""></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-----------------------------------Modal----------------------------------------------------->
<div id="modalreadMsg" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:570px; margin-top:-30px;">
    <div class="modal-header">
                <div class="h">
                    <h3><center>Messages</center></h3>  
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

            <button class="btn red waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnDecline">Decline
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

<script>
$(document).ready(function(){
    
    var tableRowCounter = 0;
    var table = $('#inboxTable').DataTable();
    var globalClientPendingID;
    
    $.ajax({
            
        type: "GET",
        url: "{{action('SecurityHomepageController@getGuardInformation')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            if (data){
                $('#strProfileName').text(data.strFirstName + ' ' + data.strLastName);
                $('#strProfileLicenseNumber').text(data.strLicenseNumber);    
            }
        },
        error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

        }
    });//guard information
    
    $.ajax({
            
        type: "GET",
        url: "{{action('SecurityHomepageController@getNewClientRequest')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            
            table.clear().draw();
            console.log(data);
            if (data){
                for (intLoop = 0; intLoop < data.length; intLoop ++){
                    var mydate = new Date(data[intLoop].dateSend);
                    var month = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"][mydate.getMonth()];
                    var str = month + ' ' + mydate.getDate() + ', ' + mydate.getFullYear();
                    
                    table.row.add([
                        '<input name="' + tableRowCounter + '" type="radio" id="radio' + tableRowCounter +'" /> <label for="radio' + tableRowCounter + '"></label>',
                        '<h>' + str + '</h>',
                        '<h id = "title' + tableRowCounter + '">New Client</h>',
                        '<a class="btn blue darken-4 col s10 buttonRead" id = "' +tableRowCounter + '"><i class="material-icons">keyboard_arrow_right</i></a>' + 
                        '<input type = "hidden" value = "' + data[intLoop].intGuardPendingID +'" id ="idOfMessage'+
                        tableRowCounter + '">' + 
                        '<input type = "hidden" value = "' + data[intLoop].intClientPendingID +'" id ="clientPending'+ tableRowCounter + '">' + 
                        '<input type = "hidden" value = "' + data[intLoop].intClientID +'" id ="clientID'+ tableRowCounter + '">' + 
                        '<input type = "hidden" value = "' + data[intLoop].intStatusIdentifier +'" id ="statusIdentifier'+ tableRowCounter + '">'
                        
                    ]).draw(false);
                    
                    
                    if (data[intLoop].intStatusIdentifier == 1){
                       $('#radio' + tableRowCounter).attr( "checked", true );
                    }else{
                       $('#radio' + tableRowCounter).attr( "checked", false );
                    }
                    tableRowCounter ++;
                }  
            }
        },
        error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

        }
    });//new client pending
    
    $('#inboxTable').on('click', '.buttonRead', function(){
        
        if ($('#title' + this.id).text() == 'New Client'){
            newClient($('#idOfMessage' + this.id).val(), $('#clientID' + this.id).val());
            globalClientPendingID = $('#clientPending' + this.id).val();
        }
        
        $('#radio' + this.id).attr('checked', false); // all read mark as unread
    });
    
    $('#btnAccept').click(function(){
        
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
                clientPendingID: globalClientPendingID
            },
            success: function(data){
                $('#modalreadMsg').closeModal();
                swal("Accepted", "You accepted the offer. Wait for announcement", "success");
                
            }
            
        });//accept
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
                clientPendingID: globalClientPendingID
            },
            success: function(data){
                $('#modalreadMsg').closeModal();
                swal("Declined", "You declined to the offer.", "success");
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
    
    function newClient(clientPendingID, clientID){
        var statusIdentifier = getStatus(clientPendingID);
        if (statusIdentifier == 1){
            $.ajax({

                type: "POST",
                url: "{{action('SecurityHomepageController@readNewClient')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    id:clientPendingID
                }
            });//unread - read
        }
        
        $.ajax({
            type: "GET",
            url: "/securityhomepage/get/clientinformation?clientID=" + clientID ,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                console.log(data);
                var areaSize = commaSeparateNumber(data.deciAreaSize);
                var population = commaSeparateNumber(data.intPopulation);
                var arrayShift = data.shift;
                
                $('#modalreadMsg').openModal();
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
                    
            },
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
        });//ajax get client information
        
        if (statusIdentifier == 1 || statusIdentifier == 2){
            $('#buttons').show();
        }else if (statusIdentifier == 3){
            $('#buttons').hide();
            $('#accepted').show();
        }else if (statusIdentifier == 0){
            $('#buttons').hide();
            $('#rejected').show();
        }else if (statusIdentifier == 4){
            $('#buttons').hide();
            $('#notAvailable').show();
        }
    }
    
    function getStatus(id){
        var status;
        $.ajax({
            type: "GET",
            url: "/securityhomepage/get/statusguardpending?id=" + id ,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                status = data.intStatusIdentifier;
            },
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            },
            async:false
        });//ajax get client information
        return status;
    }
});
</script>

@stop
