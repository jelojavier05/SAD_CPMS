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
  <div class="col l2 offset-l3">
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
				
  <div class="col l2">
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
				
				
  <div class="col l2">
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
      url: "{{action('DashboardAdminController@getPieGuard')}}",
      success: function(data){
        if (data){
          var guardChart = data;
          $('#guardPie1').highcharts({
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
              name: 'Brands',
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
  });
</script>


@stop
