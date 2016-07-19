<!DOCTYPE html>
<!-- saved from url=(0067)http://demo.geekslabs.com/materialize/v2.3/layout03/user-login.html -->
<html lang="en"><!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 2.3
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
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
  
    <!-- Custome CSS-->
    <link href="{!! URL::asset('../css/custom-style.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  
    <!-- CSS style Horizontal Nav (Layout 03)-->    
      <link href="{!! URL::asset('../css/style-horizontal.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
    
      <link href="{!! URL::asset('../css/page-center.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
 <style>

</style>
 
</head>

<body background="/img/Security.jpg">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <br>
	<!-- <center><img src="cpms-logo.png" height="55" width="85"> </center> -->

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
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
            <input id="username" type="text">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password">
            <label for="password" class="">Password</label>
          </div>
        </div>
      <!--  <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me">
              <label for="remember-me">Remember me</label>
          </div>
        </div> -->
        <div class="row">
          <div class="input-field col s12">
            <a href="#" class="btn waves-effect waves-light col s12">Log in</a>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="#">Sign up</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#">Forgot password ?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
     <script src="{!! URL::asset('./javascript/jquery-2.2.1.js') !!}"></script>
    
         <script src="{!! URL::asset('./javascript/jquery-1.11.2.min.js') !!}"></script>
  
  <!--materialize js-->
         <script src="{!! URL::asset('./javascript/materialize1.js') !!}"></script>

  <!--prism-->
         <script src="{!! URL::asset('./javascript/prism.js') !!}"></script>

  <!--scrollbar-->
         <script src="{!! URL::asset('./javascript/perfect-scrollbar.min.js') !!}"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
         <script src="{!! URL::asset('./javascript/plugins.js') !!}"></script>
  



<div class="hiddendiv common"></div></body></html>