@extends('layout.maintenanceLayout')

@section('title')
Guard Transfer History
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2" style="margin-top:-25px;">
		<div class="row">
			<div class="col s5">
				<div class="container-fluid grey lighten-2 z-depth-2 animated fadeInUp" style="border-radius: 10px; margin-top:10px; padding-left:2%;padding-right:2%;">
					<h4 class="blue-text">Guards</h4>
					<div class="row">
						<div class="col s12" style="margin-top:0px;">
							<table class="striped grey lighten-1" style="" id="tblGuards">
								<thead>
									<tr>
										<th>ID</th>
										<th>Guard License</th>
										<th>Name</th>
										<th style="width:50px;"></th>
									</tr>
								</thead>
								<tbody>								
									<tr>
										<td>1</td>
										<td>123-321</td>
										<td>Jason Kidd</td>
										<td>
											<button class=" btn blue btnMore col s12" id="">View</button>
										</td>
									</tr>
									
									<tr>
										<td>1</td>
										<td>123-321</td>
										<td>Jason Kidd</td>
										<td>
											<button class=" btn blue btnMore col s12" id="">View</button>
										</td>
									</tr>
									
									<tr>
										<td>1</td>
										<td>123-321</td>
										<td>Jason Kidd</td>
										<td>
											<button class=" btn blue btnMore col s12" id="">View</button>
										</td>
									</tr>
									
									<tr>
										<td>1</td>
										<td>123-321</td>
										<td>Jason Kidd</td>
										<td>
											<button class=" btn blue btnMore col s12" id="">View</button>
										</td>
									</tr>
									
									<tr>
										<td>1</td>
										<td>123-321</td>
										<td>Jason Kidd</td>
										<td>
											<button class=" btn blue btnMore col s12" id="">View</button>
										</td>
									</tr>
									
									<tr>
										<td>1</td>
										<td>123-321</td>
										<td>Jason Kidd</td>
										<td>
											<button class=" btn blue btnMore col s12" id="">View</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col s7" style="margin-top:10px;">
				<ul class="collection with-header animated fadeInUp sidenavhover" style="max-height:550px;">
					<li class="collection-header"><h5 style="font-weight:bold;">Personal Information</h5></li>
					<li class="collection-item">
						<div class='row'>
							<div class='col s4' style="font-weight:bold;">
								First Name:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;Kawhi</div>
							</div>
					
							<div class='col s4' style="font-weight:bold;">
								Middle Name:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;Test</div>
							</div>
					
							<div class='col s4' style="font-weight:bold;">
								Last Name:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;Leonard</div>
							</div>
						</div>
					</li>
		  
					<li class="collection-item" style="font-weight:bold; ">License Number:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;122-221</div>
					</li>
		  	
					<li class="collection-item" style="font-weight:bold; ">Address:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;321 Bye Street</div>
					</li>		  		  	  
		  
					<li class="collection-item" style="font-weight:bold; ">Place of Birth:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;Pasig City</div>
					</li>
		  
					<li class="collection-item">
						<div class='row'>
							<div class='col s4' style="font-weight:bold;">
								Age:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;31</div>
							</div>
					
							<div class='col s4' style="font-weight:bold;">
								Gender:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;Male</div>
							</div>
					
							<div class='ol s4' style="font-weight:bold;">
								Civil Status:<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;Single</div>
							</div>
						</div>
					</li>
		  
					<li class="collection-item">
						<div class='row'>
							<div class='col s6' style="font-weight:bold;">
								Contact Number (Mobile):<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
					
							<div class='col s6' style="font-weight:bold;">
								Contact Number (Landline):<div style="font-weight:normal;" id = "">&nbsp;&nbsp;&nbsp;8123456</div>
							</div>										
						</div>
					</li>
					
					<li class="collection-header">
						<table class="striped grey lighten-1" id="tblLog">
							<h5 style="font-weight:bold;">Transfer History</h5>
							<thead>
								<th>Date</th>
								<th>Status</th>
								<th>Client</th>
							</thead>
							
							<tbody>
								<tr>
									<td>12/12/12</td>
									<td>Test</td>
									<td>Jollibee Pilar</td>
								</tr>
								<tr>
									<td>12/12/12</td>
									<td>Test</td>
									<td>Jollibee Pilar</td>
								</tr>
								<tr>
									<td>12/12/12</td>
									<td>Test</td>
									<td>Jollibee Pilar</td>
								</tr>
								<tr>
									<td>12/12/12</td>
									<td>Test</td>
									<td>Jollibee Pilar</td>
								</tr>
								<tr>
									<td>12/12/12</td>
									<td>Test</td>
									<td>Jollibee Pilar</td>
								</tr>
								<tr>
									<td>12/12/12</td>
									<td>Test</td>
									<td>Jollibee Pilar</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>
			</div>
		</div>
		
		
		
	</div>
</div>
@stop

@section('script')
<script>
$(document).ready(function(){
	$("#tblGuards").DataTable({
		"columns": [
			null,
			null,
			null,
			{ "orderable": false },
		] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]
	});
	
	$("#tblLog").DataTable({
				 "columns": [
				null,
				null,
				null
				] ,  
				"pageLength":5,
				"bLengthChange": false,
				"bFilter": false
			});
});

</script>

@stop