@extends('layout.maintenanceLayout')

@section('title')
Swap Request Completion
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">      
    
    </div>
   
    </div>
    <div class="col s8 push-s3" style="margin-top:-1%">
    <ul class="collection with-header">
	    <li class="collection-header">
	    	<div class="row">
	    		<div class="col s1">
	    			<div><h5 style="font-weight:bold;">Client: </div>
	    		</div>

	    		<div class="col s9">
	    			<div style="margin-left:10px;"><h5>Polytechnic University of the Philippines Sta Mesa Campus</h5></div>
	    		</div>	    		
					
				<div class="col s2">
					<button class="btn blue" style="margin-top:10px;" id="btnProceed">Proceed<i class="material-icons right">send</i></button>
				</div>
	    	</div>
	    </li>
			
		<li class="collection-header">
			<div class='row'>	
				<div class="col s4">
						<div><h5 style="font-weight:bold;">Guard to be Replaced:</div>
					</div>

					<div class="col s2">
						<div><h5>John Wall</h5></div>
					</div>
			</div>
		</li>

	    <li class="collection-item">
	    	<table class="striped white" style="border-radius:10px;" id="tableConfirmedGuard">
                    	   <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1 "></th>                                
                                <th class="grey lighten-1 ">Guard License</th>
                                <th class="grey lighten-1 ">Name</th>
                                <th class="grey lighten-1 ">Gender</th>
                            </tr>
                        </thead>
                        
                        <tbody>                        	
                            <tr>
								<td><button class="btn blue darken-4 buttonGuardDetails" id = ''><i class="material-icons">chevron_right</i></button></td>
								<td>321-123</td>
								<td>Klay Thompson</td>
								<td>Male</td>
							</tr>							
                        </tbody>
                    </table>
	    </li>
    </ul>
    </div>
</div>

<!--modal guard details-->
<div id="modalGuardDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:500px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Guard Details</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s12" style="margin-top:-30px;">      
				<ul class="collection with-header" id="collectionActive" >
					<div >							
					<li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								First Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Juan</div>
							</div>
							
							<div class="col s4">	
								Middle Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Test</div>
							</div>
							
							<div class="col s4">	
								Last Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Dela Cruz</div>
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
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large green  modal-close" name="action" style="margin-right: 30px;" id = "">OK		
		</button>
	</div>	
</div>
<!--modal guard details end-->

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