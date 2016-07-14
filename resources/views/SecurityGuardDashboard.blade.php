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
    
    
    
    
<!-----------------------------NAV BAR----------------------------->
    
    <nav class="indigo darken-4" style="height:90px">
    <div class="row"></div>
        <div class="container">
<!--   <div class="parallax"><img class="responsive-img;" style="width: 100%;" src="{!! URL::asset('../Materialize/images/background3.jpg') !!}" alt="Unsplashed background img 1"></div>-->
            <div class="nav-wrapper">
               <a href="#" class="brand-logo"><img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="9%" height="9%"></a>
        
				<div>
                 <div class="homeposition">
                    <div class="row">
                       <div class="col l12">
                           
                     
                        <div class="col l7 push-l1">
                             <a href="#" class="brand-logo">
                                   <!--<div class="flow-text">
                                    <img src="{!! URL::asset('../Materialize/images/logo.png') !!}" width="10%" height="10%">
                                </div>-->
                                <div class="flow-text">
                                    <h5 style="margin-top: 20px;">Client and Personnel Management System</h5>
                                </div>
                             </a>
                        </div>
                           
                           
                           
                           
                               <div class="row"></div>

                           <div class="col l5 push-l10  ">
                               
                <ul id="dropdown3" class="dropdown-content">
                    <li><a href="#!">Profile<i class="material-icons">perm_contact_calendar</i></a></li>
                    <li><a href="#!">Log Out<i class="material-icons">input</i></a></li>
                </ul>
                               <div class="row">
                                   <div class="col l12">
                                       <div class="col l10">
                                         
                               <a class="btn dropdown-button col l2" style="background-color:transparent" href="#!" data-activates=""><i class="mdi-action-home center" style="font-size:2rem;margin-top:-50%"></i></a>
                               
                                <a class="btn dropdown-button col l2 push-l1" style="background-color:transparent" href="#!" data-activates="dropdown2"><i class="material-icons" style="font-size:2rem;margin-top:-50% ">language</i></a>
                                
                                <a class="btn dropdown-button col l2 push-l2" style="background-color:transparent" href="#!" data-activates="dropdown2"><i class="material-icons" style="font-size:2rem;margin-top:-50% ">message</i></a>
               
                               <a class="btn dropdown-button col l2 push-l3" style="background-color:transparent" href="#!" data-activates="dropdown3"><i class="mdi-navigation-arrow-drop-down-circle center" style="font-size:2rem;margin-top:-50%"></i></a>
                                              
                               </div>
                                       </div>
                                   </div>
                 
                        
                        </div>
               
                     
                     </div>
              </div>
                    <!-- 
                     <div class="row">
                     <div class="col l12">
                            <div class="col l5 offset-l9 ">
                        <ul id="card1" class="card small">
                                <li><a href="#!">@@@@@@@@@@@@@@<i class="material-icons"></i></a></li>
                         </ul>                                 
                            </div>
                            </div>
                        </div>
                -->
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
                
              <!--REQUEST-->
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
                                   
                               
                                    <a href="/securityleaverequest" class="btn blue darken-4" style="font-size:20px;height:40px;width:120px">LEAVE</a>
                 
                                  
                                   
                             </div>
                             </div>
                             <div class="row">
                              <div class="col l6 push-l1">
                                  
                                  
                                     <a href="/securitychangelocation" class="btn blue darken-4" style="font-size:20px;height:40px;width:152px !important">LOCATION</a>
                
                    
                                   
                                   </div>
                                   
                                </div>
    </div>
                        
                             
                            </div>
                        </div>
                </div>
            
                
                
                
                
                <!--SETTINGS-->
                        <div class="col l12">
                        <a class="white darken-5 waves-effect waves-dark z-depth-1 ">
                            <div class="col l5">
                    <i class="material-icons left" style="font-size:6rem">settings
                    </i> </div>
                            <div class="col l5 pull-l1">
                                <div class="row"></div>
                    <div class="col l3" style="font-size:1.7rem;font-family:Tahoma;color:black">SETTINGS</div>
                    </div>
                </a>
                            </div>
                        
                        
                        <div class="col l11">
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
            <div class="col l12"> 
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
                      
    
            <div class="col l10 pull-l2">
                  <div id="divCalendar">
                             </div>
                
                </div>
                  </div>
                        </div>
                        
                        
                        </div>
                        
        </div>
        
       
         </div>
    
        <div class="col l9">
            <div class="row"></div>
            <div class="row"></div>
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

