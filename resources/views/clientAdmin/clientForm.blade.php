@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')



<div class="row">
	<div class="col s6 push-s4" style=" margin-left:10px; margin-top: 1%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<h4 class = "blue darken-2 white-text" style="margin-top:0px;">Client</h4>
			<div class = "row">
				<div class='col s10 push-s1'>
					
					<div class="input-field col s6 offset-s6 pull-s6">
						<select id = "natureSelect">
						  <option value="" disabled selected>Choose</option>
                            @foreach($natureOfBusinesses as $value)
                            <option id = "nob{{$value->intNatureOfBusinessID}}" value = "{{$value->intNatureOfBusinessID}}">{{$value->strNatureOfBusiness}}</option>
                            
                            @endforeach
                            
						</select>
    					<label>Nature of Business</label>

					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="clientName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label for="clientName"  data-error="Incorrect">Client Name</label>
					</div>
					
				
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
				
					
					<div class="input-field col s12">
						<input placeholder=" " id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="address">Address</label>

					</div>
					
					<div class = "input-field col s6">    
					   <select  id = "provinceSelect">
						   <option disabled selected>Choose Province</option>
				            @foreach($provinces as $value)
                            <option id = "province{{$value->intProvinceID}}" value = "{{$value->intProvinceID}}">{{$value->strProvinceName}}</option>
                            @endforeach
					   </select>
					</div>
					
					<div class = "input-field col s6">    
					   <select  id = "citySelect" name = "" >
						   <option disabled selected>Choose City</option>
					   </select>
					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="areaSize" type="text" class="validate" pattern="[0-9. ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="areaSize">Area Size (approx. in square meters)</label>

					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="population" type="text" class="validate" pattern="[0-9, ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="population">Population (approx.)</label>

					</div>
					
					<div class="input-field col s4 push-s4">
						<input placeholder=" " id="guardNo" type="number" class="validate" pattern="[0-9,]{1,}" required="" aria-required="true">
						<label data-error="Incorrect" for="population">Number of Guards</label>

					</div>
				
				</div>
			</div>
			
			<div class ="row">
				<div>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px;">
						<legend><h4>Shift</h4></legend>
						<button style="margin-top:-15%; margin-left:380px;" class="z-depth-1 btn green" id = "btnAddShift">
						<i class="material-icons left">add</i>ADD
						</button>
                        
                        <button style="margin-top:-24%; margin-left:180px;" class="z-depth-1 btn red" id = "btnRefreshShift">
						<i class="material-icons left">replay</i>Refresh
						</button>
							<div class="col s10 push-s1">
								<table class="bordered grey lighten-1" id = "dataTable" style="margin-bottom:15px;">
									<thead>
										<tr>

											<th style="width:20px;"><center>Shift No.</center></th>
											<th style="width:10px;"><center>From</center></th>
											<th style="width:10px;"><center>To</center></th>
										</tr>
									</thead>
									<tbody> 
											<tr>
												<td><center>1</center></td>
												<td>
													<select id = "shiftSelectFrom1" class="browser-default col s8 offset-s2">
													  <option value="" disabled selected>---</option>
												        <option id = "0" value="0">12 AM</option>
                                                        <option id = "1" value="1">1 AM</option>
                                                        <option id = "2" value="2">2 AM</option>
                                                        <option id = "3" value="3">3 AM</option>
                                                        <option id = "4" value="4">4 AM</option>
                                                        <option id = "5" value="5">5 AM</option>
                                                        <option id = "6" value="6">6 AM</option>
                                                        <option id = "7" value="7">7 AM</option>
                                                        <option id = "8" value="8">8 AM</option>
                                                        <option id = "9" value="9">9 AM</option>
                                                        <option id = "10" value="10">10 AM</option>
                                                        <option id = "11" value="11">11 AM</option>
                                                        <option id = "12" value="12">12 PM</option>
                                                        <option id = "13" value="13">1 PM</option>
                                                        <option id = "14" value="14">2 PM</option>
                                                        <option id = "15" value="15">3 PM</option>
                                                        <option id = "16" value="16">4 PM</option>
                                                        <option id = "17" value="17">5 PM</option>
                                                        <option id = "18" value="18">6 PM</option>
                                                        <option id = "19" value="19">7 PM</option>
                                                        <option id = "20" value="20">8 PM</option>
                                                        <option id = "21" value="21">9 PM</option>
                                                        <option id = "22" value="22">10 PM</option>
                                                        <option id = "23" value="23">11 PM</option>
													</select>
												</td>
												<td>
													<select id = "shiftSelectTo1" class="browser-default col s8 offset-s2">
													  <option value="" disabled selected>---</option>
													  <option id = "0" value="0">12 AM</option>
                                                        <option id = "1" value="1">1 AM</option>
                                                        <option id = "2" value="2">2 AM</option>
                                                        <option id = "3" value="3">3 AM</option>
                                                        <option id = "4" value="4">4 AM</option>
                                                        <option id = "5" value="5">5 AM</option>
                                                        <option id = "6" value="6">6 AM</option>
                                                        <option id = "7" value="7">7 AM</option>
                                                        <option id = "8" value="8">8 AM</option>
                                                        <option id = "9" value="9">9 AM</option>
                                                        <option id = "10" value="10">10 AM</option>
                                                        <option id = "11" value="11">11 AM</option>
                                                        <option id = "12" value="12">12 PM</option>
                                                        <option id = "13" value="13">1 PM</option>
                                                        <option id = "14" value="14">2 PM</option>
                                                        <option id = "15" value="15">3 PM</option>
                                                        <option id = "16" value="16">4 PM</option>
                                                        <option id = "17" value="17">5 PM</option>
                                                        <option id = "18" value="18">6 PM</option>
                                                        <option id = "19" value="19">7 PM</option>
                                                        <option id = "20" value="20">8 PM</option>
                                                        <option id = "21" value="21">9 PM</option>
                                                        <option id = "22" value="22">10 PM</option>
                                                        <option id = "23" value="23">11 PM</option>
													</select>
												</td>
											</tr>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
            
            <div class ="row">
				<div>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px;">
						<legend><h4>Account</h4></legend>
						<button style="margin-top:-15%; margin-left:380px;" class="z-depth-1 btn green" id = "btnGenerateAccount">
						Generate
						</button>
                        
                        <div class="col s10 push-s1">
                            <div class="row">
                                <div class="col s8 push-s2">
                                    <div class="input-field">
                                        <input placeholder=" " id="username" type="text" class="validate" name = "userName" required="" aria-required="true">
                                        <label for="strUserName">Username</label> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s8 push-s2">
                                    <div class="input-field">
                                        <input placeholder=" " id="password" type="text" class="validate" name = "passWord" required="" aria-required="true">
                                        <label for="password">Password</label> 
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		
		</div>
		<center><a style="margin-top:20px;" class=" z-depth-2 btn-large green" id = "btnSave">Save</a></center>
	</div>
	
