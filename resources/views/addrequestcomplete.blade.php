@extends('layout.maintenanceLayout')

@section('title')
Add Request Completion
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Guards</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2 animated fadeIn">
<!--            <div class="row">-->
               

                <div class="col s6 offset-s9">
                <button style="margin-top: 30px;" id="btnProceed" class=" z-depth-2 btn-large blue " >
                     Proceed<i class="material-icons right">send</i>
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="striped white" style="border-radius:10px;" id="tableConfirmedGuards">
                        <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1 "></th>                                
                                <th class="grey lighten-1 ">Guard License</th>
                                <th class="grey lighten-1 ">Name</th>
                                <th class="grey lighten-1 ">Gender</th>
								<th class="grey lighten-1">Address</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
							
								<td><button class="btn blue darken-4 buttonGuardDetails"><i class="material-icons">chevron_right</i></button></td>
								<td>2013-12345-MN-0</td>
								<td>Stephen Curry</td>
								<td>Male</td>
								<td>123 Hello Street Pasig Metro Manila</td>
								
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
								First Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Jason</div>
							</div>
							
							<div class="col s4">	
								Middle Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Rivera</div>
							</div>
							
							<div class="col s4">	
								Last Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Paredes</div>
							</div>
														
						</div>
						
						<div class="row">
							<div class="col s12">
								Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;123 Hello Street Pasig, Metro Manila</div>
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
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large green  modal-close" name="action" style="margin-right: 30px;" id = "">OK		
		</button>
	</div>	
</div>
<!--modal guard details end-->

@stop


@section('script')
<script>
$("#tableConfirmedGuards").DataTable({             
 "columns": [     
 {"orderable": false},
 null,
 null,
 null,
 null
 ] ,  
 "pageLength":5,
 "lengthMenu": [5,10,15,20],		
});

 $('#tableConfirmedGuards').on('click', '.buttonGuardDetails', function(){
	$('#modalGuardDetails').openModal(); 
 });
	
$("#btnProceed").click(function(){

	swal({   title: "Confirm Password",
			text: "Please Enter Password",
			type: "input",
			inputType: "password",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Enter Password"
            })
});
</script>
@stop