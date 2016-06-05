<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>@yield('title')</title>
<meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
  <!-- ================================CSS===========================================  -->
  
   

  <link href="{!! URL::asset('../css/materialize.css') !!}" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="{{!! URL::asset('../css/materialize.min.css') !!}"/>
<!--	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
<!--		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
  <link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
<!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../datatable.css') !!}">-->
<!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/dataTables.material.min.css') !!}">-->
<!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/jquery.dataTables.min.css') !!}">-->
<!--  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">-->
    <!-- ===============================JSjquery======================================= -->
   
  <script src="{!! URL::asset('../javascript/jquery-2.2.1.js') !!}"></script>
<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>-->

  <script src="{{!! URL::asset('../js/materialize.js') !!}}"></script>
<!--  <script src="{!! URL::asset('../jquery/jquery-1.12.0.min.js')!!}"></script> -->
  <script src="{!! URL::asset('../js/init.js') !!}"></script>
  <script src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
<!--  <script src="{!! URL::asset('../datatable.js') !!}"></script>-->
<!--  <script src="{!! URL::asset('../dataTables.material.min.js') !!}"></script>-->
<!--  <script src="{!! URL::asset('../jquery.dataTables.min.js') !!}"></script>-->
<!--  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>-->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

    

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
						<a class="collapsible-header waves-effect waves-blue" href="#">
							<i class="material-icons">settings</i>Maintenance<i class="mdi-navigation-arrow-drop-down right"></i>
						</a>
                            <div class="collapsible-body grey lighten-2">
                                <ul >
                                            <li>
                                                <button href="#" class="aaa dropdown-button waves-effect grey lighten-2 black-text" data-activates="dropdownclient" data-gutter="240" data-hover="false" style="width:240px; border:none;" id="buttonhover">Client</button>
													
													<ul id='dropdownclient' class='dropdown-content' style="margin-top:1px;">
														<li><a class="blue-text" href="/maintenance/NatureOfBusiness">Nature of Business</a></li>
														
														
														
														
													</ul>
                                            </li>
                                            <li>
                                                <button href="#" class="dropdown-button waves-effect grey lighten-2 black-text" data-activates="dropdownsg" data-gutter="240" data-hover="false" style="width:240px; border:none;" id="buttonhover">Security Guard</button>
													
													<ul id='dropdownsg' class='dropdown-content' style="margin-top:1px;">
														<li><a class="blue-text" href="/maintenance/leave">Leave</a></li>
														
														<li><a class="blue-text" href="/maintenance/armedservice">Armed Service</a></li>
														
														<li><a class="blue-text" href="/maintenance/governmentExam">Government Exam</a></li>
														
														<li><a class="blue-text" href="/maintenance/vitalStatistics">Body Attributes</a></li>
														
														<li><a class="blue-text" href="/maintenance/requirements">Requirements</a></li>
														
														
													</ul>
														
                                            </li>
                                            <li>
                                                 <button href="#" class="dropdown-button waves-effect grey lighten-2 black-text" data-activates="dropdowneq" data-gutter="241" data-hover="false" style="width:240px; border:none;" id="buttonhover">Equipment</button>
													<ul id='dropdowneq' class='dropdown-content' style="margin-top:1px;">
														
														
														<li><a class="blue-text" href="/maintenance/typeOfGun">Type of Gun</a></li>
														
														<li><a class="blue-text" href="/maintenance/gun">Add Gun</a></li>
														
														<li><a class="blue-text" href="#">Add Supply Item</a></li>
														
														
														
														
													</ul>
                                            </li>
											 	
                                        </ul>
                            </div>
							
					</li>
                    <li class="bold" style="width:280px;">
						<a class="collapsible-header waves-effect waves-blue" href="#"><i class="material-icons">face</i>Accounts<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <div class="collapsible-body grey lighten-2">
                                <ul class="black-text">
                                            <li>
                                                <a href="/guardIndex" >Security Guard</a>
                                            </li>
                                            <li>
                                                <a href="#" >Client</a>
                                            </li>
                                           
                                        </ul>
                            </div>
                    </li>
                            
                      <li class="bold" style="width:280px;">
					  	<a class="collapsible-header waves-effect waves-blue" href="/deployment/index"><i class="material-icons left">people</i>Deployment</a>
					  </li>
<!--
                            <li class="bold" style="width:280px;">
								<a class="collapsible-header waves-effect waves-blue" href="#"><i class="material-icons">insert_chart</i>Reports<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <div class="collapsible-body grey lighten-2">
                                <ul>
                                            <li>
                                                <a href="#">Reports1</a>
                                            </li>
                                            <li>
                                                <a href="#">Reports2</a>
                                            </li>
                                            <li>
                                                <a href="#">Reports3</a>
                                            </li>
                                        </ul>
                            </div></li>
-->
                            
                            
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
	
  <a class='dropdown-button btn' href='#' data-activates='dropdownclient' style="display:none;">Drop Me!</a>
  <a class='dropdown-button btn' href='#' data-activates='dropdownsg' style="display:none;">Drop Me!</a>
  <a class='dropdown-button btn' href='#' data-activates='dropdowneq' style="display:none;">Drop Me!</a>
  <a class='dropdown-button btn' href='#' data-activates='dropdownothers' style="display:none;">Drop Me!</a>

    
    @yield('content')
	@yield('script')
	<script>

       
            $('.modal-trigger').leanModal({
                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                opacity: .5, // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
            });
       
    
	</script>
	
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
	
	<script>
		 $(document).ready(function() {
        $('select').material_select();
		 });
	</script>
    
     
    </body>
	
    
</html>


