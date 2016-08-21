@extends('CGR.CGRMain')
@section('title')
Receiving Delivery
@endsection

@section('content')
<!-- Title Start -->
<div class="row">
  <div class="col s5 push-s3" style="margin-left:-2%">
    <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:7%">Receiving Delivery</h3>
  </div>
</div>
<!-- Title End -->

<!-- Delivery Table Start-->
<div class="row">
  <div class="col l12">
    <div class="col l10 offset-l2" style="max-height:690px">
      <table class="centered" id="tableDelivery">
        <thead>
          <tr>
            <th data-field="status">Delivery ID</th>                              
            <th data-field="status">Delivery Date</th>
            <th data-field="guard">Delivery Person/s</th>
            <th>Contact Number</th>
            <th data-field="guard">Action</th>                
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Delivery Table End -->

<!--Modal Delivery Detail Start-->
<div id="modalDeliveryDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:570px; margin-top:-30px;">
  <div class="modal-header">
    <div class="h">
      <h3><center>Delivery</center></h3>  
    </div>
  </div>
  <div class="modal-content">
    <div class="row">
      <div class="col s12">
        <ul class="collection with-header" id="collectionActive">
          <li class="collection-header" ><h4 style="font-weight:bold;">Items</h4></li>
          <div>
            <li class="collection-item" style="font-weight:bold;">
              <div style="font-weight:normal;">
                <div class='row'>
                  <div class="col s12">
                    <table class="" style="font-family:Myriad Pro" id = 'tableItem'>
                      <thead>
                        <tr>
                        <th class="grey lighten-1"></th>
                        <th class="grey lighten-1">Serial Number</th>
                        <th class="grey lighten-1">Name</th>
                        <th class="grey lighten-1">Type of Gun</th>
                        <th class="grey lighten-1">Rounds</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </li>
          </div>
        </ul>
      </div>
    </div>
    <div class="row"></div>
  </div>
  <div class="modal-footer ci" style="background-color: #00293C;">
    <div id = "buttons" >	
      <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnReceive">OK</button>
    </div>
  </div>
</div>
<!--Modal Delivery Detail End-->

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
    <button class="btn large waves-effect waves-light green" name="action" style="margin-right: 30px;" id = "btnOkay">OK
    </button>
  </div>  
</div>
<!-- sg login End -->
@stop

@section('script')

<script>
$(document).ready(function(){
  refreshTableDelivery();
  var arrItemDelivery;
  var tableItem = $('#tableItem').DataTable();
  var tableDelivery = $('#tableDelivery').DataTable();

  tableDelivery.on('click', '.buttonVerify', function(){
    var id = this.id;
    swal({    
      title: "Delivery Code.",   
      text: "Enter the delivery code.",   
      type: "input",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      animation: "slide-from-top"
    }, 
      function(inputValue){     
        if (isDeliveryCodeCorrect(inputValue, id) == false) {     
          swal.showInputError("Check your code.");     
          return false;
        }else{
          this.closeOnConfirm = true; //close swal.
          $('#modalDeliveryDetails').openModal();
          refreshTableItem(id);
        }
      });
  });//button verify

  $('#btnReceive').click(function(){
    $('#modalLogin').openModal();

    // $.ajax({
    //   type: "POST",
    //   url: "{{action('ArmedServiceController@addArmedService')}}",
    //   beforeSend: function (xhr) {
    //     var token = $('meta[name="csrf_token"]').attr('content');
    //     if (token) {
    //       return xhr.setRequestHeader('X-CSRF-TOKEN', token);
    //     }
    //   },
    //   data: {
    //     arrItemCheck:getCheckedItem()
    //   },
    //   success: function(data){

    //   }
    // });//ajax
  });

  $('#btnOkay').click(function(){
    var username = $('#username').val().trim();
    var password = $('#password').val().trim();

    if (username != '' && password != ''){
      $.ajax({
        type: "POST",
        url: "{{action('CGRReceivingDeliveryController@setGuardReceiver')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            username:username,
            password:password
        },
        success: function(data){
          if (data){
            
          }else{
            var toastContent = $('<span>Login failed.</span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');      
          }
        },
      });//ajax
    }else{
      var toastContent = $('<span>All fields are required.</span>');
      Materialize.toast(toastContent, 1500,'red', 'edit');
    }// if else checing input
  });

  function refreshTableDelivery(){
    $.ajax({
      type: "GET",
      url: "{{action('CGRReceivingDeliveryController@getDelivery')}}",
      success: function(data){
        tableDelivery.clear().draw(); //clear all the row
        
        $.each(data, function(index, value) {
          
          var deliveryID = '<h>'+value.intGunDeliveryHeaderID+'</h>';
          var deliveryDate = '<h>'+value.datetimeDeliver+'</h>';
          var deliveryBy = '<h>'+value.strDeliveredBy+'</h>';
          var deliveryContactNumber = '<h>'+value.strContactNumber+'</h>';
          var deliveryButton;
          var checker = value.boolStatus;

          if (checker == 0){
            deliveryButton = '<button class="btn green darken-4 buttonVerified" type="button" id = "'+value.intGunDeliveryHeaderID+'">Verified</button>';
          }else{
            deliveryButton = '<button class="btn blue darken-4 buttonVerify" type="button" id = "'+value.intGunDeliveryHeaderID+'">Verify</button>';
          }

          tableDelivery.row.add([
            deliveryID,
            deliveryDate,
            deliveryBy,
            deliveryContactNumber,
            deliveryButton
          ]).draw();
        });//foreach
      }
    });//ajax
  }//refresh delivery table

  function isDeliveryCodeCorrect(input,id){
    var checker;
    $.ajax({
      type: "GET",
      url: "/cgrreceivingdelivery/get/deliverycode?id=" + id,
      success: function(data){
        if (data == input){
          checker = true;
        }else{
          checker = false;
        }
      },async:false
    });//ajax
    return checker;
  }//check delivery code correct

  function refreshTableItem(id){
    $.ajax({
      type: "GET",
      url: "/cgrreceivingdelivery/get/deliverydetail?id=" + id,
      success: function(data){
        tableItem.clear().draw(); //clear all the row
        arrItemDelivery = data;    
        $.each(data, function(index, value) {
          
          var serialNumber = '<h>'+value.strSerialNumber+'</h>';
          var gunName = '<h>'+value.strGunName+'</h>';
          var typeGun = '<h>'+value.strTypeOfGun+'</h>';
          var rounds = '<h>'+value.intRounds+'</h>';
          var checkboxItem = '<input type="checkbox" value = "'+value.intGunDeliveryDetailID+'" id="checkbox'+value.intGunDeliveryDetailID+'"/><label for="checkbox'+value.intGunDeliveryDetailID+'"></label>'; 

          tableItem.row.add([
            checkboxItem,
            serialNumber,
            gunName,
            typeGun,
            rounds
          ]).draw();
        });//foreach
      },async:false
    });//ajax
  }//refresh table item

  function getCheckedItem(){
    var arrItemCheck = [];

    $.each(arrItemDelivery, function(index,value){
      if ($('#checkbox' + value.intGunDeliveryDetailID).is(':checked')){
        arrItemCheck.push($('#checkbox' + value.intGunDeliveryDetailID).val());
      }
    });
    return arrItemCheck;
  }

});//document ready function
</script>

<script>
$('#tableDelivery').DataTable({
             "columns": [         					
			null,
			null,
			null,
			null,
			{"orderable": false}
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
$('#tableItem').DataTable({
             "columns": [         					
			{"orderable": false},
			null,
			null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
	
</script>

@stop