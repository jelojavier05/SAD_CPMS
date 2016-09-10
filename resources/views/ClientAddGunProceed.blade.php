@extends('layout.maintenanceLayout')

@section('title')
Additional Gun Request
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">
			<h4 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Tagging</h4>
			<div class='row'></div>
			<div class = "row">
				<div class='col s6' style="margin-top:-3%;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
					<h4 class="blue darken-1 white-text">Guns</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableAvailableGuns">

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
											<td><button id="" class="btn green buttonAdd"><i class="material-icons">add</i></button></td>
											<td>123-321</td>
											<td>AWP</td>
											<td>Rifle</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col s6" style="margin-top:-3%;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Selected</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableSelectedGuns">

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
											<td><button id="" class="btn red"><i class="material-icons">close</i></button></td>
											<td>456-654</td>
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
			</div>
			<div class="col s12">
				<button class="btn-large blue waves-effect z-depth-2 left" id="btnBack" style="margin-top:20px;">Back</button>
				<button class="btn-large blue waves-effect z-depth-2 right " id="btnOK" style="margin-top:20px;">OK</button>
			</div>
		</div>
	</div>
</div>

<!--modal gun rounds-->
<div id="modalRounds" class="modal modal-fixed-footer" style="overflow:hidden; width:200px !important; height:260px !important; border-radius:15px; margin-top:100px;">
    <div class="modal-header" style="background-color:#01579b !important;"><h2 class="center-align">Rounds</h2></div>
    
    <div class="modal-content"> 
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="" type="number" class="validate" required="" aria-required="true">
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
<!--modal gun rounds end-->

<!--modal tagged gun summary-->
<div id="modalGunSummary" class="modal modal-fixed-footer ci" style="overflow:hidden; width:550px;max-height:100%; height:540px; margin-top:0px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Summary</center></h3>  
      </div>
    </div>
    
    <div class="modal-content"> 
        <div class="row">
            <div class="col s10 push-s1">
                <ul class="collection with-header">
					<li class="collection-header">
						<h5 style="font-weight:bold;">Selected Guns</h5>
					</li>
					
					<li class="collection-item">
						<table class="striped" id="tableGunSummary">
							<thead>
								<th class='grey lighten-1'>License Number</th>
								<th class='grey lighten-1'>Name</th>
								<th class='grey lighten-1'>Type of Gun</th>
								<th class='grey lighten-1'>Rounds</th>
							</thead>
							
							<tbody>
								<tr>
									<td>789-987</td>
									<td>AK-47</td>
									<td>Rifle</td>
									<th>90</th>
								</tr>
								
								<tr>
									<td>789-987</td>
									<td>AK-47</td>
									<td>Rifle</td>
									<th>90</th>
								</tr>
								
								<tr>
									<td>789-987</td>
									<td>AK-47</td>
									<td>Rifle</td>
									<th>90</th>
								</tr>
																
								<tr>
									<td>123-321</td>
									<td>AWP</td>
									<td>Rifle</td>
									<th>45</th>
								</tr>
								
								<tr>
									<td>123-321</td>
									<td>AWP</td>
									<td>Rifle</td>
									<th>45</th>
								</tr>
								
								<tr>
									<td>123-321</td>
									<td>AWP</td>
									<td>Rifle</td>
									<th>45</th>
								</tr>
							</tbody>
						</table>
					</li>
				</ul><div class='row'></div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer ci" style="background-color: #00293C;">
        <button class="btn waves-effect waves-light green" name="action" style="margin-right:47px;" id = "">Save
        </button>
    </div>
</div>
<!--modal tagged gun summary end-->

@stop

@section('script')

<script>

$('#btnBack').click(function(){
 window.location.href = '{{ URL::to("/adminInbox") }}';
});	
	
$('#btnOK').click(function(){
	$('#modalGunSummary').openModal();
})

$('.buttonAdd').click(function(){
	$('#modalRounds').openModal();
})


	
$("#dataTableAvailableGuns").DataTable({
	"columns": [
	{ "orderable": false },
	null,
    null,
	null
    ] ,  
	"pageLength":5,
	"lengthMenu": [5,10,15,20]
    }); 
		
$("#dataTableSelectedGuns").DataTable({
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
	
$("#tableGunSummary").DataTable({
    "columns": [    
    null,
	null,
	null,
	null
	] ,  
	"pageLength":3,	
	bFilter:false,
	bLengthChange:false
 }); 
	
</script>

@stop