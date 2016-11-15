@extends('layout.maintenanceLayout')

@section('title')
Guard Transfer History
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2" style="margin-top:-25px;">
		<div class="row">
		<!-- Guard Table -->
			<div class="col s5">
				<div class="container-fluid grey lighten-2 z-depth-2 animated fadeInUp" style="border-radius: 10px; margin-top:10px; padding-left:2%;padding-right:2%;">
					<h4 class="blue-text">Guards</h4>
					<div class="row">
						<div class="col s12" style="margin-top:0px;">
							<table class="striped grey lighten-1" style="" id="tblGuards">
								<thead>
									<tr>
										<th>ID</th>
										<th>Guard License</th>
										<th>Name</th>
										<th style="width:50px;"></th>
									</tr>
								</thead>
								<tbody>								
									@foreach($arrGuard as $value)
									<tr>
										<td>{{$value->intGuardID}}</td>
										<td>{{$value->strLicenseNumber}}</td>
										<td>{{$value->strFirstName}} {{$value->strLastName}}</td>
										<td>
											<button class=" btn blue btnMore col s12" id="{{$value->intGuardID}}">View</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<!-- Guard Table -->

		<!-- Guard Information -->
			<div class="col s7" style="margin-top:10px;">
				<ul class="collection with-header animated fadeInUp sidenavhover" style="max-height:550px;">

					<li class="collection-header">
						<table class="striped grey lighten-1" id="tblLog">
							<h5 style="font-weight:bold;">Transfer History</h5>
							<thead>
								<th>Date (Y-M-D)</th>
								<th>Client</th>
								<th>Status</th>
							</thead>
							
							<tbody>
							</tbody>
						</table>
					</li>
					
					<li class="collection-header"><h5 style="font-weight:bold;">Personal Information</h5>
					<span><button class="btn blue tooltipped right waves-effect  " data-position="bottom" data-delay="50" data-tooltip="Generate PDF" style="margin-top: -40px;" id = 'btnPrint'><i class="material-icons">picture_as_pdf</i></button></span>
					</li>
					<li class="collection-item">
						<div class='row'>
							<div class='col s4' style="font-weight:bold;">
								First Name:<div style="font-weight:normal;" id = "strFirstName">&nbsp;&nbsp;&nbsp;</div>
							</div>
					
							<div class='col s4' style="font-weight:bold;">
								Middle Name:<div style="font-weight:normal;" id = "strMiddleName">&nbsp;&nbsp;&nbsp;</div>
							</div>
					
							<div class='col s4' style="font-weight:bold;">
								Last Name:<div style="font-weight:normal;" id = "strLastName">&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
					</li>
		  
					<li class="collection-item" style="font-weight:bold; ">License Number:<div style="font-weight:normal;" id = "strLicenseNumber">&nbsp;&nbsp;&nbsp;</div>
					</li>
		  	
					<li class="collection-item" style="font-weight:bold; ">Address:<div style="font-weight:normal;" id = "strAddress">&nbsp;&nbsp;&nbsp;</div>
					</li>		  		  	  
		  
					<li class="collection-item" style="font-weight:bold; ">Place of Birth:<div style="font-weight:normal;" id = "strPlaceBirth">&nbsp;&nbsp;&nbsp;</div>
					</li>
		  
					<li class="collection-item">
						<div class='row'>
							<div class='col s4' style="font-weight:bold;">
								Age:<div style="font-weight:normal;" id = "strAge">&nbsp;&nbsp;&nbsp;</div>
							</div>
					
							<div class='col s4' style="font-weight:bold;">
								Gender:<div style="font-weight:normal;" id = "strGender">&nbsp;&nbsp;&nbsp;</div>
							</div>
					
							<div class='ol s4' style="font-weight:bold;">
								Civil Status:<div style="font-weight:normal;" id = "strCivilStatus">&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
					</li>
		  
					<li class="collection-item">
						<div class='row'>
							<div class='col s6' style="font-weight:bold;">
								Contact Number (Mobile):<div style="font-weight:normal;" id = "strContactNumberMobile">&nbsp;&nbsp;&nbsp;</div>
							</div>
					
							<div class='col s6' style="font-weight:bold;">
								Contact Number (Landline):<div style="font-weight:normal;" id = "strContactNumberLandline">&nbsp;&nbsp;&nbsp;</div>
							</div>										
						</div>
					</li>
				</ul>
			</div>
		<!-- Guard Information -->
		</div>
	</div>
</div>
@stop

@section('script')

<script>
$(document).ready(function(){
	var guardID = null;
	$('#tblGuards').on('click', '.btnMore', function(){
		guardID = this.id;
		$.ajax({
			type: "GET",
			url: "/sgtransferlog/get/guardInformation?guardID=" + guardID,
			success: function(data){
				var guardInfo = data.guardInformation;
				$('#strFirstName').text(guardInfo.strFirstName);
				$('#strMiddleName').text(guardInfo.strMiddleName);
				$('#strLastName').text(guardInfo.strLastName);
				$('#strLicenseNumber').text(guardInfo.strLicenseNumber);
				$('#strAddress').text(guardInfo.strAddress + ' ' + guardInfo.strProvinceName + ', ' + guardInfo.strCityName);
				$('#strPlaceBirth').text(guardInfo.strPlaceBirth);
				$('#strAge').text(guardInfo.age);
				$('#strGender').text(guardInfo.strGender);
				$('#strCivilStatus').text(guardInfo.strCivilStatus);
				$('#strContactNumberMobile').text(guardInfo.strContactNumberMobile);
				$('#strContactNumberLandline').text(guardInfo.strContactNumberLandline);

				var trackRecord = data.trackRecord;
				var table = $('#tblLog').DataTable();
				var dateEnd;
				var boolStatus;
				table.clear().draw();
				$.each(trackRecord, function(index, value){

					table.row.add([
						'<h>' + value.dateStart + ' - ' + value.dateEnd +'</h>',
						'<h>' + value.strClientName + '</h>',
						'<h>' + value.boolStatus + '</h>',
					]).draw();
				});
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	});

	$('#btnPrint').click(function(){
		if(guardID != null){
			window.open('{{ URL::to("/getTrackTransferRec") }}', '_blank');
		}else{
			var toastContent = $('<span>Choose Guard.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});
});	
</script>

<script>
	$(document).ready(function(){
		$("#tblGuards").DataTable({
			"columns": [
				null,
				null,
				null,
				{ "orderable": false },
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
		
		$("#tblLog").DataTable({
			 "columns": [
			null,
			null,
			null
			] ,  
			"order": [[ 0, "desc" ]],
			"pageLength":5,
			"bLengthChange": false,
			"bFilter": false
		});
	});
</script>

@stop