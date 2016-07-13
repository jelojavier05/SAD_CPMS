@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	
	<div class="col s10 push-s2">
      <ul class="tabs">
        <li class="tab col s3"><a href="#activeClient">Active</a></li>
		<li class="tab col s3"><a href="#pendingClient">Pending</a></li>
      </ul>
    </div>
	
<!-------------------------------------------------------------------------------------------->
		<div class="col s10 push-s2" >
			<div class="row" id="activeClient">
				<div class="col s12">
					<div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
			<!--            <div class="row">-->
							<div class="col s6 push-s1">
								<h4 class="blue-text">Client (Active)</h4>
							</div>

			<!--
							<div class="col s3 offset-s3">
								<a style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="/client/registration/basicInfo">
									<i class="material-icons left">add</i> ADD
								</a>
							</div>
			-->
			<!--            </div>-->

						<div class="row">
							<div class="col s11" style="margin: -15px 25px 25px 25px;">
								<table class="highlight white" style="border-radius:10px;" id="dataTable">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th style="width:50px;"></th>
											<th>ID</th>
											<th>Name</th>
											<th>Person In Charge</th>
											<th style="width:50px;"></th>


										</tr>
									</thead>

									<tbody>

											<tr>


												<td>
													<button class="buttonUpdate btn col s12"  name="" id="" >
														<i class="material-icons">edit</i>
													</button>
												<label for=""></label>
												</td>

												<td>
													<button class="buttonDelete btn red col s12" id="">
														<i class="material-icons">delete</i>
													</button>
												</td>
												<td id = "">1</td>
												<td id = "">PUP Mabini Campus</td>
												<td id = "">Ted Pylon</td>
												
												<td>
													<button class="btn blue col s12" id="">
													MORE
													</button>
												</td>

											</tr>

									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		
<!-------------------------------------------------------------------------------------------->
	
			<div class="row" id="pendingClient">
				<div class="col s12">
					<div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
			<!--            <div class="row">-->
							<div class="col s6 push-s1">
								<h4 class="blue-text">Client (Pending)</h4>
							</div>

						<div class="row">
							<div class="col s12" style="margin-top:-20px;">
								<table class="highlight white" style="border-radius:10px;" id="dataTable2">

									<thead>
										<tr>
											
											<th style="width:10px;"></th>
											<th style="width:10px;"></th>
											<th>ID</th>
											<th>Name</th>
											<th>Nature of Business</th>
											<th>Guard Count</th>
											<th style="width:10px;"></th>
											


										</tr>
									</thead>

									<tbody>

											<tr>


												

												<td>
													<button class="buttonDelete btn red col s12" id="">
														<i class="material-icons">delete</i>
													</button>
												</td>
												<td>
													<button class="modal-trigger btn blue col s12" id="" href="#modalsendNoti">
														<i class="material-icons">send</i>
													</button>
												</td>
												<td id = "">1</td>
												<td id = "">PUP Mabini Campus</td>
												<td id = "">School/University</td>
												<td><a>5/10</a></td>
												
												<td>
													<button class="btn green col s12" id="">
														Proceed
													</button>
												</td>
												

											</tr>

									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	
<!-------------------------------------------------------------------------------------------->
</div>
<!-----------------------------------Modal----------------------------------------------------->

<div id="modalsendNoti" class="modal modal-fixed-footer" style="overflow:hidden; width:700px;max-height:100%; height:570px; margin-top:-30px;">
        <div class="modal-header"><h4>Send Notification</h4></div>
        	<div class="modal-content">
				
				<div class="row">
					<div class="col s12">
						<table class="striped white" style="border-radius:10px; width:100%;" id="dataTablenoti">

							<thead>
								<th style="width:10px;"></th>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
							</thead>

							<tbody>
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
								
								<tr>
									<td style="height:-15px;">
										
										  <input type="checkbox"  id="1" />
										  <label for="1"></label>
										
									</td>
									<td style="height:-15px;">1</td>
									<td style="height:-15px;">Marco</td>
									<td style="height:-15px;">Polo</td>
								</tr>
									
							</tbody>

						</table>
					</div>
				</div>
	<!-- Modal Button Save -->
				
		
    		</div>
			
			<div class="modal-footer" style="background-color:#01579b !important;">
				<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Send
					<i class="material-icons right">send</i>
				</button>
			</div>
</div>
	


@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
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
				{ "orderable": false },
                null,
                null,
				null,
				{ "orderable": false },
				{ "orderable": false }
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
		
		$("#dataTablenoti").DataTable({
                 "columns": [
                { "orderable": false },
                null,
                null,
				null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
		
		
	});
</script>

<script>
	$(document).ready(function(){
			$('ul.tabs').tabs();
		  });
</script>
@stop