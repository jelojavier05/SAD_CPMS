@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a href="{{URL::route('contractInfoBC')}}" class="breadcrumb">Contract Information</a>
						<a href="{{URL::route('guardDeploymentBC')}}" class="breadcrumb">Guard Deployment</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">
			<h2 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Deployment</h2>
				<div class="row">
					<div class="col s8">
						<div class = "row">
							<div class='col s12' style="margin-top:-3%;">
								<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
								<h3 class="blue darken-1 white-text">Guards</h3>
									<div class="row">
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable">

												<thead>
													<tr>
														<th style="width:50px;"></th>
														<th>ID</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th></th>
													</tr>
												</thead>

												<tbody>                        
														<tr>                                    
															<td>
																<button class="btn green"><i class="material-icons">add</i></button>
															</td>																	

															<td>1</td>

															<td>Juan</td>

															<td>Dela Cruz</td>

															<td><button class="btn-large blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<button class="btn green"><i class="material-icons">add</i></button>
															</td>																	

															<td>2</td>

															<td>Mang</td>

															<td>Tomas</td>

															<td><button class="btn-large blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<button class="btn green"><i class="material-icons">add</i></button>
															</td>																	

															<td>3</td>

															<td>Jose</td>

															<td>Rizal</td>

															<td><button class="btn-large blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>


						</div>

						<div class="row">
							<div class="col s12" style="margin-top:-3%;">
								<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
								<h3 class="blue darken-1 white-text">Selected</h3>
									<div class='row'>
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable2">

												<thead>
													<tr>
														<th style="width:50px;"></th>
														<th>ID</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th></th>
													</tr>
												</thead>

												<tbody>                        
														<tr>                                    
															<td>
																<button class="btn red">X</button>
															</td>																	

															<td>1</td>

															<td>Juan</td>

															<td>Dela Cruz</td>

															<td><button class="btn-large blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>



												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="center-align">	
							<button class="btn-large blue waves-effect z-depth-1 left" id="nextguardDeployment" style="margin-top:-20px;">Back</button>	
							<button class="btn-large blue waves-effect z-depth-1 right" id="backguardDeployment" style="margin-top:-20px;">Next</button>	
							</div>
				</div>
				
				<div class ="col s4">
					<div class="col s3 push-s9" style="margin-top:-1%; position:fixed;">
						<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h3 class="blue darken-1 white-text">Details</h3>
						<div class="row">
							<div class="col s12">
							  <div class="card grey darken-1">
									<div class="card-content">
								<!--------------------License Number--------------->		
										<div>
											<span class = "card-title white-text">Address:</span>
										</div>

										<div>
											<p>123 Hello St. Hi Village Bangkal, Makati</p>
										</div>
								<!-------------------Date Issued------------------->		
										<div>
											<span class = "card-title white-text">Age:</span>
										</div>

										<div>
											<p>25</p>
										</div>

								<!------------------Date Expired------------------>

										<div>
											<span class = "card-title white-text">Gender:</span>
										</div>

										<div>
											<p>Male</p>
										</div>

									</div>

								  </div>
								</div>
							  </div>
					</div>
				</div>	
				</div>
			</div>
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
			{ "orderable": false }
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
			{ "orderable": false }
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         }); 
		
		$('#nextguardDeployment').click(function(){
             window.location.href = '{{ URL::to("/client/registration/contractInfo") }}';
        });
		
		$('#backguardDeployment').click(function(){
             window.location.href = '{{ URL::to("/client/registration/gunTagging") }}';
        });
	});
</script>
@stop