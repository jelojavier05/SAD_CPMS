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
	
<!-------------------------------------------Active------------------------------------------------->
		<div class="col s12 push-s1" >
			<div class="row" id="activeClient">
				<div class="col s8">
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
			
<!---------------------------------------ActiveMoreCollection------------------------------------------------>
				<div class="col s4 pull-s1" style="margin-top:25px;">	
					<ul class="collection with-header" style="overflow:scroll; overflow-x:hidden; height:400px;">
						<li class="collection-header"><h5 style="font-weight:bold;">Details</h5></li>
						<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Bank</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09123456789</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09987654321</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;1000</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10000</div>
						</li>
						
					</ul>
				</div>
<!-------------------------------------------------------------------------------------------------->
			</div>

			
			
			
<!----------------------------------------Pending---------------------------------------------------->
	
			<div class="row" id="pendingClient">
				<div class="col s8">
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
												<td>
													
													<a id="guardlist" class="btn col s12" onclick="Materialize.showStaggeredList('#collectionPending')">5/10</a>
												
												</td>
												
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
				
				<!---------------------------------------PendingMoreCollection------------------------------------------------>
				<div class="col s4 pull-s1" style="margin-top:25px;">	
					<ul class="collection with-header" id="collectionPending">
						<li class="collection-header" style="opacity:0;">
									<ul class="tabs">
										<li class="tab col s3"><a class="active" href="#guardcontainer">Guards</a></li>
										<li class="tab col s3"><a href="#pendingDetails">Details</a></li>
									</ul>
						</li>
						
						<!-------------------------Details------------------>
						<div style="overflow:scroll; overflow-x:hidden; height:400px;" id="pendingDetails">
						<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Bank</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09123456789</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09987654321</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;1000</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10000</div>
						</li>
						</div>
						
						<!------------------Guards-------------->
						
						<div id="guardcontainer" style="visibility:hidden;">
						
						<li class="collection-item" style="opacity:0;">Marco Polo</li>
					    <li class="collection-item" style="opacity:0;">Ferdinand Magellan</li>
					    <li class="collection-item" style="opacity:0;">Manuel Roxas</li>
					    <li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						</div>
						
					</ul>
				</div>
<!-------------------------------------------------------------------------------------------------->
				
				
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
		$('#guardlist').click(function() {
			$('#guardcontainer').css({
				'visibility': 'visible',
				'max-height': '400px',
				'overflow': 'scroll',
				'overflow-x': 'hidden',
				'height': '100%'
			});
		});
		
		
});
		
		

</script>

<script>
	$(document).ready(function(){
			$('ul.tabs').tabs();
		  });
</script>
@stop