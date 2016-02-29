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

<body id="scrollhider" class="bodyscrollhider grey lighten-3">
    
    
    <nav class="indigo darken-4">
        
        <div class="container">
<!--            <div class="parallax"><img class="responsive-img;" style="width: 100%;" src="{!! URL::asset('../Materialize/images/background3.jpg') !!}" alt="Unsplashed background img 1"></div>-->
            <div class="nav-wrapper">
               
                
                <a href="#" data-activates="mobile-nav" class="button-collapse" id="scrollcontrol"><i class="material-icons">menu</i></a>
                
                    <ul class="side-nav fixed white" id="mobile-nav">
                    <div class="iconposition">
						<div class="card-panel blue darken-4">

							<div class="dashicoanpos center">
								<img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="50%" height="50%">
							</div>
						</div>
					</div>	
                        <ul class="collapsible collapsible-accordion">
                    <li class="bold" style="width:280px;">
						<a class="collapsible-header waves-effect waves-teal" href="#">
							<i class="material-icons">settings</i>Maintenance<i class="mdi-navigation-arrow-drop-down right"></i>
						</a>
                            <div class="collapsible-body grey lighten-2">
                                <ul >
                                            <li>
                                                <a href="#" >Client</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-button" data-activates="dropdownsg" data-gutter="30">Security Guard</a>
													<ul id='dropdownsg' class='dropdown-content'>
														<li><a href="#!">Leave</a></li>
														
														<li><a href="#!">Armed Service</a></li>
														
														<li><a href="#!">Government Exam</a></li>
														
														<li><a href="#!">Vital Statistics</a></li>
														
														<li><a href="#!">Requirements</a></li>
													</ul>
                                            </li>
                                            <li>
                                                <a href="#">Equipment</a>
                                            </li>
                                        </ul>
                            </div>
							
					</li>
                    <li class="bold" style="width:280px;">
						<a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">assignment</i>Assignment</a>
                            <div class="collapsible-body grey lighten-2">
                                <ul class="black-text">
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
                            <li class="bold" style="width:280px;">
								<a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">warning</i>LamanIkatlo</a>
                            <div class="collapsible-body grey lighten-2">
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
				<div>
                 <div class="homeposition">
                    
                    <a href="#" class="brand-logo">
						<div class="flow-text">
							<h5 style="margin-top: 20px;">Client and Personnel Management System</h5>
						</div>
					</a>
                </div>
                
            </div>
        
			</div></div>
    
    </nav>
		
    
    @yield('content')
	@yield('script')
        <script src = "SAD_SAMS/javascript/armedService.js"></script>
	<script>
    $(document).ready(function(){
   
    $('.modal-trigger').leanModal();
  });
	</script>
	<script>
		$('#scrollcontrol').click(function(){
				$('#scrollhider').addClass('bodyscrollhider);
	});
	</script>
    
     
    </body>
	
    
</html>


