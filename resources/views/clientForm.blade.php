@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	<div class="col s6 push-s4" style=" margin-left:10px; margin-top: 3%;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<h2 class = "blue white-text" style="margin-top:0px;">Client</h2>
			<div class = "row">
				<div class='col s10 push-s1'>
					
					<div class="input-field col s6">
						<select>
						  <option value="" disabled selected>Choose</option>
						  <option value="1">test1</option>
						  <option value="2">test2</option>
						  <option value="3">test3</option>
						</select>
    					<label>Nature of Business</label>

					</div>
					
					<div class="input-field col s12">
						<input placeholder=" " id="clientName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label for="clientName" class="blue-text" data-error="Incorrect">Client Name</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop