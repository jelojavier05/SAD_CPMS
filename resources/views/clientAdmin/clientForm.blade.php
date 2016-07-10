@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')



<div class="row">
	<div class="col s6 push-s4" style=" margin-left:10px; margin-top: 1%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<h2 class = "blue white-text" style="margin-top:0px;">Client</h2>
			<div class = "row">
				<div class='col s10 push-s1'>
					
					<div class="input-field col s6 offset-s6 pull-s6">
						<select>
						  <option value="" disabled selected>Choose</option>
						  <option value="1">test1</option>
						  <option value="2">test2</option>
						  <option value="3">test3</option>
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
					   <select  id = "" name = "" >
						   <option disabled selected>Choose Province</option>
							  <option id = "1" >Test1</option>
							  <option id = "2">Test2</option>
							  <option id = "3">Test3</option>
							  <option id = "4">Test4</option>
							  <option id = "5">Test5</option>
					   </select>
					</div>
					
					<div class = "input-field col s6">    
					   <select  id = "" name = "" >
						   <option disabled selected>Choose City</option>
							  <option id = "1" >Test1</option>
							  <option id = "2">Test2</option>
							  <option id = "3">Test3</option>
							  <option id = "4">Test4</option>
							  <option id = "5">Test5</option>
					   </select>
					</div>
				
				</div>
			</div>
		
		</div>
		<center><a style="margin-top:20px;" class=" z-depth-2 btn-large green" href="/dashboardadmin" id = "">Save</a></center>
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