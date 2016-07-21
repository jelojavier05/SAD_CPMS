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
							   <select  id = "" name = "" >
								   <option disabled selected>Choose an option</option>
									  <option id = "1" >Test1</option>
									  <option id = "2" >Test2</option>
							   </select>
							   <label>Type of Contract</label>
							</div>

							<div class="input-field col s6">
								<input  id="duration" type="number" value="1" min="1" required="" aria-required="true">
								<label class="active" for="duration">Duration (Months)</label>
							</div>
								
							<div class="input-field col s6">
								<input  id="contractStart" type="date" class="datepicker"  required="" aria-required="true">
								<label class="active" data-error="Incorrect" for="contractStart">Start Date</label>
							</div>

							<div class="input-field col s6">
								<input  id="contractEnd" type="date" class="datepicker"  required="" aria-required="true">
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
				<div class="col s8 push-s2">
					<ul class="collection with-header" id="collectionActive" style="border:1px solid black;">
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
					<ul class="collection with-header" id="collectionActive" style="border:1px solid black;">
								<li class="collection-header blue white-text" ><h5 style="font-weight:bold;">Guards</h5></li>
							<div class="sidenavhover" style=" height:300px;">
								<li class="collection-item">
									<div style="font-weight:normal;">
										&nbsp;&nbsp;&nbsp;Generoso Cupal
									</div>
								</li>
								
								<li class="collection-item">
									<div style="font-weight:normal;">
										&nbsp;&nbsp;&nbsp;Generoso Cupal
									</div>
								</li>
								
							</div>

					</ul>
				</div>
				
				<div class="col s6">
					<ul class="collection with-header" id="collectionActive" style="border:1px solid black;">
								<li class="collection-header blue white-text" ><h5 style="font-weight:bold;">Guns</h5></li>
							<div>
								<li class="collection-item sidenavhover" style=" height:300px;">
									<div style="font-weight:normal;">
										<table class="" style="font-family:Myriad Pro">
											<thead>
											  <tr>
												  <th data-field="">Name</th>
												  <th data-field="">Serial No.</th>
											  </tr>

											</thead>

											<tbody>
											  <tr>
												<td>Arctic Warfare Magnum</td>
												<td>2013-01234-SJ-0</td>
											  </tr>
												
												

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
        $('select').material_select();
        
        
        
        
    });
        
</script>

@stop