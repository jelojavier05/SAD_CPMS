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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
          <link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
          <link href="{!! URL::asset('../css/animate.css') !!}" type="text/css" rel="stylesheet"/>
          <link href="{!! URL::asset('../sweetalert.css') !!}" type="text/css" rel="stylesheet"/>
        <!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../datatable.css') !!}">-->
        <!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/dataTables.material.min.css') !!}">-->
        <!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/jquery.dataTables.min.css') !!}">-->
        <!--  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">-->
            
<!-- ===============================JSjquery======================================= -->

          <script src="{!! URL::asset('../javascript/jquery-2.2.1.js') !!}"></script>
     <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>-->

          <script src="{{!! URL::asset('../js/materialize.js') !!}}"></script>
     <!--  <script src="{!! URL::asset('../jquery/jquery-1.12.0.min.js')!!}"></script> -->
          <script src="{!! URL::asset('../js/init.js') !!}"></script>
          <script src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
          <script src="{!! URL::asset('../sweetalert.min.js') !!}"></script>
     <!--  <script src="{!! URL::asset('../datatable.js') !!}"></script>-->
     <!--  <script src="{!! URL::asset('../dataTables.material.min.js') !!}"></script>-->
     <!--  <script src="{!! URL::asset('../jquery.dataTables.min.js') !!}"></script>-->
     <!--  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>-->
        
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
        
    </head>

<!----------------------------------------------------------BODY------------------------------------------------->

<body id="scrollhider" class="bodyscrollhider grey lighten-3">
    
    
    
    
<!-----------------------------NAV BAR----------------------------->
    
    <nav class="indigo darken-4" style="height:90px">
    <div class="row"></div>
        <div class="container">
<!--   <div class="parallax"><img class="responsive-img;" style="width: 100%;" src="{!! URL::asset('../Materialize/images/background3.jpg') !!}" alt="Unsplashed background img 1"></div>-->
            <div class="nav-wrapper">
               <a href="/clienthomepage" class="brand-logo" style="padding:0%"><img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="8%" height="8%"> </a>
        
				<div>
                 <div class="homeposition">
                    <div class="row">
                       <div class="col l12">
                           
                     
                        <div class="col l7 push-l1">
                             <a href="/clienthomepage" class="brand-logo">
                                   <!--<div class="flow-text">
                                    <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="10%" height="10%">
                                        </div>-->
                                <div class="flow-text">
                                    
                                    <h5 style="margin-top: 10px;">Client and Personnel Management System</h5>
                                </div>
                             </a>
                        </div>
                           
                           
                           
                               <div class="row"></div>

                           <div class="col l5 push-l10  ">
                               
                <ul id="dropdown3" class="dropdown-content">
                    <li><a href="#!">Profile<i class="material-icons">perm_contact_calendar</i></a></li>
                    <li><a href="#!">Log Out<i class="material-icons">input</i></a></li>
                </ul>
                               
                <!-------------------------------NOTIFICATIONS----------------------------------->
                               
                        <div class="row">
                            <div class="col l12">
                                <div class="col l10">
                                   <a class="btn dropdown-button col l2" style="background-color:transparent" href="#!" data-activates="">
                                       <i class="mdi-action-home center" style="font-size:2rem;margin-top:-50%"></i>
                                    </a>

                                    <a class="btn dropdown-button col l2 push-l1" style="background-color:transparent" href="#!" data-activates="dropdown2">
                                        <i class="material-icons" style="font-size:2rem;margin-top:-50% ">language</i>
                                    </a>

                                    <a class="btn dropdown-button col l2 push-l2" style="background-color:transparent" href="#!" data-activates="dropdown2">
                                        <i class="material-icons" style="font-size:2rem;margin-top:-50% ">message</i>
                                    </a>

                                    <a class="btn dropdown-button col l2 push-l3" style="background-color:transparent" href="#!" data-activates="dropdown3">
                                        <i class="mdi-navigation-arrow-drop-down-circle center" style="font-size:2rem;margin-top:-50%"></i>
                                    </a>           
                               </div>
                            </div>
                        </div>
                <!-------------------------------NOTIFICATIONS----------------------------------->
                        
                        </div>
               
                     
                     </div>
              </div>
            </div>              
                </div>  
            </div>    
        </div> 
    </nav>
<!-----------------------------NAV BAR----------------------------->
    
<div class="row"></div> 
    <div class="row">  
        <div class="col l12">
     
    <div class="col l3 gray z-depth-5">
        
        <div class="row"></div>
            <div class="col l8 push-l2">
                <div class="col l12">
                    <img src="/img/avatar2.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    <div class="row">
                        <label>Name:</label><br>
                        <label>Account Status:</label>
                    </div>      
                </div>
            </div>
        
            <div class="row"></div>
        
            <div>
                <div class="row">
                    <div class="col l12">
                        
<!---------------------------------------------------------------------------------------REQUESTS-------------------------->
                        <div class="col l12">
                            <a class="white darken-5 waves-effect waves-dark z-depth-1 ">
                                <div class="col l5">
                                    <i class="material-icons left" style="font-size:6rem">input
                                    </i>

                                </div>
                                <div class="col l5 pull-l1">
                                    <div class="row"></div>
                                    <div class="col l3" style="font-size:1.7rem;font-family:Tahoma;color:black ">REQUEST</div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="row"></div>
                     
<!------------------------------------------------------------------------------------GUARDS ATTENDANCE-------------------->
                        <div class="col l12">
                            <a class="white darken-5 waves-effect waves-dark z-depth-1 ">
                                <div class="col l5">
                                    <i class="material-icons left" style="font-size:6rem"> assignment_ind </i>
                                </div>
                                <div class="col l5 pull-l1">
                                <div class="row"></div>
                                    <div class="col l3" style="font-size:1.4rem;font-family:Tahoma;color:black">GUARDS ATTENDANCE</div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="row"></div>
<!-----------------------------------------------------------------------------------------SETTINGS------------------------>
                        
                        <div class="col l12">
                            <a class="white darken-5 waves-effect waves-dark z-depth-1 ">
                                <div class="col l5">
                                    <i class="material-icons left" style="font-size:6rem"> settings </i>
                                </div>
                                <div class="col l5 pull-l1">
                                <div class="row"></div>
                                    <div class="col l3" style="font-size:1.7rem;font-family:Tahoma;color:black">SETTINGS</div>
                                </div>
                            </a>
                        </div>
                      
                        
                        
                    </div>
                </div>
        
                <div class="row"></div>
                <div class="row"></div>
                
            </div>


  
     </div>
         
<div class="col l9">
    @yield('content')
	@yield('script')
         </div>
    </div>
</div>
    
    
    
    
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

