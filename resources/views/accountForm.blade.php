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
						<a class="breadcrumb">SG Background</a>
						<a class="breadcrumb">Requirements</a>
						<a class="breadcrumb">Guard License</a>
						<a class="breadcrumb">Account</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>
<!----------------------------------------------PAGES-------------------------------------->


<div class="row">
	<div class="col s5 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
			<center><legend><h4>Account</h4></legend></center></br>
			<div class="row">
				<div class="col s8 push-s2">
					<div class="input-field">
						<input id="strUserName" type="text" class="validate" name = "userName" required="" aria-required="true">
						<label for="strUserName">Username</label> 
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="col s8 push-s2">
					<div class="input-field">
						<input id="password" type="text" class="validate" name = "passWord" required="" aria-required="true">
						<label for="password">Password</label> 
					</div>
				</div>
            </div>
		
			<div class="row">
				<div class="col s8 push-s2">
					<div class="input-field">
						<input id="rePassword" type="text" class="validate" name = "repassWord" required="" aria-required="true">
						<label for="rePassword">Re-Type Password</label> 
					</div>
				</div>
            </div>
		</div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large green right animated infinite flash" href="#">Save</button>
	</div>
</div>
@stop