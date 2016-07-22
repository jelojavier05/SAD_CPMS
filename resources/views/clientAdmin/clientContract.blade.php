@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')
<div class="row"></div>
<div class="row">
	<div class="col s10 push-s2">
		<div class="col s6">
			<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">
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
								<input  id="contractEnd" type="date" class="datepicker"  required="" aria-required="true" readonly>
								<label class="active" data-error="Incorrect" for="contractEnd">End Date</label>
							</div>

						</form>

					</div>
				</div>
				<div class='row'>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
						<legend><h4>Shift</h4></legend>
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
										<td><center>12AM</center></td>
										<td><center>8AM</center></td>
										
									</tr>
									
									<tr>
										
										<td><center>2</center></td>
										<td><center>8AM</center></td>
										<td><center>4PM</center></td>
										
									</tr>
									
									<tr>
										
										<td><center>3</center></td>
										<td><center>4PM</center></td>
										<td><center>12AM</center></td>
										
									</tr>
								</tbody>
								
							</table>
						</div>
					</div>
					<div class="input-field col s5 push-s1">
						<input  id="operatingTime" type="text" required="" aria-required="true" readonly>
						<label class="active" for="operatingTime">Operating Time (Hours)</label>
					</div>
					
					<div class="input-field col s5 push-s1">
						<input  id="rateperHour" type="text" required="" aria-required="true" readonly>
						<label class="active" for="rateperHour">Rate Per Hour</label>
					</div>
				</div>

			</div>
		</div>
		
		
		<div class="col s6">
			<div class="row">
				<div class="col s6">
					<ul class="collection with-header" id="" style="border:1px solid black;">
								<li class="collection-header blue white-text" ><h5 style="font-weight:bold;">Billing Dates</h5></li>
							<div>
								<li class="collection-item sidenavhover" style="height:300px;">
									<div style="font-weight:normal;">
										<table class="" style="font-family:Myriad Pro">
											<thead>
											  <tr>
												  <th data-field="">Date</th>
												  <th data-field="">Amount</th>
											  </tr>

											</thead>

											<tbody>
											  <tr>
												<td>12/25/2015</td>
												<td>10000</td>
											  </tr>
												
												

											</tbody>
										</table>
									</div>
								</li>
								
							</div>

					</ul>
				</div>
				
				<div class="col s6">
					<ul class="collection with-header" id="" style="border:1px solid black;">
						<li class="collection-header blue white-text" ><h5 style="font-weight:bold;">Client Details</h5>
						</li>
							<div class="sidenavhover" style=" height:300px;">

								<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;Bank</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Name:<div style="font-weight:normal;" id = 'name'>&nbsp;&nbsp;&nbsp;PUP</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;" id = 'clientNumber'>&nbsp;&nbsp;&nbsp;09123456789</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;Mang Tomas</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'personNumber'>&nbsp;&nbsp;&nbsp;09123456789</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;Hello Street</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;1000</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;10</div>
								</li>

								<li class="collection-item" style="font-weight:bold;">Number of Guards:<div style="font-weight:normal;" id = 'numberOfGuard'>&nbsp;&nbsp;&nbsp;1</div>
								</li>
							</div>

					</ul>
				</div>
				
				<div class="col s6">
					<ul class="collection with-header" id="" style="border:1px solid black;">
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
					<ul class="collection with-header" id="" style="border:1px solid black;">
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
    
    
    $.ajax({
        type: "GET",
        url: "{{action('ClientContractController@getGuardAccepted')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            $('#guardContainer').empty();
            $.each(data, function(index, value){
                $("#guardContainer").append('<li class="collection-item"><div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;'+ value.strFirstName +' ' + value.strLastName +'</div></li>');
            });
            
            $('#guardHeader').text('Guards - ' + data.length);
        }
    });//get guard accepted
    
    $.ajax({
        type: "GET",
        url: "{{action('ClientContractController@getGunTagged')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            //var table = $('#tableGun').DataTable();
            
            $.each(data, function(index, value){
                $('#tableGun tr:last').after('<tr><td>' + value.type + '</td><td>' + value.rounds +'<td/></tr>');
            });
            
            $('#gunHeader').text('Guns - ' + data.length);
        }
    });//get guard accepted
    
    $('#selectContract').on('change',function(){
        var value = $(this).children(":selected").attr("value");
        $('#contractDuration').val(value);
        refreshDateEnd();
    });
    
    $('#contractStart').on('change',function(){
        refreshDateEnd();
    });
    
    function refreshDateEnd() {
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
    
	$('select').material_select();	
});
        
</script>

@stop