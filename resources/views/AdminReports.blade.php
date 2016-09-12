@extends('layout.maintenanceLayout')

@section('title')
Admin Reports
@endsection

@section('content')

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

@stop

@section('script')
<script type="text/javascript">
    
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
</script>
@stop