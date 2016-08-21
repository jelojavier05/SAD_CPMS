@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Settings
@endsection


@section('content')
<div class="row">			
	<div class="ci col s8 push-s3" style="margin-top:25px;">	
		<ul class="collection with-header" id="collectionActive">
			<li class="collection-header" ><h4 style="font-weight:bold;">Details
				<a  data-position="bottom" data-delay="50" data-tooltip="Edit Account" class="btn blue right tooltipped" id = 'buttonDetail'><i class="material-icons">mode_edit</i></a></h4>
				<a  data-position="bottom" data-delay="50" data-tooltip="Change Password" class="btn blue tooltipped" id = 'btnUpdatePassword' style="margin-top:-84px; margin-left:600px;"><i class="material-icons">vpn_key</i></a></h4>
			</li>
			<div>
						
                
                <div class="col s12">
                    <div class="col s6">
                    
                        <li class="collection-item" style="font-weight:bold;">First Name:<div style="font-weight:normal;" id = 'firstName'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Middle Name:<div style="font-weight:normal;" id = 'middleName'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Last Name:<div style="font-weight:normal;" id = 'lastName'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Date of Birth:<div style="font-weight:normal;" id = 'birthday'>&nbsp;&nbsp;&nbsp;</div>
                        </li>
                    </div>
                    <div class="col s6">
                        <li class="collection-item" style="font-weight:bold;">Place of Birth:<div style="font-weight:normal;" id = 'placeBirth'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Contact Number (Mobile):<div style="font-weight:normal;" id = 'contactMobile'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Contact Number (Landline):<div style="font-weight:normal;" id = 'contactLandline'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Civil Status:<div style="font-weight:normal;" id = 'civilStatus'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                        <li class="collection-item" style="font-weight:bold;">Gender<div style="font-weight:normal;" id = 'gender'>&nbsp;&nbsp;&nbsp;</div>
                        </li>

                    </div>
                </div>
				

                
                
				
				
				<li class="collection-item" style="font-weight:bold;">Body Attributes
					<div style="font-weight:normal;" id = ''>
						<table class="" style="font-family:Myriad Pro" id = 'tableViewBodyAttribute'>
                            <thead>
                            <tr>
                                <th data-field="st">Name</th>
                                <th data-field="fr">Specification</th>
                                <th data-field="to">Measurement</th>
                            </tr>
                            </thead>
                            
                            <tbody>

                            </tbody>
                        </table>
					</div>
				</li>
			</div>	
		</ul>
	</div>
</div>
<!-- Change Password Start-->
<div id="modalchangePassword" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Change Password</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strCurrent" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Current Password</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">New Password</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strConfirm" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Confirm New Password</label> 
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">Save
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!-- Change Password End -->

<div class="row"></div>
<div class="row"></div>

<!-- Change Detail Start -->
<div id="modalchangeDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:800px !important; margin-top:10px !important;  max-height:100% !important; height:550px !important; border-radius:10px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Edit Details</center></h3>  
		</div>
	</div>
	<div class="modal-content sidenavhover " id="" style="overflow-x:hidden;" >
		<div class="row">
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input placeholder=" " id="strFirstName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">First Name</label> 
				</div>
			</div>
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input  placeholder=" " id="strMiddleName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Middle Name</label> 
				</div>
			</div>
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input  placeholder=" " id="strLastName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Last Name</label> 
				</div>
			</div>
			<div class="col s6">      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">store</i>
					<input placeholder=" " id="strAddress" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Address</label> 
				</div>
			</div>
			<div class="col s3">
				<div class=" input-field col s12">
					<select id = 'selectProvince'>
						
					</select>
				</div>
			</div>
			<div class="col s3">
				<div class=" input-field col s12">
					<select id = 'selectCity'>

					</select>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px; color:#64b5f6;">star</i>
					<input type="date" id="dateOfbirth" class="datepicker"/>
					<label class="active" for="dateOfbirth">Date of Birth</label>
				</div>
			</div>
			<div class="col s6" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">star</i>
					<input placeholder=" " id="strPlaceBirth" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Place of Birth</label> 
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size: 35px;">smartphone</i>
					<input placeholder=" " id="strContactNumberMobile" type="text" class="validate" name="" required="" aria-required="true"/>
					<label for="">Contact Number (Mobile)</label>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size: 35px;">phone</i>
					<input placeholder=" " id="strContactNumberLandline" type="text" class="validate" name="" required="" aria-required="true"/>
					<label for="">Contact Number (Landline)</label>
				</div>
			</div>
			<div class="col s4 push-s2">
				<select id="selectCivilStatus">
					<option selected disabled>Civil Status</option>
					<option>Single</option>
					<option>Married</option>
					<option>Widowed</option>									
				</select>
			</div>
			<div class="col s4 push-s2">
				<select id="selectGender" >
					<option selected disabled>Gender</option>
					<option>Male</option>
					<option>Female</option>																			
				</select>
			</div>
			<div class="input-field col s10 push-s1 ci">                    
				<h5>Body Attributes:</h5>					
				<div class="row">						
					<div class="col s12">												
						<table class="striped white ci" id = 'tableBodyAttribute'>								
							<thead>									
								<tr>										
								<th><center>Name</center></th>										
								<th><center>Specification</center></th>                                        
								<th><center>Measurement</center></th>									
								</tr>								
							</thead>								
							<tbody>         
								                       
							</tbody>							
						</table>						
					</div>					
				</div>				
			</div> 
		</div>
	</div>
	<!-- Modal Button Save -->
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSaveDetails">Save
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!-- Change Detail End -->
@stop

