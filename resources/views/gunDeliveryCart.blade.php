@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
<!--		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">-->
<!--			<h3 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Tagging</h3>-->
			<div class = "row">
				<div class='col s6' style="margin-top:0px;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
					<h4 class="blue darken-1 white-text">Tagged Guns</h4>
						<div class = "input-field col s5">    
							<select  id = "" name = "" >
								<option disabled selected>Choose an option</option>
									<option id = "1" >Test1</option>
									<option id = "2" >Test2</option>
							</select>
							<label>Client</label>
						</div>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>License No</th>
											<th>Name</th>
											<th>Type of Gun</th>
											<th>Rounds</th>
										</tr>
									</thead>

									<tbody>                        
											<tr>                                    
												<td>
													<button class="btn green" href="#"><i class="material-icons">add</i></button>
												</td>																	

												<td>2013-12345-MN-0</td>

												<td>M4A1</td>
												
												<td>Rifle</td>
												
												<td>90</td>

												
											</tr>
											
											<tr>                                    
												<td>
													<button class="btn green" href="#"><i class="material-icons">add</i></button>
												</td>																	

												<td>2014-01231-MN-0</td>

												<td>Arctic Warfare Magnum</td>

												<td>Rifle</td>
												
												<td>15</td>
												
											</tr>
										
											<tr>                                    
												<td>
													<button class="btn green" href="#"><i class="material-icons">add</i></button>
												</td>																	

												<td>2023-09876-MN-0</td>

												<td>P90</td>
												
												<td>SMG</td>
												
												<td>150</td>
												
											</tr>
											
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col s6" style="margin-top:0px;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Selected</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable2">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>License No</th>
											<th>Name</th>
											<th>Type of Gun</th>
											<th>Rounds</th>
										</tr>
									</thead>

									<tbody>                        
											<tr>                                    
												<td>
													<button class="btn red">X</button>
												</td>																	

												<td>2013-12345-MN-0</td>

												<td>M4A1</td>
												
												<td>Rifle</td>
												
												<td>90</td>

												
											</tr>
										
											<tr>                                    
												<td>
													<button class="btn red">X</button>
												</td>																	

												<td>2014-01231-MN-0</td>

												<td>Arctic Warfare Magnum</td>

												<td>Rifle</td>
												
												<td>15</td>
												
											</tr>
											
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
<!--		</div>-->
		<div class=" col s6 push-s3">
				<a class="btn-large blue waves-effect z-depth-2 left" id="" style="margin-top:20px;" href="/gunDeliveryView">Cancel</a>
				<a class="btn-large blue waves-effect z-depth-2 right" id="" style="margin-top:20px;" href="/gunDelivery">Proceed</a>
		</div>
	</div>
</div>

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            null,
            null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         }); 
		
		$("#dataTable2").DataTable({
             "columns": [
            { "orderable": false },
            null,
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