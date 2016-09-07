@extends('layout.maintenanceLayout')

@section('title')
Inbox
@endsection

@section('content')
<div class="row"></div>
<div class="row"></div>


<!-- Table Start -->
  <div class="row">
    <div class="col s8 push-s3">
      <ul class="tabs" style="">
        <li style="color:white"class="tab col l3"><a href="#message" class="active">Messages</a></li>
      </ul>   
      <div id="message">
        <div class="container-fluid grey lighten-2">    
          <table class="striped" id="dataTableMsg">                   
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
<!-- Table End -->

<!-- modal Message Modal Start-->
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
            <li class="collection-header" style="font-weight:bold;">Subject:<div style="font-size:18px;" id = "messageSubject">&nbsp;</div></li>
            <li class="collection-item"><p id = 'messageMessage'></p></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="modal-footer ci modal-close" style="background-color: #00293C;">
      <button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK
      </button>
    </div>
  </div>
<!-- modal Message Modal End-->
                   
<!-- modal Sending notification to guard (new Client) Modal Start-->
  <div id="modalSendNoti" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:630px; margin-top:-50px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Message</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">
            <li class="collection-header" style="font-weight:bold;">Number of Guards Needed:
              <div style="font-size:18px;" id = "guardNumber">&nbsp;</div>
              <button class="btn blue right" style="margin-top:-40px;" id="btnSuggested">Suggested</button>
            </li>
            <li class="collection-item">
              <div class="row">
                <div class="col s12">
                  <table class="striped white" style="border-radius:10px; width:100%;" id="dataTableSendNoti">
                    <thead>
                      <th class="grey lighten-1" style="width:10px;"></th>
                      <th class="grey lighten-1">ID</th>
                      <th class="grey lighten-1">First Name</th>
                      <th class="grey lighten-1">Last Name</th>
                      <th class="grey lighten-1">Province</th>
                      <th class="grey lighten-1">City</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- button -->
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn blue waves-effect waves-light" name="" id = "btnSendNotificationNewClient" style="margin-right: 30px;">Send<i class="material-icons right">send</i>
      </button>
    </div>
  </div>
<!-- modal Sending notification to guard (new Client) Modal End-->

<!--modal sg leave request approval Start-->
  <div id="modalLeaveRequestApproval" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:630px; margin-top:-50px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Message</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">
            <li class="collection-header" style="font-weight:bold;">
              <div class="row">
                <div class="col s6">
                  Leave Type:<div style="font-size:18px;" id = "strLeaveType">&nbsp;</div>
                </div>
                <div class="col s6">
                  Client:<div style="font-size:18px;" id = "strClientName">&nbsp;</div>
                </div>
                <div class = "row"></div>
                <div class="col s6">
                  Date Start:<div style="font-size:18px;" id = "strDateStart">&nbsp;</div>
                </div>
                <div class="col s6">
                  Date End:<div style="font-size:18px;" id = "strDateEnd">&nbsp;</div>
                </div>
              </div>
            </li>
            <li class="collection-header" style="font-weight:bold;">Reason:<div style="font-size:18px;" id = "strReason">&nbsp;</div></li>
            <li class="collection-item">
            <div class="row" id = 'divTable'>
              <div class="col s12">
                <table class="striped white" style="border-radius:10px; width:100%;" id="dataTableLeaveRequest">
                  <thead>
                    <th class="grey lighten-1" style="width:10px;"></th>
                    <th class="grey lighten-1">ID</th>
                    <th class="grey lighten-1">First Name</th>
                    <th class="grey lighten-1">Last Name</th>
                    <th class="grey lighten-1">Province</th>
                    <th class="grey lighten-1">City</th>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="modal-footer ci" style="background-color: #00293C;">
      <div id="sendLeaveRequest" style="display: none;">  
        <button class="btn blue waves-effect waves-light" name="" id = "btnSendNotificationLeaveRequest" style="margin-right: 30px;">Send<i class="material-icons right">send</i></button>
      </div>
      <div id = "acceptedLeaveRequest" style="display: none;">                                
        <button class="btn green" name="" style="margin-right: 30px; cursor:default;" id = "">Accepted</button>
      </div>
      <div id = "rejectedLeaveRequest" style="display: none;">                    
        <button class="btn red" name="" style="margin-right: 30px; cursor:default;" id = "">Declined</button>
      </div>
    </div>
  </div>
