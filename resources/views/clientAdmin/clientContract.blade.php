@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a href="{{URL::route('basicInfoBC')}}" class="breadcrumb">Basic Information</a>
						<a href="{{URL::route('contractInfoBC')}}" class="breadcrumb">Contract Information</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col s6 push-s4" style=" margin-left:10px; margin-top: 1%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<h2 class = "blue white-text" style="margin-top:0px;">Contract</h2>
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
						
						<div class = "input-field col s6">    
						   <select  id = "" name = "" >
							   <option disabled selected>Choose an option</option>
								  <option id = "1" >Monthly</option>
								  <option id = "1" >Semi-Monthly</option>
						   </select>
						   <label>Type of Payment</label>
						</div>
						
						<div class="input-field col s6">
							<input  id="contractStart" type="date" class="datepicker"  required="" aria-required="true">
							<label class="active" data-error="Incorrect" for="contractStart">Start Date</label>
						</div>

						<div class="input-field col s6">
							<input  id="contractEnd" type="date" class="datepicker"  required="" aria-required="true">
							<label class="active" data-error="Incorrect" for="contractEnd">End Date</label>
						</div>
						
						<div class="col s2">
							<p class="range-field">
							  <input type="range" id="test5" value="1" min="1" max="50" name="sgrange" oninput="this.form.sgnum.value=this.value"/>
							</p>
						</div>
						
						<div class="col s4">
							<input type="number" min="1" max="50"  name="sgnum" value="1" oninput="this.form.sgrange.value=this.value" />
							<label>Number of Guards</label>
						</div>
						
						<div class="input-field col s6">
						<input placeholder=" " id="ratePerHour" type="text" class="validate" pattern="[0-9.,][^/?*]{2,}" required="" aria-required="true">
						<label for="ratePerHour" data-error="Incorrect">Rate Per Hour</label>
					</div>
					
					</form>
					
				</div>
			</div>
			<button class="btn-large blue waves-effect z-depth-2 left" id="backclientContract" style="margin-top:20px;">Back</button>	
			<button class="btn-large blue waves-effect z-depth-2 right" id="nextclientContract" style="margin-top:20px;">Next</button>	
		</div>
	</div>
</div>

@stop

@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        
        $('#nextclientContract').click(function(){
             window.location.href = '{{ URL::to("/client/registration/guardDeployment") }}';
        });
		
		$('#backclientContract').click(function(){
             window.location.href = '{{ URL::to("/client/registration/basicInfo") }}';
        });
        
    });
        
</script>

@stop