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
<div ng-app = "personalData">
    <div ng-controller = "personalDataController">
        <div class="row">
            <div class="col s8 push-s3" style=" margin-left:10px;">
                <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;" id="personaldata">
                   <legend><h4>Personal Data @{{errorMessage}}</h4></legend>
                   <div class="row" style="margin:5%;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-field col s4">
                               <i class="material-icons prefix">account_circle</i>
                               <input placeholder=" " id="firstName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" value = "@{{personalData.firstName}}">
                               <label data-error="Incorrect" for="firstName">First Name</label>
                        </div>

                        <div class="input-field col s4">
                                <i class="material-icons prefix">account_circle</i>
                                <input  id="middleName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" placeholder=" " value = "@{{personalData.middleName}}">
                                <label data-error="Incorrect" for="middleName">Middle Name</label>

                        </div>

                        <div class="input-field col s4">
                                <i class="material-icons prefix">account_circle</i>
                                <input  id="lastName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" placeholder=" " value = "@{{personalData.lastName}}">
                                <label data-error="Incorrect" for="lastName">Last Name</label>

                        </div>

                        <div class="input-field col s4">
                                <i class="material-icons prefix">home</i>
                                <input  id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true" placeholder=" " value = "@{{personalData.address}}">

                                <label data-error="Incorrect" for="address">Address</label>

                        </div>

                        <div class = "input-field col s4">    
                            <select REQUIRED id = "provinceSelect">
                                <option disabled selected>Choose Province</option>
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
                                                <th>Measurement</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr style="height:-10px !important;" ng-repeat = "bodyAttribute in bodyAttributes">
                                                <td>
                                                    <div class="col s3" ng-attr-id = "@{{'name' + bodyAttribute.intBodyAttributeID}}" ng-value = "@{{bodyAttribute.strBodyAttributeName}}">@{{bodyAttribute.strBodyAttributeName}}</div>
                                                </td>
                                                <td>
                                                    <div class="input-field col s7">
                                                        <input  ng-attr-id = "@{{'specification' + bodyAttribute.intBodyAttributeID}}" type="text" ng-value = "@{{bodyAttribute.strValue}}" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
                                                        <label data-error="Incorrect" for=""></label>
                                                    </div>
                                                </td>
                                                <input type = "hidden" ng-attr-id = "@{{'specification' + bodyAttribute.intBodyAttributeID}}">
                                                <td>
                                                    <div class="col s3" ng-attr-id = "@{{'measurement' + bodyAttribute.intBodyAttributeID}}" >@{{bodyAttribute.intMeasurementID}}</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextPersonalData">Next</button>
                </div>
            </div>
            <input type = "hidden" id = "counter" value = "@{{counter}}">
            <input type = "hidden" id = "provinceSession" value = "@{{personalData.province}}">
            <input type = "hidden" id = "counter" value = "@{{counter}}">
            <input type = "hidden" id = "boolFlag" value = "@{{personalData.flag}}">
        </div>
        
    </div>
</div>


@stop
@section('script')


