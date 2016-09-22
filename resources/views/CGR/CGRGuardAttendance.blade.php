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

  <div class="col s1" style="margin-left:30%; margin-top:1%">
        <style type="text/css">
                    .clockStyle {
                        font-size: 50px;
                        margin: 0 auto;
                        padding: 10px;
                        color: #000000;
                        font-weight: bold;
                        text-align: center;
                        padding:2px;
                        color:white;
                        background-color:dodgerblue;
                        width:120px;
                        display:inline-block;
                        clear:both;
                        width:300px;
                        height: 70px;
                        border-radius: 5%;
                        box-shadow: 0 4px 4px 0 rgba(50, 50, 50, 0.4);
                    }
                </style>

                <div id="clockDisplay" class="clockStyle"> 08 : 08 : 08 PM </div>
                <script type="text/javascript">
                    function renderTime() {
                        var currentTime = new Date();
                        var diem = "AM";
                        var h = currentTime.getHours();
                        var m = currentTime.getMinutes();
                        var s = currentTime.getSeconds();

                        if (h == 0) {
                            h=12;
                        } else if (h > 12) {
                            h = h - 12;
                            diem = "PM";
                        }
                        if (h < 10) {
                            h = "0" + h;
                        }
                        if (m < 10) {
                            m = "0" + m;
                        }
                        if (s < 10) {
                            s = "0" + s;
                        }

                        var myClock = document.getElementById('clockDisplay');
                        myClock.textContent = h + ":" + m + ":" + s + " " + diem
                        myClock.innerText = h + ":" + m + ":" + s + " " + diem;	
                        setTimeout('renderTime()',1000);
                    }
                    renderTime();
                </script>
    
  </div>
</div>
<!-- Title End -->

<!-- Guard Table Start-->
<div class="row">
  <div class="col s12 push-s2">
    <div class="col s6 grey lighten-2" style=";max-height:690px; margin-top:-25px;">
      <table class="centered" id="tableAttendance">
        
          
          
                 
          
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
		<table style="border: 1px solid black; " id = 'tableAttendanceLog'>
		
			<thead>
        <tr>
          <th>Name</th>
          <th>Action</th>
          <th>DateTime</th>
        </tr>
			</thead>
			
			<tbody style=" min-height:200px; max-height:200px;">
				
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
              refreshAttendanceLog();
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
		swal("Ooops!", "Error Occured!", "warning");
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
		swal("Ooops!", "Error Occured!", "warning");
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
      var dataTable = $('#tableAttendanceLog').DataTable();
      dataTable.clear().draw(); //clear all the row

      $.each(data, function(index, value){
        var identifier = value.identifier;
        var action;
        if (identifier == 0){
          action = 'OUT';
        }else{
          action = 'IN';
        }
        dataTable.row.add([
            '<h>' + value.guardName +'</h>',
            '<h>' + action +'</h>',
            '<h>' + value.dateTime +'</h>',
        ]).draw(false);

        console.log(value);
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

$("#tableAttendanceLog").DataTable({
  "columns": [
  null,
  null,
  null
  ] ,  
  "pageLength":5,
  "lengthMenu": [5,10,15,20],
  "order": [[2, "desc"]]
});
</script>

@stop