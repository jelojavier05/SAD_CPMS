@extends('layout.maintenanceLayout')

@section('title')
Manual DTR
@endsection

@section('content')
<!-- Table -->
	<div class="row">
		<div class="col s10 offset-s2" style="margin-top:-25px;">
			<div class="row">
				<div class="col s5 offset-s7 pull-s7"><h4 class="blue-text" style="font-weight:bold;">Manual DTR</h4></div>
				<div class="col s6" style="margin-top:-10px;">
					<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
						<li class="collection-header">
							<table class="striped grey lighten-1" id="tblClients">
								<h5 class="blue-text" style="font-weight:bold;">Clients</h5>
								<thead>
									<th>ID</th>
									<th>Name</th>	
									<th></th>
								</thead>
								
								<tbody>
								</tbody>
							</table>
						</li>
					</ul>
				</div>
				
				<div class="col s6" style="margin-top:25px;">
					<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
						<li class="collection-header">
							<table class="striped grey lighten-1" id="tblGuards">
								<h5 class="blue-text" style="font-weight:bold;">Guards</h5><span><button class="btn green waves-effect right" style="margin-top:-40px; display:none;" id="btnAddGuardModal">ADD</button></span>
								<thead>
									<th>ID</th>
									<th>Name</th>	
									<th></th>
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
<!-- Table -->

<!--modal add guard-->
	<div id="modalAddGuard" class="modal modal-fixed-footer ci" style="overflow:hidden; width:60% !important; margin-top:-60px !important;  max-height:100% !important; height:650px !important;">      
		<div class="modal-header">
			<div class="h">
				<h3><center>Guards</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<ul class="collection with-header">					
						<li class="collection-item">
							<div class="row">
								<div class="col s12">		
									<table class="striped white" id="tblWaitingGuards" style="width:100%;">
											<thead>
												<tr>
													<th class="grey ligten-1"></th>
													<th class="grey ligten-1">ID</th>
													<th class="grey ligten-1">Name</th>
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
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect green" name="action" style="margin-right: 30px;" id = "btnAddGuard">Add
			</button>
		</div>	
	</div>
<!--modal add guard end-->

<!--modal add dtr-->
	<div id="modalAddDTR" class="modal modal-fixed-footer ci" style="overflow:hidden; width:45% !important; margin-top:10px !important;  max-height:100% !important; height:500px !important;">      
		<div class="modal-header">
			<div class="h">
				<h3 id = 'strGuardNameModal'><center></center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<ul class="collection with-header">
						<li class="collection-header">
							<div class="row">
								<div class="col s4">
									<h5 class="blue-text" style="font-weight:bold;">Time Present</h5>
								</div>
							</div>
						</li>
						
						<li class="collection-item">
							<div class="row">
								<div class="input-field col s6">
									<input type="datetime-local" id="datetimeFrom">
									<label class="active">From</label>
								</div>
								
								<div class="input-field col s6">
									<input type="datetime-local" id="datetimeTo">
									<label class="active">To</label>
								</div>
							</div>
						</li>					
					</ul>
				</div>
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect blue" style="margin-right: 30px;" id = "btnSave">Save
			</button>
		</div>	
	</div>
<!--modal add dtr end-->
@stop