@section('script')

<script>
$(document).ready(function(){
	var city;
	var bodyAttributeID = [];
	var bodyAttributeValue = [];
	var bodyAttributeArray;

	$.ajax({
        type: "GET",
        url: "{{action('CityController@get')}}",
        success: function(data){
            city = data;
        }
    }); //city
	
	$.ajax({
        type: "GET",
        url: "{{action('SecuritySettingsController@getGuardInformation')}}",
        success: function(data){
        	var provinceID = data.intProvinceID;
        	var cityID = data.intCityID;

            $('#firstName').text(data.strFirstName);
            $('#middleName').text(data.strMiddleName);
            $('#lastName').text(data.strLastName);
            $('#address').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
            $('#birthday').text(data.birthday);
            $('#placeBirth').text(data.strPlaceBirth);
            $('#contactMobile').text(data.strContactNumberMobile);
            $('#contactLandline').text(data.strContactNumberLandline);
            $('#civilStatus').text(data.strCivilStatus);
            $('#gender').text(data.strGender);

            bodyAttributeArray = data.bodyAttribute;

            $.each(data.bodyAttribute, function(index, value){
            	$('#tableViewBodyAttribute tr:last').after('<tr>'+
            		'<td>'+value.strBodyAttributeName+'</td>'+
            		'<td>'+value.strValue+'</td>'+
            		'<td>'+value.strMeasurement+'</td></tr>');
            });

            // Province Start
            var $selectDropdownProvince = 
	            $("#selectProvince")
	            .empty()
	            .html(' ');
	        $selectDropdownProvince.append(
	                    $("<option></option>")
	                    .attr("value",0)
	                    .attr("disabled", 'disabled')
	                    .text('Choose Province')
	                );
            $.each(data.provinces, function(index,value){
            	$selectDropdownProvince.append(
                    $("<option></option>")
                    .attr("id",value.intProvinceID)
                    .attr("value",value.intProvinceID)
                    .text(value.strProvinceName)
                );
            });
            // Province End

            // Text Start
            $('#strFirstName').val(data.strFirstName);
            $('#strMiddleName').val(data.strMiddleName);
            $('#strLastName').val(data.strLastName);
            $('#strAddress').val(data.strAddress);
            $('#strPlaceBirth').val(data.strPlaceBirth);
            $('#strContactNumberLandline').val(data.strContactNumberLandline);
            $('#strContactNumberMobile').val(data.strContactNumberMobile);
            // Text End
            document.getElementById("dateOfbirth").value = data.dateBirthday;

            // Drop-down start
            $("#provinceSelect option[id='"+ provinceID +"']").attr("selected", "selected");
            getCity(provinceID);
            $("#selectCity option[id='"+ data.intCityID +"']").attr("selected", "selected");
            $('#selectCivilStatus').val(data.strCivilStatus);
            $('#selectGender').val(data.strGender);
            $('select').material_select();
            // Drop-down End

            $.each(data.bodyAttribute,function(index, value){
            	var input = '<center><input  id="value'+value.intBodyAttributeID+'" type="text" class="validate" pattern="[A-za-z0-9.,]{1,}" size="1" required="" aria-required="true" value="'+value.strValue+'"></center>';

            	$('#tableBodyAttribute tr:last').after('<tr>'+
            		'<td>'+value.strBodyAttributeName+'</td>'+
            		'<td>'+input+'</td>'+
            		'<td><center>'+value.strMeasurement+'</center></td></tr>');
            });
        }
    }); //information

	$('#buttonDetail').click(function(){
		var provinceID = $('#provinceID').val();
		var cityID = $('#cityID').val();
		var gender = $('#guardGender').val();
		var civilStatus = $('#guardCivilStatus').val();

		$('#modalchangeDetails').openModal();
	});

	$('#btnSaveDetails').click(function(){
	    if (checkInput()){ //checking for input
			swal({   title: "Confirmation",   
				  	 text: "Please Enter your Password",   
				  	 type: "input",
				     inputType: "password",
				     showCancelButton: true,   
				     closeOnConfirm: false,   
				     animation: "slide-from-top",   
				     inputPlaceholder: "Enter Password" 
				 }, 
				 function(inputValue){   
					if (inputValue === false) 
						return false;      

					if (checkPassword(inputValue) == false){ //checking for password
						swal.showInputError("Check Your password.");     
						return false;
					}else{
						postEditDetail();
					}
	    		});
		}else{
			var toastContent = $('<span>Check your input.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
    });

	$('#selectProvince').on('change',function(){
        var id = $(this).children(":selected").attr("id");
        getCity(id);
    });

	function getCity(provinceID){
        var $selectDropdown = 
            $("#selectCity")
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
                    .attr("value",subcatObj.intCityID)
                    .text(subcatObj.strCityName)
                );
            }
        });

        $("#selectCity").material_select();
    }

    function checkPassword(password){
    	var checker;
    	$.ajax({
	        type: "POST",
	        url: "{{action('SecuritySettingsController@checkPassword')}}",
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');

	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
	            password: password
	        },
	        success: function(data){
	        	if (data){
	        		checker = true;
	        	}else{
	        		checker = false;
	        	}
	        },async:false
	    });//ajax

	    
	    return checker;
    }

    function checkInput(){
    	var boolChecker = true;

    	if ($('#strFirstName').val().trim() == '' || $('#strLastName').val().trim() == '' ||
    		$('#strAddress').val().trim() == '' || $('#strPlaceBirth').val().trim() == '' ||
    		$('#strContactNumberMobile').val().trim() == ''){
    		boolChecker = false;
    	}

    	// for (intLoop =0; intLoop < $("#tableBodyAttribute > tbody > tr").length; intLoop ++){
		//checking for body attribute    		
    	// }

    	return boolChecker;
    }

    function postEditDetail(){
    	var strFirstName = $('#strFirstName').val().trim();
    	var strMiddleName = $('#strMiddleName').val().trim();
    	var strLastName = $('#strLastName').val().trim();
    	var strAddress = $('#strAddress').val().trim();
    	var strPlaceBirth = $('#strPlaceBirth').val().trim();
    	var strContactNumberMobile = $('#strContactNumberMobile').val().trim();
    	var strContactNumberLandline = $('#strContactNumberLandline').val().trim();
    	var strGender = $('#selectGender').val();
    	var strCivilStatus = $('#selectCivilStatus').val();
    	var dateBirthday = $('#dateOfbirth').val();
		var intProvinceID = $('#selectProvince').children(":selected").attr("id"); 	
		var intCityID = $('#selectCity').children(":selected").attr("id");	
		var guardBodyAttributeID = [];
		var guardBodyAttributeValue = [];
		$.each(bodyAttributeArray, function(index, value){
			var strInputValue = 'value' + value.intBodyAttributeID;
			guardBodyAttributeID[index] = value.intGuardBodyAttributeID;
			guardBodyAttributeValue[index] = $('#' + strInputValue).val().trim();
		});
    	$.ajax({
	        type: "POST",
	        url: "{{action('SecuritySettingsController@updateDetail')}}",
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');

	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
	            strFirstName: strFirstName,
	            strMiddleName: strMiddleName,
	            strLastName: strLastName,
	            strAddress: strAddress,
	            strPlaceBirth: strPlaceBirth,
	            strContactNumberMobile: strContactNumberMobile,
	            strContactNumberLandline: strContactNumberLandline,
	            strGender: strGender,
	            strCivilStatus: strCivilStatus,
	            dateBirthday: dateBirthday,
	            intProvinceID: intProvinceID,
	            intCityID: intCityID,
	            guardBodyAttributeID: guardBodyAttributeID,
	            guardBodyAttributeValue: guardBodyAttributeValue
	        },
	        success: function(data){
	        	swal({
					title: "Success!",
					text: "Profile Updated!",
					type: "success"
				},
				function(){
					window.location.href = '{{ URL::to("/securitysettings") }}';
				});
	        }
	    });//ajax
    }

    // Change Password Start

    $('#btnUpdatePassword').click(function(){
		$('#modalchangePassword').openModal();
	});

	$('#btnChangePasswordSave').click(function(){
		var strCurrent = $('#strCurrent').val();
		var strNew = $('#strNew').val();
		var strConfirm = $('#strConfirm').val();
		
		if (checkPassword(strCurrent)){
			if (strNew === strConfirm){
				$.ajax({
			        type: "POST",
			        url: "{{action('SecuritySettingsController@updatePassword')}}",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: {
			            strNewPassword: strNew
			        },
			        success: function(data){
					    swal({
							title: "Success!",
							text: "Password Updated!",
							type: "success"
						},
						function(){
							window.location.href = '{{ URL::to("/securitysettings") }}';
						});
			        }
			    });//ajax
			}else{
				var toastContent = $('<span>Passwords does not match.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		}else{
			var toastContent = $('<span>Please Check your input!</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	// Change password end
});
</script>

<script>
    $(document).ready(function(){
      

      $('.slider').slider({full_width: true});
    });
</script>
@stop