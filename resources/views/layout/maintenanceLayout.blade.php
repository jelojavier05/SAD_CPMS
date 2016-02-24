<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>@yield('title')</title>

  <!-- CSS  -->
  
   
    
  <link href="{!! URL::asset('../Materialize/css/materialize.css') !!}" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="{{!! URL::asset('../Materialize/css/materialize.min.css') !!}"/>
  <link href="{!! URL::asset('../Materialize/css/style.css') !!}" type="text/css" rel="stylesheet"/>
    <!-- JSjquery -->
   <script src="{{!! URL::asset('../Materialize/js/materialize.js') !!}}"></script>
    <script src="{!! URL::asset('../Materialize/jquery/jquery-1.12.0.min.js')!!}"></script>
  <script src="{!! URL::asset('../Materialize/js/init.js') !!}"></script>
	<script src="{!! URL::asset('../Materialize/js/materialize.min.js') !!}"></script>
  
</head>

<body style="overflow-x:hidden;">
    
    
    <nav class="black darken-1">
        
        <div class="container">
            <div class="parallax"><img class="responsive-img;" style="width: 100%;" src="{!! URL::asset('../Materialize/images/background3.jpg') !!}" alt="Unsplashed background img 1"></div>
            <div class="nav-wrapper">
                <div class="homeposition">
                    
                    <a href="index.html" class="brand-logo"><div class="flow-text"><div class="hide-on-small-only"><i class="material-icons ">dashboard</i></div><span class="white-text"><div class="mainpos">Client and Personnel Management System</div></span></div></a>
                </div>
                
                <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
                
                    <ul class="side-nav fixed grey lighten-1" id="mobile-nav">
                        <div class="iconposition">
                    <div class="card-panel teal">
                        
                        <div class="dashiconpos"><i class="material-icons">stars</i></div><span class="white-text"><div class="textindent">CPMS</div></span></div></div>
                        <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">settings</i>Maintenance</a>
                            <div class="collapsible-body">
                                <ul>
                                            <li>
                                                <a href="#">Client</a>
                                            </li>
                                            <li>
                                                <a href="#">Security Guard</a>
                                            </li>
                                            <li>
                                                <a href="#">Equipment</a>
                                            </li>
                                        </ul>
                            </div></li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">assignment</i>Assignment</a>
                            <div class="collapsible-body">
                                <ul>
                                            <li>
                                                <a href="#">Assignment1</a>
                                            </li>
                                            <li>
                                                <a href="#">Assignment2</a>
                                            </li>
                                            <li>
                                                <a href="#">Assignment3</a>
                                            </li>
                                        </ul>
                            </div>
                    </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">warning</i>LamanIkatlo</a>
                            <div class="collapsible-body">
                                <ul>
                                            <li>
                                                <a href="#">Palaman1</a>
                                            </li>
                                            <li>
                                                <a href="#">Palaman2</a>
                                            </li>
                                            <li>
                                                <a href="#">Palaman3</a>
                                            </li>
                                        </ul>
                            </div></li>
                            
                            
                </ul>
                        
                </ul>
                
                
            </div>
        
        </div>
    
    </nav>
    
    @yield('content')
	
	<script>
    $(document).ready(function(){
   
    $('.modal-trigger').leanModal();
  });
</script>
    
     
    </body>
    
</html>
