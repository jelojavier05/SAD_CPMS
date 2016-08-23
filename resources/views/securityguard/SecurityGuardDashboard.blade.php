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
          <link rel="stylesheet" type="text/css" href="{!! URL::asset('../datatable.css') !!}">
        <!--  <link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/dataTables.material.min.css') !!}">-->
          <link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/jquery.dataTables.min.css') !!}">
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
       <script src="{!! URL::asset('../datatable.js') !!}"></script>
     <!--  <script src="{!! URL::asset('../dataTables.material.min.js') !!}"></script>-->
       <script src="{!! URL::asset('../jquery.dataTables.min.js') !!}"></script>
     <!--  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>-->
        
        <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> -->
		
        <!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script> -->
		<link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
           <!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script> -->
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
                            <a id="notificationLink" data-position="bottom" data-delay="50" data-tooltip="MESSAGES" href="/securityInbox" class="tooltipped">
                                <i class="mdi-content-inbox" style="font-size:2.1rem;color:white"></i>
                                <span id="notification_count">3</span>
                            </a>
                      </li>                                                                                                
                      <li id="notification_li">
                            <a  data-position="bottom" data-delay="50" data-tooltip="HOME" href="/securityHome" class=" tooltipped">
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
                                         <p class="ci" style="margin-top:-10%;position:absolute;color:white;">GUARD ACCOUNT</p>

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
						 <button class="btn blue waves-effect waves-light" style="height:30px;" id = 'btnClient'>Client</button>
						 <div class="row"></div>
                    </center>
                </div>
             </div>
         </div>
          <div class="row">
                  <div class="col s12 z-depth-1" style="margin-top:-10px;">
                            <div class="col s6">
                                 <div class="card blue darken-4" style="height:55px; width:95px;">
                                        <a data-position="top" data-delay="50" data-tooltip="LEAVE REQUEST" href="/securityleaverequest" class="white-text tooltipped" style="font-size:18px;font-family:Myriad Pro">LEAVE    
                                                     
                                     </a> 
                                     <i class="material-icons" style="font-size:2rem;margin-top:-50%;margin-left:68%;position:absolute;color:white">near_me</i>    
                                </div>
                                
                            </div>
                            <div class="col s6">
                                 <div class="card blue darken-4" style="height:55px; width:95px;">
                                        <a data-position="top" data-delay="50" data-tooltip="CHANGE LOCATION" href="/securitychangelocation" class="white-text tooltipped" style="font-size:18px;font-family:Myriad Pro">SWAP
                                     </a>
                                      <i class="material-icons" style="font-size:2rem;margin-top:-53%;margin-left:65%;position:absolute;color:white">swap_horiz</i>   
                                </div>
                            </div>
                 
                         <div class="col s8 push-s2">
                                 <div class="card blue darken-4" style="height:55px;">
                                        <a data-position="top" data-delay="50" data-tooltip="ACCOUNT SETTINGS" href="/securitysettings" class="white-text tooltipped" style="font-size:18px;font-family:Myriad Pro">SETTINGS
                                        </a>
                                      <i class="material-icons" style="font-size:2rem;margin-top:-40%;margin-left:75%;position:absolute;color:white">settings</i>   
                                    
                                </div>
                    
                  			</div>
                 </div>
          </div>
        
         <div class="row">
             <div class="col s12 push-s3">
          <iframe src="http://free.timeanddate.com/clock/i5bt1d45/n145/szw110/szh110/hoc09f/hbw2/hfc09f/cf100/hnc09f/hwc000/hcw2/fan2/facfff/fdi76/mqc9ff/mqs4/mql18/mqw1/mqd50/mhc009/mhs4/mhl5/mhw2/mhd60/mmv0/hhcfff/hhs1/hhb10/hmcfff/hmb10/hscfff/hsw3" frameborder="0" width="110" height="110" style="margin-left:-2%"></iframe>
                    <div class="row">
                        <div class="col l12 pull-l4">
      <iframe src="http://free.timeanddate.com/clock/i5bybb84/n145/tlph/fn16/tct/pct/ftb/bat4/tt0/th2/ta1/tb4" frameborder="0" width="212" height="36" allowTransparency="true"></iframe>
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
								Nature of Business:<div style="font-weight:normal;" id = 'natureOfBusiness'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							<div class="col s6">
								Client Name:<div style="font-weight:normal;" id = 'clientName'>&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
                    </li>
					
					
					<li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Address:<div style="font-weight:normal;" id = 'address'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							<div class="col s6">
								Contact Number (Client):<div style="font-weight:normal;" id = 'contactNumberClient'>&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
                    </li>

                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s6">	
								Person in Charge:<div style="font-weight:normal;" id = 'personInCharge'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							<div class="col s6">
								Contact Number (Person in Charge):<div style="font-weight:normal;" id = 'contactNumberPIC'>&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
                    </li>

                    
                    <li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								Area Size (approx. in square meters):<div style="font-weight:normal;" id = 'areaSize'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							<div class="col s4">
								Population (approx.):<div style="font-weight:normal;" id = 'population'>&nbsp;&nbsp;&nbsp;</div>
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
    }else{
      swal("No Client.", "You are not assigned to any client.", "error");
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

  function getClientInformation(){
    $.ajax({
      type: "GET",
      url: "{{action('SecurityGuardDashboardController@getClientInformation')}}",
      success: function(data){
        $('#natureOfBusiness').text(data.strNatureOfBusiness);
        $('#clientName').text(data.strClientName);
        $('#address').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
        $('#contactNumberClient').text(data.strContactNumber);
        $('#personInCharge').text(data.strPersonInCharge);
        $('#contactNumberPIC').text(data.strPOICContactNumber);
        $('#areaSize').text(data.deciAreaSize);
        $('#population').text(data.intPopulation);
      }
    });//ajax
  }
});      
</script>

<script>
  $(document).ready(function(){
    $.ajax({
          type: "GET",
          url: "{{action('InboxController@getNumberOfUnreadMessages')}}",
          beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');

              if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          success: function(data){
              if (data > 0){
                $('#notification_count').text(data);
                $('#notification_count').show();
              }
          }
      });//ajax get client information

    $("#notificationLink").click(function(){
      $("#notificationContainer").fadeToggle(300);
      $("#notification_count").fadeOut("slow");
      window.location.href = '{{ URL::to("/securityInbox") }}';
      return false;
    });
  });
</script>
	
    </body>
</html>