<!--modal sg leave request approval end-->
                    
<!--modal client request additional guards Start-->
  <div id="modalClientAddGuard" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Additional Guards</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">                           
            <li class="collection-header" style="font-weight:bold;">
              <div class='row'>
                <div class='col s4'>Number of Guards:</div>
                <div class="col s2 pull-s1" id = 'numberAdditionalGuard'></div>
              </div>
            </li>
            <li class="collection-item"><p id = 'reasonAdditionalGuard'></p></li>
            <li class="collection-item">
              <div class="row">
                <div class="col s12">
                  <table class="striped white" style="border-radius:10px; width:100%;" id="dataTableSendNotiMoreGuard">
                    <thead>
                      <th class="grey lighten-1" style="width:10px;"></th>
                      <th class="grey lighten-1">ID</th>
                      <th class="grey lighten-1">First Name</th>
                      <th class="grey lighten-1">Last Name</th>
                      <th class="grey lighten-1">Province</th>
                      <th class="grey lighten-1">City</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- button -->
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn blue waves-effect waves-light" name="" id = "btnSendNotificationAdditionalGuard" style="margin-right: 30px;">Send<i class="material-icons right">send</i></button>
    </div>
  </div>  
<!--modal client request additional guards end-->
    
<!--modal add guard request complete guards-->
  <div id="modaladdguardAccepted" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Confirmed Guards</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">                           
            <li class="collection-header" style="font-weight:bold;">
              <div class='row'>
                <div class='col s4'>Number of Guards:</div>
                <div class="col s2 pull-s1" id = 'addRequestGuard'></div>
              </div>
            </li>
            <li class="collection-item"><p id = 'addRequestReason'></p></li>
            <li class="collection-item">
              <div class="row">
                <div class="col s12">
                  <table class="striped white" style="border-radius:10px; width:100%;" id="dataTableAcceptedfromMoreGuardRequest">
                    <thead>                                                                                             
                      <th class="grey lighten-1">First Name</th>
                      <th class="grey lighten-1">Last Name</th>
                      <th class="grey lighten-1">Gender</th>                                              
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- button -->
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn green waves-effect waves-light" id = "btnAddRequestProceed" style="margin-right: 30px;">Proceed</button>
    </div>
  </div>  
<!--modal add guard request complete guards end-->
            
<!--modal swap guard request -->
  <div id="modalClientSwapGuard" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Replacement of Guards</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">                           
            <li class="collection-header" style="font-weight:bold;">
              <div class='row'>
                <div class='col s4'>Name of Guard:</div>
                <div class="col s4 pull-s1" id = ''>Russell Westbrook</div>
              </div>
            </li>
            <li class="collection-item"><p id = ''>Masyadong Mahusay. Mahilig sa Triple Double</p></li>
            <li class="collection-item">
              <div class="row">
                <div class="col s12">
                  <table class="striped white" style="border-radius:10px; width:100%;" id="dataTableSendNotiSwapGuard">
                    <thead>
                      <th class="grey lighten-1" style="width:10px;"></th>
                      <th class="grey lighten-1">ID</th>
                      <th class="grey lighten-1">First Name</th>
                      <th class="grey lighten-1">Last Name</th>
                      <th class="grey lighten-1">City</th>
                      <th class="grey lighten-1">Province</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" id="test1" value = ""><label for="test1"></label></td>
                        <td>1</td>
                        <td>Blake</td>
                        <td>Griffin</td>
                        <td>Las Pinas</td>
                        <td>Metro Manila</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn blue waves-effect waves-light" name="" id = "btnSendNotificationAdditionalGuard" style="margin-right: 30px;">Send<i class="material-icons right">send</i></button>
    </div>
  </div>  
<!--modal swap guard request end-->

