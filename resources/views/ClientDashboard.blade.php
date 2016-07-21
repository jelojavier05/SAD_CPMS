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

<!----------BODY------------>

<body id="scrollhider" class="bodyscrollhider grey lighten-3">
    

    
<!---------------------------------------------------------NAV BAR------------------------------------------------------->
    
    <nav class="indigo darken-4" style="height:90px">
        
        <div class="row"></div>
        <div class="container">
<!--   <div class="parallax"><img class="responsive-img;" style="width: 100%;" src="{!! URL::asset('../Materialize/images/background3.jpg') !!}" alt="Unsplashed background img 1"></div>-->
            <div class="nav-wrapper">
                
               
                                     <a href="#" class="brand-logo">

                    <div class="row">
                        <div class="col l12">
                            
                            <div class="col l2 pull-l2">
                            
                            <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="60%" style="margin-top:-10%">

<<<<<<< HEAD
=======
        
            <div class="col l5 push-l10  ">
                <ul id="dropdown3" class="dropdown-content">
                    <li><a href="#!">Profile<i class="material-icons">perm_contact_calendar</i></a></li>
                    <li><a id = 'btnLogout'>Log Out<i class="material-icons">input</i></a></li>
                </ul>
                <div class="row">
                    <div class="col l12">
                        <div class="col l10">
>>>>>>> 3e9667d550cc6ba2b06e757b4f708378a2dc8238
                            
                            </div>
                            <div class="col l3 pull-l3">
                            
                            <p style="margin-top:9px; margin-left: 20px;font-family:Myriad Pro;font-size:3.0rem">Client and Personnel Management System</p>
                                
                            </div>
                       
                            <div class="col l5 push-l9">
                                    <ul class="right hide-on-med-and-down">
								
                                 <li><a  data-position="top" data-delay="50" data-tooltip="HOME"href="/dashboardadmin" class=" tooltipped"><i class="material-icons">store</i></a></li>
								 <li><a  data-position="top" data-delay="50" data-tooltip="NOTIFICATION"href="/dashboardadmin" class=" tooltipped"><i class="mdi-social-public" style="font-size:2.1rem;color:white"></i></a></li>
								<li><a  data-position="top" data-delay="50" data-tooltip="MESSAGE"href="/dashboardadmin" class=" tooltipped"><i class="mdi-communication-forum" style="font-size:2.1rem;color:white"></i></a></li>
                                <li><a  data-position="top" data-delay="50" data-tooltip="LOG OUT" id = 'btnLogout' class=" tooltipped"><i class="material-icons">input</i></a></li>
							</ul>   
                                </div>
                        
                         </div>
                     </div>
                                         
                    	</a>
					
					
                    
                  <!--  <div class="homeposition">
                    
                    <a href="#" class="brand-logo">
						<div class="flow-text">
							<p style="margin-top: 20px; margin-left: 200px;font-family:Myriad Pro;font-size:6rem">Client and Personnel Management System</p>
						</div>
				
                </div>-->
                
            </div>   
        </div> 
    </nav>
    
    
<!---------------------------------------------------END OF NAV BAR-------------------------------------------------------->
    
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
                
        <!-------REQUESTS-------->
                        <div class="row">
                    <div class="col l12">
                       <div class="card">
                        <div class="card-content">
                      
                        <a class=" white darken-5 waves-effect waves-dark ">
                            <div class="col l5">
                                
                                <div class="row">
                                    <div class="col l12">
                                    <div class="col l2 pull-l4">
                                        
                                            <i class="material-icons left" style="font-size:6rem">input
                                            </i>
                                        
                                        </div>
                                    
                                        <div class="col l6 push-l12">
                                            <div class="row"></div>
                                          <span class="card-title activator grey-text text-darken-4">REQUEST<i class="mdi-hardware-keyboard-arrow-up" style="padding-left:5%"></i></span>
                                        </div>
                                    
                                    </div>
                                </div>
                             
                                
                            </div>
                         
                </a>
                      
                        
                        </div>
                           <div class="card-reveal" style="overflow:hidden">
      <span class="card-title grey-text text-darken-4" style="font-size:12px">Request Type<i class="material-icons right">close</i></span>
     
                               
                               
                               
                               <div class="row">
                               <div class="col l12 push-l2">
                                   
                               
                                    <a href="/clientguardrequest" class="btn blue darken-4" style="font-size:20px;height:40px;width:120px">GUARD</a>
                 
                                  
                                   
                             </div>
                             </div>
                             <div class="row">
                              <div class="col l6 push-l1">
                                  
                                  
                                     <a href="/clientgunrequest" class="btn blue darken-4" style="font-size:20px;height:40px;width:152px !important">GUN</a>
                
                    
                                   
                                   </div>
                                   
                                </div>
    </div>
                        
                             
                            </div>
                        </div>
                </div>
                
                
               
                
                        
        <div class="row"></div>
                
        <!-------GUARDS ATTENDANCE-------->
                <div class="col l12">
                    <a href="/clientguardattendance" class="white darken-5 waves-effect waves-dark z-depth-1" href='#'>
                        <div class="col l5">
                            <i class="material-icons left" style="font-size:6rem">perm_contact_calendar
                            </i> 
                        </div>
                        <div class="col l5 pull-l1">
                            <div class="row"></div>

                            <div class="col l3" style="font-size:1.5rem;font-family:Tahoma;color:black">GUARDS ATTENDANCE</div>
                        </div>
                    </a>
                    
                </div>
                        
                
                
                
                
        <div class="row"></div>
                
        <!-------SETTINGS-------->
                <div class="col l12">
                    <a class="white darken-5 waves-effect waves-dark z-depth-1 ">
                        <div class="col l5">
                            <i class="material-icons left" style="font-size:6rem">settings
                            </i> 
                        </div>
                        <div class="col l5 pull-l1">
                            
                        <div class="row"></div>
                            
                        <div class="col l3" style="font-size:1.7rem;font-family:Tahoma;color:black">SETTINGS</div>
                        </div>
                    </a>
                </div>
                        
                        
                <div class="col l11">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col l12">
                            <div class="col l10 pull-l2">
                            </div>
                        </div>
                    </div>
                </div>
               
                
                
                
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
        
        $('#btnLogout').click(function(){
            $.ajax({

                type: "GET",
                url: "{{action('CPMSUserLoginController@logoutAccount')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(data){
                    if (!data){
                        window.location.href = '{{ URL::to("/userlogin") }}';
                    }
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');   
                }

            });//ajax 
        });
    });
	</script>
	
    
    
    </body>
</html>

