@extends('layout.maintenanceLayout')

@section('title')
Security Guard License
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a href="{{URL::route('personalDataBC')}}" class="breadcrumb">Personal Data</a>
						<a href="{{URL::route('educationalBackgroundBC')}}" class="breadcrumb">Educational Background</a>
						<a href="{{URL::route('sgBackground')}}" class="breadcrumb">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb">Requirements</a>
						<a href="{{URL::route('sgLicense')}}" class="breadcrumb">Guard License</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>




<div style="margin-top:3%;">
	<div class="row">
		<div class="col s5 push-s4" style="margin-left:10px;">
			<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
				<center><legend><h4>Guard License</h4></legend></center></br>
				<div class="row">
					<div class="col s8 push-s2">
						<div class="input-field">
							<input id="intLicenseNo" type="text" class="validate" name = "licenseNo" required="" aria-required="true">
							<label for="intLicenseNo">License Number</label> 
						</div>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s8 push-s2">
						<input  id="startDate" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="startDate">Date Issued</label>
					</div>
				</div>
				
				<div class = "row">
					<div class="input-field col s8 push-s2">
						<input  id="endDate" type="date" class="datepicker" required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="endDate">Date Expired</label>
					</div>
				</div>
			
			</div>
			<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id="backLicense">Back</button>
			<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextLicense">Next</button>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#backLicense').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/requirement") }}';
        });
        
        $('#nextLicense').click(function(){
             window.location.href = '{{ URL::to("/guard/registration/account") }}';
        });
        
    });
        
</script>

@stop