<!--modal sg swap location request approval-->
  <div id="modalSGswaprequestapproval" class="modal modal-fixed-footer ci" style="overflow:hidden; width:900px;max-height:100%; height:650px; margin-top:-60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>SG Swap Request</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row" >  
        <div class="col s6" style="margin-top: -20px;">                                       
          <ul class="collection with-header" id="collectionActive" >
            <div>
              <li class="collection-header grey lighten-1"><h5 class='blue-text' style="font-weight:bold;">Guard Requesting</h5></li>
              <li class="collection-item grey lighten-2" style="font-weight:bold;">
                <div class="row">
                  <div class="col s2">Client:</div>
                  <div class="col s6" style="font-weight:normal;" id = 'swapSenderClientName'></div>
                </div>
              </li>
              <li class="collection-item grey lighten-2" style="font-weight:bold;">
                <div class="row">
                  <div class="col s4">    
                    First Name:<div style="font-weight:normal;" id = 'swapSenderFirstName'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s4">    
                    Middle Name:<div style="font-weight:normal;" id = 'swapSenderMiddleName'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s4">    
                    Last Name:<div style="font-weight:normal;" id = 'swapSenderLastName'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    Address:<div style="font-weight:normal;" id = 'swapSenderAddress'>&nbsp;&nbsp;&nbsp;</div>
                  </div>                                                                                  
                </div>
                <div class="row">
                  <div class="col s6">
                    Place of Birth:<div style="font-weight:normal;" id = 'swapSenderPlaceBirth'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s6">
                    Age:<div style="font-weight:normal;" id = 'swapSenderAge'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6">
                    Contact Number (Mobile):<div style="font-weight:normal;" id = 'swapSenderMobile'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s6">
                    Contact Number (Landline):<div style="font-weight:normal;" id = 'swapSenderLandline'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6">
                    Gender:<div style="font-weight:normal;" id = 'swapSenderGender'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s6">
                    Civil Status:<div style="font-weight:normal;" id = 'swapSenderCivilStatus'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>                      
              </li>
            </div>
          </ul>                               
        </div>
        <div class='col s6' style="margin-top: -20px;">
          <ul class="collection with-header" id="collectionActive" >
            <div>
              <li class="collection-header grey lighten-1"><h5 class='green-text' style="font-weight:bold;">Guard Requested</h5></li>
              <li class="collection-item grey lighten-2" style="font-weight:bold;">
                <div class="row">
                  <div class="col s2">Client:</div>
                  <div class="col s6" style="font-weight:normal;" id = 'swapReceiverClientName'></div>    
                </div>
              </li>
              <li class="collection-item grey lighten-2" style="font-weight:bold;">
                <div class="row">
                  <div class="col s4">    
                    First Name:<div style="font-weight:normal;" id = 'swapReceiverFirstName'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s4">    
                    Middle Name:<div style="font-weight:normal;" id = 'swapReceiverMiddleName'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s4">    
                    Last Name:<div style="font-weight:normal;" id = 'swapReceiverLastName'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    Address:<div style="font-weight:normal;" id = 'swapReceiverAddress'>&nbsp;&nbsp;&nbsp;</div>
                  </div>                                                                                  
                </div>
                <div class="row">
                  <div class="col s6">
                    Place of Birth:<div style="font-weight:normal;" id = 'swapReceiverPlaceBirth'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s6">
                    Age:<div style="font-weight:normal;" id = 'swapReceiverAge'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6">
                    Contact Number (Mobile):<div style="font-weight:normal;" id = 'swapReceiverMobile'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s6">
                    Contact Number (Landline):<div style="font-weight:normal;" id = 'swapReceiverLandline'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6">
                    Gender:<div style="font-weight:normal;" id = 'swapReceiverGender'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                  <div class="col s6">
                    Civil Status:<div style="font-weight:normal;" id = 'swapReceiverCivilStatus'>&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
              </li>
            </div>
          </ul>                   
        </div>  
      </div>  
    </div>

    <div class="modal-footer ci" style="background-color: #00293C;">
      <div id = "swapButtonsDiv" style="display: none;"> 
        <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnSwapAccept">Accept</button>
        <button class="btn red waves-effect waves-light modal-close" name="" style="margin-right: 30px;" id = "btnSwapDecline">Decline</button>
      </div>
      <div id = "swapAcceptedDiv" style="display: none;">                    
        <button class="btn green" name="" style="margin-right: 30px; cursor:default;">Accepted</button>
      </div>
      <div id = "swapRejectedDiv" style="display: none;">            
        <button class="btn red" name="" style="margin-right: 30px; cursor:default;" id = "">Declined</button>
      </div>                
    </div>
  </div>              
