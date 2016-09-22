@extends('layout.maintenanceLayout')

@section('title')
Incident Reports - Reports
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
				<div class="col s4">
					<select>
						<option disabled selected>Choose Filter</option>
						<option>Nature of Business</option>
						<option>City</option>
<!--						<label class="active"></label>-->
					</select>						
				</div>			            
				<div class="row">
					<div class="col l10 push-l1">
						<div id="testchart" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>
					</div>
				</div>							
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
$(function () {
    $('#testchart').highcharts({
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