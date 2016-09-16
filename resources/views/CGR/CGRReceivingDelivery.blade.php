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
        <button class="btn green" name="" style="margin-right: 30px;" id = "btnReceive">OK</button>
      </div>
    </div>
  </div>
<!--Modal Delivery Detail End-->

<!--modal delivery swap-->
  <div id="modalSwapDeliveryDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:1000px;max-height:100%; height:650px; margin-top:-60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Delivery</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">
            <div>
              <li class="collection-item" style="font-weight:bold;">
                <div style="font-weight:normal;">
                  <div class='row'>
                    <div class="col s6">
                      <table class="" style="font-family:Myriad Pro" id = 'tableGunsReturned'>
  						<h5 class="red-text">Guns Returned</h5>
                        <thead>
                          <tr>                        
                          <th class="grey lighten-1">Serial Number</th>
                          <th class="grey lighten-1">Name</th>
                          <th class="grey lighten-1">Type of Gun</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
  				  
  				  <div class="col s6">
  					<table class="" style="font-family:Myriad Pro" id = 'tableGunsReplacement'>
  						<h5 class="green-text">Guns Replacement</h5>
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
        <button class="btn green" name="" style="margin-right: 30px;" id = "btnSwapRequestProceed">Proceed</button>
      </div>
    </div>
  </div>
<!--modal delivery swap end-->

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
      <button class="btn large green" name="action" style="margin-right: 30px;" id = "btnOkay">OK
      </button>
    </div>  
  </div>
<!-- sg login End -->

<!-- Reason Start-->
  <div id="modalReason" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
    <div class="modal-header">
      <div class="h">
        <h3><center>Reason</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s10 push-s1" style="margin-top:-30px;">      
          <div class="row"></div>  
          <div class="input-field col s12">
            <i class="material-icons prefix" style="font-size:35px;">account_circle</i>
            <input id="reason" type="text" class="validate" required="" aria-required="true">
            <label for="">Reason</label> 
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer" style="background-color: #00293C;">
      <button class="btn large red" name="action" style="margin-right: 30px;" id = "btnCancel">Cancel
      </button>

      <button class="btn large green" name="action" style="margin-right: 30px;" id = "btnReason">OK
      </button>
      
    </div>  
  </div>
<!-- Reason End -->

<!--modal cgr return gun-->
<div id="modalCgrReturnGun" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Guns</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header">					
			<li class="collection-item">
				<div class="row">
					<div class="col s12">
						<table class="" style=" border-radius:10px; width:100%;" id = 'tblReturnGuns'>
								<h5 class="red-text">Guns to be Returned</h5>
							  <thead>
								<tr>								
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
			</li>
          </ul>
			<div class="row"></div>
        </div>
      </div>
    </div>
    <!-- button -->
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn green waves-effect" id = "btnReturnGunProceed" style="margin-right: 30px;">Proceed</button>
    </div>
  </div>
<!--modal cgr return gun end-->
@stop

@section('script')

