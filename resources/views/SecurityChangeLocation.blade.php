@extends('SecurityGuardDashboard')

@section('title')
Security Change Location
@endsection


@section('content')

<div class="row">
<div class="col l12">
    <div class="col l12 z-depth-3 white">
    
    
    <table class="responsive-table">
        <thead><center><bold>List of Clients and Assigned Guards</bold></center>
          <tr>
              <th data-field="id">Clients</th>
              <th data-field="name">Nature of Business</th>
              <th data-field="price">Location</th>
              <th data-field="price">Business Address</th>
              <th data-field="price">Status</th>
              <th data-field="price">Others</th>
              
          </tr>
        </thead>

        <tbody>
         
            <tr>
            <td>SWA Company</td>
            <td>Steel Works</td>
            <td>Manila</td>
            <td>212 Sagigilid St. Sta. Mesa, Manila</td>
            <td>
                <div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
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
            <td>Makati</td>
            <td>521 Seses St. Makati City</td>
                            <td><div class="switch">
                                <label>
                                  Off
                                  <input type="checkbox">
                                  <span class="lever"></span>
                                  On
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
            <td>Manila</td>
            <td>Anonas, Maynila, Kalakhang Maynila</td>
            <td>
                            <div class="switch">
                            <label>
                              Off
                              <input type="checkbox">
                              <span class="lever"></span>
                              On
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
            <td>Pasay</td>
            <td>529 blk.1 Pasay City</td>
            <td><div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
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
            <td>Mandaluyong</td>
            <td>35103 St. Barangka Mandaluyong City</td>
            <td><div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
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
    
    
<!--    <div class="col l4">
   <form action="#">
       <div class="z-depth-3 white">
           <div class="row"></div>
           <label><bold><center><h5>SELECT GUARD</h5></center></bold></label><br>

           <hr>
           <label>Select one (1) guard to be swapped</label>
           
                         <form action="#">
    <p>
      <input class="with-gap" name="group1" type="radio" id="test1" />
      <label for="test1">Randy</label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test2" />
      <label for="test2">Michael</label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test3"  />
      <label for="test3">Bernie</label>
    </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="test4"/>
        <label for="test4">Anson</label>
    </p>
         <p>
      <input class="with-gap" name="group1" type="radio" id="test5"  />
      <label for="test5">Eden</label>
    </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="test6"/>
        <label for="test6">Carlito</label>
    </p>
                                <p>
        <input class="with-gap" name="group1" type="radio" id="test7"/>
        <label for="test7">Romnick</label>
    </p>
         <p>
      <input class="with-gap" name="group1" type="radio" id="test7"  />
      <label for="test8">Green</label>
    </p>
      <p>
        <input class="with-gap" name="group1" type="radio" id="test9"/>
        <label for="test9">Joe</label>
    </p>
  </form>
       </div>
       
  </form>
        
        </div>
      <!--END OF SELECT GUARD-->
    
    
    </div>
    
    <div class="col l12">
        
        <div class="col l6 z-depth-3">
        
          <div class="row"></div>
                       <div class="row"></div>
                <div class="col l10">
            <label class="ft1">Approval Form for Location Request Swapping</label>
        
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

      <div class="row"></div>
                       <div class="row"></div>
        </div>
        
                  <div class="col l3">
                        <div class="row"></div>
                       <div class="row"></div>
                        <div class="row"></div>
                       <div class="row"></div>
                <div class="row"></div>
                      <div class="col l12">
                <div class="col l12">
                    <div class="row">
                        <div class="col l12">
                                
                      <a href="#!" class="btn blue darken-4 z-depth-3">Send</a>
                     <a href="#!" class="btn red darken-4 z-depth-3">Reset</a>
                
                    
                    </div>
                        </div>
                   
                    <center><a href="#!" class="btn green darken-4 z-depth-3">Save</a></center> 
                 </div>
                            <div class="row"></div>
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