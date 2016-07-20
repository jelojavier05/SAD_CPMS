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
				<a class="btn blue right" id = 'btnEdit'><i class="material-icons">mode_edit</i></a></h4>
			</li>
				<div >
							
					<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;</div>
					</li>
                    
                    <li class="collection-item" style="font-weight:bold;">Name:<div style="font-weight:normal;" id = 'name'>&nbsp;&nbsp;&nbsp;</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;" id = 'clientNumber'>&nbsp;&nbsp;&nbsp;</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'personNumber'>&nbsp;&nbsp;&nbsp;</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;</div>
					</li>
							
					<li class="collection-item" style="font-weight:bold;">Number of Guards:<div style="font-weight:normal;" id = 'numberOfGuard'>&nbsp;&nbsp;&nbsp;</div>
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
							<input placeholder=" " id="clientNumberEdit" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientNumberEdit">Contact Number (Client)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="personInChargeEdit" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
							<label for="personInChargeEdit" data-error="Incorrect">Person in Charge</label>
						</div>

						<div class="input-field col s6">
							<input placeholder=" " id="personNumberEdit" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
							<label data-error="Incorrect" for="personNumberEdit">Contact Number (Person In Charge)</label>

						</div>
						
						<div class="input-field col s6">
							<input placeholder=" " id="areaSizeEdit" type="text" class="validate" pattern="[0-9. ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="areaSizeEdit">Area Size (approx. in square meters)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="populationEdit" type="text" class="validate" pattern="[0-9, ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="populationEdit">Population (approx.)</label>

						</div>
					</div>
				</div>
    		</div>
			
			<div class="modal-footer" style="background-color:#01579b !important;">
				<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSave">Save
					
				</button>
			</div>
</div>


@stop

@section('script')
<script>
$(document).ready(function(){
    $('#btnEdit').click(function(){
        $('#modaleditClientdetails').openModal();
        $('#clientNumberEdit').val($('#clientNumber').text());
        $('#personInChargeEdit').val($('#personInCharge').text());
        $('#personNumberEdit').val($('#personNumber').text());
        $('#areaSizeEdit').val($('#areaSize').text());
        $('#populationEdit').val($('#population').text());
    });
    
    $('#btnSave').click(function(){
        var clientNumber = $('#clientNumberEdit').val().trim();
        var personInCharge = $('#personInChargeEdit').val().trim();
        var personNumber = $('#personNumberEdit').val().trim();
        var areaSize = $('#areaSizeEdit').val().trim();
        var population = $('#populationEdit').val().trim();
        
        if (clientNumber && personInCharge && personNumber && areaSize && population && 
            $.isNumeric(parseFloat(areaSize)) && $.isNumeric(parseInt(population)) && 
            parseFloat(areaSize) > 0 && parseInt(population) >= 0){
            
            $.ajax({

                type: "POST",
                url: "{{action('TempClientDetailsController@update')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    clientNumber: clientNumber,
                    personInCharge: personInCharge,
                    personNumber: personNumber,
                    areaSize: areaSize,
                    population: population
                },
                success: function(data){
                    swal("Success!", "Record has been Updated!", "success");
                    $('#modaleditClientdetails').closeModal();
                    window.location.href = '{{ URL::to("/client/tempaccountdetails") }}';
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');

                }
            });//ajax
        }else{
            var toastContent = $('<span>Check your inputs.</span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');
        }
        
    });
});

</script>
@stop