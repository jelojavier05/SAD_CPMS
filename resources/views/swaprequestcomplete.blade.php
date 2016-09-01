@extends('layout.maintenanceLayout')

@section('title')
Swap Request Completion
@endsection

@section('content')



<div class="row">
	<div class="col s10 push-s2" >
		<div class="col s12">
			<ul class="collection with-header" style="height:70px;">
				<li class="collection-header">
					<div class="row">
						<div class='col s4'>
							<h5 class="blue-text" style="font-weight:bold;">Guard Replacement</h5>
						</div>
						
						<div class="col s1">
							<div><h5 style="font-weight:bold;">Client: </div>
						</div>

	    				<div class="col s3">
	    					<div><h5>LandBank</h5></div>
	    				</div>	    		
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="row" >
	<div class="col s10 push-s2" style="margin-top:-30px;">
		<div class="col s6">									      
			<ul class="collection with-header" id="collectionActive" >
				<div >
					<li class="collection-header grey lighten-1"><h5 class='red-text' style="font-weight:bold;">Guard Removed</h5></li>
					<li class="collection-item grey lighten-2" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								First Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Klay</div>
							</div>
							
							<div class="col s4">	
								Middle Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Test</div>
							</div>
							
							<div class="col s4">	
								Last Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Thompson</div>
							</div>
														
						</div>
						
						<div class="row">
							<div class="col s12">
								Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;123 TY Street Muntinlupa Metro Manila</div>
							</div>																					
						</div>
						
						<div class="row">
							<div class="col s6">
								Place of Birth:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Makati City</div>
							</div>
							
							<div class="col s6">
								Age:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;20</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Contact Number (Mobile):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
							
							<div class="col s6">
								Contact Number (Landline):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;8123456</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Gender:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Male</div>
							</div>
							
							<div class="col s6">
								Civil Status:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Single</div>
							</div>
						</div>
						
					</li>
                                      
				</div>
			</ul>								
		</div>
		
		<div class='col s6'>
			<ul class="collection with-header" id="collectionActive" >
				<div >
					<li class="collection-header grey lighten-1"><h5 class='green-text' style="font-weight:bold;">Guard Replacement</h5></li>
					<li class="collection-item grey lighten-2" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								First Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Paul</div>
							</div>
							
							<div class="col s4">	
								Middle Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Test</div>
							</div>
							
							<div class="col s4">	
								Last Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;George</div>
							</div>
														
						</div>
						
						<div class="row">
							<div class="col s12">
								Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;123 Hey Street Mandaluyong Metro Manila</div>
							</div>																					
						</div>
						
						<div class="row">
							<div class="col s6">
								Place of Birth:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Makati City</div>
							</div>
							
							<div class="col s6">
								Age:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;30</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Contact Number (Mobile):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
							
							<div class="col s6">
								Contact Number (Landline):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;8123456</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Gender:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Male</div>
							</div>
							
							<div class="col s6">
								Civil Status:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Single</div>
							</div>
						</div>
						
					</li>
                                      
				</div>
			</ul>					
		</div>
	</div>
</div>


<!--btn proceed-->
<div class="row">
	<div class="col s4 push-s6" style="margin-top:-10px;">
		<button class="btn-large blue">Proceed<i class='material-icons right'>send</i></button></div>
</div>



@stop
	
@section('script')
<script>
	$("#tableConfirmedGuard").DataTable({             
 	"columns": [     
 	{"orderable": false},
 	null,
 	null,
 	null,
 	] ,  
 	"bPaginate": false,
	"bLengthChange": false,
	"bFilter": false,
	"bInfo": false
	});
</script>
@stop