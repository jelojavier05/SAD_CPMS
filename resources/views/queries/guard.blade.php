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
				<div class="col s12">
					<div class="input-field col s3">
						<select id="selectStatus">
							<option selected value="">All</option>
							<option value="Active">Active</option>
							<option value="Pending/Waiting">Pending/Waiting</option>
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
							<option selected>All</option>
							<option value="LandBank Almanza">LandBank Almanza</option>
							<option value="ChinaBank Pilar">ChinaBank Pilar</option>
							<option value="Pacific Sta. Mesa">Pacific Sta. Mesa</option>
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
							<tr>
								<td>2013-04019-MN-0</td>
								<td>Jason Paredes</td>								
								<td>Male (M)</td>
								<td>Active</td>
								<td>ChinaBank Pilar</td>
								
							</tr>
							
							<tr>
								<td>123-123</td>
								<td>Kobe Bryant</td>								
								<td>Male (M)</td>
								<td>Reliever</td>
								<td>LandBank Almanza</td>
							</tr>
							
							<tr>
								<td>909-090</td>
								<td>Ronda Rousey</td>								
								<td>Female (F)</td>
								<td>Pending/Waiting</td>
								<td>Pacific Sta. Mesa</td>
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
		
		$("#tblqueryGuards").DataTable({
             "columns": [           
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
