@extends('layout.maintenanceLayout')

@section('title')
Gun Type
@endsection

@section('content')

	<!-- ADD EDIT DELETE BUTTON-->
		<div class="row">
			<div class="col s12">	
				<div class="col s3 offset-s3">
					<h1 class="colortitle blue-text text-darken-3">Type of Gun</h1>
				</div>
				<div class="col s3 offset-s3">
					<button style="margin-top: 30px;" id="btnAdd" class="z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalleaveAdd"><i class="material-icons">add</i> ADD</button></br></br>
				</div>

		</div>