@extends('SecurityGuardDashboard')
@section('title')
Security Homepage
@endsection


@section('content')



<div class="row">
<div class="col l12">
<div class="slider z-depth-1" style="height:350px">
    <ul class="slides">
      <li>
        <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3" >Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/2" > <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
        </div>
    </div>

</div>


  <!--MESSAGE-->
<div class="row">
    <div class="col l12">
            <div class="col l6" >
                    <div class="card large z-depth-2 " style="overflow:scroll">
                   <div class="row">
                            <div class="col l12">
                                <div class="col l3">
                             <i class="material-icons left" style="font-size:6rem">email
                    </i> 
                                </div>
                             
                                <div class="col l9">
                                   <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">INBOX MESSAGE</span>
                                
                                </div>
                        </div>
                        </div>
                 <table class="centered" style="background-color:">
        <thead>
          <tr>
              <th data-field="sender">Sender</th>
              <th data-field="id">Message Status</th>
              <th data-field="name">Action</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Admin</td>
            <td>Unread</td>
            <td>  <a href="#!" class="btn blue darken-4 z-depth-3">View Details</a></td>
          </tr>
            <tr>
            <td>Admin</td>
            <td>Unread</td>
            <td>  <a href="#!" class="btn blue darken-4 z-depth-3">View Details</a></td>
          </tr>
            <tr>
            <td>Admin</td>
            <td>Unread</td>
            <td>  <a href="#!" class="btn blue darken-4 z-depth-3">View Details</a></td>
          </tr>
            <tr>
            <td>Admin</td>
            <td>Unread</td>
            <td>  <a href="#!" class="btn blue darken-4 z-depth-3">View Details</a></td>
          </tr>
            <tr>
            <td>Admin</td>
            <td>Unread</td>
            <td>  <a href="#!" class="btn blue darken-4 z-depth-3">View Details</a></td>
          </tr>
            <tr>
            <td>Admin</td>
            <td>Unread</td>
            <td>  <a href="#!" class="btn blue darken-4 z-depth-3">View Details</a></td>
          </tr>
        
        </tbody>
      </table>
      
                </div>
            </div>
            
        
        
        <!--ANNOUNCEMENTS/UPDATES-->
            <div class="col l6">
                    <div class="card large z-depth-2" style="overflow:scroll">
                
                        
                        <div class="row">
                            <div class="col l12">
                                <div class="col l3">
                             <i class="material-icons left" style="font-size:6rem">account_circle
                    </i> 
                                </div>
                             
                                <div class="col l9">
                                   <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">CLIENT INFORMATION</span>
                                
                                </div>
                        </div>
                        </div>
                        
                        
                        <div class="row">
                   
        <div class="input-field col s12">
          <input value="Adrian Flores"  id="swa" type="text" class="validate ci">
          <label for="swa" style="font-size:13px;font-style:Myriad Pro">Client Name</label>
        </div>
      </div>
                        <div class="row">
                   
        <div class="input-field col s12">
          <input value="3383 V. Mapa 2nd St. Sta. Mesa, Manila"  id="swa" type="text" class="validate ci">
          <label for="swa" style="font-size:13px;font-style:Myriad Pro">Client Address</label>
        </div>
      </div>
                        <div class="row">
                   
        <div class="input-field col s12">
          <input value="School Campus"  id="swa" type="text" class="validate ci">
          <label for="swa" style="font-size:13px;font-style:Myriad Pro">Nature of Business</label>
        </div>
      </div>
                   
                        <div class="row">
        <div class="input-field col l12">
            
            <div class="col l6">
                
                <input value="1200"  id="swa" type="text" class="validate ci">
          <label for="swa" style="font-size:13px;font-style:Myriad Pro">Population</label>
        </div>
    
             
          <div class="col l6">
              
                 <input value="235 square/m"  id="swa" type="text" class="validate ci">
          <label for="swa" style="font-size:13px;font-style:Myriad Pro;margin-left:50%">Area</label>
        </div>
                        </div>
             
      </div>
                         <div class="row">
                             
                                      <table class="centered" style="font-family:Myriad Pro">
        <thead>
          <tr>
              <th data-field="st">Shift</th>
              <th data-field="fr">From</th>
              <th data-field="to">To</th>
          </tr>
           
        </thead>

        <tbody>
          <tr>
            <td>Opener</td>
            <td>8:00 am</td>
            <td>4:00 pm</td>
          </tr>
        
        </tbody>
      </table>
      
          
                </div>
                        
                <div class="row">
                        <div class="col l12 push-l2">
                    
                      <a href="#!" class="btn green darken-4 z-depth-3">Accept</a>
                            <a href="#!" class="btn red darken-4 z-depth-3">Reject</a>
                    
                    
                    </div>
                      
                        
                        
                        </div>
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
