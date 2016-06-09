@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a class="breadcrumb">Personal Data</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>


<!----------------------------------------------PAGES-------------------------------------->
<!-------------------------------------Personal Data Page Start---------------------------------->
<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;" id="personaldata">
		   <legend><h4>Personal Data</h4></legend>
		   <div class="row" style="margin:5%;">

				<div class="input-field col s4">
					   <i class="material-icons prefix">account_circle</i>
					   <input  id="firstName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
					   <label data-error="Incorrect" for="firstName">First Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
					    <input  id="middleName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="middleName">Middle Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
						<input  id="lastName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="lastName">Last Name</label>

				</div>

		<!--
											</div>





											<div class="row" style="margin:5%;">
		-->
				<div class="input-field col s6">
					    <i class="material-icons prefix">home</i>
						<input  id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">

						<label data-error="Incorrect" for="address">Address</label>

				</div>

				<div class="input-field col s6">
						<i class="material-icons prefix">home</i>
						<input  id="provaddress" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="provaddress">Provincial Address</label>

				</div>
		<!--
											</div>

											<div class="row" style="margin:5%;">
		-->

				<div class="input-field col s6">
						<input  id="dateOfbirth" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="dateOfbirth">Date of Birth</label>

				</div>


				<div class="input-field col s6">
						<input  id="placeofbirth" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="placeofbirth">Place of Birth</label>

				</div>


		<!--
											</div>


											<div class="row" style="margin:5%;">
		-->
				<div class="input-field col s6">
						<i class="material-icons prefix">smartphone</i>
						<input  id="contactCp" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
						<label data-error="Incorrect" for="contactCp">Contact Number (Mobile)</label>

				</div>
				
			    <div class="input-field col s6">
						<i class="material-icons prefix">phone</i>
						<input  id="contactLandline" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
						<label data-error="Incorrect" for="contactLandline">Contact Number (Landline)</label>

				</div>
		<!--
											</div>

											<div class="row" style="margin:5%;">
		-->


				<div class="input-field col s4">
						<input  id="citizenship" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
						<label data-error="Incorrect" for="citizenship">Citizenship</label>

				</div>

				<div class="input-field col s4">
						<input  id="civilStatus" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="civilStatus">Civil Status</label>

				</div>

				<div class="input-field col s4">

						<select>
							<option value="" disabled selected>Choose</option>
							<option value="1">Male</option>
							<option value="2">Female</option>
						</select>
					    <label>Sex</label>
				 </div>


												<!-- ====================Body Attributes ============ -->

				<div class="input-field col s12">
													<p>Body Attributes:</p>
														<table class="highlight white">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Specification</th>

																</tr>
															</thead>

															<tbody>
																@foreach ($bodyAttributes as $bodyAttribute)
																	<tr>

																		<td>
																			<div>
																				{{ $bodyAttribute->strBodyAttributeName }}

																			</div>
																		</td>

																		<td>
																			<div>
																				<input size="9" id="specification" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
																				<label data-error="Incorrect" for="specification"></label>

																			</div>
																		</td>


																	</tr>
																@endforeach
															</tbody>
														</table>

		<!--
											   </div>

											   <div class="row" style="margin:5%;">
		-->


				</div>
			   <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#">Back</button>
			   <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextPersonalData">Next</button>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------Personal Data Page End---------------------------------->


@stop
@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#nextPersonalData').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/educationalBackground") }}';
        });
        
    });
        
    
    
    
   
</script>

@stop