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
                                                <button href="#" class="waves-effect grey lighten-2 black-text" style="width:240px; border:none;">Client</button>
                                            </li>
                                            <li>
                                                <button href="#" class="dropdown-button waves-effect grey lighten-2 black-text" data-activates="dropdownsg" data-gutter="240" data-hover="true" style="width:240px; border:none;">Security Guard</button>
													
													<ul id='dropdownsg' class='dropdown-content' style="margin-top:1px;">
														<li><a class="blue-text" href="/maintenance/leave">Leave</a></li>
														
														<li><a class="blue-text" href="/maintenance/armedservice">Armed Service</a></li>
														
														<li><a class="blue-text" href="/maintenance/governmentExam">Government Exam</a></li>
														
														<li><a class="blue-text" href="/maintenance/vitalStatistics">Vital Statistics</a></li>
														
														<li><a class="blue-text" href="#!">Requirements</a></li>
													</ul>
														
                                            </li>
                                            <li>
                                                 <button href="#" class="dropdown-button waves-effect grey lighten-2 black-text" data-activates="dropdowneq" data-gutter="241" data-hover="true" style="width:240px; border:none;">Equipment</button>
													<ul id='dropdowneq' class='dropdown-content' style="margin-top:1px;">
														<li><a class="blue-text" href="/maintenance/unitOfMeasurement">Unit of Measurement</a></li>
														
														<li><a class="blue-text" href="/maintenance/typeOfGun">Type of Gun</a></li>
														
														<li><a class="blue-text" href="/maintenance/governmentExam">Equipment 3</a></li>
														
														<li><a class="blue-text" href="/maintenance/vitalStatistics">Equipment 4</a></li>
														
														
													</ul>
                                            </li>
                                        </ul>
                            </div>
							
					</li>
                    <li class="bold" style="width:280px;">
						<a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">assignment</i>Assignment<i class="mdi-navigation-arrow-drop-down right"></i></a>
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
								<a class="collapsible-header waves-effect waves-teal" href="#"><i class="material-icons">warning</i>LamanIkatlo<i class="mdi-navigation-arrow-drop-down right"></i></a>
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
<!--
	 Tab 


	<div class="row">
		<div class="col s10 push-s2">
			<ul class="tabs">
				<li class="tab col s2"><a class="active" href="#">Leave</a></li>
				<li class="tab col s2"><a  href="#armedservice">Armed Service</a></li>
				<li class="tab col s2"><a  href="#">Government Exam</a></li>
				<li class="tab col s2"><a  href="#">Vital Statistic</a></li>
				<li class="tab col s2"><a  href="#">Requirements</a></li>
			</ul>
		</div>	
	</div>
-->
													
<!-- Dropdown Trigger -->
	
  <a class='dropdown-button btn' href='#' data-activates='dropdownsg' style="display:none;">Drop Me!</a>
  <a class='dropdown-button btn' href='#' data-activates='dropdowneq' style="display:none;">Drop Me!</a>

    
    @yield('content')
	@yield('script')
        <script src = "SAD_SAMS/javascript/armedService.js"></script>
	<script>
    $(document).ready(function(){
   
    $('.modal-trigger').leanModal();
  });
	</script>
	
<!--
	<script>
		$(document).ready(function(){
			$('ul.tabs').tabs('select_tab', 'tab_id');
		  });
	</script>
-->
	<script>
	function deleteConfirmation(url) {
        
        var alertConfirm = confirm("Are you sure you want to delete?");
        if (alertConfirm == true) {
            document.getElementById('okayCancel').value = "okay";
        } else {
            document.getElementById('okayCancel').value = "cancel";
        }
    }
	</script>
    
     
    </body>
	
    
</html>


