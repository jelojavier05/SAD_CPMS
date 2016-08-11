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

<body id="scrollhider" class="bodyscrollhider grey lighten-3 ci">
      <nav class="blue darken-4">
        
         <div class="nav-wrapper">
<!--                <a href="#" data-activates="mobile-nav" class="button-collapse" id="scrollcontrol"><i class="material-icons">menu</i></a>-->
                    
<!--					<ul class="side-nav fixed white sidenavhover" id="mobile-nav" >-->
				<div>
                    <a href="#" class="brand-logo">
                       <div class="row">
                        <div class="col l12">
                            <div class="col l6 push-l4">
                            <p style="margin-top:9px; margin-left: 20px;font-family:Myriad Pro;font-size:2.2rem">CLIENT AND PERSONNEL MANAGEMENT SYSTEM</p>     
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                
                <ul class="right hide-on-med-and-down">    
                      <li  id="notification_li">
                            <a id="notificationLink" data-position="bottom" data-delay="50" data-tooltip="MESSAGES"     href="/securityInbox" class="tooltipped">
                                <i class="mdi-content-inbox" style="font-size:2.1rem;color:white"></i>
                                <span id="notification_count">3</span>
                            </a>
                      </li>                                                                                                
                      <li id="notification_li">
                            <a  data-position="bottom" data-delay="50" data-tooltip="HOME"href="/clienthomepage" class=" tooltipped">
                          <i class="material-icons">store</i>
                            </a>
                       </li>
                      <li id="notification_li">
                          <a  data-position="bottom" data-delay="50" data-tooltip="LOG OUT" id = 'btnLogout' class=" tooltipped">
                              <i class="material-icons">input</i>
                          </a>
                      </li>
              </ul>
        </div>
    </nav>
    
<!---------------------------------------------------------NAV BAR-----------------------------------------------
    
    <nav class="indigo darken-4" style="height:90px">
        
        <div class="row"></div>
        <div class="container">
<!--   <div class="parallax"><img class="responsive-img;" style="width: 100%;" src="{!! URL::asset('../Materialize/images/background3.jpg') !!}" alt="Unsplashed background img 1"></div>
            <div class="nav-wrapper">
                
               
                                     <a href="#" class="brand-logo">

                    <div class="row">
                        <div class="col l12">
                            
                            <div class="col l2 pull-l2">
                            
                            <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="60%" style="margin-top:-10%">

                            
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
				
                </div>
                
            </div>   
        </div> 
    </nav>
    
  -->
    
    
    <div class="row"></div> 
     <ul class="side-nav fixed" id="mobile-nav" style="background-color:#90AFC5;overflow:hidden">
                     <div class="iconposition">
                        <div class="card-panel blue darken-4" style="height:115px;">

                                <div class="row">
                                    <div class="col l12">
                                          <div class="col l6 push-l3" style="margin-top:-6%">

                                            <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="110%">

                                            </div>  
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col l12 push-l2">
                                         <p class="ci" style="margin-top:-10%;position:absolute;color:white;">CLIENT ACCOUNT</p>

                                    </div>
                            </div>
                        </div>
                 </div>
         <div class="row">
             <div class="col s12">
                 <div class="col s12 z-depth-1 ">
                        <img src="/img/avatar2.png" alt="" width="80" class="circle responsive-img" style="margin-left:31%"> <!-- notice the "circle" class -->
                    
                     <center>
                         <h id = 'strProfileName'></h><br>
                         <h id = 'strProfileLicenseNumber'></h>
						 <button class="btn blue waves-effect waves-light modal-trigger" href="#modalCurrentClientDetails" style="height:30px;">Landbank</button>
						 <div class="row"></div>
                    </center>
                </div>
             </div>
         </div>
          <div class="row">
                  <div class="col s12 z-depth-1" style="margin-top:-10px;">
                            <div class="col s6">
                                 <div class="card blue darken-4" style="height:55px; width:95px;">
                                        <a data-position="top" data-delay="50" data-tooltip="REQUEST GUARDS" href="/clientguardrequest" class="white-text tooltipped" style="font-size:18px;font-family:Myriad Pro">GUARD        
                                        </a> 
                                     <i class="material-icons" style="font-size:1.8rem;margin-top:-50%;margin-left:73%;position:absolute;color:white">accessibility</i>    
                                </div>
                                
                            </div>
                      
                      
                            <div class="col s6">
                                 <div class="card blue darken-4" style="height:55px; width:95px;">
                                        <a data-position="top" data-delay="50" data-tooltip="REQUEST GUNS" href="/clientgunrequest" class="white-text tooltipped" style="font-size:18px;font-family:Myriad Pro">GUN
                                     </a>
                                      <i class="material-icons" style="font-size:1.8rem;margin-top:-53%;margin-left:65%;position:absolute;color:white">tonality</i>   
                                </div>
                            </div>
                 
                         <div class="col s8 push-s2">
                                 <div class="card blue darken-4" style="height:55px;">
                                        <a data-position="top" data-delay="50" data-tooltip="ACCOUNT SETTINGS" href="/clientsettings" class="white-text tooltipped" style="font-size:18px;font-family:Myriad Pro">SETTINGS
                                        </a>
                                      <i class="material-icons" style="font-size:1.8rem;margin-top:-40%;margin-left:75%;position:absolute;color:white">settings</i>   
                                    
                                </div>
                    
                  			</div>
                 </div>
          </div>
         
         <div class="row">
             <div class="col s12 push-s3">
              <iframe src="http://free.timeanddate.com/clock/i5bfv3ml/n145/szw110/szh110/hoc000/hbw0/hfc09f/cf100/hnc07c/hwc000/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3" frameborder="0" width="110" height="120"></iframe>   

                    <div class="row">
                        <div class="col l12" style="margin-left:-4%">
                           <iframe src="http://free.timeanddate.com/clock/i5bfv67w/n145/fn14/ftb/bo2/tt0/tw0/tm1/tb4" frameborder="0" width="100px" height="38"></iframe>      
                        
                        </div>


                   </div> 
         </div>
         
         </div>
    </ul>



















<!---------------------------------------------------END OF NAV BAR-------------------------------------------------------->
 
    
       
           @yield('content')
	       @yield('script')
         
    
         
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
	</script>
	
    
	<script>
		 $(document).ready(function() {
        $('select').material_select();
		 });
	</script>
	
    
    
    </body>
</html>

