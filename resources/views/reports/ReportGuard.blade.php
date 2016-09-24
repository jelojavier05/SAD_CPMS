@extends('layout.maintenanceLayout')

@section('title')
Guards Deployed per Area
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
						<label class="active" style="color:#64b5f6;"  for="dateReport">Date</label>	
				    <input placeholder=""  id="dateReport" type="date" class="datepicker">

				    <span><button class="btn blue tooltipped right waves-effect  " data-position="bottom" data-delay="50" data-tooltip="Generate PDF" style="margin-top: -40px;" id = 'btnPrint'><i class="material-icons">picture_as_pdf</i></button></span>
					</div>					
				</div>

			<div class="row">
				<div class="col l8 push-l2">
					<div id="reportPieChart" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>
				</div>
			</div>
				
			<div class="row">
				<div class="col s4 push-s7">
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
				
			<div clas="row">
				<div class="col l10 push-l1">
					<div class="container-fluid white" style="border-radius:10px;">
						<table id="tblguardperareaReport">
							<thead>
								<th>City</th>
								<th>Client</th>
								<th>Number of Guards</th>
							</thead>
							<tbody>
							</tbody>
						</table>
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
									<h5 style="font-weight:bold;">Total Number of Cities:</h5>
								</div>
								
								<div class="col s7">
									<h5 style="font-weight:bold;" id = 'totalCity'></h5>
								</div>
							</div>
							
							<div class="row">
								<div class="col s5">
									<h5 style="font-weight:bold;">Total Number of Clients:</h5>
								</div>

								<div class="col s7">
									<h5 style="font-weight:bold;" id = 'totalClient'></h5>
								</div>
							</div>
							
							<div class="row">
								<div class="col s5">
									<h5 style="font-weight:bold;">Total Number of Guards:</h5>
								</div>
								
								<div class="col s7">
									<h5 style="font-weight:bold;" id = 'totalGuard'></h5>
								</div>
							</div>
						</li>
						
					</ul>
				</div>	
			</div>
        </div>
     </div>
  </div>


@stop


@section('script')
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<script>
$(document).ready(function(){
  
  $('#dateReport').on('change', function(){
    var dateReport = $('#dateReport').val();
    $.ajax({
      type: "GET",
      url: "/reports/ReportGuard/get/PieInformation?dateReport=" + dateReport,
      success: function(data){
        setChart(data);
        setTable(data.tabularForm);
        setTotalNumber(data.totalNumber);
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');
      }
    });//ajax
  });

  $('#btnPrint').click(function(){
  	var dateReport = $('#dateReport').val();
  	if (dateReport != ''){	
  		window.location.href = '{{ URL::to("/getGuardDeployedparea") }}';
  	}else{
  		var toastContent = $('<span>Select Date. </span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
  	}
  });

  function setChart(data){
    $('#reportPieChart').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Guard - Client Summary'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'City',
            colorByPoint: true,
            data: data.series
        }],
        drilldown: {
            series: data.drilldown
        }
    });
  }  

  function setTable(data){
    var table = $('#tblguardperareaReport').DataTable();
    table.clear().draw();
    $.each(data, function(index, value){
      table.row.add([
        '<h>' + value.cityName + '</h>',
        '<h>' + value.strClientName + '</h>',
        '<h>' + value.clientCountGuard + '</h>',
      ]).draw();
    });
  }

  function setTotalNumber(data){
  	$('#totalCity').text(data.city);
  	$('#totalGuard').text(data.guard);
  	$('#totalClient').text(data.client);
  }
});
</script>

<script>
  $(document).ready(function(){
  	$("#tblguardperareaReport").DataTable({             
    	 "columns": [     	 
    	 null,
    	 null,
    	 null
    	 ] ,  
    	 "bLengthChange": false	
  	});
  	
  	search = $('#tblguardperareaReport').DataTable();
  		$("#mySearch").keyup(function(){
  			search.search($(this).val()).draw();
  		});
  });
</script>
	
<
@stop