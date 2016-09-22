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
			<div class="row">
				<div class="col s8">
					<div class="input-field col s4">
						<select id="selectStatus">
							<option selected value="">Choose Status</option>
							<option value="Available">Available</option>
							<option value="Pending">Pending</option>							
						</select>
						<label>Status</label>
					</div>

					<div class="input-field col s4">
						<select id="selectGunType">
							<option selected value="">Choose Type of Gun</option>
							<option value="Pistol">Pistol</option>
							<option value="Rifle">Rifle</option>
						</select>
						<label>Type of Gun</label>
					</div>

					<div class="input-field col s4">
						<select disabled>
							<option disabled selected>Choose Client</option>							
							<option>LandBank Almanza</option>
							<option>David's Salon Makati</option>
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
<!--
                        <thead>
                            <tr>                                                                                        
								<th class="select-filter">Gender</th>
								<th class="select-filter">Status</th>
								<th></th>
								<th></th>
                            </tr>
                        </thead>
-->
						
						<thead>
                            <tr>                                                                                                     
								<th class="blue darken-1 white-text">Type of Gun</th>								
								<th class="blue darken-1 white-text">License Number</th>
								<th class="blue darken-1 white-text">Name</th>
								<th class="blue darken-1 white-text">Status</th>
                                
                            </tr>
                        </thead>												

                        <tbody>
							<tr>
								
								<td>Pistol</td>
								<td>123-123</td>
								<td>Glock</td>
								<td>Available</td>
								
							</tr>
							
							<tr>
								
								<td>Rifle</td>
								<td>456-654</td>
								<td>M16</td>
								<td>Pending</td>
							</tr>
							
							<tr>
								
								<td>Rifle</td>
								<td>111-222</td>
								<td>M4A1</td>
								<td>Available</td>
							</tr>
							
							<tr>
								
								<td>Pistol</td>
								<td>888-999</td>
								<td>Colt 45</td>
								<td>Pending</td>
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
		
		$("#dataTable").DataTable({
//             "columns": [           
//            null,
//			null,
//			null,
//			null
//            ] ,  
			"pageLength":5,
			"bLengthChange": false,
			
			

		});
	
	search = $('#dataTable').DataTable();
		$("#mySearch").keyup(function(){
			search.search($(this).val()).draw();
		});
	 var oTable = $('#dataTable').dataTable();
	 $('select#selectStatus').change( function() { oTable.fnFilter( $(this).val(),3 ); } );
	
	var oTable = $('#dataTable').dataTable();
	 $('select#selectGunType').change( function() { oTable.fnFilter( $(this).val(),0 ); } );
	 
});
	
</script>		
@stop