<script>
    
    $(document).ready(function() {
        
//        if ($('#session').val() == "active"){
//            var provinceID = $('#provinceSession').val();
//            
//            $('#firstName').val($('#firstNameSession').val());
//            $('#middleName').val($('#middleNameSession').val());
//            $('#lastName').val($('#lastNameSession').val());
//            $('#address').val($('#addressSession').val());
//            $('#dateOfbirth').val($('#dateOfbirthSession').val());
//            $('#placeofbirth').val($('#placeofbirthSession').val());
//            $('#contactCp').val($('#contactCpSession').val());
//            $('#contactLandline').val($('#contactLandlineSession').val());
//            $('#civilStatus').val($('#civilStatusSession').val());
//            $('#gender').val($('#genderSession').val());
//            $("#provinceSelect option[id='"+ provinceID +"']").attr("selected", "selected");
//            $.ajax({
//
//                type: "GET",
//                url: "{{action('CityController@get')}}",
//                beforeSend: function (xhr) {
//                    var token = $('meta[name="csrf_token"]').attr('content');
//
//                    if (token) {
//                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
//                    }
//                },
//                data: {
//                    
//                },
//                success: function(data){
//                    
//                    var $selectDropdown = 
//                        $("#citySelect")
//                        .empty()
//                        .html(' ');
//                    $selectDropdown.append(
//                                $("<option></option>")
//                                .attr("value",0)
//                                .attr("disabled", 'disabled')
//                                .text('Choose City')
//                            );
//                    $.each(data, function(index, subcatObj){
//                        if (subcatObj.intProvinceID == provinceID){
//                            $selectDropdown.append(
//                                $("<option></option>")
//                                .attr("id",subcatObj.intCityID)
//                                .text(subcatObj.strCityName)
//                            );
//                        }
//                    });
//
//                    
//                    $("#citySelect").material_select();
//                },async:false
//            });
//            
//            $("#citySelect option[id='"+ $('#citySession').val() +"']").attr("selected", "selected");
//        };
        
        var cityData;
        
        $.ajax({

            type: "GET",
            url: "{{action('ProvinceController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){

                var $selectDropdown = 
                    $("#provinceSelect")
                    .empty()
                    .html(' ');
                $selectDropdown.append(
                            $("<option></option>")
                            .attr("value",0)
                            .attr("disabled", 'disabled')
                            .attr("selected",'select')
                            .text('Choose Province')
                        );
                $.each(data, function(index, subcatObj){
                    $selectDropdown.append(
                        $("<option></option>")
                        .attr("id",subcatObj.intProvinceID)
                        .text(subcatObj.strProvinceName)
                    );
                });

                $("#provinceSelect").material_select();

            }
        });//province select
        
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
                cityData = data;
            }
        });//city get
        
        $('#nextPersonalData').click(function(){
            confirm($('#provinceSession').val());
            //sendData();
//            window.location.href = '{{ URL::to("/guard/registration/educationalBackground") }}';
        });
        
        
        
        $('#provinceSelect').on('change',function(){
            var id = $(this).children(":selected").attr("id");
            var $selectDropdown = 
                $("#citySelect")
                .empty()
                .html(' ');
            $selectDropdown.append(
                        $("<option></option>")
                        .attr("value",0)
                        .attr("disabled", 'disabled')
                        .attr("selected",'select')
                        .text('Choose City')
                    );
            $.each(cityData, function(index, subcatObj){
                if (subcatObj.intProvinceID == id){
                    $selectDropdown.append(
                        $("<option></option>")
                        .attr("id",subcatObj.intCityID)
                        .text(subcatObj.strCityName)
                    );
                }
            });

            $("#citySelect").material_select();
        });//city select
        
        
       
        function sendData(){
            var value = {};
            var bodyAttribute = {}; 
            var bodyAttributeID = {}; 
            var measurement = {}; 
            var province = $('#provinceSelect').children(":selected").attr("id");
            var city = $('#citySelect').children(":selected").attr("id");
            confirm(province);
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
                    var intCounter = 0;
                    for(intLoop = 0; intLoop < $('#counter').val(); intLoop ++){
                        if (data[intLoop]['boolFlag'] == 1){
                            var specification = 'specification' + data[intLoop]['intBodyAttributeID'];
                            var measurement1 = 'measurement' + data[intLoop]['intBodyAttributeID'];
                            
                            bodyAttributeID[intCounter] = data[intLoop]['intBodyAttributeID'];
                            value[intCounter] = $('#'+specification).val();
                            bodyAttribute[intCounter] = data[intLoop]['strBodyAttributeName'];
                            measurement[intCounter] = $('#' + measurement1).html();
                            intCounter = intCounter + 1;
                        }
                    }
                },
                
                error: function(data){
                    
                },
                async:false
                
            });//ajax
            
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
                    bodyAttribute: bodyAttribute,
                    bodyAttributeID: bodyAttributeID,
                    measurement:measurement,
                    province: province,
                    city: city
                    
                },
                success: function(data){
                    
                },
                error: function(data){
                    confirm('error send data');
                }
            });//ajax
        }//sendData()
    });
   
</script>
<script type="text/javascript" src="{!! asset('js/personalData.js') !!}"></script>

@stop
