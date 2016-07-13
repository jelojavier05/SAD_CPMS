@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">
			<h3 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Deployment</h3>
			
			<div class="col s12" style="margin-top:-15px;">
			  <ul class="tabs grey lighten-1">
				<li class="tab col s3"><a href="#deployGuard">Deploy</a></li>
				<li class="tab col s3"><a href="#removeGuard">Remove</a></li>
				<li class="tab col s3"><a href="#switchGuard">Switch</a></li>
			  </ul>
			</div>	
<!---------------------------------Add/Deploy------------------------------------------->			
				<div class="row" id="deployGuard">
					<div class="col s8" style="margin-top:30px;">
						<div class = "row">
							<div class='col s12' style="margin-top:-3%;">
								<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
								<h4 class="blue darken-1 white-text">Guards</h4>
									
									<div class = "input-field col s4 push-s1">    
									   <select  id = "" name = "" >
										   <option disabled selected>Choose an option</option>
											  <option id = "1" >Test1</option>
											  <option id = "2" >Test2</option>
									   </select>
									   <label>Client</label>
									</div>
									<div class="row">
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTabledeploy1">

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

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<button class="btn green"><i class="material-icons">add</i></button>
															</td>																	

															<td>2</td>

															<td>Mang</td>

															<td>Tomas</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<button class="btn green"><i class="material-icons">add</i></button>
															</td>																	

															<td>3</td>

															<td>Jose</td>

															<td>Rizal</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
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
								<h4 class="blue darken-1 white-text">Selected</h4>
									<div class='row'>
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTabledeploy2">

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

															<td><button class="btn blue waves-effect"  name="" id="">More        
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
							<button class="btn-large green waves-effect z-depth-1" id="" style="margin-top:-20px;">Save</button>	
							</div>
				</div>
				
				<div class ="col s4">
					<div class="col s3 push-s9" style="margin-top:-1%; position:fixed;">
						<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Details</h4>
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
		
<!---------------------------------------------------------------------------------------------------------->
			
<!------------------------------------------------Remove/Subtract------------------------------------------>
			<div class="row" id="removeGuard">
					<div class="col s8" style="margin-top:30px;">
						<div class = "row">
							<div class='col s12' style="margin-top:-3%;">
								<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
								<h4 class="blue darken-1 white-text">Guards</h4>
									
									<div class = "input-field col s4 push-s1">    
									   <select  id = "" name = "" >
										   <option disabled selected>Choose an option</option>
											  <option id = "1" >Test1</option>
											  <option id = "2" >Test2</option>
									   </select>
									   <label>Client</label>
									</div>
									<div class="row">
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableremove1">

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

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<button class="btn red">X</button>
															</td>																	

															<td>2</td>

															<td>Mang</td>

															<td>Tomas</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<button class="btn red">X</button>
															</td>																	

															<td>3</td>

															<td>Jose</td>

															<td>Rizal</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
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
								<h4 class="blue darken-1 white-text">Selected</h4>
									<div class='row'>
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableremove2">

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
																<button class="btn blue">UNDO</button>
															</td>																	

															<td>1</td>

															<td>Juan</td>

															<td>Dela Cruz</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
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
							<button class="btn-large green waves-effect z-depth-1" id="" style="margin-top:-20px;">Save</button>	
							</div>
				</div>
				
				<div class ="col s4">
					<div class="col s3 push-s9" style="margin-top:-1%; position:fixed;">
						<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Details</h4>
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
<!---------------------------------------------------------------------------------------------------------->
			
<!------------------------------------------------Switch---------------------------------------------------->
			<div class="row" id="switchGuard">
					<div class="col s8" style="margin-top:30px;">
						<div class = "row">
							<div class='col s12' style="margin-top:-3%;">
								<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
								<h4 class="blue darken-1 white-text">Guards</h4>
									
									<div class = "input-field col s4 push-s1">    
									   <select  id = "" name = "" >
										   <option disabled selected>Choose an option</option>
											  <option id = "1" >Test1</option>
											  <option id = "2" >Test2</option>
									   </select>
									   <label>Client</label>
									</div>
									<div class="row">
										<div class="col s12">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableswitch1">

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
																<input class='with-gap' name="group1" type="radio" id="test1" />
      															<label for="test1"></label>
															</td>																	

															<td>1</td>

															<td>Juan</td>

															<td>Dela Cruz</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<input class='with-gap' name="group1" type="radio" id="test2" />
      															<label for="test2"></label>
															</td>																	

															<td>2</td>

															<td>Mang</td>

															<td>Tomas</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

														<tr>                                    
															<td>
																<input class='with-gap' name="group1" type="radio" id="test3" />
      															<label for="test3"></label>
															</td>																	

															<td>3</td>

															<td>Jose</td>

															<td>Rizal</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
																</button></td>
														</tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>


						</div>
						
						<div class="col s6 push-s4">
							<div>
								<button class="btn-large indigo accent-3 z-depth-2 animated infinite pulse"><i class="material-icons left">swap_vert</i>Switch</button>
							</div>
						</div>

						<div class="row">
							<div class="col s12" style="margin-top:-1%;">
								<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
								<h4 class="blue darken-1 white-text">Selected</h4>
									
									<div class = "input-field col s4 push-s1">    
									   <select  id = "" name = "" >
										   <option disabled selected>Choose an option</option>
											  <option id = "1" >Test1</option>
											  <option id = "2" >Test2</option>
									   </select>
									   <label>Client</label>
									</div>
									<div class='row'>
										<div class="col s10 push-s1">
											<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableswitch2">

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
																<input class='with-gap' name="group2" type="radio" id="test4" />
      															<label for="test4"></label>
															</td>																	

															<td>1</td>

															<td>Juan</td>

															<td>Dela Cruz</td>

															<td><button class="btn blue waves-effect"  name="" id="">More        
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
							<button class="btn-large green waves-effect z-depth-1" id="" style="margin-top:-20px;">Save</button>	
							</div>
				</div>
				
				<div class ="col s4">
					<div class="col s3 push-s9" style="margin-top:-1%; position:fixed;">
						<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Details</h4>
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
<!---------------------------------------------------------------------------------------------------------->
			
		</div>
		</div>
	</div>

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#dataTabledeploy1").DataTable({
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
		
		$("#dataTabledeploy2").DataTable({
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
		$("#dataTableremove1").DataTable({
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
		
		$("#dataTableremove2").DataTable({
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
		
		$("#dataTableswitch1").DataTable({
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
		
		$("#dataTableswitch2").DataTable({
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
		
	});
</script>
@stop