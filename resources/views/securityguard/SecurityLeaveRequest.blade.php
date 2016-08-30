@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Leave Request
@endsection


@section('content')


<div class="row" class="ci">
    
              <div class="col s12 push-s3">
                 <h3 class="blue-text" style="font-family:Myriad Pro;margin-left:-2.5%;margin-top:1%">Leave Request</h3>
              </div>  
       
    <div class="col s10 push-s3" style="margin-left:-2%;">
        <!-- LEAVE FORM -->
        <div class="col s5">
            <form class="card medium z-depth-1" style="height:420px !important;margin-top:-.1%;background-color:#90AFC5;border: .5px solid grey">
                <div class="row"></div>
                <div class="col l12">
                    <div class="col l6 push-l2">
                        <i class="material-icons" style="font-size:16rem">web</i>
                    </div>
                    <div class="col l6 pull-l1">
                        <div class="row"></div>
                        <div class="row"></div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row"></div>
                    <span class="card-title activator grey-text text-darken-4">LEAVE APPLICATION FORM
                    <i class="material-icons right animated infinite flash" style="font-size:3rem">view_headline</i></span>
                </div>
                <div class="card-reveal sidenavhover" style="overflow:hidden">
                    <span class="card-title grey-text text-darken-4">FILL UP THE FOLLOWING<i class="material-icons right ">close</i></span>
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s3">
                                        <center><i class="material-icons prefix" style="font-size:6rem">account_circle</i></center>
                                    </div>

                                    <div class="col s3" >
                                        <div class="row"></div>
                                        <div class="row"></div>
                                        <center><label>{{$guardInformation->strFirstName}} {{$guardInformation->strLastName}}</label></center>
                                    </div>
                                        <center>
                                              
                                <select class="col s6" id = "selectLeave">
                                    <option disabled selected>Leave Type</option>
                                    @foreach($guardLeave as $value)
                                        <option id = '{{$value->intLeaveID}}' value ='{{$value->intLeaveCount}}'>{{$value->strLeaveType}}</option>
                                    @endforeach
                                </select>

                                @foreach($guardLeave as $value)
                                    <input type = hidden id = 'notificationPeriod{{$value->intLeaveID}}' value = '{{$value->intNotificationPeriod}}'>
                                @endforeach
                            </center>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="#!">Sick</a></li>
                                <li><a href="#!">Maternity</a></li> 
                                <li><a href="#!">Personal Leave of Absence</a></li>
                            </ul>
                                </div>
                            </div>                  
                            <div class="row">
                                <div class="col l12" style="margin-top:-5%">
                                    <div class="col l6">
                                        <label for="icon_prefix">Date Start</label><br>
                                        <input type="date" class="datepicker" id = 'dateStart'>
                                    </div>
                                    <div class="col l6">
                                        <label for="icon_prefix">Date End</label><br>
                                        <input type="date" class="datepicker" id = 'dateEnd'>
                                    </div>
                                    <!--textarea-->
                                    <div class="row">
                                        <form class="col s12"  style="margin-top:-2%">
                                                <div class="input-field col s12">
                                                <textarea class="materialize-textarea" id="strReason" type="text" length="120"></textarea>
                                                <label for="input_text">REASON</label>
                                                </div>
                                        </form>
                                        <div class="col l12 pull-l4">
                                            <a class="btn green darken-4 z-depth-3 right" id = 'btnSend'>Send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>  
        </div>
		
		<div class="col s5"  >
			<div class="container-fluid grey lighten-2" style="padding:2%;">
			<table class="striped" style="border: 1px solid black;" id = 'tableLeaveLog'>
		
				<thead>
			

					<tr>
						<th class="grey lighten-1">Leave Type</th>
						<th class="grey lighten-1">Date Start</th>
						<th class="grey lighten-1">Date End</th>
					</tr>
				</thead>
			
				<tbody  style=" min-height:200px; max-height:200px;">
					<tr>
						<td>Sick</td>
						<td>01/01/2016</td>
						<td>01/08/2016</td>
					</tr>
					<tr>
						<td>Sick</td>
						<td>01/01/2016</td>
						<td>01/08/2016</td>
					</tr>
					<tr>
						<td>Sick</td>
						<td>01/01/2016</td>
						<td>01/08/2016</td>
					</tr>
					<tr>
						<td>Sick</td>
						<td>01/01/2016</td>
						<td>01/08/2016</td>
					</tr>
					<tr>
						<td>Sick</td>
						<td>01/01/2016</td>
						<td>01/08/2016</td>
					</tr>
					<tr>
						<td>Sick</td>
						<td>01/01/2016</td>
						<td>01/08/2016</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		</div>
    </div>
</div>

<!--END OF lEAVE FORM-->

  <!--MESSAGE-->
@stop

@section('script')
<script>
    $(document).ready(function(){
        var leaveID;

        $('#selectLeave').on('change',function(){
            leaveID = $(this).children(":selected").attr("id");
        });

        $('#btnSend').click(function(){
            if (checkGuardStatus()){
                if (checkInput() && checkDate()){
                    var dateStart = moment(new Date($('#dateStart').val())).format('YYYY-MM-D');
                    var dateEnd = moment(new Date($('#dateEnd').val())).format('YYYY-MM-D');
                    var strReason = $('#strReason').val();

                    $.ajax({
                        type: "POST",
                        url: "{{action('SecurityLeaveRequestController@postLeaveRequest')}}",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            intLeaveID: leaveID,
                            dateStart: dateStart,
                            dateEnd: dateEnd,
                            strReason: $('#strReason').val() ,
                        },
                        success: function(data){
                            confirm('success');
                        },
                        error: function(data){
                            confirm('error');
                        }
                    });//ajax
                }else{
                    var toastContent = $('<span>Check your input.</span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                }
            }else{
                var toastContent = $('<span>You cannot request for leave.</span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
                
        });

        function checkGuardStatus(){
            var checker;
            $.ajax({
                type: "GET",
                url: "{{action('SecurityLeaveRequestController@guardStatus')}}",
                success: function(data){
                    console.log(data);
                    if (data.intStatusIdentifier == 2 && data.countActiveLeaveRequest == 0){
                        checker = true;
                    }else{
                        checker = false;
                    }
                },async:false
            });//ajax

            return checker;
        }

        function getDaysDifference(){
            var dateStart = new Date($('#dateStart').val());
            var dateEnd = new Date($('#dateEnd').val());
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            return Math.round(Math.abs((dateStart.getTime() - dateEnd.getTime())/(oneDay))) + 1;
        }

        function checkInput(){
            var dateStart = new Date($('#dateStart').val());
            var dateEnd = new Date($('#dateEnd').val());
            
            if ($('#dateEnd').val() == '' || $('#dateStart').val() == '' || dateStart > dateEnd || $('#strReason').val() == ''){
                return false;
            }else{
                return true;
            }
        }

        function checkDate(){
            var notificationPeriod = $('#notificationPeriod' + leaveID).val();
            var dateStart = new Date($('#dateStart').val());
            var notificationDay = new Date(moment({}).add(notificationPeriod, 'days').format('l'));
            if (getDaysDifference() > $('#selectLeave').val() || notificationDay > dateStart){
                return false;
            }else{
                return true;
            }
        }


    });
</script>
<script>

$("#tableLeaveLog").DataTable({             
 "columns": [      
 null,
 null,
 null,
 ] ,  
 "pageLength":5,
 "bLengthChange": false		
});
</script>
@stop