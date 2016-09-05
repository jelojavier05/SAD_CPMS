@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')
<body onload="window.location='#scroll';">
<div class="row">
	<div class="col s12 push-s2">
		<nav>
			<div class="nav-wrapper blue darken-3">
				<div class="row">	
					<div class="col s12 offset-s1">
						
						
							<a href="{{URL::route('personaldata')}}" class="breadcrumb ci" >Personal Data</a>
				
					
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>
    
<div id="pd" class="row">
    <div class="col s8 push-s3" style=" margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1 animated slideInLeft" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<div class="row">	
				<div class="col s4 push-s4">
					<h4 id="scroll">Personal Data</h4>
				</div>
			</div>
		   <div class="row" style="margin:1%;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="input-field col s4">
					   <i class="material-icons prefix">account_circle</i>
					   <input placeholder = " " id="firstName" type="text" class="validate" pattern="[A-za-z.' ][^0-9]{2,}" required="" aria-required="true" >
					   <label class="ci" data-error="Incorrect" for="firstName">First Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
					    <input placeholder = " " id="middleName" type="text" class="validate" pattern="[A-za-z.' ][^0-9]{2,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="middleName">Middle Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
						<input placeholder = " " id="lastName" type="text" class="validate" pattern="[A-za-z.' ][^0-9]{2,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="lastName">Last Name</label>

				</div>

				<div class="input-field col s4">
					    <i class="material-icons prefix">home</i>
						<input placeholder = " " id="address" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">

						<label class="ci" data-error="Incorrect" for="address">Address</label>

				</div>

				<div class = "input-field col s4 ci">    
                    <select  id = "provinceSelect">
                        <option disabled selected>Choose Province</option>
                        @foreach($provinces as $province)
                        <option id = "{{$province -> intProvinceID}}" >{{$province->strProvinceName}}</option>
                        @endforeach
                    </select>
				</div>
			   
			   	<div class = "input-field col s4 ci">    
                    <select  id = "citySelect">
                        <option disabled selected>Choose City</option>
                    </select>
				</div>

<!--
				<div class="input-field col s6 ci">
						<input  id="dateOfbirth" type="date" class="datepicker ci">
						<label class="active ci" data-error="Incorrect" for="dateOfbirth">Date of Birth</label>
				</div>
-->
			   
			   <div class="input-field col s6 ci">
					<label class="active" style="color:#64b5f6;"  for="dateOfbirth">Date of Birth</label>	
				   <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
						
				</div>

				<div class="input-field col s6">
						<input placeholder = " " id="placeofbirth" type="text" class="validate ci" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="placeofbirth">Place of Birth</label>

				</div>

				<div class="input-field col s6">
						<i class="material-icons prefix">smartphone</i>
						<input placeholder = " " id="contactCp" maxlength="13" type="text" class="validate ci" pattern="[0-9+]{11,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="contactCp">Contact Number (Mobile)</label>

				</div>
				
			    <div class="input-field col s6">
						<i class="material-icons prefix">phone</i>
						<input placeholder = " " id="contactLandline" maxlength="10" type="text" class="validate ci" pattern="[0-9+-]{7,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="contactLandline">Contact Number (Landline)</label>

				</div>

				<div class="input-field col s4 push-s2 ci">
						<select id = "civilStatus">
						  <option value="" disabled selected>Choose</option>
						  <option value="Single">Single</option>
						  <option value="Married">Married</option>
						  <option value="Widowed">Widowed</option>
						</select>
    					<label>Civil Status</label>

				</div>

				<div class="input-field col s4 push-s2 ci">
						<select id = "gender">
							<option value="" disabled selected>Choose</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					    <label>Gender</label>
				 </div>
			   	
               
    
			   
				<div class="input-field col s10 push-s1 ci">
                    <h5>Body Attributes:</h5>
					<div class="row">
						<div class="col s12">
					
							<table class="striped white ci">
								<thead>
									<tr>
										<th><center>Name</center></th>
										<th><center>Specification</center></th>
                                        <th><center>Measurement</center></th>
									</tr>
								</thead>

								<tbody>
                                    @foreach ($bodyAttributes as $bodyAttribute)
                                    <tr>
                                        <td style="height:-10px !important;"><center>
                                            <div  id = "name{{ $bodyAttribute->intBodyAttributeID }}">{{ $bodyAttribute->strBodyAttributeName }}</div></center>
                                        </td>
                                        <td style="height:-10px !important;"><center>
                                            
                                                <input  id="specification{{ $bodyAttribute->intBodyAttributeID }}" type="text" class="validate" pattern="[A-za-z0-9.,' ]{1,}" size="1" required="" aria-required="true">
                                                </center>
                                            
                                        </td>
                                        <td style="height:-10px !important;"><center>
                                            <div  id = "measurement{{ $bodyAttribute->intBodyAttributeID }}" value = "{{$bodyAttribute->Measurement->strMeasurement}}">{{$bodyAttribute->Measurement->strMeasurement}}</div></center>
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



