@extends('layout.maintenanceLayout')

@section('title')
Admin
@endsection

@section('content')

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
              <p style="margin-l	eft:10px;">Clients <br> &nbsp;</p>
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
              <p style="margin-left:10px;">Guards <br> &nbsp;</p>
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
              <p style="margin-left:10px;">Guns <br> &nbsp;</p>
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
           <div class="card animated zoomIn teal darken-1" style="background-color:#9B4F0F">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'>30</span>
              <p style="margin-left:10px;">Contract <br> Extensions</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">extension</i>

            </div>
            <div class="card-action teal darken-1" style="background-color:#9B4F0F">
              <center>
                  <a href="/contractextensions" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div> 
          
		  </div>
		  
<!--
	 <div class="col l2">
		<div class="card animated zoomIn teal darken-1" style="">
		  <div class="card-content white-text">
			<span class="card-title" style="font-size:40px; font-weight:bold;">30</span>
			<p style="margin-left:10px;">Contract <br> Extensions</p>
			<i class="material-icons right" style="font-size:5rem; margin-top:-70px;">extension</i>
		  </div>
		  <div class="card-action teal darken-1" style="">
			<center>
			  <a href="/contractextensions" class="white-text">See All</a>
			  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
			</center>
		  </div>
		</div>   
	  </div>
-->
   
     
<div class="row">
  <div class="col l2 offset-l3">
    <div class="card animated zoomIn" style="background-color:#00293C">
      <div class="card-content white-text">
        <span class="card-title" style="font-size:40px; font-weight:bold;">{{$value->countUnpaidBills}}</span>
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
				
  <div class="col l2">
    <div class="card animated zoomIn indigo darken-2" style="">
      <div class="card-content white-text">
        <span class="card-title" style="font-size:40px; font-weight:bold;">{{$value->countGuardLicense}}</span>
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
	
<div class="col l2">
    <div class="card animated zoomIn" style="background-color:#323030">
      <div class="card-content white-text">
        <span class="card-title" style="font-size:40px; font-weight:bold;">{{$value->countGunLicense}}</span>
        <p style="margin-left:10px;">Gun <br> Licenses</p>
        <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">forward</i>
      </div>
      <div class="card-action" style="background-color:#323030">
        <center>
          <a href="/gunLicenses" class="white-text">See All</a>
          <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
        </center>
      </div>
    </div>
  </div>
				
				
 
	

              
<div class="row">

	<div class="col s10 push-s2">		
		<div class="row">
		  <div class="col s6">
			  <hr>
			  <div id="guardPie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
		  </div>
			   
		  <div class="col s6">
			  <hr>
			  <div id="gunPie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
		  </div>

		</div>
	</div>
</div>
	
<div class="row">

	<div class="col s10 push-s2">		
		<div class="row">
		  <div class="col s6">
			  <hr>	
			  <div id="samplePie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
		  </div>
			   
		  <div class="col s6">
			  <hr>
			  <div id="" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
		  </div>

		</div>
	</div>
</div>
                
</div>
              
@stop   
@section('script')

              
<script>
  $(document).ready(function () {
    var guardChart;
    $.ajax({
      type: "GET",
      url: "{{action('DashboardAdminController@getPieGuard')}}",
      success: function(data){
        guardChart = data;
        if (data){
          $('#guardPie').highcharts({
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
            },
            title: {
              text: 'Guards'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                enabled: false
              },
                showInLegend: true
              }
            },
            series: [{
              name: 'Ratio',
              colorByPoint: true,
              data: [{
                name: 'Deployed',
                y: guardChart.deployed
              }, {
                name: 'Waiting',
                y: guardChart.waiting,
              }, {
                name: 'Pending',
                y: guardChart.pending
              }, {
                name: 'On Leave',
                y: guardChart.onLeave
              },{
                name: 'Reliever',
                y: guardChart.reliever
              }]
            }]
          });
        }
          
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');

      }
    });//ajax
  });
</script>
	
<script>
  $(document).ready(function () {

    $.ajax({
      type: "GET",
      url: "{{action('DashboardAdminController@getPieGun')}}",
      success: function(data){
        if (data){
          $('#gunPie').highcharts({
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
            },
            title: {
              text: 'Guns'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                enabled: false
              },
                showInLegend: true
              }
            },
            series: [{
              name: 'Ratio',
              colorByPoint: true,
              data: [{
                name: 'Inventory',
                y: data.inventory
              }, {
                name: 'Deployed',
                y: data.deployed,
              }, {
                name: 'Pending',
                y: data.pending
              }, {
                name: 'Has Defect',
                y: data.notWorking
              }]
            }]
          });
        }
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');

      }
    });//ajax

    $.ajax({
      type: "GET",
      url: "{{action('DashboardAdminController@getSample')}}",
      success: function(data){
        if (data){
          var guardChart = data;
          $('#samplePie').highcharts({
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
            },
            title: {
              text: 'Sample'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                enabled: false
              },
                showInLegend: true
              }
            },
            series: [{
              name: 'Brands',
              colorByPoint: true,
              data: data
            }],
            drilldown: {
            series: [{
                name: 'Microsoft Internet Explorer',
                id: 'Microsoft Internet Explorer',
                data: [
                    ['v11.0', 24.13],
                    ['v8.0', 17.2],
                    ['v9.0', 8.11],
                    ['v10.0', 5.33],
                    ['v6.0', 1.06],
                    ['v7.0', 0.5]
                ]
            }, {
                name: 'Chrome',
                id: 'Chrome',
                data: [
                    ['v40.0', 5],
                    ['v41.0', 4.32],
                    ['v42.0', 3.68],
                    ['v39.0', 2.96],
                    ['v36.0', 2.53],
                    ['v43.0', 1.45],
                    ['v31.0', 1.24],
                    ['v35.0', 0.85],
                    ['v38.0', 0.6],
                    ['v32.0', 0.55],
                    ['v37.0', 0.38],
                    ['v33.0', 0.19],
                    ['v34.0', 0.14],
                    ['v30.0', 0.14]
                ]
            }, {
                name: 'Firefox',
                id: 'Firefox',
                data: [
                    ['v35', 2.76],
                    ['v36', 2.32],
                    ['v37', 2.31],
                    ['v34', 1.27],
                    ['v38', 1.02],
                    ['v31', 0.33],
                    ['v33', 0.22],
                    ['v32', 0.15]
                ]
            }, {
                name: 'Safari',
                id: 'Safari',
                data: [
                    ['v8.0', 2.56],
                    ['v7.1', 0.77],
                    ['v5.1', 0.42],
                    ['v5.0', 0.3],
                    ['v6.1', 0.29],
                    ['v7.0', 0.26],
                    ['v6.2', 0.17]
                ]
            }, {
                name: 'Opera',
                id: 'Opera',
                data: [
                    ['v12.x', 0.34],
                    ['v28', 0.24],
                    ['v27', 0.17],
                    ['v29', 0.16]
                ]
            }]
        }
          });
        }
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');

      }
    });//ajax
  });
</script>


@stop
