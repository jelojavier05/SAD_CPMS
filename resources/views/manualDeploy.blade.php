@extends('layout.maintenanceLayout')

@section('title')
Manual Deployment
@endsection

@section('content')
<!-- Table -->
	<div class="row">
		<div class="col s10 offset-s2" style="margin-top:-25px;">
			
			<div class="row">
				<div class="col s5 offset-s7 pull-s7"><h4 class="blue-text">Manual Deployment</h4></div>
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
								<h5 class="blue-text" style="font-weight:bold;">Guards</h5>							
								<thead>
									<th>ID</th>
									<th>Name</th>	
									<th>Swap</th>
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

<!--modal swap guard-->
	<div id="modalSwapGuard" class="modal modal-fixed-footer ci" style="overflow:hidden; width:60% !important; margin-top:-30px !important;  max-height:100% !important; height:600px !important;">      
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
								<div class="col s6 offset-s6 pull-s6">
									<h5>Choose an Option:</h5>
								</div>
								<div class="col s6">
									<input class="with-gap" type="radio" name="deploymentType" id="test1" value="0" checked="checked">
									<label for="test1">Permanent</label>
								</div>
								
								<div class="col s6">
									<input class="with-gap" type="radio" name="deploymentType" id="test2" value="1">
									<label for="test2">Reliever</label>
								</div>
							</div>
						</li>
						<div class="deploymentType animated slideInLeft" style="display:none;">	
							<li class="collection-item">
								<div class="row">
									<div class="input-field col s6">
										<input type="date" id="dateTo">
										<label class="active">To</label>
									</div>
								</div>
							</li>
							<li class="collection-item"></li>
						</div>
						
						<li class="collection-item">
							<div class="row">
								<div class="col s12">		
									<table class="striped white" id="tblWaitingGuards" style="width:100%;">
											<thead>
												<tr>
													<th class="grey ligten-1">Action</th>
													<th class="grey ligten-1">ID</th>
													<th class="grey ligten-1">Name</th>
													<th class="grey ligten-1">Location</th>
												</tr>
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
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect green" name="action" style="margin-right: 30px;" id = "btnOK">OK
			</button>
		</div>	
	</div>
<!--modal swap guard end-->
@stop

@section('script')
<script>
$(document).ready(function(){
	var selectedGuardID;
	var selectedClientID;

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
			var radio;
			var table = $('#tblWaitingGuards').DataTable();
			table.clear().draw();
			$.each(data, function(index, value){
				radio = '<input class="with-gap" name="guardWaiting" type="radio" value = "'+value.intGuardID+'" id="radio'+value.intGuardID+'" /><label for="radio'+value.intGuardID+'"></label>';
				table.row.add([
					radio, 
			 	'<h>' + value.intGuardID + '</h>',
			 	'<h>' + value.strFirstName + ' ' +value.strLastName + '</h>',
			 	'<h>' + value.strCityName + ', ' + value.strProvinceName + '</h>'
				]).draw();
			});//foreach
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//get guard waiting

	$('#tblClients').on('click', '.btnClient', function(){
		selectedClientID = this.id;
		$.ajax({
			type: "GET",
			url: "/clients/guards?id=" + selectedClientID,
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

	$('#tblGuards').on('click', '.btnReplace', function(){
		selectedGuardID = this.id;
		$('#strGuardNameModal').text($('#guardName' + selectedGuardID).text());
		$('#strGuardNameModal').css('text-align','center');

		$('#modalSwapGuard').openModal();
	});

	$('#btnOK').click(function(){
		process();
		// if($('input[name=guardWaiting]').is(':checked')){
		// 	swal({   
		// 		title: "Are you sure?",
		// 		text: "Changes will be saved",
		// 		type: "warning",
		// 		showCancelButton: true,
		// 		confirmButtonColor: "#00e676",
		// 		confirmButtonText: "Save",
		// 		closeOnConfirm: false },
		// 	function(){   
		// 		process();
		// 	});
		// }else{
		// 	var toastContent = $('<span>Please Select Guard.</span>');
		// 	Materialize.toast(toastContent, 1500,'red', 'edit');
		// }		
	});

	function process(){
		var deploymentType = $('input[name=deploymentType]:checked').val();	
		var guardWaitingID = $('input[name=guardWaiting]:checked').val();
		if(deploymentType == 0){
			manualDatabasePermanent(guardWaitingID);
		}else if (deploymentType == 1){
			var dateTo = moment($('#dateTo').val());
			if(checkInput(dateTo)){
				manualDatabaseReliever(guardWaitingID, dateTo);
			}
		}//if else
	}

	function manualDatabasePermanent(guardWaitingID){
		$.ajax({
			type: "POST",
			url: "{{action('ManualDeployController@manualDeployPermanent')}}",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				clientID: selectedClientID,
				replaceGuardID: selectedGuardID,
				guardWaitingID: guardWaitingID
			},
			success: function(data){
				swal({
					title: "Success!",
					text: "Replacement Guard Success!",
					type: "success"
				},
					function(){
					window.location.href = '{{ URL::to("/manualdeploy") }}';
				});
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	}

	function manualDatabaseReliever(guardWaitingID, dateTo){
		$.ajax({
			type: "POST",
			url: "{{action('ManualDeployController@manualDeployReliever')}}",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				clientID: selectedClientID,
				replaceGuardID: selectedGuardID,
				guardWaitingID: guardWaitingID,
				dateTo: dateTo.format()
			},
			success: function(data){
				swal({
					title: "Success!",
					text: "Reliever Guard Success!",
					type: "success"
				},
					function(){
					window.location.href = '{{ URL::to("/manualdeploy") }}';
				});
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	}

	function checkInput(dateTo){
		var now = moment();
		now.millisecond(0);
		now.second(0);
		now.minute(0);
		now.hour(0);
		var checker;
		if(dateTo.isValid() && dateTo >= now){
			checker = true;
		}else{
			checker = false;
			var toastContent = $('<span>Date Error.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
		return checker;
	}

	function refreshGuardTable(){
		var button;
		var table = $('#tblGuards').DataTable();
		table.clear().draw();

		$.each(arrGuardTable,function(index,value){
			button = '<button class="blue btn waves-effect tooltipped btnReplace" data-tooltip="Replace" data-delay="50" data-position="bottom" id="'+value.intGuardID+'"><i class="material-icons">swap_horiz</i></button>';
			table.row.add([
				'<h>' + value.intGuardID + '</h>',
				'<h id = "guardName'+value.intGuardID+'">' + value.strFirstName + ' ' + value.strLastName + '</h>',
				button
			]).draw();
		});
	}
});
</script>

<script>
	$(document).ready(function(){
		
			$('input[name="deploymentType"]').click(function(){
				if($(this).attr("value")=="1"){           
						$(".deploymentType").show();
					}else{
					 $(".deploymentType").hide();
					}
				});
			
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
					null,
					null
				] ,  
				"pageLength":5,
				"lengthMenu": [5,10,15,20]
			});
	});
</script>
@stop