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
						<a href="{{URL::route('personalDataBC')}}" class="breadcrumb">Personal Data</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col s8 push-s3" style=" margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;" id="personaldata">
		   <legend><h4>Personal Data</h4></legend>
		   <div class="row" style="margin:5%;">
                @if (isset($data))
                    <input type="hidden" id="session" value="active">
                    <input type="hidden" id="firstNameSession" value="{{$data['firstName']}}">
                    <input type="hidden" id="middleNameSession" value="{{$data['middleName']}}">
                    <input type="hidden" id="lastNameSession" value="{{$data['lastName']}}">
                    <input type="hidden" id="addressSession" value="{{$data['address']}}">
                    <input type="hidden" id="dateOfbirthSession" value="{{$data['dateOfbirth']}}">
                    <input type="hidden" id="contactCpSession" value="{{$data['contactCp']}}">
                    <input type="hidden" id="contactLandlineSession" value="{{$data['contactLandline']}}">
                    <input type="hidden" id="civilStatusSession" value="{{$data['civilStatus']}}">
                    <input type="hidden" id="genderSession" value="{{$data['gender']}}">
                @else
                    <input type="hidden" id="session" value="deactive">
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

				<div class="input-field col s4">
					    <i class="material-icons prefix">home</i>
						<input  id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">

						<label data-error="Incorrect" for="address">Address</label>

				</div>

				<div class = "input-field col s4">    
					   <select  id = "" name = "" >
						   <option disabled selected>Choose Province</option>
							  <option id = "1" >Test1</option>
							  <option id = "2">Test2</option>
							  <option id = "3">Test3</option>
							  <option id = "4">Test4</option>
							  <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>

					   </select>
				</div>
			   
			   	<div class = "input-field col s4">    
					   <select  id = "" name = "" >
						   <option disabled selected>Choose City</option>
							  <option id = "1" >Test1</option>
							  <option id = "2">Test2</option>
							  <option id = "3">Test3</option>
							  <option id = "4">Test4</option>
							  <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>

					   </select>
				</div>

				<div class="input-field col s6">
						<input  id="dateOfbirth" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="dateOfbirth">Date of Birth</label>
				</div>

				<div class="input-field col s6">
						<input  id="placeofbirth" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="placeofbirth">Place of Birth</label>

				</div>

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

				<div class="input-field col s4 push-s2">
						<select id = "civilStatus">
						  <option value="" disabled selected>Choose</option>
						  <option value="Single">Single</option>
						  <option value="Married">Married</option>
						  <option value="Widowed">Widowed</option>
						</select>
    					<label>Civil Status</label>

				</div>

				<div class="input-field col s4 push-s2">
						<select id = "gender">
							<option value="" disabled selected>Choose</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					    <label>Gender</label>
				 </div>


												<!-- ====================Body Attributes ============ -->

				<div class="input-field col s10 push-s1">
                    <h5>Body Attributes:</h5>
					<div class="row">
						<div class="col s12">
					
							<table class="striped white">
								<thead>
									<tr>
										<th style="width:260px;">Name</th>
										<th>Specification</th>
									</tr>
								</thead>

								<tbody>
									@foreach ($bodyAttributes as $bodyAttribute)
									<tr style="height:-10px !important;">
										<td>
											<div class="col s3">{{ $bodyAttribute->strBodyAttributeName }}</div>
										</td>
										<td>
											<div class="input-field col s7">
												<input  id="specification{{ $bodyAttribute->strBodyAttributeName }}" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
												<label data-error="Incorrect" for="specification"></label>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
				<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#">Back</button>
				<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextPersonalData">Next</button>
		</div>
	</div>
</div>


@stop
@section('script')
<script>
    
    $(document).ready(function() {
        
        $('select').material_select();
        
        if ($('#session').val() == "active"){
            $('#firstName').val($('#firstNameSession').val());
            $('#middleName').val($('#middleNameSession').val());
            $('#lastName').val($('#lastNameSession').val());
            $('#address').val($('#addressSession').val());
            $('#dateOfbirth').val($('#dateOfbirthSession').val());
            $('#contactCp').val($('#contactCpSession').val());
            $('#contactLandline').val($('#contactLandlineSession').val());
            $('#civilStatus').val($('#civilStatusSession').val());
            $('#gender').val($('#genderSession').val());
        }
        
        $('#nextPersonalData').click(function(){
            //validations here
            sendData();
            window.location.href = '{{ URL::to("/guard/registration/educationalBackground") }}';
            
        });
        
        function sendData(){
            $.ajax({

                type: "POST",
                url: "{{action('GuardRegistrationController@personalDataSession')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    strFirstName: $('#firstName').val(),
                    strMiddleName:$('#middleName').val(),
                    strLastName:$('#lastName').val(),
                    strAddress:$('#address').val(),
                    dateBirth:$('#dateOfbirth').val(),
                    strMobileNumber:$('#contactCp').val(),
                    strLandlineNumber:$('#contactLandline').val(),
                    strCivilStatus:$('#civilStatus').val(),
                    strGender:$('#gender').val()
                },
                success: function(data){

                },
                error: function(data){
                    
                }
            });//ajax
        }//sendData()
    });
   
</script>

@stop
