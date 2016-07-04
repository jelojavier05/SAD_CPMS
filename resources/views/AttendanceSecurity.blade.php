@extends('CPMSLogin')
@section('content')


<div class="row l2">
    <div class="col l10">
        <div class="col l10 offset-l4 z-depth-1" style="margin-top:2%">
            
<!-------------------------------------------------------JAVASCRIPT---------------------------------->
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
            padding-bottom: 40px;
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
            padding-bottom: 40px;
        }
        
	</style>
            
<!-------------------------------------------------------CSS---------------------------------->
    
            
        <!-----------------BUTTONS-------------->
        
        <!-----------------BUTTONS-------------->


 
   
  
 
              <div class="row">
                 

            <div class="col l12 offset-l4">  
                <button  id="btnPrev" class=" btn waves-effect waves-light" type="submit" name="action"> PREV 
                    <i class="material-icons left"> skip_previous </i>
                </button>
           
                <button id="btnNext" class=" btn waves-effect waves-light" type="submit" name="action"> NEXT 
                    <i class="material-icons right"> skip_next </i>
                </button>
            </div>
                      
                  </div>
      
       
                  <div id="divCalendar">
                             </div>

    
<!--------------------------------------------------VIEW MONTHLY RATE------------------------------------------->
         <div>

        <div class="row">
            <div class="col l8 offset-l2 z-depth-1" style="margin-top:2%">
             
                <div class="card-content white-text">
                  <center><span class="card-title" style="color:black"> Total Monthly Rate </span></center>
                </div>
                <table class="centered">
                    <thead>
                        <tr>
                            <th data-field="time"> Time </th>
                            <th data-field="rate"> Rate per Hour </th>
                            <th data-field="number"> Salary </th>
                         </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 120 </td>
                            <td> 58 </td>
                            <td> P 6960 </td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
    
<!--------------------------------------------------VIEW MONTHLY RATE------------------------------------------->
    
</div>

@stop