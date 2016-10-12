@extends('layout.maintenanceLayout')

@section('title')
Guard Attendance
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2" style="margin-top:-25px;">
		<div class="row">
			<div class="col s6 offset-s6 pull-s6"><h4 class="blue-text" style="font-weight:bold;">Guard Attendance Log</h4></div>
		</div>
		<div class="row">									
			<div class="col s12">
				<div class="container-fluid grey lighten-2" style="padding:1%;margin-top:-20px; border-radius:5px;">
					<div class="row">
						<div class="input-field col s2">
							<input type="date" id="dateStart">
							<label class="active">Start Date</label>
						</div>							

						<div class="input-field col s2 offset-s6 pull-s5">
							<input type="date" id="dateEnd">
							<label class="active">End Date</label>
						</div>
						
						<!-- Guards-->
						<div class="col s7">
							<ul class='collection with-header'>
								<li class="collection-header">
									<h4 class="blue-text">Guards</h4>					
									<div class="row">
									<div class="col s12" style="margin-top:0px;">
										<table class="striped grey lighten-1" style="" id="tblGuards">
											<thead>
												<tr>
													<th>ID</th>
													<th>Guard License</th>
													<th>Name</th>
													<th>Client</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>																	
																			
											</tbody>
										</table>
									</div>							
								</div>
								</li>
							</ul>
						</div>
					<!-- Guards -->
						
						<div class="col s5" style="margin-top:0px; display:none;" id="containerDTR" >
							<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
								<li class="collection-header ">
									<span>
										<button class="btn blue waves-effect right" style="margin-top:5px;" id="btnPrint" >Print</button>
									</span>
									<h5 class="blue-text" style="font-weight:bold;">DTR</h5>
								</li>					
								<li class="collection-header grey lighten-5">
									<table class="striped grey lighten-1" id="tblDTR" style="width:100%;">							
										<thead>
											<th>In</th>
											<th>Out</th>								
										</thead>
							
										<tbody>											
										</tbody>
									</table>
								</li>										
							</ul>
						</div>						
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
	var guardID;
	var dateStart;
	var dateEnd;

	$.ajax({
		type: "GET",
		url: "{{action('QueryGuardController@getQueryGuard')}}",
		success: function(data){
			var table = $('#tblGuards').DataTable();
			table.clear().draw();
			var button;
			$.each(data, function(index,value){
				var strGuardName = value.strFirstName + ' ' + value.strLastName;
				button = '<button class="btn blue col s12 btnMore" id="'+value.intGuardID+'">View</button>';
				table.row.add([
					value.intGuardID,
					value.strLicenseNumber,
					strGuardName,
					value.clientName,
					button
				]).draw();
			});	
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax

	$('#tblGuards').on('click', '.btnMore', function(){
		dateStart = moment($('#dateStart').val());
		dateEnd = moment($('#dateEnd').val());
		guardID = this.id;

		if (dateStart.isValid() && dateEnd.isValid() && dateStart <= dateEnd){
			$("#containerDTR").css("display", "block");
			refreshTableDTR(guardID, dateStart, dateEnd);
		}else{
			var toastContent = $('<span>Check Date.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
		dateStart = dateStart.format();
		dateEnd = dateEnd.format();
	});

	$('#btnPrint').click(function(){
		if (guardID != null){
			var dataTable = $('#tblDTR').DataTable().rows( { filter : 'applied'} ).data();
			var arrClient = [];
			var arrTimeIn = [];
			var arrTimeOut = [];
			
			$.each(dataTable, function(index,value){
				arrClient.push(value[0]);
				arrTimeIn.push(value[1]);
				arrTimeOut.push(value[2]);
			});
			
			$.ajax({
				type: "POST",
				url: "{{action('PDFdtrController@postDTR')}}",
				beforeSend: function (xhr) {
					var token = $('meta[name="csrf_token"]').attr('content');
					if (token) {
						return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					}
				},
				data: {
					arrClient: arrClient,
					arrTimeIn: arrTimeIn,
					arrTimeOut: arrTimeOut,
					guardID: guardID,
					dateStart: dateStart,
					dateEnd: dateEnd
				},
				success: function(data){
					window.open('{{ URL::to("/getDTR") }}', '_blank');
				},
				error: function(data){
					var toastContent = $('<span>Error Database.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}
			});//ajax
		}else{
			var toastContent = $('<span>Choose Guard.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	function refreshTableDTR(guardID, dateStart, dateEnd){
		$.ajax({
			type: "GET",
			url: "/reportDTR/getDTR?guardID=" + guardID + "&dateStart=" + $('#dateStart').val() + "&dateEnd=" + $('#dateEnd').val(),
			success: function(data){
				console.log(data);
				var table = $('#tblDTR').DataTable();
				table.clear().draw();

				$.each(data, function(index,value){
					table.row.add([
						value.strClientName,
						value.strTimeIn,
						value.strTimeOut
					]).draw();
				});
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax	
	}
});
</script>

<script>
	$(document).ready(function(){
		$("#tblGuards").DataTable({
			"columns": [
				null,
				null,
				null,
				null,
				{ "orderable": false },
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
		
		$("#tblDTR").DataTable({
			 "columns": [
			null,
			{ "orderable": false },
			{ "orderable": false },
			] ,  		
			"pageLength":5,
			"bLengthChange": false,
			"bFilter": false
		});
		
		$('#btnView').click(function(){
			$("#containerDTR").css("display", "block");
		});
	});
</script>
@stop