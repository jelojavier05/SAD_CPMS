<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a Material Design Admin Template,It&#39;s modern, responsive and based on Material Design by Google. ">
        <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <title>Login Page | CPMS</title>
        <!-- Favicons-->
        <link rel="icon" href="" sizes="32x32">
        <!-- Favicons-->
        <link rel="apple-touch-icon-precomposed" href="#">
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="#">
        <!-- For Windows Phone -->
        
        <!-- CORE CSS-->
        <link href="{!! URL::asset('../css/materialize1.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{!! URL::asset('../css/style1.css') !!}" type="text/css" rel="stylesheet"/>
		<link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
        <!-- Custome CSS-->
        <link href="{!! URL::asset('../css/custom-style.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <!-- CSS style Horizontal Nav (Layout 03)-->    
        <link href="{!! URL::asset('../css/style-horizontal.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{!! URL::asset('../css/page-center.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
       
                
         <!-- jQuery Library -->
        
        <!--materialize js-->
        
        <!--prism-->
        
        <script src="{!! URL::asset('../javascript/prism.js') !!}"></script>
        
        
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        
        <script src="{!! URL::asset('../javascript/jquery-2.2.1.js') !!}"></script>
        
        <script src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
        
        
        
        
    </head>
    <body background="/img/Security.jpg">
        <br>
        <div id="login-page" class="row login-form">
            <div class="col s12 z-depth-4 card-panel">
                <div class="row">
                    <div class="input-field col s12 center">
                        <p class="center login-form-text">Welcome, User!</p>
                        <img src="/img/cpms-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Client and Personnel Management System</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="username" type="text" placeholder=" ">
                        <label for="username" class="center-align">Username</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" placeholder=" ">
                        <label for="password" class="">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light col s12" id = "btnLogin">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="#">Sign up</a></p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="#">Forgot password</a></p>
                    </div>          
                </div>
            </div>
        </div>
        <div class="hiddendiv common"></div>

        <script>
            $(document).ready(function(){
                
                $('#btnLogin').click(function(){
                    var username = $('#username').val().trim();
                    var password = $('#password').val().trim();
                    
                    if (username != '' && password != ''){
                        $.ajax({
                            type: "GET",
                            url: "/userlogin/getaccount?username=" + username + "&password=" + password,
                            beforeSend: function (xhr) {
                                var token = $('meta[name="csrf_token"]').attr('content');

                                if (token) {
                                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                }
                            },
                            success: function(data){
                                if (data){
                                    console.log(data);
                                    var accountType = data.intAccountType;
                                    
                                    if (accountType == 0){
                                        window.location.href = '{{ URL::to("/client/tempaccount") }}';
                                    }else if (accountType == 1){
                                        
                                    }else if (accountType == 2){
                                        window.location.href = '{{ URL::to("/securityhomepage") }}';
                                    }else if (accountType == 3){
                                        window.location.href = '{{ URL::to("/dashboardadmin") }}';
                                    }
                                }else{
                                    var toastContent = $('<span>Login failed.</span>');
                                    Materialize.toast(toastContent, 1500,'red', 'edit');    
                                }
                            },
                            error: function(data){
                                var toastContent = $('<span>Error Occured. </span>');
                                Materialize.toast(toastContent, 1500,'red', 'edit');
                            }
                        });//ajax
                    }else{
                        var toastContent = $('<span>All fields are required.</span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');
                    }
                });
            });
        </script>
    </body> 
</html>