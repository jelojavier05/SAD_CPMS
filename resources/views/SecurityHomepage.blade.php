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
            <div class="col l6">
                    <div class="card large z-depth-2">
                   <div class="row">
                            <div class="col l12">
                                <div class="col l3">
                             <i class="material-icons left" style="font-size:6rem">email
                    </i> 
                                </div>
                             
                                <div class="col l6">
                                   <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">INBOX MESSAGE</span>
                                
                                </div>
                        </div>
                        </div>
                 <table class="striped" style="background-color:">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Item Name</th>
              <th data-field="price">Item Price</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
        </tbody>
      </table>
      
                </div>
            </div>
            
        
        
        <!--ANNOUNCEMENTS/UPDATES-->
            <div class="col l6">
                    <div class="card large z-depth-2">
                
                        
                        <div class="row">
                            <div class="col l12">
                                <div class="col l3">
                             <i class="material-icons left" style="font-size:6rem">announcement
                    </i> 
                                </div>
                             
                                <div class="col l6">
                                   <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Verdana">ANNOUNCEMENT/UPDATES</span>
                                
                                </div>
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
