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
	 <div class="col s12 push-s3">
		 <div class="col s3 pull-s1">
			 <div class="row"></div>
			 <i class="material-icons" style="font-size:4rem;margin-top:-5%">view_comfy</i>
		 </div>
		 <div class="col s4 pull-s3">
			 <div class="row"></div>
			 <div class="row"></div>
			 <h5 style="font-family:Trebuchet MS;color:#262F34;margin-left:-12%;margin-top:-3%">DASHBOARD</h5> 
		 </div>
         	           
	 </div>  
     <hr>
 </div>	
<div class="row">
      <div class="col l12">
          
      <div class="col l2 offset-l3" >
      	 <div class="card animated zoomIn" style="background-color:#8D230F" >
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'>{{$value->countClient}}</span>
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


        <div class="col l2">
          <div class="card animated zoomIn" style="background-color:#1E434C">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'guardNumber'>{{$value->countGuard}}</span>
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
     

     <div class="col l2">
           <div class="card animated zoomIn" style="background-color:#9B4F0F">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'>{{$value->countGun}}</span>
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
   
     <div class="col l2">

          <div class="card animated zoomIn" style="background-color:#323030">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;">10</span>
              <p style="margin-left:10px;">Gun<br>Licenses</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-60%;">forward</i>
            </div>
            <div class="card-action" style="background-color:#323030;margin-top:-11%">
              <center>
                  <a href="/gunLicenses" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
    </div>
		  
	
          
          <div class="row">
            <div class="col l12">
                    <div class="col l2 push-l3">
                         <div class="card animated zoomIn" style="background-color:#00293C">
                                    <div class="card-content white-text">
                                      <span class="card-title" style="font-size:40px; font-weight:bold;">35</span>
                                      <p style="margin-left:10px;">Unpaid <br> Clients</p>
                                      <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">receipt</i>
                                    </div>
                                    <div class="card-action" style="background-color:#00293C">
                                      <center>
                                          <a href="/unpaidclients" class="white-text">See All</a>
                                          <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                                      </center>
                                    </div>
                    </div>
                
                
                
                    </div>
				
				<div class="col l2 push-l3">
                         <div class="card animated zoomIn indigo darken-2" style="">
                                    <div class="card-content white-text">
                                      <span class="card-title" style="font-size:40px; font-weight:bold;">20</span>
                                      <p style="margin-left:10px;">Guard <br> Licenses</p>
                                      <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">security</i>
                                    </div>
                                    <div class="card-action indigo darken-2" style="">
                                      <center>
                                          <a href="/guardLicenses" class="white-text">See All</a>
                                          <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                                      </center>
                                    </div>
                    </div>
                
                
                
                    </div>
				
				
				<div class="col l2 push-l3">
                         <div class="card animated zoomIn teal darken-1" style="">
                                    <div class="card-content white-text">
                                      <span class="card-title" style="font-size:40px; font-weight:bold;">30</span>
                                      <p style="margin-left:10px;">Contract <br> Extensions</p>
                                      <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">extension</i>
                                    </div>
                                    <div class="card-action teal darken-1" style="">
                                      <center>
                                          <a href="#!" class="white-text">See All</a>
                                          <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                                      </center>
                                    </div>
                    </div>
                
                
                
<<<<<<< HEAD
               
=======
                    </div>
                
<!--
                <div class="col l6 push-l3">
                
                     <div id="container" style="min-width: 310px; height: 220px; margin: 0 auto;"></div>
                
                </div>
-->
>>>>>>> 36ec79664e89f2d3a5ae2465b53e88e580479c49
                   
              </div>			  			  			  			                      
          </div>
<<<<<<< HEAD
          <div class="row">
             
          <div class="col l8 push-l3 animated zoomIn">
                
                     <div id="container"style="min-width: 310px; height: 220px; margin: 0 auto;"></div>
                
                </div>
           <div>
=======
		  
		  
         
          
>>>>>>> 36ec79664e89f2d3a5ae2465b53e88e580479c49

   
</div>
</div>
 
@stop   
@section('script')


@stop
