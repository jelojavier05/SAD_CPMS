@extends('layout.maintenanceLayout')

@section('title')
Gun Registration
@endsection

@section('content')



<div style="margin-top:3%;">
		
	<div class="row">
		
		<div class="row"></div>
		<div class="col s8 push-s3" style="margin-left:10px;">
			<div class="container-fluid grey lighten-4 z-depth-1 ci animated bounceIn" style="border: 1px solid black; border-radius:5px;">
			<div class="row">
					<div class="col l12">
						<div class="col l6 push-l1">
						
						
						<legend><h4>Gun Registration</h4></legend>
							<div class="row">
					
					
										<div class="input-field col s5">
												<select id = "typeOfGunSelect">
												  <option value="0" disabled selected>Choose</option>
													@foreach($typeOfGuns as $value)
														<option value = "{{$value->intTypeOfGunID}}"> {{$value->strTypeOfGun}} </option>
													@endforeach
												</select>
												<label>Type of Gun</label>
										</div>
					
								</div>
							
							
						<div class="row">
					
										<div class="col s7">
											<div class="input-field">
												<input placeholder=" " id="strGunName" type="text" class="validate" name = "gunName" required="" aria-required="true">
												<label for="strGunName">Name</label> 
											</div>
										</div>

										<div class="col s7">
											<div class="input-field">
												<input placeholder=" " id="strGunManufacturer" type="text" class="validate" name = "gunManufacturer" required="" aria-required="true">
												<label for="strGunManufacturer">Manufacturer</label> 
											</div>
										</div>

					
						</div>
			
			
						<div class="row">
					
									<div class="col s7">
										<div class="input-field">
											<input placeholder=" " id="strGunSerial" type="text" class="validate" name = "gunSerial" required="" aria-required="true">
											<label for="strGunSerial">Serial No</label> 
										</div>
									</div>
					
					
						</div>
			
				
			
					</div>
						
						
				
					
				<div class ="col l6" style="margin-top:7%">
				<div>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px;">
						<div class="col s5 push-s3">
							<legend class><center><h4>License</h4></center></legend>
						</div>
							<div class="row">
					
					<div class="col s8 offset-s4 pull-s2">
						<div class="input-field">
							<input placeholder=" " id="strGunLicense" type="text" class="validate" name = "gunLicense" required="" aria-required="true">
							<label for="strGunLicense">License No</label> 
						</div>
					</div>
					
					<div class="input-field col s8 push-s2">
						<input  id="startDate" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="startDate">Date Issued</label>
					</div>
				
					<div class="input-field col s8 push-s2">
						<input  id="endDate" type="date" class="datepicker" required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="endDate">Date Expired</label>
					</div>
				</div>
						
					</div>
				</div>
			</div>
			
				</div>
				
				
			</div>
				
				
			
			
			</div>
			<div class = "center-align">
			<button style="margin-top:20px;" class=" z-depth-2 btn-large green " id="btnSave">Add</button>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')

<script>
    $(document).ready(function(){
        $('#btnSave').click(function(){
            
            if ($('#typeOfGunSelect').val() && $('#strGunName').val().trim() && $('#strGunManufacturer').val().trim() && 
               $('#strGunSerial').val().trim() && $('#strGunLicense').val().trim() && 
                $('#startDate').val() && $('#endDate').val() ){
                $.ajax({

                    type: "POST",
                    url: "{{action('GunRegistrationController@insert')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        typeOfGun: $('#typeOfGunSelect').val(), 
                        name: $('#strGunName').val() ,
                        manufacturer: $('#strGunManufacturer').val() ,
                        serialNumber: $('#strGunSerial').val() ,
                        licenseNumber: $('#strGunLicense').val() ,
                        dateIssued: $('#startDate').val() ,
                        dateExpired: $('#endDate').val()

                    },
                    success: function(data){
                        swal({
								title: "Success!",
								text: "Gun has beed Registered!",
								type: "success"
							},
							function(){
								window.location.href = '{{ URL::to("/gunView") }}';
							});

                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');

                    }
                });//ajax

             }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
        });
    });
</script>


@stop


