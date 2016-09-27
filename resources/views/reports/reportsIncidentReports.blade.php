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
					</select>						
				</div>			            
				<div class="row">
					<div class="col l10 push-l1">
						<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>
					</div>
				</div>							
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
$.ajax({
  type: "GET",
  url: "{{action('ReportsIncidentReportsController@getIncidentReportPerArea')}}",
  success: function(data){
    
  },
  error: function(data){
    var toastContent = $('<span>Error Database.</span>');
    Materialize.toast(toastContent, 1500,'red', 'edit');
  }
});//ajax


$(function () {
    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Incident Report'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Count'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});
</script>
@stop