@section('script')
<script>
$(document).ready(function(){
	var clientID;
	var guardID;
	var arrGuardTable; 
	var arrGuardWaiting;

	$.ajax({
		type: "GET",
		url: "{{action('ClientController@getActiveClient')}}",
		success: function(data){
			var button;
			var table = $('#tblClients').DataTable();
			table.clear().draw();

			$.each(data, function(index,value){
				button = '<button class="btn blue waves-effect btnClient" id = "'+value.intClientID+'">More</button>'
				table.row.add([ 
					'<h>' + value.intClientID + '</h>',
					'<h>' + value.strClientName + '</h>',
					button
				]).draw();
			});
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//get active client

	$.ajax({
		type: "GET",
		url: "{{action('ClientController@getGuardWaiting')}}",
		success: function(data){
			 var checkboxItem;
			 var table = $('#tblWaitingGuards').DataTable();
			 table.clear().draw();
			 arrGuardWaiting = data;
			 $.each(data, function(index, value){
			 	checkboxItem = '<input type="checkbox" value = "'+value.intGuardID+'" id="checkbox'+value.intGuardID+'"/><label for="checkbox'+value.intGuardID+'"></label>';
			 	table.row.add([
			 		checkboxItem, 
				 	'<h>' + value.intGuardID + '</h>',
				 	'<h>' + value.strFirstName + value.strLastName + '</h>',
			 	]).draw();
			 });
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//get guard waiting

	$('#tblClients').on('click', '.btnClient', function(){
		clientID = this.id;
		$.ajax({
			type: "GET",
			url: "/clients/guards?id=" + clientID,
			success: function(data){
				arrGuardTable = data;
				refreshGuardTable();
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			},async:false
		});//get active guards in client.
	});

	$('#tblGuards').on('click', '.btnDTR', function(){
		guardID = this.id;
		$('#strGuardNameModal').text($('#guardName' + guardID).text());
		$('#strGuardNameModal').css('text-align','center');

		$('#modalAddDTR').openModal();
	});

	$('#btnSave').click(function(){
		var datetimeFrom = moment($('#datetimeFrom').val());
		var datetimeTo = moment($('#datetimeTo').val());
		var now = moment();

		if (datetimeFrom.isValid() && datetimeTo.isValid() && 
			datetimeFrom < now && datetimeTo < now &&
			datetimeFrom < datetimeTo){

			datetimeFrom = datetimeFrom.format();
			datetimeTo = datetimeTo.format();
			$.ajax({
				type: "POST",
				url: "{{action('ManualDTRController@insertManualDTR')}}",
				beforeSend: function (xhr) {
					var token = $('meta[name="csrf_token"]').attr('content');
					if (token) {
						return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					}
				},
				data: {
					clientID: clientID,
					guardID: guardID,
					datetimeFrom: datetimeFrom,
					datetimeTo: datetimeTo
				},
				success: function(data){
					var toastContent = $('<span>Successful</span>');
					Materialize.toast(toastContent, 3500,'green', 'edit');
					$('#datetimeFrom').val('');
					$('#datetimeTo').val('');
				},
				error: function(data){
					var toastContent = $('<span>Error Database.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}
			});//ajax
		}else{
			var toastContent = $('<span>Invalid date</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	$('#btnAddGuardModal').click(function(){
		$('#modalAddGuard').openModal();
	});

	$('#btnAddGuard').click(function(){
		getCheckedGuard();
		refreshGuardTable();
		$('#modalAddGuard').closeModal();
		$('input:checkbox').removeAttr('checked'); //uncheck all the checkbox
	});

	function refreshGuardTable(){
		var button;
		var table = $('#tblGuards').DataTable();
		table.clear().draw();

		$('#btnAddGuardModal').show();

		$.each(arrGuardTable,function(index,value){
			button = '<button class="btnDTR green btn waves-effect tooltipped" data-tooltip="Add DTR" data-delay="50" data-position="bottom" id="'+value.intGuardID+'"><i class="material-icons">add</i></button>';
			table.row.add([
				'<h>' + value.intGuardID + '</h>',
				'<h id = "guardName'+value.intGuardID+'">' + value.strFirstName + ' ' + value.strLastName + '</h>',
				button
			]).draw();
		});
	}

	function getCheckedGuard(){
    var strGuardID;
		$.each(arrGuardWaiting, function(index,value){
			strGuardID = 'checkbox' + value.intGuardID;
			if ($('#' + strGuardID).is(':checked') && $.inArray(value,arrGuardTable) == -1){
				arrGuardTable.push(value);
      }
		});

	}//add waiting guard to guard table
});
</script>

<script>
	$(document).ready(function(){
		$("#tblClients").DataTable({
			"columns": [
				null,
				null,
				{"orderable":false}
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
		
		$("#tblGuards").DataTable({
			"columns": [
				null,
				null,
				{"orderable":false}
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
		
		$("#tblWaitingGuards").DataTable({
			"columns": [
				{"orderable":false},
				null,
				null				
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
	});
</script>
@stop