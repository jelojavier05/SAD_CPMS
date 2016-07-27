@extends('layout.maintenanceLayout')

@section('title')
Admin
@endsection

@section('content')



<div class="row"></div>
<div class="row"></div>
<!-----------------CLIENTS----------------->

<div class="row">
      <div class="col l12">
          
      <div class="col s4 offset-s3" >
      	 <div class="card blue lighten-1">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'></span>
              <p style="margin-left:10px;">Clients</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">perm_identity</i>
            </div>
            <div class="card-action blue darken-1">
              <center>
                  <a href="/clientView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
      </div>
		  
<!-----------------GUARDS----------------->
          
<div class="row">
        <div class="col s4">
            
          <div class="card blue lighten-1">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'guardNumber'></span>
              <p style="margin-left:10px;">Guards</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">assignment_ind</i>
            </div>
            <div class="card-action blue darken-1">
              <center>
                  <a href="/guardView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
        </div>
      </div>
    
<!-----------------ACTIVE ACCOUNTS----------------->
<div class="row">    
     <div class="col l4 offset-l3">
           <div class="card blue lighten-1">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'></span>
              <p style="margin-left:10px;">Guns</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">list</i>

            </div>
            <div class="card-action blue darken-1">
              <center>
                  <a href="/gunView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div> 
          
        </div>
          
<!-----------------EQUIPMENT AND SUPPLIES----------------->
          
<div class="col l4">
            <div class="card blue lighten-1">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;">105</span>
              <p style="margin-left:10px;">ACTIVE ACCOUNTS</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">supervisor_account</i>
            </div>
            <div class="card-action blue darken-1">
              <center><a href="#" class="white-text">See All</a><i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i></center>
              
            </div>
          </div>
          
        </div>
      </div>
      
     


<!-----------------DEPLOYED RESOURCES----------------->
<div class="row">    
     <div class="col l4 offset-l3">

          <div class="card blue lighten-1">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;">114</span>
              <p style="margin-left:10px;">DEPLOYED RESOURCES</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">track_changes</i>
            </div>
            <div class="card-action blue darken-1">
              <center>
                  <a href="#" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
      
    </div>
          

    
<!-----------------BALANCE PAYMENT FOR CLIENT (Unpaid)----------------->
    
        <div class="col l4">
          <div class="card blue lighten-1">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;">35</span>
              <p style="margin-left:10px;">BALANCE PAYMENT FOR CLIENT(Unpaid)</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">receipt</i>
            </div>
            <div class="card-action blue darken-1">
              <center>
                  <a href="#" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
        </div>
     </div>
</div>
 
@stop                           
    
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "{{action('DashboardAdminController@getCountClient')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            $('#clientNumber').text(data);    
        }
    });//client count
    
    $.ajax({
        type: "GET",
        url: "{{action('DashboardAdminController@getCountGuard')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            $('#guardNumber').text(data);
        }
    });//guard count
    
    $.ajax({
        type: "GET",
        url: "{{action('DashboardAdminController@getCountGun')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            $('#gunNumber').text(data);
        }
    });//guard count
    
    
});//document.ready 
</script>
@stop