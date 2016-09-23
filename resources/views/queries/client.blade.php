@extends('layout.maintenanceLayout')

@section('title')
Client - Query
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
				<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Query - Client</h3>
			</div>    
		</div>
   
	</div>
	<div class="col s12 push-s1" style="margin-top:-4%;">
		<div class="container blue-grey lighten-4 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
			<div class="row"></div>
			<div class="btn blue" id="btnTest">test</div>
			
			<div class="row">
				<div class="input-field col s4 offset-s8 ">
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
			<div class="row">				
				
				<div class="input-field col s3">
					<select id="selectNOB">
						<option selected value="">All</option>
						@foreach($arrNatureOfBusiness as $value)
						<option value="{{$value->strNatureOfBusiness}}">{{$value->strNatureOfBusiness}}</option>
						@endforeach
					</select>
					<label>Nature of Business</label>
				</div>
				
				<div class="input-field col s3">
					<select id="selectContractType">
						<option selected value="">All</option>
						@foreach($arrContractType as $value)
						<option value="{{$value->strTypeOfContractName}}">{{$value->strTypeOfContractName}}</option>
						@endforeach
					</select>
					<label>Type of Contract</label>
				</div>
				
				<div class="input-field col s3">
					<select id="selectProvince">
						<option selected value="" id = '0'>All</option>
						@foreach($arrProvince as $value)
						<option value="{{$value->strProvinceName}}" id = '{{$value->intProvinceID}}'>{{$value->strProvinceName}}</option>
						@endforeach
					</select>
					<label>Province</label>
				</div>
				
				<div class="input-field col s3">
					<select id="selectCity">
						<option selected value="">All</option>
					</select>
					<label>City</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12" style="">
					<table class="striped" style="border-radius:10px;" id="tblqueryClients">						
						<thead>
							<tr>                                                                                                
								<th class="blue darken-1 white-text">Nature of Business</th>
								<th class="blue darken-1 white-text">Type of Contract</th>
								<th class="blue darken-1 white-text">Name</th>								
								<th class="blue darken-1 white-text">Person In Charge</th>								
								<th class="blue darken-1 white-text">Province</th>
								<th class="blue darken-1 white-text">City</th>
                                
							</tr>
						</thead>

						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@stop
		
@section('script')
<script>

$(document).ready(function(){
	var arrCity;

	$.ajax({
		type: "GET",
		url: "{{action('QueryClientController@getQueryClient')}}",
		success: function(data){
			var table = $('#tblqueryClients').DataTable();
			table.clear().draw();

			$.each(data, function(index, value){
				table.row.add([
					value.strNatureOfBusiness,
					value.strTypeOfContractName,
					value.strClientName,
					value.strPersonInCharge,
					value.strProvinceName,
					value.strCityName,
				]).draw();
			});
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//get all city

	$.ajax({
		type: "GET",
		url: "{{action('QueryClientController@getCity')}}",
		success: function(data){
			arrCity = data;
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//get all city

	$('#btnTest').click(function(){
		var dataTable = $('#tblqueryClients').DataTable().rows( { filter : 'applied'} ).data();
		var strNatureOfBusiness = $("#selectNOB option:selected").text();
		var strTypeOfContractName = $("#selectContractType option:selected").text();
		var strProvinceName = $("#selectProvince option:selected").text();
		var strCityName = $("#selectCity option:selected").text();
		var arrNOB = [];
		var arrContract = [];
		var arrClientName = [];
		var arrPerson = [];
		var arrProvince = [];
		var arrCity = [];

		$.each(dataTable, function(index,value){
			arrNOB.push(value[0]);
			arrContract.push(value[1]);
			arrClientName.push(value[2]);
			arrPerson.push(value[3]);
			arrProvince.push(value[4]);
			arrCity.push(value[5]);
		});

		$.ajax({
			type: "POST",
			url: "{{action('PDFQueryClientController@postQueryClient')}}",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				arrNOB: arrNOB,
				arrContract: arrContract,
				arrClientName: arrClientName,
				arrPerson: arrPerson,
				arrProvince: arrProvince,
				arrCity: arrCity,
				natureOfBusiness: strNatureOfBusiness,
				contractType: strTypeOfContractName,
				province: strProvinceName,
				city: strCityName
			},
			success: function(data){
				window.location.href = '{{ URL::to("/getQueryClient") }}';
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	});

	$('#selectProvince').on('change', function(){
		var id = $(this).children(":selected").attr("id");
		$('#selectCity')
	    .find('option')
	    .remove();

	  $('#selectCity').append($("<option></option>")
			.attr("value", "")
			.attr("selected", "selected")
			.text('All'))
	  	.trigger('change'); 

		if (id != 0){
			$.each(arrCity, function(index, value){
				if (id == value.intProvinceID){
					$('#selectCity').append($("<option></option>")
						.attr("value", value.strCityName)
						.text(value.strCityName)); 
				}
			});
		}

		$('select').material_select();
	});
});
</script>

<script>
	$(document).ready(function(){
			
		$("#tblqueryClients").DataTable({
	           "columns": [           
	          null,
						null,
						null,
						null,
						null,
						null
	          ] ,  
			"pageLength":5,
			"bLengthChange": false
		});
		
		search = $('#tblqueryClients').DataTable();
			$("#mySearch").keyup(function(){
				search.search($(this).val()).draw();
			});
		
		var oTable = $('#tblqueryClients').dataTable();
		 $('select#selectNOB').change( function() {
			 oTable.fnFilter( $(this).val(),0 ); 
		 });
		
		var oTable = $('#tblqueryClients').dataTable();
		 $('select#selectContractType').change( function() {
			 oTable.fnFilter( $(this).val(),1 );
		 });
		
		var oTable = $('#tblqueryGuards').dataTable();
		 $('select#selectProvince').change( function() {
			 oTable.fnFilter( $(this).val(),4);
		 });
		
		var oTable = $('#tblqueryClients').dataTable();
		 $('select#selectCity').change( function() {
			 oTable.fnFilter( $(this).val(),5);
		 });
	});
</script>		
@stop
