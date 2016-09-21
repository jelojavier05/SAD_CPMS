@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')
<div class="row"></div>
<div class="row">
	<div class="col s10 push-s2">
		<div class="col s6">
			<div class="container-fluid grey lighten-4 z-depth-2 animated fadeInUp" style="border: 1px solid black; border-radius:5px;" id="">
				<h4 class = "blue white-text" style="margin-top:0px;">Contract</h4>
				<div class = "row">
					<div class="col s10 push-s1">
						<form>
							<div class = "input-field col s6">    
							   <select  id = "selectContract" name = "" >
								   <option disabled selected>Choose an option</option>
									@foreach($contract as $value)  
                                    <option id = "{{$value->intTypeOfContractID}}" value = '{{$value->intMonthDuration}}'>{{$value->strTypeOfContractName}}</option>
                                    @endforeach
                                    
									  
							   </select>
							   <label>Type of Contract</label>
							</div>

							<div class="input-field col s6">
								<input  id="contractDuration" type="number" value="0" min="1" required="" aria-required="true" readonly>
								<label class="active" for="duration">Duration (Months)</label>
							</div>
								
							<div class="input-field col s6">
								<input  id="contractStart" type="date" class="datepicker"  required="" aria-required="true">
								<label class="active" data-error="Incorrect" for="contractStart">Start Date</label>
							</div>

							<div class="input-field col s6">
								<input  id="contractEnd" type="date" class="datepicker"  required="" aria-required="true" placeholder="" readonly>
								<label class="active" data-error="Incorrect" for="contractEnd">End Date</label>
							</div>

						</form>

					</div>
                    
                    <div class="input-field col s5 push-s1">
						<input  id="operatingTime" type="text" required="" aria-required="true" readonly placeholder=" ">
						<label class="active" for="operatingTime">Operating Time (Hours)</label>
					</div>
					
					<div class="input-field col s5 push-s1">
						<input  id="rateperHour" type="text" required="" aria-required="true" readonly placeholder=" ">
						<label class="active" for="rateperHour">Rate Per Hour</label>
					</div>
				</div>
                
                    
				<div class='row'>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
						<legend><h4>Shift</h4></legend>
						<div class="col s10 push-s1">
							<table class="bordered grey lighten-1" id = "tableShift" style="margin-bottom:15px;">
								
								<thead>
									<tr>

										<th data-field="" style="width:20px;"><center>Shift No.</center></th>
										<th data-field="" style="width:10px;"><center>From</center></th>
										<th data-field="" style="width:10px;"><center>To</center></th>
									</tr>
								</thead>
								    
								<tbody>
									<tr>
                                    
                                    </tr>
								</tbody>
								
							</table>
						</div>
					</div>
					
				</div>
				
				<div class='row'>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
						<legend><h4>CGR Account</h4></legend>
						<div class="input-field col s10 push-s1">
							<input placeholder=" " id="username" type="text" class="validate" name = "userName" required="" aria-required="true">
							<label for="username">Username</label>
						</div>
						
						<div class="input-field col s10 push-s1">
							<input placeholder=" " id="password" type="text" class="validate" name = "passWord" required="" aria-required="true">
							<label for="password">Password</label>						
						</div>
						<div class="row"></div>
						
					</div>				
				</div>
                    <div class="row">
                        <div class="col s5 push-s3">
                            <a class="btn red" href="/client/gunTagging">Back</a>
                            <a class="btn blue" id="btnSave">OK</a>
                        </div>
                    </div>
			</div>
		</div>
		
		
		<div class="col s6">
			<div class="row">
				<div class="col s6">
					<ul class="collection with-header animated fadeInUp" id="" style="border:1px solid black;">
								<li class="collection-header blue white-text" ><h5 style="font-weight:bold;">Billing Dates</h5></li>
							<div>
								<li class="collection-item sidenavhover" style="height:300px;">
									<div style="font-weight:normal;">
										<table class="" style="font-family:Myriad Pro" id = 'tableBilling'>
											<thead>
											  <tr>
												  <th data-field="">Date</th>
											  </tr>

											</thead>

											<tbody>
											  <tr>
												
											  </tr>
												
												

											</tbody>
										</table>
									</div>
								</li>
								
							</div>

					</ul>
				</div>
				
				<div class="col s6">
					<ul class="collection with-header animated fadeInUp" id="" style="border:1px solid black;">
						<li class="collection-header blue white-text" ><h5 style="font-weight:bold;">Client Details</h5>
						</li>
							<div class="sidenavhover" style=" height:300px;">
                                
                                <li class="collection-item" style="font-weight:bold;">Client ID:<div style="font-weight:normal;" id = 'clientID'>&nbsp;&nbsp;&nbsp;</div>
								</li>

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
							</div>

					</ul>
				</div>
				
				<div class="col s6">
					<ul class="collection with-header animated fadeInUp" id="" style="border:1px solid black;">
								<li class="collection-header blue white-text" ><h5 style="font-weight:bold;" id ='guardHeader'></h5></li>
							<div class="sidenavhover" style=" height:300px;" id = 'guardContainer'>
								<li class="collection-item">
									<div style="font-weight:normal;">
										&nbsp;&nbsp;&nbsp;Generoso Cupal
									</div>
								</li>								
							</div>

					</ul>
				</div>
				
				<div class="col s6">
					<ul class="collection with-header animated fadeInUp" id="" style="border:1px solid black;">
								<li class="collection-header blue white-text" ><h5 style="font-weight:bold;" id = 'gunHeader'></h5></li>
							<div>
								<li class="collection-item sidenavhover" style=" height:300px;">
									<div style="font-weight:normal;">
										<table class="" style="font-family:Myriad Pro" id = 'tableGun'>
											<thead>
											  <tr>
												  <th data-field="">Type</th>
												  <th data-field="">Rounds</th>
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
			
			
			
		</div>
		
		
		
	</div>
