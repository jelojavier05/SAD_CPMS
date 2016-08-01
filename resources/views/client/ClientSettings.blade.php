@extends('client.ClientDashboard')
@section('title')
Client Views Guards Attendance
@endsection


@section('content')


    <div clas="col s12">
        <h2 class = "blue darken-3 white-text" style="border: 1px solid black;font-family:Verdana"><center>SETTINGS</center></h2>
    </div>

    <!-------------------------TABS----------------------->
    
    <div class="col s12">
      <ul class="tabs blue lighten-1" style="border: 1px solid black;">
        <li class="tab col s3"><a href="#clientdata">Personal Data</a></li>
        <li class="tab col s3"><a href="#acc1">Account</a></li>
      </ul>
    </div>

  <!-------------------------TAB CLIENT DATA----------------------->
<div class="row"></div>

<div id="clientdata" class="col s11">
 
        <div class="col l12 push-l1">

            <div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<h4 class = "blue darken-2 white-text" style="margin-top:0px;">Client</h4>
			<div class = "row">
				<div class='col s10 push-s1'>
					
					<div class="input-field col s6 offset-s6 pull-s6">
						<select id = "natureSelect">
						  <option value="" disabled selected>Choose</option>
                        
                            
						</select>
    					<label>Nature of Business</label>

					</div>
                    
                    <div class="input-field col s6">
						<input placeholder=" " id="clientName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label for="clientName"  data-error="Incorrect">Client Name</label>
					</div>
					
				
					<div class="input-field col s6">
							<input placeholder=" " id="clientcontactLandline" maxlength="11" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientcontactLandline">Contact Number (Client)</label>

					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="personInCharge" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label for="personInCharge" data-error="Incorrect">Person in Charge</label>
					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="piccontactCp" maxlength="13" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
						<label data-error="Incorrect" for="clientcontactCp">Contact Number (Person In Charge)</label>

					</div>
                    
                    <div class="input-field col s12">
						<input placeholder=" " id="address" type="text" class="validate" pattern="[A-za-z0-9., ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="address">Address</label>

					</div>
					
					<div class = "input-field col s6">    
					   <select  id = "provinceSelect">
						   <option disabled selected>Choose Province</option>
				      
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
</div>
        
            
    </div>
</div>
  <!-------------------------TAB CLIENT ACCOUNT----------------------->
<div class="row"></div>
<div class="row"></div>

<div id="acc1" class="col s11">
 
        <div class="col l12 push-l1">
    
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px;">
						<legend><h4>Account</h4></legend>
                        
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
    
     <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backAccount">Save</button>
     <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" href="#" id = "nextAccount">Cancel</button>
</div>





<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>

@stop