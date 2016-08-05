<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>@yield('title')</title>
<meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
  <!-- ================================CSS===========================================  -->
  
   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

  <link href="{!! URL::asset('../css/materialize.css') !!}" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="{{!! URL::asset('../css/materialize.min.css') !!}"/>
<!--	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
<!--		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
 
  <link href="{!! URL::asset('../css/animate.css') !!}" type="text/css" rel="stylesheet"/>
  <link href="{!! URL::asset('../sweetalert.css') !!}" type="text/css" rel="stylesheet"/>
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
  <script src="{!! URL::asset('../sweetalert.min.js') !!}"></script>
<!--  <script src="{!! URL::asset('../datatable.js') !!}"></script>-->
<!--  <script src="{!! URL::asset('../dataTables.material.min.js') !!}"></script>-->
<!--  <script src="{!! URL::asset('../jquery.dataTables.min.js') !!}"></script>-->
<!--  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>-->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
	 <link href="{!! URL::asset('../css/style.css') !!}" type="text/css" rel="stylesheet"/>
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

</head>

<body class="grey lighten-3">
    
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

                            
                            </div>
                            <div class="col l3 pull-l3">
                            
                            <p style="margin-top:9px; margin-left: 20px;font-family:Myriad Pro;font-size:3.0rem">Client and Personnel Management System</p>
                                
                            </div>
                       
                            <div class="col l5 push-l9">
                                    <ul class="right hide-on-med-and-down">
                                         <li><a  data-position="top" data-delay="50" data-tooltip="GUARDS"href="/client/tempaccount" class=" tooltipped"><i class="material-icons">accessibility</i></a></li>
                                         <li><a  data-position="top" data-delay="50" data-tooltip="CLIENT DETAILS"href="/client/tempaccountdetails" class=" tooltipped"><i class="material-icons" style="font-size:2.1rem;color:white">nature_people</i></a></li>
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
   
<!--
<nav class="indigo darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
-->
													


    
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
	
<script>
$(document).ready(function() {
    $.ajax({
            
        type: "GET",
        url: "{{action('TempClientAccountController@getClient')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            
            var area = commaSeparateNumber(data.deciAreaSize);
            var population = commaSeparateNumber(data.intPopulation);
            
            $('#clientName').text(data.strClientName);
            $('#natureOfBusiness').text(data.strNatureOfBusiness);
            $('#name').text(data.strClientName);
            $('#clientNumber').text(data.strContactNumber);
            $('#personInCharge').text(data.strPersonInCharge);
            $('#personNumber').text(data.strPOICContactNumber);
            $('#address').text(data.strAddress + ' ' + data.strCityName + ', ' + data.strProvinceName);
            $('#areaSize').text(area);
            $('#population').text(population);
            $('#numberOfGuard').text(data.intNumberOfGuard);
        },
        error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

        }
    });//guards information
    
    function commaSeparateNumber(val){
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
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
});
</script>
    
     
    </body>
	
    
</html>


