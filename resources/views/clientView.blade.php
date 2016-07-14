@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	
	
	
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
													<button id="detaillist" class="btn blue col s12" onclick="Materialize.showStaggeredList('#collectionActive')" >
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
					<ul class="collection with-header" id="collectionActive">
							<li class="collection-header" style="opacity:0;"><h5 style="font-weight:bold;">Details</h5></li>
						<div style="visibility:hidden;" id="detailcontainer">
							
							<li class="collection-item" style="font-weight:bold; opacity:0;">Nature of Business:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Bank</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Contact Number (Client):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09123456789</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Person in Charge:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Contact Number (Person in Charge):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09987654321</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Address:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Area Size (approx. in square meters):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;1000</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Population (approx.):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10000</div>
							</li>
						</div>
						
					</ul>
				</div>
<!-------------------------------------------------------------------------------------------------->
			</div>
		</div>
	
<!-------------------------------------------------------------------------------------------->
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
		
		$('#detaillist').click(function() {
			$('#detailcontainer').css({
				'visibility': 'visible',
				'overflow': 'scroll',
				'overflow-x': 'hidden',
				'height': '400px'
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