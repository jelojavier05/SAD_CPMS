@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Settings
@endsection


@section('content')

<div class="row">			
	<div class="ci col s10 push-s1	" style="margin-top:25px;">	
		<ul class="collection with-header" id="collectionActive">
			<li class="collection-header" ><h4 style="font-weight:bold;">Details
					<a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue right tooltipped" id = 'btnEdit'><i class="material-icons">mode_edit</i></a></h4>
					<a  data-position="bottom" data-delay="50" data-tooltip="Change Password" class="btn blue tooltipped" id = 'btnPassword' style="margin-top:-84px; margin-left:550px;"><i class="material-icons">vpn_key</i></a></h4>
			</li>
				<div >
							
					<li class="collection-item" style="font-weight:bold;">First Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Juan</div>
					</li>
                    
                    <li class="collection-item" style="font-weight:bold;">Middle Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Hello</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Last Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Dela Cruz</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;123 Hello Street Las Pinas, Metro Manila</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Date of Birth:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;10/10/1995</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Place of Birth:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Makati City</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Contact Number (Mobile):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;09123456789</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Contact Number (Landline):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;8123456</div>
					</li>
							
					<li class="collection-item" style="font-weight:bold;">Civil Status:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Single</div>
					</li>
					
					<li class="collection-item" style="font-weight:bold;">Gender:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Male</div>
					</li>
					
					<li class="collection-item" style="font-weight:bold;">Body Attributes
						<div style="font-weight:normal;" id = ''>
							<table class="" style="font-family:Myriad Pro" id = 'shiftTable'>
                                <thead>
                                <tr>
                                    <th data-field="st">Name</th>
                                    <th data-field="fr">Specification</th>
                                    <th data-field="to">Measurement</th>
                                </tr>
                                </thead>
                                
                                <tbody>
									<td>Wingspan</td>
									<td>72</td>
									<td>inches</td>
                                </tbody>
                            </table>
						</div>
					</li>
				</div>
						
		</ul>
	</div>
</div>

<!---------------Modal Change Pass--------------------->
<div id="modalchangePassword" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:100px !important;  max-height:100% !important; height:350px !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Change Password</center></h3>  
				</div>

        	</div>
         
        
        	<div class="modal-content">
                    <div class="row">
                                               
                                  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
                            				<input id="" type="password" class="validate" name = "" required="" aria-required="true">
											<label for="">New Password</label> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
                            				<input id="" type="password" class="validate" name = "" required="" aria-required="true">
											<label for="">Confirm New Password</label> 

                                        </div>
                                  </div>
                            
                     </div>
	
 
        </div>
    <!-- Modal Button Save -->
		<div class="modal-footer" style="background-color: #00293C;">
            
                     <button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "">Save
                       <i class="material-icons right">send</i>
                     </button>
        </div>	
</div>

<!---------------Modal Change Pass End--------------------->

<!---------------Modal Edit Details--------------------->
<div id="modalchangeDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:900px !important; margin-top:-40px !important;  max-height:100% !important; height:620px !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Edit Details</center></h3>  
				</div>

        	</div>
         
        
        	<div class="modal-content">
                    <div class="row">
                                               
                                  <div class="col s4" >      
                                            
                                          
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
                            				<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="">First Name</label> 

                                        </div>
                                  </div>
						
								  <div class="col s4" >      
                                            
                                        
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
                            				<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="">Middle Name</label> 

                                        </div>
                                  </div>
						
								  <div class="col s4" >      
                                            
                                        
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
                            				<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="">Last Name</label> 

                                        </div>
                                  </div>
						
								  <div class="col s4">      
                                            
                                        
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">store</i>
                            				<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="">Address</label> 

                                        </div>
                                  </div>
                            
                     </div>
	
 
        </div>
    <!-- Modal Button Save -->
		<div class="modal-footer" style="background-color: #00293C;">
            
                     <button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSaveDetails">Save
                       <i class="material-icons right">send</i>
                     </button>
        </div>	
</div>
<!---------------Modal Edit Details End--------------------->



<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
	
	
    $('#btnPassword').click(function(){
     	$('#modalchangePassword').openModal();  
    });
	
	 $('#btnEdit').click(function(){
     	$('#modalchangeDetails').openModal();  
    });
	
	 $('#btnSaveDetails').click(function(){
     	swal({   title: "Confirmation",   
			  	 text: "Please Enter your Password",   
			  	 type: "input",
			     showCancelButton: true,   
			     closeOnConfirm: false,   
			     animation: "slide-from-top",   
			     inputPlaceholder: "Enter Password" 
			 }, 
			 function(inputValue){   
				if (inputValue === false) 
					return false;      
				if (inputValue === "") 
				{     
					swal.showInputError("Please Enter Password!");     
					return false   
				}  
    		});
	 });
</script>


@stop