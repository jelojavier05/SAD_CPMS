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
						<a href="{{URL::route('gunTaggingBC')}}" class="breadcrumb">Gun Tagging</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">
			<h2 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Tagging</h2>
			<div class = "row">
				<div class='col s6' style="margin-top:-3%;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
					<h3 class="blue darken-1 white-text">Guns</h3>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>License No</th>
											<th>Name</th>
											<th>Type of Gun</th>
										</tr>
									</thead>

									<tbody>                        
											<tr>                                    
												<td>
													<button class="btn green modal-trigger" href="#modalRounds"><i class="material-icons">add</i></button>
												</td>																	

												<td>2013-12345-MN-0</td>

												<td>M4A1</td>
												
												<td>Rifle</td>

												
											</tr>
											
											<tr>                                    
												<td>
													<button class="btn green modal-trigger" href="#modalRounds"><i class="material-icons">add</i></button>
												</td>																	

												<td>2014-01231-MN-0</td>

												<td>Arctic Warfare Magnum</td>

												<td>Rifle</td>
												
											</tr>
										
											<tr>                                    
												<td>
													<button class="btn green modal-trigger" href="#modalRounds"><i class="material-icons">add</i></button>
												</td>																	

												<td>2023-09876-MN-0</td>

												<td>P90</td>
												
												<td>SMG</td>
												
											</tr>
											
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col s6" style="margin-top:-3%;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h3 class="blue darken-1 white-text">Selected</h3>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable2">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>License No</th>
											<th>Name</th>
											<th>Type of Gun</th>
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

												
											</tr>
										
											<tr>                                    
												<td>
													<button class="btn red">X</button>
												</td>																	

												<td>2014-01231-MN-0</td>

												<td>Arctic Warfare Magnum</td>

												<td>Rifle</td>
												
											</tr>
											
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="btn-large blue waves-effect z-depth-2 left" id="backgunTagging" style="margin-top:20px;">Back</button>
			<button class="btn-large green waves-effect z-depth-2 right animated infinite flash" id="" style="margin-top:20px;">Save</button>
		</div>
	</div>
</div>

<!-------------------------------------------------modalRounds---------------------->
<div id="modalRounds" class="modal modal-fixed-footer" style="overflow:hidden; width:200px !important; height:260px !important; border-radius:15px; margin-top:100px;">
    <div class="modal-header"><h2 class="center-align">Rounds</h2></div>
    
    <div class="modal-content"> 
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="addRounds" type="number" class="validate" required="" aria-required="true">
                    <label for="">Rounds</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light green" name="action" style="margin-right:47px;" id = "">Add
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
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         }); 
		
		
		$('#backgunTagging').click(function(){
             window.location.href = '{{ URL::to("/client/registration/guardDeployment") }}';
        });
	});
</script>
@stop