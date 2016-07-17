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
						<a href="" class="breadcrumb">Contract Information</a>
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
					
					</form>
					
				</div>
			</div>
			<div class="col s4 push-s5">
				<button class="btn-large blue waves-effect z-depth-2" id="nextclientContract" style="margin-top:20px;">Next</button>
			</div>
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