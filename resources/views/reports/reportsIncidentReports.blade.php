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
        series: data
    });
  },
  error: function(data){
    var toastContent = $('<span>Error Database.</span>');
    Materialize.toast(toastContent, 1500,'red', 'edit');
  }
});//ajax


$(function () {
    
});
</script>
@stop