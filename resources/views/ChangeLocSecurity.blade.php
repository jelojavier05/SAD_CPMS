@extends('CPMSLogin')


@section('content')


<div class="row">
<div class="col l12">
    <div class="col l6 offset-l3 z-depth-3" style="margin-top:4%">
    
    
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
    <p>
      <input name="group1" type="radio" id="test1" />
      <label for="test1">Red</label>
    </p>
    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">Yellow</label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test3"  />
      <label for="test3">Green</label>
    </p>
      <p>
        <input name="group1" type="radio" id="test4" disabled="disabled" />
        <label for="test4">Brown</label>
    </p>
  </form>
        
    
    
    
    </div>
    
    
    
    
    </div>



</div>

 

@stop