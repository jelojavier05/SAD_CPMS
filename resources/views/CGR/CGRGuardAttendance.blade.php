@extends('CGR.CGRMain')
@section('title')
Guard Attendance
@endsection

@section('content')

<!-- Title Start -->
<div class="row">
  <div class="col s5 push-s3" style="margin-left:-2%">
    <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:7%">Security Guard Attendance</h3>
  </div>
</div>
<!-- Title End -->

<!-- Guard Table Start-->
<div class="row">
  <div class="col s12 push-s1">
    <div class="col s6 offset-s1 grey lighten-2" style=";max-height:690px; margin-top:-25px;">
      <table class="centered" id="tableAttendance">
		  <iframe src="http://free.timeanddate.com/clock/i5bt1d45/n145/tlph/fn6/fs15/fc222/tct/pct/ftb/bo2/tt0/tw0/th2/ta1/tb4" frameborder="0" width="143" height="40" allowTransparency="true" style="margin-left:70%; margin-top:10px;pointer-events:none;"></iframe>
        <thead>
          <tr>
            <th data-field="">SG License</th>
            <th data-field="">Name</th>
            <th data-field="">Action</th>
            <th>Time In</th>
          </tr>
        </thead>
        
        <tbody>
        </tbody>
      </table>
    </div>
	
	<div class='col s4 ' style="margin-top:-25px;">
		<table class="" style="border: 1px solid black; " id = 'tableAttendanceLog'>
		
			<thead class="tablescrollhead">
				<tr>
					<th class=""><h4>Attendance Logs</h4></th>
				</tr>
			</thead>
			
			<tbody class='tablescrollbody' style=" min-height:200px; max-height:200px;">
				
			</tbody>
		</table>
		<center><button class="btn blue" style="margin-top:10px;">Load More</button></center>
	</div> 
  </div>
</div>
<!-- Guard Table End -->
 
<!-- sg login Start-->
<div id="modalTime" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
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
  var btnInOut;
  var intGuardID;
  refreshTable();
  refreshAttendanceLog();

  
});

$('#tableAttendance').on('click', '.btnTimeIn', function(){
  buttonTimeClick(1, this.id);
});
	
$('#tableAttendance').on('click', '.btnTimeOut', function(){
  buttonTimeClick(0, this.id);
});

$('#btnOkay').click(function(){
  var username = $('#username').val().trim();
  var password = $('#password').val().trim();
  
  if (username != '' && password != ''){
    $.ajax({
        type: "POST",
        url: "{{action('CGRGuardAttendanceController@login')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            username:username,
            password:password,
            intGuardID: intGuardID
        },
        success: function(data){
            
            if (data){
              if (btnInOut == 1){
                timeIn();
              }else if (btnInOut == 0){
                timeOut();
              }
            }else{
              var toastContent = $('<span>Login failed.</span>');
              Materialize.toast(toastContent, 1500,'red', 'edit');    
            }
            refreshAttendanceLog();
        },
    });//ajax
  }else{
    var toastContent = $('<span>All fields are required.</span>');
    Materialize.toast(toastContent, 1500,'red', 'edit');
  }// if else checing input
});//button

function buttonTimeClick(value, id){
  $('#modalTime').openModal();            
  btnInOut = value;
  intGuardID = id;
  $('#username').val('');
  $('#password').val('');
}
function timeIn(){
  $.ajax({
    type: "POST",
    url: "{{action('CGRGuardAttendanceController@timeIn')}}",
    beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    },
    data: {
        intGuardID:intGuardID
    },
    success: function(data){
      refreshTable();
      swal("Success!", "Time in!", "success");
      $('#modalTime').closeModal();

    },
    error: function(data){
    }
  });//ajax
}

function timeOut(){
  $.ajax({
    type: "POST",
    url: "{{action('CGRGuardAttendanceController@timeOut')}}",
    beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    },
    data: {
        intGuardID:intGuardID
    },
    success: function(data){
      refreshTable();
      swal("Success!", "Time out!", "success");
      $('#modalTime').closeModal();

    },
    error: function(data){
    }
  });//ajax
}

function refreshTable(){
  $.ajax({
    type: "GET",
    url: "{{action('CGRGuardAttendanceController@getActiveGuard')}}",
    success: function(data){
      var dataTable = $('#tableAttendance').DataTable();
      dataTable.clear().draw(); //clear all the row
      $.each(data, function(index, value) {
        var strLicense = '<h>'+value.strLicenseNumber+'</h>';
        var strName = '<h>'+value.strFirstName+' '+value.strLastName+'</h>';
        var btnAction = '<button class="btn blue darken-4 btnTimeIn" type="button" id = '+value.intGuardID+' >Time In</button>';
        var strTimeIn = '';

        if (value.timeIn != null){
          strTimeIn = value.timeIn;
          btnAction = '<button class="btn red darken-4 btnTimeOut" type="button" id = '+value.intGuardID+'>Time Out</button>'
        }

        dataTable.row.add([
          strLicense,
          strName,
          btnAction,
          strTimeIn
        ]).draw();
      });//foreach
    },
  });//ajax
}

function refreshAttendanceLog(){
  $.ajax({
    type: "GET",
    url: "{{action('CGRGuardAttendanceController@attendanceLog')}}",
    success: function(data){
      $('#tableAttendanceLog tr').not(function(){ return !!$(this).has('th').length; }).remove();
      $.each(data, function(index, value){
        var identifier = value.identifier;
        var action;
        if (identifier == 0){
          action = 'OUT';
        }else{
          action = 'IN';
        }

        $('#tableAttendanceLog tr:last').after('<tr><td>'+value.guardName+' - ' +action+ ' - '+ value.dateTime +'</td></tr>');
      });
    }
  });//ajax
}
</script>

<script>
$("#tableAttendance").DataTable({
  "columns": [
  null,
  null,
  {"orderable": false},
  null
  ] ,  
  "pageLength":5,
  "lengthMenu": [5,10,15,20],
});
</script>

@stop