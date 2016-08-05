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
								
                                 <li><a  data-position="top" data-delay="50" data-tooltip="HOME"href="/securityhomepage" class=" tooltipped"><i class="material-icons">store</i></a></li>
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
            <div class="col l2 offset-l1">
                
            
                  <a href="/securityleaverequest" class="btn blue darken-4 z-depth-2" style="font-size:23px;height:150px;width:165px !important"><div class="row"></div><i class="material-icons" style="font-size:3rem">face</i>LEAVE REQUEST</a>
                
            </div>
            
            <div class="col l2">
                
                <a href="/securitychangelocation" class="btn blue darken-4 z-depth-2" style="font-size:23px;height:150px;width:165px !important"><div class="row"></div><i class="material-icons" style="font-size:3rem">business</i>CHANGE LOCATION</a>
              
            </div>
            
            <div class="col l2 ">
                
                 <a href="/securitysettings" class="btn blue darken-4 z-depth-2" style="font-size:23px;height:150px;width:165px !important"><div class="row"></div><i class="material-icons" style="font-size:3rem">settings</i>ACCOUNT SETTINGS</a>
                
            </div>
        
             <div class="col l2" style="font-size:23px;text-align:center;height:150px;width:165px !important">
            
                <div class="row"></div>
                
                <i class="material-icons" style="font-size:3rem">av_timer</i>
            
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
             <div class="col l3 z-depth-1 blue darken-2">
                    <div class="col l12 push-l1">
                <script type="text/javascript">
		
                    var Calendar = function(divId) {

                        //Store div id
                        this.divId = divId;

                        // Days of week, starting on Sunday
                        this.DaysOfWeek = [
                            'SUN',
                            'MON',
                            'TUE',
                            'WED',
                            'THU',
                            'FRI',
                            'SAT'
                        ];

                        // Months, stating on January
                        this.Months = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER' ];

                        // Set the current month, year
                        var d = new Date();

                        this.CurrentMonth = d.getMonth();
                        this.CurrentYear = d.getFullYear();
                    };
		
                    // Goes to next month
                    Calendar.prototype.nextMonth = function() {
                        if ( this.CurrentMonth == 11 ) {
                            this.CurrentMonth = 0;
                            this.CurrentYear = this.CurrentYear + 1;
                        }
                        else {
                            this.CurrentMonth = this.CurrentMonth + 1;
                        }
                        this.showCurrent();
                    };
		
                    // Goes to previous month
                    Calendar.prototype.previousMonth = function() {
                        if ( this.CurrentMonth == 0 ) {
                            this.CurrentMonth = 11;
                            this.CurrentYear = this.CurrentYear - 1;
                        }
                        else {
                            this.CurrentMonth = this.CurrentMonth - 1;
                        }
                        this.showCurrent();
                    };

                    // Show current month
                    Calendar.prototype.showCurrent = function() {
                        this.showMonth(this.CurrentYear, this.CurrentMonth);
                    };
		
                    // Show month (year, month)
                    Calendar.prototype.showMonth = function(y, m) {

                        var d = new Date()
                            // First day of the week in the selected month
                            , firstDayOfMonth = new Date(y, m, 1).getDay()
                            // Last day of the selected month
                            , lastDateOfMonth =  new Date(y, m+1, 0).getDate()
                            // Last day of the previous month
                            , lastDayOfLastMonth = m == 0 ? new Date(y-1, 11, 0).getDate() : new Date(y, m, 0).getDate();

                             


                        // Write selected month and year
                       
                        
                             var html = '<table class="current-day">';
                        html += '<tr><td colspan="8"><center>' + this.Months[m] + ' - ' + y + '</center></td></tr>';
                       
                        
                        // Write the header of the days of the week
                        html += '<tr>';
                        for(var i=0; i < this.DaysOfWeek.length;i++) {
                            html += '<td class="weeks">' + this.DaysOfWeek[i] + '</td>';
                        }
                        html += '</tr>';

                        // Write the days
                        var i=1;
                        do {

                            var dow = new Date(y, m, i).getDay();

                            // If Sunday, start new row
                            if ( dow == 0 ) {
                                html += '<tr>';
                            }
                            // If not Sunday but first day of the month
                            // it will write the last days from the previous month
                            else if ( i == 1 ) {
                                html += '<tr>';
                                var k = lastDayOfLastMonth - firstDayOfMonth+1;
                                for(var j=0; j < firstDayOfMonth; j++) {
                                    html += '<td class="not-current">' + k + '</td>';
                                    k++;
                                }
                            }
				
                        // Write the current day in the loop
                        html += '<td class="days">' + i + '</td>';

                        // If Saturday, closes the row
                        if ( dow == 6 ) {
                            html += '</tr>';
                        }
                        // If not Saturday, but last day of the selected month
                        // it will write the next few days from the next month
                        else if ( i == lastDateOfMonth ) {
                            var k=1;
                            for(dow; dow < 6; dow++) {
                                html += '<td class="not-current">' + k + '</td>';
                                k++;
                            }
                        }
				
                            i++;
                        }while(i <= lastDateOfMonth);
			
                        // Closes table
                        html += '</table>';

                        // Write HTML to the div
                        document.getElementById(this.divId).innerHTML = html;
		              };
		
                    // On Load of the window
                    window.onload = function() {

                        // Start calendar
                        var c = new Calendar("divCalendar");			
                        c.showCurrent();

                        // Bind next and previous button clicks
                        getId('btnNext').onclick = function() {
                            c.nextMonth();
                        };
                        getId('btnPrev').onclick = function() {
                            c.previousMonth();
                        };
                    }

                    // Get element by id
                    function getId(id) {
                        return document.getElementById(id);
                    }
	
	           </script>

<!-------------------------------------------------------JAVASCRIPT---------------------------------->    
            
            
<!-------------------------------------------------------CSS---------------------------------->
            
	<style type="text/css">
		
		td.not-current {
			color: lightslategray;
            text-align: center;
           
		}
        
        td.MONTH {
            color: blue;
            text-align: center;
            
        }
        
        table.current-day{
            color: black;
            text-align: center;
        }
        
        td.weeks {
            color: blue;
            text-align: center;
            text-decoration: underline;
        }
        
        td.days {
            color: darkblue;
            text-align: center;
            
        }
        
	</style>
            
<!-------------------------------------------------------CSS---------------------------------->
    
            
        <!-----------------BUTTONS-------------->
        
        <!-----------------BUTTONS-------------->


 
   
  
            <div class="row"></div>
              <div class="row">
                 
                  <div class="col l12">
                      <div class="row">
            <div class="col l12 pull-l1"> 
                <div class="col l6">
                <button  id="btnPrev" class=" btn waves-effect waves-light" type="submit" name="action"> PREV 
                    <i class="material-icons left"> skip_previous </i>
                </button>
                    </div>
                <div class="col l6">
                <button id="btnNext" class=" btn waves-effect waves-light" type="submit" name="action"> NEXT 
                    <i class="material-icons right"> skip_next </i>
                </button>
                    </div>
            </div>
                      </div>
                      
    
            <div class="col l12 pull-l2">
                  <div id="divCalendar">
                             </div>
                
                </div>
                  </div>
                        </div>
                        
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

