@extends('layout.maintenanceLayout')

@section('title')
Admin Reports
@endsection

@section('content')

<style>
.dataTables_filter
	{
    display: none;
	}
</style>

<div class="row" style="margin-top:-30px;">


<div class="row"> 
    <div class="row">
 
        <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Reports</h3>
        </div>
    </div>
   
    </div>
    <div class="row">
    <div class="col s12 push-s1" style="margin-top:-4%;">
        <div class="container blue-grey lighten-4 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
			<div class="row"></div>
<!--
			<div class="row">
				<div class="col s8">
					<div class="input-field col s4">
						<label class="active" style="color:#64b5f6;"  for="dateOfbirth">From</label>	
				        <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
					</div>

					<div class="input-field col s4">
						<label class="active" style="color:#64b5f6;"  for="dateOfbirth">To</label>	
				        <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
					</div>

					<div class="input-field col s4">
						  <select>
                                <option disabled selected>Choose an Option</option>
                                <option>Clients</option>
                                <option>Guards</option>
                                <option>Guns</option>
                                <option>Requests</option>
					       </select>
						<label>Reports</label>
					</div>
				</div>
			
				<div class="col s4">
					<div class="input-field col s12">
						<nav style="height:55px;">
							<div class="nav-wrapper blue-grey lighten-3">
								<form>
									<div class="input-field" style="">
										<input id="mySearch" type="search" placeholder="Search" required>
										<label for="search"><i class="material-icons">search</i></label>									
									</div>
								</form>
							</div>
						</nav>
					</div>	
				</div>							                                             
           </div>
-->
            
            <div class="row">
                <div class="col l12">
                <div class="col s6">
                    <div class="card animated zoomIn" style="background-color:#2D4262" >
                        <div class="card-content white-text">
                          <span class="card-title" style="font-size:30px; font-weight:bold;" id = 'clientNumber'>CLIENT</span>
                         
                        </div>
                        <div class="card-action" style="background-color:">
                          <center>
                              <a href="/reports/ReportClient" class="white-text">See Statistical Reports</a>
                              <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                          </center>
                        </div>
                    </div>

                </div>
                    
                    <div class="col s6">
                    <div class="card animated zoomIn" style="background-color:#1A405F" >
                        <div class="card-content white-text">
                          <span class="card-title" style="font-size:26px; font-weight:bold;" id = 'clientNumber'>GUARDS DEPLOYED PER AREA</span>
                          <p style="margin-left:10px;"></p>
<!--                          <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>-->
                        </div>
                        <div class="card-action" style="background-color:">
                          <center>
                              <a href="/reports/ReportGuard" class="white-text">See Statistical Reports</a>
                              <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                          </center>
                        </div>
                    </div>

                </div>
                    <!--
                    <div class="row">
                        <div class="col s12">
                                <div class="col s6">
                                    <div class="card animated zoomIn" style="background-color:#32384D" >
                                        <div class="card-content white-text">
                                          <span class="card-title" style="font-size:30px; font-weight:bold;" id = 'clientNumber'>GUNS</span>
                                          <p style="margin-left:10px;"></p>
                                          <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>
                                        </div>
                                        <div class="card-action" style="background-color:">
                                          <center>
                                              <a href="#!" class="white-text">See Statistical Report</a>
                                              <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                                          </center>
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="col s6">
                                    <div class="card animated zoomIn" style="background-color:#00293C" >
                                        <div class="card-content white-text">
                                          <span class="card-title" style="font-size:30px; font-weight:bold;" id = 'clientNumber'>REQUESTS</span>
                                          <p style="margin-left:10px;"></p>
                                          <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>
                                        </div>
                                        <div class="card-action" style="background-color:">
                                          <center>
                                              <a href="#!" class="white-text">See Statistical Report</a>
                                              <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
                                          </center>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    
                    </div>-->
					
					<div class="row">
						<div class="col s12">
							<div class="col s6">
								<div class="card animated zoomIn" style="background-color:#32384D" >
									<div class="card-content white-text">
										<span class="card-title" style="font-size:26px; font-weight:bold;" id = 'clientNumber'>GUARD TRANSFER HISTORY</span>
										<p style="margin-left:10px;"></p>
	<!--									<i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>-->
									</div>
									<div class="card-action" style="background-color:">
										<center>
											<a href="/sgtransferlog" class="white-text">SEE TRANSFER LOGS</a>
											<i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
										</center>
									</div>
								</div>	
							</div>
							
							<div class="col s6">
								<div class="card animated zoomIn" style="background-color:#00293C" >
									<div class="card-content white-text">
										<span class="card-title" style="font-size:30px; font-weight:bold;" id = 'clientNumber'><center>INCIDENT REPORTS</center></span>
										<p style="margin-left:10px;"></p>
	<!--									<i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>-->
									</div>
									<div class="card-action" style="background-color:">
										<center>
											<a href="/reportsincidentreports" class="white-text">SEE LIST OF REPORT</a>
											<i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
										</center>
									</div>
								</div>	
							</div>
							
							<div class="col s6">
								<div class="card animated zoomIn blue darken-4" >
									<div class="card-content white-text">
										<span class="card-title" style="font-size:30px; font-weight:bold;" id = 'clientNumber'><center>Guard Attendance Records</center></span>
										<p style="margin-left:10px;"></p>
	<!--									<i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>-->
									</div>
									<div class="card-action" style="background-color:">
										<center>
											<a href="/reportDTR" class="white-text">SEE LIST OF REPORT</a>
											<i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
										</center>
									</div>
								</div>	
							</div>
						</div>
					</div>
                
                </div>
            </div>
            
            
            
            
        </div>
    </div>
    
            
<!--
<div class="row">
     <div class="col s12">
        
			    <div class="col l1 offset-l3">
        
        <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Reports</h3>
        </div>
        <div class="input-field col l1 push-l1">
					<label class="active" style="color:#64b5f6;"  for="dateOfbirth">From</label>	
				   <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
						
        </div>
        <div class="input-field col l1 offset-l1">
					<label class="active" style="color:#64b5f6;"  for="dateOfbirth">To</label>	
				   <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
						
         </div>
         <div class="input-field col s2">
					<select>
						<option disabled selected>Choose an Option</option>
						<option>Client</option>
						<option>Guard</option>
                        <option>Guns</option>
                        <option>Request</option>
					</select>
					<label>Status</label>
				</div>
        <div class="input-field col l3">
					<nav style="height:55px;">
						<div class="nav-wrapper blue-grey lighten-3">
							<form>
								<div class="input-field" style="z-index:500;">
									<input id="mySearch" type="search" placeholder="Search" required>
									<label for="search"><i class="material-icons">search</i></label>									
								</div>
							</form>
						</div>
					</nav>
				</div>

    </div>
   
</div>

<div class="row">
    <div class="col l7 push-l2">
        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    
    </div>
    
</div> 

-->
@stop

@section('script')

<script type="text/javascript"> 
    
/*
    $(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Summary of Resources for Security Guards'
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
                    name: 'Available Guards Left',
                    y: 56.33
                }, {
                    name: 'Deployed',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Terminated',
                    y: 10.38
                }, 
                        {
                    name: 'Leave',
                    y: 10.38
                }, 
                ]
            }]
        });
    });
});
*/
    
    $(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Browser market shares January, 2015 to May, 2015'
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
                    name: 'Microsoft Internet Explorer',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2
                }]
            }]
        });
    });
});
</script>

@stop