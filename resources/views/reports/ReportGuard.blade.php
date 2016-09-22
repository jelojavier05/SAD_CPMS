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
 <div class="row">
    <div class="col s12 push-s1">
        <div class="container blue-grey lighten-4 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%; padding-bottom:1%;">
			<div class="row"></div>
			<div class="row">
				<div class="col s8">
					<div class="input-field col s4">
						<label class="active" style="color:#64b5f6;"  for="dateOfbirth">Date</label>	
				        <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
					</div>					

					<!--<div class="input-field col s4">
						  <select>
                                <option disabled selected>Choose an Option</option>
                                <option>Clients</option>
                                <option>Guards</option>
                                <option>Guns</option>
                                <option>Requests</option>
					       </select>
						<label>Reports</label>
					</div>-->
				</div>
			
<!--
				<div class="col s4">
					<div class="input-field col s12">
						<nav style="height:55px;margin-top:-4%">
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
				<div class="col l8 push-l2">

					<div id="testchart" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>


				</div>

			</div>
				
			<div clas="row">
				<div class="col l10 push-l1">
					<div class="container-fluid white" id="tbl">
						<table>
							<thead>
								<th>City</th>
								<th>Client</th>
								<th>Number of Guards</th>
							</thead>
							<tbody>
								<tr>
									<td>Makati</td>
									<td>ChinaBank</td>
									<td>10</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
        </div>
     </div>
</div>


@stop


@section('script')
<script>
$(document).ready(function(){
	$('#testchart').highcharts({
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
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Internet Explorer',
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
</script>
@stop