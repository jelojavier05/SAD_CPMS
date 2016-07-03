@extends('CPMSLogin')


@section('content')

<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="row">
<div class="col l12 gray">
    <div class="col l6 offset-l3 z-depth-3">
    
    
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
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td></td>
            <td></td>
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
         <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td></td>
            <td></td>
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
            <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td></td>
            <td></td>
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
            <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td></td>
            <td></td>
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
            <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td></td>
            <td></td>
            <td>
                <div class="col l2">
                
                 <a href="#!" class="btn mdi-hardware-keyboard-arrow-right"></a>
                </div>
            </td>
          </tr>
            
        </tbody>
      </table>
    
        </div>

    
    <div class="col l3">
   <form action="#">
       <div class="card medium offset-l1 z-depth-3" style="margin-top:1%">
           
           <th data-field="price"><center><bold>Selection of Guard</bold></center></th>
           <hr>
           
           <p>
                <input class="with-gap" name="group1" type="radio" id="test4" />
                <label for="test4">Brown</label>
            </p>
            <p>
              <input class="with-gap" name="group1" type="radio" id="test1" />
              <label for="test1">Red</label>
            </p>
            <p>
              <input class="with-gap" name="group1" type="radio" id="test2" />
              <label for="test2">Yellow</label>
            </p>
            <p>
              <input class="with-gap" name="group1" type="radio" id="test3"  />
              <label for="test3">Green</label>
            </p>
              <p>
                <input class="with-gap" name="group1" type="radio" id="test4" />
                <label for="test4">Brown</label>
            </p>
       </div>
  </form>
        </div>
    </div>
    
    <div class="col l12">
        
        <div class="col l6 offset-l3 z-depth-3">
        
          <div class="row"></div>
                       <div class="row"></div>
                <div class="col l10 offset-l1">
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

 

@stop