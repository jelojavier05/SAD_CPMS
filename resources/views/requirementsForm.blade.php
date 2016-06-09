@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a class="breadcrumb">Personal Data</a>
						<a class="breadcrumb">Educational Background</a>
						<a class="breadcrumb">Armed Services</a>
						<a class="breadcrumb">Government Exam</a>
						<a class="breadcrumb">Requirements</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>
<!----------------------------------------------PAGES-------------------------------------->
<div class="row">
	<div class="col s6 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
			<legend><h4>Requirements</h4></legend></br>
			<div class="row">
				
				<div class="col s6">
					<div class="col s11 push-s1">	
						<img class="materialboxed circle hoverable" width="150px;" height="150px;" src="{!! URL::asset('../Materialize/images/avatar5.png') !!}"/>
					</div>
					<div class="col s12">
						<div class="file-field input-field">
						  <div class="btn blue">
							<span>File</span>
							<input type="file">
						  </div>
						  <div class="file-path-wrapper col s5">
							<input class="file-path validate" type="text">
						  </div>
						</div>
					</div>
				</div>
				
				
				
				<div class="col s6">
					<input type="checkbox" id="1" />
					<label for="1">TEST</label></br>
					
					<input type="checkbox" id="2" />
      				<label for="2">TEST</label></br>
					
					<input type="checkbox" id="3" />
      				<label for="3">TEST</label></br>
					
					<input type="checkbox" id="4" />
      				<label for="4">TEST</label></br>
	
					<input type="checkbox" id="5" />
      				<label for="5">TEST</label></br>
				
					<input type="checkbox" id="6" />
      				<label for="6">TEST</label></br>

					<input type="checkbox" id="7" />
      				<label for="7">TEST</label></br>

					<input type="checkbox" id="8" />
      				<label for="8">TEST</label></br>
				</div>
				
				
				
				
			</div>
		</div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" href="#">Next</button>
	</div>
</div>
@stop