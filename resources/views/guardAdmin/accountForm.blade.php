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
						<a href="{{URL::route('personalDataBC')}}" class="breadcrumb">Personal Data</a>
						<a href="{{URL::route('educationalBackgroundBC')}}" class="breadcrumb">Educational Background</a>
						<a href="{{URL::route('sgBackground')}}" class="breadcrumb">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb">Requirements</a>
						<a href="{{URL::route('sgLicense')}}" class="breadcrumb">Guard License</a>
						<a href="{{URL::route('account')}}" class="breadcrumb">Account</a>
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
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backAccount">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large green right animated infinite flash" id = "btnSave">Save</button>
	</div>
</div>

<input type = "hidden" id = "test" value = "{{$firstName}}">
@stop

@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#strUserName').val($('#test').val());
        
        $('#backAccount').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/requirement") }}';
        });
        
        $('#btnSave').click(function(){
            var username = $('#strUserName').val();
            var password = $('#password').val();
            $.ajax({

                type: "POST",
                url: "{{action('GuardRegistrationController@insertGuard')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    username:username,
                    password:password
                },
                success: function(data){
                    confirm('success');
                },
                error: function(data){
                    confirm('error send data');
                    console.error();
                }
            });//ajax
        });
        
    });
        
</script>

@stop