<!--modal sg swap location request approval end-->

<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
var pusher = new Pusher("{{env('PUSHER_KEY')}}");
var channel = pusher.subscribe('test-channel');
channel.bind('test-event', function(data) {
  alert(data.text);
});
</script>
@stop


@section('script')
<script>
$(document).ready(function(){
    var guardWaiting = [];
    var guardChecked; //sesendan ng notification
    var guardHasNotification = []; //guards who have notification (new client)
    var guardHasNotificationLeaveRequest = [];//guards who have notification (leave request)
    var inboxID;
    $.ajax({
        type: "GET",
        url: "{{action('InboxController@getInbox')}}",
        success: function(data){
            if (data){
                var table = $('#dataTableMsg').DataTable();
                var radio;
                var button;
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
        }//success ajax
    }); //get inbox

    //Buttons Start
      $('#dataTableMsg').on('click','.buttonRead', function(){
          var type = $('#type' + this.id).val();
          inboxID = this.id;
          readMessage();
          if (type == 0){
              message();
          }else if (type == 1){//new client (client)
              newClientClient();
          }else if (type == 3){
              guardLeaveRequest();
          }else if(type == 5){
              clientAdditionalRequest();
          }else if (type == 7){
              additionalGuardApproved();
          }else if (type == 9){
            swapLocation();
          }//if else
      });//button read click
      
      $('#btnSendNotificationNewClient').click(function(){
          getCheckedGuard();
          if (guardChecked.length > 0){
              sendNewClientNotificationGuard();
          }else{
              var toastContent = $('<span>Select at least one guard. </span>');
              Materialize.toast(toastContent, 1500,'red', 'edit');
          }
      });//button send notification for guard (new client)

      $('#btnSendNotificationLeaveRequest').click(function(){
          getCheckedGuard();
          if (guardChecked.length > 0){
              sendLeaveRequestNotification();
          }else{
              var toastContent = $('<span>Select at least one guard. </span>');
              Materialize.toast(toastContent, 1500,'red', 'edit');

          }
      });//button send notifiation for guard (leave request)

      $('#btnSendNotificationAdditionalGuard').click(function(){
          getCheckedGuard();
          if (guardChecked.length > 0){
              sendAdditionalGuardNotification();
          }else{
              var toastContent = $('<span>Select at least one guard. </span>');
              Materialize.toast(toastContent, 1500,'red', 'edit');
          }
      });

      $('#btnAddRequestProceed').click(function(){
          var id = this.id;
          var clientID = this.value;
          $.ajax({
              type: "GET",
              url: "/clientguardrequest/get/code?inboxID=" + inboxID,
              success: function(data){
                swal({    
                  title: "Proceed Code.",   
                  text: "Enter the code to proceed.",   
                  type: "input",   
                  showCancelButton: true,   
                  closeOnConfirm: false,   
                  animation: "slide-from-top"
                }, 
                  function(inputValue){     
                    if (inputValue == data) {     
                        this.closeOnConfirm = true; //close swal. 
                        setAdditionalGuardID();
                        window.location.href = '{{ URL::to("/addguardrequestcomplete") }}';
                    }else{
                        swal.showInputError("Check your code.");
                        return false;
                    }
                });
              }
            });
      });//additional guard proceed || client requested additional guard

      $('#btnSwapAccept').click(function(){
        $.ajax({
          type: "POST",
          url: "{{action('SwapRequestGuardController@acceptSwapRequest')}}",
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
              title: "Request Accepted!",
              text: "You successfully swap the two guards.",
              type: "success"
            },
            function(){
              window.location.href = '{{ URL::to("/adminInbox") }}';
            });
          },
          error: function(data){
            var toastContent = $('<span>Error Database.</span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');
          }
        });//ajax
      });
    //Buttons end

      
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

    // NEW CLIENT START
      function newClientClient(){
          if (isRequestAvailable()){
              $('#modalSendNoti').openModal();
              getGuardWaiting();
              populateGuardWaitingNotification();
              setNumberOfGuardNewClient();
          }else{
              swal("N/A!", "Not Available Anymore.", 'error');
          }
      }//1st step

      function isRequestAvailable(){
          var checker;
          $.ajax({
              type: "GET",
              url: "adminInbox/get/clientpendingnotificationstatus?inboxID=" + inboxID,
              success: function(data){
                  if (data.intStatusIdentifier == 0){
                      checker = false;
                  }else{
                      checker = true;
                  }
              },async:false
          });//ajax
          return checker;
      }

      function getGuardWaiting(){
          if (guardWaiting.length<=0){
              $.ajax({
                  type: "GET",
                  url: "{{action('AdminInboxController@getGuardWaiting')}}",
                  success: function(data){
                      guardWaiting = data;
                  },async:false
              });//get guard waiting
          }
      }// newClientClient

      function populateGuardWaitingNotification(){
          var table = $('#dataTableSendNoti').DataTable();
          table.clear().draw();
          getGuardHasNotification();

          for(intLoop = 0; intLoop < guardWaiting.length; intLoop ++){
             var boolchecker = true;
             for (intLoop2 = 0; intLoop2 < guardHasNotification.length; intLoop2 ++){
                 if (guardWaiting[intLoop].intGuardID == guardHasNotification[intLoop2].intGuardID){
                     boolchecker = false;
                     break;
                 }
             }

             if (boolchecker){
                  table.row.add([
                      '<input type="checkbox" id="checkBox' +guardWaiting[intLoop].intGuardID  + '" value = "'+ guardWaiting[intLoop].intGuardID +'"><label for="checkBox' + guardWaiting[intLoop].intGuardID + '"></label>',

                      '<h style="height:-15px;">' + guardWaiting[intLoop].intGuardID + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strFirstName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strLastName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strProvinceName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strCityName + '</h>',
                  ]).draw(false);
             }
          }
      }//populate table of guards waiting || if the guard has notification, they can't receive another notification from the same request

      function getGuardHasNotification(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/guardhasnotification?id=" + inboxID,
              success: function(data){
                  guardHasNotification = data;
              },async:false
          });//ajax
      }//guard that has the notification of the request

      function setNumberOfGuardNewClient(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/numberguard?id=" + inboxID,
              success: function(data){
                  $('#guardNumber').text(data.intNumberOfGuard);
              }
          });//get number of guard
      }// newClientClient

      function getCheckedGuard(){
          var intCounter = 0;
          guardChecked = [];
          for(intLoop = 0; intLoop < guardWaiting.length; intLoop ++){
              var guardID = 'checkBox' + guardWaiting[intLoop]['intGuardID'];
              if ($('#' + guardID).is(':checked')){
                  guardChecked[intCounter] = guardWaiting[intLoop]['intGuardID'];
                  intCounter++;
              }
          }
      }//recipient of  notification (new client)
      
      function sendNewClientNotificationGuard(){
          $.ajax({
              type: "POST",
              url: "{{action('AdminInboxController@sendGuardPendingNotification')}}",
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              data: {
                  guardWaiting: guardChecked,
                  inboxID: inboxID,
              },
              success: function(data){
                  swal("Success!", "Record has been Added!", "success");
                  $('#modalSendNoti').closeModal();
              },
              error: function(data){
                  var toastContent = $('<span>Error Occured. </span>');
                  Materialize.toast(toastContent, 1500,'red', 'edit');

              }
          });//ajax
      }//notification sent
    // NEW CLIENT END


    // MESSAGE START
      function message(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/message?inboxID=" + inboxID,
              success: function(data){
                  $('#modalMessage').openModal();
                  $('#messageSubject').text(data.strSubject);
                  $('#messageMessage').text(data.strMessage);
              }
          });//get guard waiting
      }
    // MESSAGE END


    // GUARD LEAVE REQUEST START
      function guardLeaveRequest(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/guardrequestleaveinformation?inboxID=" + inboxID,            
              success: function(data){
                  $('#modalLeaveRequestApproval').openModal();
                  $('#strLeaveType').text(data.strLeaveType);
                  $('#strClientName').text(data.strClientName);
                  $('#strReason').text(data.strReason);
                  $('#strDateStart').text(moment(data.dateStart).format('MMMM D, YYYY'));
                  $('#strDateEnd').text(moment(data.dateEnd).format('MMMM D, YYYY'));
                  var dateStart = new Date(data.dateStart);
                  var dateNow = new Date();

                  if(data.boolStatus == 1 && !(dateStart < dateNow)){
                      getGuardWaiting(); //guard waiting
                      populateTableRequestLeave();
                      $('#divTable').show();
                      $('#sendLeaveRequest').show();
                      $('#acceptedLeaveRequest').hide();
                      $('#rejectedLeaveRequest').hide();
                  }else if (data.boolStatus == 2){
                      $('#divTable').hide();
                      $('#sendLeaveRequest').hide();
                      $('#acceptedLeaveRequest').show();
                      $('#rejectedLeaveRequest').hide();
                  }else if (data.boolStatus == 3 || (dateStart < dateNow)){
                      $('#divTable').hide();
                      $('#sendLeaveRequest').hide();
                      $('#acceptedLeaveRequest').hide();
                      $('#rejectedLeaveRequest').show();
                  }
              },
              error: function(){
                var toastContent = $('<span>Error Database.</span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
              }
          });//ajax
      }

      function populateTableRequestLeave(){
          var table = $('#dataTableLeaveRequest').DataTable();
          table.clear().draw();
          getGuardHasNotificationLeaveRequest();
          for(intLoop = 0; intLoop < guardWaiting.length; intLoop ++){
             var boolchecker = true;
             for (intLoop2 = 0; intLoop2 < guardHasNotificationLeaveRequest.length; intLoop2 ++){
                 if (guardWaiting[intLoop].intGuardID == guardHasNotificationLeaveRequest[intLoop2].intGuardID){
                     boolchecker = false;
                     break;
                 }
             }

             if (boolchecker){
                  table.row.add([
                      '<input type="checkbox" id="checkBox' +guardWaiting[intLoop].intGuardID  + '" value = "'+ guardWaiting[intLoop].intGuardID +'"><label for="checkBox' + guardWaiting[intLoop].intGuardID + '"></label>',

                      '<h style="height:-15px;">' + guardWaiting[intLoop].intGuardID + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strFirstName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strLastName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strProvinceName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strCityName + '</h>',
                  ]).draw(false);
             }
          }
      }

      function sendLeaveRequestNotification(){
          $.ajax({
              type: "POST",
              url: "{{action('AdminInboxController@sendLeaveRequestNotification')}}",
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              data: {
                  guardWaiting: guardChecked,
                  inboxID: inboxID,
              },
              success: function(data){
                  swal("Success!", "Request Sent.", "success");
                  $('#modalLeaveRequestApproval').closeModal();
              },
              error: function(data){
                  var toastContent = $('<span>Error Database.</span>');
                  Materialize.toast(toastContent, 1500,'red', 'edit');
              }
          });//ajax
      }

      function getGuardHasNotificationLeaveRequest(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/getGuardHasNotificationLeaveRequest?inboxID=" + inboxID,
              success: function(data){
                  guardHasNotificationLeaveRequest = data;
              },async:false
          });//ajax
      }
    // GUARD LEAVE REQUEST END


    // ADDITIONAL GUARD REQUEST START
      function clientAdditionalRequest(){
          if (isRequestAvailable()){
              $('#modalClientAddGuard').openModal();
              getGuardWaiting();
              populateAdditionalGuard();
              setRequestInformation();
          }else{
              swal("N/A!", "Not Available Anymore.", 'error');
          }
      }

      function populateAdditionalGuard(){
          var table = $('#dataTableSendNotiMoreGuard').DataTable();
          table.clear().draw();
          getGuardHasNotification();

          for(intLoop = 0; intLoop < guardWaiting.length; intLoop ++){
             var boolchecker = true;
             for (intLoop2 = 0; intLoop2 < guardHasNotification.length; intLoop2 ++){
                 if (guardWaiting[intLoop].intGuardID == guardHasNotification[intLoop2].intGuardID){
                     boolchecker = false;
                     break;
                 }
             }

             if (boolchecker){
                  table.row.add([
                      '<input type="checkbox" id="checkBox' +guardWaiting[intLoop].intGuardID  + '" value = "'+ guardWaiting[intLoop].intGuardID +'"><label for="checkBox' + guardWaiting[intLoop].intGuardID + '"></label>',

                      '<h style="height:-15px;">' + guardWaiting[intLoop].intGuardID + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strFirstName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strLastName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strProvinceName + '</h>',
                      '<h style="height:-15px;">' + guardWaiting[intLoop].strCityName + '</h>',
                  ]).draw(false);
             }
          }
      }

      function setRequestInformation(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/getRequestInformation?id=" + inboxID,
              success: function(data){
                  $('#numberAdditionalGuard').text(data.intNumberOfGuard);
                  $('#reasonAdditionalGuard').text(data.strMessage);
              }
          });//get number of guard
      }

      function sendAdditionalGuardNotification(){
          $.ajax({
              type: "POST",
              url: "{{action('AdminInboxController@sendAdditionalGuardNotification')}}",
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              data: {
                  guardWaiting: guardChecked,
                  inboxID: inboxID,
              },
              success: function(data){
                  swal("Success!", "Request has been sent.", "success");
                  $('#modalClientAddGuard').closeModal();
              },
              error: function(data){
                  var toastContent = $('<span>Error Database.</span>');
                  Materialize.toast(toastContent, 1500,'red', 'edit');

              }
          });//ajax
      }
    // ADDITIONAL GUARD REQUEST END

    // ADDITIONAL GUARD REQUEST APPROVED START
      function additionalGuardApproved(){
          $.ajax({
              type: "GET",
              url: "/adminInbox/get/AdditionalGuardInformation?inboxID=" + inboxID,
              success: function(data){
                  $('#modaladdguardAccepted').openModal();
                  $('#addRequestGuard').text(data.intNumberOfGuard);
                  $('#addRequestReason').text(data.strMessage);
                  var table = $('#dataTableAcceptedfromMoreGuardRequest').DataTable();
                  table.clear().draw();

                  $.each(data.guards,function(index,value){
                      var firstName = '<h>' + value.strFirstName + '</h>';
                      var lastName = '<h>' + value.strLastName + '</h>';
                      var gender = '<h>' + value.strGender + '</h>';
                      table.row.add([
                          firstName,
                          lastName,
                          gender
                      ]).draw(false);
                  }); 
              },
              error: function(data){
                  var toastContent = $('<span>Error Database.</span>');
                  Materialize.toast(toastContent, 1500,'red', 'edit');
              }
          });//ajax
      }

      function setAdditionalGuardID(){
          $.ajax({
              type: "POST",
              url: "{{action('AdminInboxController@setAdditionalGuardID')}}",
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

              }
          });//ajax
      }
    // ADDITIONAL GUARD REQUEST APPROVED END

    //Swap Request (Guard requested) Start
      function swapLocation(){
        checkSwapRequest();
        getGuardInvolve();
        $('#modalSGswaprequestapproval').openModal();
      }

      function getGuardInvolve(){
        $.ajax({

          type: "GET",
          url: "/swaprequest/get/GuardInvolve?inboxID=" + inboxID,
          success: function(data){
            //guardSender Start 
              var guardSender = data.senderInformation;
              $('#swapSenderClientName').text(guardSender.strClientName);
              $('#swapSenderFirstName').text(guardSender.strFirstName);
              $('#swapSenderMiddleName').text(guardSender.strMiddleName);
              $('#swapSenderLastName').text(guardSender.strLastName);
              $('#swapSenderAddress').text(guardSender.strAddress + ' ' + guardSender.strCityName + ', ' + guardSender.strProvinceName);
              $('#swapSenderPlaceBirth').text(guardSender.strPlaceBirth);
              $('#swapSenderAge').text(guardSender.age);
              $('#swapSenderMobile').text(guardSender.strContactNumberMobile);
              $('#swapSenderLandline').text(guardSender.strContactNumberLandline);
              $('#swapSenderGender').text(guardSender.strGender);
              $('#swapSenderCivilStatus').text(guardSender.strCivilStatus);
            //guardSender End

            //guardReceiver Start
              var guardReceiver = data.receiverInformation;
              $('#swapReceiverClientName').text(guardReceiver.strClientName);
              $('#swapReceiverFirstName').text(guardReceiver.strFirstName);
              $('#swapReceiverMiddleName').text(guardReceiver.strMiddleName);
              $('#swapReceiverLastName').text(guardReceiver.strLastName);
              $('#swapReceiverAddress').text(guardReceiver.strAddress + ' ' + guardReceiver.strCityName + ', ' + guardReceiver.strProvinceName);
              $('#swapReceiverPlaceBirth').text(guardReceiver.strPlaceBirth);
              $('#swapReceiverAge').text(guardReceiver.age);
              $('#swapReceiverMobile').text(guardReceiver.strContactNumberMobile);
              $('#swapReceiverLandline').text(guardReceiver.strContactNumberLandline);
              $('#swapReceiverGender').text(guardReceiver.strGender);
              $('#swapReceiverCivilStatus').text(guardReceiver.strCivilStatus);
            //guardReceiver End
          },
          error: function(data){
            var toastContent = $('<span>Error Database </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
      }

      function checkSwapRequest(){
        $.ajax({
          type: "GET",
          url: "/swaprequest/get/checkStatusSwapRequest?inboxID=" + inboxID,
          success: function(data){
            if (data == 3){//waiting
              $('#swapButtonsDiv').show();
              $('#swapRejectedDiv').hide();
              $('#swapAcceptedDiv').hide();
            }else if (data == 0){//rejected
              $('#swapButtonsDiv').hide();
              $('#swapRejectedDiv').show();
              $('#swapAcceptedDiv').hide();
            }else if (data == 2){//accepted
              $('#swapButtonsDiv').hide();
              $('#swapRejectedDiv').hide();
              $('#swapAcceptedDiv').show();
            }
          },
          error: function(data){
            var toastContent = $('<span>Error Database </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
      }
    //Swap Request (Guard requested) End
});
</script>        
        
<script>
    $('#dataTableMsg').DataTable({
         "columns": [
        { "orderable": false },
        { "orderable": false },
        null,
        null,
        { "orderable": false }
        ] ,  
        "pageLength":5,
        "lengthMenu": [5,10,15,20],
        "bFilter": false,
     });

    $('#dataTableRequest').DataTable({
         "columns": [
        { "orderable": false },
        { "orderable": false },
        null,
        null,
        { "orderable": false }
        ] ,  
        "pageLength":5,
        "lengthMenu": [5,10,15,20],
        "bFilter": false,
     });

    $('#dataTableSendNoti').DataTable({
         "columns": [
        { "orderable": false },
        null,
        null,
        null,
        null,
        null
        ] ,  
        "pageLength":5,
        "lengthMenu": [5,10,15,20]
     });
    
    $('#dataTableLeaveRequest').DataTable({
         "columns": [
        { "orderable": false },
        null,
        null,
        null,
        null,
        null
        ] ,  
        "pageLength":5,
        "lengthMenu": [5,10,15,20]
     });
    
    $('#dataTableSendNotiMoreGuard').DataTable({
         "columns": [
        { "orderable": false },
        null,
        null,
        null,
        null,
        null
        ] ,  
        "pageLength":3,
        "lengthMenu": [5,10,15,20]
     });
    
    $('#dataTableAcceptedfromMoreGuardRequest').DataTable({
         "columns": [        
        null,
        null,
        null
        ] ,  
        "pageLength":3,
        "lengthMenu": [5,10,15,20]
     });
    
    $('#dataTableSendNotiSwapGuard').DataTable({
         "columns": [
        { "orderable": false },
        null,
        null,
        null,
        null,
        null
        ] ,  
        "pageLength":3,
        "lengthMenu": [5,10,15,20]
     });
</script>
    
@stop