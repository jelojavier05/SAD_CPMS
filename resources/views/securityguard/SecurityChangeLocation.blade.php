@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Change Location
@endsection


@section('content')

<div class="row">
<div class="col l12">
    <div class="col l8 z-depth-3 white">
    
    
    <table class="responsive-table">
        <thead><center><bold>List of Clients and Assigned Guards</bold></center>
          <tr>
              <th data-field="id">Clients</th>
              <th data-field="name">Nature of Business</th>
             
              <th data-field="price">Business Address</th>
              <th data-field="price">Status</th>
              <th data-field="price">Others</th>
              
          </tr>
        </thead>

        <tbody>
         
            <tr>
            <td>SWA Company</td>
            <td>Steel Works</td>
          
            <td>212 Sagigilid St. Sta. Mesa, Manila</td>
            <td>
                <div class="switch">
    <label>
      <input type="checkbox">
      <span class="lever"></span>
    </label>
  </div>
                </td>
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
         <tr>
            <td>San Miguel Corp</td>
            <td>Eklabush</td>
        
            <td>521 Seses St. Makati City</td>
                            <td><div class="switch">
                                <label>
                                  
                                  <input type="checkbox">
                                  <span class="lever"></span>
                                  
                                </label>
                                </div></td>
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
                            <div class="switch">
                            <label>
                              
                              <input type="checkbox">
                              <span class="lever"></span>
                              
                            </label>
              </div>
                </td>
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
            <td><div class="switch">
    <label>
      
      <input type="checkbox">
      <span class="lever"></span>
      
    </label>
  </div></td>
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
            <td><div class="switch">
    <label>
      
      <input type="checkbox">
      <span class="lever"></span>
      
    </label>
  </div></td>
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
        
        <div class="card large">
        <table class="responsive-table">
            
            <th><center>Name</center>
              
            
            </th>
            
            <th><center>Profile</center>
           
            
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
   
      <!--END OF SELECT GUARD-->
    
    
    </div>
    
    <div class="col l12">
        
        <div class="card medium z-depth-3">
        
          <div class="row"></div>
                       <div class="row"></div>
                <div class="col l12">
                    <h4><center>Approval Form for Location Request Swapping</center>
                              </h4>
        
                </div>
                <div class="row"></div>
                <div class="col l5 offset-l2">
                    <label class="ft" for="ClientName">Client Name:</label><br>
                    <label class="ft" for="BAddress">Business Address:</label><br>
                    <label class="ft" for="TaggedGuard">Guard for Replacement:</label><br>
                    <label class="ft" for="GuardSwap">Guard to Swap:</label><br>
                    <label class="ft" for="RequestApprovedDate">Request Approved Date:</label><br> 
                    <label class="ft" for="EffDate" >Effectivity Date:</label>  
                 </div>

      <div class="row">
            
       
                <div class="col l12">
                    
                    
                    <div class="row">
                        <div class="col l12 offset-l4">
                                <div class="row"></div>
                      <a href="#!" class="btn blue darken-4 z-depth-3">Send</a>
                      <a href="#!" class="btn green darken-4 z-depth-3">Save</a>
                     <a href="#!" class="btn red darken-4 z-depth-3">Reset</a>
                
                    
                    </div>
                        </div>
                   
              
                 </div>
                            <div class="row"></div>
      
            </div>
                      
        </div>
        
                 
        

  
    </div>
    
    



</div>

<script>


    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>



@stop