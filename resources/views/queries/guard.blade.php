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
			
			<div class="row">
				<div class="col s4 offset-s8">
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
			<div class="row">
				<div class="col s8">
					<div class="input-field col s4">
						<select id="selectStatus">
							<option selected value="">All</option>
							<option value="Active">Active</option>
							<option value="Pending/Waiting">Pending/Waiting</option>
							<option value="Reliever">Reliever</option>
						</select>
						<label>Status</label>
					</div>
					<div class="input-field col s4">
						<select id="selectGender">
							<option selected value="">All</option>
							<option value="Male (M)">Male (M)</option>
							<option value="Female (F)">Female (F)</option>
						</select>
						<label>Gender</label>
					</div>
					<div class="input-field col s4">
						<select id="selectClient">
							<option selected>All</option>
							<option value="LandBank Almanza">LandBank Almanza</option>
							<option value="ChinaBank Pilar">ChinaBank Pilar</option>
							<option value="Pacific Sta. Mesa">Pacific Sta. Mesa</option>
						</select>
						<label>Client</label>
					</div>
				</div>
				<div class="col s4">
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
			<div class="row">
				<div class="col s12" style="">
					<table class="striped" style="border-radius:10px;" id="dataTable">						
						<thead>
							<tr>                                                                                                
								<th class="blue darken-1 white-text">Name</th>
								<th class="blue darken-1 white-text">License Number</th>								
								<th class="blue darken-1 white-text">Gender</th>
								<th class="blue darken-1 white-text">Status</th>
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
		url: "{{action('')}}",
		beforeSend: function (xhr) {
			var token = $('meta[name="csrf_token"]').attr('content');
			if (token) {
				return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			}
		},
		data: {

		},
		success: function(data){

		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax
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
	
		search = $('#dataTable').DataTable();
			$("#mySearch").keyup(function(){
				search.search($(this).val()).draw();
			});
		
		 var oTable = $('#dataTable').dataTable();
		 $('select#selectStatus').change( function() { oTable.fnFilter( $(this).val(),3 ); } );
		
		var oTable = $('#dataTable').dataTable();
		 $('select#selectGender').change( function() { oTable.fnFilter( $(this).val(),2 ); } );
	});
</script>		
@stop
