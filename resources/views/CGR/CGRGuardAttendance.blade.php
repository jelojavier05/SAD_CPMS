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
  <div class="col l12">
    <div class="col l10 offset-l2 grey lighten-2" style=";max-height:690px; margin-top:-25px;">
      <table class="centered" id="dataTable">
		  <iframe src="http://free.timeanddate.com/clock/i5bt1d45/n145/tlph/fn6/fs15/fc222/tct/pct/ftb/bo2/tt0/tw0/th2/ta1/tb4" frameborder="0" width="143" height="40" allowTransparency="true" style="margin-left:80%; margin-top:10px;"></iframe>
        <thead>
          <tr>
            <th data-field="">SG License</th>
            <th data-field="">Name</th>
            <th data-field=""></th>
			<th>Time In</th>
            
          </tr>
        </thead>
        
        <tbody>
          <tr>
            <td>2013-12345-MN-0</td>
            <td>
              Son Goku
            </td>
            <td> 
				<div id="timeIn" >
				  <button class="btn waves-effect waves-light blue darken-4 btnTimeIn" type="button" name="">Time In					  
				  </button>
				</div>
				
				<div id="timeOut" style="display:none;">
					<button class="btn waves-effect waves-light red darken-4 btnTimeOut" type="button" name="">Time Out						
					</button>
				</div>
				
            </td>
			
			<td>12:20AM</td>
            
          </tr> 
        </tbody>
      </table>
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
					<input id="strCurrent" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Username</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Password</label> 
				</div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light green" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">OK
		</button>
	</div>	
</div>
<!-- sg login End -->


@stop

@section('script')

<script>
$(document).ready(function(){
  $.ajax({
    type: "GET",
    url: "{{action('CGRGuardAttendanceController@getActiveGuard')}}",
    success: function(data){
      console.log(data);
    },
  });//ajax
});
$('#dataTable').on('click', '.btnTimeIn', function(){
  $('#modalTime').openModal();            
});
	
$('#dataTable').on('click', '.btnTimeOut', function(){
  $('#modalTime').openModal();            
});
</script>

<script>
$("#dataTable").DataTable({
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