</div>

@stop

@section('script')
<script>
    
    $(document).ready(function() {
        var city;
        var shiftCounter = 1;
        var shiftNumber = {};
        var shiftTo = {};
        var shiftFrom = {};
        var table = $('#dataTable').DataTable();
        
        
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
        
        $('#provinceSelect').on('change',function(){
            var id = $('#provinceSelect').val();
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
                        .attr("value",subcatObj.intCityID)
                        .attr("id",subcatObj.intCityID)
                        .text(subcatObj.strCityName)
                    );
                }
            });

            $("#citySelect").material_select();
        }
        
        $('#btnSave').click(function(){
            if (checkInputShift() && checkInput()){
                for (intLoop = 1; intLoop <= shiftCounter; intLoop ++){
                    shiftNumber[intLoop - 1] = intLoop;
                    shiftFrom[intLoop - 1] = $('#shiftSelectFrom' + intLoop).val();
                    shiftTo[intLoop - 1] = $('#shiftSelectTo' + intLoop).val();
                }
                
                $.ajax({

                    type: "POST",
                    url: "{{action('ClientRegistrationController@insert')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        natureOfBusiness: $('#natureSelect').val() ,
                        clientName: $('#clientName').val() ,
                        clientContactNumber: $('#clientcontactLandline').val() ,
                        personInCharge: $('#personInCharge').val() ,
                        personContactNumber: $('#piccontactCp').val() ,
                        strAddress: $('#address').val(),
                        province: $('#provinceSelect').val(), 
                        city: $('#citySelect').val(),
                        areaSize: $('#areaSize').val() ,
                        population: $('#population').val(),
                        guardNo: $('#guardNo').val(),
                        shiftNumber: shiftNumber,
                        shiftFrom: shiftFrom,
                        shiftTo: shiftTo,
                        username: $('#username').val(),
                        password: $('#password').val()

                    },
                    success: function(data){
                        swal("Success!", "Record has been Added!", "success");
                    },
                    error: function(data){
                        console.log(data);
                    }
                });//ajax
                
            }else{
                var toastContent = $('<span>Check Input.</span>');
                Materialize.toast(toastContent, 2000,'red', 'edit');
            }
            
            
        });
        
        $('#btnAddShift').click(function(){
            
            
            if (shiftCounter < 3){
                var from = $('#shiftSelectFrom' + shiftCounter).val();
                var to = $('#shiftSelectTo' + shiftCounter).val();
                var checker = true;
                
                if (from && to && (to - from) <= 12 && (to - from)>=8){
                    shiftCounter ++;
                    table.row.add([
                        '<h><center>' + shiftCounter +'</center></h>',
                        '<select id = "shiftSelectFrom' + shiftCounter+'" class="browser-default col s8 offset-s2">' + 
                        '<option value="" disabled selected>---</option>' + 
                        '<option id = "24" value="24">12 AM</option>' + 
                        '<option id = "1" value="1">1 AM</option>' +
                        '<option id = "2" value="2">2 AM</option>' +
                        '<option id = "3" value="3">3 AM</option>' + 
                        '<option id = "4" value="4">4 AM</option>' +
                        '<option id = "5" value="5">5 AM</option>' +
                        '<option id = "6" value="6">6 AM</option>' +
                        '<option id = "7" value="7">7 AM</option>' +
                        '<option id = "8" value="8">8 AM</option>' +
                        '<option id = "9" value="9">9 AM</option>' +
                        '<option id = "10" value="10">10 AM</option>' +
                        '<option id = "11" value="11">11 AM</option>' +
                        '<option id = "12" value="12">12 PM</option>' +
                        '<option id = "13" value="13">1 PM</option>' +
                        '<option id = "14" value="14">2 PM</option>' +
                        '<option id = "15" value="15">3 PM</option>' +
                        '<option id = "16" value="16">4 PM</option>' +
                        '<option id = "17" value="17">5 PM</option>' +
                        '<option id = "18" value="18">6 PM</option>' +
                        '<option id = "19" value="19">7 PM</option>' +
                        '<option id = "20" value="20">8 PM</option>' +
                        '<option id = "21" value="21">9 PM</option>' +
                        '<option id = "22" value="22">10 PM</option>' +
                        '<option id = "23" value="23">11 PM</option>' +
                        '</select>',
                        '<select id = "shiftSelectTo' + shiftCounter+'" class="browser-default col s8 offset-s2">' + 
                        '<option value="" disabled selected>---</option>' + 
                        '<option id = "24" value="24">12 AM</option>' + 
                        '<option id = "1" value="1">1 AM</option>' +
                        '<option id = "2" value="2">2 AM</option>' +
                        '<option id = "3" value="3">3 AM</option>' + 
                        '<option id = "4" value="4">4 AM</option>' +
                        '<option id = "5" value="5">5 AM</option>' +
                        '<option id = "6" value="6">6 AM</option>' +
                        '<option id = "7" value="7">7 AM</option>' +
                        '<option id = "8" value="8">8 AM</option>' +
                        '<option id = "9" value="9">9 AM</option>' +
                        '<option id = "10" value="10">10 AM</option>' +
                        '<option id = "11" value="11">11 AM</option>' +
                        '<option id = "12" value="12">12 PM</option>' +
                        '<option id = "13" value="13">1 PM</option>' +
                        '<option id = "14" value="14">2 PM</option>' +
                        '<option id = "15" value="15">3 PM</option>' +
                        '<option id = "16" value="16">4 PM</option>' +
                        '<option id = "17" value="17">5 PM</option>' +
                        '<option id = "18" value="18">6 PM</option>' +
                        '<option id = "19" value="19">7 PM</option>' +
                        '<option id = "20" value="20">8 PM</option>' +
                        '<option id = "21" value="21">9 PM</option>' +
                        '<option id = "22" value="22">10 PM</option>' +
                        '<option id = "23" value="23">11 PM</option>' +
                        '</select>'

                    ]).draw(false);
                    $("#shiftSelectFrom" + shiftCounter + " option[id='" + $('#shiftSelectTo' + --shiftCounter).val() + "']").attr("selected", "selected");

                    shiftCounter++;    
                }else{
                    var toastContent = $('<span>The shift must not less than 8 and not larger than 12 hours</span>');
                    Materialize.toast(toastContent, 2000,'red', 'edit');
                }
                
            }else{
                var toastContent = $('<span>You can only add three (3) shifts.</span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
                
            
        });
        
        $('#btnRefreshShift').click(function(){
            
            var dataTable = $('#dataTable').DataTable();
            dataTable.clear().draw(); 
            shiftCounter = 1;
            dataTable.row.add([
                        '<h><center>' + shiftCounter +'</center></h>',
                        '<select id = "shiftSelectFrom' + shiftCounter+'" class="browser-default col s8 offset-s2">' + 
                        '<option value="" disabled selected>---</option>' + 
                        '<option id = "0" value="0">12 AM</option>' + 
                        '<option id = "1" value="1">1 AM</option>' +
                        '<option id = "2" value="2">2 AM</option>' +
                        '<option id = "3" value="3">3 AM</option>' + 
                        '<option id = "4" value="4">4 AM</option>' +
                        '<option id = "5" value="5">5 AM</option>' +
                        '<option id = "6" value="6">6 AM</option>' +
                        '<option id = "7" value="7">7 AM</option>' +
                        '<option id = "8" value="8">8 AM</option>' +
                        '<option id = "9" value="9">9 AM</option>' +
                        '<option id = "10" value="10">10 AM</option>' +
                        '<option id = "11" value="11">11 AM</option>' +
                        '<option id = "12" value="12">12 PM</option>' +
                        '<option id = "13" value="13">1 PM</option>' +
                        '<option id = "14" value="14">2 PM</option>' +
                        '<option id = "15" value="15">3 PM</option>' +
                        '<option id = "16" value="16">4 PM</option>' +
                        '<option id = "17" value="17">5 PM</option>' +
                        '<option id = "18" value="18">6 PM</option>' +
                        '<option id = "19" value="19">7 PM</option>' +
                        '<option id = "20" value="20">8 PM</option>' +
                        '<option id = "21" value="21">9 PM</option>' +
                        '<option id = "22" value="22">10 PM</option>' +
                        '<option id = "23" value="23">11 PM</option>' +
                        '</select>',
                        '<select id = "shiftSelectTo' + shiftCounter+'" class="browser-default col s8 offset-s2">' + 
                        '<option value="" disabled selected>---</option>' + 
                        '<option id = "0" value="0">12 AM</option>' + 
                        '<option id = "1" value="1">1 AM</option>' +
                        '<option id = "2" value="2">2 AM</option>' +
                        '<option id = "3" value="3">3 AM</option>' + 
                        '<option id = "4" value="4">4 AM</option>' +
                        '<option id = "5" value="5">5 AM</option>' +
                        '<option id = "6" value="6">6 AM</option>' +
                        '<option id = "7" value="7">7 AM</option>' +
                        '<option id = "8" value="8">8 AM</option>' +
                        '<option id = "9" value="9">9 AM</option>' +
                        '<option id = "10" value="10">10 AM</option>' +
                        '<option id = "11" value="11">11 AM</option>' +
                        '<option id = "12" value="12">12 PM</option>' +
                        '<option id = "13" value="13">1 PM</option>' +
                        '<option id = "14" value="14">2 PM</option>' +
                        '<option id = "15" value="15">3 PM</option>' +
                        '<option id = "16" value="16">4 PM</option>' +
                        '<option id = "17" value="17">5 PM</option>' +
                        '<option id = "18" value="18">6 PM</option>' +
                        '<option id = "19" value="19">7 PM</option>' +
                        '<option id = "20" value="20">8 PM</option>' +
                        '<option id = "21" value="21">9 PM</option>' +
                        '<option id = "22" value="22">10 PM</option>' +
                        '<option id = "23" value="23">11 PM</option>' +
                        '</select>'

                    ]).draw(false);
            
        });
        
        $('#btnGenerateAccount').click(function(){
            
            if ($('#natureSelect').val() != null){
                $('#username').val( $('#natureSelect').val() + getRandomNumber());
                $('#password').val(getRandomPassword());
            }else{
                var toastContent = $('<span>Check Input First.</span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
                
        });
        
        function checkInputShift(){
            
            for (intLoop = 1; intLoop <= shiftCounter; intLoop ++){
                var from = $('#shiftSelectFrom' + intLoop).val();
                var to = $('#shiftSelectTo' + intLoop).val();

                if (from == null || to == null){
                    return false;
                }else{
                    var difference = to - from;

                    if (difference < 8 || difference > 12){
                        var toastContent = $('<span>The shift must not less than 8 and not larger than 12 hours</span>');
                        Materialize.toast(toastContent, 2000,'red', 'edit');
                        return false;
                        break;
                    }
                }// if from or to is null
            }//for loop
                
            
            return true;
        }
        
        function checkInput(){
            var clientName = $('#clientName').val().trim();
            var clientcontactLandline = $('#clientcontactLandline').val().trim();
            var personInCharge = $('#personInCharge').val().trim();
            var piccontactCp = $('#piccontactCp').val().trim();
            var address = $('#address').val().trim();
            var areaSize = $('#areaSize').val().trim();
            var population = $('#population').val().trim();
            var guardNo = $('#guardNo').val().trim();
            
            if ($('#natureSelect').val() == null || clientName == '' || clientcontactLandline == '' ||
               personInCharge == '' || piccontactCp == '' || address == '' || $('#provinceSelect').val() == null ||
               $('#citySelect').val() == null || areaSize == '' || population == '' || guardNo == '' || 
                population < 0 || areaSize < 0  || guardNo < 1 || $('#username').val() == '' || $('#password').val() == ''){
                var toastContent = $('<span>Check Input</span>');
                Materialize.toast(toastContent, 2000,'red', 'edit');  
                return false;
            }else{
                
                return true;
            }
        }
        
        function getRandomPassword(){
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 8; i++ ){
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }
        
        function getRandomNumber(){
            var text = "";
            var possible = "0123456789";

            for( var i=0; i < 4; i++ ){
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }
    });
        
</script>

@stop