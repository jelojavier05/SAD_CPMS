@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Settings
@endsection


@section('content')
    
    <div class="col s12">
      <ul class="tabs blue lighten-1" style="border: 1px solid black;">
        <li class="tab col s3"><a href="#guarddata">Personal Data</a></li>
        <li class="tab col s3"><a href="#acc">Account</a></li>
      </ul>
    </div>
    
<div class="row"></div>
<div class="row"></div>

<div id="guarddata">
    <div class="row">
        <div class="col l12" style="margin-top:-5%">
            
			<div class="row">	
				<div class="col s5 push-s4">
					<h4>Personal Data</h4>
				</div>
			</div>
            
            <div class="row" style="margin:1%;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="input-field col s4">
					   <i class="material-icons prefix">account_circle</i>
					   <input placeholder = " " id="firstName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
					   <label class="ci" data-error="Incorrect" for="firstName">First Name</label>

				</div>
                
                <div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
					    <input placeholder = " " id="middleName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="middleName">Middle Name</label>

				</div>

				<div class="input-field col s4">
						<i class="material-icons prefix">account_circle</i>
						<input placeholder = " " id="lastName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="lastName">Last Name</label>

				</div>

				<div class="input-field col s4">
					    <i class="material-icons prefix">home</i>
						<input placeholder = " " id="address" type="text" class="validate" pattern="[A-za-z0-9., ]{2,}" required="" aria-required="true">

						<label class="ci" data-error="Incorrect" for="address">Address</label>
				</div>

                <div class="input-field col s4 ci">
						<input  id="dateOfbirth" type="date" class="datepicker ci">
						<label class="active ci" data-error="Incorrect" for="dateOfbirth">Date of Birth</label>
				</div>

				<div class="input-field col s4">
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
						<input placeholder = " " id="contactLandline" maxlength="10" type="text" class="validate ci" pattern="[0-9+]{7,}" required="" aria-required="true">
						<label class="ci" data-error="Incorrect" for="contactLandline">Contact Number (Landline)</label>

				</div>
            </div>
          
              <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backAccount">Save</button>
		      <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" href="#" id = "nextAccount">Cancel</button>
		   
     
            
    </div>
    </div>
</div>

<div class="row"></div>
<div class="row"></div>

<div id="acc">

    <div class="row">
	<div class="col s5 push-s3" style="margin-top:-5%">
		<div class="container-fluid grey lighten-4 z-depth-1 ci" style="border: 1px solid black; border-radius:5px;">
            
					<div class="col l12 offset-l3">
						 <legend><h4>Account</h4></legend>
					</div>
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
				<div class="col s8 push-s2">
					<div class="input-field">
						<input placeholder=" " id="strUserName" type="text" class="validate" name = "userName" required="" aria-required="true">
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
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backAccount">Save</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" href="#" id = "nextAccount">Cancel</button>
	</div>
</div>
    
</div>

    



<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
</script>


@stop