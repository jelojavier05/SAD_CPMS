@extends('layout.maintenanceLayout')

@section('title')
Gun Registration
@endsection

@section('content')

<div style="margin-top:3%;">
	<div class="row">
		<div class="col s6 push-s4" style="margin-left:10px;">
			<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
				<center><legend><h4>Gun Registration</h4></legend></center></br>
				<div class="row">
					
					
					<div class="input-field col s4 push-s2">
							<select>
							  <option value="" disabled selected>Choose</option>
							  <option value="1">Test1</option>
							  <option value="2">Test2</option>
							  <option value="3">test3</option>
							</select>
							<label>Type of Gun</label>

					</div>
					
				</div>
				
			
				<div class="row">
					
					<div class="col s4 push-s2">
						<div class="input-field">
							<input placeholder=" " id="strGunName" type="text" class="validate" name = "gunName" required="" aria-required="true">
							<label for="strGunName">Name</label> 
						</div>
					</div>
					
					<div class="col s4 push-s2">
						<div class="input-field">
							<input placeholder=" " id="strGunManufacturer" type="text" class="validate" name = "gunManufacturer" required="" aria-required="true">
							<label for="strGunManufacturer">Manufacturer</label> 
						</div>
					</div>
					
					
				</div>
			
			
				<div class="row">
					
					<div class="col s4 push-s2">
						<div class="input-field">
							<input placeholder=" " id="strGunSerial" type="text" class="validate" name = "gunSerial" required="" aria-required="true">
							<label for="strGunSerial">Serial No</label> 
						</div>
					</div>
					
					
				</div>
			
				
			
				<div class ="row">
				<div>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px;">
						<div class="col s4 push-s4">
							<legend class><center><h4>License</h4></center></legend>
						</div>
							<div class="row">
					
					<div class="col s8 offset-s4 pull-s2">
						<div class="input-field">
							<input placeholder=" " id="strGunLicense" type="text" class="validate" name = "gunLicense" required="" aria-required="true">
							<label for="strGunLicense">License No</label> 
						</div>
					</div>
					
					<div class="input-field col s4 push-s2">
						<input  id="startDate" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="startDate">Date Issued</label>
					</div>
				
					<div class="input-field col s4 push-s2">
						<input  id="endDate" type="date" class="datepicker" required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="endDate">Date Expired</label>
					</div>
				</div>
						
					</div>
				</div>
			</div>
			
			</div>
			<div class = "center-align">
			<button style="margin-top:20px;" class=" z-depth-2 btn-large green " id="">Add</button>
			</div>
		</div>
	</div>
</div>
@stop



