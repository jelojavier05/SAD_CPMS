@extends('layout.maintenanceLayout')

@section('title')
Clients
@endsection

@section('content')

<div class="row">	
	<div class="col s10 push-s2">
      <ul class="tabs">
        <li class="tab col s3"><a href="#Pending">Pending</a></li>
        <li class="tab col s3"><a href="#Active">Active</a></li>
      </ul>
    </div>
    
    <div class="col s12 push-s1" id="Active" >
        <div class="row" id="activeClient">
            <div class="col s8">
                <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
                    <div class="col s6 push-s1">
                        <h4 class="blue-text">Client (Active)</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col s11" style="margin: -15px 25px 25px 25px;">
                            <table class="highlight white" style="border-radius:10px;" id="tableActive">
                                <thead>
                                    <tr>
                                        <th style="width:50px;"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Person In Charge</th>
                                        <th style="width:50px;"></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    
                                    @foreach($clientActive as $value)
                                    <tr>
                                        <td>
                                            <button class="buttonUpdate btn col s12" id="{{$value->intClientID}}" >
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <label for=""></label>
                                        </td>
                                        
                                        <td>{{$value->intClientID}}</td>
                                        <td>{{$value->strClientName}}</td>
                                        <td>{{$value->strPersonInCharge}}</td>
                                        <td>
                                            <button id="{{$value->intClientID}}" class="btn blue detaillist btnActiveMore" onclick="Materialize.showStaggeredList('#collectionActive')" >
                                            MORE
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col s4 pull-s1" style="margin-top:25px;">	
                <ul class="collection with-header" id="collectionActive">
                    <li class="collection-header" style="opacity:0;"><h5 style="font-weight:bold;">Details</h5></li>
                    
                    <div style="visibility:hidden;" id="detailcontainer">
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Nature of Business:<div style="font-weight:normal;" id = 'activeBusiness'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Contact Number (Client):<div style="font-weight:normal;" id = 'activeContactClient'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Person in Charge:<div style="font-weight:normal;" id = 'activeInCharge'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'activeContactPerson'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Address:<div style="font-weight:normal;" id = 'activeAddress'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'activeAreaSize'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Population (approx.):<div style="font-weight:normal;" id = 'activePopulation'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <div class="col s12 push-s1" id="Pending" >
        <div class="row" id="pendingClient">
            <div class="col s8">
                <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
                    <div class="col s6 push-s1">
                        <h4 class="blue-text">Client (Pending)</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col s12" style="margin-top:-20px;">
                            <table class="highlight white" style="border-radius:10px;" id="dataTablePending">
                                <thead>
                                    <tr>
                                        <th style="width:10px;"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th></th>
                                        <th style="width:10px;"></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($clientPending as $value)
                                    <tr>
                                        
									                      <td>
                                            <button class="buttonDelete col s12 btn red"  name="" id="{{$value->intClientPendingID}}" >
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <label for=""></label>
                                        </td>
                                        
                                        <td id = "">{{ $value->intClientID }}</td>
                                        <td id = "">{{ $value->strClientName }}</td>
                                        <td>
                                            <a id = '{{ $value->intClientPendingID }}' class="btn col s12 buttonMore" onclick="Materialize.showStaggeredList('#collectionPending')" value = '{{$value->intClientPendingID}}'>More</a>
                                        </td>
                                        
                                        <td>
                                            <button class="btn green col s12 buttonProceed" id="{{$value->intClientPendingID}}" value = '{{ $value->intClientID }}'>
                                            Proceed
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col s4 pull-s1" style="margin-top:25px;">	
                <ul class="collection with-header" id="collectionPending">
                    <li class="collection-header" style="opacity:0;">
                    <ul class="tabs" style="overflow:hidden;">
                        <li class="tab col s3"><a class="active" href="#guardcontainer" id = 'guardCount'></a></li>
                        <li class="tab col s3"><a href="#pendingDetails">Details</a></li>
                    </ul>
                    </li>
                    <div style="overflow:scroll; overflow-x:hidden; height:400px;" id="pendingDetails">
                        <li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;Bank</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Name:<div style="font-weight:normal;" id = 'clientName'>&nbsp;&nbsp;&nbsp;09123456789</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;" id = 'clientNumber'>&nbsp;&nbsp;&nbsp;09123456789</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'personNumber'>&nbsp;&nbsp;&nbsp;09987654321</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;1000</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;10000</div>
                        </li>
                    </div>
                    
                    <div id="guardcontainer" style="visibility:hidden;">
                        
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop
	
@section('script')


