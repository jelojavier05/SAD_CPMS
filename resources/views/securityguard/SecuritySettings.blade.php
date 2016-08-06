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
					<a  data-position="bottom" data-delay="50" data-tooltip="Change Password" class="btn blue tooltipped" id = 'btnPassword' style="margin-top:-84px; margin-left:580px;"><i class="material-icons">vpn_key</i></a></h4>
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
<div id="modalchangePassword" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">
        
        
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
											<label for="">Current Password</label> 

                                        </div>
                                  </div>
						
								<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
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

<!--Modal Page Change Password End -->

<!---------------Modal Edit Details--------------------->
<div id="modalchangeDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:800px !important; margin-top:10px !important;  max-height:100% !important; height:550px !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Edit Details</center></h3>  
				</div>

        	</div>
         
        
        	<div class="modal-content sidenavhover " id="" style="overflow-x:hidden;" >
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
						
								  <div class="col s6">      
                                            
                                        
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">store</i>
                            				<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="">Address</label> 

                                        </div>
                                  </div>
						
								<div class="col s3">
									<div class=" input-field col s12">
											<select>
												<option selected disabled>Choose Province</option>
												<option>hello</option>
											</select>
									</div>
								</div>
						
								<div class="col s3">
									<div class=" input-field col s12">
											<select>
												<option selected disabled>Choose City</option>
												<option>hello</option>
											</select>
									</div>
								</div>
						
								<div class="col s6">
									<div class="input-field col s12">
										<i class="material-icons prefix" style="font-size:35px; color:#64b5f6;">star</i>
										<input type="date" id="dateOfbirth" class="datepicker"/>
										<label class="active" for="dateOfbirth">Date of Birth</label>
									</div>
									
								</div>
						
								<div class="col s6" >      
                                            
                                        
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">star</i>
                            				<input placeholder=" " id="" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="">Place of Birth</label> 

                                        </div>
                                  </div>
						
								<div class="col s6">
									<div class="input-field col s12">
										<i class="material-icons prefix" style="font-size: 35px;">smartphone</i>
										<input placeholder=" " id="" type="text" class="validate" name="" required="" aria-required="true"/>
										<label for="">Contact Number (Mobile)</label>
									</div>
								</div>
						
						
								<div class="col s6">
									<div class="input-field col s12">
										<i class="material-icons prefix" style="font-size: 35px;">phone</i>
										<input placeholder=" " id="" type="text" class="validate" name="" required="" aria-required="true"/>
										<label for="">Contact Number (Landline)</label>
									</div>
								</div>
						
								<div class="col s4 push-s2">
									<select id="" >
										<option selected disabled>Civil Status</option>
										<option>Single</option>
										<option>Married</option>
										<option>Widowed</option>									
									</select>
								</div>
								
								<div class="col s4 push-s2">
									<select id="" >
										<option selected disabled>Gender</option>
										<option>Male</option>
										<option>Female</option>																			
									</select>
								</div>
						
								<div class="input-field col s10 push-s1 ci">                    
									<h5>Body Attributes:</h5>					
									<div class="row">						
										<div class="col s12">												
											<table class="striped white ci">								
												<thead>									
													<tr>										
														<th><center>Name</center></th>										
														<th><center>Specification</center></th>                                        
														<th><center>Measurement</center></th>									
													</tr>								
												</thead>								
												<tbody>                                    			                        
													<tr>                                        
														<td style="height:-10px !important;"><center>                                            
															<div  id = "">Wingspan</div></center>                                        
														</td>                                        
														<td style="height:-10px !important;"><center>                    
															<input  id="" type="text" class="validate" pattern="[A-za-z0-9.,' ]{1,}" size="1" required="" aria-required="true" value="1">                                                
															</center>                                                             
														</td>                                        
														<td style="height:-10px !important;"><center>                                            
															<div  id = "">Inches</div></center>                                        
														</td>                                    
													</tr>                                    
												</tbody>							
											</table>						
										</div>					
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