@extends('layout.maintenanceLayout')

@section('title')
Admin
@endsection

@section('content')
<!--<div class="row">
	<div class="col l12">
		<div class="col l2 push-l2">
			<i class="material-icons" style="font-size:3.9rem;margin-top:3%">dashboard</i>
		</div>
		<div class="col l3">
			<div class="row"></div>
			<p style="margin-left:19%;margin-top:12%">DASHBOARD</p>
		</div>
		
	
	</div>
	<hr>
</div> -->

<div class="row">
       
	</div>

<!-----------------CLIENTS----------------->

<div class="row">
      <div class="col l12">
          
      <div class="col l2 offset-l3" >
      	 <div class="card " style="background-color:#8D230F" >
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'></span>
              <p style="margin-l	eft:10px;">Clients</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>
            </div>
            <div class="card-action" style="background-color:#8D230F">
              <center>
                  <a href="/clientView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
      </div>
		  
<!-----------------GUARDS----------------->

        <div class="col l2">
          <div class="card" style="background-color:#1E434C">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'guardNumber'></span>
              <p style="margin-left:10px;">Guards</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">accessibility</i>
            </div>
            <div class="card-action" style="background-color:#1E434C">
              <center>
                  <a href="/guardView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
        </div>
     
    
<!-----------------GUNS----------------->
     <div class="col l2">
           <div class="card" style="background-color:#9B4F0F">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'></span>
              <p style="margin-left:10px;">Guns</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">tonality</i>

            </div>
            <div class="card-action" style="background-color:#9B4F0F">
              <center>
                  <a href="/gunView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div> 
          
        </div>

<!-----------------DEPLOYED RESOURCES----------------->
   
     <div class="col l2">

          <div class="card" style="background-color:#323030">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;">114</span>
              <p style="margin-left:10px;">Deployed<br> Resources</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-60%;">forward</i>
            </div>
            <div class="card-action" style="background-color:#323030;margin-top:-11%">
              <center>
                  <a href="#" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
    </div>
          
          <div class="row">
            <div class="col l12">
                    <div class="col l4 push-l3">
                         <div class="card" style="background-color:#00293C">
                                    <div class="card-content white-text">
                                      <span class="card-title" style="font-size:40px; font-weight:bold;">35</span>
                                      <p style="margin-left:10px;">BALANCE PAYMENT FOR CLIENT(Unpaid)</p>
                                      <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">receipt</i>
                                    </div>
                                    <div class="card-action" style="background-color:#00293C">
                                      <center>
                                          <a href="#" class="white-text">See All</a>
                                          <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                                      </center>
                                    </div>
                    </div>
                
                
                
                    </div>
                   
              </div>
          
          
          </div>

    
<!-----------------BALANCE PAYMENT FOR CLIENT (Unpaid)----------------->
   
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