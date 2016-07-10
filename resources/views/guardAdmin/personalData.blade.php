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
						<a href="{{URL::route('personaldata')}}" class="breadcrumb">Personal Data</a>
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
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="input-field col s4">
					   <i class="material-icons prefix">account_circle</i>
					   <input placeholder = " " id="firstName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
					   <label data-error="Incorrect" for="firstName">First Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
					    <input placeholder = " " id="middleName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="middleName">Middle Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
						<input placeholder = " " id="lastName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="lastName">Last Name</label>

				</div>

				<div class="input-field col s4">
					    <i class="material-icons prefix">home</i>
						<input placeholder = " " id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">

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
						<input  id="dateOfbirth" type="date" class="datepicker">
						<label class="active" data-error="Incorrect" for="dateOfbirth">Date of Birth</label>
				</div>

				<div class="input-field col s6">
						<input placeholder = " " id="placeofbirth" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="placeofbirth">Place of Birth</label>

				</div>

				<div class="input-field col s6">
						<i class="material-icons prefix">smartphone</i>
						<input placeholder = " " id="contactCp" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
						<label data-error="Incorrect" for="contactCp">Contact Number (Mobile)</label>

				</div>
				
			    <div class="input-field col s6">
						<i class="material-icons prefix">phone</i>
						<input placeholder = " " id="contactLandline" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
						<label data-error="Incorrect" for="contactLandline">Contact Number (Landline)</label>

				</div>

				<div class="input-field col s4">
						<select id = "civilStatus">
						  <option value="" disabled selected>Choose</option>
						  <option value="Single">Single</option>
						  <option value="Married">Married</option>
						  <option value="Widowed">Widowed</option>
						</select>
    					<label>Civil Status</label>

				</div>

				<div class="input-field col s4">
						<select id = "gender">
							<option value="" disabled selected>Choose</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					    <label>Gender</label>
				 </div>
			   	
			   	 <div class="col s4">
                    <div class="input-field">
                        <input placeholder = " " id="licenseNumber" type="text" class="validate" required="" aria-required="true">
                        <label for="licenseNumber">License Number</label> 
                    </div>
				</div>
               
               <div class="input-field col s6">
						<input  id="dateIssued" type="date" class="datepicker">
						<label class="active" data-error="Incorrect" for="dateIssued">Date Issued</label>
				</div>
               
               <div class="input-field col s6">
						<input  id="dateExpiration" type="date" class="datepicker">
						<label class="active" data-error="Incorrect" for="dateExpiration">Date Expiration</label>
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
                                        <th>Measurement</th>
									</tr>
								</thead>

								<tbody>
                                    @foreach ($bodyAttributes as $bodyAttribute)
                                    <tr style="height:-10px !important;">
                                        <td>
                                            <div class="col s3" id = "name{{ $bodyAttribute->intBodyAttributeID }}">{{ $bodyAttribute->strBodyAttributeName }}</div>
                                        </td>
                                        <td>
                                            <div class="input-field col s7">
                                                <input  id="specification{{ $bodyAttribute->intBodyAttributeID }}" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
                                                <label data-error="Incorrect" for="specification{{ $bodyAttribute->intBodyAttributeID }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col s3" id = "measurement{{ $bodyAttribute->intBodyAttributeID }}" value = "{{$bodyAttribute->Measurement->strMeasurement}}">{{$bodyAttribute->Measurement->strMeasurement}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>
</div>



<div class="row">
    <div class="col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
            <legend><h4>License</h4></legend>
            <div class="row" style="margin:5%;">
				<div class="container-fluid grey lighten-3 col s10 push-s1" style="border-radius:5px; border: 1px solid black;">
					<div class="row" style="margin:2%;">
						<div class="col s8 push-s2">
							<div class="input-field">
								<input placeholder=" " id="strLicenseNo" type="text" class="validate" name = "licenseNo" required="" aria-required="true">
								<label for="strLicenseNo">License Number</label> 
							</div>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s8 push-s2">
							<input  id="startDate" type="date" class="datepicker"  required="" aria-required="true">
							<label class="active" data-error="Incorrect" for="startDate">Date Issued</label>
						</div>
					</div>

					<div class = "row">
						<div class="input-field col s8 push-s2">
							<input  id="endDate" type="date" class="datepicker" required="" aria-required="true">
							<label class="active" data-error="Incorrect" for="endDate">Date Expired</label>
						</div>
					</div>
				</div>
             </div>
         </div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextPersonalData">Next</button>
     </div>
</div>





<input type="hidden" id = "counter" value = "{{$counter}}">

@stop
@section('script')
<script>
    
    $(document).ready(function() {
        var city;
        var bodyAttribute;
        $('select').material_select();
        
        $.ajax({
            type: "GET",
            url: "{{action('CityController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                city = data;
            }
        }); //city
        
        $.ajax({

            type: "GET",
            url: "{{action('BodyAttributeController@getBodyAttribute')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                bodyAttribute = data;
            },
            error: function(data){

            }

        });//bodyAttribute
        
        $.ajax({

            type: "GET",
            url: "{{action('PersonalDataController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                if (data){
                    var provinceID = data.province;
                    var license = data.license;
                    //text
                    $('#firstName').val(data.firstName);
                    $('#middleName').val(data.middleName);
                    $('#lastName').val(data.lastName);
                    $('#address').val(data.address);
                    $('#placeofbirth').val(data.placeofbirth);
                    $('#contactCp').val(data.contactCp);
                    $('#contactLandline').val(data.contactLandline);
                    $('#licenseNumber').val(license.licenseNumber);
                    
                    //bodyattribute
                    var bodyAttribute = data.bodyAttribute;
                    for (intLoop = 0; intLoop < bodyAttribute.length; intLoop ++){
                        $('#specification' + bodyAttribute[intLoop].intBodyAttributeID)
                            .val(bodyAttribute[intLoop].strValue);
                    }
                    
                    //dates
                    document.getElementById("dateOfbirth").value = data.dateOfbirth;
                    document.getElementById("dateIssued").value = license.dateIssued;
                    document.getElementById("dateExpiration").value = license.dateExpiration;
                    
                    //dropdown
                    $("#provinceSelect option[id='"+ provinceID +"']").attr("selected", "selected");
                    getCity(provinceID);
                    $("#citySelect option[id='"+ data.city +"']").attr("selected", "selected");
                    $('#civilStatus').val(data.civilStatus);
                    $('#gender').val(data.gender);
                    
                    $('select').material_select();
                    
                }else{
                    //wala
                }
            }
        }); //
        
        
        
        
        $('#nextPersonalData').click(function(){
            sendData();
            window.location.href = '{{ URL::to("/guard/registration/educationalbackground") }}';
        });
        
        $('#provinceSelect').on('change',function(){
            var id = $(this).children(":selected").attr("id");
            getCity(id);
        });
        
        function getCity(provinceID){
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
            $.each(city, function(index, subcatObj){
                if (subcatObj.intProvinceID == provinceID){
                    $selectDropdown.append(
                        $("<option></option>")
                        .attr("id",subcatObj.intCityID)
                        .text(subcatObj.strCityName)
                    );
                }
            });

            $("#citySelect").material_select();
        }
       
        function sendData(){
            var value = {};
            var bodyAttributeID = {}; 
            var province = $('#provinceSelect').children(":selected").attr("id");
            var city = $('#citySelect').children(":selected").attr("id");
            var intCounter = 0;
            for(intLoop = 0; intLoop < $('#counter').val(); intLoop ++){
                if (bodyAttribute[intLoop]['boolFlag'] == 1){
                    var specification = 'specification' + bodyAttribute[intLoop]['intBodyAttributeID'];
                    var measurementName = 'measurement' + bodyAttribute[intLoop]['intBodyAttributeID'];

                    bodyAttributeID[intCounter] = bodyAttribute[intLoop]['intBodyAttributeID'];
                    value[intCounter] = $('#'+specification).val();
                    intCounter = intCounter + 1;
                }
            }
            
            $.ajax({

                type: "POST",
                url: "{{action('PersonalDataController@post')}}",
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
                    placeofbirth:$('#placeofbirth').val(),
                    strMobileNumber:$('#contactCp').val(),
                    strLandlineNumber:$('#contactLandline').val(),
                    strCivilStatus:$('#civilStatus').val(),
                    strGender:$('#gender').val(),
                    value: value,
                    bodyAttributeID: bodyAttributeID,
                    province: province,
                    city: city,
                    licenseNumber: $('#licenseNumber').val(),
                    dateIssued: $('#dateIssued').val(),
                    dateExpiration: $('#dateExpiration').val()
                    
                },
                success: function(data){
                    
                },
                error: function(xhr){
                    console.log(xhr);
                }
            });//ajax
        }//sendData()
    });
   
</script>

@stop
