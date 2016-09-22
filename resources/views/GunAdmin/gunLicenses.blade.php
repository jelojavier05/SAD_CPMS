@extends('layout.maintenanceLayout')

@section('title')
Gun Licenses
@endsection

@section('content')

<!-- Gun Table -->
  <div class="row" style="margin-top:-30px;">
    <div class="row"> 
      <div class="row">
        <div class="col s5 push-s3" style="margin-left:-2%">
          <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Gun Licenses</h3>
        </div>
      </div>
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
      <div class="container white lighten-2 z-depth-2" style="padding-left:2%;padding-right:2%;">
        <div class="col s6 offset-s9">
          <button style="margin-top: 30px;" id="btnRenew" class=" z-depth-1 btn-large blue" >
            <i class="material-icons left">refresh</i>Renew Licenses
          </button>
        </div>
        <div class="row">
          <div class="col s12" style="margin-top:10px;">
            <table class="striped white" style="border-radius:10px;" id="dataTable">
              <thead>
                <tr>
                  <th style="width:50px;" class="grey lighten-1"></th>                                
                  <th class="grey lighten-1">Serial No.</th>
                  <th class="grey lighten-1">Name</th>
                  <th class="grey lighten-1">Gun Type</th>
                  <th class="grey lighten-1">License No.</th>
                  <th class="grey lighten-1">Expiration Date</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Gun Table -->

<!--modal renew license-->
  <div id="modalRenewGunLicense" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:400px; margin-top:60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>License Renewal</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">
            <li class="collection-header" style="font-weight:bold;">
  			<div class="row">
  				<div class="col s6">
  					<label for="dateFrom">From</label>
  					<input type="date" placeholder="" id="dateFrom">
  				</div>
  				
  				<div class="col s6">
  					<label for="dateTo">To</label>
  					<input type="date" placeholder="" id="dateTo">
  				</div>
  			</div>
  		</li>         
          </ul>
        </div>
      </div>
    </div>
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn green waves-effect waves-light" name="" id = "btnGunLicenseOkay" style="margin-right: 30px;">OK
      </button>
    </div>
  </div>
<!--modal renew license end-->

@stop

@section('script')
<script>
$(document).ready(function(){
  var arrGun = [];
  var arrCheckedGun = [];

  $.ajax({
    type: "GET",
    url: "{{action('GunLicensesController@getGunToBeExpired')}}",
    success: function(data){
      var checkbox;
      var table = $('#dataTable').DataTable();
      table.clear().draw();
      arrGun = data;

      $.each(data, function (index, value){
        checkbox = '<input type="checkbox" id="checkbox'+value.intGunID+'" value = "'+value.intGunID+'"><label for="checkbox'+value.intGunID+'"></label>'
        table.row.add([
          checkbox,
          '<h>' + value.strSerialNumber + '</h>',
          '<h>' + value.strGunName + '</h>',
          '<h>' + value.strTypeOfGun + '</h>',
          '<h>' + value.strLicenseNumber + '</h>',
          '<h>' + value.dateExpiration + '</h>',
        ]).draw();
      });
    },
    error: function(data){
      var toastContent = $('<span>Error Database.</span>');
      Materialize.toast(toastContent, 1500,'red', 'edit');
    }
  });//ajax

  $("#btnRenew").click(function(){
    setGuardChecked();
    if (hasCheckedGun()){
      $("#modalRenewGunLicense").openModal();  
    }
  });

  $('#btnGunLicenseOkay').click(function(){
    if (checkDate()){
      $.ajax({
        type: "POST",
        url: "{{action('GunLicensesController@updateGunLicense')}}",
        beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');
          if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
        },
        data: {
          arrGunID: arrCheckedGun,
          dateFrom: $('#dateFrom').val(),
          dateTo: $('#dateTo').val(),
        },
        success: function(data){
          swal({
            title: "Success!",
            text: "Gun License Updated.",
            type: "success"
          },
          function(){
            window.location.href = '{{ URL::to("/gunLicenses") }}';
          });

        },
        error: function(data){
          var toastContent = $('<span>Error Database.</span>');
          Materialize.toast(toastContent, 1500,'red', 'edit');
        }
      });//ajax
    }
  });

  function setGuardChecked(){
    arrCheckedGun = [];
    $.each(arrGun, function(index, value){
      if ($('#checkbox' + value.intGunID).is(':checked')){
        arrCheckedGun.push(value.intGunID);
      }
    });
  }

  function hasCheckedGun(){
    if (arrCheckedGun.length > 0){
      return true;
    }else{
      var toastContent = $('<span>Please Choose Gun.</span>');
      Materialize.toast(toastContent, 1500,'red', 'edit');
      return false;
    }
  }

  function checkDate(){
    var dateTo = moment($('#dateTo').val());
    var dateFrom = moment($('#dateFrom').val());
    var now = moment();
    if (dateTo > now && moment($('#dateFrom').val()).isValid() && dateFrom < dateTo){
      return true;
    }else{
      var toastContent = $('<span>Check your input.</span>');
      Materialize.toast(toastContent, 1500,'red', 'edit');
      return false;
    }
  }

});
</script>

<script>

  $("#dataTable").DataTable({
    "columns": [
    {"searchable": false},			
    null,
    null,
    null,
    null,
    null
    ] ,  
    "pageLength":5,
    "lengthMenu": [5,10,15,20],
  });
</script>


@stop