<script>
$(document).ready(function(){
  refreshTableDelivery();
  var arrItemDelivery;
  var arrItemPost = [];
  var arrItemStatus= [];
  var arrGunRemove;
  var tableItem = $('#tableItem').DataTable();
  var tableDelivery = $('#tableDelivery').DataTable();
  var boolModalReasonChecker;
  var intDeliveryID;
  var deliveryType;

  tableDelivery.on('click', '.buttonVerify', function(){
    intDeliveryID = this.id;
    deliveryType = this.value;
    swal({    
      title: "Delivery Code.",   
      text: "Enter the delivery code.",   
      type: "input",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      animation: "slide-from-top"
    }, 
      function(inputValue){     
        if (isDeliveryCodeCorrect(inputValue) == false) {     
          swal.showInputError("Check your code.");     
          return false;
        }else{
          this.closeOnConfirm = true; //close swal.

          if (deliveryType == 0){
            $('#modalDeliveryDetails').openModal();
            refreshTableItem();
          }else if (deliveryType == 1){
            $('#modalSwapDeliveryDetails').openModal();
            refreshTableSwapGun();
          }else if (deliveryType == 2){
            $('#modalCgrReturnGun').openModal();
            removeGunTable();
          }
        }
      });
  });//button verify

  tableDelivery.on('click', '.buttonVerified', function(){
  });

  $('#btnReceive').click(function(){
    getCheckedItem();
    $('#reason').val('');
    if (boolModalReasonChecker){
      $('#modalLogin').openModal();  
    }else{
      $('#modalReason').openModal();
    }
  });

  $('#btnReason').click(function(){
    if ($('#reason').val() != ''){
      $('#modalLogin').openModal();
      $('#modalReason').closeModal();
    }else{
      confirm('wala');
    }
  });

  $('#btnCancel').click(function(){
    $('#modalReason').closeModal();
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
            if (deliveryType == 0){
              addGunDatabase();
            }else if (deliveryType == 1){
              swapGunDatabase();
            }else if (deliveryType == 2){
              removeGunDatabase();
            }
            
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
        console.log(data);
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
            deliveryButton = '<button class="btn blue darken-4 buttonVerify" type="button" id = "'+value.intGunDeliveryHeaderID+'" value = "'+value.tinyintType+'">Verify</button>';
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

  function isDeliveryCodeCorrect(input){
    var checker;
    $.ajax({
      type: "GET",
      url: "/cgrreceivingdelivery/get/deliverycode?id=" + intDeliveryID,
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

  // additional gun Start
    function refreshTableItem(){
      $.ajax({
        type: "GET",
        url: "/cgrreceivingdelivery/get/deliverydetail?id=" + intDeliveryID,
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
      boolModalReasonChecker = true;
      arrItemPost = [];
      arrItemStatus = [];
      $('#username').val('');
      $('#password').val('');

      $.each(arrItemDelivery, function(index,value){
        var boolStatus;
        
        if ($('#checkbox' + value.intGunDeliveryDetailID).is(':checked')){
          boolStatus = 1;
        }else{
          boolStatus = 0;
          boolModalReasonChecker = false;
        }
        arrItemPost.push($('#checkbox' + value.intGunDeliveryDetailID).val());
        arrItemStatus.push(boolStatus);
      });//for each

    }//get checked item

    function addGunDatabase(){
      $.ajax({
        type: "POST",
        url: "{{action('CGRReceivingDeliveryController@postItem')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            arrItemPost:arrItemPost,
            arrItemStatus:arrItemStatus,
            reason:$('#reason').val(),
            deliveryID: intDeliveryID,
            deliveryType: 0
        },
        success: function(data){
          swal({
              title: "Success!",
              text: "Delivery Received!",
              type: "success"
            },
            function(){
              window.location.href = '{{ URL::to("/cgrreceivingdelivery") }}';
            });

        },
      });//ajax
    }
  // additional gun End

  // swap gun start
    function refreshTableSwapGun(){
      $.ajax({
        type: "GET",
        url: "/cgrreceivingdelivery/get/swapRequestGunInformation?deliveryID=" + intDeliveryID,
        success: function(data){
          var tableReturn = $('#tableGunsReturned').DataTable();
          var tableDeliver = $('#tableGunsReplacement').DataTable();
          arrItemDelivery = data.gunDeliver;

          tableReturn.clear().draw();
          tableDeliver.clear().draw();

          var serialNumber;
          var gunName;
          var typeOfGun;
          var rounds;
          var checkbox;
          arrGunRemove = [];
          $.each(data.gunRemove, function(index,value){
            serialNumber = '<h>' + value.strSerialNumber + '</h>';
            gunName = '<h>' + value.strGunName + '</h>';
            typeOfGun = '<h>' + value.strTypeOfGun + '</h>';
            arrGunRemove.push(value.intGunID);
            tableReturn.row.add([
              serialNumber, 
              gunName,
              typeOfGun
            ]).draw();
          });//foreach remove

          $.each(data.gunDeliver, function(index,value){
            serialNumber = '<h>' + value.strSerialNumber + '</h>';
            gunName = '<h>' + value.strGunName + '</h>';
            typeOfGun = '<h>' + value.strTypeOfGun + '</h>';
            rounds = '<h>' + value.intRounds + '</h>';
            checkbox = '<input type="checkbox" id="checkbox'+value.intGunDeliveryDetailID+'" value="'+value.intGunDeliveryDetailID+'"><label for="checkbox'+value.intGunDeliveryDetailID+'"></label>';

            tableDeliver.row.add([
              checkbox,
              serialNumber, 
              gunName,
              typeOfGun,
              rounds
            ]).draw();
          });//foreach remove
        },
        error: function(data){
          var toastContent = $('<span>Error Database.</span>');
          Materialize.toast(toastContent, 1500,'red', 'edit');
        },async:false
      });//ajax
    }

    function swapGunDatabase(){
      $.ajax({
        type: "POST",
        url: "{{action('CGRReceivingDeliveryController@postItem')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            arrItemPost:arrItemPost,
            arrItemStatus:arrItemStatus,
            reason:$('#reason').val(),
            deliveryID: intDeliveryID,
            deliveryType: 1,
            arrGunRemove: arrGunRemove
        },
        success: function(data){
          swal({
              title: "Success!",
              text: "Delivery Received!",
              type: "success"
            },
            function(){
              window.location.href = '{{ URL::to("/cgrreceivingdelivery") }}';
            });

        },
      });//ajax
    }

    $('#btnSwapRequestProceed').click(function(){
      $('#reason').val('');
      getCheckedItem();
      if (boolModalReasonChecker){
        $('#modalLogin').openModal();  
      }else{
        $('#modalReason').openModal();
      }
    });
  // swap gun end

  $('#btnReturnGunProceed').click(function(){
    $('#modalLogin').openModal();
  });

  function removeGunTable(){
    $.ajax({
      type: "GET",
      url: "/cgrreceivingdelivery/get/removeGunDeliveryInformation?deliveryID=" + intDeliveryID,
      success: function(data){
        console.log(data);

        var table = $('#tblReturnGuns').DataTable();
        table.clear().draw();

        $.each(data, function(index, value){
          table.row.add([
            '<h>' + value.strSerialNumber + '</h>',
            '<h>' + value.strGunName + '</h>',
            '<h>' + value.strTypeOfGun + '</h>',
            '<h>' + value.intRound + '</h>',
          ]).draw();
        });
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');

      }
    });//ajax
  }

  function removeGunDatabase(){
    $.ajax({
      type: "POST",
      url: "{{action('CGRReceivingDeliveryController@postRemoveGunDelivery')}}",
      beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
      data: {
        deliveryID: intDeliveryID
      },
      success: function(data){
        swal({
        title: "Success!",
        text: "",
        type: "success"
      },
        function(){
          refreshTableDelivery();
          $('#modalCgrReturnGun').closeModal();
          $('#modalLogin').closeModal();
      });

      },  
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');
      }
    });//ajax
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
	
    $('#tableGunsReturned').DataTable({
             "columns": [         								
			null,
			null,
			null,
            ] ,  
			"pageLength":3,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
	
    $('#tableGunsReplacement').DataTable({
             "columns": [         					
			{"orderable": false},
			null,
			null,
			null,
			null
            ] ,  
			"pageLength":3,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
	
	   $('#tblReturnGuns').DataTable({
               "columns": [         								
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
