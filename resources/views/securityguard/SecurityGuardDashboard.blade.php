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
		<link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
        
    </head>

<!----------BODY------------>

<body id="scrollhider" class="bodyscrollhider grey lighten-3 ci">
  <nav class="blue darken-4">
        
         <div class="nav-wrapper">
               
                
                <a href="#" data-activates="mobile-nav" class="button-collapse" id="scrollcontrol"><i class="material-icons">menu</i></a>
                    
<!--					<ul class="side-nav fixed white sidenavhover" id="mobile-nav" >-->

           
				<div>
                                     <a href="#" class="brand-logo">

                    <div class="row">
                        <div class="col l12">
							 <div class="col l2">
                            
                            <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="28%" style="margin-top:1%">

                            
                            </div>
                            <div class="col l6 pull-l1">
                            
                            <p style="margin-top:9px; margin-left: 20px;font-family:Myriad Pro;font-size:2.5rem">Client and Personnel Management System</p>
					
                            
                            
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
				
             
							<ul class="right hide-on-med-and-down">
								 
                                
                                
                                <li  id="notification_li">
                                    <a id="notificationLink" data-position="bottom" data-delay="50" data-tooltip="MESSAGES" href="/adminInbox" class="tooltipped">
                                        <i class="mdi-content-inbox" style="font-size:2.1rem;color:white"></i>
                                        <span id="notification_count">3</span></a>
                                </li>                                                                                                                                                                                                             
								
                                 <li><a  data-position="bottom" data-delay="50" data-tooltip="HOME"href="/dashboardadmin" class=" tooltipped"><i class="material-icons">store</i></a></li>
                                <li><a  data-position="bottom" data-delay="50" data-tooltip="LOG OUT" id = 'btnLogout' class=" tooltipped"><i class="material-icons">input</i></a></li>
							</ul>
        
		
        </div>
      
	
    </nav>
<!-----------------------------NAV BAR----------------------------->
    
    <div class="row"></div> 
 <div class="row">   
    <div class="col l12">
             <div class="col l3 z-depth-1 blue darken-1">
                        <img src="/img/avatar2.png" alt="" height="150px" width="123px"class="circle responsive-img" style="margin-left:31%"> <!-- notice the "circle" class -->
                    
                     <center>
                         <h id = 'strProfileName'></h><br>
                         <h id = 'strProfileLicenseNumber'></h>
                    </center>
            </div>
        
             <div class="col l2" style="font-size:23px;text-align:center;height:150px;width:165px !important">
                    <div id="clockDisplay" style="font-size:2rem"> 08 : 08 : 08 PM </div>
                    <script type="text/javascript">
                        function renderTime() {
                            var currentTime = new Date();
                            var diem = "AM";
                            var h = currentTime.getHours();
                            var m = currentTime.getMinutes();
                            var s = currentTime.getSeconds();

                            if (h == 0) {
                                h=12;
                            } else if (h > 12) {
                                h = h - 12;
                                diem = "PM";
                            }
                            if (h < 10) {
                                h = "0" + h;
                            }
                            if (m < 10) {
                                m = "0" + m;
                            }
                            if (s < 10) {
                                s = "0" + s;
                            }

                            var myClock = document.getElementById('clockDisplay');
                            myClock.textContent = h + ":" + m + ":" + s + " " + diem
                            myClock.innerText = h + ":" + m + ":" + s + " " + diem;	
                            setTimeout('renderTime()',1000);
                        }
                        renderTime();
                    </script>
            </div>
   
    </div>     
</div>
    
    <hr>
    <hr>  
 
    <div class="row">
    <div class="col l12">
		
             <div class="col l3 z-depth-1">
				 
				 
			<div class="card " style="background-color:darkblue" >
				<div class="card-content white-text">
				  <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'></span>
				   <a href="/securityleaverequest" class="white-text" style="font-size:23px;font-family:Myriad Pro">LEAVE REQUEST</a>
				  <i class="material-icons right" style="font-size:5rem; margin-top:-22px;">nature_people</i>
				</div>
			</div>	 
			
			<div class="card " style="background-color:darkblue" >
				<div class="card-content white-text">
				  <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'></span>
				   <a href="/securitychangelocation" class="white-text" style="font-size:23px;font-family:Myriad Pro">CHANGE LOCATION</a>
				  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">nature_people</i>
				</div>
			</div>
					
			<div class="card " style="background-color:darkblue" >
				<div class="card-content white-text">
				  <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'></span>
				   <a href="/securitysettings" class="white-text" style="font-size:23px;font-family:Myriad Pro">ACCOUNT SETTINGS</a>
				  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">settings</i>
				</div>
			</div>
         
			
                    <div class="col l12 push-l1">
						
                
<!-------------------------------------------------------CSS---------------------------------->
    
            
        <!-----------------BUTTONS-------------->
        
        <!-----------------BUTTONS-------------->


 
   
  
         
                        
                   </div>
            </div>
        
        
        <div class="col l9">
        
        
             @yield('content')
        
        
        </div>
        </div>
   </div>
  
    
     
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
    $(document).ready(function() {
        $('select').material_select();
        
        $.ajax({
            
            type: "GET",
            url: "{{action('SecurityHomepageController@getGuardInformation')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                if (data){
                    $('#strProfileName').text(data.strFirstName + ' ' + data.strLastName);
                    $('#strProfileLicenseNumber').text(data.strLicenseNumber);    
                }
            },
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');

            }
        });//ajax
        
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

