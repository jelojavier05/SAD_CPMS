@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Change Location
@endsection


@section('content')
<div class="row"></div>
<div class="row"></div>
<div class="row">
    <div class="col l12">
        <div class="col s10 push-s2" style=";max-height:100% !important;height:550px !important;">
    
			<div class="row" style="margin-top:-8%;">
				<div class="row"> 
					<div class="col s12 push-s1">
						<h3 class="blue-text" style="font-family:Myriad Pro;margin-left:-3%;margin-top:9.2%">Change Location</h3>
					</div>  
				</div>
				<div class="row">
					<div class="col s12" style="margin-top:-2%;">
						<div class="container z-depth-2" style="background-color:#F0EFEA;width:900px;border: .5px solid grey">
							<div class="row">
								<div class="col s12" >
									<table class="centered" style="border-radius:10px;" id="dataTable">
										
										<thead>
											<tr>
												<th style="width:50px;" class="blue darken-3 white-text">Client Name</th>
												<th style="width:50px;" class="blue darken-3 white-text">Company Name</th>
												<th style="width:50px;" class="blue darken-3 white-text">Nature of Business</th>
												<th style="width:50px;" class="blue darken-3 white-text">Location</th>
												<th style="width:50px;" class="blue darken-3 white-text">Action</th>
													
												
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>
													Adrian Flores
												</td>
												<td>
													Padi's Point
												</td>
												<td>
													Bar
												</td>
												<td>
													Makati City
												</td>
												<td>
													<button id="" class="btn blue buttonGuards">
														Send Request
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
        </div>
    </div>
</div>
    
<!--modal client guards list   -->
<div id="modalClientGuardList" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;min-height:650px; margin-top:-60px;">
            <div class="modal-header">
              	<div class="h">
        			<h3><center>Current Guards</center></h3>  
        		</div>
            </div>
        	
        	<div class="modal-content">
        		<div class="row">
        			<div class="col s12">
        				<ul class="collection with-header" id="collectionActive">											
							<li class="collection-item">
        						<div class="row">
        							<div class="col s12">
        								
        								<table class="striped white" style="border-radius:10px; width:100%;" id="dataTableGuards">
        									<thead>
        										<th class="grey lighten-1" style="width:10px;"></th>
        										<th class="grey lighten-1">ID</th>
        										<th class="grey lighten-1">First Name</th>
        										<th class="grey lighten-1">Last Name</th>
        										<th class="grey lighten-1">City</th>
        										<th class="grey lighten-1">Province</th>
        									</thead>
        									<tbody>
												<tr>
													<td>
														<input type="checkbox" id="test1" value = ""><label for="test1"></label>
													</td>
													
													<td>1</td>
													<td>Blake</td>
													<td>Griffin</td>
													<td>Las Pinas</td>
													<td>Metro Manila</td>
												</tr>
												
												
        									</tbody>
        								</table>
        							</div>
        						</div>
                            </li>
        			</div>
        		</div>
        	</div>

            <!-- button -->
            <div class="modal-footer ci" style="background-color: #00293C;">
        		<button class="btn blue waves-effect waves-light" name="" id = "btnSendNotificationAdditionalGuard" style="margin-right: 30px;">Send<i class="material-icons right">send</i>
                </button>
        	</div>
		</div>
<!--	modal client guards list end-->
    
   

<script>


    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
	
	$("#dataTable").DataTable({
             "columns": [          
            null,
            null,
			null,
			null,
			{"searchable": false}
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
	
	
	
	 $('#dataTable').on('click', '.buttonGuards', function(){
            $('#modalClientGuardList').openModal();            

        });
</script>
<script>
	$("#dataTableGuards").DataTable({
             "columns": [
			{"orderable": false},
            null,
            null,
			null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
</script>



@stop