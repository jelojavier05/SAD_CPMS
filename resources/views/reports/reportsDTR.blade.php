@extends('layout.maintenanceLayout')

@section('title')
Guard Attendance
@endsection

@section('content')
<!--Tables-->
<div class="row">
		<div class="col s10 offset-s2" style="margin-top:-25px;">			
			<div class="row">
				<div class="col s6 offset-s6 pull-s6"><h4 class="blue-text" style="font-weight:bold;">Guard Attendance Log</h4></div>
				<div class="col s6" style="margin-top:25px;">
					<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
						<li class="collection-header blue-grey lighten-4">
							<table class="striped grey lighten-1" id="tblClients">
								<h5 class="blue-text" style="font-weight:bold;">Clients</h5>
								<thead>
									<th>ID</th>
									<th>Name</th>	
									<th></th>
								</thead>
								
								<tbody>
									<tr>
										<td>1</td>
										<td>Hello Resort and Spa</td>
										<td><button class="btn blue waves-effect" id="" >More</button></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
				</div>
				
				<div class="col s6" style="margin-top:25px;">
					<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
						<li class="collection-header blue-grey lighten-4">
							<table class="striped grey lighten-1" id="tblGuards">
								<h5 class="blue-text" style="font-weight:bold;">Guards</h5>							
								<thead>
									<th>License Number</th>
									<th>Name</th>	
									<th>DTR</th>
								</thead>
								
								<tbody>
									<tr>
										<td>123-321</td>
										<td>Damian Lillard</td>
										<td><button class="btn blue waves-effect" id="btnDTR"><i class="material-icons">access_time</i></button></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!--Tables End-->

<!--modal guard DTR-->
	<div id="modalGuardDTR" class="modal modal-fixed-footer ci" style="overflow:hidden; width:50% !important; margin-top:-40px !important;  max-height:100% !important; height:600px !important;">      
		<div class="modal-header">
			<div class="h">
				<h3 id = ''><center>Damian Lillard</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<ul class="collection with-header">													
						<li class="collection-header">
							<h5 class="blue-text bold">Attendance Logs</h5><span><button class="btn blue waves-effect right" id="" style="margin-top:-40px;">PRINT</button></span>
						</li>	
						<li class="collection-item">
							<div class="row">
								<div class="col s12">		
									<table class="striped white" id="tblDTR" style="width:100%;">
										<thead>
											<tr>
												<th class="grey ligten-1" style="width:50%;">From</th>
												<th class="grey ligten-1" style="width:50%;">To</th>												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>01/01/2016 12:12:12</td>
												<td>02/02/2016 01:01:01</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</li>
					</ul><div class="row"></div>
				</div>
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn waves-effect green right" name="action" style="margin-right:30px;" id = "btnOK">OK
			</button>
			
		</div>	
	</div>
<!--modal guard DTR end-->
@stop



@section('script')
<script>
$(document).ready(function(){								
	$("#tblClients").DataTable({
		"columns": [
			null,
			null,
			{"orderable":false}
		] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]
	});
			
	$("#tblGuards").DataTable({
		"columns": [
			null,
			null,
			{"orderable":false}
		] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]		
	});
			
	$("#tblDTR").DataTable({
		"columns": [			
			null,
			null
		] ,  
		"pageLength":3,
		"bLengthChange":false
	});
	
	$('#btnDTR').click(function(){
		$('#modalGuardDTR').openModal();
	});
});
</script>
@stop