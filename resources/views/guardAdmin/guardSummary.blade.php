@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a href="{{URL::route('personaldata')}}" class="breadcrumb">Personal Data</a>
						<a href="{{URL::route('educationalbackground')}}" class="breadcrumb">Educational Background</a>
						<a href="{{URL::route('sgbackground')}}" class="breadcrumb">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb">Requirements</a>
						<a href="{{URL::route('account')}}" class="breadcrumb">Account</a>
						<a href="{{URL::route('guardSummary')}}" class="breadcrumb">Summary</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<!----------------------------------------------PAGES-------------------------------------->

<div class="row">
	<div class="col s5 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
			<center><legend><h4>Summary</h4></legend></center></br>
				<div class="row">
					<div class="col s10 push-s1 card blue lighten-1" style="overflow:scroll; overflow-x:hidden; height: 400px;">
						<div class="card-content">
                            <div>
                                <span class = "card-title black-text" style="font-weight:bold;">Account:</span>
                            </div>
                            
                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Username:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "username"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Password:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "password"></p>
                            </div>
                            
                            <div>
                                <span class = "card-title black-text" style="font-weight:bold;">Personal Data:</span>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">First Name:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "firstName"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Middle Name:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "middleName"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Last Name:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "lastName"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">License Number:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "licenseNumber"></p>
                            </div>
                    
                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Address:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id= "address"></p>
                            </div>
	
                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Age:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "age"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Gender:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "gender"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Place of Birth:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "placeOfBirth"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Contact Nummber (Mobile):</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "mobileNumber"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Contact Nummber (Landline):</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "landlineNumber"></p>
                            </div>

                            <div>
                                <p style="color: #eeeeee; font-size: 20px;">Civil Status:</p>
                            </div>

                            <div>
                                <p style="color:#212121; font-size: 18px;" id = "civilStatus"></p>
                            </div>

                            <div>
                                <span class = "card-title black-text" style="font-weight:bold;">Body Attributes:</span>
                            </div>
                            @foreach($bodyAttributes as $bodyAttribute)
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;"> {{$bodyAttribute->strBodyAttributeName}} </p>

                                    <p style="color:#212121; font-size: 18px;" id = "bodyAttribute{{$bodyAttribute->intBodyAttributeID}}"></p>
                                    </br>
                                </div>
                            @endforeach

                            <div>
                                <span class = "card-title black-text" style="font-weight:bold;">Armed Services:</span>
                            </div>

                            <div>
                                <p style="color:#eeeeee; font-size: 18px;" id = "armedService">N/A</p>
                            </div>

                            <div>
                                <span class = "card-title black-text" style="font-weight:bold;">Government Exams:</span>
                            </div>

                            <div>
                                
                                @foreach($governmentExams as $value)
                                    <p style="color:#eeeeee; font-size: 18px;" id = "governmentExam{{$value->intGovernmentExamID}}">• {{ $value->strGovernmentExam }} - N/A</p>
                                @endforeach
                            </div>
						</div>
					</div>
				</div>
		</div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backSgSummary">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large green right animated infinite flash" id = "btnSave">Save</button>
	</div>
</div>

@stop

@section('script')
<script>
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "{{action('PersonalDataController@get')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){

            if (data){
                var provinceID = data.province;
                var license = data.license;
                var address = data.address + " " + data.city.name + ", " + data.province.name;
                
                //text
                $('#firstName').text(data.firstName);
                $('#middleName').text(data.middleName);
                $('#lastName').text(data.lastName);
                $('#address').text(address);
                $('#age').text(getAge(data.dateOfbirth));
                $('#mobileNumber').text(data.contactCp);
                $('#gender').text(data.gender);
                $('#placeOfBirth').text(data.placeofbirth);
                $('#civilStatus').text(data.civilStatus);
                $('#landlineNumber').text(data.contactLandline);
                $('#licenseNumber').text(license.licenseNumber);
                
                //bodyattribute
                var bodyAttribute = data.bodyAttribute;
                for (intLoop = 0; intLoop < bodyAttribute.length; intLoop ++){
                    $('#bodyAttribute' + bodyAttribute[intLoop].intBodyAttributeID)
                        .text(bodyAttribute[intLoop].strValue + " " + bodyAttribute[intLoop].measurement);
                }
                
                console.log(data.province);
            }else{

            }

        }
    }); //get personal data
    
    $.ajax({

        type: "GET",
        url: "{{action('SGBackgroundController@getGovernmentExam')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            if (data){
                for (intLoop = 0; intLoop < data.length; intLoop ++){
                    $('#governmentExam' + data[intLoop].id).text('• ' + data[intLoop].name + " - " + data[intLoop].rating);
                }
            }else{

            }
        }
    }); //get govermentExam

    $.ajax({

        type: "GET",
        url: "{{action('SGBackgroundController@getArmedService')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            if (data){

                $('#armedService').text(data.name + " - " + data.rank);
            }else{

            }
        }
    }); //get armed service
    
    $.ajax({

        type: "GET",
        url: "{{action('AccountController@get')}}",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(data){
            if (data){

                $('#username').text(data.username);
                $('#password').text(data.password);
            }else{

            }
        }
    }); //get armed service
    
    $('#backSgSummary').click(function(){
        window.location.href = '{{ URL::to("/guard/registration/account") }}';
    });
    
    $('#btnSave').click(function(){
        $.ajax({

            type: "POST",
            url: "{{action('GuardRegistrationSummaryController@insert')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                swal("Success!", "Record has been Added!", "success");
                window.location.href = '{{ URL::to("/guardView") }}';
            },
            error: function(data){
                confirm('error send data fvcked up');
            }
        });//ajax
    });
    
    function getAge(date){
        var year = date.substring(0,4);
        var month = date.substring(5,7);
        var day = date.substring(8,10);
        
        var birthday = month + "-" + day + "-" + year;
        
        var dateBirthday = new Date(birthday);
        var today = new Date();
        var age = Math.floor((today-dateBirthday) / (365.25 * 24 * 60 * 60 * 1000));
        
        return age;
    }
});

</script>
@stop