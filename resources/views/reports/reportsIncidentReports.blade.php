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
					<select id = 'reportFilter'>
						<option disabled selected>Choose Filter</option>
						<option value = '0'>Nature of Business</option>
						<option value = '1'>City</option>
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
$('#reportFilter').on('change',function(){
  
  var selectFilter = $('#reportFilter').val();
  var strFunction;
  if (selectFilter == 0){
    strFunction = 'getIncidentPerNatureOfBusiness';
  }else if (selectFilter == 1){
    strFunction = 'getIncidentPerArea';
  }
  $.ajax({
    type: "GET",
    url: "/reportsincidentreports/" + strFunction,
    success: function(data){
      setChart(data);
    },
    error: function(data){
      var toastContent = $('<span>Error Database.</span>');
      Materialize.toast(toastContent, 1500,'red', 'edit');
    }
  });//ajax
});


function setChart(data){
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
}


$(function () {
    
});
</script>
@stop