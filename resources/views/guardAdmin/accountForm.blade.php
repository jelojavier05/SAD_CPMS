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
						<a href="{{URL::route('personaldata')}}" class="breadcrumb">Personal Data</a>
						<a href="{{URL::route('educationalbackground')}}" class="breadcrumb">Educational Background</a>
						<a href="{{URL::route('sgbackground')}}" class="breadcrumb">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb">Requirements</a>
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
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backAccount">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" href="#" id = "nextAccount">Next</button>
	</div>
</div>

@stop

@section('script')
<script>
    
    $(document).ready(function() {
        
        $.ajax({

            type: "GET",
            url: "{{action('AccountController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                if (data){
                    $('#strUserName').val(data.username);
                    $('#password').val(data.password);
                }else{
                    $.ajax({

                        type: "GET",
                        url: "{{action('PersonalDataController@get')}}",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        success: function(data){
                            if (data){
                                var randomNumber = (Math.floor(Math.random() * 9999) + 1);
                                var year = data.dateOfbirth.substring(0,4);
                                var temp = year + data.firstName + data.lastName + randomNumber;
                                var userName = temp.replace(/ /g,'').toLowerCase();
                                $('#strUserName').val(userName);
                                $('#password').val(getRandomPassword());
                            }else{

                            }
                        }
                    }); //get personal data
                }
            }
        }); //get personal data
        
        $('#backAccount').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/requirement") }}';
        });
		
		$('#nextAccount').click(function(){
            sendData();
            window.location.href = '{{ URL::to("/guard/registration/guardSummary") }}';
        });
        
        function sendData(){
            
            var objAccount = {
                username: $('#strUserName').val(),
                password: $('#password').val()
            };
            $.ajax({

                type: "POST",
                url: "{{action('AccountController@post')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    account: objAccount,
                    username: $('#strUserName').val(),
                    password: $('#password').val()
                    
                },
                success: function(data){

                },
                error: function(data){
                    confirm('error send data');
                    console.error();
                }
            });//ajax
        }
        
        function getRandomPassword(){
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 8; i++ ){
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }
        
    });
        
</script>

@stop