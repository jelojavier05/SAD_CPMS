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
						<option value="Bank">Bank</option>
						<option value="School">School</option>
						<option value="Salon">Salon</option>
					</select>
					<label>Nature of Business</label>
				</div>
				
				<div class="input-field col s3">
					<select id="selectContractType">
						<option selected value="">All</option>
						<option value="Contract 1">Contract 1</option>
						<option value="Contract 2">Contract 2</option>
						<option value="Contract 3">Contract 3</option>
					</select>
					<label>Type of Contract</label>
				</div>
				
				<div class="input-field col s3">
					<select id="selectProvince">
						<option selected value=" ">All</option>
						<option value="Metro Manila">Metro Manila</option>
						<option value="Laguna">Laguna</option>
						<option value="Rizal">Rizal</option>
					</select>
					<label>Province</label>
				</div>
				
				<div class="input-field col s3">
					<select id="selectCity">
						<option selected value=" ">All</option>
						<option value="test">Test</option>
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
							<tr>
								<td>Bank</td>
								<td>Contract 2</td>
								<td>LandBank Almanza</td>
								<td>Juan Dela Cruz</td>
								<td>Metro Manila</td>
								<td>Las Pinas</td>
								
							</tr>
							
							<tr>
								<td>School</td>
								<td>Contract 1</td>
								<td>PUP Sta. Mesa</td>
								<td>Mang Kanor</td>
								<td>Rizal</td>
								<td>Antipolo</td>
								
							</tr>
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
		
		$("#tblqueryClients").DataTable({
             "columns": [           
            null,
			null,
			null,
			null,
			null,
			null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
//			"lengthMenu": [5,10,15,20],
//			"bFilter": false
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
