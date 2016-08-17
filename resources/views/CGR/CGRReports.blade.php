@extends('CGR.CGRMain')
@section('title')
Reports
@endsection

@section('content')

<div class="row"></div>
<div class= "row">

	<div class="col s8 push-s3">
        <div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:15px;margin-left:-6%">
            <div class=""><center><h3>Report</h3></center></div>
				
				<div class="row">
				    <div class='row'>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
						<legend><h5>Security Guard Information</h5></legend>
						<div class="col s12">
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[A-za-z.' ][^0-9]{2,}" required="" aria-required="true">
								<label data-error="Incorrect">Name</label>
							</div>
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[0-9+]{11,}" required="" aria-required="true">
								<label data-error="Incorrect">Contact Number</label>
							</div>
							
						</div>
						
						<div class="row"></div>
					</div>
					
					</div>
					
					<div class='row'>
					<div class="container-fluid grey lighten-4 z-depth-1 col s10 push-s1" style="border: 1px solid black; border-radius:5px; margin-bottom:10px;">
						<legend><h5>Information on Incident</h5></legend>
						<div class="col s12">
							
							<div class="input-field col s6">
								<input class="" type='date' id="">
								<label class="active" data-error="Incorrect">Date of the Incident</label>
							</div>
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[0-9:]{5,}" required="" aria-required="true">
								<label data-error="Incorrect">Time of the Incident</label>
							</div>
							
							<div class="input-field col s6">
								<input id="" placeholder = " " id="" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">
								<label class="ci" data-error="Incorrect">Place of the Incident</label>
							</div>
							
							<div class="input-field col s6">
								<input id="" placeholder = " " id="" type="text" class="validate" pattern="[A-za-z0-9.,' ]{2,}" required="" aria-required="true">
								<label class="ci" data-error="Incorrect">Exact Location of the Incident</label>
							</div>
							
							<div class="input-field col s12">								 
								 <textarea placeholder=" " class="materialize-textarea" id="strMessageAdd" type="text" length="224"></textarea>
								 <label for="input_text">Description of Incident</label> 

							 </div>
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[A-za-z.' ][^0-9]{2,}" required="" aria-required="true">
								<label data-error="Incorrect">Witness Name</label>
							</div>
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[0-9+]{11,}" required="" aria-required="true">
								<label data-error="Incorrect">Contact Number</label>
							</div>
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[A-za-z.' ][^0-9]{2,}" required="" aria-required="true">
								<label data-error="Incorrect">Witness Name</label>
							</div>
							
							<div class="input-field col s6">
								<input class="validate" id="" type='text' placeholder=" " pattern="[0-9+]{11,}" required="" aria-required="true">
								<label data-error="Incorrect">Contact Number</label>
							</div>
							
							
							
						</div>
						
						<div class="row"></div>												
						
						<div class="row"></div>
					</div>						
					
					</div>
						<center><button class="btn blue waves-effect waves-light" style="margin:1%;">Submit</button></center>
				</div>
		</div>
	</div>

</div>

@stop