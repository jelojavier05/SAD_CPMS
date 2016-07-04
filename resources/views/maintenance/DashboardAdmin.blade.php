@extends('layout.maintenanceLayout')

@section('title')
Admin
@endsection

@section('content')

  <div class="row">

      
      <div class="col l12">
      
          
                <!--TOTAL REQUESTS--> 
          <div class="col l3 offset-l3">
        <div class="card medium grey lighten-5">
          <div class="row valign-wrapper">
            <div class="col l2 offset-l2">
                <i class="material-icons" style="font-size:11rem">contact_phone</i>
                <!-- notice the "circle" class -->
            </div>
           
          </div>
            
            <div class="row">
            
                <div class="col l12">
                
                <center><label class="ds">TOTAL REQUESTS</label></center>
                
                </div>
            <div class="row">
                <div class="col l12">
                
                <table class="centered">
        <thead>
          <tr>
              <th data-field="id">Client</th>
              <th data-field="name">Guard<th>
              
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>530</td>
            <td>240</td>
          </tr>
        </tbody>
      </table>
                
                
                </div>
                </div>    
            </div>
        </div>
      </div>
          
          
                <!--ACTIVE ACC0UNTS--> 
               <div class="col l3">
        <div class="card medium grey lighten-5">
          <div class="row valign-wrapper">
            <div class="col l2 offset-l2">
                <i class="material-icons" style="font-size:11rem">star</i>
                <!-- notice the "circle" class -->
            </div>
           
          </div>
            
            <div class="row">
            
                <div class="col l12">
                
                <center><label class="ds">ACTIVE ACCOUNTS</label></center>
                
                </div>
            <div class="row">
                <div class="col l12">
                
                <table class="centered">
        <thead>
          <tr>
              <th data-field="id">Client</th>
              <th data-field="name">Guard<th>
              
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>530</td>
            <td>240</td>
          </tr>
        </tbody>
      </table>
                
                
                </div>
                </div>    
            </div>
        </div>
      </div>
          
         <!--EQUIPMENT AND SUPPLIES--> 
           <div class="col l3">
        <div class="card medium grey lighten-5">
          <div class="row valign-wrapper">
            <div class="col l2 offset-l2">
                <i class="material-icons" style="font-size:11rem">web</i>
                <!-- notice the "circle" class -->
            </div>
           
          </div>
            
            <div class="row">
            
                <div class="col l12">
                
                <center><label class="ds">EQUIPMENT AND SUPPLIES</label></center>
                
                </div>
            <div class="row">
                <div class="col l12">
                
                <table class="centered">
        <thead>
          <tr>
              <th data-field="id">Client</th>
              <th data-field="name">Guard<th>
              
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>530</td>
            <td>240</td>
          </tr>
        </tbody>
      </table>
                
                
                </div>
                </div>    
            </div>
        </div>
      </div>
          
          

      
      
      </div>
</div>
<div class="row">
      <div class="col l4 offset-l3">
        <div class="grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col l2 offset-l3">
                <i class="material-icons" style="font-size:11rem">input</i>
                <!-- notice the "circle" class -->
            </div>
           
          </div>
            
            <div class="row">
            
                <div class="col l12">
                
                <center><label class="ds">DEPLOYED RESOURCES</label></center>
                
                </div>
            <div class="row">
                <div class="col l10 offset-l1">
                
                <table class="centered">
        <thead>
          <tr>
              <th data-field="guard">Guards</th>
              <th data-field="eqs">Equipments and Supplies</th>
              <th data-field="guns">Guns</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>530</td>
            <td>240</td>
                <td>120</td>
          </tr>
        </tbody>
      </table>
                
                
                </div>
                </div>    
            </div>
        </div>
          
      
    </div>
          
    
    <div class="col l5">
        <div class="grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col l2 offset-l4">
                <i class="material-icons" style="font-size:11rem">supervisor_account</i>
                <!-- notice the "circle" class -->
            </div>
           
          </div>
            
            <div class="row">
            
                <div class="col l12">
                
                <center><label class="ds">BALANCE PAYMENT FOR CLIENT (Unpaid)</label></center>
                
                </div>
            <div class="row">
                <div class="col l10 offset-l1">
                
                <table class="centered">
        <thead>
          <tr>
              <th data-field="guard">Client Name</th>
              <th data-field="eqs">Due Date</th>
              <th data-field="guns">Amount to be Paid</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>SWA Company</td>
            <td>July 21, 2016</td>
                <td>35000</td>
          </tr>
        </tbody>
      </table>
                
                
                </div>
                </div>    
            </div>
        </div>
          
      
    </div>
    
    </div>

@stop                           