</div>

@stop

@section('script')
<script>
    
$(document).ready(function() {
    
    var countGuard = [];
    var shiftCount;
    var shiftNumber = [];
    var shiftTo = [];
    var shiftFrom = [];
    var arrDate = [];
    
    $.ajax({
        type: "GET",
        url: "{{action('ClientContractController@getGuardAccepted')}}",
        success: function(data){
            
            $('#guardContainer').empty();
            $.each(data, function(index, value){
                $("#guardContainer").append('<li class="collection-item"><div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;'+ value.strFirstName +' ' + value.strLastName +'</div></li>');
            });
            
            $('#guardHeader').text('Guards - ' + data.length);
            countGuard.push(data.length);
        },
        error: function(){

        }
    });//get guard accepted
    
    $.ajax({
        type: "GET",
        url: "{{action('ClientContractController@getGunTagged')}}",
        success: function(data){
            //var table = $('#tableGun').DataTable();
            
            $.each(data, function(index, value){
                $('#tableGun tr:last').after('<tr><td>' + value.type + '</td><td>' + value.rounds +'<td/></tr>');
            });
            
            $('#gunHeader').text('Guns - ' + data.length);
        }
    });//get gun tagged
    
    $.ajax({
        type: "GET",
        url: "{{action('ClientContractController@getClientDetail')}}",
        success: function(data){
            
            var area = commaSeparateNumber(data.deciAreaSize);
            var population = commaSeparateNumber(data.intPopulation);
            var operationTime = 0;
            $('#clientID').text(data.intClientID);
            $('#natureOfBusiness').text(data.strNatureOfBusiness);
            $('#name').text(data.strClientName);
            $('#clientNumber').text(data.strContactNumber);
            $('#personInCharge').text(data.strPersonInCharge);
            $('#personNumber').text(data.strPOICContactNumber);
            $('#address').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
            $('#areaSize').text(area);
            $('#population').text(population);

            shiftCount = data.shifts.length;

            $.each(data.shifts, function(index, value){    
                var from = value.from;
                var to = value.to;


                $('#tableShift tr:last').after('<tr><td><center>' + value.strShiftNumber + '</center></td>'+
                     '<td><center>' + from +'</center></td>'+
                     '<td><center>' + to +'</center></td>'+
                     '</tr>');
                var timeDifference =  ( new Date("1970-1-1 " + value.timeTo) - new Date("1970-1-1 " + value.timeFrom) ) / 1000 / 60 / 60;

                if (timeDifference<0){
                	timeDifference *= -1;
                }

                operationTime += timeDifference;
                
                shiftNumber.push(value.strShiftNumber);
                shiftFrom.push(from);
                shiftTo.push(to);
            });
            
            $('#operatingTime').val(operationTime);
            $('#rateperHour').val(data.deciRate);
        }
    });//get client details
    
    $('#selectContract').on('change',function(){
        var value = $(this).children(":selected").attr("value");
        $('#contractDuration').val(value);
        refreshDateEnd();
        billingDates();
    });
    
    $('#contractStart').on('change',function(){
        refreshDateEnd();
        billingDates();
        console.log(arrDate);
    });
    
    $('#btnSave').click(function(){
        
        var clientID = $('#clientID').text();
        var clientName = $('#name').text();
        var address = $('#address').text();
        var contractID = $('#selectContract').children(":selected").attr("id");
        var duration = $('#contractDuration').val();
        var dateStart = $('#contractStart').val();
        var dateEnd = $('#contractEnd').val();
        var ratePerHour = $('#rateperHour').val();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            type: "POST",
            url: "{{action('ClientContractController@postContract')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                clientID:clientID,
                contractID:contractID,
                duration:duration,
                dateStart:dateStart,
                dateEnd: dateEnd,
                rate: ratePerHour,
                shiftNumber:shiftNumber,
                shiftFrom:shiftFrom,
                shiftTo:shiftTo,
                clientName: clientName,
                address:address,
                username: username,
                password: password,
                arrDate: arrDate
                
            },
            success: function(data){
                swal({
						title: "Success!",
						text: "Contract is Completed!",
						type: "success"
					},
					function(){
						window.location.href = '{{ URL::to("/dashboardadmin") }}';
						});
            	},
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
        });//ajax
    });
    
    function refreshDateEnd() {
        if ($('#contractStart').val() != '' && $('#contractDuration').val() != 0){
            var dateStart = new Date($('#contractStart').val());
            var months = parseInt($('#contractDuration').val()) + (dateStart.getMonth() + 1);

            var yearEnd = parseInt(months / 12) + dateStart.getFullYear();
            var monthEnd = parseInt(months % 12);
            var dayEnd = dateStart.getDate();
            var lastDay = new Date(yearEnd, monthEnd, 0).getDate();

            if (dayEnd>lastDay){
                dayEnd = lastDay;
            }
            if (monthEnd < 10){
                monthEnd = '0' + monthEnd;    
            }

            if (dayEnd < 10){
                dayEnd = '0' + dayEnd;
            }
            var dateEnd = yearEnd + "-" + monthEnd + "-" + dayEnd;
            $('#contractEnd').val(dateEnd);
        }   
    }
    
    function billingDates(){
        if ($('#contractStart').val() != '' && $('#contractDuration').val() != 0){
            var dateStart = new Date($('#contractStart').val());
            var monthDuration = $('#contractDuration').val();
            var counter = 0;
            var currentMonth = dateStart.getMonth() + 1;
            var tempPastMonth = dateStart;
            var tempCurrentMonth = new Date(dateStart.getFullYear(), dateStart.getMonth() + 1, dateStart.getDate());
            var arr = [];
            var dayStart = dateStart.getDate();
            
            while(counter != monthDuration){
                
                var year = tempCurrentMonth.getFullYear();
                var month = tempCurrentMonth.getMonth() + 1;
                var day = dayStart;
                var lastDay = new Date(year, month, 0).getDate();
                
                if (lastDay < dayStart){
                    day = lastDay;
                }
                var monthTemp = month - 1;
                var tempDate = new Date(year,monthTemp, day);
                arr.push(tempDate);
                tempCurrentMonth = new Date(year, month, 1);
                
                counter ++;
            }
            
            $('#tableBilling tr').not(function(){ return !!$(this).has('th').length; }).remove();
            var dateStart1 = new Date($('#contractStart').val());
            arrDate = [];
            $.each(arr, function(index,value){
                var year = value.getFullYear();
                var month = value.getMonth() + 1;
                var day = value.getDate();
                var date = month + '/' + day + '/' + year;
                
                var days = daydiff(dateStart1, value);

                dateStart1 = value;
                
                $('#tableBilling tr:last').after('<tr><td>' + date + '</td></tr>');

                var databaseDate = year + '-' + month + '-' + day;
                arrDate.push(databaseDate);
            });
        }
    }
    
    function commaSeparateNumber(val){
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
    }
    
    function getHour(hour){
        var hour12;
        if (hour == 0 || hour == 24){
            hour12 = '12 AM';
        }else if (hour == 1){
            hour12 = '1 AM';
        }else if (hour == 2){
            hour12 = '2 AM';
        }else if (hour == 3){
            hour12 = '3 AM';
        }else if (hour == 4){
            hour12 = '4 AM';
        }else if (hour == 5){
            hour12 = '5 AM';
        }else if (hour == 6){
            hour12 = '6 AM';
        }else if (hour == 7){
            hour12 = '7 AM';
        }else if (hour == 8){
            hour12 = '8 AM';
        }else if (hour == 9){
            hour12 = '9 AM';
        }else if (hour == 10){
            hour12 = '10 AM';
        }else if (hour == 11){
            hour12 = '11 AM';
        }else if (hour == 12){
            hour12 = '12 PM';
        }else if (hour == 13){
            hour12 = '1 PM';
        }else if (hour == 14){
            hour12 = '2 PM';
        }else if (hour == 15){
            hour12 = '3 PM';
        }else if (hour == 16){
            hour12 = '4 PM';
        }else if (hour == 17){
            hour12 = '5 PM';
        }else if (hour == 18){
            hour12 = '6 PM';
        }else if (hour == 19){
            hour12 = '7 PM';
        }else if (hour == 20){
            hour12 = '8 PM';
        }else if (hour == 21){
            hour12 = '9 PM';
        }else if (hour == 22){
            hour12 = '10 PM';
        }else if (hour == 23){
            hour12 = '11 PM';
        }
        
        return hour12;
    }
    
    function daydiff(first, second) {
        return Math.round((second-first)/(1000*60*60*24));
    }
    
	$('select').material_select();	
});
</script>

@stop