<div id="gl" class="row">
    <div class="col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1 animated slideInLeft" style="border: 1px solid black; border-radius:5px;">
            <div class="row">	
				<div class="col s4 push-s4 ci">
					<h4>Guard License</h4>
				</div>
			</div>
            <div class="row" style="margin:2%;">
				<div class="container-fluid grey lighten-3 col s10 push-s1" style="border-radius:5px; border: 1px solid black;">
					<div class="row" style="margin-top:2%">
					
							<div class="input-field col s8 push-s2 ci">
								<input placeholder=" " id="licenseNumber" type="text" class="validate" name = "licenseNo" required="" aria-required="true">
								<label for="strLicenseNo">License Number</label> 
							</div>
					
					</div>

					<div class="row">
						<div class="input-field col s8 push-s2 ci">
							<input  id="dateIssued" type="date" class="datepicker"  required="" aria-required="true">
							<label class="active" data-error="Incorrect" for="startDate">Date Issued</label>
						</div>
					</div>

					<div class = "row">
						<div class="input-field col s8 push-s2 ci">
							<input  id="dateExpiration" type="date" class="datepicker" required="" aria-required="true">
							<label class="active" data-error="Incorrect" for="endDate">Date Expired</label>
						</div>
					</div>
				</div>
             </div>
         </div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextPersonalData">Next</button>
     </div>
</body>





<input type="hidden" id = "counter" value = "{{$counter}}">
</div>

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
                    var provinceID = data.province.id;
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
                    $("#citySelect option[id='"+ data.city.id +"']").attr("selected", "selected");
                    $('#civilStatus').val(data.civilStatus);
                    $('#gender').val(data.gender);
                    
                    $('select').material_select();
                    
                }else{
                    
                }
                
            }
        }); //get data
        
        $('#nextPersonalData').click(function(){
            
			if (checkInput()){
				sendData();
				window.location.href = '{{ URL::to("/guard/registration/educationalbackground") }}';
//				confirm('tama');
			}else{
				confirm('mali');
			}
			
				
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
            var measurement = {}; 
            var province = $('#provinceSelect').children(":selected").attr("id");
            var city = $('#citySelect').children(":selected").attr("id");
            var intCounter = 0;
            for(intLoop = 0; intLoop < $('#counter').val(); intLoop ++){
                if (bodyAttribute[intLoop]['boolFlag'] == 1){
                    var specification = 'specification' + bodyAttribute[intLoop]['intBodyAttributeID'];
                    var measurementName = 'measurement' + bodyAttribute[intLoop]['intBodyAttributeID'];
                    
                    bodyAttributeID[intCounter] = bodyAttribute[intLoop]['intBodyAttributeID'];
                    value[intCounter] = $('#'+specification).val();
                    measurement[intCounter] = $('#'+measurementName).text();
                    intCounter = intCounter + 1;
                }
            }
            
            var objProvince = {
                "id": province,
                "name": $('#provinceSelect').val()
            };
            
            var objCity = {
                "id": city,
                "name": $('#citySelect').val()
            };
            
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
                    measurement: measurement,
                    province: objProvince,
                    city: objCity,
                    provinceID: province,
                    cityID: city,
                    licenseNumber: $('#licenseNumber').val(),
                    dateIssued: $('#dateIssued').val(),
                    dateExpiration: $('#dateExpiration').val()
                    
                },
                success: function(data){

                },
                error: function(xhr){
                    console.log(data);
                }
            });//ajax
        }//sendData()
		
		function checkInput(){
			var checker;
			
//			$.each(bodyAttribute, function(index,value){
//				
//				var specs = $('#specification' + value.intBodyAttributeID);
//				confirm(specs);
//				if (specs == ''){
//					checker = false;
//					confirm ('test');
//					return false;
//				}
//			});
//				
//			console.log(bodyAttribute);
			var firstName = $('#firstName').val();
			if (firstName == '' || checker == false){
				checker = false;
			}else{
				checker = true;
			}
			
			return checker;
		}
		
    });
	
	
   
	
</script>

@stop
