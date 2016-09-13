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
                                          <a href="#!" class="white-text">See All</a>
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
                
                
                
                    </div>
                
<!--
                <div class="col l6 push-l3">
                
                     <div id="container" style="min-width: 310px; height: 220px; margin: 0 auto;"></div>
                
                </div>
-->
                   
              </div>			  			  			  			                      
          </div>
		  
		  
         
          

   
</div>
</div>
 
@stop   
@section('script')
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});

</script>

@stop
