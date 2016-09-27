@extends('client.ClientDashboard')
@section('title')
Incident Reports - Client
@endsection


@section('content')
<!-- Table -->
	<div class="row" style="margin-top:-30px;">      
		<div class="row"> 
			<div class="row">
				<div class="col s5 push-s3" style="margin-left:-2%">
					<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Incident Reports</h3>
				</div>
			</div>
		</div>
		<div class="col s12 push-s1" style="margin-top:-4%">
			<div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;padding-top:1%;">
				<div class="row">
					<div class="col s12" style="margin-top:-5px;">
						<table class="striped white" style="border-radius:10px;" id="tblIncidentReports">
							<thead>
								<tr>
									<th style="width:50px;" class="grey lighten-1 "></th>                                
									<th class="grey lighten-1 ">Date</th>
									<th class="grey lighten-1 ">Guard Name</th>
									<th class="grey lighten-1">Exact Location</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($arrReport as $value)
								<tr>
									<td>
										<button class="btn blue btnOpenReport waves-effect" id = '{{$value->intReportIncidentID}}'><i class="material-icons">open_in_browser</i></button>
									</td>
									<td>{{$value->strDateReport}}</td>
									<td>{{$value->strFirstName}} {{$value->strLastName}}</td>
									<td>{{$value->strLocation}}</td>
								</tr>													
								@endforeach	
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Table -->

<!--modal reports-->
	<div id="modalReport" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
		<div class="modal-header">
			<div class="h">
				<h3><center>Report</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<ul class="collection with-header" id="collectionActive">
						<li class="collection-header">
							<div class="row">
								<div class="col s3">
									<h5 style="font-weight:bold;">Date/Time:</h5>
								</div>
								<div class="col s5">
									<h5 id = 'datetimeIncident'></h5>
								</div>
							</div>
						</li>
						<li class="collection-header">
							<div class="row">
								<div class="col s12">
									<h5 style="font-weight:bold;">Exact Location of the Incident:</h5>							
									<div id='strLocation'></div>							
							</div>
						</li>
						<li class="collection-header" style="font-weight:bold;">
							<div class="row">
								<div class="col s5">
									<h5 style="font-weight:bold;">Author:</h5>
								</div>
								
								<div class="col s6 pull-s3">								
									<h5 id="strAuthor" style="font-weight:normal"></h5>
									
								</div>
							</div>
						</li>
						<li class="collection-header">
							<div class="row">
								<div class="col s12">
									<h5 style="font-weight:bold;">Description of the Incident:</h5>							
									<div id='strDescription'></div>							
							</div>
						</li>
						
						<li class="collection-header">
							<div class="row">
								<div class="col s12">
									<table class="striped grey lighten-1" id="tblWitness" style="width:100%;">
										<h5 style="font-weight:bold;">Witnesses</h5>
										<thead>
											<th>Name</th>
											<th>Contact Number</th>
										</thead>
										
										<tbody>
										</tbody>
									</table>
								</div>	
							</div>
						</li>
					</ul><div class="row"></div>
				</div>
			</div>
		</div>
		<div class="modal-footer ci modal-close" style="background-color: #00293C;">
			<button class="btn green waves-effect" name="" id = "" style="margin-right: 30px;">OK
			</button>
	    </div>
	</div>
<!--modal reports end-->
@stop

@section('script')

<script>
$(document).ready(function(){
	$('#tblIncidentReports').on('click', '.btnOpenReport', function(){
		var incidentReportID = this.id;
		$.ajax({
			type: "GET",
			url: "/incidentreportsadmin/get/IncidentReportInformation?incidentReportID=" + incidentReportID,
			success: function(data){
				$('#modalReport').openModal();
				$('#datetimeIncident').text(data.strDateIncident);
				$('#strAuthor').text(data.strFirstName + ' ' + data.strLastName);
				$('#strDescription').text(data.strDescription);
				$('#strLocation').text(data.strLocation);

				var arrWitness = data.witness;
				var table = $('#tblWitness').DataTable();
				table.clear().draw();
				$.each(arrWitness, function(index,value){
					table.row.add([
						'<h>' + value.strWitnessName + '</h>',
						'<h>' + value.strContactNumber + '</h>',
					]).draw();
				});
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	});
});
</script>

<script>
	$(document).ready(function(){
		$("#tblIncidentReports").DataTable({             
			 "columns": [     
			 {"orderable": false},
			 null,
			 null,
			 null
			 ] ,  
			 "pageLength":5,
			 "lengthMenu": [5,10,15,20],		
		});	
			
		$("#tblWitness").DataTable({             
			 "columns": [     	 
			 null,
			 null
			 ] ,  
			 "pageLength":5,
			 "lengthMenu": [5,10,15,20],		
		});
	});
</script>
@stop