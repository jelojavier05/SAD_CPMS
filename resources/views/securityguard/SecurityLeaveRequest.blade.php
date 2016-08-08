@extends('securityguard.SecurityGuardDashboard')

@section('title')
Security Leave Request
@endsection


@section('content')



<!--BASIC LEAVE-->
<div class="row" class="ci">
    <div class="col l12">
        <div class="col l6">
            <form class="card medium z-depth-1">
                <div class="row"></div>
                    <div class="row">
                        <div class="col l12 push-l1">
                            <div class="col l3">
                                <i class="material-icons left" style="font-size:6rem">play_for_work
                                </i> 
                            </div>
                            <div class="col l6">
                                <div class="row"></div>
                                <span class="black-text" style="font-size:20px;font-family:Myriad Pro">BASIC LEAVE
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                <div class="row">
                    <div class="col l12">
                        <div class="col l6">
                            <label for="test8">TYPES OF LEAVE</label><br>
                            <input type="checkbox" id="test8" disabled="disabled" />
                            <label for="test8">Sick</label><br>
                            <input type="checkbox" id="test8" disabled="disabled" />
                            <label for="test8">Maternity</label><br>
                            <input type="checkbox" id="test8" disabled="disabled" />
                            <label for="test8">Personal Leave of Absence</label>
                        </div>
                        <div class="col l6">
                            <label for="test8">MAXIMUM LEAVES: 5</label><br>
                            <label for="test8">REMAINING LEAVES: 3</label><br>  
                            <label for="test8">NOTE!</label><br>
                            <span class="ci"><bold>THE APPLICATION OF LEAVE MUST <br>BE <div class="blue-text">2 DAYS</div>PRIOR TO THE GIVEN DATE OF APPROVAL</bold></span>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
        <!-- END OF BASIC LEAVE -->
        <!-- LEAVE FORM -->
        <div class="col l6">
            <form class="card medium z-depth-1">
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
                <div class="card-reveal sidenavhover">
                    <span class="card-title grey-text text-darken-4">Fill Up the Following<i class="material-icons right ">close</i></span>
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="col l5 push-l4">
                                    <i class="material-icons prefix" style="font-size:6rem">account_circle</i>
                                    <label for="icon_prefix">{{$guardInformation->strFirstName}} {{$guardInformation->strLastName}}</label>
                                </div>
                            </div>
                            <center>
                                <select class="col s6 push-s3" id = "selectLeave">
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
                            <div class="row"></div>
                            <div class="row">
                                <div class="col l12">
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
                                        <form class="col s12">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                <textarea class="materialize-textarea" id="strReason" type="text" length="120"></textarea>
                                                <label for="input_text">REASON</label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col l12">
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
    </div>
</div>

<!--END OF lEAVE FORM-->
<div class="row"><fieldset style="background-color:grey"></fieldset></div>
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
            var leaveCount = $('#selectLeave').val();
            if (checkInput() && checkDate()){
                confirm('tama');
            }else{
                confirm('mali');
            }
        });

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
            var notificationDay = new Date(moment().add(notificationPeriod, 'days').calendar('l'));
            if (getDaysDifference() > $('#selectLeave').val() || notificationDay > dateStart){
                return false;
            }else{
                return true;
            }
        }


    });
</script>
@stop