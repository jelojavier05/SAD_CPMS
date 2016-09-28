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
		<div class="container blue-grey lighten-4 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%; padding-bottom:1%; height:100%;">
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
					<div class="col l10 push-l1" style="display:none;" id = 'divContainer'>
						<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>
					</div>
					
					<div class="col l10 push-l1" style="" id = 'divTakip'>
						<div class="container-fluid white">
							<h1 class="grey-text"><center>CHART WILL APPEAR HERE</center></h1>
						</div>
					</div>
				</div>							
			
			
				<div clas="row">
					<div class="col l10 push-l1">
						<div class="container-fluid white" style="border-radius:10px;">
							<div>	
								<table id="tblIncidents">
									<thead>
									<th id = 'tableHeaderFilter'></th>
										<th>Number of Incidents</th>

									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
														
						</div>
					</div>	
				</div>
        <div class="row"></div> 
      <div class="row">
        <div class="col l10 push-l1">
          <ul class="collection with-header">
            <li class="collection-header">
              <div class="row">
                <div class="col s5">
                  <h5 style="font-weight:bold;" id = 'totalText'></h5>
                </div>
                
                <div class="col s7">
                  <h5 style="font-weight:bold;" id = 'totalTextCount'></h5>
                </div>
              </div>
              
              <div class="row">
                <div class="col s5">
                  <h5 style="font-weight:bold;">Total Number of Incident:</h5>
                </div>

                <div class="col s7">
                  <h5 style="font-weight:bold;" id = 'totalIncident'></h5>
                </div>
              </div>
            </li>
            
          </ul>
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
  $('#divContainer').show();
  $('#divTakip').hide();

  var selectFilter = $('#reportFilter').val();
  var strFunction;
  var strTotalText;
  var strTableFilter;
  if (selectFilter == 0){
    strFunction = 'getIncidentPerNatureOfBusiness';
    strTotalText = 'Total Number of Business: ';
    strTableFilter = 'Nature Of Business';

  }else if (selectFilter == 1){
    strFunction = 'getIncidentPerArea';
    strTotalText = 'Total Number of City: ';
    strTableFilter = 'City';
  }
  $('#tableHeaderFilter').text(strTableFilter);
  $('#totalText').text(strTotalText);

  $.ajax({
    type: "GET",
    url: "/reportsincidentreports/" + strFunction,
    success: function(data){
      $('#totalTextCount').text(data.count);
      $('#totalIncident').text(data.totalNumber);
      setChart(data.graphReport);
      setTable(data.tabularReport);
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

function setTable(data){
  var table = $('#tblIncidents').DataTable();
  table.clear().draw();

  $.each(data, function(index, value){
    if (value.count > 0){
      table.row.add([
        value.name,
        value.count
      ]).draw();
    }
  });
}

</script>

<script>
  $(document).ready(function(){
  	$("#tblIncidents").DataTable({             
    	 "columns": [     	 
    	 null,
    	 null,
    	 ] ,  
    	 "bLengthChange": false	
  	});
	  	
  	  	
  });
</script>
@stop