<script type="text/javascript">
$(document).ready(function(){
  var clientID;
  var clientPendingID;
  var guardWaiting;
  var guardChecked;
  var guardHasNotification;
  
  $('#dataTablePending').on('click', '.buttonMore', function(){
      $.ajax({    
          type: "GET",
          url: "/clientView/get/guardaccept?notificationID=" + this.id,
          success: function(data){
              var items = [];
              $('#guardcontainer').empty();
              $.each(data, function(i, item) {
                  $("#guardcontainer").append('<li class="collection-item" style="opacity:100;">' + item.strFirstName + ' ' + item.strLastName + '</li>');
              });
          }
      });//get guard accepted
      
      $.ajax({    
          type: "GET",
          url: "/clientView/get/selectedclientpending?notificationID=" + this.id,
          success: function(data){
              var area = commaSeparateNumber(data.deciAreaSize);
              var population = commaSeparateNumber(data.intPopulation);
              
              $('#natureOfBusiness').text(data.strNatureOfBusiness);
              $('#clientName').text(data.strClientName);
              $('#clientNumber').text(data.strContactNumber);
              $('#personInCharge').text(data.strPersonInCharge);
              $('#personNumber').text(data.strPOICContactNumber);
              $('#address').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
              $('#areaSize').text(area);
              $('#population').text(population);
              
          }
      });//get selected client pending
      
      $.ajax({

          type: "GET",
          url: "/clientView/get/guardcount?notificationID=" + this.id,
          success: function(data){
              $('#guardCount').text('Guards - ' + data.countAccepted + '/' + data.countNeedGuard.intNumberOfGuard);
          },
          error: function(data){
              confirm ('guard pending');
          }
      });//get guard count accepted
  });
  
  $('#dataTablePending').on('click', '.buttonProceed', function(){
      var id = this.id;
      var clientID = this.value;
      $.ajax({
          type: "GET",
          url: "/clientView/get/guardcount?notificationID=" + id,
          success: function(data){
              var guardNeeded = data.countNeedGuard.intNumberOfGuard - data.countAccepted;
              
              if (guardNeeded == 0){

                  swal({    
                    title: "Proceed Code.",   
                    text: "Enter the code to proceed.",   
                    type: "input",   
                    showCancelButton: true,   
                    closeOnConfirm: false,   
                    animation: "slide-from-top"
                  }, 
                    function(inputValue){     
                      if (inputValue == data.code) {     
                          this.closeOnConfirm = true; //close swal. 
                          sendClientID(clientID);
                      }else{
                          swal.showInputError("Check your code.");
                          return false;
                      }
                    });
                  
              }else{
                  var toastContent = $('<span>Not enough guards.</span>');
                  Materialize.toast(toastContent, 1500,'red', 'edit');
              }
          }
      });//get guard count accepted
  });

  $('#dataTablePending').on('click', '.buttonDelete', function(){
    var clientPendingID = this.id;
    swal({   title: "Are you sure?",   
             text: "The Client will be removed.",   
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Yes, remove it!",   
             closeOnConfirm: false 
         }, 
         function(){
          postDeleteTemporaryAccount(clientPendingID);
      });
  });

  function postDeleteTemporaryAccount(clientPendingID){
    $.ajax({
      type: "POST",
      url: "{{action('ClientViewController@deleteClientPending')}}",
      beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
      data: {
        clientPendingID: clientPendingID
      },
      success: function(data){
        swal({
            title: "Success!",
            text: "You removed the temporary client.",
            type: "success"
          },
          function(){
          window.location.href = '{{ URL::to("/clientView") }}';
        });

      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');
      }
    });//ajax
  }

  $('#tableActive').on('click', '.btnActiveMore', function(){
      $.ajax({
          type: "GET",
          url: "/clientView/get/client?clientID=" + this.id,
          success: function(data){
              console.log(data);
              $('#activeBusiness').text(data.strNatureOfBusiness);
              $('#activeContactClient').text(data.strContactNumber);
              $('#activeInCharge').text(data.strPersonInCharge);
              $('#activeContactPerson').text(data.strPOICContactNumber);
              $('#activeAddress').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
              $('#activeAreaSize').text(data.deciAreaSize);
              $('#activePopulation').text(data.intPopulation);






          },
          error: function(data){
              var toastContent = $('<span>Error Database.</span>');
              Materialize.toast(toastContent, 1500,'red', 'edit');

          }
      });//ajax
  });

  $('.buttonMore').click(function() {
      $('#guardcontainer').css({
			'visibility': 'visible',
			'max-height': '400px',
			'overflow': 'scroll',
			'overflow-x': 'hidden',
			'height': '100%'
		 });
	});

	$('.detaillist').click(function() {
		$('#detailcontainer').css({
			'visibility': 'visible',
			'overflow': 'scroll',
			'overflow-x': 'hidden',
			'height': '400px'
		});
  });
  
  function commaSeparateNumber(val){
      while (/(\d+)(\d{3})/.test(val.toString())){
          val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
      }
      return val;
  }
  
  function sendClientID(id){
      $.ajax({
          type: "POST",
          url: "{{action('ClientViewController@post')}}",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');

              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          data: {
              clientID:id
          },
          success: function(data){
              window.location.href = '{{ URL::to("/client/gunTagging") }}';
          },
          error: function(data){
              var toastContent = $('<span>sendingClientPendingID</span>');
              Materialize.toast(toastContent, 1500,'red', 'edit');

          }
      });//ajax
  }// magsesend ng clientID sa session
});
</script>

<script>
    $(document).ready(function(){
        $('ul.tabs').tabs();

        $("#tableActive").DataTable({
             "columns": [   
            { "orderable": false },
            null,
            null,
            null,
            { "orderable": false }
            ] ,  
            "pageLength":5,
            "lengthMenu": [5,10,15,20]
        });
        
        $("#dataTablePending").DataTable({
             "columns": [
            { "orderable": false },
            null,
            null,
            { "orderable": false },
            { "orderable": false }
            ] ,  
            "pageLength":5,
            "lengthMenu": [5,10,15,20]
        });
    });
</script>
@stop