@extends('layout.tempclientLayout')

@section('title')
Client Details
@endsection

@section('content')	

<!---------------------------------------ActiveMoreCollection------------------------------------------------>
<div class="row">			
	<div class="col s6 push-s3" style="margin-top:25px;">	
		<ul class="collection with-header" id="collectionActive">
			<li class="collection-header" ><h4 style="font-weight:bold;">Details
				<a class="btn blue right modal-trigger" href="#modaleditClientdetails"><i class="material-icons">mode_edit</i></a></h4>
			</li>
				<div >
							
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
							
					<li class="collection-item" style="font-weight:bold;">Number of Guards:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10</div>
					</li>
				</div>
						
		</ul>
	</div>
</div>
<!-------------------------------------------------------------------------------------------------->






<!-----------------------------------Modal----------------------------------------------------->

<div id="modaleditClientdetails" class="modal modal-fixed-footer" style="overflow:hidden; width:700px;max-height:100%; height:400px; margin-top:30px;">
        <div class="modal-header" style="background-color:#01579b !important;"><h4>Edit Details</h4></div>
        	<div class="modal-content">
				
				<div class="row">
					<div class="col s12">
						<div class="input-field col s6">
							<input placeholder=" " id="clientcontactLandline" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientcontactLandline">Contact Number (Client)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="personInCharge" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
							<label for="personInCharge" data-error="Incorrect">Person in Charge</label>
						</div>

						<div class="input-field col s6">
							<input placeholder=" " id="piccontactCp" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientcontactCp">Contact Number (Person In Charge)</label>

						</div>
						
						<div class="input-field col s6">
							<input placeholder=" " id="areaSize" type="text" class="validate" pattern="[0-9. ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="areaSize">Area Size (approx. in square meters)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="population" type="text" class="validate" pattern="[0-9, ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="population">Population (approx.)</label>

						</div>
					</div>
				</div>
	<!-- Modal Button Save -->
				
		
    		</div>
			
			<div class="modal-footer" style="background-color:#01579b !important;">
				<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSendNotification">Save
					
				</button>
			</div>
</div>


@stop

@section('script')
<script>
$(document).ready(function(){
    confirm();
    
});

</script>
@stop