@extends('layout.maintenanceLayout')

@section('title')
Guards - Query
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
				<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Query - Guards</h3>
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
							<option value="Waiting">Waiting</option>
							<option value="Active">Active</option>
							<option value="Pending">Pending</option>
							<option value="Reliever">Reliever</option>
						</select>
						<label>Status</label>
					</div>
					<div class="input-field col s3">
						<select id="selectGender">
							<option selected value="">All</option>
							<option value="Male (M)">Male (M)</option>
							<option value="Female (F)">Female (F)</option>
						</select>
						<label>Gender</label>
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
					<div class="input-field col s3">
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
			<div class="row">
				<div class="col s12" style="">
					<table class="striped" style="border-radius:10px;" id="tblqueryGuards">						
						<thead>
							<tr>                                                                                                
								<th class="blue darken-1 white-text">License Number</th>
								<th class="blue darken-1 white-text">Name</th>															
								<th class="blue darken-1 white-text">Gender</th>
								<th class="blue darken-1 white-text">Status</th>
								<th class="blue darken-1 white-text">Client</th>
							</tr>
						</thead>
						<tbody>
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
		url: "{{action('QueryGuardController@getQueryGuard')}}",
		success: function(data){
			var table = $('#tblqueryGuards').DataTable();
			table.clear().draw();
			var gender;
			$.each(data,function(index,value){

				if (value.strGender == 'Male'){
					gender = 'Male (M)';
				}else{
					gender = 'Female (F)';
				}

				table.row.add([
					value.strLicenseNumber,
					value.strFirstName + ' ' + value.strLastName ,
					gender,
					value.status,
					value.clientName,
				]).draw();
			});
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax

	$('#btnPrint').click(function(){
		var dataTable = $('#tblqueryGuards').DataTable().rows( { filter : 'applied'} ).data();
		var strStatus = $("#selectStatus option:selected").text();
		var strGender = $("#selectGender option:selected").text();
		var strClientName = $("#selectClient option:selected").text();

		var arrLicenseNumber = [];
		var arrGuardName = [];
		var arrGender = [];
		var arrStatus = [];
		var arrClientName = [];

		$.each(dataTable, function(index,value){
			arrLicenseNumber.push(value[0]);
			arrGuardName.push(value[1]);
			arrGender.push(value[2]);
			arrStatus.push(value[3]);
			arrClientName.push(value[4]);
		});

		$.ajax({
			type: "POST",
			url: "{{action('PDFQueryGuardsController@postQueryGuard')}}",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				arrLicenseNumber: arrLicenseNumber,
				arrGuardName: arrGuardName,
				arrGender: arrGender,
				arrStatus: arrStatus,
				arrClientName: arrClientName,
				strStatus: strStatus,
				strGender: strGender,
				strClientName: strClientName,
			},
			success: function(data){
				window.location.href = '{{ URL::to("/getQueryGuards") }}';
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
			
		$("#tblqueryGuards").DataTable({
			"columns": [           
				null,
				null,
				null,
				null,
				null
			] ,  
			"pageLength":5,
			"bLengthChange": false
		});
		
		search = $('#tblqueryGuards').DataTable();
			$("#mySearch").keyup(function(){
				search.search($(this).val()).draw();
			});
		
		 var oTable = $('#tblqueryGuards').dataTable();
		 $('select#selectStatus').change( function() {
			 oTable.fnFilter( $(this).val(),3 ); 
		 });
		
		var oTable = $('#tblqueryGuards').dataTable();
		 $('select#selectGender').change( function() {
			 oTable.fnFilter( $(this).val(),2 );
		 });
		
		var oTable = $('#tblqueryGuards').dataTable();
		 $('select#selectClient').change( function() {
			 oTable.fnFilter( $(this).val(),4);
		 });
	});
</script>		
@stop
