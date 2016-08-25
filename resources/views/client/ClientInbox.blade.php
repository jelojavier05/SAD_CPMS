@extends('client.ClientDashboard')
@section('title')
Inbox
@endsection


@section('content')

<!--Inbox-->
<div class="row"></div>
<div class="row">
	<div class="col s8 push-s3">
		
	  
          <div class="row" style="margin-top:-40px;"> 
                    <div class="col s12 push-s4">
                     <h3 style="font-family:Myriad Pro;margin-top:9.2%;color:#662E1C;font-weight:bold">MESSAGES</h3>
                    </div>  
               <hr>
          </div>	
		<!-- table message -->
		<div id="message">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="inboxTable">
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
						<tr>
							<td><input name="" type="radio" id="" checked/> <label for=""></label></td>
							<td><center><button class="btn blue darken-4 buttonRead" id=""><i class="material-icons">keyboard_arrow_right</i></button></center></td>
							<td>01/01/2016</td>
							<td>Mang Tomas</td>
							<td>Test</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!--Inbox End-->
@stop

@section('script')
<script>
$(document).ready(function(){
	
});

</script>

<script>
$("#inboxTable").DataTable({
     "columns": [         
	{"orderable": false},
	{"orderable": false},
	null,
	null,
	null,
    ] ,  
	"pageLength":5,
	"lengthMenu": [5,10,15,20],
	"bFilter" : false
});
</script>
@stop