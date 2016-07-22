@extends('ClientDashboard')
@section('title')
Client Homepage
@endsection


@section('content')


<div class="row">
    <div class="col l12">
        <div class="slider z-depth-1" style="height:350px">
        <ul class="slides">
        <li>
            <img src="{!! URL::asset('../Materialize/images/training.jpeg') !!}"> <!-- random image -->
            <div class="caption center-align">
                <h3>Client and Personnel Management System</h3>
                <h5 class="light grey-text text-lighten-3" >Security Agency</h5>
            </div>
        </li>
        <li>
            <img src="{!! URL::asset('../Materialize/images/cpms1.jpeg') !!}" > <!-- random image -->
            <div class="caption left-align">
                <h3>Client and Personnel Management System</h3>
                <h5 class="light grey-text text-lighten-3">Security Agency</h5>
            </div>
        </li>
        <li>
            <img src="{!! URL::asset('../Materialize/images/cpms.jpeg') !!}"> <!-- random image -->
            <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="{!! URL::asset('../Materialize/images/cpms1.jpeg') !!}"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        </ul>
        </div>
    </div>
</div>


      <!----------------------------------------MESSAGE-------------------------------->
<div class="row">
    <div class="col l12">
        <div class="col l6">
            <div class="card large z-depth-2">
                <div class="row">
                    <div class="col l12">
                        <div class="col l3">
                            <i class="material-icons left" style="font-size:6rem">email</i> 
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
                              <th data-field="id">DATE</th>
                              <th data-field="name">MESSAGES</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>JUN 4, 2016</td>
                            <td>Deployment of Guards</td>
                          </tr>
                          <tr>
                            <td>JUL 5, 2016</td>
                            <td>Addtional Deployment of Guards</td>
                          </tr>
                          <tr>
                            <td>JUL 10, 2016</td>
                            <td>Request have been approved</td>
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
