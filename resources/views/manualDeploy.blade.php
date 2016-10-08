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
								<tr>
									<td>1</td>
									<td>ChinaBank Talon</td>
									<td><button class="btn blue waves-effect">More</button></td>
								</tr>
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
								<th>License Number</th>
								<th>Name</th>	
								<th></th>
							</thead>
							
							<tbody>
								<tr>
									<td>123-321</td>
									<td>Andre Iguodala</td>
									<td><button class="blue btn waves-effect tooltipped" data-tooltip="Replace" data-delay="50" data-position="bottom" id="btnReplace"><i class="material-icons">swap_horiz</i></button></td>
								</tr>
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
			<h3><center>Guards</center></h3>  
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
												<th class="grey ligten-1"></th>
												<th class="grey ligten-1">License Number</th>
												<th class="grey ligten-1">Name</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<input class="with-gap" name="guards" type="radio" id="test1" />
													<label for="test1"></label>
												</td>
												<td>123-123-123</td>
												<td>Jordan Clarkson</td>
											</tr>

											<tr>
												<td>
													<input class="with-gap" name="guards" type="radio" id="test2" />
													<label for="test2"></label>
												</td>
												<td>456-456-456</td>
												<td>Brandon Ingram</td>
											</tr>
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
		
		$('#btnReplace').click(function(){
			$("#modalSwapGuard").openModal();
		})
				
		
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