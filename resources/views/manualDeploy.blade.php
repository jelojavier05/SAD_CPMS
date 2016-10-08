@extends('layout.maintenanceLayout')

@section('title')
Manual Deployment
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2" style="margin-top:-25px;">
		<div class="row">
			
			<div class="col s6" style="margin-top:25px;">
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

<!--modal swap guard-->
<div id="modalSwapGuard" class="modal modal-fixed-footer ci" style="overflow:hidden; width:60% !important; margin-top:-60px !important;  max-height:100% !important; height:650px !important;">      
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
							<div class="input-field col s6">
								<input type="date" id="">
								<label class="active">From</label>
							</div>
							
							<div class="input-field col s6">
								<input type="date" id="">
								<label class="active">To</label>
							</div>
						</div>
					</li>
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
				</ul>
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
				radio = '<input class="with-gap" name="guards" type="radio" value = "'+value.intGuardID+'" id="radio'+value.intGuardID+'" /><label for="radio'+value.intGuardID+'"></label>';
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

	$('#tblGuards').on('click', '.btnReplace', function(){
		guardID = this.id;
		$('#strGuardNameModal').text($('#guardName' + guardID).text());
		$('#strGuardNameModal').css('text-align','center');

		$('#modalSwapGuard').openModal();
	});

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
			
			$("#btnOK").click(function(){
				swal({   
					title: "Are you sure?",
					text: "Changes will be saved",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#00e676",
					confirmButtonText: "Save",
					closeOnConfirm: false },
					 function(){   
					
				});
			})
	});
</script>
@stop