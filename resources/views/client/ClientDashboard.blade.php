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
          <script src="{!! URL::asset('../js/moment.min.js') !!}"></script>
     <!--  <script src="{!! URL::asset('../datatable.js') !!}"></script>-->
     <!--  <script src="{!! URL::asset('../dataTables.material.min.js') !!}"></script>-->
     <!--  <script src="{!! URL::asset('../jquery.dataTables.min.js') !!}"></script>-->
     <!--  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>-->
        
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
		
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
		<link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
           <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
		<link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
        
    </head>


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
                            <a id="notificationLink" data-position="bottom" data-delay="50" data-tooltip="MESSAGES"     href="/clientinbox" class="tooltipped">
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
        <div class="col l9">
        
        
             @yield('content')
        
        
        </div>
        </div>
   </div>



<!--modal current client details-->

<div id="modalCurrentClientDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:600px; margin-top:-50px;">
    <div class="modal-header">
      	<div class="h">
			<h3><center>Current Client</center></h3>  
		</div>
    </div>
	
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">				
					
					<li class="collection-header" ><h4 style="font-weight:bold;">Details</h4></li>
                <div>
                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;Bank</div>
							</div>
							<div class="col s6">
								Client Name:<div style="font-weight:normal;" id = 'clientName'>&nbsp;&nbsp;&nbsp;LandBank</div>
							</div>
						</div>
                    </li>
					
					
					<li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;123 Hello Street Pasig, Metro Manila</div>
							</div>
							<div class="col s6">
								Contact Number (Client):<div style="font-weight:normal;" id = 'contactNumberClient'>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
						</div>
                    </li>

                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;Mang Tomas</div>
							</div>
							<div class="col s6">
								Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'contactNumberPIC'>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
						</div>
                    </li>

                    
                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;1000</div>
							</div>
							<div class="col s4">
								Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;10</div>
							</div>
						
				</ul>
				<div class="row"></div>
			</div>
		</div>
	</div>
		
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<div id = "buttons">	
            <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "">OK
            </button>           
        </div>           
	</div>
</div>

<!--modal current client details end-->
  
    
     
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
  var statusIdentifier;

  $.ajax({
    type: "GET",
    url: "{{action('SecurityHomepageController@getGuardInformation')}}",
    success: function(data){
      if (data){
        $('#strProfileName').text(data.strFirstName + ' ' + data.strLastName);
        $('#strProfileLicenseNumber').text(data.strLicenseNumber);    
        statusIdentifier = data.intStatusIdentifier;
      }
    }
  });//ajax

  $('#btnClient').click(function(){
    if (statusIdentifier == 2){
      $('#modalCurrentClientDetails').openModal();
      getClientInformation();
    }
  });
  
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

