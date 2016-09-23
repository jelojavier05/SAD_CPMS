@extends('layout.maintenanceLayout')

@section('title')
Guns - Query
@endsection

@section('content')
<style>
	.dataTables_filter
		{
	    display: none;
		}
</style>

<div class="row" style="margin-top:-30px;">
	<div class="row">     
		<div class="row">
			<div class="col s5 push-s3" style="margin-left:-2%">
				<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Query - Guns</h3>
			</div>
		</div>
	</div>
	<div class="col s12 push-s1" style="margin-top:-4%;">
		<div class="container blue-grey lighten-4 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
			<div class="row"></div>	
			<div class="btn blue" id="btnPrint">Generate PDF</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field col s3">
						<select id="selectStatus">
							<option selected value="">All</option>
							<option value="Inventory">Inventory</option>
							<option value="Deployed">Deployed</option>
							<option value="Pending">Pending</option>	
							<option value="Defective">Defective</option>						
						</select>
						<label>Status</label>
					</div>
					<div class="input-field col s3">
						<select id="selectGunType">
							<option selected value="">All</option>
							@foreach($arrGunType as $value)
							<option value="{{$value->strTypeOfGun}}">{{$value->strTypeOfGun}}</option>
							@endforeach
						</select>
						<label>Type of Gun</label>
					</div>
					<div class="input-field col s3">
						<select id="selectClient">
							<option selected value = "">All</option>
							<option value="None">None</option>
							@foreach($arrClient as $value)
							<option value="{{$value->strClientName}}">{{$value->strClientName}}</option>
							@endforeach
						</select>
						<label>Client</label>
					</div>
					<div class="col s3">
						<div class="input-field col s12">
							<nav style="height:55px;">
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
			</div>
			<div class="row">
				<div class="col s12" style="">
					<table class="striped" style="border-radius:10px;" id="tblqueryGuns">												
						<thead>
							<tr>
								<th class="blue darken-1 white-text">Type of Gun</th>								
								<th class="blue darken-1 white-text">License Number</th>
								<th class="blue darken-1 white-text">Name</th>
								<th class="blue darken-1 white-text">Status</th>
								<th class="blue darken-1 white-text">Client</th>  
							</tr>
						</thead>												
						<tbody>
							<tr>
								<td>Pistol</td>
								<td>123-123</td>
								<td>Glock</td>
								<td>Available</td>
								<td>ChinaBank Pilar</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
		
@section('script')
<script>
$(document).ready(function(){
	$.ajax({
		type: "GET",
		url: "{{action('QueryGunController@getGun')}}",
		success: function(data){
			var table = $('#tblqueryGuns').DataTable();
			table.clear().draw();

			$.each(data, function(index, value){
				table.row.add([
					value.strTypeOfGun,
					value.strLicenseNumber,
					value.strGunName,
					value.status,
					value.clientName
				]).draw();
			});
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax

	$('#btnPrint').click(function(){
		var dataTable = $('#tblqueryGuns').DataTable().rows( { filter : 'applied'} ).data();
		var strStatus = $("#selectStatus option:selected").text();
		var strGunType = $("#selectGunType option:selected").text();
		var strClientName = $("#selectClient option:selected").text();

		var arrGunType = [];
		var arrLicenseNumber = [];
		var arrGunName = [];
		var arrStatus = [];
		var arrClientName = [];

		$.each(dataTable, function(index,value){
			arrGunType.push(value[0]);
			arrLicenseNumber.push(value[1]);
			arrGunName.push(value[2]);
			arrStatus.push(value[3]);
			arrClientName.push(value[4]);
		});

		$.ajax({
			type: "POST",
			url: "{{action('PDFQueryGunController@postQueryGun')}}",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				arrGunType: arrGunType,
				arrLicenseNumber: arrLicenseNumber,
				arrGunName: arrGunName,
				arrStatus: arrStatus,
				arrClientName: arrClientName,
				strStatus: strStatus,
				strGunType: strGunType,
				strClientName: strClientName,
			},
			success: function(data){
				window.location.href = '{{ URL::to("/getQueryGun") }}';
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
			
			$("#tblqueryGuns").DataTable({
	      "columns": [           
					null,
					null,
					null,
					null,
					null
	     ] ,  
				"pageLength":5,
				"bLengthChange": false,
			});
		
			search = $('#tblqueryGuns').DataTable();
				$("#mySearch").keyup(function(){
					search.search($(this).val()).draw();
				});
			 var oTable = $('#tblqueryGuns').dataTable();
			 $('select#selectStatus').change( function() {
				 oTable.fnFilter( $(this).val(),3 ); 
			 });
			
			var oTable = $('#tblqueryGuns').dataTable();
			 $('select#selectGunType').change( function() {
				 oTable.fnFilter( $(this).val(),0 ); 
			 });
			
			var oTable = $('#tblqueryGuns').dataTable();
		 $('select#selectClient').change( function() {
			 oTable.fnFilter( $(this).val(),4 ); 
		 });
		 
	});
	
</script>		
@stop
