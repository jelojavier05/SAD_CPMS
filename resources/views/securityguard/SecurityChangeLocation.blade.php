@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Change Location
@endsection


@section('content')

<div class="row">
<div class="col l12">
    <div class="col l8 z-depth-1 white" style="overflow:scroll !important;max-height:100% !important;height:460px !important">
    
    
    <table class="responsive-table">
        <thead><center><bold>List of Clients and Assigned Guards</bold></center>
          <tr>
              <th data-field="id">Clients</th>
              <th data-field="name">Nature of Business</th>
             
              <th data-field="price">Business Address</th>      
              <th data-field="price">Others</th>
              
          </tr>
        </thead>

        <tbody>
         
            <tr>
            <td>SWA Company</td>
            <td>Steel Works</td>
          
            <td>212 Sagigilid St. Sta. Mesa, Manila</td>
            
            <td>
                <div class="col l2">
                
                 <a href="#" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
         <tr>
            <td>San Miguel Corp</td>
            <td>Factory</td>
        
            <td>521 Seses St. Makati City</td>
                            
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
            <tr>
            <td>Polytechnic University of the Philippines</td>
            <td>University</td>
         
            <td>Anonas, Maynila, Kalakhang Maynila</td>
            
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
            <tr>
            <td>Santibanez Company</td>
            <td>Recruitment Agency</td>
            <td>529 blk.1 Pasay City</td>
            
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
            <tr>
            <td>Senyora Dede Pueblo</td>
            <td>Brick and Stones</td>
            <td>35103 St. Barangka Mandaluyong City</td>
            
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
        </tbody>
      </table>
    
        </div>

    <!-- SELECT GUARD-->
    
    
<div class="col l4">
       <div class="row">
        
            <div class="col l12 white z-depth-1">
                         <h5><center>List of Guards</center></h5>
            </div>
        </div>
            
        <div class="row">
             <div class="col l12 white z-depth-1" style="overflow:scroll !important;height:390px !important;max-height:100% !important">
                    <table class="responsive-table">

                        <th>
                            <center>Name</center>
                        </th>

                        <th>
                            <center>Profile</center>
                        </th>
                        
                        <tr>

                            <td>
                               <input class="with-gap" name="group1" type="radio" id="test1" />
                               <label for="test1">Randy</label>      
                            </td>
                            <td>

                                <div class="col s12 m8 offset-m2 l6 offset-l3">
                                        <div class="card-panel grey lighten-5 z-depth-1">
                                          <div class="row valign-wrapper">
                                            <div class="col l4">
                                             <img src="/img/avatar2.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                            </div>

                                          </div>
                                        </div>
                                </div>

                            </td>


                        </tr>

                        <tr>
                         <td>
                              <input class="with-gap" name="group1" type="radio" id="test2" />
                  <label for="test2">Michael</label>

                            </td>
                            <td>

                                        <div class="col s12 m8 offset-m2 l6 offset-l3">
                                        <div class="card-panel grey lighten-5 z-depth-1">
                                          <div class="row valign-wrapper">
                                            <div class="col l4">
                                             <img src="/img/avatar2.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                            </div>

                                          </div>
                                        </div>
                                      </div>

                                    </td>
                        </tr>

                            <tr>
                           <td>
                            <input class="with-gap" name="group1" type="radio" id="test3"  />
                  <label for="test3">Bernie</label>

                            </td>
                            <td>

                                        <div class="col s12 m8 offset-m2 l6 offset-l3">
                                        <div class="card-panel grey lighten-5 z-depth-1">
                                          <div class="row valign-wrapper">
                                            <div class="col l4">
                                             <img src="/img/avatar2.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                            </div>

                                          </div>
                                        </div>
                                      </div>

                                    </td>
                        </tr>
                        </table>
        
        
        
        </div>
    </div>
</div>
    
     <!--END OF SELECT GUARD-->
   
    <!--BUTTON APPROVAL FORM-->
    
    

    </div>
    
     <div class="row">
            <div class="col l12 push-l3">
         
                   <a href="#modalapproval" class="modal-trigger btn blue darken-4 z-depth-3">See Approval Form</a>
                   <a href="#!" class="btn red darken-4 z-depth-3">Reset</a>
                   <a href="#!" class="btn green darken-4 z-depth-3">Save</a>
            </div>
    
    
    </div>
   
    
    
    <!--MODAL APPROVAL-->
    
    <div id="modalapproval" class="modal modal-fixed-footer ci" style="overflow:hidden; width:75% !important; margin-top:100px !important;  max-height:100% !important; height:60% !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Approval Form for Location Request Swapping</center></h3>  
				</div>

            </div>
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="row">
                        <div class="col l12">
                            <div class="col l6">
                            
                                     <div class="col s10 push-s1">
                                              <div class="row"></div>
                                                    <div class="input-field col s12">
                                                         <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                            <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Client Name:</label> 
                                                    </div>
                                      </div>
                                     <div class="col s10 push-s1">
                                              <div class="row"></div>
                                                    <div class="input-field col s12">
                                                         <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                            <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Business Address:</label> 
                                                    </div>
                                      </div>
                                    <div class="col s10 push-s1">
                                              <div class="row"></div>
                                                    <div class="input-field col s12">
                                                         <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                            <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Request Approved Date:</label> 
                                                    </div>
                                      </div>

                            </div>
                            
                            
                            <div class="col l6">
                                
                                    <div class="col s10 push-s1">
                                          <div class="row"></div>
                                                <div class="input-field col s12">
                                                     <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                        <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                        <label for="">Guard For Replacement:</label> 
                                                </div>
                                  </div>
                                   <div class="col s10 push-s1">
                                          <div class="row"></div>
                                                <div class="input-field col s12">
                                                     <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                        <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                        <label for="">Reliever:</label> 
                                                </div>
                                  </div> 
                                  <div class="col s10 push-s1">
                                          <div class="row"></div>
                                                <div class="input-field col s12">
                                                     <i class="mdi-communication-business prefix" style="font-size:35px;"></i>
                                                        <input id="" type="text" class="validate" name = "" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                        <label for="">Effectivity Date:</label> 
                                                </div>
                                  </div>
                                 
                            
                            </div>
                        
                        </div>
                                
                              
                               
                                
                              <form class="col s10 push-s1">
                                <div class="row">
                                  <div class="input-field col s12">
                                    <input id="input_text" type="text" length="120">
                                    <label for="input_text">REASON</label>
                                  </div>
                                </div>
                              </form>
                    </div>
	
    		 
                					
	<!-- Modal Button Save -->
 
        </div>
    
      
  
    <div class="modal-footer" style="background-color: #00293C;">
        
                     <a href="#!" class="btn blue darken-4 z-depth-3">Send</a>
    </div>
</div>
    

</div>

<script>


    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>



@stop