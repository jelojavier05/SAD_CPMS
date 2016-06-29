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
                    <input type="hidden" id="provinceSession" value="{{$data['province']}}">
                    <input type="hidden" id="citySession" value="{{$data['city']}}">
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
                    <select  id = "provinceSelect">
                        <option disabled selected>Choose Province</option>
                        @foreach($provinces as $province)
                        
                        <option id = "{{$province -> intProvinceID}}" >{{$province->strProvinceName}}</option>
                        
                        @endforeach
                        
                        
                    </select>
				</div>
			   
			   	<div class = "input-field col s4">    
                    <select  id = "citySelect">
                        <option disabled selected>Choose City</option>
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
                                                <input  id="specification{{ $bodyAttribute->intBodyAttributeID }}" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
                                                <label data-error="Incorrect" for="specification{{ $bodyAttribute->intBodyAttributeID }}"></label>
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
				<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id = "backPersonalData">Back</button>

				<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextPersonalData">Next</button>
		</div>
	</div>
</div>

<input type = "hidden" id = "counter" value = "{{$counter}}">

@stop
@section('script')
<script>
    
    $(document).ready(function() {
        
        $('select').material_select();
        
        if ($('#session').val() == "active"){
            var provinceID = $('#provinceSession').val();
            
            $('#firstName').val($('#firstNameSession').val());
            $('#middleName').val($('#middleNameSession').val());
            $('#lastName').val($('#lastNameSession').val());
            $('#address').val($('#addressSession').val());
            $('#dateOfbirth').val($('#dateOfbirthSession').val());
            $('#contactCp').val($('#contactCpSession').val());
            $('#contactLandline').val($('#contactLandlineSession').val());
            $('#civilStatus').val($('#civilStatusSession').val());
            $('#gender').val($('#genderSession').val());
            $("#provinceSelect option[id='"+ provinceID +"']").attr("selected", "selected");
            $.ajax({

                type: "GET",
                url: "{{action('CityController@get')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    
                },
                success: function(data){
                    
                    var $selectDropdown = 
                        $("#citySelect")
                        .empty()
                        .html(' ');
                    $selectDropdown.append(
                                $("<option></option>")
                                .attr("value",0)
                                .attr("disabled", 'disabled')
                                .text('Choose City')
                            );
                    $.each(data, function(index, subcatObj){
                        if (subcatObj.intProvinceID == provinceID){
                            $selectDropdown.append(
                                $("<option></option>")
                                .attr("id",subcatObj.intCityID)
                                .text(subcatObj.strCityName)
                            );
                        }
                    });

                    
                    $("#citySelect").material_select();
                },async:false
            });
            
            $("#citySelect option[id='"+ $('#citySession').val() +"']").attr("selected", "selected");
            
            
        };
        
        $('#nextPersonalData').click(function(){
            sendData();
            window.location.href = '{{ URL::to("/guard/registration/educationalBackground") }}';
        });
        
        $('#provinceSelect').on('change',function(){
            var id = $(this).children(":selected").attr("id");
            
            $.ajax({

                type: "GET",
                url: "{{action('CityController@get')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    
                },
                success: function(data){
                    
                    var $selectDropdown = 
                        $("#citySelect")
                        .empty()
                        .html(' ');
                    $selectDropdown.append(
                                $("<option></option>")
                                .attr("value",0)
                                .attr("disabled", 'disabled')
                                .text('Choose City')
                            );
                    $.each(data, function(index, subcatObj){
                        if (subcatObj.intProvinceID == id){
                            $selectDropdown.append(
                                $("<option></option>")
                                .attr("id",subcatObj.intCityID)
                                .text(subcatObj.strCityName)
                            );
                        }
                    });

                    $("#citySelect").material_select();

                }
            });
        });
       
        function sendData(){
            var bodyAttribute = {}; 
            var bodyAttributeID = {}; 
            var province = $('#provinceSelect').children(":selected").attr("id");
            var city = $('#citySelect').children(":selected").attr("id");
            
            $.ajax({

                type: "GET",
                url: "{{action('BodyAttributeController@getBodyAttribute')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    
                },
                success: function(data){
                    var intCounter = 0;
                    for(intLoop = 0; intLoop < $('#counter').val(); intLoop ++){
                        if (data[intLoop]['boolFlag'] == 1){
                            var specification = 'specification' + data[intLoop]['intBodyAttributeID'];
                            
                            bodyAttributeID[intCounter] = data[intLoop]['intBodyAttributeID'];
                            bodyAttribute[intCounter] = $('#'+specification).val();
                            
                            intCounter = intCounter + 1;
                        }
                    }  
                },
                
                error: function(data){
                    
                },
                async: false
                
            });//ajax
            
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
                    strGender:$('#gender').val(),
                    bodyAttribute: bodyAttribute,
                    bodyAttributeID: bodyAttributeID,
                    province: province,
                    city: city
                    
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
